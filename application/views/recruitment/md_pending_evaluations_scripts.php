<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
(function () {
  var baseCandidates = "<?= base_url('candidates/view/') ?>";
  var urlAjaxUsers = "<?= base_url('MdPendingEvaluations/ajax_users') ?>";
  var urlTransfer = "<?= base_url('MdPendingEvaluations/transfer_evaluation') ?>";

  var candidateEl = document.getElementById('candidateModal');
  var transferEl = document.getElementById('transferModal');
  var candidateModal = candidateEl ? new bootstrap.Modal(candidateEl) : null;
  var transferModal = transferEl ? new bootstrap.Modal(transferEl) : null;

  window.openCandidateModal = function (applicationId) {
    var frame = document.getElementById('candidateFrame');
    if (frame) frame.src = baseCandidates + applicationId;
    if (candidateModal) candidateModal.show();
  };

  window.openTransferModal = function (mdEvalId, candidateName) {
    var msg = document.getElementById('transferMsg');
    if (msg) { msg.style.display = 'none'; msg.className = 'mt-3 small'; msg.textContent = ''; }
    document.getElementById('md_eval_id').value = mdEvalId;
    document.getElementById('transferEvalId').textContent = mdEvalId;
    document.getElementById('transferCandidateName').textContent = candidateName || '';

    var $sel = window.jQuery && window.jQuery('#new_empno');
    if ($sel && $sel.length) {
      if (!$sel.hasClass('select2-hidden-accessible')) {
        $sel.select2({
          dropdownParent: window.jQuery('#transferModal'),
          placeholder: 'ابحث بالاسم أو الرقم الوظيفي...',
          allowClear: true,
          ajax: {
            url: urlAjaxUsers,
            dataType: 'json',
            delay: 250,
            data: function (params) { return { term: params.term || '' }; },
            processResults: function (data) { return data; }
          }
        });
      } else {
        $sel.val(null).trigger('change');
      }
    }
    if (transferModal) transferModal.show();
  };

  window.submitTransfer = function () {
    var md_eval_id = document.getElementById('md_eval_id').value;
    var new_empno = window.jQuery ? window.jQuery('#new_empno').val() : '';
    var msg = document.getElementById('transferMsg');
    if (!new_empno) {
      if (msg) {
        msg.style.display = 'block';
        msg.className = 'mt-3 small alert alert-warning';
        msg.textContent = 'اختر موظف أولاً.';
      }
      return;
    }
    if (msg) {
      msg.style.display = 'block';
      msg.className = 'mt-3 small alert alert-secondary';
      msg.textContent = 'جارٍ التحويل...';
    }
    window.jQuery.ajax({
      url: urlTransfer,
      type: 'POST',
      dataType: 'json',
      data: { md_eval_id: md_eval_id, new_empno: new_empno },
      success: function (res) {
        if (res && res.ok) {
          if (msg) {
            msg.className = 'mt-3 small alert alert-success';
            msg.textContent = res.msg || 'تم التحويل بنجاح.';
          }
          setTimeout(function () { window.location.reload(); }, 700);
        } else {
          if (msg) {
            msg.className = 'mt-3 small alert alert-danger';
            msg.textContent = (res && res.msg) ? res.msg : 'فشل التحويل.';
          }
        }
      },
      error: function () {
        if (msg) {
          msg.className = 'mt-3 small alert alert-danger';
          msg.textContent = 'حدث خطأ أثناء التحويل.';
        }
      }
    });
  };
})();
</script>
