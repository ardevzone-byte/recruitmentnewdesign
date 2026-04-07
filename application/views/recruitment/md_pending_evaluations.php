<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
.md-pending-page .modern-table { width: 100%; border-collapse: separate; border-spacing: 0; min-width: 960px; }
.md-pending-page .modern-table th {
  position: sticky; top: 0; background: #f8fafc; z-index: 5;
  padding: 10px 8px; border: 1px solid #e2e8f0; text-align: center; font-size: 0.8rem;
}
.md-pending-page .modern-table td { padding: 8px; border: 1px solid #e2e8f0; vertical-align: middle; font-size: 0.88rem; }
.md-pending-page .summary-card {
  background: #fff; border-radius: 14px; border: 1px solid #e2e8f0;
  box-shadow: 0 4px 16px rgba(0,0,0,.05); padding: 1rem;
}
.md-pending-page .filters-card {
  background: #fff; border-radius: 16px; border: 1px solid #e2e8f0;
  padding: 1.25rem; margin-bottom: 1rem;
}
.md-pending-page .select2-container--default .select2-selection--single {
  min-height: 42px; border-radius: 12px; border-color: #dee2e6;
}
@media print {
  @page { size: A4 landscape; margin: 8mm; }
  .no-print, .heading-white .head-table .d-flex { display: none !important; }
  .md-pending-page { background: #fff !important; }
}
</style>

<div dir="rtl" class="rows col-12 jobs-dashboard recruitment-page md-pending-page">
  <div class="block col-12 mb-4 heading-white">
    <div class="head-table col-12 d-flex flex-wrap justify-content-between align-items-center gap-3">
      <div>
        <h4><i class="bi bi-hourglass-split me-2"></i> طلبات العضو المنتدب المعلقة (1001)</h4>
        <p class="mb-0 text-muted small">آخر تقييم معلّق للعضو المنتدب + المرشح غير مكتمل التقييم</p>
      </div>
      <div class="d-flex flex-wrap gap-2 no-print">
        <?php $qs = $_GET; $exportUrl = base_url('MdPendingEvaluations/export_csv?' . http_build_query($qs)); ?>
        <a class="button hex-btn small" href="<?= site_url('dashboard'); ?>"><i class="bi bi-house-door me-1"></i> الرئيسية</a>
        <a class="button hex-btn small" href="<?= html_escape($exportUrl) ?>"><i class="bi bi-file-earmark-spreadsheet me-1"></i> تصدير Excel</a>
        <button type="button" class="button hex-btn small" onclick="window.print()"><i class="bi bi-printer me-1"></i> طباعة</button>
      </div>
    </div>
  </div>

  <div class="block col-12">
    <div class="row g-3 mb-3">
      <div class="col-md-3">
        <div class="summary-card">
          <div class="text-muted small">إجمالي المعلّقات لدى 1001</div>
          <div class="fs-3 fw-bold text-dark"><?= (int)($summary['total_pending'] ?? 0) ?></div>
        </div>
      </div>
      <?php if (!empty($summary['by_app_status'])): ?>
        <?php foreach (array_slice($summary['by_app_status'], 0, 5, true) as $st => $cnt): ?>
          <div class="col-md-3">
            <div class="summary-card">
              <div class="text-muted small">حالة الطلب (Application.status)</div>
              <div class="fw-bold"><?= html_escape($st) ?></div>
              <div class="fs-4 fw-bold"><?= (int)$cnt ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>

    <div class="filters-card no-print">
      <form method="get" class="row g-2 align-items-end">
        <div class="col-md-3">
          <label class="form-label small">من تاريخ (طلب تقييم 1001)</label>
          <input type="date" name="date_from" value="<?= html_escape($filters['date_from'] ?? '') ?>" class="form-control form-control-sm">
        </div>
        <div class="col-md-3">
          <label class="form-label small">إلى تاريخ (طلب تقييم 1001)</label>
          <input type="date" name="date_to" value="<?= html_escape($filters['date_to'] ?? '') ?>" class="form-control form-control-sm">
        </div>
        <div class="col-md-3">
          <label class="form-label small">حالة المرشح (Application.status)</label>
          <input type="text" name="app_status" value="<?= html_escape($filters['app_status'] ?? '') ?>" class="form-control form-control-sm" placeholder="مثال: جديد">
        </div>
        <div class="col-md-3">
          <label class="form-label small">بحث</label>
          <input type="text" name="q" value="<?= html_escape($filters['q'] ?? '') ?>" class="form-control form-control-sm" placeholder="اسم/ايميل/جوال/هوية">
        </div>
        <div class="col-12">
          <button class="button hex-btn small" type="submit"><i class="bi bi-funnel me-1"></i> تطبيق</button>
        </div>
      </form>
      <p class="text-muted small mt-2 mb-0">* يظهر الطلب إذا كان لدى 1001 تقييم pending ولا يوجد أي completed لنفس الـ application.</p>
    </div>

    <div class="table-responsive bg-white rounded-3 border border-light p-2">
      <table class="table modern-table align-middle mb-0">
        <thead>
          <tr>
            <th>#</th>
            <th>المرشح</th>
            <th>تواصل</th>
            <th>هوية</th>
            <th>Application</th>
            <th>التوظيف (decision_by)</th>
            <th>آخر طلب تقييم لدى 1001</th>
            <th>إحصائية تقييمات الطلب</th>
            <th class="no-print">إجراءات</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($rows)): foreach ($rows as $r): ?>
            <tr>
              <td><?= (int)$r->candidate_id ?></td>
              <td>
                <div class="fw-bold"><?= html_escape($r->full_name) ?></div>
                <div class="text-muted small" dir="ltr"><?= html_escape($r->candidate_created_at) ?></div>
              </td>
              <td class="small">
                <div><i class="fa fa-envelope"></i> <?= html_escape($r->email) ?></div>
                <div><i class="fa fa-phone"></i> <?= html_escape($r->phone) ?></div>
              </td>
              <td><?= html_escape($r->id_number) ?></td>
              <td class="small">
                <div dir="ltr"><b>ID:</b> <?= (int)$r->application_id ?></div>
                <div><b>Status:</b> <?= html_escape($r->application_status) ?></div>
              </td>
              <td class="small">
                <div><b>EmpNo:</b> <?= html_escape($r->decision_by) ?></div>
                <div class="text-muted"><?= html_escape($r->decision_by_name) ?></div>
              </td>
              <td class="small">
                <span class="badge bg-warning text-dark">بانتظار تقييم 1001</span>
                <div class="mt-2" dir="ltr"><b>Eval ID:</b> <?= (int)$r->md_eval_id ?></div>
                <div dir="ltr"><b>Created:</b> <?= html_escape($r->md_created_at) ?></div>
                <div class="text-muted mt-1"><b>Notes:</b><br><?= nl2br(html_escape($r->md_notes)) ?></div>
              </td>
              <td class="small">
                <div><b>عدد التقييمات:</b> <?= (int)$r->eval_count ?></div>
                <div><b>مكتمل:</b> <?= (int)$r->completed_count ?> | <b>معلق:</b> <?= (int)$r->pending_count ?></div>
              </td>
              <td class="small no-print">
                <div class="d-flex gap-2 flex-wrap">
                  <button type="button" class="button hex-btn small py-1 px-2" onclick="openCandidateModal(<?= (int)$r->application_id ?>)">
                    <i class="fa fa-user"></i> عرض المرشح
                  </button>
                  <button type="button" class="button hex-btn small py-1 px-2" onclick="openTransferModal(<?= (int)$r->md_eval_id ?>, <?= json_encode($r->full_name, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE) ?>)">
                    <i class="fa fa-right-left"></i> سحب التقييم
                  </button>
                </div>
              </td>
            </tr>
          <?php endforeach; else: ?>
            <tr><td colspan="9" class="text-center py-4">لا توجد طلبات معلّقة لدى العضو المنتدب وفق الفلاتر الحالية.</td></tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<div class="modal fade" id="candidateModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" style="max-width: 1200px;">
    <div class="modal-content rounded-3">
      <div class="modal-header border-bottom">
        <h5 class="modal-title fw-bold">عرض بيانات المرشح</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <iframe id="candidateFrame" title="candidate" src="" style="width:100%; height:80vh; border:0;"></iframe>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="transferModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-3">
      <div class="modal-header border-bottom">
        <h5 class="modal-title fw-bold">سحب التقييم من العضو المنتدب</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-muted small mb-2">سيتم تحويل التقييم المعلّق إلى موظف آخر (تغيير evaluator_user_id).</p>
        <div class="border rounded-3 p-3 mb-3 bg-light">
          <div class="small"><b>المرشح:</b> <span id="transferCandidateName"></span></div>
          <div class="small mt-1" dir="ltr"><b>MD Eval ID:</b> <span id="transferEvalId"></span></div>
        </div>
        <input type="hidden" id="md_eval_id" value="">
        <label class="form-label">اختر الموظف الذي سيتم تحويل التقييم إليه</label>
        <select id="new_empno" class="form-select" style="width:100%"></select>
        <div id="transferMsg" class="mt-3 small" style="display:none"></div>
      </div>
      <div class="modal-footer border-top">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fa fa-xmark"></i> إغلاق</button>
        <button type="button" class="button hex-btn" onclick="submitTransfer()"><i class="fa fa-check"></i> تنفيذ التحويل</button>
      </div>
    </div>
  </div>
</div>
