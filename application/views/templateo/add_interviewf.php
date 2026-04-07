<!doctype html>
<html lang="en">

<head>
<title>   المقابلة الإلكترونية  </title>
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
        <div class="m-t-30"><img src="<?php echo base_url();?>/assets/imeges/logo111.PNG" width="48" height="48" alt="Lucid"></div>
        <p style="font-family: 'Tajawal', sans-serif;
    font-style: normal; font-size:30px; color:#ffffff;">الرجاء الانتظار...</p>         
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
                                  <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">جهة العمل المرشح للعمل بها  <?php if ($c['Employer'] == 1) {
      echo "شركة مرسوم";
    }else echo "مكتب الدكتور صالح الجربوع"; ?></label>
                                     
                                </div>
                            </div>
                             <div class="col-md-6">
                                 <!--  <img style="width:80px;" src="<?php echo base_url();?>/assets/imeges/saleh.PNG"   alt="Lucid" > -->
                                 <?php if ($c['Employer'] == 1): ?>  
                                   <img style="width:60px;" src="<?php echo base_url();?>/assets/imeges/logo.PNG"   alt="Lucid" > 
      <?php else: ?> 


                                     <img style="width:60px;" src="<?php echo base_url();?>/assets/imeges/saleh.PNG"   alt="Lucid" >   

                                     <?php endif ?> 
                            </div>


                              
                        </div>
                   
                   

                         
                       
                        
                    </div>            
                    
                </div>
            </div>
   <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/add_interviewf/'.$id); ?>
            <div class="row clearfix">
                   
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            
 <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;">الرجاء قم بتعبئة بيانات النموذج ادناه  لوظيفة  (<?php echo $c['job_name_detailes']; ?>)</h2>

</br>

    <h2 style="background-color:#f1f1f1; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">  المقابلة الإلكترونية  </h2>
 

                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate>

                                <div class="row">
  <div class="col-md-4">

                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> رقم الهوية   / Nic / Iqama</label>
                                    <input readonly="readonly" style="background-color:#d8d7db;" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" value="<?php echo $c['id_number']; ?>" pattern="[0-9]{10}" name="id_number" class="form-control">
                                </div>


  </div>
  <div class="col-md-4">
 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">   تصنيف الوظيفة</label>
                                    <input   style="background-color:#d8d7db; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" readonly="readonly" style="background-color:#d8d7db;" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" value="<?php echo $c['job_name']; ?>" pattern="[0-9]{10}" name="job_name" class="form-control">
                                </div>
    </div>


 <div class="col-md-4">
 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">  الوظيفة المرشح لها</label>
                                    <input   style="background-color:#d8d7db; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" readonly="readonly" style="background-color:#d8d7db;" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" value="<?php echo $c['job_name_detailes']; ?>" pattern="[0-9]{10}" name="job_name_detailes" class="form-control">
                                </div>
    </div>


</div>


<div class="row">
  <div class="col-md-4">
     <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">       المؤهل العلمي</label>
                                    <input   style="background-color:#d8d7db; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" value="<?php echo $c['qualification1']; ?>" readonly="readonly" style="background-color:#d8d7db;" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" value="<?php echo $c['qualification1']; ?>" pattern="[0-9]{10}" name="qualification1" class="form-control">
                                </div>
  </div>
   <div class="col-md-4">
     <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">       التخصص</label>
                                    <input   style=" background-color:#d8d7db; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" readonly="readonly" value="<?php echo $c['specialization']; ?>" style="background-color:#d8d7db;" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" value="<?php echo $c['specialization']; ?>" pattern="[0-9]{10}" name="specialization" class="form-control">
                                </div>
  </div>
</div>
                               

  <input style=" display:none; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" readonly="readonly" style="background-color:#d8d7db;" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text"  value="<?php echo $c['Employer']; ?>" pattern="[0-9]{10}" name="Employer" class="form-control">
                                 




<div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>


                                  <div class="row">
  <div class="col-md-8">
    <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> الاسم  رباعي باللغة العربية  / Employee Full Name by Arabic</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <input autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="name" class="form-control" required>
                                </div>
  </div>
