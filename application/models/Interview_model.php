<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interview_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Creates a new interview record.
     * @param array $data
     * @return int Insert ID
     */
    public function schedule_interview($data) {
        $this->db->insert('interviews', $data);
        return $this->db->insert_id();
    }

    /**
     * Checks if an application already has an active interview scheduled.
     * (Optional: prevents double booking)
     */
    public function get_upcoming_interview($application_id) {
        $this->db->where('application_id', $application_id);
        $this->db->where_in('status', ['Scheduled']);
        $query = $this->db->get('interviews');
        return $query->row_array();
    }
    
    /**
     * Get interview details for the view
     */
    public function get_interviews_by_application($application_id) {
        $this->db->order_by('interview_date', 'DESC');
        $query = $this->db->get_where('interviews', ['application_id' => $application_id]);
        return $query->result_array();
    }
}