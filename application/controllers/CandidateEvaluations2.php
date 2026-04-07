<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CandidateEvaluations2 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Candidate_evaluations2_model', 'cem2');
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session', 'form_validation']);

        if (!$this->session->userdata('logged_in')) {
            redirect('users/login');
        }
    }

    private function _render(array $data)
    {
        $data['extra_js'] = ['newassets/js/candidate-evaluations2.js'];
        $this->load->view('template/new_header', $data);
        $this->load->view('candidates/candidate_evaluations2', $data);
        $this->load->view('template/new_footer', $data);
    }

    public function index()
    {
        $data = [
            'title'      => 'إدارة تقييمات المرشح',
            'q'          => '',
            'candidates' => [],
            'selected'   => null,
            'apps'       => [],
            'evals'      => [],
            'error'      => null,
        ];
        $this->_render($data);
    }

    // بحث بالاسم (يعرض قائمة مرشحين)
    public function search()
    {
        $q = trim((string)($this->input->post('q', true) ?: $this->input->get('q', true)));

        $data = [
            'title'      => 'إدارة تقييمات المرشح',
            'q'          => $q,
            'candidates' => [],
            'selected'   => null,
            'apps'       => [],
            'evals'      => [],
            'error'      => null,
        ];

        if ($q === '') {
            $data['error'] = 'فضلاً اكتب اسم المرشح للبحث.';
            return $this->_render($data);
        }

        $data['candidates'] = $this->cem2->search_candidates_by_name($q);

        if (empty($data['candidates'])) {
            $data['error'] = 'لم يتم العثور على مرشح مطابق للاسم.';
        }

        $this->_render($data);
    }

    // اختيار مرشح وإظهار applications + evaluations
    public function select($candidate_id = 0)
    {
        $candidate_id = (int)$candidate_id;
        $q = trim((string)$this->input->get('q', true));

        $data = [
            'title'      => 'إدارة تقييمات المرشح',
            'q'          => $q,
            'candidates' => [],
            'selected'   => null,
            'apps'       => [],
            'evals'      => [],
            'error'      => null,
        ];

        if ($candidate_id <= 0) {
            $data['error'] = 'معرّف المرشح غير صحيح.';
            return $this->load->view('candidates/candidate_evaluations2', $data);
        }

        $selected = $this->cem2->get_candidate($candidate_id);
        if (!$selected) {
            $data['error'] = 'المرشح غير موجود.';
            return $this->load->view('candidates/candidate_evaluations2', $data);
        }

        $apps = $this->cem2->get_applications_by_candidate($candidate_id);
        $app_ids = array_map(function($r){ return (int)$r->id; }, $apps);

        $evals = [];
        if (!empty($app_ids)) {
            $evals = $this->cem2->get_evaluations_by_application_ids($app_ids);
        }

        $data['selected'] = $selected;
        $data['apps']     = $apps;
        $data['evals']    = $evals;

        // نرجّع كذلك قائمة المرشحين لو جاء من بحث
        if ($q !== '') {
            $data['candidates'] = $this->cem2->search_candidates_by_name($q);
        }

        $this->_render($data);
    }

    public function create()
    {
        $candidate_id = (int)$this->input->post('candidate_id');
        $application_id = (int)$this->input->post('application_id');
        $return_q = trim((string)$this->input->post('return_q', true));

        if ($candidate_id <= 0 || $application_id <= 0) {
            $this->_flash('danger', 'المرشح أو الطلب غير صحيح.');
            return $this->_back_to_candidate($candidate_id, $return_q);
        }

        $this->_rules(false);

        if ($this->form_validation->run() === false) {
            $this->_flash('danger', strip_tags(validation_errors()));
            return $this->_back_to_candidate($candidate_id, $return_q);
        }

        $status = trim((string)$this->input->post('status', true));

        $payload = [
            'application_id'     => $application_id,
            'evaluator_user_id'  => trim((string)$this->input->post('evaluator_user_id', true)),
            'score'              => $this->input->post('score', true),
            'status'             => $status,
            'notes'              => $this->input->post('notes', true),
            'recommended_salary' => $this->input->post('recommended_salary', true),
            'requested_by'       => trim((string)$this->input->post('requested_by', true)),
            'created_at'         => date('Y-m-d H:i:s'),
            'completed_at'       => ($status === 'completed') ? date('Y-m-d H:i:s') : null,
        ];

        $ok = $this->cem2->insert_evaluation($payload);

        $this->_flash($ok ? 'success' : 'danger', $ok ? 'تم إضافة التقييم.' : 'تعذر إضافة التقييم.');
        return $this->_back_to_candidate($candidate_id, $return_q);
    }

    public function update($id = 0)
    {
        $id = (int)$id;
        $candidate_id = (int)$this->input->post('candidate_id');
        $return_q = trim((string)$this->input->post('return_q', true));

        if ($id <= 0 || $candidate_id <= 0) {
            $this->_flash('danger', 'بيانات التعديل غير صحيحة.');
            return $this->_back_to_candidate($candidate_id, $return_q);
        }

        $this->_rules(true);

        if ($this->form_validation->run() === false) {
            $this->_flash('danger', strip_tags(validation_errors()));
            return $this->_back_to_candidate($candidate_id, $return_q);
        }

        $status = trim((string)$this->input->post('status', true));

        $payload = [
            'evaluator_user_id'  => trim((string)$this->input->post('evaluator_user_id', true)),
            'score'              => $this->input->post('score', true),
            'status'             => $status,
            'notes'              => $this->input->post('notes', true),
            'recommended_salary' => $this->input->post('recommended_salary', true),
            'requested_by'       => trim((string)$this->input->post('requested_by', true)),
            'completed_at'       => ($status === 'completed') ? date('Y-m-d H:i:s') : null,
        ];

        $ok = $this->cem2->update_evaluation($id, $payload);

        $this->_flash($ok ? 'success' : 'danger', $ok ? 'تم تحديث التقييم.' : 'تعذر تحديث التقييم.');
        return $this->_back_to_candidate($candidate_id, $return_q);
    }

    public function delete($id = 0)
    {
        $id = (int)$id;
        $candidate_id = (int)($this->input->post('candidate_id') ?: $this->input->get('candidate_id'));
        $return_q = trim((string)($this->input->post('return_q', true) ?: $this->input->get('return_q', true)));

        if ($id <= 0 || $candidate_id <= 0) {
            $this->_flash('danger', 'بيانات الحذف غير صحيحة.');
            return $this->_back_to_candidate($candidate_id, $return_q);
        }

        $ok = $this->cem2->delete_evaluation($id);

        $this->_flash($ok ? 'success' : 'danger', $ok ? 'تم حذف التقييم.' : 'تعذر حذف التقييم.');
        return $this->_back_to_candidate($candidate_id, $return_q);
    }

    private function _rules($is_update)
    {
        $this->form_validation->set_rules('evaluator_user_id', 'رقم المقيم', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('status', 'الحالة', 'trim|required|in_list[pending,completed]');
        $this->form_validation->set_rules('score', 'الدرجة', 'trim|numeric');
        $this->form_validation->set_rules('recommended_salary', 'الراتب المتوقع', 'trim|numeric');
        $this->form_validation->set_rules('requested_by', 'requested_by', 'trim|max_length[50]');
        $this->form_validation->set_rules('notes', 'ملاحظات', 'trim');

        if (!$is_update) {
            $this->form_validation->set_rules('application_id', 'Application', 'required|integer');
            $this->form_validation->set_rules('candidate_id', 'Candidate', 'required|integer');
        }
    }

    private function _flash($type, $msg)
    {
        $this->session->set_flashdata('flash_type', $type);
        $this->session->set_flashdata('flash_msg', $msg);
    }

    private function _back_to_candidate($candidate_id, $q)
    {
        $candidate_id = (int)$candidate_id;
        $q = trim((string)$q);
        $url = 'CandidateEvaluations2/select/' . $candidate_id;
        if ($q !== '') $url .= '?q=' . urlencode($q);
        redirect($url, 'refresh');
    }
}
