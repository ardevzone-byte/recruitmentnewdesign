<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('report_model');
        $this->load->model('candidate_model'); // For job list
        $this->load->library('session');
        $this->load->helper(['url', 'form']);

        // Permissions: Only RM (1291), CEO, or Admin
        $user_id = $this->session->userdata('username');
        $role = $this->session->userdata('role');
        
        $allowed_users = ['1291', '1526', 'admin'];
        if (!in_array($user_id, $allowed_users) && $role != 'recruitment_manager' && $role != 'ceo') {
            $this->session->set_flashdata('error_msg', 'Access Denied');
            redirect('dashboard');
        }
    }
    public function ceo_report() {
        // Security Check (Only CEO 1001 or Admin)
        $username = $this->session->userdata('username');
        if ($username != '1001') {
            redirect('dashboard');
        }

        $data['title'] = 'تقرير أداء فريق التوظيف (Matrix)';
        
        // Get the Matrix Data
        $report_data = $this->report_model->get_ceo_team_matrix();
        
        $data['team_users'] = $report_data['users'];
        $data['job_columns'] = $report_data['jobs'];
        $data['matrix_data'] = $report_data['matrix'];

        $this->load->view('template/new_header', $data);
        $this->load->view('reports/ceo_team_report', $data);
        $this->load->view('template/new_footer');
    }
// Fetch details for KPI modal
   // جلب التفاصيل للمودال عبر AJAX
    public function get_kpi_details() {
        // التحقق من أن الطلب AJAX
        /* إذا كان هذا السطر يسبب مشكلة، يمكنك إزالته مؤقتاً للتجربة */
        // if (!$this->input->is_ajax_request()) {
        //    exit('No direct script access allowed');
        // }

        $type = $this->input->get('type');
        $filters = $this->input->get();

        // استدعاء الموديل
        $data['candidates'] = $this->report_model->get_details_by_type($type, $filters);

        // بناء جدول HTML للرد
        echo '<div class="table-responsive">
                <table class="table table-striped table-hover mb-0 text-center align-middle">
                    <thead class="table-dark sticky-top">
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>رقم الجوال</th>
                            <th>الوظيفة</th>
                            <th>الموقع</th>
                            <th>الحالة</th>
                            <th>تاريخ التقديم</th>
                            <th>الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>';
        
        if (!empty($data['candidates'])) {
            foreach ($data['candidates'] as $row) {
                echo '<tr>
                        <td>' . $row['app_id'] . '</td>
                        <td class="fw-bold">' . $row['full_name'] . '</td>
                        <td dir="ltr">' . $row['phone'] . '</td>
                        <td>' . $row['job_title'] . '</td>
                        <td>' . $row['location'] . '</td>
                        <td><span class="badge bg-secondary">' . $row['status'] . '</span></td>
                        <td>' . date('Y-m-d', strtotime($row['created_at'])) . '</td>
                        <td>
                            <a href="' . base_url('candidates/view/' . $row['app_id']) . '" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye"></i> الملف
                            </a>
                        </td>
                      </tr>';
            }
        } else {
            echo '<tr><td colspan="8" class="p-4 text-muted">لا توجد سجلات مطابقة</td></tr>';
        }

        echo '</tbody></table></div>';
    }
    public function index() {
        $filters = $this->input->get();

        $data['title'] = 'لوحة التقارير والتحليلات';
        
        // 1. Lists & KPIs
        $data['recruitment_team'] = $this->report_model->get_recruitment_team_list();
        $data['jobs_list'] = $this->candidate_model->get_active_jobs(); // Ensure this model is loaded
        $data['kpi'] = $this->report_model->get_kpi_stats($filters);
        
        // 2. Charts
        $data['status_chart'] = $this->report_model->get_applications_by_status($filters);
        $data['trend_chart'] = $this->report_model->get_monthly_trend();
        
        // 3. Performance (Fixed Count Logic)
        $data['recruiters'] = $this->report_model->get_recruiter_performance($filters);

        // 4. NEW: Job Offers Report
        $data['offers_report'] = $this->report_model->get_job_offers_report($filters);

        $data['filters'] = $filters;

        $this->load->view('template/new_header', $data);
        $this->load->view('reports/dashboard', $data);
        $this->load->view('template/new_footer');
    }

    public function export_excel() {
        $filters = $this->input->get();
        $data = $this->report_model->get_export_data($filters);

        // File Name
        $filename = 'Recruitment_Report_' . date('Ymd') . '.csv';

        // Headers
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/csv; ");

        // Open output stream
        $file = fopen('php://output', 'w');
        
        // Add BOM for Excel UTF-8 compatibility
        fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

        // Column Headers (Arabic)
        $header = ['رقم الطلب', 'الاسم', 'الجوال', 'الإيميل', 'الوظيفة', 'الموقع', 'الحالة', 'قرار التوظيف', 'مقر العمل (مرشح)', 'الراتب الأساسي', 'الراتب الإجمالي', 'صاحب القرار'];
        fputcsv($file, $header);

        foreach ($data as $row) {
            fputcsv($file, $row);
        }

        fclose($file);
        exit;
    }
}