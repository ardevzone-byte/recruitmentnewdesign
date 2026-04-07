<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="/recruitment2/">
  <title> مرسوم -  لوحة التحكم</title>
  <link rel="icon" href="newassets/images/fav.png" />

  <!-- Bootstrap CSS -->
  <link href="newassets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="newassets/css/owl.carousel.min.css">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@100..900&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="newassets/css/style.css">

  <!-- phone CSS -->
  <link rel="stylesheet" href="newassets/css/phone.css">

</head>
<body>

  <div class="loading">
    <div class="logo-center"><img src="newassets/images/loading.svg" alt=""></div>
  </div>
  
  <section class="home">
    <div class="container">

      <div class="navbar col-12">
        <div class="box">
          <div class="link"><a href="dashbord.html"><img src="newassets/images/logo-dash.svg" alt=""></a></div>
          <div class="link link-menu">
            <ul>
              <li><a href="#"> ادارة المهام </a></li>
              <li><a href="#">  أمر صرف</a></li>
              <li><a href="#">  تقرير السدادات</a></li>
              <li><a href="#">  ادارة المهام </a></li>
              <li><a href="#">  طلبات الإقفال</a></li>
              <li><a href="#"> تقرير افضل اداء</a></li>
            </ul>
          </div>
        </div>
        <div class="box">
          <div class="link box-welcom">
            <div class="welcom">
              <img src="newassets/images/man.png" alt="">
              <span>مرحباً, صالح </span>
            </div>
          </div>
          <a class="links" href="#"><img src="newassets/images/gear.svg" alt=""></a>
          <a class="links" href="#"><img src="newassets/images/not.svg" alt=""></a>
          <a class="links" href="#"><img src="newassets/images/filter.svg" alt=""></a>
        </div>
        
      </div><!-- navbar -->

      <div class="sidebar col-12 col-md-3">
        <ul>
          <li><a class="active" href="dashbord.html"><i><img src="newassets/images/1.svg" alt=""></i> الصفحة الرئيسية</a></li>
          <li><a href="alrajhi-real-estate.html"><i><img src="newassets/images/2.svg" alt=""></i> الراجحي عقار </a></li>
          <li><a href="ceo.html"><i><img src="newassets/images/3.svg" alt=""></i> CEO </a></li>
          <li><a href="portfolio-analysis.html"><i><img src="newassets/images/4.svg" alt=""></i> تحليل المحفظة </a></li>
          <li><a href="user-permissions.html"><i><img src="newassets/images/5.svg" alt=""></i> صلاحية المستخدمين </a></li>
          <li><a href="projects.html"><i><img src="newassets/images/6.svg" alt=""></i> المشاريع </a></li>
          <li><a href="payment-confirmation.html"><i><img src="newassets/images/7.svg" alt=""></i> تأكيد السداد </a></li>
          <li><a href="targets.html"><i><img src="newassets/images/8.svg" alt=""></i> المستهدف </a></li>
          <li><a href="indicators.html"><i><img src="newassets/images/9.svg" alt=""></i> المؤشرات </a></li>
          <li><a href="collectors-portfolios.html"><i><img src="newassets/images/10.svg" alt=""></i> محافظ المحصلين </a></li>
          <li><a href="reports.html"><i><img src="newassets/images/11.svg" alt=""></i> التقارير </a></li>
        </ul>
      </div>


      <div class="content col-12 col-md-9">

        <div class="rows col-12">
        <div class="block col-12 col-sm-6 col-md-3">
          <div class="box fast">
            <i><img src="newassets/images/icon1.svg" alt=""></i>
            <h5>مشرف التحصيل للدراسة</h5>
            <h3>100K <span>+10%</span></h3>
          </div>
        </div>
        <div class="block col-12 col-sm-6 col-md-3">
          <div class="box fast">
            <i><img src="newassets/images/icon2.svg" alt=""></i>
            <h5>تم الانجاز</h5>
            <h3>349K <span>+10%</span></h3>
          </div>
        </div>
        <div class="block col-12 col-sm-6 col-md-3">
          <div class="box fast">
            <i><img src="newassets/images/icon3.svg" alt=""></i>
            <h5>نواقص لدى التحصيل </h5>
            <h3>12.3K <span class="red">-10%</span></h3>
          </div>
        </div>
        <div class="block col-12 col-sm-6 col-md-3">
          <div class="box fast">
            <i><img src="newassets/images/icon4.svg" alt=""></i>
            <h5>تقرير الاقساط ( الراجحي)</h5>
            <h3>349K <span>+10%</span></h3>
          </div>
        </div>
        </div><!-- rows -->

        <div class="rows col-12">

          <div class="block col-12 col-md-4">
            <div class="box statistics">
              <h3>عمليات التحصيل</h3>
              <div class="chart-container">
                  <div class="chart-wrapper">
                     <canvas id="collectionChart"></canvas>
                  </div>

                  <div class="chart-legend">
                    <div class="legend-item">
                      <div class="legend-color" style="background-color: #F4F4F4;"></div>
                      <span>غير مسددين (0)</span>
                    </div>
                    <div class="legend-item">
                      <div class="legend-color" style="background-color: #FFA722;"></div>
                      <span>مسددين (28)</span>
                    </div>
                  </div>

                </div>
            </div>
          </div>

          <div class="block col-12 col-md-4">
            <div class="box statistics">
              <h3> التسهيلات والجدولة</h3>
              <div class="charts">
                <canvas id="orderStatusChart"></canvas>
                <h4>8143 <span>طلب</span></h4>
              </div>

              <div class="chart-legend">
                <div class="legend-item col-12">
                  <div class="legend-color" style="background-color: #FFC989;"></div>
                  <span>تمرير الأقساط (5)</span>
                </div>
                <div class="legend-item">
                  <div class="legend-color" style="background-color: #F29220;"></div>
                  <span>طلبات الجدولة (8)</span>
                </div>
                <div class="legend-item">
                  <div class="legend-color" style="background-color: #5C5E8A;"></div>
                  <span>تعديل المديونية (0)</span>
                </div>
              </div>
            </div>
          </div>

          <div class="block col-12 col-md-4">
            <div class="box statistics">
              <h3> حالة الطلبات</h3>
              <div class="charts">
                <canvas id="orderStatusChart3"></canvas>
                <h4>8143 <span>طلب</span></h4>
              </div>

              <div class="chart-legend">
                <div class="legend-item col-12">
                  <div class="legend-color" style="background-color: #FFC989;"></div>
                  <span>جميع الطلبات (8143)</span>
                </div>
                <div class="legend-item">
                  <div class="legend-color" style="background-color: #F29220;"></div>
                  <span>تم الإنجاز (4879)</span>
                </div>
                <div class="legend-item">
                  <div class="legend-color" style="background-color: #5C5E8A;"></div>
                  <span>مرفوض (2124)</span>
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
                <a href="#">أمر صرف</a>
                <a href="#">طلبات الإقفال</a>
                <a href="#">تقرير السدادات</a>
                <a href="#"> تقرير افضل اداء</a>
                <a href="#"> ادارة المهام </a>
              </div>
            </div>
          </div>
        </div><!-- rows -->

      </div><!-- content -->
      
    </div>
  </section>

  <!-- Libraries (CDN) -->
  <script src="newassets/js/jquery.min.js"></script>
  <script src="newassets/js/bootstrap.bundle.min.js"></script>
  <script src="newassets/js/owl.carousel.min.js"></script>
  <script src="newassets/js/chart.js"></script>
  <!-- Main JS -->
  <script src="newassets/js/main.js"></script>
</body>
</html>