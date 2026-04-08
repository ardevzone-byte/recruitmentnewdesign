<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="ce2Settings" data-update-base="<?= site_url('CandidateEvaluations2/update/') ?>" class="d-none" aria-hidden="true"></div>
<style>
.candidate-evaluations2-embed { background: #f8fafc; padding: 1rem 0 2rem; }
.candidate-evaluations2-embed .wrap { max-width: 1200px; margin: 0 auto; padding: 0 1rem; }
.candidate-evaluations2-embed .card { background: #fff; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,.08); border: 1px solid #e2e8f0; }
.candidate-evaluations2-embed .btn { border-radius: 8px; }
</style>
<div class="candidate-evaluations2-embed">
<div class="wrap">

  <div class="header-nav">
    <div class="title-box">
      <h1>إدارة تقييمات المرشح</h1>
      <p>بحث بالاسم ➜ اختر المرشح ➜ تُعرض Applications ثم التقييمات</p>
    </div>
    <a class="btn-marsom" href="<?= base_url('dashboard'); ?>"><i class="fas fa-house"></i> الرئيسية</a>
  </div>

  <div class="section">

    <?php
      $flash_type = $this->session->flashdata('flash_type');
      $flash_msg  = $this->session->flashdata('flash_msg');
      if ($flash_msg):
    ?>
      <div class="alert alert-<?= html_escape($flash_type ?: 'info') ?> mb-3"><?= html_escape($flash_msg) ?></div>
    <?php endif; ?>

    <?php if (!empty($error)): ?>
      <div class="alert alert-danger mb-3"><?= html_escape($error) ?></div>
    <?php endif; ?>

    <!-- Search -->
    <div class="glass-card mb-3">
      <form method="post" action="<?= base_url('CandidateEvaluations2/search'); ?>" class="row g-2 align-items-end">
        <div class="col-lg-9">
          <label class="form-label">بحث باسم المرشح</label>
          <input type="text" name="q" value="<?= html_escape($q ?? '') ?>" class="form-control" placeholder="اكتب اسم المرشح...">
          <div class="hint mt-2">سيتم عرض قائمة مرشحين، اختر المرشح لعرض Applications والتقييمات.</div>
        </div>
        <div class="col-lg-3 d-grid">
          <button class="btn-marsom primary justify-content-center" type="submit"><i class="fas fa-search"></i> بحث</button>
        </div>
      </form>
    </div>

    <?php if (!empty($candidates)): ?>
      <div class="glass-card mb-3">
        <h5 style="font-family:'El Messiri',serif;font-weight:900"><i class="fas fa-users"></i> نتائج البحث</h5>
        <div class="row g-2 mt-2">
          <?php foreach($candidates as $c): ?>
            <div class="col-md-6 col-lg-4">
              <a class="btn-marsom w-100"
                 href="<?= base_url('CandidateEvaluations2/select/' . (int)$c->id . '?q=' . urlencode($q)) ?>">
                <i class="fas fa-user-check"></i>
                <?= html_escape($c->full_name) ?>
                <span class="ms-auto" dir="ltr">#<?= (int)$c->id ?></span>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($selected)): ?>
      <div class="glass-card mb-3">
        <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between">
          <div class="d-flex flex-wrap gap-2">
            <span class="badge-soft"><i class="fa fa-user"></i> <?= html_escape($selected->full_name) ?></span>
            <span class="badge-soft"><i class="fa fa-hashtag"></i> Candidate ID: <?= (int)$selected->id ?></span>
          </div>
          <div class="hint">تم جلب Applications ثم التقييمات حسب application_id = applications.id</div>
        </div>
      </div>

      <div class="glass-card mb-3">
        <h5 style="font-family:'El Messiri',serif;font-weight:900"><i class="fas fa-layer-group"></i> Applications</h5>
        <?php if (!empty($apps)): ?>
          <div class="d-flex gap-2 flex-wrap mt-2">
            <?php foreach($apps as $a): ?>
              <span class="badge-soft" dir="ltr">App #<?= (int)$a->id ?></span>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <div class="hint mt-2">لا توجد Applications مرتبطة بهذا المرشح.</div>
        <?php endif; ?>
      </div>

      <!-- Add Evaluation -->
      <div class="glass-card mb-3">
        <h5 style="font-family:'El Messiri',serif;font-weight:900"><i class="fas fa-plus"></i> إضافة تقييم</h5>

        <?php if (!empty($apps)): ?>
          <form method="post" action="<?= base_url('CandidateEvaluations2/create'); ?>" class="row g-2 mt-2">
            <input type="hidden" name="candidate_id" value="<?= (int)$selected->id ?>">
            <input type="hidden" name="return_q" value="<?= html_escape($q ?? '') ?>">

            <div class="col-md-4">
              <label class="form-label">اختر Application</label>
              <select name="application_id" class="form-select" required>
                <?php foreach($apps as $a): ?>
                  <option value="<?= (int)$a->id ?>">App #<?= (int)$a->id ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-4">
              <label class="form-label">رقم المقيم الوظيفي</label>
              <input type="text" name="evaluator_user_id" class="form-control" required>
            </div>

            <div class="col-md-4">
              <label class="form-label">الحالة</label>
              <select name="status" class="form-select" required>
                <option value="pending">انتظار</option>
                <option value="completed">تم التقييم</option>
              </select>
            </div>

            <div class="col-md-3">
              <label class="form-label">الدرجة</label>
              <input type="number" step="0.01" name="score" class="form-control">
            </div>

            <div class="col-md-3">
              <label class="form-label">الراتب المتوقع</label>
              <input type="number" step="0.01" name="recommended_salary" class="form-control">
            </div>

            <div class="col-md-3">
              <label class="form-label">مقدّم الطلب / مرجع</label>
              <input type="text" name="requested_by" class="form-control">
            </div>

            <div class="col-12">
              <label class="form-label">ملاحظات</label>
              <textarea name="notes" rows="3" class="form-control"></textarea>
            </div>

            <div class="col-12 d-flex gap-2 flex-wrap">
              <button class="btn-marsom primary" type="submit"><i class="fas fa-save"></i> حفظ</button>
              <a class="btn-marsom" href="<?= base_url('CandidateEvaluations2/select/' . (int)$selected->id . '?q=' . urlencode($q ?? '')) ?>">
                <i class="fas fa-rotate-right"></i> تحديث
              </a>
            </div>
          </form>
        <?php else: ?>
          <div class="hint mt-2">لا يمكن إضافة تقييم بدون وجود Application.</div>
        <?php endif; ?>
      </div>

      <!-- Evaluations Table -->
      <div class="glass-card">
        <h5 style="font-family:'El Messiri',serif;font-weight:900"><i class="fas fa-list-check"></i> التقييمات</h5>

        <div class="table-responsive mt-2">
          <table class="table table-bordered align-middle">
            <thead>
              <tr>
                <th>#</th>
                <th>Application</th>
                <th>المقيم</th>
                <th>الدرجة</th>
                <th>الحالة</th>
                <th>الراتب المتوقع</th>
                <th>ملاحظات</th>
                <th>تاريخ الإنشاء</th>
                <th>تاريخ الإكمال</th>
                <th>طالب التقييم</th>
                <th style="width:170px">إجراء</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($evals)): ?>
                <?php foreach($evals as $e): ?>
                  <?php
                    $statusText = ($e->status === 'completed') ? 'تم التقييم' : 'انتظار';
                    $evaluatorLabel = trim((string)($e->evaluator_name ?? '')) !== ''
                      ? ($e->evaluator_name . ' (' . $e->evaluator_user_id . ')')
                      : (string)$e->evaluator_user_id;
                    $requestedLabel = trim((string)($e->requested_by_name ?? '')) !== ''
                      ? ($e->requested_by_name . ' (' . $e->requested_by . ')')
                      : (string)$e->requested_by;
                  ?>
                  <tr>
                    <td><?= (int)$e->id ?></td>
                    <td dir="ltr">App #<?= (int)$e->application_id ?></td>
                    <td><?= html_escape($evaluatorLabel) ?></td>
                    <td><?= html_escape($e->score) ?></td>
                    <td><?= html_escape($statusText) ?></td>
                    <td><?= html_escape($e->recommended_salary) ?></td>
                    <td style="max-width:320px;white-space:normal"><?= nl2br(html_escape($e->notes)) ?></td>
                    <td><?= html_escape($e->created_at) ?></td>
                    <td><?= html_escape($e->completed_at) ?></td>
                    <td><?= html_escape($requestedLabel) ?></td>
                    <td>
                      <button type="button"
                              class="btn btn-sm btn-outline-warning btn-edit-eval"
                              data-bs-toggle="modal" data-bs-target="#editEvalModal"
                              data-id="<?= (int)$e->id ?>"
                              data-evaluator="<?= html_escape($e->evaluator_user_id) ?>"
                              data-status="<?= html_escape($e->status) ?>"
                              data-score="<?= html_escape($e->score) ?>"
                              data-salary="<?= html_escape($e->recommended_salary) ?>"
                              data-requested="<?= html_escape($e->requested_by) ?>"
                              data-notes="<?= html_escape($e->notes) ?>">
                        <i class="fas fa-pen"></i> تعديل
                      </button>

                      <form method="post" action="<?= base_url('CandidateEvaluations2/delete/' . (int)$e->id) ?>"
                            style="display:inline-block" onsubmit="return confirm('هل أنت متأكد من حذف التقييم؟');">
                        <input type="hidden" name="candidate_id" value="<?= (int)$selected->id ?>">
                        <input type="hidden" name="return_q" value="<?= html_escape($q ?? '') ?>">
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                          <i class="fas fa-trash"></i> حذف
                        </button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr><td colspan="11" class="text-center">لا توجد تقييمات.</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

    <?php endif; ?>

  </div>
</div>

<!-- Modal واحد للتعديل -->
<div class="modal fade" id="editEvalModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" style="font-family:'El Messiri',serif;font-weight:900">
          تعديل تقييم <span id="editEvalIdText"></span>
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <form method="post" id="editEvalForm" action="">
        <div class="modal-body">
          <input type="hidden" name="candidate_id" value="<?= (int)($selected->id ?? 0) ?>">
          <input type="hidden" name="return_q" value="<?= html_escape($q ?? '') ?>">

          <div class="row g-2">
            <div class="col-md-4">
              <label class="form-label">رقم المقيم</label>
              <input type="text" name="evaluator_user_id" id="edit_evaluator" class="form-control" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">الحالة</label>
              <select name="status" id="edit_status" class="form-select" required>
                <option value="pending">انتظار</option>
                <option value="completed">تم التقييم</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">الدرجة</label>
              <input type="number" step="0.01" name="score" id="edit_score" class="form-control">
            </div>

            <div class="col-md-4">
              <label class="form-label">الراتب المتوقع</label>
              <input type="number" step="0.01" name="recommended_salary" id="edit_salary" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">مقدّم الطلب / مرجع</label>
              <input type="text" name="requested_by" id="edit_requested" class="form-control">
            </div>

            <div class="col-12">
              <label class="form-label">ملاحظات</label>
              <textarea name="notes" id="edit_notes" rows="4" class="form-control"></textarea>
            </div>

            <div class="col-12"><div class="hint">* تغيير الحالة إلى completed يضبط completed_at تلقائيًا.</div></div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">إغلاق</button>
          <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> حفظ</button>
        </div>
      </form>

    </div>
  </div>
</div>

</div>
