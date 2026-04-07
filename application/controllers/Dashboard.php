<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("requisition_model");
        $this->load->model("job_model");
        $this->load->model("pipeline_model");
        $this->load->library("session");
        $this->load->helper("url");

        if (!$this->session->userdata("logged_in")) {
            redirect("users/login");
        }
    }

    public function index()
    {
        $data["title"] = "لوحة التحكم";

        $user_id = $this->session->userdata("user_id");
        $role = $this->session->userdata("role");

        // احصائيات عامة
        $stats = [];

        // New Applicants (last 7 days)
        $stats["new_applicants"] = 0; // حسب نظامك

        // Pending Requisitions based on role
        if ($role == "recruitment_manager") {
            $stats["pending_requisitions"] = count(
                $this->requisition_model->get_requisitions_by_status("بانتظار مدير التوظيف"),
            );
        } elseif ($role == "ceo") {
            $stats["pending_requisitions"] = count(
                $this->requisition_model->get_requisitions_by_status("بانتظار الرئيس التنفيذي"),
            );
        } else {
            $stats["pending_requisitions"] = 0;
        }

        // Published Jobs
        $published_jobs = $this->job_model->get_published_jobs();
        $stats["published_jobs"] = count($published_jobs);

        // إضافة إحصائية جديدة: عدد طلبات المستخدم
        $my_requests = $this->requisition_model->get_requisitions_by_user($user_id);
        $stats["my_requests"] = count($my_requests);

        $data["stats"] = $stats;

        // Chart data for dashboard
        $data["chart_kpi"] = ['total_apps' => 0, 'interviewed' => 0, 'offered' => 0, 'hired' => 0];
        try {
            $this->load->model("report_model");
            if ($this->db->table_exists('applications')) {
                $data["chart_kpi"] = $this->report_model->get_kpi_stats([]);
            }
        } catch (Exception $e) {
            log_message('error', 'Dashboard chart_kpi: ' . $e->getMessage());
        }

        $this->load->view("template/new_header", $data);
        $this->load->view("dashboard/main", $data);
        $this->load->view("template/new_footer", $data);
    }

    /**
     * AJAX method to search candidates from dashboard
     */
    public function search_candidates_ajax()
    {
        // Check if it's an AJAX request
        if (!$this->input->is_ajax_request()) {
            $this->output->set_status_header(403);
            echo json_encode(["success" => false, "message" => "غير مصرح"]);
            return;
        }

        // Get search term
        $search_term = $this->input->post("search_term", true);

        if (empty($search_term) || strlen($search_term) < 2) {
            echo json_encode([
                "success" => false,
                "message" => "يرجى إدخال كلمة بحث مكونة من حرفين على الأقل",
                "count" => 0,
            ]);
            return;
        }

        try {
            // Search in candidates table
            $this->db->select("c.*, a.id as app_id, a.status as application_status");
            $this->db->from("candidates c");
            $this->db->join("applications a", "a.candidate_id = c.id", "left");

            // Search in multiple fields
            $this->db->group_start();
            $this->db->like("c.full_name", $search_term);
            $this->db->or_like("c.name_en", $search_term);
            $this->db->or_like("c.phone", $search_term);
            $this->db->or_like("c.email", $search_term);
            $this->db->or_like("c.id_number", $search_term);
            $this->db->or_like("c.nationality", $search_term);
            $this->db->group_end();

            $this->db->order_by("c.created_at", "DESC");
            $this->db->limit(50);

            $query = $this->db->get();

            if (!$query) {
                $error = $this->db->error();
                echo json_encode([
                    "success" => false,
                    "message" => "خطأ في قاعدة البيانات: " . $error["message"],
                    "count" => 0,
                ]);
                return;
            }

            $candidates = $query->result_array();

            // Prepare HTML response
            $html = "";
            $count = 0;

            if (!empty($candidates)) {
                $count = count($candidates);

                foreach ($candidates as $index => $candidate) {
                    // Get the latest application status
                    $latest_status = $candidate["application_status"] ?? "لا يوجد طلبات";

                    $status_badge = $this->_get_status_badge($latest_status);

                    // Format date safely
                    $created_date = "-";
                    if (!empty($candidate["created_at"]) && $candidate["created_at"] != "0000-00-00 00:00:00") {
                        $created_date = date("Y-m-d", strtotime($candidate["created_at"]));
                    }

                    $html .= "<tr>";
                    $html .= "<td>" . ($index + 1) . "</td>";
                    $html .= '<td class="fw-bold">' . html_escape($candidate["full_name"] ?? "غير معروف") . "</td>";
                    $html .=
                        '<td dir="ltr" class="text-end">' .
                        ($candidate["phone"] ?? '<span class="text-muted">-</span>') .
                        "</td>";
                    $html .= "<td>" . ($candidate["email"] ?? '<span class="text-muted">-</span>') . "</td>";
                    $html .= "<td>" . ($candidate["nationality"] ?? '<span class="text-muted">-</span>') . "</td>";
                    $html .= "<td>" . $status_badge . "</td>";
                    $html .= "<td>" . $created_date . "</td>";
                    $html .= "<td>";
                    $html .= '<div class="btn-group btn-group-sm">';

                    // Check if application ID exists
                    $app_id = $candidate["app_id"] ?? null;

                    if ($app_id) {
                        // ✅ THIS IS THE FIXED LINK YOU WANTED
                        $html .=
                            '<a href="' .
                            base_url("candidates/view/" . $app_id) .
                            '" class="btn btn-outline-primary fw-bold btn-sm" title="عرض الملف">';
                        $html .= '<i class="fas fa-eye"></i> الملف';
                        $html .= "</a>";
                    } else {
                        // If no application exists, show profile link as fallback
                        $html .=
                            '<a href="' .
                            base_url("candidates/profile/" . $candidate["id"]) .
                            '" class="btn btn-info btn-sm" title="الملف الشخصي">';
                        $html .= '<i class="fas fa-user"></i>';
                        $html .= "</a>";
                    }

                    // Link to archive
                    $html .=
                        '<a href="' .
                        base_url("candidates/archive?search_query=" . urlencode($candidate["full_name"] ?? "")) .
                        '" class="btn btn-secondary btn-sm" title="البحث في الأرشيف">';
                    $html .= '<i class="fas fa-search"></i>';
                    $html .= "</a>";

                    $html .= "</div>";
                    $html .= "</td>";
                    $html .= "</tr>";
                }
            }

            echo json_encode([
                "success" => true,
                "html" => $html,
                "count" => $count,
            ]);
        } catch (Exception $e) {
            log_message("error", "Candidate search error: " . $e->getMessage());
            echo json_encode([
                "success" => false,
                "message" => "حدث خطأ في النظام. يرجى المحاولة لاحقاً.",
                "count" => 0,
            ]);
        }
    }
    /**
     * Helper method for status badges
     */
    private function _get_status_badge($status)
    {
        $badge_classes = [
            "جديد" => "badge bg-info",
            "تحت المراجعة" => "badge bg-warning text-dark",
            "مقابلة" => "badge bg-primary",
            "عرض وظيفي" => "badge bg-success",
            "تم التوظيف" => "badge bg-success",
            "مرفوض" => "badge bg-danger",
            "مطلوب استكمال البيانات" => "badge bg-secondary",
            "لا يوجد طلبات" => "badge bg-light text-dark",
        ];

        $status_text = $status ?: "لا يوجد طلبات";
        $class = $badge_classes[$status] ?? "badge bg-light text-dark";
        return '<span class="' . $class . '">' . html_escape($status_text) . "</span>";
    }

    /**
     * Test method to check database connection
     */
    public function test_db()
    {
        echo "<h1>اختبار اتصال قاعدة البيانات</h1>";

        // Test if candidates table exists
        if ($this->db->table_exists("candidates")) {
            echo "✅ جدول المرشحين موجود<br>";

            // Get table structure
            $fields = $this->db->field_data("candidates");
            echo "<h3>حقول جدول المرشحين:</h3>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>اسم الحقل</th><th>النوع</th><th>الطول</th></tr>";
            foreach ($fields as $field) {
                echo "<tr>";
                echo "<td>{$field->name}</td>";
                echo "<td>{$field->type}</td>";
                echo "<td>{$field->max_length}</td>";
                echo "</tr>";
            }
            echo "</table>";

            // Count records
            $count = $this->db->count_all("candidates");
            echo "<p>عدد السجلات في جدول المرشحين: {$count}</p>";

            // Try a simple query
            $this->db->select("id, full_name, phone");
            $this->db->limit(5);
            $query = $this->db->get("candidates");

            if ($query) {
                echo "<h3>أمثلة من البيانات:</h3>";
                echo "<table border='1' cellpadding='5'>";
                echo "<tr><th>ID</th><th>الاسم</th><th>الجوال</th></tr>";
                foreach ($query->result_array() as $row) {
                    echo "<tr>";
                    echo "<td>{$row["id"]}</td>";
                    echo "<td>{$row["full_name"]}</td>";
                    echo "<td>{$row["phone"]}</td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "❌ فشل الاستعلام: " . $this->db->error()["message"];
            }
        } else {
            echo "❌ جدول المرشحين غير موجود!";
        }

        echo "<hr>";

        // Test if applications table exists
        if ($this->db->table_exists("applications")) {
            echo "✅ جدول الطلبات موجود<br>";
            $count = $this->db->count_all("applications");
            echo "<p>عدد السجلات في جدول الطلبات: {$count}</p>";
        } else {
            echo "❌ جدول الطلبات غير موجود!";
        }
    }
}
