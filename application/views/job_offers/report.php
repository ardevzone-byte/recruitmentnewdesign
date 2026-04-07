<?php defined('BASEPATH') OR exit('No direct script access allowed');
$__embed = !empty($embed_shell);
?>
<?php if (!$__embed): ?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= html_escape($title ?? 'تقرير العروض الوظيفية') ?></title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
  <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;600;800&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<?php else: ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
<link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;600;800&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<div class="rows col-12 jobs-dashboard recruitment-page job-offers-report-host py-2">
<?php endif; ?>

  <style>
    :root{
      --primary-blue:#001f3f; --primary-orange:#FF8C00;
      --dark-bg:#0d1b2a; --darker-bg:#0a1929;
      --glass-bg: rgba(255,255,255,.05);
      --glass-border: rgba(255,255,255,.10);
      --text-muted: rgba(255,255,255,.68);
      --radius-xxl: 24px; --radius-xl: 18px;
      --shadow-sm: 0 10px 25px rgba(0,0,0,.20);
      --shadow-lg: 0 20px 40px rgba(0,0,0,.40);
    }

    *{box-sizing:border-box}
    html, body{height:100%}
    body{
      font-family:'Tajawal', sans-serif;
      background: linear-gradient(135deg, var(--darker-bg) 0%, var(--primary-blue) 30%, #1a1a2e 70%, var(--dark-bg) 100%);
      color:#fff;
      margin:0;
      /* ✅ لا نخفي السكرول على body — السكرول داخل الجدول */
      overflow:hidden;
    }

    .bg-pattern{
      position:fixed; inset:0; z-index:-2;
      background-image:
        radial-gradient(circle at 10% 20%, rgba(255,140,0,.05) 0%, transparent 20%),
        radial-gradient(circle at 90% 80%, rgba(0,31,63,.05) 0%, transparent 20%),
        linear-gradient(45deg, transparent 48%, rgba(255,140,0,.03) 50%, transparent 52%),
        linear-gradient(-45deg, transparent 48%, rgba(0,31,63,.03) 50%, transparent 52%);
      background-size: 400px 400px, 400px 400px, 100px 100px, 100px 100px;
      animation: patternMove 20s linear infinite;
    }
    @keyframes patternMove{
      0%{background-position:0 0,0 0,0 0,0 0}
      100%{background-position:400px 400px,400px 400px,100px 100px,100px 100px}
    }

    .wrap{
      height:100vh;
      width:100%;
      padding:12px;
      display:flex;
      flex-direction:column;
      gap:12px;
    }
    .job-offers-report-host .wrap{
      height:auto;
      min-height:420px;
      overflow:visible;
    }

    .header-nav{
      background: rgba(255,255,255,.03);
      border: 1px solid var(--glass-border);
      border-radius: var(--radius-xxl);
      box-shadow: 0 8px 32px rgba(0,0,0,.28);
      backdrop-filter: blur(20px);
      padding: 14px 16px;
      display:flex; justify-content:space-between; align-items:center; gap:12px;
      position:relative; overflow:hidden;
      flex: 0 0 auto;
    }
    .header-nav::before{
      content:''; position:absolute; top:0; left:0; right:0; height:2px;
      background: linear-gradient(90deg, transparent, var(--primary-orange), transparent);
    }
    .title-box h1{
      font-family:'El Messiri', serif;
      font-size: 1.55rem;
      font-weight: 900;
      margin:0;
      background: linear-gradient(135deg, #ffffff, #ffd166);
      -webkit-background-clip:text; -webkit-text-fill-color:transparent;
    }
    .title-box p{margin:6px 0 0; color: var(--text-muted); font-size:.95rem;}

    .btn-marsom{
      border: 1px solid rgba(255,255,255,.18);
      background: rgba(255,255,255,.06);
      color:#fff;
      border-radius: 14px;
      padding: 10px 14px;
      font-weight: 900;
      text-decoration:none;
      display:inline-flex;
      align-items:center;
      gap:10px;
      transition: all .2s ease;
      white-space:nowrap;
    }
    .btn-marsom:hover{
      transform: translateY(-2px);
      border-color: rgba(255,140,0,.55);
      box-shadow: 0 10px 22px rgba(255,140,0,.14);
      color:#fff;
    }
    .btn-marsom.primary{
      background: linear-gradient(135deg, rgba(255,140,0,.22), rgba(255,140,0,.10));
      border-color: rgba(255,140,0,.35);
    }

    .section{
      background: var(--glass-bg);
      border: 1px solid var(--glass-border);
      border-radius: var(--radius-xxl);
      backdrop-filter: blur(18px);
      box-shadow: var(--shadow-sm);
      padding: 14px;
      position:relative;
      overflow:hidden;

      /* ✅ هذا أهم سطرين لعودة سكرول الجدول */
      flex: 1 1 auto;
      min-height: 0;

      display:flex;
      flex-direction:column;
      gap: 12px;
    }
    .section::before{
      content:'';
      position:absolute; top:0; left:0; right:0;
      height:3px;
      background: linear-gradient(90deg, var(--primary-orange), var(--primary-blue));
      opacity:.9;
    }

    /* Dashboard */
    .kpi-grid{
      display:grid;
      grid-template-columns: repeat(auto-fit, minmax(210px, 1fr));
      gap: 12px;
      flex: 0 0 auto;
    }
    .kpi{
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.12);
      border-radius: var(--radius-xl);
      padding: 12px 14px;
      box-shadow: 0 10px 25px rgba(0,0,0,.14);
      position:relative; overflow:hidden;
    }
    .kpi:after{
      content:''; position:absolute; bottom:0; left:0; right:0; height:3px;
      background: linear-gradient(90deg, var(--primary-orange), var(--primary-blue));
      opacity:.8;
    }
    .kpi .label{color: rgba(255,255,255,.65); font-weight: 900; font-size: .92rem; display:flex; align-items:center; gap:8px;}
    .kpi .value{margin-top:6px; font-family:'El Messiri', serif; font-weight: 900; font-size: 1.35rem;}

    /* ✅ Filters (مضمونة) */
    .filters{
      display:flex;
      gap:10px;
      align-items:center;
      flex-wrap:wrap;
      flex: 0 0 auto;
    }
    .filters .form-control, .filters .form-select{
      background: rgba(0,0,0,.18);
      border: 1px solid rgba(255,255,255,.12);
      color:#fff;
      border-radius: 14px;
      height: 42px;
    }
    .filters .form-control::placeholder{color: rgba(255,255,255,.55)}
    .filters .form-select option{color:#000}

    /* ✅ Table area scroll */
    .table-wrap{
      flex: 1 1 auto;
      min-height: 0;
      overflow:hidden;
      border-radius: var(--radius-xxl);
      border: 1px solid rgba(255,255,255,.10);
      background: rgba(0,0,0,.18);
    }
    .table-responsive{
      height:100%;
      overflow:auto; /* ✅ هنا السكرول */
    }

    /* scrollbar (اختياري) */
    .table-responsive::-webkit-scrollbar{width:10px;height:10px}
    .table-responsive::-webkit-scrollbar-thumb{background: rgba(255,255,255,.18); border-radius: 10px}
    .table-responsive::-webkit-scrollbar-track{background: rgba(0,0,0,.15)}

    .table{
      color:#fff !important;
      background: transparent !important;
      margin:0 !important;
    }
    .table thead th{
      background: rgba(255,255,255,.06) !important;
      color:#fff !important;
      border-color: rgba(255,255,255,.10) !important;
      font-weight: 900;
      white-space:nowrap;
      position: sticky;
      top: 0;
      z-index: 5;
    }
    .table tbody tr{background: rgba(0,0,0,.14) !important;}
    .table tbody td{
      background: transparent !important;
      color:#fff !important;
      border-color: rgba(255,255,255,.08) !important;
      vertical-align: middle;
      white-space:nowrap;
    }
    .table-hover tbody tr:hover{background: rgba(255,140,0,.12) !important;}

    .pill{
      display:inline-flex; align-items:center; gap:8px;
      padding: 6px 10px;
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.06);
      font-weight: 900;
      font-size: .88rem;
    }

    .editable{
      cursor:pointer;
      padding: 6px 10px;
      border-radius: 12px;
      display:inline-block;
      background: rgba(255,255,255,.06);
      border: 1px dashed rgba(255,255,255,.22);
      transition:.2s;
      color:#fff;
      min-width: 110px;
      text-align:center;
    }
    .editable:hover{border-color: rgba(255,140,0,.55); transform: translateY(-1px);}
    .editable[data-empty="1"]{opacity:.65}

    /* Modal */
    .modal-content{
      background: rgba(5,10,18,.85);
      border: 1px solid rgba(255,255,255,.14);
      backdrop-filter: blur(18px);
      border-radius: 20px;
      color:#fff;
    }
    .modal-header{border-bottom: 1px solid rgba(255,255,255,.10);}
    .modal-footer{border-top: 1px solid rgba(255,255,255,.10);}
    .detail-grid{
      display:grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 12px;
    }
    .detail-item{
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.10);
      border-radius: 16px;
      padding: 12px;
    }
    .detail-item .k{color:rgba(255,255,255,.65); font-weight:900; font-size:.9rem}
    .detail-item .v{margin-top:6px}

    /* Toast */
    .toastx{
      position:fixed; bottom:18px; right:18px;
      width:min(420px, calc(100% - 36px));
      z-index:9999; display:none;
      background: rgba(0,0,0,.40);
      border:1px solid rgba(255,255,255,.14);
      backdrop-filter: blur(12px);
      border-radius: 18px;
      padding: 12px 14px;
      box-shadow: var(--shadow-lg);
    }
    .toastx.show{display:block; animation: pop .2s ease-out}
    @keyframes pop{from{transform:translateY(10px);opacity:0}to{transform:translateY(0);opacity:1}}
  </style>
