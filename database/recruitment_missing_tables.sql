-- One-shot fixes for common "page won't open" errors when the DB is missing module tables
-- or applications uses created_at without applied_at. Run against database `recruitment`:
--
--   mysql -u root -p recruitment < database/recruitment_missing_tables.sql
--
-- 1) candidate_evaluations
-- 2) onboarding_tasks
-- 3) Optional: add applied_at if you want a separate "application date" from created_at
--    (the app now falls back to created_at when applied_at is absent)

-- === 1) candidate_evaluations
CREATE TABLE IF NOT EXISTS `candidate_evaluations` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `application_id` int(11) UNSIGNED NOT NULL,
  `evaluator_user_id` varchar(50) NOT NULL DEFAULT '',
  `score` decimal(10,2) DEFAULT NULL,
  `status` enum('pending','completed') NOT NULL DEFAULT 'pending',
  `notes` text,
  `recommended_salary` decimal(12,2) DEFAULT NULL,
  `requested_by` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_ce_application_id` (`application_id`),
  KEY `idx_ce_evaluator` (`evaluator_user_id`),
  KEY `idx_ce_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- === 2) onboarding_tasks
CREATE TABLE IF NOT EXISTS `onboarding_tasks` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `application_id` int(11) UNSIGNED NOT NULL,
  `candidate_id` int(11) UNSIGNED NOT NULL,
  `assignee_user_id` varchar(50) NOT NULL DEFAULT '',
  `role_type` varchar(100) DEFAULT NULL,
  `task_description` text,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `created_at` datetime DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `completed_by` varchar(50) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`id`),
  KEY `idx_ot_application_id` (`application_id`),
  KEY `idx_ot_assignee` (`assignee_user_id`),
  KEY `idx_ot_status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- === 3) Optional: uncomment if your schema has no applied_at and you want it explicitly
-- ALTER TABLE `applications` ADD COLUMN `applied_at` datetime DEFAULT NULL AFTER `candidate_id`;
