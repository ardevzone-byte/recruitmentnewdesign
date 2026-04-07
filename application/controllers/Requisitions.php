<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Requisitions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("requisition_model");
        $this->load->model("user_model"); // Load user model to get user info
        $this->load->model("job_model"); // للوصول إلى معلومات الوظائف
        $this->load->library(["form_validation", "session"]);
        $this->load->helper(["url", "form"]);

        // Protect the whole controller
        if (!$this->session->userdata("logged_in")) {
            redirect("users/login"); // Redirect to your login controller
        }
    }

    // Add this new method to display user's requests
    public function my_requests()
    {
        $data["title"] = "طلباتي الوظيفية";

        $user_id = $this->session->userdata("user_id");
        $username = $this->session->userdata("username");

        $data["my_requests"] = $this->requisition_model->get_requisitions_by_user($user_id, $username);

        $this->config->load("demo_data", true);
        if (empty($data["my_requests"])) {
            $data["my_requests"] = $this->config->item("demo_my_requests", "demo_data");
            $data["is_demo_mode"] = true;
        } else {
            $data["is_demo_mode"] = false;
        }

        foreach ($data["my_requests"] as &$request) {
            // Check if this requisition has been published as a job
            if (empty($data["is_demo_mode"])) {
                $request["job_posting"] = $this->job_model->get_job_by_requisition_id($request["id"]);
            }

            if ($request["job_posting"]) {
                $request["application_count"] = $this->requisition_model->get_application_count(
                    $request["job_posting"]["id"],
                );
            } else {
                $request["application_count"] = $request["application_count"] ?? 0;
            }

            if (empty($data["is_demo_mode"])) {
                $request["interview_count"] = $this->requisition_model->get_interview_count_by_requisition($request["id"]);
                $request["offer_count"] = $this->requisition_model->get_offer_count_by_requisition($request["id"]);
            }
        }

        // Load views
        $this->load->view("template/new_header", $data);
        $this->load->view("requisitions/my_requests", $data);
        $this->load->view("template/new_footer");
    }

    // باقي الدوال كما هي...
    public function create()
    {
        $data["title"] = "إنشاء طلب توظيف جديد";

        // Get current user's department from session or database
        $user_id = $this->session->userdata("user_id");
        $user_info = $this->user_model->get_user_by_id($user_id);
        $data["user_department"] = $user_info["department"] ?? "";

        // Load views
        $this->load->view("template/new_header", $data);
        $this->load->view("requisitions/create", $data);
        $this->load->view("template/new_footer");
    }

    /**
     * Action: Handles the form submission from the 'create' page.
     */
    public function submit()
    {
        // Get the REAL user ID from session
        $requester_user_id = $this->session->userdata("username"); // This is "2803" (string)
        $requester_name = $this->session->userdata("name");

        // Debug
        error_log("SUBMIT DEBUG: username from session: " . $requester_user_id);
        error_log("SUBMIT DEBUG: name from session: " . $requester_name);

        // Check if user exists by username
        $this->db->where("username", $requester_user_id);
        $user_query = $this->db->get("users");

        if ($user_query->num_rows() == 0) {
            error_log("ERROR: User with username $requester_user_id not found");
            $this->session->set_flashdata("error_msg", "المستخدم غير موجود في النظام.");
            redirect("dashboard");
            return;
        }

        $user = $user_query->row_array();
        $requester_user_id = $user["username"]; // Use the username from DB
        $requester_name = $user["name"]; // Use name from DB (more reliable)

        // Check if database column is INT or VARCHAR
        // Get column type for requester_user_id
        $column_info = $this->db->query("SHOW COLUMNS FROM job_requisitions LIKE 'requester_user_id'")->row_array();
        $column_type = $column_info["Type"];

        // Convert to INT if column is integer type
        if (strpos($column_type, "int") !== false) {
            $requester_user_id = (int) $requester_user_id;
        }

        // 1. Set validation rules for all fields
        $this->form_validation->set_rules("department", "القسم", "required|trim");
        $this->form_validation->set_rules("role_title", "المسمى الوظيفي", "required|trim");
        $this->form_validation->set_rules("employees_needed", "العدد المطلوب", "required|integer|greater_than[0]");
        $this->form_validation->set_rules("gender", "الجنس", "required");
        $this->form_validation->set_rules("region", "المنطقة", "required");
        $this->form_validation->set_rules("project_or_client", "المشروع/القسم", "required");
        $this->form_validation->set_rules("education_level", "المؤهل العلمي", "required");
        $this->form_validation->set_rules("age_range", "نطاق العمر", "required");
        $this->form_validation->set_rules("salary_min", "الحد الأدنى للراتب", "required|integer");
        $this->form_validation->set_rules("salary_max", "الحد الأعلى للراتب", "required|integer");
        $this->form_validation->set_rules("target_hire_date", "تاريخ التوظيف المستهدف", "required");
        $this->form_validation->set_rules("degree_major", "التخصص المطلوب", "trim");
        $this->form_validation->set_rules("experience_required", "الخبرة المطلوبة", "trim");
        $this->form_validation->set_rules("description", "الوصف الوظيفي", "trim");

        // 2. Check if validation passes
        if ($this->form_validation->run() === false) {
            // If validation fails, show the form again with errors
            $this->create();
        } else {
            // 3. Prepare data to insert into the database
            $data = [
                "requester_user_id" => $requester_user_id,
                "requester_name" => $requester_name,
                "department" => $this->input->post("department"),
                "role_title" => $this->input->post("role_title"),
                "employees_needed" => $this->input->post("employees_needed"),
                "gender" => $this->input->post("gender"),
                "region" => $this->input->post("region"),
                "project_or_client" => $this->input->post("project_or_client"),
                "target_hire_date" => $this->input->post("target_hire_date"),
                "education_level" => $this->input->post("education_level"),
                "age_range" => $this->input->post("age_range"),
                "degree_major" => $this->input->post("degree_major"),
                "salary_min" => $this->input->post("salary_min"),
                "salary_max" => $this->input->post("salary_max"),
                "experience_required" => $this->input->post("experience_required"),
                "description" => $this->input->post("description"),
                "status" => "بانتظار مدير التوظيف",
                "created_at" => date("Y-m-d H:i:s"),
            ];

            error_log("SUBMIT: Inserting requisition data: " . print_r($data, true));

            // 4. Insert data using the model
            $insert_id = $this->requisition_model->insert_requisition($data);

            if ($insert_id) {
                error_log("SUCCESS: Requisition created with ID: $insert_id");
                $this->session->set_flashdata("success_msg", "تم إرسال طلب التوظيف بنجاح.");
            } else {
                error_log("ERROR: Failed to insert requisition");
                $error = $this->db->error();
                error_log("DB Error: " . print_r($error, true));
                $this->session->set_flashdata("error_msg", "حدث خطأ أثناء إرسال الطلب.");
            }

            // 5. Redirect to the dashboard
            redirect("dashboard");
        }
    }
    public function debug_requisition()
    {
        echo "<h2>Debug: Last Inserted Requisitions</h2>";

        // Get last 5 requisitions
        $this->db->order_by("id", "DESC");
        $this->db->limit(5);
        $requisitions = $this->db->get("job_requisitions")->result_array();

        echo "<table border='1' cellpadding='5'>";
        echo "<tr>
            <th>ID</th>
            <th>Requester User ID</th>
            <th>Requester Name</th>
            <th>Job Title</th>
            <th>Department</th>
            <th>Status</th>
            <th>Created</th>
          </tr>";

        foreach ($requisitions as $req) {
            echo "<tr>";
            echo "<td>" . $req["id"] . "</td>";
            echo "<td>" . $req["requester_user_id"] . "</td>";
            echo "<td>" . $req["requester_name"] . "</td>";
            echo "<td>" . $req["role_title"] . "</td>";
            echo "<td>" . $req["department"] . "</td>";
            echo "<td>" . $req["status"] . "</td>";
            echo "<td>" . $req["created_at"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        die();
    }
    public function fix_session()
    {
        $username = $this->session->userdata("username");

        if ($username) {
            $this->db->where("username", $username);
            $query = $this->db->get("users");
            $data["user_data"] = $query->row_array();
        }

        $this->load->view("template/new_header", ["title" => "إصلاح الجلسة"]);
        $this->load->view("requisitions/fix_session", $data);
        $this->load->view("template/new_footer");
    }

    public function fix_session_action()
    {
        $correct_user_id = $this->input->post("correct_user_id");
        $correct_name = $this->input->post("correct_name");

        if ($correct_user_id && $correct_name) {
            $this->session->set_userdata([
                "user_id" => $correct_user_id,
                "name" => $correct_name,
            ]);

            $this->session->set_flashdata("success_msg", "تم تصحيح بيانات الجلسة بنجاح.");
        } else {
            $this->session->set_flashdata("error_msg", "البيانات غير صحيحة.");
        }

        redirect("dashboard");
    }
    public function debug_db()
    {
        // تفعيل عرض الأخطاء
        error_reporting(E_ALL);
        ini_set("display_errors", 1);

        echo "<h2>فحص قاعدة البيانات</h2>";

        // 1. التحقق من الاتصال
        echo "<h3>1. الاتصال بقاعدة البيانات:</h3>";
        if ($this->db->conn_id) {
            echo "<p style='color:green;'>✓ متصل بقاعدة البيانات بنجاح</p>";
        } else {
            echo "<p style='color:red;'>✗ فشل الاتصال بقاعدة البيانات</p>";
        }

        // 2. التحقق من وجود الجدول
        echo "<h3>2. التحقق من جدول job_requisitions:</h3>";
        if ($this->db->table_exists("job_requisitions")) {
            echo "<p style='color:green;'>✓ الجدول موجود</p>";

            // عرض هيكل الجدول
            $fields = $this->db->field_data("job_requisitions");
            echo "<h4>هيكل الجدول:</h4>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>الحقل</th><th>النوع</th><th>الطول</th><th>الافتراضي</th></tr>";
            foreach ($fields as $field) {
                echo "<tr>";
                echo "<td>{$field->name}</td>";
                echo "<td>{$field->type}</td>";
                echo "<td>{$field->max_length}</td>";
                echo "<td>{$field->default}</td>";
                echo "</tr>";
            }
            echo "</table>";

            // عرض عدد السجلات
            $count = $this->db->count_all("job_requisitions");
            echo "<p>عدد السجلات في الجدول: $count</p>";
        } else {
            echo "<p style='color:red;'>✗ الجدول غير موجود</p>";
        }

        // 3. اختبار إدراج بسيط
        echo "<h3>3. اختبار إدراج:</h3>";
        $test_data = [
            "requester_user_id" => 1,
            "requester_name" => "Test User",
            "department" => "Test Dept",
            "role_title" => "Test Role",
            "employees_needed" => 1,
            "gender" => "رجال",
            "region" => "الوسطى",
            "project_or_client" => "Test Project",
            "target_hire_date" => date("Y-m-d"),
            "education_level" => "بكالوريوس",
            "age_range" => "25-30",
            "salary_min" => 5000,
            "salary_max" => 8000,
            "status" => "بانتظار مدير التوظيف",
            "created_at" => date("Y-m-d H:i:s"),
        ];

        $this->db->trans_begin();
        $this->db->insert("job_requisitions", $test_data);

        if ($this->db->trans_status() === false) {
            $error = $this->db->error();
            echo "<p style='color:red;'>✗ فشل الإدراج: " . $error["message"] . "</p>";
            $this->db->trans_rollback();
        } else {
            $insert_id = $this->db->insert_id();
            echo "<p style='color:green;'>✓ نجح الإدراج، ID: $insert_id</p>";
            $this->db->trans_rollback(); // التراجع عن التغيير
        }

        // 4. عرض آخر 5 سجلات
        echo "<h3>4. آخر 5 طلبات:</h3>";
        $this->db->limit(5);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get("job_requisitions");

        if ($query->num_rows() > 0) {
            echo "<table border='1' cellpadding='5'>";
            echo "<tr>";
            foreach ($query->result_array()[0] as $key => $value) {
                echo "<th>$key</th>";
            }
            echo "</tr>";

            foreach ($query->result_array() as $row) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>لا توجد سجلات</p>";
        }

        die();
    }
    public function check_session()
    {
        echo "<h2>Current Session Data</h2>";
        echo "<pre>";
        print_r($this->session->all_userdata());
        echo "</pre>";

        echo "<h2>Checking Database for User</h2>";

        $user_id = $this->session->userdata("user_id");
        $user_id2 = $this->session->userdata("user_id2");
        $username = $this->session->userdata("username");

        echo "user_id: $user_id<br>";
        echo "user_id2: $user_id2<br>";
        echo "username: $username<br><br>";

        // Check user in database
        if ($user_id) {
            $this->db->where("id", $user_id);
            $query = $this->db->get("users");
            if ($query->num_rows() > 0) {
                echo "✓ User ID $user_id exists in database<br>";
            } else {
                echo "✗ User ID $user_id NOT found in database<br>";
            }
        }

        if ($user_id2) {
            $this->db->where("id", $user_id2);
            $query = $this->db->get("users");
            if ($query->num_rows() > 0) {
                echo "✓ User ID2 $user_id2 exists in database<br>";
            } else {
                echo "✗ User ID2 $user_id2 NOT found in database<br>";
            }
        }

        if ($username) {
            $this->db->where("username", $username);
            $query = $this->db->get("users");
            if ($query->num_rows() > 0) {
                $user = $query->row_array();
                echo "✓ Username $username exists in database. ID: " . $user["id"] . "<br>";
            } else {
                echo "✗ Username $username NOT found in database<br>";
            }
        }

        die();
    }
    public function approvals()
    {
        $data["title"] = "طلبات التوظيف المعلقة";
        $this->load->model("offer_model");

        $user_role = $this->session->userdata("role");
        $username = $this->session->userdata("username");

        // 1. Get Filter from URL (Default to 'pending')
        $filter = $this->input->get("offer_filter") ?? "pending";
        $data["current_filter"] = $filter;

        // 2. Logic for Job Requisitions (Existing)
        $data["requests"] = [];
        if ($user_role == "recruitment_manager") {
            $data["requests"] = $this->requisition_model->get_requisitions_by_status("بانتظار مدير التوظيف");
        } elseif ($user_role == "ceo") {
            $data["requests"] = $this->requisition_model->get_requisitions_by_status("بانتظار الرئيس التنفيذي");
        }

        $this->config->load("demo_data", true);
        if (empty($data["requests"]) && in_array($user_role, ["recruitment_manager", "ceo"])) {
            $status = ($user_role == "recruitment_manager") ? "بانتظار مدير التوظيف" : "بانتظار الرئيس التنفيذي";
            $demo_req = $this->config->item("demo_approval_requests", "demo_data");
            foreach ($demo_req as &$row) {
                $row["status"] = $status;
            }
            unset($row);
            $data["requests"] = $demo_req;
            $data["approvals_demo_mode"] = true;
        } else {
            $data["approvals_demo_mode"] = false;
        }

        // 3. Logic for Job Offers (For HR Manager 2230)
        $data["hr_offers"] = [];
        if ($username == "2230" || $user_role == "hr_manager") {
            // Use the new model function with filter
            $data["hr_offers"] = $this->offer_model->get_hr_offers($filter);
        }

        $this->load->view("template/new_header", $data);
        $this->load->view("requisitions/approval_list", $data);
        $this->load->view("template/new_footer");
    }

    /**
     * Page: "View & Approve a Single Requisition"
     * Shows the full details of one request.
     */
    public function view($id)
    {
        $data["title"] = "تفاصيل طلب التوظيف";

        $data["request"] = $this->requisition_model->get_requisition_by_id($id);

        if (empty($data["request"])) {
            show_404();
        }

        // Load views
        $this->load->view("template/new_header", $data);
        $this->load->view("requisitions/view_details", $data);
        $this->load->view("template/new_footer");
    }
    /**
     * Action: Processes the "Approve" or "Reject" submission.
     */

    // إضافة وظيفة تحديث الطلب
    public function update($id)
    {
        // التحقق من صلاحيات المستخدم
        $user_role = $this->session->userdata("role");
        $user_id = $this->session->userdata("user_id");

        // الحصول على بيانات الطلب
        $request = $this->requisition_model->get_requisition_by_id($id);

        if (empty($request)) {
            show_404();
        }

        // التحقق من الصلاحيات: فقط الرئيس التنفيذي يمكنه التعديل عندما يكون الطلب بانتظاره
        if ($user_role != "ceo" || $request["status"] != "بانتظار الرئيس التنفيذي") {
            $this->session->set_flashdata("error_msg", "ليس لديك الصلاحية لتعديل هذا الطلب.");
            redirect("requisitions/view/" . $id);
            return;
        }

        // التحقق من صحة البيانات
        $this->form_validation->set_rules(
            "salary_min",
            "الحد الأدنى للراتب",
            "required|numeric|greater_than_equal_to[0]",
        );
        $this->form_validation->set_rules(
            "salary_max",
            "الحد الأعلى للراتب",
            "required|numeric|greater_than_equal_to[0]",
        );
        $this->form_validation->set_rules("target_hire_date", "تاريخ التوظيف المستهدف", "required");

        // التحقق من أن الحد الأدنى أقل من أو يساوي الحد الأقصى
        $salary_min = $this->input->post("salary_min");
        $salary_max = $this->input->post("salary_max");
        if ($salary_min > $salary_max) {
            $this->form_validation->set_rules("salary_max", "الحد الأعلى للراتب", "callback_validate_salary_range");
        }

        if ($this->form_validation->run() === false) {
            // إذا فشل التحقق، إعادة التوجيه مع الأخطاء
            $this->session->set_flashdata("error_msg", validation_errors());
            redirect("requisitions/view/" . $id);
        } else {
            // تحضير البيانات للتحديث
            $data = [
                "salary_min" => $this->input->post("salary_min"),
                "salary_max" => $this->input->post("salary_max"),
                "target_hire_date" => $this->input->post("target_hire_date"),
                "last_modified_by" => $user_id,
                "last_modified_at" => date("Y-m-d H:i:s"),
            ];

            // تحديث البيانات
            $updated = $this->requisition_model->update_requisition($id, $data);

            if ($updated) {
                // تسجيل نشاط التعديل في سجل النشاطات (اختياري)
                $this->_log_activity($id, "تم تعديل تفاصيل الطلب بواسطة الرئيس التنفيذي");

                $this->session->set_flashdata("success_msg", "تم حفظ التعديلات بنجاح.");
            } else {
                $this->session->set_flashdata("error_msg", "حدث خطأ أثناء حفظ التعديلات.");
            }

            redirect("requisitions/view/" . $id);
        }
    }

    // دالة التحقق من نطاق الراتب
    public function validate_salary_range($salary_max)
    {
        $salary_min = $this->input->post("salary_min");
        if ($salary_min > $salary_max) {
            $this->form_validation->set_message(
                "validate_salary_range",
                "الحد الأدنى للراتب يجب أن يكون أقل من أو يساوي الحد الأقصى.",
            );
            return false;
        }
        return true;
    }

    // دالة تسجيل النشاطات (اختيارية)
    private function _log_activity($requisition_id, $action)
    {
        $log_data = [
            "requisition_id" => $requisition_id,
            "user_id" => $this->session->userdata("user_id"),
            "user_name" => $this->session->userdata("name"),
            "action" => $action,
            "created_at" => date("Y-m-d H:i:s"),
        ];

        // يمكنك إنشاء جدول للنشاطات إذا أردت
        $this->db->insert("requisition_activity_log", $log_data);
    }
    public function process_approval($id)
    {
        $action = $this->input->post("action"); // Will be 'approve' or 'reject'
        $notes = $this->input->post("notes");
        $user_role = $this->session->userdata("role");
        $user_id = $this->session->userdata("user_id");

        if ($action == "approve") {
            // === Recruitment Manager Approval ===
            if ($user_role == "recruitment_manager") {
                $data = [
                    "status" => "بانتظار الرئيس التنفيذي", // Next step in the workflow
                    "rm_approver_id" => $user_id,
                    "rm_notes" => $notes,
                    "rm_approved_at" => date("Y-m-d H:i:s"),
                ];
                $this->requisition_model->update_requisition($id, $data);
                $this->session->set_flashdata("success_msg", "تم اعتماد الطلب بنجاح وتم إرساله للرئيس التنفيذي.");

                // TODO: Send notification to CEO

                // === CEO Approval ===
            } elseif ($user_role == "ceo") {
                $data = [
                    "status" => "معتمد", // Final approval
                    "ceo_approver_id" => $user_id,
                    "ceo_notes" => $notes,
                    "ceo_approved_at" => date("Y-m-d H:i:s"),
                ];
                $this->requisition_model->update_requisition($id, $data);
                $this->session->set_flashdata(
                    "success_msg",
                    "تم اعتماد الطلب نهائياً. يمكن الآن تحويله إلى إعلان وظيفي.",
                );

                // TODO: Send notification to Recruitment Specialist
            }
        } elseif ($action == "reject") {
            // === If anyone rejects it ===
            $data = [
                "status" => "مرفوض",
            ];

            if ($user_role == "recruitment_manager") {
                $data["rm_notes"] = "مرفوض: " . $notes;
            } elseif ($user_role == "ceo") {
                $data["ceo_notes"] = "مرفوض: " . $notes;
            }

            $this->requisition_model->update_requisition($id, $data);
            $this->session->set_flashdata("success_msg", "تم رفض طلب التوظيف.");

            // TODO: Send notification to original manager
        }

        redirect("requisitions/approvals");
    }
}
