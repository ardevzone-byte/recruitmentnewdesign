-- Sample data for Job Descriptions (الوصف الوظيفي)
-- Run: cmd /c "mysql -u root -p recruitment < seed_job_descriptions.sql"
-- Or in phpMyAdmin: Import this file into the recruitment database

-- Use job_offer_id = 1 (no FK constraint; ensure job_offers has at least id=1 if your schema requires it)
INSERT IGNORE INTO `job_descriptions` (
  `job_offer_id`, `employee_id`, `candidate_id`, `employee_name`, `job_title`,
  `supervisor_username`, `supervisor_name`, `hr_username`, `hr_name`,
  `description_text`, `status`, `created_by`, `created_at`, `updated_at`
) VALUES
(1, 'E001', 1, 'أحمد محمد العلي', 'مبرمج', '1526', 'مدير التقنية', 'admin', 'مدير الموارد البشرية', 'وصف وظيفة المبرمج: تطوير وصيانة أنظمة الشركة.', 'approved', 'admin', NOW() - INTERVAL 5 DAY, NOW()),
(1, 'E002', 2, 'فاطمة عبدالله السعيد', 'مدير مالي', '1526', 'مدير المالية', 'admin', 'مدير الموارد البشرية', 'وصف وظيفة المدير المالي: إدارة الشؤون المالية والميزانيات.', 'pending', 'admin', NOW() - INTERVAL 3 DAY, NULL),
(1, 'E003', 3, 'خالد سعيد الحربي', 'اخصائي موارد بشرية', '1526', 'مدير الموارد البشرية', 'admin', 'مدير الموارد البشرية', 'وصف وظيفة أخصائي الموارد البشرية: عمليات التوظيف والاستقطاب.', 'approved', 'admin', NOW() - INTERVAL 2 DAY, NOW()),
(1, 'E004', 4, 'نورة علي الدوسري', 'محاسب', '1526', 'مدير المحاسبة', 'admin', 'مدير الموارد البشرية', 'وصف وظيفة المحاسب: المحاسبة المالية والتدقيق.', 'rejected', 'admin', NOW() - INTERVAL 1 DAY, NOW()),
(1, 'E005', 5, 'عمر يوسف الغامدي', 'مستشار قانوني', '1526', 'المستشار العام', 'admin', 'مدير الموارد البشرية', 'وصف وظيفة المستشار القانوني: الاستشارات والعقود القانونية.', 'pending', 'admin', NOW(), NULL);
