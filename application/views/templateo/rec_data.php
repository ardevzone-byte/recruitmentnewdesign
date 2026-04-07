<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>      التوظيف    — قائمة المرشحين</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;700&family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

  <style>
    /* هيدر الجدول: لون الخط أبيض */
.table thead th { 
  color: #fff !important;
}

/* لو كنت ملوّن الخلفية من قبل */
.table thead th { 
  background-color: #001f3f !important; /* نفس الأزرق حق التصميم */
}


    :root{ --marsom-blue:#001f3f; --marsom-orange:#FF8C00; --text-light:#fff; --text-dark:#343a40; --glass-bg:rgba(255,255,255,.08); --glass-border:rgba(255,255,255,.2); --glass-shadow:rgba(0,0,0,.5) }
    body{font-family:'Tajawal',sans-serif;overflow:hidden;background:linear-gradient(135deg,var(--marsom-blue) 0%,#34495e 50%,var(--marsom-orange) 100%);background-size:400% 400%;animation:grad 20s ease infinite;color:var(--text-dark);position:relative}
    @keyframes grad{0%{background-position:0% 50%}50%{background-position:100% 50%}100%{background-position:0% 50%}}
    .particles{position:fixed;inset:0;overflow:hidden;z-index:-1}
    .particle{position:absolute;background:rgba(255,140,0,.1);clip-path:polygon(50% 0%,100% 25%,100% 75%,50% 100%,0% 75%,0% 25%);animation:float 25s infinite ease-in-out;opacity:0;filter:blur(2px)}
    .particle:nth-child(even){background:rgba(0,31,63,.1)}
    #loading-screen{position:fixed;inset:0;background:transparent;z-index:9999;display:flex;align-items:center;justify-content:center;flex-direction:column;transition:opacity .5s}
    .loader{width:50px;height:50px;border:5px solid rgba(255,255,255,.3);border-top:5px solid var(--marsom-orange);border-radius:50%;animation:spin 1s linear infinite;margin-bottom:16px}
    @keyframes spin{to{transform:rotate(360deg)}}
    .main-container{padding:30px 15px;visibility:hidden;opacity:0;transition:opacity .5s;position:relative;z-index:1}
    .page-title{font-family:'El Messiri',sans-serif;font-weight:700;font-size:2.4rem;color:var(--text-light);margin-bottom:18px;text-align:center;position:relative;display:inline-block;padding-bottom:10px;text-shadow:0 3px 6px rgba(0,0,0,.4)}
    .page-title::after{content:'';position:absolute;width:220px;height:4px;background:linear-gradient(90deg,var(--marsom-blue),var(--marsom-orange));bottom:0;left:50%;transform:translateX(-50%);border-radius:2px}
    .table-card{background:rgba(255,255,255,.9);backdrop-filter:blur(8px);-webkit-backdrop-filter:blur(8px);border:1px solid rgba(255,255,255,.3);border-radius:15px;box-shadow:0 10px 30px rgba(0,0,0,.15);padding:18px}
    .top-actions{position:fixed;top:12px;right:12px;display:flex;gap:10px;z-index:5}
    .top-actions a{background:rgba(255,255,255,.12);border:1px solid var(--glass-border);color:#fff;text-decoration:none;border-radius:10px;padding:8px 14px;display:inline-flex;align-items:center;gap:8px;transition:.25s}
    .top-actions a:hover{background:rgba(255,255,255,.2);color:var(--marsom-orange)}
    thead th{background-color:#001f3f !important;color:#fff}
  </style>
</head>
<body>

<!-- الخلفية المتحركة -->
<div class="particles">
  <div class="particle"></div><div class="particle"></div><div class="particle"></div><div class="particle"></div><div class="particle"></div>
  <div class="particle"></div><div class="particle"></div><div class="particle"></div><div class="particle"></div><div class="particle"></div>
</div>

<!-- شاشة التحميل -->
<div id="loading-screen">
  <div class="loader"></div>
  <h3 style="color:#fff">جارٍ تحميل القائمة ...</h3>
</div>

<!-- أزرار رجوع/الرئيسية -->
<div class="top-actions">
  <a href="javascript:history.back()"><i class="fas fa-arrow-right"></i><span>رجوع</span></a>
  <a href="<?php echo site_url('dashboard'); ?>"><i class="fas fa-home"></i><span>الرئيسية</span></a>
</div>

<div class="main-container container-fluid">
  <div class="text-center">
    <h1 class="page-title">   التوظيف       — قائمة المرشحين</h1>
  </div>

  <!-- فلتر تاريخ المباشرة (سيرفر سايد عبر GET) -->
  <div class="row g-3 mb-3">
    <div class="col-12">
      <div class="table-card">
        <form method="get" action="<?php echo site_url('users/rec_data'); ?>" class="row g-2 align-items-end">
  <div class="col-sm-4 col-lg-3">
    <label class="form-label">من تاريخ (المباشرة)</label>
    <input type="date" class="form-control" name="from" value="<?php echo html_escape($from ?? ''); ?>">
  </div>
  <div class="col-sm-4 col-lg-3">
    <label class="form-label">إلى تاريخ (المباشرة)</label>
    <input type="date" class="form-control" name="to" value="<?php echo html_escape($to ?? ''); ?>">
  </div>

  <div class="col-sm-4 col-lg-3">
    <label class="form-label">بحث برقم الهوية</label>
    <input type="text" class="form-control" name="id_number"
           placeholder="مثال: 1234567890"
           value="<?php echo html_escape($id_number ?? ''); ?>">
  </div>

  <div class="col-sm-4 col-lg-3 d-flex gap-2">
    <button class="btn btn-primary"><i class="fa fa-filter"></i> عرض النتائج</button>

    <?php
      $hasRange = !empty($from) && !empty($to);
      $hasId    = !empty($id_number);
      if ($hasRange || $hasId):
        $exportUrl = site_url('users/rec_data_export?'
                    . ($hasId ? 'id_number='.urlencode($id_number) :
                                ('from='.urlencode($from).'&to='.urlencode($to))));
    ?>
      <a class="btn btn-success" target="_blank" href="<?php echo $exportUrl; ?>">
        <i class="fa fa-download"></i> تصدير CSV
      </a>
    <?php endif; ?>
  </div>

  <div class="col-12">
    <div class="small text-muted mt-2">
      يمكنك التصفية إمّا بـ <strong>فترة تاريخ المباشرة</strong> أو <strong>برقم الهوية</strong>.
      عند إدخال رقم الهوية سيتم تجاهل التاريخ.
    </div>
  </div>
</form>

        <div class="small text-muted mt-2">لن تظهر بيانات حتى تختار نطاق تاريخ <strong>المباشرة</strong> وتضغط «عرض النتائج».</div>
      </div>
    </div>
  </div>

  <!-- الجدول -->
  <div class="row">
    <div class="col-12">
      <div class="card table-card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>الرقم</th>

                  <th> الرقم الوظيفي</th>


                  <th>الاسم</th>
                  <th>رقم الجوال</th>
                  <th>تاريخ المقابلة</th>
                  <th>المسمى الوظيفي</th>
                  <th>الخيارات</th>
                  <th>تاريخ المباشرة</th>
                  <th>حالة المباشرة</th>
                  <th>مرفق السيرة الذاتية</th>
                  <th>طلب موجه إلى</th>
                  <?php if ($this->session->userdata('type') == 3): ?>
                    <th>تقييم المرشح</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($customers)): ?>
                  <?php foreach($customers as $customerss): ?>
                    <tr>
                      <td><?php echo $customerss['id']; ?></td>
                       <td><?php echo $customerss['emp_id']; ?></td>
                      <td><?php echo $customerss['name']; ?></td>
                      <td><?php echo $customerss['mobile']; ?></td>
                      <td><?php echo $customerss['day']; ?></td>
                      <td><?php echo $customerss['job_name']; ?></td>

                      <td>
                         <a href="https://services.marsoom.net/hr101/users/interview_print_hr/<?php echo $customerss['id_number']; ?>"
   class="btn btn-sm btn-light d-inline-flex align-items-center gap-1"
   title="نموذج المقابلة الوظيفية"
   target="_blank" rel="noopener noreferrer">
  <i class="fa-solid fa-clipboard-check"></i><span>نموذج المقابلة</span>
</a>

<a href="<?php echo site_url('users/inv2222_hr/'.$customerss['id']); ?>"
   class="btn btn-sm btn-light d-inline-flex align-items-center gap-1"
   title="طباعة العرض الوظيفي"
   target="_blank" rel="noopener noreferrer">
  <i class="fa-solid fa-print"></i><span>طباعة العرض الوظيفي</span>
</a>

 
 <?php if (!empty($customerss['cv'])): ?>
    <?php
      // مسار ملف الـCV في نظام الوظائف
      $cvUrl = 'https://services.marsoom.net/jobs/assets/imeges/posts/' . rawurlencode($customerss['cv']);
    ?>
    <a class="btn btn-sm btn-light d-inline-flex align-items-center gap-1"
   href="#"
   title="  السيرة الذاتية"
   onclick="MyWindow=window.open('<?php echo $cvUrl; ?>','MyWindow','width=800,height=600,top=80,left=120,resizable=yes,scrollbars=yes,status=no'); return false;">
  <i class="fa-regular fa-id-card"></i>   السيرة الذاتية
</a>

  <?php else: ?>
    <span class="text-muted">لا يوجد</span>
  <?php endif; ?>



                        
 
                      </td>

                      <td><?php echo htmlspecialchars($customerss['f5'] ?? '—'); ?></td>

                      <td>
                        <?php
                          if ($customerss['status5']==1)      echo "تم المباشرة";
                          elseif ($customerss['status5']==2)  echo "انسحاب";
                          elseif ($customerss['status5']==3)  echo "استبعاد";
                          elseif ($customerss['status5']==4)  echo "انهاء فترة تجربة";
                          else                                echo "غير محدد";
                        ?>
                      </td>

                      <td>
                        <?php if (!empty($customerss['path'])): ?>
                          <a class="btn btn-sm btn-primary" target="_blank" href="<?php echo site_url('assets/imeges/posts/'.$customerss['path']); ?>">
                            <i class="fa fa-cloud-download"></i> السيرة الذاتية
                          </a>
                        <?php else: ?>
                          <span class="text-muted">لا يوجد</span>
                        <?php endif; ?>
                      </td>

                      <td><?php echo $customerss['useridfuturename']; ?></td>

                      <?php if ($this->session->userdata('type') == 3): ?>
                        <td>
                          <a class="btn btn-sm btn-outline-dark" href="<?php echo site_url('users/view_emp_hrs/'.$customerss['id']); ?>">
                            التفاصيل
                          </a>
                        </td>
                      <?php endif; ?>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr><td colspan="11" class="text-center text-muted">لا توجد بيانات للعرض. حدّد نطاق تاريخ المباشرة ثم اضغط «عرض النتائج».</td></tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  window.addEventListener('load', function(){
    const loading = document.getElementById('loading-screen');
    const main = document.querySelector('.main-container');
    loading.style.opacity='0';
    setTimeout(function(){ loading.style.display='none'; document.body.style.overflow='auto'; main.style.visibility='visible'; main.style.opacity='1'; }, 400);
  });
</script>
</body>
</html>
