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
  <?php $this->load->view('includes/common-css-links'); ?>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
<?php endif; ?>

<div class="rows col-12 jobs-dashboard recruitment-page job-offers-report-host py-2">

  <div class="block col-12 mb-4 heading-white" data-aos="fade-down" data-aos-duration="600">
    <div class="head-table col-12">
      <div>
        <h4 class="mb-0"><i class="fas fa-file-contract me-2"></i> <?= html_escape($title ?? 'تقرير العروض الوظيفية') ?></h4>
        <p class="mb-0 text-muted">بحث + فلاتر + جدول مختصر + تفاصيل داخل نافذة (Modal)</p>
      </div>
      <div class="d-flex gap-2 flex-wrap align-items-center">
        <a class="button default small" href="<?= site_url('dashboard'); ?>"><i class="fas fa-house ms-1"></i> الرئيسية</a>
        <a class="button default orange small" href="<?= site_url('JobOffersReport'); ?>"><i class="fas fa-rotate ms-1"></i> تحديث</a>
      </div>
    </div>
  </div>

  <?php
    $areas = ['أبها', 'الرياض', 'الخبر', 'حائل'];
    $statuses = ['Sent', 'Accepted', 'Rejected'];

    $byAreaMap = [];
    foreach (($stats['by_area'] ?? []) as $r) {
      $byAreaMap[$r['area']] = (int) $r['cnt'];
    }
    $byStatusMap = [];
    foreach (($stats['by_status'] ?? []) as $r) {
      $byStatusMap[$r['status']] = (int) $r['cnt'];
    }
  ?>

  <div class="emp-table-card mb-4 job-offers-report-host__card" data-aos="fade-up" data-aos-delay="80">
    <div class="emp-table-card__head job-offers-report-host__card-head">
      <h5 class="mb-0"><i class="bi bi-graph-up-arrow me-2"></i> ملخص سريع</h5>
    </div>
    <div class="emp-table-card__body p-3 p-md-4">
      <div class="jor-stat-grid">
        <div class="jor-stat-card">
          <div class="jor-stat-label"><i class="fas fa-layer-group ms-1"></i> إجمالي العروض</div>
          <div class="jor-stat-value"><?= (int) ($stats['total'] ?? 0) ?></div>
        </div>
        <?php foreach ($areas as $a): ?>
          <div class="jor-stat-card">
            <div class="jor-stat-label"><i class="fas fa-location-dot ms-1"></i> <?= html_escape($a) ?></div>
            <div class="jor-stat-value"><?= (int) ($byAreaMap[$a] ?? 0) ?></div>
          </div>
        <?php endforeach; ?>
        <?php foreach ($statuses as $s): ?>
          <div class="jor-stat-card">
            <div class="jor-stat-label"><i class="fas fa-flag ms-1"></i> <?= html_escape($s) ?></div>
            <div class="jor-stat-value"><?= (int) ($byStatusMap[$s] ?? 0) ?></div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <div class="emp-table-card mb-4 job-offers-report-host__card" data-aos="fade-up" data-aos-delay="120">
    <div class="emp-table-card__head job-offers-report-host__card-head">
      <h5 class="mb-0"><i class="bi bi-funnel me-2"></i> فلترة وبحث</h5>
    </div>
    <div class="emp-table-card__body p-3 p-md-4">
      <form class="row g-2 g-md-3 align-items-end" method="get" action="<?= site_url('JobOffersReport'); ?>">
        <div class="col-12 col-lg-4">
          <label class="form-label small text-secondary mb-1">بحث نصي</label>
          <input class="form-control" type="text" name="q" id="liveSearch"
                 placeholder="بحث بالاسم / الرقم الوظيفي / الهوية"
                 value="<?= html_escape($filters['q'] ?? '') ?>"
                 data-url="<?= site_url('JobOffersReport/ajax_list'); ?>">
        </div>
        <div class="col-6 col-md-4 col-lg-2">
          <label class="form-label small text-secondary mb-1">المنطقة</label>
          <select class="form-select" name="area">
            <option value="">كل المناطق</option>
            <?php foreach ($areas as $a): ?>
              <option value="<?= html_escape($a) ?>" <?= (($filters['area'] ?? '') === $a) ? 'selected' : '' ?>>
                <?= html_escape($a) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
          <label class="form-label small text-secondary mb-1">الحالة</label>
          <select class="form-select" name="status">
            <option value="">كل الحالات</option>
            <?php foreach ($statuses as $s): ?>
              <option value="<?= html_escape($s) ?>" <?= (($filters['status'] ?? '') === $s) ? 'selected' : '' ?>>
                <?= html_escape($s) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-12 col-md-auto d-flex flex-wrap gap-2 pt-1 pt-md-0">
          <button class="button default orange small" type="submit"><i class="fas fa-filter ms-1"></i> تطبيق</button>
          <a class="button hex-btn small" href="<?= site_url('JobOffersReport'); ?>"><i class="fas fa-xmark ms-1"></i> مسح</a>
        </div>
      </form>
    </div>
  </div>

  <div class="block col-12" data-aos="fade-up" data-aos-delay="160">
    <div class="table-wrapper-rtl job-offers-report-host__table-shell">
      <div class="table-responsive job-offers-report-host__table-scroll">
        <table class="table table-custom table-hover align-middle mb-0">
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
            <?php if (empty($offers)): ?>
              <tr>
                <td colspan="6" class="text-center text-muted py-4">لا توجد بيانات مطابقة</td>
              </tr>
            <?php else: ?>
              <?php foreach ($offers as $row): ?>
                <tr>
                  <td><span class="jor-pill"><i class="fas fa-hashtag"></i><?= (int) $row['id'] ?></span></td>
                  <td>
                    <div style="min-width:340px">
                      <div class="fw-bold"><?= html_escape($row['full_name'] ?? '-') ?></div>
                      <div class="jor-subtle">Candidate ID: <?= (int) ($row['candidate_id'] ?? 0) ?></div>
                    </div>
                  </td>
                  <td>
                    <span class="editable jor-editable"
                          data-id="<?= (int) $row['id'] ?>"
                          data-field="employee_id"
                          data-type="text"
                          data-placeholder="0000"
                          data-empty="<?= empty($row['employee_id']) ? 1 : 0 ?>">
                      <?= html_escape($row['employee_id'] ?: '—') ?>
                    </span>
                  </td>
                  <td>
                    <span class="editable jor-editable"
                          data-id="<?= (int) $row['id'] ?>"
                          data-field="total_salary"
                          data-type="number"
                          data-placeholder="0"
                          data-empty="<?= empty($row['total_salary']) ? 1 : 0 ?>">
                      <?= html_escape(($row['total_salary'] ?? '') !== '' ? $row['total_salary'] : '0') ?>
                    </span>
                  </td>
                  <td>
                    <span class="editable jor-editable"
                          data-id="<?= (int) $row['id'] ?>"
                          data-field="area"
                          data-type="select"
                          data-options='["أبها","الرياض","الخبر","حائل"]'
                          data-empty="<?= empty($row['area']) ? 1 : 0 ?>">
                      <?= html_escape($row['area'] ?: '—') ?>
                    </span>
                  </td>
                  <td class="d-flex gap-2 flex-wrap">
                    <button type="button"
                            class="button default orange small"
                            data-bs-toggle="modal"
                            data-bs-target="#offerModal"
                            onclick="openOfferModal(<?= (int) $row['id'] ?>)">
                      <i class="fas fa-list-check"></i> تفاصيل
                    </button>
                    <a class="button hex-btn small"
                       target="_blank"
                       href="<?= site_url('offers/view/' . (int) $row['id']); ?>">
                      <i class="fas fa-up-right-from-square"></i>
                    </a>
                  </td>
                  <script type="application/json" id="rowdata-<?= (int) $row['id'] ?>">
                    <?= json_encode($row, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>
                  </script>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="offerModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <div>
            <h5 class="modal-title fw-bold">تفاصيل العرض الوظيفي</h5>
            <div class="small text-muted" id="modalSub">—</div>
          </div>
          <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="jor-detail-grid" id="detailGrid"></div>
        </div>
        <div class="modal-footer d-flex justify-content-between flex-wrap gap-2">
          <a id="openExternal" class="button hex-btn small" target="_blank" href="#">
            <i class="fas fa-up-right-from-square"></i> فتح صفحة العرض
          </a>
          <button type="button" class="button default orange small" data-bs-dismiss="modal">
            <i class="fas fa-check"></i> تم
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Toast -->
  <div class="jor-toast" id="toastx" aria-live="polite">
    <div class="d-flex align-items-center gap-2">
      <div id="toastIcon"><i class="fas fa-circle-info text-secondary"></i></div>
      <div>
        <div id="toastTitle">تنبيه</div>
        <div class="small" id="toastMsg">...</div>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    if (typeof AOS !== 'undefined') {
      AOS.init({ duration: 800, once: true, offset: 50, easing: 'ease-out-cubic' });
    }

    const updateUrl = "<?= site_url('JobOffersReport/update_field'); ?>";
    const offersViewBase = "<?= site_url('offers/view/'); ?>";

    function toast(type, msg) {
      const el = document.getElementById('toastx');
      const icon = document.getElementById('toastIcon');
      const title = document.getElementById('toastTitle');
      const m = document.getElementById('toastMsg');
      if (!el) return;

      if (type === 'success') {
        icon.innerHTML = '<i class="fas fa-circle-check text-success"></i>';
        title.textContent = 'تم';
      } else {
        icon.innerHTML = '<i class="fas fa-triangle-exclamation text-warning"></i>';
        title.textContent = 'تنبيه';
      }
      m.textContent = msg;
      el.classList.add('show');
      clearTimeout(window.__jorToastT);
      window.__jorToastT = setTimeout(() => el.classList.remove('show'), 2600);
    }

    async function saveField(id, field, value) {
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

    function createInlineInput(el) {
      const type = el.dataset.type || 'text';
      const oldVal = (el.textContent || '').trim();
      const placeholder = el.dataset.placeholder || '';
      let input;

      if (type === 'select') {
        input = document.createElement('select');
        input.className = 'form-select form-select-sm';
        const options = JSON.parse(el.dataset.options || '[]');
        const opt0 = document.createElement('option');
        opt0.value = '';
        opt0.textContent = '—';
        input.appendChild(opt0);
        options.forEach(v => {
          const o = document.createElement('option');
          o.value = v;
          o.textContent = v;
          input.appendChild(o);
        });
        input.value = (oldVal === '—') ? '' : oldVal;
      } else {
        input = document.createElement('input');
        input.type = (type === 'number') ? 'text' : type;
        input.className = 'form-control form-control-sm';
        input.placeholder = placeholder;
        input.value = (oldVal === '—') ? '' : oldVal;
      }
      input.dataset.old = input.value;
      return input;
    }

    document.addEventListener('click', async (e) => {
      const el = e.target.closest('.editable');
      if (!el) return;
      if (el.dataset.editing === '1') return;
      el.dataset.editing = '1';
      const id = el.dataset.id;
      const field = el.dataset.field;
      const input = createInlineInput(el);
      const originalHTML = el.innerHTML;
      el.innerHTML = '';
      el.appendChild(input);
      input.focus();
      input.select && input.select();

      const finish = async (commit) => {
        const newVal = (input.value || '').trim();
        const oldVal = (input.dataset.old || '').trim();
        el.dataset.editing = '0';
        if (!commit) { el.innerHTML = originalHTML; return; }
        if (newVal === oldVal) { el.innerHTML = originalHTML; return; }
        if (field === 'employee_id' && newVal !== '' && !/^\d{4}$/.test(newVal)) {
          toast('error', 'الرقم الوظيفي يجب أن يكون 4 أرقام');
          el.innerHTML = originalHTML;
          return;
        }
        if (field === 'id_number' && newVal !== '' && !/^\d{10}$/.test(newVal)) {
          toast('error', 'رقم الهوية يجب أن يكون 10 أرقام');
          el.innerHTML = originalHTML;
          return;
        }
        try {
          const out = await saveField(id, field, newVal);
          if (out && out.ok) {
            const showVal = (newVal === '') ? '—' : newVal;
            el.textContent = showVal;
            el.dataset.empty = (newVal === '') ? '1' : '0';
            toast('success', out.msg || 'تم التحديث');
            document.querySelectorAll('.editable[data-id="' + id + '"][data-field="' + field + '"]').forEach(x => {
              if (x !== el) {
                x.textContent = showVal;
                x.dataset.empty = (newVal === '') ? '1' : '0';
              }
            });
            if (out.extra) {
              Object.keys(out.extra).forEach(f => {
                const v = (out.extra[f] === '' || out.extra[f] === null) ? '—' : out.extra[f];
                document.querySelectorAll('.editable[data-id="' + id + '"][data-field="' + f + '"]').forEach(x => {
                  x.textContent = v;
                  x.dataset.empty = (v === '—') ? '1' : '0';
                });
              });
            }
          } else {
            el.innerHTML = originalHTML;
            toast('error', (out && out.msg) ? out.msg : 'فشل التحديث');
          }
        } catch (err) {
          el.innerHTML = originalHTML;
          toast('error', 'تعذر الاتصال بالسيرفر');
        }
      };
      input.addEventListener('keydown', (ev) => {
        if (ev.key === 'Enter') finish(true);
        if (ev.key === 'Escape') finish(false);
      });
      input.addEventListener('blur', () => finish(true));
    });

    function openOfferModal(id) {
      const node = document.getElementById('rowdata-' + id);
      if (!node) return;
      let row = {};
      try { row = JSON.parse(node.textContent || '{}'); } catch (e) { row = {}; }
      const fullName = row.full_name || '-';
      const emp = row.employee_id || '—';
      document.getElementById('modalSub').textContent = '#' + id + ' — ' + fullName + ' — الموظف: ' + emp;
      document.getElementById('openExternal').href = offersViewBase + id;

      const fields = [
        { k: 'اسم المرشح', v: escapeHtml(fullName), editable: false },
        { k: 'employee_id (الرقم الوظيفي)', field: 'employee_id', type: 'text', placeholder: '0000' },
        { k: 'id_number (رقم الهوية)', field: 'id_number', type: 'text', placeholder: '10 digits' },
        { k: 'basic_salary (الراتب الأساسي)', field: 'basic_salary', type: 'number', placeholder: '0' },
        { k: 'housing_allowance (بدل السكن)', field: 'housing_allowance', type: 'number', placeholder: '0' },
        { k: 'transport_allowance (بدل المواصلات)', field: 'transport_allowance', type: 'number', placeholder: '0' },
        { k: 'communication_allowance (بدل الاتصالات)', field: 'communication_allowance', type: 'number', placeholder: '0' },
        { k: 'total_salary (إجمالي الراتب)', field: 'total_salary', type: 'number', placeholder: '0' },
        { k: 'start_date (تاريخ المباشرة)', field: 'start_date', type: 'date', placeholder: 'YYYY-MM-DD' },
        { k: 'status (حالة العرض)', field: 'status', type: 'select', options: ['Sent', 'Accepted', 'Rejected'] },
        { k: 'docs_status (استكمال المستندات)', field: 'docs_status', type: 'text', placeholder: 'مكتمل/ناقص' },
        { k: 'hr_status (موافقة الموارد البشرية)', field: 'hr_status', type: 'text', placeholder: 'موافق/مرفوض' },
        { k: 'candidate_response (رد المرشح)', field: 'candidate_response', type: 'text', placeholder: 'موافق/اعتذار' },
        { k: 'area (المنطقة)', field: 'area', type: 'select', options: ['أبها', 'الرياض', 'الخبر', 'حائل'] },
        { k: 'رقم المشرف المباشر', field: 'supervisor_empno', type: 'text', placeholder: '0000' },
        { k: 'اسم المشرف', field: 'supervisor_name', type: 'text', placeholder: 'اسم المشرف' },
        { k: 'كود المشروع', field: 'project_code', type: 'text', placeholder: 'مثال: 3' },
        { k: 'اسم المشروع', field: 'project_name', type: 'text', placeholder: 'اسم المشروع' }
      ];

      const grid = document.getElementById('detailGrid');
      grid.innerHTML = '';
      fields.forEach(item => {
        const box = document.createElement('div');
        box.className = 'jor-detail-item';
        const key = document.createElement('div');
        key.className = 'jor-detail-k';
        key.textContent = item.k;
        const val = document.createElement('div');
        val.className = 'jor-detail-v';
        if (item.editable === false) {
          val.innerHTML = '<div class="fw-bold">' + item.v + '</div>';
        } else {
          const span = document.createElement('span');
          span.className = 'editable jor-editable';
          span.dataset.id = String(id);
          span.dataset.field = item.field;
          span.dataset.type = item.type || 'text';
          span.dataset.placeholder = item.placeholder || '';
          if (item.type === 'select') {
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

    function escapeHtml(str) {
      return String(str)
        .replaceAll('&', '&amp;')
        .replaceAll('<', '&lt;')
        .replaceAll('>', '&gt;')
        .replaceAll('"', '&quot;')
        .replaceAll("'", '&#039;');
    }
  </script>

  <script>
    const liveInput = document.getElementById('liveSearch');
    const tbody = document.getElementById('offersTbody');
    const areaSel = document.querySelector('select[name="area"]');
    const statusSel = document.querySelector('select[name="status"]');
    let tmr = null;
    let lastReq = 0;

    function debounceFetch() {
      clearTimeout(tmr);
      tmr = setTimeout(fetchLive, 350);
    }

    async function fetchLive() {
      const url = liveInput && liveInput.dataset ? liveInput.dataset.url : '';
      if (!url || !tbody) return;
      const q = (liveInput.value || '').trim();
      const area = areaSel ? areaSel.value : '';
      const status = statusSel ? statusSel.value : '';
      const params = new URLSearchParams({ q, area, status });
      const reqId = ++lastReq;
      try {
        const res = await fetch(url + '?' + params.toString(), {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });
        const html = await res.text();
        if (reqId !== lastReq) return;
        tbody.innerHTML = html;
      } catch (e) {
        console.error(e);
      }
    }

    if (liveInput) {
      liveInput.addEventListener('input', debounceFetch);
    }
    if (areaSel) areaSel.addEventListener('change', fetchLive);
    if (statusSel) statusSel.addEventListener('change', fetchLive);
  </script>

</div>

<?php if (!$__embed): ?>
</body>
</html>
<?php endif; ?>
