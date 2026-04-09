<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CandidateAttachments extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Candidate_attachments_model', 'cam');
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session', 'upload']);
    }

    public function index()
    {
        $data = [
            'title'     => 'رفع مرفقات المرشح للوظيفة',
            'result'    => null,
            'error'     => null,
            'success'   => null,
            'q'         => '',
            'file_cols' => $this->_file_columns()
        ];

        $this->load->view('template/new_header', $data);
        $this->load->view('candidates/candidate_attachments', $data);
        $this->load->view('template/new_footer');
    }


    public function search()
{
    // يدعم POST و GET (عشان نرجع لنفس المرشح بعد الحفظ)
    $q = trim((string)($this->input->post('q', true) ?: $this->input->get('q', true)));

    $data = [
        'title'     => 'رفع مرفقات المرشح للوظيفة',
        'result'    => null,
        'error'     => null,
        'q'         => $q,
        'file_cols' => $this->_file_columns()
    ];

    if ($q === '') {
        $data['error'] = 'فضلاً أدخل الرقم الوظيفي أو اسم المرشح.';
        $this->load->view('template/new_header', $data);
        $this->load->view('candidates/candidate_attachments', $data);
        $this->load->view('template/new_footer');
        return;
    }

    $result = $this->cam->find_candidate_by_employee_or_name($q);

    if (!$result) {
        $data['error'] = 'لم يتم العثور على مرشح مطابق لبحثك.';
        $this->load->view('template/new_header', $data);
        $this->load->view('candidates/candidate_attachments', $data);
        $this->load->view('template/new_footer');
        return;
    }

    $data['result'] = $result;
    $this->load->view('template/new_header', $data);
    $this->load->view('candidates/candidate_attachments', $data);
    $this->load->view('template/new_footer');
}

public function upload()
{
    $candidate_id = (int)$this->input->post('candidate_id');
    $employee_id  = trim((string)$this->input->post('employee_id', true));

    if ($candidate_id <= 0) {
        return $this->_redirect_with_flash('danger', 'معرّف المرشح غير صحيح.', 'CandidateAttachments');
    }

    $candidate = $this->cam->get_candidate_with_offer($candidate_id);
    if (!$candidate) {
        return $this->_redirect_with_flash('danger', 'المرشح غير موجود أو لا يوجد عرض وظيفي مرتبط.', 'CandidateAttachments');
    }

    $upload_path = FCPATH . 'uploads/candidates/';
    if (!is_dir($upload_path)) {
        @mkdir($upload_path, 0755, true);
    }

    $cols = $this->_file_columns();

    $updated = [];
    $uploaded_any = false;
    $errors = [];

    foreach ($cols as $col => $label) {
        if (!isset($_FILES[$col]) || empty($_FILES[$col]['name'])) {
            continue;
        }

        $uploaded_any = true;

        $config = [
            'upload_path'   => $upload_path,
            'allowed_types' => '*',
            'max_size'      => 0,
            'encrypt_name'  => true,
            'remove_spaces' => true
        ];

        $this->upload->initialize($config, true);

        if (!$this->upload->do_upload($col)) {
            $errors[] = $label . ': ' . strip_tags($this->upload->display_errors('', ''));
            continue;
        }

        $up = $this->upload->data();
        $relative_path = 'uploads/candidates/' . $up['file_name'];

        // حذف القديم عند إعادة الرفع
        $this->_safe_delete_old_file($candidate->$col ?? null);

        $updated[$col] = $relative_path;
    }

    if (!$uploaded_any) {
        // رجّعه لنفس المرشح بدل 404
        return $this->_redirect_with_flash('warning', 'لم يتم اختيار أي ملف للرفع.', 'CandidateAttachments/search?q=' . urlencode($employee_id ?: ($candidate->full_name ?? '')));
    }

    if (!empty($updated)) {
        $this->cam->update_candidate_files($candidate_id, $updated);
    }

    if (!empty($errors) && empty($updated)) {
        return $this->_redirect_with_flash('danger', "فشل الرفع:\n- " . implode("\n- ", $errors), 'CandidateAttachments/search?q=' . urlencode($employee_id ?: ($candidate->full_name ?? '')));
    }

    $msg = 'تم رفع المرفقات بنجاح.';
    if (!empty($errors)) {
        $msg .= "\n\nملاحظات:\n- " . implode("\n- ", $errors);
    }

    // ✅ المهم: رجّعه لنفس نتيجة البحث (بدون تكرار recruitment2)
    return $this->_redirect_with_flash('success', $msg, 'CandidateAttachments/search?q=' . urlencode($employee_id ?: ($candidate->full_name ?? '')));
}

private function _file_columns()
{
    return [
        'medical_result'             => 'نتيجة الفحص الطبي + فاتورة الفحص الطبي',
        'medical_invoice'        => 'فاتورة الفحص الطبي',
        'certificate_criminal'       => 'شهادة خلو سوابق',
        'iqama_file'                 => 'الهوية / الإقامة',
        'degree_file'                => 'المؤهل العلمي',
        'bank_iban_file'             => 'شهادة الآيبان',
        'national_address_file'      => 'العنوان الوطني',
        'confidentiality_form_file'  => 'إقرار السرية',
        'gosi_subscription_file'     => 'برينت التأمينات',
        'experience_file'            => 'شهادة الخبرة',
        'clearance_cert_file'        => 'إخلاء الطرف',
        'employment_guarantee_file'  => 'الكفالة الوظيفية',
        'lawyer_license_file'        => 'رخصة المحاماة',
        'commencement_form_file'        => '  نموزج بيانات',
        'family_data_file'        => '    نموذج افصاح للبيانات العائلية',
        
    


        // ✅ الجديد
        'immediate_work_file'        => 'مباشرة عمل',
        'job_description'            => 'الوصف الوظيفي',
    ];
}

private function _redirect_with_flash($type, $msg, $route)
{
    $this->session->set_flashdata('flash_type', $type);
    $this->session->set_flashdata('flash_msg', $msg);

    // ✅ لا تستخدم site_url هنا لتجنب تكرار المسار في مشروعك
    redirect($route, 'refresh');
}




 

    
    

    private function _safe_delete_old_file($old_path)
    {
        if (!$old_path) return;

        // فقط داخل uploads/candidates/
        $old_path = str_replace(['..', '\\'], ['', '/'], $old_path);
        if (strpos($old_path, 'uploads/candidates/') !== 0) return;

        $full = FCPATH . $old_path;
        if (is_file($full)) {
            @unlink($full);
        }
    }

    
}
