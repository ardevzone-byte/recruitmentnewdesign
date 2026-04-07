<script src="<?php echo base_url();?>assets2/js/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets2/js/plugins/css3-animate-it-plugin/css3-animate-it.js"></script>
<!-- <script src="<?php echo base_url();?>assets2/js/bootstrap.min.js"></script> -->
<script src="<?php echo base_url();?>assets2/js/plugins/metismenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url();?>assets2/js/plugins/blockui-master/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets2/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets2/js/plugins/wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo base_url();?>assets2/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url();?>assets2/js/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
	CKEDITOR.replace('editor1');


    $("#nrGames1").change(function() {
  var value = +$(this).val();
  value *= 1;
  var nr = 0;
  var elem = $('#games1').empty();
  while (nr < value) {
    elem.append($('<input type="text" placeholder="الفروع" class="form-control"></br>',{name : "whateverNameYouWant"}));
    nr++;
  }
});

    
	$(document).ready(function () {
		// Form Wizard
		if ($.isFunction($.fn.bootstrapWizard))
		{
			$('#rootwizard').bootstrapWizard({
				tabClass: 'wizard-steps',
				onTabShow: function ($tab, $navigation, index)
				{
					$tab.prevAll().addClass('completed');
					$tab.nextAll().removeClass('completed');
					$tab.removeClass('completed');
				}

			});

			$(".validate-form-wizard").each(function (i, formwizard)
			{
				var $this = $(formwizard);
				var $progress = $this.find(".steps-progress div");

				var $validator = $this.validate({
					rules: {
						username: {
							required: true,
							minlength: 3
						},
						password: {
							required: true,
							minlength: 3
						},
						confirmpassword: {
							required: true,
							minlength: 3
						},
						email: {
							required: true,
							email: true,
							minlength: 3,
						}
					}
				});

				// Validation
				var checkValidaion = function (tab, navigation, index)
				{
					if ($this.hasClass('validate'))
					{
						var $valid = $this.valid();
						if (!$valid) {
							$validator.focusInvalid();
							return false;
						}
					}

					return true;
				};

				$this.bootstrapWizard({
					tabClass: 'wizard-steps',
					onNext: checkValidaion,
					onTabClick: checkValidaion,
					onTabShow: function ($tab, $navigation, index)
					{
						$tab.removeClass('completed');
						$tab.prevAll().addClass('completed');
						$tab.nextAll().removeClass('completed');
					}
				});
			});
		}
	});
</script>

 
 
 
<script src="<?php echo base_url();?>js/plugins/blockui-master/jquery.blockUI.js"></script>
 

 



<script src="<?php echo base_url();?>js/functions.js"></script>


<script src="<?php echo base_url();?>js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/extensions/Buttons/js/buttons.html5.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/extensions/Buttons/js/buttons.colVis.js"></script>



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.calendars.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.plugin.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.calendars.plus.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.calendars.picker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.calendars.picker-ar.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.calendars.ummalqura.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.calendars.ummalqura-ar.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/calendar-convert.js"></script>

<script type="text/javascript">

	var calGer = $.calendars.instance();
    var calHj = $.calendars.instance('ummalqura', 'ar');
					
	$(function() {
	
		$('#pickCalGer').calendarsPicker($.extend({
			calendar: calGer,
			onSelect: function (date) {
				convertDtFromGerToHijri(date, 'pickCalHj');
			},
			showTrigger: '#calImg',
			dateFormat: 'dd/mm/yyyy',
		}));

		$('#pickCalHj').calendarsPicker($.extend({
			calendar: calHj,
			onSelect: function (date) {
				convertDtFromHijriToGer(date, 'pickCalGer');
			},
			showTrigger: '#calImg',
			dateFormat: 'dd/mm/yyyy',
		},
			$.calendarsPicker.regionalOptions['ar'])
		);		
		
	});
</script>







<script>
	$(document).ready(function () {
		$('.dataTables-example').DataTable({
			dom: '<"html5buttons" B>lTfgitp',
			buttons: [
				{
					extend: 'copyHtml5',
					exportOptions: {
						columns: [ 0, ':visible' ]
					}
				},
				{
					extend: 'excelHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: ':visible'
					}
				},
				'colvis'
			]
		});
	});
</script>



</body>
</html>