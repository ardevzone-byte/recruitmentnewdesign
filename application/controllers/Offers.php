<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {
    
    public function __construct() {
    parent::__construct();
    $this->load->model('offer_model');
    $this->load->model('candidate_model');
    $this->load->model('pipeline_model');
    $this->load->library(['form_validation', 'session']);
    $this->load->helper(['url', 'form']);

    // 1. Check Login
    if (!$this->session->userdata('logged_in')) {
        redirect('auth/login');
    }

    $uid = $this->session->userdata('user_id');
    
    // 2. Static Allowed Users (Admins/HR/Recruiters)
    $allowed_users = [1526, 1291, 2230, 64, 66, 67, 1, 2515, 2774, 2784,2200,2439]; 

    // 3. Dynamic Check: Is this user assigned to sign the specific offer?
    $is_assigned_signer = false;

    // Get Offer ID from URL (e.g., offers/view/99) OR POST data
    $offer_id = $this->uri->segment(3); 
    if (empty($offer_id)) {
        $offer_id = $this->input->post('offer_id');
    }

    if (!empty($offer_id) && is_numeric($offer_id)) {
        // Query to check if current user is the Assigned Manager or HR
        $query = $this->db->query("
            SELECT c.assigned_manager_id, c.assigned_hr_id 
            FROM job_offers o 
            JOIN candidates c ON c.id = o.candidate_id 
            WHERE o.id = ?
        ", [$offer_id]);
        
        $result = $query->row_array();
        
        if ($result) {
            if ($result['assigned_manager_id'] == $uid || $result['assigned_hr_id'] == $uid) {
                $is_assigned_signer = true;
            }
        }
    }

    // 4. Final Permission Gate
    // Allow if: In static list OR Role is Manager/HR OR Is Assigned Signer
    if (!in_array($uid, $allowed_users) && 
        $this->session->userdata('role') != 'recruitment_manager' && 
        $this->session->userdata('role') != 'hr_manager' &&
        !$is_assigned_signer) { // <--- This allows the assigned user through
        
        $this->session->set_flashdata('error_msg', 'ليس لديك الصلاحية للدخول لهذه الصفحة.');
        redirect('dashboard');
    }
}
// Add this function to application/controllers/Offers.php

    // --- PREVIEW OFFER (For Admin/RM) ---
    public function preview_offer($offer_id) {
        // 1. Check Permissions (Same as view)
        $uid = $this->session->userdata('user_id');
        $allowed_users = [1526, 1291, 2230, 64, 66, 67, 1, 2515, 2774, 2784, 2200, 2439];
        
        // Basic permission check
        if (!in_array($uid, $allowed_users) && 
            $this->session->userdata('role') != 'recruitment_manager' && 
            $this->session->userdata('role') != 'hr_manager') {
            show_error('ليس لديك صلاحية المعاينة.', 403);
        }

        // 2. Fetch Data (Same logic as Portal)
        $offer = $this->offer_model->get_offer_by_id($offer_id);
        
        if (empty($offer)) {
            show_404();
        }

        // 3. Prepare Data
        // We pass the offer data exactly how the Portal controller does
        $data['offer'] = $offer;
        
        // 4. Load the Candidate View (portal/offer_letter)
        // Note: We load the view directly. Since this is a preview, 
        // form submissions inside the view might fail if no token exists yet, 
        // but the visual layout will be correct.
        $this->load->view('portal/offer_letter', $data);
    }
    public function create($application_id) {
        $data['app_details'] = $this->candidate_model->get_full_application_details($application_id);
        
        $existing = $this->offer_model->get_offer_by_application($application_id);
        if ($existing) {
            $this->session->set_flashdata('error_msg', 'يوجد عرض وظيفي مسبق لهذا المتقدم.');
            redirect('offers/view/' . $existing['id']);
        }

        $data['title'] = 'إنشاء عرض وظيفي';
        $this->load->view('template/new_header', $data);
        $this->load->view('offers/create', $data);
        $this->load->view('template/new_footer');
    }
// Add this function to: application/controllers/Offers.php

public function resubmit_offer() {
    $offer_id = $this->input->post('offer_id');
    $uid = $this->session->userdata('user_id');
    
    // 1. Permission Check (Admins & Recruitment Managers)
    $allowed_users = [1526, 2200, 2439, 64]; 
    if (!in_array($uid, $allowed_users) && $this->session->userdata('role') != 'recruitment_manager') {
        $this->session->set_flashdata('error_msg', 'ليس لديك صلاحية إعادة إنشاء العرض.');
        redirect('offers/view/' . $offer_id);
        return;
    }

    // 2. Prepare Data (Update figures & Reset Workflow)
    $data = [
        'location'                => $this->input->post('location'),
        'basic_salary'            => $this->input->post('basic_salary'),
        'housing_allowance'       => $this->input->post('housing_allowance'),
        'transport_allowance'     => $this->input->post('transport_allowance'),
        'communication_allowance' => $this->input->post('communication_allowance'),
        'total_salary'            => $this->input->post('total_salary'),
        'start_date'              => $this->input->post('start_date'),
        'id_number'               => $this->input->post('id_number'),
        'employee_id'             => $this->input->post('employee_id'),
        
        // --- RESET WORKFLOW STATUS ---
        'status'             => 'Pending HR',  // Send back to HR Queue
        'hr_status'          => 'Pending',
        'rm_status'          => 'N/A',
        
        // Clear previous rejections/approvals
        'candidate_response' => NULL,
        'rejection_reason'   => NULL,
        'hr_approver_id'     => NULL,
        'hr_approved_at'     => NULL,
        
        // Optional: Update created_at so it appears at the top of the list
        'created_at'         => date('Y-m-d H:i:s') 
    ];

    // 3. Update Database
    $this->db->where('id', $offer_id);
    $this->db->update('job_offers', $data);

    $this->session->set_flashdata('success_msg', 'تم تحديث العرض وإعادة إرساله للاعتماد (HR) بنجاح.');
    redirect('offers/view/' . $offer_id);
}
// Add to: application/controllers/Offers.php

public function update_start_date_only() {
    $offer_id = $this->input->post('offer_id');
    $new_date = $this->input->post('start_date');
    $uid = $this->session->userdata('user_id');

    // 1. Permission Check (Admins & Recruitment Managers)
    // IDs: 1526 (Admin), 2200/2439 (Global), 64 (Manager)
    $allowed_users = [1526, 2200, 2439, 64]; 
    if (!in_array($uid, $allowed_users) && $this->session->userdata('role') != 'recruitment_manager') {
        $this->session->set_flashdata('error_msg', 'ليس لديك صلاحية تعديل التاريخ.');
        redirect('offers/view/' . $offer_id);
        return;
    }

    // 2. Update Database
    if (!empty($new_date)) {
        $this->offer_model->update_offer($offer_id, ['start_date' => $new_date]);
        
        // Optional: Update candidate table if you want the date synced there too
        // $offer = $this->offer_model->get_offer_by_id($offer_id);
        // $this->db->where('id', $offer['candidate_id']);
        // $this->db->update('candidates', ['commencement_date' => $new_date]);

        $this->session->set_flashdata('success_msg', 'تم تحديث تاريخ المباشرة بنجاح.');
    } else {
        $this->session->set_flashdata('error_msg', 'الرجاء اختيار تاريخ صحيح.');
    }

    redirect('offers/view/' . $offer_id);
}
 public function submit() {
    $app_id = $this->input->post('application_id');
    $candidate_id = $this->input->post('candidate_id');

    $data = [
        'application_id'          => $app_id,
        'candidate_id'            => $candidate_id,
        'id_number'               => $this->input->post('id_number'),
        'location'                => $this->input->post('location'),
        'basic_salary'            => $this->input->post('basic_salary'),

        'housing_allowance'       => $this->input->post('housing_allowance'),
        'transport_allowance'     => $this->input->post('transport_allowance'),
        'communication_allowance' => $this->input->post('communication_allowance'),
        'total_salary'            => $this->input->post('total_salary'),
        'start_date'              => $this->input->post('start_date'),
        'created_by'              => $this->session->userdata('user_id'),
        
        // --- CHANGED LINES START ---
        'status'    => 'Pending HR', // Direct to User 2230 (Bypasses RM)
        'rm_status' => 'N/A',        // Mark RM step as Not Applicable
        'hr_status' => 'Pending'     // Set HR status to Pending immediately
        // --- CHANGED LINES END ---
    ];

    $offer_id = $this->offer_model->create_offer($data);
    
    // Optional: You might want to keep this or change it to something else
    $this->pipeline_model->update_application_status($app_id, 'عرض وظيفي');
    
    // Updated success message
    $this->session->set_flashdata('success_msg', 'تم إنشاء العرض وإرساله مباشرة لمدير الموارد البشرية (2230) للاعتماد.');
    
    redirect('candidates/view/' . $app_id);
}

    public function dashboard() {
        $username = $this->session->userdata('username'); 
        $data['pending_offers'] = [];
        $data['role_view'] = '';

      //  $rm_users = ['1291', 'recruitment_manager', 'admin', '64']; 
        $hr_users = ['2230', 'hr_manager', 'ceo', '66', '67'];           

       if (in_array($username, $hr_users)) {
            $data['pending_offers'] = $this->offer_model->get_pending_offers('hr');
            $data['role_view'] = 'مدير الموارد البشرية (HR)';
        }

        $data['title'] = 'العروض المعلقة للاعتماد';
        $this->load->view('template/new_header', $data);
        $this->load->view('offers/approval_dashboard', $data);
        $this->load->view('template/new_footer');
    }

    public function view($offer_id) {
        $data['offer'] = $this->offer_model->get_offer_by_id($offer_id);

        if (empty($data['offer'])) {
            show_error('عذراً، هذا العرض الوظيفي غير موجود أو تم حذفه.', 404, 'خطأ في البيانات');
            return;
        }

        $data['title'] = 'تفاصيل العرض الوظيفي';
        $this->load->view('template/new_header', $data);
        $this->load->view('offers/view_details', $data);
        $this->load->view('template/new_footer');
    }

// application/controllers/Offers.php

// 1. NEW: Assign who should sign
public function assign_signers() {
    $offer_id = $this->input->post('offer_id');
    $manager_id = $this->input->post('manager_id');
    $hr_id = $this->input->post('hr_id');
    
    // Security: Only 1526 or Recruitment Manager
    $uid = $this->session->userdata('user_id');
   if(($current_user != '1526' && $current_user != '2200' && $current_user != '2439') && $this->session->userdata('role') != 'recruitment_manager') {
        $this->session->set_flashdata('error_msg', 'ليس لديك صلاحية تعيين الموقعين.');
        redirect('offers/view/' . $offer_id);
        return;
    }

    $offer = $this->offer_model->get_offer_by_id($offer_id);
    
    $data = [
        'assigned_manager_id' => !empty($manager_id) ? $manager_id : NULL,
        'assigned_hr_id' => !empty($hr_id) ? $hr_id : NULL
    ];

    $this->db->where('id', $offer['candidate_id']);
    $this->db->update('candidates', $data);

    $this->session->set_flashdata('success_msg', 'تم تعيين المسؤولين عن التوقيع بنجاح.');
    redirect('offers/view/' . $offer_id);
}

// 2. UPDATED: Sign Digital (Checks if current user is the ASSIGNED user)
public function sign_commencement_digital() {
    $offer_id = $this->input->post('offer_id');
    $role = $this->input->post('role_type');
    $sig_data = $this->input->post('signature_data');
    $uid = $this->session->userdata('user_id');

    $offer = $this->offer_model->get_offer_by_id($offer_id);
    // Get candidate to check assignments
    $candidate = $this->db->get_where('candidates', ['id' => $offer['candidate_id']])->row_array();

    if (empty($sig_data)) {
        $this->session->set_flashdata('error_msg', 'بيانات التوقيع مفقودة.');
        redirect('offers/view/' . $offer_id);
        return;
    }

    // --- PERMISSION CHECK BASED ON ASSIGNMENT ---
    if ($role == 'manager') {
        // Must be the assigned manager OR 1526 (as admin override)
        if ($uid != $candidate['assigned_manager_id'] && $uid != 1526 && $uid != 2200 && $uid != 2439) {
            $this->session->set_flashdata('error_msg', 'عذراً، لم يتم تعيينك كمدير مباشر لهذا الطلب.');
            redirect('offers/view/' . $offer_id);
            return;
        }
    } elseif ($role == 'hr') {
        // Must be the assigned HR OR 1526 (as admin override)
        if ($uid != $candidate['assigned_hr_id'] && $uid != 1526 && $uid != 2200 && $uid != 2439) {
            $this->session->set_flashdata('error_msg', 'عذراً، لم يتم تعيينك كمختص موارد بشرية لهذا الطلب.');
            redirect('offers/view/' . $offer_id);
            return;
        }
    }
    // --------------------------------------------

    // Process Image
    list($type, $sig_data) = explode(';', $sig_data);
    list(, $sig_data)      = explode(',', $sig_data);
    $sig_data = base64_decode($sig_data);

    $folder = './uploads/signatures/';
    if (!is_dir($folder)) mkdir($folder, 0777, true);
    
    $filename = 'sig_' . $role . '_' . $offer['candidate_id'] . '_' . time() . '.png';
    $file_path = $folder . $filename;
    
    file_put_contents($file_path, $sig_data);
    $db_path = 'uploads/signatures/' . $filename;

    // Update DB
    $data = [];
    if ($role == 'manager') {
        $data = [
            'manager_signature_id' => $uid,
            'manager_signature_date' => date('Y-m-d H:i:s'),
            'manager_signature_image' => $db_path
        ];
    } elseif ($role == 'hr') {
        $data = [
            'hr_signature_id' => $uid,
            'hr_signature_date' => date('Y-m-d H:i:s'),
            'hr_signature_image' => $db_path
        ];
    }

    $this->db->where('id', $offer['candidate_id']);
    $this->db->update('candidates', $data);
    $this->session->set_flashdata('success_msg', 'تم حفظ التوقيع الإلكتروني بنجاح.');

    redirect('offers/view/' . $offer_id);
}
    public function process_approval($offer_id) {
        $action = $this->input->post('action'); 
        $user_id = $this->session->userdata('user_id');
        
        $current_offer = $this->offer_model->get_offer_by_id($offer_id);

        if ($current_offer['status'] == 'Pending RM') {
            if ($action == 'approve') {
                $update = [
                    'rm_status' => 'Approved', 
                    'rm_approver_id' => $user_id, 
                    'rm_approved_at' => date('Y-m-d H:i:s'),
                    'status' => 'Pending HR' 
                ];
                $msg = 'تم اعتماد العرض. تم تحويله الآن لمدير الموارد البشرية.';
            } else {
                $update = ['rm_status' => 'Rejected', 'status' => 'Rejected'];
                $msg = 'تم رفض العرض.';
            }
            $this->offer_model->update_offer($offer_id, $update);
        }
        elseif ($current_offer['status'] == 'Pending HR') {
            if ($action == 'approve') {
                $update = [
                    'hr_status' => 'Approved', 
                    'hr_approver_id' => $user_id, 
                    'hr_approved_at' => date('Y-m-d H:i:s'),
                    'status' => 'Approved' 
                ];
                $msg = 'تم اعتماد العرض نهائياً. يمكن للمختص الآن إرساله للمرشح.';
            } else {
                $update = ['hr_status' => 'Rejected', 'status' => 'Rejected'];
                $msg = 'تم رفض العرض.';
            }
            $this->offer_model->update_offer($offer_id, $update);
        }

        $this->session->set_flashdata('success_msg', $msg);
        redirect('offers/dashboard');
    }
    
    // --- SEND JOB OFFER (INITIAL) ---
   public function send_to_candidate($offer_id) {
    // 1. ROBUST QUERY: جلب البيانات عبر معرف الطلب (Source of Truth)
    // نستخدم Join لتجنب أي مشاكل في عمود candidate_id داخل جدول job_offers
    $this->db->select('o.*, c.phone, c.full_name as candidate_name, a.candidate_id as real_candidate_id');
    $this->db->from('job_offers o');
    $this->db->join('applications a', 'a.id = o.application_id', 'inner'); 
    $this->db->join('candidates c', 'c.id = a.candidate_id', 'inner'); 
    $this->db->where('o.id', $offer_id);
    $offer = $this->db->get()->row_array();

    // 2. التحقق من وجود العرض
    if (!$offer) {
        $this->session->set_flashdata('error_msg', 'CRITICAL ERROR: Could not find candidate linked to Application.');
        redirect('offers/view/' . $offer_id);
        return;
    }

    // 3. التحقق من وجود رقم الجوال
    if (empty($offer['phone'])) {
        $this->session->set_flashdata('error_msg', 'Candidate found, but Phone Number is empty.');
        redirect('offers/view/' . $offer_id);
        return;
    }

    // 4. تحديث التحقق من الحالة (Validation)
    // التعديل: نسمح بالمرور إذا كانت الحالة Approved (أول مرة) أو Sent (إعادة إرسال)
    $allowed_statuses = ['Approved', 'Sent'];
    if (!in_array($offer['status'], $allowed_statuses)) {
        $this->session->set_flashdata('error_msg', 'لا يمكن إرسال العرض إلا إذا كان معتمداً أو مرسلاً مسبقاً. الحالة الحالية: ' . $offer['status']);
        redirect('offers/view/' . $offer_id);
        return;
    }

    // 5. توليد التوكن (Token) إذا كان مفقوداً
    $token = $offer['token'];
    if (empty($token)) {
        $token = bin2hex(random_bytes(32));
        // إصلاح البيانات المكسورة في جدول job_offers بالمرة
        $this->db->where('id', $offer_id);
        $this->db->update('job_offers', [
            'token' => $token,
            'candidate_id' => $offer['real_candidate_id']
        ]);
    }

    // 6. تحديث الحالة في قاعدة البيانات
    // التعديل: نغير الحالة إلى 'Sent' فقط إذا كانت 'Approved'. إذا كانت 'Sent' أصلاً نتركها كما هي
    if ($offer['status'] == 'Approved') {
        $this->db->where('id', $offer_id);
        $this->db->update('job_offers', ['status' => 'Sent']);
    }

    // 7. تحضير الرابط والرسالة (SMS)
    $domain_url = "https://services.marsoom.net/recruitment2/"; 
    $offer_link = $domain_url . "portal/view_offer/" . $token;

    $message = "مرحباً {$offer['candidate_name']}\n";
    $message .= "يسعدنا إبلاغك بصدور عرض وظيفي لكم من شركة مرسوم.\n";
    $message .= "للاطلاع على العرض وتوقيعه، يرجى زيارة الرابط:\n";
    $message .= $offer_link . "\n";
    $message .= "مع تمنياتنا بالتوفيق";

    // 8. إرسال الرسالة عبر API
    $result = $this->_send_sms_api($offer['phone'], $message, $offer['application_id'], 'job_offer_link');

    if ($result === true) {
        $success_text = ($offer['status'] == 'Sent') ? 'تم إعادة إرسال العرض بنجاح عبر SMS.' : 'تم إرسال العرض بنجاح عبر SMS.';
        $this->session->set_flashdata('success_msg', $success_text);
    } else {
        $error_msg = is_string($result) ? $result : 'Unknown Error';
        $this->session->set_flashdata('warning_msg', 'تم تحديث الحالة، ولكن فشل إرسال SMS: ' . $error_msg);
    }
    
    redirect('offers/view/' . $offer_id);
}
public function check_offer_status($offer_id) {
    echo "<h3>Checking Offer Status for ID: $offer_id</h3>";
    echo "<pre>";
    
    // Get current offer data
    $offer = $this->db->query("SELECT * FROM job_offers WHERE id = ?", [$offer_id])->row_array();
    
    echo "Current offer data:\n";
    print_r($offer);
    
    echo "\n\nCandidate Response: " . ($offer['candidate_response'] ?? 'NULL') . "\n";
    echo "Status: " . ($offer['status'] ?? 'NULL') . "\n";
    
    // Check if portal has a token and if it's correct
    if (!empty($offer['token'])) {
        echo "\nToken exists: " . $offer['token'];
        echo "\nPortal URL: https://services.marsoom.net/recruitment2/portal/view_offer/" . $offer['token'];
    } else {
        echo "\n❌ NO TOKEN - Candidate cannot access the offer!";
    }
    
    echo "</pre>";
}
// application/controllers/Offers.php

public function sign_commencement($offer_id, $role) {
    $uid = $this->session->userdata('user_id');
    $offer = $this->offer_model->get_offer_by_id($offer_id);
    
    if (!$offer) show_404();

    // 1. Direct Manager Signature (Allowed: 1526, 1291, or specific Managers)
    if ($role == 'manager') {
        if (!in_array($uid, [1526, 1291, 64,2200,2439]) && $this->session->userdata('role') != 'recruitment_manager') {
            $this->session->set_flashdata('error_msg', 'ليس لديك صلاحية التوقيع كمدير مباشر.');
            redirect('offers/view/' . $offer_id);
            return;
        }
        
        $data = [
            'manager_signature_id' => $uid,
            'manager_signature_date' => date('Y-m-d H:i:s')
        ];
    }
    // 2. HR Specialist Signature (Allowed: HR Team)
    elseif ($role == 'hr') {
        $hr_users = [2230, 2515, 2774, 2784, 66, 67,2200,2439];
        if (!in_array($uid, $hr_users)) {
            $this->session->set_flashdata('error_msg', 'ليس لديك صلاحية التوقيع كمختص موارد بشرية.');
            redirect('offers/view/' . $offer_id);
            return;
        }

        $data = [
            'hr_signature_id' => $uid,
            'hr_signature_date' => date('Y-m-d H:i:s')
        ];
    } else {
        show_404();
    }

    $this->db->where('id', $offer['candidate_id']);
    $this->db->update('candidates', $data);

    $this->session->set_flashdata('success_msg', 'تم التوقيع الإلكتروني بنجاح.');
    redirect('offers/view/' . $offer_id);
}
    // --- SEND DOCUMENTS REQUEST (STEP 2) ---
 public function send_docs_request($offer_id) {
    // 1. Check Permissions
    $uid = $this->session->userdata('user_id');
    
    if($uid != 1526 && $uid != 64 && $uid != 2200 && $uid != 2439 && $uid != 3141) { 
        $this->session->set_flashdata('error_msg', 'ليس لديك صلاحية.');
        redirect('offers/view/' . $offer_id);
        return;
    }

    // 2. Get Offer Data
    $query = $this->db->query("
        SELECT o.*, c.phone, c.full_name, c.id as candidate_id, a.id as application_id
        FROM job_offers o
        JOIN candidates c ON c.id = o.candidate_id
        JOIN applications a ON a.id = o.application_id
        WHERE o.id = ?
    ", [$offer_id]);
    
    $offer = $query->row_array();

    if (empty($offer)) {
        $this->session->set_flashdata('error_msg', 'لم يتم العثور على العرض.');
        redirect('offers/dashboard');
        return;
    }

    // 3. Validate Status - Check if offer is accepted
    $candidate_accepted = ($offer['candidate_response'] == 'Accepted');
    $status_accepted = ($offer['status'] == 'Accepted' || $offer['status'] == 'Offer Accepted');
    
    if (!$candidate_accepted && !$status_accepted) {
        $this->session->set_flashdata('error_msg', 'يجب أن يكون العرض مقبولاً أولاً.');
        redirect('offers/view/' . $offer_id);
        return;
    }

    // 4. Generate Docs Token
    $docs_token = bin2hex(random_bytes(16));
    
    $this->db->where('id', $offer['application_id']);
    $this->db->update('applications', ['docs_token' => $docs_token]);

    // 5. Create the link
    $link = "https://services.marsoom.net/recruitment2/portal/upload_docs/" . $docs_token;
    
    // 6. Prepare Arabic SMS message
    $message = "عزيزي/عزيزتي {$offer['full_name']}\n";
    $message .= "نرجو منكم رفع مسوغات التعيين (الهوية، الشهادة، الآيبان) عبر الرابط التالي:\n";
    $message .= $link . "\n";
    $message .= "شركة مرسوم";

    // 7. Send SMS
    $result = $this->_send_sms_api($offer['phone'], $message, $offer['application_id'], 'docs_request');

    if ($result === true) {
        $this->session->set_flashdata('success_msg', 'تم إرسال رابط رفع المستندات بنجاح via SMS.');
    } else {
        $error_msg = 'فشل إرسال الرسالة. ';
        if (is_string($result)) {
            $error_msg .= 'الخطأ: ' . $result;
        } else {
            $error_msg .= 'الرجاء التأكد من رقم الجوال: ' . $offer['phone'];
        }
        $this->session->set_flashdata('error_msg', $error_msg);
    }
    
    redirect('offers/view/' . $offer_id);
}
// application/controllers/Offers.php

// 1. User 1526 sends docs to HR
public function send_docs_to_hr_process($offer_id) {
    $uid = $this->session->userdata('user_id');
    
    // Permission Check
    if (($uid != 1526 && $uid != 2200 && $uid != 2439) && $this->session->userdata('role') != 'recruitment_manager') {
        $this->session->flashdata('error_msg', 'ليس لديك صلاحية.');
        redirect('offers/view/' . $offer_id);
        return;
    }

    $data = [
        'docs_status' => 'Under Review' // Moves to HR Dashboard
    ];

    $this->offer_model->update_offer($offer_id, $data);
    $this->session->set_flashdata('success_msg', 'تم تحويل الملفات إلى الموارد البشرية للمطابقة والاعتماد.');
    redirect('offers/view/' . $offer_id);
}

// 2. HR Verifies and Ends Workflow
public function verify_docs_process($offer_id) {
    $uid = $this->session->userdata('user_id');
    
    // 1. Define the Required Approvers List
    // These are the IDs that MUST verify before the workflow ends
    $required_approvers = [2230, 2515, 2774, 2784]; 

    // Permission Check
    if (!in_array($uid, $required_approvers) && $uid != 66 && $uid != 67) {
        $this->session->set_flashdata('error_msg', 'ليس لديك صلاحية اعتماد الوثائق.');
        redirect('offers/view/' . $offer_id);
        return;
    }

    // 2. Record this user's approval (Ignore duplicate if exists)
    $this->db->query("INSERT IGNORE INTO offer_doc_approvals (offer_id, user_id, created_at) VALUES (?, ?, NOW())", [$offer_id, $uid]);

    // 3. Check Progress
    $this->db->where('offer_id', $offer_id);
    $this->db->where_in('user_id', $required_approvers);
    $count = $this->db->count_all_results('offer_doc_approvals');

    $total_needed = count($required_approvers);

    if ($count >= $total_needed) {
        // --- ALL APPROVED: Close the Ticket ---
        $data = [
            'docs_status' => 'Verified',
            'status' => 'Completed',
            'docs_verified_at' => date('Y-m-d H:i:s') // Last verification time
        ];
        $this->offer_model->update_offer($offer_id, $data);
        
        // Update Application Status
        $offer = $this->offer_model->get_offer_by_id($offer_id);
        $this->pipeline_model->update_application_status($offer['application_id'], 'تم التوظيف');

        $this->session->set_flashdata('success_msg', 'تم اكتمال جميع الاعتمادات وإغلاق الملف بنجاح.');
    } else {
        // --- PARTIAL APPROVAL ---
        $this->session->set_flashdata('success_msg', "تم تسجيل اعتمادك بنجاح. ($count من $total_needed) معتمدين.");
    }

    redirect('offers/view/' . $offer_id);
}
// application/controllers/Offers.php

public function update_employee_id() {
    $offer_id = $this->input->post('offer_id');
    $employee_id = $this->input->post('employee_id');
    $current_user = $this->session->userdata('user_id');

    // Security Check: Only allow 1526 (and Recruitment Manager if needed)
    if (($current_user != '1526' && $current_user != '2200' && $current_user != '2439') && $this->session->userdata('role') != 'recruitment_manager') {
        $this->session->set_flashdata('error_msg', 'ليس لديك صلاحية لتعديل الرقم الوظيفي.');
        redirect('offers/view/' . $offer_id);
        return;
    }

    $this->offer_model->update_offer($offer_id, ['employee_id' => $employee_id]);

    $this->session->set_flashdata('success_msg', 'تم تحديث الرقم الوظيفي بنجاح.');
    redirect('offers/view/' . $offer_id);
}
    
    // --- PRIVATE SMS HELPER ---
    private function _send_sms_api($phone, $message, $app_id, $type) {
        
        log_message('debug', '_send_sms_api called with params:');
        log_message('debug', 'Phone: ' . $phone);
        log_message('debug', 'Message Type: ' . $type);
        log_message('debug', 'App ID: ' . $app_id);
        
        // 1. Clean Phone Number
        $original_phone = $phone;
        log_message('debug', 'Original phone: ' . $original_phone);
        
        $phone = preg_replace('/[^0-9]/', '', $phone);
        log_message('debug', 'After regex clean: ' . $phone);
        
        // Handle 00966 start
        if (substr($phone, 0, 5) == '00966') {
            $phone = substr($phone, 2); 
            log_message('debug', 'After 00966 fix: ' . $phone);
        }
        // Handle 05 start
        if (substr($phone, 0, 2) == '05') {
            $phone = '966' . substr($phone, 1);
            log_message('debug', 'After 05 fix: ' . $phone);
        }
        // Handle 5xxxxxxxxx (missing 966)
        if (strlen($phone) == 9 && substr($phone, 0, 1) == '5') {
            $phone = '966' . $phone;
            log_message('debug', 'After 9-digit fix: ' . $phone);
        }

        if (empty($phone)) {
            log_message('error', 'Empty phone number after cleaning. Original: ' . $original_phone);
            return "رقم الجوال فارغ بعد التنظيف";
        }

        log_message('debug', 'Final phone number: ' . $phone);

        // 2. Prepare API Call
        $apiUrl = 'https://api.oursms.com/api-a/msgs';
        $username = 'marsoom';
        $token = 'zcTlmZcAI8JLK2Qsb2bs';
        $src = 'MARSOOM';

        $queryParams = http_build_query([
            'username' => $username,
            'token'    => $token,
            'src'      => $src,
            'dests'    => $phone,
            'body'     => $message
        ]);

        $full_url = $apiUrl . '?' . $queryParams;
        log_message('debug', 'SMS API URL: ' . $full_url);

        // 3. Make the API call
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $full_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36'
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curl_error = curl_error($ch);
        curl_close($ch);

        log_message('debug', 'HTTP Response Code: ' . $http_code);
        log_message('debug', 'cURL Error: ' . $curl_error);
        log_message('debug', 'API Response: ' . $response);

        $status = ($response !== false && $http_code == 200) ? 'sent' : 'failed';
        log_message('debug', 'SMS Status: ' . $status);
        
        // 4. Try to log to database
        try {
            $user_id = $this->session->userdata('user_id');
            if (empty($user_id)) {
                $user_id = 0;
            }
            
            // Check if application_id exists to avoid foreign key error
            if (!empty($app_id)) {
                $this->db->select('id');
                $this->db->from('applications');
                $this->db->where('id', $app_id);
                $app_exists = $this->db->get()->row();
                
                if (!$app_exists) {
                    log_message('warning', 'Application ID ' . $app_id . ' does not exist. Setting to NULL.');
                    $app_id = NULL;
                }
            }
            
            // Prepare SMS log data - FIXED: Use actual table structure
            $sms_log = [
                'application_id' => $app_id, // Can be NULL if not exists
                'phone' => substr($phone, 0, 20),
                'token' => NULL,
                'sent_at' => date('Y-m-d H:i:s'),
                'sent_by_user_id' => (int)$user_id,
                'status' => $status,
                'original_phone' => substr($original_phone, 0, 20),
                'api_response' => !empty($response) ? substr($response, 0, 500) : NULL,
                'http_code' => !empty($http_code) ? (int)$http_code : NULL,
                'error_message' => NULL
            ];
            
            // IMPORTANT: Check if message_type column exists
            $columns = $this->db->list_fields('application_sms_log');
            if (in_array('message_type', $columns)) {
                $sms_log['message_type'] = $type;
            } else {
                // Store type in api_response if column doesn't exist
                if (!empty($sms_log['api_response'])) {
                    $sms_log['api_response'] = "[Type: $type] " . $sms_log['api_response'];
                } else {
                    $sms_log['api_response'] = "[Type: $type]";
                }
            }
            
            log_message('debug', 'Attempting to insert SMS log: ' . print_r($sms_log, true));
            
            $insert_result = $this->db->insert('application_sms_log', $sms_log);
            
            if ($insert_result) {
                log_message('debug', 'SMS log inserted successfully. ID: ' . $this->db->insert_id());
            } else {
                $db_error = $this->db->error();
                log_message('error', 'Failed to insert SMS log: ' . print_r($db_error, true));
                
                // Try without application_id if foreign key is the issue
                if ($db_error['code'] == 1452) { // Foreign key constraint
                    log_message('debug', 'Foreign key constraint failed. Trying with NULL application_id...');
                    
                    $sms_log['application_id'] = NULL;
                    $insert_result2 = $this->db->insert('application_sms_log', $sms_log);
                    
                    if ($insert_result2) {
                        log_message('debug', 'Insert successful with NULL application_id');
                    }
                }
            }
            
        } catch (Exception $e) {
            log_message('error', 'Exception while inserting SMS log: ' . $e->getMessage());
            
            // Log to file as fallback
            $file_log = date('Y-m-d H:i:s') . " | App: $app_id | Phone: $phone | Type: $type | Status: $status | User: $user_id\n";
            @file_put_contents(APPPATH . 'logs/sms_fallback.log', $file_log, FILE_APPEND);
        }
        
        if ($status == 'sent') {
            return true;
        } else {
            return "HTTP Code: $http_code | cURL Error: $curl_error | Response: " . substr($response, 0, 100);
        }
    }
    
   
}
