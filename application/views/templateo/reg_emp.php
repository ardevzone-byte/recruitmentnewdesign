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

<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">


</head>
<body class="theme-cyan rtl" style="background-color:#d8d7db;">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="<?php echo base_url();?>/assets/imeges/logo.PNG" width="48" height="48" alt="Lucid"></div>
        <p style="font-family: 'Tajawal', sans-serif;
    font-style: normal; font-size:30px; color:#000000;">الرجاء الانتظار...</p>         
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
                            </div>

                              
                        </div>
                   

                         
                       
                        
                    </div>            
                    
                </div>
            </div>
   <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/reg_emp/'.$id); ?>
            <div class="row clearfix">
                   
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            
 <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;">الرجاء قم بتعبئة بيانات النموذج ادناه</h2>

</br>

    <h2 style="background-color:#f1f1f1; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">اولاً : البيانات الشخصية</h2>
 

                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate>
 

                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> الاسم  رباعي باللغة العربية  / Employee Full Name by Arabic</label>
                                    <input readonly="readonly" value="<?php echo $customers['name']; ?>" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px; background-color:#DAD8D8;" value="<?php //echo $customer1['name']; ?>" type="text" name="name" class="form-control">
                                </div>


                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">        الجنسية    / nationality     </label>
                                    <input readonly="readonly" value="<?php echo $customers['Nationality']; ?>" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px; background-color:#DAD8D8;" value="<?php //echo $customer1['name']; ?>" type="text" name="name" class="form-control">
                                </div>


                                     <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">        الحالة الإجتماعية    / Marital Statusnationality     </label>
                                    <input readonly="readonly" value="<?php echo $customers['marital_status']; ?>" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px; background-color:#DAD8D8;" value="<?php //echo $customer1['name']; ?>" type="text" name="name" class="form-control">
                                </div>

                                    <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">           رقم الجوال    /    Mobile     </label>
                                    <input readonly="readonly" value="<?php echo $customers['mobile']; ?>" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px; background-color:#DAD8D8;" value="<?php //echo $customer1['name']; ?>" type="text" name="name" class="form-control">
                                </div>




                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> الاسم  رباعي باللغة الانجليزية   / Employee Full Name in English </label> <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="name_en" class="form-control" required>
                                </div>



                                  <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> رقم الهوية   / Nic / Iqama</label>
                                    <input readonly="readonly" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" placeholder="10 ارقام" pattern="[0-9]{10}" name="id_number"  value="<?php echo $id; ?>" class="form-control">
                                </div>

                                 <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">    تاريخ انتهاء الهوية  / Expiry date of NI</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                             <input name="date_of_end_id" data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="dd/mm/yyyy">
                                        </div>
                                    </div>


                                
                              


