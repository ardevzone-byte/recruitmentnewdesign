<div dir="rtl" class="container mt-4 mb-5">
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card shadow-lg mb-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
          <h4 class="mb-0 text-primary"><i class="fas fa-info-circle me-2"></i> تفاصيل طلب #<?= $request['id'] ?></h4>
          <span class="badge bg-warning text-dark fs-6 p-2 rounded-pill"><?= $request['status'] ?></span>
        </div>
        <div class="card-body p-4 p-lg-5">
          
          <form id="editRequisitionForm" method="post" action="<?= base_url('requisitions/update/' . $request['id']) ?>">
          
          <h5 class="text-primary fw-bold mb-3">تفاصيل الوظيفة</h5>
          <div class="row">
            <div class="col-md-4 mb-3">
              <p class="text-muted mb-1">المسمى الوظيفي:</p>
              <h5 class="fw-bold"><?= $request['role_title'] ?></h5>
            </div>
            <div class="col-md-4 mb-3">
              <p class="text-muted mb-1">القسم:</p>
              <h5 class="fw-bold"><?= $request['department'] ?></h5>
            </div>
            <div class="col-md-4 mb-3">
              <p class="text-muted mb-1">المشروع/القسم:</p>
              <h5 class="fw-bold"><span class="badge bg-secondary fs-6"><?= $request['project_or_client'] ?></span></h5>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 mb-3">
              <p class="text-muted mb-1">المنطقة:</p>
              <h5 class="fw-bold"><?= $request['region'] ?></h5>
            </div>
            <div class="col-md-4 mb-3">
              <p class="text-muted mb-1">العدد المطلوب:</p>
              <h5 class="fw-bold"><?= $request['employees_needed'] ?></h5>
            </div>
            <div class="col-md-4 mb-3">
              <p class="text-muted mb-1">تاريخ التوظيف المستهدف:</p>
              <?php if ($this->session->userdata('role') == 'ceo' && $request['status'] == 'بانتظار الرئيس التنفيذي'): ?>
                <input type="date" class="form-control" name="target_hire_date" 
                       value="<?= htmlspecialchars($request['target_hire_date']) ?>" required>
              <?php else: ?>
                <h5 class="fw-bold"><?= $request['target_hire_date'] ?></h5>
              <?php endif; ?>
            </div>
          </div>

          <hr class="my-3">
          <h5 class="text-primary fw-bold mb-3">متطلبات المرشح</h5>
          <div class="row">
            <div class="col-md-3 mb-3">
              <p class="text-muted mb-1">الجنس:</p>
              <h5 class="fw-bold"><?= $request['gender'] ?></h5>
            </div>
            <div class="col-md-3 mb-3">
              <p class="text-muted mb-1">المؤهل العلمي:</p>
              <h5 class="fw-bold"><?= $request['education_level'] ?></h5>
            </div>
            <div class="col-md-3 mb-3">
              <p class="text-muted mb-1">التخصص:</p>
              <h5 class="fw-bold"><?= $request['degree_major'] ?: 'غير محدد' ?></h5>
            </div>
            <div class="col-md-3 mb-3">
              <p class="text-muted mb-1">نطاق العمر:</p>
              <h5 class="fw-bold"><?= $request['age_range'] ?></h5>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 mb-3">
              <p class="text-muted mb-1">الخبرة المطلوبة:</p>
              <h5 class="fw-bold"><?= $request['experience_required'] ?: 'غير محدد' ?></h5>
            </div>
          </div>

          <hr class="my-3">
          <h5 class="text-primary fw-bold mb-3">تفاصيل الراتب</h5>
          <div class="row">
            <div class="col-md-6 mb-3">
              <p class="text-muted mb-1">الراتب (من):</p>
              <?php if ($this->session->userdata('role') == 'ceo' && $request['status'] == 'بانتظار الرئيس التنفيذي'): ?>
                <div class="input-group">
                  <input type="number" class="form-control" name="salary_min" 
                         value="<?= htmlspecialchars($request['salary_min']) ?>" required min="0" step="500">
                  <span class="input-group-text">ريال</span>
                </div>
              <?php else: ?>
                <h5 class="fw-bold text-success"><?= number_format($request['salary_min']) ?> ريال</h5>
              <?php endif; ?>
            </div>
            <div class="col-md-6 mb-3">
              <p class="text-muted mb-1">الراتب (إلى):</p>
              <?php if ($this->session->userdata('role') == 'ceo' && $request['status'] == 'بانتظار الرئيس التنفيذي'): ?>
                <div class="input-group">
                  <input type="number" class="form-control" name="salary_max" 
                         value="<?= htmlspecialchars($request['salary_max']) ?>" required min="0" step="500">
                  <span class="input-group-text">ريال</span>
                </div>
              <?php else: ?>
                <h5 class="fw-bold text-success"><?= number_format($request['salary_max']) ?> ريال</h5>
              <?php endif; ?>
            </div>
          </div>
          
          <hr class="my-3">
          
          <div>
            <h5 class="fw-bold">الوصف الوظيفي والمهام:</h5>
            <div class="bg-light p-3 rounded border">
              <?= nl2br(htmlspecialchars($request['description'])) ?: '<p class="text-muted mb-0">لم يتم تقديم وصف.</p>' ?>
            </div>
          </div>

          <hr class="my-4">
          <h5 class="text-primary fw-bold mb-3">سجل الاعتمادات</h5>
          <div class="row">
            <div class="col-md-4 mb-3">
                <p class="text-muted mb-1">مقدم الطلب:</p>
                <h6 class="fw-bold"><?= $request['requester_name'] ?></h6>
                <small class="text-muted">بتاريخ: <?= date('Y-m-d H:i', strtotime($request['created_at'])) ?></small>
            </div>
            <div class="col-md-4 mb-3">
                <p class="text-muted mb-1">اعتماد مدير التوظيف:</p>
                <?php if($request['rm_approver_id']): ?>
                    <h6 class="fw-bold text-success">
                        <i class="fas fa-check-circle"></i> معتمد
                    </h6>
                    <small class="text-muted">بتاريخ: <?= date('Y-m-d H:i', strtotime($request['rm_approved_at'])) ?></small>
                    <?php if($request['rm_notes']): ?>
                        <br><small class="text-muted">الملاحظات: <?= $request['rm_notes'] ?></small>
                    <?php endif; ?>
                <?php else: ?>
                    <h6 class="text-muted">بانتظار الاعتماد</h6>
                <?php endif; ?>
            </div>
            <div class="col-md-4 mb-3">
                <p class="text-muted mb-1">اعتماد الرئيس التنفيذي:</p>
                <?php if($request['ceo_approver_id']): ?>
                    <h6 class="fw-bold text-success">
                        <i class="fas fa-check-circle"></i> معتمد
                    </h6>
                    <small class="text-muted">بتاريخ: <?= date('Y-m-d H:i', strtotime($request['ceo_approved_at'])) ?></small>
                    <?php if($request['ceo_notes']): ?>
                        <br><small class="text-muted">الملاحظات: <?= $request['ceo_notes'] ?></small>
                    <?php endif; ?>
                <?php elseif($request['status'] == 'بانتظار الرئيس التنفيذي'): ?>
                    <h6 class="text-muted">بانتظار الاعتماد</h6>
                <?php else: ?>
                    <h6 class="text-muted">-</h6>
                <?php endif; ?>
            </div>
          </div>
          
          </form>
          
        </div>
      </div>

      <?php 
      // التحقق من صلاحية التعديل
      $current_user_id = $this->session->userdata('user_id');
      $is_requester = ($current_user_id == $request['requester_user_id']);
      $is_ceo = ($this->session->userdata('role') == 'ceo');
      $is_pending_ceo_approval = ($request['status'] == 'بانتظار الرئيس التنفيذي');
      
      // عرض زر حفظ التعديلات للرئيس التنفيذي
      if (!$is_requester && $is_ceo && $is_pending_ceo_approval): 
      ?>
        <div class="card shadow-lg mb-4">
          <div class="card-header bg-white">
            <h5 class="mb-0"><i class="fas fa-edit me-2"></i> تعديل التفاصيل</h5>
          </div>
          <div class="card-body p-4">
            <div class="alert alert-info mb-3">
              <i class="fas fa-info-circle me-2"></i>
              يمكنك تعديل نطاق الراتب وتاريخ التوظيف المستهدف قبل اعتماد الطلب.
            </div>
            <div class="d-flex justify-content-end gap-2">
              <button type="button" id="saveEditsBtn" class="btn btn-primary btn-lg">
                <i class="fas fa-save me-2"></i> حفظ التعديلات
              </button>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <?php 
      // زر الاعتماد/الرفض
      if (!$is_requester && 
          (($request['status'] == 'بانتظار مدير التوظيف' && $this->session->userdata('role') == 'recruitment_manager') ||
           ($request['status'] == 'بانتظار الرئيس التنفيذي' && $this->session->userdata('role') == 'ceo'))): 
      ?>
        
        <div class="card shadow-lg">
          <div class="card-header bg-white">
            <h5 class="mb-0"><i class="fas fa-check-square me-2"></i> اتخاذ إجراء</h5>
          </div>
          <div class="card-body p-4">
            <?php echo form_open('requisitions/process_approval/' . $request['id']); ?>
              <div class="mb-3">
                <label for="notes" class="form-label">إضافة ملاحظات (اختياري)</label>
                <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="اكتب ملاحظاتك هنا..."></textarea>
              </div>
              
              <div class="d-flex justify-content-end gap-2">
                <button type="submit" name="action" value="reject" class="btn btn-danger btn-lg">
                  <i class="fas fa-times-circle me-2"></i> رفض
                </button>
                <button type="submit" name="action" value="approve" class="btn btn-success btn-lg">
                  <i class="fas fa-check-circle me-2"></i> اعتماد
                </button>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      <?php endif; ?>

      <!-- إضافة قسم إضافي لرؤية حالة الاعتماد للمستخدم العادي -->
      <?php if ($is_requester && in_array($request['status'], ['بانتظار مدير التوظيف', 'بانتظار الرئيس التنفيذي'])): ?>
        <div class="alert alert-info">
          <div class="d-flex align-items-center">
            <i class="fas fa-clock fs-4 me-3"></i>
            <div>
              <h5 class="mb-1">طلبك قيد المراجعة</h5>
              <p class="mb-0">طلبك (رقم <?= $request['id'] ?>) قيد المراجعة من قبل 
                <?= $request['status'] == 'بانتظار مدير التوظيف' ? 'مدير التوظيف' : 'الرئيس التنفيذي' ?>.
                سيتم إعلامك عند اتخاذ القرار.
              </p>
            </div>
          </div>
        </div>
      <?php endif; ?>

    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // زر حفظ التعديلات للرئيس التنفيذي
  const saveEditsBtn = document.getElementById('saveEditsBtn');
  if (saveEditsBtn) {
    saveEditsBtn.addEventListener('click', function() {
      // إظهار رسالة تأكيد
      if (confirm('هل أنت متأكد من حفظ التعديلات؟')) {
        // إرسال النموذج
        document.getElementById('editRequisitionForm').submit();
      }
    });
  }
  
  // التحقق من صحة الراتب (أن الحد الأدنى أقل من الحد الأقصى)
  const salaryMinInput = document.querySelector('input[name="salary_min"]');
  const salaryMaxInput = document.querySelector('input[name="salary_max"]');
  
  function validateSalary() {
    if (salaryMinInput && salaryMaxInput) {
      const min = parseInt(salaryMinInput.value);
      const max = parseInt(salaryMaxInput.value);
      
      if (min > max) {
        alert('الحد الأدنى للراتب يجب أن يكون أقل من أو يساوي الحد الأقصى');
        return false;
      }
      return true;
    }
    return true;
  }
  
  // إضافة حدث التحقق قبل الإرسال
  const editForm = document.getElementById('editRequisitionForm');
  if (editForm) {
    editForm.addEventListener('submit', function(e) {
      if (!validateSalary()) {
        e.preventDefault();
        return false;
      }
      
      // إظهار رسالة التحميل
      if (saveEditsBtn) {
        saveEditsBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> جاري الحفظ...';
        saveEditsBtn.disabled = true;
      }
    });
  }
});
</script>