<meta name="viewport" content="width=device-width, initial-scale=1">
 

        <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/new_order'); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12">                        
                        <h3 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>إضافة  طلب جديد   (<?php $Payment=$this->session->userdata('Payment'); ?>
   <?php if ($Payment == 1):?>مواد كهرباء
   <?php endif; ?>
<?php if ($Payment == 2):?>مواد  سباكة
   <?php endif; ?>
<?php if ($Payment == 3):?>مواد زراعية
   <?php endif; ?>
   <?php if ($Payment == 4):?>   أثاث منزلي
   <?php endif; ?>
<?php if ($Payment == 5):?>  مشتريات المكتب
   <?php endif; ?>
   <?php if ($Payment == 6):?>مشتريات الشيخ الخاصة
   <?php endif; ?>)</h3>
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
                                <div class="form-group">
                                    
                                    <input placeholder="عنوان الطلب" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="titel" class="form-control">
                                </div>

                                 <div class="form-group">
                                    
                                    <input placeholder="سبب الطلب" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="reason" class="form-control">
                                </div>


                                <div class="form-group">
                                    
                                    <input placeholder="موقع الطلب" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="location" class="form-control">
                                </div>



                             
                                 

                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="input-group-text" for="inputGroupSelect01">أولوية الطلب</label>
                                </div>
                                <select name="priority" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="1" selected>عاجلة</option>
                                    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="2"> عادية  </option>
    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="3"> متوسطة  </option>
                                     
                                   
                                </select>
                            </div>


                             <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="input-group-text" for="inputGroupSelect01"> طريقة الدفع</label>
                                </div>
                                <select name="Payment" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                                    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="1" selected>كاش</option>
                                    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="2"> شيك  </option>
    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" value="3"> تحويل  </option>
                                     
                                   
                                </select>
                            </div>



                            <div class="form-group">


                            


                                     
                                </div>

  
<!-- //////////////////////////// -->
 
<a id="myDIV1" class="btn btn-primary" style="display:block; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction()">اضافة صنف جديد</a>


 


<div style="display:none;" id="myDIV" >
    <div class="row">
    <div class="col-md-3">
         <div class="form-group">
            <select name="item_name" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                     font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
                      <?php foreach($get_items1 as $get_items1): ?>
                             <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                              font-style: normal; font-size:12px;" value="<?php echo $get_items1['name']; ?>"><?php echo $get_items1['name']; ?></option>
                                                            <?php endforeach; ?>
              </select>
    </div>
    </div>
    <div class="col-md-3">
         <div class="form-group">
             <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                     font-style: normal; font-size:12px;" type="number" name="quantity" class="form-control" placeholder="الكمية"  >
        </div>
        
    </div>
    <div class="col-md-3">
        <div class="form-group">
             <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
                    font-style: normal; font-size:12px;" type="number" name="price" class="form-control" placeholder="السعر"  >
        </div>
        
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction101()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    
    </div>
</div>
   
                                
</div>
<!-- //////////////////////////// -->
  <a id="myDIV2" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction2()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3" >
 <div class="row">
    
    <div class="col-md-3">
         <div class="form-group">
           <select name="item_name1" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
             <?php foreach($get_items2 as $get_items2): ?>
                     <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                     font-style: normal; font-size:12px;" value="<?php echo $get_items2['name']; ?>"><?php echo $get_items2['name']; ?></option>
             <?php endforeach; ?>
           </select>
         </div>
    </div>
    <div class="col-md-3">
         <div class="form-group">
           <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" name="quantity1" class="form-control" placeholder="الكمية"  >
         </div>
    </div>
    <div class="col-md-3">
         <div class="form-group">
           <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" name="price1" class="form-control"   placeholder="السعر">
         </div>
    </div>
    
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction102()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
 
</div>
</div>
</div>
 
                                

<!-- //////////////////////////// -->



<!-- //////////////////////////// -->

<a id="myDIV22" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction3()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33" >
 <div class="row">
    <div class="col-md-3">
        <div class="form-group">
       <select name="item_name2" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
         font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
         <?php foreach($get_items3 as $get_items3): ?>
            <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
              font-style: normal; font-size:12px;" value="<?php echo $get_items3['name']; ?>"><?php echo $get_items3['name']; ?></option>
         <?php endforeach; ?>
       </select>
   </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
        <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
         font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity2" class="form-control"  >
    </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
        <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
         font-style: normal; font-size:12px;" type="number" placeholder="السعر" name="price2" class="form-control"  >
    </div>
    </div>
     <div class="col-md-3">
         <button type="button" class="btn btn-danger" onclick="myFunction103()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
    
