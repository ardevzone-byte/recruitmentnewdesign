<?php defined('BASEPATH') OR exit('No direct script access allowed');

class JobDescription extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // عدّلها حسب نظامك
        if (!$this->session->userdata('username')) {
            redirect('login');
        }

        $this->load->model('Job_description_model', 'jd');
        $this->load->helper(['url','security','form','text']);
        $this->load->library(['form_validation','upload']);
    }

 public function index()
{
    $this->load->model('Job_description_model');

    $data['rows']  = $this->Job_description_model->get_list_all();
    $data['title'] = 'الوصف الوظيفي';

    $this->load->view('template/new_header', $data);
    $this->load->view('job_description/index', $data);
    $this->load->view('template/new_footer');
}


    public function create()
    {
        $data['title'] = 'إنشاء وصف وظيفي';
        $data['offers'] = $this->jd->get_offers_for_select();
        $data['users']  = $this->jd->get_users_for_select();

        $this->load->view('template/new_header', $data);
        $this->load->view('job_description/create', $data);
        $this->load->view('template/new_footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('job_offer_id', 'الموظف', 'required|integer');
        $this->form_validation->set_rules('supervisor_username', 'المشرف المباشر', 'required');
        $this->form_validation->set_rules('hr_username', 'مدير الموارد البشرية', 'required');
        $this->form_validation->set_rules('description_text', 'الوصف الوظيفي', 'required|min_length[50]');

        if ($this->form_validation->run() === false) {
            $this->create();
            return;
        }

        $job_offer_id = (int)$this->input->post('job_offer_id', true);
        $sup_u = (string)$this->input->post('supervisor_username', true);
        $hr_u  = (string)$this->input->post('hr_username', true);

        $offer = $this->jd->get_offer_details($job_offer_id);
        if (!$offer) {
            show_error('Job offer غير موجود', 404);
        }

        $sup = $this->jd->get_user_by_username($sup_u);
        $hr  = $this->jd->get_user_by_username($hr_u);

        if (!$sup || !$hr) {
            show_error('المشرف أو مدير الموارد غير موجود في users', 400);
        }

        $creator = (string)$this->session->userdata('username');

        $jd_data = [
            'job_offer_id' => $offer['job_offer_id'],
            'employee_id'  => (string)$offer['employee_id'],
            'candidate_id' => (int)$offer['candidate_id'],
            'employee_name'=> (string)($offer['full_name'] ?? ''),
            'job_title'    => (string)($offer['job_title'] ?? ''),

            'supervisor_username' => $sup['username'],
            'supervisor_name'     => $sup['name'],
            'hr_username'         => $hr['username'],
            'hr_name'             => $hr['name'],

            'description_text' => $this->security->xss_clean($this->input->post('description_text', false)),
            'status'           => 'pending',
            'created_by'       => $creator,
            'created_at'       => date('Y-m-d H:i:s'),
        ];

        $approvals = [
            [
                'role'              => 'employee',
                'approver_username' => (string)$offer['employee_id'],
                'approver_name'     => (string)($offer['full_name'] ?? ''),
                'status'            => 'pending'
            ],
            [
                'role'              => 'supervisor',
                'approver_username' => $sup['username'],
                'approver_name'     => $sup['name'],
                'status'            => 'pending'
            ],
            [
                'role'              => 'hr',
                'approver_username' => $hr['username'],
                'approver_name'     => $hr['name'],
                'status'            => 'pending'
            ],
        ];

        $jd_id = $this->jd->create_job_description($jd_data, $approvals);
        if (!$jd_id) {
            show_error('فشل حفظ الوصف الوظيفي', 500);
        }

        redirect('job_description/view/'.$jd_id);
    }

    public function view($id)
    {
        $id = (int)$id;
        $data['jd'] = $this->jd->get_job_description($id);
        if (!$data['jd']) show_404();

        $data['approvals'] = $this->jd->get_approvals($id);

        $username = (string)$this->session->userdata('username');
        $data['my_approval'] = $this->jd->get_my_approval($id, $username);

        $data['title'] = 'عرض الوصف الوظيفي';
        $this->load->view('template/new_header', $data);
        $this->load->view('job_description/view', $data);
        $this->load->view('template/new_footer');
    }

    public function sign($id)
    {
        $id = (int)$id;
        $jd = $this->jd->get_job_description($id);
        if (!$jd) show_404();

        $username = (string)$this->session->userdata('username');
        $my = $this->jd->get_my_approval($id, $username);
        if (!$my) show_error('ليس لديك صلاحية التوقيع على هذا المستند', 403);

        if ($my['status'] !== 'pending') {
            redirect('job_description/view/'.$id);
            return;
        }

        $data['title'] = 'توقيع واعتماد';
        $data['jd'] = $jd;
        $data['my'] = $my;

        $this->load->view('template/new_header', $data);
        $this->load->view('job_description/sign', $data);
        $this->load->view('template/new_footer');
    }

    public function approve($id)
    {
        $id = (int)$id;
        $jd = $this->jd->get_job_description($id);
        if (!$jd) show_404();

        $username = (string)$this->session->userdata('username');
        $my = $this->jd->get_my_approval($id, $username);
        if (!$my) show_error('ليس لديك صلاحية', 403);

        if ($my['status'] !== 'pending') {
            redirect('job_description/view/'.$id);
            return;
        }

        $mode = (string)$this->input->post('signature_mode', true); // draw|upload
        $note = (string)$this->input->post('note', true);

        $upload_dir = FCPATH . 'uploads/job_desc_signatures/'.$id.'/';
        if (!is_dir($upload_dir)) {
            @mkdir($upload_dir, 0777, true);
        }

        $file_rel = null;

        if ($mode === 'draw') {
            $dataUrl = $this->input->post('signature_data', false); // base64
            if (!$dataUrl || strpos($dataUrl, 'data:image/png;base64,') !== 0) {
                show_error('التوقيع غير صحيح', 400);
            }

            $base64 = str_replace('data:image/png;base64,', '', $dataUrl);
            $bin = base64_decode($base64);

            if (!$bin) show_error('فشل قراءة التوقيع', 400);

            $filename = 'sign_'.$my['role'].'_'.$my['approver_username'].'_'.time().'.png';
            file_put_contents($upload_dir.$filename, $bin);
            $file_rel = 'uploads/job_desc_signatures/'.$id.'/'.$filename;

            $this->jd->set_approval_signature($my['id'], 'approved', 'draw', $file_rel, $note);

        } else { // upload
            if (empty($_FILES['signature_file']['name'])) {
                show_error('ارفع ملف توقيع أو اختر الرسم', 400);
            }

            $config = [
                'upload_path'   => $upload_dir,
                'allowed_types' => 'png|jpg|jpeg',
                'max_size'      => 2048,
                'encrypt_name'  => true
            ];
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('signature_file')) {
                show_error($this->upload->display_errors('', ''), 400);
            }

            $up = $this->upload->data();
            $file_rel = 'uploads/job_desc_signatures/'.$id.'/'.$up['file_name'];

            $this->jd->set_approval_signature($my['id'], 'approved', 'upload', $file_rel, $note);
        }

        $this->jd->recalc_job_description_status($id);
        redirect('job_description/view/'.$id);
    }

    public function export_pdf($id)
    {
        $id = (int)$id;
        $jd = $this->jd->get_job_description($id);
        if (!$jd) show_404();

        $approvals = $this->jd->get_approvals($id);

        // تحتاج Dompdf (موضح أسفل)
        $this->load->library('pdf'); // application/libraries/Pdf.php

        $html = $this->load->view('job_description/pdf', [
            'jd' => $jd,
            'approvals' => $approvals,
        ], true);

        $filename = 'Job_Description_'.$id.'.pdf';
        $this->pdf->create($html, $filename, true); // stream
    }

    public function print_view($id)
{
    $id = (int)$id;
    $jd = $this->Job_description_model->get_by_id($id);
    if(!$jd) show_404();

    $approvals = $this->Job_description_model->get_approvals($id);

    $data = [
        'jd' => $jd,
        'approvals' => $approvals
    ];

    $this->load->view('job_description/print', $data);
}



}
