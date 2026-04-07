<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Onboarding_model1 extends CI_Model
{
    protected $rec_db;     // recruitment3 (default)
    protected $orders_db;  // orders_db

    public function __construct()
    {
        parent::__construct();
        $this->rec_db    = $this->load->database('default', TRUE);
        $this->orders_db = $this->load->database('orders_db', TRUE);
    }

    /* =======================
       Departments CRUD
    ======================= */

    public function dept_all()
    {
        return $this->rec_db->order_by('id', 'DESC')->get('onboarding_departments')->result_array();
    }

    public function dept_get($id)
    {
        return $this->rec_db->get_where('onboarding_departments', ['id' => (int)$id])->row_array();
    }

    public function dept_create($data)
    {
        $this->rec_db->insert('onboarding_departments', $data);
        return $this->rec_db->insert_id();
    }

    public function dept_update($id, $data)
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        return $this->rec_db->where('id', (int)$id)->update('onboarding_departments', $data);
    }

    public function dept_delete($id)
    {
        return $this->rec_db->where('id', (int)$id)->delete('onboarding_departments');
    }

    public function dept_active()
    {
        return $this->rec_db->where('is_active', 1)->order_by('dept_name','ASC')->get('onboarding_departments')->result_array();
    }

    /* =======================
       Employee/Offer Lookup
    ======================= */

    // بحث ذكي للاختيار (اسم/رقم وظيفي) يرجع قائمة صغيرة
    public function search_offers($q, $limit = 15)
    {
        $q = trim((string)$q);
        if ($q === '') return [];

        $db = $this->rec_db;
        $db->select("
            jo.id AS job_offer_id,
            jo.employee_id,
            jo.candidate_id,
            c.full_name,
            jo.area,
            jo.start_date
        ", false);
        $db->from('job_offers jo');
        $db->join('candidates c', 'c.id = jo.candidate_id', 'left');

        $db->group_start()
            ->like('c.full_name', $q)
            ->or_like('jo.employee_id', $q)
        ->group_end();

        $db->order_by('jo.id', 'DESC');
        $db->limit((int)$limit);

        return $db->get()->result_array();
    }

    // جلب بيانات الموظف للإيميل (template 1 و 2)
    public function get_onboarding_payload($job_offer_id)
    {
        $job_offer_id = (int)$job_offer_id;

        // من recruitment3: job_offers + candidates + job_postings
        $db = $this->rec_db;
        $db->select("
            jo.id AS job_offer_id,
            jo.candidate_id,
            jo.employee_id,
            jo.id_number,
            jo.area,
            jo.start_date,
            jo.project_code,
            jo.project_name,
            jo.supervisor_empno,
            jo.supervisor_name,

            c.full_name,
            c.phone,

            jp.job_title
        ", false);

        $db->from('job_offers jo');
        $db->join('candidates c', 'c.id = jo.candidate_id', 'left');

        // الربط اللي قلت عليه:
        // job_postings.requisition_id = job_offers.id
        $db->join('job_postings jp', 'jp.requisition_id = jo.id', 'left');

        $db->where('jo.id', $job_offer_id);
        $row = $db->get()->row_array();
        if (!$row) return null;

        // تحسين التسميات اللي تبيها
        $payload = [
            'job_offer_id'      => (int)$row['job_offer_id'],
            'candidate_id'      => (int)$row['candidate_id'],
            'employee_name'     => (string)($row['full_name'] ?? ''),
            'employee_id'       => (string)($row['employee_id'] ?? ''),
            'id_number'         => (string)($row['id_number'] ?? ''),
            'job_title'         => (string)($row['job_title'] ?? ''),
            'area'              => (string)($row['area'] ?? ''),
            'start_date'        => (string)($row['start_date'] ?? ''),
            'project_code'      => (string)($row['project_code'] ?? ''),
            'project_name'      => (string)($row['project_name'] ?? ''),
            'direct_manager_no' => (string)($row['supervisor_empno'] ?? ''),
            'direct_manager'    => (string)($row['supervisor_name'] ?? ''), // سميناه المسؤول المباشر
            'phone'             => (string)($row['phone'] ?? ''),
        ];

        // (اختياري) لو project_name/manager_name فاضية ونبغى نسترجعها من orders تلقائيًا:
        // users(username/name) + projects_list(code/name)
        if ($payload['direct_manager_no'] !== '' && $payload['direct_manager'] === '') {
            $u = $this->orders_db->select('name')->get_where('users', ['username' => $payload['direct_manager_no']], 1)->row_array();
            if (!empty($u['name'])) $payload['direct_manager'] = (string)$u['name'];
        }
        if ($payload['project_code'] !== '' && $payload['project_name'] === '') {
            $p = $this->orders_db->select('name')->get_where('projects_list', ['code' => $payload['project_code']], 1)->row_array();
            if (!empty($p['name'])) $payload['project_name'] = (string)$p['name'];
        }

        return $payload;
    }

    /* =======================
       Logs
    ======================= */

    public function log_insert($data)
    {
        $this->rec_db->insert('onboarding_notifications_log', $data);
        return $this->rec_db->insert_id();
    }

    public function logs_latest($limit = 50)
    {
        $db = $this->rec_db;
        $db->select("
            l.*,
            d.dept_name
        ", false);
        $db->from('onboarding_notifications_log l');
        $db->join('onboarding_departments d', 'd.id = l.dept_id', 'left');
        $db->order_by('l.id', 'DESC');
        $db->limit((int)$limit);
        return $db->get()->result_array();
    }
}