</div>
<!-- //////////////////////////// -->



<!-- //////////////////////////// -->

<a id="myDIV222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction4()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
    <select name="item_name3" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
     font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
        <?php foreach($get_items4 as $get_items4): ?>
          <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
          font-style: normal; font-size:12px;" value="<?php echo $get_items4['name']; ?>"><?php echo $get_items4['name']; ?></option>
       <?php endforeach; ?>
    </select>
   </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
       <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
          font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity3" class="form-control"  >
   </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
       <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
          font-style: normal; font-size:12px;" type="number" placeholder="السعر" name="price3" class="form-control"  >
   </div>
    </div>
     <div class="col-md-3">
         <button type="button" class="btn btn-danger" onclick="myFunction104()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- //////////////////////////// -->

<a id="myDIV2222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction5()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name4" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
      font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
         <?php foreach($get_items5 as $get_items5): ?>
            <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" value="<?php echo $get_items5['name']; ?>"><?php echo $get_items5['name']; ?></option>
         <?php endforeach; ?>
     </select>
  </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
        <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
       font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity4" class="form-control"  >
       </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
       font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price4" class="form-control"  >
   </div>
    </div>
     <div class="col-md-3">
         <button type="button" class="btn btn-danger" onclick="myFunction105()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
  
</div>
<!-- //////////////////////////// -->

<!-- //////////////////////////// -->

<a id="myDIV22222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction6()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333" >
 <div class="row">
    <div class="col-md-3">
        <div class="form-group">
    <select name="item_name5" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
         <?php foreach($get_items6 as $get_items6): ?>
              <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                font-style: normal; font-size:12px;" value="<?php echo $get_items6['name']; ?>"><?php echo $get_items6['name']; ?></option>
          <?php endforeach; ?>
    </select>
  </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
       font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity5" class="form-control"  >
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
    <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
       font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price5" class="form-control"  >
   </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction106()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
  
</div>
<!-- //////////////////////////// -->


<!-- //////////////////////////// -->

<a id="myDIV222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction7()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333" >
<div class="row">
     <div class="col-md-3">
      <div class="form-group">
        <select name="item_name6" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
          font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
          <?php foreach($get_items7 as $get_items7): ?>
             <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" value="<?php echo $get_items7['name']; ?>"><?php echo $get_items7['name']; ?></option>
           <?php endforeach; ?>
       </select>
      </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
   <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
         font-style: normal; font-size:12px;" placeholder="الكمية" type="number" name="quantity6" class="form-control"  >
  </div>
    </div>
     <div class="col-md-3">
        <div class="form-group">
   <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
         font-style: normal; font-size:12px;" type="number" placeholder="السعر" name="price6" class="form-control"  >
  </div>
    </div>
     <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction107()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>

  
</div>
<!-- //////////////////////////// -->



<!-- //////////////////////////// -->

<a id="myDIV2222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction8()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
    <select name="item_name7" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
        font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
        <?php foreach($get_items8 as $get_items8): ?>
         <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
          font-style: normal; font-size:12px;" value="<?php echo $get_items8['name']; ?>"><?php echo $get_items8['name']; ?></option>
        <?php endforeach; ?>
    </select>
 </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
       font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity7" class="form-control"  >
 </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
       font-style: normal; font-size:12px;" type="number" placeholder="السعر" name="price7" class="form-control"  >
 </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction108()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>

 
</div>
<!-- //////////////////////////// -->


<!-- //////////////////////////// -->

<a id="myDIV22222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction9()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333" >
 <div class="row">
    <div class="col-md-3">
        <div class="form-group">
    <select name="item_name8" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
       font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
          <?php foreach($get_items9 as $get_items9): ?>
          <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" value="<?php echo $get_items9['name']; ?>"><?php echo $get_items9['name']; ?></option>
           <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
         <div class="form-group">
      <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
          font-style: normal; font-size:12px;" placeholder="الكمية" type="number" name="quantity8" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
         <div class="form-group">
      <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
          font-style: normal; font-size:12px;" type="number" placeholder="السعر" name="price8" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction109()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
  
</div>
<!-- //////////////////////////// -->



<!-- //////////////////////////// -->

<a id="myDIV222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction10()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name9" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items10 as $get_items10): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items10['name']; ?>"><?php echo $get_items10['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity9" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price9" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1010()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->
<!-- ///////////////11///////////// -->