</div>



<div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>



                               <div class="row">
  <div class="col-md-4">
     <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         تاريخ الميلاد  / Date of Birth </label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                             <input autocomplete="off" required name="date_of_birth" data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="dd/mm/yyyy">
                                        </div>
                                    </div>
  </div>

</div>


                   
<div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>


                                

                                   <div class="col-lg-3 col-md-6">
                                       <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         الجنسية  / Nationality</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                          <div class="input-group-prepend">
                                   <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="icon-notebook"></i></span>
                                            </div>

                                         <input list="brow" name="nationality" required>
 <datalist id="brow">
  <option value="السعودية"> السعودية</option>
  
  <option value="القبائل النازحة">القبائل النازحة</option>

   <option value="يمني  (زوج مواطنة )">يمني  (زوج مواطنة )</option>
     <option value="يمني  (ابن مواطنة )">يمني  (ابن مواطنة )</option>
      <option value="سوري  (زوج مواطنة )">سوري  (زوج مواطنة )</option>
     <option value="سوري  (ابن مواطنة )">سوري  (ابن مواطنة )</option>

  
  <option value="" disabled selected>إختر</option>
 
 
   
  
   
  <option value="البحرين">البحرين</option>
  
    
  
  <option value="مصر">مصر</option>

 


  <option value="العراق">العراق</option>

  <option value="فلسطين">فلسطين</option>

  <option value="الأردن">الأردن</option>

  <option value="الكويت">الكويت</option>
 

  <option value="سلطنة عمان">سلطنة عمان</option>
 
 
  <option value="الصومال">الصومال</option>
 

  <option value="السودان">السودان</option>

  <option value="سوريا">سوريا</option>

  <option value="الإمارات العربية المتحدة">الإمارات العربية المتحدة</option>

  <option value="اليمن">اليمن</option>
   
</datalist>  
                                </div>
                                    </div>


                                </br>

                                <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>



                                    <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         الحالة الاجتماعية  / Marital Status</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="marital_status" value="أعزب" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>أعزب</span>
                                    </label>

                                      <label class="fancy-radio">
                                        <input type="radio" name="marital_status" value="مطلق" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>مطلق</span>
                                    </label>

                                    
                                    <label class="fancy-radio">
                                        <input type="radio" name="marital_status" value="متزوج">
                                        <span><i></i> متزوج</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>

<div class="row">
  <div class="col-md-4">
       <div class="form-group hidden-inputMatrial">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">عدد أفراد الأسرة</label> 
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="number" name="family_members" class="form-control">
                                </div>

  </div>
</div>
              

              <div class="row">
  <div class="col-md-4">
    <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         رقم الجوال  /Mobile number</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>

     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" autocomplete="off" type="text" pattern="[0][5][0-9]{8}" name="mobile" class="form-control" placeholder="" required>



                                     
                                </div>

  </div>
  </div>                



                                 




 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>

  <div  id="inputGroupSelect01" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> 
<span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
        1    
    </strong>
</span> 
 هل سبق لك عمل مقابلة شخصية  لدى شركة مرسوم   ؟</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    
                                    <label class="fancy-radio" >
                                        <input   type="radio" name="q1"  value="نعم" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>نعم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input    type="radio" name="q1"  value="2">
                                        <span><i></i>لا</span>
                                    </label>
                                 
                                    <p id="error-radio"></p>
                                </div>

 <div class="row">
  <div class="col-md-4">
      <div class="form-group hidden-input">
                                         <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:13px;">              تاريخ  المقابلة        </label>
                                        <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:13px;" class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                            </div>
                                             <input autocomplete="off" name="Date_of_the_interview_old" data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="dd/mm/yyyy">
                                        </div>
                                    </div>

  </div>
</div>
                               
                                  


                                   
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>



                                 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"><span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
        2    
    </strong>
