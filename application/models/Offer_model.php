<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function create_offer($data) {
        $this->db->insert('job_offers', $data);
        return $this->db->insert_id();
    }
public function get_hr_offers($filter = 'pending') {
        $this->db->select('
            o.id, 
            o.created_at, 
            o.total_salary, 
            o.status as main_status,
            o.hr_status,
            o.hr_approved_at,
            c.full_name as candidate_name, 
            j.job_title,
            j.department
        ');
        $this->db->from('job_offers o');
        $this->db->join('applications a', 'a.id = o.application_id');
        $this->db->join('candidates c', 'c.id = a.candidate_id');
        $this->db->join('job_postings j', 'j.id = a.job_id');
        
        if ($filter == 'history') {
            // Show offers already handled by HR (Approved or Rejected)
            $this->db->where_in('o.hr_status', ['Approved', 'Rejected']);
        } else {
            // Default: Show Pending
            $this->db->group_start();
                $this->db->where('o.status', 'Pending HR');
                $this->db->or_where('o.hr_status', 'Pending');
            $this->db->group_end();
        }
        
        $this->db->order_by('o.created_at', 'DESC');
        return $this->db->get()->result_array();
    }
  public function get_offer_by_id($offer_id) {
    // Added c.company to the select list
    $this->db->select('o.*, c.id as real_candidate_id, c.full_name as candidate_name, c.phone, c.email, c.company, j.job_title, a.id as application_id');
    $this->db->from('job_offers o');
    
    // Keep your correct join logic here
    $this->db->join('applications a', 'a.id = o.application_id', 'inner');
    $this->db->join('candidates c', 'c.id = a.candidate_id', 'inner'); 
    $this->db->join('job_postings j', 'j.id = a.job_id', 'left');
    
    $this->db->where('o.id', $offer_id);
    return $this->db->get()->row_array();
}
// application/models/Offer_model.php

public function get_pending_offers($role_type) {
    $this->db->select('o.*, c.full_name, j.job_title');
    $this->db->from('job_offers o');
    $this->db->join('candidates c', 'c.id = o.candidate_id', 'left');
    $this->db->join('applications a', 'a.id = o.application_id', 'left');
    $this->db->join('job_postings j', 'j.id = a.job_id', 'left');

    if ($role_type == 'rm') {
        // RM sees initial offer approvals
        $this->db->where('o.status', 'Pending RM');
        $this->db->where('o.rm_status', 'Pending');
    } elseif ($role_type == 'hr') {
        // HR sees initial offer approvals OR Document Verifications
        $this->db->group_start();
            // Scenario 1: Initial Offer Approval
            $this->db->where('o.status', 'Pending HR');
            $this->db->where('o.hr_status', 'Pending');
            
            // Scenario 2: Document Verification
            $this->db->or_where('o.docs_status', 'Under Review');
        $this->db->group_end();
    }

    $query = $this->db->get();
    return $query->result_array();
}
    public function get_offer_by_application($app_id) {
        return $this->db->get_where('job_offers', ['application_id' => $app_id])->row_array();
    }

    public function update_offer($offer_id, $data) {
        $this->db->where('id', $offer_id);
        return $this->db->update('job_offers', $data);
    }

    public function get_offer_by_token($token) {
    // Added c.company to select
    $this->db->select('o.*, c.full_name as candidate_name, c.email, c.company, j.job_title');
    $this->db->from('job_offers o');
    
    // FIX: Changed joins to match get_offer_by_id logic (via applications)
    // instead of relying on potentially broken o.candidate_id
    $this->db->join('applications a', 'a.id = o.application_id', 'inner');
    $this->db->join('candidates c', 'c.id = a.candidate_id', 'inner');
    $this->db->join('job_postings j', 'j.id = a.job_id', 'left');
    
    $this->db->where('o.token', $token);
    return $this->db->get()->row_array();
}

    
}