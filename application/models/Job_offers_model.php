<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Job_offers_model extends CI_Model
{
    protected $table = 'job_offers';
    protected $rec_db;    // recruitment3 (default)
    protected $orders_db; // orders

    public function __construct()
    {
        parent::__construct();
        $this->rec_db    = $this->load->database('default', TRUE);
        $this->orders_db = $this->load->database('orders_db', TRUE);
    }

    public function get_list(array $filters = [])
    {
        $db = $this->rec_db;

        $db->select("
            jo.id,
            jo.candidate_id,
            jo.employee_id,
            jo.id_number,
            jo.basic_salary,
            jo.housing_allowance,
            jo.transport_allowance,
            jo.communication_allowance,
            jo.total_salary,
            jo.start_date,
            jo.status,
            jo.docs_status,
            jo.hr_status,
            jo.candidate_response,
            jo.area,

            jo.supervisor_empno,
            jo.supervisor_name,
            jo.project_code,
            jo.project_name,

            c.full_name
        ", false);

        $db->from($this->table . " jo");
        $db->join("candidates c", "c.id = jo.candidate_id", "left");

        // ✅ فلترة بحث (اسم/رقم وظيفي/هوية) - LIKE
        if (!empty($filters['q'])) {
            $q = trim($filters['q']);
            $db->group_start()
                ->like('c.full_name', $q)
                ->or_like('jo.employee_id', $q)
                ->or_like('jo.id_number', $q)
            ->group_end();
        }

        if (!empty($filters['area'])) {
            $db->where('jo.area', $filters['area']);
        }

        if (!empty($filters['status'])) {
            $db->where('jo.status', $filters['status']);
        }

        $db->order_by('jo.id', 'DESC');

        return $db->get()->result_array();
    }

    public function get_stats(array $filters = [])
    {
        $db = $this->rec_db;

        // total
        $db->from($this->table . " jo");
        $db->join("candidates c", "c.id = jo.candidate_id", "left");

        if (!empty($filters['q'])) {
            $q = trim($filters['q']);
            $db->group_start()
                ->like('c.full_name', $q)
                ->or_like('jo.employee_id', $q)
                ->or_like('jo.id_number', $q)
            ->group_end();
        }
        if (!empty($filters['area']))   $db->where('jo.area', $filters['area']);
        if (!empty($filters['status'])) $db->where('jo.status', $filters['status']);

        $total = (int)$db->count_all_results();

        // by_area
        $db->select('jo.area, COUNT(*) as cnt', false)
           ->from($this->table . " jo")
           ->group_by('jo.area');
        $by_area = $db->get()->result_array();

        // by_status
        $db->select('jo.status, COUNT(*) as cnt', false)
           ->from($this->table . " jo")
           ->group_by('jo.status');
        $by_status = $db->get()->result_array();

        return [
            'total' => $total,
            'by_area' => $by_area,
            'by_status' => $by_status
        ];
    }

    public function update_offer_fields($id, array $data)
    {
        return $this->rec_db->where('id', (int)$id)->update($this->table, $data);
    }

    public function get_offer_by_id($id)
    {
        return $this->rec_db->get_where($this->table, ['id' => (int)$id])->row_array();
    }

    // ✅ Lookup Supervisor from orders.users
    public function lookup_supervisor_name($empno)
    {
        $empno = trim((string)$empno);
        if ($empno === '') return null;

        $row = $this->orders_db
            ->select('name')
            ->get_where('users', ['username' => $empno], 1)
            ->row_array();

        return $row['name'] ?? null;
    }

    // ✅ Lookup Project from orders.projects_list
    public function lookup_project_name($code)
    {
        $code = trim((string)$code);
        if ($code === '') return null;

        $row = $this->orders_db
            ->select('name')
            ->get_where('projects_list', ['code' => $code], 1)
            ->row_array();

        return $row['name'] ?? null;
    }
}
