-- Optional: align job_offers with code that tracks who created an offer (Reports / Offers).
-- Run only if your table exists but lacks any of: created_by, created_by_user_id, user_id

-- Example when you have no creator column at all:
-- ALTER TABLE job_offers
--   ADD COLUMN created_by INT NULL COMMENT 'users.id of creator' AFTER application_id;

-- After adding the column, you may backfill from session logs or leave NULL for legacy rows.
