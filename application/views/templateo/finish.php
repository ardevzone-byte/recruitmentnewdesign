<!doctype html>
<html lang="en">

<head>
<title>التقديم على التوظيف</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">

<link rel="icon" href="<?php echo base_url();?>/assets/imeges/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/bootstrap/css/bootstrap.min.rtl.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/parsleyjs/css/parsley.css">

<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" media="all" />
        
<!-- MAIN CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css"><link rel="stylesheet" href="<?php echo base_url();?>assets/css/rtl.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/color_skins.css">
</head>
<body class="theme-cyan rtl" style="background-color:#a4a4a4;">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="../assets/images/logo-icon.svg" width="48" height="48" alt="Lucid"></div>
        <p>Please wait...</p>        
    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper">
 
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-md-6">
                                  
                            </div>
                             <div class="col-md-6">
                                  <img style="width:80px;" src="<?php echo base_url();?>/assets/imeges/saleh.PNG"   alt="Lucid" >

                                     <img style="width:60px;" src="<?php echo base_url();?>/assets/imeges/logo.PNG"   alt="Lucid" >  
                               
                                      <a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" href="<?php echo site_url('users/dashbord_analyses102')?>" class="btn btn-outline-dark float-right"> الرئيسية</a>  
                            </div>




                              
                        </div>
                   

                         
                       
                        
                    </div>            
                    
                </div>
            </div>
   <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/register'); ?>
            <div class="row clearfix">
                   
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            
 <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;">           </h2>
 

                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate>

                                 


                                 <div class="form-group">
                                   
                <div class="col-lg-12 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> الاخ   : <?php echo $customers['name']; ?> <!-- <i class=" icon-speedometer float-right"> -->
        <a type="button" href="" style="font-family: 'Tajawal', sans-serif; 
    font-style: normal; font-size:30px;" class="badge badge-success float-right">
    <i class="fa fa-check-circle"></i> 
    <span>      مسجل</span>
</a> 

 



 

               <a type="button" href="<?php echo site_url('users/appointment/'.$customers['id']); ?>" class="btn btn-outline-dark float-right">اضافة موعد للمقابلة</a>
       

                





</i>
</h3>
                            <span style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> تم اضافة  بياناتك بنجاح</span>        
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                            <div class="progress-bar" data-transitiongoal="100"></div>
                        </div>
                    </div>
                </div>
               
                                </div>

  

                               <!--  <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="submit" name="submitForm" value="formSave" class="btn btn-primary"> ارسال</button> -->
 
                            </form>
                        </div>
                    </div>
                </div>
               
         
            </div>
              <?php echo form_close(); ?>
            
        </div>
    
    
</div>

<!-- Javascript -->
<script src="<?php echo base_url();?>assets/bundles/libscripts.bundle.js"></script>    
<script src="<?php echo base_url();?>assets/bundles/vendorscripts.bundle.js"></script>

<script src="<?php echo base_url();?>/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?php echo base_url();?>/assets/vendor/parsleyjs/js/parsley.min.js"></script>
    
<script src="<?php echo base_url();?>assets/bundles/mainscripts.bundle.js"></script>
<script>
    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
    </script>
</body>
</html>

