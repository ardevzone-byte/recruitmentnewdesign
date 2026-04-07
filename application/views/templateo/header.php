<!doctype html>
<html lang="en">

<head>
<title>marsoom</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
<meta name="author" content="WrapTheme, design by: ThemeMakker.com">
<!-- <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet"> -->
<link rel="icon" href="<?php echo base_url();?>favicon.ico" type="image/x-icon">
 <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css"> 

<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/jquery-datatable/fixedeader/dataTables.fixedcolumns.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/jquery-datatable/fixedeader/dataTables.fixedheader.bootstrap4.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/sweetalert/sweetalert.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/rangeslider/css/ion.rangeSlider.css" />

 <link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/morrisjs/morris.min.css" />

<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/rangeslider/css/ion.rangeSlider.skinFlat.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    


<!-- VENDOR CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/bootstrap/css/bootstrap.min.rtl.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/parsleyjs/css/parsley.css">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/roundslider/roundslider.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/material-rangeslider/style.css" />


<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/roundslider/style.css" />

<!-- MAIN CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/rtl.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/color_skins.css">


<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link rel="stylesheet" href="<?= base_url('assets/css/custom-style.css') ?>">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css" />
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/multi-select/css/multi-select.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/nouislider/nouislider.min.css" />


<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">


<link href="//db.onlinewebfonts.com/c/ce7b5754581057e6f7444e2192850cc8?family=Sakkal+Majalla" rel="stylesheet" type="text/css"/>
<!-- SweetAlert Plugin Js --> 




<!-- <link rel="stylesheet" type="text/css"
          href="<?php echo base_url();?>assets/css/style1.css"/> -->






<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
</style>

<style>
    td.details-control {
    background: url('../assets/imeges/details_open.png') no-repeat center center;
    cursor: pointer;
}
    tr.shown td.details-control {
        background: url('../assets/imeges/details_close.png') no-repeat center center;
    }
</style>

<style>
    .demo-card label{ display: block; position: relative;}
    .demo-card .col-lg-4{ margin-bottom: 30px;}
</style>
    



</head>
<body class="theme-cyan rtl">
<?php if($this->session->userdata('logged_in')): ?>
<div class="test-menu" dir="rtl">
    <h5>🚀 قائمة الاختبار (أنت مسجل كـ: <span style="color: white;"><?= $this->session->userdata('name') ?></span>)</h5>
    <?php $role = $this->session->userdata('role'); ?>

    <?php if($role == 'manager'): ?>
        <a href="<?= base_url('index.php/requisitions/create') ?>" class="btn btn-sm btn-primary">1. (مدير) إنشاء طلب احتياج</a>
    <?php endif; ?>

   
    <?php if($role == 'recruitment_manager'): ?>
        <a href="<?= base_url('index.php/requisitions/create') ?>" class="btn btn-sm btn-primary">1. (مدير) إنشاء طلب احتياج</a>
        <a href="<?= base_url('index.php/requisitions/approvals') ?>" class="btn btn-sm btn-warning text-dark">2. (مدير توظيف) مراجعة الطلبات</a>
        
        <a href="<?= base_url('index.php/jobs') ?>" class="btn btn-sm btn-success">3. (أخصائي) نشر الوظائف</a>
        
    <?php endif; ?>
    <?php if($role == 'ceo'): ?>
        <a href="<?= base_url('index.php/requisitions/create') ?>" class="btn btn-sm btn-primary">1. (مدير) إنشاء طلب احتياج</a>
        <a href="<?= base_url('index.php/requisitions/approvals') ?>" class="btn btn-sm btn-danger">2. (رئيس تنفيذي) مراجعة الطلبات</a>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="<?php echo base_url();?>/assets/imeges/logo111.PNG" width="48" height="48" alt="Lucid"></div>
          
    <p  style=" color:#ffffff; font-family: 'Tajawal', sans-serif;
    font-style: normal; font-size:30px;">  برنامج التوظيف</p>  

  


    </div>
</div>
<!-- Overlay For Sidebars -->

