 
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Mouldifi - A fully responsive, HTML5 based admin theme">
<meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, Mouldifi, web design, CSS3">
 	
 	<title><?php 
	 if ($this->session->userdata('lang')==2) {
                  $this->load->language('test_lang', 'english');
                }else
                $this->load->language('ar_lang', 'ar');
                echo $this->lang->line("adcom"); ?></title>
                
<!-- Site favicon -->
<link rel='shortcut icon' type='image/x-icon' href="<?php echo base_url();?>assets2/images/Logo-colors.ico">
<!-- /site favicon -->
<!-- Entypo font stylesheet -->
<link rel="stylesheet" href="<?php echo base_url();?>assets2/css/entypo.css">
<!-- /entypo font stylesheet -->

<!-- Font awesome stylesheet -->
<link rel="stylesheet" href="<?php echo base_url();?>assets2/css/font-awesome.min.css">
<link href="<?php echo base_url();?>assets2/css/plugins/datepicker/bootstrap-datepicker.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets2/css/plugins/colorpicker/bootstrap-colorpicker.css" rel="stylesheet">
<!-- /font awesome stylesheet -->

<!-- CSS3 Animate It Plugin Stylesheet -->
<link rel="stylesheet" href="<?php echo base_url();?>assets2/css/plugins/css3-animate-it-plugin/animations.css">
<!-- /css3 animate it plugin stylesheet -->

<!-- Bootstrap stylesheet min version -->
<link rel="stylesheet" href="<?php echo base_url();?>assets2/css/bootstrap.min.css">
<!-- /bootstrap stylesheet min version -->

<!-- Mouldifi core stylesheet -->
<link rel="stylesheet" href="<?php echo base_url();?>assets2/css/mouldifi-core.css">
<!-- /mouldifi core stylesheet -->

<link rel="stylesheet" href="<?php echo base_url();?>assets2/css/mouldifi-forms.css">

<!-- Bootstrap RTL stylesheet min version -->
 <?php 
	 if ($this->session->userdata('lang')==1):
	      ?>
	     <!-- Bootstrap RTL stylesheet min version -->
<link rel="stylesheet" href="<?php echo base_url();?>assets2/css/bootstrap-rtl.min.css">
<!-- /bootstrap rtl stylesheet min version -->

<!-- Mouldifi RTL core stylesheet -->
<link rel="stylesheet" href="<?php echo base_url();?>assets2/css/mouldifi-rtl-core.css">
<!-- /mouldifi rtl core stylesheet -->

	
	 
 <?php endif; ?>
<!-- /mouldifi rtl core stylesheet -->
<link href="<?php echo base_url();?>assets2/css/plugins/datatables/jquery.dataTables.css" rel="stylesheet">
<link href="<?php echo base_url();?>assets2/js/plugins/datatables/extensions/Buttons/css/buttons.dataTables.css" rel="stylesheet"> 
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
<![endif]-->
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

	<script src="http://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>   
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1018/styles/kendo.common.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1018/styles/kendo.rtl.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1018/styles/kendo.silver.min.css"/>
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2017.3.1018/styles/kendo.mobile.all.min.css"/>
    <script src="https://kendo.cdn.telerik.com/2017.3.1018/js/kendo.all.min.js"></script>
	<script src="https://ZulNs.github.io/libs/calendar.js"></script>
	<script src="https://ZulNs.github.io/libs/hijri-date.js"></script>
	<link rel="stylesheet" href="https://ZulNs.github.io/libs/calendar.css"/>
	<link href="https://codepen.io/zulns/full/PmEbMO/" target="blank"/> 
</head>
<link rel="stylesheet" href="<?php echo base_url();?>assets2/css/style.css">




<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->


<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets2/css/ummalqura.calendars.picker.css">

<link rel="stylesheet" href="<?php echo base_url();?>assets2/css/site.css" />





<body >
	<div class="page-container">

	<!-- Page Sidebar -->
		<div class="page-sidebar" style="background:#ebebe0;">
		<!-- Site header  -->
		 

		 
	 	 	 

	 
			
			
			
			 
			 

		
			 
				 
			

			
	 	
   
		 
			 

