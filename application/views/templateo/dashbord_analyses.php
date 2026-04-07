

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">

                     <div class="col-lg-5 col-md-8 col-sm-12">                        
                      <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>ادارة الموقع الالكتروني  / التوظيف</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/add_id_number"><i class="fa fa-plus"></i></a></li>                            
                            <li style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" class="breadcrumb-item active">    مرشح جديد  </li>
                        </ul>
                    </div>    


                         
                    
                </div>
            </div>

              <div class="row clearfix"  >
               
               

                 <div class="col-lg-6 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3><?php echo $cuntt_emp_candidate1 ; ?> <!-- <i class="icon-basket float-right"> --><a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" href="<?php echo site_url('users/data_emp_part1')?>" class="badge btn btn-outline-primary float-right" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span>   جديدة</span></a></i></h3>
                            <span style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">       مرشحي التوظيف المرحلة الأولى  </span>                            
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-6 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3><?php echo $cuntt_emp_candidate2 ; ?> <!-- <i class="icon-basket float-right"> --><a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" href="<?php echo site_url('users/data_emp_part2')?>" class="badge btn btn-outline-primary float-right" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span>   جديدة</span></a></i></h3>
                            <span style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">       مرشحي التوظيف المرحلة  الثانية  </span>                            
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>

                  <?PHP if ($this ->session->userdata('type') != 7):   
                                      ?>
                  <?PHP if ($this ->session->userdata('type') != 2):   
                                      ?>
                                      <?PHP if ($this ->session->userdata('type') != 1):   
                                      ?>

                 <div class="col-lg-6 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3><?php echo $cuntt_study ; ?> <!-- <i class="icon-basket float-right"> --><a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="button" href="<?php echo site_url('users/order_list1')?>" class="badge btn btn-outline-primary float-right" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span>   جديدة</span></a></i></h3>
                            <span style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">     طلبات التوظيف  </span>                            
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>
   <?PHP endif;?>
                <?PHP endif;?>
                <?PHP endif;?>
               



   


            
               
                                    
                 <?PHP if ($this ->session->userdata('type') != 7):   
                                      ?>
                  <?PHP if ($this ->session->userdata('type') != 2):   
                                      ?>
                                      <?PHP if ($this ->session->userdata('type') != 1):   
                                      ?>
                <div class="col-lg-6 col-md-6">
                    <div class="card overflowhidden">
                        <div class="body">
                            <h3><?php echo $cuntt_study101 ; ?> <!-- <i class=" icon-speedometer float-right"> --><a type="button" href="<?php echo site_url('users/message_list')?>" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" class="badge badge-success float-right"><i class="fa fa-check-circle"></i> <span>      جديدة</span></a> </i></h3>
                            <span style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">         الرسائل والاستفسارات</span>        
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-green m-b-0">
                            <div class="progress-bar" data-transitiongoal="68"></div>
                        </div>
                    </div>
                </div>
                 <?PHP endif;?>
                <?PHP endif;?>
                <?PHP endif;?>
            </div>


 




 
            
 
            
        </div>
    </div>
    
 
