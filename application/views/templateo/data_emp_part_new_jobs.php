<div class="rows col-12 jobs-dashboard recruitment-page">
 <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-right"></i></a>           مرشحي التوظيف المرحلة الأولى</h2>
                        <ul class="breadcrumb">
                           
                            
                        </ul>
                    </div>            
                    
                </div>
            </div>
            
            <div class="row clearfix">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">             مرشحين التوظيف<small><!-- All Users In insert_sadad --></small> </h2>                            
                        </div>
                        <div class="body" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">
                            <div class="table-responsive">    
                          <!--   <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample"> -->

                                <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead style="background-color:#007bff; color:#ffffff;">
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th> الرقم </th>  
                               <th> الاسم </th>
                                 <th>  مرفق السيرة الذاتية </th>


                                   <th>    رسالة ترحيبية    </th>

                                     <th>     حالة الرسالة      </th>


                                 <th> الوظيفة المقدم لها </th>
                               
                                <th>    رقم الجوال </th>
                                
                                  <th> البريد الالكتروني </th>
                                   <th> هل سبق لك العمل في مرسوم </th>
                                    <th> الجنس </th>
                                     <th> العمر </th>
                                      <th> عدد سنوات الخبرة </th>
                                       <th> المؤهل العلمي </th>
                                        <th> التخصص </th>
                                         <th>             الحاسب الالي  </th>
                                           <th>             اللغة الانجليزية  </th>
                                         <th>        رقم الهوية </th>
                                    <th>             نوع الدراسة  </th>
                                    <th>             جهة العمل الحالية  </th>
                                    <th>             نوع الوظيفة  </th>
                                    <th>             التاريخ  </th>
                                    <th>             الوقت  </th>
                                       <th>             تغيير حالة المرشح  </th>
                                   
                                    
                                    <?PHP if ($this ->session->userdata('type') == 4):   
                                      ?>

                                      <th>  التفاصيل </th>

                                       <?PHP endif;?>

                                          <?PHP if ($this ->session->userdata('type') == 2):   
                                      ?>

                                      <th>  التفاصيل </th>

                                       <?PHP endif;?>


                                         <?PHP if ($this ->session->userdata('type') == 3):   
                                      ?>

                                      <th>  التفاصيل </th>
                                      <th>    </th>
                                      <th>    </th>
                                       
                                       

                                       <?PHP endif;?>


                                           <?PHP if ($this ->session->userdata('type') == 7):   
                                      ?>

                                      <th>  التفاصيل </th>
                                      <th>    </th>
                                      
                                     
                                       <?PHP endif;?>




                                          <?PHP if ($this ->session->userdata('type') == 1):   
                                      ?>

                                      <th>  التفاصيل </th>

                                       <?PHP endif;?>



<?PHP if ($this ->session->userdata('type') != 4):   
                                      ?>
                  <?PHP if ($this ->session->userdata('type') != 1):   
                                      ?>
                                      <?PHP if ($this ->session->userdata('type') != 2):   
                                      ?>

                                      
                                             <?PHP endif;?>
                                <?PHP endif;?>
                <?PHP endif;?>


                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                    <?php foreach($customers as $customerss) : ?>
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $customerss['id']; ?></td> 
                                       <td><?php echo $customerss['n1']; ?></td>
<td>
                                          <?php if ($customerss['cv'] != ""):?> 


             <a style="background-color:#007bff; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" title="   مرفق السيرة الذاتية  " class="btn btn-download" href="#" onClick="MyWindow=window.open('https://services.marsoom.net/jobs/assets/imeges/posts/<?php echo $customerss['cv']; ?>','MyWindow',width=50,height=50); return false;"><i class="fa fa-cloud-download" ></i>
                                                                       مرفق السيرة الذاتية        
                                                              </a>

                                                                 <?php else:?> 

                        لا يوجد


                          <?php endif?>

</td>

 <?PHP if ($this ->session->userdata('type') == 7):   
                                      ?>
 <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/send_sms10111/'.$customerss['id']); ?>" class="btn btn-outline-dark">     ارسال            </a></td> 
    
    

   <?PHP endif;?>

      <td><?php
      if ($customerss['sms2'] == 0) {
        echo "لم يتم الارسال";
           // code...
       }elseif($customerss['sms2'] == 1){
          echo " تم الارسال    ";

       } ?></td>




                                       <td><?php echo $customerss['n166']; ?></td>
                                       <td><?php echo $customerss['n2']; ?></td>

                                       <td><?php echo $customerss['n3']; ?></td>
                                       <td><?php echo $customerss['n4']; ?></td>
                                       <td><?php echo $customerss['n5']; ?></td>
                                       <td><?php echo $customerss['n6']; ?></td>
                                       <td><?php echo $customerss['n7']; ?></td>
                                       <td><?php echo $customerss['n8']; ?></td>
                                       <td><?php echo $customerss['n9']; ?></td>
                                       <td><?php echo $customerss['n10']; ?></td>
                                       <td><?php echo $customerss['n11']; ?></td>
                                       <td><?php echo $customerss['n12']; ?></td>
                                       <td><?php echo $customerss['n13']; ?></td>
                                       <td><?php echo $customerss['n14']; ?></td>
                                       <td><?php echo $customerss['n15']; ?></td>
                                       <td><?php echo $customerss['date']; ?></td>
                                       <td><?php echo $customerss['time']; ?></td>
                                     
  


