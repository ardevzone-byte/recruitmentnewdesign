<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Some installs use applications.applied_at; others only applications.created_at.
     * @return string 'applied_at'|'created_at'
     */
    private function _applications_date_field() {
        static $field = null;
        if ($field !== null) {
            return $field;
        }
        $field = $this->db->field_exists('applied_at', 'applications') ? 'applied_at' : 'created_at';
        return $field;
    }

    /**
     * interviews table column linking to users (varies by DB dump).
     * @return string|null e.g. interviewer_user_id, user_id
     */
    private function _interviews_interviewer_column() {
        if (!$this->db->table_exists('interviews')) {
            return null;
        }
        foreach (['interviewer_user_id', 'interviewer_id', 'interviewer', 'user_id', 'created_by'] as $col) {
            if ($this->db->field_exists($col, 'interviews')) {
                return $col;
            }
        }
        return null;
    }

    /**
     * job_offers column that references who created the offer (user id or username string).
     * @return string Empty string if table missing or no usable column.
     */
    private function _job_offers_creator_column() {
        static $memo = '__unset__';
        if ($memo !== '__unset__') {
            return $memo;
        }
        if (!$this->db->table_exists('job_offers')) {
            return $memo = '';
        }
        foreach (['created_by', 'created_by_user_id', 'user_id'] as $col) {
            if ($this->db->field_exists($col, 'job_offers')) {
                return $memo = $col;
            }
        }
        return $memo = '';
    }

    /**
     * 1. KPI Stats (Cards) - Fixed to support Job Position Filter
     */
    public function get_kpi_stats($filters = []) {
        $stats = [
            'total_apps' => 0,
            'interviewed' => 0,
            'offered' => 0,
            'hired' => 0
        ];

        // Total Applications
        $this->_apply_stats_query($filters);
        $stats['total_apps'] = $this->db->count_all_results();

        // Interviewed (Status = مقابلة)
        $this->_apply_stats_query($filters);
        $this->db->where('applications.status', 'مقابلة');
        $stats['interviewed'] = $this->db->count_all_results();

        // Offers (Status = عرض وظيفي)
        $this->_apply_stats_query($filters);
        $this->db->where('applications.status', 'عرض وظيفي');
        $stats['offered'] = $this->db->count_all_results();

        // Hired (Status = تم التوظيف)
        $this->_apply_stats_query($filters);
        $this->db->where('applications.status', 'تم التوظيف');
        $stats['hired'] = $this->db->count_all_results();

        return $stats;
    }

    /**
     * 2. Recruiter Performance - Counts interviews/offers/evaluations
     */
    public function get_ceo_team_matrix() {
        $target_usernames = ['1526', '2200', '2439', '2515'];

        // 1. Get Target Users
        $this->db->where_in('username', $target_usernames);
        $users = $this->db->get('users')->result_array();
        
        // 2. Build User Lookup Map (ID -> ID) & (Username -> ID)
        // This maps both "55" and "1526" to the same user row in our matrix
        $user_map = [];
        $valid_identifiers = []; // List of all IDs and Usernames to query
        
        foreach ($users as $u) {
            $user_map[$u['id']] = $u['id'];        // Map ID to itself
            $user_map[$u['username']] = $u['id'];  // Map Username string to ID
            
            $valid_identifiers[] = $u['id'];
            $valid_identifiers[] = $u['username'];
        }
        
        // Remove empty values to prevent SQL errors
        $valid_identifiers = array_filter($valid_identifiers);

        // 3. Get ALL Job Postings (Columns)
        $this->db->select('id, job_title');
        $this->db->from('job_postings');
        $jobs = $this->db->get()->result_array();

        // 4. Initialize Matrix with Zeros
        $matrix = [];
        foreach ($users as $u) {
            foreach ($jobs as $j) {
                $matrix[$u['id']][$j['id']] = [
                    'interviews' => 0, 
                    'approvals' => 0, 
                    'offers' => 0
                ];
            }
        }

        if (empty($valid_identifiers)) {
            return ['users' => $users, 'jobs' => $jobs, 'matrix' => $matrix];
        }

        // ---------------------------------------------------------
        // 5. DATA QUERY 1: INTERVIEWS
        // ---------------------------------------------------------
        $ivCol = $this->_interviews_interviewer_column();
        if ($ivCol !== null) {
            $this->db->select('i.' . $ivCol . ' as raw_uid, a.job_id as jid, COUNT(i.id) as cnt', false);
            $this->db->from('interviews i');
            $this->db->join('applications a', 'a.id = i.application_id');
            $this->db->where_in('i.' . $ivCol, $valid_identifiers);
            $this->db->group_by(['i.' . $ivCol, 'a.job_id']);
            $interviews_data = @$this->db->get()->result_array() ?: [];

            foreach ($interviews_data as $row) {
                $real_uid = $user_map[$row['raw_uid']] ?? null;
                if ($real_uid && isset($matrix[$real_uid][$row['jid']])) {
                    $matrix[$real_uid][$row['jid']]['interviews'] += $row['cnt'];
                }
            }
        }

        // ---------------------------------------------------------
        // 6. DATA QUERY 2: APPROVALS (only if candidate_evaluations exists)
        // ---------------------------------------------------------
        if ($this->db->table_exists('candidate_evaluations')) {
            $this->db->select('e.evaluator_user_id as raw_uid, a.job_id as jid, COUNT(e.id) as cnt');
            $this->db->from('candidate_evaluations e');
            $this->db->join('applications a', 'a.id = e.application_id');
            $this->db->where_in('e.evaluator_user_id', $valid_identifiers);
            $this->db->where('e.status', 'completed');
            $this->db->group_by(['e.evaluator_user_id', 'a.job_id']);
            $approvals_data = @$this->db->get()->result_array() ?: [];
            foreach ($approvals_data as $row) {
                $real_uid = $user_map[$row['raw_uid']] ?? null;
                if ($real_uid && isset($matrix[$real_uid][$row['jid']])) {
                    $matrix[$real_uid][$row['jid']]['approvals'] += $row['cnt'];
                }
            }
        }

        // ---------------------------------------------------------
        // 7. DATA QUERY 3: OFFERS
        // ---------------------------------------------------------
        $offerCreatorCol = $this->_job_offers_creator_column();
        if ($offerCreatorCol !== '') {
            $this->db->select('o.' . $offerCreatorCol . ' as raw_uid, a.job_id as jid, COUNT(o.id) as cnt', false);
            $this->db->from('job_offers o');
            $this->db->join('applications a', 'a.id = o.application_id');
            $this->db->where_in('o.' . $offerCreatorCol, $valid_identifiers);
            $this->db->group_by(['o.' . $offerCreatorCol, 'a.job_id']);
            $offers_data = @$this->db->get()->result_array() ?: [];
            foreach ($offers_data as $row) {
                $real_uid = $user_map[$row['raw_uid']] ?? null;
                if ($real_uid && isset($matrix[$real_uid][$row['jid']])) {
                    $matrix[$real_uid][$row['jid']]['offers'] += $row['cnt'];
                }
            }
        }

        return ['users' => $users, 'jobs' => $jobs, 'matrix' => $matrix];
    }
    public function get_recruiter_performance($filters = []) {
        $target_usernames = ['1526', '2200', '2439','2515'];
        $has_eval_table = $this->db->table_exists('candidate_evaluations');
        $ivCol = $this->_interviews_interviewer_column();
        $has_interviews = ($ivCol !== null);
        $offerCreatorCol = $this->_job_offers_creator_column();
        $has_offers = ($offerCreatorCol !== '');
        $interviews_has_created = $has_interviews && $this->db->field_exists('created_at', 'interviews');

        $select = 'u.id, u.username, u.name, ';
        $select .= $has_interviews ? 'COUNT(DISTINCT i.id) as interviews_conducted, ' : '0 as interviews_conducted, ';
        $select .= $has_offers ? 'COUNT(DISTINCT o.id) as offers_created, ' : '0 as offers_created, ';
        $select .= $has_eval_table ? 'COUNT(DISTINCT e.id) as evaluations_made' : '0 as evaluations_made';
        $this->db->select($select);
        $this->db->from('users u');

        if ($has_interviews) {
            $this->db->join('interviews i', '(i.' . $ivCol . ' = u.id OR i.' . $ivCol . ' = u.username)', 'left', false);
        }
        if ($has_offers) {
            $this->db->join('job_offers o', '(o.' . $offerCreatorCol . ' = u.id OR o.' . $offerCreatorCol . ' = u.username)', 'left', false);
        }
        if ($has_eval_table) {
            $this->db->join('candidate_evaluations e', '(e.evaluator_user_id = u.id OR e.evaluator_user_id = u.username)', 'left');
        }

        $this->db->where_in('u.username', $target_usernames);
        if (!empty($filters['recruiter_id'])) {
            $this->db->where('u.id', $filters['recruiter_id']);
        }
        if (!empty($filters['start_date']) && ($has_interviews || $has_offers || $has_eval_table)) {
            $this->db->group_start();
            $first = true;
            if ($interviews_has_created) {
                $this->db->where('i.created_at >=', $filters['start_date']);
                $first = false;
            }
            if ($has_offers && $this->db->field_exists('created_at', 'job_offers')) {
                if ($first) {
                    $this->db->where('o.created_at >=', $filters['start_date']);
                    $first = false;
                } else {
                    $this->db->or_where('o.created_at >=', $filters['start_date']);
                }
            }
            if ($has_eval_table) {
                $this->db->or_where('e.created_at >=', $filters['start_date']);
            }
            $this->db->group_end();
        }
        $this->db->group_by('u.id');
        $result = @$this->db->get();
        return ($result && $result->num_rows() > 0) ? $result->result_array() : [];
    }

    /**
     * 3. Job Offers Report - Added Position Filter Here
     */
    /**
     * جلب تفاصيل القائمة للمودال (Modal List)
   /**
     * Get List for Modal based on KPI Type
     */
   /**
     * Get List for Modal based on KPI Type
     */
    public function get_details_by_type($type, $filters) {
        $df = $this->_applications_date_field();
        $this->db->select("
            applications.id as app_id,
            applications.status,
            applications.$df as created_at,
            candidates.full_name,
            candidates.phone,
            j.job_title,  
            j.location    
        ", false);
        
        // This helper joins 'job_postings' as 'j'
        $this->_apply_stats_query($filters, true); 

        $this->db->join('candidates', 'candidates.id = applications.candidate_id', 'left');

        // Apply Logic
        if ($type == 'interviewed') {
            $this->db->where('applications.status', 'مقابلة');
        } elseif ($type == 'offered') {
            $this->db->where('applications.status', 'عرض وظيفي');
        } elseif ($type == 'hired') {
            $this->db->where('applications.status', 'تم التوظيف');
        }

        $this->db->order_by('applications.' . $df, 'DESC');
        return $this->db->get()->result_array();
    }
    public function get_job_offers_report($filters = []) {
        $offerCreatorCol = $this->_job_offers_creator_column();
        $this->db->select('
            o.id as offer_id,
            o.application_id,
            o.total_salary,
            o.basic_salary,
            o.status as offer_status,
            o.candidate_response,
            o.created_at as offer_date,
            o.employee_id,
            app.status as application_status,
            c.full_name as candidate_name,
            c.phone,
            c.work_location,
            ' . ($offerCreatorCol !== '' ? 'u.name as recruiter_name' : 'NULL as recruiter_name') . ',
            j.job_title
        ', false);
        $this->db->from('job_offers o');
        $this->db->join('applications app', 'app.id = o.application_id', 'left');
        $this->db->join('candidates c', 'c.id = app.candidate_id', 'left');
        if ($offerCreatorCol !== '') {
            $this->db->join('users u', '(u.id = o.' . $offerCreatorCol . ' OR u.username = o.' . $offerCreatorCol . ')', 'left', false);
        }
        $this->db->join('job_postings j', 'j.id = app.job_id', 'left');

        // --- FILTERS ---
        if (!empty($filters['start_date'])) {
            $this->db->where('DATE(o.created_at) >=', $filters['start_date']);
        }
        if (!empty($filters['end_date'])) {
            $this->db->where('DATE(o.created_at) <=', $filters['end_date']);
        }
        if (!empty($filters['recruiter_id'])) {
            $this->db->where('u.id', $filters['recruiter_id']);
        }
        if (!empty($filters['position'])) {
            $this->db->where('j.id', $filters['position']);
        }
        if (!empty($filters['location'])) {
            $this->db->like('j.location', $filters['location']);
        }
        
        // NEW: Offer Status Filter
        if (!empty($filters['offer_status'])) {
            $this->db->where('o.status', $filters['offer_status']);
        }
        
        $this->db->order_by('o.created_at', 'DESC');
        return $this->db->get()->result_array();
    }
/**
     * 4. Chart Data: Status Breakdown
     */
    public function get_applications_by_status($filters = []) {
        // Select status from applications table
        $this->db->select('applications.status, COUNT(*) as count');
        
        // FIX: Pass TRUE (or no argument) to ensure 'FROM applications' is added
        $this->_apply_stats_query($filters, true); 
        
        $this->db->group_by('applications.status');
        return $this->db->get()->result_array();
    }
    public function get_monthly_trend() {
        // Use applied_at when present; otherwise created_at (matches most schemas)
        if ($this->db->table_exists('applications')) {
            $df = $this->_applications_date_field();
            $sql = "SELECT DATE_FORMAT(`$df`, '%Y-%m') as month, COUNT(*) as count 
                    FROM applications 
                    WHERE `$df` >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
                    GROUP BY month ORDER BY month ASC";
            $rows = @$this->db->query($sql);
            if ($rows && $rows->num_rows() > 0) {
                return $rows->result_array();
            }
        }
        if ($this->db->table_exists('candidates')) {
            $sql = "SELECT DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count 
                    FROM candidates 
                    WHERE created_at >= DATE_SUB(NOW(), INTERVAL 6 MONTH)
                    GROUP BY month ORDER BY month ASC";
            return @$this->db->query($sql)->result_array() ?: [];
        }
        return [];
    }

    /**
     * 6. Excel Export Data
     */
    public function get_export_data($filters) {
        $this->db->select('
            a.id as app_id,
            c.full_name,
            c.phone,
            c.email,
            j.job_title,
            j.location,
            a.status,
            a.decision_status,
            c.work_location,
            o.basic_salary,
            o.total_salary,
            decider.name as decision_by_name
        ');
        $this->db->from('applications a');
        $this->db->join('candidates c', 'c.id = a.candidate_id', 'left');
        $this->db->join('job_postings j', 'j.id = a.job_id', 'left');
        $this->db->join('job_offers o', 'o.application_id = a.id', 'left');
        $this->db->join('users decider', 'decider.id = a.decision_by', 'left');

        if (!empty($filters['start_date'])) $this->db->where('DATE(a.created_at) >=', $filters['start_date']);
        if (!empty($filters['end_date'])) $this->db->where('DATE(a.created_at) <=', $filters['end_date']);
        if (!empty($filters['location'])) $this->db->like('j.location', $filters['location']);
        if (!empty($filters['position'])) $this->db->where('j.id', $filters['position']);

        return $this->db->get()->result_array();
    }

    /**
     * Helper: Get Team List for Dropdown
     */
    public function get_recruitment_team_list() {
        $this->db->select('id, name, username');
        $this->db->where_in('username', ['1526', '2200', '2439','2515']);
        return $this->db->get('users')->result_array();
    }

    /**
     * PRIVATE Helper: Apply Join & Filters for Stats
     * Used by get_kpi_stats and get_applications_by_status
     */
   private function _apply_stats_query($filters, $set_from = true) {
        if ($set_from) {
            $this->db->from('applications');
        }
        $this->db->join('job_postings j', 'j.id = applications.job_id', 'left');

        $df = $this->_applications_date_field();
        if (!empty($filters['start_date'])) {
            $this->db->where('DATE(applications.' . $df . ') >=', $filters['start_date']);
        }
        if (!empty($filters['end_date'])) {
            $this->db->where('DATE(applications.' . $df . ') <=', $filters['end_date']);
        }
        if (!empty($filters['position'])) {
            $this->db->where('j.id', $filters['position']);
        }
        if (!empty($filters['location'])) {
            $this->db->like('j.location', $filters['location']);
        }
    }
}