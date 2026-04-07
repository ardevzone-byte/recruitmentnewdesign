
       <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/insert_sadad'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>المرسوم اليومي</h2>
                        <ul class="breadcrumb">

                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/chart_gugus"><i class="icon-home"></i></a></li>    

                            <?php $id=$this->session->userdata('type');
                               if ($id == 3):?> 



                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/users_index"><i class="icon-users"></i></a></li>
                             <?php endif?>

                              <?php $id=$this->session->userdata('type');
                               if ($id == 1):?> 


                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/sadad_report"><i class="icon-notebook"></i></a></li>

                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/sadad_report_dynamic"><i class="icon-notebook"></i></a></li>


                              <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/insert_sadad"><i class="fa fa-plus"></i></a></li>
                               <?php endif?>

                        </ul>
                    </div>            
                  <!--   <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                            <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#00c5dc"
                                data-fill-Color="transparent">3,5,1,6,5,4,8,3</div>
                            <span>Visitors</span>
                        </div>
                        <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                            <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#f4516c"
                                data-fill-Color="transparent">4,6,3,2,5,6,5,4</div>
                            <span>Visits</span>
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">الرجاء ادخال مبلغ المرسوم اليومي</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate>
                                <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">المبلغ</label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;" type="number" name="payment_amount" class="form-control" required>
                                </div>


                         <div class="form-group">


                                     <h6 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">   ارفاق صورة اثبات المرسوم</h6>
                           <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;">رفع</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="userfile" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;">اختار صورة</label>
                                </div>
                            </div>


                                     
                                </div>




                              <!--    <div class="form-group">
                                    <label>file</label>
                                    <input type="file" name="userfile" class="form-control" required>
                                </div> -->
                                
          
                                <button type="submit" name="submitForm" value="formSave" class="btn btn-primary">save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                           <!--  <h2>Result :</h2> -->
                        </div>
                        <div class="body">
<!--                             <form id="advanced-form" data-parsley-validate novalidate>
                                <div class="form-group">
                                    <label for="text-input1">0545639767</label>
                                    <input type="text" id="text-input1" class="form-control" value="محدث بتاريخ 22/2-2020  " required data-parsley-minlength="8">
                                </div>
                                <div class="form-group">
                                    <label for="text-input2">0551646414</label>
                                    <input type="text" id="text-input2" class="form-control" value="محدث بتاريخ 22/2-2020  " required data-parsley-length="[5,10]">
                                </div>
                                <div class="form-group">
                                    <label for="text-input3">0551144772</label>
                                    <input type="text" id="text-input3" class="form-control" value="محدث بتاريخ 22/2-2020" required data-parsley-min="5">
                                </div>
                                <div class="form-group">
                                    <label for="text-input4">055124556</label>
                                    <input type="text" id="text-input4" class="form-control" value="محدث بتاريخ 22/2-2020" required data-parsley-range="[20,30]">
                                </div>
                               
                                
                                <br/>
                                <button type="submit" class="btn btn-primary">SEND ORDERS FOR UPDATE</button>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
     <?php echo form_close(); ?>

