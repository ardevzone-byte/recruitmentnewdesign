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
                     
                        
                        <div style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;"><?php echo date("Y/m/d"); ?></div>
                        
                </div>
            </header>
            <main class="text-right">
                
                <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif;
    font-style: normal; font-size:30px;"> 
       
                           
                              <th  class="qty" style="text-align:center;"> السيرة الذاتية المختصرة
     </th>
                              
                        </tr>
                    </thead>
                    <tbody>
                       
                          
 
                              
                       
                       
                    </tbody>
                   

                </table>
                 <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">  
     <th  class="qty" style="text-align:center;background-color:#ffffff;">   <?php echo $get_customers77['job_name']; ?>   </th>
                            <th  class="qty" style="text-align:center;">   العمر</th>

      
                            <th  class="qty" style="text-align:center;background-color:#ffffff;">   <?php echo $get_customers77['job_name']; ?>      </th>
                            <th  class="qty" style="text-align:center;">     الوظيفية المرشح لها</th>
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> <?php echo $get_customers77['name']; ?>    </th>
                              <th  class="qty" style="text-align:center;"> الاسم</th>
                              
                        </tr>
                    </thead>
                    <tbody>
                            <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;">                        <?php echo $get_customers77['c2']; ?>           
                          </th>    
                           <th  class="qty" style="text-align:center;">  جهة التعليم                            
                          </th>    
         
                            <th  class="qty" style="text-align:center;background-color:#ffffff;">       <?php echo $get_customers77['c1']; ?>                    
                          </th>                            
                            <th class="qty" style="text-align:center;">  المؤهل العلمي              
                            </th>
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> 
                               
                            <?php echo $get_customers77['c3']; ?>
                            </th>
                            <th class="qty" style="text-align:center;"> 
                                     نوع التعليم
                             </th>
                             </tr>


                              <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">  
       <?php echo $get_customers77['c6']; ?>

                          </th>    
                           <th  class="qty" style="text-align:center;">    الراتب المتوقع                              
                          </th>    
         
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> 
                                   <?php echo $get_customers77['c5']; ?>                             
                          </th>                            
                            <th class="qty" style="text-align:center;">       الراتب الحالي                  
                            </th>
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> 
                                    <?php echo $get_customers77['c4']; ?>   
                            
                            </th>
                            <th class="qty" style="text-align:center;"> 
                                تاريخ التخرج  
                             </th>
                             </tr>


                               <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">  
       <?php echo $get_customers77['c9']; ?>

                          </th>    
                           <th  class="qty" style="text-align:center;">       عدد سنوات الخبرة                               
                          </th>    
         
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> 
                                  <?php echo $get_customers77['c8']; ?>                                
                          </th>                            
                            <th class="qty" style="text-align:center;">       حالة الوظيفة                     
                            </th>
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> 
                                    <?php echo $get_customers77['c7']; ?>     
                            
                            </th>
                            <th class="qty" style="text-align:center;"> 
                                   المسمى الوظيفي  
                             </th>
                             </tr>

                                 <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">
     <th  class="qty" style="text-align:center;background-color:#ffffff;#ffffff;">  
       <?php echo $get_customers77['c12']; ?>

                          </th>    
                           <th  class="qty" style="text-align:center;">            جهة العمل الحالية                               
                          </th>    
         
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> 
                                  <?php echo $get_customers77['c11']; ?>                                
                          </th>                            
                            <th class="qty" style="text-align:center;">     الى تاريخ                          
                            </th>
                            <th  class="qty" style="text-align:center;background-color:#ffffff;"> 
                                   
                               <?php echo $get_customers77['c10']; ?>   
                            </th>
                            <th class="qty" style="text-align:center;"> 
                                      من تاريخ  
                             </th>
                             </tr>


 
                              
                      
                       
                    </tbody>
                    

                </table>

                  <table border="3" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr style="font-family: 'Sakkal Majalla', sans-serif;
    font-style: normal; font-size:30px;"> 
       
                           
                              <th  class="qty" style="text-align:center;">  نقاط القوة    </th>
                              
                        </tr>
                    </thead>
                    <tbody>
          <tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">               
                          
   <th  class="qty" style="text-align:center;">       <?php echo $get_customers77['c13']; ?>        </th>

</tr>

<tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">               
                          
   <th  class="qty" style="text-align:center;">       <?php echo $get_customers77['c133']; ?>        </th>

</tr>

<tr  style="font-family: 'Sakkal Majalla', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px;">               
                          
   <th  class="qty" style="text-align:center;">       <?php echo $get_customers77['c134']; ?>        </th>

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