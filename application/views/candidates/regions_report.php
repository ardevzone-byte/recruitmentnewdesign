<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
.regions-report-embed { background: #f8fafc; padding: 0 0 2rem; }
.regions-report-embed .wrap { max-width: 1200px; margin: 0 auto; padding: 0 1rem; }
</style>
<div class="regions-report-embed">
<div class="wrap">

  <?php if (!empty($db_error)): ?>
    <div class="alert alert-warning mb-3" role="alert"><?= html_escape($db_error) ?></div>
  <?php endif; ?>

  <!-- Header -->
  <div class="glass mb-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
    <div>
      <h1 class="page-title">تقرير المرشحين حسب المناطق</h1>
      <div class="muted mt-1">
        إجمالي النتائج: <span class="badge badge-soft px-2 py-1"><?= (int)$total ?></span>
      </div>
    </div>

    <div class="d-flex gap-2 flex-wrap">
      <a class="btn-marsom" href="<?= site_url('Dashboard'); ?>">
        <i class="fa-solid fa-house"></i> الرئيسية
      </a>
      <a class="btn-marsom primary" href="<?= site_url('candidates/regions'); ?>">
        <i class="fa-solid fa-arrows-rotate"></i> تحديث
      </a>
    </div>
  </div>

  <!-- Filters -->
  <div class="glass mb-3">
    <form class="row g-2 align-items-end" method="get" action="<?= site_url('candidates/regions'); ?>">
      <div class="col-lg-3">
        <label class="fw-bold mb-1">بحث</label>
        <input type="text" name="q" class="form-control" placeholder="اسم/ايميل/جوال/شركة/جنسية..." value="<?= html_escape($filters['q'] ?? '') ?>">
      </div>

      <div class="col-lg-2">
        <label class="fw-bold mb-1">من تاريخ</label>
        <input type="date" name="date_from" class="form-control" value="<?= html_escape($filters['date_from'] ?? '') ?>">
      </div>

      <div class="col-lg-2">
        <label class="fw-bold mb-1">إلى تاريخ</label>
        <input type="date" name="date_to" class="form-control" value="<?= html_escape($filters['date_to'] ?? '') ?>">
      </div>

      <div class="col-lg-2">
        <label class="fw-bold mb-1">المنطقة</label>
        <select name="location" class="form-select">
          <option value="">الكل</option>
          <?php foreach(($allowed_locations ?? []) as $loc): ?>
            <option value="<?= html_escape($loc) ?>" <?= (($filters['location'] ?? '') === $loc ? 'selected' : '') ?>>
              <?= html_escape($loc) ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="col-lg-3 d-flex gap-2">
        <button class="btn-marsom primary w-100" type="submit">
          <i class="fa-solid fa-filter"></i> تطبيق الفلاتر
        </button>
        <a class="btn-marsom w-100" href="<?= site_url('candidates/regions'); ?>">
          <i class="fa-solid fa-eraser"></i> تصفير
        </a>
      </div>
    </form>
  </div>

  <!-- Dashboard -->
  <div class="glass mb-3">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
      <h5 class="mb-0 fw-bold"><i class="fa-solid fa-chart-pie me-1"></i> داشبورد سريع</h5>
      <div class="muted">يعتمد على نفس الفلاتر الحالية</div>
    </div>

    <div class="stat-grid mb-3">
      <?php if(!empty($stats_by_location)): ?>
        <?php foreach($stats_by_location as $k => $v): ?>
          <div class="stat-card">
            <div class="stat-top">
              <div class="stat-name"><i class="fa-solid fa-location-dot me-1"></i> <?= html_escape($k) ?></div>
              <div class="stat-num"><?= (int)$v ?></div>
            </div>
            <div class="muted mt-1">عدد المرشحين في هذه المنطقة</div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="stat-card">
          <div class="stat-top">
            <div class="stat-name">لا توجد بيانات</div>
            <div class="stat-num">0</div>
          </div>
          <div class="muted mt-1">جرّب تغيير الفلاتر</div>
        </div>
      <?php endif; ?>
    </div>

    <div class="row g-2">
      <div class="col-lg-6">
        <div class="stat-card h-100">
          <div class="fw-bold mb-2"><i class="fa-solid fa-flag me-1"></i> أعلى الجنسيات</div>
          <div class="d-flex flex-wrap gap-2">
            <?php if(!empty($stats_by_nationality)): ?>
              <?php foreach($stats_by_nationality as $r): ?>
                <?php $name = trim((string)($r['nationality'] ?? '')) ?: 'غير محدد'; ?>
                <span class="badge badge-soft px-2 py-2">
                  <?= html_escape($name) ?>: <?= (int)$r['cnt'] ?>
                </span>
              <?php endforeach; ?>
            <?php else: ?>
              <span class="muted">لا توجد نتائج</span>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="stat-card h-100">
          <div class="fw-bold mb-2"><i class="fa-solid fa-building me-1"></i> أعلى الشركات</div>
          <div class="d-flex flex-wrap gap-2">
            <?php if(!empty($stats_by_company)): ?>
              <?php foreach($stats_by_company as $r): ?>
                <?php $name = trim((string)($r['company'] ?? '')) ?: 'غير محدد'; ?>
                <span class="badge badge-soft px-2 py-2">
                  <?= html_escape($name) ?>: <?= (int)$r['cnt'] ?>
                </span>
              <?php endforeach; ?>
            <?php else: ?>
              <span class="muted">لا توجد نتائج</span>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Table -->
  <div class="glass">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-2">
      <h5 class="mb-0 fw-bold"><i class="fa-solid fa-table me-1"></i> التفاصيل</h5>
      <div class="muted">اضغط “تعديل” لتغيير كل بيانات المرشح من نفس الصفحة</div>
    </div>

    <div class="table-responsive">
      <table class="table table-bordered align-middle mb-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>الاسم</th>
            <th>الإيميل</th>
            <th>الجوال</th>
            <th>المنطقة</th>
            <th>الشركة</th>
            <th>الجنسية</th>
            <th>الحالة الاجتماعية</th>
            <th>تاريخ الإنشاء</th>
            <th>CV</th>
            <th>إجراء</th>
          </tr>
        </thead>
        <tbody>
        <?php if(!empty($rows)): ?>
          <?php foreach($rows as $row): ?>
            <?php
              $cv = trim((string)($row['cv_file'] ?? ''));
              $cv_url = $cv ? base_url('assets/cvs/' . rawurlencode($cv)) : '';
            ?>
            <tr>
              <td class="fw-bold"><?= (int)$row['id'] ?></td>
              <td><?= html_escape($row['full_name'] ?? '') ?></td>
              <td><?= html_escape($row['email'] ?? '') ?></td>
              <td><?= html_escape($row['phone'] ?? '') ?></td>
              <td><span class="badge badge-soft px-2 py-2"><?= html_escape($row['work_location'] ?? '') ?></span></td>
              <td><?= html_escape($row['company'] ?? '') ?></td>
              <td><?= html_escape($row['nationality'] ?? '') ?></td>
              <td><?= html_escape($row['marital_status'] ?? '') ?></td>
              <td><?= html_escape($row['created_at'] ?? '') ?></td>
              <td>
                <?php if($cv_url): ?>
                  <a class="link-file" target="_blank" href="<?= $cv_url ?>">
                    <i class="fa-solid fa-file-arrow-down me-1"></i> عرض
                  </a>
                <?php else: ?>
                  <span class="muted">—</span>
                <?php endif; ?>
              </td>
              <td>
                <button
                  type="button"
                  class="btn-marsom primary btn-sm"
                  onclick="openEditModal(<?= (int)$row['id'] ?>, this)"
                  data-row='<?= html_escape(json_encode($row, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES)) ?>'>
                  <i class="fa-solid fa-pen-to-square"></i> تعديل
                </button>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr><td colspan="11" class="text-center muted">لا توجد نتائج</td></tr>
        <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fw-bold"><i class="fa-solid fa-user-pen me-1"></i> تعديل بيانات المرشح</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div id="msgBox" class="alert d-none" role="alert"></div>

        <form id="editForm" onsubmit="return submitEdit(event)">
          <input type="hidden" id="edit_id" value="">

          <div class="row g-2">
            <div class="col-md-6">
              <label class="fw-bold mb-1">الاسم</label>
              <input type="text" class="form-control" id="full_name" required>
            </div>
            <div class="col-md-6">
              <label class="fw-bold mb-1">البريد الإلكتروني</label>
              <input type="email" class="form-control" id="email">
            </div>

            <div class="col-md-6">
              <label class="fw-bold mb-1">رقم الجوال</label>
              <input type="text" class="form-control" id="phone">
            </div>
            <div class="col-md-6">
              <label class="fw-bold mb-1">ملف السيرة (اسم الملف فقط)</label>
              <input type="text" class="form-control" id="cv_file" placeholder="example.pdf">
              <div class="muted mt-1">المسار: assets/cvs/</div>
            </div>

            <div class="col-md-4">
              <label class="fw-bold mb-1">المنطقة (إجباري)</label>
              <select class="form-select" id="work_location" required>
                <?php foreach(($allowed_locations ?? []) as $loc): ?>
                  <option value="<?= html_escape($loc) ?>"><?= html_escape($loc) ?></option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="col-md-4">
              <label class="fw-bold mb-1">الجنسية</label>
              <input type="text" class="form-control" id="nationality">
            </div>

            <div class="col-md-4">
              <label class="fw-bold mb-1">الحالة الاجتماعية</label>
              <input type="text" class="form-control" id="marital_status">
            </div>

            <div class="col-md-12">
              <label class="fw-bold mb-1">الشركة (إجباري)</label>
              <select class="form-select" id="company" required>
                <?php foreach(($allowed_companies ?? []) as $c): ?>
                  <option value="<?= html_escape($c) ?>"><?= html_escape($c) ?></option>
                <?php endforeach; ?>
              </select>
            </div>

          </div>

          <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn-marsom primary w-100" id="btnSave">
              <i class="fa-solid fa-floppy-disk"></i> حفظ التعديلات
            </button>
            <button type="button" class="btn-marsom w-100" data-bs-dismiss="modal">
              <i class="fa-solid fa-xmark"></i> إغلاق
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<script>
  const editModal = new bootstrap.Modal(document.getElementById('editModal'));
  const msgBox = document.getElementById('msgBox');
  const allowedLocations = <?= json_encode($allowed_locations ?? [], JSON_UNESCAPED_UNICODE) ?>;

  function openEditModal(id, btn){
    const row = JSON.parse(btn.getAttribute('data-row') || '{}');

    document.getElementById('edit_id').value = id;
    document.getElementById('full_name').value = row.full_name || '';
    document.getElementById('email').value = row.email || '';
    document.getElementById('phone').value = row.phone || '';
    document.getElementById('cv_file').value = row.cv_file || '';
    document.getElementById('nationality').value = row.nationality || '';
    document.getElementById('marital_status').value = row.marital_status || '';
    const compSel = document.getElementById('company');
const compVal = (row.company || '').trim();
const allowedCompanies = <?= json_encode($allowed_companies ?? [], JSON_UNESCAPED_UNICODE) ?>;

if (allowedCompanies.includes(compVal)) compSel.value = compVal;
else compSel.selectedIndex = 0;


    // work_location ضبطها على خيار من القائمة، وإن كانت غير موجودة اختر أول خيار
    const wl = (row.work_location || '').trim();
    const select = document.getElementById('work_location');
    if(allowedLocations.includes(wl)) select.value = wl;
    else select.selectedIndex = 0;

    hideMsg();
    editModal.show();
  }

  function showMsg(type, text){
    msgBox.classList.remove('d-none','alert-success','alert-danger','alert-warning');
    msgBox.classList.add(type === 'success' ? 'alert-success' : 'alert-danger');
    msgBox.innerText = text;
  }
  function hideMsg(){
    msgBox.classList.add('d-none');
    msgBox.innerText = '';
  }

  async function submitEdit(e){
    e.preventDefault();

    const id = document.getElementById('edit_id').value;
    const payload = new URLSearchParams();
    payload.append('full_name', document.getElementById('full_name').value.trim());
    payload.append('email', document.getElementById('email').value.trim());
    payload.append('phone', document.getElementById('phone').value.trim());
    payload.append('cv_file', document.getElementById('cv_file').value.trim());
    payload.append('nationality', document.getElementById('nationality').value.trim());
    payload.append('marital_status', document.getElementById('marital_status').value.trim());
    payload.append('work_location', document.getElementById('work_location').value.trim());
    payload.append('company', document.getElementById('company').value.trim());


    const btn = document.getElementById('btnSave');
    btn.disabled = true;
    btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> جاري الحفظ...';

    try{
      const res = await fetch("<?= site_url('candidates/regions/update'); ?>/" + id, {
        method: "POST",
        headers: { "Content-Type":"application/x-www-form-urlencoded; charset=UTF-8" },
        body: payload.toString()
      });

      const data = await res.json();
      if(data.ok){
        showMsg('success', data.msg || 'تم الحفظ');
        // تحديث الصفحة بعد ثواني بسيطة عشان يعكس التغيير بالجدول والداشبورد
        setTimeout(()=> window.location.reload(), 700);
      }else{
        showMsg('danger', data.msg || 'فشل التحديث');
        btn.disabled = false;
        btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> حفظ التعديلات';
      }
    }catch(err){
      showMsg('danger', 'حدث خطأ أثناء الاتصال بالخادم');
      btn.disabled = false;
      btn.innerHTML = '<i class="fa-solid fa-floppy-disk"></i> حفظ التعديلات';
    }

    return false;
  }
</script>
</div>
