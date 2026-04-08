<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

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
