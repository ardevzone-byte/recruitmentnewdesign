    <div id="main-content">


        <div class="container-fluid">
        </br>
         <div class="body">
                            <ul style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;" class="nav nav-tabs-new2">
                                


                                
                  <?PHP if ($this ->session->userdata('type') != 2):   
                                      ?>
                                      <?PHP if ($this ->session->userdata('type') != 1):   
                                      ?>
                                       <?PHP if ($this ->session->userdata('type') != 4):   
                                      ?>


                                <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Contact-new2" style="color:#000000;"> حالات المقابلات  </a></li>


                                 



                                <?PHP endif;?>
                                <?PHP endif;?>
                <?PHP endif;?>
                


                            </ul>
                            <div class="tab-content">
                                <div class="tab" id="Home-new2">
                                     

              <div class="row clearfix"  >
               
               



             


               


 


 
 



  
 
                                          
                    


               
              <?PHP if ($this ->session->userdata('type') != 7):   
                                      ?>
                  <?PHP if ($this ->session->userdata('type') != 2):   
                                      ?>
                                      <?PHP if ($this ->session->userdata('type') != 1):   
                                      ?>
                                       <?PHP if ($this ->session->userdata('type') != 4):   
                                      ?>
        <!--  <div class="col-lg-4 col-md-6" >
               <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>أداء الموظفين</h2>
         </div>
          <div class="col-lg-4 col-md-6" >
         </div>
          <div class="col-lg-4 col-md-6" >
         </div> -->

         

                  <div class="col-lg-3 col-md-6" >
                    <div class="card overflowhidden" style="background-color:#00AEC9;">
                        <div class="body" style="background-color:#cbcbcb; color:#007bff;">
                            <h3><?php echo $cuntt_user_conect ; ?> <!-- <i class="icon-basket float-right"> --><a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#007bff;" type="button" href="<?php echo site_url('users/users_conect')?>" class="badge btn btn-outline-primary float-right" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#007bff;" >      عرض</span></a></i></h3>

    <h3>  <!-- <i class="icon-basket float-right"> --><!-- <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#ffffff;" type="button" onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="badge btn btn-success float-right" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#ffffff;" > تصدير  </span></a> --></i></h3>


                            <span style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:10px; color:#007bff;">               المتصلين حالياً بالنظام </span>                            
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" style="background-color:#ffffff;" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>

                  <div class="col-lg-3 col-md-6" >
                    <div class="card overflowhidden" style="background-color:#00AEC9;">
                        <div class="body" style="background-color:#cbcbcb; color:#007bff;">
                            <h3><?php echo $watch_days; ?> <!-- <i class="icon-basket float-right"> --><a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#007bff;" type="button" href="<?php //echo site_url('users/data_emp_part1')?>" class="badge btn btn-outline-primary float-right" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#007bff;" >      عرض</span></a></i></h3>


    <h3>  <!-- <i class="icon-basket float-right"> --><!-- <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#ffffff;" type="button" onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="badge btn btn-success float-right" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#ffffff;" > تصدير  </span></a> --></i></h3>


                            <span style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#007bff;">            المراقبة  اليومية </span>                            
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" style="background-color:#ffffff;" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>


                  <div class="col-lg-3 col-md-6" >
                    <div class="card overflowhidden" style="background-color:#00AEC9;">
                        <div class="body" style="background-color:#cbcbcb; color:#007bff;">
                            <h3><?php echo $watch_all; ?> <!-- <i class="icon-basket float-right"> --><a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#007bff;" type="button" href="<?php //echo site_url('users/data_emp_part1')?>" class="badge btn btn-outline-primary float-right" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#007bff;" >      عرض</span></a></i></h3>


    <h3>  <!-- <i class="icon-basket float-right"> --><!-- <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#007bff;" type="button" onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="badge btn btn-success float-right" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#ffffff;" > تصدير  </span></a> --></i></h3>



                            <span style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#007bff;">            المراقبة الشاملة </span>                            
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" style="background-color:#007bff;" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>

                <?PHP endif;?>
                <?PHP endif;?>
                <?PHP endif;?>
                <?PHP endif;?>














                

                 

 


               



   


            
               
                                    
              
            </div>

                                </div>

                                   


                                <div class="tab-pane" id="Profile-new2">
                                    <div class="block-header">
                <div class="row">

                     <div class="col-lg-5 col-md-8 col-sm-12">                        
                      <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>  مواعيد المقابلات    </h2>
                      <!--   <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/add_id_number"><i class="fa fa-plus"></i></a></li>                            
                            <li style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" class="breadcrumb-item active">    مرشح جديد  </li>
                        </ul> -->
                    </div>    


                         
                    
                </div>
            </div>

              <div class="row clearfix"  >


                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1"  data-percent="<?php echo $cuntt_emp_candidate1101653999999 ; ?>" > <span ><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#000000;" >  اليوم  </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_today')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">  مقابلات اليوم   <br>  <?php echo $cuntt_emp_candidate1101653999999 ; ?></small>
                        </div>
                    </div>
                </div>


                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate110165399999988 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >      غداً</h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_tom')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">   مقابلات غداً  <br>  <?php echo $cuntt_emp_candidate110165399999988; ?></small>
                        </div>
                    </div>
                </div>


             <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1101653999999882 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >       بعد غداً</h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_tom2')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">   مقابلات   بعد غداً <br>  <?php echo $cuntt_emp_candidate1101653999999882; ?></small>
                        </div>
                    </div>
                </div>

                   <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1101653999999883 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >        بعد ثلاثة أيام  </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_tom3')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">   مقابلات    بعد ثلاثة أيام   <br>  <?php echo $cuntt_emp_candidate1101653999999883; ?></small>
                        </div>
                    </div>
                </div>

                 <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1101653999999884 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >             بعد أربعة أيام  </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_tom4')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">   مقابلات         بعد أربعة أيام   <br>  <?php echo $cuntt_emp_candidate1101653999999884; ?></small>
                        </div>
                    </div>
                </div>




                 

               
               

                


                   


                    



                  

 

 


                 




               



              


                
 


 

 
 















 



              

                










            </div>
                                </div>


                                 <div class="tab-pane" id="Contact-new3">
                                      <div class="block-header">
                <div class="row">

                     <div class="col-lg-5 col-md-8 col-sm-12">                        
                      <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>    المناصب الوظيفيه    </h2>
                      
                    </div>    


                         
                    
                </div>
            </div>


               <div class="row clearfix"  >


                 <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall555 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                               اخصائي توظيف         </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                               <br>  <?php echo $cuntt_emp_candidate1sultanall555 ; ?></small>

     
    


                        </div>
                    </div>
                </div>



                 <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall555 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                                  اخصائي عمليات موارد بشرية         </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                               <br>  <?php echo $cuntt_emp_candidate1sultanall555 ; ?></small>

     
    


                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall555 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                                         اخصائي تحصيل         </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                               <br>  <?php echo $cuntt_emp_candidate1sultanall555 ; ?></small>

     
    


                        </div>
                    </div>
                </div>




                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall555 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                                            مشرف تحصيل         </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                               <br>  <?php echo $cuntt_emp_candidate1sultanall555 ; ?></small>

     
    


                        </div>
                    </div>
                </div>



                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall555 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                                                اخصائي محاسبة         </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                               <br>  <?php echo $cuntt_emp_candidate1sultanall555 ; ?></small>

     
    


                        </div>
                    </div>
                </div>

                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall555 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                                                   اخصائي امن سيبراني    </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                               <br>  <?php echo $cuntt_emp_candidate1sultanall555 ; ?></small>

     
    


                        </div>
                    </div>
                </div>



                   <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall555 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                                                        اخصائي امن معلومات         </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                               <br>  <?php echo $cuntt_emp_candidate1sultanall555 ; ?></small>

     
    


                        </div>
                    </div>
                </div>



                



                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall555 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                                                        التزام وحوكمة              </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                               <br>  <?php echo $cuntt_emp_candidate1sultanall555 ; ?></small>

     
    


                        </div>
                    </div>
                </div>


                   <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall555 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                                                           المخاطر              </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                               <br>  <?php echo $cuntt_emp_candidate1sultanall555 ; ?></small>

     
    


                        </div>
                    </div>
                </div>


                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall555 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                                                            المدير المالي              </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                               <br>  <?php echo $cuntt_emp_candidate1sultanall555 ; ?></small>

     
    


                        </div>
                    </div>
                </div>