<div id="wrapper" >

    <nav class="navbar navbar-fixed-top" style="background-color:#CBCBCB;">
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
            </div>

            <div class="navbar-brand">
                <a><img src="<?php echo base_url();?>/assets/imeges/logo.PNG" style="width:35px;" alt="Lucid Logo" class="img-responsive logo"></a>

                <label style="font-family: 'Sakkal Majalla', sans-serif;
    font-style: normal; font-size:20px;">برنامج التوظيف</label>
                
                             
            </div>
            
            <div class="navbar-right">
                          

                <div id="navbar-menu">
                    <ul class="nav navbar-nav">
                       


                  <?php $id=$this->session->userdata('type');
                               if ($id == 6):?> 

                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                                <i class="icon-bell"></i>
                                <span class="notification-dot"></span>
                            </a>
                        </li>
                        <?php endif?>
 
                      

                        <li style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                            <a href="javascript:window.history.go(-1);" class="icon-menu">رجوع<i  class="icon-action-redo"></i></a>
                        </li>

                        <li style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                            <a href="<?php echo base_url();?>users/logout" class="icon-menu">خروج<i    class="icon-login"></i></a>
                        </li>
 

                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div id="left-sidebar" class="sidebar" style="background-color:#CBCBCB;">
        <div class="sidebar-scroll">
            <div class="user-account">
                <img src="<?php echo base_url();?>/assets/imeges/user.png" class="rounded-circle user-photo" alt="User Profile Picture">
                <div class="dropdown">
                    <span style="font-family: Sakkal Majalla, sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#000000;">مرحباً,</span>
                    <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><!-- Salim Alajmi --><?php echo $this ->session->userdata('name'); ?></strong></a>
                    <ul class="dropdown-menu dropdown-menu-right account">
                        <li style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="<?php echo base_url();?>users/my_profile"><i class="icon-user"></i>صفحتي الشخصية</a></li>
                        
