<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Jobs extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("requisition_model");
        $this->load->model("job_model");
        $this->load->library(["form_validation", "session"]);
        $this->load->helper(["url", "form", "string"]);

        // 1. Check if user is logged in
        if (!$this->session->userdata("logged_in")) {
            redirect("users/login");
        }

        // Get user info
        $username = $this->session->userdata("username");
        $role = $this->session->userdata("role");
        $department = $this->session->userdata("department");

        // 2. Access Control
        $allowed_usernames = ["1526", "2230", "1291", "64", "66", "67", "2200", "2439"];
        $allowed_roles = ["recruitment_manager", "ceo", "admin"];

        $has_access = false;

        if (in_array($username, $allowed_usernames)) {
            $has_access = true;
        }
        if (in_array($role, $allowed_roles)) {
            $has_access = true;
        }

        // Allow HR/Recruitment departments
        if (
            $department &&
            (stripos($department, "توظيف") !== false ||
                stripos($department, "recruitment") !== false ||
                stripos($department, "موارد بشرية") !== false)
        ) {
            $has_access = true;
        }

        if (!$has_access) {
            $this->session->set_flashdata("error_msg", "ليس لديك الصلاحية للوصول إلى صفحة الوظائف.");
            redirect("dashboard");
        }
    }

    public function index()
    {
        $data["title"] = "لوحة تحكم الوظائف";
        $data["pending_requests"] = $this->job_model->get_approved_requisitions_without_job_post();
        $data["published_jobs"] = $this->job_model->get_published_jobs();

        $this->config->load("demo_data", true);
        if (empty($data["published_jobs"])) {
            $data["published_jobs"] = $this->config->item("demo_published_jobs", "demo_data");
            $data["is_demo_mode"] = true;
        } else {
            $data["is_demo_mode"] = false;
        }

        // Add applicant counts for each published job
        foreach ($data["published_jobs"] as &$job) {
            if (empty($job["applicant_counts"]) && !empty($job["id"])) {
                $job["applicant_counts"] = $this->job_model->get_applicant_counts_by_job($job["id"]);
            }
        }
        unset($job);

        $this->load->view("template/new_header", $data);
        $this->load->view("jobs/job_dashboard", $data);
        $this->load->view("template/new_footer");
    }

    /**
     * Internal job details page (with header & sidebar).
     */
    public function view($job_id)
    {
        $data["job"] = $this->job_model->get_job_by_id($job_id);

        if (empty($data["job"])) {
            show_404();
        }

        $data["title"] = "تفاصيل الوظيفة: " . $data["job"]["job_title"];

        $this->load->view("template/new_header", $data);
        $this->load->view("jobs/view", $data);
        $this->load->view("template/new_footer");
    }

    public function create($requisition_id)
    {
        $data["title"] = "إنشاء إعلان وظيفي جديد";
        $data["requisition"] = $this->requisition_model->get_requisition_by_id($requisition_id);

        if (empty($data["requisition"]) || $data["requisition"]["status"] != "معتمد") {
            $this->session->set_flashdata("error_msg", "هذا الطلب غير جاهز للنشر.");
            redirect("jobs");
        }

        $this->load->view("template/new_header", $data);
        $this->load->view("jobs/create", $data);
        $this->load->view("template/new_footer");
    }

    public function publish()
    {
        $this->form_validation->set_rules("job_title", "المسمى الوظيفي", "required|trim");
        $this->form_validation->set_rules("department", "القسم", "required|trim");
        $this->form_validation->set_rules("location", "الموقع", "required|trim");
        $this->form_validation->set_rules("requisition_id", "رقم الطلب", "required|integer");

        if ($this->form_validation->run() === false) {
            $this->create($this->input->post("requisition_id"));
        } else {
            $public_link_id = random_string("alnum", 12);

            $data = [
                "requisition_id" => $this->input->post("requisition_id"),
                "public_link_id" => $public_link_id,
                "job_title" => $this->input->post("job_title"),
                "department" => $this->input->post("department"),
                "location" => $this->input->post("location"),
                "experience" => $this->input->post("experience"),
                "job_description" => $this->input->post("job_description"),
                "status" => "Published",
                "created_by_user_id" => $this->session->userdata("username"),
            ];

            $new_job_id = $this->job_model->insert_job_posting($data);

            if ($new_job_id) {
                // *** KEY CHANGE: Generate SIMPLE APPLY Link ***
                $public_url = base_url("simple_apply/view/" . $public_link_id);

                $success_msg =
                    '
                <div class="alert alert-success">
                    <h5><i class="bi bi-check-circle me-2"></i> تم نشر الإعلان الوظيفي بنجاح!</h5>
                    
                    <div class="mt-3">
                        <strong>رابط التقديم السريع (للنشر على LinkedIn):</strong><br>
                        <div class="input-group mt-1">
                            <input type="text" class="form-control custom-input" id="publicLink" value="' .
                    $public_url .
                    '" readonly>
                            <button class="button hex-btn white small" type="button" onclick="copyToClipboard(\'publicLink\')">
                                <i class="bi bi-clipboard me-1"></i> نسخ
                            </button>
                        </div>
                        <small class="text-muted">هذا الرابط يفتح نموذج التقديم المبسط (الاسم، الجوال، السيرة الذاتية فقط).</small>
                    </div>
                    
                    <script>
                    function copyToClipboard(elementId) {
                        var copyText = document.getElementById(elementId);
                        copyText.select();
                        copyText.setSelectionRange(0, 99999);
                        document.execCommand("copy");
                        alert("تم نسخ الرابط!");
                    }
                    </script>
                </div>';

                $this->session->set_flashdata("success_msg", $success_msg);
            } else {
                $this->session->set_flashdata("error_msg", "حدث خطأ أثناء نشر الإعلان.");
            }

            redirect("jobs");
        }
    }
}
