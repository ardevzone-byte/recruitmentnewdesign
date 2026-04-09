<?php defined('BASEPATH') OR exit('No direct script access allowed');

class InterviewReport extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Interview_report_model', 'irm');
        $this->load->helper(['url', 'form', 'security', 'download']);
        $this->load->library(['session']);
    }

    public function index()
    {
        $filters = $this->_filters_from_request();

         $data = [
  'title' => 'تقرير المقابلات الوظيفية',
  'filters' => $filters,
  'rows' => $this->irm->get_report_rows($filters),
  'summary' => $this->irm->get_summary($filters),
  'recruiter_stats' => $this->irm->get_recruiter_stats($filters),
  'app_status_counts' => $this->irm->get_application_status_counts($filters),
];


        $this->load->view('template/new_header', $data);
        $this->load->view('recruitment/interview_report', $data);
        $this->load->view('template/new_footer');
    }

    // تصدير CSV (Excel-friendly)
    public function export_csv()
    {
        $filters = $this->_filters_from_request();
        $rows = $this->irm->get_report_rows($filters, 50000);

        $filename = "interview_report_" . date('Ymd_His') . ".csv";
        $delimiter = ",";
        $newline = "\r\n";

        // CSV Header
        $out = [];
        $out[] = [
            'Candidate ID','الاسم','Name EN','Email','Phone','ID Number','Nationality','Marital Status','Age','Work Location',
            'Created At',
            'Application ID','Application Status','Recruitment EmpNo','Recruitment Name',
            'Overall Eval Status','Eval Count','Completed Count','Pending Count',
            'Evaluators','Scores',
            'Recommended Salary','Completed At (All)','Notes (Last)'
        ];

        foreach ($rows as $r) {
            $out[] = [
                $r->candidate_id,
                $r->full_name,
                $r->name_en,
                $r->email,
                $r->phone,
                $r->id_number,
                $r->nationality,
                $r->marital_status,
                $r->age,
                $r->work_location,
                $r->candidate_created_at,

                $r->application_id,
                $r->application_status,
                $r->decision_by,
                $r->decision_by_name,

                $r->overall_eval_status_ar,
                $r->eval_count,
                $r->completed_count,
                $r->pending_count,

                $r->evaluators_list,
                $r->scores_list,

                $r->recommended_salary,
                $r->all_completed_at,
                $r->last_notes
            ];
        }

        // Build CSV
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

        // BOM for Arabic Excel
        force_download($filename, "\xEF\xBB\xBF" . $csv);
    }

    private function _filters_from_request()
    {
        // فلاتر: تاريخ الإنشاء من/إلى + حالة الطلب + حالة التقييم الإجمالية + موظف التوظيف
        $date_from = trim((string)$this->input->get('date_from', true));
        $date_to   = trim((string)$this->input->get('date_to', true));
        $app_status = trim((string)$this->input->get('app_status', true));
        $eval_status = trim((string)$this->input->get('eval_status', true)); // pending/completed
        $recruiter = trim((string)$this->input->get('recruiter', true)); // decision_by (empno/username)

        return [
            'date_from'  => $date_from,   // yyyy-mm-dd
            'date_to'    => $date_to,     // yyyy-mm-dd
            'app_status' => $app_status,
            'eval_status'=> $eval_status,
            'recruiter'  => $recruiter,
            'q'          => trim((string)$this->input->get('q', true)), // بحث عام بالاسم/الايميل/الجوال/الهوية
        ];
    }
}
