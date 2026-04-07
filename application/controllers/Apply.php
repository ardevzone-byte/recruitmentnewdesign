<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apply extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('candidate_model');
        $this->load->library(['form_validation', 'session', 'upload']);
        $this->load->helper(['url', 'form', 'string']);
    }

    public function submit() {
        $job_id = $this->input->post('job_id');
        $public_link_id = $this->input->post('public_link_id');
        
        // CHECK IF THIS IS AN SMS COMPLETION
        $existing_application_id = $this->input->post('application_id');
        $sms_token = $this->input->post('sms_token');

        // Validation
        $this->form_validation->set_rules('full_name', 'الاسم الكامل', 'required|trim');
        $this->form_validation->set_rules('email', 'البريد الإلكتروني', 'required|trim|valid_email');
        $this->form_validation->set_rules('phone', 'رقم الجوال', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            $this->session->set_flashdata('error_msg', 'الرجاء تعبئة جميع الحقول: ' . validation_errors());
            // If failed, go back to appropriate view
            if ($sms_token) {
                redirect('simple_apply/full_form/' . $sms_token);
            } else {
                redirect('apply/view/' . $public_link_id);
            }
            return;
        }

        // CV Upload Logic
        $cv_filename = 'N/A';
        if (!empty($_FILES['cv_file']['name'])) {
            $config['upload_path']   = FCPATH . 'assets/cvs/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size']      = '5120';
            $config['encrypt_name']  = TRUE;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('cv_file')) {
                $upload_data = $this->upload->data();
                $cv_filename = $upload_data['file_name'];
            }
        }

        $this->db->trans_start();
        
        $email = $this->input->post('email');

        // 1. Handle Candidate Data
        $candidate_id = $this->candidate_model->check_candidate_exists($email);
        
        $candidate_data = [
            'full_name'         => $this->input->post('full_name'),
            'email'             => $email,
            'phone'             => $this->input->post('phone'),
            'id_number'         => $this->input->post('id_number'),
            'name_en'           => $this->input->post('name_en'),
            'date_of_end_id'    => $this->input->post('date_of_end_id'),
            'nationality'       => $this->input->post('nationality'),
            'marital_status'    => $this->input->post('marital_status'),
            'date_of_birth'     => $this->input->post('date_of_birth'),
            'place_of_birth'    => $this->input->post('place_of_birth'),
            'tell_no'           => $this->input->post('tell_no'),
            'address'           => $this->input->post('address'),
        ];
        
        // Update CV only if new one uploaded
        if ($cv_filename != 'N/A') {
            $candidate_data['cv_file'] = $cv_filename;
        }

        $candidate_id = $this->candidate_model->create_or_update_candidate($candidate_data, $candidate_id);

        // 2. Handle Application Logic
        if (!empty($existing_application_id) && !empty($sms_token)) {
            // --- UPDATE EXISTING APPLICATION (SMS FLOW) ---
            $application_id = $existing_application_id;
            
            // Validate token ownership for security
            $check = $this->db->get_where('applications', ['id' => $application_id, 'sms_token' => $sms_token])->row();
            
            if ($check) {
                $this->db->where('id', $application_id);
                $this->db->update('applications', [
                    'status' => 'جديد', // Change status from 'Pending Info' to 'New'
                    'sms_token' => null, // Consume the token
                    'token_expires_at' => null
                ]);
            } else {
                $this->db->trans_rollback();
                show_error("Invalid Request");
            }

        } else {
            // --- NEW APPLICATION (PUBLIC FLOW) ---
            if ($this->candidate_model->check_duplicate_application($job_id, $candidate_id)) {
                $this->session->set_flashdata('error_msg', 'لقد قمت بالتقديم مسبقاً.');
                $this->db->trans_rollback();
                redirect('apply/view/' . $public_link_id);
                return;
            }
            
            $application_data = [
                'job_id'       => $job_id,
                'candidate_id' => $candidate_id,
                'status'       => 'جديد'
            ];
            $application_id = $this->candidate_model->create_application($application_data);
        }

        // 3. Save Education (Batch)
        $edu_qualifications = $this->input->post('qualification1');
        $edu_majors = $this->input->post('major');
        $edu_gpas = $this->input->post('gpa');
        $edu_institutions = $this->input->post('educational_institution');
        $edu_grads = $this->input->post('date_of_graduation');
        
        $edu_batch = [];
        if (!empty($edu_qualifications)) {
            // Clear old education if updating
            if(!empty($existing_application_id)) {
                $this->db->delete('candidate_education', ['candidate_id' => $candidate_id]);
            }

            for ($i = 0; $i < count($edu_qualifications); $i++) {
                if (!empty($edu_qualifications[$i])) {
                    $edu_batch[] = [
                        'candidate_id'  => $candidate_id,
                        'qualification' => $edu_qualifications[$i],
                        'major'         => $edu_majors[$i],
                        'gpa'           => $edu_gpas[$i],
                        'institution'   => $edu_institutions[$i],
                        'date_of_graduation' => $edu_grads[$i]
                    ];
                }
            }
        }
        $this->candidate_model->insert_education_batch($edu_batch);

        // 4. Save Experience (Batch)
        $exp_companies = $this->input->post('company');
        $exp_titles = $this->input->post('job_title3');
        $exp_years = $this->input->post('work_years');
        $exp_salaries = $this->input->post('salary_old');

        $exp_batch = [];
        if (!empty($exp_companies)) {
            // Clear old experience if updating
            if(!empty($existing_application_id)) {
                $this->db->delete('candidate_experience', ['candidate_id' => $candidate_id]);
            }

            for ($i = 0; $i < count($exp_companies); $i++) {
                if (!empty($exp_companies[$i])) {
                    $exp_batch[] = [
                        'candidate_id'  => $candidate_id,
                        'company_name'  => $exp_companies[$i],
                        'job_title'     => $exp_titles[$i],
                        'work_years'    => $exp_years[$i],
                        'salary_old'    => $exp_salaries[$i]
                    ];
                }
            }
        }
        $this->candidate_model->insert_experience_batch($exp_batch);

        // 5. Save Answers
        // Clear old answers if updating
        if(!empty($existing_application_id)) {
            $this->db->delete('application_answers', ['application_id' => $application_id]);
        }
        
        $answers = [];
        foreach ($this->input->post() as $key => $value) {
            if (strpos($key, 'q') === 0 || strpos($key, 'b') === 0 || $key == 'expected_salary' || $key == 'family_members') {
                $answer_val = is_array($value) ? implode(',', $value) : $value;
                $answers[] = [
                    'application_id' => $application_id,
                    'question_key'   => $key,
                    'answer_value'   => $answer_val
                ];
            }
        }
        if (!empty($answers)) {
            $this->db->insert_batch('application_answers', $answers);
        }

        $this->db->trans_complete();
        
        if ($this->db->trans_status() === FALSE) {
            $this->session->set_flashdata('error_msg', 'حدث خطأ في قاعدة البيانات.');
            if ($sms_token) redirect('simple_apply/full_form/' . $sms_token);
            else redirect('apply/view/' . $public_link_id);
        } else {
            redirect('apply/thank_you'); 
        }
    }

    public function thank_you() {
        $data['title'] = 'شكراً لك';
        $data['message'] = 'تم استلام طلبك المكتمل بنجاح.';
        $this->load->view('apply/thank_you', $data);
    }
}