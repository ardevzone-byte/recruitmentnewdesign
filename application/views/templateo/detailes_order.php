

        <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/detailes_order/'.$id); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>إضافة    تفاصيل الطلب رقم  (<?php echo $id; ?>)</h2>
                       <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/dashbord_analyses"><i class="icon-home"></i></a></li>                            
                            
                             <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/order_list"><i class="icon-notebook"></i></a></li>

                            <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/new_order"><i class="fa fa-plus"></i></a></li>
                            
                        </ul>
                    </div>            
                   
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;">الرجاء اضافة  البيانات الرئيسية  للطلب</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" novalidate>

                                <!-- items select -->
                                <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                         font-style: normal; font-size:15px;">الصنف   (1)</label>
                                         <select name="item_name" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                            <?php foreach($get_items1 as $get_items1): ?>
                                                             <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" value="<?php echo $get_items1['name']; ?>"><?php echo $get_items1['name']; ?></option>
                                                            <?php endforeach; ?>
                                         </select>
                                </div>
                                 <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:15px;">     الكمية (عدد / وزن)</label>
                                                                            <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" type="number" name="quantity" class="form-control" required>
                                </div>
                                <!--   -->
                                <?php $id2=$get_orders202['number_items'];
                                if ($id2 >1): ?>
                                 <!-- items select -->
                                <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                         font-style: normal; font-size:15px;">الصنف   (2)</label>
                                         <select name="item_name1" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                            <?php foreach($get_items2 as $get_items2): ?>
                                                             <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" value="<?php echo $get_items2['name']; ?>"><?php echo $get_items2['name']; ?></option>
                                                            <?php endforeach; ?>
                                         </select>
                                </div>
                                 <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:15px;">     الكمية (عدد / وزن)</label>
                                                                            <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" type="number" name="quantity1" class="form-control" required>
                                </div>
                                <!--   -->
                             <?php endif?>


                              <?php $id2=$get_orders202['number_items'];
                                if ($id2 >2): ?>
                                 <!-- items select -->
                                <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                         font-style: normal; font-size:15px;">الصنف   (3)</label>
                                         <select name="item_name2" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                            <?php foreach($get_items3 as $get_items3): ?>
                                                             <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" value="<?php echo $get_items3['name']; ?>"><?php echo $get_items3['name']; ?></option>
                                                            <?php endforeach; ?>
                                         </select>
                                </div>
                                 <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:15px;">     الكمية (عدد / وزن)</label>
                                                                            <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" type="number" name="quantity2" class="form-control" required>
                                </div>
                                <!--   -->
                             <?php endif?>


                              <?php $id2=$get_orders202['number_items'];
                                if ($id2 >3): ?>
                                 <!-- items select -->
                                <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                         font-style: normal; font-size:15px;">الصنف   (4)</label>
                                         <select name="item_name3" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                            <?php foreach($get_items4 as $get_items4): ?>
                                                             <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" value="<?php echo $get_items4['name']; ?>"><?php echo $get_items4['name']; ?></option>
                                                            <?php endforeach; ?>
                                         </select>
                                </div>
                                 <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:15px;">     الكمية (عدد / وزن)</label>
                                                                            <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" type="number" name="quantity3" class="form-control" required>
                                </div>
                                <!--   -->
                             <?php endif?>

                              <?php $id2=$get_orders202['number_items'];
                                if ($id2 >4): ?>
                                 <!-- items select -->
                                <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                         font-style: normal; font-size:15px;">الصنف   (5)</label>
                                         <select name="item_name4" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                            <?php foreach($get_items5 as $get_items5): ?>
                                                             <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" value="<?php echo $get_items5['name']; ?>"><?php echo $get_items5['name']; ?></option>
                                                            <?php endforeach; ?>
                                         </select>
                                </div>
                                 <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:15px;">     الكمية (عدد / وزن)</label>
                                                                            <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" type="number" name="quantity4" class="form-control" required>
                                </div>
                                <!--   -->
                             <?php endif?>


                              <?php $id2=$get_orders202['number_items'];
                                if ($id2 >5): ?>
                                 <!-- items select -->
                                <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                         font-style: normal; font-size:15px;">الصنف   (6)</label>
                                         <select name="item_name5" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                            <?php foreach($get_items6 as $get_items6): ?>
                                                             <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" value="<?php echo $get_items6['name']; ?>"><?php echo $get_items6['name']; ?></option>
                                                            <?php endforeach; ?>
                                         </select>
                                </div>
                                 <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:15px;">     الكمية (عدد / وزن)</label>
                                                                            <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" type="number" name="quantity5" class="form-control" required>
                                </div>
                                <!--   -->
                             <?php endif?>


                              <?php $id2=$get_orders202['number_items'];
                                if ($id2 >6): ?>
                                 <!-- items select -->
                                <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                         font-style: normal; font-size:15px;">الصنف   (7)</label>
                                         <select name="item_name6" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                            <?php foreach($get_items7 as $get_items7): ?>
                                                             <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" value="<?php echo $get_items7['name']; ?>"><?php echo $get_items7['name']; ?></option>
                                                            <?php endforeach; ?>
                                         </select>
                                </div>
                                 <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:15px;">     الكمية (عدد / وزن)</label>
                                                                            <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" type="number" name="quantity6" class="form-control" required>
                                </div>
                                <!--   -->
                             <?php endif?>


                              <?php $id2=$get_orders202['number_items'];
                                if ($id2 >7): ?>
                                 <!-- items select -->
                                <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                         font-style: normal; font-size:15px;">الصنف   (8)</label>
                                         <select name="item_name7" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                            <?php foreach($get_items8 as $get_items8): ?>
                                                             <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" value="<?php echo $get_items8['name']; ?>"><?php echo $get_items8['name']; ?></option>
                                                            <?php endforeach; ?>
                                         </select>
                                </div>
                                 <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:15px;">     الكمية (عدد / وزن)</label>
                                                                            <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" type="number" name="quantity7" class="form-control" required>
                                </div>
                                <!--   -->
                             <?php endif?>


                              <?php $id2=$get_orders202['number_items'];
                                if ($id2 >8): ?>
                                 <!-- items select -->
                                <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                         font-style: normal; font-size:15px;">الصنف   (9)</label>
                                         <select name="item_name8" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                            <?php foreach($get_items9 as $get_items9): ?>
                                                             <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" value="<?php echo $get_items9['name']; ?>"><?php echo $get_items9['name']; ?></option>
                                                            <?php endforeach; ?>
                                         </select>
                                </div>
                                 <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:15px;">     الكمية (عدد / وزن)</label>
                                                                            <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" type="number" name="quantity8" class="form-control" required>
                                </div>
                                <!--   -->
                             <?php endif?>


                              <?php $id2=$get_orders202['number_items'];
                                if ($id2 >9): ?>
                                 <!-- items select -->
                                <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                         font-style: normal; font-size:15px;">الصنف   (7)</label>
                                         <select name="item_name9" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                            <?php foreach($get_items10 as $get_items10): ?>
                                                             <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" value="<?php echo $get_items10['name']; ?>"><?php echo $get_items10['name']; ?></option>
                                                            <?php endforeach; ?>
                                         </select>
                                </div>
                                 <div class="form-group">
                                        <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:15px;">     الكمية (عدد / وزن)</label>
                                                                            <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                                            font-style: normal; font-size:12px;" type="number" name="quantity9" class="form-control" required>
                                </div>
                                <!--   -->
                             <?php endif?>



                             
<button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="submit" name="submitForm" value="formSave" class="btn btn-primary"> تنفيذ الطلب</button>

                                 
                                 
                                  
                                 


                                     
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>


      <?php echo form_close(); ?>
    

