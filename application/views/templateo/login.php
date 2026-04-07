<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Mouldifi - A fully responsive, HTML5 based admin theme">
<meta name="keywords" content="Responsive, HTML5, admin theme, business, professional, Mouldifi, web design, CSS3">
<title>الاتصالات الادارية</title>
<!-- Site favicon -->
<link rel='shortcut icon' type='image/x-icon' href='images/favicon.ico' />
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

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
<![endif]-->

<link href="<?php echo base_url();?>css/style.css" rel="stylesheet">
</head>
<body class="login-page" style="background:#ffffff;">
	<?php echo form_open('users/login');?>
	<div class="login-pag-inner">
		<div class="animatedParent animateOnce z-index-50">
			<div class="login-container animated growIn slower">
				<div class="login-branding">
					<a href="index.html"><img src="<?php echo base_url();?>images/111.png" alt="Mouldifi" title="الاتصالات الادارية"></a>
				</div>
				<div class="login-content" style="background:#ebebe0;">
					<h2><strong></strong>تسجيل الدخول</h2>
					<form method="post" action="index.html">                        
						<div class="form-group">
							<input type="text" name="username" placeholder="اسم المستخدم" class="form-control">
						</div>                        
						<div class="form-group">
							<input type="password" name="password" placeholder=" السIHTESHAM" class="form-control">
						</div>
					 
						  
						             <div class="form-group">	  
								 <select name="lang" class="form-control" style="padding:2px" >
  <option value="1">عربي</option>
  <option value="2">english</option>
   
</select>
						     
						 
						 
					 </br>
         
         
						 
						<div class="form-group">
							<button type="submit" name="submitForm" value="formSave" class="btn btn-success btn-block">الدخول</button>
							 <?php echo form_close(); ?>
						</div>
						<!--<p class="text-center"><a href="forgot-password.html">هل نسيت كلمة السر?</a></p>    -->                    
					 
				</div>
			</div>
		</div>
	</div>
<!--Load JQuery-->
<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<!-- Load CSS3 Animate It Plugin JS -->
<script src="<?php echo base_url();?>js/plugins/css3-animate-it-plugin/css3-animate-it.js"></script>
<script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
</body>
</html>