</br>
                               

  

                                <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         الديانة  / Religion</label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="religion" value="مسلم" required data-parsley-errors-container="#error-radio">
                                        <span><i></i> مسلم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="religion" value="غير مسلم">
                                        <span><i></i>  غير مسلم</span>
                                    </label>

                                 
                                    <p id="error-radio"></p>
                                </div>



                                 

                                <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         تاريخ الميلاد  / Date of Birth </label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                             <input required name="date_of_birth" data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="dd/mm/yyyy">
                                        </div>
                                    </div>

                               


                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         مكان الميلاد  / Place of Birth </label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="place_of_birth" class="form-control" required>
                                </div>

                                

                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         رقم الهاتف  / Tell no.</label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="tell_no" class="form-control" >
                                </div>

                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         العنوان الحالي  / permanent Address</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="address" class="form-control" required>
                                </div>


                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         البريد الالكتروني / Personal Email</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="email" name="email" class="form-control" required>
                                </div>


                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         المهنة في الاقامة  /   Profession Iqama</label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="profession_Iqama" class="form-control" >
                                </div>


                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         رقم رخصة المحاماة  /  .Lawyer License No.  (خاص بالمحاميين)</label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="lawyer_license_no" class="form-control" >
                                </div>


                                <h2 style="background-color:#f1f1f1; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"> ثانياً :     العنوان الوطني   / National address</h2>


     <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">               رقم المبنى   / BUILDING NUMBER </label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="biilding_number" class="form-control" required>
                                </div>
                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">               اسم الشارع   / STREET NAME</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="street_name" class="form-control" required>
                                </div>

                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                اسم الحي   /  THE NAME OF THE NEIGHBORHOOD</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="the_name_of_the_neighborhood" class="form-control" required>
                                </div>

                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                 اسم المدينة   /    THE CITY NAME</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="the_city_name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                  الرمز البريدي     /         POSTAL CODE</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="postal_code" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                    الرقم الإضافي   /         ADDITIONAL NUMBER</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="additional_number" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                    رقم الوحدة   /UNIT NUMBER</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="unit_number" class="form-control" required>
                                </div>






                                 <h2 style="background-color:#f1f1f1; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"> ثالثاً :  المؤهلات العلمية   / EDUCATION</h2>

                <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">              المؤهل العلمي / Qualification</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="qualification1" class="form-control" required>
                                </div>
                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">              التخصص   / MAJOR</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="major" class="form-control" required>
                                </div>

                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">              المعدل / النسبة  / GPA</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="gpa" class="form-control" required>
                                </div>

                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">              الجهة التعليمية   / Educational Institution</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="educational_institution" class="form-control" required>
                                </div>


                                  <div class="form-group">
                                         <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">              تاريخ التخرج  / DATE OF GRADUATION</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                             <input required name="date_of_graduation" data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="dd/mm/yyyy">
                                        </div>
                                    </div>

 

                                  <h2 style="background-color:#f1f1f1; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"> رابعاً :  المعرفين   / REFERENCES</h2>


      <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                 اسم المعرف الأول   / Identifier 1</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="identifier1" class="form-control" required>
                                </div>


                                  <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                 المدينة  / City</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="city1" class="form-control" required>
                                </div>

                                  <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                 المسمى الوظيفي   / Job title</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="job_title1" class="form-control" required>
                                </div>

                                  <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                 رقم الجوال   /  phone Number</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="mobile1" class="form-control" required>
                                </div>

                                  <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                 اسم المعرف الثاني  / Identifier 2</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="identifier2" class="form-control" required>
                                </div>

                                  <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                 المدينة   / City</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="city2" class="form-control" required>
                                </div>

                                  <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                 المسمى الوظيفي   / Job title</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="job_title2" class="form-control" required>
                                </div>

                                  <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">                 رقم الجوال  / phone Number</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="mobile2" class="form-control" required>
                                </div>


                                   <h2 style="background-color:#f1f1f1; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"> خامساً :   الخبرة الوظيفية  / Last Work Experience</h2>

    <!-- ///////////////11///////////// -->

<a id="myDIV222222222222" class="btn btn-primary" style=" color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction13()">اضافة  خبرات  جديدة</a>

<div style="display:none;" id="myDIV333333333333" >
<div class="row">
    
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="text" placeholder=" اسم الشركة / المكتب / Company" name="company" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder=" المسمى الوظيفي / Job Title" type="number" name="job_title3" class="form-control"  >
    </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="     عدد سنوات الخبرة / Work years    " type="text" name="work_years" class="form-control"  >
    </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="     اجمالي الراتب / Salary   " type="number" name="salary_old" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1013()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction14()">اضافة    خبرات جديدة</a>

<div style="display:none;" id="myDIV3333333333333" >
<div class="row">
    
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="text" placeholder=" اسم الشركة / المكتب / Company" name="company1" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="      عدد سنوات الخبرة / Work years   " type="number" name="job_title31" class="form-control"  >
    </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder=" المسمى الوظيفي / Job Title" type="text" name="work_years1" class="form-control"  >
    </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="      اجمالي الراتب / Salary   " type="number" name="salary_old1" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1014()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction15()">اضافة    خبرات جديدة</a>

