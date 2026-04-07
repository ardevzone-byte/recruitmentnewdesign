<div dir="rtl" class="container mt-4">
  <div class="row">
    
    <div class="col-lg-6">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0"><i class="fas fa-check-circle me-2"></i> طلبات معتمدة (بانتظار النشر)</h4>
        </div>
        <div class="card-body">
          <?php if($this->session->flashdata('success_msg')): ?>
            <?= $this->session->flashdata('success_msg') ?>
          <?php endif; ?>
          <?php if($this->session->flashdata('error_msg')): ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error_msg') ?></div>
          <?php endif; ?>
          
          <?php if (empty($pending_requests)): ?>
            <div class="text-center text-muted p-4">
              <i class="fas fa-inbox fa-3x text-muted mb-3"></i><br>
              <h5>لا توجد طلبات بانتظار النشر</h5>
              <p>جميع الطلبات المعتمدة تم نشرها بالفعل</p>
            </div>
          <?php else: ?>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>المسمى الوظيفي</th>
                    <th>المشروع</th>
                    <th>الإجراء</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pending_requests as $req): ?>
                    <tr>
                      <td class="fw-bold">#<?= $req['id'] ?></td>
                      <td class="fw-bold text-dark"><?= $req['role_title'] ?></td>
                      <td><span class="badge bg-secondary"><?= $req['project_or_client'] ?></span></td>
                      <td>
                        <a href="<?= base_url('jobs/create/' . $req['id']) ?>" class="btn btn-success btn-sm">
                          <i class="fas fa-plus-circle me-1"></i> نشر إعلان
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
          <h4 class="mb-0"><i class="fas fa-bullhorn me-2"></i> وظائف منشورة حالياً</h4>
        </div>
        <div class="card-body">
          
          <?php 
          $current_user = $this->session->userdata('username');
          if (in_array($current_user, ['1526', '1291','2200','2439']) || $this->session->userdata('role') == 'recruitment_manager'): 
          ?>
            <div class="mb-3 pb-3 border-bottom">
                <a href="<?= base_url('candidates/add_manual') ?>" class="btn btn-outline-primary">
                    <i class="fas fa-user-plus me-1"></i> إضافة مرشح يدوياً
                </a>
                <a href="<?= base_url('candidates/archive') ?>" class="btn btn-outline-dark ms-2">
                    <i class="fas fa-list me-1"></i> الأرشيف العام
                </a>
            </div>
          <?php endif; ?>
          <?php if (empty($published_jobs)): ?>
            <div class="text-center text-muted p-4">
              <i class="fas fa-users-slash fa-3x text-muted mb-3"></i><br>
              <h5>لا توجد وظائف منشورة</h5>
              <p>لم يتم نشر أي وظائف بعد</p>
            </div>
          <?php else: ?>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>المسمى الوظيفي</th>
                    <th>المشروع</th>
                    <th>المتقدمون</th>
                    <th>الإجراءات</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($published_jobs as $job): ?>
                    <tr>
                      <td class="fw-bold text-dark"><?= $job['job_title'] ?></td>
                      <td><span class="badge bg-secondary"><?= $job['project_or_client'] ?></span></td>
                      <td>
                        <span class="badge bg-primary rounded-pill">
                            -
                        </span>
                      </td>
                      <td>
                        <div class="btn-group btn-group-sm" role="group">
                          <a href="<?= base_url('pipeline/index/' . $job['id']) ?>" class="btn btn-primary" title="مسار التوظيف">
                            <i class="fas fa-columns"></i>
                          </a>
                          
                          <a href="<?= base_url('simple_apply/view/' . $job['public_link_id']) ?>" target="_blank" class="btn btn-info" title="عرض الإعلان (التقديم السريع)">
                            <i class="fas fa-eye"></i>
                          </a>
                          
                           <button type="button" class="btn btn-success"
        onclick="copyJobLink('<?= $job['public_link_id'] ?>')"
        title="نسخ رابط التقديم">
    <i class="fas fa-link"></i>
</button>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
    
  </div>
</div>

 <script>
function copyJobLink(linkId) {

    var jobUrl = "https://services.marsoom.net/recruitment2/simple_apply/view/" + linkId;

    var tempInput = document.createElement("input");
    tempInput.value = jobUrl;
    document.body.appendChild(tempInput);

    tempInput.select();
    tempInput.setSelectionRange(0, 99999);
    document.execCommand("copy");

    document.body.removeChild(tempInput);

    alert("تم نسخ رابط التقديم السريع:\n" + jobUrl);
}
</script>