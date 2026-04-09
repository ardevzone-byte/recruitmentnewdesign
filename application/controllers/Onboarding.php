<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Onboarding extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("onboarding_model");
        $this->load->model("candidate_model");
        $this->load->model("offer_model");
        $this->load->library(["session", "email"]);
        $this->load->helper(["url", "form"]);

        if (!$this->session->userdata("logged_in")) {
            redirect("users/login");
        }
    }

    // 1. STEP 1: View to Select Dynamic Managers and Initiate Process
    public function initiate($application_id)
    {
        // Only 1291 (Recruitment Manager)
        $uid = $this->session->userdata("username");
        if ($uid != "1291" && $this->session->userdata("role") != "recruitment_manager") {
            redirect("dashboard");
        }

        $data["app_details"] = $this->candidate_model->get_full_application_details($application_id);

        // Check if tasks already exist
        $existing = $this->onboarding_model->get_tasks_by_application($application_id);
        if (!empty($existing)) {
            redirect("onboarding/track/" . $application_id); // Redirect to tracking if already started
        }

        // Get Users for Dropdown (Supervisors/Managers)
        $data["managers"] = $this->db->get("users")->result_array();

        $data["title"] = "بدء إجراءات التهيئة (Onboarding)";
        $this->load->view("template/new_header", $data);
        $this->load->view("onboarding/initiate", $data);
        $this->load->view("template/new_footer");
    }

    // 2. STEP 2: Process Submission & Send Emails
    public function submit_initiation()
    {
        // 1. Increase time limit for bulk emailing
        set_time_limit(0);

        $app_id = $this->input->post("application_id");
        $candidate_id = $this->input->post("candidate_id");

        // 2. Prepare the Email Configuration ONCE (For Speed)
        $email_config = [
            "protocol" => "smtp",
            "smtp_host" => "MAR-PRD-EXH01.MARSOOM.NET",
            "smtp_user" => "itsystem@marsoom.net",
            "smtp_pass" => "Asd@123123",
            "smtp_port" => 587,
            "smtp_crypto" => "tls",
            "mailtype" => "html",
            "charset" => "utf-8",
            "newline" => "\r\n",
            "crlf" => "\r\n",
            "wordwrap" => true,
            "smtp_timeout" => 30,
            "smtp_keepalive" => false, // <--- KEY FIX FOR SPEED
            "smtp_conn_options" => [
                "ssl" => [
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true,
                ],
            ],
        ];
        $this->load->library("email");
        $this->email->initialize($email_config);

        // 3. Define Tasks
        $tasks = [];

        // --- Fixed Users ---
        $tasks[] = [
            "uid" => "1526",
            "role" => "HR Admin",
            "desc" =>
                "1. Add Employee ID & Name\n2. Add Region & ID Number\n3. Add Mobile Number\n4. Issue Company Card",
        ];
        $tasks[] = [
            "uid" => "1195",
            "role" => "IT Support",
            "desc" => "1. Create Company Email\n2. Assign Phone Extension\n3. Handover Computer/Laptop",
        ];
        $tasks[] = ["uid" => "1835", "role" => "System Admin", "desc" => "Create User in the ERP/Internal Systems."];
        $tasks[] = ["uid" => "1127", "role" => "Security", "desc" => "Enroll Fingerprint in Attendance Device."];
        $tasks[] = ["uid" => "2666", "role" => "Training", "desc" => "Conduct Employee Orientation & Training."];

        // --- Dynamic Users (The ones failing) ---
        $sup_id = trim($this->input->post("supervisor_id"));
        $dm_id = trim($this->input->post("direct_manager_id"));
        $pm_id = trim($this->input->post("project_manager_id"));

        if (!empty($sup_id)) {
            $tasks[] = ["uid" => $sup_id, "role" => "Supervisor", "desc" => "Departmental Onboarding"];
        }
        if (!empty($dm_id)) {
            $tasks[] = ["uid" => $dm_id, "role" => "Direct Manager", "desc" => "Set Goals & Expectations"];
        }
        if (!empty($pm_id)) {
            $tasks[] = ["uid" => $pm_id, "role" => "Project Manager", "desc" => "Project Assignment"];
        }

        // 4. Get Candidate Info
        $candidate_info = $this->db->get_where("candidates", ["id" => $candidate_id])->row_array();
        $log_messages = [];

        // 2. Loop and Send
        foreach ($tasks as $task) {
            // A. Insert Task to Database (Your existing code)
            $db_data = [
                "application_id" => $app_id,
                "candidate_id" => $candidate_id,
                "assignee_user_id" => $task["uid"],
                "role_type" => $task["role"],
                "task_description" => $task["desc"],
                "status" => "Pending",
                "created_at" => date("Y-m-d H:i:s"),
            ];
            $this->db->insert("onboarding_tasks", $db_data);

            // B. Find User Data
            $user_query = $this->db->get_where("users", ["username" => $task["uid"]]);
            $user_info = $user_query->row_array();

            if (!$user_info || empty($user_info["email"])) {
                $log_messages[] = "⚠️ Skipped email for {$task["role"]} ({$task["uid"]}): User not found or no email.";
                continue;
            }

            // C. CRITICAL FIX: Re-initialize and Clean for every iteration
            $this->email->clear(true); // TRUE clears attachments and data
            $this->email->initialize($email_config); // Force new connection/handshake

            $this->email->from("IT.systems@marsoom.net", "Marsoom Onboarding");
            $this->email->to($user_info["email"]);
            $this->email->subject("✨ مهمة تهيئة موظف جديد - TEST EMAIL " . $candidate_info["full_name"]);

            $login_url = "https://services.marsoom.net/recruitment2";
            // Define Logo URL (Optional - if you have one, otherwise remove the img tag)
            // $logo_url = base_url('assets/img/logo.png');

            $html_body =
                "
<!DOCTYPE html>
<html lang='ar' dir='rtl'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
</head>
<body style='margin: 0; padding: 0; background-color: #f4f6f9; font-family: \"Tajawal\", Tahoma, Geneva, Verdana, sans-serif;'>
    
    <table border='0' cellpadding='0' cellspacing='0' width='100%' style='background-color: #f4f6f9; padding: 40px 0;'>
        <tr>
            <td align='center'>
                
                <table border='0' cellpadding='0' cellspacing='0' width='600' style='background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.05);'>
                    
                    <tr>
                        <td bgcolor='#001f3f' style='padding: 30px; text-align: center; color: #ffffff;'>
                            <h1 style='margin: 0; font-size: 24px; font-weight: bold;'>مهمة تهيئة جديدة</h1>
                            <p style='margin: 5px 0 0; opacity: 0.8; font-size: 14px; letter-spacing: 1px;'>ONBOARDING TASK</p>
                        </td>
                    </tr>

                    <tr>
                        <td style='padding: 40px; text-align: right; direction: rtl; color: #333333;'>
                            
                            <p style='margin-top: 0; font-size: 16px;'>مرحباً <strong>{$user_info["name"]}</strong>،</p>
                            
                            <p style='font-size: 16px; line-height: 1.6; color: #555;'>
                                يرجى العلم بانضمام الموظف الجديد <strong style='color: #001f3f;'>{$candidate_info["full_name"]}</strong> إلى فريق العمل.
                                <br>تم إسناد مهمة <strong>({$task["role"]})</strong> إليك.
                            </p>

                            <table border='0' cellpadding='0' cellspacing='0' width='100%' style='background-color: #eef2f7; border-right: 4px solid #001f3f; margin: 25px 0; border-radius: 4px;'>
                                <tr>
                                    <td style='padding: 20px;'>
                                        <p style='margin: 0 0 10px; font-size: 12px; color: #888; text-transform: uppercase; font-weight: bold;'>تفاصيل المهمة:</p>
                                        <p style='margin: 0; font-size: 15px; font-weight: 500; color: #000; line-height: 1.6;'>
                                            " .
                nl2br($task["desc"]) .
                "
                                        </p>
                                    </td>
                                </tr>
                            </table>

                            <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                <tr>
                                    <td align='center' style='padding-top: 10px;'>
                                        <a href='{$login_url}' style='display: inline-block; background-color: #28a745; color: #ffffff; text-decoration: none; padding: 14px 40px; border-radius: 6px; font-weight: bold; font-size: 16px; box-shadow: 0 2px 5px rgba(40, 167, 69, 0.3);'>
                                            الدخول للنظام
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <tr>
                        <td bgcolor='#f8f9fa' style='padding: 20px; text-align: center; font-size: 12px; color: #999999; border-top: 1px solid #eeeeee;'>
                            <p style='margin: 0;'>هذا بريد إلكتروني تلقائي من نظام التوظيف (Marsoom).</p>
                            <p style='margin: 5px 0 0;'>&copy; " .
                date("Y") .
                " جميع الحقوق محفوظة.</p>
                        </td>
                    </tr>

                </table>
                <p style='text-align: center; font-size: 12px; color: #b0b0b0; margin-top: 20px;'>
                   <a href='#' style='color: #b0b0b0; text-decoration: underline;'>Help Center</a> | <a href='#' style='color: #b0b0b0; text-decoration: underline;'>Contact Support</a>
                </p>

            </td>
        </tr>
    </table>
    </body>
</html>";
            $this->email->message($html_body);

            if ($this->email->send()) {
                $log_messages[] = "✅ Email sent to {$user_info["name"]} ({$task["role"]})";
            } else {
                $log_messages[] = "❌ Failed to send to {$user_info["name"]}";
            }
        }

        // 6. Show Result
        $final_msg = implode("<br>", $log_messages);
        if (strpos($final_msg, "❌") !== false) {
            $this->session->set_flashdata("error_msg", $final_msg);
        } else {
            $this->session->set_flashdata("success_msg", "تم بدء التهيئة بنجاح!<br>" . $final_msg);
        }

        redirect("onboarding/track/" . $app_id);
    }

    // 3. STEP 3: Tracking Dashboard for 1291
    public function track($application_id)
    {
        $uid = $this->session->userdata("username");
        if ($uid != "1291" && $this->session->userdata("role") != "recruitment_manager") {
            redirect("dashboard");
        }

        $data["app_details"] = $this->candidate_model->get_full_application_details($application_id);
        $data["tasks"] = $this->onboarding_model->get_tasks_by_application($application_id);

        $data["title"] = "متابعة مهام التهيئة";
        $this->load->view("template/new_header", $data);
        $this->load->view("onboarding/track_dashboard", $data);
        $this->load->view("template/new_footer");
    }

    // 4. Send Reminder (Resend Email)
    public function send_reminder($task_id)
    {
        $task = $this->onboarding_model->get_task_by_id($task_id);
        if ($task && $task["assignee_email"]) {
            $this->_send_onboarding_email(
                $task["assignee_email"],
                $task["assignee_name"],
                $task["full_name"],
                $task["task_description"],
                $task_id,
                true, // is_reminder
            );
            $this->session->set_flashdata("success_msg", "تم إرسال تذكير بنجاح.");
        } else {
            $this->session->set_flashdata("error_msg", "فشل الإرسال: لا يوجد بريد إلكتروني.");
        }
        redirect("onboarding/track/" . $task["application_id"]);
    }

    // 5. Employee View: My Tasks
    public function my_tasks()
    {
        $uid = $this->session->userdata("username");
        $data["tasks"] = $this->onboarding_model->get_my_pending_tasks($uid);
        $data["title"] = "مهامي (Onboarding Tasks)";

        $this->load->view("template/new_header", $data);
        $this->load->view("onboarding/my_tasks", $data);
        $this->load->view("template/new_footer");
    }

    // 6. Complete Task Logic
    public function complete_task_action()
    {
        $task_id = $this->input->post("task_id");
        $notes = $this->input->post("notes");
        $uid = $this->session->userdata("username");

        // Verify ownership
        $task = $this->onboarding_model->get_task_by_id($task_id);
        if ($task["assignee_user_id"] != $uid) {
            redirect("dashboard");
        }

        $this->onboarding_model->mark_complete($task_id, $uid, $notes);
        $this->session->set_flashdata("success_msg", "تم إكمال المهمة بنجاح.");
        redirect("onboarding/my_tasks");
    }

    // --- PRIVATE: Email Sender (Based on your provided template) ---
    private function _send_onboarding_email(
        $to_email,
        $emp_name,
        $candidate_name,
        $details,
        $task_id,
        $is_reminder = false,
    ) {
        $config = [];
        $config["protocol"] = "smtp";
        $config["smtp_host"] = "MAR-PRD-EXH01.MARSOOM.NET";
        $config["smtp_user"] = "itsystem@marsoom.net";
        $config["smtp_pass"] = "Asd@123123";
        $config["smtp_port"] = 587;
        $config["smtp_crypto"] = "tls";
        $config["mailtype"] = "html";
        $config["charset"] = "utf-8";
        $config["newline"] = "\r\n"; // Essential for Exchange
        $config["crlf"] = "\r\n"; // Essential for Exchange
        $config["wordwrap"] = true;
        $config["smtp_timeout"] = 30; // Increased timeout

        // ✅ FIX: Disable strict SSL verification to prevent "protocol is shutdown" error
        $config["smtp_conn_options"] = [
            "ssl" => [
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true,
            ],
        ];

        $this->email->initialize($config);
        $this->email->clear(true); // Reset email state

        $from_email = "IT.systems@marsoom.net";
        $this->email->from($from_email, "Marsoom Onboarding");
        $this->email->to($to_email);

        $subject_prefix = $is_reminder ? "🔔 تذكير: " : "✨ ";
        $subject = $subject_prefix . "مهمة تهيئة موظف جديد - TEST EMAIL" . $candidate_name;
        $this->email->subject($subject);

        $login_url = "https://services.marsoom.net/recruitment2";

        // HTML Template
        $html =
            '
        <!doctype html>
        <html lang="ar" dir="rtl">
        <body style="background:#f3f6fb;font-family:Tajawal;padding:20px;">
          <table width="600" style="background:#fff;margin:0 auto;border-radius:10px;overflow:hidden;box-shadow:0 2px 10px rgba(0,0,0,0.1);">
            <tr>
                <td style="background:#001f3f;padding:20px;color:#fff;text-align:center;">
                    <h2 style="margin:0;">Onboarding Task</h2>
                    <p style="margin:5px 0 0;opacity:0.8;">تهيئة موظف جديد</p>
                </td>
            </tr>
            <tr>
                <td style="padding:30px;">
                    <p style="font-size:16px;"><strong>عزيزي/تي:</strong> ' .
            $emp_name .
            '</p>
                    <p>يرجى العلم بإنضمام الموظف الجديد <strong>(' .
            $candidate_name .
            ')</strong>.</p>
                    
                    <div style="background:#f9f9f9;border-right:4px solid #FF8C00;padding:15px;margin:20px 0;">
                        <h3 style="margin-top:0;color:#FF8C00;">المطلوب منك:</h3>
                        <pre style="font-family:inherit;white-space:pre-wrap;">' .
            $details .
            '</pre>
                    </div>

                    <p>بعد الانتهاء من المهمة، يرجى الدخول للنظام وتأكيد الإنجاز.</p>
                    
                    <div style="text-align:center;margin-top:30px;">
                        <a href="' .
            $login_url .
            '" style="background:#001f3f;color:#fff;padding:12px 25px;text-decoration:none;border-radius:5px;font-weight:bold;">
                           تسجيل الدخول للنظام
                        </a>
                    </div>
                </td>
            </tr>
             <tr>
                <td style="background:#f4f4f4;padding:15px;text-align:center;font-size:12px;color:#666;">
                    © Marsoom Recruitment System
                </td>
            </tr>
          </table>
        </body>
        </html>';

        $this->email->message($html);

        // Wrap send in try-catch to prevent crashing the whole loop if one email fails
        try {
            if (!$this->email->send()) {
                // Log the specific error without stopping the script
                log_message("error", "Onboarding Email Failed: " . $this->email->print_debugger());
                return false;
            }
            return true;
        } catch (Exception $e) {
            log_message("error", "Onboarding Email Exception: " . $e->getMessage());
            return false;
        }
    }
}
