<div dir="rtl" class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-warning">
            <h4 class="mb-0"><i class="fas fa-tools me-2"></i> إصلاح بيانات الجلسة</h4>
        </div>
        <div class="card-body">
            <p>بيانات الجلسة الحالية:</p>
            <pre><?php print_r($this->session->all_userdata()); ?></pre>
            
            <hr>
            
            <p>بيانات المستخدم من قاعدة البيانات:</p>
            <pre><?php print_r($user_data); ?></pre>
            
            <hr>
            
            <form method="post" action="<?= base_url('requisitions/fix_session_action') ?>">
                <div class="mb-3">
                    <label class="form-label">تصحيح user_id:</label>
                    <input type="text" class="form-control" name="correct_user_id" 
                           value="<?= $user_data['id'] ?? '' ?>">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">تصحيح الاسم:</label>
                    <input type="text" class="form-control" name="correct_name" 
                           value="<?= $user_data['name'] ?? '' ?>">
                </div>
                
                <button type="submit" class="btn btn-primary">تصحيح الجلسة</button>
            </form>
        </div>
    </div>
</div>