</span> 
هل لديك حمل حالي؟</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="q22" value="نعم" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>نعم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q22" value="لا">
                                        <span><i></i> لا</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>



 <div class="row">
  <div class="col-md-4">
     <div class="form-group hidden-input122">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">        شهر الحمل    </label>
                                   <select name="month_of_ch" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الأول" selected>الأول</option>
    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الثاني" >الثاني</option>
    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الثالث" >الثالث</option>
    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الرابع" >الرابع</option>
    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الخامس" >الخامس</option>
    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="السادس" >السادس</option>
    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="السابع" >السابع</option>
    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الثامن" >الثامن</option>
    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="التاسع" >التاسع</option>
                                    
                                   
                                </select>
                                </div>

  </div>
</div>

                                 

                                <div class="form-group hidden-input122"  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;">
                                    
                                     <label class="fancy-radio">
                                        <input type="radio" name="ch_count" value="جنين واحد "  data-parsley-errors-container="#error-radio">
                                        <span><i></i> جنين واحد </span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="ch_count" value=" متعددة الأجنة ">
                                        <span><i></i>   متعددة الأجنة  </span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>



 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>


                                 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"><span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
        3    
    </strong>
</span> 
هل لديك أطفال   من عمر (  ثلاث سنوات الى ست سنوات)  ؟</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="q23" value="نعم" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>نعم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q23" value="لا">
                                        <span><i></i> لا</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>



 <div class="row">
  <div class="col-md-4">

    <div class="form-group hidden-input123">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">           عدد الأطفال     </label>
                                    <input autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="number" name="kids" class="form-control">
                                </div>

  </div>
</div>

                                  



 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>


                                 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"><span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
        4    
    </strong>
</span> 
هل لديك أطفال   من عمر (  شهر الى سنتين)  ؟</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="q24" value="نعم" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>نعم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q24" value="لا">
                                        <span><i></i> لا</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>

 <div class="row">
  <div class="col-md-4">
      <div class="form-group hidden-input124">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">           عدد الأطفال     </label>
                                    <input autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="number" name="kids2" class="form-control">
                                </div>


  </div>
</div>
                                

</br>

 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>


                                 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"><span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
        5    
    </strong>
</span> 
هل أنت على رأس عمل حالياً ؟  ماهو اجمالي الراتب قبل خصم التأمينات ؟</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="q2" value="نعم" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>نعم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q2" value="لا">
                                        <span><i></i> لا</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>


 <div class="row">
  <div class="col-md-4">
       <div class="form-group hidden-input1555">
                                     <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">    مسمى    الوظيفة الحالية   أو اخر وظيفة  </label>
                                    <input autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="current_job" class="form-control">
                                </div>
  </div>
</div>

                               

 <div class="row">
  <div class="col-md-4">
     <div class="form-group hidden-input1">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">           الراتب الحالي أو آخر راتب     </label>
                                    <input autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="salary_befor_cut" class="form-control">
                                </div>
  </div>
</div>
                               




 <?php if ($c['job_name'] =="محصل"):?>
                              
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>


                                <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">

<span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
        6    
    </strong>
</span> 
ماهو مجال التحصيل الذي (تعمل به حالياً /عملت به)  ؟</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                     <ul class="setting-list list-unstyled">
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox"  value="ديون معدومة" name="q3">
                                <span>ديون معدومة</span>
                            </label>
                        </li>


                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" value="تحصيل أقساط شهر" name="q331" checked>
                                <span>تحصيل أقساط شهر</span>
                            </label>
                        </li>



                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" value="غير ذلك" name="q332" checked>
                                <span>غير ذلك</span>
                            </label>                      
                        </li>



                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" value="لا يوجد خبرة تحصيل" name="q333">
                                <span>لا يوجد خبرة تحصيل</span>
                            </label>
                        </li>



 
                     </ul>
                                </div>


                              
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>

                                   <?php endif?>


                                 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
<span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
      <?php if ($c['job_name'] =="محصل"):?>
        7   
         <?php else:?>
         6 
           <?php endif?>
    </strong>
</span> 

