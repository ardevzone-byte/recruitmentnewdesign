

        <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/add_new_order'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>إضافة  طلب جديد</h2>
                       <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/dashbord_analyses"><i class="icon-home"></i></a></li>                            
                             

                             <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/items_index"><i class="icon-notebook"></i></a></li>

                            <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/add_item"><i class="fa fa-plus"></i></a></li>
                            
                        </ul>
                    </div>            
                   
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">الرجاء   اختيار  نوع الطلب</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate>
                                
                             
                                 <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="input-group-text" for="inputGroupSelect01">النوع</label>
                                </div>
                                <select name="Payment" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                    

    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="1"> مواد كهرباء  </option>

    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="2"> مواد سباكة  </option>
    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="3">  مواد زراعية  </option>


    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="4">  أثاث منزلي  </option>
    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="5">  مشتريات المكتب  </option>

    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="6">  مشتريات الشيخ الخاصة  </option>

                                     
                                   
                                </select>
                            </div>
<button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="submit" name="submitForm" value="formSave" class="btn btn-primary">التالي</button>
 
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>


      <?php echo form_close(); ?>
    

