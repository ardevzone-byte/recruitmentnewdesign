<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div dir="rtl" class="rows col-12 jobs-dashboard recruitment-page">
    <div class="block col-12 mb-4 heading-white">
        <div class="head-table col-12 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <h4><i class="bi bi-journal-text me-2"></i> نموذج الوصف الوظيفي</h4>
                <p class="text-muted mb-0">رقم المستند: #<?= (int)$jd['id'] ?> — <?= html_escape($jd['job_title']) ?></p>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <a href="<?= site_url('job_description'); ?>" class="button default orange outline small">
                    <i class="bi bi-arrow-right me-1"></i> رجوع
                </a>
                <a href="<?= site_url('job_description/print_view/' . $jd['id']); ?>" target="_blank" class="button hex-btn small">
                    <i class="bi bi-printer me-1"></i> طباعة / حفظ PDF
                </a>
                <?php if (!empty($my_approval) && $my_approval['status'] === 'pending'): ?>
                    <a href="<?= site_url('job_description/sign/' . $jd['id']); ?>" class="button hex-btn small">
                        <i class="bi bi-pen me-1"></i> توقيع واعتماد
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="block col-12">
        <div class="box col-12">
            <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4 pb-3 border-bottom">
                <div>
                    <span class="badge bg-secondary me-2">الحالة: <?= html_escape($jd['status']) ?></span>
                    <span class="text-muted">تاريخ الإنشاء: <?= html_escape($jd['created_at']) ?></span>
                </div>
                <div class="text-start">
                    <strong>الموظف:</strong> <?= html_escape($jd['employee_name']) ?><br>
                    <strong>الرقم الوظيفي:</strong> <?= html_escape($jd['employee_id']) ?>
                </div>
            </div>

            <div class="mb-4">
                <h5 class="mb-2"><i class="bi bi-file-text me-2"></i> الوصف الوظيفي</h5>
                <div class="p-3 bg-light rounded" style="white-space: pre-wrap; line-height: 1.8;"><?= html_escape($jd['description_text']) ?></div>
            </div>

            <div>
                <h5 class="mb-3"><i class="bi bi-pen me-2"></i> التعميد والتوقيعات</h5>
                <div class="row g-3">
                    <?php foreach ($approvals as $a): ?>
                        <div class="col-md-4">
                            <div class="p-3 border rounded h-100">
                                <div class="fw-bold text-primary">
                                    <?= $a['role'] === 'employee' ? 'الموظف' : ($a['role'] === 'supervisor' ? 'المشرف المباشر' : 'مدير الموارد البشرية') ?>
                                </div>
                                <div class="small text-muted"><?= html_escape($a['approver_name']) ?> (<?= html_escape($a['approver_username']) ?>)</div>
                                <div class="small mt-1">الحالة: <strong><?= html_escape($a['status']) ?></strong><?= $a['signed_at'] ? ' — ' . $a['signed_at'] : '' ?></div>
                                <?php if (!empty($a['signature_file']) && file_exists(FCPATH . $a['signature_file'])): ?>
                                    <img src="<?= base_url($a['signature_file']); ?>" alt="signature" class="mt-2" style="max-height:60px;">
                                <?php else: ?>
                                    <div class="small text-muted mt-2">— لا يوجد توقيع —</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
