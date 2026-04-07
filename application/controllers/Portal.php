<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('offer_model');
        $this->load->helper(['url', 'form', 'file']);
        $this->load->library(['upload', 'session']);
    }

    // Candidate View
    public function view_offer($token = null) {
        if (!$token) show_404();

        $offer = $this->offer_model->get_offer_by_token($token);

        if (!$offer) {
            show_error('رابط العرض غير صالح أو منتهي الصلاحية.', 404);
            return;
        }

        $status = $offer['candidate_response'] ?? 'Pending';
        if ($status != 'Pending') {
            $this->load->view('portal/response_received', ['response' => $status]);
            return;
        }

        $data['offer'] = $offer;
        $this->load->view('portal/offer_letter', $data);
    }

    // Submit Response
    public function submit_response($token) {
        $offer = $this->offer_model->get_offer_by_token($token);
        if (!$offer) show_404();

        $action = $this->input->post('action'); 

        if ($action == 'reject') {
            $data = [
                'candidate_response' => 'Rejected',
                'rejection_reason' => $this->input->post('reason'),
                'response_date' => date('Y-m-d H:i:s'),
                'status' => 'Offer Rejected'
            ];
            $this->offer_model->update_offer($offer['id'], $data);
            $this->session->set_flashdata('msg', 'شكراً لك. تم تسجيل رفض العرض.');
        
        } elseif ($action == 'accept_upload') {
            $config['upload_path']   = './uploads/signed_offers/';
            $config['allowed_types'] = 'pdf|jpg|png|jpeg';
            $config['file_name']     = 'signed_' . $offer['id'] . '_' . time();

            if (!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, true);

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('signed_file')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('portal/view_offer/' . $token);
                return;
            } else {
                $upload_data = $this->upload->data();
                $this->_mark_accepted($offer['id'], 'uploads/signed_offers/' . $upload_data['file_name']);
            }

        } elseif ($action == 'accept_digital') {
            $sig_data = $this->input->post('signature_data');
            
            if (empty($sig_data)) {
                $this->session->set_flashdata('error', 'بيانات التوقيع مفقودة.');
                redirect('portal/view_offer/' . $token);
                return;
            }

            list($type, $sig_data) = explode(';', $sig_data);
            list(, $sig_data)      = explode(',', $sig_data);
            $sig_data = base64_decode($sig_data);

            $folder = './uploads/signed_offers/';
            if (!is_dir($folder)) mkdir($folder, 0777, true);
            
            $filename = 'digital_sig_' . $offer['id'] . '_' . time() . '.png';
            $file_path = $folder . $filename;

            if (file_put_contents($file_path, $sig_data)) {
                $db_path = 'digital:' . 'uploads/signed_offers/' . $filename;
                $this->_mark_accepted($offer['id'], $db_path);
            } else {
                $this->session->set_flashdata('error', 'حدث خطأ أثناء حفظ التوقيع.');
                redirect('portal/view_offer/' . $token);
                return;
            }
        }
        
        redirect('portal/view_offer/' . $token);
    }

    // --- VIEW SIGNED DOC (FIXED) ---
    public function show_signed_document($token) {
        $offer = $this->offer_model->get_offer_by_token($token);
        
        if (!$offer || $offer['candidate_response'] != 'Accepted') {
            show_error('الوثيقة غير متوفرة.', 404);
            return;
        }

        $path = $offer['signed_document'];

        // 1. Digital Signature: Embed as Base64 to bypass server block
        if (strpos($path, 'digital:') === 0) {
            $real_path = substr($path, 8); 
            $full_path = FCPATH . $real_path;

            if(file_exists($full_path)) {
                // Convert image to Base64 code
                $img_data = file_get_contents($full_path);
                $base64 = 'data:image/png;base64,' . base64_encode($img_data);
                
                $data['offer'] = $offer;
                $data['signature_base64'] = $base64; // Pass the code, not the URL
                $this->load->view('portal/signed_offer_view', $data);
            } else {
                show_error('ملف التوقيع مفقود.', 404);
            }
        } 
        
        // 2. Uploaded File (PDF/Image): Stream via PHP
        else {
            $full_path = FCPATH . $path; 

            if (file_exists($full_path)) {
                $mime = get_mime_by_extension($full_path);
                // Fallback mime type if helper fails
                if(!$mime) $mime = 'application/octet-stream';

                header('Content-Type: ' . $mime);
                header('Content-Disposition: inline; filename="signed_offer_'. $offer['id'] . '.' . pathinfo($full_path, PATHINFO_EXTENSION) . '"');
                header('Content-Length: ' . filesize($full_path));
                
                ob_clean();
                flush();
                readfile($full_path);
                exit;
            } else {
                show_error('عذراً، الملف المطلوب غير موجود على الخادم.', 404);
            }
        }
    }
