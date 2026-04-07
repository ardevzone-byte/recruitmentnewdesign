-- Job Description Module Tables
-- Run this in your MySQL database (recruitment) to fix the "Table doesn't exist" error

USE recruitment;

-- Table: job_descriptions
CREATE TABLE IF NOT EXISTS `job_descriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_offer_id` int(11) NOT NULL,
  `employee_id` varchar(50) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `employee_name` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `supervisor_username` varchar(100) DEFAULT NULL,
  `supervisor_name` varchar(255) DEFAULT NULL,
  `hr_username` varchar(100) DEFAULT NULL,
  `hr_name` varchar(255) DEFAULT NULL,
  `description_text` text,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_offer_id` (`job_offer_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table: job_description_approvals
CREATE TABLE IF NOT EXISTS `job_description_approvals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_description_id` int(11) NOT NULL,
  `role` enum('employee','supervisor','hr') DEFAULT NULL,
  `approver_username` varchar(100) DEFAULT NULL,
  `approver_name` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `signature_type` varchar(50) DEFAULT NULL,
  `signature_file` varchar(255) DEFAULT NULL,
  `note` text,
  `signed_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `job_description_id` (`job_description_id`),
  CONSTRAINT `fk_jd_approvals` FOREIGN KEY (`job_description_id`) REFERENCES `job_descriptions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
