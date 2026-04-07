<meta name="viewport" content="width=device-width, initial-scale=1">
 

        <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/add_attachment/'.$id); ?>
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>إضافة   عروض أسعار  </h2>
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
                                    
                                    <input placeholder="اسم عرض السعر" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="text" name="Name" class="form-control">
                                </div>
 


                            <div class="form-group">


                                   
                           <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;">مرفقات</span>
                                </div>
                                <div class="custom-file">
                                    <input multiple="multiple" type="file" name="userfile" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;">اختار  المرفق   (PDF) أو  (Jbg)</label>
                                </div>
                            </div>


                                     
                                </div>

  
 </br>

<button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" type="submit" name="submitForm" value="formSave" class="btn btn-success"> اضافة</button>
                                </div>

                                <table style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;"  class="table m-b-0">  
                    <thead>
                      <tr>
                         <th scope="col">اسم المرفق</th>
                       
          
                <th scope="col"> </th>
             
 
 
                      </tr>
                    </thead>
                    <tbody>
 
                    <?php foreach($get_attachment202 as $get_attachment202) : ?>
    <tr>
  
        
       <td>

        <a title="<?php echo $get_attachment202['name']; ?>" class="btn btn-download" href="#" onClick="MyWindow=window.open('<?php echo site_url(); ?>assets/imeges/posts/<?php echo $get_attachment202['path']; ?>','MyWindow',width=50,height=50); return false;"><i class="fa fa-cloud-download" ></i>
                                 <?php echo $get_attachment202['name']; ?> 
                            </a> 
 
        </td>
    
        <td>

        <button type="button" data-toggle="modal" data-target="#staticModal" class="btn btn-danger" title="Delete"><span class="sr-only">Delete</span> <?php $id3=$get_attachment202['id']; ?><i class="fa fa-trash-o"></i></button>

            
        </td>
      
    </tr>
    <?php endforeach; ?>
                    </tbody>
                  </table>

                                
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>


      <?php echo form_close(); ?>


      <div style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;" class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">   إجراء عملية حذف</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                        هل انت متأكد من عملية الحذف
                                </p>
                            </div>
          <div class="modal-footer">
     <div class="row">
  <div class="col-md-6">
     <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
  </div>
  <div class="col-md-6">
                <?php echo form_open('/users/delete/'.$id3); ?>    
              <p>
               <input type="submit" value="حذف" class="btn btn-danger">
              
               <div id="source-button" class="btn btn-primary btn-xs" style="display: none;">
                &lt; &gt;
               </div>
              </p>

            </form>
  </div>
      

          


     </div>
           



          </div>
                        </div>
                    </div>
  </div>