-- onboarding_tasks: per-application onboarding checklist (Onboarding controller / Onboarding_model)
-- Run: mysql -u USER -p recruitment < database/onboarding_tasks_table.sql

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
