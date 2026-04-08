<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="rows col-12 jobs-dashboard recruitment-page candidate-attachments-page">
  <div id="main-content">
    <div class="container-fluid px-0">

      <div class="block col-12 mb-3 heading-white">
        <div class="head-table col-12 d-flex flex-wrap align-items-center justify-content-between gap-3">
          <div>
            <h4 class="mb-1"><i class="bi bi-paperclip me-2"></i> رفع مرفقات المرشح للوظيفة</h4>
            <p class="text-muted small mb-0">ابحث بالرقم الوظيفي أو اسم المرشح ثم أعد رفع المرفقات المطلوبة</p>
          </div>
          <a class="button hex-btn small" href="<?= site_url('dashboard'); ?>"><i class="bi bi-house-door me-1"></i> الرئيسية</a>
        </div>
      </div>

      <?php
        $flash_type = $this->session->flashdata('flash_type');
        $flash_msg  = $this->session->flashdata('flash_msg');
        if ($flash_msg):
      ?>
        <div class="alert alert-<?= html_escape($flash_type ?: 'info') ?> mb-3" role="alert"><?= nl2br(html_escape($flash_msg)) ?></div>
      <?php endif; ?>

      <?php if (!empty($error)): ?>
        <div class="alert alert-danger mb-3" role="alert"><?= html_escape($error) ?></div>
      <?php endif; ?>

      <div class="emp-table-card mb-3">
        <div class="emp-table-card__head">
          <h5 class="mb-0"><i class="bi bi-search me-2"></i> بحث عن مرشح</h5>
        </div>
        <div class="emp-table-card__body p-3 p-md-4">
          <form method="post" action="<?= site_url('CandidateAttachments/search'); ?>" class="row g-3 align-items-end">
            <div class="col-lg-9">
              <label class="form-label fw-semibold text-secondary small mb-1">نص البحث</label>
              <input type="text" name="q" value="<?= html_escape($q ?? '') ?>"
                     class="form-control candidate-attachments-page__input"
                     placeholder="الرقم الوظيفي (من عروض الوظائف) أو اسم المرشح">
              <div class="candidate-attachments-page__hint mt-2">
                <i class="bi bi-info-circle me-1"></i>
                يمكن البحث بالرقم الوظيفي أو اسم المرشح
              </div>
            </div>
            <div class="col-lg-3 d-grid">
              <button class="button default orange small w-100 justify-content-center" type="submit">
                <i class="bi bi-search me-1"></i> بحث
              </button>
            </div>
          </form>
        </div>
      </div>

      <?php if (!empty($result)): ?>
        <div class="emp-table-card mb-4">
          <div class="emp-table-card__head d-flex flex-wrap align-items-center justify-content-between gap-2">
            <h5 class="mb-0"><i class="bi bi-folder2-open me-2"></i> المرفقات</h5>
            <div class="d-flex flex-wrap gap-2">
              <span class="badge rounded-pill text-bg-light border"><?= html_escape($result->full_name ?? '-') ?></span>
              <span class="badge rounded-pill text-bg-light border">رقم وظيفي: <?= html_escape($result->offer_employee_id ?? '-') ?></span>
              <span class="badge rounded-pill text-bg-light border">#<?= (int)$result->id ?></span>
            </div>
          </div>
          <div class="emp-table-card__body p-3 p-md-4">
            <p class="text-secondary small mb-3">اختر الملفات ثم اضغط «حفظ المرفقات».</p>

            <form method="post" action="<?= site_url('CandidateAttachments/upload'); ?>" enctype="multipart/form-data">
              <input type="hidden" name="candidate_id" value="<?= (int)$result->id ?>">
              <input type="hidden" name="employee_id" value="<?= html_escape($result->offer_employee_id ?? '') ?>">

              <div class="row g-3 candidate-attachments-page__file-grid">
                <?php foreach (($file_cols ?? []) as $col => $label): ?>
                  <?php
                    $hasFile = !empty($result->$col);
                    $statusClass = $hasFile ? 'is-done' : 'is-pending';
                  ?>
                  <div class="col-12 col-md-6 col-xl-4">
                    <div class="candidate-attachments-page__tile <?= $statusClass ?>">
                      <div class="candidate-attachments-page__tile-head">
                        <span class="title"><i class="bi bi-file-earmark-arrow-up me-1"></i><?= html_escape($label) ?></span>
                        <span class="badge"><?= $hasFile ? 'مرفوع' : 'غير مرفوع' ?></span>
                      </div>
                      <input type="file" name="<?= html_escape($col) ?>" class="form-control form-control-sm candidate-attachments-page__file">

                      <?php if ($hasFile): ?>
                        <?php
                          $filePath = (string)$result->$col;
                          $safe = (strpos($filePath, 'uploads/candidates/') === 0);
                          $fileUrl = $safe ? base_url($filePath) : '#';
                        ?>
                        <?php if ($safe): ?>
                          <a class="button default orange small mt-2 d-inline-flex" href="<?= html_escape($fileUrl) ?>" target="_blank" rel="noopener">
                            <i class="bi bi-eye me-1"></i> عرض المرفق
                          </a>
                        <?php endif; ?>
                      <?php else: ?>
                        <div class="small text-muted mt-2">يمكن رفع أي نوع ملف.</div>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>

              <div class="d-flex flex-wrap gap-2 mt-4">
                <button type="submit" class="button default orange small">
                  <i class="bi bi-cloud-upload me-1"></i> حفظ المرفقات
                </button>
                <a href="<?= site_url('CandidateAttachments'); ?>" class="button hex-btn small">
                  <i class="bi bi-arrow-counterclockwise me-1"></i> بحث جديد
                </a>
              </div>
            </form>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>
