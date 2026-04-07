<div class="rows col-12 jobs-dashboard recruitment-page">
 <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-right"></i></a>       معتمد من قبل رئيس اللجنة           </h2>
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
    font-style: normal; font-size:20px;">            قائمة المرشحين    <small><!-- All Users In insert_sadad --></small> </h2>                            
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
                                <th>  رقم الجوال </th>
                                  <th>     تاريخ المقابلة </th>
                                    <th>        المسمى الوظيفي      </th>
                                    <th>    الخيارات      </th>


                                        <th>     تاريخ المباشرة      </th>

                                           <th>       حالة المباشرة       </th>

                                              <th>      مرفق السيرة الذاتية           </th>

                                                <th>          طلب موجه الى            </th>
    

                               
                                   
                                 
 

 

                                      

                                    
                                    
                                      
                                     



 <?PHP if ($this ->session->userdata('type') == 3):   
                                      ?>
     <th>        تقييم المرشح  </th> 
   

   <?PHP endif;?>
                                      

  


 


                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                    <?php foreach($customers as $customerss) : ?>
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $customerss['id']; ?></td> 
                                       <td><?php echo $customerss['name']; ?></td>
                                        <td><?php echo $customerss['mobile']; ?></td>
                                           <td><?php echo $customerss['day']; ?></td>
                                            <td><?php echo $customerss['job_name']; ?></td>
                                        
                                       
                                     
  
 

 
 
 


   
 <td >


        <a href="https://services.marsoom.net/hr101/users/interview_print/<?php echo $customerss['id_number']; ?>" type="button" class="btn btn-default" title=" نموذج المقابلة الوظيفية  "><span class="sr-only">  نموذج المقابلة الوظيفية  </span> <i class="fa fa-file-text-o"></i></a>


         <a href="<?php echo site_url('users/add_status111/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="    اضافة عرض وظيفي    "><span class="sr-only">       اضافة عرض وظيفي  </span> <i class="icon-plus"></i></a>


           <a href="<?php echo site_url('users/add_status111/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="       نموذج ملخص السيرة الذاتية      "><span class="sr-only">            نموذج ملخص السيرة الذاتية  </span> <i class="fa fa-search-plus"></i></a>




          <a href="<?php echo site_url('users/inv2222/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="     طباعة العرض الوظيفي        "><span class="sr-only">       طباعة العرض الوظيفي       </span> <i class="icon-printer"></i></a>
  <?PHP if ($customerss['sms'] == 1):   
                                      ?>

                 <a href="<?php echo site_url('users/add_status222/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="          ارسال رسالة نصية بانه تم ارسال العرض الوظيفي        "><span class="sr-only">        ارسال رسالة نصية بانه تم ارسال العرض الوظيفي           </span> <i style="color:#51E181;" class="fa fa-send-o"></i></a>

             
      <?PHP endif;?>    

      <?PHP if ($customerss['sms'] == 0):   
                                      ?>

                                       <a href="<?php echo site_url('users/add_status222/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="          ارسال رسالة نصية بانه تم ارسال العرض الوظيفي        "><span class="sr-only">        ارسال رسالة نصية بانه تم ارسال العرض الوظيفي           </span> <i style="color:#FF1F1F;" class="fa fa-send-o"></i></a>

             
      <?PHP endif;?> 


  <a href="<?php echo site_url('users/add_status555/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="         تغيير المسمى الوظيفي    "><span class="sr-only">       تغيير المسمى الوظيفي       </span> <i class="fa fa-stack-exchange"></i></a>
         
    

          <a href="<?php echo site_url('users/add_status5556/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="       اضافة حالة مباشرة           "><span class="sr-only">            اضافة حالة مباشرة       </span> <i class="fa fa-child"></i></a>




          


    
  


    
         <a href="<?php echo site_url('users/add_status1113/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="       نموذج السيرة الذاتية المختصرة      "><span class="sr-only">            نموذج السيرة الذاتية المختصرة  </span> <i class="fa fa-plus"></i></a>


           <a href="<?php echo site_url('users/inv222255/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="          طباعة السيرة الذاتية المختصرة        "><span class="sr-only">            طباعة السيرة الذاتية المختصرة       </span> <i class="fa fa-print"></i></a>

 <a href="<?php echo site_url('users/add_status555612/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="                رقم الهوية             "><span class="sr-only">                     رقم الهوية         </span> <i class="icon-user"></i></a>


  <a href="<?php echo site_url('users/add_status55561225141/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="             الرقم الوظيفي                   "><span class="sr-only">                        الرقم الوظيفي         </span> <i class="icon-user"></i></a>





