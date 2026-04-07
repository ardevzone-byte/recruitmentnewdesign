        <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/add_id_number'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>إضافة  هوية مرشح  جديد</h2>
                       <ul class="breadcrumb">
                             <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/id_number"><i class="icon-notebook"></i></a></li>

                            <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/add_id_number"><i class="fa fa-plus"></i></a></li>
                            
                        </ul>
                    </div>            
                   
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">الرجاء اضافة  هوية المرشح  </h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate>
                                <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">رقم  الجوال</label>
    <label style=" font-weight: bold;
    font-style: normal; font-size:15px; color:#F30000;"> *  </label>

                                   <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" placeholder="10 ارقام" pattern="[0-9]{10}" name="id_number" class="form-control"required>
                                </div>


                                 <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="input-group-text" for="inputGroupSelect01">المسمى الوظيفي</label>
                                </div>
                                <select name="job_name_detailes" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                     
                                    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="محامي">محامي</option>

 <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="أخصائي جودة">أخصائي جودة</option>


                                    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مشرف القانونية">مشرف القانونية</option>
   
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مستشار قانوني نظم عامة">مستشار قانوني نظم عامة</option>

     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مشرف تحصيل">مشرف تحصيل</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="محصل ديون" selected>محصل ديون</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="قائد فريق التحصيل">قائد فريق التحصيل</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="قائد فريق الموارد البشرية">قائد فريق الموارد البشرية</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مديرة القسم النسائي">مديرة القسم النسائي</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="محاسب عام">محاسب عام</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مدير الموارد البشرية">مدير الموارد البشرية</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مشرف عمليات">مشرف عمليات</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="عامل عادي">عامل عادي</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="عامل">عامل</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="كاتب علاقات حكومية">كاتب علاقات حكومية</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مدير التحصيل">مدير التحصيل</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مدير العمليات">مدير العمليات</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="محامي متدرب">محامي متدرب</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مندوب مشتريات">مندوب مشتريات</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مبرمج حاسب آلي">مبرمج حاسب آلي</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="أخصائي عمليات">أخصائي عمليات</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مستشار">مستشار</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مشرف السندات والرفع الالكتروني">مشرف السندات والرفع الالكتروني</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="فني حاسب آلي">فني حاسب آلي</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مدير القانونية والتحصيل">مدير القانونية والتحصيل</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="محاسب">محاسب</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="سكرتير">سكرتير</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="اخصائي التحول الالكتروني">اخصائي التحول الالكتروني</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مشرف عمال">مشرف عمال</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مستشار قانوني نظم خاصة">مستشار قانوني نظم خاصة</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مستشار قانوني">مستشار قانوني</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مهندس معماري">مهندس معماري</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مندوب مبيعات">مندوب مبيعات</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="فني شبكات حاسب">فني شبكات حاسب</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="أخصائي موارد بشرية">أخصائي موارد بشرية</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="أخصائي شبكات كمبيوتر">أخصائي شبكات كمبيوتر</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="اخصائي مساندة">اخصائي مساندة</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مشرف الموارد البشرية">مشرف الموارد البشرية</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="أخصائي توظيف">أخصائي توظيف</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="محصل ديون دولي">محصل ديون دولي</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مراقب داخلي">مراقب داخلي</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="اخصائي مشتريات">اخصائي مشتريات</option>
      
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مدير الادارة المالية">مدير الادارة المالية</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مدير مكتب المحاماة">مدير مكتب المحاماة</option>
  <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مسوق">مسوق</option>

<option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مسؤول الإلتزام والحوكمة">مسؤول الإلتزام والحوكمة</option>

<option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="اخصائي  التزام وحوكمة">اخصائي  التزام وحوكمة</option>

<option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="اخصائي امن سيبراني">اخصائي   امن سيبراني</option>
<option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value=" مدير إدارة تقنية المعلومات">مدير إدارة تقنية المعلومات</option>
<option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="  أخصائي تدريب"> أخصائي تدريب</option>


                                   
                                </select>
                            </div>

ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
                              <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="form-group">
                                  <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"> 
 

     المؤهل العلمي / Qualification</label><label style=" font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> *  </label>
                                    <br />
                                     <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="qualification1" value="إبتدائي" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>إبتدائي</span>
                                    </label>
                                     <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="qualification1" value="متوسط" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>متوسط</span>
                                    </label>
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="qualification1" value="ثانوي" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>ثانوي</span>
                                    </label>
                                   
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="qualification1" value="دبلوم">
                                        <span><i></i>دبلوم</span>
                                    </label>
                                     <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="qualification1" value="بكالوريوس">
                                        <span><i></i>بكالوريوس</span>
                                    </label>
                                     <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="qualification1" value="ماجستير">
                                        <span><i></i>ماجستير  </span>
                                    </label>
                                     
                                    <p id="error-radio"></p>
                                </div>

ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ



 <div class="form-group hidden-input33">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">                التخصص     </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" type="text" autocomplete="off" name="specialization" class="form-control">
                                </div>



ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ


                                <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">

         الوظيفة المرشح لها</label><label style=" font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> *  </label>
                                    
                                    [<label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:50px;" type="radio" name="job_name" value="محصل" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>محصل</span>
                                    </label>
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="job_name" value="إداري">
                                        <span><i></i>إداري</span>
                                    </label>  ]
                                    <p id="error-radio"></p>
                                </div>

                                  <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">

          الجنس    </label><label style=" font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> *  </label>
                                    
                                    [<label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="sex" value="1" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>موظف</span>
                                    </label>
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="sex" value="2">
                                        <span><i></i>موظفة</span>
                                    </label>  ]
                                    <p id="error-radio"></p>
                                </div>


ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
                                 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">

          جهة العمل    </label><label style=" font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> *  </label>
                                    
                                    [<label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="Employer" value="1" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>شركة مرسوم</span>
                                    </label>
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="Employer" value="2">
                                        <span><i></i> مكتب الدكتور صالح الجربوع</span>
                                    </label>  ]
                                    <p id="error-radio"></p>
                                </div>





                  ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ

                  </br>              

                                 
                            
                                
                                <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="submit" name="submitForm" value="formSave" class="btn btn-primary">حفظ</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>


      <?php echo form_close(); ?>
    

