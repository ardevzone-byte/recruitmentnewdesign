<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_apply extends CI_Controller {

     public function __construct() {
        parent::__construct();
        $this->load->model('candidate_model');
        $this->load->model('job_model');
        $this->load->library(['form_validation', 'session', 'upload']);
        $this->load->helper(['url', 'form']);
    }

    /**
     * Page: Simple Public Form
     */
    public function view($public_link_id) {
        $data['job'] = $this->job_model->get_job_by_public_link($public_link_id);

        if (empty($data['job'])) {
            show_404();
        }

        $data['title'] = 'التقديم على وظيفة: ' . $data['job']['job_title'];
        
        // Load view from the 'application' subfolder as confirmed
        $this->load->view('application/simple_view', $data);
    }

    /**
     * Action: Submit Simple Application
     */
     public function submit() {
        $job_id = $this->input->post('job_id');
        $public_link_id = $this->input->post('public_link_id');

        $this->form_validation->set_rules('full_name', 'الاسم الكامل', 'required|trim');
        $this->form_validation->set_rules('email', 'البريد الإلكتروني', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'رقم الجوال', 'required|trim');
        $this->form_validation->set_rules('id_number', 'رقم الهوية', 'required|trim');
        $this->form_validation->set_rules('area', 'المنطقة', 'required|trim');
        $this->form_validation->set_rules('other_area', 'المنطقة الأخرى', 'trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error_msg', 'الرجاء تعبئة جميع الحقول المطلوبة.');
            redirect('simple_apply/view/' . $public_link_id);
            return;
        }

        // Define all valid areas
        $valid_areas = [
            'سكاكا', 'حفر الباطن', 'الرياض', 'نجران', 'عرعر', 'شرورة', 
            'تبوك', 'بيشه', 'الطائف', 'الدوادمي', 'الدمام - الخبر', 'الجوف',
            'الباحة', 'الاحساء', 'يدمة', 'وادي الدواسر', 'مكة المكرمة', 
            'محايل عسير', 'عفيف', 'رنية', 'رفحاء', 'حائل', 'جدة', 'جازان',
            'تثليث', 'بريدة', 'المدينة المنورة', 'الخرج', 'الافلاج', 'ابها'
        ];

        // Handle Area Field Logic
        $area = $this->input->post('area');
        $other_area = $this->input->post('other_area', true);
        
        // If "other" is selected, use the custom area input
        if ($area === 'other' && !empty($other_area)) {
            $final_area = $other_area;
        } elseif (in_array($area, $valid_areas)) {
            $final_area = $area;
        } else {
            // Invalid selection
            $this->session->set_flashdata('error_msg', 'الرجاء تحديد منطقة صالحة.');
            redirect('simple_apply/view/' . $public_link_id);
            return;
        }

        // Handle CV Upload
        $cv_filename = NULL; // Change to NULL
if (!empty($_FILES['cv_file']['name'])) {
    $config['upload_path']   = FCPATH . 'assets/cvs/';
    $config['allowed_types'] = 'pdf|doc|docx';
    $config['max_size']      = '5120';
    $config['encrypt_name']  = TRUE;
    $this->upload->initialize($config); // Important: Use initialize() instead of loading library again

    if ($this->upload->do_upload('cv_file')) {
        $upload_data = $this->upload->data();
        $cv_filename = $upload_data['file_name'];
    } else {
        // Log error if needed
        // $this->session->set_flashdata('error_msg', $this->upload->display_errors());
    }
}
        $this->db->trans_start();
        
        $email = $this->input->post('email');
        $phone = $this->input->post('phone');
        
        // Check/Create Candidate
        $existing_candidate = $this->candidate_model->check_candidate_exists($email, $phone);

        $existing_id = false;
        if (!empty($existing_candidate) && isset($existing_candidate['id'])) {
            $existing_id = (int)$existing_candidate['id'];
        }

        $candidate_data = [
            'full_name' => $this->input->post('full_name'),
            'name_en'   => $this->input->post('name_en'),
            'email'     => $email,
            'phone'     => $phone,
            'id_number' => $this->input->post('id_number'),
            'cv_file'   => $cv_filename,
            'area'      => $final_area, // Use the final area value
        ];

        $candidate_id = $this->candidate_model->create_or_update_candidate($candidate_data, $existing_id);

        // Check Duplicate
        if ($this->candidate_model->check_duplicate_application($job_id, $candidate_id)) {
            $this->session->set_flashdata('error_msg', 'لقد قمت بالتقديم مسبقاً.');
            $this->db->trans_rollback();
            redirect('simple_apply/view/' . $public_link_id);
            return;
        }

        // Create Application
        $application_data = [
            'job_id'           => $job_id,
            'candidate_id'     => $candidate_id,
            'status'           => 'تقديم أولي',
            'application_type' => 'simple',
            'applied_at'       => date('Y-m-d H:i:s')
        ];
        $application_id = $this->candidate_model->create_application($application_data);

        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error_msg', 'حدث خطأ في قاعدة البيانات.');
            redirect('simple_apply/view/' . $public_link_id);
        } else {
            $this->session->set_flashdata('application_id', $application_id);
            redirect('simple_apply/thank_you');
        }
    }

    public function thank_you() {
        $data['title'] = 'شكراً لك';
        $data['message'] = 'تم استلام طلبك بنجاح.';
        
        // Load view from the 'application' subfolder
        $this->load->view('application/simple_thank_you', $data);
    }
    
    public function full_form($sms_token) {
        $this->db->select('a.*, j.job_title, j.department, j.location, c.full_name, c.email, c.phone, c.id_number');
        $this->db->from('applications a');
        $this->db->join('job_postings j', 'j.id = a.job_id');
        $this->db->join('candidates c', 'c.id = a.candidate_id');
        $this->db->where('a.sms_token', $sms_token);
        
        $application = $this->db->get()->row_array();
        
        if (empty($application)) { show_404(); }
        
        $data['title'] = 'استكمال طلب التوظيف';
        $data['job'] = [
            'id' => $application['job_id'],
            'job_title' => $application['job_title'],
            'department' => $application['department'],
            'location' => $application['location'],
            'public_link_id' => 'NA' 
        ];
        $data['candidate'] = [
            'full_name' => $application['full_name'],
            'email' => $application['email'],
            'phone' => $application['phone'],
            'id_number' => $application['id_number']
        ];
        $data['application_id'] = $application['id'];
        $data['sms_token'] = $sms_token;
        
        $this->load->view('apply/view', $data);
    }
}