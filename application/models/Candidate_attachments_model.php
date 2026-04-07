<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_attachments_model extends CI_Model
{
   public function find_candidate_by_employee_or_name($q)
{
    // Check if the search term is numeric
    $is_numeric = preg_match('/^\d+$/', $q);
    
    $this->db->select("
        c.*,
        jo.employee_id AS offer_employee_id,
        jo.id          AS job_offer_id
    ", false);
    $this->db->from('candidates c');
    $this->db->join('job_offers jo', 'jo.candidate_id = c.id', 'inner');

    if ($is_numeric) {
        // If numeric, try to match either employee_id OR id_number
        $this->db->group_start();
            $this->db->where('jo.employee_id', $q);
            $this->db->or_where('c.id_number', $q);
        $this->db->group_end();
    } else {
        // If not numeric, search by name
        $this->db->like('c.full_name', $q);
    }

    $this->db->order_by('jo.id', 'DESC');
    $this->db->limit(1);

    $row = $this->db->get()->row();
    return $row ?: null;
}
    public function get_candidate_with_offer($candidate_id)
    {
        $this->db->select("
            c.*,
            jo.employee_id AS offer_employee_id,
            jo.id          AS job_offer_id
        ", false);
        $this->db->from('candidates c');
        $this->db->join('job_offers jo', 'jo.candidate_id = c.id', 'inner');
        $this->db->where('c.id', (int)$candidate_id);
        $this->db->order_by('jo.id', 'DESC');
        $this->db->limit(1);

        $row = $this->db->get()->row();
        return $row ?: null;
    }

    public function update_candidate_files($candidate_id, array $data)
    {
        if (empty($data)) return false;

        $this->db->where('id', (int)$candidate_id);
        return $this->db->update('candidates', $data);
    }
}
