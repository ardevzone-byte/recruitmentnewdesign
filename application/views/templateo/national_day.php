<!doctype html>
<html lang="en">

<head>
<title>         التقديم على وظيفة   </title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?php echo base_url()  ;?>/assets/vendor/bootstrap/css/bootstrap.min.rtl.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/font-awesome/css/font-awesome.min.css">

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/rtl.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/color_skins.css">
 <link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" media="all" />
 <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">
</head>

 

<body class="theme-cyan rtl" style="background-color:#ffffff;">
    <?php echo form_open('users/national_day');?>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class=" ">
				<div class="auth-box ">
                    <div class="top">
                         <img src="<?php echo base_url();?>/assets/imeges/marsoom.PNG" style="width:100px;" alt="Lucid">  
                    </div>
					<div class="card">
                        <div class="header">
                              <p class="lead" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;">         </p>

                           
                        </div>
                        <div class="body">
                            <form class="form-auth-small" action="index.html">
                                <div class="form-group">
                                    <p  style="color:#F7B565; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">     الاسم     </p>
                                    <input  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" type="text" name="name" class="form-control" id="signin-email" value=""   autocomplete="off" required>
                                </div>
                                 <div class="form-group">
                                    <p  style="color:#F7B565; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">      رقم الجوال     </p>
                                    <input  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" type="text" name="mobile" pattern="[0][5][0-9]{8}" class="form-control" id="signin-email" value=""   autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <p  style="color:#F7B565; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         البريد الالكتروني     </p>
                                    <input  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" type="email" name="email" class="form-control" id="signin-email" value=""   autocomplete="off" required>
                                </div>

                                 
                                

                                <button type="submit" name="submitForm" value="formSave" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; background-color:#F7B565; " class="btn btn-primary btn-lg btn-block"  >التالي</button>
                                
                            </form>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
 <?php echo form_close(); ?>
</body>
</html>

