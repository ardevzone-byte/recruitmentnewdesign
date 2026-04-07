<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Mouldifi - A fully responsive, HTML5 based admin theme">
<meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, Mouldifi, web design, CSS3">
<!-- <title>Mouldifi | Basic Tables</title> -->
<!-- Site favicon -->
<link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url();?>images/favicon.ico' />
<!-- /site favicon -->

<!-- Entypo font stylesheet -->
<link href="<?php echo base_url();?>css/entypo.css" rel="stylesheet">
<!-- /entypo font stylesheet -->

<!-- Font awesome stylesheet -->
<link href="<?php echo base_url();?>css/font-awesome.min.css" rel="stylesheet">
<!-- /font awesome stylesheet -->

<!-- CSS3 Animate It Plugin Stylesheet -->
<link href="<?php echo base_url();?>css/plugins/css3-animate-it-plugin/animations.css" rel="stylesheet">
<!-- /css3 animate it plugin stylesheet -->

<!-- Bootstrap stylesheet min version -->
<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
<!-- /bootstrap stylesheet min version -->

<!-- Mouldifi core stylesheet -->
<link href="<?php echo base_url();?>css/mouldifi-core.css" rel="stylesheet">
<!-- /mouldifi core stylesheet -->

<link href="<?php echo base_url();?>css/mouldifi-forms.css" rel="stylesheet">

<!-- Bootstrap RTL stylesheet min version -->
<link href="<?php echo base_url();?>css/bootstrap-rtl.min.css" rel="stylesheet">
<!-- /bootstrap rtl stylesheet min version -->

<!-- Mouldifi RTL core stylesheet -->
<link href="<?php echo base_url();?>css/mouldifi-rtl-core.css" rel="stylesheet">
<!-- /mouldifi rtl core stylesheet -->
<link href="<?php echo base_url();?>css/plugins/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="<?php echo base_url();?>js/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet"> 
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
<![endif]-->

</head>
<body>
	<?php 
		$x = explode(',',$deals['dfile']);
		$xx = count($x);
		$c=0;
		while( $c < $xx)
		{
	?>
		<!-- <a target="_blank" title="  <?php  echo $this->lang->line("attup"); ?>  " class="btn btn-download" href='<?php echo base_url(); ?>assets/imeges/posts/<?php echo $x[$c]; ?>' ><i class="fa fa-cloud-download" ></i> <?php echo $x[$c];?></a> -->
			<!--li class="k-button" deselectable="on">
			<img class="card-img-top" src="<?php echo base_url();?>/upload/<?php echo $x[$c];?>" alt="Card image cap" class="img-fluid"></a>
				<a href="<?php echo base_url();?>"><span deselectable="on"><?php echo $x[$c];?></span></a>
			</li-->	
	<?php
		$c++;
		}
	?>		
<!-- <div class="table-responsive"> -->
         <!--  <table class="table table-striped table-bordered table-hover dataTables-example"> -->
							 <table >
								<thead  > 
									<tr> 
<th   style="font-size:15px">  
										&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تركة صاحب السمو الملكي الأمير</br>
										 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;مشعل بن عبدالعزيز (يرحمه الله )&nbsp;&nbsp;&nbsp;&nbsp;</br>
										</th>
									</tr>
								</thead>
							</table>
									 <table >
								<thead  >
									<tr> 


										 
										<th   >     
										   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; لجنة تصفية التركة</br>   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    نوع المـــعاملة :  <?php
										$dete = date('mY'); echo $deals['mode'];?> / <?php echo $deals['modest'];?></br>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;   التاريــــــــــخ: <?php  echo $deals['hdate'];?></br>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     عدد المرفقات:<?php echo $c;?></br>    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       الرقم الموحد :<?php echo $deals['did'];?> - <?php  echo $dete;?></th>
										<th>
										 
										</th> 


										
											<th  >
												  
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>

											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
											<th  >
										</th>
										 
										 
										 

											<th  >
										</th>
											<th  >

										</th>


										<th id="qrcode" >
  </br><input id="text" type="hidden" value="192.168.100.113/ac/users/deal_edit/<?php echo $deals['did'];?>" > </th> 

										  
									</tr> 
								</thead> 
								 
							</table>
						<!-- </div> -->
                       
		<div class="row">

			<div class="col-lg-3 animatedParent animateOnce z-index-50">
				 
			</div>
 
			 
		</div>

