<div dir="rtl" class="rows col-12">
  <div class="block col-12 col-lg-9 mx-auto">
    <div class="box col-12 p-4">

      <?php if (validation_errors()): ?>
        <div class="alert alert-danger" role="alert"><?php echo validation_errors(); ?></div>
      <?php endif; ?>

      <div class="head-table col-12 mb-4">
        <h4><i class="bi bi-megaphone me-2"></i> نشر إعلان وظيفي (من طلب #<?= $requisition['id'] ?>)</h4>
      </div>
          
      <?php echo form_open('jobs/publish'); ?>
        <input type="hidden" name="requisition_id" value="<?= $requisition['id'] ?>">

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="job_title" class="form-label d-block text-end">المسمى الوظيفي (للإعلان العام)</label>
            <div class="custom-input-group">
              <input type="text" class="form-control custom-input" id="job_title" name="job_title" 
                     value="<?= set_value('job_title', $requisition['role_title']); ?>" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="department" class="form-label d-block text-end">القسم</label>
            <div class="custom-input-group">
              <input type="text" class="form-control custom-input" id="department" name="department" 
                     value="<?= set_value('department', $requisition['department']); ?>" required>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="location" class="form-label d-block text-end">الموقع</label>
            <div class="custom-input-group">
              <input type="text" class="form-control custom-input" id="location" name="location" 
                     placeholder="مثال: الرياض - المكتب الرئيسي" value="<?php echo set_value('location'); ?>" required>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="experience" class="form-label d-block text-end">الخبرة المطلوبة</label>
            <div class="custom-input-group">
              <input type="text" class="form-control custom-input" id="experience" name="experience" 
                     value="<?= set_value('experience', $requisition['experience_required']); ?>">
            </div>
          </div>
        </div>

        <div class="mb-4">
          <label for="job_description" class="form-label d-block text-end">الوصف الوظيفي (للإعلان العام)</label>
          <div class="custom-input-group">
            <textarea class="form-control custom-input" id="job_description" name="job_description" rows="8"><?= set_value('job_description', $requisition['description']); ?></textarea>
          </div>
        </div>
        
        <hr class="my-4">

        <div class="text-end">
          <button type="submit" class="button hex-btn">
            <i class="bi bi-send me-2"></i> نشر الإعلان الآن
          </button>
        </div>

      <?php echo form_close(); ?>
    </div>
  </div>
</div>