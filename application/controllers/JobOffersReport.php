<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JobOffersReport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Job_offers_model');
    }

    public function index()
    {
        $filters = [
            'q'      => trim((string) $this->input->get('q', true)),
            'area'   => trim((string) $this->input->get('area', true)),
            'status' => trim((string) $this->input->get('status', true)),
        ];

        $data['title']        = 'تقرير العروض الوظيفية';
        $data['filters']      = $filters;
        $data['offers']       = $this->Job_offers_model->get_list($filters);
        $data['stats']        = $this->Job_offers_model->get_stats($filters);
        $data['embed_shell']   = true;
        $data['extra_css']     = 'https://unpkg.com/aos@2.3.1/dist/aos.css';

        $this->load->view('template/new_header', $data);
        $this->load->view('job_offers/report', $data);
        $this->load->view('template/new_footer');
    }

    // ✅ Live Search يرجع Rows فقط
    public function ajax_list()
    {
        if (!$this->input->is_ajax_request()) show_404();

        $filters = [
            'q'      => trim((string) $this->input->get('q', true)),
            'area'   => trim((string) $this->input->get('area', true)),
            'status' => trim((string) $this->input->get('status', true)),
        ];

        $data['offers'] = $this->Job_offers_model->get_list($filters);
        $this->load->view('job_offers/_rows', $data);
    }

    // ✅ تحديث حقل واحد + منطق البحث التلقائي (المشرف/المشروع)
    public function update_field()
    {
        if (!$this->input->is_ajax_request()) show_404();

        $id    = (int)$this->input->post('id', true);
        $field = trim((string)$this->input->post('field', true));
        $value = trim((string)$this->input->post('value', true));

        $allowed = [
            'employee_id','id_number','basic_salary','housing_allowance','transport_allowance','communication_allowance',
            'total_salary','start_date','status','docs_status','hr_status','candidate_response','area',
            'supervisor_empno','supervisor_name','project_code','project_name'
        ];

        if ($id <= 0 || !in_array($field, $allowed, true)) {
            return $this->_json(['ok'=>false,'msg'=>'طلب غير صالح']);
        }

        // ✅ Validations الأساسية
        if ($field === 'employee_id' && $value !== '' && !preg_match('/^\d{4}$/', $value)) {
            return $this->_json(['ok'=>false,'msg'=>'الرقم الوظيفي يجب أن يكون 4 أرقام']);
        }
        if ($field === 'id_number' && $value !== '' && !preg_match('/^\d{10}$/', $value)) {
            return $this->_json(['ok'=>false,'msg'=>'رقم الهوية يجب أن يكون 10 أرقام']);
        }

        // ✅ Unique employee_id (في job_offers)
        if ($field === 'employee_id' && $value !== '') {
            $exists = $this->db->where('employee_id', $value)->where('id !=', $id)->get('job_offers')->row_array();
            if ($exists) return $this->_json(['ok'=>false,'msg'=>'الرقم الوظيفي مستخدم في عرض آخر']);
        }

        // ✅ هنا السحر: لو عدّلت رقم المشرف أو كود المشروع نجيب الاسم تلقائيًا
        $update = [$field => ($value === '' ? null : $value)];
        $extra  = []; // قيم إضافية نرجعها للواجهة

        if ($field === 'supervisor_empno') {
            if ($value !== '' && !preg_match('/^\d{4}$/', $value)) {
                return $this->_json(['ok'=>false,'msg'=>'رقم المشرف يجب أن يكون 4 أرقام']);
            }

            $name = ($value === '') ? null : $this->Job_offers_model->lookup_supervisor_name($value);
            if ($value !== '' && !$name) {
                return $this->_json(['ok'=>false,'msg'=>'لم يتم العثور على المشرف في قاعدة orders.users']);
            }

            $update['supervisor_name'] = $name;
            $extra['supervisor_name'] = $name ?: '';
        }

        if ($field === 'project_code') {
            $pname = ($value === '') ? null : $this->Job_offers_model->lookup_project_name($value);
            if ($value !== '' && !$pname) {
                return $this->_json(['ok'=>false,'msg'=>'لم يتم العثور على المشروع في قاعدة orders.projects_list']);
            }

            $update['project_name'] = $pname;
            $extra['project_name'] = $pname ?: '';
        }

        $ok = $this->Job_offers_model->update_offer_fields($id, $update);

        if (!$ok) {
            return $this->_json(['ok'=>false,'msg'=>'لم يتم التحديث (تحقق من قاعدة البيانات)']);
        }

        return $this->_json([
            'ok'   => true,
            'msg'  => 'تم التحديث',
            'extra'=> $extra
        ]);
    }

    private function _json($arr)
    {
        $this->output->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));
    }
}
