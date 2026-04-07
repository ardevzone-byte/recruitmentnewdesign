<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hr_integration_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert_employee_to_orders($data) {
        // 1. Connect to Orders Database
        $orders_db = $this->load->database('orders_db', TRUE); 

        $orders_db->trans_start();

        // --- Format Date to YYYY-MM-DD ---
        $join_date = date('Y-m-d', strtotime($data['start_date']));

        // --- Logic for n13 (Company Code) ---
        // If company is 'شركة مرسوم', code is 1, else 2
        $n13_code = ($data['company_name'] == 'شركة مرسوم') ? '1' : '2';

        // --- Table 1: emp1 ---
        $emp1_data = [
            'status' => 'active',
            'availability_status' => 'available',
            'employee_id' => $data['employee_id'],
            'id_number' => $data['id_number'],
            'email' => $data['email'], 
            'personal_email' => $data['email'],
            'marital' => $data['marital_status'],
            'phone' => $data['phone'],
            'religion' => $data['religion'],
            'subscriber_name' => $data['full_name'], 
            'nationality' => $data['nationality'],
            'gender' => $data['gender'],
            'base_salary' => $data['basic_salary'],
            'housing_allowance' => $data['housing_allowance'],
            'n4' => $data['transport_allowance'], 
            'other_allowances' => $data['other_allowances'],
            'total_salary' => $data['total_salary'],
            'salary_subject_to_contribution' => $data['total_salary'], 
            'profession' => $data['position'], 
            'company_name' => $data['company_name'],
            'location' => $data['work_location'],
            'manager' => $data['manager_name'], 
            'contract_status' => 'Valid',
            'n3' => $data['bank_name'], 
            'n2' => $data['iban_number'],
            'n1' => $data['department'],
            
            // ✅ Updates
            'n13' => $n13_code, 
            'joining_date' => $join_date,
            'contract_start' => $join_date, 
            'national_address_file'     => $data['national_address_file'],
            'commencement_form_file'    => $data['commencement_form_file'],
            'job_description_file'      => $data['job_description_file'],
            'confidentiality_form_file' => $data['confidentiality_form_file'],
            'gosi_subscription_file'    => $data['gosi_subscription_file'],
            'experience_file'           => $data['experience_file'],
            'clearance_cert_file'       => $data['clearance_cert_file'],
            'medical_invoice'           => $data['medical_invoice'],
            'employment_guarantee_file' => $data['employment_guarantee_file'],
            'lawyer_license_file'       => $data['lawyer_license_file'],
            'criminal_record_file'      => $data['criminal_record_file'],
            'medical_result'            => $data['medical_result'],
            'family_data_file'          => $data['family_data_file'],
            'immediate_work_file'       => $data['immediate_work_file'],
        ];
        $orders_db->insert('emp1', $emp1_data);

        // --- Table 2: new_employees ---
        $new_emp_data = [
            'employee_id' => $data['employee_id'],
            'subscriber_name' => $data['full_name'],
            'nationality' => $data['nationality'],
            'join_date' => $join_date 
        ];
        $orders_db->insert('new_employees', $new_emp_data);

        // --- Table 3: insurance_discount ---
        $insurance_data = [
            'n1' => $data['employee_id'],
            'n2' => $data['full_name'],
            'n3' => '0.0975' 
        ];
        $orders_db->insert('insurance_discount', $insurance_data);

        // --- Table 4: organizational_structure (REMOVED) ---
        // Logic removed as per request.

        $orders_db->trans_complete();

        return $orders_db->trans_status();
    }
}