<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Interview_report_model extends CI_Model
{
    /** @var array<string,true>|null */
    private $_candidates_field_set = null;

    /** @return bool */
    private function _eval_table_exists()
    {
        return $this->db->table_exists('candidate_evaluations');
    }

    /** Column names on `candidates` for portable SELECT fragments. */
    private function _candidates_fields(): array
    {
        if ($this->_candidates_field_set !== null) {
            return $this->_candidates_field_set;
        }
        if (!$this->db->table_exists('candidates')) {
            $this->_candidates_field_set = [];
            return $this->_candidates_field_set;
        }
        $fields = $this->db->list_fields('candidates');
        $this->_candidates_field_set = array_fill_keys($fields, true);
        return $this->_candidates_field_set;
    }

    /** CV path column: schema varies (cv_file vs cv). Always exposed as cv_file. */
    private function _sql_cv_as_file(): string
    {
        $f = $this->_candidates_fields();
        if (isset($f['cv_file'])) {
            return 'c.cv_file';
        }
        if (isset($f['cv'])) {
            return 'c.cv AS cv_file';
        }
        return 'NULL AS cv_file';
    }

    public function get_report_rows(array $filters, $limit = 5000)
    {
        if (!$this->db->table_exists('candidates')) {
            return [];
        }
        if (!$this->db->table_exists('applications')) {
            return [];
        }
        if (!$this->_eval_table_exists()) {
            return $this->_get_report_rows_without_evaluations($filters, $limit);
        }

        // Subquery: latest application per candidate (MAX id)
        $latestAppSub = "
            SELECT a1.*
            FROM applications a1
            INNER JOIN (
                SELECT candidate_id, MAX(id) AS max_id
                FROM applications
                GROUP BY candidate_id
            ) t ON t.candidate_id = a1.candidate_id AND t.max_id = a1.id
        ";

        $cvSql = $this->_sql_cv_as_file();
        $this->db->select("
            c.id AS candidate_id,
            c.full_name,
            c.name_en,
            c.email,
            c.phone,
            c.id_number,
            {$cvSql},
            c.created_at AS candidate_created_at,
            c.nationality,
            c.marital_status,
            c.age,
            c.work_location,

            a.id AS application_id,
            a.status AS application_status,
            a.decision_by,
            urec.name AS decision_by_name,

            -- Aggregations for evaluations
            COUNT(ce.id) AS eval_count,
            SUM(CASE WHEN ce.status = 'completed' THEN 1 ELSE 0 END) AS completed_count,
            SUM(CASE WHEN ce.status = 'pending' OR ce.status IS NULL THEN 1 ELSE 0 END) AS pending_count,

            -- Overall status: if ANY completed => completed else pending
            CASE
              WHEN SUM(CASE WHEN ce.status = 'completed' THEN 1 ELSE 0 END) > 0 THEN 'completed'
              ELSE 'pending'
            END AS overall_eval_status,

            CASE
              WHEN SUM(CASE WHEN ce.status = 'completed' THEN 1 ELSE 0 END) > 0 THEN 'مكتمل'
              ELSE 'بانتظار التقييم'
            END AS overall_eval_status_ar,

            -- All completed_at: only if ALL evaluations completed and count>0
            CASE
              WHEN COUNT(ce.id) > 0 AND SUM(CASE WHEN ce.status = 'pending' THEN 1 ELSE 0 END) = 0
                THEN MAX(ce.completed_at)
              ELSE NULL
            END AS all_completed_at,

            -- Recommended salary: take MAX (or last) - here MAX
            MAX(ce.recommended_salary) AS recommended_salary,

            -- Lists
            GROUP_CONCAT(DISTINCT CONCAT(COALESCE(uev.name,''),'(',ce.evaluator_user_id,')') SEPARATOR ' | ') AS evaluators_list,
            GROUP_CONCAT(DISTINCT ce.score SEPARATOR ' | ') AS scores_list,

            -- last notes (latest created_at)
            SUBSTRING_INDEX(
              GROUP_CONCAT(ce.notes ORDER BY ce.created_at DESC SEPARATOR '||'),
              '||', 1
            ) AS last_notes
        ", false);

        $this->db->from('candidates c');
        $this->db->join("($latestAppSub) a", 'a.candidate_id = c.id', 'left');
        $this->db->join('users urec', 'urec.username = a.decision_by', 'left');

        $this->db->join('candidate_evaluations ce', 'ce.application_id = a.id', 'left');
        $this->db->join('users uev', 'uev.username = ce.evaluator_user_id', 'left');

        // Filters
        $q = trim((string)($filters['q'] ?? ''));
        if ($q !== '') {
            $this->db->group_start();
                $this->db->like('c.full_name', $q, 'both');
                $this->db->or_like('c.email', $q, 'both');
                $this->db->or_like('c.phone', $q, 'both');
                $this->db->or_like('c.id_number', $q, 'both');
            $this->db->group_end();
        }

        if (!empty($filters['date_from'])) {
            $this->db->where('c.created_at >=', $filters['date_from'] . ' 00:00:00');
        }
        if (!empty($filters['date_to'])) {
            $this->db->where('c.created_at <=', $filters['date_to'] . ' 23:59:59');
        }

        if (!empty($filters['app_status'])) {
            $this->db->where('a.status', $filters['app_status']);
        }

        if (!empty($filters['recruiter'])) {
            $this->db->where('a.decision_by', $filters['recruiter']);
        }

        // eval_status filter (overall)
        if (!empty($filters['eval_status'])) {
            $eval = $filters['eval_status'];
            if ($eval === 'completed') {
                $this->db->having("SUM(CASE WHEN ce.status = 'completed' THEN 1 ELSE 0 END) > 0", null, false);
            } elseif ($eval === 'pending') {
                $this->db->having("SUM(CASE WHEN ce.status = 'completed' THEN 1 ELSE 0 END) = 0", null, false);
            }
        }

        $this->db->group_by('c.id');
        $this->db->order_by('c.created_at', 'DESC');
        $this->db->limit((int)$limit);

        return $this->db->get()->result();
    }

    /**
     * When candidate_evaluations is missing: still list candidates + latest application (eval columns empty).
     */
    private function _get_report_rows_without_evaluations(array $filters, $limit = 5000)
    {
        if (!empty($filters['eval_status']) && $filters['eval_status'] === 'completed') {
            return [];
        }

        $latestAppSub = "
            SELECT a1.*
            FROM applications a1
            INNER JOIN (
                SELECT candidate_id, MAX(id) AS max_id
                FROM applications
                GROUP BY candidate_id
            ) t ON t.candidate_id = a1.candidate_id AND t.max_id = a1.id
        ";

        $cvSql = $this->_sql_cv_as_file();
        $this->db->select("
            c.id AS candidate_id,
            c.full_name,
            c.name_en,
            c.email,
            c.phone,
            c.id_number,
            {$cvSql},
            c.created_at AS candidate_created_at,
            c.nationality,
            c.marital_status,
            c.age,
            c.work_location,
            a.id AS application_id,
            a.status AS application_status,
            a.decision_by,
            urec.name AS decision_by_name,
            0 AS eval_count,
            0 AS completed_count,
            0 AS pending_count,
            'pending' AS overall_eval_status,
            'بانتظار التقييم (لا يوجد جدول تقييمات)' AS overall_eval_status_ar,
            NULL AS all_completed_at,
            NULL AS recommended_salary,
            NULL AS evaluators_list,
            NULL AS scores_list,
            NULL AS last_notes
        ", false);

        $this->db->from('candidates c');
        $this->db->join("($latestAppSub) a", 'a.candidate_id = c.id', 'left');
        $this->db->join('users urec', 'urec.username = a.decision_by', 'left');

        $q = trim((string)($filters['q'] ?? ''));
        if ($q !== '') {
            $this->db->group_start();
            $this->db->like('c.full_name', $q, 'both');
            $this->db->or_like('c.email', $q, 'both');
            $this->db->or_like('c.phone', $q, 'both');
            $this->db->or_like('c.id_number', $q, 'both');
            $this->db->group_end();
        }

        if (!empty($filters['date_from'])) {
            $this->db->where('c.created_at >=', $filters['date_from'] . ' 00:00:00');
        }
        if (!empty($filters['date_to'])) {
            $this->db->where('c.created_at <=', $filters['date_to'] . ' 23:59:59');
        }

        if (!empty($filters['app_status'])) {
            $this->db->where('a.status', $filters['app_status']);
        }

        if (!empty($filters['recruiter'])) {
            $this->db->where('a.decision_by', $filters['recruiter']);
        }

        $this->db->group_by('c.id');
        $this->db->order_by('c.created_at', 'DESC');
        $this->db->limit((int)$limit);

        return $this->db->get()->result();
    }

    public function get_summary(array $filters)
    {
        $rows = $this->get_report_rows($filters, 100000);

        $total_candidates = count($rows);
        $with_app = 0;
        $overall_completed = 0;
        $overall_pending = 0;
        $total_evals = 0;

        foreach ($rows as $r) {
            if (!empty($r->application_id)) $with_app++;
            $total_evals += (int)$r->eval_count;
            if ($r->overall_eval_status === 'completed') $overall_completed++;
            else $overall_pending++;
        }

        return [
            'total_candidates'   => $total_candidates,
            'with_application'   => $with_app,
            'overall_completed'  => $overall_completed,
            'overall_pending'    => $overall_pending,
            'total_evals'        => $total_evals,
        ];
    }

    public function get_recruiter_stats(array $filters)
    {
        if (!$this->_eval_table_exists()) {
            return [];
        }

        // نفس فلتر التاريخ والبحث، لكن نجمعها حسب decision_by
        $latestAppSub = "
            SELECT a1.*
            FROM applications a1
            INNER JOIN (
                SELECT candidate_id, MAX(id) AS max_id
                FROM applications
                GROUP BY candidate_id
            ) t ON t.candidate_id = a1.candidate_id AND t.max_id = a1.id
        ";

        $this->db->select("
            a.decision_by,
            u.name AS recruiter_name,
            COUNT(DISTINCT c.id) AS candidates_count,
            SUM(
              CASE WHEN (
                SELECT SUM(CASE WHEN ce2.status='completed' THEN 1 ELSE 0 END)
                FROM candidate_evaluations ce2
                WHERE ce2.application_id = a.id
              ) > 0 THEN 1 ELSE 0 END
            ) AS completed_candidates,
            SUM(
              CASE WHEN (
                SELECT SUM(CASE WHEN ce3.status='completed' THEN 1 ELSE 0 END)
                FROM candidate_evaluations ce3
                WHERE ce3.application_id = a.id
              ) = 0 THEN 1 ELSE 0 END
            ) AS pending_candidates
        ", false);

        $this->db->from('candidates c');
        $this->db->join("($latestAppSub) a", 'a.candidate_id = c.id', 'left');
        $this->db->join('users u', 'u.username = a.decision_by', 'left');

        // نفس فلترة التاريخ والبحث
        $q = trim((string)($filters['q'] ?? ''));
        if ($q !== '') {
            $this->db->group_start();
                $this->db->like('c.full_name', $q, 'both');
                $this->db->or_like('c.email', $q, 'both');
                $this->db->or_like('c.phone', $q, 'both');
                $this->db->or_like('c.id_number', $q, 'both');
            $this->db->group_end();
        }

        if (!empty($filters['date_from'])) {
            $this->db->where('c.created_at >=', $filters['date_from'] . ' 00:00:00');
        }
        if (!empty($filters['date_to'])) {
            $this->db->where('c.created_at <=', $filters['date_to'] . ' 23:59:59');
        }

        if (!empty($filters['app_status'])) {
            $this->db->where('a.status', $filters['app_status']);
        }

        $this->db->where('a.decision_by IS NOT NULL', null, false);
        $this->db->group_by('a.decision_by');
        $this->db->order_by('pending_candidates', 'DESC');
        $this->db->limit(20);

        return $this->db->get()->result();
    }

    public function get_application_status_counts(array $filters)
{
    if (!$this->db->table_exists('candidates') || !$this->db->table_exists('applications')) {
        return [];
    }

    $latestAppSub = "
        SELECT a1.*
        FROM applications a1
        INNER JOIN (
            SELECT candidate_id, MAX(id) AS max_id
            FROM applications
            GROUP BY candidate_id
        ) t ON t.candidate_id = a1.candidate_id AND t.max_id = a1.id
    ";

    $this->db->select("a.status AS app_status, COUNT(*) AS cnt", false);
    $this->db->from('candidates c');
    $this->db->join("($latestAppSub) a", 'a.candidate_id = c.id', 'left');

    // نفس فلتر التاريخ والبحث
    $q = trim((string)($filters['q'] ?? ''));
    if ($q !== '') {
        $this->db->group_start();
            $this->db->like('c.full_name', $q, 'both');
            $this->db->or_like('c.email', $q, 'both');
            $this->db->or_like('c.phone', $q, 'both');
            $this->db->or_like('c.id_number', $q, 'both');
        $this->db->group_end();
    }

    if (!empty($filters['date_from'])) {
        $this->db->where('c.created_at >=', $filters['date_from'] . ' 00:00:00');
    }
    if (!empty($filters['date_to'])) {
        $this->db->where('c.created_at <=', $filters['date_to'] . ' 23:59:59');
    }

    if (!empty($filters['recruiter'])) {
        $this->db->where('a.decision_by', $filters['recruiter']);
    }

    // لا نفلتر app_status هنا لأنه المطلوب توزيع الحالات
    $this->db->group_by('a.status');
    $this->db->order_by('cnt', 'DESC');

    $res = $this->db->get()->result();

    // رجّعها كـ array سهلة
    $out = [];
    foreach ($res as $r) {
        $key = (string)$r->app_status;
        if ($key === '' || $key === null) $key = 'بدون حالة';
        $out[$key] = (int)$r->cnt;
    }
    return $out;
}


}
