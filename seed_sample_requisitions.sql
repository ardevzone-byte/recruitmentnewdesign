-- Sample requisitions for My Requests and Approvals
-- Run: cmd /c "mysql -u root recruitment < seed_sample_requisitions.sql"
-- Or execute in phpMyAdmin

-- 1. For My Requests: requisitions created by admin (use requester_user_id = 'admin' or your username)
INSERT INTO `job_requisitions` (
  `requester_user_id`, `requester_name`, `department`, `role_title`, `employees_needed`,
  `gender`, `region`, `project_or_client`, `target_hire_date`, `education_level`, `age_range`,
  `salary_min`, `salary_max`, `status`, `experience_required`, `created_at`
) VALUES
('admin', 'مدير النظام', 'تقنية المعلومات', 'مبرمج', 1, 'رجال', 'الرياض', 'مشروع الراجحي', '2026-05-01', 'بكالوريوس', '25-30', 8000, 12000, 'معتمد', 'سنتان فأكثر', DATE_SUB(NOW(), INTERVAL 5 DAY)),
('admin', 'مدير النظام', 'المالية', 'مدير مالي', 1, 'رجال', 'جدة', 'ادارة الموارد البشرية', '2026-05-15', 'بكالوريوس', '30-35', 15000, 20000, 'بانتظار مدير التوظيف', '5 سنوات فأكثر', DATE_SUB(NOW(), INTERVAL 2 DAY)),
('admin', 'مدير النظام', 'المحاسبة', 'محاسب', 1, 'كلاهما', 'الرياض', 'الادارة المالية', '2026-06-01', 'بكالوريوس', '25-30', 6000, 9000, 'بانتظار الرئيس التنفيذي', 'سنتان', DATE_SUB(NOW(), INTERVAL 1 DAY))
;

-- 2. For Approvals: extra pending requisitions - so RM/CEO see items when they have that role
INSERT INTO `job_requisitions` (
  `requester_user_id`, `requester_name`, `department`, `role_title`, `employees_needed`,
  `gender`, `region`, `project_or_client`, `target_hire_date`, `education_level`, `age_range`,
  `salary_min`, `salary_max`, `status`, `experience_required`, `created_at`
) VALUES
('1526', 'موظف توظيف', 'تقنية المعلومات', 'مبرمج ويب', 2, 'رجال', 'الرياض', 'مشروع الراجحي', '2026-05-20', 'بكالوريوس', '25-30', 9000, 14000, 'بانتظار مدير التوظيف', '3 سنوات', DATE_SUB(NOW(), INTERVAL 3 DAY)),
('1526', 'موظف توظيف', 'المالية', 'محاسب', 1, 'كلاهما', 'جدة', 'الادارة المالية', '2026-06-10', 'بكالوريوس', '25-30', 6500, 9500, 'بانتظار مدير التوظيف', 'سنتان', DATE_SUB(NOW(), INTERVAL 1 DAY))
;
