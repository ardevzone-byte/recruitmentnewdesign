<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JobTitles extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Job_titles_model', 'jtm');
        $this->load->helper(['url', 'form', 'security']);
        $this->load->library(['session', 'form_validation']);
    }

    public function index()
    {
        $q = trim((string)$this->input->get('q', true));

        $data = [
            'title' => 'إدارة المسميات الوظيفية',
            'q'     => $q,
            'rows'  => $this->jtm->get_list($q, 200),
            'error' => null,
        ];

        $this->load->view('template/new_header', $data);
        $this->load->view('recruitment/job_titles_manage', $data);
        $this->load->view('template/new_footer');
    }

    public function create()
    {
        $this->form_validation->set_rules('job_title', 'المسمى الوظيفي', 'trim|required|min_length[2]|max_length[255]');

        if ($this->form_validation->run() === false) {
            $this->_flash('danger', strip_tags(validation_errors()));
            return redirect('JobTitles', 'refresh');
        }

        $job_title = trim((string)$this->input->post('job_title', true));

        $ok = $this->jtm->insert([
            'job_title'   => $job_title,
            'created_at'  => date('Y-m-d H:i:s'),
        ]);

        $this->_flash($ok ? 'success' : 'danger', $ok ? 'تمت إضافة المسمى الوظيفي.' : 'تعذر إضافة المسمى الوظيفي.');
        redirect('JobTitles', 'refresh');
    }

    public function update($id = 0)
    {
        $id = (int)$id;

        if ($id <= 0) {
            $this->_flash('danger', 'المعرف غير صحيح.');
            return redirect('JobTitles', 'refresh');
        }

        $this->form_validation->set_rules('job_title', 'المسمى الوظيفي', 'trim|required|min_length[2]|max_length[255]');

        if ($this->form_validation->run() === false) {
            $this->_flash('danger', strip_tags(validation_errors()));
            return redirect('JobTitles', 'refresh');
        }

        $job_title = trim((string)$this->input->post('job_title', true));

        $ok = $this->jtm->update($id, [
            'job_title'  => $job_title,
            'created_at' => date('Y-m-d H:i:s'), // حسب طلبك: تاريخ ووقت التعديل
        ]);

        $this->_flash($ok ? 'success' : 'danger', $ok ? 'تم تحديث المسمى الوظيفي.' : 'تعذر تحديث المسمى الوظيفي.');
        redirect('JobTitles', 'refresh');
    }

    public function delete($id = 0)
    {
        $id = (int)$id;

        if ($id <= 0) {
            $this->_flash('danger', 'المعرف غير صحيح.');
            return redirect('JobTitles', 'refresh');
        }

        $ok = $this->jtm->delete($id);

        $this->_flash($ok ? 'success' : 'danger', $ok ? 'تم حذف المسمى الوظيفي.' : 'تعذر حذف المسمى الوظيفي.');
        redirect('JobTitles', 'refresh');
    }

    private function _flash($type, $msg)
    {
        $this->session->set_flashdata('flash_type', $type);
        $this->session->set_flashdata('flash_msg', $msg);
    }
}
