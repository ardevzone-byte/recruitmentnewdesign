<div dir="rtl" class="rows col-12">
    <div class="block col-12 mb-4">
        <div class="head-table col-12 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <h4><i class="bi bi-award me-2"></i> لوحة اعتماد العروض</h4>
                <p class="text-muted mb-0">أنت تشاهد العروض بصفتك: <strong><?= $role_view ?></strong></p>
            </div>
            <a href="<?= base_url('dashboard') ?>" class="button hex-btn white small">
                <i class="bi bi-arrow-right me-1"></i> العودة للرئيسية
            </a>
        </div>
    </div>

    <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success shadow-sm">
            <i class="fas fa-check-circle me-2"></i> <?= $this->session->flashdata('success_msg') ?>
        </div>
    <?php endif; ?>

    <?php if(empty($pending_offers)): ?>
        <div class="block col-12">
            <div class="box col-12 text-center p-5">
                <i class="bi bi-inbox mb-3 opacity-50" style="font-size:5rem;"></i>
                <h4 class="text-muted">لا يوجد عروض معلقة حالياً</h4>
                <p class="text-muted">جميع العروض تم اتخاذ إجراء بشأنها.</p>
            </div>
        </div>
    <?php else: ?>
        <div class="block col-12">
            <div class="box col-12">
                <div class="head-table col-12 mb-3">
                    <h4><i class="bi bi-clock text-warning me-2"></i> بانتظار موافقتك</h4>
                </div>
            <div class="table-wrapper-rtl">
            <div class="table-responsive">
                <table class="table table-custom align-middle mb-0">
                    <thead>
                        <tr>
                            <th>رقم العرض</th>
                            <th>المرشح</th>
                            <th>المسمى الوظيفي</th>
                            <th>الراتب الإجمالي</th>
                            <th>تاريخ المباشرة</th>
                            <th>الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($pending_offers as $offer): ?>
                            <tr>
                                <td class="fw-bold">#<?= $offer['id'] ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-light rounded-circle p-2 me-2 text-primary">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div>
                                            <h6 class="mb-0 fw-bold"><?= $offer['full_name'] ?></h6>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="tag"><?= $offer['job_title'] ?></span>
                                </td>
                                <td class="fw-bold text-success"><?= number_format($offer['total_salary']) ?> ريال</td>
                                <td><?= $offer['start_date'] ?></td>
                                <td>
                                    <a href="<?= base_url('offers/view/' . $offer['id']) ?>" class="button hex-btn small">
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
    <?php endif; ?>
</div>