

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">

                     <div class="col-lg-5 col-md-8 col-sm-12">  


                      </br>
                    </br>                        
                    </br>
                    </br>                      


                      <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>       طلبات التوظيف  </h2>


       <ul class="breadcrumb">
                            <li class="breadcrumb-item"> 
                             <a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"  href="<?php echo base_url();?>users/add_job_vacancy" id="printInvoice" class="btn btn-info">
    طلب توظيف جديد  
   </a>
                               
                                 </li>                            
                       
                        </ul>


                  
                    </div>    


                         
                    
                </div>
            </div>

              <div class="row clearfix"  >

                   
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">الشواغر</h2>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover m-b-0">
                                 <thead>
                             <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                               <th>   </th>
                                  <th>المسمى الوظيفي</th>
                                  <th> عدد الشواغر </th>
                                  <th>معمد من قبل العضو المنتدب</th>
                                  <th>تم الاعتذار</th>
                                  <th>تمت المباشرة</th>
                                  <th>إنتظار المباشرة</th>
                                   <th>التاريخ المطلوب للإنجاز</th>
                                  <th>عدد الايام المتبقية لإغلاق الشاغر</th>
                                 
                                  <th>نسبة الإنجاز (مباشرات)</th>
                                  <th>نسبة الإنجاز  (مباشرات)</th>

                           </tr>
                                <tbody>

                                      <?php foreach($get_job_vacancy as $get_job_vacancys) : ?>


                                    <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">
                                        <th><i class="fa fa-circle text-success"></i></th>
                                        <td><?php echo $get_job_vacancys['n1']; ?> / <?php echo $get_job_vacancys['n2']; ?></td>
                                        <td><span><?php echo $get_job_vacancys['n5']; ?></span></td>
                                        
                                        <td><span><?php echo $this->user_model->cuntt_baptizing($get_job_vacancys['id']); ?></span></td>
                                        <td><span><?php echo $this->user_model->cuntt_apology($get_job_vacancys['id']); ?></span></td>
                                        <td><span><?php echo $this->user_model->cuntt_direct($get_job_vacancys['id']); ?></span></td>
                                        <td><span><?php echo $this->user_model->cuntt_direct($get_job_vacancys['id']); ?></span></td>

                                      
                                        <td><span><?php echo $get_job_vacancys['n6']; ?></span></td>
                                           <td> 
                                        <?php  date_default_timezone_set('Asia/Riyadh');
           $d=date("Y/m/d");
           $f='1';
           $m=date("Y/m");
           $y=date("Y");
           $day=date("l");
           $time=date("h:i:s"); 
 
$date1 = strtotime($get_job_vacancys['n6']);
$date2 = strtotime($d);

$hourDiff=round(($date2 - $date1) / (60*60*24));
$n=-0-$hourDiff;
 
 //$n=round(5-10);
//$n=$hourDiff;
?>

               

               <?php  if ($n == 0):?> 

   <a  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;color:#c90000;" title="" href="">
                يوم واحد
              </a>
               <?php endif?>

                 <?php  if ($n > 0):?> 

   <a  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" title="" href="">
    تبقى  ( <?php echo $n; ?> ) يوم
                        
              </a>
               <?php endif?>

                 

                <?php  if ($n < 0):?> 

   <a  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#ff0000;" title="" href="">
      تجاوز التاريخ المسموح به بمقدار   ( <?php echo abs($n); ?> ) يوم
                        
              </a>
               <?php endif?>


 



            </td>
                                        <td><span><?php echo round(($this->user_model->cuntt_direct($get_job_vacancys['id'])/$get_job_vacancys['n5'])*100,0); ?>  %</span></td>
                                          <td><div class="progress progress-xs">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="" style="width:<?php echo round(($this->user_model->cuntt_direct($get_job_vacancys['id'])/$get_job_vacancys['n5'])*100,0); ?>%"> <span class="sr-only"></span> </div>
                                            </div>
                                        </td>
                                    </tr>
                                  
                                     <?php endforeach; ?>  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
               
        

        </div>


               
               

                 <div class="col-lg-6 col-md-6">
                     <div class="card overflowhidden" style="background-color:#00AEC9;">
                        <div class="body" style="background-color:#CBCBCB; color:#1E0FE8;">
                            <h3><?php echo $cuntt_emp_candidate110165310aa; ?> <!-- <i class="icon-basket float-right"> --><a  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#1E0FE8;" type="button" href="<?php echo site_url('users/data_emp_part1')?>" class="badge btn btn-outline-primary float-right" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#1E0FE8;">   استعراض</span></a></i></h3>
                            <span style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#1E0FE8;">             طلبات التوظيف للمرشحين  </span>                            
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" style="background-color:#ffffff;" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>


 <?PHP if ($this ->session->userdata('type') != 1):   
                                      ?>
                 <div class="col-lg-6 col-md-6">
                     <div class="card overflowhidden" style="background-color:#00AEC9;">
                        <div class="body" style="background-color:#CBCBCB; color:#1E0FE8;">
                            <h3><?php echo $cuntt_emp_candidate110165310aawait; ?> <!-- <i class="icon-basket float-right"> --><a  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#1E0FE8;" type="button" href="<?php echo site_url('users/data_emp_part101')?>" class="badge btn btn-outline-primary float-right" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#1E0FE8;">   استعراض</span></a></i></h3>
                            <span style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#1E0FE8;">                  قائمة إنتظار  </span>                            
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" style="background-color:#ffffff;" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>

 <?PHP endif;?>


 <?PHP if ($this ->session->userdata('type') == 2):   
                                      ?>
                 <div class="col-lg-6 col-md-6">
                     <div class="card overflowhidden" style="background-color:#00AEC9;">
                        <div class="body" style="background-color:#CBCBCB; color:#1E0FE8;">
                            <h3><?php echo $cuntt_emp_candidate110165310aawait_adeeb; ?> <!-- <i class="icon-basket float-right"> --><a  style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#1E0FE8;" type="button" href="<?php echo site_url('users/data_emp_part101co')?>" class="badge btn btn-outline-primary float-right" disabled="disabled"><i class="fa fa-spinner fa-spin"></i> <span style="color:#1E0FE8;">   استعراض</span></a></i></h3>
                            <span style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px; color:#1E0FE8;">                     طلبات محولة من العضو المنتدب  </span>                            
                        </div>
                        <div class="progress progress-xs progress-transparent custom-color-blue m-b-0">
                            <div class="progress-bar" style="background-color:#ffffff;" data-transitiongoal="64"></div>
                        </div>
                    </div>
                </div>

 <?PHP endif;?>




               

                  <?PHP if ($this ->session->userdata('type') != 7):   
                                      ?>
                                         <?PHP if ($this ->session->userdata('type') != 4):   
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
                   <?PHP endif;?>
               



   


            
               
                                    
                 <?PHP if ($this ->session->userdata('type') != 7):   
                                      ?>
                                        <?PHP if ($this ->session->userdata('type') != 4):   
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
                 <?PHP endif;?>
            </div>


 




 
            
 
            
        </div>
    </div>
    
 
