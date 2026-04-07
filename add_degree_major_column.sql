-- Migration: Add missing columns to job_requisitions
-- Run this in MySQL (phpMyAdmin, MySQL Workbench, or: mysql -u root -p your_database < add_degree_major_column.sql)
-- Fixes: "Unknown column 'degree_major' in 'field list'"

-- Add degree_major column (if you get "Duplicate column" error, it already exists - that's OK)
ALTER TABLE job_requisitions ADD COLUMN degree_major VARCHAR(255) NULL AFTER age_range;

-- Add description column if missing (ignore error if column exists)
ALTER TABLE job_requisitions ADD COLUMN description TEXT NULL AFTER status;
