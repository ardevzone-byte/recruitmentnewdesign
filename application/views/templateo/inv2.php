<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
<link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128&display=swap" rel="stylesheet">
<!------ Include the above in your HEAD tag ---------->

<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <div class="text-right">
            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
          <!--   <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> -->
        </div>
    </br>
         <div class="text-right">
             <a href="<?php echo base_url();?>users/dashbord_analyses102" id="printInvoice" class="btn btn-info">  الرئيسية</a>

           
        </div>
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                                                    <?php if ($get_customers77['n11'] =="0"):?>  

                             <table class="table" style="font-family:'Sakkal Majalla'; font-size:22px">
                    <thead>
                      <tr>
                         
                        
                          
                          
                                       
                      </tr>

                       <tr>
                         <th colspan="8" style="   height:10px; text-align:center; " class=" text-uppercase small font-weight-bold">   <img style="width:200px;" src="<?php echo base_url();?>assets/imeges/m1.png"></th>
                        
                          
                          
                                       
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>





                        

                         <?php endif?>

                            <?php if ($get_customers77['n11'] =="1"):?>

                               <table class="table" style="font-family:'Sakkal Majalla'; font-size:22px">
                    <thead>
                      <tr>
                         
                        
                          
                          
                                       
                      </tr>

                       <tr>
                         <th colspan="8" style="   height:10px; text-align:center; " class=" text-uppercase small font-weight-bold">   <img style="width:80px;" src="<?php echo base_url();?>assets/imeges/saleh.png"></th>
                        
                          
                          
                                       
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>



                        

                           <?php endif?>
                       
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;" target="_blank">
                                     عرض العمل    
                            </a>
                        </h2>
                        
                        <div style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"><?php echo date("Y/m/d"); ?></div>
                        
                </div>
            </header>
            <main class="text-right">
                
                <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif;
    font-style: normal; font-size:30px;"> 
       
                           
                              <th  class="qty" style="text-align:center;">  البيانات العامة </th>
                              
                        </tr>
                    </thead>
                    <tbody>
                       
                          
 
                              
                       
                       
                    </tbody>
                   

                </table>
                 <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">  
     <th  class="qty" style="text-align:center;background-color:#ffffff;"> -- </th>
                            <th  class="qty" style="text-align:center;">   الدرجة</th>
      
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> <?php echo $get_customers77['Nationality']; ?>    </th>
                            <th  class="qty" style="text-align:center;">   الجنسية</th>
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> <?php echo $get_customers77['name']; ?>    </th>
                              <th  class="qty" style="text-align:center;"> الاسم</th>
                              
                        </tr>
                    </thead>
                    <tbody>
                            <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;">                        <?php echo $get_customers77['job_name']; ?>           
                          </th>    
                           <th  class="qty" style="text-align:center;">  الــــــوظــيـفـــة                            
                          </th>    
         
                            <th  class="qty" style="text-align:center;background-color:#ffffff;">       <?php echo $get_customers77['bransh']; ?>                    
                          </th>                            
                            <th class="qty" style="text-align:center;">   الإدارة / الفرع               
                            </th>
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> 
                               
                            <?php echo $get_customers77['id_number']; ?>
                            </th>
                            <th class="qty" style="text-align:center;"> 
                            رقم الهوية
                             </th>
                             </tr>


                              <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">  
       <?php echo $get_customers77['mobile']; ?>

                          </th>    
                           <th  class="qty" style="text-align:center;">   رقم الجوال                            
                          </th>    
         
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> 
                                فترة التجربة ١٨٠ يوم                            
                          </th>                            
                            <th class="qty" style="text-align:center;">    فترة التجربة                  
                            </th>
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> 
                                سنة ميلادية
                            
                            </th>
                            <th class="qty" style="text-align:center;"> 
                             مدة العقد  
                             </th>
                             </tr>


 
                              
                      
                       
                    </tbody>
                    

                </table>

                    <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"> 
       
                           
                              <th  class="qty" style="text-align:center;">   تفاصيل الراتب والمزايا   </th>
                              
                        </tr>
                    </thead>
                    <tbody>
                       
                          
 
                              
                       
                       
                    </tbody>
                   

                </table>

                 <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">  
    
      
                            <th  class="qty" style="text-align:center;background-color:#ffffff;">(<?php echo $get_customers77['f1']; ?>) ريال سعودي     </th> 

                            <th  class="qty" style="text-align:center;">  الراتب الأســـــــــاسي  </th>
                          
                        </tr>
                    </thead>
                    <tbody>
                            <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;"> (<?php echo $get_customers77['f2']; ?>) ريال سعودي     
                                 
                          </th>    
                           <th  class="qty" style="text-align:center;">   بـــــدل الســـكــــــــــــن                            
                          </th>    
         
                           
                             </tr>

  <?php   if ($get_customers77['f3'] != ""):?> 


                              <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">    (<?php echo $get_customers77['f3']; ?>) ريال سعودي                              
                          </th>    
                           <th  class="qty" style="text-align:center;">    بدل المواصلات                              
                          </th>    
         
                          
                             </tr>


                              <?php endif?>
 <?php   if ($get_customers77['f4'] != ""):?> 


                                 <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">    (<?php echo $get_customers77['f4']; ?>) ريال سعودي                              
                          </th>    
                           <th  class="qty" style="text-align:center;">     بدل اتصالات وانترنت                                
                          </th>    
         
                          
                             </tr>


                              <?php endif?>

                               <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;"> 

     <?php $f1=$get_customers77['f1'];
     $f2=$get_customers77['f2'];
     $f3=$get_customers77['f3'];
     $f4=$get_customers77['f4']; 


       ?>   
 (<?php echo $f1+$f2+$f3+$f4; ?>) ريال سعودي      


                          </th>    
                           <th  class="qty" style="text-align:center;">          الإجـــــــــــمالــــــــي                                
                          </th>    
         
                          
                             </tr>

                                <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">   (26) يوم عمل مدفوعة الأجر                           
                          </th>    
                           <th  class="qty" style="text-align:center;">           الاجازة السنوية                                
                          </th>    
         
                          
                             </tr>



                                <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">   حسب سياسة الشركة                          
                          </th>    
                           <th  class="qty" style="text-align:center;">              التأمين الطبي                                
                          </th>    
         
                          
                             </tr>











 
                              
                      
                       
                    </tbody>
                    

                </table>

                 <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"> 
       
                           
                              <th  class="qty" style="text-align:center;">    الشروط والتعليمات       </th>


                              
                        </tr>

                         <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"> 
       
                           
                              <th  class="qty" style="text-align:center; background-color:#ffffff;">    إن هذا العرض ساري المفعول لمدة  ثلاثة ايام بدء من تاريخه ، وتحتفظ شركة مرسوم بحقها منفردة ، وبتقديرها الخاص،     </th>
                          </tr>
                           <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
                                 <th  class="qty" style="text-align:center; background-color:#ffffff;">    في تمديد مدة هذا العرض إذا ما دعت الظروف الى ذلك.وفي حالة قبول هذا العرض     </th>
                             </tr>
                              <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
                                    <th  class="qty" style="text-align:center; background-color:#ffffff;">   يرجى (التوقيع/ الرد على البريد الالكتروني) وإعادة ارسالها إلينا، ويعتبر هذا العرض لاغيا في احدى الحالات التالية :      </th>

                              
                              
                        </tr>


                    </thead>
                    <tbody>
                       
                          
 
                              
                       
                       
                    </tbody>
                   

                </table>


                  <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">  
    
      
                            <th  class="qty" style="text-align:center;background-color:#ffffff;">  اذا لم تتم مباشرة العمل حسب التاريخ المحدد. </th>

                            <th  class="qty" style="text-align:center;">     1  </th>
                          
                        </tr>
                    </thead>
                    <tbody>
                            <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;">   اذا لم تتجاوز الفحوصات الطبية .                           
                          </th>    
                           <th  class="qty" style="text-align:center;">   2                             
                          </th>    
         
                           
                             </tr>


                              <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">   اذا لم تقدم الشهادات العلمية والعملية والوثائق الاخرى .                           
                          </th>    
                           <th  class="qty" style="text-align:center;">       3                              
                          </th>    
         
                          
                             </tr>

                                 <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">  عدم خلوا سجل السوابق (حسب سجل صحيفة الادلة الجنائية).                            
                          </th>    
                           <th  class="qty" style="text-align:center;">          4                                
                          </th>    
         
                          
                             </tr>

                               <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">     اذا لم يتم احضار كفيل غارم .                         
                          </th>    
                           <th  class="qty" style="text-align:center;">           5                                
                          </th>    
         
                          
                             </tr>

                                <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">   عدم نقل الخدمات إلى الشركة (خاص بالوافدين).                         
                          </th>    
                           <th  class="qty" style="text-align:center;">              6                                
                          </th>    
         
                          
                             </tr>



                                <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;"> عدم اجتياز اختبار الحاسب الآلي Word-Excel – الاستخدام العام.                       
                          </th>    
                           <th  class="qty" style="text-align:center;">              7                                  
                          </th>    
         
                          
                             </tr>


                                <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">  عدم قبول العرض رسمياً عبر (التوقيع عليه او الرد على البريد الالكتروني بالموافقة).                      
                          </th>    
                           <th  class="qty" style="text-align:center;">              8                                  
                          </th>    
         
                          
                             </tr>


                                <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">  في حال عدم صحة البيانات الآتية حالا أو مستقبلا :
                          </th>    
                           <th  class="qty" style="text-align:center;">              9                                  
                          </th>    
         
                          
                             </tr>


                               </tr>


                                

                                 

                               


                             

 

















 
                              
                      
                       
                    </tbody>
                    

                </table>



                  <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                       
                    </thead>
                    <tbody>
                       
                             <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">

  <th class="qty" style="text-align:center;">  (سؤال للاناث)
                                ج. هل لديك حمل لم يتم الإفصاح عنه ؟  
                             </th>


                               <th class="qty" style="text-align:center;">  
                                ب. هل لديك أي أمراض مزمنة أو معديه لم يتم الإفصاح عنه ؟
                            </th>
                            <th  class="qty" style="text-align:center;"> 
                               
                                
                            </th>


                               

      <th class="qty" style="text-align:center;">  
                                 أ. هل لديك أي تعثرات مالية لدى أي من الجهات التمويلية ؟
                            </th>
                            <th  class="qty" style="text-align:center;"> 




            
                                                    
                          
                          
                             </tr>
 
                              
                       
                       
                    </tbody>
                   

                </table>





          







                 <h2 class="name">
                            <a style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;" target="_blank">
                                قبول مدير إدارة الموارد البشرية 
                            </a>
                        </h2>

                 <table border="3" cellspacing="3" cellpadding="3">
                 
                   
 

                 


                    <tfoot>
                       
                    

                    </tfoot>
   <tfoot>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
                              
                            
                                  <th colspan="4" class="qty" style="color:#000000; text-align:center;">منصور علي احمد رجب  

                                  </br>
                              </br>
                          </br></th>
                            
                           
                           
                        </tr>
                    

                    </tfoot>

                    
                    
                      

                </table>

</br>
</br>
</br>
                 <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"> 
       
                            <th  class="qty" style="text-align:center;color:#000000;">     التوقيع      </th>
                            <th  class="qty" style="text-align:center;color:#000000;">  حالة القبول  </th>
                            <th  class="qty" style="text-align:center;color:#000000;">   تاريخ المباشرة  </th>
                              
                              
                        </tr>
                    </thead>
                    <tbody>
                       
                             <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
            
                                                    
                            <th class="qty" style="text-align:center;">  
                                
                            </th>
                            <th  class="qty" style="text-align:center;"> 
                               
                                 قبول (      )    رفض(      )
                            </th>
                            <th class="qty" style="text-align:center;"> 
                                 <?php echo $get_customers77['f5']; ?>
                             </th>
                               
                             </tr>
 
                              
                       
                       
                    </tbody>
                   

                </table>


         
              


    
            </main>
         
        </div>
        
        <div></div>
    </div>
    
</div>


<style type="text/css">
    #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
  /*  .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }*/
}

</style>
<script type="text/javascript">
     $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data) 
            {
                window.print();
                return true;
            }
        });
</script>