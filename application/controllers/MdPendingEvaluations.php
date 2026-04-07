<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MdPendingEvaluations extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Md_pending_evaluations_model', 'mdm');
        $this->load->helper(['url', 'form', 'security', 'download']);
        $this->load->library(['session']);
        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
    }

    public function index()
    {
        $filters = [
            'q'         => trim((string)$this->input->get('q', true)),          // بحث (اسم/ايميل/جوال/هوية)
            'date_from' => trim((string)$this->input->get('date_from', true)),  // yyyy-mm-dd
            'date_to'   => trim((string)$this->input->get('date_to', true)),    // yyyy-mm-dd
            'app_status'=> trim((string)$this->input->get('app_status', true)), // فلتر اختياري applications.status
        ];

        $data = [
            'title'   => 'الطلبات المعلقة لدى العضو المنتدب (بانتظار التقييم)',
            'filters' => $filters,
            'rows'    => $this->mdm->get_pending_rows($filters),
            'summary' => $this->mdm->get_summary($filters),
            'extra_css' => 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            'extra_js'  => 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
            'after_js_view' => 'recruitment/md_pending_evaluations_scripts',
        ];

        $this->load->view('template/new_header', $data);
        $this->load->view('recruitment/md_pending_evaluations', $data);
        $this->load->view('template/new_footer', $data);
    }

    // تصدير CSV يفتح في Excel
    public function export_csv()
    {
        $filters = [
            'q'         => trim((string)$this->input->get('q', true)),
            'date_from' => trim((string)$this->input->get('date_from', true)),
            'date_to'   => trim((string)$this->input->get('date_to', true)),
            'app_status'=> trim((string)$this->input->get('app_status', true)),
        ];

        $rows = $this->mdm->get_pending_rows($filters, 50000);

        $filename = "md_pending_1001_" . date('Ymd_His') . ".csv";
        $delimiter = ",";
        $newline = "\r\n";

        $out = [];
        $out[] = [
            'Candidate ID','الاسم','Email','Phone','ID Number',
            'Application ID','Application Status',
            'Recruitment EmpNo','Recruitment Name',
            'MD Eval ID','MD Status','MD Created At','MD Notes',
            'Total Evals','Completed Count','Pending Count'
        ];

        foreach ($rows as $r) {
            $out[] = [
                $r->candidate_id, $r->full_name, $r->email, $r->phone, $r->id_number,
                $r->application_id, $r->application_status,
                $r->decision_by, $r->decision_by_name,
                $r->md_eval_id, $r->md_status, $r->md_created_at, $r->md_notes,
                $r->eval_count, $r->completed_count, $r->pending_count
            ];
        }

        $csv = '';
        foreach ($out as $line) {
            $escaped = array_map(function($v) use ($delimiter) {
                $v = (string)$v;
                $v = str_replace('"', '""', $v);
                if (strpos($v, $delimiter) !== false || strpos($v, "\n") !== false || strpos($v, "\r") !== false) {
                    $v = '"' . $v . '"';
                }
                return $v;
            }, $line);
            $csv .= implode($delimiter, $escaped) . $newline;
        }

        force_download($filename, "\xEF\xBB\xBF" . $csv);
    }

    // AJAX: بحث في المستخدمين (users) لاستخدامها في Select2
public function ajax_users()
{
    // يفضل تقييد الصلاحيات حسب نظامكم
    // if (!$this->session->userdata('logged_in')) show_error('Unauthorized', 401);

    $term = trim((string)$this->input->get('term', true));

    $this->db->select('username, name');
    $this->db->from('users');

    if ($term !== '') {
        $this->db->group_start();
            $this->db->like('username', $term, 'both');
            $this->db->or_like('name', $term, 'both');
        $this->db->group_end();
    }

    $this->db->order_by('name', 'ASC');
    $this->db->limit(30);
    $rows = $this->db->get()->result();

    $items = [];
    foreach ($rows as $u) {
        $items[] = [
            'id'   => (string)$u->username,                 // الرقم الوظيفي
            'text' => $u->name . ' (' . $u->username . ')', // الاسم (الرقم)
        ];
    }

    $this->output
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode(['results' => $items], JSON_UNESCAPED_UNICODE));
}


// AJAX: سحب التقييم من العضو المنتدب وتعيينه لموظف آخر
public function transfer_evaluation()
{
    // if (!$this->session->userdata('logged_in')) show_error('Unauthorized', 401);

    $md_eval_id = (int)$this->input->post('md_eval_id', true);
    $new_empno  = trim((string)$this->input->post('new_empno', true));

    if ($md_eval_id <= 0 || $new_empno === '') {
        return $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode(['ok' => false, 'msg' => 'بيانات غير مكتملة.'], JSON_UNESCAPED_UNICODE));
    }

    // تحقق أن المستخدم موجود
    $u = $this->db->select('username, name')->from('users')->where('username', $new_empno)->get()->row();
    if (!$u) {
        return $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode(['ok' => false, 'msg' => 'الموظف المختار غير موجود.'], JSON_UNESCAPED_UNICODE));
    }

    // تحقق أن التقييم تابع للـ MD ومعلق
    $eval = $this->db->from('candidate_evaluations')
        ->where('id', $md_eval_id)
        ->where('evaluator_user_id', '1001')
        ->where('status', 'pending')
        ->get()->row();

    if (!$eval) {
        return $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode(['ok' => false, 'msg' => 'لا يمكن سحب هذا التقييم (قد لا يكون pending أو ليس للعضو المنتدب).'], JSON_UNESCAPED_UNICODE));
    }

    // تحديث evaluator_user_id
    $this->db->where('id', $md_eval_id)->update('candidate_evaluations', [
        'evaluator_user_id' => $new_empno,
        // إذا عندكم updated_at:
        // 'updated_at' => date('Y-m-d H:i:s'),
    ]);

    return $this->output
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode([
            'ok' => true,
            'msg' => 'تم سحب التقييم بنجاح وتحويله إلى: ' . $u->name . ' (' . $u->username . ')'
        ], JSON_UNESCAPED_UNICODE));
}


}
