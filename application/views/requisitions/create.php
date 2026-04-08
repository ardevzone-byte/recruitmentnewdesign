<div dir="rtl" class="rows col-12 jobs-dashboard recruitment-page requisitions-create-page">
  <div class="block col-12 mb-4 heading-white">
    <div class="head-table col-12">
      <h4><i class="bi bi-file-earmark-plus me-2"></i> إنشاء طلب احتياج وظيفي جديد</h4>
      <p class="mb-0 text-muted">أكمل البيانات أدناه ثم أرسل الطلب لمسار الاعتماد.</p>
    </div>
  </div>

  <div class="block col-12 col-lg-10 mx-auto">
    <div class="box col-12 p-4">
      <?php if (validation_errors()): ?>
        <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
      <?php endif; ?>

      <?php echo form_open('requisitions/submit'); ?>

        <h5 class="text-primary fw-bold mb-3">1. تفاصيل الوظيفة</h5>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="department" class="form-label d-block text-end">القسم</label>
            <div class="custom-input-group">
              <input type="text" class="form-control custom-input" id="department" name="department" 
                     value="<?php echo htmlspecialchars($user_department ?? ''); ?>" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="role_title" class="form-label d-block text-end">المسمى الوظيفي المطلوب</label>
            <div class="custom-input-group">
              <input type="text" class="form-control custom-input" id="role_title" name="role_title" 
                     placeholder="مثال: محصل ديون" value="<?php echo set_value('role_title'); ?>" required>
            </div>
          </div>
        </div>
            
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="project_or_client" class="form-label d-block text-end">المشروع / القسم</label>
                <div class="custom-input-group">
                <select class="form-select custom-input" id="project_or_client" name="project_or_client" required>
                    <option value="" selected disabled>-- اختر المشروع/القسم --</option>
                    <option value="ادارة الموارد البشرية والإدارية" <?php echo set_select('project_or_client', 'ادارة الموارد البشرية والإدارية'); ?>>ادارة الموارد البشرية والإدارية</option>
                    <option value="ادارة تقنية المعلومات" <?php echo set_select('project_or_client', 'ادارة تقنية المعلومات'); ?>>ادارة تقنية المعلومات</option>
                    <option value="الادارة المالية" <?php echo set_select('project_or_client', 'الادارة المالية'); ?>>الادارة المالية</option>
                    <option value="وحدة الجودة" <?php echo set_select('project_or_client', 'وحدة الجودة'); ?>>وحدة الجودة</option>
                    <option value="أمن السيبراني" <?php echo set_select('project_or_client', 'أمن السيبراني'); ?>>أمن السيبراني</option>
                    <option value="مشروع الراجحي" <?php echo set_select('project_or_client', 'مشروع الراجحي'); ?>>مشروع الراجحي</option>
                    <option value="مشروع إمكان" <?php echo set_select('project_or_client', 'مشروع إمكان'); ?>>مشروع إمكان</option>
                    <option value="مشروع الأهلي" <?php echo set_select('project_or_client', 'مشروع الأهلي'); ?>>مشروع الأهلي</option>
                    <option value="مشروع البلاد" <?php echo set_select('project_or_client', 'مشروع البلاد'); ?>>مشروع البلاد</option>
                    <option value="أخرى" <?php echo set_select('project_or_client', 'أخرى'); ?>>أخرى</option>
                </select>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="region" class="form-label d-block text-end">المنطقة</label>
                <div class="custom-input-group">
                <select class="form-select custom-input" id="region" name="region" required>
                    <option value="" selected disabled>-- اختر المنطقة --</option>
                    <option value="الوسطى" <?php echo set_select('region', 'الوسطى'); ?>>المنطقة الوسطى</option>
                    <option value="الغربية" <?php echo set_select('region', 'الغربية'); ?>>المنطقة الغربية</option>
                    <option value="الشرقية" <?php echo set_select('region', 'الشرقية'); ?>>المنطقة الشرقية</option>
                    <option value="الشمالية" <?php echo set_select('region', 'الشمالية'); ?>>المنطقة الشمالية</option>
                    <option value="الجنوبية" <?php echo set_select('region', 'الجنوبية'); ?>>المنطقة الجنوبية</option>
                </select>
                </div>
              </div>
            </div>
            
            <hr class="my-4">
            
            <h5 class="text-primary fw-bold mb-3">2. متطلبات المرشح</h5>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="employees_needed" class="form-label d-block text-end">العدد المطلوب</label>
                <div class="custom-input-group">
                  <input type="number" class="form-control custom-input" id="employees_needed" name="employees_needed" 
                         value="<?php echo set_value('employees_needed', 1); ?>" min="1" required>
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="gender" class="form-label d-block text-end">الجنس</label>
                <div class="custom-input-group">
                <select class="form-select custom-input" id="gender" name="gender" required>
                    <option value="" selected disabled>-- حدد الجنس --</option>
                    <option value="رجال" <?php echo set_select('gender', 'رجال'); ?>>رجال</option>
                    <option value="نساء" <?php echo set_select('gender', 'نساء'); ?>>نساء</option>
                    <option value="كلاهما" <?php echo set_select('gender', 'كلاهما'); ?>>كلاهما</option>
                </select>
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="education_level" class="form-label d-block text-end">المؤهل العلمي</label>
                <div class="custom-input-group">
                <select class="form-select custom-input" id="education_level" name="education_level" required>
                    <option value="" selected disabled>-- حدد المؤهل --</option>
                    <option value="ثانوي" <?php echo set_select('education_level', 'ثانوي'); ?>>ثانوي</option>
                    <option value="دبلوم" <?php echo set_select('education_level', 'دبلوم'); ?>>دبلوم</option>
                    <option value="بكالوريوس" <?php echo set_select('education_level', 'بكالوريوس'); ?>>بكالوريوس</option>
                    <option value="ماجستير" <?php echo set_select('education_level', 'ماجستير'); ?>>ماجستير فأعلى</option>
                    <option value="لا يشترط" <?php echo set_select('education_level', 'لا يشترط'); ?>>لا يشترط</option>
                </select>
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="age_range" class="form-label d-block text-end">نطاق العمر</label>
                <div class="custom-input-group">
                <select class="form-select custom-input" id="age_range" name="age_range" required>
                    <option value="" selected disabled>-- اختر نطاق العمر --</option>
                    <option value="20-25" <?php echo set_select('age_range', '20-25'); ?>>20 - 25 سنة</option>
                    <option value="25-30" <?php echo set_select('age_range', '25-30'); ?>>25 - 30 سنة</option>
                    <option value="30-35" <?php echo set_select('age_range', '30-35'); ?>>30 - 35 سنة</option>
                    <option value="35-40" <?php echo set_select('age_range', '35-40'); ?>>35 - 40 سنة</option>
                    <option value="40-45" <?php echo set_select('age_range', '40-45'); ?>>40 - 45 سنة</option>
                    <option value="45-50" <?php echo set_select('age_range', '45-50'); ?>>45 - 50 سنة</option>
                    <option value="أكبر من 50" <?php echo set_select('age_range', 'أكبر من 50'); ?>>أكبر من 50 سنة</option>
                    <option value="لا يشترط" <?php echo set_select('age_range', 'لا يشترط'); ?>>لا يشترط</option>
                </select>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="degree_major" class="form-label d-block text-end">التخصص المطلوب (اختياري)</label>
                <div class="custom-input-group">
                  <input type="text" class="form-control custom-input" id="degree_major" name="degree_major" 
                         placeholder="مثال: إدارة أعمال، محاسبة، علوم حاسب" value="<?php echo set_value('degree_major'); ?>">
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="experience_required" class="form-label d-block text-end">الخبرة المطلوبة (اختياري)</label>
                <div class="custom-input-group">
                  <input type="text" class="form-control custom-input" id="experience_required" name="experience_required" 
                         placeholder="مثال: 3-5 سنوات" value="<?php echo set_value('experience_required'); ?>">
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="target_hire_date" class="form-label d-block text-end">تاريخ التوظيف المستهدف</label>
                <div class="custom-input-group">
                  <input type="date" class="form-control custom-input" id="target_hire_date" name="target_hire_date" 
                         value="<?php echo set_value('target_hire_date'); ?>" required>
                </div>
              </div>
            </div>

            <hr class="my-4">
            <h5 class="text-primary fw-bold mb-3">3. الراتب والوصف الوظيفي</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="salary_min" class="form-label d-block text-end">الحد الأدنى للراتب (ريال)</label>
                    <div class="custom-input-group">
                      <input type="number" class="form-control custom-input" id="salary_min" name="salary_min" 
                             placeholder="8000" value="<?php echo set_value('salary_min'); ?>" required>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="salary_max" class="form-label d-block text-end">الحد الأعلى للراتب (ريال)</label>
                    <div class="custom-input-group">
                      <input type="number" class="form-control custom-input" id="salary_max" name="salary_max" 
                             placeholder="10000" value="<?php echo set_value('salary_max'); ?>" required>
                    </div>
                </div>
            </div>
            
            <div class="mb-4">
              <label for="description" class="form-label d-block text-end">الوصف الوظيفي والمهام</label>
              <div class="custom-input-group">
                <textarea class="form-control custom-input" id="description" name="description" rows="6" 
                          placeholder="الرجاء كتابة وصف مختصر للمهام والمسؤوليات..."><?php echo set_value('description'); ?></textarea>
              </div>
            </div>
            
            <hr class="my-4">

            <div class="text-end">
              <button type="submit" class="button hex-btn">
                <i class="bi bi-send me-2"></i> إرسال الطلب للاعتماد
              </button>
            </div>

      <?php echo form_close(); ?>
    </div>
  </div>
</div>