<?PHP if ($customerss['sms2'] == 1):   
                                      ?>

                 <a href="<?php echo site_url('users/add_status22233/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="                 رسالة اعتذار                "><span class="sr-only">                    رسالة اعتذار              </span> <i style="color:#51E181;" class="fa fa-send-o"></i></a>

             
      <?PHP endif;?>    

      <?PHP if ($customerss['sms2'] == 0):   
                                      ?>

                                       <a href="<?php echo site_url('users/add_status22233/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="                         رسالة اعتذار        "><span class="sr-only">                       رسالة اعتذار           </span> <i style="color:#FF1F1F;" class="fa fa-send-o"></i></a>

             
      <?PHP endif;?> 

 <a href="<?php echo site_url('users/view_emp_hrs/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="                 تفاصيل المرشح        "><span class="sr-only">                   تفاصيل المرشح       </span> <i class="fa fa-recycle"></i></a>



 <a href="<?php echo site_url('users/appointment/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="                  تعديل موعد المقابلة          "><span class="sr-only">                             </span> <i class="icon-clock"></i></a>


<a href="<?php echo site_url('users/redirection/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="             إعادة توجيه             "><span class="sr-only">                  إعادة توجيه         </span> <i class="icon-action-redo"></i></a>

<a href="<?php echo site_url('users/detailes_add5/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="            اضافة مرفق                  "><span class="sr-only">                      اضافة مرفق         </span> <i class="icon-action-redo"></i></a>

<a href="<?php echo site_url('users/send_sms101/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="               رسالة نصية لتأكيد الموعد                  "><span class="sr-only">                         رسالة نصية لتأكيد الموعد         </span> <i class="icon-action-redo"></i></a>

<a href="<?php echo site_url('users/send_sms102/'.$customerss['id']); ?>" type="button" class="btn btn-default" title="            ارسال رابط مقابلة عن بعد         الموعد                  "><span class="sr-only">                            ارسال رابط مقابلة عن بعد             </span> <i class="icon-action-redo"></i></a>






    </td> 


    

 <?PHP if ($this ->session->userdata('username') != 2413):   
                                      ?>

   <?PHP if ($this ->session->userdata('type') == 3):   
                                      ?>
 <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/view_emp_hrs/'.$customerss['id']); ?>" class="btn btn-outline-dark">   التفاصيل  </a></td> 
   

   <?PHP endif;?>


   




    

 


    
<td>
      <?php echo $customerss['f5']; ?> 
</td>

<td>

     <?php if ($customerss['status5']==1) {
        echo "تم المباشرة";
     }elseif ($customerss['status5']==2) {
        echo "  انسحاب ";
     }elseif ($customerss['status5']==3) {
         echo " استبعاد  ";
     }elseif ($customerss['status5']==0) {
        echo " غير محدد  ";
     }elseif ($customerss['status5']==4) {
        echo " انهاء فترة تجربة     ";
     } ?> 


</td>
  

    

       <?PHP endif;?> 

       <td>

          <?php if ($customerss['path'] != ""):?> 


             <a style="background-color:#007bff; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" title="   مرفق السيرة الذاتية  " class="btn btn-download" href="#" onClick="MyWindow=window.open('<?php echo site_url(); ?>assets/imeges/posts/<?php echo $customerss['path']; ?>','MyWindow',width=50,height=50); return false;"><i class="fa fa-cloud-download" ></i>
                                                                       مرفق السيرة الذاتية        
                                                              </a>

                                                                 <?php else:?> 

                        لا يوجد


                          <?php endif?>



       </td>
 <td><?php echo $customerss['useridfuturename']; ?></td>

      


                              
 
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

