<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Candidates extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // LOAD ALL MODELS HERE TO PREVENT ERRORS
        $this->load->model("candidate_model");
        $this->load->model("pipeline_model");
        $this->load->model("user_model");
        $this->load->model("interview_model");
        $this->load->model("offer_model");
        $this->load->model("evaluation_model"); // Critical for evaluations

        $this->load->library(["form_validation", "session", "upload"]);
        $this->load->helper(["url", "form"]);

        if (!$this->session->userdata("logged_in")) {
            redirect("users/login");
        }
    }

    // application/controllers/Candidates.php

    public function add_manual()
    {
        // Permission Check
        $user_id = $this->session->userdata("username");
        $allowed_users = ["1526", "1291", "2200", "2439"];
        if (!in_array($user_id, $allowed_users) && $this->session->userdata("role") != "recruitment_manager") {
            redirect("dashboard");
        }

        $data["title"] = "إضافة مرشح جديد / وظيفة جديدة";

        // Get active jobs
        $this->db->where("status", "Published");
        $data["jobs"] = $this->db->get("job_postings")->result_array();

        $this->load->view("template/new_header", $data);
        $this->load->view("candidates/add_manual", $data);
        $this->load->view("template/new_footer");
    }

    // --- 2. THE SUBMIT LOGIC (Ensures Application ID Exists) ---
    public function submit_manual()
    {
        $this->load->model("job_model");

        $job_id = $this->input->post("job_id");
        $new_position = $this->input->post("new_job_title");

        $company =
            $this->input->post("is_dr_saleh_office") == "1"
                ? "مكتب الدكتور صالح الجربوع للمحاماة"
                : "شركة مرسوم لتحصيل الديون";

        // A. Handle Job (Existing vs New)
        if (!empty($new_position)) {
            // Create Dummy Requisition (Required by DB)
            $req_data = [
                "requester_user_id" => $this->session->userdata("user_id") ?? 0,
                "requester_name" => $this->session->userdata("name") ?? "System",
                "department" => "General",
                "role_title" => $new_position,
                "employees_needed" => 1,
                "gender" => "Any",
                "region" => "Riyadh",
                "project_or_client" => "Manual Entry",
                "target_hire_date" => date("Y-m-d"),
                "education_level" => "N/A",
                "age_range" => "N/A",
                "degree_major" => "N/A",
                "salary_min" => 0,
                "salary_max" => 0,
                "experience_required" => "N/A",
                "description" => "Created via Manual Entry",
                "status" => "معتمد",
                "rm_approver_id" => $this->session->userdata("user_id"),
                "rm_approved_at" => date("Y-m-d H:i:s"),
                "ceo_approver_id" => $this->session->userdata("user_id"),
                "ceo_approved_at" => date("Y-m-d H:i:s"),
                "created_at" => date("Y-m-d H:i:s"),
            ];
            $this->db->insert("job_requisitions", $req_data);
            $req_id = $this->db->insert_id();

            // Create Job Posting
            $job_data = [
                "requisition_id" => $req_id,
                "job_title" => $new_position,
                "department" => "General",
                "location" => "Riyadh",
                "status" => "Published",
                "public_link_id" => bin2hex(random_bytes(8)),
                "created_at" => date("Y-m-d H:i:s"),
            ];
            $this->db->insert("job_postings", $job_data);
            $job_id = $this->db->insert_id();
        } elseif (empty($job_id)) {
            $this->session->set_flashdata("error_msg", "يجب اختيار وظيفة أو كتابة مسمى جديد.");
            redirect("candidates/add_manual");
            return;
        }

        // B. Handle CV Upload - FIXED VERSION
        $cv_file_name = "N/A";
        $pregnancy_declaration_name = "N/A"; // Initialize both variables

        // Upload CV file if exists
        if (!empty($_FILES["cv_file"]["name"])) {
            $config["upload_path"] = "./assets/cvs/";
            $config["allowed_types"] = "pdf|doc|docx|jpg|png";
            $config["max_size"] = 10240;
            $config["encrypt_name"] = true;
            $this->upload->initialize($config);

            if ($this->upload->do_upload("cv_file")) {
                $data = $this->upload->data();
                $cv_file_name = $data["file_name"];
            } else {
                // Log upload error but continue
                $upload_error = $this->upload->display_errors();
                log_message("error", "CV upload failed: " . $upload_error);
            }
        }

        // Upload pregnancy declaration if exists - NOTE: You need to reinitialize upload config
        if (!empty($_FILES["pregnancy_declaration"]["name"])) {
            $config2["upload_path"] = "./assets/cvs/";
            $config2["allowed_types"] = "pdf|doc|docx|jpg|png";
            $config2["max_size"] = 10240;
            $config2["encrypt_name"] = true;
            $this->upload->initialize($config2);

            if ($this->upload->do_upload("pregnancy_declaration")) {
                $data = $this->upload->data();
                $pregnancy_declaration_name = $data["file_name"];
            } else {
                $upload_error = $this->upload->display_errors();
                log_message("error", "Pregnancy declaration upload failed: " . $upload_error);
            }
        }

        // C. Create/Update Candidate
        $candidate_data = [
            "full_name" => $this->input->post("full_name"),
            "company" => $company,
            "email" => $this->input->post("email"),
            "phone" => $this->input->post("phone"),
            "cv_file" => $cv_file_name,
            "pregnancy_declaration" => $pregnancy_declaration_name,
            "created_at" => date("Y-m-d H:i:s"),
            // Additional fields from the form
            "name_en" => $this->input->post("name_en"),
            "id_number" => $this->input->post("id_number"),
            "nationality" => $this->input->post("nationality"),
            "date_of_birth" => $this->input->post("date_of_birth"),
            // Defaults for other required fields
            "iqama_file" => "N/A",
            "degree_file" => "N/A",
            "bank_iban_file" => "N/A",
            "work_location" => $this->input->post("area"),
        ];

        // Check if candidate exists
        $this->db->group_start();
        if (!empty($candidate_data["email"])) {
            $this->db->where("email", $candidate_data["email"]);
        }
        if (!empty($candidate_data["phone"])) {
            $this->db->or_where("phone", $candidate_data["phone"]);
        }
        $this->db->group_end();
        $existing = $this->db->get("candidates")->row_array();

        if ($existing) {
            $candidate_id = $existing["id"];
            $this->db->where("id", $candidate_id);
            $this->db->update("candidates", $candidate_data);
        } else {
            $this->db->insert("candidates", $candidate_data);
            $candidate_id = $this->db->insert_id();
        }

        // D. Create Application
        $app_exists = $this->db
            ->get_where("applications", [
                "candidate_id" => $candidate_id,
                "job_id" => $job_id,
            ])
            ->row();

        if ($app_exists) {
            $application_id = $app_exists->id;
            $this->session->set_flashdata("warning_msg", "هذا المرشح موجود بالفعل لهذه الوظيفة. تم نقلك لملفه.");
        } else {
            $app_data = [
                "candidate_id" => $candidate_id,
                "job_id" => $job_id,
                "status" => "جديد",
            ];
            $this->db->insert("applications", $app_data);
            $application_id = $this->db->insert_id();
            $this->session->set_flashdata("success_msg", "تم إضافة المرشح بنجاح.");
        }

        // E. Redirect to profile
        redirect("candidates/view/" . $application_id);
    }

    // application/controllers/Candidates.php

    // 1. Load the Edit Form
    public function edit_profile($application_id)
    {
        // Permission Check
        $user_id = $this->session->userdata("username");
        if (
            !in_array($user_id, ["1526", "1291", "2200", "2439"]) &&
            $this->session->userdata("role") != "recruitment_manager"
        ) {
            redirect("dashboard");
        }

        // Get Application FIRST
        $application = $this->db->get_where("applications", ["id" => $application_id])->row_array();

        if (!$application) {
            show_404();
        }

        // Get Candidate using the candidate_id from the application
        $candidate = $this->db->get_where("candidates", ["id" => $application["candidate_id"]])->row_array();

        if (!$candidate) {
            show_404();
        }

        // Now pass the correct data
        $data["application"] = $application;
        $data["candidate"] = $candidate;

        // Get latest education specifically for the form
        $this->db->where("candidate_id", $candidate["id"]); // Use candidate['id']
        $this->db->order_by("id", "DESC");
        $data["latest_education"] = $this->db->get("candidate_education")->row_array();

        $data["title"] = "تعديل بيانات المرشح";

        $this->load->view("template/new_header", $data);
        $this->load->view("candidates/edit_profile", $data);
        $this->load->view("template/new_footer");
    }
    // 2. Process the Update
    // application/controllers/Candidates.php
    // In application/controllers/Candidates.php

    // 1. Show the Transfer Form
    public function transfer_to_hr_form($application_id)
    {
        // Security check
        if (!$this->session->userdata("logged_in")) {
            redirect("users/login");
        }

        // Load models
        $this->load->model("candidate_model");
        $this->load->model("offer_model");

        // Get Data source
        $app_data = $this->candidate_model->get_full_application_details($application_id);
        $offer_data = $this->offer_model->get_offer_by_application($application_id);

        if (!$offer_data) {
            $this->session->set_flashdata("error_msg", "لا يوجد عرض وظيفي لهذا المرشح، لا يمكن النقل.");
            redirect("candidates/view/" . $application_id);
        }

        // Prepare data for the view (Pre-filling)
        $data["info"] = [
            "full_name" => $app_data["candidate"]["full_name"],
            "nationality" => $app_data["candidate"]["nationality"],
            "id_number" => $app_data["candidate"]["id_number"],
            "phone" => $app_data["candidate"]["phone"],
            "email" => $app_data["candidate"]["email"],
            "gender" => $app_data["candidate"]["gender"] ?? "Male", // Default if missing
            "marital_status" => $app_data["candidate"]["marital_status"],
            "religion" => $app_data["candidate"]["religion"],
            "department" => $app_data["job_postings"]["department"] ?? "", // Assuming join exists
            "position" => $app_data["job_postings"]["job_title"] ?? "",
            "role_title" => $app_data["job_postings"]["job_title"] ?? "",

            // Offer Data
            "employee_id" => $offer_data["employee_id"],
            "start_date" => $offer_data["start_date"],
            "basic_salary" => $offer_data["basic_salary"],
            "housing_allowance" => $offer_data["housing_allowance"],
            "transport_allowance" => $offer_data["transport_allowance"],
            "other_allowances" => $offer_data["communication_allowance"], // Mapping comms to other
            "total_salary" => $offer_data["total_salary"],
            "work_location" => $app_data["candidate"]["work_location"] ?? "Riyadh",
            // ============================================================
            // ✅ ADD THESE LINES TO FIX THE ISSUE
            // ============================================================
            "national_address_file" => $app_data["candidate"]["national_address_file"] ?? "",
            "commencement_form_file" => $app_data["candidate"]["commencement_form_file"] ?? "",
            "job_description_file" => $app_data["candidate"]["job_description_file"] ?? "",
            "confidentiality_form_file" => $app_data["candidate"]["confidentiality_form_file"] ?? "",
            "gosi_subscription_file" => $app_data["candidate"]["gosi_subscription_file"] ?? "",
            "experience_file" => $app_data["candidate"]["experience_file"] ?? "",
            "clearance_cert_file" => $app_data["candidate"]["clearance_cert_file"] ?? "",
            "medical_invoice" => $app_data["candidate"]["medical_invoice"] ?? "",
            "employment_guarantee_file" => $app_data["candidate"]["employment_guarantee_file"] ?? "",
            "lawyer_license_file" => $app_data["candidate"]["lawyer_license_file"] ?? "",
            "criminal_record_file" => $app_data["candidate"]["criminal_record_file"] ?? "",
            "medical_result" => $app_data["candidate"]["medical_result"] ?? "",
            "family_data_file" => $app_data["candidate"]["family_data_file"] ?? "",
            "immediate_work_file" => $app_data["candidate"]["immediate_work_file"] ?? "",
            // Also ensure these standard ones are passed if you need them
            "iqama_file" => $app_data["candidate"]["iqama_file"] ?? "",
            "degree_file" => $app_data["candidate"]["degree_file"] ?? "",
            "bank_iban_file" => $app_data["candidate"]["bank_iban_file"] ?? "",
            // ============================================================
        ];

        // Managers List for Dropdown (Fetch from LOCAL users table for now)
        $data["managers"] = $this->db->select("id, name, username")->get("users")->result_array();

        $data["title"] = "نقل الموظف لنظام الموارد البشرية (Orders)";
        $data["application_id"] = $application_id;

        $this->load->view("template/new_header", $data);
        $this->load->view("candidates/hr_transfer_form", $data);
        $this->load->view("template/new_footer");
    }

    // 2. Process the Transfer
    public function submit_hr_transfer()
    {
        $this->load->model("hr_integration_model");

        // Collect all POST data
        $data = $this->input->post();

        // Get Manager Name based on ID for the 'manager' text field in emp1
        $manager_info = $this->db->get_where("users", ["username" => $data["manager_id"]])->row_array();
        $data["manager_name"] = $manager_info ? $manager_info["name"] : "Unknown";

        // Insert into Orders DB
        if ($this->hr_integration_model->insert_employee_to_orders($data)) {
            // Update Application Status in Recruitment DB
            $this->db->where("id", $data["application_id"]);
            $this->db->update("applications", ["status" => "تم التوظيف", "decision_status" => "Approved"]);

            $this->session->set_flashdata("success_msg", "تم ترحيل بيانات الموظف إلى نظام الموارد البشرية بنجاح.");
            redirect("candidates/view/" . $data["application_id"]);
        } else {
            $this->session->set_flashdata("error_msg", "حدث خطأ أثناء الاتصال بقاعدة بيانات Orders.");
            redirect("candidates/transfer_to_hr_form/" . $data["application_id"]);
        }
    }
    public function update_profile_process()
    {
        $application_id = $this->input->post("application_id");
        $candidate_id = $this->input->post("candidate_id");

        // 1. Prepare Basic Candidate Data
        $candidate_data = [
            "full_name" => $this->input->post("full_name"),
            "company" => $this->input->post("company"),
            "email" => $this->input->post("email"),
            "phone" => $this->input->post("phone"),
            "age" => $this->input->post("age"),
            "marital_status" => $this->input->post("marital_status"),
            "pregnancy_status" => $this->input->post("pregnancy_status"),
            "number_of_children" => $this->input->post("number_of_children"),
            "nationality" => $this->input->post("nationality"),
            "id_number" => $this->input->post("id_number"),
            "address" => $this->input->post("address"), // Added
            "notes" => $this->input->post("notes"),
        ];

        // --- NEW: HANDLE CV FILE UPLOAD ---
        if (!empty($_FILES["cv_file"]["name"])) {
            $config["upload_path"] = "./assets/cvs/";
            $config["allowed_types"] = "pdf|doc|docx|jpg|png";
            $config["max_size"] = 10240; // 10MB
            $config["encrypt_name"] = true; // Randomize filename

            $this->load->library("upload", $config);
            $this->upload->initialize($config); // Re-init in case loaded previously

            if ($this->upload->do_upload("cv_file")) {
                $upload_data = $this->upload->data();
                // Add the new filename to the data array to be updated
                $candidate_data["cv_file"] = $upload_data["file_name"];
            } else {
                // Upload Failed: Set a warning but continue saving text data
                $error = $this->upload->display_errors("", "");
                $this->session->set_flashdata("warning_msg", "تم حفظ البيانات ولكن فشل رفع السيرة الذاتية: " . $error);
            }
        }

        if (!empty($_FILES["pregnancy_declaration"]["name"])) {
            $config["upload_path"] = "./assets/cvs/";
            $config["allowed_types"] = "pdf|doc|docx|jpg|png";
            $config["max_size"] = 10240; // 10MB
            $config["encrypt_name"] = true; // Randomize filename

            $this->load->library("upload", $config);
            $this->upload->initialize($config); // Re-init in case loaded previously

            if ($this->upload->do_upload("pregnancy_declaration")) {
                $upload_data = $this->upload->data();
                // Add the new filename to the data array to be updated
                $candidate_data["pregnancy_declaration"] = $upload_data["file_name"];
            } else {
                // Upload Failed: Set a warning but continue saving text data
                $error = $this->upload->display_errors("", "");
                $this->session->set_flashdata("warning_msg", "تم حفظ البيانات ولكن فشل رفع السيرة الذاتية: " . $error);
            }
        }
        // ----------------------------------

        // 2. Prepare Education Data
        $education_data = [
            "qualification" => $this->input->post("qualification"),
            "major" => $this->input->post("major"),
            "institution" => $this->input->post("institution"),
        ];

        // 3. Update DB
        $this->candidate_model->update_candidate_details($candidate_id, $candidate_data);

        // Only update education if fields are not empty
        if (!empty($education_data["qualification"])) {
            $this->candidate_model->update_latest_education($candidate_id, $education_data);
        }

        if (!$this->session->flashdata("warning_msg")) {
            $this->session->set_flashdata("success_msg", "تم تحديث البيانات والملفات بنجاح.");
        }

        redirect("candidates/view/" . $application_id);
    }
    public function profile($candidate_id)
    {
        // 1. Permission Check
        $user_id = $this->session->userdata("username");
        if (
            !in_array($user_id, ["1526", "1291", "2200", "2439"]) &&
            $this->session->userdata("role") != "recruitment_manager"
        ) {
            redirect("dashboard");
        }

        // 2. Fetch Basic Candidate Data
        $candidate = $this->candidate_model->get_candidate_only($candidate_id);
        if (!$candidate) {
            show_404();
        }

        // 3. Prepare Data Structure (Mimicking the structure of 'view' so view_profile.php works)
        $data["candidate"] = $candidate;

        // Fetch History directly
        $data["education"] = $this->db
            ->get_where("candidate_education", ["candidate_id" => $candidate_id])
            ->result_array();
        $data["experience"] = $this->db
            ->get_where("candidate_experience", ["candidate_id" => $candidate_id])
            ->result_array();

        // 4. Create Dummy Application Data (Crucial step)
        // We set ID to 0 or NULL to signal the View that this is not a real application
        $data["application"] = [
            "id" => 0,
            "job_title" => "ملف عام (أرشيف)",
            "status" => "Archive",
            "decision_status" => "N/A",
        ];

        // Empty arrays for job-specific data
        $data["interviews"] = [];
        $data["offer"] = [];
        $data["evaluations"] = [];
        $data["answers"] = [];
        $data["managers"] = [];
        $data["stages"] = [];

        $data["title"] = "الملف الشخصي: " . $candidate["full_name"];

        // 5. Load View
        $this->load->view("candidates/view_profile", $data);
    }
    public function link_job($candidate_id)
    {
        $data["candidate"] = $this->db->get_where("candidates", ["id" => $candidate_id])->row_array();

        // Get active jobs
        $this->db->where("status", "Published");
        $data["jobs"] = $this->db->get("job_postings")->result_array();

        $data["title"] = "ربط المرشح بوظيفة";

        $this->load->view("template/new_header", $data);
        echo '
        <div dir="rtl" class="container mt-5">
            <div class="col-md-6 mx-auto">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="fas fa-link"></i> ربط المرشح: ' .
            $data["candidate"]["full_name"] .
            '</h5>
                    </div>
                    <div class="card-body">
                        ' .
            form_open("candidates/submit_link_job") .
            '
                        <input type="hidden" name="candidate_id" value="' .
            $candidate_id .
            '">
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">اختر الوظيفة:</label>
                            <select name="job_id" class="form-select" required>
                                <option value="">-- اختر الوظيفة --</option>';
        foreach ($data["jobs"] as $j) {
            echo '<option value="' . $j["id"] . '">' . $j["job_title"] . "</option>";
        }
        echo '              </select>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-success fw-bold">حفظ وإنشاء طلب</button>
                        </div>
                        ' .
            form_close() .
            '
                    </div>
                </div>
            </div>
        </div>';
        $this->load->view("template/new_footer");
    }

    public function submit_link_job()
    {
        $cand_id = $this->input->post("candidate_id");
        $job_id = $this->input->post("job_id");

        // 1. Check if already applied
        $exists = $this->db
            ->get_where("applications", [
                "candidate_id" => $cand_id,
                "job_id" => $job_id,
            ])
            ->row();

        if ($exists) {
            $this->session->set_flashdata("error_msg", "هذا المرشح مربوط بهذه الوظيفة مسبقاً.");
        } else {
            // 2. Create Application
            $data = [
                "candidate_id" => $cand_id,
                "job_id" => $job_id,
                "status" => "جديد",
                //     'created_at' => date('Y-m-d H:i:s')
            ];
            $this->db->insert("applications", $data);
            $this->session->set_flashdata("success_msg", "تم ربط المرشح بالوظيفة بنجاح. ظهر زر الملف الآن.");
        }

        redirect("candidates/archive");
    }
    // In application/controllers/Candidates.php

    public function archive()
    {
        // Permission Check
        $user_id = $this->session->userdata("username");
        $allowed_users = ["1526", "1291", "2200", "2439"];
        if (!in_array($user_id, $allowed_users) && $this->session->userdata("role") != "recruitment_manager") {
            redirect("dashboard");
        }

        $data["title"] = "سجل جميع المرشحين";

        // 1. Get Inputs (Search + Status) - Using GET/POST combined to be safe
        $search_query = $this->input->post("search_query")
            ? $this->input->post("search_query", true)
            : $this->input->get("search_query", true);
        $status_filter = $this->input->post("status_filter")
            ? $this->input->post("status_filter", true)
            : $this->input->get("status_filter", true);

        // 2. Pass both to Model
        $data["candidates"] = $this->candidate_model->get_all_candidates_archive($search_query, $status_filter);

        // 3. Keep inputs for the view
        $data["search_q"] = $search_query;
        $data["current_status"] = $status_filter;

        $this->load->view("template/new_header", $data);
        $this->load->view("candidates/archive", $data);
        $this->load->view("template/new_footer");
    }
    // In application/controllers/Candidates.php

    public function submit_decision()
    {
        $app_id = $this->input->post("application_id");
        $decision = $this->input->post("decision");
        $notes = $this->input->post("decision_notes");

        // 1. Permission Check
        $current_user = $this->session->userdata("username");
        if ($current_user != "1291" && $this->session->userdata("role") != "recruitment_manager") {
            $this->session->set_flashdata("error_msg", "ليس لديك صلاحية اتخاذ القرار.");
            redirect("candidates/view/" . $app_id);
            return;
        }

        // 2. Update Database
        $data = [
            "decision_status" => $decision,
            "decision_by" => $this->session->userdata("user_id"),
            "decision_date" => date("Y-m-d H:i:s"),
            "decision_notes" => $notes,
            "status" => $decision == "approved" ? "عرض وظيفي" : "مرفوض",
        ];

        $this->db->where("id", $app_id);
        $this->db->update("applications", $data);

        // 3. AUTO-SEND SMS IF REJECTED
        if ($decision == "rejected") {
            // Get Candidate Phone & Name
            $this->db->select("c.phone, c.full_name");
            $this->db->from("applications a");
            $this->db->join("candidates c", "c.id = a.candidate_id");
            $this->db->where("a.id", $app_id);
            $info = $this->db->get()->row_array();

            if ($info) {
                // Construct the Arabic Message
                $message = "عزيزي/عزيزتي {$info["full_name"]}\n";
                $message .= "شكرًا لاهتمامك وحضورك للمقابلة الوظيفية في شركة مرسوم.\n";
                $message .= "نعتذر لعدم الترشيح في هذه المرحلة\n";
                $message .= "ونتمنى التواصل معك مستقبلًا عند توفر فرص مناسبه";

                // Send SMS using your existing helper
                $this->_send_sms_api($info["phone"], $message, $app_id, "rejection_msg");

                $this->session->set_flashdata("warning_msg", "تم رفض المرشح وإرسال رسالة الاعتذار (SMS) تلقائياً.");
            } else {
                $this->session->set_flashdata("warning_msg", "تم رفض المرشح (لم يتم العثور على بيانات لإرسال SMS).");
            }
        } else {
            $this->session->set_flashdata("success_msg", "تم اعتماد المرشح. يمكنك الآن إنشاء العرض الوظيفي.");
        }

        redirect("candidates/view/" . $app_id);
    }

    /**
     * Page: "View Full Applicant Profile"
     * This is the main profile page for a single applicant.
     */
    public function process_schedule()
    {
        $app_id = $this->input->post("application_id");

        if (!$app_id || !is_numeric($app_id)) {
            $this->session->set_flashdata("error_msg", "Invalid application ID");
            redirect("dashboard");
            return;
        }

        // Validation
        $this->form_validation->set_rules("interview_date", "التاريخ", "required");
        $this->form_validation->set_rules("interview_time", "الوقت", "required");
        $this->form_validation->set_rules("interview_type", "نوع المقابلة", "required");
        $this->form_validation->set_rules("location_or_link", "الرابط أو العنوان", "required");

        if ($this->form_validation->run() === false) {
            $this->session->set_flashdata("error_msg", validation_errors());
            redirect("candidates/view/" . $app_id);
            return;
        }

        // 1. Prepare Data
        $data = [
            "application_id" => $app_id,
            "interviewer_user_id" => $this->session->userdata("user_id"),
            "interview_date" => $this->input->post("interview_date"),
            "interview_time" => $this->input->post("interview_time"),
            "interview_type" => $this->input->post("interview_type"),
            "location_or_link" => $this->input->post("location_or_link"),
            "notes" => $this->input->post("notes"),
            "status" => "Scheduled",
        ];

        // 2. Save to Database
        $this->db->trans_start();
        $this->interview_model->schedule_interview($data);
        $this->pipeline_model->update_application_status($app_id, "مقابلة");
        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $this->session->set_flashdata("error_msg", "حدث خطأ في قاعدة البيانات");
        } else {
            // 3. SEND INTERVIEW SMS
            // Fetch candidate info first
            $this->db->select("c.phone, c.full_name, j.job_title");
            $this->db->from("applications a");
            $this->db->join("candidates c", "c.id = a.candidate_id");
            $this->db->join("job_postings j", "j.id = a.job_id");
            $this->db->where("a.id", $app_id);
            $info = $this->db->get()->row_array();

            if ($info) {
                // Construct Message
                $sms_body = "عزيزي/عزيزتي {$info["full_name"]}\n";
                $sms_body .= "تم تحديد موعد مقابلة لوظيفة {$info["job_title"]}\n";
                $sms_body .= "التاريخ: " . $data["interview_date"] . "\n";
                $sms_body .= "الوقت: " . date("h:i A", strtotime($data["interview_time"])) . "\n";
                $sms_body .= "الموقع/الرابط: " . $data["location_or_link"] . "\n";
                $sms_body .= "بالتوفيق، شركة مرسوم";

                // Send
                $result = $this->_send_sms_api($info["phone"], $sms_body, $app_id, "interview_invite");

                if ($result) {
                    $this->session->set_flashdata("success_msg", "تم جدولة المقابلة وإرسال رسالة SMS للمرشح بنجاح!");
                } else {
                    $this->session->set_flashdata("warning_msg", "تم جدولة المقابلة ولكن فشل إرسال الـ SMS.");
                }
            } else {
                $this->session->set_flashdata(
                    "success_msg",
                    "تم جدولة المقابلة (لم يتم العثور على بيانات المرشح للإرسال).",
                );
            }
        }

        redirect("candidates/view/" . $app_id);
    }
    /**
     * Send SMS to candidate for full form completion
     */
    public function send_form_invitation($application_id)
    {
        // Security Check
        $current_user = $this->session->userdata("username");
        if (
            $current_user != "1526" &&
            $current_user != "2200" &&
            $current_user != "2439" &&
            $this->session->userdata("role") != "ecruitment_manager"
        ) {
            $this->session->set_flashdata("error_msg", "ليس لديك الصلاحية.");
            redirect("dashboard");
            return;
        }

        // Get Application Data
        $this->db->select("a.*, c.phone, c.full_name, j.job_title");
        $this->db->from("applications a");
        $this->db->join("candidates c", "c.id = a.candidate_id");
        $this->db->join("job_postings j", "j.id = a.job_id");
        $this->db->where("a.id", $application_id);
        $application = $this->db->get()->row_array();

        if (empty($application)) {
            $this->session->set_flashdata("error_msg", "طلب التوظيف غير موجود.");
            redirect("dashboard");
            return;
        }

        // Generate Token
        $sms_token = bin2hex(random_bytes(16));

        // Update DB
        $this->db->where("id", $application_id);
        $this->db->update("applications", [
            "sms_token" => $sms_token,
            "token_expires_at" => date("Y-m-d H:i:s", strtotime("+7 days")),
            "status" => "مطلوب استكمال البيانات",
        ]);

        // Prepare Absolute Link
        $domain_url = "https://services.marsoom.net/recruitment2/";
        $full_form_url = $domain_url . "simple_apply/full_form/" . $sms_token;

        $message = "عزيزي/عزيزتي {$application["full_name"]}\n";
        $message .= "نرجو استكمال بيانات التوظيف لوظيفة {$application["job_title"]} عبر الرابط:\n";
        $message .= $full_form_url . "\n";
        $message .= "الرابط ساري لمدة 7 أيام\n";
        $message .= "شركة مرسوم";

        // Send SMS
        $this->_send_sms_api($application["phone"], $message, $application_id, "form_invitation");

        redirect("candidates/view/" . $application_id);
    }
    public function send_sms_invitation($application_id)
    {
        // Only allow user 1526 or recruitment manager
        $current_user = $this->session->userdata("username");
        if (
            $current_user != "1526" &&
            $current_user != "2200" &&
            $current_user != "2439" &&
            $this->session->userdata("role") != "recruitment_manager"
        ) {
            $this->session->set_flashdata("error_msg", "ليس لديك الصلاحية.");
            redirect("dashboard");
            return;
        }

        // Get application details
        $this->db->select("a.*, c.phone, c.full_name, j.job_title");
        $this->db->from("applications a");
        $this->db->join("candidates c", "c.id = a.candidate_id");
        $this->db->join("job_postings j", "j.id = a.job_id");
        $this->db->where("a.id", $application_id);
        $application = $this->db->get()->row_array();

        if (empty($application)) {
            $this->session->set_flashdata("error_msg", "طلب التوظيف غير موجود.");
            redirect("dashboard");
            return;
        }

        // Generate or use existing token
        if (empty($application["sms_token"])) {
            $sms_token = bin2hex(random_bytes(16));

            $this->db->where("id", $application_id);
            $this->db->update("applications", [
                "sms_token" => $sms_token,
                "token_expires_at" => date("Y-m-d H:i:s", strtotime("+7 days")),
                "status" => "مطلوب استكمال البيانات",
            ]);
        } else {
            $sms_token = $application["sms_token"];
        }

        // Generate full form URL
        $full_form_url = base_url("simple_apply/full_form/" . $sms_token);

        // Create SMS message (Arabic)
        $message = "عزيزي/عزيزتي {$application["full_name"]}\n";
        $message .= "شكراً لتقديمك على وظيفة {$application["job_title"]}\n";
        $message .= "يرجى إكمال بياناتك عبر الرابط:\n";
        $message .= $full_form_url . "\n";
        $message .= "ستنتهي صلاحية الرابط بعد 7 أيام";

        // TODO: Integrate with SMS Gateway API
        // For now, log it
        $sms_data = [
            "application_id" => $application_id,
            "phone" => $application["phone"],
            "token" => $sms_token,
            "sent_by_user_id" => $this->session->userdata("user_id"),
            "status" => "sent",
        ];

        $this->db->insert("application_sms_log", $sms_data);

        // Show success message with URL
        $this->session->set_flashdata(
            "success_msg",
            "تم إعداد رابط استكمال البيانات:<br>
         <strong>الرابط:</strong> $full_form_url<br>
         <strong>الرقم:</strong> {$application["phone"]}<br>
         <strong>الرسالة:</strong><br>" . nl2br(htmlspecialchars($message)),
        );

        redirect("candidates/view/" . $application_id);
    }
    public function detailed_debug()
    {
        // Force PHP to show us everything
        ini_set("display_errors", 1);
        error_reporting(E_ALL);

        echo "<style>body{font-family:monospace; background:#222; color:#fff; padding:20px;} 
          .box{border:1px solid #555; padding:15px; margin-bottom:20px; background:#333;}
          h2{border-bottom:1px solid #777; padding-bottom:10px; color:#4db8ff;}
          .bad{color:#ff4d4d; font-weight:bold;}
          .good{color:#00cc66; font-weight:bold;}
          table{width:100%; border-collapse:collapse; margin-top:10px;}
          th, td{border:1px solid #555; padding:8px; text-align:left;}
          th{background:#444;}
          </style>";

        echo "<h1>🔍 DEEP DATABASE FORENSICS</h1>";

        // ---------------------------------------------------------
        // TEST 1: LIST ALL EXISTING APPLICATION IDs
        // ---------------------------------------------------------
        echo "<div class='box'><h2>1. REAL 'applications' TABLE DATA</h2>";
        $query = $this->db->query("SELECT id, status, candidate_id FROM applications ORDER BY id ASC");
        $results = $query->result_array();

        if (empty($results)) {
            echo "<p class='bad'>CRITICAL: The 'applications' table is COMPLETELY EMPTY.</p>";
        } else {
            echo "<p>Here are the <b>ONLY</b> IDs that exist in your database right now:</p>";
            echo "<table><tr><th>ID</th><th>Status</th><th>Candidate ID</th></tr>";
            $ids = [];
            foreach ($results as $row) {
                $ids[] = $row["id"];
                echo "<tr>
                    <td>{$row["id"]}</td>
                    <td>{$row["status"]}</td>
                    <td>{$row["candidate_id"]}</td>
                  </tr>";
            }
            echo "</table>";

            $max_id = end($ids);
            echo "<br><b>MAX ID IS: $max_id</b>. <br>If you try to access view/" . ($max_id + 1) . ", it will FAIL.";
        }
        echo "</div>";

        // ---------------------------------------------------------
        // TEST 2: CHECK FOREIGN KEY CONSTRAINTS
        // ---------------------------------------------------------
        echo "<div class='box'><h2>2. FOREIGN KEY RULES ON 'interviews' TABLE</h2>";

        // This query asks the database engine for its internal rules
        $sql =
            "SELECT CONSTRAINT_NAME, TABLE_NAME, COLUMN_NAME, REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME 
            FROM information_schema.KEY_COLUMN_USAGE 
            WHERE TABLE_SCHEMA = '" .
            $this->db->database .
            "' 
            AND TABLE_NAME = 'interviews' 
            AND REFERENCED_TABLE_NAME IS NOT NULL";

        $fk_query = $this->db->query($sql);
        $fks = $fk_query->result_array();

        if (empty($fks)) {
            echo "<p class='bad'>WARNING: No Foreign Keys found. The database is NOT protecting your data integrity.</p>";
        } else {
            echo "<table><tr><th>Constraint Name</th><th>Your Column</th><th>Must Exist In Table</th><th>Target Column</th></tr>";
            foreach ($fks as $fk) {
                echo "<tr>
                    <td>{$fk["CONSTRAINT_NAME"]}</td>
                    <td>{$fk["COLUMN_NAME"]}</td>
                    <td>{$fk["REFERENCED_TABLE_NAME"]}</td>
                    <td>{$fk["REFERENCED_COLUMN_NAME"]}</td>
                  </tr>";
            }
            echo "</table>";
            echo "<br><p><b>Translation:</b> If you try to insert an interview with an <code>application_id</code> that is NOT in the list above (Section 1), the database will BLOCK it.</p>";
        }
        echo "</div>";

        // ---------------------------------------------------------
        // TEST 3: SIMULATE THE EXACT INSERT THAT IS FAILING
        // ---------------------------------------------------------
        echo "<div class='box'><h2>3. SIMULATION TEST</h2>";

        // We grab the highest valid ID from Test 1
        $valid_test_id = !empty($ids) ? $ids[0] : 9999;

        echo "<p>Test A: Inserting with a VALID ID ($valid_test_id)...</p>";

        // Use a transaction so we don't actually save junk data
        $this->db->trans_begin();
        $data_valid = [
            "application_id" => $valid_test_id,
            "interviewer_user_id" => 1,
            "interview_date" => date("Y-m-d"),
            "interview_time" => "10:00:00",
            "status" => "Scheduled",
        ];
        $this->db->insert("interviews", $data_valid);

        if ($this->db->trans_status() === false) {
            echo "<p class='bad'>FAILED even with valid ID: " . $this->db->error()["message"] . "</p>";
        } else {
            echo "<p class='good'>SUCCESS! The system accepts ID $valid_test_id.</p>";
        }
        $this->db->trans_rollback(); // Undo it

        echo "<hr>";

        // Now test the ID causing you grief (let's assume 7 based on your URL)
        $bad_id = 7;
        echo "<p>Test B: Inserting with TARGET ID ($bad_id)...</p>";

        $this->db->trans_begin(); // Start fresh transaction
        $data_bad = [
            "application_id" => $bad_id,
            "interviewer_user_id" => 1,
            "interview_date" => date("Y-m-d"),
            "interview_time" => "10:00:00",
            "status" => "Scheduled",
        ];

        // We expect this to fail if ID 7 doesn't exist
        @$this->db->insert("interviews", $data_bad); // Suppress PHP error, catch DB error
        $error = $this->db->error();

        if ($error["code"] != 0) {
            echo "<p class='bad'>FAILED as expected!</p>";
            echo "<b>Database Error Code:</b> " . $error["code"] . "<br>";
            echo "<b>Database Says:</b> " . $error["message"] . "<br>";
            echo "<br><b>VERDICT:</b> Application ID $bad_id DOES NOT EXIST in the 'applications' table.";
        } else {
            echo "<p class='good'>Wait... ID $bad_id actually worked? Then the ID exists!</p>";
        }
        $this->db->trans_rollback();

        echo "</div>";
        die();
    }
    public function test_connection()
    {
        echo "<h1>System Check</h1>";

        // 1. Check Model Loading
        echo "1. Loading Interview_model... ";
        try {
            $this->load->model("interview_model");
            echo "<span style='color:green'>SUCCESS</span><br>";
        } catch (Exception $e) {
            echo "<span style='color:red'>FAILED: " . $e->getMessage() . "</span><br>";
            return;
        }

        // 2. Check Database Table
        echo "2. Checking 'interviews' table... ";
        if ($this->db->table_exists("interviews")) {
            echo "<span style='color:green'>EXISTS</span><br>";
        } else {
            echo "<span style='color:red'>MISSING (Run the SQL!)</span><br>";
            return;
        }

        // 3. Check Insert Capability
        echo "3. Testing Dummy Insert... ";
        $data = [
            "application_id" => 1, // Ensure application ID 1 exists, or change this
            "interviewer_user_id" => 1,
            "interview_date" => date("Y-m-d"),
            "interview_time" => "12:00:00",
            "location_or_link" => "Test",
            "status" => "Scheduled",
        ];

        // We wrap this in a transaction so we don't actually save junk data
        $this->db->trans_start();
        if ($this->interview_model->schedule_interview($data)) {
            echo "<span style='color:green'>SUCCESS (Insert ID generated)</span><br>";
        } else {
            echo "<span style='color:red'>FAILED (Database Error)</span><br>";
            echo $this->db->error()["message"];
        }
        $this->db->trans_rollback(); // Undo the change
        echo "4. Transaction rolled back (Clean test).";
    }
    /**
     * Private Placeholder for SMS Integration
     * Logic will be added here later as requested.
     */
    private function _send_sms_placeholder($phone, $message)
    {
        // TODO: Integrate SMS Gateway API here (e.g., Twilio, Unifonic)
        // For now, we just log it to ensure the flow works.
        log_message("info", "SMS_MOCK: Sending to " . $phone . " Message: " . $message);
        return true;
    }
    public function view($application_id = null)
    {
        if (!$application_id) {
            redirect("dashboard");
        }

        // Fetch Full Data
        $data = $this->candidate_model->get_full_application_details($application_id);

        $data["interviews"] = $this->interview_model->get_interviews_by_application($application_id);
        $data["offer"] = $this->offer_model->get_offer_by_application($application_id);
        $data["evaluations"] = $this->evaluation_model->get_evaluations_by_app($application_id);
        $data["managers"] = $this->evaluation_model->get_all_managers();

        $data["title"] = "ملف المتقدم: " . ($data["candidate"]["full_name"] ?? "Unknown");
        $data["stages"] = [
            "جديد",
            "تحت المراجعة",
            "مقابلة",
            "مقابلة مع القسم",
            "مقبول",
            "لم يحضر",
            "عرض وظيفي",
            "احتياط",
            "تم التوظيف",
            "مرفوض",
            "مطلوب استكمال البيانات",
        ];

        //    $this->load->view('template/new_header', $data);
        $this->load->view("candidates/view_profile", $data);
        //   $this->load->view('template/new_footer');
    }
    // --- NEW: Request Evaluation (RM Action) ---
    // In application/controllers/Candidates.php

    public function request_evaluation()
    {
        $app_id = $this->input->post("application_id");
        $manager_ids = $this->input->post("manager_ids");

        if (empty($app_id)) {
            redirect("dashboard");
            return;
        }

        if (!empty($manager_ids)) {
            if (!is_array($manager_ids)) {
                $manager_ids = [$manager_ids];
            }

            $count = 0;
            foreach ($manager_ids as $mid) {
                $data = [
                    "application_id" => $app_id,
                    "evaluator_user_id" => $mid,
                    "requested_by" => $this->session->userdata("user_id"),
                    "status" => "pending",
                    "created_at" => date("Y-m-d H:i:s"),
                ];
                if ($this->evaluation_model->create_request($data)) {
                    $count++;
                }
            }
            $this->session->set_flashdata("success_msg", "تم إرسال $count طلبات تقييم.");
        }

        redirect("candidates/view/" . $app_id);
    }
    // --- NEW: Page for Managers to see their tasks ---
    public function my_pending_evaluations()
    {
        if (!$this->session->userdata("logged_in")) {
            redirect("users/login");
        }
        $user_id = $this->session->userdata("username");
        $data["title"] = "المهام والتقارير";

        $tasks = [];
        if ($this->db->table_exists("candidate_evaluations")) {
            // 1. Fetch Basic Task Data
            $this->db->select("ce.*, c.full_name, j.job_title, a.id as application_id");
            $this->db->from("candidate_evaluations ce");
            $this->db->join("applications a", "a.id = ce.application_id");
            $this->db->join("candidates c", "c.id = a.candidate_id");
            $this->db->join("job_postings j", "j.id = a.job_id");

            $this->db->group_start();
            $this->db->where("a.decision_status !=", "Rejected");
            $this->db->or_where("a.decision_status", null);
            $this->db->group_end();

            $this->db->where("ce.evaluator_user_id", $user_id);
            $this->db->where("ce.status", "pending");
            $this->db->order_by("ce.created_at", "DESC");

            $tasks = $this->db->get()->result_array();

            // Find Salary entered by 1526 OR 1291 for this candidate
            foreach ($tasks as &$task) {
                $salary_data = $this->db
                    ->select("recommended_salary")
                    ->from("candidate_evaluations")
                    ->where("application_id", $task["application_id"])
                    ->where_in("evaluator_user_id", ["1526", "1291", "3141"])
                    ->where("recommended_salary >", 0)
                    ->get()
                    ->row_array();

                $task["tech_salary"] = $salary_data ? $salary_data["recommended_salary"] : "";
            }
        } else {
            $this->session->set_flashdata(
                "error_msg",
                "جدول candidate_evaluations غير موجود. نفّذ database/candidate_evaluations_table.sql على قاعدة recruitment.",
            );
        }
        $data["tasks"] = $tasks;
        // ---------------------------------------------------------

        // 2. Fetch CEO Report (Keep existing logic)
        if ($user_id == "1001") {
            $this->load->model("report_model");
            $report_data = $this->report_model->get_ceo_team_matrix();
            $data["team_users"] = $report_data["users"];
            $data["job_columns"] = $report_data["jobs"];
            $data["matrix_data"] = $report_data["matrix"];
        } else {
            $data["team_users"] = [];
            $data["job_columns"] = [];
            $data["matrix_data"] = [];
        }

        $this->load->view("template/new_header", $data);
        $this->load->view("candidates/my_evaluations", $data);
        $this->load->view("template/new_footer", $data);
    }
    // --- NEW: Submit Evaluation (Manager Action) ---
    public function submit_evaluation_result()
    {
        if (!$this->session->userdata("logged_in")) {
            redirect("users/login");
        }

        $eval_id = $this->input->post("eval_id");

        if (!$this->db->table_exists("candidate_evaluations")) {
            $this->session->set_flashdata("error", "جدول candidate_evaluations غير موجود في قاعدة البيانات.");
            redirect("candidates/my_pending_evaluations");
            return;
        }

        // Prepare Data
        $data = [
            "score" => $this->input->post("score"),
            "notes" => $this->input->post("notes"),
            "status" => "completed",
            "completed_at" => date("Y-m-d H:i:s"),
        ];

        // ✅ FIX: Capture Recommended Salary if it exists
        $salary = $this->input->post("recommended_salary");
        if (!empty($salary)) {
            $data["recommended_salary"] = $salary;
        }

        // Update Database
        $this->db->where("id", $eval_id);
        $this->db->update("candidate_evaluations", $data);

        // Optional: Add success message
        $this->session->set_flashdata("success", "تم حفظ التقييم بنجاح");

        redirect("candidates/my_pending_evaluations");
    }
    // In Candidates.php

    public function send_rejection_sms($application_id)
    {
        // 1. Security Check (Same as other SMS functions)
        $current_user = $this->session->userdata("username");
        if (
            $current_user != "1526" &&
            $current_user != "2200" &&
            $current_user != "2439" &&
            $this->session->userdata("role") != "recruitment_manager"
        ) {
            $this->session->set_flashdata("error_msg", "ليس لديك الصلاحية.");
            redirect("dashboard");
            return;
        }

        // 2. Fetch Candidate Info
        $this->db->select("a.id, c.phone, c.full_name");
        $this->db->from("applications a");
        $this->db->join("candidates c", "c.id = a.candidate_id");
        $this->db->where("a.id", $application_id);
        $info = $this->db->get()->row_array();

        if (!$info) {
            $this->session->set_flashdata("error_msg", "البيانات غير موجودة.");
            redirect("candidates/view/" . $application_id);
            return;
        }

        // 3. Construct the Message
        // Note: \n creates a new line in SMS
        $message = "عزيزي/عزيزتي {$info["full_name"]}\n";
        $message .= "شكرًا لاهتمامك وحضورك للمقابلة الوظيفية في شركة مرسوم.\n";
        $message .= "نعتذر لعدم الترشيح في هذه المرحلة\n";
        $message .= "ونتمنى التواصل معك مستقبلًا عند توفر فرص مناسبه";

        // 4. Send using existing API function
        // We use 'rejection_msg' as the type for logging purposes
        $result = $this->_send_sms_api($info["phone"], $message, $application_id, "rejection_msg");

        // 5. Feedback and Redirect
        if ($result) {
            $this->session->set_flashdata("success_msg", "تم إرسال رسالة الاعتذار بنجاح.");

            // Optional: Auto-update status to 'Rejected' (Morfod) if you want to automate that too
            // $this->db->where('id', $application_id);
            // $this->db->update('applications', ['status' => 'مرفوض', 'decision_status' => 'rejected']);
        } else {
            $this->session->set_flashdata("warning_msg", "فشل إرسال الرسالة النصية.");
        }

        redirect("candidates/view/" . $application_id);
    }
    /**
     * Action: Updates the status of an application from the profile page.
     */

    public function update_status($app_id)
    {
        $this->pipeline_model->update_application_status($app_id, $this->input->post("status"));
        redirect("candidates/view/" . $app_id);
    }

    private function _send_sms_api($phone, $message, $app_id, $type)
    {
        $apiUrl = "https://api.oursms.com/api-a/msgs";
        $username = "marsoom";
        $token = "zcTlmZcAI8JLK2Qsb2bs";
        $src = "MARSOOM";

        $queryParams = http_build_query([
            "username" => $username,
            "token" => $token,
            "src" => $src,
            "dests" => $phone,
            "body" => $message,
        ]);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $apiUrl . "?" . $queryParams,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);

        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $status = $response !== false && $http_code == 200 ? "sent" : "failed";

        // Log to DB
        $sms_log = [
            "application_id" => $app_id,
            "phone" => $phone,
            "sent_by_user_id" => $this->session->userdata("user_id"),
            "status" => $status,
            "message_type" => $type, // 'form_invitation' or 'interview_invite'
            "sent_at" => date("Y-m-d H:i:s"),
        ];
        $this->db->insert("application_sms_log", $sms_log);

        return $status == "sent";
    }
}