<div style="display:none;" id="myDIV33333333333333" >
<div class="row">
     
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="text" placeholder=" اسم الشركة / المكتب / Company" name="company2" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder=" المسمى الوظيفي / Job Title" type="number" name="job_title32" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="   عدد سنوات الخبرة / Work years " type="text" name="work_years2" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="  اجمالي الراتب / Salary" type="number" name="salary_old2" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1015()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
</br>
<!-- //////////////////////////// -->
<a id="myDIV222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction16()">اضافة    خبرات جديدة</a>


 </br>
                               
                                <h2 style="background-color:#f1f1f1; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"> سادساً :      الدورات التدريبية  / Training Course and skills</h2>
    <div class="row">
 
    <a id="myDIV1" class="btn btn-primary" style="display:block; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction()">اضافة  دورة جديد</a>


 
</div>

    <div style="display:none;" id="myDIV" >
    <div class="row">
     
    <div class="col-md-3">
         <div class="form-group">
             <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                     font-style: normal; font-size:12px;" type="text" name="course1" class="form-control" placeholder="اسم الدورة"  >
        </div>
        
    </div>
    
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction101()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    
    </div>
</div>
   
                                
</div>

 
<!-- //////////////////////////// -->
<div class="row">
  <a id="myDIV2" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction2()">اضافة  دورة جديدة  </a>
  </br>
</div>

<div style="display:none;" id="myDIV3" >
 <div class="row">
    
    
    <div class="col-md-3">
         <div class="form-group">
           <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="text" name="course2" class="form-control" placeholder="اسم الدورة"  >
         </div>
    </div>
    
    
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction102()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
 
</div>
</div>
</div>
 
                                

<!-- //////////////////////////// -->



<!-- //////////////////////////// -->
<div class="row">
<a id="myDIV22" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction3()">اضافة  دورة جديدة  </a>
  </div>

<div style="display:none;" id="myDIV33" >
 <div class="row">
    
     <div class="col-md-3">
        <div class="form-group">
        <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
         font-style: normal; font-size:12px;" type="text" placeholder=" اسم الدورة" name="course3" class="form-control"  >
    </div>
    </div>
     
     <div class="col-md-3">
         <button type="button" class="btn btn-danger" onclick="myFunction103()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
    
</div>
<!-- //////////////////////////// -->



<!-- //////////////////////////// -->
<div class="row">
<a id="myDIV222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction4()">اضافة  دورة جديدة  </a>
  </div>

<div style="display:none;" id="myDIV333" >
<div class="row">
     
     <div class="col-md-3">
        <div class="form-group">
       <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
          font-style: normal; font-size:12px;" type="text" placeholder="اسم الدورة" name="course4" class="form-control"  >
   </div>
    </div>
      
     <div class="col-md-3">
         <button type="button" class="btn btn-danger" onclick="myFunction104()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- //////////////////////////// -->
<div class="row">
<a id="myDIV2222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction5()">اضافة دورة جديدة  </a>
  </div>

<div style="display:none;" id="myDIV3333" >
<div class="row">
     
     <div class="col-md-3">
        <div class="form-group">
        <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
       font-style: normal; font-size:12px;" type="text" placeholder="اسم الدورة" name="course5" class="form-control"  >
       </div>
    </div>
     
     <div class="col-md-3">
         <button type="button" class="btn btn-danger" onclick="myFunction105()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
  
</div>
<!-- //////////////////////////// -->

<!-- //////////////////////////// -->
<div class="row">
<a id="myDIV22222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction6()">اضافة  دورة جديدة </a>
  </div>

<div style="display:none;" id="myDIV33333" >
 <div class="row">
    
    <div class="col-md-3">
        <div class="form-group">
    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
       font-style: normal; font-size:12px;" type="text" placeholder="اسم الدورة" name="course6" class="form-control"  >
   </div>
    </div>
     
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction106()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
  
</div>
<!-- //////////////////////////// -->


<!-- //////////////////////////// -->
<div class="row">
<a id="myDIV222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction7()">اضافة دورة جديدة</a>
  </div>

