<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Job_description_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * قائمة الموظفين من job_offers + اسم الموظف + المسمى الوظيفي
     * job_offers.candidate_id -> candidates.id للحصول على full_name
     * applications.candidate_id = candidates.id -> job_id
     * job_postings.id = applications.job_id -> job_title
     */
    public function get_offers_for_select()
    {
        $sql = "
            SELECT
                jo.id AS job_offer_id,
                jo.employee_id,
                jo.candidate_id,
                c.full_name,
                jp.job_title
            FROM job_offers jo
            LEFT JOIN candidates c
                ON c.id = jo.candidate_id
            LEFT JOIN applications app
                ON app.candidate_id = c.id
            LEFT JOIN job_postings jp
                ON jp.id = app.job_id
            ORDER BY jo.id DESC
            LIMIT 500
        ";
        return $this->db->query($sql)->result_array();
    }

    public function get_users_for_select()
    {
        return $this->db->select('username, name')
            ->from('users')
            ->order_by('name', 'ASC')
            ->get()->result_array();
    }

    public function get_offer_details($job_offer_id)
    {
        $sql = "
            SELECT
                jo.id AS job_offer_id,
                jo.employee_id,
                jo.candidate_id,
                c.full_name,
                jp.job_title
            FROM job_offers jo
            LEFT JOIN candidates c
                ON c.id = jo.candidate_id
            LEFT JOIN applications app
                ON app.candidate_id = c.id
            LEFT JOIN job_postings jp
                ON jp.id = app.job_id
            WHERE jo.id = ?
            LIMIT 1
        ";
        return $this->db->query($sql, [$job_offer_id])->row_array();
    }

    public function get_user_by_username($username)
    {
        return $this->db->select('username, name')
            ->from('users')
            ->where('username', (string)$username)
            ->get()->row_array();
    }

    public function create_job_description($data, $approvals)
    {
        $this->db->trans_start();

        $this->db->insert('job_descriptions', $data);
        $jd_id = (int)$this->db->insert_id();

        foreach ($approvals as $row) {
            $row['job_description_id'] = $jd_id;
            $this->db->insert('job_description_approvals', $row);
        }

        $this->db->trans_complete();
        return $this->db->trans_status() ? $jd_id : false;
    }

    public function list_my_items($username)
    {
        // عناصر تنتظر توقيعي (أنا أحد المعتمدين)
        $sql = "
            SELECT
                jd.*,
                a.role,
                a.status AS my_status
            FROM job_descriptions jd
            INNER JOIN job_description_approvals a
                ON a.job_description_id = jd.id
            WHERE a.approver_username = ?
            ORDER BY jd.id DESC
            LIMIT 300
        ";
        return $this->db->query($sql, [(string)$username])->result_array();
    }

    public function get_job_description($id)
    {
        return $this->db->from('job_descriptions')
            ->where('id', (int)$id)
            ->get()->row_array();
    }

    public function get_approvals($jd_id)
    {
        return $this->db->from('job_description_approvals')
            ->where('job_description_id', (int)$jd_id)
            ->order_by("FIELD(role,'employee','supervisor','hr')", null, false)
            ->get()->result_array();
    }

    public function get_my_approval($jd_id, $username)
    {
        return $this->db->from('job_description_approvals')
            ->where('job_description_id', (int)$jd_id)
            ->where('approver_username', (string)$username)
            ->get()->row_array();
    }

    public function set_approval_signature($approval_id, $status, $signature_type, $signature_file, $note = null)
    {
        $this->db->where('id', (int)$approval_id)->update('job_description_approvals', [
            'status'         => $status,
            'signature_type' => $signature_type,
            'signature_file' => $signature_file,
            'note'           => $note,
            'signed_at'      => date('Y-m-d H:i:s'),
        ]);
        return $this->db->affected_rows() >= 0;
    }

    public function recalc_job_description_status($jd_id)
    {
        $rows = $this->db->select('status')
            ->from('job_description_approvals')
            ->where('job_description_id', (int)$jd_id)
            ->get()->result_array();

        $statuses = array_column($rows, 'status');

        $new = 'pending';
        if (in_array('rejected', $statuses, true)) {
            $new = 'rejected';
        } elseif (count($statuses) === 3 && count(array_unique($statuses)) === 1 && $statuses[0] === 'approved') {
            $new = 'approved';
        }

        $this->db->where('id', (int)$jd_id)->update('job_descriptions', [
            'status'    => $new,
            'updated_at'=> date('Y-m-d H:i:s'),
        ]);

        return $new;
    }

    public function get_by_id($id)
{
    $id = (int)$id;

    return $this->db
        ->where('id', $id)
        ->get('job_descriptions')   // ✅ تأكد اسم جدول الوصف الوظيفي عندك
        ->row_array();
}

public function get_list_all()
{
    $this->db->select("
      jd.id,
      jd.employee_name,
      jd.job_title,
      jd.status,
      jd.created_at,
      jd.job_offer_id,
      jd.employee_id
    ", false);

    $this->db->from("job_descriptions jd");
    $this->db->order_by("jd.id", "DESC");

    return $this->db->get()->result_array();
}


 
}
