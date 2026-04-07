<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div dir="rtl" class="rows col-12 jobs-dashboard sms-platform-page">
  <div class="block col-12 mb-4 heading-white">
    <div class="head-table col-12 d-flex flex-wrap justify-content-between align-items-center gap-2">
      <div>
        <h4><i class="bi bi-graph-up-arrow me-2"></i> <?= html_escape($title ?? 'تقارير الرسائل') ?></h4>
        <p class="mb-0 text-muted">فلترة حسب التاريخ والمنطقة وتصدير CSV</p>
      </div>
      <div class="d-flex flex-wrap gap-2">
        <a class="button hex-btn small" href="<?= site_url('SmsPlatform'); ?>"><i class="bi bi-send me-1"></i> إرسال جديد</a>
        <a class="button default small" href="<?= site_url('SmsPlatform/export_csv?' . http_build_query($filters)); ?>">
          <i class="bi bi-filetype-csv me-1"></i> تصدير CSV
        </a>
      </div>
    </div>
  </div>

  <div class="block col-12 mb-4">
    <form method="get" action="<?= site_url('SmsPlatform/dashboard'); ?>" class="row g-2 align-items-end">
      <div class="col-12 col-md-3">
        <label class="form-label">المنطقة</label>
        <select class="form-select" name="region">
          <option value="">الكل</option>
          <?php foreach ($regions as $r): ?>
            <option value="<?= html_escape($r) ?>" <?= (($filters['region'] ?? '') === $r) ? 'selected' : '' ?>><?= html_escape($r) ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-12 col-md-3">
        <label class="form-label">من تاريخ</label>
        <input type="date" class="form-control" name="date_from" value="<?= html_escape($filters['date_from'] ?? '') ?>">
      </div>
      <div class="col-12 col-md-3">
        <label class="form-label">إلى تاريخ</label>
        <input type="date" class="form-control" name="date_to" value="<?= html_escape($filters['date_to'] ?? '') ?>">
      </div>
      <div class="col-12 col-md-3 d-flex gap-2">
        <button class="button hex-btn flex-grow-1" type="submit">تطبيق</button>
        <a class="button default" href="<?= site_url('SmsPlatform/dashboard'); ?>">إعادة</a>
      </div>
    </form>
  </div>

  <div class="row g-3 mb-4">
    <?php foreach ($stats as $s): ?>
      <div class="col-12 col-md-6 col-lg-3">
        <div class="box job-card job-card-blue col-12 h-100">
          <div class="job-card-header job-card-header-blue py-2">
            <h5 class="m-0"><i class="bi bi-geo-alt me-1"></i> <?= html_escape($s['region']) ?></h5>
          </div>
          <div class="job-card-body small">
            <div>حملات: <strong><?= (int) $s['campaigns_count'] ?></strong></div>
            <div>أرقام: <strong><?= (int) $s['total_numbers'] ?></strong></div>
            <div>نجاح: <strong><?= (int) $s['success_count'] ?></strong> | فشل: <strong><?= (int) $s['fail_count'] ?></strong></div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="block col-12">
    <div class="head-table col-12 mb-2">
      <h4 class="m-0"><i class="bi bi-list-ul me-2"></i> سجل الحملات</h4>
      <span class="text-muted small">عدد السجلات: <?= count($campaigns) ?></span>
    </div>
    <div class="table-wrapper-rtl">
      <div class="table-responsive">
        <table class="table table-custom align-middle">
          <thead>
            <tr>
              <th>#</th>
              <th>المنطقة</th>
              <th>المرسل</th>
              <th>وقت الإرسال</th>
              <th>الإجمالي</th>
              <th>نجاح</th>
              <th>فشل</th>
              <th>إجراءات</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($campaigns)): ?>
              <tr><td colspan="8" class="text-center py-4 text-muted">لا توجد نتائج</td></tr>
            <?php else: ?>
              <?php foreach ($campaigns as $c): ?>
                <tr>
                  <td><?= (int) $c['id'] ?></td>
                  <td><?= html_escape($c['region']) ?></td>
                  <td>
                    <div class="fw-bold"><?= html_escape($c['created_by_name']) ?></div>
                    <div class="small text-muted"><?= html_escape($c['created_by_empno']) ?></div>
                  </td>
                  <td><?= html_escape($c['sent_at'] ?: '-') ?></td>
                  <td><?= (int) $c['total_numbers'] ?></td>
                  <td><?= (int) $c['success_count'] ?></td>
                  <td><?= (int) $c['fail_count'] ?></td>
                  <td class="d-flex flex-wrap gap-1">
                    <a class="button hex-btn small" href="<?= site_url('SmsPlatform/details/' . (int) $c['id']); ?>">تفاصيل</a>
                    <a class="button default small" href="<?= site_url('SmsPlatform/export_recipients_csv/' . (int) $c['id']); ?>">CSV</a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