<div style="display:none;" id="myDIV333333" >
<div class="row">
     
     <div class="col-md-3">
        <div class="form-group">
   <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
         font-style: normal; font-size:12px;" placeholder="اسم الدورة" type="text" name="course7" class="form-control"  >
  </div>
    </div>
      
     <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction107()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>

  
</div>
<!-- //////////////////////////// -->



<!-- //////////////////////////// -->
<div class="row">
<a id="myDIV2222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction8()">اضافة  دورة جديدة</a>
  </div>

<div style="display:none;" id="myDIV3333333" >
<div class="row">
     
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
       font-style: normal; font-size:12px;" type="text" placeholder="اسم الدورة" name="course8" class="form-control"  >
 </div>
    </div>
    
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction108()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>

 
</div>
<!-- //////////////////////////// -->

<!-- //////////////////////////// -->
<div class="row">
<a id="myDIV22222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction9()">اضافة  دورة جديدة  </a>
  </div>

<div style="display:none;" id="myDIV33333333" >
 <div class="row">
     
    <div class="col-md-3">
         <div class="form-group">
      <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
          font-style: normal; font-size:12px;" placeholder=" اسم الدورة" type="text" name="course9" class="form-control"  >
    </div>
    </div>
    
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction109()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
  
</div>
<!-- //////////////////////////// -->


<!-- //////////////////////////// -->
<div class="row">
<a id="myDIV222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction10()">اضافة  دورة جديدة  </a>
  </div>

<div style="display:none;" id="myDIV333333333" >
<div class="row">
     
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="text" placeholder="اسم الدورة" name="course10" class="form-control"  >
    </div>
    </div>
    
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1010()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->
<!-- ///////////////11///////////// -->
<div class="row">
<a id="myDIV2222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction11()">اضافة  دورة جديدة  </a>
  </div>

<div style="display:none;" id="myDIV3333333333" >
<div class="row">
    
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="text" placeholder=" اسم الدورة" name="course11" class="form-control"  >
    </div>
    </div>
    
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1011()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->
<div class="row">
<a id="myDIV22222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction12()">اضافة دورة جديدة  </a>
  </div>

 
<!-- //////////////////////////// -->
</br>
<a  class="btn btn-secondary btn-block" style="color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;">     إلتزام  و إقرار   </a>


