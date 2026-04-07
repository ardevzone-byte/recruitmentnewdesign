
        <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('users/view_emp_mang/'.$id); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                                          
                      </br>
                        

                       
                    </div>            
                   
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                      
                        <div class="body">
                            <form id="basic-form" method="post" novalidate >

    

             





             


   <div class="form-group">

                          <a href="https://services.marsoom.net/hr101/users/interview_print/<?php echo $customers['id_number']; ?>" type="button" class="btn btn-default" title=" نموذج المقابلة الوظيفية  "><span class="sr-only">  نموذج المقابلة الوظيفية  </span> <i class="fa fa-file-text-o"></i></a>

            </div>


            


            <div class="form-group">


              <a style="background-color:#007bff; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" title="   مرفق السيرة الذاتية  " class="btn btn-download" href="#" onClick="MyWindow=window.open('<?php echo site_url(); ?>assets/imeges/posts/<?php echo $customers['path']; ?>','MyWindow',width=50,height=50); return false;"><i class="fa fa-cloud-download" ></i>
                                                                       مرفق السيرة الذاتية        
                                                              </a>



                             
            </div>



                   <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead style="background-color:#007bff; color:#ffffff;">
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th>           الاسم </th>
                                  <th>           الجنسية </th>  
                               <th>              الوظيفة المرشح لها </th>

                                <th>                   الفرع </th>

                              
                                    
 


                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                   
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $customers['name']; ?></td> 
                                        <td><?php echo $customers['Nationality']; ?></td>
                                       <td><?php echo $customers['job_name_detailes']; ?></td>
                                        <td><?php echo $customers['q6']; ?></td>

                                       
                                      
                                      
                                     
 
                              </tr>
    
                                    </tbody>
                                </table>


                                   <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead style="background-color:#007bff; color:#ffffff;">
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th>           عدد سنوات الخبرة </th>
                                  <th>            تصنيف المرشح </th> 

                                   <th>               المؤهل العلمي </th> 
                                    <th>                  التخصص </th> 
                            

                              
                                    
 


                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                   
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                    <td ><?php echo $customers['Years_of_experience_in_the_same_field']; ?></td> 
                                        <td><?php echo $customers['filter_classification']; ?></td>
                                    
 <td><?php echo $customers['qualification1']; ?></td>
  <td><?php echo $customers['specialization']; ?></td>
                                       
                                      
                                      
                                     
 
                              </tr>
    
                                    </tbody>
                                </table>

                                


                                <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead style="background-color:#007bff; color:#ffffff;">
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th>           ملاحظات مدخل البيانات </th>  
                              

                              
                                    
 


                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                   
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $customers['note']; ?></td> 
                                       
                                       
                                      
                                      
                                     
 
                              </tr>
    
                                    </tbody>

                                     


                                </table>
                            </br>
  <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">               التقييم</label>

    


                                  
                                </div>
                                 <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead style="background-color:#007bff; color:#ffffff;">
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th>   الرقم  </th>
                               <th>   الاسم  </th>
                               <th>    الرقم الوظيفي </th>
                               <th>  درجة التقييم   </th>
                               <th>    ملاحظة </th>
                               <th>    حالة القبول </th>
                               <th>    تاريخ التقييم </th>
                               <th>    وقت التقييم </th>  
                              

                              
                                    
 


                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                     <?php $d='0'; foreach($customers1 as $customerss) : $d=$d+1;?>
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $d; ?></td>
                                       <td ><?php echo $customerss['name']; ?></td>
                                       <td ><?php echo $customerss['username']; ?></td>
                                       <td ><?php echo $customerss['degree']; ?></td>
                                       <td ><?php echo $customerss['note']; ?></td>
                                       <td ><?php echo $customerss['aprove']; ?></td>
                                       <td ><?php echo $customerss['date']; ?></td>
                                       <td ><?php echo $customerss['time']; ?></td> 
                                       
                                       
                                      
                                      
                                     
 
                              </tr>
                                <?php endforeach; ?>  
    
                                    </tbody>
                                </table>







           









                              <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">    درجة التقييم     </label>
                                   <input  autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="number"  name="n1" class="form-control">
                                </div>

                                 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" class="form-group">
                                   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">

  

   حالة القبول  </label><label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#F30000;"> * </label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="n2" value="قبول" required data-parsley-errors-container="#error-radio">
                                        <span><i></i>   قبول </span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="n2" value="رفض">
                                        <span><i></i>  رفض</span>
                                    </label>
                                    

                                    <p id="error-radio"></p>
                                </div>


 



                                <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">    ملاحظات على المرشح</label>
                                   <input  autocomplete="off" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text"  name="n3" class="form-control">
                                </div>

                                   

  


 
  
                                  
                              <!--   <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="submit" name="submitForm" value="formSave" class="btn btn-primary">   تعميد وإرسال       الى       مسؤول التوظيف  </button> -->



    <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" class="btn btn-primary js-sweetalert" data-type="success">                      حفظ                      </button>
 

  




      <!-- <a href="#defaultModal101" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" data-toggle="modal" class="btn btn-danger" data-target="#defaultModal101">
                                
   تحويل الى قائمة إنتظار

                            </a>    -->



 

                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>


      <?php echo form_close(); ?>
    


 

      <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">   إجراء عملية حذف</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
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
                < >
               </div>
              </p>

            </form>
  </div>
      

          


     </div>
           



          </div>
                        </div>
                    </div>
  </div>
    

