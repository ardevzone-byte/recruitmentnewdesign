<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= html_escape($title ?? 'إدارة تقييمات المرشح') ?></title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
  <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <style>
    :root{
      --primary-blue:#001f3f;
      --primary-orange:#FF8C00;
      --dark-bg:#0d1b2a;
      --darker-bg:#0a1929;
      --glass-bg: rgba(255,255,255,.05);
      --glass-border: rgba(255,255,255,.10);
      --card-bg: rgba(255,255,255,.07);
      --text-light:#fff;
      --text-muted: rgba(255,255,255,.68);
      --shadow-sm: 0 10px 25px rgba(0,0,0,.20);
      --radius-xxl: 24px;
      --radius-xl: 18px;
    }
    body{
      font-family:'Tajawal', sans-serif;
      background: linear-gradient(135deg, var(--darker-bg) 0%, var(--primary-blue) 30%, #1a1a2e 70%, var(--dark-bg) 100%);
      min-height:100vh;color:var(--text-light);overflow-x:hidden;background-attachment: fixed;
    }
    .bg-pattern{position:fixed; inset:0; z-index:-2; opacity:.9;
      background-image:
        radial-gradient(circle at 10% 20%, rgba(255,140,0,.05) 0%, transparent 20%),
        radial-gradient(circle at 90% 80%, rgba(0,31,63,.05) 0%, transparent 20%);
      background-size: 500px 500px, 500px 500px;
      animation: patternMove 18s linear infinite;
    }
    @keyframes patternMove{0%{background-position:0 0,0 0}100%{background-position:500px 500px,500px 500px}}
    .floating-orb{position:fixed;border-radius:50%;filter: blur(40px);opacity:.15;animation: orbFloat 30s ease-in-out infinite;z-index:-1;}
    .orb-1{width:320px;height:320px;background:var(--primary-orange);top:10%;right:6%;}
    .orb-2{width:440px;height:440px;background:var(--primary-blue);bottom:8%;left:6%;animation-duration:40s;animation-delay:-10s;}
    @keyframes orbFloat{0%,100%{transform:translate(0,0) scale(1)}25%{transform:translate(100px,-50px) scale(1.08)}50%{transform:translate(-50px,100px) scale(.92)}75%{transform:translate(-100px,-50px) scale(1.05)}}
    .wrap{max-width:1400px;margin:24px auto;padding:0 14px;position:relative;z-index:1;}
    .header-nav{
      background: rgba(255,255,255,.03);
      border: 1px solid var(--glass-border);
      border-radius: var(--radius-xxl);
      box-shadow: 0 8px 32px rgba(0,0,0,.28);
      backdrop-filter: blur(20px);
      padding: 16px 18px;
      display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom: 18px;position:relative;overflow:hidden;
    }
    .header-nav::before{content:'';position:absolute;top:0;left:0;right:0;height:2px;background: linear-gradient(90deg, transparent, var(--primary-orange), transparent);}
    .title-box h1{
      font-family:'El Messiri', serif;font-size: 1.75rem;font-weight: 900;margin:0;line-height: 1.2;
      background: linear-gradient(135deg, #ffffff, #ffd166);-webkit-background-clip:text;-webkit-text-fill-color:transparent;
    }
    .title-box p{margin:6px 0 0;color: var(--text-muted);font-size: .95rem;}
    .btn-marsom{
      border: 1px solid rgba(255,255,255,.18);
      background: rgba(255,255,255,.06);
      color:#fff;border-radius: 14px;padding: 10px 14px;font-weight: 900;text-decoration:none;
      display:inline-flex;align-items:center;gap:10px;transition: all .25s ease;white-space:nowrap;
    }
    .btn-marsom:hover{transform: translateY(-2px);border-color: rgba(255,140,0,.55);box-shadow: 0 10px 22px rgba(255,140,0,.14);color:#fff;}
    .btn-marsom.primary{background: linear-gradient(135deg, rgba(255,140,0,.22), rgba(255,140,0,.10));border-color: rgba(255,140,0,.35);}

    .section{
      background: var(--glass-bg);
      border: 1px solid var(--glass-border);
      border-radius: var(--radius-xxl);
      backdrop-filter: blur(18px);
      box-shadow: var(--shadow-sm);
      padding: 18px;
      position: relative;
      overflow:hidden;
    }
    .section::before{content:'';position:absolute;top:0;left:0;right:0;height:3px;background: linear-gradient(90deg, var(--primary-orange), var(--primary-blue));opacity:.9;}
    .glass-card{background: var(--card-bg);border: 1px solid rgba(255,255,255,.12);border-radius: var(--radius-xl);padding: 16px;box-shadow: 0 10px 25px rgba(0,0,0,.18);}
    .form-control, .form-select, textarea{
      background: rgba(255,255,255,.06) !important;border: 1px solid rgba(255,255,255,.16) !important;color:#fff !important;border-radius: 14px !important;
    }
    .form-label{font-weight:900}
    .hint{color: var(--text-muted);font-size:.92rem;line-height:1.6}
    .badge-soft{display:inline-flex;align-items:center;gap:8px;padding: 8px 12px;border-radius: 999px;border: 1px solid rgba(255,255,255,.16);background: rgba(255,255,255,.06);color:#fff;font-weight: 900;}
    .table{
      --bs-table-bg: transparent;
      --bs-table-color: #fff;
      --bs-table-border-color: rgba(255,255,255,.12);
    }
    .table thead th{color:rgba(255,255,255,.85)}
    .alert{border-radius: 16px;border: 1px solid rgba(255,255,255,.14);background: rgba(0,0,0,.18);color:#fff;white-space:pre-line;}
    .modal-content{background:#0b1b2f;border:1px solid rgba(255,255,255,.12);border-radius:18px;color:#fff}
    .modal-header{border-bottom:1px solid rgba(255,255,255,.12)}
    .modal-footer{border-top:1px solid rgba(255,255,255,.12)}
  </style>
</head>

<body>
  <div class="bg-pattern"></div>
  <div class="floating-orb orb-1"></div>
  <div class="floating-orb orb-2"></div>

  <div class="wrap">

    <div class="header-nav" data-aos="fade-down" data-aos-duration="800">
      <div class="title-box">
        <h1>إدارة تقييمات المرشح</h1>
        <p>بحث ثم عرض التقييمات وإضافة/تعديل/حذف التقييم</p>
      </div>

      <div class="d-flex gap-2 flex-wrap">
        <a class="btn-marsom" href="<?= base_url('users1/main_hr1'); ?>">
          <i class="fas fa-house"></i> الرئيسية
        </a>
      </div>
    </div>

    <div class="section" data-aos="fade-up" data-aos-delay="80">

      <?php
        $flash_type = $this->session->flashdata('flash_type');
        $flash_msg  = $this->session->flashdata('flash_msg');
        if ($flash_msg):
      ?>
        <div class="alert alert-<?= html_escape($flash_type ?: 'info') ?> mb-3"><?= html_escape($flash_msg) ?></div>
      <?php endif; ?>

      <?php if (!empty($error)): ?>
        <div class="alert alert-danger mb-3"><?= html_escape($error) ?></div>
      <?php endif; ?>

      <!-- Search -->
      <div class="glass-card mb-3" data-aos="fade-up" data-aos-delay="120">
        <form method="post" action="<?= base_url('CandidateEvaluations/search'); ?>" class="row g-2 align-items-end">
          <div class="col-lg-9">
            <label class="form-label">بحث</label>
            <input type="text" name="q" value="<?= html_escape($q ?? '') ?>" class="form-control"
                   placeholder="اكتب الرقم الوظيفي (job_offers.employee_id) أو اسم المرشح (candidates.full_name)">
            <div class="hint mt-2">سيتم جلب التقييمات بناءً على <b>application_id</b> المرتبط بالعرض الوظيفي.</div>
          </div>
          <div class="col-lg-3 d-grid">
            <button class="btn-marsom primary justify-content-center" type="submit">
              <i class="fas fa-magnifying-glass"></i> بحث
            </button>
          </div>
        </form>
      </div>

      <?php if (!empty($result)): ?>
        <!-- Candidate Info -->
        <div class="glass-card mb-3" data-aos="fade-up" data-aos-delay="160">
          <div class="d-flex flex-wrap gap-2 align-items-center justify-content-between">
            <div class="d-flex flex-wrap gap-2">
              <span class="badge-soft"><i class="fa fa-user"></i> <?= html_escape($result->full_name) ?></span>
              <span class="badge-soft"><i class="fa fa-id-badge"></i> رقم وظيفي: <?= html_escape($result->offer_employee_id) ?></span>
              <span class="badge-soft"><i class="fa fa-hashtag"></i> Application ID: <?= (int)$result->application_id ?></span>
            </div>
            <div class="hint">يمكنك إضافة تقييم جديد أو تعديل الموجود.</div>
          </div>
        </div>

        <!-- Add Evaluation -->
        <div class="glass-card mb-3" data-aos="fade-up" data-aos-delay="200">
          <h5 class="mb-3" style="font-family:'El Messiri',serif;font-weight:900">
            <i class="fas fa-plus"></i> إضافة تقييم
          </h5>

          <form method="post" action="<?= base_url('CandidateEvaluations/create'); ?>" class="row g-2">
            <input type="hidden" name="application_id" value="<?= (int)$result->application_id ?>">
            <input type="hidden" name="return_q" value="<?= html_escape($q) ?>">

            <div class="col-md-3">
              <label class="form-label">رقم المقيم الوظيفي</label>
              <input type="text" name="evaluator_user_id" class="form-control" placeholder="مثال: 1291" required>
            </div>

            <div class="col-md-2">
              <label class="form-label">الحالة</label>
              <select name="status" class="form-select" required>
                <option value="pending">انتظار التقييم</option>
                <option value="completed">تم التقييم</option>
              </select>
            </div>

            <div class="col-md-2">
              <label class="form-label">الدرجة</label>
              <input type="number" step="0.01" name="score" class="form-control" placeholder="0 - 100">
            </div>

            <div class="col-md-2">
              <label class="form-label">الراتب المتوقع</label>
              <input type="number" step="0.01" name="recommended_salary" class="form-control" placeholder="مثال: 8000">
            </div>

            <div class="col-md-3">
              <label class="form-label">تم الإنشاء من قبل (requested_by)</label>
              <input type="text" name="requested_by" class="form-control" placeholder="رقم وظيفي أو username">
            </div>

            <div class="col-12">
              <label class="form-label">ملاحظات</label>
              <textarea name="notes" rows="3" class="form-control" placeholder="اكتب ملاحظات المقيم..."></textarea>
            </div>

            <div class="col-12 d-flex gap-2 flex-wrap mt-1">
              <button class="btn-marsom primary" type="submit">
                <i class="fas fa-floppy-disk"></i> حفظ التقييم
              </button>
              <a class="btn-marsom" href="<?= base_url('CandidateEvaluations/search?q=' . urlencode($q)) ?>">
                <i class="fas fa-rotate-right"></i> تحديث القائمة
              </a>
            </div>
          </form>
        </div>

        <!-- Evaluations Table -->
        <div class="glass-card" data-aos="fade-up" data-aos-delay="240">
          <h5 class="mb-3" style="font-family:'El Messiri',serif;font-weight:900">
            <i class="fas fa-list-check"></i> التقييمات الحالية
          </h5>

          <div class="table-responsive">
            <table class="table table-bordered align-middle">
              <thead>
                <tr>
                  <th>#</th>
                  <th>المقيم</th>
                  <th>الدرجة</th>
                  <th>الحالة</th>
                  <th>الراتب المتوقع</th>
                  <th>ملاحظات</th>
                  <th>تاريخ الإضافة</th>
                  <th>تاريخ التقييم</th>
                  <th>أنشئ بواسطة</th>
                  <th style="width:170px">إجراء</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($evals)): ?>
                  <?php foreach ($evals as $e): ?>
                    <?php
                      $statusText = ($e->status === 'completed') ? 'تم التقييم' : 'انتظار';
                      $evaluatorLabel = trim(($e->evaluator_name ?? '')) !== ''
                        ? ($e->evaluator_name . ' (' . $e->evaluator_user_id . ')')
                        : (string)$e->evaluator_user_id;

                      $requestedLabel = trim(($e->requested_by_name ?? '')) !== ''
                        ? ($e->requested_by_name . ' (' . $e->requested_by . ')')
                        : (string)$e->requested_by;
                    ?>
                    <tr>
                      <td><?= (int)$e->id ?></td>
                      <td><?= html_escape($evaluatorLabel) ?></td>
                      <td><?= html_escape($e->score) ?></td>
                      <td><?= html_escape($statusText) ?></td>
                      <td><?= html_escape($e->recommended_salary) ?></td>
                      <td style="max-width:320px;white-space:normal"><?= nl2br(html_escape($e->notes)) ?></td>
                      <td><?= html_escape($e->created_at) ?></td>
                      <td><?= html_escape($e->completed_at) ?></td>
                      <td><?= html_escape($requestedLabel) ?></td>
                      <td>
                        <button type="button"
        class="btn btn-sm btn-outline-warning btn-edit-eval"
        data-bs-toggle="modal"
        data-bs-target="#editEvalModal"
        data-id="<?= (int)$e->id ?>"
        data-evaluator="<?= html_escape($e->evaluator_user_id) ?>"
        data-status="<?= html_escape($e->status) ?>"
        data-score="<?= html_escape($e->score) ?>"
        data-salary="<?= html_escape($e->recommended_salary) ?>"
        data-requested="<?= html_escape($e->requested_by) ?>"
        data-notes="<?= html_escape($e->notes) ?>">
  <i class="fas fa-pen"></i> تعديل
</button>


                        <form method="post" action="<?= base_url('CandidateEvaluations/delete/' . (int)$e->id) ?>"
                              style="display:inline-block" onsubmit="return confirm('هل أنت متأكد من حذف التقييم؟');">
                          <input type="hidden" name="return_q" value="<?= html_escape($q) ?>">
                          <button type="submit" class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i> حذف
                          </button>
                        </form>

 

                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="10" class="text-center">
                      لا توجد تقييمات مرتبطة بهذا Application ID.
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>

        </div>
      <?php endif; ?>

    </div>
  </div>
<div class="modal fade" id="editEvalModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title" style="font-family:'El Messiri',serif;font-weight:900">
          تعديل تقييم <span id="editEvalIdText"></span>
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <form method="post" id="editEvalForm" action="">
        <div class="modal-body">
          <input type="hidden" name="return_q" value="<?= html_escape($q ?? '') ?>">

          <div class="row g-2">
            <div class="col-md-4">
              <label class="form-label">رقم المقيم الوظيفي</label>
              <input type="text" name="evaluator_user_id" id="edit_evaluator" class="form-control" required>
            </div>

            <div class="col-md-4">
              <label class="form-label">الحالة</label>
              <select name="status" id="edit_status" class="form-select" required>
                <option value="pending">انتظار التقييم</option>
                <option value="completed">تم التقييم</option>
              </select>
            </div>

            <div class="col-md-4">
              <label class="form-label">الدرجة</label>
              <input type="number" step="0.01" name="score" id="edit_score" class="form-control">
            </div>

            <div class="col-md-4">
              <label class="form-label">الراتب المتوقع</label>
              <input type="number" step="0.01" name="recommended_salary" id="edit_salary" class="form-control">
            </div>

            <div class="col-md-4">
              <label class="form-label">requested_by</label>
              <input type="text" name="requested_by" id="edit_requested" class="form-control">
            </div>

            <div class="col-12">
              <label class="form-label">ملاحظات</label>
              <textarea name="notes" id="edit_notes" rows="4" class="form-control"></textarea>
            </div>

            <div class="col-12">
              <div class="hint">
                * عند تغيير الحالة إلى <b>تم التقييم</b> سيتم ضبط <b>completed_at</b> تلقائيًا (والعكس يمسحه).
              </div>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">إغلاق</button>
          <button type="submit" class="btn btn-warning">
            <i class="fas fa-save"></i> حفظ التعديل
          </button>
        </div>
      </form>

    </div>
  </div>
</div>

<script>
document.addEventListener('click', function(e){
  const btn = e.target.closest('.btn-edit-eval');
  if(!btn) return;

  const id = btn.getAttribute('data-id');

  // ضبط عنوان المودال + action الفورم
  document.getElementById('editEvalIdText').textContent = '#' + id;
  document.getElementById('editEvalForm').action = "<?= base_url('CandidateEvaluations/update/') ?>" + id;

  // تعبئة الحقول
  document.getElementById('edit_evaluator').value  = btn.getAttribute('data-evaluator') || '';
  document.getElementById('edit_status').value     = btn.getAttribute('data-status') || 'pending';
  document.getElementById('edit_score').value      = btn.getAttribute('data-score') || '';
  document.getElementById('edit_salary').value     = btn.getAttribute('data-salary') || '';
  document.getElementById('edit_requested').value  = btn.getAttribute('data-requested') || '';
  document.getElementById('edit_notes').value      = btn.getAttribute('data-notes') || '';
});
</script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init({ duration: 800, once: true, offset: 50, easing: 'ease-out-cubic' });</script>
</body>
</html>