ماهي أسباب رغبتك بالخروج من عملك الحالي او العمل السابق ؟   (يمكن تحديد اكثر من خيار )</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                  <!--   <label class="fancy-radio">
                                        <input type="radio" name="q4" value="لراتب" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>الراتب</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q4" value=" العمولة">
                                        <span><i></i> العمولة</span>
                                    </label>
                                      <label class="fancy-radio">
                                        <input type="radio" name="q4" value="أوقات العمل">
                                        <span><i></i>  أوقات العمل</span>
                                    </label>
                                      <label class="fancy-radio">
                                        <input type="radio" name="q4" value="خلاف إداري">
                                        <span><i></i> خلاف إداري</span>
                                    </label>
                                      <label class="fancy-radio">
                                        <input type="radio" name="q4" value=" عاطل / متفرغ">
                                        <span><i></i>  عاطل / متفرغ</span>
                                    </label>
                                      <label class="fancy-radio">
                                        <input type="radio" name="q4" value="غير ذلك<">
                                        <span><i></i> غير ذلك</span>
                                    </label>
                                    <p id="error-radio"></p> -->
                                    <ul class="setting-list list-unstyled">
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" value="الراتب" name="q4">
                                <span>الراتب</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" value="العمولة" name="q31" checked>
                                <span>العمولة</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" value="أوقات العمل" name="q32" checked>
                                <span> أوقات العمل</span>
                            </label>                      
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" value="خلاف إداري" name="q33">
                                <span>خلاف إداري</span>
                            </label>
                        </li>
                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" value="عاطل / متفرغ" name="q34">
                                <span> عاطل / متفرغ</span>
                            </label>
                        </li>

                         <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" value="التطوير والبحث عن فرصة عمل أفضل" name="q36">
                                <span>التطوير والبحث عن فرصة عمل أفضل</span>
                            </label>
                        </li>


                        <li>
                            <label class="fancy-checkbox">
                                <input type="checkbox" value="غير ذلك" name="q35">
                                <span> غير ذلك</span>
                            </label>
                        </li>
                     </ul>

                                </div>


                              
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>


                                 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
<span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
       <?php if ($c['job_name'] =="محصل"):?>
        8   
         <?php else:?>
         7 
           <?php endif?>
    </strong>
</span> 


هل لديك أي التزامات مادية (اقساط) ؟ كم القيمة المستقطعة منك شهرياً ؟</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="q5" value="نعم" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>نعم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q5" value="لا">
                                        <span><i></i> لا</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>


 <div class="row">
  <div class="col-md-4">
    <div class="form-group hidden-input3">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">           القيمة     </label>
                                    <input autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="number" name="premium_value" class="form-control">
                                </div>
  </div>
</div>
                                  




                               
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>


                                  <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
<span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
        <?php if ($c['job_name'] =="محصل"):?>
        9   
         <?php else:?>
         8 
           <?php endif?>    
    </strong>
</span> 
     ماهي الفروع التي ترغب بالعمل بها ؟</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="q6" value="الوسطى" required data-parsley-errors-container="#error-radio">
                                        <span><i></i> الوسطى</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q6" value="الشمالية">
                                        <span><i></i> الشمالية</span>
                                    </label>
                                       <label class="fancy-radio">
                                        <input type="radio" name="q6" value="الجنوبية">
                                        <span><i></i> الجنوبية</span>
                                    </label>
                                       <label class="fancy-radio">
                                        <input type="radio" name="q6" value="الغربية">
                                        <span><i></i> الغربية</span>
                                    </label>
                                       <label class="fancy-radio">
                                        <input type="radio" name="q6" value=" الشرقية">
                                        <span><i></i> الشرقية</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>
                              
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>



                                  <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> 

<span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
         <?php if ($c['job_name'] =="محصل"):?>
        10   
         <?php else:?>
         9 
           <?php endif?>   
    </strong>
</span> 


هل يوجد لديك أي من الامراض المزمنة ؟</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="q7" value="نعم" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>نعم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q7" value="لا">
                                        <span><i></i> لا</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>

 <div class="row">
  <div class="col-md-4">
  <div class="form-group hidden-input7">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">           التفاصيل     </label>
                                    <input autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="details7" class="form-control">
                                </div>


  </div>
