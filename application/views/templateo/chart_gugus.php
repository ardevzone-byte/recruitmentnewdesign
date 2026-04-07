
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">

                    <div class="col-lg-5 col-md-8 col-sm-12">                        
                        <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;"><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>الطلبات</h2>
                       <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/chart_gugus"><i class="icon-home"></i></a></li>     
                           <?php $id=$this->session->userdata('type');
                               if ($id == 3):?>         
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/users_index"><i class="icon-users"></i></a></li>

                             <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/user_report"><i class="icon-notebook"></i></a></li>
                         <?php endif?>

                          <?php $id=$this->session->userdata('type');
                               if ($id == 1):?> 


                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/sadad_report"><i class="icon-notebook"></i></a></li>


                             <li class="breadcrumb-item"><a href="<?php echo base_url();?>users/sadad_report_dynamic"><i class="icon-notebook"></i></a></li>

                            


                              <li class="breadcrumb-item active"><a href="<?php echo base_url();?>users/insert_sadad"><i class="fa fa-plus"></i></a></li>
                               <?php endif?>
                            
                        </ul>
                    </div>            
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <?php $id=$this->session->userdata('type');
                               if ($id == 3):?> 
                        <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                            <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#00c5dc"
                                data-fill-Color="transparent">3,5,1,6,5,4,8,3</div>
                            <span>Rajhi</span>
                        </div>
                        <div class="inlineblock text-center m-r-15 m-l-15 hidden-sm">
                            <div class="sparkline text-left" data-type="line" data-width="8em" data-height="20px" data-line-Width="1" data-line-Color="#f4516c"
                                data-fill-Color="transparent">4,6,3,2,5,6,5,4</div>
                            <span>Al Ahli</span>
                        </div>
                        <?php endif?>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="header">
                             
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;">اليوم</h2>
                        </div>
                        <div class="body text-center">
                            <h2 id="default-textfield" class="preview-textfield"></h2>
                            <canvas id="gauge-default"></canvas>
                            <h2><?php echo $customers['tragit_day']; ?></h2>
                            
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;">   الشهر الحالي</h2>
                        </div>
                        <div class="body text-center">
                            <h2 id="donut-textfield" class="preview-textfield"></h2>
                            <canvas id="gauge-donut"></canvas>
                            <h2><?php echo $customers['tragit_month']; ?></h2>
                        </div>
                    </div>
                </div>
                
                <!-- <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2>All   Years</h2>
                        </div>
                        <div class="body text-center">
                            <h2 id="zone-textfield" class="preview-textfield"></h2>
                            <canvas id="gauge-zone" height="200"></canvas>
                        </div>
                    </div>
                </div> -->
                
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="header">
                           <h2 style="font-family: 'Tajawal', sans-serif; font-weight: bold;
    font-style: normal; font-size:30px;">السنة الحالية</h2>
                        </div>
                        <div class="body text-center">
                            <h2 id="step-textfield" class="preview-textfield"></h2>
                            <canvas id="gauge-step" height="200"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
<script src="<?php echo base_url();?>/assets/vendor/gauge/gauge.min.js"></script>
<!-- <script src="<?php echo base_url();?>assets/js/pages/chart/gauge.js"></script> -->
    <script type="text/javascript">
        
        // Guage Default
defaultGauge = new Gauge(document.getElementById("gauge-default"));
defaultGauge.setTextField(document.getElementById("default-textfield"));
defaultGauge.maxValue =  <?php echo $customers['tragit_day']; ?>;
defaultGauge.set( <?php echo $customer_numbers ; ?>);

// Gauge Donut
donutGauge = new Donut(document.getElementById("gauge-donut"));
donutGauge.setTextField(document.getElementById("donut-textfield"));
donutGauge.maxValue =  <?php echo $customers['tragit_month']; ?>;
donutGauge.set(<?php echo $cuntt4_month ; ?>);

// // Zones
// zoneGauge = new Gauge(document.getElementById("gauge-zone"));
// var opts = {
//     angle: -0.25,
//     lineWidth: 0.2,
//     radiusScale:0.9,
//     pointer: {
//         length: 0.6,
//         strokeWidth: 0.03,
//         color: '#000000'
//     },
//     staticLabels: {
//         font: "10px sans-serif",
//         labels: [200, 500, 2100, 2800],
//         fractionDigits: 0
//     },
//     staticZones: [
//         {strokeStyle: "#F03E3E", min: 0, max: 200},
//         {strokeStyle: "#FFDD00", min: 200, max: 500},
//         {strokeStyle: "#30B32D", min: 500, max: 2100},
//         {strokeStyle: "#FFDD00", min: 2100, max: 2800},
//         {strokeStyle: "#F03E3E", min: 2800, max: 3000}
//     ],
//     limitMax: false,
//     limitMin: false,
//     highDpiSupport: true
// }
// zoneGauge.setOptions(opts);
// zoneGauge.setTextField(document.getElementById("zone-textfield"));
// zoneGauge.minValue = 0;
// zoneGauge.maxValue = 3000;
// zoneGauge.set(1444);

// // 
stepGauge = new Gauge(document.getElementById("gauge-step"));
var bigFont = "14px sans-serif";
var opts = {
    angle: 0.1,
    radiusScale:0.8,
    lineWidth: 0.2,
    pointer: {
        length: 0.6,
        strokeWidth: 0.03,
        color: '#000000'
    },
    staticLabels: {
        font: "10px sans-serif",
        labels: [{label:2000, font: bigFont}, 
        {label:1000000}, 
        {label:5000000}, 
        {label:10000000}, 
        {label:20000000}, 
        {label:35000000, font: bigFont}],
        fractionDigits: 0
    },
    staticZones: [
        {strokeStyle: "rgb(255,0,0)", min: 0, max: 5000000, height: 1.2},
        {strokeStyle: "rgb(200,100,0)", min: 5000000, max: 10000000, height: 1.1},
        {strokeStyle: "rgb(150,150,0)", min: 10000000, max: 15000000, height: 1},
        {strokeStyle: "rgb(100,200,0)", min: 15000000, max: 20000000, height: 0.9},
        {strokeStyle: "rgb(0,255,0)", min: 20000000, max: 25000000, height: 0.8},
        {strokeStyle: "rgb(80,255,80)", min: 25000000, max: 30000000, height: 0.7},
        {strokeStyle: "rgb(130,130,130)", min: 30000000, max: 35000000, height: 1}        
    ],
    limitMax: false,
    limitMin: false,
    highDpiSupport: true,
    renderTicks: {
        divisions: 5,
        divWidth: 1.1,
        divLength: 0.7,
        divColor: '#333333',
        subDivisions: 3,
        subLength: 0.5,
        subWidth: 0.6,
        subColor: '#666666'
      }
};
stepGauge.setOptions(opts);
//document.getElementById("preview-textfield").className = "preview-textfield"; 
stepGauge.setTextField(document.getElementById("step-textfield"));
stepGauge.minValue = 0;
stepGauge.maxValue = 30000000;
stepGauge.set(<?php echo $cuntt4_years ; ?>);



    </script>