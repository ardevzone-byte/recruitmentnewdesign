<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Candidates_regions_report_model extends CI_Model
{
    private $table = 'candidates';

    private $allowed_companies = [
    'مكتب الدكتور صالح الجربوع للمحاماة',
    'شركة مرسوم لتحصيل الديون'
];



    private function apply_filters($filters)
    {
        // بحث عام
        if (!empty($filters['q'])) {
            $q = $filters['q'];
            $this->db->group_start()
                ->like('full_name', $q)
                ->or_like('email', $q)
                ->or_like('phone', $q)
                ->or_like('nationality', $q)
                ->or_like('company', $q)
                ->or_like('work_location', $q)
            ->group_end();
        }

        // فلتر منطقة
        if (!empty($filters['location'])) {
            $this->db->where('work_location', $filters['location']);
        }

        // فلتر تاريخ created_at
        if (!empty($filters['date_from'])) {
            $this->db->where('created_at >=', $filters['date_from'] . ' 00:00:00');
        }
        if (!empty($filters['date_to'])) {
            $this->db->where('created_at <=', $filters['date_to'] . ' 23:59:59');
        }
    }

    public function get_candidates($filters, $limit = 500)
    {
        $this->db->select('id, full_name, email, phone, cv_file, created_at, nationality, marital_status, work_location, company');
        $this->db->from($this->table);

        $this->apply_filters($filters);

        $this->db->order_by('created_at', 'DESC');
        $this->db->limit((int)$limit);

        return $this->db->get()->result_array();
    }

    public function count_candidates($filters)
    {
        $this->db->from($this->table);
        $this->apply_filters($filters);
        return (int)$this->db->count_all_results();
    }

    public function update_candidate($id, $data)
    {
        $this->db->where('id', (int)$id);
        $this->db->limit(1);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows() >= 0); // >=0 لأن نفس القيم قد لا تغيّر rows
    }

    public function stats_by_location($filters)
    {
        $this->db->select("work_location, COUNT(*) AS cnt", false);
        $this->db->from($this->table);

        $this->apply_filters($filters);

        $this->db->group_by('work_location');
        $this->db->order_by('cnt', 'DESC');
        $rows = $this->db->get()->result_array();

        // رجّع مصفوفة [location => count]
        $out = [];
        foreach ($rows as $r) {
            $key = (string)$r['work_location'];
            $out[$key === '' ? 'غير محدد' : $key] = (int)$r['cnt'];
        }
        return $out;
    }

    public function stats_top_nationalities($filters, $top = 8)
    {
        $this->db->select("nationality, COUNT(*) AS cnt", false);
        $this->db->from($this->table);
        $this->apply_filters($filters);
        $this->db->group_by('nationality');
        $this->db->order_by('cnt', 'DESC');
        $this->db->limit((int)$top);
        return $this->db->get()->result_array();
    }

    public function stats_top_companies($filters, $top = 8)
    {
        $this->db->select("company, COUNT(*) AS cnt", false);
        $this->db->from($this->table);
        $this->apply_filters($filters);
        $this->db->group_by('company');
        $this->db->order_by('cnt', 'DESC');
        $this->db->limit((int)$top);
        return $this->db->get()->result_array();
    }
}