<!-- Page container -->
 <!-- /page container -->

<!--Load JQuery-->
<script src="<?php echo base_url();?>js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/jszip.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/extensions/Buttons/js/buttons.html5.js"></script>
<script src="<?php echo base_url();?>js/plugins/datatables/extensions/Buttons/js/buttons.colVis.js"></script>
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

 

<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<!-- Load CSS3 Animate It Plugin JS -->
<script src="<?php echo base_url();?>js/plugins/css3-animate-it-plugin/css3-animate-it.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>js/plugins/metismenu/jquery.metisMenu.js"></script>
<script src="<?php echo base_url();?>js/plugins/blockui-master/jquery-ui.js"></script>
<script src="<?php echo base_url();?>js/plugins/blockui-master/jquery.blockUI.js"></script>
<script src="<?php echo base_url();?>js/functions.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<?php// echo validation_errors();  echo form_open_multipart('users/deal_add'); ?>

<style>
p.normal {
  font-weight: normal;
}

p.light {
  font-weight: lighter;
}

p.thick {
  font-weight: bold;
}

p.thicker {
  font-weight: 900;
}
</style>


<style>

table#albums 
{
    border-collapse:separate;
    border-spacing:0 5px;
}


tr.spaceUnder>td {
  padding-bottom: 1em;
}


#cal-1, #cal-2 {
  margin-left: 12px;
  margin-top: 10px;
}
.icon-button {
  width: 30px;
}
input {
  width: 243px;
  margin-bottom: 8px;
}
.checkbox-label{
	float:right;
	margin-right:230px;
}
#qrcode {
  width:65px;
  height:65px;
  margin-top:35px;
}
</style>
<script>
	/////////////////



function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})

	///////////////

