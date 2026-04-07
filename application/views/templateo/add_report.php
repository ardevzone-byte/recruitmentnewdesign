

        <?php echo validation_errors(); ?>
             <?php echo form_open_multipart('users/add_report'); ?>
<script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
</script> 

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                     <div class="col-lg-5 col-md-8 col-sm-12">                        
                       
                       
                    </div> 


                     <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;"> تهيئة التقرير   <small></small> </h2>
                        </div>
                       
                         
                        <div class="body">
                            <form id="basic-form" method="post" novalidate>
                             
                  


                                

                               <div class="input-group mb-3 hidden-input707">
                                <div class="input-group-prepend">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" class="input-group-text" for="bank_name">   جهة التقرير</label>
                                </div>
                                <select id="n4"  name="name" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" class="custom-select" id="bank_name">
    
                                    <option style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" value=" تقرير العضو المنتدب    " >    تقرير العضو المنتدب     </option>
                                   
      
     
                                     
                                   
                                </select>
                            </div>

                                

         <div class="col-lg-4 col-md-12">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">من تاريخ</label>
                                    <div class="input-group mb-3">                                        
                                        <input name="from_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="yyyy/mm/dd">
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12">
                                    <label style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;">الى تاريخ</label>
                                    <div class="input-group mb-3">                                        
                                        <input name="to_date" data-provide="datepicker" data-date-autoclose="true" class="form-control" data-date-format="yyyy/mm/dd">
                                    </div>
                                </div>

                                 

                                 

                               

                                
                                    
                                   
                               


  </div>
</div>







<button style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:15px;" id="send" type="submit" name="submitForm" value="formSave" class="btn btn-primary">   حفظ  </button>
 
                                </div>
                                
                            </form>
                        </div>

                    </div>
                </div>

                              
                   
                </div>
            </div>

             
            
        </div>
    </div>
    <script src="<?php echo base_url();?>assets/bundles/libscripts.bundle.js"></script>    
<script src="<?php echo base_url();?>assets/bundles/vendorscripts.bundle.js"></script>

<script src="<?php echo base_url();?>/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
<script src="<?php echo base_url();?>/assets/vendor/parsleyjs/js/parsley.min.js"></script>
    
<script src="<?php echo base_url();?>assets/bundles/mainscripts.bundle.js"></script>

<script src="<?php echo base_url();?>/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

<script>
// multiselect AutoComplete
    $("#multiselect").kendoMultiSelect();
    var multiselect = $("#multiselect").data("kendoMultiSelect");
    $("#autocomplete").kendoAutoComplete({
         dataSource: [ "Apples", "Oranges","Apples1", "Oranges1","Apples2", "Oranges2","Apples3", "Oranges3","Apples4", "Oranges4" ],
          select: function(e) {
            var item = e.item;
            var text = item.text();
            
            var data = multiselect.dataSource;
            data.add({text: text})
            //alert(data);
          }
    });
    
    
/*
// Upload Multi Files
$("#d").click(function() {

    alert('ok');
    $('#files').change(function(){
        
        var files = $('#files')[0].files;
        var error = '';
        var form_data = new FormData();
        for(var count = 0; count < files.length; count++){
            var name = files[count].name;
            var extt = name.split('.').pop()toLowerCase();
            if(jquery.inArray(extt,['doc','docx','pdf','png','jpg','jpeg']) == -1){
                error += "Invalid" + count + " Image"
                //alert('error');
            }else{
                form_data.append("files[]",files[count]);
            }
        }
        if(error == ''){
            $.ajax({
                url:"<?php echo base_url();?>users/deal_add",
                method:POST,
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                beforsend:functio()
                {
                    $('#upload').html("<label class'text-sucess'>uploading...</label>")
                },
                sucess:function(data)
                {
                    $('#upload').html(data);
                    $('#files').val('');
                }
            });
        }else{
            alert(error);
        }
    });
});*/
</script>




    <script>

   

 

 

  
   
   
  $("input[name='n19']").change(function () {
               var q1 = this.value;
                if (q1 == '1') {
                      document.getElementById('n20').value = '';
                      document.getElementById('n21').value = '';
                      document.getElementById('n22').value = '';
                      document.getElementById('n24').value = '';
                      document.getElementById('a4').value = '';
                      $('#n20').prop('required',true);
                      $('#n21').prop('required',true);
                      $('#n22').prop('required',true);
                      $(".hidden-input10").show();
                      $(".hidden-input100").hide();
                      $(".hidden-input1000").hide();
                }else if(q1 == '3'){
                    document.getElementById('n20').value = '';
                      document.getElementById('n21').value = '';
                      document.getElementById('n22').value = '';
                      document.getElementById('n24').value = '';
                      document.getElementById('a4').value = '';
                     $('#n20').removeAttr('required');
                     $('#n21').removeAttr('required');
                     $('#n22').removeAttr('required');
                     
                      $(".hidden-input10").hide();
                      $(".hidden-input100").show();
                      $(".hidden-input1000").hide();
                }else if(q1 == '6'){
                    document.getElementById('n20').value = '';
                      document.getElementById('n21').value = '';
                      document.getElementById('n22').value = '';
                      document.getElementById('n24').value = '';
                      document.getElementById('a4').value = '';
                     $('#n20').removeAttr('required');
                     $('#n21').removeAttr('required');
                     $('#n22').removeAttr('required');
                      $(".hidden-input10").hide();
                      $(".hidden-input100").hide();
                      $(".hidden-input1000").show();
                }
                 else {
                    document.getElementById('n20').value = '';
                      document.getElementById('n21').value = '';
                      document.getElementById('n22').value = '';
                      document.getElementById('n24').value = '';
                      document.getElementById('a4').value = '';
                     $('#n20').removeAttr('required');
                     $('#n21').removeAttr('required');
                     $('#n22').removeAttr('required');
                      $(".hidden-input10").hide();
                      $(".hidden-input100").hide();
                      $(".hidden-input1000").hide();
                }
            })

 

  



 $(function(){
    $("form").submit(function () {
    // prevent duplicate form submissions
    $(this).find(":submit").attr('disabled', 'disabled');
});
 })
    </script>

    




      <?php echo form_close(); ?>
    

