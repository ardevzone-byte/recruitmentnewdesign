<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
.interview-report-embed { color: #181a3b; }
.interview-report-embed .wrap { max-width: 100%; margin: 0; padding: 0; }
.interview-report-embed .header { background: #fff; border: 1px solid #e5e7eb; border-radius: 16px; padding: 16px; margin-bottom: 16px; }
.interview-report-embed h1 { color: #181a3b; font-weight: 800; -webkit-text-fill-color: #181a3b; }
.interview-report-embed .sub { color: #6b7280; }
.interview-report-embed .section { background: transparent; border: 0; box-shadow: none; padding: 0; }
.interview-report-embed .section::before { display: none; }
.interview-report-embed .cardx { background: #fff; border: 1px solid #e5e7eb; border-radius: 16px; color: #181a3b; }
.interview-report-embed .muted { color: #6b7280 !important; }
.interview-report-embed .form-control, .interview-report-embed .form-select { background: #fff !important; color: #181a3b !important; border-color: #e5e7eb !important; }
.interview-report-embed .table { --bs-table-color: #181a3b; color: #181a3b; }
.interview-report-embed .table thead th { background: #f3f4f6; color: #181a3b; }
.interview-report-embed .btnx { border: 1px solid #e5e7eb; background: #f9fafb; color: #181a3b; }
.interview-report-embed .btnx.primary { background: linear-gradient(135deg,#f29220,#e8890b); color: #fff; border: 0; }
.interview-report-embed .badge-soft { background: #f3f4f6; border-color: #e5e7eb; color: #181a3b; }
.interview-report-embed .table-wrap { height: auto; max-height: 420px; overflow: auto; }
@media print {
  .interview-report-embed .no-print, .interview-report-embed .actions, .interview-report-embed button, .interview-report-embed .btnx { display: none !important; }
}
</style>
<div class="rows col-12 interview-report-embed">
<div class="wrap">

  <?php if (!empty($db_error)): ?>
    <div class="alert alert-warning mb-3" role="alert"><?= html_escape($db_error) ?></div>
  <?php endif; ?>

  <div class="header">
    <div>
      <h1>تقرير المقابلات الوظيفية</h1>
      <div class="sub">Dashboard + فلاتر + تصدير Excel/CSV + طباعة</div>
    </div>
    <div class="d-flex gap-2 flex-wrap actions">
      <a class="btnx" href="<?= base_url('dashboard'); ?>"><i class="fa fa-house"></i> الرئيسية</a>

      <?php
        $qs = $_GET;
        $exportUrl = base_url('InterviewReport/export_csv?' . http_build_query($qs));
      ?>
      <a class="btnx primary" href="<?= html_escape($exportUrl) ?>"><i class="fa fa-file-excel"></i> تصدير Excel (CSV)</a>
      <button class="btnx" onclick="window.print()"><i class="fa fa-print"></i> طباعة</button>
    </div>
  </div>

  <div class="section">

    <!-- Summary Cards -->
    <div class="row g-2 mb-3">
      <div class="col-md-3"><div class="cardx">
        <div class="muted small">إجمالي المرشحين</div>
        <div style="font-size:1.7rem;font-weight:900"><?= (int)$summary['total_candidates'] ?></div>
      </div></div>

      <div class="col-md-3"><div class="cardx">
        <div class="muted small">مرشحين لديهم Application</div>
        <div style="font-size:1.7rem;font-weight:900"><?= (int)$summary['with_application'] ?></div>
      </div></div>

      <div class="col-md-3"><div class="cardx">
        <div class="muted small">مكتمل التقييم (أولوية completed)</div>
        <div style="font-size:1.7rem;font-weight:900"><?= (int)$summary['overall_completed'] ?></div>
      </div></div>

      <div class="col-md-3"><div class="cardx">
        <div class="muted small">بانتظار التقييم</div>
        <div style="font-size:1.7rem;font-weight:900"><?= (int)$summary['overall_pending'] ?></div>
      </div></div>
    </div>

    <?php if(!empty($app_status_counts)): ?>
  <div class="row g-2 mb-3">
    <?php foreach($app_status_counts as $st => $cnt): ?>
      <div class="col-6 col-md-3 col-lg-2">
        <div class="cardx">
          <div class="muted small">حالة المرشح</div>
          <div style="font-weight:900"><?= html_escape($st) ?></div>
          <div style="font-size:1.4rem;font-weight:900"><?= (int)$cnt ?></div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>






    <!-- Filters -->
    <div class="cardx mb-3 filters">
      <form method="get" class="row g-2 align-items-end">
        <div class="col-md-3">
          <label class="form-label">من تاريخ (created_at)</label>
          <input type="date" name="date_from" value="<?= html_escape($filters['date_from'] ?? '') ?>" class="form-control">
        </div>
        <div class="col-md-3">
          <label class="form-label">إلى تاريخ (created_at)</label>
          <input type="date" name="date_to" value="<?= html_escape($filters['date_to'] ?? '') ?>" class="form-control">
        </div>

        <div class="col-md-2">
          <label class="form-label">حالة المرشح (applications.status)</label>
          <input type="text" name="app_status" value="<?= html_escape($filters['app_status'] ?? '') ?>" class="form-control" placeholder="مثال: accepted/rejected/...">
        </div>

        <div class="col-md-2">
          <label class="form-label">حالة التقييم</label>
          <select name="eval_status" class="form-select">
            <option value="">الكل</option>
            <option value="completed" <?= (($filters['eval_status'] ?? '')==='completed'?'selected':'') ?>>مكتمل</option>
            <option value="pending" <?= (($filters['eval_status'] ?? '')==='pending'?'selected':'') ?>>بانتظار</option>
          </select>
        </div>

        <div class="col-md-2">
          <label class="form-label">موظف التوظيف (decision_by)</label>
          <input type="text" name="recruiter" value="<?= html_escape($filters['recruiter'] ?? '') ?>" class="form-control" placeholder="رقم وظيفي">
        </div>

        <div class="col-md-8">
          <label class="form-label">بحث عام</label>
          <input type="text" name="q" value="<?= html_escape($filters['q'] ?? '') ?>" class="form-control"
                 placeholder="اسم / بريد / جوال / هوية">
        </div>

        <div class="col-md-4 d-grid">
          <button class="btnx primary justify-content-center" type="submit"><i class="fa fa-filter"></i> تطبيق الفلاتر</button>
        </div>
      </form>

      <div class="mt-2 muted small">
        * “مكتمل” إذا كان يوجد أي تقييم status=completed ضمن تقييمات المرشح.  
        * “all_completed_at” يظهر فقط إذا كانت كل التقييمات مكتملة.
      </div>
    </div>

    <!-- Recruiter performance -->
    <div class="cardx mb-3">
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <div style="font-family:'El Messiri',serif;font-weight:900;font-size:1.1rem">
          <i class="fa fa-users-gear"></i> أداء موظفي التوظيف (decision_by)
        </div>
        <span class="muted small">مرتّب حسب الأكثر تعليـقًا</span>
      </div>

      <div class="table-wrap">
        <table class="table table-bordered align-middle">
          <thead>
            <tr>
              <th>رقم الموظف</th>
              <th>الاسم</th>
              <th>عدد المرشحين</th>
              <th>مكتمل</th>
              <th>معلق/بانتظار</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($recruiter_stats)): foreach($recruiter_stats as $rs): ?>
              <tr>
                <td><?= html_escape($rs->decision_by) ?></td>
                <td><?= html_escape($rs->recruiter_name) ?></td>
                <td><?= (int)$rs->candidates_count ?></td>
                <td><?= (int)$rs->completed_candidates ?></td>
                <td><span class="badge-soft pill-warn"><?= (int)$rs->pending_candidates ?></span></td>
              </tr>
            <?php endforeach; else: ?>
              <tr><td colspan="5" class="text-center">لا توجد بيانات.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Report Table -->
    <div class="cardx">
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-2 no-print">
        <div style="font-family:'El Messiri',serif;font-weight:900;font-size:1.1rem">
          <i class="fa fa-table"></i> تفاصيل المرشحين والتقييمات
        </div>
        <input id="quickSearch" class="form-control" style="max-width:420px"
               placeholder="فلترة فورية داخل الجدول (اسم/ايميل/جوال/هوية/مقيم...)" />
      </div>

      <div class="table-responsive">
        <table class="table table-bordered align-middle" id="reportTable">
          <thead>
            <tr>
              <th>#</th>
              <th>المرشح</th>
              <th>تواصل</th>
              <th>هوية</th>
              <th>بيانات إضافية</th>
              <th>تاريخ الإضافة</th>
              <th>Application</th>
              <th>التوظيف</th>
              <th>التقييمات</th>
              <th>الراتب</th>
              <th>ملاحظات</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($rows)): foreach($rows as $r): ?>
              <?php
                $pill = ($r->overall_eval_status === 'completed') ? 'pill-ok' : 'pill-warn';
                $statusText = $r->overall_eval_status_ar;
                $cvBtn = '';
                if (!empty($r->cv_file) && strpos($r->cv_file, 'uploads/') === 0) {
                    $cvBtn = '<a class="btnx" target="_blank" rel="noopener" href="'.html_escape(base_url($r->cv_file)).'"><i class="fa fa-eye"></i> CV</a>';
                }
              ?>
              <tr>
                <td><?= (int)$r->candidate_id ?></td>

                <td>
                  <div style="font-weight:900"><?= html_escape($r->full_name) ?></div>
                  <div class="muted small"><?= html_escape($r->name_en) ?></div>
                  <div class="mt-1"><?= $cvBtn ?></div>
                </td>

                <td class="small">
                  <div><i class="fa fa-envelope"></i> <?= html_escape($r->email) ?></div>
                  <div><i class="fa fa-phone"></i> <?= html_escape($r->phone) ?></div>
                </td>

                <td><?= html_escape($r->id_number) ?></td>

                <td class="small">
                  <div>الجنسية: <?= html_escape($r->nationality) ?></div>
                  <div>الحالة: <?= html_escape($r->marital_status) ?></div>
                  <div>العمر: <?= html_escape($r->age) ?></div>
                  <div>الموقع: <?= html_escape($r->work_location) ?></div>
                </td>

                <td dir="ltr"><?= html_escape($r->candidate_created_at) ?></td>

                <td class="small">
                  <div dir="ltr"><b>ID:</b> <?= html_escape($r->application_id) ?></div>
                  <div><b>Status:</b> <?= html_escape($r->application_status) ?></div>
                </td>

                <td class="small">
                  <div><b>EmpNo:</b> <?= html_escape($r->decision_by) ?></div>
                  <div class="muted"><?= html_escape($r->decision_by_name) ?></div>
                </td>

                <td class="small">
                  <div class="badge-soft <?= $pill ?>"><i class="fa fa-circle-check"></i> <?= html_escape($statusText) ?></div>
                  <div class="mt-2">
                    <div><b>عدد التقييمات:</b> <?= (int)$r->eval_count ?></div>
                    <div><b>مكتمل:</b> <?= (int)$r->completed_count ?> | <b>معلق:</b> <?= (int)$r->pending_count ?></div>
                    <div class="muted mt-1"><b>المقيمون:</b> <?= html_escape($r->evaluators_list) ?></div>
                    <div class="muted"><b>الدرجات:</b> <?= html_escape($r->scores_list) ?></div>
                    <?php if(!empty($r->all_completed_at)): ?>
                      <div class="muted" dir="ltr"><b>All completed_at:</b> <?= html_escape($r->all_completed_at) ?></div>
                    <?php endif; ?>
                  </div>
                </td>

                <td><?= html_escape($r->recommended_salary) ?></td>

                <td style="max-width:320px;white-space:normal" class="small">
                  <?= nl2br(html_escape($r->last_notes)) ?>
                </td>
              </tr>
            <?php endforeach; else: ?>
              <tr><td colspan="11" class="text-center">لا توجد نتائج وفق الفلاتر الحالية.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </div>

  </div>
</div>

<script>
(function(){
  const input = document.getElementById('quickSearch');
  const table = document.getElementById('reportTable');
  if(!input || !table) return;

  input.addEventListener('input', function(){
    const q = this.value.toLowerCase().trim();
    const rows = table.querySelectorAll('tbody tr');
    rows.forEach(tr => {
      const text = tr.innerText.toLowerCase();
      tr.style.display = (text.indexOf(q) !== -1) ? '' : 'none';
    });
  });
})();
</script>

</div>
