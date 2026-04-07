<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div dir="rtl" class="rows col-12 jobs-dashboard">
    <div class="block col-12 mb-4 heading-white">
        <div class="head-table col-12">
            <h4><i class="bi bi-briefcase me-2"></i> <?= $title ?? 'لوحة تحكم الوظائف' ?></h4>
            <p class="mb-0">إدارة الطلبات المعتمدة والوظائف المنشورة والتقديمات</p>
        </div>
    </div>

  <?php if (!empty($is_demo_mode)): ?>
    <div class="alert alert-info mb-3">
      <i class="bi bi-info-circle me-2"></i>
      <strong>عرض تجريبي:</strong> البيانات التالية للعرض فقط. لإضافة بيانات حقيقية: أنشئ طلب من <a href="<?= site_url('requisitions/create') ?>">طلبات التوظيف</a> ثم اعتمده ونشره.
    </div>
  <?php endif; ?>

  <!-- Pending Requests -->
  <div class="block col-12 col-lg-6 mb-4">
    <div class="box job-card job-card-blue col-12">
      <div class="job-card-header job-card-header-blue">
        <h4><i class="bi bi-check2-circle me-2"></i> طلبات معتمدة (بانتظار النشر)</h4>
      </div>

      <div class="job-card-body">
      <?php if($this->session->flashdata('success_msg')): ?>
        <?= $this->session->flashdata('success_msg') ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error_msg') ?></div>
      <?php endif; ?>

      <?php if (empty($pending_requests)): ?>
        <div class="text-center text-muted p-4">
          <i class="bi bi-inbox mb-3" style="font-size: 3rem;"></i><br>
          <h5>لا توجد طلبات بانتظار النشر</h5>
          <p>جميع الطلبات المعتمدة تم نشرها بالفعل</p>
        </div>
      <?php else: ?>
        <div class="table-wrapper-rtl">
          <div class="table-responsive">
            <table class="table table-custom align-middle">
              <thead>
                <tr>
                  <th>#</th>
                  <th>المسمى الوظيفي</th>
                  <th>المشروع</th>
                  <th>الإجراء</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pending_requests as $req): ?>
                  <tr>
                    <td class="fw-bold">#<?= $req['id'] ?></td>
                    <td class="fw-bold text-dark"><?= htmlspecialchars($req['role_title']) ?></td>
                    <td><span class="tag"><?= htmlspecialchars($req['project_or_client']) ?></span></td>
                    <td>
                      <a href="<?= base_url('jobs/create/' . $req['id']) ?>" class="button hex-btn small">
                        <i class="bi bi-plus-circle me-1"></i> نشر إعلان
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      <?php endif; ?>
      </div>

    </div>
  </div>

  <!-- Published Jobs -->
  <div class="block col-12 col-lg-6 mb-4">
    <div class="box job-card job-card-green col-12">
      <div class="job-card-header job-card-header-green">
        <h4><i class="bi bi-megaphone me-2"></i> وظائف منشورة حالياً</h4>
      </div>

      <?php
        $current_user = $this->session->userdata('username');
        $can_add_manual_candidate = in_array($current_user, ['1526','1291','2200','2439']) || $this->session->userdata('role') == 'recruitment_manager';
      ?>

      <div class="job-card-body">
      <?php if ($can_add_manual_candidate): ?>
        <div class="mb-3 pb-3 border-bottom d-flex gap-2 flex-wrap">
          <a href="<?= base_url('candidates/add_manual') ?>" class="button hex-btn white small">
            <i class="bi bi-person-plus me-1"></i> إضافة مرشح يدوياً
          </a>
          <a href="<?= base_url('candidates/archive') ?>" class="button hex-btn white small">
            <i class="bi bi-archive me-1"></i> الأرشيف العام
          </a>
        </div>
      <?php endif; ?>

      <?php if (empty($published_jobs)): ?>
        <div class="text-center text-muted p-4">
          <i class="bi bi-megaphone mb-3" style="font-size: 3rem; color: #adb5bd;"></i>
          <h5 class="mb-2">لا توجد وظائف منشورة</h5>
          <p class="mb-0">لم يتم نشر أي وظائف بعد. أنشئ طلب توظيف من <a href="<?= site_url('requisitions/create') ?>">طلبات التوظيف</a> ثم اعتمده ونشره من هنا.</p>
        </div>
      <?php else: ?>
        <div class="table-wrapper-rtl">
          <div class="table-responsive">
            <table class="table table-custom align-middle">
              <thead>
                <tr>
                  <th>المسمى الوظيفي</th>
                  <th>المشروع</th>
                  <th>المتقدمون</th>
                  <th>الإجراءات</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($published_jobs as $job): ?>
                  <?php $is_demo = !empty($is_demo_mode) && empty($job['id']); ?>
                  <tr>
                    <td class="fw-bold text-dark">
                      <?php if ($is_demo): ?>
                        <span><?= htmlspecialchars($job['job_title']) ?></span>
                      <?php else: ?>
                        <a href="<?= base_url('jobs/view/' . $job['id']) ?>" class="text-dark text-decoration-none"><?= htmlspecialchars($job['job_title']) ?></a>
                      <?php endif; ?>
                    </td>
                    <td><span class="tag"><?= htmlspecialchars($job['project_or_client']) ?></span></td>
                    <td>
                      <?php
                        $counts = $job['applicant_counts'] ?? ['total' => 0, 'interviewed' => 0, 'hired' => 0];
                        $total = (int)($counts['total'] ?? 0);
                        $hired = (int)($counts['hired'] ?? 0);
                        $interviewed = (int)($counts['interviewed'] ?? 0);
                        $inProgress = max(0, $total - $hired);
                        $pctHired = $total > 0 ? round(100 * $hired / $total) : 0;
                        $pctProgress = $total > 0 ? round(100 * $inProgress / $total) : 0;
                      ?>
                      <div class="applicant-bars">
                        <div class="applicant-bars-track">
                          <span class="applicant-bar applicant-bar-green" style="width:<?= $pctHired ?>%"></span>
                          <span class="applicant-bar applicant-bar-blue" style="width:<?= $pctProgress ?>%"></span>
                        </div>
                        <?php if ($is_demo): ?>
                          <span class="applicant-count-link"><i class="bi bi-people-fill"></i> <?= $total ?></span>
                        <?php else: ?>
                          <a href="<?= base_url('pipeline/index/' . $job['id']) ?>" class="applicant-count-link" title="عرض المتقدمين">
                            <i class="bi bi-people-fill"></i> <?= $total ?>
                          </a>
                        <?php endif; ?>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex gap-2 flex-wrap">
                        <?php if ($is_demo): ?>
                          <span class="button default orange small" title="عرض تجريبي"><i class="bi bi-file-text"></i></span>
                          <span class="button default orange small" title="عرض تجريبي"><i class="bi bi-columns-gap"></i></span>
                          <span class="button default orange outline small" title="عرض تجريبي"><i class="bi bi-eye"></i></span>
                          <span class="button default orange small" title="عرض تجريبي"><i class="bi bi-link-45deg"></i></span>
                        <?php else: ?>
                          <a href="<?= base_url('jobs/view/' . $job['id']) ?>" class="button default orange small" title="تفاصيل الوظيفة">
                            <i class="bi bi-file-text"></i>
                          </a>
                          <a href="<?= base_url('pipeline/index/' . $job['id']) ?>" class="button default orange small" title="مسار التوظيف">
                            <i class="bi bi-columns-gap"></i>
                          </a>
                          <a href="<?= base_url('simple_apply/view/' . $job['public_link_id']) ?>" target="_blank" class="button default orange outline small" title="عرض الإعلان">
                            <i class="bi bi-eye"></i>
                          </a>
                          <button type="button" class="button default orange small" onclick="copyJobLink('<?= $job['public_link_id'] ?>')" title="نسخ رابط التقديم">
                            <i class="bi bi-link-45deg"></i>
                          </button>
                        <?php endif; ?>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      <?php endif; ?>
      </div>

    </div>
  </div>

</div>

<script>
function copyJobLink(linkId) {
    var jobUrl = "<?= base_url('simple_apply/view/'); ?>" + linkId;
    var tempInput = document.createElement("input");
    tempInput.value = jobUrl;
    document.body.appendChild(tempInput);
    tempInput.select();
    tempInput.setSelectionRange(0, 99999);
    document.execCommand("copy");
    document.body.removeChild(tempInput);
    alert("تم نسخ رابط التقديم السريع:\n" + jobUrl);
}
</script>
