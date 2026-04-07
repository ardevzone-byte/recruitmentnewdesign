


        <?php echo validation_errors(); ?>
            <?php echo form_open_multipart('users/targit_edit/'.$id); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>   تعديل السقف الاعلى  للايراد اليومي والشهري للمشرفين</h2>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                           <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">     تعديل بيانات التارجيت</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate >
                                <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">التارجيت اليومي</label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" name="tragit_day" value="<?php echo $customers['tragit_day'];?>" class="form-control" required>
                                </div>
                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">التارجيت الشهلاري</label>
                                     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" name="tragit_month" value="<?php echo $customers['tragit_month'];?>" class="form-control" required>
                                </div> 

                             
                                  
                                <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="submit" name="submitForm" value="formSave" class="btn btn-primary">تعديل</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>


      <?php echo form_close(); ?>
    





       <!--  <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/targit_edit/'.$id); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>الصفحة الشخصية</h2>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">تعديل بياناتي الرئيسية</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate >
                                <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">التارحيت</label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" name="tragit_day" value="<?php echo $customers['tragit_day'];?>" class="form-control" required>
                                </div>
                                 <div class="form-group">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">التارحيا الشخري</label>
                                    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="text" name="tragit_month" value="<?php echo $customers['tragit_month'];?>" class="form-control" required>
                                </div> 

                                     
                               
                                  
                                <button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" type="submit" name="submitForm" value="formSave" class="btn btn-primary">تعديل</button>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>


      <?php echo form_close(); ?> -->
    

