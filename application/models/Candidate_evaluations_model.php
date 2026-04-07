<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_evaluations_model extends CI_Model
{
 public function find_candidate_offer_by_employee_or_name($q)
{
    $q = trim((string)$q);
    $q = preg_replace('/\s+/', ' ', $q); // تنظيف المسافات

    $this->db->select("
        c.id AS candidate_id,
        c.full_name,
        jo.id AS job_offer_id,
        jo.employee_id AS offer_employee_id,
        jo.application_id
    ", false);

    $this->db->from('candidates c');
    $this->db->join('job_offers jo', 'jo.candidate_id = c.id', 'inner');

    // ✅ بحث دائم بالرقم أو الاسم (OR)
    $this->db->group_start();
        $this->db->where('jo.employee_id', $q);
        $this->db->or_like('c.full_name', $q, 'both');
    $this->db->group_end();

    $this->db->order_by('jo.id', 'DESC');
    $this->db->limit(1);

    $row = $this->db->get()->row();
    return $row ?: null;
}


    public function get_evaluations_by_application($application_id)
    {
        $application_id = (int)$application_id;

        $this->db->select("
            ce.*,
            u1.name AS evaluator_name,
            u2.name AS requested_by_name
        ", false);

        $this->db->from('candidate_evaluations ce');
        $this->db->join('users u1', 'u1.username = ce.evaluator_user_id', 'left');
        $this->db->join('users u2', 'u2.username = ce.requested_by', 'left');
        $this->db->where('ce.application_id', $application_id);
        $this->db->order_by('ce.id', 'DESC');

        return $this->db->get()->result();
    }

    public function insert_evaluation(array $data)
    {
        return $this->db->insert('candidate_evaluations', $data);
    }

    public function update_evaluation($id, array $data)
    {
        $this->db->where('id', (int)$id);
        return $this->db->update('candidate_evaluations', $data);
    }

    public function delete_evaluation($id)
    {
        $this->db->where('id', (int)$id);
        return $this->db->delete('candidate_evaluations');
    }
}