<div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         1-  أقر بأنني غير مرتبط بأي عمل أخر أو دراسة أو أي شيء يعوقني عن ممارسة عملي بالشركة بصفة دائمة وفي حال إثبات خلاف ذلك يجوز للشركة إنهاء خدماتي من العمل.  </br>
2-  ستتم إضافة بدل اتصالات للموظف لذا يتوجب توفير رقم وانترنت وهاتف متنقل خاص بالعمل للاستخدام في كافة الإجراءات المتعلقة بالعمل.</br>
3-  اتعهد بالالتزام بمدة التحصيل ورفع القضايا على العملاء من تاريخ المباشرة واقر ان (الشركة /المكتب) الحق في حرماني من العمولة الشهرية في حال تم إنهاء العلاقة التعاقدية بسبب استقالة او غيرها خلال الثلاثة أشهر الأولى.</br>
4-  اتعهد بالالتزام بمدة التحصيل ورفع القضايا على العملاء من تاريخ المباشرة واقر ان (الشركة /المكتب) الحق في حرماني من العمولة الستة أشهر في حال تم إنهاء العلاقة التعاقدية بسبب استقالة او غيرها خلال الستة أشهر الأولى.</br>
5-  اتعهد بإشعار المكتب والشركة بصورة من رخصة المحاماة فور حصولي على ترخيص مزاولة مهنة محامي، والعمل في المكتب بمدة مماثلة في حال رغب الطرفين بذلك، بتوقيع عقد عمل وفي حال عدم ذلك يحق للمكتب إنهاء خدماتي من تاريخ نهاية التدريب. "محامي متدرب"</br>
6-  اتعهد بالالتزام حفاظاً للسرية وتفادي للمشاكل نظراً للالتزام مع المصرف بسرية المعلومات وللمشاكل التي نلاقيها مع العملاء نتيجة طباعة او تصوير شاشات غير صحيحة أو غير محدثة لبيانات العملاء على أنظمة المصرف عن طريق الموظفين مع العلم بان هذه الشاشات تعتبر دليل ضدنا بما فيها من بيانات في حالة إن كانت غير صحيحة حيث أن العميل المدين يبحث عن مخرج او دليل للتهرب من المديونية لذلك يمنع نهائيا طباعة أو تصوير أي شاشة من أنظمة المصرف سواء كانت صحيحة او خاطئة للعملاء مهما كانت الظروف وعند الحاجة الضرورية يطلب الموظف من المشرف خطاب إثبات مديونية أو خطاب حث على المرسوم أو غيره مع العلم بانه في حالة وجود مخالفة سواء كانت من الموظف أو المشرف بخصوص ذلك سوف يعاقب ويتحمل مسؤولية الاضرار.</br>
7-  اقر بأن جميع البيانات والمعلومات المدونة في النموذج كاملة وصحيحة ويعد أي إخطار من (الشركة/ المكتب) عن طريق هذه البيانات بمثابة إخطار بعلم الوصول وفي حال تغيير أي من البيانات سوف أقوم بتزويد المسؤول بالبيانات الجديدة.</br>
8-  يتم صرف العمولات الشهرية بعد إتمام ثلاثة أشهر من تاريخ المباشرة. 
                                    <br />
                                    9-عدم نقل الخدمات  للوافدين.

                                    </label>
                                   
                                 
    </div>



  <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">  أوافق على جميع الشروط </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="agree" value="1" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>نعم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="agree" value="2">
                                        <span><i></i>لا</span>
                                    </label>
                                    <p id="error-radio"></p>
    </div>

 </br>


                                <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="submit" name="submitForm" value="formSave" class="btn btn-primary"> ارسال</button>
 
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

<script src="<?php echo base_url();?>/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script>


  function myFunction101() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction102() {
  var x = document.getElementById("myDIV3");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction103() {
  var x = document.getElementById("myDIV33");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction104() {
  var x = document.getElementById("myDIV333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction105() {
  var x = document.getElementById("myDIV3333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}
function myFunction106() {
  var x = document.getElementById("myDIV33333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}
function myFunction107() {
  var x = document.getElementById("myDIV333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction108() {
  var x = document.getElementById("myDIV3333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}


function myFunction109() {
  var x = document.getElementById("myDIV33333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}
function myFunction1010() {
  var x = document.getElementById("myDIV333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1011() {
  var x = document.getElementById("myDIV3333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1012() {
  var x = document.getElementById("myDIV33333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}


function myFunction1013() {
  var x = document.getElementById("myDIV333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1014() {
  var x = document.getElementById("myDIV3333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1015() {
  var x = document.getElementById("myDIV33333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}






  function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV1");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  var x = document.getElementById("myDIV2");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }



}


function myFunction2() {
  var x = document.getElementById("myDIV3");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  var x = document.getElementById("myDIV22");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }



  }


  function myFunction3() {
  var x = document.getElementById("myDIV33");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction4() {
  var x = document.getElementById("myDIV333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction5() {
  var x = document.getElementById("myDIV3333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


   function myFunction6() {
  var x = document.getElementById("myDIV33333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


    function myFunction7() {
  var x = document.getElementById("myDIV333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction8() {
  var x = document.getElementById("myDIV3333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


   function myFunction9() {
  var x = document.getElementById("myDIV33333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }



  function myFunction10() {
  var x = document.getElementById("myDIV333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


    function myFunction11() {
  var x = document.getElementById("myDIV3333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


     function myFunction12() {
  var x = document.getElementById("myDIV33333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


   function myFunction13() {
  var x = document.getElementById("myDIV333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }

  }


   function myFunction14() {
  var x = document.getElementById("myDIV3333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


   function myFunction15() {
  var x = document.getElementById("myDIV33333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }

  function myFunction16() {
  var x = document.getElementById("myDIV333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }




    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
    </script>
</body>
</html>

