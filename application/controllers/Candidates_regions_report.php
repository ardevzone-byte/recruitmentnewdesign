<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Candidates_regions_report extends CI_Controller
{
    private $allowed_locations = ['الرياض', 'ابها', 'الخبر', 'حائل'];

    private $allowed_companies = [
    'مكتب الدكتور صالح الجربوع للمحاماة',
    'شركة مرسوم لتحصيل الديون'
    ];




    public function __construct()
    {
        parent::__construct();
        $this->load->model('Candidates_regions_report_model', 'crm');
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session']);

        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
    }

    public function index()
    {
        $filters = [
            'q'         => trim((string)$this->input->get('q', true)),
            'date_from' => trim((string)$this->input->get('date_from', true)), // yyyy-mm-dd
            'date_to'   => trim((string)$this->input->get('date_to', true)),   // yyyy-mm-dd
            'location'  => trim((string)$this->input->get('location', true)),
        ];

        // تنظيف قيمة المنطقة لو مو من القائمة
        if ($filters['location'] !== '' && !in_array($filters['location'], $this->allowed_locations, true)) {
            $filters['location'] = '';
        }

        $data = [];
        $data['title'] = 'تقرير المرشحين حسب المناطق';
        $data['filters'] = $filters;
        $data['allowed_locations'] = $this->allowed_locations;
        $data['stats_by_location'] = [];
        $data['stats_by_nationality'] = [];
        $data['stats_by_company'] = [];
        $data['allowed_companies'] = $this->allowed_companies;
        $data['rows'] = [];
        $data['total'] = 0;
        $data['db_error'] = null;

        try {
            $data['stats_by_location'] = $this->crm->stats_by_location($filters);
            $data['stats_by_nationality'] = $this->crm->stats_top_nationalities($filters, 8);
            $data['stats_by_company'] = $this->crm->stats_top_companies($filters, 8);
            $data['rows'] = $this->crm->get_candidates($filters, 500);
            $data['total'] = $this->crm->count_candidates($filters);
        } catch (Throwable $e) {
            $data['db_error'] = 'تعذر تحميل التقرير. تحقق من الاتصال بقاعدة البيانات أو من وجود الجداول المطلوبة.';
        }

        $this->load->view('template/new_header', $data);
        $this->load->view('candidates/regions_report', $data);
        $this->load->view('template/new_footer', $data);
    }

    public function update($id)
    {
        // AJAX فقط
        if (strtoupper((string)$this->input->method()) !== 'POST') {
            show_error('Method Not Allowed', 405);
        }

        $id = (int)$id;
        if ($id <= 0) {
            return $this->_json(['ok' => false, 'msg' => 'ID غير صحيح']);
        }

        $payload = [
            'full_name'      => trim((string)$this->input->post('full_name', true)),
            'email'          => trim((string)$this->input->post('email', true)),
            'phone'          => trim((string)$this->input->post('phone', true)),
            'cv_file'        => trim((string)$this->input->post('cv_file', true)),
            'nationality'    => trim((string)$this->input->post('nationality', true)),
            'marital_status' => trim((string)$this->input->post('marital_status', true)),
            'work_location'  => trim((string)$this->input->post('work_location', true)),
            'company'        => trim((string)$this->input->post('company', true)),
        ];

        // ✅ تحقق منطقة (لازم من القائمة)
        if (!in_array($payload['work_location'], $this->allowed_locations, true)) {
            return $this->_json(['ok' => false, 'msg' => 'المنطقة غير صحيحة. اختر من القائمة فقط']);
        }

        // (اختياري) تحقق بسيط للبريد
        if ($payload['email'] !== '' && !filter_var($payload['email'], FILTER_VALIDATE_EMAIL)) {
            return $this->_json(['ok' => false, 'msg' => 'البريد الإلكتروني غير صحيح']);
        }

        // (اختياري) حماية اسم الملف: امنع المسارات
        if ($payload['cv_file'] !== '' && (strpos($payload['cv_file'], '..') !== false || strpos($payload['cv_file'], '/') !== false || strpos($payload['cv_file'], '\\') !== false)) {
            return $this->_json(['ok' => false, 'msg' => 'اسم ملف السيرة الذاتية غير صحيح']);
        }

        $updated = $this->crm->update_candidate($id, $payload);
        if (!$updated) {
            return $this->_json(['ok' => false, 'msg' => 'لم يتم التحديث (قد يكون السجل غير موجود)']);
        }

        $payload['company'] = trim((string)$this->input->post('company', true));

        if (!in_array($payload['company'], $this->allowed_companies, true)) {
            return $this->_json(['ok' => false, 'msg' => 'الشركة غير صحيحة. اختر من القائمة فقط']);
        }


        return $this->_json(['ok' => true, 'msg' => 'تم تحديث بيانات المرشح بنجاح']);
    }

    private function _json($arr)
    {
        $this->output
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES))
            ->_display();
        exit;
    }
}
