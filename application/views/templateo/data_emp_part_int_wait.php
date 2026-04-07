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
                               
                                <th> رقم الهوية </th>
                                
                                  <th> الجوال </th>
                                   <th> الجنسية </th>

                                    <th>  حالة المقابلة </th>
                                  
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

                                   <!--    <th>  التفاصيل </th>
                                      <th>    </th> -->
                                    <!--   <th>    </th> -->
                                      
                                    
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


                                             <?PHP if ($this ->session->userdata('type') == 7):   
                                      ?>
 <th>   موعد جديد </th>
 <th>    </th>
                                      
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
                                        <td>  <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/view_emp_don/'.$customerss['id']); ?>" class="btn btn-outline-dark">    <?php echo $customerss['name']; ?>  </a></td> 
                                       <td><?php echo $customerss['id_number']; ?></td>
                                     
                                       
                                       <td><?php echo $customerss['mobile']; ?></td>
                                       <td><?php echo $customerss['Nationality']; ?></td>

                                        <td >
                                        <?PHP if ($customerss['state_interview'] == 1):   
                                      ?>
                                      <button style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" class="btn btn-primary" disabled="disabled"><i class="fa fa-refresh fa-spin"></i> <span>  انتظار المقابلة</span></button>

                                       <?PHP elseif ($customerss['state_interview'] == 2):   
                                      ?>
                                       <button style="font-family: 'Tajawal', sans-serif; font-weight: bold; color:#ffffff;" type="button" disabled="disabled" class="btn btn-success"><i class="fa fa-check-circle"></i> <span> تم اجراء المقابلة</span></button>

                                       <?PHP elseif ($customerss['state_interview'] == 3):   
                                      ?>
                                       <button style="font-family: 'Tajawal', sans-serif; font-weight: bold; color:#000000;" disabled="disabled" type="button" class="btn btn-warning"><i class="fa fa-warning"></i> <span> لم يحضر المقابلة</span></button>


                                       <?PHP endif;?>
                                      </td>


 <td >
  <!--  <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/view_emp_hrs/'.$customerss['id']); ?>" class="btn btn-outline-dark">   التفاصيل  </a>   -->
    
   <!-- <a type="button" href="<?php echo site_url('users/state_interview/'.$customerss['id']); ?>" class="btn btn-outline-dark">     تغيير حالة المقابلة</a>  -->
 
   <!-- <a type="button" href="<?php //echo site_url('users/redirection/'.$customerss['id']); ?>" class="btn btn-outline-dark">     إعادة توجيه</a> -->

    <a title="التفاصيل"  href="<?php echo site_url('users/view_emp_hrs/'.$customerss['id']); ?>" data="<?php //echo $customerss['did'];?>" class="btn btn-sm connect">
                <li class="fa fa-eye"></li> 
              </a>



   <a title="تغيير حالة المقابلة"  href="<?php echo site_url('users/state_interview/'.$customerss['id']); ?>" data="<?php //echo $customerss['did'];?>" class="btn btn-sm connect">
                <li class="fa fa-link"></li> 
              </a>


   <a title="  إعادة توجيه "  href="<?php echo site_url('users/redirection/'.$customerss['id']); ?>" data="<?php //echo $customerss['did'];?>" class="btn btn-sm connect">
                <li class="fa fa-reply"></li> 
              </a>

 
              </td> 



                                       
  


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
 <!-- <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/view_emp_hrs/'.$customerss['id']); ?>" class="btn btn-outline-dark">   التفاصيل  </a></td> 
   <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/computer_deg/'.$customerss['id']); ?>" class="btn btn-outline-dark">     تقييم الحاسب  </a></td>  -->

   <?PHP endif;?>


    <?PHP if ($this ->session->userdata('type') == 7):   
                                      ?>
 <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/new_app/'.$customerss['id']); ?>" class="btn btn-outline-dark">  اضافة موعد جديد  </a></td> 
   

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

                 
<!-- 
 <td >
   <a type="button" href="<?php echo site_url('users/appointment/'.$customerss['id']); ?>" class="btn btn-outline-dark">اضافة موعد للمقابلة</a></td> 
<td >
   <a type="button" href="<?php echo site_url('users/redirection/'.$customerss['id']); ?>" class="btn btn-outline-dark">     إعادة توجيه</a>

 
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

    <script src="<?php echo base_url();?>assets/bundles/libscripts.bundle.js"></script>    
<script src="<?php echo base_url();?>assets/bundles/vendorscripts.bundle.js"></script>

<script src="<?php echo base_url();?>assets/bundles/datatablescripts.bundle.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>

<script src="<?php echo base_url();?>assets/vendor/sweetalert/sweetalert.min.js"></script>  


<script src="<?php echo base_url();?>assets/bundles/mainscripts.bundle.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/tables/jquery-datatable.js"></script>




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
    font-style: normal; font-size:15px;" type="button" class="btn btn-danger" data-dismiss="modal">إلغاء</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
 
$(function (){    
    
     
    
     
    //btnReplay 
    $('.replay').on('click',  function(){
      var id = $(this).attr('data');
      $('input[name=txtId]').val(id);
      $('#myModalreplay').modal('show');  
      $('#btnReplay').click(function(){
        
        var data = $('#Replay').serialize();
        $.ajax({
          type: 'ajax',
          method: 'get',
          async: false,
          url: '<?php echo base_url() ?>users/deal_replay1',
          data:data,
          dataType: 'json',
          success: function(data){
            $('#myModalreplay').modal('hide');
            setTimeout(function() {
                location.reload();
            }, 1000);
            $('.alert-success').html(' <?php  echo $this->lang->line("rego"); ?>      ').fadeIn().delay(3000).fadeOut('slow');
          },
          error: function(){
            $('.alert-danger').html(' <?php  echo $this->lang->line("persongo"); ?>          ').fadeIn().delay(3000).fadeOut('slow');
          }
        
        });
        
      });
      
    }); 
      
      
 
    
    
  
    /*function
    function showAllUsers(usersID){
      $.ajax({
        type: 'ajax',
        url: '<?php echo base_url() ?>users/showAllUsers',
        async: false,
        dataType: 'json',
        success: function(data){
          
          var html = '';
          var i;
          var html = '<option>Choose</option>';
          for(i=0; i<data.length; i++){
          //alert(data[i].id);  
            html +=
                //'<option value="'+data[i].name+'">'+data[i].name+'</option>';
                '<h1 >'+data[i].name+'</h1>';
                  
            
          }
           $('#multiselect option[value="'+data[i].name+'"]').prop('disabled', true);

            $("#multiselect option").on('click',function() {
              $('#multiselect option[value="'+data[i].name+'"]').prop('selected',true);
            });
        //  $('#multiselect').html(html);     
          
        },
        error: function(){
          alert('Could not get Data from Database');
        }
      });
    }*/
    
});

    

</script>


</body>
</html>