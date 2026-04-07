<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div dir="rtl" class="rows col-12 sms-platform-page">
  <div class="block col-12 mb-4 heading-white">
    <div class="head-table col-12 d-flex flex-wrap justify-content-between align-items-center gap-2">
      <div>
        <h4><i class="bi bi-chat-dots me-2"></i> <?= html_escape($title ?? 'منصة الرسائل') ?></h4>
        <p class="mb-0 text-muted">اكتب الرسالة، اختر المنطقة، وأضف الأرقام يدوياً أو عبر ملف CSV / XLSX</p>
      </div>
      <div class="d-flex flex-wrap gap-2">
        <a class="button hex-btn small" href="<?= site_url('SmsPlatform/dashboard'); ?>"><i class="bi bi-graph-up-arrow me-1"></i> التقارير</a>
      </div>
    </div>
  </div>

  <?php $flash_ok = $this->session->flashdata('success_msg'); if ($flash_ok): ?>
    <div class="alert alert-success"><?= html_escape($flash_ok) ?></div>
  <?php endif; ?>
  <?php $flash_err = $this->session->flashdata('error_msg'); if ($flash_err): ?>
    <div class="alert alert-danger"><?= html_escape($flash_err) ?></div>
  <?php endif; ?>

  <div id="fileHintBox" class="alert alert-info" style="display:none">
    <i class="bi bi-info-circle me-1"></i> تم اختيار ملف أرقام. سيتُعامل معه عند الإرسال.
  </div>

  <form id="smsForm" action="<?= site_url('SmsPlatform/send'); ?>" method="post" enctype="multipart/form-data">
    <div class="row g-3">
      <div class="col-12 col-lg-4">
        <div class="box job-card job-card-blue col-12">
          <div class="job-card-header job-card-header-blue">
            <h4 class="m-0"><i class="bi bi-geo-alt me-2"></i> المنطقة</h4>
          </div>
          <div class="job-card-body">
            <select name="region" id="region" class="form-select" required>
              <option value="" disabled selected>اختر المنطقة</option>
              <?php foreach ($regions as $r): ?>
                <option value="<?= html_escape($r) ?>"><?= html_escape($r) ?></option>
              <?php endforeach; ?>
            </select>
            <p class="small text-muted mt-2 mb-0">تُخزَّن في التقارير لإحصائيات حسب المدن.</p>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-8">
        <div class="box job-card job-card-green col-12">
          <div class="job-card-header job-card-header-green">
            <h4 class="m-0"><i class="bi bi-chat-text me-2"></i> محتوى الرسالة</h4>
          </div>
          <div class="job-card-body">
            <textarea name="message_body" id="message_body" class="form-control" rows="5" required placeholder="اكتب الرسالة..."></textarea>
            <div class="d-flex justify-content-between mt-2">
              <span class="small text-muted">نفس المحتوى يُرسل لجميع الأرقام.</span>
              <span class="badge bg-secondary"><span id="charCount">0</span> حرف</span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12">
        <div class="box job-card col-12">
          <div class="job-card-header">
            <h4 class="m-0"><i class="bi bi-phone me-2"></i> الأرقام والملف</h4>
          </div>
          <div class="job-card-body">
            <div class="row g-3">
              <div class="col-12 col-lg-7">
                <label class="form-label fw-bold">أرقام الجوالات (يدوي)</label>
                <textarea name="mobile_numbers" id="mobile_numbers" class="form-control" rows="6" placeholder="كل رقم بسطر أو بفواصل — 9665xxxxxxxx أو 05xxxxxxxx"></textarea>
                <div class="d-flex flex-wrap gap-2 mt-2">
                  <span class="badge bg-light text-dark border">صالح: <span id="validCount">0</span></span>
                  <span class="badge bg-light text-dark border">غير صالح: <span id="invalidCount">0</span></span>
                  <span class="badge bg-light text-dark border">إجمالي: <span id="totalCount">0</span></span>
                </div>
              </div>
              <div class="col-12 col-lg-5">
                <label class="form-label fw-bold">رفع ملف (CSV / XLSX)</label>
                <input type="file" class="form-control" id="excel_file" name="excel_file" accept=".csv,.xlsx">
                <p class="small text-muted mt-2 mb-2">CSV: كل الخلايا. XLSX: يحتاج PhpSpreadsheet إن وُجد على السيرفر.</p>

                <div id="csvPreviewWrap" class="table-wrapper-rtl mt-2" style="display:none">
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <strong>معاينة CSV</strong>
                    <span class="badge bg-secondary"><span id="csvTotal">0</span></span>
                  </div>
                  <div class="d-flex gap-2 mb-2">
                    <span class="badge bg-success">صالح: <span id="csvValid">0</span></span>
                    <span class="badge bg-danger">غير صالح: <span id="csvInvalid">0</span></span>
                  </div>
                  <div class="table-responsive" style="max-height:260px; overflow:auto;">
                    <table class="table table-sm table-custom align-middle mb-0">
                      <thead class="table-light sticky-top">
                        <tr>
                          <th>#</th>
                          <th>الرقم</th>
                          <th>الحالة</th>
                        </tr>
                      </thead>
                      <tbody id="csvRows"></tbody>
                    </table>
                  </div>
                  <div class="d-flex gap-2 mt-2">
                    <button type="button" id="copyCsvValid" class="button hex-btn small flex-grow-1">نسخ الصالح للحقل</button>
                    <button type="button" id="clearCsv" class="button default small"><i class="bi bi-trash"></i></button>
                  </div>
                </div>

                <button type="button" id="openConfirm" class="button default orange w-100 mt-3">
                  <i class="bi bi-send me-1"></i> إرسال الرسالة
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <div class="modal fade" id="confirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">تأكيد الإرسال</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="d-flex flex-wrap gap-2 mb-2">
            <span class="badge bg-light text-dark border">المنطقة: <span id="mRegion">-</span></span>
            <span class="badge bg-light text-dark border">صالح (يدوي): <span id="mCount">0</span></span>
            <span class="badge bg-info text-dark" id="mFileBadge" style="display:none">ملف مرفوع</span>
          </div>
          <label class="form-label fw-bold">نص الرسالة</label>
          <div class="p-3 bg-light rounded border" style="white-space:pre-wrap;"><span id="mMessage">-</span></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
          <button type="button" id="confirmSend" class="btn btn-primary"><i class="bi bi-send me-1"></i> إرسال الآن</button>
        </div>
      </div>
    </div>
  </div>
</div>
