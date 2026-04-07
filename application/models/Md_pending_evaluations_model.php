<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Md_pending_evaluations_model extends CI_Model
{
    private $MD_EMPNO = '1001';

 public function get_pending_rows(array $filters, $limit = 5000)
{
    if (!$this->db->table_exists('candidate_evaluations')) {
        return [];
    }

    // ✅ آخر تقييم Pending للعضو المنتدب لكل application باستخدام MAX(id) (أكثر ثبات من created_at)
    $mdLatestPendingSub = "
        SELECT ce1.*
        FROM candidate_evaluations ce1
        INNER JOIN (
            SELECT application_id, MAX(id) AS max_id
            FROM candidate_evaluations
            WHERE evaluator_user_id = '{$this->MD_EMPNO}' AND status = 'pending'
            GROUP BY application_id
        ) t ON t.application_id = ce1.application_id AND t.max_id = ce1.id
        WHERE ce1.evaluator_user_id = '{$this->MD_EMPNO}' AND ce1.status = 'pending'
    ";

    $this->db->select("
        c.id AS candidate_id,
        c.full_name,
        c.email,
        c.phone,
        c.id_number,
        c.created_at AS candidate_created_at,

        a.id AS application_id,
        a.status AS application_status,
        a.decision_by,
        urec.name AS decision_by_name,

        md.id AS md_eval_id,
        md.status AS md_status,
        md.created_at AS md_created_at,
        md.notes AS md_notes,

        -- (اختياري) إحصائيات عامة للتقييمات داخل نفس الطلب
        COUNT(ce_all.id) AS eval_count,
        SUM(CASE WHEN ce_all.status='completed' THEN 1 ELSE 0 END) AS completed_count,
        SUM(CASE WHEN ce_all.status='pending' THEN 1 ELSE 0 END) AS pending_count
    ", false);

    $this->db->from('applications a');
    $this->db->join('candidates c', 'c.id = a.candidate_id', 'inner');
    $this->db->join('users urec', 'urec.username = a.decision_by', 'left');

    // ✅ وجود md inner join يعني لازم يكون عنده pending للعضو المنتدب 1001
    $this->db->join("($mdLatestPendingSub) md", 'md.application_id = a.id', 'inner');

    // ✅ احصائيات لكل التقييمات (بدون فلترة)
    $this->db->join('candidate_evaluations ce_all', 'ce_all.application_id = a.id', 'left');

    // Filters: بحث
    $q = trim((string)($filters['q'] ?? ''));
    if ($q !== '') {
        $this->db->group_start();
            $this->db->like('c.full_name', $q, 'both');
            $this->db->or_like('c.email', $q, 'both');
            $this->db->or_like('c.phone', $q, 'both');
            $this->db->or_like('c.id_number', $q, 'both');
        $this->db->group_end();
    }

    // فلترة التاريخ (على تاريخ إنشاء طلب تقييم العضو المنتدب md.created_at)
    if (!empty($filters['date_from'])) {
        $this->db->where('md.created_at >=', $filters['date_from'] . ' 00:00:00');
    }
    if (!empty($filters['date_to'])) {
        $this->db->where('md.created_at <=', $filters['date_to'] . ' 23:59:59');
    }

    if (!empty($filters['app_status'])) {
        $this->db->where('a.status', $filters['app_status']);
    }

    $this->db->group_by('a.id');
    $this->db->order_by('md.id', 'DESC');
    $this->db->limit((int)$limit);

    return $this->db->get()->result();
}


    public function get_summary(array $filters)
    {
        $rows = $this->get_pending_rows($filters, 100000);

        $total = count($rows);
        $by_status = [];
        foreach ($rows as $r) {
            $st = (string)$r->application_status;
            if ($st === '' || $st === null) $st = 'بدون حالة';
            $by_status[$st] = ($by_status[$st] ?? 0) + 1;
        }

        arsort($by_status);

        return [
            'total_pending' => $total,
            'by_app_status' => $by_status,
        ];
    }
}
