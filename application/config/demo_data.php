<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * View-only demo rows when the database has no matching records.
 * Loaded via $this->config->load('demo_data', true);
 */

$config['demo_my_requests'] = [
    [
        'id' => 1,
        'role_title' => 'مبرمج',
        'department' => 'تقنية المعلومات',
        'project_or_client' => 'مشروع الراجحي',
        'region' => 'الرياض',
        'status' => 'معتمد',
        'created_at' => date('Y-m-d H:i:s', strtotime('-5 days')),
        'job_posting' => null,
        'application_count' => 0,
        'interview_count' => 0,
        'offer_count' => 0,
    ],
    [
        'id' => 2,
        'role_title' => 'مدير مالي',
        'department' => 'المالية',
        'project_or_client' => 'ادارة الموارد البشرية',
        'region' => 'جدة',
        'status' => 'بانتظار مدير التوظيف',
        'created_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
        'job_posting' => null,
        'application_count' => 0,
        'interview_count' => 0,
        'offer_count' => 0,
    ],
    [
        'id' => 3,
        'role_title' => 'محاسب',
        'department' => 'المالية',
        'project_or_client' => 'الادارة المالية',
        'region' => 'الرياض',
        'status' => 'بانتظار الرئيس التنفيذي',
        'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
        'job_posting' => null,
        'application_count' => 0,
        'interview_count' => 0,
        'offer_count' => 0,
    ],
];

$config['demo_published_jobs'] = [
    ['id' => 0, 'job_title' => 'مبرمج', 'project_or_client' => 'مشروع الراجحي', 'public_link_id' => '', 'applicant_counts' => ['total' => 12, 'interviewed' => 4, 'hired' => 2]],
    ['id' => 0, 'job_title' => 'مدير مالي', 'project_or_client' => 'ادارة الموارد البشرية', 'public_link_id' => '', 'applicant_counts' => ['total' => 8, 'interviewed' => 2, 'hired' => 1]],
    ['id' => 0, 'job_title' => 'اخصائي عمليات الموارد البشرية', 'project_or_client' => 'مشروع إمكان', 'public_link_id' => '', 'applicant_counts' => ['total' => 15, 'interviewed' => 6, 'hired' => 0]],
    ['id' => 0, 'job_title' => 'مستشار قانوني', 'project_or_client' => 'مشروع الأهلي', 'public_link_id' => '', 'applicant_counts' => ['total' => 5, 'interviewed' => 2, 'hired' => 1]],
    ['id' => 0, 'job_title' => 'محاسب', 'project_or_client' => 'الادارة المالية', 'public_link_id' => '', 'applicant_counts' => ['total' => 20, 'interviewed' => 8, 'hired' => 3]],
    ['id' => 0, 'job_title' => 'مطور أنظمة ويب', 'project_or_client' => 'ادارة تقنية المعلومات', 'public_link_id' => '', 'applicant_counts' => ['total' => 7, 'interviewed' => 3, 'hired' => 0]],
];

$config['demo_approval_requests'] = [
    [
        'id' => 101,
        'role_title' => 'مبرمج ويب',
        'department' => 'تقنية المعلومات',
        'project_or_client' => 'مشروع الراجحي',
        'region' => 'الرياض',
        'employees_needed' => 2,
        'created_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
    ],
    [
        'id' => 102,
        'role_title' => 'محاسب',
        'department' => 'المالية',
        'project_or_client' => 'الادارة المالية',
        'region' => 'جدة',
        'employees_needed' => 1,
        'created_at' => date('Y-m-d H:i:s', strtotime('-1 day')),
    ],
];
