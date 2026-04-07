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
             <?php echo form_open_multipart('users/add_att2/'.$id); ?>
            <div class="row clearfix">
                   
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            
 <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;">الرجاء قم بتعبئة بيانات النموذج ادناه</h2>

</br>

    <h2 style="background-color:#f1f1f1; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">     المرفقات  </h2>
 

                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate>


 <hr style="height:2px;border-width:0;color:gray;background-color:gray">

                              <div  id="inputGroupSelect01" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> 
<span class="fa-stack">
    
    <span class="fa fa-circle-o fa-stack-2x"></span>
    
    <strong class="fa-stack-1x">
        2    
    </strong>
</span>    الهوية / كرت العائلة 
 </label>
                                   
                                   
                                 
                               
                                </div>

                                 
                                   <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;">مرفقات</span>
                                </div>
                                <div class="custom-file">
                                    <input multiple="multiple" type="file" name="userfile" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;">اختار  المرفق   (PDF) أو  (Jbg)</label>
                                </div>
                            </div>




                                  
 
  

                        
                                <hr style="height:2px;border-width:0;color:gray;background-color:gray">

 
                                

    <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="submit" name="submitForm" value="formSave" class="btn btn-primary"> اضافة</button>

    <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="submit" name="submitForm" value="formSaveNew" class="btn btn-primary">ليس متوفر الآن</button>

 
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

  $("input[name='q1']").change(function () {
               var q1 = this.value;
                if (q1 == 'نعم') {
                      $(".hidden-input").show();
                } else {
                    $(".hidden-input").hide();
                }
            })


  $("input[name='q2']").change(function () {
               var q1 = this.value;
                if (q1 == 'نعم') {
                      $(".hidden-input1").show();
                } else {
                    $(".hidden-input1").hide();
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

