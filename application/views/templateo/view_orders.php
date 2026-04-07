

        <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/view_orders/'.$id); 
             $dd=$id;?>


 

             
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>          طلب رقم  (<?php echo $id; ?>)  <?php $id=$get_orders202['status'];
                                            if ($id == 1):?>
                                             <a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" href="<?php //echo site_url('users/order_list1')?>" class="badge btn btn-outline-primary" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span>قيد الدراسة</span></a>
                                            <?php endif?>
                                            <?php $id=$get_orders202['status'];
                                            if ($id == 2):?>
                                              <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" type="button" class="badge badge-primary" disabled="disabled"><i class="fa fa-refresh fa-spin"></i> <span>      تعميد الطلب</span></button>

                                            
                                            <?php endif?>
                                            <?php $id=$get_orders202['status'];
                                            if ($id == 3):?>
                                              <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" class="badge badge-warning" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span> الطلب لدى المالية  </span></button>

                                              
                                            <?php endif?>
                                            <?php $id=$get_orders202['status'];
                                            if ($id == 4):?>
                                              <button type="button" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" class="badge badge-success"><i class="fa fa-check-circle"></i> <span>تم الموافقة</span></button> 
                                            <?php endif?>
                                            <?php $id=$get_orders202['status'];
                                            if ($id == 5):?>
                                              <i class="fa fa-circle text-warning"></i>
                                            <?php endif?>
                                             <?php $id=$get_orders202['status'];
                                            if ($id == 6):?>
                                              <span class="badge badge-danger" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">مرفوض</span>
                                            <?php endif?>
                                            
    
                                         </h2>
                       <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/dashbord_analyses"><i class="icon-home"></i></a></li>                            
                            
                             <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/order_list"><i class="icon-notebook"></i></a></li>

                           <!--  <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/new_order"><i class="fa fa-plus"></i></a></li> -->

                             <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/new_order"><i class="fa fa-plus"></i></a></li>

                             <li style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" class="breadcrumb-item active"><a href="<?php echo site_url('users/add_attachment/'.$dd); ?>">عرض سعر جديد</a></li>

                              

                            
                        </ul>
                    </div>            
                   
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">   عنوان الطلب   (<?php echo $get_orders202['titel']; ?>)  مقدم من   (<?php echo $get_orders202['name']; ?>) تاريخ الطلب  (<?php echo $get_orders202['date_order']; ?>)  وقت الطلب   (<?php echo $get_orders202['time_order']; ?>)</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate>
                                 <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                          <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">تفاصيل الطلب         

                            </h2>
                             

                        </div>
                        <div class="body" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15    px;">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Home">الأصناف</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Profile">عروض أسعار</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact">التعميد</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Contact1">المالية</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="Home">


                                    <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead>
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th> الصنف </th>  
                               <th> الكمية </th>
                               <th>  </th>
                            
                              
 
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                    <?php foreach($get_ordersdetailes_202 as $get_ordersdetailes_202) : ?>
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $get_ordersdetailes_202['item_name']; $bb=$get_ordersdetailes_202['item_name'];?></td> 
                                       <td><?php echo $get_ordersdetailes_202['quantity']; ?></td>
                                        <td >


  <?php if ($get_orders202['status'] == 3): ?>
                <button type="button" class="btn btn-success disabled">تم ارسال الطلب  </button>

                  
                <?php endif?>

                <?php if ($get_orders202['status'] == 2): ?>
                 <a type="button" href="<?php echo site_url('users/order_edit/'.$get_ordersdetailes_202['id']); ?>" class="btn btn-outline-dark">تعديل</a>
                  
                <?php endif?>

                 <?php if ($get_orders202['status'] == 1): ?>
                 <a type="button" href="<?php echo site_url('users/order_edit/'.$get_ordersdetailes_202['id']); ?>" class="btn btn-outline-dark">تعديل</a>
                  
                <?php endif?>


                


                                        </td>
  
 
                              </tr>

    <?php endforeach; ?>  
                                    </tbody>
                                </table>

                              

    


                              <!--   <iframe width="560" height="315" src="https://www.youtube.com/embed/tJJMxL_34nM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->

                                   
                                </div>
                                <div class="tab-pane" id="Profile">

      <!-- <p> <?php 
        $x = explode(',',$get_orders202['path']);
        $xx = count($x);
        $c=0;
        while( $c < $xx)
        {
    ?>
        <a target="_blank"  title="  <?php  echo $this->lang->line("attup"); ?>  " class="btn btn-download" href='<?php echo base_url(); ?>assets/imeges/posts/<?php echo $x[$c]; ?>' ><i class="fa fa-cloud-download" ></i> <?php echo $x[$c];?></a>
            
    <?php
        $c++;
        }
    ?>      </p>  -->

                                 <table style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;"  class="table m-b-0">  
                    <thead>
                      <tr>
                         <th scope="col">   </th>
                       
         
             
 
 
                      </tr>
                    </thead>
                    <tbody>
 
                    <?php foreach($get_attachment202 as $get_attachment202) : ?>
    <tr>
  
        
       <td>

        <a title="<?php echo $get_attachment202['name']; ?>" class="btn btn-download" href="#" onClick="MyWindow=window.open('<?php echo site_url(); ?>assets/imeges/posts/<?php echo $get_attachment202['path']; ?>','MyWindow',width=50,height=50); return false;"><i class="fa fa-cloud-download" ></i>
                                 <?php echo $get_attachment202['name']; ?> 
                            </a> 
 
        </td>
    
        <td>

      
            
        </td>
      
    </tr>
    <?php endforeach; ?>
                    </tbody>
                  </table>

                   
 
  <?php if ($get_orders202['status'] == 3): ?>
                <button type="button" class="btn btn-success disabled">تم ارسال الطلب  </button>

                  
                <?php endif?>


                  <?php if ($get_orders202['status'] == 2): ?>

