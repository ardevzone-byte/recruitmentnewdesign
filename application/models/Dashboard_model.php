<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Counts new applications (status = 'جديد').
     * @return int
     */
    public function count_new_applications() {
        $this->db->where('status', 'جديد');
        $this->db->from('applications');
        return $this->db->count_all_results();
    }
// In application/models/candidate_model.php
// Add this method to your existing candidate_model

public function search_candidates($search_term, $limit = 50) {
    $this->db->select('c.*');
    $this->db->from('candidates c');
    
    // Search in multiple fields
    $this->db->group_start();
    $this->db->like('c.full_name', $search_term);
    $this->db->or_like('c.name_en', $search_term);
    $this->db->or_like('c.phone', $search_term);
    $this->db->or_like('c.email', $search_term);
    $this->db->or_like('c.id_number', $search_term);
    $this->db->or_like('c.nationality', $search_term);
    $this->db->group_end();
    
    $this->db->order_by('c.created_at', 'DESC');
    $this->db->limit($limit);
    
    $candidates = $this->db->get()->result_array();
    
    // Add latest status for each candidate
    foreach ($candidates as &$candidate) {
        $this->db->select('status');
        $this->db->where('candidate_id', $candidate['id']);
        $this->db->order_by('created_at', 'DESC');
        $this->db->limit(1);
        $latest_app = $this->db->get('applications')->row_array();
        $candidate['latest_status'] = $latest_app ? $latest_app['status'] : 'لا يوجد طلبات';
    }
    
    return $candidates;
}
    /**
     * Counts requisitions awaiting approval for a specific role.
     * @param string $role ('recruitment_manager' or 'ceo')
     * @return int
     */
    public function count_pending_requisitions($role) {
        if ($role == 'recruitment_manager') {
            $this->db->where('status', 'بانتظار مدير التوظيف');
        } elseif ($role == 'ceo') {
            $this->db->where('status', 'بانتظار الرئيس التنفيذي');
        } else {
            return 0; // Other roles see 0
        }
        $this->db->from('job_requisitions');
        return $this->db->count_all_results();
    }

    /**
     * Counts total jobs currently published.
     * @return int
     */
    public function count_published_jobs() {
        $this->db->where('status', 'Published');
        $this->db->from('job_postings');
        return $this->db->count_all_results();
    }
}