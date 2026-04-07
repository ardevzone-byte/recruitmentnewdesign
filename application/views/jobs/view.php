<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$job = isset($job) ? $job : [];
if (empty($job)) {
    show_404();
    return;
}
$job_title = htmlspecialchars($job['job_title'] ?? '');
$department = htmlspecialchars($job['department'] ?? '');
$location = htmlspecialchars($job['location'] ?? '');
$experience = htmlspecialchars($job['experience'] ?? '');
$job_description = $job['job_description'] ?? '';
$project_or_client = htmlspecialchars($job['project_or_client'] ?? '');
$public_link_id = $job['public_link_id'] ?? '';
$job_id = (int)($job['id'] ?? 0);
?>

<div dir="rtl" class="rows col-12">
  <div class="block col-12 col-lg-10 mx-auto">
    <div class="box col-12 p-4">

      <!-- Job Header -->
      <div class="head-table col-12 mb-4 pb-3 border-bottom">
        <div class="d-flex flex-wrap justify-content-between align-items-start gap-3">
          <div>
            <h4 class="mb-2"><i class="bi bi-briefcase me-2"></i><?= $job_title ?></h4>
            <div class="d-flex flex-wrap gap-2 text-muted">
              <?php if (!empty($department)): ?>
                <span><i class="bi bi-building me-1"></i><?= $department ?></span>
              <?php endif; ?>
              <?php if (!empty($location)): ?>
                <span><i class="bi bi-geo-alt me-1"></i><?= $location ?></span>
              <?php endif; ?>
              <?php if (!empty($project_or_client)): ?>
                <span class="tag"><?= $project_or_client ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="d-flex gap-2 flex-wrap">
            <a href="<?= base_url('pipeline/index/' . $job_id) ?>" class="button hex-btn small">
              <i class="bi bi-columns-gap me-1"></i> مسار التوظيف
            </a>
            <a href="<?= base_url('simple_apply/view/' . $public_link_id) ?>" target="_blank" class="button default orange outline small">
              <i class="bi bi-eye me-1"></i> عرض الإعلان
            </a>
            <a href="<?= base_url('jobs') ?>" class="button default orange small">
              <i class="bi bi-arrow-right me-1"></i> العودة للوظائف
            </a>
          </div>
        </div>
      </div>

      <!-- Job Description Section -->
      <div class="block col-12 mb-4">
        <h5 class="mb-3"><i class="bi bi-file-text me-2"></i> الوصف الوظيفي</h5>
        <div class="box p-3" style="background:#f8f9fa; border-radius:8px;">
          <?php if (!empty($job_description)): ?>
            <div class="job-description-content"><?= nl2br(htmlspecialchars($job_description)) ?></div>
          <?php else: ?>
            <p class="text-muted mb-0">لا يوجد وصف وظيفي مضافة.</p>
          <?php endif; ?>
        </div>
      </div>

      <!-- Requirements / Experience Section -->
      <?php if (!empty($experience)): ?>
      <div class="block col-12 mb-4">
        <h5 class="mb-3"><i class="bi bi-award me-2"></i> الخبرة المطلوبة</h5>
        <div class="box p-3" style="background:#f8f9fa; border-radius:8px;">
          <p class="mb-0"><?= htmlspecialchars($experience) ?></p>
        </div>
      </div>
      <?php endif; ?>

      <!-- Quick Actions -->
      <div class="block col-12 mb-4">
        <h5 class="mb-3"><i class="bi bi-lightning me-2"></i> إجراءات سريعة</h5>
        <div class="d-flex flex-wrap gap-2">
          <a href="<?= base_url('pipeline/index/' . $job_id) ?>" class="button hex-btn small">
            <i class="bi bi-person-plus me-1"></i> إدارة المتقدمين
          </a>
          <button type="button" class="button default orange outline small" onclick="copyJobLink('<?= $public_link_id ?>')">
            <i class="bi bi-link-45deg me-1"></i> نسخ رابط التقديم
          </button>
        </div>
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
    alert("تم نسخ رابط التقديم:\n" + jobUrl);
}
</script>