<?php $id4=$this->session->userdata('type');
                               if ($id4 == 2): ?>
                  <a   class="btn btn-primary" href="<?php echo site_url('users/add_attachment/'.$id); ?>" target="_blank">
                   إضافة عروض أسعار  
              </a> 


               <a   class="btn btn-primary" data-toggle="modal" data-target="#staticModal" href="<?php echo site_url('users/add_attachment/'.$id); ?>" target="_blank">
                       إرسال الطلب  للتعميد    
              </a>


               <a   class="btn btn-primary" data-toggle="modal" data-target="#staticModal102" href="<?php echo site_url('users/add_attachment/'.$id); ?>" target="_blank">
                       إرسال الطلب  للمالية    
              </a>

               <?php endif?>
                
                  
                <?php endif?>


                 <?php if ($get_orders202['status'] == 1): ?>

<?php $id4=$this->session->userdata('type');
                               if ($id4 == 2): ?>
                  <a   class="btn btn-primary" href="<?php echo site_url('users/add_attachment/'.$id); ?>" target="_blank">
                   إضافة عروض أسعار  
              </a> 


               <a   class="btn btn-primary" data-toggle="modal" data-target="#staticModal" href="<?php echo site_url('users/add_attachment/'.$id); ?>" target="_blank">
                       إرسال الطلب  للتعميد    
              </a>


               <a   class="btn btn-primary" data-toggle="modal" data-target="#staticModal102" href="<?php echo site_url('users/add_attachment/'.$id); ?>" target="_blank">
                       إرسال الطلب  للمالية    
              </a>

               <?php endif?>
                
                  
                <?php endif?>





 
   
                                </div>
                                <div class="tab-pane" id="Contact">
                                    <h6>التعميد</h6>

                                    <?php $id4=$this->session->userdata('type');
                               if ($id4 == 3): ?>
                                <?php if ($get_orders202['status'] == 2): ?>
                  


               <a   class="btn btn-primary" data-toggle="modal" data-target="#staticModal1" href="<?php echo site_url('users/add_attachment/'.$id); ?>" target="_blank">
                       إرسال الطلب   للمالية    
              </a>
               <?php endif?>
               <?php endif?>
               <?php if ($get_orders202['status'] == 3): ?>
                <button type="button" class="btn btn-success disabled">تم ارسال الطلب  </button>

                  
                <?php endif?>


                                     
                                </div>

                                <div class="tab-pane" id="Contact1">
                                    
 
                                    <h6>المالية</h6>
                                     

                           

                          
                                   
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                        
                         
                        </div>
                    </div>
                </div>
            </div>
 

                                 
                                 
                                  
                                 


                                     
                                </div>
                                
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
                                <h5 class="modal-title" id="staticModalLabel">        إرسال الطلب (لن تتمكن من تعديل الطلب بعد هذا الإجراء)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                                   هل أنت متأكد من إرسال الطلب
                                </p>
                            </div>
          <div class="modal-footer">
     <div class="row">
  <div class="col-md-6">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
  </div>
  <div class="col-md-6">
                <?php echo form_open('/users/update_order/'.$dd); ?>    
              <p>
               <input type="submit" value="نعم" class="btn btn-danger">
              
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



 <!--  ////////////تعميد//////// -->
 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="modal fade" id="staticModal1" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">أرسال الطلب للمالية للتنفيذ  (لا يمكن تعديل الطلب بعد الإرسال)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                                   هل أنت متأكد من إرسال الطلب
                                </p>
                            </div>
          <div class="modal-footer">
     <div class="row">
  <div class="col-md-6">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
  </div>
  <div class="col-md-6">
                <?php echo form_open('/users/update_order101/'.$dd); ?>    
              <p>
               <input type="submit" value="نعم" class="btn btn-danger">
              
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



   <!--  ////////////تعميد//////// -->
 <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="modal fade" id="staticModal105" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel"><?php //echo $id3; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                 
                                                   هل أنت متأكد من إرسال الطلب
                                </p>
                            </div>
          <div class="modal-footer">
     <div class="row">
  <div class="col-md-6">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
  </div>
  <div class="col-md-6">
                <?php echo form_open('/users/update_order101/'.$dd); ?>    
              <p>
               <input type="submit" value="نعم" class="btn btn-danger">
              
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


<!--   ///////////////////////////////////////////////////////////////////////
 -->


       <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="modal fade" id="staticModal102" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">        إرسال الطلب  لى المالية (لن تتمكن من تعديل الطلب بعد هذا الإجراء)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                                   هل أنت متأكد من إرسال الطلب
                                </p>
                            </div>
          <div class="modal-footer">
     <div class="row">
  <div class="col-md-6">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
  </div>
  <div class="col-md-6">
                <?php echo form_open('/users/update_order102/'.$dd); ?>    
              <p>
               <input type="submit" value="نعم" class="btn btn-danger">
              
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






  