<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">   رفض  المرشح</h4>
            </div>
            <div class="modal-body"style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:18px;"> هل انت متأكد من رفض المرشح نهائياً  ? </div>
           
               <?php echo form_open('/users/update_order101001/'.$id); ?>    
              <p>
                <div class="row">
  <div class="col-md-12">
   <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">   فضلاً كتابة ملاحظات  واسباب الرفض</label>


          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     <input   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"   required="required" type="text"  name="reason" class="form-control">
                
</br>
  </div>
  </div>

               <!-- <input type="submit" value="نعم" class="btn btn-primary"> -->
               <button type="submit" class="btn btn-primary"style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">نعم</button>
                <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" class="btn btn-danger" data-dismiss="modal">لا</button>
              
               <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">
                < >
               </div>
              </p>

            </form>

             <!--    <button type="button" class="btn btn-primary">SAVE CHANGES</button> -->
               
           
        </div>
    </div>
</div>

<!-- Large Size -->


<!-- Default Size -->
<div class="modal fade" id="defaultModal105" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">       لم يحضر المقابلة</h4>
            </div>
            <div class="modal-body"style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:18px;"> هل انت متأكد من      ان المرشح لم يحضر المقابلة  ? </div>
           
               <?php echo form_open('/users/update_order101001105/'.$id); ?>    
              <p>
                <div class="row">
  <div class="col-md-12">
    


                    
                
</br>
  </div>
  </div>

               <!-- <input type="submit" value="نعم" class="btn btn-primary"> -->
               <button type="submit" class="btn btn-primary"style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">نعم</button>
                <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" class="btn btn-danger" data-dismiss="modal">لا</button>
              
               <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">
                < >
               </div>
              </p>

            </form>

             <!--    <button type="button" class="btn btn-primary">SAVE CHANGES</button> -->
               
           
        </div>
    </div>
</div>

<!-- Large Size -->





<!-- Default Size -->
<div class="modal fade" id="defaultModal101" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel"style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">       تحويل الى قائمة انتظار</h4>
            </div>
            <div class="modal-body"style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:18px;"> هل انت متأكد  من الإجراء        ? </div>
            <div class="modal-footer">
               <?php echo form_open('/users/update_order101001wait/'.$id); ?>    
              <p>
                

               <!-- <input type="submit" value="نعم" class="btn btn-primary"> -->
               <button type="submit" class="btn btn-primary"style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">نعم</button>
                <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" class="btn btn-danger" data-dismiss="modal">لا</button>
              
               <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">
                < >
               </div>
              </p>

            </form>

             <!--    <button type="button" class="btn btn-primary">SAVE CHANGES</button> -->
               
            </div>
        </div>
    </div>
</div>

<!-- Large Size -->





<!--  ////////////تعميد//////// -->
 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="modal fade" id="staticModal1001" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">رفض الطلب</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                                  هل انت متأكد من رفض الطلب نهائياً
                                </p>
                            </div>
          <div class="modal-footer">
     <div class="row">
     

     <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
        
   
           <?php echo form_open('/users/update_order101001/'.$id); ?>    
              <p>
                

               <input type="submit" value="نعم" class="btn btn-danger">
              
               <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">
                < >
               </div>
              </p>

            </form>
                                               
      

          


     </div>
           



          </div>
                        </div>
                    </div>
  </div>


