<?php defined('BASEPATH') OR exit('No direct script access allowed');

class OnboardingNotify extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Onboarding_model1');
        $this->load->helper(['url','security']);
    }

    public function index()
    {
        $data['title']  = 'إشعار مباشرة الموظف';
        $data['depts']  = $this->Onboarding_model1->dept_all();
        $data['active_depts'] = $this->Onboarding_model1->dept_active();
        $data['logs']   = $this->Onboarding_model1->logs_latest(30);

        $this->load->view('template/new_header', $data);
        $this->load->view('onboarding/notify_dashboard', $data);
        $this->load->view('template/new_footer');
    }

    // ✅ Ajax: بحث ذكي بالقائمة المنسدلة
    public function ajax_search_offers()
    {
        if (!$this->input->is_ajax_request()) show_404();

        $q = trim((string)$this->input->get('q', true));
        $rows = $this->Onboarding_model1->search_offers($q, 15);

        $out = [];
        foreach($rows as $r){
            $out[] = [
                'job_offer_id' => (int)$r['job_offer_id'],
                'employee_id'  => (string)($r['employee_id'] ?? ''),
                'full_name'    => (string)($r['full_name'] ?? ''),
                'area'         => (string)($r['area'] ?? ''),
                'start_date'   => (string)($r['start_date'] ?? ''),
                'label'        => trim(($r['full_name'] ?? '').' — '.$r['employee_id'].' — '.$r['area'])
            ];
        }

        $this->_json(['ok'=>true, 'items'=>$out]);
    }

    // ✅ Ajax: Preview بيانات الموظف قبل الإرسال (يعرض template 1/2 حسب اختيارك)
    public function ajax_preview_payload()
    {
        if (!$this->input->is_ajax_request()) show_404();

        $job_offer_id   = (int)$this->input->get('job_offer_id', true);
        $template_type  = (int)$this->input->get('template_type', true);

        $payload = $this->Onboarding_model1->get_onboarding_payload($job_offer_id);
        if (!$payload) return $this->_json(['ok'=>false,'msg'=>'لم يتم العثور على العرض الوظيفي']);

        // تجهيز العرض حسب النموذج
        $preview = $this->_make_template_preview($payload, $template_type);

        return $this->_json(['ok'=>true, 'payload'=>$payload, 'preview'=>$preview]);
    }

    // ✅ إرسال الإشعارات للأقسام المختارة
    public function send()
    {
        if (!$this->input->post()) redirect('OnboardingNotify');

        $job_offer_id = (int)$this->input->post('job_offer_id', true);
        $dept_ids     = (array)$this->input->post('dept_ids');
        $sent_by      = (string)($this->session->userdata('username') ?? '');

        if ($job_offer_id <= 0 || empty($dept_ids)) {
            $this->session->set_flashdata('err', 'اختر الموظف + الأقسام');
            redirect('OnboardingNotify');
        }

        $payload = $this->Onboarding_model1->get_onboarding_payload($job_offer_id);
        if (!$payload) {
            $this->session->set_flashdata('err', 'لم يتم العثور على بيانات الموظف');
            redirect('OnboardingNotify');
        }

        // جلب الأقسام المختارة
        $all = $this->Onboarding_model1->dept_all();
        $map = [];
        foreach($all as $d){ $map[(int)$d['id']] = $d; }

        $success = 0; $failed = 0;

        foreach($dept_ids as $dept_id){
            $dept_id = (int)$dept_id;
            if (!isset($map[$dept_id])) continue;

            $dept = $map[$dept_id];
            if ((int)$dept['is_active'] !== 1) continue;

            $template_type = (int)$dept['template_type'];

            // تجهيز subject + body حسب النموذج
            $mail = $this->_build_onboarding_email($dept, $payload, $template_type);

            $to_email = (string)$dept['email'];
            $ok = $this->_send_email_html($to_email, $mail['subject'], $mail['html']);

            $log = [
                'job_offer_id'   => $payload['job_offer_id'],
                'candidate_id'   => $payload['candidate_id'],
                'sent_to_email'  => $to_email,
                'dept_id'        => $dept_id,
                'template_type'  => $template_type,
                'status'         => $ok ? 'sent' : 'failed',
                'error_message'  => $ok ? null : 'Email send failed (check logs/email settings)',
                'payload_json'   => json_encode(['dept'=>$dept,'payload'=>$payload], JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES),
                'sent_by'        => $sent_by,
                'sent_at'        => date('Y-m-d H:i:s'),
            ];
            $this->Onboarding_model1->log_insert($log);

            $ok ? $success++ : $failed++;
        }

        $this->session->set_flashdata('ok', "تم الإرسال: $success — فشل: $failed");
        redirect('OnboardingNotify');
    }

    /* =======================
       Departments actions
    ======================= */

    public function dept_save()
    {
        $id = (int)$this->input->post('id', true);

        $dept_name = trim((string)$this->input->post('dept_name', true));
        $email     = trim((string)$this->input->post('email', true));
        $template  = (int)$this->input->post('template_type', true);
        $active    = (int)$this->input->post('is_active', true);

        if ($dept_name === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || !in_array($template,[1,2],true)) {
            $this->session->set_flashdata('err', 'بيانات الإدارة غير صحيحة');
            redirect('OnboardingNotify');
        }

        $data = [
            'dept_name' => $dept_name,
            'email' => $email,
            'template_type' => $template,
            'is_active' => $active ? 1 : 0,
        ];

        if ($id > 0) $this->Onboarding_model1->dept_update($id, $data);
        else $this->Onboarding_model1->dept_create($data);

        $this->session->set_flashdata('ok', 'تم حفظ الإدارة');
        redirect('OnboardingNotify');
    }

    public function dept_delete($id)
    {
        $this->Onboarding_model1->dept_delete((int)$id);
        $this->session->set_flashdata('ok', 'تم حذف الإدارة');
        redirect('OnboardingNotify');
    }

    /* =======================
       Email helpers
    ======================= */

    private function _send_email_html($to, $subject, $html)
    {
        $this->load->library('email');

        // ✅ استخدم إعداداتك الجاهزة (لا تكتب الباسوورد بالكود)
        // مثال: application/config/email.php أو دالتك الجاهزة
        // هنا سنعتمد أنك عامل config للـ email مسبقًا
        $this->email->clear(TRUE);
        $this->email->from("IT.systems@marsoom.net", "Marsoom • HR");
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($html);

        if(!$this->email->send()){
            log_message('error', 'Onboarding email failed: '.$this->email->print_debugger(['headers','subject']));
            return false;
        }
        return true;
    }

    private function _build_onboarding_email($dept, $payload, $template_type)
    {
        $dept_name = (string)($dept['dept_name'] ?? 'الإدارة');
        $emp = (string)$payload['employee_name'];

        $subject = "إشعار مباشرة موظف — {$emp}";

        // template 1: (اسم/رقم/هوية/مسمى/منطقة/تاريخ/مشروع/مسؤول/جوال)
        // template 2: (رقم/اسم/مسمى/منطقة/تاريخ/مشروع/مسؤول)
        $html = $this->_render_email_html($dept_name, $payload, $template_type);

        return ['subject'=>$subject, 'html'=>$html];
    }

     private function _render_email_html($dept_name, $p, $template_type)
{
    $e = function($v){ return html_escape((string)$v); };

    $rows = [];

    $rows[] = ['اسم الموظف', $p['employee_name']];
    $rows[] = ['الرقم الوظيفي', $p['employee_id']];
    $rows[] = ['المسمى الوظيفي', $p['job_title']];
    $rows[] = ['المنطقة', $p['area']];
    $rows[] = ['تاريخ المباشرة', $p['start_date']];
    $rows[] = ['المشروع', trim($p['project_name'].' ('.$p['project_code'].')')];
    $rows[] = ['المسؤول المباشر', trim($p['direct_manager'].' ('.$p['direct_manager_no'].')')];

    if ((int)$template_type === 1) {
        array_splice($rows, 2, 0, [['رقم الهوية', $p['id_number']]]);
        $rows[] = ['رقم الجوال', $p['phone']];
    }

    // بناء صفوف الجدول
    $tr = '';
    foreach($rows as $r){
        $label = $e($r[0]);
        $val   = $e($r[1]);

        $tr .= '
        <tr>
          <td class="cell-label" dir="rtl">'.$label.'</td>
          <td class="cell-value" dir="rtl">'.$val.'</td>
        </tr>';
    }

    $deptTitle = $e($dept_name);
    $empName   = $e($p['employee_name'] ?? '');

    return '
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <style>
    /* ✅ مهم: Outlook */
    table { border-collapse:collapse; }
    a { text-decoration:none; }
    /* ✅ خطوط واضحة */
    body, table, td, div, p, a, span, h1, h2, h3, h4 {
      font-family: "Segoe UI", Tahoma, Arial, sans-serif !important;
    }

    .wrap { background:#f3f6fb; padding:24px 0; }
    .card {
      width:680px; max-width:680px;
      background:#ffffff;
      border:1px solid #e6edf7;
      border-radius:18px;
      overflow:hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,.08);
    }
    .topbar {
      background:#001f3f;
      padding:18px 22px;
    }
    .brand {
      color:#ffffff;
      font-size:16px;
      font-weight:800;
      letter-spacing:.2px;
    }
    .subtitle {
      margin-top:6px;
      color:#cfe2ff;
      font-size:12px;
      font-weight:700;
    }

    .content { padding:18px 22px 12px; }
    .title {
      font-size:20px;
      font-weight:900;
      color:#0b1b2a;
      line-height:1.6;
      margin:0 0 6px 0;
    }
    .desc {
      font-size:13px;
      color:#4f647a;
      line-height:1.9;
      margin:0 0 14px 0;
      font-weight:600;
    }

    .badge {
      display:inline-block;
      background:#fff2df;
      border:1px solid #ffd8a8;
      color:#7a4a00;
      font-size:12px;
      font-weight:800;
      padding:6px 10px;
      border-radius:999px;
      margin-bottom:12px;
    }

    .tbl {
      width:100%;
      border:1px solid #e6edf7;
      border-radius:14px;
      overflow:hidden;
    }
    .cell-label {
      width:210px;
      background:#f7fbff;
      padding:12px 12px;
      border-bottom:1px solid #e6edf7;
      color:#35506a;
      font-weight:900;
      font-size:13px;
      white-space:nowrap;
    }
    .cell-value {
      background:#ffffff;
      padding:12px 12px;
      border-bottom:1px solid #e6edf7;
      color:#0b1b2a;
      font-weight:900;
      font-size:14px;
      line-height:1.8;
    }

    .foot {
      background:#f7fbff;
      border-top:1px solid #e6edf7;
      padding:12px 22px;
      color:#6b7c8f;
      font-size:11px;
      line-height:1.8;
      font-weight:600;
    }

    /* ✅ تحسين عرض الجوال */
    @media only screen and (max-width: 720px){
      .card { width:94% !important; }
      .cell-label { width:140px !important; font-size:12px !important; }
      .cell-value { font-size:13px !important; }
      .title { font-size:18px !important; }
    }
  </style>
</head>

<body style="margin:0;padding:0;background:#f3f6fb;">
  <div style="display:none;max-height:0;overflow:hidden;opacity:0;color:transparent;">
    إشعار مباشرة موظف — '.$empName.'
  </div>

  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" class="wrap">
    <tr>
      <td align="center">

        <table role="presentation" cellpadding="0" cellspacing="0" class="card">
          <!-- Header -->
          <tr>
            <td class="topbar">
              <div class="brand">مرسوم • الموارد البشرية</div>
              <div class="subtitle">إشعار رسمي — مباشرة موظف</div>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td class="content">
              <div class="badge">الجهة المخاطبة: '.$deptTitle.'</div>

              <h1 class="title">إشعار مباشرة — '.$deptTitle.'</h1>
              <p class="desc">نأمل منكم استكمال الإجراءات اللازمة حسب البيانات التالية:</p>

              <table role="presentation" cellpadding="0" cellspacing="0" class="tbl">
                '.$tr.'
              </table>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td class="foot">
              هذه رسالة تلقائية من نظام مرسوم. الرجاء عدم الرد على هذا البريد.
            </td>
          </tr>

        </table>

      </td>
    </tr>
  </table>
</body>
</html>';
}


    private function _make_template_preview($payload, $template_type)
    {
        // Preview بسيط للواجهة (بدون HTML ايميل)
        $p = $payload;
        $rows = [
            ['اسم الموظف', $p['employee_name']],
            ['الرقم الوظيفي', $p['employee_id']],
            ['المسمى الوظيفي', $p['job_title']],
            ['المنطقة', $p['area']],
            ['تاريخ المباشرة', $p['start_date']],
            ['المشروع', trim($p['project_name'].' ('.$p['project_code'].')')],
            ['المسؤول المباشر', trim($p['direct_manager'].' ('.$p['direct_manager_no'].')')],
        ];

        if ((int)$template_type === 1){
            array_splice($rows, 2, 0, [['رقم الهوية', $p['id_number']]]);
            $rows[] = ['رقم الجوال', $p['phone']];
        }

        return $rows;
    }

    private function _json($arr)
    {
        $this->output->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
    }
}
