<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_evaluations2_model extends CI_Model
{
    public function search_candidates_by_name($name)
    {
        $name = trim((string)$name);
        $name = preg_replace('/\s+/', ' ', $name);

        $this->db->select('id, full_name', false);
        $this->db->from('candidates');
        $this->db->like('full_name', $name, 'both');
        $this->db->order_by('full_name', 'ASC');
        $this->db->limit(30);
        return $this->db->get()->result();
    }

    public function get_candidate($candidate_id)
    {
        $this->db->select('id, full_name', false);
        $this->db->from('candidates');
        $this->db->where('id', (int)$candidate_id);
        return $this->db->get()->row();
    }

    public function get_applications_by_candidate($candidate_id)
    {
        $this->db->select('*', false);
        $this->db->from('applications');
        $this->db->where('candidate_id', (int)$candidate_id);
        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result();
    }

    public function get_evaluations_by_application_ids(array $app_ids)
    {
        if (empty($app_ids)) return [];

        $this->db->select("
            ce.*,
            u1.name AS evaluator_name,
            u2.name AS requested_by_name,
            a.id AS application_ref
        ", false);

        $this->db->from('candidate_evaluations ce');
        $this->db->join('applications a', 'a.id = ce.application_id', 'inner');
        $this->db->join('users u1', 'u1.username = ce.evaluator_user_id', 'left');
        $this->db->join('users u2', 'u2.username = ce.requested_by', 'left');

        $this->db->where_in('ce.application_id', $app_ids);
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