<?PHP if ($this ->session->userdata('type') == 4):   
                                      ?>
 <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/view_emp/'.$customerss['id']); ?>" class="btn btn-outline-dark">   التفاصيل  </a></td> 

   <?PHP endif;?>



<?PHP if ($this ->session->userdata('type') == 2):   
                                      ?>
 <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/view_emp_hrm/'.$customerss['id']); ?>" class="btn btn-outline-dark">   التفاصيل  </a></td> 

   <?PHP endif;?>


   <?PHP if ($this ->session->userdata('type') == 1):   
                                      ?>
 <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/view_emp_mang/'.$customerss['id']); ?>" class="btn btn-outline-dark">   التفاصيل  </a></td> 

   <?PHP endif;?>


   <?PHP if ($this ->session->userdata('type') == 3):   
                                      ?>
 <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/view_emp_hrs/'.$customerss['id']); ?>" class="btn btn-outline-dark">   التفاصيل  </a></td> 
   <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/computer_deg/'.$customerss['id']); ?>" class="btn btn-outline-dark">     تقييم الحاسب  </a></td> 

   <?PHP endif;?>


   <?PHP if ($this ->session->userdata('type') == 7):   
                                      ?>
 <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/add_interview/'.$customerss['id']); ?>" class="btn btn-outline-dark">    نموذج المقابلة الوظيفية  </a></td> 
    
    

   <?PHP endif;?>


    <?PHP if ($this ->session->userdata('type') == 7):   
                                      ?>
 <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/add_status/'.$customerss['id']); ?>" class="btn btn-outline-dark">         تغيير حالة المرشح   </a></td> 
    
    

   <?PHP endif;?>














                                        


<?PHP if ($this ->session->userdata('type') != 4):   
                                      ?>
                  <?PHP if ($this ->session->userdata('type') != 1):   
                                      ?>
                                      <?PHP if ($this ->session->userdata('type') != 2):   
                                      ?>
                                      

<!-- 
                                       <td > <a title=" نموذج المقابلة الوظيفية " class="btn btn-blue btn-xs" href="http://localhost/hr101/users/interview_print/<?php echo $customerss['id']; ?>" target="_blank">
                    نموذج المقابلة الوظيفية  
              </a> </td>  -->

                 

 <td >
 </td> 
<!-- <td >
   <a type="button" href="<?php echo site_url('users/redirection/'.$customerss['id']); ?>" class="btn btn-outline-dark">     إعادة توجيه</a>

 
              </td>  -->


            <!--   <td >
   <a type="button" href="<?php echo site_url('users/redirection/'.$customerss['id']); ?>" class="btn btn-outline-dark">        إضافة راتب</a>

 
              </td>  -->


   <?PHP endif;?>
                                <?PHP endif;?>
                <?PHP endif;?>
                                     
                                     
 
                              </tr>
    <?php endforeach; ?>  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             

        </div>
    </div>
</div>

<!------------         Replay   Deal      --------------------->
 


<!-- Modal Dialogs ========= --> 
<!-- Default Size -->
<div class="modal fade" id="myModalreplay" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" class="title" id="defaultModalLabel">   إعادة توجيه</h4>
            </div>
           <div class="modal-body">
    <form enctype="multipart/form-data" action="" method="post" id="Replay" onsubmit="return validateForm()" class="form-horizontal">
          <div class="row"> 
                <input type="hidden" name="txtId" value="0">

      <div class="col-md-12"> 
      <label  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" class=""> إرسال الى </label>
        <div class="form-group"> 
        
          <select  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" name="useridfuture" id="connectmulti" class="form-control" required >
            <?php foreach($user as $users):?>
              <option value="<?php echo $users['username'];?>"><?php echo $users['name'];?><?php //echo $users['titel'];?></option>
            <?php endforeach;?>    
          </select>
        </div>
      
      </div> 
      </div> 
    </form>
    </div>

               



            <div class="modal-footer">

                 <button  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" name="btnReplay" id="btnReplay" class="btn btn-success">  حفظ</button>

                <button  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" class="btn btn-danger" data-bs-dismiss="modal">إلغاء</button>
            </div>
        </div>
    </div>
</div>
