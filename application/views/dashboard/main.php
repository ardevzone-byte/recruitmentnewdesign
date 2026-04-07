<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php 
$stats = isset($stats) ? $stats : ['my_requests' => 0, 'pending_requisitions' => 0, 'published_jobs' => 0];
$chart_kpi = isset($chart_kpi) ? $chart_kpi : ['total_apps' => 0, 'interviewed' => 0, 'offered' => 0, 'hired' => 0];
$total = (int)($chart_kpi['total_apps'] ?? 0);
$interviewed = (int)($chart_kpi['interviewed'] ?? 0);
$offered = (int)($chart_kpi['offered'] ?? 0);
$hired = (int)($chart_kpi['hired'] ?? 0);
$completed = $hired;
$rejected = max(0, $total - $interviewed - $offered - $hired);
?>

        <div class="rows col-12">
        <div class="block col-12 col-sm-6 col-md-3">
          <div class="box fast">
            <i><img src="<?= base_url('newassets/images/icon1.svg') ?>" alt=""></i>
            <h5>طلباتي الوظيفية</h5>
            <h3><?= (int)($stats['my_requests'] ?? 0) ?> <span>طلب</span></h3>
          </div>
        </div>
        <div class="block col-12 col-sm-6 col-md-3">
          <div class="box fast">
            <i><img src="<?= base_url('newassets/images/icon2.svg') ?>" alt=""></i>
            <h5>بانتظار الموافقة</h5>
            <h3><?= (int)($stats['pending_requisitions'] ?? 0) ?> <span>طلب</span></h3>
          </div>
        </div>
        <div class="block col-12 col-sm-6 col-md-3">
          <div class="box fast">
            <i><img src="<?= base_url('newassets/images/icon3.svg') ?>" alt=""></i>
            <h5>الوظائف المنشورة</h5>
            <h3><?= (int)($stats['published_jobs'] ?? 0) ?> <span>وظيفة</span></h3>
          </div>
        </div>
        <div class="block col-12 col-sm-6 col-md-3">
          <div class="box fast">
            <i><img src="<?= base_url('newassets/images/icon4.svg') ?>" alt=""></i>
            <h5>إجمالي المتقدمين</h5>
            <h3><?= $total ?> <span>مرشح</span></h3>
          </div>
        </div>
        </div><!-- rows -->

        <div class="rows col-12">
          <div class="block col-12 col-md-4">
            <div class="box statistics">
              <h3>عمليات التوظيف</h3>
              <div class="chart-container">
                <div class="chart-wrapper">
                  <canvas id="collectionChart"></canvas>
                </div>
                <div class="chart-legend">
                  <div class="legend-item">
                    <div class="legend-color" style="background-color: #FFA722;"></div>
                    <span>تمت مقابلتهم (<?= $interviewed ?>)</span>
                  </div>
                  <div class="legend-item">
                    <div class="legend-color" style="background-color: #F4F4F4;"></div>
                    <span>قيد المراجعة (<?= max(0, $total - $interviewed - $offered - $hired) ?>)</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="block col-12 col-md-4">
            <div class="box statistics">
              <h3>التسهيلات والعروض</h3>
              <div class="charts">
                <canvas id="orderStatusChart"></canvas>
                <h4><?= $total ?> <span>طلب</span></h4>
              </div>
              <div class="chart-legend">
                <div class="legend-item col-12">
                  <div class="legend-color" style="background-color: #FFC989;"></div>
                  <span>عروض وظيفية (<?= $offered ?>)</span>
                </div>
                <div class="legend-item">
                  <div class="legend-color" style="background-color: #F29220;"></div>
                  <span>مقابلات (<?= $interviewed ?>)</span>
                </div>
                <div class="legend-item">
                  <div class="legend-color" style="background-color: #5C5E8A;"></div>
                  <span>تم التوظيف (<?= $hired ?>)</span>
                </div>
              </div>
            </div>
          </div>
          <div class="block col-12 col-md-4">
            <div class="box statistics">
              <h3>حالة الطلبات</h3>
              <div class="charts">
                <canvas id="orderStatusChart3"></canvas>
                <h4><?= $total ?> <span>طلب</span></h4>
              </div>
              <div class="chart-legend">
                <div class="legend-item col-12">
                  <div class="legend-color" style="background-color: #FFC989;"></div>
                  <span>جميع الطلبات (<?= $total ?>)</span>
                </div>
                <div class="legend-item">
                  <div class="legend-color" style="background-color: #F29220;"></div>
                  <span>تم الإنجاز (<?= $completed ?>)</span>
                </div>
                <div class="legend-item">
                  <div class="legend-color" style="background-color: #5C5E8A;"></div>
                  <span>قيد المعالجة (<?= max(0, $total - $completed) ?>)</span>
                </div>
              </div>
            </div>
          </div>
        </div><!-- rows -->

        <div class="rows col-12">
          <div class="block col-12">
            <div class="box col-12">
              <h3 class="center">الوصول السريع</h3>
              <div class="fast-link col-12">
                <a href="<?= site_url('requisitions/my_requests') ?>">طلبات التوظيف</a>
                <a href="<?= site_url('requisitions/create') ?>">طلب جديد</a>
                <a href="<?= site_url('jobs') ?>">الوظائف</a>
                <a href="<?= site_url('candidates') ?>">المرشحون</a>
                <a href="<?= site_url('reports') ?>">التقارير</a>
                <a href="<?= site_url('job_description') ?>">الوصف الوظيفي</a>
                <a href="<?= site_url('offers') ?>">العروض</a>
              </div>
            </div>
          </div>
        </div><!-- rows -->