<a id="myDIV2222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction11()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name10" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items11 as $get_items11): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items11['name']; ?>"><?php echo $get_items11['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity10" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price10" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1011()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV22222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction12()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name11" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items12 as $get_items12): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items12['name']; ?>"><?php echo $get_items12['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity11" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price11" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1012()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction13()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name12" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items13 as $get_items13): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items13['name']; ?>"><?php echo $get_items13['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity12" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price12" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1013()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction14()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name13" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items14 as $get_items14): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items14['name']; ?>"><?php echo $get_items14['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity13" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price13" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1014()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction15()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name14" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items15 as $get_items15): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items15['name']; ?>"><?php echo $get_items15['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity14" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price14" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1015()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction16()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name15" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items16 as $get_items16): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items16['name']; ?>"><?php echo $get_items16['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity15" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price15" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1016()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction17()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name16" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items17 as $get_items17): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items17['name']; ?>"><?php echo $get_items17['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity16" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price16" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1017()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction18()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name17" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items18 as $get_items18): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items18['name']; ?>"><?php echo $get_items18['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity17" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price17" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1018()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction19()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name18" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items19 as $get_items19): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items19['name']; ?>"><?php echo $get_items19['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity18" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price18" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1019()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction20()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name19" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items20 as $get_items20): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items20['name']; ?>"><?php echo $get_items20['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity19" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price19" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1020()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction21()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name20" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items21 as $get_items21): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items21['name']; ?>"><?php echo $get_items21['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity20" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price20" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1021()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction22()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name21" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items22 as $get_items22): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items22['name']; ?>"><?php echo $get_items22['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity21" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price21" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1022()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction23()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name22" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items23 as $get_items23): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items23['name']; ?>"><?php echo $get_items23['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity22" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price22" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1023()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction24()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name23" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items24 as $get_items24): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items24['name']; ?>"><?php echo $get_items24['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity23" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price23" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1024()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction25()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name24" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items25 as $get_items25): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items25['name']; ?>"><?php echo $get_items25['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity24" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price24" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1025()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction26()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name25" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items26 as $get_items26): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items26['name']; ?>"><?php echo $get_items26['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity25" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price25" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1026()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction27()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name26" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items27 as $get_items27): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items27['name']; ?>"><?php echo $get_items27['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity26" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price26" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1027()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction28()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name27" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items28 as $get_items28): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items28['name']; ?>"><?php echo $get_items28['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity27" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price27" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1028()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction29()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name28" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items29 as $get_items29): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items29['name']; ?>"><?php echo $get_items29['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity28" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price28" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1029()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction30()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name29" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items30 as $get_items30): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items30['name']; ?>"><?php echo $get_items30['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity29" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price29" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1030()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction31()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name30" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items31 as $get_items31): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items31['name']; ?>"><?php echo $get_items31['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity30" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price30" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1031()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction32()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name31" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items32 as $get_items32): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items32['name']; ?>"><?php echo $get_items32['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity31" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price31" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1032()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction33()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name32" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items33 as $get_items33): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items33['name']; ?>"><?php echo $get_items33['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity32" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price32" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1033()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction34()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name33" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items34 as $get_items34): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items34['name']; ?>"><?php echo $get_items34['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity33" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price33" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1034()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction35()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name34" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items35 as $get_items35): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items35['name']; ?>"><?php echo $get_items35['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity34" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price34" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1035()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction36()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name35" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items36 as $get_items36): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items36['name']; ?>"><?php echo $get_items36['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity35" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price35" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1036()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff;font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction37()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name36" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items37 as $get_items37): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items37['name']; ?>"><?php echo $get_items37['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity36" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price36" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1037()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction38()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name37" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items38 as $get_items38): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items38['name']; ?>"><?php echo $get_items38['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity37" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price37" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1038()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction39()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name38" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items39 as $get_items39): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items39['name']; ?>"><?php echo $get_items39['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity38" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price38" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1039()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV222222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction40()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name39" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items40 as $get_items40): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items40['name']; ?>"><?php echo $get_items40['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity39" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price39" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1040()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction41()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name40" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items41 as $get_items41): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items41['name']; ?>"><?php echo $get_items41['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity40" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price40" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1041()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction42()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name41" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items42 as $get_items42): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items42['name']; ?>"><?php echo $get_items42['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity41" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price41" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1042()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV222222222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction43()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name42" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items43 as $get_items43): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items43['name']; ?>"><?php echo $get_items43['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity42" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price42" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1043()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction44()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name43" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items44 as $get_items44): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items44['name']; ?>"><?php echo $get_items44['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity43" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price43" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1044()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction45()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name44" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items45 as $get_items45): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items45['name']; ?>"><?php echo $get_items45['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity44" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price44" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1045()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV222222222222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction46()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name45" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items46 as $get_items46): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items46['name']; ?>"><?php echo $get_items46['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity45" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price45" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1046()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction47()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name46" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items47 as $get_items47): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items47['name']; ?>"><?php echo $get_items47['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity46" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price46" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1047()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV22222222222222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction48()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV33333333333333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name47" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items48 as $get_items48): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items48['name']; ?>"><?php echo $get_items48['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity47" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price47" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1048()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV222222222222222222222222222222222222222222222222" class="btn btn-primary" style="display:none; color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction49()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV333333333333333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name48" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items49 as $get_items49): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items49['name']; ?>"><?php echo $get_items49['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity48" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price48" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1049()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->

