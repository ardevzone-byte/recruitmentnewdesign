-- candidate_evaluations: per-application evaluation rows (used by InterviewReport, CandidateEvaluations2, Evaluation_model, etc.)
-- Run against your database (e.g. `recruitment`): mysql -u USER -p recruitment < database/candidate_evaluations_table.sql

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
