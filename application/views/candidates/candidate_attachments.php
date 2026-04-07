<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
.candidate-attachments-embed { background: #f8fafc; padding: 1rem 0 2rem; }
.candidate-attachments-embed .wrap { max-width: 1200px; margin: 0 auto; padding: 0 1rem; }
.candidate-attachments-embed .card { background: #fff; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,.08); border: 1px solid #e2e8f0; }
</style>
<div class="candidate-attachments-embed">
  <div class="bg-pattern"></div>
  <div class="floating-orb orb-1"></div>
  <div class="floating-orb orb-2"></div>
  <div class="floating-orb orb-3"></div>

  <div class="wrap">

    <div class="header-nav" data-aos="fade-down" data-aos-duration="800">
      <div class="title-box">
        <h1>رفع مرفقات المرشح للوظيفة</h1>
        <p>ابحث بالرقم الوظيفي أو اسم المرشح ثم أعد رفع المرفقات المطلوبة</p>
      </div>

      <div class="header-actions d-flex gap-2 flex-wrap">
         
        <a class="btn-marsom" href="<?= site_url('dashboard'); ?>">
          <i class="fas fa-house"></i> الرئيسية
        </a>
      </div>
    </div>

    <div class="section" data-aos="fade-up" data-aos-delay="80">

      <?php
        $flash_type = $this->session->flashdata('flash_type');
        $flash_msg  = $this->session->flashdata('flash_msg');
        if ($flash_msg):
      ?>
        <div class="alert alert-<?= html_escape($flash_type ?: 'info') ?> mb-3">
          <?= html_escape($flash_msg) ?>
        </div>
      <?php endif; ?>

      <?php if (!empty($error)): ?>
        <div class="alert alert-danger mb-3"><?= html_escape($error) ?></div>
      <?php endif; ?>

      <div class="glass-card" data-aos="fade-up" data-aos-delay="120">
        <form method="post" action="<?= site_url('CandidateAttachments/search'); ?>" class="row g-2 align-items-end">
          <div class="col-lg-9">
            <label class="form-label">بحث</label>
            <input type="text" name="q" value="<?= html_escape($q ?? '') ?>"
                   class="form-control"
                   placeholder="اكتب الرقم الوظيفي (من عروض الوظائف) أو اسم المرشح (من candidates)">
            <div class="hint mt-2">
              * يمكن البحث بـ <span class="badge-soft"><i class="fa fa-id-badge"></i> الرقم الوظيفي</span>
              أو <span class="badge-soft"><i class="fa fa-user"></i> اسم المرشح</span>
            </div>
          </div>
          <div class="col-lg-3 d-grid">
            <button class="btn-marsom primary justify-content-center" type="submit">
              <i class="fas fa-magnifying-glass"></i> بحث
            </button>
          </div>
        </form>
      </div>

      <?php if (!empty($result)): ?>
        <div class="glass-card mt-3" data-aos="fade-up" data-aos-delay="170">
          <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div class="d-flex flex-wrap gap-2">
              <span class="badge-soft"><i class="fa fa-user"></i> <?= html_escape($result->full_name ?? '-') ?></span>
              <span class="badge-soft"><i class="fa fa-id-badge"></i> رقم وظيفي: <?= html_escape($result->offer_employee_id ?? '-') ?></span>
              <span class="badge-soft"><i class="fa fa-hashtag"></i> Candidate ID: <?= (int)$result->id ?></span>
            </div>
            <div class="hint">اختر الملفات ثم اضغط “حفظ المرفقات”.</div>
          </div>

          <form method="post" action="<?= site_url('CandidateAttachments/upload'); ?>" enctype="multipart/form-data" class="mt-3">
            <input type="hidden" name="candidate_id" value="<?= (int)$result->id ?>">
            <input type="hidden" name="employee_id" value="<?= html_escape($result->offer_employee_id ?? '') ?>">

            <div class="files-grid">
              <?php foreach (($file_cols ?? []) as $col => $label): ?>
                <?php
                  $hasFile = !empty($result->$col);
                  $statusClass = $hasFile ? 'ok' : 'no';
                  $statusText  = $hasFile ? 'موجود مسبقاً' : 'غير مرفوع';
                ?>
                <div class="file-tile">
                  <div class="file-meta">
                    <div class="name"><i class="fa fa-paperclip"></i> <?= html_escape($label) ?></div>
                    <div class="status <?= $statusClass ?>"><?= $statusText ?></div>
                  </div>

                  <input type="file" name="<?= html_escape($col) ?>" class="form-control">

                  <?php if ($hasFile): ?>
                    <?php
                      $filePath = (string)$result->$col;
                      // حماية بسيطة: نعرض زر فقط إذا الملف داخل uploads/candidates
                      $safe = (strpos($filePath, 'uploads/candidates/') === 0);
                      $fileUrl = $safe ? base_url($filePath) : '#';
                    ?>
                    <?php if ($safe): ?>
                      <div class="mt-2 d-flex gap-2 flex-wrap">
                        <a class="btn-marsom" href="<?= html_escape($fileUrl) ?>" target="_blank" rel="noopener">
                          <i class="fas fa-eye"></i> عرض المرفق
                        </a>
                      </div>
                    <?php endif; ?>
                  <?php else: ?>
                    <div class="hint mt-2">يمكن رفع أي نوع ملف.</div>
                  <?php endif; ?>

                </div>
              <?php endforeach; ?>
            </div>

            <div class="d-flex gap-2 flex-wrap mt-3">
              <button type="submit" class="btn-marsom primary">
                <i class="fas fa-cloud-arrow-up"></i> حفظ المرفقات
              </button>
              <a href="<?= site_url('CandidateAttachments'); ?>" class="btn-marsom">
                <i class="fas fa-rotate-right"></i> بحث جديد
              </a>
            </div>
          </form>
        </div>
      <?php endif; ?>

    </div>
  </div>

</div>
