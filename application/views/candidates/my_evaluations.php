<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
.my-evaluations-page .nav-tabs { border-bottom: 2px solid #e9ecef; margin-bottom: 1.5rem; gap: 10px; flex-wrap: wrap; }
.my-evaluations-page .nav-link {
  color: #6c757d; font-weight: 600; padding: 0.75rem 1.5rem; border: none;
  border-radius: 50px !important; transition: all 0.3s; background: #e9ecef;
}
.my-evaluations-page .nav-link:hover { color: #f29220; background: #dee2e6; }
.my-evaluations-page .nav-link.active {
  color: #fff !important; background: linear-gradient(135deg, #f29220, #e8890b) !important;
  box-shadow: 0 4px 10px rgba(242, 146, 32, 0.35);
}
.my-evaluations-page .evaluation-card {
  background: #fff; border-radius: 16px; border: 1px solid #e2e8f0;
  box-shadow: 0 4px 20px rgba(0,0,0,.06); overflow: hidden; position: relative;
}
.my-evaluations-page .card-bar { height: 5px; background: linear-gradient(90deg, #f29220, #5c5e8a); width: 100%; }
.my-evaluations-page .report-wrapper { background: #fff; border-radius: 16px; padding: 1rem; border: 1px solid #e2e8f0; }
.my-evaluations-page .modern-table { width: 100%; border-collapse: separate; border-spacing: 0; min-width: 1000px; }
.my-evaluations-page .modern-table th {
  position: sticky; top: 0; background: #f8fafc; z-index: 10;
  padding: 12px; border: 1px solid #e2e8f0; text-align: center; font-size: 0.8rem;
}
.my-evaluations-page .sticky-col-1 {
  position: sticky; right: 0; background: #fff; z-index: 20;
  border-left: 2px solid #cbd5e1 !important; width: 160px; min-width: 160px;
}
.my-evaluations-page .modern-table td { padding: 8px; border: 1px solid #e2e8f0; text-align: center; vertical-align: middle; font-size: 0.9rem; }
.my-evaluations-page .bg-int { background: #eff6ff !important; color: #1e40af; }
.my-evaluations-page .bg-app { background: #fff7ed !important; color: #9a3412; }
.my-evaluations-page .bg-off { background: #f0fdf4 !important; color: #166534; }
.my-evaluations-page .fw-bolder { font-weight: 800; }
.my-evaluations-page .salary-readonly { background-color: #f1f5f9; cursor: not-allowed; color: #64748b; }
</style>

<div dir="rtl" class="rows col-12 jobs-dashboard recruitment-page my-evaluations-page">
  <div class="block col-12 mb-4 heading-white">
    <div class="head-table col-12 d-flex flex-wrap justify-content-between align-items-center gap-3">
      <div>
        <h4><i class="bi bi-list-task me-2"></i> مساحة العمل — التقييمات</h4>
        <p class="mb-0 text-muted small">إدارة التقييمات المعلقة والتقارير</p>
      </div>
      <div class="d-flex flex-wrap gap-2">
        <a class="button hex-btn small" href="<?= site_url('dashboard'); ?>"><i class="bi bi-house-door me-1"></i> الرئيسية</a>
        <button type="button" class="button hex-btn small" onclick="history.back()"><i class="bi bi-arrow-right me-1"></i> رجوع</button>
      </div>
    </div>
  </div>

  <?php if ($this->session->flashdata('error_msg')): ?>
    <div class="alert alert-warning"><?= $this->session->flashdata('error_msg') ?></div>
  <?php endif; ?>
  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
  <?php endif; ?>

  <div class="block col-12">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending-pane" type="button" role="tab">
          <i class="fas fa-clipboard-list me-2"></i> التقييمات المعلقة
          <span class="badge bg-light text-dark rounded-pill ms-2"><?= count($tasks ?? []) ?></span>
        </button>
      </li>
      <?php if ($this->session->userdata('username') == '1001'): ?>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="report-tab" data-bs-toggle="tab" data-bs-target="#report-pane" type="button" role="tab">
          <i class="fas fa-chart-pie me-2"></i> تقرير الأداء (CEO)
        </button>
      </li>
      <?php endif; ?>
    </ul>

    <div class="tab-content" id="myTabContent">

      <div class="tab-pane fade show active" id="pending-pane" role="tabpanel">
        <div class="row g-4">
          <?php if (empty($tasks)): ?>
            <div class="col-12 text-center py-5">
              <div class="mb-3"><i class="fas fa-check-circle fa-4x text-success opacity-25"></i></div>
              <h4 class="text-muted fw-bold">لا توجد مهام معلقة</h4>
              <p class="text-muted">لقد أتممت جميع التقييمات المطلوبة منك.</p>
            </div>
          <?php else: ?>
            <?php foreach ($tasks as $index => $task): ?>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="evaluation-card">
                  <div class="card-bar"></div>
                  <div class="p-4">
                    <div class="d-flex justify-content-between mb-3">
                      <div class="d-flex align-items-center">
                        <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold me-2" style="width:40px; height:40px; background: linear-gradient(135deg,#f29220,#5c5e8a);">
                          <?= mb_substr($task['full_name'], 0, 1) ?>
                        </div>
                        <div>
                          <h6 class="fw-bold mb-0"><?= html_escape($task['full_name']) ?></h6>
                          <small class="text-muted"><?= html_escape($task['job_title']) ?></small>
                        </div>
                      </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center bg-light rounded p-2 mb-3">
                      <small class="text-muted"><i class="far fa-clock me-1"></i> تاريخ الطلب:</small>
                      <small class="fw-bold"><?= date('Y-m-d', strtotime($task['created_at'])) ?></small>
                    </div>

                    <div class="d-grid gap-2">
                      <button class="button hex-btn small justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#evalModal<?= (int)$task['id'] ?>">
                        <i class="fas fa-star me-2"></i> تقييم المرشح
                      </button>
                      <a href="<?= site_url('candidates/view/' . (int)$task['application_id']) ?>" target="_blank" rel="noopener" class="button hex-btn small justify-content-center" style="background: transparent; border: 1px solid #e2e8f0;">
                        <i class="fas fa-eye me-2"></i> عرض الملف
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="evalModal<?= (int)$task['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content border-0 shadow-lg">
                    <form action="<?= site_url('candidates/submit_evaluation_result') ?>" method="post">
                      <div class="modal-header border-0" style="background: linear-gradient(135deg,#fff7ed,#fff);">
                        <h5 class="modal-title fw-bold"><i class="fas fa-user-check me-2"></i> تقييم المرشح</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body p-4">
                        <input type="hidden" name="eval_id" value="<?= (int)$task['id'] ?>">

                        <div class="text-center mb-4">
                          <h5 class="fw-bold"><?= html_escape($task['full_name']) ?></h5>
                          <span class="badge bg-light text-dark border"><?= html_escape($task['job_title']) ?></span>
                        </div>

                        <label class="form-label fw-bold small text-muted">الدرجة النهائية (0 - 100)</label>
                        <div class="input-group mb-3">
                          <input type="number" name="score" class="form-control border-2 text-center fw-bold"
                                 placeholder="أدخل الدرجة (مثلاً: 77)"
                                 min="0" max="100" step="1" required
                                 oninput="this.value = !!this.value && Math.abs(this.value) >= 0 && Math.abs(this.value) <= 100 ? Math.abs(this.value) : null">
                          <span class="input-group-text bg-light fw-bold">%</span>
                        </div>

                        <?php
                        $curr_user = $this->session->userdata('username');
                        $is_tech = in_array($curr_user, ['1526', '1291', '3141'], true);
                        $is_ceo = ($curr_user === '1001');
                        $can_edit = ($is_tech || $is_ceo);

                        $salary_value = '';
                        if ($is_tech) {
                            $salary_value = $task['recommended_salary'] ?? '';
                        } elseif ($is_ceo) {
                            $salary_value = !empty($task['recommended_salary']) ? $task['recommended_salary'] : ($task['tech_salary'] ?? '');
                        } else {
                            $salary_value = $task['tech_salary'] ?? '';
                        }
                        ?>

                        <div class="bg-light p-3 rounded mb-3 border border-warning">
                          <label class="form-label fw-bold small text-success">
                            <i class="fas fa-money-bill-wave me-1"></i> الراتب المقترح (ريال)
                          </label>
                          <input type="number"
                                 name="recommended_salary"
                                 class="form-control fw-bold <?= $can_edit ? 'text-dark' : 'salary-readonly' ?>"
                                 placeholder="<?= $can_edit ? 'أدخل الراتب هنا...' : 'لم يتم تحديد راتب بعد' ?>"
                                 step="0.01"
                                 value="<?= html_escape($salary_value) ?>"
                                 <?= $can_edit ? '' : 'readonly' ?>>

                          <?php if ($can_edit): ?>
                            <small class="text-success d-block mt-1 fw-bold"><i class="fas fa-pen small"></i> يمكنك تعديل هذا الحقل</small>
                          <?php else: ?>
                            <small class="text-muted d-block mt-1"><i class="fas fa-lock small"></i> للقراءة فقط (إدخال الفريق التقني)</small>
                          <?php endif; ?>
                        </div>

                        <label class="form-label fw-bold small text-muted">ملاحظاتك</label>
                        <textarea name="notes" class="form-control" rows="3" placeholder="اكتب نقاط القوة والضعف..." required></textarea>
                      </div>
                      <div class="modal-footer border-0 bg-light">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                        <button type="submit" class="button hex-btn small">إرسال</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>

      <?php if ($this->session->userdata('username') == '1001' && !empty($job_columns) && !empty($team_users)): ?>
      <div class="tab-pane fade" id="report-pane" role="tabpanel">
        <div class="report-wrapper" dir="ltr">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold m-0"><i class="fas fa-table me-2 text-warning"></i> Team Performance Matrix</h5>
            <small class="text-muted">Live Data</small>
          </div>

          <div class="table-responsive" style="max-height: 70vh;">
            <table class="modern-table table-bordered">
              <thead>
                <tr>
                  <th class="sticky-col-1" rowspan="2">EMPLOYEE</th>
                  <th class="bg-int" colspan="<?= count($job_columns) ?>">INTERVIEWS</th>
                  <th class="bg-app" colspan="<?= count($job_columns) ?>">APPROVALS</th>
                  <th class="bg-off" colspan="<?= count($job_columns) ?>">OFFERS</th>
                </tr>
                <tr>
                  <?php for ($i = 0; $i < 3; $i++): ?>
                    <?php foreach ($job_columns as $job): ?>
                      <th class="<?= $i == 0 ? 'bg-int' : ($i == 1 ? 'bg-app' : 'bg-off') ?> small"
                          style="min-width: 100px; max-width: 140px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"
                          title="<?= html_escape($job['job_title']) ?>">
                        <?= html_escape($job['job_title']) ?>
                      </th>
                    <?php endforeach; ?>
                  <?php endfor; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($team_users as $user): ?>
                <tr>
                  <td class="sticky-col-1 text-start ps-3">
                    <div class="fw-bold text-dark"><?= html_escape($user['name']) ?></div>
                    <small class="text-muted" style="font-size: 0.75rem"><?= html_escape($user['username']) ?></small>
                  </td>
                  <?php foreach ($job_columns as $job): $val = $matrix_data[$user['id']][$job['id']]['interviews'] ?? 0; ?>
                    <td class="<?= $val > 0 ? 'fw-bolder text-primary' : 'text-muted' ?>"><?= $val ?: '-' ?></td>
                  <?php endforeach; ?>
                  <?php foreach ($job_columns as $job): $val = $matrix_data[$user['id']][$job['id']]['approvals'] ?? 0; ?>
                    <td class="<?= $val > 0 ? 'fw-bolder text-danger' : 'text-muted' ?>"><?= $val ?: '-' ?></td>
                  <?php endforeach; ?>
                  <?php foreach ($job_columns as $job): $val = $matrix_data[$user['id']][$job['id']]['offers'] ?? 0; ?>
                    <td class="<?= $val > 0 ? 'fw-bolder text-success' : 'text-muted' ?>"><?= $val ?: '-' ?></td>
                  <?php endforeach; ?>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </div>
</div>
