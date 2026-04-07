<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div dir="rtl" class="rows col-12">
    <div class="block col-12 mb-4 head-table-block-white">
        <div class="head-table col-12">
            <h4><i class="bi bi-check2-circle me-2"></i> <?= $title ?? 'الموافقات' ?></h4>
            <p class="text-muted mb-0">مراجعة واعتماد طلبات التوظيف والعروض الوظيفية</p>
        </div>
    </div>

    <?php if($this->session->flashdata('success_msg')): ?>
        <div class="block col-12">
            <div class="box col-12">
                <div class="alert alert-success mb-0"><?= $this->session->flashdata('success_msg') ?></div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(!empty($requests)): ?>
    <div class="block col-12">
        <div class="box col-12">
            <h3 class="title"><i class="bi bi-file-earmark-text me-2"></i> طلبات الاحتياج الوظيفي</h3>
            <div class="table-wrapper-rtl">
                <div class="table-responsive">
                    <table class="table table-custom data-table align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>المسمى الوظيفي</th>
                                <th>المشروع</th>
                                <th>المنطقة</th>
                                <th>العدد</th>
                                <th>تاريخ الطلب</th>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($requests as $req): ?>
                            <tr>
                                <td class="fw-bold">#<?= $req['id'] ?></td>
                                <td class="fw-bold"><?= htmlspecialchars($req['role_title']) ?></td>
                                <td><span class="badge bg-secondary"><?= htmlspecialchars($req['project_or_client']) ?></span></td>
                                <td><?= htmlspecialchars($req['region']) ?></td>
                                <td><span class="badge bg-primary"><?= $req['employees_needed'] ?></span></td>
                                <td><?= date('Y-m-d', strtotime($req['created_at'])) ?></td>
                                <td>
                                    <a href="<?= base_url('requisitions/view/' . $req['id']) ?>" class="button default orange outline small">
                                        <i class="bi bi-eye me-1"></i> مراجعة
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php
    $user_id = $this->session->userdata('username');
    $user_role = $this->session->userdata('role');
    if ($user_id == '2230' || $user_role == 'hr_manager'):
    ?>
    <div class="block col-12 mt-4">
        <div class="box col-12">
            <div class="title d-flex flex-wrap justify-content-between align-items-center gap-3">
                <h3 class="mb-0"><i class="bi bi-file-earmark-check me-2"></i> عروض وظيفية (HR)</h3>
                <div class="btn-group d-flex" dir="ltr">
                    <a href="<?= base_url('requisitions/approvals?offer_filter=history') ?>"
                       class="button small <?= ($current_filter == 'history') ? 'default orange' : 'outline' ?>">
                        السجل
                    </a>
                    <a href="<?= base_url('requisitions/approvals?offer_filter=pending') ?>"
                       class="button small <?= ($current_filter == 'pending') ? 'default orange' : 'outline' ?>">
                        قيد الانتظار
                    </a>
                </div>
            </div>
            <div class="table-wrapper-rtl">
                <div class="table-responsive">
                    <table class="table table-custom data-table align-middle">
                        <thead>
                            <tr>
                                <th>رقم العرض</th>
                                <th>اسم المرشح</th>
                                <th>الوظيفة / القسم</th>
                                <th>الراتب الإجمالي</th>
                                <?php if($current_filter == 'history'): ?>
                                    <th>الحالة (HR)</th>
                                    <th>تاريخ الإجراء</th>
                                <?php else: ?>
                                    <th>تاريخ الإنشاء</th>
                                <?php endif; ?>
                                <th>الإجراء</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($hr_offers)): ?>
                                <?php foreach ($hr_offers as $offer): ?>
                                <tr>
                                    <td class="fw-bold">#<?= $offer['id'] ?></td>
                                    <td class="fw-bold">
                                        <i class="bi bi-person-circle text-muted me-1"></i>
                                        <?= htmlspecialchars($offer['candidate_name']) ?>
                                    </td>
                                    <td>
                                        <div class="fw-bold"><?= htmlspecialchars($offer['job_title']) ?></div>
                                        <small class="text-muted"><?= htmlspecialchars($offer['department']) ?></small>
                                    </td>
                                    <td class="text-success fw-bold"><?= number_format($offer['total_salary']) ?> ريال</td>
                                    <?php if($current_filter == 'history'): ?>
                                        <td>
                                            <?php if($offer['hr_status'] == 'Approved'): ?>
                                                <span class="badge bg-success">معتمد <i class="bi bi-check"></i></span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">مرفوض <i class="bi bi-x"></i></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="small text-muted">
                                            <?= !empty($offer['hr_approved_at']) ? date('Y-m-d', strtotime($offer['hr_approved_at'])) : '-' ?>
                                        </td>
                                    <?php else: ?>
                                        <td><?= date('Y-m-d', strtotime($offer['created_at'])) ?></td>
                                    <?php endif; ?>
                                    <td>
                                        <a href="<?= base_url('offers/view/' . $offer['id']) ?>" class="button default orange outline small">
                                            <i class="bi bi-eye me-1"></i> عرض التفاصيل
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-muted">
                                        لا توجد عروض في هذه القائمة.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if(empty($requests) && !($user_id == '2230' || $user_role == 'hr_manager')): ?>
    <div class="block col-12">
        <div class="box col-12">
            <div class="alert alert-info mb-0">
                <i class="bi bi-info-circle me-2"></i> لا توجد طلبات في انتظار الموافقة حالياً.
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>