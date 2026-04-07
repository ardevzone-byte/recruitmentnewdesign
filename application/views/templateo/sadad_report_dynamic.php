 <?php echo validation_errors(); ?>
 <?php echo form_open_multipart('users/sadad_report_dynamic'); ?>
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


                              <!-- <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/insert_sadad"><i class="fa fa-plus"></i></a></li> -->

                            
                            
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
    font-style: normal; font-size:15px;">تقرير    المرسومات اليومي <small>من تاريخ - الى تاريخ</small> </h2>
                                    
                                                                
                        </div>

                         <div class="row">
                                      <div class="col-lg-4">                                        
                                        <input name="search" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="من تاريخ" data-date-format="yyyy/mm/dd">
                                    </div>
                                  </br>
                                   </br>
                                        

                                     <div class="col-lg-4">                                        
                                        <input name="search1" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" placeholder="الى تاريخ" data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="yyyy/mm/dd">
                                    </div>
                                </div>

                                <div class="row">
          <div class="col-md-6">
              <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="submit" id="submit" class="btn btn-primary">بحث </button>
          </div>
          <div class="col-md-6">                            
          </div>                                  
      </div>

                                   
                        <div class="body">
                            <div class="table-responsive">    
                          <!--   <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample"> -->

                                <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead>
                             <tr>
                               <th> id </th>  
                               <th >amount </th>
                               <th> date </th>
                                    
                         
              
                             </tr>
                               </thead>
                                    <!-- <tfoot>
                                        <tr>
                               <th style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> الإجمالي </th>  
                               <th> <?php echo $customer_numbers ; ?> </th>
                               <th>  </th>
                             </tr>
                                    </tfoot> -->
                                    <tbody>
                                    <?php foreach($customers as $customerss) : ?>
                             <tr  >
                                       <td><?php echo $customerss['id']; ?></td> 
                                       <td><?php echo $customerss['payment_amount']; ?></td>
                                       <td><?php echo $customerss['sadad_date_day']; ?></td>
                                       
           
            

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
    <?php echo form_close(); ?>

    <script src="<?php echo base_url();?>/assets/vendor/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js --> 
 


<script src="<?php echo base_url();?>assets/bundles/libscripts.bundle.js"></script>    
<script src="<?php echo base_url();?>assets/bundles/vendorscripts.bundle.js"></script>
<script src="<?php echo base_url();?>assets/bundles/jvectormap.bundle.js"></script> 
<script src="<?php echo base_url();?>assets/bundles/morrisscripts.bundle.js"></script>
<script src="<?php echo base_url();?>assets/bundles/knob.bundle.js"></script>
<script src="<?php echo base_url();?>assets/js/index5.js"></script>
<script src="<?php echo base_url();?>assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?php echo base_url();?>assets/vendor/parsleyjs/js/parsley.min.js"></script>
    
<script src="<?php echo base_url();?>assets/bundles/mainscripts.bundle.js"></script>


<script src="<?php echo base_url();?>/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="<?php echo base_url();?>/assets/vendor/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<script src="<?php echo base_url();?>/assets/vendor/jquery.maskedinput/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendor/multi-select/js/jquery.multi-select.js"></script>
<script src="<?php echo base_url();?>/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url();?>/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="<?php echo base_url();?>/assets/vendor/nouislider/nouislider.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/forms/advanced-form-elements.js"></script>


<script>
    $(function() {
        // validation needs name of the element
        $('#food').multiselect();

        // initialize after multiselect
        $('#basic-form').parsley();
    });
    </script>

</body>
</html>