<style>
    .text-line {
        background-color: transparent;
        color:            #333;
        outline:          none;
        outline-style:    none;
        outline-offset:   0;
        border-top:       none;
        border-left:      none;
        border-right:     none;
        border-bottom:    solid #333 1px;
        /*padding: 3px 10px;*/
    }

    .tdfirst {
        width: 40%
    }

    .tdthird {
        width: 30%
    }

    span {
        font-size:   small;
        font-weight: bolder;

    }

    .table td {
        border-top: none !important;
    }

    #bgtext_left {
        position:  absolute;
        color:     lightgrey;
        opacity:   0.5;
        font-size: 40px;
        transform: rotate(320deg);
        top:       500px;
        left:      400px;
    }

    #bgtext_right {
        position:  absolute;
        color:     lightgrey;
        opacity:   0.5;
        font-size: 40px;
        transform: rotate(320deg);
        top:       200px;
        left:      800px;
    }

    #watermark_down {
        position:       fixed;
        width:          100%;
        opacity:        0.1;
        height:         100%;
        z-index:        99999;
         /*background: "ssss" center no-repeat;*/
        background:url(<?php echo base_url();?>'images/111.png') center no-repeat;
        pointer-events: none;
    }

    #watermark_right {
        position:       fixed;
        width:          100%;
        height:         100%;
        top:            350px;
        left:           550px;
        opacity:        0.1;
        z-index:        99999;
        /* background: "ssss" center no-repeat;*/
        background:     url(<?php echo base_url();?>'images/111.png') center no-repeat;
        pointer-events: none;
    }

     #watermark_center {
        position:       fixed;
        width:          100%;
        height:         100%;
        top:            150px;
        right:           60px;
        opacity:        0.1;
        z-index:        99999;
         /*background: "ssss" center no-repeat;*/
        background:     url(<?php echo base_url();?>'images/111.png') center no-repeat;
        pointer-events: none;
    }

    #watermark_left {
        position:       fixed;
        width:          100%;
        height:         100%;
        top:            20px;
        right:           360px;
        opacity:        0.1;
        z-index:        99999;
       /* background: "ssss" center no-repeat;*/
      background:     url(<?php echo base_url();?>'images/111.png') center no-repeat;
        pointer-events: none;
    }

</style>



  <script type="text/javascript">
// $(document).ready(function(){
// $('#note_message').click();
// });

var note_count =0;
var uType    = <?php echo $this->session->userdata('type') ?>
 


// setInterval(function(){ alert("Hello"); }, 3000);
setInterval(function(){
   $.ajax({
   type:'ajax',
   method: 'get',
   url:'<?php echo base_url();?>users/getNotifiction',
   tables:'<?php echo base_url();?>users/getNotifiction',
   dataType: 'json',
   success: function(data){
    
    var my_count = data.length;
    $('.my_count').html("<b style='color:red;'>"+my_count+"</b>");

    if(my_count > note_count)
    {
    $('#notifications').html('');
    $('#notifications1').html('');
    for(var i = 0 ; i < my_count ; i++)
    {

     if(uType == 6)
    $('#notifications').prepend(
        '<a class="dropdown-item media bg-flat-color-2" href="<?php //echo base_url();?>clients/mview/'+data[i].oid+'"'+
        '<span class="message media-body">'+
        '<span class="name float-left">'+data[i].sender_name+'</span>'+
        '<span class="time float-right">'+data[i].created_at+'</span>'+
        '<p>'+data[i].message+'</p></span></a>');

    if(uType == 5)

         if(data[i].tables == 'ccmessage')
         $('#notifications').prepend(
        '<a class="dropdown-item media bg-flat-color-2" href="<?php //echo base_url();?>customercare/mview1/'+data[i].oid+ '">'+
        '<span class="message media-body">'+
        '<span class="name float-left">'+data[i].sender_name+'</span>'+
        '<span class="time float-right">'+data[i].created_at+'</span>'+
        '<p>'+data[i].message+'</p></span></a>');
        else if(data[i].tables == 'addcode')
         $('#notifications1').prepend(
        '<a class="dropdown-item media bg-flat-color-2" href="<?php //echo base_url();?>customercare/viewcode/'+data[i].oid+ '">'+
        '<span class="message media-body">'+
        '<span class="name float-left">'+data[i].sender_name+'</span>'+
        '<span class="time float-right">'+data[i].created_at+'</span>'+
        '<p>'+data[i].message+'</p></span></a>');
        else
        $('#notifications').prepend(
        '<a class="dropdown-item media bg-flat-color-2" href="<?php //echo base_url();?>customercare/mview/'+data[i].oid+ '">'+
        '<span class="message media-body">'+
        '<span class="name float-left">'+data[i].sender_name+'</span>'+
        '<span class="time float-right">'+data[i].created_at+'</span>'+
        '<p>'+data[i].message+'</p></span></a>');
  
    
    if(uType == 4)
    $('#notifications').prepend(
        '<a class="dropdown-item media bg-flat-color-2" href="<?php echo base_url();?>users/deal_edit/'+data[i].oid+'"'+
        '<span class="message media-body">'+
        '<span class="name float-left">'+data[i].sender_name+'</span>'+
        '<span class="time float-right">'+data[i].created_at+'</span>'+
        '<p>'+data[i].message+'</p></span></a>');
   // if(uType == 3)
   //  $('#notifications').prepend(
   //      '<a class="dropdown-item media bg-flat-color-2" href="<?php echo base_url();?>users/deal_edit/'+data[i].oid+'"'+
   //      '<span class="message media-body">'+
   //      '<span class="name float-left">'+data[i].sender_name+'</span>'+
   //      '<span class="time float-right">'+data[i].created_at+'</span>'+
   //      '<p>'+data[i].message+'</p></span></a>');

   }
   note_count = my_count;
 }
},
fail: function(){
    alert('fail');
}

    })
},
2000);
</script>



 




