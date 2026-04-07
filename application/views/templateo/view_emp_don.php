        <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('users/view_emp_hrs/'.$id); ?>
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



<?php //echo $customers12['sex'];  ?>

<?PHP if ($customers12['sex'] ==2):  ?>


   <div class="form-group">
                              <a  style="background-color:#007bff; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" title=" نموذج المقابلة الوظيفية " class="btn btn-blue btn-xs" href="https://services.marsoom.net/hr101/users/interview_printf/<?php echo $customers['id_number']; ?>" target="_blank">
                    نموذج المقابلة الوظيفية  
              </a>
            </div>


             





             <?PHP elseif ($customers12['sex'] ==1): ?>


   <div class="form-group">
                              <a  style="background-color:#007bff; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" title=" نموذج المقابلة الوظيفية " class="btn btn-blue btn-xs" href="https://services.marsoom.net/hr101/users/interview_print/<?php echo $customers['id_number']; ?>" target="_blank">
                    نموذج المقابلة الوظيفية  
              </a>
            </div>


             <?PHP endif;?>

  

            <div class="form-group">



               <a style="background-color:#007bff; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" title="مرفق  السيرة الذاتية  " class="btn btn-download" href="#" onClick="MyWindow=window.open('https://services.marsoom.net/jobs1/assets/imeges/posts/<?php echo $get_id_insert_selected5559999['cv']; ?>','MyWindow',width=50,height=50); return false;"><i class="fa fa-cloud-download" ></i>
                                                                  مرفق  السيرة الذاتية  
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


                                  <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead style="background-color:#007bff; color:#ffffff;">
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th>           ملاحظات    مسؤول التوظيف </th>  
                              

                              
                                    
 


                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                   
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $customers['note_hrs']; ?></td> 
                                       
                                       
                                      
                                      
                                     
 
                              </tr>
    
                                    </tbody>
                                </table>





<?PHP if ($customers['manag_name'] != ""):   
                                      ?>
                                   <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead style="background-color:#007bff; color:#ffffff;">
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                              
                               <th>                   ملاحظات مدير الإدارة  / <?php echo $customers['manag_name']; ?> </th>
                              
                                    
 


                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                   
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                    
                                       <td><?php echo $customers['note_mang']; ?></td>
                                       
                                      
                                      
                                     
 
                              </tr>
    
                                    </tbody>
                                </table>