</div>

        </div>
                                <div class="tab-pane show active" id="Contact-new2">
                                      <div class="block-header">
                <div class="row">

                     <div class="col-lg-5 col-md-8 col-sm-12">                        
                      <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>     حالات المقابلات</h2>
                      <!--   <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/add_id_number"><i class="fa fa-plus"></i></a></li>                            
                            <li style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" class="breadcrumb-item active">    مرشح جديد  </li>
                        </ul> -->
                    </div>    


                         
                    
                </div>
            </div>

              <div class="row clearfix"  >


                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall555 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                      معتمد من قبل رئيس اللجنة         </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                        معتمد من قبل رئيس اللجنة       <br>  <?php echo $cuntt_emp_candidate1sultanall555 ; ?></small>

     
    


                        </div>
                    </div>
                </div>




                 <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall5554 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                          القائمة الاحتياطية رئيس اللجنة         </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done4')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">            القائمة الاحتياطية رئيس اللجنة       <br>  <?php echo $cuntt_emp_candidate1sultanall5554 ; ?></small>

     
    


                        </div>
                    </div>
                </div>


                   <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall5553 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                 مرفوض من رئيس اللجنة         </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done3')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                   مرفوض من رئيس اللجنة       <br>  <?php echo $cuntt_emp_candidate1sultanall5553 ; ?></small>

     
    


                        </div>
                    </div>
                </div>


                  <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall5551 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                        لم يحضر المقابلة         </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done1')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                          لم يحضر المقابلة       <br>  <?php echo $cuntt_emp_candidate1sultanall5551 ; ?></small>

     
    


                        </div>
                    </div>
                </div>



                   <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card" style="background-color:#C7C7C7;">
                        <div class="body text-center">
                            <div class="chart easy-pie-chart-1" data-percent="<?php echo $cuntt_emp_candidate1sultanall5551 ; ?>"> <span><img src="<?php echo base_url();?>assets\imeges\sm\user.PNG" alt="user" class="rounded-circle"/></span> </div>
                            <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" >                                             تمت المباشرة         </h6>
                            <a   style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;" type="button" href="<?php echo site_url('users/data_emp_part_new_jobs10_done1')?>" class="badge btn btn-outline-primary float-center" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#000000;" >       عرض البيانات</span></a>
</br>
                            <ul class="social-links list-unstyled">
                                <li><a title="facebook"href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                                <li><a title="twitter"href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                                <li><a title="instagram"href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                            </ul>
                            <small style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#000000;">                          لم يحضر المقابلة       <br>  <?php echo $cuntt_emp_candidate1sultanall5551 ; ?></small>

     
    


                        </div>
                    </div>
                </div>









               
               

                



                 


   
 

               




                   




 
 

</div>
                                </div>
                            </div>
                        </div>


          

 




 
            
 
            
        </div>
    </div>
    
 
