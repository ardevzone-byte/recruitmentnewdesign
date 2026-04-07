<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div dir="rtl" class="rows col-12">
    <div class="block col-12 mb-4">
        <div class="head-table col-12 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <h4><i class="bi bi-journal-plus me-2"></i> إنشاء وصف وظيفي</h4>
                <p class="text-muted mb-0">اختيار الموظف + كتابة الوصف + تحديد المعتمدين</p>
            </div>
            <a href="<?= site_url('job_description'); ?>" class="button default orange outline small">
                <i class="bi bi-arrow-right me-1"></i> رجوع
            </a>
        </div>
    </div>

    <div class="block col-12">
        <div class="box col-12">
            <?php if (validation_errors()): ?>
                <div class="alert alert-danger mb-3"><?= validation_errors(); ?></div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('job_description/store'); ?>">
                <div class="row g-3">
                    <div class="col-lg-6">
                        <label class="form-label fw-bold">اختيار الموظف (من Job Offers)</label>
                        <select class="form-select" name="job_offer_id" required>
                            <option value="">— اختر —</option>
                            <?php foreach ($offers as $o): ?>
                                <option value="<?= (int)$o['job_offer_id'] ?>">
                                    #<?= (int)$o['job_offer_id'] ?> | <?= html_escape($o['full_name'] ?? '—') ?> (<?= html_escape($o['employee_id']) ?>) — <?= html_escape($o['job_title'] ?? '—') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <small class="text-muted d-block mt-1">يتم جلب الاسم من candidates والمسمى من job_postings</small>
                    </div>

                    <div class="col-lg-3">
                        <label class="form-label fw-bold">المشرف المباشر</label>
                        <select class="form-select" name="supervisor_username" required>
                            <option value="">— اختر —</option>
                            <?php foreach ($users as $u): ?>
                                <option value="<?= html_escape($u['username']) ?>"><?= html_escape($u['name']) ?> (<?= html_escape($u['username']) ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label class="form-label fw-bold">مدير الموارد البشرية</label>
                        <select class="form-select" name="hr_username" required>
                            <option value="">— اختر —</option>
                            <?php foreach ($users as $u): ?>
                                <option value="<?= html_escape($u['username']) ?>"><?= html_escape($u['name']) ?> (<?= html_escape($u['username']) ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-bold">الوصف الوظيفي</label>
                        <textarea class="form-control" name="description_text" rows="8" placeholder="اكتب الوصف الوظيفي بالكامل..." required><?= set_value('description_text') ?></textarea>
                        <small class="text-muted d-block mt-1">يفضل لصق نموذج الوصف (المهام، المؤهلات، المهارات، المؤشرات، الصلاحيات...)</small>
                    </div>

                    <div class="col-12 d-flex gap-2 flex-wrap">
                        <button type="submit" class="button hex-btn">
                            <i class="bi bi-floppy me-1"></i> حفظ وإرسال للموافقات
                        </button>
                        <a href="<?= site_url('job_description'); ?>" class="button default orange outline small">
                            <i class="bi bi-x-lg me-1"></i> إلغاء
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