// --- SHOW UPLOAD FORM ---
    // Inside application/controllers/Portal.php

public function upload_docs($token = null) {
    if (!$token) show_404();

    $app = $this->db->get_where('applications', ['docs_token' => $token])->row_array();
    if (!$app) show_404();

    $data['app'] = $app;
    $data['candidate'] = $this->db->get_where('candidates', ['id' => $app['candidate_id']])->row_array();
    
    // UPDATE THIS ARRAY
    $data['templates'] = [
        'commencement' => base_url('uploads/candocs/نموذج بيانات موظف.pdf'),
        'job_desc'     => base_url('uploads/candocs/نموذج المباشرة.docx'), 
        'confidentiality' => base_url('uploads/candocs/اقرار سرية المعلومات.pdf'),
        'guarantee'    => base_url('uploads/candocs/كفالة وظيفية - مرسوم.pdf'),
        
        // --- NEW FILES ADDED HERE ---
        'family_data'  => base_url('uploads/candocs/نموذج افصاح للبيانات العائلية للموظفين المستجدين - مكتب صالح الجربوع .pdf'), // Make sure this file exists
        'immediate_work' => base_url('uploads/candocs/مباشرة عمل بعد التحديث.pdf'),   // Make sure this file exists
    ];

    $this->load->view('portal/upload_documents', $data);
}
    // --- HANDLE FILE SUBMISSION ---
   public function submit_docs($token) {
    $app = $this->db->get_where('applications', ['docs_token' => $token])->row_array();
    if (!$app) show_404();

    $candidate_id = $app['candidate_id'];
    
    // 1. Handle Digital Form Data
    $form_data = [
        'commencement_date' => $this->input->post('commencement_date'),
        'work_location' => $this->input->post('work_location'),
        'project_name' => $this->input->post('project_name'),
        'employee_signature_date' => date('Y-m-d H:i:s') // Acts as timestamp for digital sign
    ];
    // Save text data immediately
    $this->db->where('id', $candidate_id);
    $this->db->update('candidates', $form_data);

    // 2. Handle File Uploads
    $config['upload_path']   = './uploads/candidates/';
    $config['allowed_types'] = 'pdf|jpg|png|jpeg|docx|doc';
    $config['max_size']      = 10240; 
    $config['encrypt_name']  = TRUE;

    if (!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, true);
    $this->upload->initialize($config);

    $update_files = [];
    $file_fields = [
        'iqama_file', 'degree_file', 'bank_iban_file', 'national_address_file',
        'commencement_form_file', 'confidentiality_form_file', 
        'gosi_subscription_file', 'experience_file', 'clearance_cert_file',
        'medical_invoice_file', 'employment_guarantee_file', 'lawyer_license_file','medical_invoice','medical_result',
        
        // --- NEW FIELDS ---
        'family_data_file', 
        'immediate_work_file'
    ];

    $uploaded_count = 0;

    foreach ($file_fields as $field) {
        if (!empty($_FILES[$field]['name'])) {
            $this->upload->initialize($config);
            if ($this->upload->do_upload($field)) {
                $update_files[$field] = 'uploads/candidates/' . $this->upload->data('file_name');
                $uploaded_count++;
            }
        }
    }

    if (!empty($update_files)) {
        $this->db->where('id', $candidate_id);
        $this->db->update('candidates', $update_files);
    }

    $this->session->set_flashdata('success', "تم حفظ نموذج المباشرة ورفع $uploaded_count ملفات بنجاح.");
    redirect('portal/upload_docs/' . $token);
}
    private function _mark_accepted($offer_id, $file_path) {
        $data = [
            'candidate_response' => 'Accepted',
            'signed_document' => $file_path,
            'response_date' => date('Y-m-d H:i:s'),
            'status' => 'Accepted'
        ];
        $this->offer_model->update_offer($offer_id, $data);
        $this->session->set_flashdata('msg', 'ألف مبروك! تم توقيع العرض بنجاح.');
    }
}