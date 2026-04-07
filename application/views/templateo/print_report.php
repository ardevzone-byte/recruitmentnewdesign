
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

     
   
    


    <div class="toolbar hidden-print" >

        <div class="text-right">
            <button  id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
          <!--   <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> -->
        </div>
    </br>
    
          <div class="text-right">
             <a  href="javascript:window.history.go(-1);" id="printInvoice" class="btn btn-info">  رجوع</a>

           
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
                            <a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;color:#16193C;" target="_blank">
                                 تقرير طلبات التوظيف من مختلف الادارات
                            </a>
                        </h2>

                         
                          
 
                     
                
            </header>
            <main class="text-right">
                <div class="row contacts">
                   
                    <div class="col invoice-details">
                        <h1 class="invoice-id" style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:40px; color:#F7B565;"><?php //echo $ev_done['w2']; ?>         </h1>   
                    </div>
                </div>
                 <h2 class="name" style="background-color:#F7BA71;">
                            <a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px; color:#ffffff;" target="_blank">
                                         الشاغر المطلوب  إنجازة                   
                            </a>
                        </h2>



                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                       

                         <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:12px;"> 
                           
                          
                            
                                <th  class="qty" style="text-align:center; background-color:#e0e0d1;">      نسبة الإنجاز (مباشرات)</th>
                          
                          
                            <th  class="qty" style="text-align:center;background-color:#e0e0d1;">   التاريخ المطلوب للإنجاز  (مقترح من معد التقرير)</th>

                            

                              
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">       عدد الشواغر </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">        المسمى الوظيفي</th>
                              
                              
                        </tr>
  <?php $r=0; $r1=0; $r2=0; $r3=0; $r4=0; $r5=0; $r6=0; $r7=0; $r8=0;
   foreach($get_job_vacancy as $get_job_vacancys) : $r7=$r7+1;
    ?>
                         <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:10px;"> 

   

                         
                                <th style="text-align:center; background-color:#f5f5f0;"><div class="progress progress-xs">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="" style="width:<?php echo round(($this->user_model->cuntt_direct($get_job_vacancys['id'])/$get_job_vacancys['n5'])*100,0); ?>%"> <span  class="sr-only"></span> <?php echo round(($this->user_model->cuntt_direct($get_job_vacancys['id'])/$get_job_vacancys['n5'])*100,0); $r6=($r6+ round(($this->user_model->cuntt_direct($get_job_vacancys['id'])/$get_job_vacancys['n5'])*100,0))/($r7); ?>  %</div>
                                            </div></th>
                          
                         
                            <th   style="text-align:center;background-color:#f5f5f0;">  <?php  date_default_timezone_set('Asia/Riyadh');
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
 $r5=$r5+$n;
 $r8=$r5/$r7;
  
?>

               

               <?php  if ($n == 0):?> 

   <label   style="text-align:center;background-color:#f5f5f0;" title="" href="">
                يوم واحد
              </label>
               <?php endif?>

                 <?php  if ($n > 0):?> 

   <label  style="text-align:center;background-color:#f5f5f0;" title="" href="">
    تبقى  ( <?php echo $n; ?> ) يوم
                        
           </label> 
               <?php endif?>

                 

                <?php  if ($n < 0):?> 

   <label   style="text-align:center;background-color:#f5f5f0;" title="" href="">
      تجاوز التاريخ المسموح به بمقدار   ( <?php echo abs($n); ?> ) يوم
                       
              </label>
               <?php endif?> / <?php echo $get_job_vacancys['n6']; ?> </th>

                             
                                
                            

                            

                            <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_job_vacancys['n5']; $r=$r + $get_job_vacancys['n5']; ?></th>

                             <th    style="text-align:center;background-color:#f5f5f0;">       <?php echo $get_job_vacancys['n1']; ?> / <?php echo $get_job_vacancys['n2']; ?> </th>


                           
                              
                              
                        </tr>
    <?php endforeach; ?>
                        

  
                        

                      
                         

                    </thead>
                    <footer>
                         <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:14px;">
                          <th style="text-align:center; background-color:#e0e0d1;"><div class="progress progress-xs">
                                                <div class="progress-bar" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="" style="width:<?php echo $r6; ?>%"> <span  class="sr-only"></span> <?php echo $r6; ?>  %</div>
                                            </div></th>

                        <th    style="text-align:center; background-color:#e0e0d1;">  
                            <?php  if ($r8 == 0):?> 

   <label   style="text-align:center;background-color:#e0e0d1;" title="" href="">
                يوم واحد
              </label>
               <?php endif?>

                 <?php  if ($r8 > 0):?> 

   <label   style="text-align:center;background-color:#e0e0d1;" title="" href="">
    تبقى  ( <?php echo $r8; ?> ) يوم
                        
              </label>
               <?php endif?>

                 

                <?php  if ($r8 < 0):?> 

   <label   style="text-align:center;background-color:#e0e0d1;" title="" href="">
      تجاوز التاريخ المسموح به بمقدار   ( <?php echo abs($r8); ?> ) يوم
                       
              </label>
               <?php endif?>
                     </th>
                        
                        
                         
                         
                        <th    style="text-align:center; background-color:#e0e0d1;">      <?php echo $r; ?></th>
                        <th    style="text-align:center; background-color:#e0e0d1;">     الاجمالي</th>
                    </tr>

                  

                    </footer>
                   
                   

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