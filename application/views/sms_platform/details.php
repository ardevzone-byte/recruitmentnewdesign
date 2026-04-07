<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div dir="rtl" class="rows col-12 jobs-dashboard sms-platform-page">
  <div class="block col-12 mb-4 heading-white">
    <div class="head-table col-12 d-flex flex-wrap justify-content-between align-items-center gap-2">
      <div>
        <h4><i class="bi bi-hash me-2"></i> تفاصيل الحملة #<?= (int) $campaign['id'] ?></h4>
        <p class="mb-0 text-muted">المنطقة: <?= html_escape($campaign['region']) ?> — الإرسال: <?= html_escape($campaign['sent_at'] ?: '-') ?></p>
      </div>
      <div class="d-flex flex-wrap gap-2">
        <a class="button hex-btn small" href="<?= site_url('SmsPlatform/dashboard'); ?>"><i class="bi bi-arrow-right me-1"></i> رجوع</a>
        <a class="button default small" href="<?= site_url('SmsPlatform/export_recipients_csv/' . (int) $campaign['id']); ?>">
          <i class="bi bi-filetype-csv me-1"></i> تصدير الأرقام
        </a>
      </div>
    </div>
  </div>

  <div class="block col-12 mb-4">
    <h5 class="mb-2"><i class="bi bi-chat-text me-1"></i> نص الرسالة</h5>
    <div class="p-3 bg-light rounded border" style="white-space:pre-wrap;"><?= html_escape($campaign['message_body']) ?></div>
    <p class="small text-muted mt-2 mb-0">
      المرسل: <?= html_escape($campaign['created_by_name']) ?> (<?= html_escape($campaign['created_by_empno']) ?>)
      — إجمالي: <?= (int) $campaign['total_numbers'] ?> | نجاح: <?= (int) $campaign['success_count'] ?> | فشل: <?= (int) $campaign['fail_count'] ?>
    </p>
  </div>

  <div class="block col-12">
    <h5 class="mb-2"><i class="bi bi-people me-1"></i> المستلمون</h5>
    <div class="table-wrapper-rtl">
      <div class="table-responsive">
        <table class="table table-custom align-middle">
          <thead>
            <tr>
              <th>#</th>
              <th>الجوال</th>
              <th>الحالة</th>
              <th>وقت الإرسال</th>
              <th>استجابة المزود</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($recipients)): ?>
              <tr><td colspan="5" class="text-center py-4 text-muted">لا يوجد مستلمون</td></tr>
            <?php else: ?>
              <?php foreach ($recipients as $r): ?>
                <tr>
                  <td><?= (int) $r['id'] ?></td>
                  <td><?= html_escape($r['mobile']) ?></td>
                  <td><?= html_escape($r['status']) ?></td>
                  <td><?= html_escape($r['sent_at'] ?: '-') ?></td>
                  <td class="small" style="max-width:320px; overflow:hidden; text-overflow:ellipsis;"><?= html_escape($r['provider_response'] ?? '') ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
