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
    font-style: normal; font-size:20px;">بيانات     مرشحي التوظيف المرحلة الأولى<small><!-- All Users In insert_sadad --></small> </h2>                            
                        </div>
                        <div class="body" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">
                            <div class="table-responsive">    
                          <!--   <table class="table table-bordered table-hover table-striped" cellspacing="0" id="addrowExample"> -->

                                <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead>
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th> الرقم </th>  
                               <th> الاسم </th>
                               
                                <th>     رقم الهوية </th>
                                  
                                  <th> الجوال </th>
                                   <th> الجنسية </th>
                                    <th>   </th>
                                       <th>   </th>
                                          <th>   </th>
                                             <th>   </th>

                                
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                    <?php foreach($customers as $customerss) : ?>
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $customerss['id']; ?></td> 
                                       <td>  <a style="font-family: 'Tajawal', sans-serif; font-weight: bold; background-color:#007bff; color:#ffffff;" type="button" href="<?php echo site_url('users/view_emp_don/'.$customerss['id']); ?>" class="btn btn-outline-dark">    <?php echo $customerss['name']; ?>  </a></td> 
                                       <td><?php echo $customerss['id_number']; ?></td>
                                       <td><?php echo $customerss['id_number']; ?></td>
                                       
                                       <td><?php echo $customerss['mobile']; ?></td>
                                       <td><?php echo $customerss['Nationality']; ?></td>

                                       <td > <a title=" نموذج    بيانات ومعلومات التوظيف " class="btn btn-blue btn-xs" href="https://www.sadadjobs.com/hr101/users/info_emp/<?php echo $customerss['id']; ?>" target="_blank">
                     نموذج    بيانات ومعلومات التوظيف   
              </a> </td> 

                <td > <a title=" نموذج    بيانات ومعلومات التوظيف " class="btn btn-blue btn-xs" href="https://www.sadadjobs.com/hr101/users/Job_offer/<?php echo $customerss['id']; ?>" target="_blank">
                     نموذج     عرض عمل   
              </a> </td> 


                <td > <a title=" نموذج    بيانات ومعلومات التوظيف " class="btn btn-blue btn-xs" href="https://www.sadadjobs.com/hr101/users/emp_data/<?php echo $customerss['id']; ?>" target="_blank">
                     نموذج     عرض  بيانات   
              </a> </td> 

                 <td > <a title=" نموذج    بيانات ومعلومات التوظيف " class="btn btn-blue btn-xs" href="https://www.sadadjobs.com/hr101/users/direct_action/<?php echo $customerss['id']; ?>" target="_blank">
                     نموذج         مباشرة عمل   
              </a> </td> 







                                      <!--  <td>

                                         <a title="التقرير اليومي"  href="#" onClick="MyWindow=window.open('https://www.sadadjobs.com/hr101/users/interview_print/','MyWindow',width=50,height=50); return false;">نموذج التوظيف
                                 
                                           </a>

                                       </td>
 -->
                                      <!--  <td>
                                         <a title="<?php echo $customerss['name']; ?>" class="btn btn-download" href="#" onClick="MyWindow=window.open('/website_sadad/assets/imeges/posts/<?php echo $customerss['path']; ?>','MyWindow',width=50,height=50); return false;"><i class="fa fa-cloud-download" ></i>
                                 <?php echo $customerss['name']; ?> 
                            </a>

                                      </td> -->
                                     
 
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