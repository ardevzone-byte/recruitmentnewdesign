<div class="container mt-5" dir="rtl">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-rocket"></i> بدء إجراءات التهيئة: <?= $app_details['candidate']['full_name'] ?></h5>
        </div>
        <div class="card-body">
            <div class="alert alert-info">
                سيتم إرسال مهام تلقائية للموظفين الثابتين (الموارد البشرية، IT، الأمن، التدريب).
                <br>يرجى تحديد المسؤولين المتغيرين أدناه:
            </div>

            <?= form_open('onboarding/submit_initiation') ?>
            <input type="hidden" name="application_id" value="<?= $app_details['application']['id'] ?>">
            <input type="hidden" name="candidate_id" value="<?= $app_details['candidate']['id'] ?>">

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold">المشرف (Supervisor)</label>
                    <select name="supervisor_id" class="form-select">
                        <option value="">-- اختر (اختياري) --</option>
                        <?php foreach($managers as $m): ?>
                            <option value="<?= $m['username'] ?>"><?= $m['name'] ?> (<?= $m['department'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-bold">المدير المباشر (Direct Manager)</label>
                    <select name="direct_manager_id" class="form-select" required>
    <option value="">-- اختر --</option>
    <?php foreach($managers as $m): ?>
        <option value="<?= $m['username'] ?>"><?= $m['name'] ?> (<?= $m['department'] ?>)</option>
    <?php endforeach; ?>
</select>
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-bold">مدير المشروع (Project Manager)</label>
                    <select name="project_manager_id" class="form-select">
                        <option value="">-- اختر (اختياري) --</option>
                        <?php foreach($managers as $m): ?>
                            <option value="<?= $m['username'] ?>"><?= $m['name'] ?> (<?= $m['department'] ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <hr class="my-4">
            
            <h6 class="fw-bold mb-3">المهام الثابتة (سيتم إرسالها تلقائياً):</h6>
            <ul class="list-group mb-4">
                <li class="list-group-item">1526 - غزية السبيعي (بيانات الموظف، الهوية، الجوال، البطاقة)</li>
                <li class="list-group-item">1195 - سامي محمد (الايميل، التحويلة، الجهاز)</li>
                <li class="list-group-item">1835 - صالح سعيد (إنشاء المستخدم في النظام)</li>
                <li class="list-group-item">1127 - حسين اليامي (البصمة)</li>
                <li class="list-group-item">2666 - مدثر صلاح الدين (التدريب)</li>
            </ul>

            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg">
                    <i class="fas fa-paper-plane"></i> إرسال المهام وبدء التهيئة
                </button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>