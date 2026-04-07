 <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-right"></i></a> الأصناف</h2>
                       <ul class="breadcrumb">
                           

                             <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/items_index"><i class="icon-notebook"></i></a></li>

                            <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/add_item"><i class="fa fa-plus"></i></a></li>
                            
                        </ul>
                    </div>            
                  
                </div>
            </div>
            
            <div class="row clearfix">
                
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><!-- Users Data --><small><!-- All Users In insert_sadad --></small> </h2>                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">    


                               <table    class="table table-bordered table-striped table-hover dataTable js-exportable" cellspacing="0">
                                      <thead>
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th> الصنف </th>  
                               <th>   </th>
                               <th>  </th> 
                               <th>  </th>
                            
                              
 
                             </tr>
                               </thead>
                                    
                                    <tbody>
                                    <?php foreach($customers as $customers) : ?>
                             <tr  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                       <td ><?php echo $customers['name']; $bb=$customers['name'];?></td> 
                                      
                                       
                                         <td><?php if ($customers['type']==1)
                                        {
                                         echo "مواد كهرباء" ; 
                                       }elseif ($customers['type']==2) {
                                         echo "مواد سباكة" ; 
                                       }elseif ($customers['type']==3) {
                                         echo "مواد زراعية" ; 
                                       } elseif ($customers['type']==4) {
                                         echo "أثاث منزلي" ; 
                                       } elseif ($customers['type']==5) {
                                         echo "مشتريات المكتب" ; 
                                       } elseif ($customers['type']==6) {
                                         echo "مشتريات الشيخ الخاصة" ; 
                                       }  ?></td>
                                       <td><?php if ($customers['unit']==1)
                                        {
                                         echo "عدد" ; 
                                       }elseif ($customers['unit']==2) {
                                         echo "وزن" ; 
                                       }  ?></td>

                                        <td > <a type="button" href="<?php echo site_url('users/item_edit/'.$customers['id']); ?>" class="btn btn-outline-dark">تعديل</a>


                                        </td>
  
 
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

<script src="<?php echo base_url();?>assets/vendor/sweetalert/sweetalert.min.js"></script> <!-- SweetAlert Plugin Js --> 


<script src="<?php echo base_url();?>assets/bundles/mainscripts.bundle.js"></script>
<script src="<?php echo base_url();?>assets/js/pages/tables/jquery-datatable.js"></script>
</body>
</html>