<!-- ///////////////11///////////// -->

<a id="myDIV2222222222222222222222222222222222222222222222222" class="btn btn-primary" style="display:none;  color:#ffffff; font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" onclick="myFunction50()">اضافة صنف جديد</a>

<div style="display:none;" id="myDIV3333333333333333333333333333333333333333333333333" >
<div class="row">
    <div class="col-md-3">
        <div class="form-group">
     <select name="item_name49" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
             font-style: normal; font-size:12px;" class="custom-select" id="inputGroupSelect01">
            <?php foreach($get_items50 as $get_items50): ?>
                <option tyle="font-family: 'Tajawal', sans-serif; font-weight: bold;
                 font-style: normal; font-size:12px;" value="<?php echo $get_items50['name']; ?>"><?php echo $get_items50['name']; ?></option>
              <?php endforeach; ?>
     </select>
   </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" type="number" placeholder="الكمية" name="quantity49" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
     <input style="font-family: 'Tajawal', sans-serif; font-weight: bold;
            font-style: normal; font-size:12px;" placeholder="السعر" type="number" name="price49" class="form-control"  >
    </div>
    </div>
    <div class="col-md-3">
        <button type="button" class="btn btn-danger" onclick="myFunction1050()" title="Delete"><span class="sr-only">Delete</span> <i class="fa fa-trash-o"></i></button>
    </div>
</div>
  
   
</div>
<!-- //////////////////////////// -->


















</br>

<button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="submit" name="submitForm" value="formSave" class="btn btn-success"> حفظ</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>


      <?php echo form_close(); ?>
      <script>

function myFunction101() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}


