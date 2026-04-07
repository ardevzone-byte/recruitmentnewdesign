        <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/add_job_vacancy'); ?>

    <div id="main-content">
        <div class="container-fluid">
   </br>
                    </br>                        
                    </br>
                    </br>
                   
            <div class="block-header">
                <div class="row">

                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>إضافة     شاغر وظيفي  جديد</h2>
                     
                    </div>            
                   
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">        بيانات الشاغر الوظيفي  </h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate>
                                


                                 <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="input-group-text" for="inputGroupSelect01">المسمى الوظيفي</label>
                                </div>
                                <input list="ice-cream-flavors" id="ice-cream-choice" name="n1" />
                                <datalist id="ice-cream-flavors" name="n1" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" id="inputGroupSelect01">
      <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="محصل ديون" selected>محصل ديون</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مشرف تحصيل">مشرف تحصيل</option>
                                     
                                    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="محامي">محامي</option>

 <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="أخصائي جودة">أخصائي جودة</option>


                                    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مشرف القانونية">مشرف القانونية</option>
   
      
   
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


                                   
                                </datalist>
                            </div>
 

      <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="form-group">
                                  <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"> 
 
القسم</label><label style=" font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> *  </label>
                                    <br />

                                     <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="n2" value="نساء">
                                        <span><i></i>نساء</span>
                                    </label>
                                      
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="n2" value="رجال" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>رجال</span>
                                    </label>
                                  
                                    <p id="error-radio"></p>
                                </div>



                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="input-group-text" for="inputGroupSelect01">    المنطقة</label>
 </div>
                                <select name="n3" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
      <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الادارة العامة" selected>الادارة العامة (إداري وليس تحصيل)</option>
      <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الوسطى " >الوسطى</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الشرقية">الشرقية</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الجنوبية">الجنوبية</option>

     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الغربية">الغربية</option>
      <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الشمالية">الشمالية</option>
 <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="غير محدد">غير محدد</option>
    

                                   
                                </select>
                            </div>



                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="input-group-text" for="inputGroupSelect01">     المشروع</label>
 </div>
                                <select name="n4" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
   
      <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الراجحي" selected>الراجحي</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الاهلي">الاهلي</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="إمكان">إمكان</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الإنماء">الإنماء</option>
      <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="العربي">العربي</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="الرياض">الرياض</option>
       <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="غير محدد" >غير محدد</option>
       <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="إداري" >إداري</option>

    

                                   
                                </select>
                            </div>


                             <div class="form-group hidden-input33">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">                   الحد الادنى للراتب     </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" type="number" autocomplete="off" name="n10" class="form-control">
                                </div>

                                  <div class="form-group hidden-input33">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">                   الحد  الاعلى للراتب     </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" type="number" autocomplete="off" name="n11" class="form-control">
                                </div>






                           



 <div class="form-group hidden-input33">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">                عدد الشواغر     </label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" type="number" autocomplete="off" name="n5" class="form-control">
                                </div>
                              

 <div class="form-group hidden-input33">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">تاريخ اغلاق الشاغر</label>


    <input data-provide="datepicker" name="n6" data-date-autoclose="true" class="form-control" data-date-format="yyyy/mm/dd" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">


                                  
                                </div>
                                

 
                              <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="form-group">
                                  <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"> 
 

     المؤهل العلمي  المطلوب للمرشح/ Qualification</label><label style=" font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> *  </label>
                                    <br />

                                     <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="n7" value="غير محدد">
                                        <span><i></i> غير محدد  </span>
                                    </label>
                                      
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="n7" value="ثانوي" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>ثانوي</span>
                                    </label>
                                   
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="n7" value="دبلوم">
                                        <span><i></i>دبلوم</span>
                                    </label>
                                     <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="n7" value="بكالوريوس">
                                        <span><i></i>بكالوريوس</span>
                                    </label>
                                     <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="n7" value="ماجستير">
                                        <span><i></i>ماجستير  </span>
                                    </label>

                                      

                                     
                                    <p id="error-radio"></p>
                                </div>

     


 <div class="form-group hidden-input33">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">             التخصصات المطلوبة     </label>
                                    <textarea style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" type="text" autocomplete="off" name="n8" class="form-control"></textarea>
                                </div>


 <div class="form-group hidden-input33">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">                ملاحظات     </label>
                                   <textarea style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" type="text" autocomplete="off" name="n9" class="form-control"></textarea>
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
    

