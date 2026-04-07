

        <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/edit_order/'.$id); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>          طلب رقم  (<?php echo $id; ?>)  <?php $id=$get_orders202['status'];
                                            if ($id == 1):?>
                                             <span class="badge badge-success" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">جديد</span>
                                            <?php endif?>
                                            <?php $id=$get_orders202['status'];
                                            if ($id == 2):?>
                                              <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" type="button" class="badge badge-primary" disabled="disabled"><i class="fa fa-refresh fa-spin"></i> <span>     انتظار</span></button>

                                            <!--  < span class="badge badge-default" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">تم الاستلام</span> -->
                                            <?php endif?>
                                            <?php $id=$get_orders202['status'];
                                            if ($id == 3):?>
                                              <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;" type="button" class="badge badge-warning" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span>قيد الدراسة</span></button>

                                              <!-- <span class="badge badge-warning" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">قيد الدراسة</span> -->
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

                            <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/new_order"><i class="fa fa-plus"></i></a></li>
                            
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
                              
 
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                    <?php foreach($get_ordersdetailes_202 as $get_ordersdetailes_202) : ?>
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $get_ordersdetailes_202['item_name']; ?></td> 
                                       <td><?php echo $get_ordersdetailes_202['quantity']; ?></td>
                                       
 
                              </tr>
    <?php endforeach; ?>  
                                    </tbody>
                                </table>

                                   
                                </div>
                                <div class="tab-pane" id="Profile">




      <p> <?php 
        $x = explode(',',$get_orders202['path']);
        $xx = count($x);
        $c=0;
        while( $c < $xx)
        {
    ?>


              
    <a title="<?php echo $get_orders202['id']; ?>" class="btn btn-outline-primary btn-sm" href="#" onClick="MyWindow=window.open('<?php echo base_url(); ?>assets/imeges/posts/<?php echo $x[$c]; ?>','MyWindow',width=600,height=300); return false;">
                <?php echo $x[$c];?>
              </a>


       <!--   <a target="_blank"  title="  <?php  echo $this->lang->line("attup"); ?>  " class="btn btn-download" href='<?php echo base_url(); ?>assets/imeges/posts/<?php echo $x[$c]; ?>' ><i class="fa fa-cloud-download" ></i> <?php echo $x[$c];?></a>   -->
            
    <?php
        $c++;
        }
    ?>      </p> 
   
                                </div>
                                <div class="tab-pane" id="Contact">
                                    <h6>التعميد</h6>
                                     
                                </div>

                                <div class="tab-pane" id="Contact1">
                                    
 
                                    <h6>المالية</h6>

                                     

                           

                          
                                   
                                </div>


                            </div>

                        </div>

                    </div>
                    <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="submit" name="submitForm" value="formSave" class="btn btn-primary">تعديل الطلب وارسالة للتعميد</button>
                                
                            </form>
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
            
        </div>
    </div>
 


      <?php echo form_close(); ?>
    