function myFunction102() {
  var x = document.getElementById("myDIV3");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction103() {
  var x = document.getElementById("myDIV33");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction104() {
  var x = document.getElementById("myDIV333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction105() {
  var x = document.getElementById("myDIV3333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}
function myFunction106() {
  var x = document.getElementById("myDIV33333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}
function myFunction107() {
  var x = document.getElementById("myDIV333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction108() {
  var x = document.getElementById("myDIV3333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}
function myFunction109() {
  var x = document.getElementById("myDIV33333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}
function myFunction1010() {
  var x = document.getElementById("myDIV333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1011() {
  var x = document.getElementById("myDIV3333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1012() {
  var x = document.getElementById("myDIV33333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1013() {
  var x = document.getElementById("myDIV333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1014() {
  var x = document.getElementById("myDIV3333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1015() {
  var x = document.getElementById("myDIV33333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1016() {
  var x = document.getElementById("myDIV333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1017() {
  var x = document.getElementById("myDIV3333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1018() {
  var x = document.getElementById("myDIV33333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1019() {
  var x = document.getElementById("myDIV333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1020() {
  var x = document.getElementById("myDIV3333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1021() {
  var x = document.getElementById("myDIV33333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}


function myFunction1022() {
  var x = document.getElementById("myDIV333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1023() {
  var x = document.getElementById("myDIV3333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}


function myFunction1024() {
  var x = document.getElementById("myDIV33333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}


function myFunction1025() {
  var x = document.getElementById("myDIV333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1026() {
  var x = document.getElementById("myDIV3333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}


function myFunction1027() {
  var x = document.getElementById("myDIV33333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1028() {
  var x = document.getElementById("myDIV333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}


function myFunction1029() {
  var x = document.getElementById("myDIV3333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1030() {
  var x = document.getElementById("myDIV33333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}


function myFunction1031() {
  var x = document.getElementById("myDIV333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1032() {
  var x = document.getElementById("myDIV3333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1033() {
  var x = document.getElementById("myDIV33333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1034() {
  var x = document.getElementById("myDIV333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}


function myFunction1035() {
  var x = document.getElementById("myDIV3333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1036() {
  var x = document.getElementById("myDIV33333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}


function myFunction1037() {
  var x = document.getElementById("myDIV333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1038() {
  var x = document.getElementById("myDIV3333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}


function myFunction1039() {
  var x = document.getElementById("myDIV33333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1040() {
  var x = document.getElementById("myDIV333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1041() {
  var x = document.getElementById("myDIV3333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1042() {
  var x = document.getElementById("myDIV33333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1043() {
  var x = document.getElementById("myDIV333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1044() {
  var x = document.getElementById("myDIV3333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1045() {
  var x = document.getElementById("myDIV33333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1046() {
  var x = document.getElementById("myDIV333333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1047() {
  var x = document.getElementById("myDIV3333333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1048() {
  var x = document.getElementById("myDIV33333333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1049() {
  var x = document.getElementById("myDIV333333333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}

function myFunction1050() {
  var x = document.getElementById("myDIV3333333333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
 
}









































function myFunction() {
  var x = document.getElementById("myDIV");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV1");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  var x = document.getElementById("myDIV2");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }



}


function myFunction2() {
  var x = document.getElementById("myDIV3");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  var x = document.getElementById("myDIV22");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }



  }


  function myFunction3() {
  var x = document.getElementById("myDIV33");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction4() {
  var x = document.getElementById("myDIV333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction5() {
  var x = document.getElementById("myDIV3333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


   function myFunction6() {
  var x = document.getElementById("myDIV33333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


    function myFunction7() {
  var x = document.getElementById("myDIV333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction8() {
  var x = document.getElementById("myDIV3333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }



  function myFunction9() {
  var x = document.getElementById("myDIV33333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }



  function myFunction10() {
  var x = document.getElementById("myDIV333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


    function myFunction11() {
  var x = document.getElementById("myDIV3333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


     function myFunction12() {
  var x = document.getElementById("myDIV33333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


   function myFunction13() {
  var x = document.getElementById("myDIV333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


   function myFunction14() {
  var x = document.getElementById("myDIV3333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


   function myFunction15() {
  var x = document.getElementById("myDIV33333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


   function myFunction16() {
  var x = document.getElementById("myDIV333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }

  function myFunction17() {
  var x = document.getElementById("myDIV3333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


   function myFunction18() {
  var x = document.getElementById("myDIV33333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction19() {
  var x = document.getElementById("myDIV333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction20() {
  var x = document.getElementById("myDIV3333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }

  function myFunction21() {
  var x = document.getElementById("myDIV33333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }

  function myFunction22() {
  var x = document.getElementById("myDIV333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction23() {
  var x = document.getElementById("myDIV3333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }

  function myFunction24() {
  var x = document.getElementById("myDIV33333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction25() {
  var x = document.getElementById("myDIV333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction26() {
  var x = document.getElementById("myDIV3333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction27() {
  var x = document.getElementById("myDIV33333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction28() {
  var x = document.getElementById("myDIV333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction29() {
  var x = document.getElementById("myDIV3333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction30() {
  var x = document.getElementById("myDIV33333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction31() {
  var x = document.getElementById("myDIV333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction32() {
  var x = document.getElementById("myDIV3333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }

  function myFunction33() {
  var x = document.getElementById("myDIV33333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction34() {
  var x = document.getElementById("myDIV333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction35() {
  var x = document.getElementById("myDIV3333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }

  function myFunction36() {
  var x = document.getElementById("myDIV33333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction37() {
  var x = document.getElementById("myDIV333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction38() {
  var x = document.getElementById("myDIV3333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction39() {
  var x = document.getElementById("myDIV33333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction40() {
  var x = document.getElementById("myDIV333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction41() {
  var x = document.getElementById("myDIV3333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }

  function myFunction42() {
  var x = document.getElementById("myDIV33333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }

  function myFunction43() {
  var x = document.getElementById("myDIV333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


    function myFunction44() {
  var x = document.getElementById("myDIV3333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


      function myFunction45() {
  var x = document.getElementById("myDIV33333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction46() {
  var x = document.getElementById("myDIV333333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction47() {
  var x = document.getElementById("myDIV3333333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction48() {
  var x = document.getElementById("myDIV33333333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV22222222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }


  function myFunction49() {
  var x = document.getElementById("myDIV333333333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV2222222222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  var x = document.getElementById("myDIV222222222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }

 function myFunction50() {
  var x = document.getElementById("myDIV3333333333333333333333333333333333333333333333333");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }


  // var x = document.getElementById("myDIV222222");
  // if (x.style.display === "block") {
  //   x.style.display = "none";
  // } else {
  //   x.style.display = "block";
  // }


  var x = document.getElementById("myDIV2222222222222222222222222222222222222222222222222");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }

  }






























</script>

    

