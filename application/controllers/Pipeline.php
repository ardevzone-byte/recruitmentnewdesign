<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Pipeline extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pipeline_model");
        $this->load->library("session");
        $this->load->helper("url");

        // Protect this controller
        if (!$this->session->userdata("logged_in")) {
            redirect("users/login");
        }
    }

    /**
     * Page: "Kanban Pipeline"
     * This is the main drag-and-drop dashboard.
     */
    public function index($job_id)
    {
        $data["job"] = $this->pipeline_model->get_job_details($job_id);
        if (empty($data["job"])) {
            show_404();
        }

        $data["title"] = "مسار التوظيف: " . $data["job"]["job_title"];

        // Get the filter value from GET parameter
        $location_filter = $this->input->get("location");
        $data["selected_location"] = $location_filter;

        // Pass filter to model
        $all_apps = $this->pipeline_model->get_applications_by_job($job_id, $location_filter);

        // Get unique work locations for filter dropdown
        $data["work_locations"] = $this->pipeline_model->get_unique_locations_by_job($job_id);

        // Define your workflow stages
        $data["stages"] = [
            "تقديم أولي" => [],
            "مطلوب استكمال البيانات" => [],
            "جديد" => [],
            "تحت المراجعة" => [],
            "مقابلة" => [],
            "عرض وظيفي" => [],
            "تم التوظيف" => [],
            "مرفوض" => [],
        ];

        // Group applicants into their stages
        foreach ($all_apps as $app) {
            if (array_key_exists($app["status"], $data["stages"])) {
                $data["stages"][$app["status"]][] = $app;
            }
        }

        $this->load->view("template/new_header", $data);
        $this->load->view("pipeline/kanban", $data);
        $this->load->view("template/new_footer");
    }

    /**
     * Action: (AJAX) Updates an applicant's status when a card is dropped.
     */
    public function update_status()
    {
        $input = json_decode(file_get_contents("php://input"), true);

        $application_id = $input["application_id"];
        $new_status = $input["new_status"];

        if (empty($application_id) || empty($new_status)) {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(["success" => false, "message" => "بيانات ناقصة."]));
            return;
        }

        $success = $this->pipeline_model->update_application_status($application_id, $new_status);

        if ($success) {
            $this->output->set_content_type("application/json")->set_output(json_encode(["success" => true]));
        } else {
            $this->output
                ->set_content_type("application/json")
                ->set_output(json_encode(["success" => false, "message" => "خطأ في تحديث قاعدة البيانات."]));
        }
    }
}