<?PHP endif;?>




                                   <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead style="background-color:#007bff; color:#ffffff;">
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th>           ملاحظات    مدير الموارد البشرية </th>  
                              

                              
                                    
 


                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                   
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $customers['note_hrm']; ?></td> 
                                       
                                       
                                      
                                      
                                     
 
                              </tr>
    
                                    </tbody>
                                </table>


                                  <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead style="background-color:#007bff; color:#ffffff;">
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th>           ملاحظات         العضو المنتدب </th>  
                              

                              
                                    
 


                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                   
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $customers['note_co']; ?></td> 
                                       
                                       
                                      
                                      
                                     
 
                              </tr>
    
                                    </tbody>
                                </table>







                                 <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead style="background-color:#007bff; color:#ffffff;">
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th>        إجمالي التقييم </th>  
                               <th>      المشروع  المرشح العمل به </th>
                                   <?PHP if ($this ->session->userdata('type') == 3):   
                                      ?>
                                         <th>         إجمالي الراتب </th>


                                      <?PHP elseif($this ->session->userdata('type') == 2):   
                                      ?>
   <th>         إجمالي الراتب </th>


                                       <?PHP elseif($this ->session->userdata('type') == 4):   
                                      ?>

                                <th>         إجمالي الراتب </th>


                                 <?PHP endif;?>
                                
                                 <!--  <th>  تقييم مدير الموارد البشرية </th>
                                   <th>  تقييم العضو المنتدب </th> -->
                                    
 


                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                   
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td > 
                                        <?PHP if ($customers['degree_hrs'] != "" and $customers['degree_mang'] != "" and $customers['degree'] != ""):   
                                      ?>

                                        <input     type="text" class="knob2" value="<?php  $f=$customers['degree']+$customers['degree_hrs']+$customers['degree_mang'];

                                       $e=$f/3;

                                         echo round($e,0);?>" data-linecap="round" data-width="70" data-height="70" data-thickness="0.2" data-fgColor="#4CAF50" readonly>



                                      <?PHP endif;?>
                                       <?PHP if ($customers['degree_hrs'] == "" and $customers['degree_mang'] != "" and $customers['degree'] != ""):   
                                      ?>

                                        <input     type="text" class="knob2" value="<?php  $f=$customers['degree']+$customers['degree_mang'];

                                       $e=$f/2;

                                         echo round($e,0);?>" data-linecap="round" data-width="70" data-height="70" data-thickness="0.2" data-fgColor="#4CAF50" readonly>
                                          <?PHP endif;?>


                                            <?PHP if ($customers['degree_hrs'] != "" and $customers['degree_mang'] == "" and $customers['degree'] != ""):   
                                      ?>

                                        <input     type="text" class="knob2" value="<?php  $f=$customers['degree']+$customers['degree_hrs'];

                                       $e=$f/2;

                                         echo round($e,0);?>" data-linecap="round" data-width="70" data-height="70" data-thickness="0.2" data-fgColor="#4CAF50" readonly>
                                          <?PHP endif;?>




 
                                       <?PHP if ($customers['degree_mang'] == "" and $customers['degree_hrs'] == "" and $customers['degree'] != ""):   
                                      ?>

                                        <input     type="text" class="knob2" value="<?php  $f=$customers['degree'];

                                       $e=$f/1;

                                         echo round($e,0);?>" data-linecap="round" data-width="70" data-height="70" data-thickness="0.2" data-fgColor="#4CAF50" readonly>
                                          <?PHP endif;?>



                                            <?PHP if ($customers['degree_mang'] != "" and $customers['degree_hrs'] == "" and $customers['degree'] == ""):   
                                      ?>

                                        <input     type="text" class="knob2" value="<?php  $f=$customers['degree_mang'];

                                       $e=$f/1;

                                         echo round($e,0);?>" data-linecap="round" data-width="70" data-height="70" data-thickness="0.2" data-fgColor="#4CAF50" readonly>
                                          <?PHP endif;?>





                                           <?PHP if ($customers['degree_mang'] == "" and $customers['degree_hrs'] == "" and $customers['degree'] == ""):   
                                      ?>

                                       لا يوجد تقييم


                                          <?PHP endif;?>




                                       </td> 
                                       <td><?php echo $customers['The_project']; ?></td>


  <?PHP if ($this ->session->userdata('type') == 3):   
                                      ?>
                                          <td><?php echo $customers['salary_real']; ?></td>


                                      <?PHP elseif($this ->session->userdata('type') == 2):   
                                      ?>
    <td><?php echo $customers['salary_real']; ?></td>


                                       <?PHP elseif($this ->session->userdata('type') == 4):   
                                      ?>

                             <td><?php echo $customers['salary_real']; ?></td>


                                 <?PHP endif;?>



                                 
                                      
                                       
                                      <!--  <td><?php //echo $customers['mobile']; ?></td>
                                       <td><?php //echo $customers['Nationality']; ?></td> -->
                                      
                                     
 
                              </tr>
    
                                    </tbody>
                                </table>






 

                                

                               
 


                                 
     



                                    

                                 



  


 
  
                          

<!-- 
      <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" class="btn btn-primary js-sweetalert" data-type="success">                     موافقة وإرسال       الى       مدير إدارة         </button>
 -->



 
<!-- 

      <a href="#defaultModal" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" data-toggle="modal" class="btn btn-danger" data-target="#defaultModal">
                                
رفض المرشح

                            </a>    
 -->
                              

 

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


                       <input   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"   required="required" type="text"  name="reason" class="form-control">
                
</br>
  </div>
  </div>

               <!-- <input type="submit" value="نعم" class="btn btn-primary"> -->
               <button type="submit" class="btn btn-primary"style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">رفض</button>
                <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
              
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