$(function (){
	var qrcode = new QRCode("qrcode");
	function makeCode () {		
		var elText = document.getElementById("text");
		if (!elText.value) {
			//alert("Input a text");
			elText.focus();
			return;
		}
		qrcode.makeCode(elText.value);	
	}
	makeCode();
	//alert(qrcode[0]);
	$("#text").
		on("blur", function () {
			makeCode();
		}).
		on("keydown", function (e) {
			if (e.keyCode == 13) {
				makeCode();
			}
		});
	$('#Save').click(function(){	
		/*var disc = $("textarea#editor1").val();
		alert(disc);
		if(disc.val()==''){
			disc.parent().parent().addClass('has-error');
			return false;
		}else{
			disc.parent().parent().removeClass('has-error');
			result +='1';
		}
		if(result=='1'){
			
			alert('ook');
			
		}*/
	});

// Calender	
	var cal1 = new Calendar(),
    cal2 = new Calendar(true, 0, false, true),
    date1 = document.getElementById('date-1'),
    date2 = document.getElementById('date-2'),
    cal1Mode = cal1.isHijriMode(),
    cal2Mode = cal2.isHijriMode();

document.getElementById('cal-1').appendChild(cal1.getElement());
document.getElementById('cal-2').appendChild(cal2.getElement());
cal1.show();
cal2.show();
setDateFields();

cal1.callback = function() {
  if (cal1Mode !== cal1.isHijriMode()) {
    cal2.disableCallback(true);
    cal2.changeDateMode();
    cal2.disableCallback(false);
    cal1Mode = cal1.isHijriMode();
    cal2Mode = cal2.isHijriMode();
  }
  else
    cal2.setTime(cal1.getTime());
  setDateFields();
};

cal2.callback = function() {
  if (cal2Mode !== cal2.isHijriMode()) {
    cal1.disableCallback(true);
    cal1.changeDateMode();
    cal1.disableCallback(false);
    cal1Mode = cal1.isHijriMode();
    cal2Mode = cal2.isHijriMode();
  }
  else
    cal1.setTime(cal2.getTime());
  setDateFields();
};

function setDateFields() {
  date1.value = cal1.getDate().getDateString();
  date2.value = cal2.getDate().getDateString();
}

function showCal1() {
  if (cal1.isHidden()) cal1.show();
  else cal1.hide();
}

function showCal2() {
  if (cal2.isHidden()) cal2.show();
  else cal2.hide();
}

// checkbox 
$('.list').on('change', function() {
		$('.list').not(this).prop('checked', false);  
});
$('.list1').on('change', function() {
		$('.list1').not(this).prop('checked', false);  
});




//Add more	
		var i=1;
		$('#add').click(function(){
			i++;
			$('#dynamic_field').append('<tr id="row'+i+'"><td>'+
				'<input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" />'+
				'<input type="text" name="phone[]" placeholder="Enter your phone" class="form-control name_list" />'+
				'<input type="text" name="mail[]" placeholder="Enter your mail" class="form-control name_list" />'+
				'<input type="text" name="job[]" placeholder="Enter your job" class="form-control name_list" />'+
				'<input type="text" name="address[]" placeholder="Enter your address" class="form-control name_list" />'+
				'<button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
		});
//Remove		
		$(document).on('click', '.btn_remove', function(){
			var button_id = $(this).attr("id"); 
			$('#row'+button_id+'').remove();
		});
		
		/*$('#submit').click(function(){		
			$.ajax({
				url:"name.php",
				method:"POST",
				data:$('#add_name').serialize(),
				success:function(data)
				{
					alert(data);
					$('#add_name')[0].reset();
				}
			});
		});*/
		

	
});
		
	
	
/**************************    Choose Radieo          ****************************/
function refree() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    var y = document.getElementById("ifno");
    if (y.style.display != "none") {
        y.style.display = "none";
    }

}
function ifchooseno() {
    var x = document.getElementById("ifno");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
    var y = document.getElementById("myDIV");
    if (y.style.display != "none") {
        y.style.display = "none";
    }
}
function hide() {
    var x = document.getElementById("ifno");
    if (x.style.display != "none") {
        x.style.display = "none";
    }
    var y = document.getElementById("myDIV");
    if (y.style.display != "none") {
        y.style.display = "none";
    }
}

/********************************************/

	
</script>	

<script>
///////////////////
function printData()
{
   var divToPrint=document.getElementById("printTable");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('button').on('click',function(){
printData();
})
 
/////////////////
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);

}

	///////////////
// multiselect AutoComplete
    $("#multiselect").kendoMultiSelect();
	var multiselect = $("#multiselect").data("kendoMultiSelect");
    $("#autocomplete").kendoAutoComplete({
         dataSource: [ "Apples", "Oranges","Apples1", "Oranges1","Apples2", "Oranges2","Apples3", "Oranges3","Apples4", "Oranges4" ],
          select: function(e) {
            var item = e.item;
            var text = item.text();
            
            var data = multiselect.dataSource;
            data.add({text: text})
            alert(data);
          }
    });
	
	
/*
// Upload Multi Files
$("#d").click(function() {

	alert('ok');
	$('#files').change(function(){
		
		var files = $('#files')[0].files;
		var error = '';
		var form_data = new FormData();
		for(var count = 0; count < files.length; count++){
			var name = files[count].name;
			var extt = name.split('.').pop()toLowerCase();
			if(jquery.inArray(extt,['doc','docx','pdf','png','jpg','jpeg']) == -1){
				error += "Invalid" + count + " Image"
				//alert('error');
			}else{
				form_data.append("files[]",files[count]);
			}
		}
		if(error == ''){
			$.ajax({
				url:"<?php echo base_url();?>users/deal_add",
				method:POST,
				data:form_data,
				contentType:false,
				cache:false,
				processData:false,
				beforsend:functio()
				{
					$('#upload').html("<label class'text-sucess'>uploading...</label>")
				},
				sucess:function(data)
				{
					$('#upload').html(data);
					$('#files').val('');
				}
			});
		}else{
			alert(error);
		}
	});
});*/
</script>
</body>
</html>
