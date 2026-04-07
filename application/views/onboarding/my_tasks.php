<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div dir="rtl" class="rows col-12 jobs-dashboard recruitment-page onboarding-my-tasks">
  <div class="block col-12 mb-4 heading-white">
    <div class="head-table col-12">
      <h4><i class="bi bi-clipboard-check me-2"></i> مهام التهيئة المسندة إلي</h4>
      <p class="mb-0 text-muted small">Onboarding — المهام قيد الانتظار</p>
    </div>
  </div>

  <div class="block col-12">
    <?php if (empty($tasks)): ?>
        <div class="alert alert-success text-center py-5 mb-0">
            <h4><i class="fas fa-check-circle fa-2x mb-3"></i></h4>
            <p class="mb-0">لا توجد مهام معلقة لديك حالياً. شكراً لجهودك!</p>
        </div>
    <?php else: ?>
        <div class="row g-4">
            <?php foreach ($tasks as $t): ?>
            <div class="col-md-6">
                <div class="box col-12 p-0 h-100" style="border-right: 4px solid #f29220;">
                    <div class="p-3 border-bottom bg-white">
                        <strong>تهيئة موظف:</strong>
                        <span class="text-primary"><?= html_escape($t['full_name']) ?></span>
                    </div>
                    <div class="p-3">
                        <h6 class="text-muted mb-3">المسمى الوظيفي: <?= html_escape($t['job_title']) ?></h6>

                        <div class="bg-light p-3 rounded mb-3">
                            <strong>المطلوب إنجازه:</strong>
                            <p class="mb-0 mt-2"><?= nl2br(html_escape($t['task_description'])) ?></p>
                        </div>

                        <?= form_open('onboarding/complete_task_action') ?>
                        <input type="hidden" name="task_id" value="<?= (int) $t['id'] ?>">

                        <div class="mb-3">
                            <label class="form-label small">ملاحظات الإنجاز (اختياري)</label>
                            <textarea name="notes" class="form-control" rows="2" placeholder="تم تسليم الجهاز، تم إنشاء الايميل..."></textarea>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="button hex-btn justify-content-center" onclick="return confirm('هل أنت متأكد من إتمام المهمة؟')">
                                <i class="fas fa-check me-2"></i> تأكيد إنجاز المهمة
                            </button>
                        </div>
                        <?= form_close() ?>
                    </div>
                    <div class="p-2 small text-muted border-top">
                        تاريخ الإسناد: <?= date('Y-m-d', strtotime($t['created_at'])) ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
  </div>
</div>