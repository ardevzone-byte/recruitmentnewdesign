<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onboarding_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Create a batch of tasks
    public function create_tasks($data_batch) {
        if (!$this->db->table_exists('onboarding_tasks')) {
            return false;
        }
        return $this->db->insert_batch('onboarding_tasks', $data_batch);
    }

    // Get all tasks for a specific candidate/application
    public function get_tasks_by_application($app_id) {
        if (!$this->db->table_exists('onboarding_tasks')) {
            return [];
        }
        $this->db->select('t.*, u.name as assignee_name, u.email as assignee_email');
        $this->db->from('onboarding_tasks t');
        $this->db->join('users u', 'u.username = t.assignee_user_id', 'left');
        $this->db->where('t.application_id', $app_id);
        return $this->db->get()->result_array();
    }

    // Get tasks assigned to a specific logged-in user
    public function get_my_pending_tasks($user_id) {
        if (!$this->db->table_exists('onboarding_tasks')) {
            return [];
        }
        $this->db->select('t.*, c.full_name, j.job_title');
        $this->db->from('onboarding_tasks t');
        $this->db->join('applications a', 'a.id = t.application_id');
        $this->db->join('candidates c', 'c.id = a.candidate_id');
        $this->db->join('job_postings j', 'j.id = a.job_id');
        $this->db->where('t.assignee_user_id', $user_id);
        $this->db->where('t.status', 'Pending');
        return $this->db->get()->result_array();
    }

    // Get a single task
    public function get_task_by_id($task_id) {
        if (!$this->db->table_exists('onboarding_tasks')) {
            return null;
        }
        $this->db->select('t.*, c.full_name, u.email as assignee_email, u.name as assignee_name');
        $this->db->from('onboarding_tasks t');
        $this->db->join('applications a', 'a.id = t.application_id');
        $this->db->join('candidates c', 'c.id = a.candidate_id');
        $this->db->join('users u', 'u.username = t.assignee_user_id', 'left');
        $this->db->where('t.id', $task_id);
        return $this->db->get()->row_array();
    }

    // Mark complete
    public function mark_complete($task_id, $user_id, $notes) {
        if (!$this->db->table_exists('onboarding_tasks')) {
            return false;
        }
        $data = [
            'status' => 'Completed',
            'completed_at' => date('Y-m-d H:i:s'),
            'completed_by' => $user_id,
            'notes' => $notes
        ];
        $this->db->where('id', $task_id);
        return $this->db->update('onboarding_tasks', $data);
    }
}