<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="ce2Settings" data-update-base="<?= site_url('CandidateEvaluations2/update/') ?>" class="d-none" aria-hidden="true"></div>

<div dir="rtl" class="rows col-12 jobs-dashboard recruitment-page candidate-evaluations2-page">

  <div class="block col-12 mb-3 heading-white">
    <div class="head-table col-12 d-flex flex-wrap align-items-center justify-content-between gap-3">
      <div>
        <h4 class="mb-1"><i class="bi bi-clipboard-data me-2"></i> إدارة تقييمات المرشح</h4>
        <p class="text-muted small mb-0">بحث بالاسم ← اختر المرشح ← تُعرض الطلبات ثم التقييمات</p>
      </div>
      <a class="button hex-btn small" href="<?= site_url('dashboard'); ?>"><i class="bi bi-house-door me-1"></i> الرئيسية</a>
    </div>
  </div>

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

    <div class="emp-table-card mb-3 ce2-search-card">
      <div class="emp-table-card__head candidate-evaluations2-page__card-head-light">
        <h5 class="mb-0"><i class="bi bi-search me-2"></i> بحث باسم المرشح</h5>
      </div>
      <div class="emp-table-card__body p-3 p-md-4">
      <form method="post" action="<?= base_url('CandidateEvaluations2/search'); ?>" class="row g-3 align-items-start ce2-search-form">
        <div class="col-lg-8">
          <label class="form-label ce2-search-label">الاسم</label>
          <input type="text" name="q" value="<?= html_escape($q ?? '') ?>" class="form-control ce2-search-input" placeholder="اكتب اسم المرشح...">
          <p class="candidate-evaluations2-page__hint mt-3 mb-0" role="note">سيتم عرض قائمة مرشحين؛ اختر المرشح لعرض الطلبات والتقييمات.</p>
        </div>
        <div class="col-lg-4 d-grid align-self-lg-end">
          <label class="form-label ce2-search-label opacity-0 user-select-none d-none d-lg-block">بحث</label>
          <button class="button default orange small justify-content-center py-2" type="submit"><i class="bi bi-search me-1"></i> بحث</button>
        </div>
      </form>
      </div>
    </div>

    <?php if (!empty($candidates)): ?>
      <div class="emp-table-card mb-3">
        <div class="emp-table-card__head candidate-evaluations2-page__card-head-light">
          <h5 class="mb-0"><i class="bi bi-people me-2"></i> نتائج البحث</h5>
        </div>
        <div class="emp-table-card__body p-3 p-md-4">
        <div class="row g-2">
          <?php foreach($candidates as $c): ?>
            <div class="col-md-6 col-lg-4">
              <a class="button hex-btn small w-100 justify-content-between"
                 href="<?= base_url('CandidateEvaluations2/select/' . (int)$c->id . '?q=' . urlencode($q)) ?>">
                <span><i class="bi bi-person-check me-1"></i><?= html_escape($c->full_name) ?></span>
                <span dir="ltr">#<?= (int)$c->id ?></span>
              </a>
            </div>
          <?php endforeach; ?>
        </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if (!empty($selected)): ?>
      <div class="emp-table-card mb-3">
        <div class="emp-table-card__body p-3 p-md-4">
        <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between">
          <div class="d-flex flex-wrap gap-2">
            <span class="badge rounded-pill text-bg-light border"><i class="bi bi-person me-1"></i><?= html_escape($selected->full_name) ?></span>
            <span class="badge rounded-pill text-bg-light border" dir="ltr">ID <?= (int)$selected->id ?></span>
          </div>
          <div class="text-muted small">تم جلب الطلبات والتقييمات المرتبطة بهذا المرشح.</div>
        </div>
        </div>
      </div>

      <div class="emp-table-card mb-3">
        <div class="emp-table-card__head candidate-evaluations2-page__card-head-light">
          <h5 class="mb-0"><i class="bi bi-layers me-2"></i> الطلبات (Applications)</h5>
        </div>
        <div class="emp-table-card__body p-3 p-md-4">
        <?php if (!empty($apps)): ?>
          <div class="d-flex gap-2 flex-wrap mt-2">
            <?php foreach($apps as $a): ?>
              <span class="badge rounded-pill text-bg-light border" dir="ltr">App #<?= (int)$a->id ?></span>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <div class="text-muted small mt-2">لا توجد طلبات مرتبطة بهذا المرشح.</div>
        <?php endif; ?>
        </div>
      </div>

      <!-- Add Evaluation -->
      <div class="emp-table-card mb-3">
        <div class="emp-table-card__head candidate-evaluations2-page__card-head-light">
          <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i> إضافة تقييم</h5>
        </div>
        <div class="emp-table-card__body p-3 p-md-4">

        <?php if (!empty($apps)): ?>
          <form method="post" action="<?= base_url('CandidateEvaluations2/create'); ?>" class="row g-2">
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
              <button class="button default orange small" type="submit"><i class="bi bi-save me-1"></i> حفظ</button>
              <a class="button hex-btn small" href="<?= base_url('CandidateEvaluations2/select/' . (int)$selected->id . '?q=' . urlencode($q ?? '')) ?>">
                <i class="bi bi-arrow-clockwise me-1"></i> تحديث
              </a>
            </div>
          </form>
        <?php else: ?>
          <div class="text-muted small mt-2">لا يمكن إضافة تقييم بدون وجود طلب توظيف.</div>
        <?php endif; ?>
        </div>
      </div>

      <!-- Evaluations Table -->
      <div class="emp-table-card mb-4">
        <div class="emp-table-card__head candidate-evaluations2-page__card-head-light">
          <h5 class="mb-0"><i class="bi bi-list-check me-2"></i> التقييمات</h5>
        </div>
        <div class="emp-table-card__body p-0">
        <div class="table-wrapper-rtl w-100">
        <div class="table-responsive w-100">
          <table class="table table-custom table-bordered align-middle mb-0 w-100">
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
        </div>
      </div>

    <?php endif; ?>

</div>

<!-- Modal واحد للتعديل -->
<div class="modal fade" id="editEvalModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" style="font-family:'El Messiri',serif;font-weight:900">
          تعديل تقييم <span id="editEvalIdText"></span>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="إغلاق"></button>
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
