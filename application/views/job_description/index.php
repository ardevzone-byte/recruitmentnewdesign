<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div dir="rtl" class="rows col-12">
    <div class="block col-12 mb-4 head-table-block-white">
        <div class="head-table col-12 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <h4><i class="bi bi-journal-text me-2"></i> الوصف الوظيفي</h4>
                <p class="text-muted mb-0">المستندات التي تخصك (بانتظار توقيعك / موقعة / مرفوضة)</p>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <a href="<?= site_url('job_description/create'); ?>" class="button hex-btn">
                    <i class="bi bi-plus-lg me-1"></i> إنشاء وصف
                </a>
                <a href="<?= site_url('dashboard'); ?>" class="button default orange outline">
                    <i class="bi bi-house me-1"></i> الرئيسية
                </a>
            </div>
        </div>
    </div>

    <div class="block col-12 head-table-block-white">
        <div class="box col-12">
            <h3 class="title">قائمة الوصفات الوظيفية</h3>
            <div class="table-wrapper-rtl">
                <div class="table-responsive">
                    <table class="table table-custom data-table align-middle">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th>الموظف</th>
                                <th>المسمى</th>
                                <th>حالتي</th>
                                <th>تاريخ</th>
                                <th width="120">الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($rows)): ?>
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox" style="font-size:2rem;"></i><br>
                                    لا يوجد عناصر
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php $i = 1; foreach ($rows as $r): ?>
                            <tr>
                                <td class="fw-bold"><?= $i++; ?></td>
                                <td><?= html_escape($r['employee_name'] ?? '—'); ?></td>
                                <td><?= html_escape($r['job_title'] ?? '—'); ?></td>
                                <td>
                                    <span class="badge bg-<?= ($r['status'] ?? '') === 'pending' ? 'warning' : (($r['status'] ?? '') === 'approved' ? 'success' : (($r['status'] ?? '') === 'rejected' ? 'danger' : 'secondary')) ?>">
                                        <?= html_escape($r['status'] ?? '—'); ?>
                                    </span>
                                </td>
                                <td><?= html_escape($r['created_at'] ?? '—'); ?></td>
                                <td>
                                    <a href="<?= site_url('job_description/view/' . (int)$r['id']); ?>" class="button default orange outline small">
                                        <i class="bi bi-eye me-1"></i> عرض
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
