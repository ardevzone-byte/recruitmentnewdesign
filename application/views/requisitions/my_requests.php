<div dir="rtl" class="rows col-12">
    <div class="block col-12 mb-4 head-table-block-white">
        <div class="head-table col-12 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <h4><i class="bi bi-file-earmark-text me-2"></i> طلباتي الوظيفية</h4>
                <p class="text-muted mb-0">جميع الطلبات التي قمت بإنشائها وتتبع سيرها</p>
            </div>
            <a href="<?= base_url('requisitions/create') ?>" class="button hex-btn">
                <span class="plus hex"></span> إنشاء طلب جديد
            </a>
        </div>
    </div>

    <?php if (empty($my_requests)): ?>
        <div class="block col-12">
            <div class="box col-12">
                <div class="alert alert-info mb-0">
                    <i class="bi bi-info-circle me-2"></i> لم تقم بإنشاء أي طلبات وظيفية بعد.
                    <a href="<?= base_url('requisitions/create') ?>" class="alert-link fw-bold">أنشئ طلبك الأول</a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="block col-12">
            <div class="box col-12">
        <div class="table-wrapper-rtl">
            <div class="table-responsive">
            <table class="table table-custom align-middle">
                <thead>
                    <tr>
                        <th width="60">#</th>
                        <th width="180">تاريخ الإنشاء</th>
                        <th>المسمى الوظيفي</th>
                        <th>القسم</th>
                        <th>المشروع</th>
                        <th>المنطقة</th>
                        <th width="120">الحالة</th>
                        <th width="100">المتقدمين</th>
                        <th width="100">المقابلات</th>
                        <th width="100">العروض</th>
                        <th width="150">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($my_requests as $index => $request): ?>
                    <tr>
                        <td class="text-center fw-bold"><?= $request['id'] ?></td>
                        <td><?= date('Y-m-d', strtotime($request['created_at'])) ?></td>
                        <td class="fw-bold"><?= htmlspecialchars($request['role_title']) ?></td>
                        <td><?= htmlspecialchars($request['department']) ?></td>
                        <td><?= htmlspecialchars($request['project_or_client']) ?></td>
                        <td><?= htmlspecialchars($request['region']) ?></td>
                        <td>
                            <?php
                            $status_classes = [
                                'بانتظار مدير التوظيف' => 'warning',
                                'بانتظار الرئيس التنفيذي' => 'info',
                                'معتمد' => 'success',
                                'مرفوض' => 'danger',
                                'تم النشر' => 'primary'
                            ];
                            $class = $status_classes[$request['status']] ?? 'secondary';
                            ?>
                            <span class="tag <?= in_array($class, ['success','danger','warning']) ? $class : '' ?>">
                                <?= $request['status'] ?>
                            </span>
                        </td>
                        <td class="text-center">
                            <?php if ($request['application_count'] > 0): ?>
                                <a href="<?= base_url('pipeline/index/' . $request['job_posting']['id']) ?>" 
                                   class="badge bg-success text-decoration-none" 
                                   data-bs-toggle="tooltip" title="عرض المتقدمين">
                                    <?= $request['application_count'] ?>
                                </a>
                            <?php else: ?>
                                <span class="badge bg-secondary">0</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <?php if ($request['interview_count'] > 0): ?>
                                <span class="badge bg-info">
                                    <?= $request['interview_count'] ?>
                                </span>
                            <?php else: ?>
                                <span class="badge bg-secondary">0</span>
                            <?php endif; ?>
                        </td>
                        <td class="text-center">
                            <?php if ($request['offer_count'] > 0): ?>
                                <span class="badge bg-warning">
                                    <?= $request['offer_count'] ?>
                                </span>
                            <?php else: ?>
                                <span class="badge bg-secondary">0</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <div class="d-flex gap-2 flex-wrap">
                                <a href="<?= base_url('requisitions/view/' . $request['id']) ?>" 
                                   class="button default orange outline small" title="عرض التفاصيل">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <?php if (!empty($request['job_posting'])): ?>
                                    <a href="<?= base_url('simple_apply/view/' . $request['job_posting']['public_link_id']) ?>" 
                                       target="_blank" 
                                       class="button default orange outline small"
                                       title="عرض الإعلان المنشور">
                                        <i class="bi bi-box-arrow-up-right"></i>
                                    </a>
                                    <a href="<?= base_url('pipeline/index/' . $request['job_posting']['id']) ?>" 
                                       class="button default orange outline small"
                                       title="مسار التوظيف">
                                        <i class="bi bi-columns-gap"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
        </div>

        <div class="block col-12 mt-4">
            <div class="box col-12">
                <div class="head-table col-12 mb-3">
                    <h4><i class="bi bi-bar-chart me-2"></i> ملخص الطلبات</h4>
                </div>
                <div class="row text-center g-3">
                    <div class="col-6 col-md-3">
                        <div class="stat-box" style="background: linear-gradient(135deg,#5C5E8A,#7B7DA8); color:#fff; padding:20px; border-radius:12px;">
                            <h2 class="mb-0"><?= count($my_requests) ?></h2>
                            <p class="mb-0 mt-1">إجمالي الطلبات</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-box" style="background: linear-gradient(135deg,#28A745,#34C759); color:#fff; padding:20px; border-radius:12px;">
                            <h2 class="mb-0"><?= count(array_filter($my_requests, fn($r) => ($r['status'] ?? '') == 'معتمد')) ?></h2>
                            <p class="mb-0 mt-1">معتمدة</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-box" style="background: linear-gradient(135deg,#F29220,#FFB347); color:#fff; padding:20px; border-radius:12px;">
                            <h2 class="mb-0"><?= count(array_filter($my_requests, fn($r) => in_array($r['status'] ?? '', ['بانتظار مدير التوظيف','بانتظار الرئيس التنفيذي']))) ?></h2>
                            <p class="mb-0 mt-1">قيد الانتظار</p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="stat-box" style="background: linear-gradient(135deg,#DC3545,#E4606D); color:#fff; padding:20px; border-radius:12px;">
                            <h2 class="mb-0"><?= count(array_filter($my_requests, fn($r) => ($r['status'] ?? '') == 'مرفوض')) ?></h2>
                            <p class="mb-0 mt-1">مرفوضة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<style>
.stat-box {
    padding: 20px;
    border-radius: 10px;
    margin: 10px 0;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}
.stat-box h2 {
    font-size: 2.5rem;
    margin-bottom: 5px;
}
.stat-box p {
    font-size: 1rem;
    margin: 0;
    opacity: 0.9;
}
</style>

<script>
// تفعيل أدوات التلميحات
document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>