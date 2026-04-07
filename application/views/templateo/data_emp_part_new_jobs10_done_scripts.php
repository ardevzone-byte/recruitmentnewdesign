<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script>
$(function () {
  var dealUrl = "<?= base_url('users/deal_replay1') ?>";
  var replayModalEl = document.getElementById('myModalreplay');

  $('.replay').on('click', function () {
    var id = $(this).attr('data');
    $('input[name=txtId]').val(id);
    if (replayModalEl) {
      bootstrap.Modal.getOrCreateInstance(replayModalEl).show();
    }
  });

  $('#btnReplay').on('click', function () {
    var data = $('#Replay').serialize();
    $.ajax({
      type: 'ajax',
      method: 'get',
      async: false,
      url: dealUrl,
      data: data,
      dataType: 'json',
      success: function () {
        if (replayModalEl) {
          var inst = bootstrap.Modal.getInstance(replayModalEl);
          if (inst) inst.hide();
        }
        setTimeout(function () {
          location.reload();
        }, 1000);
        $('.alert-success').html(' <?php echo $this->lang->line("rego"); ?> ').fadeIn().delay(3000).fadeOut('slow');
      },
      error: function () {
        $('.alert-danger').html(' <?php echo $this->lang->line("persongo"); ?> ').fadeIn().delay(3000).fadeOut('slow');
      }
    });
  });
});
</script>
