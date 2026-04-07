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
                         <a target="_blank" href="https://lobianijs.com">
                            <img style="width:70px;" src="<?php echo base_url();?>/assets/imeges/marsoom.PNG" data-holder-rendered="true" />
                            </a>
                       
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;" target="_blank">
                                        التاريخ  / <?php echo date("Y/m/d"); ?>  
                            </a>
                        </h2>

                        
                        
                        
                        
                </div>
            </header>
            <main class="text-right">
                
                <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif;
    font-style: normal; font-size:30px;"> 
       
                           
                              <th  class="qty" style="text-align:center;">    تقرير التوظيف    </th>
                              
                        </tr>
                    </thead>
                    <tbody>
                       
                          
 
                              
                       
                       
                    </tbody>
                   

                </table>
                 <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">  
     <th  class="qty" style="text-align:center;background-color:#ffffff;">  <?php echo $get_customers77all_report['to_date']; ?>  </th>
                            <th  class="qty" style="text-align:center;">   الى تاريخ    </th>
      
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> <?php echo $get_customers77all_report['from_date']; ?>    </th>
                            <th  class="qty" style="text-align:center;">       من تاريخ</th>
                            <th  class="qty" style="text-align:center;background-color:#ffffff;">   <?php echo $get_customers77all_report['name']; ?>     </th>
                              <th  class="qty" style="text-align:center;"> تقرير مطلوب من قبل   </th>
                              
                        </tr>
                    </thead>
                    <tbody>
                            


                            


 
                              
                      
                       
                    </tbody>
                    

                </table>

                    <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style=" display:none; font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"> 
       
                           
                              <th  class="qty" style="text-align:center;">    بيانات المقابلات     </th>
                              
                        </tr>
                    </thead>
                    <tbody>
                       
                          
 
                              
                       
                       
                    </tbody>
                   

                </table>
<style>
table, th, td {
  border: 2px solid;
}
</style>
                 <table    cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style=" display:none; font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">  
     <th  class="qty" style="text-align:center;">    المسمى الوظيفي     </th>   
    
  <th  class="qty" style="text-align:center;">   الحالة     </th>                           
  
  <th  class="qty" style="text-align:center;">  تاريخ المقابلة   </th>
  <th  class="qty" style="text-align:center;">  الاسم       </th>
  
                        </tr>
                    </thead>
                    <tbody>

                         <?php $p=0; $p1=0; $p2=0; $p3=0; $p4=0; $p5=0; $p6=0; $p7=0; foreach($get_customers77all_complaints11 as $get_customers77all_complaints11) :?>


                            <tr  style=" display:none;font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px; ">
   
                          <th  class="qty" style="text-align:center;background-color:#ffffff;">   <?php echo $get_customers77all_complaints11['job_name']; 
                          if ($get_customers77all_complaints11['job_name']=='محصل ديون') {
                             $p5=$p5+1;
                          }elseif ($get_customers77all_complaints11['job_name']=='مشرف تحصيل') {
                             $p6=$p6+1;
                          }elseif ($get_customers77all_complaints11['job_name']=='موارد بشرية') {
                              $p7=$p7+1;
                          }?>        
                                 
                          </th> 
                  
                             
                           <th  class="qty" style="text-align:center;background-color:#ffffff;">   <?php
                            if($get_customers77all_complaints11['status4']=="2") {
                              echo "معتمد";
                               $p=$p+1;
                           }elseif($get_customers77all_complaints11['status4']=="4"){
                              echo "احتياط";
                              $p1=$p1+1;

                           }elseif($get_customers77all_complaints11['status4']=="3"){
                              echo "مرفوض ";
                              $p2=$p2+1;

                           }elseif($get_customers77all_complaints11['status4']=="1"){
                              echo "لم يحضر المقابلة";
                              $p3=$p3+1;

                           }elseif($get_customers77all_complaints11['status4']=="0"){
                              echo "بانتظار المقابلة";
                              $p4=$p4+1;

                           }  ; ?>        
                                 
                          </th> 
                          
                          <th  class="qty" style="text-align:center;background-color:#ffffff;">   <?php echo $get_customers77all_complaints11['Date_of_the_personal_interview']; ?>        
                                 
                          </th> 

                             <th  class="qty" style="text-align:center;background-color:#ffffff;">   <?php echo $get_customers77all_complaints11['name']; ?>        
                                 
                          </th>


                         
                              
         
                           
                             </tr>


                             <?php endforeach; ?>  

   



 
                              
                      
                       
                    </tbody>
                    

                </table>


                   <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"> 
       
                           
                              <th  class="qty" style="text-align:center;">       حالات المقابلات      </th>
                              
                        </tr>
                    </thead>
                    <tbody>
                       
                          
 
                              
                       
                       
                    </tbody>
                   

                </table>

                  <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"> 
      <th  class="qty" style="text-align:center;">         لم يحضر المقابلة       </th>
     <th  class="qty" style="text-align:center;">      بانتظار المقابلة       </th>
        <th  class="qty" style="text-align:center;">      احتياط      </th>
                           
                              <th  class="qty" style="text-align:center;">      مرفوض      </th>
                                <th  class="qty" style="text-align:center;">      معتمد      </th>
                              
                        </tr>
                    </thead>
                    <tbody>
                         <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"> 
       
                           
                              <th  class="qty" style="text-align:center;">         <?php echo $p3; ?>    </th>
                              <th  class="qty" style="text-align:center;">        <?php echo $p4; ?>     </th>
                              <th  class="qty" style="text-align:center;">       <?php echo $p1; ?>      </th>
                              <th  class="qty" style="text-align:center;">      <?php echo $p2; ?>       </th>
                              <th  class="qty" style="text-align:center;">     <?php echo $p; ?>        </th>
                              
                        </tr>
                          
 
                              
                       
                       
                    </tbody>
                   

                </table>


                   <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"> 
       
                           
                              <th  class="qty" style="text-align:center;">        تقرير المسمى الوظيفي        </th>
                              
                        </tr>
                    </thead>
                    <tbody>
                       
                          
 
                              
                       
                       
                    </tbody>
                   

                </table>

                  <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"> 
     
        <th  class="qty" style="text-align:center;">       موارد بشرية        </th>
                           
                              <th  class="qty" style="text-align:center;">       مشرف تحصيل       </th>
                                <th  class="qty" style="text-align:center;">       محصل ديون          </th>
                              
                        </tr>
                    </thead>
                    <tbody>
                         <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"> 
        
                            
                              <th  class="qty" style="text-align:center;">      <?php echo $p7; ?>         </th>
                              <th  class="qty" style="text-align:center;">      <?php echo $p6; ?>         </th>
                              <th  class="qty" style="text-align:center;">       <?php echo $p5; ?>        </th>
                              
                        </tr>
                          
 
                              
                       
                       
                    </tbody>
                   

                </table>




                


                



                





          







                

              
                


         
              


    
            </main>
         
        </div>
        
        <div></div>
    </div>
    
</div>
<style type="text/css" media="print">
    @page { 
        size: landscape;
    }

   
    
</style>



<style type="text/css">
    #invoice{
    padding: 30px;
 
    
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 100px;
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