<?php if (!$__embed): ?>
</head>

<body>
  <div class="bg-pattern"></div>
<?php endif; ?>

  <div class="wrap">

    <!-- Header -->
    <div class="header-nav" data-aos="fade-down" data-aos-duration="800">
      <div class="title-box">
        <h1>تقرير العروض الوظيفية</h1>
        <p>بحث + فلاتر + جدول مختصر + تفاصيل داخل نافذة (Modal)</p>
      </div>

      <div class="header-actions d-flex gap-2 flex-wrap">
        <a class="btn-marsom" href="<?= site_url('dashboard'); ?>">
          <i class="fas fa-house"></i> الرئيسية
        </a>
        <a class="btn-marsom primary" href="<?= site_url('JobOffersReport'); ?>">
          <i class="fas fa-rotate"></i> تحديث
        </a>
      </div>
    </div>

    <?php
      $areas = ['أبها','الرياض','الخبر','حائل'];
      $statuses = ['Sent','Accepted','Rejected'];

      $byAreaMap = [];
      foreach(($stats['by_area'] ?? []) as $r){ $byAreaMap[$r['area']] = (int)$r['cnt']; }
      $byStatusMap = [];
      foreach(($stats['by_status'] ?? []) as $r){ $byStatusMap[$r['status']] = (int)$r['cnt']; }
    ?>

    <!-- Main -->
    <div class="section" data-aos="fade-up" data-aos-delay="80">

      <!-- Dashboard -->
      <div class="kpi-grid" data-aos="fade-up" data-aos-delay="110">
        <div class="kpi">
          <div class="label"><i class="fas fa-layer-group"></i> إجمالي العروض</div>
          <div class="value"><?= (int)($stats['total'] ?? 0) ?></div>
        </div>

        <?php foreach($areas as $a): ?>
          <div class="kpi">
            <div class="label"><i class="fas fa-location-dot"></i> <?= html_escape($a) ?></div>
            <div class="value"><?= (int)($byAreaMap[$a] ?? 0) ?></div>
          </div>
        <?php endforeach; ?>

        <?php foreach($statuses as $s): ?>
          <div class="kpi">
            <div class="label"><i class="fas fa-flag"></i> <?= html_escape($s) ?></div>
            <div class="value"><?= (int)($byStatusMap[$s] ?? 0) ?></div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- ✅ Filters (مضمونة + Enter يعمل) -->
      <form class="filters" method="get" action="<?= site_url('JobOffersReport'); ?>" data-aos="fade-up" data-aos-delay="130">
        <input class="form-control" style="min-width:340px"
       type="text" name="q" id="liveSearch"
       placeholder="بحث بالاسم / الرقم الوظيفي / الهوية"
       value="<?= html_escape($filters['q'] ?? '') ?>"
       data-url="<?= site_url('JobOffersReport/ajax_list'); ?>">


        <select class="form-select" style="min-width:190px" name="area">
          <option value="">كل المناطق</option>
          <?php foreach($areas as $a): ?>
            <option value="<?= html_escape($a) ?>" <?= (($filters['area'] ?? '') === $a) ? 'selected' : '' ?>>
              <?= html_escape($a) ?>
            </option>
          <?php endforeach; ?>
        </select>

        <select class="form-select" style="min-width:190px" name="status">
          <option value="">كل الحالات</option>
          <?php foreach($statuses as $s): ?>
            <option value="<?= html_escape($s) ?>" <?= (($filters['status'] ?? '') === $s) ? 'selected' : '' ?>>
              <?= html_escape($s) ?>
            </option>
          <?php endforeach; ?>
        </select>

        <button class="btn-marsom primary" type="submit">
          <i class="fas fa-filter"></i> تطبيق
        </button>

        <a class="btn-marsom" href="<?= site_url('JobOffersReport'); ?>">
          <i class="fas fa-xmark"></i> مسح
        </a>
      </form>

      <!-- Table -->
      <div class="table-wrap" data-aos="fade-up" data-aos-delay="170">
        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0">
            <thead>
              <tr>
                <th style="min-width:90px">#</th>
                <th style="min-width:360px">اسم المرشح</th>
                <th style="min-width:180px">الرقم الوظيفي</th>
                <th style="min-width:180px">إجمالي الراتب</th>
                <th style="min-width:160px">المنطقة</th>
                <th style="min-width:200px">تفاصيل</th>
              </tr>
            </thead>
            <tbody id="offersTbody">
              <?php if(empty($offers)): ?>
                <tr>
                  <td colspan="6" class="text-center py-4" style="color:rgba(255,255,255,.75)">
                    لا توجد بيانات مطابقة
                  </td>
                </tr>
              <?php else: ?>
                <?php foreach($offers as $row): ?>
                  <tr>
                    <td><span class="pill"><i class="fas fa-hashtag"></i><?= (int)$row['id'] ?></span></td>

                    <td>
                      <div style="min-width:340px">
                        <div style="font-weight:900"><?= html_escape($row['full_name'] ?? '-') ?></div>
                        <div style="color:rgba(255,255,255,.6);font-size:.85rem">
                          Candidate ID: <?= (int)($row['candidate_id'] ?? 0) ?>
                        </div>
                      </div>
                    </td>

                    <td>
                      <span class="editable"
                            data-id="<?= (int)$row['id'] ?>"
                            data-field="employee_id"
                            data-type="text"
                            data-placeholder="0000"
                            data-empty="<?= empty($row['employee_id']) ? 1 : 0 ?>">
                        <?= html_escape($row['employee_id'] ?: '—') ?>
                      </span>
                    </td>

                    <td>
                      <span class="editable"
                            data-id="<?= (int)$row['id'] ?>"
                            data-field="total_salary"
                            data-type="number"
                            data-placeholder="0"
                            data-empty="<?= empty($row['total_salary']) ? 1 : 0 ?>">
                        <?= html_escape(($row['total_salary'] ?? '') !== '' ? $row['total_salary'] : '0') ?>
                      </span>
                    </td>

                    <td>
                      <span class="editable"
                            data-id="<?= (int)$row['id'] ?>"
                            data-field="area"
                            data-type="select"
                            data-options='["أبها","الرياض","الخبر","حائل"]'
                            data-empty="<?= empty($row['area']) ? 1 : 0 ?>">
                        <?= html_escape($row['area'] ?: '—') ?>
                      </span>
                    </td>

                    <td class="d-flex gap-2 flex-wrap">
                      <button type="button"
                              class="btn-marsom primary"
                              style="padding:8px 12px"
                              data-bs-toggle="modal"
                              data-bs-target="#offerModal"
                              onclick="openOfferModal(<?= (int)$row['id'] ?>)">
                        <i class="fas fa-list-check"></i> تفاصيل
                      </button>

                      <a class="btn-marsom" style="padding:8px 12px"
                         target="_blank"
                         href="<?= site_url('offers/view/' . (int)$row['id']); ?>">
                        <i class="fas fa-up-right-from-square"></i>
                      </a>
                    </td>

                    <script type="application/json" id="rowdata-<?= (int)$row['id'] ?>">
                      <?= json_encode($row, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES); ?>
                    </script>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="offerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <div>
            <h5 class="modal-title" style="font-weight:900">تفاصيل العرض الوظيفي</h5>
            <div style="color:rgba(255,255,255,.65);font-size:.9rem" id="modalSub">—</div>
          </div>
          <button type="button" class="btn-close btn-close-white ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="detail-grid" id="detailGrid"></div>
        </div>

        <div class="modal-footer d-flex justify-content-between">
          <a id="openExternal" class="btn-marsom" target="_blank" href="#">
            <i class="fas fa-up-right-from-square"></i> فتح صفحة العرض
          </a>
          <button type="button" class="btn-marsom primary" data-bs-dismiss="modal">
            <i class="fas fa-check"></i> تم
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Toast -->
  <div class="toastx" id="toastx">
    <div style="display:flex;align-items:center;gap:10px">
      <div id="toastIcon"><i class="fas fa-circle-info"></i></div>
      <div>
        <div style="font-weight:900" id="toastTitle">تنبيه</div>
        <div style="color:rgba(255,255,255,.75)" id="toastMsg">...</div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

  <script>
    AOS.init({ duration: 800, once: true, offset: 50, easing: 'ease-out-cubic' });

    const updateUrl = "<?= site_url('JobOffersReport/update_field'); ?>";
    const offersViewBase = "<?= site_url('offers/view/'); ?>";

    function toast(type, msg){
      const el = document.getElementById('toastx');
      const icon = document.getElementById('toastIcon');
      const title = document.getElementById('toastTitle');
      const m = document.getElementById('toastMsg');

      if(type === 'success'){
        icon.innerHTML = '<i class="fas fa-circle-check"></i>';
        title.textContent = 'تم';
      }else{
        icon.innerHTML = '<i class="fas fa-triangle-exclamation"></i>';
        title.textContent = 'تنبيه';
      }
      m.textContent = msg;

      el.classList.add('show');
      clearTimeout(window.__t);
      window.__t = setTimeout(()=> el.classList.remove('show'), 2600);
    }

    async function saveField(id, field, value){
      const form = new FormData();
      form.append('id', id);
      form.append('field', field);
      form.append('value', value);

      const res = await fetch(updateUrl, {
        method: 'POST',
        body: form,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      });
      return await res.json();
    }

    function createInlineInput(el){
      const type = el.dataset.type || 'text';
      const oldVal = (el.textContent || '').trim();
      const placeholder = el.dataset.placeholder || '';
      let input;

      if(type === 'select'){
        input = document.createElement('select');
        input.className = 'form-select form-select-sm';
        input.style.background = 'rgba(0,0,0,.22)';
        input.style.borderColor = 'rgba(255,255,255,.18)';
        input.style.color = '#fff';

        const options = JSON.parse(el.dataset.options || '[]');
        const opt0 = document.createElement('option');
        opt0.value = '';
        opt0.textContent = '—';
        input.appendChild(opt0);

        options.forEach(v=>{
          const o = document.createElement('option');
          o.value = v;
          o.textContent = v;
          input.appendChild(o);
        });

        input.value = (oldVal === '—') ? '' : oldVal;

      } else {
        input = document.createElement('input');
        input.type = 'text';
        input.className = 'form-control form-control-sm';
        input.placeholder = placeholder;
        input.value = (oldVal === '—') ? '' : oldVal;
        input.style.background = 'rgba(0,0,0,.22)';
        input.style.borderColor = 'rgba(255,255,255,.18)';
        input.style.color = '#fff';
      }

      input.dataset.old = input.value;
      return input;
    }

    document.addEventListener('click', async (e)=>{
      const el = e.target.closest('.editable');
      if(!el) return;

      if(el.dataset.editing === '1') return;
      el.dataset.editing = '1';

      const id = el.dataset.id;
      const field = el.dataset.field;

      const input = createInlineInput(el);
      const originalHTML = el.innerHTML;

      el.innerHTML = '';
      el.appendChild(input);
      input.focus();
      input.select && input.select();

      const finish = async (commit)=>{
        const newVal = (input.value || '').trim();
        const oldVal = (input.dataset.old || '').trim();

        el.dataset.editing = '0';

        if(!commit){ el.innerHTML = originalHTML; return; }
        if(newVal === oldVal){ el.innerHTML = originalHTML; return; }

        if(field === 'employee_id' && newVal !== '' && !/^\d{4}$/.test(newVal)){
          toast('error', 'الرقم الوظيفي يجب أن يكون 4 أرقام');
          el.innerHTML = originalHTML;
          return;
        }
        if(field === 'id_number' && newVal !== '' && !/^\d{10}$/.test(newVal)){
          toast('error', 'رقم الهوية يجب أن يكون 10 أرقام');
          el.innerHTML = originalHTML;
          return;
        }

        try{
          const out = await saveField(id, field, newVal);
 if(out && out.ok){
  const showVal = (newVal === '') ? '—' : newVal;
  el.textContent = showVal;
  el.dataset.empty = (newVal === '') ? '1' : '0';
  toast('success', out.msg || 'تم التحديث');

  // ✅ تحديث نفس الحقل في أي مكان (جدول + مودال)
  document.querySelectorAll(`.editable[data-id="${id}"][data-field="${field}"]`).forEach(x=>{
    if(x !== el){
      x.textContent = showVal;
      x.dataset.empty = (newVal === '') ? '1' : '0';
    }
  });

  // ✅ لو السيرفر رجع حقول إضافية (مثل supervisor_name / project_name) حدثها فورًا
  if(out.extra){
    Object.keys(out.extra).forEach(f=>{
      const v = (out.extra[f] === '' || out.extra[f] === null) ? '—' : out.extra[f];
      document.querySelectorAll(`.editable[data-id="${id}"][data-field="${f}"]`).forEach(x=>{
        x.textContent = v;
        x.dataset.empty = (v === '—') ? '1' : '0';
      });
    });
  }

}else{
            el.innerHTML = originalHTML;
            toast('error', (out && out.msg) ? out.msg : 'فشل التحديث');
          }
        }catch(err){
          el.innerHTML = originalHTML;
          toast('error', 'تعذر الاتصال بالسيرفر');
        }
      };

      input.addEventListener('keydown', (ev)=>{
        if(ev.key === 'Enter') finish(true);
        if(ev.key === 'Escape') finish(false);
      });
      input.addEventListener('blur', ()=> finish(true));
    });

    function openOfferModal(id){
      const node = document.getElementById('rowdata-' + id);
      if(!node) return;

      let row = {};
      try{ row = JSON.parse(node.textContent || '{}'); }catch(e){ row = {}; }

      const fullName = row.full_name || '-';
      const emp = row.employee_id || '—';
      document.getElementById('modalSub').textContent = `#${id} — ${fullName} — الموظف: ${emp}`;
      document.getElementById('openExternal').href = offersViewBase + id;

      const fields = [
        {k:'اسم المرشح', v: escapeHtml(fullName), editable:false},

        {k:'employee_id (الرقم الوظيفي)', field:'employee_id', type:'text', placeholder:'0000'},
        {k:'id_number (رقم الهوية)', field:'id_number', type:'text', placeholder:'10 digits'},

        {k:'basic_salary (الراتب الأساسي)', field:'basic_salary', type:'number', placeholder:'0'},
        {k:'housing_allowance (بدل السكن)', field:'housing_allowance', type:'number', placeholder:'0'},
        {k:'transport_allowance (بدل المواصلات)', field:'transport_allowance', type:'number', placeholder:'0'},
        {k:'communication_allowance (بدل الاتصالات)', field:'communication_allowance', type:'number', placeholder:'0'},
        {k:'total_salary (إجمالي الراتب)', field:'total_salary', type:'number', placeholder:'0'},

        {k:'start_date (تاريخ المباشرة)', field:'start_date', type:'date', placeholder:'YYYY-MM-DD'},

        {k:'status (حالة العرض)', field:'status', type:'select', options:['Sent','Accepted','Rejected']},
        {k:'docs_status (استكمال المستندات)', field:'docs_status', type:'text', placeholder:'مكتمل/ناقص'},
        {k:'hr_status (موافقة الموارد البشرية)', field:'hr_status', type:'text', placeholder:'موافق/مرفوض'},
        {k:'candidate_response (رد المرشح)', field:'candidate_response', type:'text', placeholder:'موافق/اعتذار'},

        {k:'area (المنطقة)', field:'area', type:'select', options:['أبها','الرياض','الخبر','حائل']},
        { k:'رقم المشرف المباشر', field:'supervisor_empno', type:'text', placeholder:'0000' },
{ k:'اسم المشرف', field:'supervisor_name', type:'text', placeholder:'اسم المشرف' },
{ k:'كود المشروع', field:'project_code', type:'text', placeholder:'مثال: 3' },
{ k:'اسم المشروع', field:'project_name', type:'text', placeholder:'اسم المشروع' },

      ];

      const grid = document.getElementById('detailGrid');
      grid.innerHTML = '';

      fields.forEach(item=>{
        const box = document.createElement('div');
        box.className = 'detail-item';

        const key = document.createElement('div');
        key.className = 'k';
        key.textContent = item.k;

        const val = document.createElement('div');
        val.className = 'v';

        if(item.editable === false){
          val.innerHTML = `<div style="font-weight:900">${item.v}</div>`;
        } else {
          const span = document.createElement('span');
          span.className = 'editable';
          span.dataset.id = id;
          span.dataset.field = item.field;
          span.dataset.type = item.type || 'text';
          span.dataset.placeholder = item.placeholder || '';

          if(item.type === 'select'){
            span.dataset.options = JSON.stringify(item.options || []);
          }

          const raw = (row[item.field] ?? '');
          const showVal = (raw === null || raw === '') ? '—' : String(raw);
          span.textContent = showVal;
          span.dataset.empty = (showVal === '—') ? '1' : '0';

          val.appendChild(span);
        }

        box.appendChild(key);
        box.appendChild(val);
        grid.appendChild(box);
      });
    }

    function escapeHtml(str){
      return String(str)
        .replaceAll('&','&amp;')
        .replaceAll('<','&lt;')
        .replaceAll('>','&gt;')
        .replaceAll('"','&quot;')
        .replaceAll("'","&#039;");
    }
  </script>

  <script>
  // ✅ Live Search + Live Filters
  const liveInput  = document.getElementById('liveSearch');
  const tbody      = document.getElementById('offersTbody');
  const areaSel    = document.querySelector('select[name="area"]');
  const statusSel  = document.querySelector('select[name="status"]');

  let tmr = null;
  let lastReq = 0;

  function debounceFetch(){
    clearTimeout(tmr);
    tmr = setTimeout(fetchLive, 350);
  }

  async function fetchLive(){
    const url = liveInput.dataset.url;
    const q = (liveInput.value || '').trim();
    const area = areaSel ? areaSel.value : '';
    const status = statusSel ? statusSel.value : '';

    // ✅ لو المستخدم مسح كل شيء رجّع القائمة مباشرة
    // (نخلي السيرفر يتعامل)
    const params = new URLSearchParams({ q, area, status });

    // لإلغاء نتائج الطلبات القديمة
    const reqId = ++lastReq;

    try{
      const res = await fetch(url + '?' + params.toString(), {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      });
      const html = await res.text();

      if(reqId !== lastReq) return; // تجاهل الرد القديم

      // ✅ تحديث الـ tbody
      tbody.innerHTML = html;

      // ✅ مهم: لأننا نخزن JSON rowdata لكل صف، لازم يكون جزء من الـ html
      // وسيعمل openOfferModal طبيعي لأن rowdata موجودة داخل الصفوف الجديدة
    }catch(e){
      console.error(e);
    }
  }

  // ✅ تشغيل البحث بمجرد الكتابة
  if(liveInput){
    liveInput.addEventListener('input', debounceFetch);
  }

  // ✅ تشغيل لحظي عند تغيير الفلاتر
  if(areaSel) areaSel.addEventListener('change', fetchLive);
  if(statusSel) statusSel.addEventListener('change', fetchLive);
</script>

<?php if (!$__embed): ?>
</body>
</html>
<?php else: ?>
</div>
<?php endif; ?>
