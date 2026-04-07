
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
                            <img style="width:70px;" src="<?php echo base_url();?>/assets/imeges/logo.PNG" data-holder-rendered="true" />
                            </a>
                    </div>
                  
                    <div class="col company-details">
                        <h2 class="name">
                            <a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;color:#16193C;" target="_blank">
                                   تقرير التوظيف للمرشحين المعمدين من قبل العضو المنتدب<?php //echo $customers['id']; ?>
                            </a>
                        </h2>

                         
                          <h2 class="name">
                            <a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:25px; color:#16193C; " target="_blank">
                                                لشهر 6/2022 وشهر 7/2022     <?php  
                                      //  echo $customers['project_name'];
                                    ?>
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
                                       تفاصيل بيانات الموظفين حسب المناطق
                            </a>
                        </h2>

                        

 
 

               

           
        


                  <h2 class="name" style="background-color:#F7BA71;">
                            <a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#ffffff;" target="_blank">
                                         التفاصيل  (الرياض  /رجال)
                            </a>
                        </h2>

                           <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                       

                     
                           
                          
                            
                             
                          
                          
                            <th  class="qty" style="text-align:center;background-color:#e0e0d1;">        تاريخ المباشرة  او المتوقع</th>

                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">         تاريخ التعميد  </th>

                              <th  class="qty" style="text-align:center;background-color:#e0e0d1;">           المشروع</th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">         الراتب   </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">الحالة الإجتماعية </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">          الاسم </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">           الرقم</th>
                              
                              
                        </tr>
  <?php $d='الرياض';
  $d1='محصل ديون'; 
  $get_baptizing1=$data['get_baptizing1'] = $this->user_model->get_baptizing1($d,$d1);  $r7=0;
   foreach($get_baptizing1 as $get_baptizing11) : 
    $r7=$r7+1;
    ?>
                         <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:10px;"> 

   

                          
                          
                         
                        


                           
                            <th   style="text-align:center;background-color:#f5f5f0;">

                                <?php
                                if ($get_baptizing11['n13']=="") {
                                    echo "انسحب بسبب ";
                                    echo $get_baptizing11['n15'];
                                 } echo $get_baptizing11['n13']; ?></th>
                            <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n12']; ?></th>
                               <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n10']; ?></th>
                                <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n9']; ?></th>
                                 <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n5']; ?></th>
                                  <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n2']; ?></th>

                             <th    style="text-align:center;background-color:#f5f5f0;">       <?php echo $r7; ?> </th>


                           
                              
                              
                        </tr>
    <?php endforeach; ?>
                        

  
                        

                      
                         

                    </thead>
                  
                   
                   

                </table> 



                   <h2 class="name" style="background-color:#F7BA71;">
                            <a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#ffffff;" target="_blank">
                                         التفاصيل  (الرياض  / نساء)
                            </a>
                        </h2>

                           <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                       

                     
                           
                          
                            
                             
                          
                          
                            <th  class="qty" style="text-align:center;background-color:#e0e0d1;">        تاريخ المباشرة  او المتوقع</th>

                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">         تاريخ التعميد  </th>

                              <th  class="qty" style="text-align:center;background-color:#e0e0d1;">           المشروع</th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">         الراتب   </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">الحالة الإجتماعية </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">          الاسم </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">           الرقم</th>
                              
                              
                        </tr>
  <?php $d='الرياض';
  $d1='محصلة ديون'; 
  $get_baptizing1=$data['get_baptizing1'] = $this->user_model->get_baptizing1($d,$d1);  $r7=0;
   foreach($get_baptizing1 as $get_baptizing11) : 
    $r7=$r7+1;
    ?>
                         <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:10px;"> 

   

                          
                          
                         
                        


                           
                            <th   style="text-align:center;background-color:#f5f5f0;">

                                <?php
                                if ($get_baptizing11['n13']=="") {
                                    echo "انسحب بسبب ";
                                    echo $get_baptizing11['n15'];
                                 } echo $get_baptizing11['n13']; ?></th>
                            <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n12']; ?></th>
                               <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n10']; ?></th>
                                <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n9']; ?></th>
                                 <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n5']; ?></th>
                                  <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n2']; ?></th>

                             <th    style="text-align:center;background-color:#f5f5f0;">       <?php echo $r7; ?> </th>


                           
                              
                              
                        </tr>
    <?php endforeach; ?>
                        

  
                        

                      
                         

                    </thead>
                  
                   
                   

                </table> 


                    <h2 class="name" style="background-color:#F7BA71;">
                            <a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#ffffff;" target="_blank">
                                         التفاصيل  (الشرقية  /نساء)
                            </a>
                        </h2>

                           <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                       

                     
                           
                          
                            
                             
                          
                          
                            <th  class="qty" style="text-align:center;background-color:#e0e0d1;">        تاريخ المباشرة  او المتوقع</th>

                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">         تاريخ التعميد  </th>

                              <th  class="qty" style="text-align:center;background-color:#e0e0d1;">           المشروع</th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">         الراتب   </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">الحالة الإجتماعية </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">          الاسم </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">           الرقم</th>
                              
                              
                        </tr>
  <?php $d='الشرقية';
  $d1='محصلة ديون'; 
  $get_baptizing1=$data['get_baptizing1'] = $this->user_model->get_baptizing1($d,$d1);  $r7=0;
   foreach($get_baptizing1 as $get_baptizing11) : 
    $r7=$r7+1;
    ?>
                         <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:10px;"> 

   

                          
                          
                         
                        


                           
                            <th   style="text-align:center;background-color:#f5f5f0;">

                                <?php
                                if ($get_baptizing11['n13']=="") {
                                    echo "انسحب بسبب ";
                                    echo $get_baptizing11['n15'];
                                 } echo $get_baptizing11['n13']; ?></th>
                            <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n12']; ?></th>
                               <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n10']; ?></th>
                                <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n9']; ?></th>
                                 <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n5']; ?></th>
                                  <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n2']; ?></th>

                             <th    style="text-align:center;background-color:#f5f5f0;">       <?php echo $r7; ?> </th>


                           
                              
                              
                        </tr>
    <?php endforeach; ?>
                        

  
                        

                      
                         

                    </thead>
                  
                   
                   

                </table> 


                 <h2 class="name" style="background-color:#F7BA71;">
                            <a style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:20px; color:#ffffff;" target="_blank">
                                         التفاصيل  (الجنوبية  /نساء)
                            </a>
                        </h2>

                           <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                       

                     
                           
                          
                            
                             
                          
                          
                            <th  class="qty" style="text-align:center;background-color:#e0e0d1;">        تاريخ المباشرة  او المتوقع</th>

                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">         تاريخ التعميد  </th>

                              <th  class="qty" style="text-align:center;background-color:#e0e0d1;">           المشروع</th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">         الراتب   </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">الحالة الإجتماعية </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">          الاسم </th>
                             <th  class="qty" style="text-align:center;background-color:#e0e0d1;">           الرقم</th>
                              
                              
                        </tr>
  <?php $d='ابها';
  $d1='محصلة ديون'; 
  $get_baptizing1=$data['get_baptizing1'] = $this->user_model->get_baptizing1($d,$d1);  $r7=0;
   foreach($get_baptizing1 as $get_baptizing11) : 
    $r7=$r7+1;
    ?>
                         <tr style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:10px;"> 

   

                          
                          
                         
                        


                           
                            <th   style="text-align:center;background-color:#f5f5f0;">

                                <?php
                                if ($get_baptizing11['n13']=="") {
                                    echo "انسحب بسبب ";
                                    echo $get_baptizing11['n15'];
                                 } echo $get_baptizing11['n13']; ?></th>
                            <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n12']; ?></th>
                               <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n10']; ?></th>
                                <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n9']; ?></th>
                                 <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n5']; ?></th>
                                  <th   style="text-align:center;background-color:#f5f5f0;"><?php echo $get_baptizing11['n2']; ?></th>

                             <th    style="text-align:center;background-color:#f5f5f0;">       <?php echo $r7; ?> </th>


                           
                              
                              
                        </tr>
    <?php endforeach; ?>
                        

  
                        

                      
                         

                    </thead>
                  
                   
                   

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