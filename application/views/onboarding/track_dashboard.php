<div class="container mt-5" dir="rtl">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3><i class="fas fa-tasks text-primary"></i> متابعة التهيئة: <?= $app_details['candidate']['full_name'] ?></h3>
        <a href="<?= base_url('candidates/view/'.$app_details['application']['id']) ?>" class="btn btn-outline-secondary">العودة للملف</a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>الموظف المسؤول</th>
                            <th>الدور</th>
                            <th>تفاصيل المهمة</th>
                            <th>الحالة</th>
                            <th>تاريخ الإنجاز</th>
                            <th>ملاحظات</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($tasks as $t): ?>
                        <tr>
                            <td>
                                <strong><?= $t['assignee_name'] ?></strong><br>
                                <small class="text-muted"><?= $t['assignee_user_id'] ?></small>
                            </td>
                            <td><span class="badge bg-info text-dark"><?= $t['role_type'] ?></span></td>
                            <td><small><?= nl2br($t['task_description']) ?></small></td>
                            <td>
                                <?php if($t['status'] == 'Completed'): ?>
                                    <span class="badge bg-success"><i class="fas fa-check"></i> مكتمل</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark"><i class="fas fa-clock"></i> معلق</span>
                                <?php endif; ?>
                            </td>
                            <td><?= $t['completed_at'] ? date('Y-m-d', strtotime($t['completed_at'])) : '-' ?></td>
                            <td><?= $t['notes'] ?></td>
                            <td>
                                <?php if($t['status'] == 'Pending'): ?>
                                    <a href="<?= base_url('onboarding/send_reminder/'.$t['id']) ?>" 
                                       class="btn btn-sm btn-outline-danger" 
                                       title="إعادة إرسال البريد"
                                       onclick="return confirm('إرسال تذكير عبر البريد؟')">
                                        <i class="fas fa-bell"></i> تذكير
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>