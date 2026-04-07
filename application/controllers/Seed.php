<?php
defined("BASEPATH") or exit("No direct script access allowed");

/**
 * Seed controller - inserts sample data for demo/testing.
 * Visit: http://localhost:8080/seed/jobs
 */
class Seed extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(["url", "string"]);

        if (!$this->session->userdata("logged_in")) {
            redirect("users/login");
        }

        $username = $this->session->userdata("username");
        $role = $this->session->userdata("role");
        $department = $this->session->userdata("department");
        $allowed = in_array($username, ["1526","2230","1291","64","66","67","2200","2439"])
            || in_array($role, ["recruitment_manager","ceo","admin"])
            || ($department && (stripos($department, "توظيف") !== false || stripos($department, "recruitment") !== false || stripos($department, "موارد بشرية") !== false));
        if (!$allowed) {
            $this->session->set_flashdata("error_msg", "ليس لديك الصلاحية.");
            redirect("dashboard");
        }
    }

    /**
     * Seed sample jobs (requisitions + published job postings)
     */
    public function jobs()
    {
        $this->config->load("seed_samples", true);
        $sample_requisitions = $this->config->item("seed_sample_requisitions", "seed_samples");

        $user_id = $this->session->userdata("user_id") ?: 1;
        $username = $this->session->userdata("username") ?: "1526";
        $requester_name = $this->session->userdata("name") ?: "مدير الموارد البشرية";

        $inserted = 0;

        foreach ($sample_requisitions as $r) {
            list($role_title, $project, $department) = $r;

            // Check if we already have a similar published job
            $exists = $this->db->select("j.id")
                ->from("job_postings j")
                ->join("job_requisitions r", "r.id = j.requisition_id")
                ->where("j.job_title", $role_title)
                ->where("j.status", "Published")
                ->limit(1)
                ->get()
                ->row_array();

            if ($exists) {
                continue;
            }

            // Insert requisition
            $req_data = [
                "requester_user_id" => $user_id,
                "requester_name" => $requester_name,
                "department" => $department,
                "role_title" => $role_title,
                "employees_needed" => 1,
                "gender" => "كلاهما",
                "region" => "الوسطى",
                "project_or_client" => $project,
                "target_hire_date" => date("Y-m-d", strtotime("+2 months")),
                "education_level" => "بكالوريوس",
                "age_range" => "25-30",
                "degree_major" => "",
                "salary_min" => 6000,
                "salary_max" => 12000,
                "status" => "معتمد",
                "description" => "وصف وظيفة " . $role_title,
                "experience_required" => "سنتان فأكثر",
                "created_at" => date("Y-m-d H:i:s"),
                "ceo_approved_at" => date("Y-m-d H:i:s"),
            ];

            $this->db->insert("job_requisitions", $req_data);
            $req_id = $this->db->insert_id();

            if (!$req_id) {
                continue;
            }

            // Insert published job posting
            $job_data = [
                "requisition_id" => $req_id,
                "public_link_id" => random_string("alnum", 12),
                "job_title" => $role_title,
                "department" => $department,
                "location" => "الرياض - المكتب الرئيسي",
                "experience" => "سنتان فأكثر",
                "job_description" => "وصف وظيفة " . $role_title,
                "status" => "Published",
                "created_by_user_id" => $username,
                "created_at" => date("Y-m-d H:i:s"),
            ];

            $this->db->insert("job_postings", $job_data);
            $job_id = $this->db->insert_id();

            if ($job_id && $this->db->table_exists("applications") && $this->db->table_exists("candidates")) {
                $statuses = ["جديد", "تحت المراجعة", "مقابلة", "عرض وظيفي", "تم التوظيف"];
                $num_apps = rand(5, 18);
                $candidates = $this->db->select("id")->from("candidates")->limit(30)->get()->result_array();
                if (!empty($candidates)) {
                    $used = [];
                    for ($i = 0; $i < min($num_apps, count($candidates)); $i++) {
                        $c = $candidates[array_rand($candidates)];
                        if (isset($used[$c["id"]])) continue;
                        $used[$c["id"]] = true;
                        $ts = date("Y-m-d H:i:s", strtotime("-" . rand(1, 30) . " days"));
                        $app_row = [
                            "job_id" => $job_id,
                            "candidate_id" => $c["id"],
                            "status" => $statuses[array_rand($statuses)],
                        ];
                        if ($this->db->field_exists("applied_at", "applications")) {
                            $app_row["applied_at"] = $ts;
                        }
                        if ($this->db->field_exists("created_at", "applications")) {
                            $app_row["created_at"] = $ts;
                        }
                        $this->db->insert("applications", $app_row);
                    }
                }
            }

            $inserted++;
        }

        $this->session->set_flashdata("success_msg", "<div class='alert alert-success'><i class='bi bi-check-circle me-2'></i>تم إضافة " . $inserted . " وظيفة تجريبية بنجاح.</div>");
        redirect("jobs");
    }

    /**
     * Seed sample job descriptions (الوصف الوظيفي)
     * Visit: http://localhost:8080/seed/job_descriptions
     */
    public function job_descriptions()
    {
        if (!$this->db->table_exists("job_descriptions")) {
            $this->session->set_flashdata("error_msg", "جدول job_descriptions غير موجود. نفّذ job_description_tables.sql أولاً.");
            redirect("job_description");
            return;
        }

        $count = $this->db->count_all("job_descriptions");
        if ($count >= 5) {
            $this->session->set_flashdata("success_msg", "<div class='alert alert-info'><i class='bi bi-info-circle me-2'></i>يوجد بالفعل بيانات في قائمة الوصفات الوظيفية.</div>");
            redirect("job_description");
            return;
        }

        $this->config->load("seed_samples", true);
        $samples = $this->config->item("seed_job_description_samples", "seed_samples");

        $jo_id = 1;
        $first = $this->db->select("id")->from("job_offers")->limit(1)->get()->row_array();
        if (!empty($first)) {
            $jo_id = (int) $first["id"];
        }

        $inserted = 0;
        foreach ($samples as $s) {
            list($name, $title, $status, $desc) = $s;
            $exists = $this->db->where("employee_name", $name)->where("job_title", $title)
                ->get("job_descriptions")->row_array();
            if ($exists) continue;

            $this->db->insert("job_descriptions", [
                "job_offer_id" => $jo_id,
                "employee_id" => "E" . str_pad($inserted + 1, 3, "0", STR_PAD_LEFT),
                "candidate_id" => 1,
                "employee_name" => $name,
                "job_title" => $title,
                "supervisor_username" => "admin",
                "supervisor_name" => "مدير النظام",
                "hr_username" => "admin",
                "hr_name" => "مدير النظام",
                "description_text" => $desc,
                "status" => $status,
                "created_by" => $this->session->userdata("username") ?: "admin",
                "created_at" => date("Y-m-d H:i:s", strtotime("-" . rand(1, 7) . " days")),
            ]);
            if ($this->db->insert_id()) {
                $inserted++;
            }
        }

        $this->session->set_flashdata("success_msg", "<div class='alert alert-success'><i class='bi bi-check-circle me-2'></i>تم إضافة " . $inserted . " وصف وظيفي تجريبي بنجاح.</div>");
        redirect("job_description");
    }
}
