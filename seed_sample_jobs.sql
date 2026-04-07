-- Sample/Seed data for Jobs Dashboard demo
-- Run in MySQL: mysql -u root -p recruitment < seed_sample_jobs.sql
-- Or execute in phpMyAdmin / MySQL Workbench

-- 1. Insert sample job requisitions (approved, no job posting yet = pending publish)
INSERT IGNORE INTO `job_requisitions` (
  `id`, `requester_user_id`, `requester_name`, `department`, `role_title`, `employees_needed`,
  `gender`, `region`, `project_or_client`, `target_hire_date`, `education_level`, `age_range`, `degree_major`,
  `salary_min`, `salary_max`, `status`, `description`, `experience_required`, `created_at`, `ceo_approved_at`
) VALUES
(9001, 1, 'مدير الموارد البشرية', 'الموارد البشرية', 'مبرمج', 1, 'رجال', 'الوسطى', 'مشروع الراجحي', '2025-04-01', 'بكالوريوس', '25-30', '', 8000, 12000, 'معتمد', 'مطلوب مبرمج لدعم الأنظمة', 'سنتان فأكثر', NOW(), NOW()),
(9002, 1, 'مدير الموارد البشرية', 'المالية', 'مدير مالي', 1, 'رجال', 'الغربية', 'ادارة الموارد البشرية والإدارية', '2025-04-15', 'بكالوريوس', '30-35', '', 15000, 20000, 'معتمد', 'إدارة الشؤون المالية', '5 سنوات فأكثر', NOW(), NOW()),
(9003, 1, 'مدير الموارد البشرية', 'الموارد البشرية', 'اخصائي عمليات الموارد البشرية', 1, 'كلاهما', 'الوسطى', 'مشروع إمكان', '2025-05-01', 'بكالوريوس', '25-30', '', 7000, 10000, 'معتمد', 'عمليات التوظيف والاستقطاب', 'سنتان', NOW(), NOW()),
(9004, 1, 'مدير الموارد البشرية', 'القانونية', 'مستشار قانوني', 1, 'رجال', 'الشرقية', 'مشروع الأهلي', '2025-05-15', 'بكالوريوس', '30-35', '', 12000, 18000, 'معتمد', 'استشارات قانونية', '4 سنوات', NOW(), NOW()),
(9005, 1, 'مدير الموارد البشرية', 'المحاسبة', 'محاسب', 2, 'كلاهما', 'الوسطى', 'الادارة المالية', '2025-06-01', 'بكالوريوس', '25-30', '', 6000, 9000, 'معتمد', 'المحاسبة المالية', 'سنتان', NOW(), NOW()),
(9006, 1, 'مدير الموارد البشرية', 'تقنية المعلومات', 'مطور أنظمة ويب', 1, 'رجال', 'الغربية', 'ادارة تقنية المعلومات', '2025-06-15', 'بكالوريوس', '25-30', '', 10000, 15000, 'معتمد', 'تطوير تطبيقات الويب', '3 سنوات', NOW(), NOW());

-- 2. Insert published job postings for first 4 requisitions (so they appear in Published Jobs)
INSERT IGNORE INTO `job_postings` (`id`, `requisition_id`, `public_link_id`, `job_title`, `department`, `location`, `experience`, `job_description`, `status`, `created_by_user_id`, `created_at`)
SELECT 8001, 9001, 'pubjob9001abc', 'مبرمج', 'الموارد البشرية', 'الرياض - المكتب الرئيسي', 'سنتان فأكثر', 'مطلوب مبرمج لدعم الأنظمة', 'Published', '1526', NOW() FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM job_postings WHERE id=8001);
INSERT IGNORE INTO `job_postings` (`id`, `requisition_id`, `public_link_id`, `job_title`, `department`, `location`, `experience`, `job_description`, `status`, `created_by_user_id`, `created_at`)
SELECT 8002, 9002, 'pubjob9002def', 'مدير مالي', 'المالية', 'جدة', '5 سنوات فأكثر', 'إدارة الشؤون المالية', 'Published', '1526', NOW() FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM job_postings WHERE id=8002);
INSERT IGNORE INTO `job_postings` (`id`, `requisition_id`, `public_link_id`, `job_title`, `department`, `location`, `experience`, `job_description`, `status`, `created_by_user_id`, `created_at`)
SELECT 8003, 9003, 'pubjob9003ghi', 'اخصائي عمليات الموارد البشرية', 'الموارد البشرية', 'الرياض', 'سنتان', 'عمليات التوظيف والاستقطاب', 'Published', '1526', NOW() FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM job_postings WHERE id=8003);
INSERT IGNORE INTO `job_postings` (`id`, `requisition_id`, `public_link_id`, `job_title`, `department`, `location`, `experience`, `job_description`, `status`, `created_by_user_id`, `created_at`)
SELECT 8004, 9004, 'pubjob9004jkl', 'مستشار قانوني', 'القانونية', 'الدمام', '4 سنوات', 'استشارات قانونية', 'Published', '1526', NOW() FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM job_postings WHERE id=8004);
INSERT IGNORE INTO `job_postings` (`id`, `requisition_id`, `public_link_id`, `job_title`, `department`, `location`, `experience`, `job_description`, `status`, `created_by_user_id`, `created_at`)
SELECT 8005, 9005, 'pubjob9005mno', 'محاسب', 'المحاسبة', 'الرياض', 'سنتان', 'المحاسبة المالية', 'Published', '1526', NOW() FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM job_postings WHERE id=8005);
INSERT IGNORE INTO `job_postings` (`id`, `requisition_id`, `public_link_id`, `job_title`, `department`, `location`, `experience`, `job_description`, `status`, `created_by_user_id`, `created_at`)
SELECT 8006, 9006, 'pubjob9006pqr', 'مطور أنظمة ويب', 'تقنية المعلومات', 'جدة', '3 سنوات', 'تطوير تطبيقات الويب', 'Published', '1526', NOW() FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM job_postings WHERE id=8006);
