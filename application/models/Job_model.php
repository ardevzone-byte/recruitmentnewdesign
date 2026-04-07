<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Add this method to get job by requisition ID
    public function get_job_by_requisition_id($requisition_id) {
        $query = $this->db->get_where('job_postings', ['requisition_id' => $requisition_id]);
        return $query->row_array();
    }

    public function get_approved_requisitions_without_job_post() {
        $sql = "SELECT r.* FROM job_requisitions r
                LEFT JOIN job_postings j ON r.id = j.requisition_id
                WHERE r.status = 'معتمد' 
                AND j.id IS NULL
                ORDER BY r.ceo_approved_at DESC";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_published_jobs() {
        $this->db->select('j.*, r.project_or_client');
        $this->db->from('job_postings j');
        $this->db->join('job_requisitions r', 'r.id = j.requisition_id');
        $this->db->where('j.status', 'Published');
        $this->db->order_by('j.created_at', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Get applicant counts per job (total, interviewed, hired) for dashboard display.
     */
    public function get_applicant_counts_by_job($job_id) {
        if (!$this->db->table_exists('applications')) {
            return ['total' => 0, 'interviewed' => 0, 'hired' => 0];
        }
        $total = $this->db->where('job_id', $job_id)->count_all_results('applications');
        $interviewed = $this->db->where(['job_id' => $job_id, 'status' => 'مقابلة'])->count_all_results('applications');
        $hired = $this->db->where(['job_id' => $job_id, 'status' => 'تم التوظيف'])->count_all_results('applications');
        return ['total' => $total, 'interviewed' => $interviewed, 'hired' => $hired];
    }

    /**
     * Inserts a new public job posting.
     */
    public function insert_job_posting($data) {
        $this->db->insert('job_postings', $data);
        return $this->db->insert_id();
    }

    // *** THIS WAS MISSING - ADDED TO FIX THE ERROR ***
    public function get_job_by_public_link($link_id) {
        $query = $this->db->get_where('job_postings', ['public_link_id' => $link_id, 'status' => 'Published']);
        return $query->row_array();
    }

    /**
     * Get job by ID with requisition data (project/client).
     */
    public function get_job_by_id($job_id) {
        $this->db->select('j.*, r.project_or_client, r.role_title as requisition_role_title');
        $this->db->from('job_postings j');
        $this->db->join('job_requisitions r', 'r.id = j.requisition_id');
        $this->db->where('j.id', $job_id);
        $this->db->where('j.status', 'Published');
        $query = $this->db->get();
        return $query->row_array();
    }
}