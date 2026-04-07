


        <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('users/id_edit/'.$id); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> تعديل  بيانات المرشح</h2>
                       <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/chart_gugus"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/users_index"><i class="icon-users"></i></a></li>

                             <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/user_report"><i class="icon-notebook"></i></a></li>

                            <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/register"><i class="fa fa-plus"></i></a></li>
                            
                        </ul>
                    </div>            
                   
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                           <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">          تعديل بيانات  المرشح</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate >

                               <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">رقم  الهوية</label>
                                   <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" value="<?php echo $get_id_insert_selected['id_number'];?>" placeholder="10 ارقام" pattern="[0-9]{10}" name="id_number" class="form-control"required>
                                </div>

                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="input-group-text" for="inputGroupSelect01">المسمى الوظيفي</label>
                                </div>
                                <select name="job_name_detailes" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">

      <option value="<?php echo $get_id_insert_selected['job_name_detailes'];?>" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;"   selected>   <?php echo $get_id_insert_selected['job_name_detailes'];?></option>


                                                                       <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="العضو المنتدب " selected>العضو المنتدب </option>
                                    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="محامي">محامي</option>
                                    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مشرف القانونية">مشرف القانونية</option>
   
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مستشار قانوني نظم عامة">مستشار قانوني نظم عامة</option>

     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مشرف تحصيل">مشرف تحصيل</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="محصل ديون">محصل ديون</option>
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
    font-style: normal; font-size:12px;" value="أخصائي تحليل بيانات">أخصائي تحليل بيانات</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="محلل بيانات">محلل بيانات</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مدير الادارة المالية">مدير الادارة المالية</option>
     <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="مدير مكتب المحاماة">مدير مكتب المحاماة</option>
                                   
                                </select>
                            </div>


                             <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">

         الوظيفة المرشح لها</label>
                                    
                                    [<label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input required style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:50px;" type="radio"  name="job_name" value="محصل" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>محصل</span>
                                    </label>
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="job_name" value="إداري" required>
                                        <span><i></i>إداري</span>
                                    </label>  ]
                                    <p id="error-radio"></p>
                                </div>

                                 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">

          الجنس    </label>
                                    
                                    [<label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input type="radio" name="sex" value="موظف" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>موظف</span>
                                    </label>
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="fancy-radio">
                                        <input required type="radio" name="sex" value="موظفة">
                                        <span><i></i>موظفة</span>
                                    </label>  ]
                                    <p id="error-radio"></p>
                                </div>




                               
                                 

                            


                             
                                  
                                <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="submit" name="submitForm" value="formSave" class="btn btn-primary">تعديل</button>

     <button type="button" data-toggle="modal" data-target="#staticModal" class="btn btn-danger" title="حذف"><span class="sr-only">حذف</span> <?php $id3=$get_id_insert_selected['id']; ?><i class="fa fa-trash-o"></i></button>


     

                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>


      <?php echo form_close(); ?>
    





       <!--  <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/targit_edit/'.$id); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>الصفحة الشخصية</h2>
                       <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/chart_gugus"><i class="icon-home"></i></a></li>                            
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/users_index"><i class="icon-users"></i></a></li>

                             <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/user_report"><i class="icon-notebook"></i></a></li>

                            <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/register"><i class="fa fa-plus"></i></a></li>
                            
                        </ul>
                    </div>            
                   
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">تعديل بياناتي الرئيسية</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate >
                                <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">التارحيت</label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" name="tragit_day" value="<?php echo $customers['tragit_day'];?>" class="form-control" required>
                                </div>
                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">التارحيا الشخري</label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" name="tragit_month" value="<?php echo $customers['tragit_month'];?>" class="form-control" required>
                                </div> 

                                     
                               
                                  
                                <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="submit" name="submitForm" value="formSave" class="btn btn-primary">تعديل</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>


      <?php echo form_close(); ?> -->


      <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">   إجراء عملية حذف</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                        هل انت متأكد من عملية الحذف
                                </p>
                            </div>
          <div class="modal-footer">
     <div class="row">
  <div class="col-md-6">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
  </div>
  <div class="col-md-6">
                <?php echo form_open('/users/delete_detailes_id_insert/'.$id3); ?>    
              <p>
               <input type="submit" value="حذف" class="btn btn-danger">
              
               <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">
                &lt; &gt;
               </div>
              </p>

            </form>
  </div>
      

          


     </div>
           



          </div>
                        </div>
                    </div>
  </div>
    

