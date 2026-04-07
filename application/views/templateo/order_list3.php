 <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-right"></i></a>           الطلبات   </h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/dashbord_analyses"><i class="icon-home"></i></a></li>                            
                            
                             <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/order_list"><i class="icon-notebook"></i></a></li>

                            <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/add_new_order"><i class="fa fa-plus"></i></a></li>
                            
                        </ul>
                    </div>            
                    
                </div>
            </div>
            
            <div class="row clearfix">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">بيانات الطلبات الخاصة بي   <a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" class="badge btn badge-warning"  disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span>قيد المراجعة المالية</span></a><small><!-- All Users In insert_sadad --></small> </h2>                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">    
                          <!--   <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample"> -->

                                <table class="table m-b-0">
                                      <thead>
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                              <!--  <th></th>  -->
                              
                               <th> رقم الطلب </th>  
                               <th> مقدم الطلب </th>
                               <th>  عنوان الطلب  </th>
                              
                               
                               
 
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                    <?php foreach($customers as $customerss) : ?>
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">  
                                       <td ><a title="<?php echo $customerss['id']; ?>" class="btn btn-outline-primary btn-sm" href="#" onClick="MyWindow=window.open('<?php echo site_url('users/edit_order/'.$customerss['id']); ?>','MyWindow',width=600,height=300); return false;">
                <?php echo $customerss['id']; ?>
              </a></td> 
                                       <td><?php echo $customerss['name']; ?></td>
                                       <td><?php echo $customerss['titel']; ?></td>
                                       
                                        
                                       
 
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
</body>
</html>