</div>
                                

                             
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>


                                    <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">

<span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
        <?php if ($c['job_name'] =="محصل"):?>
        11   
         <?php else:?>
         10 
           <?php endif?>    
    </strong>
</span> 


     هل لديك متعثرات لدى اي جهة بنكية أو جهات آخرى ؟ ؟ </label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="q8" value="نعم" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>نعم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q8" value="لا">
                                        <span><i></i> لا</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>



 <div class="row">
  <div class="col-md-4">
      <div class="form-group hidden-input8">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">              اذكر الجهة       </label>
                                    <input autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="details8" class="form-control">
                                </div>

  </div>
</div>

                                


                              
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>

                                <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> 

<span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
         <?php if ($c['job_name'] =="محصل"):?>
        12   
         <?php else:?>
         11 
           <?php endif?>    
    </strong>
</span> 


في حال قبولك نهائياً هل لديك مدة أخطار ( شهر/ شهرين ) انذار ؟ </label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="q9" value="نعم" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>نعم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q9" value="لا">
                                        <span><i></i> لا</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>


 <div class="row">
  <div class="col-md-4">
        <div class="form-group hidden-input9">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">           التفاصيل     </label>
                                    <input autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="details9" class="form-control">
                                </div>
  </div>
</div>
                              


                              
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>


                                  <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">

<span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
         <?php if ($c['job_name'] =="محصل"):?>
        13   
         <?php else:?>
         12 
           <?php endif?>    
    </strong>
</span> 


هل لديك أقرباء او زملاء يعملون لدى شركة مرسوم ؟ </label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="q10" value="نعم" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>نعم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q10" value="لا">
                                        <span><i></i> لا</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>



 <div class="row">
  <div class="col-md-4">
       <div class="form-group hidden-input10">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">           التفاصيل     </label>
                                    <input autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="details10" class="form-control">
                                </div>

  </div>
</div>

                               


                                

                                  

                              
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>



                                 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> <span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
         <?php if ($c['job_name'] =="محصل"):?>
        14   
         <?php else:?>
         13 
           <?php endif?>   
    </strong>
</span> 
كيف كانت طريقة التقديم على الوظيفية ؟</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                   <label class="fancy-radio">
                                        <input type="radio" name="q11" value="لبريد" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>البريد</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q11" value=" موظف">
                                        <span><i></i> موظف</span>
                                    </label>
                                     <label class="fancy-radio">
                                        <input type="radio" name="q11" value=" التواصل الإجتماعي">
                                        <span><i></i> التواصل الإجتماعي</span>
                                    </label>

 <label class="fancy-radio">
                                        <input type="radio" name="q11" value="استقطاب">
                                        <span><i></i>استقطاب</span>
                                    </label>


                                     <label class="fancy-radio">
                                        <input type="radio" name="q11" value=" غير ذلك">
                                        <span><i></i> غير ذلك</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>

                               
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>



                                  <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
    <span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
         <?php if ($c['job_name'] =="محصل"):?>
        15   
         <?php else:?>
         14 
           <?php endif?>   
    </strong>
</span> 

 عدد مرات نقل الخدمات ( لغير السعوديين )</label>
                                    <br />
                                     <label class="fancy-radio">
                                        <input type="radio" name="q12" value="1" data-parsley-errors-container="#error-radio">
                                        <span><i></i>1</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q12" value="2">
                                        <span><i></i>2</span>
                                    </label>
                                      <label class="fancy-radio">
                                        <input type="radio" name="q12" value="3 وأكثر">
                                        <span><i></i>3 وأكثر</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>
                              
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>

                                 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
    <span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
         <?php if ($c['job_name'] =="محصل"):?>
        16   
         <?php else:?>
         15 
           <?php endif?>    
    </strong>