<?php $id=$this->session->userdata('type');
                               if ($id == 3):?> 

                       <!--  <li style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="javascript:void(0);"><i class="icon-settings"></i>الإعدادات</a></li> -->
  <?php endif?>

  <?php $id=$this->session->userdata('type');
                               if ($id == 3):?> 
                         


                          <li style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:10px;">
                            <a href="<?php echo base_url();?>users/traning" class="icon-menu">تدريب<i style="font-size: 1.2em;" class="icon-social-youtube"></i></a>
                        </li>


                         <?php endif?>



                        <li class="divider"></li>
                        <li style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="<?php echo site_url('users/logout/'); ?>"><i class="icon-power"></i>تسجيل خروج</a></li>
                    </ul>
                </div>
                <hr>
                <?php $id=$this->session->userdata('type');
                               if ($id == 3):?>
                <ul class="row list-unstyled">
                   <!--  <li class="col-4">
                        <small>users</small>
                        <h6>10</h6>
                    </li>
                    <li class="col-4">
                        <small>Mohasel</small>
                        <h6>190</h6>
                    </li>
                    <li class="col-4">
                        <small>admin</small>
                        <h6>2</h6>
                    </li> -->
                </ul>
                <?php endif?>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#menu">Menu</a></li>

 <?php $id=$this->session->userdata('type');
                               if ($id == 3):?> 
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Chat"><i class="icon-book-open"></i></a></li>

 <?php endif?>

                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#setting"><i class="icon-settings"></i></a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#question"><i class="icon-question"></i></a></li>                
            </ul>
                
            <!-- Tab panes -->
            <div class="tab-content p-l-0 p-r-0">
                <div class="tab-pane active" id="menu">
                    <nav id="left-sidebar-nav" class="sidebar-nav">
                                <ul id="main-menu" class="metismenu">                            
                            <li style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                <a href="" class="has-arrow"><i class="icon-home"></i> <span>الرئيسية</span></a>
                                <ul>


                                      <li  ><a href="<?php echo base_url();?>users/re_password">إعادة    تعيين كلمة السر</a></li>

                                      

                                        <?php $id=$this->session->userdata('type');
                               if ($id == 7):?> 

                                 <li  ><a href="<?php echo base_url();?>users/dashbord_analyses102"> الرئيسية</a></li>


                              <!--     <li  ><a href="<?php echo base_url();?>users/dashbord_analyses"> الرئيسية</a></li> -->
                               <li  ><a href="<?php echo base_url();?>users/re_password">إعادة    تعيين كلمة السر</a></li>
                                <li  ><a  href="<?php echo base_url();?>users/dashbord_analyses1111">     تصدير بيانات المرشحين</a></li>


                                  <li  ><a  href="<?php echo base_url();?>users/dashbord_analyses11115555">     تصدير بيانات  المقابلات</a></li>


                                     <li  ><a  href="<?php echo base_url();?>users/id_insert">         البحث  </a></li>

                                         <li  ><a  href="<?php echo base_url();?>users/print_report">       تقرير طلبات التوظيف     </a></li>



                                   









                                   

                                    <!--   <li  ><a href="<?php echo base_url();?>users/id_number">هويات المرشحين</a></li>


                                  

                                    <li  ><a href="<?php echo base_url();?>users/message_list"> الرسائل والاستفسارات</a></li>

                                     <li  ><a href="<?php echo base_url();?>users/dashbord_analyses">    لوحة تحكم طلبات التوظيف</a></li> -->


                                      


                                     


                                     <?php endif?>

                                        <?php $id=$this->session->userdata('type');
                               if ($id == 3):?> 
  <li  ><a  href="<?php echo base_url();?>users/dashbord_analyses11115555">     تصدير بيانات  المقابلات</a></li>
  <li  ><a  href="<?php echo base_url();?>users/id_insert">         البحث  </a></li>
                                 <?php endif?>



                                    <?php $id=$this->session->userdata('type');
                               if ($id == 3):?> 

                                 <li  ><a href="<?php echo base_url();?>users/dashbord_analyses102"> الرئيسية</a></li>


                               <!--    <li  ><a href="<?php echo base_url();?>users/dashbord_analyses"> الرئيسية</a></li> -->



                                    <li  ><a href="<?php echo base_url();?>users/user_report">المستخدمين</a></li>

                                      <li  ><a href="<?php echo base_url();?>users/id_number">هويات المرشحين</a></li>

                                      <li  ><a  href="<?php echo base_url();?>users/dashbord_analyses1111">     تصدير بيانات المرشحين</a></li>




                                    <li  ><a href="<?php echo base_url();?>users/order_list1"> طلبات التوظيف</a></li>

                                    <li  ><a href="<?php echo base_url();?>users/message_list"> الرسائل والاستفسارات</a></li>

                                     <li  ><a href="<?php echo base_url();?>users/dashbord_analyses">    لوحة تحكم طلبات التوظيف</a></li>



                                      <li  ><a  href="<?php echo base_url();?>users/dashbord_report">     التقارير     </a></li>


                                       <li  ><a href="<?php echo base_url();?>users/watch_report">المراقبة</a></li>


                                     


                                     <?php endif?>
                                    
                                   
                                    <?php $id=$this->session->userdata('type');
                               if ($id == 1):?>

                                    <li  ><a href="<?php echo base_url();?>users/dashbord_analyses103">          الرئيسية</a></li>

                                    
                                       <li  ><a href="<?php echo base_url();?>users/re_password">إعادة    تعيين كلمة السر</a></li>
                                     <?php endif?>
    
                                    
                                   
                                    <?php $id=$this->session->userdata('type');
                               if ($id == 4):?>

                                    <li  ><a href="<?php echo base_url();?>users/dashbord_analyses103">          الرئيسية</a></li>

                                    
                                       <li  ><a href="<?php echo base_url();?>users/re_password">إعادة    تعيين كلمة السر</a></li>
                                     <?php endif?>
                                    


                                      <?php $id=$this->session->userdata('type');
                               if ($id == 2):?>


                                    <li  ><a href="<?php echo base_url();?>users/dashbord_analyses103">          الرئيسية</a></li>

                                    
                                
                                       <li  ><a href="<?php echo base_url();?>users/re_password">إعادة    تعيين كلمة السر</a></li>
                               

                                      
                                     <?php endif?>

 
                                </ul>
                            </li>
                           
                        </ul>
                    </nav>
                </div>
                <div class="tab-pane p-l-15 p-r-15" id="Chat">
                    
                    <ul class="right_chat list-unstyled">

                        <li class="online">
                           <!--  <a href="javascript:void(0);">
                                <div class="media">
                                   <i style="font-size: 1.2em;" href="<?php echo base_url();?>users/traning"  class="icon-social-youtube"></i>
                                    <div class="media-body">


                                          

                                         <span style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="name">تدريب</span>

                                     
                                    </div>
                                </div>
                            </a>         -->                    
                        </li>
                        
                        <li class="offline">
                            <!-- <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="../assets/imeges/user.png" alt="">
                                    <div class="media-body">
                                        <span class="name">ssss</span>
                                        <span class="message">Moshrif</span>
                                        <span class="badge badge-outline status"></span>
                                    </div>
                                </div>
                            </a>     -->                        
                        </li>
                         
                                       
                    </ul>
                </div>
                <div class="tab-pane p-l-15 p-r-15" id="setting">
                    <h6>Choose Skin</h6>
                    <ul class="choose-skin list-unstyled">
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>                   
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="cyan" class="active">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="blush">
                            <div class="blush"></div>
                            <span>Blush</span>
                        </li>
                    </ul>
                    <hr>
                     <?php $id=$this->session->userdata('type');
                               if ($id == 3):?> 
                    <h6>General Settings</h6>
                    <ul class="setting-list list-unstyled">
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Report Panel Usag</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Email Redirect</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox" checked>
                                <span>Notifications</span>
                            </label>                      
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Auto Updates</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Offline</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" name="checkbox">
                                <span>Location Permission</span>
                            </label>
                        </li>
                    </ul>
                    <?php endif?>
                </div>
                <div class="tab-pane p-l-15 p-r-15" id="question">
                    
                    <ul class="list-unstyled question">
                      
                    </ul>
                </div>                
            </div>          
        </div>
    </div>