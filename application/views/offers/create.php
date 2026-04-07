<div class="container mt-5" dir="rtl">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">إنشاء عرض وظيفي جديد</h4>
        </div>
        <div class="card-body">
            
            <div class="alert alert-secondary">
                <strong>المرشح:</strong> <?= $app_details['candidate']['full_name'] ?> <br>
                <strong>الوظيفة:</strong> <?= $app_details['application']['job_title'] ?>
            </div>

            <?= form_open('offers/submit'); ?>
                <input type="hidden" name="application_id" value="<?= $app_details['application']['app_id'] ?>">
                <input type="hidden" name="candidate_id" value="<?= $app_details['candidate']['id'] ?>">

                <h5 class="text-primary mb-3">تفاصيل الراتب</h5>
                <div class="row mb-3">
                    <div class="col-md-3">
                        <label>الراتب الأساسي</label>
                        <input type="number" name="basic_salary" id="basic" class="form-control" required oninput="calcTotal()" placeholder="0">
                    </div>
                    <div class="col-md-3">
                        <label>بدل السكن</label>
                        <input type="number" name="housing_allowance" id="housing" class="form-control" required oninput="calcTotal()" placeholder="0">
                    </div>
                    <div class="col-md-3">
                        <label>بدل النقل</label>
                        <input type="number" name="transport_allowance" id="transport" class="form-control" required oninput="calcTotal()" placeholder="0">
                    </div>
                    <div class="col-md-3">
                        <label>بدل اتصال    </label>
                        <input type="number" name="communication_allowance" id="comm" class="form-control" required oninput="calcTotal()" placeholder="0">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="fw-bold">إجمالي الراتب</label>
                    <input type="number" name="total_salary" id="total" class="form-control bg-light fw-bold text-success" readonly>
                </div>

                <h5 class="text-primary mb-3">بيانات العقد</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label>تاريخ المباشرة</label>
                        <input type="date" name="start_date" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label>رقم الهوية / الإقامة</label>
                        <input type="text" name="id_number" class="form-control" required 
                               value="<?= isset($app_details['candidate']['id_number']) ? $app_details['candidate']['id_number'] : '' ?>" 
                               placeholder="أدخل رقم الهوية">
                    </div>
                </div>

                <hr>
                <div class="text-end">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-paper-plane"></i> إنشاء وإرسال للاعتماد
                    </button>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
function calcTotal() {
    // Get values, default to 0 if empty
    let basic = parseFloat(document.getElementById('basic').value) || 0;
    let housing = parseFloat(document.getElementById('housing').value) || 0;
    let transport = parseFloat(document.getElementById('transport').value) || 0;
    let comm = parseFloat(document.getElementById('comm').value) || 0; // New Field

    // Calculate Total
    let total = basic + housing + transport + comm;

    // Update Input
    document.getElementById('total').value = total;
}
</script>