-- SMS platform tables for recruitment DB (import into same database as `database` in application/config/database.php).
-- Run once: mysql -u root -p recruitment < database/sms_platform_tables.sql

SET NAMES utf8mb4;

CREATE TABLE IF NOT EXISTS `sms_campaigns` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `region` varchar(64) NOT NULL,
  `message_body` text NOT NULL,
  `created_by_empno` varchar(64) DEFAULT NULL,
  `created_by_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'draft',
  `total_numbers` int unsigned NOT NULL DEFAULT 0,
  `success_count` int unsigned NOT NULL DEFAULT 0,
  `fail_count` int unsigned NOT NULL DEFAULT 0,
  `provider_last_response` text,
  PRIMARY KEY (`id`),
  KEY `idx_region` (`region`),
  KEY `idx_sent_at` (`sent_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `sms_campaign_recipients` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `campaign_id` int unsigned NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `status` varchar(32) NOT NULL DEFAULT 'pending',
  `sent_at` datetime DEFAULT NULL,
  `provider_response` text,
  PRIMARY KEY (`id`),
  KEY `idx_campaign` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
