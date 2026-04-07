<!-- Inside simple_view.php -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body { font-family: 'Tajawal', sans-serif; background-color: #f8f9fa; }
        .simple-card { max-width: 600px; margin: 0 auto; }
        .job-header { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .other-area-field { display: none; margin-top: 10px; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="simple-card">
        <!-- Job Header -->
        <div class="card job-header border-0 shadow-lg mb-4">
            <div class="card-body text-center p-4">
                <h2 class="mb-2"><?= htmlspecialchars($job['job_title']) ?></h2>
                <p class="mb-0 opacity-75">
                    <i class="fas fa-building me-1"></i> <?= htmlspecialchars($job['department']) ?>
                    <span class="mx-2">•</span>
                    <i class="fas fa-map-marker-alt me-1"></i> <?= htmlspecialchars($job['location']) ?>
                </p>
            </div>
        </div>

        <!-- Simple Application Form -->
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h4 class="text-center mb-4">تقديم سريع للوظيفة</h4>
                
                <?php if($this->session->flashdata('error_msg')): ?>
                    <div class="alert alert-danger"><?= $this->session->flashdata('error_msg') ?></div>
                <?php endif; ?>
                
                <?php echo form_open_multipart('simple_apply/submit', ['class' => 'needs-validation', 'novalidate' => '']); ?>
                
                <input type="hidden" name="job_id" value="<?= $job['id'] ?>">
                <input type="hidden" name="public_link_id" value="<?= $job['public_link_id'] ?>">
                
                <div class="mb-3">
                    <label for="full_name" class="form-label">الاسم الكامل (عربي) *</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div>
                
                <div class="mb-3">
                    <label for="name_en" class="form-label">الاسم بالإنجليزية (English Name)</label>
                    <input type="text" class="form-control" id="name_en" name="name_en">
                </div>
                
                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني *</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                
                <div class="mb-3">
                    <label for="phone" class="form-label">رقم الجوال *</label>
                    <input type="tel" class="form-control" id="phone" name="phone" required 
                           pattern="966[0-9]{9}" placeholder="9665xxxxxxxx">
                    <small class="text-muted">يجب أن يبدأ بـ 966 متبوعاً بـ 9 أرقام</small>
                </div>
                
                <div class="mb-3">
                    <label for="id_number" class="form-label">رقم الهوية / الإقامة *</label>
                    <input type="text" class="form-control" id="id_number" name="id_number" required>
                </div>

                <!-- Area Field with "Other" option and all locations -->
                <div class="mb-3">
                    <label for="area" class="form-label">المنطقة *</label>
                    <select class="form-select" id="area" name="area" required onchange="toggleOtherAreaField()">
                        <option value="" selected disabled>-- اختر المنطقة --</option>
                        <option value="سكاكا">سكاكا</option>
                        <option value="حفر الباطن">حفر الباطن</option>
                        <option value="الرياض">الرياض</option>
                        <option value="نجران">نجران</option>
                        <option value="عرعر">عرعر</option>
                        <option value="شرورة">شرورة</option>
                        <option value="تبوك">تبوك</option>
                        <option value="بيشه">بيشه</option>
                        <option value="الطائف">الطائف</option>
                        <option value="الدوادمي">الدوادمي</option>
                        <option value="الدمام - الخبر">الدمام - الخبر</option>
                        <option value="الجوف">الجوف</option>
                        <option value="الباحة">الباحة</option>
                        <option value="الاحساء">الاحساء</option>
                        <option value="يدمة">يدمة</option>
                        <option value="وادي الدواسر">وادي الدواسر</option>
                        <option value="مكة المكرمة">مكة المكرمة</option>
                        <option value="محايل عسير">محايل عسير</option>
                        <option value="عفيف">عفيف</option>
                        <option value="رنية">رنية</option>
                        <option value="رفحاء">رفحاء</option>
                        <option value="حائل">حائل</option>
                        <option value="جدة">جدة</option>
                        <option value="جازان">جازان</option>
                        <option value="تثليث">تثليث</option>
                        <option value="بريدة">بريدة</option>
                        <option value="المدينة المنورة">المدينة المنورة</option>
                        <option value="الخرج">الخرج</option>
                        <option value="الافلاج">الافلاج</option>
                        <option value="ابها">ابها</option>
                        <option value="other">أخرى</option>
                    </select>
                    <div class="invalid-feedback">الرجاء اختيار المنطقة.</div>
                </div>

                <!-- Other Area Input Field (Hidden by default) -->
                <div class="mb-3 other-area-field" id="otherAreaContainer">
                    <label for="other_area" class="form-label">يرجى تحديد المنطقة *</label>
                    <input type="text" class="form-control" id="other_area" name="other_area" 
                           placeholder="أدخل اسم المنطقة">
                    <div class="invalid-feedback">الرجاء إدخال اسم المنطقة.</div>
                </div>
                
                <div class="mb-4">
                    <label for="cv_file" class="form-label">السيرة الذاتية (اختياري)</label>
                    <input type="file" class="form-control" id="cv_file" name="cv_file" 
                           accept=".pdf,.doc,.docx">
                    <small class="text-muted">PDF, DOC, DOCX - الحد الأقصى 5MB</small>
                </div>
                
                <div class="d-grid">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-paper-plane me-2"></i> إرسال الطلب
                    </button>
                </div>
                
                <div class="text-center mt-3">
                    <small class="text-muted">
                        <i class="fas fa-info-circle me-1"></i>
                        بعد إرسال طلبك، سيتواصل معك أحد موظفي التوظيف لإكمال باقي البيانات
                    </small>
                </div>
                
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Form validation
    (function() {
        'use strict';
        var forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function(form) {
            form.addEventListener('submit', function(event) {
                // Custom validation for "other" area
                var areaSelect = document.getElementById('area');
                var otherAreaInput = document.getElementById('other_area');
                var otherAreaContainer = document.getElementById('otherAreaContainer');
                
                if (areaSelect.value === 'other' && otherAreaContainer.style.display === 'block') {
                    if (!otherAreaInput.value.trim()) {
                        event.preventDefault();
                        event.stopPropagation();
                        otherAreaInput.classList.add('is-invalid');
                        areaSelect.classList.add('is-invalid');
                    } else {
                        otherAreaInput.classList.remove('is-invalid');
                        areaSelect.classList.remove('is-invalid');
                    }
                }
                
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
    
    // Toggle "Other Area" field
    function toggleOtherAreaField() {
        var areaSelect = document.getElementById('area');
        var otherAreaContainer = document.getElementById('otherAreaContainer');
        var otherAreaInput = document.getElementById('other_area');
        
        if (areaSelect.value === 'other') {
            otherAreaContainer.style.display = 'block';
            otherAreaInput.required = true;
        } else {
            otherAreaContainer.style.display = 'none';
            otherAreaInput.required = false;
            otherAreaInput.value = ''; // Clear the input when hiding
            otherAreaInput.classList.remove('is-invalid');
        }
    }
    
    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        toggleOtherAreaField();
    });
</script>

</body>
</html>