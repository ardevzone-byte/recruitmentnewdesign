 <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-right"></i></a>التقارير</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/chart_gugus"><i class="icon-home"></i></a></li>                            
                              


                               <?php $id=$this->session->userdata('type');
                               if ($id == 1):?> 

                             <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/sadad_report"><i class="icon-notebook"></i></a></li>

                              <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/sadad_report_dynamic"><i class="icon-notebook"></i></a></li>


                              <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/insert_sadad"><i class="fa fa-plus"></i></a></li>

                                <?php endif?>

                            
                            
                        </ul>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                           <!--  <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#00c5dc"
                                data-fill-Color="transparent">3,5,1,6,5,4,8,3</div>
                            <span>Rajhi</span> -->
                        </div>
                        <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                           <!--  <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#f4516c"
                                data-fill-Color="transparent">4,6,3,2,5,6,5,4</div>
                            <span>Al Ahli</span> -->
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row clearfix">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">تقرير مرسومات   منذ بداية النشاط<small><!-- <?php echo date("Y/m/d"); ?> --></small> </h2>                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">    
                          <!--   <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample"> -->

                                <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead>
                             <tr>
                               <th> name </th>  
                               <th >amount </th>
                             
                                    
                         
              
                             </tr>
                               </thead>
                                    <tfoot>
                                        <tr>
                               <th style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> الإجمالي </th>  
                               <th> <?php echo $customer_numbers ; ?> </th>
                               <th> <!-- username --> </th>
                             </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach($customers as $customerss) : ?>
                             <tr  >
                                       <td><?php echo $customerss['username']; ?></td> 
                                       <td><?php echo $customerss['SUM(payment_amount)']; ?></td>
                                        
                                       
           
            

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