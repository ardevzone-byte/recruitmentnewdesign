<div dir="rtl" class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="fas fa-user-plus me-2"></i> إضافة مرشح يدوي</h4>
        </div>
        <div class="card-body p-4">
            
            <?php if($this->session->flashdata('error_msg')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error_msg') ?></div>
            <?php endif; ?>

            <?= form_open_multipart('candidates/submit_manual'); ?>

            <div class="bg-light p-4 rounded border mb-4">
                <h5 class="text-primary fw-bold mb-3"><i class="fas fa-briefcase"></i> حدد الوظيفة</h5>
                
                <div class="row g-3 align-items-center">
                    <div class="col-md-5">
                        <label class="form-label fw-bold">1. اختر من وظيفة منشورة:</label>
                        <select name="job_id" class="form-select" id="jobSelect">
                            <option value="">-- اختر من القائمة --</option>
                            <?php foreach($jobs as $job): ?>
                                <option value="<?= $job['id'] ?>"><?= $job['job_title'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="col-md-2 text-center">
                        <span class="badge bg-secondary rounded-pill p-2">أو (OR)</span>
                    </div>

                    <div class="col-md-5">
                        <label class="form-label fw-bold text-success">2. أنشئ مسمى وظيفي جديد فوراً:</label>
                        <input type="text" name="new_job_title" id="newJobInput" class="form-control border-success" placeholder="مثال: مدير مشروع">
                        <small class="text-muted">سيتم إنشاء الوظيفة واعتمادها فوراً.</small>
                    </div>
                </div>
            </div>

                
                    <div class="border rounded-3 p-3 bg-light mb-3">
  <div class="d-flex align-items-start gap-3">
    
    <input class="form-check-input mt-1 ms-0" type="checkbox"
           name="is_dr_saleh_office" id="isDrSalehOffice" value="1">

    <div class="flex-grow-1">
      <label class="fw-bold mb-1 d-block" for="isDrSalehOffice" style="font-size:15px;">
        هل المرشح يتبع لمكتب الدكتور صالح الجربوع للمحاماة؟
      </label>

      <div class="small text-muted" style="line-height:1.7;">
        عند التفعيل سيتم حفظ الشركة: <b>مكتب الدكتور صالح الجربوع للمحاماة</b>،
        وإلا سيتم حفظ: <b>شركة مرسوم لتحصيل الديون</b>.
      </div>
    </div>

  </div>
</div>

                 


            <h5 class="text-secondary fw-bold mb-3"><i class="fas fa-user"></i> بيانات المرشح</h5>

            <div class="row">

                <div class="col-md-6 mb-3">
  <label class="form-label">المنطقة <span class="text-danger">*</span></label>

  <!-- واجهة فقط -->
  <select id="areaSelect" name="area_ui" class="form-select" required>
      <option value="">-- اختر المنطقة --</option>
      <option value="الرياض">الرياض</option>
      <option value="ابها">ابها</option>
      <option value="الخبر">الخبر</option>
      <option value="حائل">حائل</option>
      <option value="other">أخرى</option>
  </select>

  <!-- هذا هو اللي ينرسل للكنترولر -->
  <input type="hidden" name="area" id="areaReal" value="">

  <div id="otherAreaBox" class="mt-2" style="display:none;">
      <input type="text" id="areaOtherInput" class="form-control" placeholder="اكتب اسم المنطقة">
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const areaSelect = document.getElementById("areaSelect");
  const areaReal   = document.getElementById("areaReal");
  const otherBox   = document.getElementById("otherAreaBox");
  const otherInput = document.getElementById("areaOtherInput");

  function syncAreaValue() {
    if (areaSelect.value === "other") {
      const v = (otherInput.value || "").trim();
      areaReal.value = v; // ✅ هنا اللي ينرسل
    } else {
      areaReal.value = areaSelect.value; // ✅ هنا اللي ينرسل
    }
  }

  // عند تغيير الاختيار
  areaSelect.addEventListener("change", function () {
    if (this.value === "other") {
      otherBox.style.display = "block";
      otherInput.required = true;
      otherInput.focus();
    } else {
      otherBox.style.display = "none";
      otherInput.required = false;
      otherInput.value = "";
    }
    syncAreaValue();
  });

  // عند الكتابة في "أخرى"
  otherInput.addEventListener("input", syncAreaValue);

  // قبل إرسال أي فورم: نضمن تعبئة area
  document.addEventListener("submit", function(e){
    syncAreaValue();

    // تحقق نهائي
    if (areaSelect.value === "other" && !areaReal.value) {
      e.preventDefault();
      otherInput.focus();
      alert('اكتب اسم المنطقة عند اختيار "أخرى".');
    }
  }, true);

  // تهيئة أولية
  syncAreaValue();
});
</script>





                <div class="col-md-6 mb-3">
                    <label class="form-label">الاسم الكامل (عربي) <span class="text-danger">*</span></label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">الاسم (إنجليزي)</label>
                    <input type="text" name="name_en" class="form-control">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">رقم الجوال <span class="text-danger">*</span></label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">رقم الهوية / الإقامة</label>
                    <input type="text" name="id_number" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">الجنسية</label>
                    <input type="text" name="nationality" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">تاريخ الميلاد</label>
                    <input type="date" name="date_of_birth" class="form-control">
                </div>
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">السيرة الذاتية</label>
                    <input type="file" name="cv_file" class="form-control">
                </div>
            </div>

            <div class="d-grid gap-2 mt-4">
                <button type="submit" class="btn btn-primary btn-lg fw-bold">
                    <i class="fas fa-save me-2"></i> حفظ وفتح المسار (Pipeline)
                </button>
            </div>

            <?= form_close(); ?>
        </div>
    </div>
</div>

<script>
// Logic: If user types a new job, disable the dropdown to avoid confusion
document.getElementById('newJobInput').addEventListener('input', function() {
    var select = document.getElementById('jobSelect');
    if(this.value.length > 0) {
        select.value = "";
        select.disabled = true;
    } else {
        select.disabled = false;
    }
});
</script>