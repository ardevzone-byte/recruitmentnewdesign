<?php if(isset($candidate) && !empty($candidate)): ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function() {
    // 1. Pre-fill basic data from the database (passed from controller)
    $('#full_name').val('<?= addslashes($candidate["full_name"] ?? "") ?>');
    $('#email').val('<?= addslashes($candidate["email"] ?? "") ?>');
    $('#phone').val('<?= addslashes($candidate["phone"] ?? "") ?>');
    $('#id_number').val('<?= addslashes($candidate["id_number"] ?? "") ?>');
    $('#name_en').val('<?= addslashes($candidate["name_en"] ?? "") ?>');

    // 2. INJECT HIDDEN FIELDS FOR THE UPDATE LOGIC
    // This tells Apply.php that this is an UPDATE, not a NEW application
    <?php if(isset($application_id) && isset($sms_token)): ?>
        $('<input>').attr({
            type: 'hidden',
            name: 'application_id',
            value: '<?= $application_id ?>'
        }).appendTo('form');
        
        $('<input>').attr({
            type: 'hidden',
            name: 'sms_token',
            value: '<?= $sms_token ?>'
        }).appendTo('form');
    <?php endif; ?>
});
</script>
<?php endif; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
      body { font-family: 'Tajawal', sans-serif; background-color: #f8f9fa; }
      .card { border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); border-radius: 0.75rem; }
      .card-header { background-color: #fff; border-bottom: 1px solid #f0f0f0; padding: 1.25rem 1.5rem; }
      .form-label { font-weight: 500; color: #495057; }
      .form-control:focus, .form-select:focus { border-color: #0056b3; box-shadow: 0 0 0 0.25rem rgba(0, 86, 179, 0.25); }
      .section-title { color: #0056b3; font-weight: 700; border-bottom: 2px solid #0056b3; padding-bottom: 10px; margin-bottom: 20px; }
      .form-group.q-group { background-color: #fdfdfd; border: 1px solid #f0f0f0; border-radius: 0.5rem; }
      .form-check-label { margin-right: 0.5rem; }
      .form-check-inline { margin-left: 1.5rem; }
      .remove-btn { color: #dc3545; text-decoration: none; font-weight: 700; }
    </style>
</head>
<body>

<div class="container my-4 my-lg-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            
            <div class="card job-card mb-4 shadow-sm">
              <div class="card-body p-4 p-lg-5 text-center">
                <h1 class="display-6 fw-bold text-primary"><?= htmlspecialchars($job['job_title']) ?></h1>
                <h5 class="fw-normal text-muted">
                  <i class="fas fa-building"></i> <?= htmlspecialchars($job['department']) ?>
                  <span class="mx-3">|</span>
                  <i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($job['location']) ?>
                </h5>
              </div>
            </div>

            <div class="card shadow-lg border-0">
                <div class="card-header text-center">
                    <h3 class="mb-0 fw-bold">نموذج التقديم الإلكتروني</h3>
                    <p class="text-muted mb-0">الرجاء تعبئة جميع الحقول المطلوبة (*)</p>
                </div>
                
                <div class="card-body p-4 p-lg-5">
                    <?php if($this->session->flashdata('error_msg')): ?>
                      <div class="alert alert-danger"><i class="fas fa-exclamation-triangle me-2"></i> <?= $this->session->flashdata('error_msg') ?></div>
                    <?php endif; ?>
                
                    <?php echo form_open_multipart('apply/submit'); ?>
                    
                    <input type="hidden" name="job_id" value="<?= $job['id'] ?>">
                    <input type="hidden" name="public_link_id" value="<?= $job['public_link_id'] ?>">

                    <h5 class="section-title">1. البيانات الشخصية</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="full_name" class="form-label">الاسم الكامل (عربي) *</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name_en" class="form-label">الاسم الكامل (English)</label>
                            <input type="text" class="form-control" id="name_en" name="name_en">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني *</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">رقم الجوال (966xxxxxxxxx) *</label>
                            <input type="text" class="form-control" id="phone" name="phone" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="id_number" class="form-label">رقم الهوية / الإقامة *</label>
                            <input type="text" class="form-control" id="id_number" name="id_number" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="date_of_end_id" class="form-label">تاريخ انتهاء الهوية / الإقامة *</label>
                            <input type="date" class="form-control" id="date_of_end_id" name="date_of_end_id" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="nationality" class="form-label">الجنسية *</label>
                            <input type="text" class="form-control" id="nationality" name="nationality" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="date_of_birth" class="form-label">تاريخ الميلاد (ميلادي) *</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="place_of_birth" class="form-label">مكان الميلاد</label>
                            <input type="text" class="form-control" id="place_of_birth" name="place_of_birth">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="marital_status" class="form-label">الحالة الاجتماعية *</label>
                            <select class="form-select" id="marital_status" name="marital_status" required>
                                <option value="" selected disabled>-- اختر --</option>
                                <option value="أعزب">أعزب</option>
                                <option value="متزوج">متزوج</option>
                                <option value="مطلق">مطلق</option>
                                <option value="أرمل">أرمل</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="tell_no" class="form-label">هاتف المنزل</label>
                            <input type="text" class="form-control" id="tell_no" name="tell_no">
                        </div>
                        <div class="col-md-8 mb-3">
                            <label for="address" class="form-label">العنوان (المدينة والحي)</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                    </div>

                    <hr class="my-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="section-title mb-0">2. المؤهلات العلمية</h5>
                        <button type="button" id="add-education-btn" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus me-1"></i> إضافة مؤهل آخر
                        </button>
                    </div>
                    
                    <div id="education-wrapper">
                        <div class="education-block border p-3 rounded mb-3 bg-light">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">المؤهل العلمي</label>
                                    <select class="form-select" name="qualification1[]">
                                        <option value="" selected>-- اختر المؤهل --</option>
                                        <option value="ثانوي">ثانوي</option>
                                        <option value="دبلوم">دبلوم</option>
                                        <option value="بكالوريوس">بكالوريوس</option>
                                        <option value="ماجستير">ماجستير</option>
                                        <option value="دكتوراة">دكتوراة</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">التخصص</label>
                                    <input type="text" class="form-control" name="major[]">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">الجهة التعليمية (الجامعة/المعهد)</label>
                                    <input type="text" class="form-control" name="educational_institution[]">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">المعدل (GPA)</label>
                                    <input type="text" class="form-control" name="gpa[]" placeholder="مثال: 4.5 من 5">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">تاريخ التخرج</label>
                                    <input type="date" class="form-control" name="date_of_graduation[]">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="section-title mb-0">3. الخبرة العملية</h5>
                        <button type="button" id="add-experience-btn" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-plus me-1"></i> إضافة خبرة أخرى
                        </button>
                    </div>

                    <div id="experience-wrapper">
                        <div class="experience-block border p-3 rounded mb-3 bg-light">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">اسم الشركة</label>
                                    <input type="text" class="form-control" name="company[]" placeholder="آخر شركة عملت بها">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">المسمى الوظيفي</label>
                                    <input type="text" class="form-control" name="job_title3[]" placeholder="آخر مسمى وظيفي">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">سنوات الخبرة (في هذه الوظيفة)</label>
                                    <input type="text" class="form-control" name="work_years[]" placeholder="مثال: 3 سنوات">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">آخر راتب (شامل البدلات)</label>
                                    <input type="number" class="form-control" name="salary_old[]" placeholder="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">
                    <h5 class="section-title mb-4">4. أسئلة الفلترة</h5>
                    
                    <div class="form-group mb-3 p-3 q-group">
                        <label class="form-label fw-bold">1. هل سبق لك عمل مقابلة شخصية لدى شركة مرسوم؟ *</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="q1" id="q1_yes" value="نعم" required>
                                <label class="form-check-label" for="q1_yes">نعم</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="q1" id="q1_no" value="لا" required>
                                <label class="form-check-label" for="q1_no">لا</label>
                            </div>
                        </div>
                        <div class="mt-2" id="q1_details" style="display:none;">
                            <label for="Date_of_the_interview_old" class="form-label">تاريخ المقابلة السابقة</label>
                            <input type="date" class="form-control" name="Date_of_the_interview_old">
                        </div>
                    </div>

                    <div class="form-group mb-3 p-3 q-group">
                        <label class="form-label fw-bold">2. هل أنت على رأس عمل حالياً؟ *</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="q2" id="q2_yes" value="نعم" required>
                                <label class="form-check-label" for="q2_yes">نعم</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="q2" id="q2_no" value="لا" required>
                                <label class="form-check-label" for="q2_no">لا</label>
                            </div>
                        </div>
                        <div class="mt-2" id="q2_details" style="display:none;">
                            <label for="current_job" class="form-label">المسمى الوظيفي الحالي</label>
                            <input type="text" class="form-control" name="current_job">
                            <label for="salary_befor_cut" class="form-label mt-2">الراتب الحالي (قبل خصم التأمينات)</label>
                            <input type="number" class="form-control" name="salary_befor_cut">
                        </div>
                    </div>
                    
                    <div class="form-group mb-3 p-3 q-group">
                        <label class="form-label fw-bold">3. ماهو مجال التحصيل الذي (تعمل به حالياً /عملت به)؟ (إن وجد)</label>
                        <div class="mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="q3_options[]" value="ديون معدومة" id="q3_1">
                                <label class="form-check-label" for="q3_1">ديون معدومة</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="q3_options[]" value="تحصيل أقساط شهر" id="q3_2">
                                <label class="form-check-label" for="q3_2">تحصيل أقساط شهر</label>
                            </div>
                             <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="q3_options[]" value="غير ذلك" id="q3_3">
                                <label class="form-check-label" for="q3_3">غير ذلك</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="q3_options[]" value="لا يوجد خبرة تحصيل" id="q3_4">
                                <label class="form-check-label" for="q3_4">لا يوجد خبرة تحصيل</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group mb-3 p-3 q-group">
                        <label class="form-label fw-bold">4. هل لديك أي التزامات مادية (اقساط)؟ *</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="q5" id="q5_yes" value="نعم" required>
                                <label class="form-check-label" for="q5_yes">نعم</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="q5" id="q5_no" value="لا" required>
                                <label class="form-check-label" for="q5_no">لا</label>
                            </div>
                        </div>
                        <div class="mt-2" id="q5_details" style="display:none;">
                            <label for="premium_value" class="form-label">كم القيمة المستقطعة منك شهرياً؟</label>
                            <input type="number" class="form-control" name="premium_value" placeholder="0">
                        </div>
                    </div>
                    
                    <div class="form-group mb-3 p-3 q-group">
                        <label class="form-label fw-bold">5. هل لديك متعثرات لدى اي جهة بنكية أو جهات آخرى؟ *</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="q8" id="q8_yes" value="نعم" required>
                                <label class="form-check-label" for="q8_yes">نعم</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="q8" id="q8_no" value="لا" required>
                                <label class="form-check-label" for="q8_no">لا</label>
                            </div>
                        </div>
                        <div class="mt-2" id="q8_details" style="display:none;">
                            <label for="details8" class="form-label">اذكر الجهة</label>
                            <input type="text" class="form-control" name="details8">
                        </div>
                    </div>
                    
                    <div class="form-group mb-3 p-3 q-group">
                        <label class="form-label fw-bold">6. هل لديك القدرة على انهاء اجراءات التوظيف (الكفالة الوظيفية - الأدلة الجنائية - الكشف الطبي)؟ *</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="b21" id="b21_yes" value="نعم" required>
                                <label class="form-check-label" for="b21_yes">نعم</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="b21" id="b21_no" value="لا" required>
                                <label class="form-check-label" for="b21_no">لا</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-3 p-3 q-group">
                        <label class="form-label fw-bold">7. ماهو الراتب المتوقع؟ *</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="q_expected_salary" id="q_salary_yes" value="1" required>
                                <label class="form-check-label" for="q_salary_yes">تحديد قيمة</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="q_expected_salary" id="q_salary_no" value="2" required>
                                <label class="form-check-label" for="q_salary_no">لا أرغب بالإفصاح</label>
                            </div>
                        </div>
                        <div class="mt-2" id="q_salary_details" style="display:none;">
                            <label for="expected_salary" class="form-label">الراتب المتوقع (ريال)</label>
                            <input type="number" class="form-control" name="expected_salary" placeholder="0">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                      <label for="cv_file" class="form-label">السيرة الذاتية (اختياري - PDF, DOCX)</label>
                      <input class="form-control" type="file" id="cv_file" name="cv_file">
                    </div>


                    <hr class="my-4">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg px-5 shadow-sm">
                            <i class="fas fa-check-circle me-2"></i> إرسال طلبي الآن
                        </button>
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</div>

<footer class="text-center text-muted mt-5 pb-4">
  <small>مدعوم بواسطة نظام مرسوم للتوظيف</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    // This is the JavaScript for the dynamic "Add More" and show/hide logic
    $(document).ready(function() {
        
        // --- Add More Education ---
        $("#add-education-btn").click(function() {
            var educationBlock = `
            <div class="education-block border p-3 rounded mb-3 bg-light" style="display:none;">
                <a href="#" class="remove-btn float-start">إزالة</a>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">المؤهل العلمي</label>
                        <select class="form-select" name="qualification1[]">
                            <option value="" selected>-- اختر المؤهل --</option>
                            <option value="ثانوي">ثانوي</option>
                            <option value="دبلوم">دبلوم</option>
                            <option value="بكالوريوس">بكالوريوس</option>
                            <option value="ماجستير">ماجستير</option>
                            <option value="دكتوراة">دكتوراة</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">التخصص</label>
                        <input type="text" class="form-control" name="major[]">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">الجهة التعليمية</label>
                        <input type="text" class="form-control" name="educational_institution[]">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">المعدل (GPA)</label>
                        <input type="text" class="form-control" name="gpa[]">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">تاريخ التخرج</label>
                        <input type="date" class="form-control" name="date_of_graduation[]">
                    </div>
                </div>
            </div>`;
            $(educationBlock).appendTo("#education-wrapper").slideDown();
        });

        // --- Add More Experience ---
        $("#add-experience-btn").click(function() {
            var experienceBlock = `
            <div class="experience-block border p-3 rounded mb-3 bg-light" style="display:none;">
                <a href="#" class="remove-btn float-start">إزالة</a>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">اسم الشركة</label>
                        <input type="text" class="form-control" name="company[]">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">المسمى الوظيفي</label>
                        <input type="text" class="form-control" name="job_title3[]">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">سنوات الخبرة</label>
                        <input type="text" class="form-control" name="work_years[]">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">آخر راتب</label>
                        <input type="number" class="form-control" name="salary_old[]">
                    </div>
                </div>
            </div>`;
            $(experienceBlock).appendTo("#experience-wrapper").slideDown();
        });

        // --- Remove Button Logic ---
        // We use $(document).on('click'...) because the remove buttons are added dynamically
        $(document).on('click', '.remove-btn', function(e) {
            e.preventDefault();
            $(this).closest('.education-block, .experience-block').slideUp(function() {
                $(this).remove();
            });
        });

        // --- Question Show/Hide Logic ---
        $('input[name="q1"]').change(function() {
            if ($(this).val() == 'نعم') { $('#q1_details').slideDown(); } else { $('#q1_details').slideUp(); }
        });
        $('input[name="q2"]').change(function() {
            if ($(this).val() == 'نعم') { $('#q2_details').slideDown(); } else { $('#q2_details').slideUp(); }
        });
        $('input[name="q5"]').change(function() {
            if ($(this).val() == 'نعم') { $('#q5_details').slideDown(); } else { $('#q5_details').slideUp(); }
        });
        $('input[name="q8"]').change(function() {
            if ($(this).val() == 'نعم') { $('#q8_details').slideDown(); } else { $('#q8_details').slideUp(); }
        });
        $('input[name="q_expected_salary"]').change(function() {
            if ($(this).val() == '1') { $('#q_salary_details').slideDown(); } else { $('#q_salary_details').slideUp(); }
        });
    });
</script>

</body>
</html>