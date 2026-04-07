 <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-right"></i></a>تعديل السقف  الأعلى اليومي والشهري للمشرفين</h2>
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
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">بيانات المستخدمين<small>      <!-- insert_sadad --></small> </h2>                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">    
                          <!--   <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample"> -->

                                <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">
                                      <thead>
                             <tr>
                             <!--   <th> id </th>   -->
                               <th> name </th>
                               <th> اليومي </th>
                               <th> الشهري </th>
                               <th>  </th>
                                    
                         
              
                             </tr>
                               </thead>
                                  <!--   <tfoot>
                                        <tr>
                               <th> id </th>  
                               <th> name </th>
                               <th> username </th>
                            
                              
              
                             </tr>
                                    </tfoot> -->
                                    <tbody>
                                    <?php foreach($customers as $customerss) : ?>
                             <tr  >
                                       <!-- <td><?php echo $customerss['id']; ?></td>  -->
                                       <td><?php echo $customerss['name']; ?></td>
                                       <td><?php echo $customerss['tragit_day']; ?></td>
                                       <td><?php echo $customerss['tragit_month']; ?></td>
                                       <td><p><a class="btn btn-outline-primary btn-sm" href="<?php echo site_url('users/targit_edit/'.$customerss['id']); ?>">edit</a><p></td>
                                       
           
            

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