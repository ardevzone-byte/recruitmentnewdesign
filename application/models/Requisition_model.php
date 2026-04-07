<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Requisition_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Inserts a new job requisition into the database.
     * @param array $data The requisition data from the controller.
     * @return int The ID of the newly inserted requisition.
     */
    public function insert_requisition($data) {
    // Log the data being inserted
    error_log("MODEL: Inserting requisition - user_id: " . $data['requester_user_id']);
    
    // Ensure all required fields are present
    $required_fields = [
        'requester_user_id',
        'requester_name',
        'department',
        'role_title',
        'employees_needed',
        'gender',
        'region',
        'project_or_client',
        'target_hire_date',
        'education_level',
        'age_range',
        'salary_min',
        'salary_max',
        'status'
    ];
    
    // Check for missing fields
    foreach($required_fields as $field) {
        if(!isset($data[$field]) || empty($data[$field])) {
            error_log("ERROR: Missing field: $field");
            return false;
        }
    }
    
    // Add created_at if not present
    if(!isset($data['created_at'])) {
        $data['created_at'] = date('Y-m-d H:i:s');
    }
    
    // Insert the data
    $this->db->insert('job_requisitions', $data);
    
    // Check for errors
    if($this->db->error()['code']) {
        $error = $this->db->error();
        error_log("DATABASE ERROR: " . $error['message']);
        return false;
    }
    
    // Return the inserted ID
    $insert_id = $this->db->insert_id();
    error_log("SUCCESS: Inserted requisition ID: $insert_id");
    
    return $insert_id;
}

    /**
     * Fetches all requisitions with a specific status (e.g., 'بانتظار مدير التوظيف').
     * @param string $status The approval status to filter by.
     * @return array A list of requisition objects.
     */
    public function get_requisitions_by_status($status) {
        $this->db->from('job_requisitions');
        $this->db->where('status', $status);
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Fetches all requisitions created by a specific user.
     * Matches both user_id and username (table may store either).
     * @param int|string $user_id The user's numeric ID.
     * @param string|null $username The user's username (e.g. 'admin', '2803').
     * @return array A list of requisition objects.
     */
    public function get_requisitions_by_user($user_id, $username = null) {
        $this->db->from('job_requisitions');
        $this->db->group_start();
        $this->db->where('requester_user_id', $user_id);
        if (!empty($username) && $username != $user_id) {
            $this->db->or_where('requester_user_id', $username);
        }
        $this->db->group_end();
        $this->db->order_by('created_at', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Fetches a single requisition by its ID.
     * @param int $id The requisition ID.
     * @return array The requisition data.
     */
    public function get_requisition_by_id($id) {
        $query = $this->db->get_where('job_requisitions', ['id' => $id]);
        return $query->row_array();
    }

    /**
     * Updates the status and details of a requisition.
     * @param int $id The requisition ID.
     * @param array $data The data to update.
     * @return bool True on success, false on failure.
     */
    public function update_requisition($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('job_requisitions', $data);
    }

    /**
     * NEW: Gets job posting details by requisition ID.
     * @param int $requisition_id The requisition ID.
     * @return array The job posting data.
     */
    public function get_job_by_requisition_id($requisition_id) {
        $query = $this->db->get_where('job_postings', ['requisition_id' => $requisition_id]);
        return $query->row_array();
    }

    /**
     * NEW: Counts applications for a specific job.
     * @param int $job_id The job posting ID.
     * @return int The number of applications.
     */
    public function get_application_count($job_id) {
        $this->db->where('job_id', $job_id);
        return $this->db->count_all_results('applications');
    }

    /**
     * NEW: Counts interviews for all jobs from a specific requisition.
     * @param int $requisition_id The requisition ID.
     * @return int The number of interviews.
     */
    public function get_interview_count_by_requisition($requisition_id) {
        $this->db->select('COUNT(interviews.id) as interview_count');
        $this->db->from('interviews');
        $this->db->join('applications', 'applications.id = interviews.application_id');
        $this->db->join('job_postings', 'job_postings.id = applications.job_id');
        $this->db->where('job_postings.requisition_id', $requisition_id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['interview_count'] ?? 0;
    }

    /**
     * NEW: Counts job offers for all jobs from a specific requisition.
     * @param int $requisition_id The requisition ID.
     * @return int The number of offers.
     */
    public function get_offer_count_by_requisition($requisition_id) {
        $this->db->select('COUNT(job_offers.id) as offer_count');
        $this->db->from('job_offers');
        $this->db->join('applications', 'applications.id = job_offers.application_id');
        $this->db->join('job_postings', 'job_postings.id = applications.job_id');
        $this->db->where('job_postings.requisition_id', $requisition_id);
        $query = $this->db->get();
        $result = $query->row_array();
        return $result['offer_count'] ?? 0;
    }
}