</span> 
 هل لديك القدرة على انهاء اجراءات التوظيف (الكفالة الوظيفية - الأدلة الجنائية - الكشف الطبي)</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                     <label class="fancy-radio">
                                        <input type="radio" name="q13" value="نعم" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>نعم</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q13" value="لا">
                                        <span><i></i> لا</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>
                              </br>
                               </br>
                              
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>


                                <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"><span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
         <?php if ($c['job_name'] =="محصل"):?>
        17   
         <?php else:?>
         16 
           <?php endif?>   
    </strong>
</span> 
ماهو الراتب المتوقع ؟</label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />



                                      <label class="fancy-radio">
                                        <input type="radio" name="q101" value="1" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>ادخل القيمة</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="q101" value="2">
                                        <span><i></i>لا يرغب بالافصاح</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>

                                



<div class="row">
  <div class="col-md-4">
    <div class="form-group  hidden-input15">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">           القيمة     </label>
                                    <input autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="number" name="expected_salary" class="form-control">
                                </div>
</div>
</div>
                                      

                                  


                                   
                                
                                </div>
                               

                              
 <div class="row">
  <div class="col-md-8">
<hr style="height:2px;border-width:0;color:gray;background-color:gray">
</div>
</div>


                               
                              



 
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

 $("input[name='marital_status']").change(function () {
               var marital_status = this.value;
                if (marital_status == 'متزوج') {
                      $(".hidden-inputMatrial").show();
                }else if(marital_status == 'مطلق'){
 $(".hidden-inputMatrial").show();
                  
                }


                 else {
                    $(".hidden-inputMatrial").hide();
                }
            })

   

  $("input[name='q1']").change(function () {
               var q1 = this.value;
                if (q1 == 'نعم') {
                      $(".hidden-input").show();
                } else {
                    $(".hidden-input").hide();
                }
            })


   $("input[name='q101']").change(function () {
               var q1 = this.value;
                if (q1 == '1') {
                      $(".hidden-input15").show();
                } else {
                    $(".hidden-input15").hide();
                }
            })




  // $("input[name='q2']").change(function () {
  //              var q1 = this.value;
  //               if (q1 == 'نعم') {
  //                     $(".hidden-input1").show();
  //               } else {
  //                   $(".hidden-input1").hide();
  //               }
  //           })

   $("input[name='q22']").change(function () {
               var q1 = this.value;
                if (q1 == 'نعم') {
                      $(".hidden-input122").show();
                } else {
                    $(".hidden-input122").hide();
                }
            })


      $("input[name='q23']").change(function () {
               var q1 = this.value;
                if (q1 == 'نعم') {
                      $(".hidden-input123").show();
                } else {
                    $(".hidden-input123").hide();
                }
            })


       $("input[name='q24']").change(function () {
               var q1 = this.value;
                if (q1 == 'نعم') {
                      $(".hidden-input124").show();
                } else {
                    $(".hidden-input124").hide();
                }
            })


  $("input[name='q7']").change(function () {
               var q1 = this.value;
                if (q1 == 'نعم') {
                      $(".hidden-input7").show();
                } else {
                    $(".hidden-input7").hide();
                }
            })
  $("input[name='q8']").change(function () {
               var q1 = this.value;
                if (q1 == 'نعم') {
                      $(".hidden-input8").show();
                } else {
                    $(".hidden-input8").hide();
                }
            })
  $("input[name='q9']").change(function () {
               var q1 = this.value;
                if (q1 == 'نعم') {
                      $(".hidden-input9").show();
                } else {
                    $(".hidden-input9").hide();
                }
            })
  $("input[name='q10']").change(function () {
               var q1 = this.value;
                if (q1 == 'نعم') {
                      $(".hidden-input10").show();
                } else {
                    $(".hidden-input10").hide();
                }
            })


    $("input[name='q5']").change(function () {
               var q1 = this.value;
                if (q1 == 'نعم') {
                      $(".hidden-input3").show();
                } else {
                    $(".hidden-input3").hide();
                }
            })




    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
    </script>

     <script type="text/javascript">

        $("form").submit(function () {
            $("#SaveAndContinue").prop("disabled", true);
            $("#loading-icon").show();
            debugger;
        });

 

</script>
</body>
</html>

