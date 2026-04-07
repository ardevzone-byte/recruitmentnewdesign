<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pipeline_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Gets all applications for a single job, joining with candidate info.
     * @param int $job_id
     * @return array
     */
   public function get_applications_by_job($job_id, $location_filter = null) {
    $this->db->select('app.id, app.status, can.full_name, can.email, can.cv_file, can.work_location');
    $this->db->from('applications app');
    $this->db->join('candidates can', 'can.id = app.candidate_id');
    $this->db->where('app.job_id', $job_id);
    
    // Apply location filter if provided
    if (!empty($location_filter) && $location_filter != 'all') {
        $this->db->where('can.work_location', $location_filter);
    }
    
    $df = $this->db->field_exists('applied_at', 'applications') ? 'app.applied_at' : 'app.created_at';
    $this->db->order_by($df, 'DESC');
    $query = $this->db->get();
    return $query->result_array();
}
public function get_unique_locations_by_job($job_id) {
    $this->db->select('can.work_location');
    $this->db->distinct();
    $this->db->from('applications app');
    $this->db->join('candidates can', 'can.id = app.candidate_id');
    $this->db->where('app.job_id', $job_id);
    $this->db->where('can.work_location IS NOT NULL');
    $this->db->where('can.work_location !=', '');
    $this->db->order_by('can.work_location', 'ASC');
    $query = $this->db->get();
    
    $locations = [];
    foreach ($query->result_array() as $row) {
        if (!empty($row['work_location'])) {
            $locations[] = $row['work_location'];
        }
    }
    
    return $locations;
}

    /**
     * Updates the status of a single application.
     * @param int $application_id
     * @param string $new_status
     * @return bool
     */
    public function update_application_status($application_id, $new_status) {
        $this->db->where('id', $application_id);
        return $this->db->update('applications', ['status' => $new_status]);
    }

    /**
     * Gets the details of the job itself.
     */
    public function get_job_details($job_id) {
        $query = $this->db->get_where('job_postings', ['id' => $job_id]);
        return $query->row_array();
    }
}