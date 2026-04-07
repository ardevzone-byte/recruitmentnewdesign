<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluation_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // FIXED: Changed 'role' to 'type as role' to match your database column
    public function get_all_managers() {
        $this->db->select('username, name, type as role, department'); 
        $this->db->from('users');
        return $this->db->get()->result_array();
    }

    // Create a new evaluation request
    public function create_request($data) {
        return $this->db->insert('candidate_evaluations', $data);
    }

    // Get evaluations for a specific application
    public function get_evaluations_by_app($app_id) {
        $this->db->select('e.*, u.name as evaluator_name');
        $this->db->from('candidate_evaluations e');
        $this->db->join('users u', 'u.username = e.evaluator_user_id'); 
        $this->db->where('e.application_id', $app_id);
        return $this->db->get()->result_array();
    }

    // Get pending evaluations for the logged-in manager
    public function get_pending_evaluations($user_id) {
        $this->db->select('e.*, c.full_name, j.job_title');
        $this->db->from('candidate_evaluations e');
        $this->db->join('applications a', 'a.id = e.application_id');
        $this->db->join('candidates c', 'c.id = a.candidate_id');
        $this->db->join('job_postings j', 'j.id = a.job_id');
        $this->db->where('e.evaluator_user_id', $user_id);
        $this->db->where('e.status', 'pending');
        return $this->db->get()->result_array();
    }

    // Submit evaluation result
    public function submit_evaluation($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('candidate_evaluations', $data);
    }
}