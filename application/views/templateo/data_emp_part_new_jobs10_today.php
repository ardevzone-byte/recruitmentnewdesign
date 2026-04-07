 <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-right"></i></a>                  مواعيد مقابلات اليوم</h2>
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
    font-style: normal; font-size:20px;">           بيانات المرشحين     <small><!-- All Users In insert_sadad --></small> </h2>                            
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
                                 <th> mobile </th>

                                 <th> التاريخ </th>

                                   <th> الوقت </th>
                               
                                   
                                 
 

 

                                      

                                      <th>   نموذج المقابلة الوظيفية  </th>
                                    
                                      
                                     



 <?PHP if ($this ->session->userdata('type') == 3):   
                                      ?>
     <th>        تقييم المرشح  </th> 
   

   <?PHP endif;?>
                                      


   <th>       </th>
 


                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                    <?php foreach($customers as $customerss) : ?>
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $customerss['id']; ?></td> 
                                       <td><?php echo $customerss['name']; ?></td>
                                         <td><?php echo $customerss['mobile']; ?></td>
                                       <td><?php echo $customerss['Date_of_the_personal_interview']; ?></td>
                                       <td><?php echo $customerss['Time_of_the_interview']; ?></td>
                                       
                                     
  
 

 
 
 


   
 <td >

     <a  style="background-color:#007bff; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" title=" نموذج المقابلة الوظيفية " class="btn btn-blue btn-xs" href="https://services.marsoom.net/hr101/users/interview_print/<?php echo $customerss['id_number']; ?>" target="_blank">
                    نموذج المقابلة الوظيفية  
              </a>


    </td> 



   <?PHP if ($this ->session->userdata('type') == 3):   
                                      ?>
 <td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/view_emp_hrs/'.$customerss['id']); ?>" class="btn btn-outline-dark">   التفاصيل  </a></td> 
   

   <?PHP endif;?>
    
    

    
 




<td >
   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/add_status555/'.$customerss['id']); ?>" class="btn btn-outline-dark">   add  </a></td>








 
                                     
                                     
 
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