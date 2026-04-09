<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CandidateEvaluations extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Candidate_evaluations_model', 'cem');
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session', 'form_validation']);
    }

    public function index()
    {
        $data = [
            'title'  => 'إدارة تقييمات المرشح',
            'q'      => '',
            'result' => null,
            'evals'  => [],
            'error'  => null,
        ];
        $this->load->view('template/new_header', $data);
        $this->load->view('candidates/candidate_evaluations', $data);
        $this->load->view('template/new_footer');
    }

    public function search()
    {
        $q = trim((string)($this->input->post('q', true) ?: $this->input->get('q', true)));

        $data = [
            'title'  => 'إدارة تقييمات المرشح',
            'q'      => $q,
            'result' => null,
            'evals'  => [],
            'error'  => null,
        ];

        if ($q === '') {
            $data['error'] = 'فضلاً أدخل الرقم الوظيفي أو اسم المرشح.';
            $this->load->view('template/new_header', $data);
            $this->load->view('candidates/candidate_evaluations', $data);
            $this->load->view('template/new_footer');
            return;
        }

        // يرجع المرشح + بيانات العرض + application_id
        $result = $this->cem->find_candidate_offer_by_employee_or_name($q);
        if (!$result) {
            $data['error'] = 'لم يتم العثور على مرشح/عرض مطابق لبحثك.';
            $this->load->view('template/new_header', $data);
            $this->load->view('candidates/candidate_evaluations', $data);
            $this->load->view('template/new_footer');
            return;
        }

        $data['result'] = $result;

        // جلب التقييمات بناءً على application_id
        $application_id = (int)$result->application_id;
        $data['evals'] = $application_id ? $this->cem->get_evaluations_by_application($application_id) : [];

        $this->load->view('template/new_header', $data);
        $this->load->view('candidates/candidate_evaluations', $data);
        $this->load->view('template/new_footer');
    }

    public function create()
    {
        $application_id = (int)$this->input->post('application_id');
        $return_q       = trim((string)$this->input->post('return_q', true));

        $this->_set_rules();

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('flash_type', 'danger');
            $this->session->set_flashdata('flash_msg', strip_tags(validation_errors()));
            return $this->_back_to_search($return_q);
        }

        $payload = [
            'application_id'       => $application_id,
            'evaluator_user_id'    => trim((string)$this->input->post('evaluator_user_id', true)),
            'score'                => $this->input->post('score', true),
            'status'               => trim((string)$this->input->post('status', true)),
            'notes'                => $this->input->post('notes', true),
            'recommended_salary'   => $this->input->post('recommended_salary', true),
            'requested_by'         => trim((string)$this->input->post('requested_by', true)),
            'created_at'           => date('Y-m-d H:i:s'),
            'completed_at'         => null,
        ];

        // إذا الحالة completed نسجل completed_at
        if ($payload['status'] === 'completed') {
            $payload['completed_at'] = date('Y-m-d H:i:s');
        }

        $ok = $this->cem->insert_evaluation($payload);

        $this->session->set_flashdata('flash_type', $ok ? 'success' : 'danger');
        $this->session->set_flashdata('flash_msg', $ok ? 'تم إضافة التقييم بنجاح.' : 'تعذر إضافة التقييم.');

        return $this->_back_to_search($return_q);
    }

    public function update($id = 0)
    {
        $id        = (int)$id;
        $return_q  = trim((string)$this->input->post('return_q', true));

        if ($id <= 0) {
            $this->session->set_flashdata('flash_type', 'danger');
            $this->session->set_flashdata('flash_msg', 'معرّف التقييم غير صحيح.');
            return $this->_back_to_search($return_q);
        }

        $this->_set_rules(true);

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata('flash_type', 'danger');
            $this->session->set_flashdata('flash_msg', strip_tags(validation_errors()));
            return $this->_back_to_search($return_q);
        }

        $status = trim((string)$this->input->post('status', true));

        $payload = [
            'evaluator_user_id'    => trim((string)$this->input->post('evaluator_user_id', true)),
            'score'                => $this->input->post('score', true),
            'status'               => $status,
            'notes'                => $this->input->post('notes', true),
            'recommended_salary'   => $this->input->post('recommended_salary', true),
            'requested_by'         => trim((string)$this->input->post('requested_by', true)),
        ];

        // ضبط completed_at حسب الحالة
        if ($status === 'completed') {
            // إذا كان فاضي، نحطه الآن
            $payload['completed_at'] = date('Y-m-d H:i:s');
        } else {
            // pending => نفرغ completed_at
            $payload['completed_at'] = null;
        }

        $ok = $this->cem->update_evaluation($id, $payload);

        $this->session->set_flashdata('flash_type', $ok ? 'success' : 'danger');
        $this->session->set_flashdata('flash_msg', $ok ? 'تم تحديث التقييم بنجاح.' : 'تعذر تحديث التقييم.');

        return $this->_back_to_search($return_q);
    }

    public function delete($id = 0)
    {
        $id       = (int)$id;
        $return_q = trim((string)$this->input->post('return_q', true) ?: $this->input->get('return_q', true));

        if ($id <= 0) {
            $this->session->set_flashdata('flash_type', 'danger');
            $this->session->set_flashdata('flash_msg', 'معرّف التقييم غير صحيح.');
            return $this->_back_to_search($return_q);
        }

        $ok = $this->cem->delete_evaluation($id);

        $this->session->set_flashdata('flash_type', $ok ? 'success' : 'danger');
        $this->session->set_flashdata('flash_msg', $ok ? 'تم حذف التقييم.' : 'تعذر حذف التقييم.');

        return $this->_back_to_search($return_q);
    }

    private function _set_rules($is_update = false)
    {
        $this->form_validation->set_rules('evaluator_user_id', 'رقم المقيم الوظيفي', 'trim|required|max_length[50]');
        $this->form_validation->set_rules('status', 'الحالة', 'trim|required|in_list[pending,completed]');
        $this->form_validation->set_rules('score', 'درجة التقييم', 'trim|numeric');
        $this->form_validation->set_rules('recommended_salary', 'الراتب المتوقع', 'trim|numeric');
        $this->form_validation->set_rules('requested_by', 'منشئ التقييم', 'trim|max_length[50]');
        $this->form_validation->set_rules('notes', 'ملاحظات', 'trim');
        if (!$is_update) {
            $this->form_validation->set_rules('application_id', 'Application ID', 'required|integer');
        }
    }

    private function _back_to_search($q)
    {
        $q = trim((string)$q);
        if ($q === '') {
            redirect('CandidateEvaluations', 'refresh');
        }
        redirect('CandidateEvaluations/search?q=' . urlencode($q), 'refresh');
    }
}
