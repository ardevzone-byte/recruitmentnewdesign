<div class="container mt-5 mb-5" dir="rtl">
    <div class="card shadow">
        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-exchange-alt me-2"></i> نقل الموظف لنظام الموارد البشرية</h5>
        </div>
        <div class="card-body">
            
            <?= form_open('candidates/submit_hr_transfer') ?>
            <input type="hidden" name="national_address_file" value="<?= $info['national_address_file'] ?>">
<input type="hidden" name="commencement_form_file" value="<?= $info['commencement_form_file'] ?>">
<input type="hidden" name="job_description_file" value="<?= $info['job_description_file'] ?>">
<input type="hidden" name="confidentiality_form_file" value="<?= $info['confidentiality_form_file'] ?>">
<input type="hidden" name="gosi_subscription_file" value="<?= $info['gosi_subscription_file'] ?>">
<input type="hidden" name="experience_file" value="<?= $info['experience_file'] ?>">
<input type="hidden" name="clearance_cert_file" value="<?= $info['clearance_cert_file'] ?>">
<input type="hidden" name="medical_invoice" value="<?= $info['medical_invoice'] ?>">
<input type="hidden" name="employment_guarantee_file" value="<?= $info['employment_guarantee_file'] ?>">
<input type="hidden" name="lawyer_license_file" value="<?= $info['lawyer_license_file'] ?>">
<input type="hidden" name="criminal_record_file" value="<?= $info['criminal_record_file'] ?>">
<input type="hidden" name="medical_result" value="<?= $info['medical_result'] ?>">
<input type="hidden" name="family_data_file" value="<?= $info['family_data_file'] ?>">
<input type="hidden" name="immediate_work_file" value="<?= $info['immediate_work_file'] ?>">
            <h6 class="text-primary fw-bold mb-3 border-bottom pb-2">البيانات الشخصية</h6>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label">الاسم الكامل (Subscriber Name)</label>
                    <input type="text" name="full_name" class="form-control" value="<?= $info['full_name'] ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">الرقم الوظيفي (Employee ID)</label>
                    <input type="text" name="employee_id" class="form-control" value="<?= $info['employee_id'] ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">رقم الهوية / الإقامة</label>
                    <input type="text" name="id_number" class="form-control" value="<?= $info['id_number'] ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">الجنسية</label>
                    <input type="text" name="nationality" class="form-control" value="<?= $info['nationality'] ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">الجنس</label>
                    <select name="gender" class="form-select">
                        <option value="Male" <?= ($info['gender'] == 'Male' || $info['gender'] == 'ذكر') ? 'selected' : '' ?>>ذكر</option>
                        <option value="Female" <?= ($info['gender'] == 'Female' || $info['gender'] == 'أنثى') ? 'selected' : '' ?>>أنثى</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">الحالة الاجتماعية</label>
                    <select name="marital_status" class="form-select">
                        <option value="Single" <?= $info['marital_status'] == 'Single' ? 'selected' : '' ?>>أعزب</option>
                        <option value="Married" <?= $info['marital_status'] == 'Married' ? 'selected' : '' ?>>متزوج</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">الديانة</label>
                    <input type="text" name="religion" class="form-control" value="<?= $info['religion'] ?>" placeholder="مثال: Muslim">
                </div>
                <div class="col-md-4">
                    <label class="form-label">رقم الجوال</label>
                    <input type="text" name="phone" class="form-control" value="<?= $info['phone'] ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control" value="<?= $info['email'] ?>">
                </div>
            </div>

            <h6 class="text-primary fw-bold mb-3 border-bottom pb-2">بيانات الوظيفة والهيكل التنظيمي</h6>
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <label class="form-label">اسم الشركة (Company)</label>
                    <select name="company_name" class="form-select" required>
                        <option value="">-- اختر الشركة --</option>
                        <option value="شركة مرسوم">شركة مرسوم</option>
                        <option value="مكتب الدكتور">مكتب الدكتور</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">القسم (Department)</label>
                    <input type="text" name="department" class="form-control" value="<?= $info['department'] ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">المسمى الوظيفي (Position)</label>
                    <input type="text" name="position" class="form-control" value="<?= $info['position'] ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label">تاريخ المباشرة</label>
                    <input type="date" name="start_date" class="form-control" value="<?= $info['start_date'] ?>" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">مقر العمل</label>
                    <input type="text" name="work_location" class="form-control" value="<?= $info['work_location'] ?>">
                </div>
                <div class="col-md-4">
                    <label class="form-label text-danger fw-bold">المدير المباشر (N2)</label>
                    <select name="manager_id" class="form-select" required>
                        <option value="">-- اختر المدير --</option>
                        <?php foreach($managers as $mgr): ?>
                            <option value="<?= $mgr['username'] ?>"><?= $mgr['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <small class="text-muted">هذا الحقل سيحدد الهيكل التنظيمي</small>
                </div>
            </div>

            <h6 class="text-primary fw-bold mb-3 border-bottom pb-2">البيانات المالية والبنكية</h6>
            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label class="form-label">اسم البنك</label>
                    <input type="text" name="bank_name" class="form-control" placeholder="مثال: بنك الراجحي">
                </div>
                <div class="col-md-6">
                    <label class="form-label">رقم الآيبان (IBAN)</label>
                    <input type="text" name="iban_number" class="form-control" placeholder="SA...">
                </div>
                
                <div class="col-md-3">
                    <label class="form-label">الراتب الأساسي</label>
                    <input type="number" name="basic_salary" class="form-control" value="<?= $info['basic_salary'] ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">بدل السكن</label>
                    <input type="number" name="housing_allowance" class="form-control" value="<?= $info['housing_allowance'] ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">بدل النقل (N4)</label>
                    <input type="number" name="transport_allowance" class="form-control" value="<?= $info['transport_allowance'] ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label">بدلات أخرى</label>
                    <input type="number" name="other_allowances" class="form-control" value="<?= $info['other_allowances'] ?>">
                </div>
                <div class="col-md-12">
                    <div class="alert alert-light border fw-bold text-center">
                        إجمالي الراتب: <input type="number" name="total_salary" value="<?= $info['total_salary'] ?>" class="d-inline-block form-control w-25 text-center fw-bold text-success border-0 bg-transparent">
                    </div>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-success btn-lg fw-bold" onclick="return confirm('هل أنت متأكد من ترحيل البيانات؟ لا يمكن التراجع.')">
                    <i class="fas fa-check-circle me-2"></i> ترحيل إلى نظام شؤون الموظفين (Orders DB)
                </button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>