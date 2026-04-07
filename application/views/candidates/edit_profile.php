<?php if($this->session->flashdata('error_msg')): ?>
    <div class="alert alert-danger shadow-sm">
        <i class="fas fa-exclamation-circle me-2"></i> 
        <?= $this->session->flashdata('error_msg') ?>
    </div>
<?php endif; ?>
<div dir="rtl" class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold"><i class="fas fa-user-edit me-2"></i> تعديل بيانات المرشح</h5>
            <a href="<?= base_url('candidates/view/'.$application['id']) ?>" class="btn btn-sm btn-light text-primary fw-bold">
                <i class="fas fa-arrow-left me-1"></i> عودة للملف
            </a>
        </div>
        <div class="card-body">
            <?= form_open_multipart('candidates/update_profile_process') ?>
            
            <input type="hidden" name="application_id" value="<?= $application['id'] ?>">
            <input type="hidden" name="candidate_id" value="<?= $candidate['id'] ?>">

            <h6 class="text-primary fw-bold border-bottom pb-2 mb-3">البيانات الشخصية</h6>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">الاسم الكامل (عربي)</label>
        <input type="text" name="full_name" class="form-control" value="<?= $candidate['full_name'] ?>" required>
    </div>
    
    <div class="col-md-6 mb-3">
        <label class="form-label">الاسم الكامل (English)</label>
        <input type="text" name="name_en" class="form-control" value="<?= isset($candidate['name_en']) ? $candidate['name_en'] : '' ?>" dir="ltr">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">رقم الهاتف</label>
        <input type="text" name="phone" class="form-control" value="<?= $candidate['phone'] ?>">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">البريد الإلكتروني</label>
        <input type="email" name="email" class="form-control" value="<?= $candidate['email'] ?>">
    </div>
    
    <div class="col-md-6 mb-3">
        <label class="form-label">رقم الهوية / الإقامة</label>
        <input type="text" name="id_number" class="form-control" value="<?= isset($candidate['id_number']) ? $candidate['id_number'] : '' ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">الجنسية</label>
        <input type="text" name="nationality" class="form-control" value="<?= isset($candidate['nationality']) ? $candidate['nationality'] : '' ?>">
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">تاريخ الميلاد</label>
        <input type="date" name="date_of_birth" class="form-control" value="<?= isset($candidate['date_of_birth']) ? $candidate['date_of_birth'] : '' ?>">
    </div>
    <div class="col-md-3 mb-3">
        <label class="form-label">العمر</label>
        <input type="number" name="age" class="form-control" value="<?= $candidate['age'] ?>">
    </div>
    
    <div class="col-md-6 mb-3">
        <label class="form-label">العنوان (Address)</label>
        <input type="text" name="address" class="form-control" value="<?= isset($candidate['address']) ? $candidate['address'] : '' ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">الديانة</label>
        <select name="religion" class="form-select">
            <option value="">-- اختر --</option>
            <option value="Islam" <?= (isset($candidate['religion']) && $candidate['religion'] == 'Islam') ? 'selected' : '' ?>>Islam</option>
            <option value="Christianity" <?= (isset($candidate['religion']) && $candidate['religion'] == 'Christianity') ? 'selected' : '' ?>>Christianity</option>
            <option value="Other" <?= (isset($candidate['religion']) && $candidate['religion'] == 'Other') ? 'selected' : '' ?>>Other</option>
        </select>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">الحالة الاجتماعية</label>
        <select name="marital_status" class="form-select">
            <option value="Single" <?= $candidate['marital_status'] == 'Single' ? 'selected' : '' ?>>أعزب/عزباء (Single)</option>
            <option value="Married" <?= $candidate['marital_status'] == 'Married' ? 'selected' : '' ?>>متزوج/ـة (Married)</option>
            <option value="Divorced" <?= $candidate['marital_status'] == 'Divorced' ? 'selected' : '' ?>>مطلق/ـة (Divorced)</option>
        </select>
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">عدد الأطفال</label>
        <input type="number" name="number_of_children" class="form-control" value="<?= $candidate['number_of_children'] ?>">
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">حالة الحمل (للإناث)</label>
        <select name="pregnancy_status" class="form-select">
            <option value="N/A" <?= $candidate['pregnancy_status'] == 'N/A' ? 'selected' : '' ?>>لا ينطبق / N/A</option>
            <option value="Yes" <?= $candidate['pregnancy_status'] == 'Yes' ? 'selected' : '' ?>>نعم (Pregnant)</option>
            <option value="No" <?= $candidate['pregnancy_status'] == 'No' ? 'selected' : '' ?>>لا (Not Pregnant)</option>
        </select>
    </div>
<div class="col-md-12 mb-3">
        <label class="form-label fw-bold">الجهة / الشركة (Company)</label>
        <select name="company" class="form-select">
            <option value="">-- اختر الشركة --</option>
            <option value="مكتب الدكتور صالح الجربوع للمحاماة" <?= (isset($candidate['company']) && $candidate['company'] == 'مكتب الدكتور صالح الجربوع للمحاماة') ? 'selected' : '' ?>>
                مكتب الدكتور صالح الجربوع للمحاماة
            </option>
            <option value="شركة مرسوم لتحصيل الديون" <?= (isset($candidate['company']) && $candidate['company'] == 'شركة مرسوم لتحصيل الديون') ? 'selected' : '' ?>>
                شركة مرسوم لتحصيل الديون
            </option>
        </select>
    </div>
    <div class="col-12 mb-3 mt-3">
        <label class="form-label fw-bold text-danger">ملاحظات عامة (Notes)</label>
        <textarea name="notes" class="form-control" rows="4"><?= isset($candidate['notes']) ? $candidate['notes'] : '' ?></textarea>
    </div>
</div>

            <h6 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-3">المرفقات (السيرة الذاتية)</h6>
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label fw-bold">تحديث ملف الـ CV</label>
                    <input type="file" name="cv_file" class="form-control" accept=".pdf,.doc,.docx,.jpg,.png">
                    <?php if($candidate['cv_file'] && $candidate['cv_file'] != 'N/A'): ?>
                        <div class="form-text text-success">
                            <i class="fas fa-check-circle"></i> يوجد ملف حالياً: 
                            <a href="<?= base_url('assets/cvs/'.$candidate['cv_file']) ?>" target="_blank"><?= $candidate['cv_file'] ?></a>
                        </div>
                    <?php else: ?>
                        <div class="form-text text-muted">لا يوجد ملف مرفق حالياً.</div>
                    <?php endif; ?>
                </div>
            </div>

            <h6 class="text-primary fw-bold border-bottom pb-2 mb-3 mt-3">البيانات التعليمية (المؤهل الأحدث)</h6>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">المؤهل العلمي</label>
                    <input type="text" name="qualification" class="form-control" value="<?= isset($latest_education['qualification']) ? $latest_education['qualification'] : '' ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">التخصص (Major)</label>
                    <input type="text" name="major" class="form-control" value="<?= isset($latest_education['major']) ? $latest_education['major'] : '' ?>">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">الجامعة / المؤسسة</label>
                    <input type="text" name="institution" class="form-control" value="<?= isset($latest_education['institution']) ? $latest_education['institution'] : '' ?>">
                </div>
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-success fw-bold text-white">
                    <i class="fas fa-save me-2"></i> حفظ التغييرات
                </button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>