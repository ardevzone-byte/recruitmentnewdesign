<?php defined('BASEPATH') OR exit('No direct script access allowed');
$__embed = !empty($embed_shell);
?>
<?php if (!$__embed): ?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= html_escape($title ?? 'إشعار مباشرة الموظف') ?></title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
  <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@600;800&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<?php else: ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css">
<link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@600;800&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<div class="rows col-12 jobs-dashboard recruitment-page onboarding-notify-host py-2">
<?php endif; ?>

  <style>
    :root{
      --primary-blue:#001f3f; --primary-orange:#FF8C00;
      --dark:#0a1929; --glass: rgba(255,255,255,.06); --border: rgba(255,255,255,.12);
      --muted: rgba(255,255,255,.68);
      --rxxl: 24px; --rxl: 18px;
      --shadow: 0 12px 28px rgba(0,0,0,.25);
    }
    *{box-sizing:border-box}
    body{
      font-family:'Tajawal',sans-serif;
      background: linear-gradient(135deg, #071423 0%, var(--primary-blue) 35%, #121a2d 70%, #071423 100%);
      color:#fff; min-height:100vh; overflow-x:hidden;
    }
    .wrap{max-width:1500px;margin:18px auto;padding:0 14px}
    .onboarding-notify-host .wrap{max-width:100%;margin:0 auto}
    .glass{
      background: var(--glass);
      border: 1px solid var(--border);
      border-radius: var(--rxxl);
      box-shadow: var(--shadow);
      backdrop-filter: blur(16px);
      overflow:hidden;
      position:relative;
    }
    .glass:before{
      content:'';position:absolute;top:0;left:0;right:0;height:3px;
      background: linear-gradient(90deg, var(--primary-orange), var(--primary-blue));
      opacity:.9;
    }
    .header{
      padding:14px 16px;
      display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;
    }
    h1{font-family:'El Messiri',serif;font-weight:900;margin:0;font-size:1.6rem}
    .sub{color:var(--muted);margin-top:4px}
    .btnx{
      border:1px solid rgba(255,255,255,.18);
      background: rgba(255,255,255,.06);
      color:#fff;text-decoration:none;
      border-radius:14px;padding:10px 14px;font-weight:900;
      display:inline-flex;gap:10px;align-items:center;
      transition:.2s;
    }
    .btnx:hover{transform:translateY(-2px);border-color:rgba(255,140,0,.55);box-shadow:0 10px 18px rgba(255,140,0,.12);color:#fff;}
    .btnx.primary{background: linear-gradient(135deg, rgba(255,140,0,.22), rgba(255,140,0,.10));border-color: rgba(255,140,0,.35);}

    .grid{
      display:grid;
      grid-template-columns: 420px 1fr;
      gap:14px;
      padding:14px;
    }
    @media(max-width:1100px){.grid{grid-template-columns:1fr}}
    .cardx{padding:14px}
    .card-title{font-weight:900;margin:0 0 8px 0}
    .help{color:var(--muted);font-size:.92rem;margin:0 0 12px 0}
    .form-control,.form-select{
      background: rgba(0,0,0,.18);
      border:1px solid rgba(255,255,255,.14);
      color:#fff;border-radius:14px;height:44px;
    }
    .form-control::placeholder{color: rgba(255,255,255,.5)}
    .form-select option{color:#000}
    .hrx{height:1px;background:rgba(255,255,255,.12);margin:12px 0}

    .table-wrap{
      border:1px solid rgba(255,255,255,.12);
      border-radius:18px;
      overflow:hidden;
      background: rgba(0,0,0,.14);
    }
    table{margin:0;color:#fff}
    thead th{
      background: rgba(255,255,255,.06) !important;
      color:#fff !important;
      border-color: rgba(255,255,255,.10) !important;
      white-space:nowrap;
      font-weight:900;
    }
    tbody td{
      border-color: rgba(255,255,255,.08) !important;
      vertical-align:middle;
    }

    /* Smart dropdown */
    .smartbox{position:relative}
    .smartlist{
      position:absolute;left:0;right:0;top:52px;
      background: rgba(5,10,18,.96);
      border:1px solid rgba(255,255,255,.14);
      border-radius: 16px;
      overflow:hidden;
      z-index:50;
      display:none;
      max-height:280px;
      overflow:auto;
    }
    .smartitem{
      padding:10px 12px;
      cursor:pointer;
      border-bottom:1px solid rgba(255,255,255,.10);
    }
    .smartitem:hover{background: rgba(255,140,0,.14)}
    .pill{
      display:inline-flex;gap:8px;align-items:center;
      padding:6px 10px;border-radius:999px;
      border:1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.06);
      font-weight:900;font-size:.85rem;
    }

    .preview{
      border:1px dashed rgba(255,140,0,.35);
      background: rgba(255,255,255,.05);
      border-radius:18px;
      padding:12px;
    }
    .pv-row{
      display:flex;justify-content:space-between;gap:10px;
      padding:8px 10px;border-bottom:1px solid rgba(255,255,255,.10);
    }
    .pv-row:last-child{border-bottom:0}
    .k{color:rgba(255,255,255,.65);font-weight:900}
    .v{font-weight:900}

    .alertx{
      border:1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.06);
      border-radius:18px;
      padding:10px 12px;
      margin: 0 14px 14px 14px;
    }
  </style>
<?php if (!$__embed): ?>
</head>
<body>
<?php endif; ?>

<div class="wrap">

  <div class="glass" data-aos="fade-down">
    <div class="header">
      <div>
        <h1>شاشة إشعار مباشرة الموظف</h1>
        <div class="sub">إنشاء إدارات مستلمة + اختيار موظف بالبحث الذكي + معاينة نموذج 1/2 + إرسال + سجل الإرسالات</div>
      </div>
      <div class="d-flex gap-2 flex-wrap">
        <a class="btnx" href="<?= site_url('dashboard'); ?>"><i class="fas fa-house"></i> الرئيسية</a>
        <a class="btnx primary" href="<?= site_url('OnboardingNotify'); ?>"><i class="fas fa-rotate"></i> تحديث</a>
      </div>
    </div>

    <?php if($this->session->flashdata('ok')): ?>
      <div class="alertx"><i class="fas fa-circle-check"></i> <?= html_escape($this->session->flashdata('ok')) ?></div>
    <?php endif; ?>
    <?php if($this->session->flashdata('err')): ?>
      <div class="alertx" style="border-color:rgba(255,90,90,.35)"><i class="fas fa-triangle-exclamation"></i> <?= html_escape($this->session->flashdata('err')) ?></div>
    <?php endif; ?>

    <div class="grid">

      <!-- LEFT: Departments -->
      <div class="glass cardx" data-aos="fade-up">
        <h3 class="card-title"><i class="fas fa-building"></i> إنشاء/تعديل الإدارات المستلمة</h3>
        <p class="help">أضف الإدارة + البريد + اختر نموذج (1/2) وسيتم الإرسال لهم من شاشة الإرسال.</p>

        <form method="post" action="<?= site_url('OnboardingNotify/dept_save'); ?>">
          <input type="hidden" name="id" id="dept_id" value="">

          <div class="mb-2">
            <label class="k">اسم الإدارة</label>
            <input class="form-control" name="dept_name" id="dept_name" placeholder="مثال: إدارة تقنية المعلومات" required>
          </div>

          <div class="mb-2">
            <label class="k">البريد</label>
            <input class="form-control" name="email" id="dept_email" placeholder="it@marsoom.net" required>
          </div>

          <div class="mb-2">
            <label class="k">نموذج الإرسال</label>
            <select class="form-select" name="template_type" id="dept_template">
              <option value="1">نموذج 1 (تفصيلي + هوية + جوال)</option>
              <option value="2">نموذج 2 (مختصر)</option>
            </select>
          </div>

          <div class="mb-3">
            <label class="k">الحالة</label>
            <select class="form-select" name="is_active" id="dept_active">
              <option value="1">نشط</option>
              <option value="0">موقوف</option>
            </select>
          </div>

          <button type="submit" class="btnx primary w-100 justify-content-center">
            <i class="fas fa-floppy-disk"></i> حفظ الإدارة
          </button>
        </form>

        <div class="hrx"></div>

        <div class="table-wrap">
          <table class="table table-hover align-middle mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>الإدارة</th>
                <th>البريد</th>
                <th>نموذج</th>
                <th>حالة</th>
                <th>أوامر</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($depts as $d): ?>
                <tr>
                  <td><span class="pill">#<?= (int)$d['id'] ?></span></td>
                  <td style="font-weight:900"><?= html_escape($d['dept_name']) ?></td>
                  <td><?= html_escape($d['email']) ?></td>
                  <td><?= (int)$d['template_type'] === 1 ? '1' : '2' ?></td>
                  <td><?= (int)$d['is_active'] ? 'نشط' : 'موقوف' ?></td>
                  <td class="d-flex gap-2 flex-wrap">
                    <button class="btnx" type="button" style="padding:8px 10px"
                      onclick='editDept(<?= json_encode($d, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES) ?>)'>
                      <i class="fas fa-pen"></i>
                    </button>
                    <a class="btnx" style="padding:8px 10px;border-color:rgba(255,90,90,.35)"
                       href="<?= site_url('OnboardingNotify/dept_delete/'.(int)$d['id']) ?>"
                       onclick="return confirm('تأكيد حذف الإدارة؟');">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
              <?php if(empty($depts)): ?>
                <tr><td colspan="6" class="text-center py-3" style="color:rgba(255,255,255,.7)">لا توجد إدارات بعد</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>

      <!-- RIGHT: Send -->
      <div class="glass cardx" data-aos="fade-up" data-aos-delay="80">
        <h3 class="card-title"><i class="fas fa-paper-plane"></i> إرسال إشعار مباشرة</h3>
        <p class="help">اختر الموظف من البحث الذكي (اسم أو رقم وظيفي)، ثم اختر الإدارات المراد إرسال الإشعار لها، ثم أرسل.</p>

        <form method="post" action="<?= site_url('OnboardingNotify/send'); ?>" id="sendForm">
          <input type="hidden" name="job_offer_id" id="job_offer_id" value="">

          <div class="row g-2">
            <div class="col-lg-6">
              <div class="smartbox">
                <label class="k">بحث ذكي عن الموظف</label>
                <input type="text" class="form-control" id="smartSearch" placeholder="اكتب الاسم الأول أو الرقم الوظيفي…">
                <div class="smartlist" id="smartList"></div>
              </div>
            </div>

            <div class="col-lg-6">
              <label class="k">الأقسام المستلمة</label>
              <div class="table-wrap" style="padding:10px;border-radius:18px">
                <?php if(empty($active_depts)): ?>
                  <div style="color:rgba(255,255,255,.75)">لا توجد إدارات نشطة</div>
                <?php else: ?>
                  <?php foreach($active_depts as $d): ?>
                    <label class="d-flex align-items-center gap-2" style="padding:8px 6px;border-bottom:1px solid rgba(255,255,255,.08)">
                      <input type="checkbox" name="dept_ids[]" value="<?= (int)$d['id'] ?>">
                      <div style="flex:1">
                        <div style="font-weight:900"><?= html_escape($d['dept_name']) ?></div>
                        <div style="color:rgba(255,255,255,.65);font-size:.9rem"><?= html_escape($d['email']) ?> — نموذج <?= (int)$d['template_type'] ?></div>
                      </div>
                    </label>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>

          <div class="hrx"></div>

          <div class="row g-2">
            <div class="col-lg-6">
              <div class="preview">
                <div style="font-weight:900;margin-bottom:8px"><i class="fas fa-eye"></i> معاينة النموذج (اختر إدارة من القائمة أعلاه)</div>
                <div style="color:rgba(255,255,255,.7);font-size:.92rem;margin-bottom:10px">
                  المعاينة تعتمد على نموذج الإدارة المختارة (1 أو 2) — أول إدارة تختارها سيتم عرض معاينتها هنا.
                </div>
                <div id="previewBox" style="min-height:140px;color:rgba(255,255,255,.75)">— لا توجد معاينة —</div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="preview">
                <div style="font-weight:900;margin-bottom:8px"><i class="fas fa-circle-info"></i> الحالة</div>
                <div class="pv-row"><div class="k">الموظف المختار</div><div class="v" id="pickedEmployee">—</div></div>
                <div class="pv-row"><div class="k">Offer ID</div><div class="v" id="pickedOffer">—</div></div>
                <div class="pv-row"><div class="k">إجمالي الإدارات المحددة</div><div class="v" id="pickedDepts">0</div></div>
                <div class="pv-row"><div class="k">ملاحظة</div><div class="v" style="color:#ffd166">تأكد من البيانات قبل الإرسال</div></div>

                <button type="submit" class="btnx primary w-100 justify-content-center mt-3">
                  <i class="fas fa-paper-plane"></i> إرسال الإشعار الآن
                </button>
              </div>
            </div>
          </div>
        </form>

        <div class="hrx"></div>

        <h3 class="card-title"><i class="fas fa-clock-rotate-left"></i> آخر الإرسالات</h3>
        <div class="table-wrap">
          <table class="table table-hover align-middle mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>الإدارة</th>
                <th>إلى</th>
                <th>Offer</th>
                <th>نموذج</th>
                <th>الحالة</th>
                <th>وقت</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($logs as $l): ?>
                <tr>
                  <td><span class="pill">#<?= (int)$l['id'] ?></span></td>
                  <td style="font-weight:900"><?= html_escape($l['dept_name'] ?? '-') ?></td>
                  <td><?= html_escape($l['sent_to_email']) ?></td>
                  <td>#<?= (int)$l['job_offer_id'] ?></td>
                  <td><?= (int)$l['template_type'] ?></td>
                  <td>
                    <?php if(($l['status'] ?? '') === 'sent'): ?>
                      <span class="pill" style="border-color:rgba(80,255,140,.35)">تم الإرسال</span>
                    <?php else: ?>
                      <span class="pill" style="border-color:rgba(255,90,90,.35)">فشل</span>
                    <?php endif; ?>
                  </td>
                  <td><?= html_escape($l['sent_at'] ?? '') ?></td>
                </tr>
              <?php endforeach; ?>
              <?php if(empty($logs)): ?>
                <tr><td colspan="7" class="text-center py-3" style="color:rgba(255,255,255,.7)">لا يوجد سجل بعد</td></tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({ duration: 800, once: true, offset: 50, easing: 'ease-out-cubic' });

const searchUrl  = "<?= site_url('OnboardingNotify/ajax_search_offers'); ?>";
const previewUrl = "<?= site_url('OnboardingNotify/ajax_preview_payload'); ?>";

const smartInput = document.getElementById('smartSearch');
const smartList  = document.getElementById('smartList');
const offerIdInp = document.getElementById('job_offer_id');

const pickedEmployee = document.getElementById('pickedEmployee');
const pickedOffer    = document.getElementById('pickedOffer');
const pickedDepts    = document.getElementById('pickedDepts');
const previewBox     = document.getElementById('previewBox');

let timer = null;

function showList(html){
  smartList.innerHTML = html;
  smartList.style.display = html.trim() ? 'block' : 'none';
}

function hideList(){ smartList.style.display = 'none'; }

function debounce(){
  clearTimeout(timer);
  timer = setTimeout(runSearch, 250);
}

async function runSearch(){
  const q = (smartInput.value || '').trim();
  if(q.length < 1){ showList(''); return; }

  const res = await fetch(searchUrl + "?q=" + encodeURIComponent(q), {
    headers: {'X-Requested-With':'XMLHttpRequest'}
  });
  const js = await res.json();
  if(!js.ok){ showList(''); return; }

  const items = js.items || [];
  if(!items.length){
    showList('<div class="smartitem" style="color:rgba(255,255,255,.7)">لا نتائج</div>');
    return;
  }

  let html = '';
  items.forEach(it=>{
    html += `
      <div class="smartitem" onclick="pickOffer(${it.job_offer_id}, '${escapeHtml(it.label)}')">
        <div style="font-weight:900">${escapeHtml(it.full_name)} <span style="color:rgba(255,255,255,.65)">— ${escapeHtml(it.employee_id || '—')}</span></div>
        <div style="color:rgba(255,255,255,.65);font-size:.9rem">Offer #${it.job_offer_id} — ${escapeHtml(it.area || '—')} — ${escapeHtml(it.start_date || '—')}</div>
      </div>
    `;
  });

  showList(html);
}

function escapeHtml(s){
  return String(s).replaceAll('&','&amp;').replaceAll('<','&lt;').replaceAll('>','&gt;').replaceAll('"','&quot;').replaceAll("'","&#039;");
}

window.pickOffer = async function(job_offer_id, label){
  offerIdInp.value = job_offer_id;
  pickedEmployee.textContent = label;
  pickedOffer.textContent = "#" + job_offer_id;
  hideList();

  // بعد اختيار الموظف، إذا كان فيه إدارة محددة اعرض معاينتها
  await refreshPreview();
}

smartInput.addEventListener('input', debounce);
document.addEventListener('click', (e)=>{
  if(!e.target.closest('.smartbox')) hideList();
});

// عد الإدارات المختارة + معاينة أول إدارة مختارة
document.querySelectorAll('input[name="dept_ids[]"]').forEach(ch=>{
  ch.addEventListener('change', async ()=>{
    const count = document.querySelectorAll('input[name="dept_ids[]"]:checked').length;
    pickedDepts.textContent = count;
    await refreshPreview();
  });
});

async function refreshPreview(){
  const job_offer_id = parseInt(offerIdInp.value || '0', 10);
  const firstDept = document.querySelector('input[name="dept_ids[]"]:checked');

  if(!job_offer_id){
    previewBox.innerHTML = '— اختر الموظف أولاً —';
    return;
  }
  if(!firstDept){
    previewBox.innerHTML = '— اختر إدارة واحدة على الأقل لعرض المعاينة —';
    return;
  }

  // نحتاج template_type من الإدارة (نجيبها من DOM عبر نص "نموذج X")
  // أسهل: نخزن template_type في data-template عند بناء الإدارة. (هنا نقرأ من السطر)
  // لذلك: إذا ودك أدق 100% خلّي في الـ PHP تضيف data-template على checkbox.
  // حالياً: نخلي المعاينة "نموذج 1" افتراضي إذا ما قدرنا نقرأه
  const row = firstDept.closest('label');
  let template_type = 1;
  if(row){
    const txt = row.innerText || '';
    const m = txt.match(/نموذج\s+(\d)/);
    if(m) template_type = parseInt(m[1],10);
  }

  const res = await fetch(previewUrl + "?job_offer_id=" + job_offer_id + "&template_type=" + template_type, {
    headers: {'X-Requested-With':'XMLHttpRequest'}
  });
  const js = await res.json();
  if(!js.ok){
    previewBox.innerHTML = '<div style="color:#ffb4b4">تعذر تحميل المعاينة</div>';
    return;
  }

  const rows = js.preview || [];
  if(!rows.length){
    previewBox.innerHTML = '— لا توجد بيانات —';
    return;
  }

  let html = '';
  rows.forEach(r=>{
    html += `<div class="pv-row"><div class="k">${escapeHtml(r[0])}</div><div class="v">${escapeHtml(r[1] || '—')}</div></div>`;
  });
  previewBox.innerHTML = html;
}
</script>
<?php if (!$__embed): ?>
</body>
</html>
<?php else: ?>
</div>
<?php endif; ?>
