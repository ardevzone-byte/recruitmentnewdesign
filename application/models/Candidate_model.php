<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Fetches a public job posting by its unique public_link_id.
     */
    public function get_job_by_public_link($link_id) {
        $query = $this->db->get_where('job_postings', ['public_link_id' => $link_id, 'status' => 'Published']);
        return $query->row_array();
    }

    /**
     * Checks if a candidate already exists by email.
     * @return int|bool The candidate's ID if they exist, or false.
     */
    
    public function get_full_application_details($application_id) {
        $data = [];

        // FIX: We select 'app.id as application_id' to strictly ensure we get the right ID
        $this->db->select('app.id as app_id, app.*, can.*, job.job_title, job.department, job.location');
        $this->db->from('applications app');
        $this->db->join('candidates can', 'can.id = app.candidate_id');
        $this->db->join('job_postings job', 'job.id = app.job_id');
        $this->db->where('app.id', $application_id);
        
        $result = $this->db->get()->row_array();

        if (empty($result)) {
            return [];
        }

        // Restore the correct ID into the array so the View reads it correctly
        $result['id'] = $result['app_id']; 
        
        $data['application'] = $result;
        $candidate_id = $result['candidate_id'];
        
        // Map Candidate Info
        $data['candidate'] = $result;

        // Get History
        $this->db->where('candidate_id', $candidate_id);
        $data['education'] = $this->db->get('candidate_education')->result_array();

        $this->db->where('candidate_id', $candidate_id);
        $data['experience'] = $this->db->get('candidate_experience')->result_array();

        // Get Answers
        $this->db->where('application_id', $application_id);
        $raw_answers = $this->db->get('application_answers')->result_array();
        
        $data['answers'] = [];
        foreach ($raw_answers as $answer) {
            $data['answers'][$answer['question_key']] = $answer['answer_value'];
        }

        return $data;
    }
    /**
     * Checks if a candidate has already applied for a specific job.
     * @return bool True if they have applied, false otherwise.
     */
    public function check_duplicate_application($job_id, $candidate_id) {
        $query = $this->db->get_where('applications', [
            'job_id' => $job_id,
            'candidate_id' => $candidate_id
        ]);
        return ($query->num_rows() > 0);
    }
    // application/models/Candidate_model.php

public function update_candidate_details($candidate_id, $data) {
    if (empty($data)) {
        return false;
    }
    $this->db->where('id', $candidate_id);
    return $this->db->update('candidates', $data);
}

// Ensure this one exists too for education
public function update_latest_education($candidate_id, $data) {
    // Check if entry exists
    $exists = $this->db->get_where('candidate_education', ['candidate_id' => $candidate_id])->row();
    if ($exists) {
        $this->db->where('id', $exists->id);
        $this->db->update('candidate_education', $data);
    } else {
        $data['candidate_id'] = $candidate_id;
        $this->db->insert('candidate_education', $data);
    }
}
public function check_candidate_exists($email, $phone) {
        $this->db->group_start();
        $this->db->where('email', $email);
        $this->db->or_where('phone', $phone);
        $this->db->group_end();
        $query = $this->db->get('candidates');
        return $query->row_array();
    }

    // Insert into 'candidates' table based on your schema
    public function create_candidate($data) {
        $this->db->insert('candidates', $data);
        return $this->db->insert_id();
    }

// Update this function signature to accept $status
    public function get_all_candidates_archive($search_query = null, $status_filter = null) {
        $this->db->select('
            candidates.*, 
            applications.id as app_id, 
            applications.status as app_status, 
            
            job_postings.job_title
        ');
        $this->db->from('candidates');
        // Join with applications to check status
        $this->db->join('applications', 'applications.candidate_id = candidates.id', 'left');
        $this->db->join('job_postings', 'job_postings.id = applications.job_id', 'left');

        // 1. Search Logic
        if (!empty($search_query)) {
            $this->db->group_start();
            $this->db->like('candidates.full_name', $search_query);
            $this->db->or_like('candidates.email', $search_query);
            $this->db->or_like('candidates.phone', $search_query);
            $this->db->or_like('job_postings.job_title', $search_query);
            $this->db->group_end();
        }

        // 2. Status Filter Logic (NEW)
        if (!empty($status_filter)) {
            $this->db->where('applications.status', $status_filter);
        }

        // Order by newest
        $this->db->order_by('candidates.created_at', 'DESC');
        
        return $this->db->get()->result_array();
    }

    // Insert Education
    public function add_education($data) {
        return $this->db->insert('candidate_education', $data);
    }

    // Insert Experience
    public function add_experience($data) {
        return $this->db->insert('candidate_experience', $data);
    }
    
    // Get active jobs for the dropdown
    public function get_active_jobs() {
        $this->db->select('id, job_title, public_link_id');
        $this->db->where('status', 'Published');
        return $this->db->get('job_postings')->result_array();
    }
    /**
     * Creates a new candidate or updates an existing one with full data.
     * @param array $data All personal data from the form.
     * @param int|bool $existing_id The ID of the candidate if they exist.
     * @return int The candidate's ID (new or existing).
     */
    public function create_or_update_candidate($data, $existing_id = false) {
        if ($existing_id) {
            // Update existing candidate
            $this->db->where('id', $existing_id);
            $this->db->update('candidates', $data);
            return $existing_id;
        } else {
            // Insert new candidate
            $this->db->insert('candidates', $data);
            return $this->db->insert_id();
        }
    }

    /**
     * Inserts a new education record.
     */
    public function insert_education_batch($data) {
        if (empty($data)) {
            return true; // Nothing to insert
        }
        return $this->db->insert_batch('candidate_education', $data);
    }
// In application/models/Candidate_model.php

public function get_candidate_only($candidate_id) {
    $this->db->where('id', $candidate_id);
    return $this->db->get('candidates')->row_array();
}
    /**
     * Inserts multiple experience records at once.
     * @param array $data A batch array of experience data.
     * @return bool
     */
    public function insert_experience_batch($data) {
        if (empty($data)) {
            return true; // Nothing to insert
        }
        return $this->db->insert_batch('candidate_experience', $data);
    }
// In Evaluation_model.php
public function get_all_managers() {
    $this->db->select('username, name, role, email');
    $this->db->where_in('role', ['manager', 'department_head', 'recruitment_manager']);
    $this->db->or_where('username', '1291'); // Specific users if needed
    $this->db->or_where('username', '1526');
    $this->db->or_where('username', '2200');  // Add 2200
    $this->db->or_where('username', '2439'); 
    $query = $this->db->get('users');
    return $query->result_array();
}
    /**
     * Creates the new application record.
     * @return int The new application's ID.
     */
    public function create_application($data) {
        $this->db->insert('applications', $data);
        return $this->db->insert_id();
    }
}