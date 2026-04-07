<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم | التوظيف - مرسوم</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;600;700&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root{
            /* Marsom Identity (هادية/احترافية) */
            --mr-blue: #0b2a4a;
            --mr-blue-2:#0d6efd;
            --mr-orange:#ff8c00;

            /* نصف-نص (Neutral Pro) */
            --bg-1:#eef2f7;
            --bg-2:#dde6f3;
            --bg-3:#f6f7fb;

            --card:#ffffff;
            --glass: rgba(255,255,255,0.78);
            --border: rgba(17,24,39,0.08);

            --text:#111827;
            --muted:#6b7280;

            --shadow-sm: 0 6px 18px rgba(15, 23, 42, 0.08);
            --shadow-lg: 0 18px 45px rgba(15, 23, 42, 0.12);

            --grad-brand: linear-gradient(135deg, rgba(13,110,253,.12), rgba(255,140,0,.10));
            --grad-orange: linear-gradient(135deg, #ff8c00, #ffb14a);
            --grad-blue: linear-gradient(135deg, #0d6efd, #66a6ff);
        }

        *{ box-sizing:border-box; }

        body{
            font-family:'Tajawal',sans-serif;
            color: var(--text);
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;

            /* ✅ خلفية احترافية "نص نص" بدون أي حركة */
            background:
                radial-gradient(circle at 15% 20%, rgba(13,110,253,0.10), transparent 35%),
                radial-gradient(circle at 85% 15%, rgba(255,140,0,0.10), transparent 38%),
                radial-gradient(circle at 80% 85%, rgba(13,110,253,0.08), transparent 40%),
                linear-gradient(135deg, var(--bg-1) 0%, var(--bg-2) 40%, var(--bg-3) 100%);
        }

        /* ✅ Pattern ثابت (Static) خفيف جدًا — بدون أنميشن */
        .bg-static-pattern{
            position: fixed;
            inset: 0;
            z-index: -1;
            pointer-events:none;
            opacity: .55;
            background-image:
                linear-gradient(transparent 0, transparent),
                radial-gradient(circle at 1px 1px, rgba(17,24,39,0.06) 1px, transparent 1px);
            background-size: 100% 100%, 22px 22px;
            background-position: 0 0, 8px 8px;
        }

        /* Container */
        .main-container{
            max-width: 1400px;
            margin: 0 auto;
            padding: 18px;
            position: relative;
        }

        /* Header */
        .header-nav{
            background: var(--glass);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 14px 16px;
            display:flex;
            align-items:center;
            justify-content: space-between;
            gap: 14px;
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow: hidden;
        }
        .header-nav::before{
            content:'';
            position:absolute;
            top:0; left:0; right:0;
            height:3px;
            background: linear-gradient(90deg, var(--mr-orange), var(--mr-blue-2));
        }

        .logo-section{
            display:flex;
            align-items:center;
            gap: 12px;
            min-width: 260px;
        }
        .logo-section img{
            height: 44px;
            width:auto;
            filter: drop-shadow(0 2px 10px rgba(0,0,0,.10));
        }

        .user-info{
            display:flex;
            align-items:center;
            gap: 12px;
            padding: 10px 12px;
            border-radius: 16px;
            border: 1px solid var(--border);
            background: var(--grad-brand);
        }

        .user-avatar{
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display:flex;
            align-items:center;
            justify-content:center;
            background: var(--grad-orange);
            color:#fff;
            box-shadow: 0 10px 20px rgba(255,140,0,.18);
        }
        .user-details strong{
            display:block;
            font-weight: 900;
            font-size: 14px;
            margin-bottom: 2px;
            color: var(--text);
        }
        .user-details .user-id{
            display:inline-block;
            padding: 2px 10px;
            border-radius: 999px;
            font-size: 12px;
            background: rgba(255,255,255,0.65);
            border: 1px solid rgba(0,0,0,0.06);
            color: var(--mr-blue);
            font-weight: 800;
        }

        .nav-actions{
            display:flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        .nav-btn{
            background: rgba(255,255,255,0.70);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 10px 14px;
            border-radius: 14px;
            text-decoration:none;
            display:flex;
            align-items:center;
            gap: 8px;
            font-weight: 900;
            font-size: 13px;
            transition: all .2s ease;
        }
        .nav-btn:hover{
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
            border-color: rgba(255,140,0,.35);
            background: rgba(255,255,255,0.92);
        }

        /* Welcome */
        .welcome-card{
            margin-top: 16px;
            background: rgba(255,255,255,0.82);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 22px 18px;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
            text-align:center;
        }
        .welcome-card::after{
            content:'';
            position:absolute;
            inset:-80px;
            background:
                radial-gradient(circle at 25% 35%, rgba(13,110,253,0.12), transparent 42%),
                radial-gradient(circle at 75% 65%, rgba(255,140,0,0.12), transparent 44%);
        }
        .welcome-card h1{
            position: relative;
            font-family:'El Messiri',serif;
            font-weight: 900;
            font-size: 2.0rem;
            color: var(--mr-blue);
            margin: 0 0 8px 0;
        }
        .welcome-card p{
            position: relative;
            margin:0;
            color: var(--muted);
            font-size: 1.05rem;
            font-weight: 700;
        }

        /* Search */
        .search-container{
            position: relative;
            max-width: 820px;
            margin: 16px auto 0 auto;
        }
        .search-input{
            width:100%;
            padding: 14px 18px 14px 52px;
            border-radius: 18px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,0.82);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            color: var(--text);
            font-size: 15px;
            box-shadow: var(--shadow-sm);
            transition: all .2s ease;
            font-weight: 700;
        }
        .search-input:focus{
            outline:none;
            border-color: rgba(13,110,253,.35);
            box-shadow: 0 0 0 4px rgba(13,110,253,.10), var(--shadow-sm);
            background: rgba(255,255,255,0.92);
        }
        .search-input::placeholder{ color:#94a3b8; font-weight: 700; }
        .search-icon{
            position:absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--mr-orange);
            font-size: 17px;
        }

        /* Stats */
        .stats-grid{
            display:grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 14px;
            margin-top: 16px;
        }
        .stat-card{
            background: rgba(255,255,255,0.82);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 16px;
            box-shadow: var(--shadow-sm);
            display:flex;
            align-items:center;
            gap: 12px;
            position: relative;
            overflow:hidden;
            transition: all .2s ease;
        }
        .stat-card::before{
            content:'';
            position:absolute;
            top:0; left:0; right:0;
            height:3px;
            background: linear-gradient(90deg, var(--mr-orange), var(--mr-blue-2));
            opacity:.95;
        }
        .stat-card:hover{
            transform: translateY(-3px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(255,140,0,.22);
        }
        .stat-ico{
            width: 54px;
            height: 54px;
            border-radius: 18px;
            display:flex;
            align-items:center;
            justify-content:center;
            color:#fff;
            font-size: 1.25rem;
            background: var(--grad-blue);
            box-shadow: 0 12px 22px rgba(13,110,253,.15);
            flex-shrink:0;
        }
        .stat-ico.orange{ background: var(--grad-orange); box-shadow: 0 12px 22px rgba(255,140,0,.14); }
        .stat-ico.warn{ background: linear-gradient(135deg,#f59e0b,#fbbf24); }
        .stat-ico.success{ background: linear-gradient(135deg,#10b981,#34d399); }
        .stat-ico.info{ background: linear-gradient(135deg,#0ea5e9,#38bdf8); }

        .stat-meta .num{
            font-size: 1.75rem;
            font-weight: 1000;
            margin:0;
            line-height: 1;
            color: var(--mr-blue);
        }
        .stat-meta .lbl{
            display:block;
            margin-top: 6px;
            color: var(--muted);
            font-weight: 800;
            font-size: .95rem;
        }

        /* Section */
        .section-group{
            margin-top: 16px;
            background: rgba(255,255,255,0.82);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 18px;
            box-shadow: var(--shadow-lg);
            position: relative;
            overflow: hidden;
        }
        .section-group::before{
            content:'';
            position:absolute;
            top:0; left:0; right:0;
            height:3px;
            background: linear-gradient(90deg, var(--mr-blue-2), var(--mr-orange));
        }

        .section-header{
            display:flex;
            align-items:center;
            justify-content: space-between;
            gap: 14px;
            padding-bottom: 14px;
            margin-bottom: 14px;
            border-bottom: 1px solid rgba(17,24,39,0.06);
        }
        .section-title{
            margin:0;
            display:flex;
            align-items:center;
            gap: 10px;
            font-family:'El Messiri',serif;
            font-weight: 1000;
            font-size: 1.35rem;
            color: var(--text);
        }
        .sec-ico{
            width: 42px;
            height: 42px;
            border-radius: 16px;
            display:flex;
            align-items:center;
            justify-content:center;
            background: var(--grad-orange);
            color:#fff;
            box-shadow: 0 12px 22px rgba(255,140,0,.14);
        }
        .section-sub{
            margin:0;
            color: var(--muted);
            font-weight: 800;
        }

        /* Actions grid */
        .action-grid{
            display:grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 14px;
        }
        .action-card{
            background: rgba(255,255,255,0.86);
            border: 1px solid rgba(17,24,39,0.08);
            border-radius: 18px;
            padding: 16px;
            text-decoration:none;
            color: var(--text);
            box-shadow: var(--shadow-sm);
            position: relative;
            overflow:hidden;
            transition: all .22s cubic-bezier(.4,0,.2,1);
            min-height: 150px;
        }
        .action-card::after{
            content:'';
            position:absolute;
            bottom:0; left:0; right:0;
            height:3px;
            background: linear-gradient(90deg, var(--mr-orange), var(--mr-blue-2));
            transform: scaleX(0);
            transform-origin: right;
            transition: transform .28s ease;
        }
        .action-card:hover::after{ transform: scaleX(1); transform-origin:left; }
        .action-card:hover{
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
            border-color: rgba(13,110,253,.22);
            background: rgba(255,255,255,0.95);
        }

        .action-icon{
            width: 54px;
            height: 54px;
            border-radius: 18px;
            display:flex;
            align-items:center;
            justify-content:center;
            background: rgba(13,110,253,0.10);
            color: var(--mr-blue-2);
            font-size: 1.35rem;
            margin-bottom: 12px;
            transition: all .22s ease;
        }
        .action-card:hover .action-icon{
            background: var(--grad-orange);
            color:#fff;
            transform: translateY(-2px) scale(1.05);
        }

        .action-title{
            margin:0 0 6px 0;
            font-family:'El Messiri',serif;
            font-weight: 1000;
            font-size: 1.08rem;
            color: var(--text);
        }
        .action-desc{
            margin:0;
            color: var(--muted);
            font-weight: 800;
            font-size: .88rem;
            line-height: 1.5;
        }
        .action-badge{
            position:absolute;
            top: 12px;
            left: 12px;
            background: var(--grad-orange);
            color:#fff;
            font-size:.70rem;
            padding: 3px 10px;
            border-radius: 999px;
            font-weight: 1000;
            box-shadow: 0 12px 22px rgba(255,140,0,.14);
        }
        .action-stat{
            position:absolute;
            top: 12px;
            right: 12px;
            background: rgba(255,255,255,0.72);
            border: 1px solid rgba(17,24,39,0.08);
            color: var(--mr-blue);
            font-size:.70rem;
            padding: 3px 10px;
            border-radius: 999px;
            font-weight: 1000;
        }

        .no-results{
            text-align:center;
            padding: 22px 10px;
        }
        .no-results i{
            font-size: 2.8rem;
            opacity: .25;
            margin-bottom: 10px;
        }

        /* Enhanced search styles */
        .input-group .search-input {
            border-left: none !important;
            border-top-right-radius: 18px !important;
            border-bottom-right-radius: 18px !important;
        }

        .input-group-text {
            border-top-left-radius: 18px !important;
            border-bottom-left-radius: 18px !important;
            border-right: none !important;
            background: rgba(255,255,255,0.82) !important;
            border-color: var(--border) !important;
        }

        #candidateSearchBtn {
            border-top-right-radius: 14px !important;
            border-bottom-right-radius: 14px !important;
            border-top-left-radius: 0 !important;
            border-bottom-left-radius: 0 !important;
            font-weight: 700;
            background: rgba(13,110,253,0.10) !important;
            border-color: var(--border) !important;
            color: var(--mr-blue-2) !important;
            padding-left: 20px !important;
            padding-right: 20px !important;
        }

        #candidateSearchBtn:hover {
            background: var(--grad-blue) !important;
            color: white !important;
            border-color: var(--mr-blue-2) !important;
        }

        /* Modal styling */
        .modal-content {
            border-radius: 20px;
            border: 1px solid var(--border);
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(20px);
        }

        .modal-header {
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            background: var(--grad-blue);
            color: white;
        }

        /* Table styling */
        #candidateResultsTable th {
            font-weight: 700;
            font-size: 0.9rem;
            border-bottom: 2px solid var(--border);
            background: var(--bg-3);
        }

        #candidateResultsTable td {
            vertical-align: middle;
            font-weight: 700;
        }

        .btn-group-sm .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
            margin: 0 2px;
        }

        .badge {
            font-weight: 700 !important;
            padding: 0.35em 0.65em !important;
        }

        /* Responsive */
        @media (max-width: 1200px){
            .stats-grid{ grid-template-columns: repeat(2, minmax(0,1fr)); }
        }
        @media (max-width: 768px){
            .header-nav{ flex-direction: column; }
            .logo-section{ width: 100%; justify-content: center; }
            .nav-actions{ width: 100%; justify-content: center; }
            .stats-grid{ grid-template-columns: 1fr; }
            .action-grid{ grid-template-columns: repeat(2, minmax(0,1fr)); }
            #candidateSearchBtn span { display: none; }
            #candidateSearchBtn i { margin: 0 !important; }
            #candidateSearchBtn { padding-left: 15px !important; padding-right: 15px !important; }
        }
        @media (max-width: 480px){
            .action-grid{ grid-template-columns: 1fr; }
        }
    </style>
</head>

<body>
    <div class="bg-static-pattern"></div>

    <div class="main-container">

        <nav class="header-nav" data-aos="fade-down" data-aos-duration="700">
            <div class="logo-section">
                <img src="<?php echo base_url(); ?>assets/imeges/m2.PNG" alt="Marsom Logo">
                <div class="user-info">
                    <div class="user-avatar"><i class="fas fa-user"></i></div>
                    <div class="user-details">
                        <strong>لوحة التوظيف</strong>
                        <span class="user-id"><?= html_escape($this->session->userdata('name')); ?></span>
                    </div>
                </div>
            </div>

            <div class="nav-actions">
                <a href="javascript:history.back()" class="nav-btn">
                    <i class="fas fa-arrow-right"></i><span>رجوع</span>
                </a>
                <a href="<?= site_url('users1/main_emp'); ?>" class="nav-btn">
                    <i class="fas fa-home"></i><span>الرئيسية</span>
                </a>
            </div>
        </nav>

        <div class="welcome-card" data-aos="fade-up" data-aos-duration="800">
            <h1>أهلاً بعودتك، <?= html_escape($this->session->userdata('name')); ?> 👋</h1>
            <p>هذه هي لوحة التحكم الخاصة بك. ابدأ من هنا بسرعة وبكل وضوح.</p>
        </div>

        <!-- Enhanced Search Box -->
        <div class="search-container" data-aos="fade-up" data-aos-delay="150">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-search"></i>
                </span>
                <input id="searchInput" type="text" class="search-input" placeholder="ابحث عن مرشح بالاسم، الجوال، البريد الإلكتروني...">
                <button class="btn" type="button" id="candidateSearchBtn">
                    <i class="fas fa-user-tie me-1"></i><span>بحث في المرشحين</span>
                </button>
            </div>
        </div>

        <div class="stats-grid" data-aos="fade-up" data-aos-delay="220">
            <div class="stat-card stat-item" data-title="متقدم جديد applicants">
                <div class="stat-ico orange"><i class="fas fa-user-plus"></i></div>
                <div class="stat-meta">
                    <p class="num"><?= (int)($stats['new_applicants'] ?? 0); ?></p>
                    <span class="lbl">متقدم جديد</span>
                </div>
            </div>

            <div class="stat-card stat-item" data-title="طلبات بانتظار اعتمادك pending requisitions approvals">
                <div class="stat-ico warn"><i class="fas fa-hourglass-half"></i></div>
                <div class="stat-meta">
                    <p class="num"><?= (int)($stats['pending_requisitions'] ?? 0); ?></p>
                    <span class="lbl">طلبات بانتظار اعتمادك</span>
                </div>
            </div>

            <div class="stat-card stat-item" data-title="وظيفة منشورة jobs published">
                <div class="stat-ico success"><i class="fas fa-bullhorn"></i></div>
                <div class="stat-meta">
                    <p class="num"><?= (int)($stats['published_jobs'] ?? 0); ?></p>
                    <span class="lbl">وظيفة منشورة حالياً</span>
                </div>
            </div>

            <div class="stat-card stat-item" data-title="طلباتي requests my">
                <div class="stat-ico info"><i class="fas fa-list-alt"></i></div>
                <div class="stat-meta">
                    <p class="num"><?= (int)($stats['my_requests'] ?? 0); ?></p>
                    <span class="lbl">طلباتي</span>
                </div>
            </div>
        </div>

        <div class="section-group" data-aos="fade-up" data-aos-delay="300">
            <div class="section-header">
                <div>
                    <h3 class="section-title">
                        <span class="sec-ico"><i class="fas fa-bolt"></i></span>
                        لوحة التحكم السريعة
                    </h3>
                    <p class="section-sub">اختصارات لأهم المهام في نظام التوظيف</p>
                </div>
                <span class="action-stat d-none d-md-inline">
                    <i class="fas fa-shield-halved me-1"></i> صلاحيات حسب الدور
                </span>
            </div>

            <div class="action-grid" id="actionsGrid">

                <a href="<?= base_url('requisitions/my_requests') ?>" class="action-card action-item"
                   data-title="طلباتي الوظيفية عرض متابعة طلباتك">
                    <div class="action-icon"><i class="fas fa-list"></i></div>
                    <h4 class="action-title">طلباتي الوظيفية</h4>
                    <p class="action-desc">عرض ومتابعة طلباتك</p>
                    <span class="action-badge">أساسي</span>
                </a>

                <a href="<?= base_url('jobs') ?>" class="action-card action-item"
                   data-title="إدارة الوظائف نشر متابعة وظائف">
                    <div class="action-icon"><i class="fas fa-briefcase"></i></div>
                    <h4 class="action-title">إدارة الوظائف</h4>
                    <p class="action-desc">نشر ومتابعة الوظائف</p>
                </a>
                
                <?php 
                    // Get pending count dynamically
                    $ci =& get_instance();
                    $ci->load->model('evaluation_model');
                    // Assuming username is the ID used for assignments
                    $my_tasks = $ci->evaluation_model->get_pending_evaluations($this->session->userdata('username'));
                    $task_count = count($my_tasks);
                ?>

                <?php if($this->session->userdata('role') != 'candidate'): ?>
                <a href="<?= base_url('candidates/my_pending_evaluations') ?>" class="action-card action-item"
                   data-title="تقييماتي evaluations evaluation my tasks">
                    <div class="action-icon">
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <h4 class="action-title">التقييمات المطلوبة</h4>
                    <p class="action-desc">تقييم المرشحين المحولين إليك</p>
                    
                    <?php if($task_count > 0): ?>
                        <span class="action-badge" style="background: #dc3545; box-shadow: 0 4px 10px rgba(220,53,69,0.3);">
                            <?= $task_count ?> بانتظار التقييم
                        </span>
                    <?php else: ?>
                        <span class="action-stat">لا يوجد مهام</span>
                    <?php endif; ?>
                </a>
                <?php endif; ?>
                
                <a href="<?= base_url('requisitions/create') ?>" class="action-card action-item"
                   data-title="طلب احتياج وظيفي مدراء الأقسام إنشاء">
                    <div class="action-icon"><i class="fas fa-file-alt"></i></div>
                    <h4 class="action-title">طلب احتياج وظيفي</h4>
                    <p class="action-desc">لـ مدراء الأقسام</p>
                    <span class="action-stat">📝</span>
                </a>
                
                <?php 
                    $current_user = $this->session->userdata('username');
                    if (in_array($current_user, ['1526', '1291','2200','2439']) || $this->session->userdata('role') == 'recruitment_manager'): 
                ?>
                <a href="<?= base_url('candidates/add_manual') ?>" class="action-card action-item"
                   data-title="إضافة مرشح يدوياً manual candidate add">
                    <div class="action-icon"><i class="fas fa-user-plus"></i></div>
                    <h4 class="action-title">إضافة مرشح يدوياً</h4>
                    <p class="action-desc">إضافة فورية لمرشح أو وظيفة جديدة</p>
                    <span class="action-badge">سريع</span>
                </a>
                <?php endif; ?>

                <?php if($this->session->userdata('role') == 'recruitment_manager' || $this->session->userdata('role') == 'ceo'): ?>
                    <a href="<?= base_url('requisitions/approvals') ?>" class="action-card action-item"
                       data-title="مراجعة الطلبات اعتماد طلبات التوظيف approvals">
                        <div class="action-icon"><i class="fas fa-tasks"></i></div>
                        <h4 class="action-title">مراجعة الطلبات</h4>
                        <p class="action-desc">اعتماد طلبات التوظيف</p>
                        <span class="action-badge">اعتماد</span>
                        <span class="action-stat"><?= (int)($stats['pending_requisitions'] ?? 0); ?> قيد الانتظار</span>
                    </a>
                <?php endif; ?>

                <?php
                    $current_user = (int)$this->session->userdata('user_id');
                    if($current_user === 1291 || $current_user === 2230 || $current_user === 1526|| $current_user === 2200|| $current_user === 2439):
                ?>
                    <a href="<?= base_url('offers/dashboard') ?>" class="action-card action-item"
                       data-title="اعتماد العروض مراجعة العروض الوظيفية offers">
                        <div class="action-icon"><i class="fas fa-file-signature"></i></div>
                        <h4 class="action-title">اعتماد العروض</h4>
                        <p class="action-desc">مراجعة العروض الوظيفية</p>
                        <span class="action-badge">خاص</span>
                    </a>
                <?php endif; ?>
                
                <a href="<?= base_url('onboarding/my_tasks') ?>" class="action-card action-item"
                   data-title="مهام التهيئة onboarding tasks employee">
                    <div class="action-icon">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <h4 class="action-title">مهام التهيئة (Onboarding)</h4>
                    <p class="action-desc">إنجاز مهام الموظفين الجدد</p>
                    
                    <?php 
                        // Optional: Show count of pending tasks if available
                        $ci =& get_instance();
                        $ci->load->model('onboarding_model');
                        $my_onboarding = $ci->onboarding_model->get_my_pending_tasks($this->session->userdata('username'));
                        $onboarding_count = count($my_onboarding);
                    ?>
                    
                    <?php if($onboarding_count > 0): ?>
                        <span class="action-badge" style="background: #ff8c00;">
                            <?= $onboarding_count ?> مهام جديدة
                        </span>
                    <?php else: ?>
                        <span class="action-stat">
                            <i class="fas fa-check-circle text-success"></i> لا يوجد مهام
                        </span>
                    <?php endif; ?>
                </a>
                
                <?php 
                    $report_users = ['1291', '1526', '2200', '2439', 'admin'];
                    if (in_array($this->session->userdata('username'), $report_users) || 
                        in_array($this->session->userdata('role'), ['recruitment_manager', 'ceo'])): 
                ?>
                    <a href="<?= base_url('reports') ?>" class="action-card action-item"
                       data-title="التقارير التحليلية reports analytics dashboard">
                        <div class="action-icon"><i class="fas fa-chart-pie"></i></div>
                        <h4 class="action-title">لوحة التقارير</h4>
                        <p class="action-desc">إحصائيات الأداء والتوظيف</p>
                        <span class="action-badge">جديد</span>
                    </a>
                <?php endif; ?>
                
            </div>

            <div id="noResults" class="no-results d-none">
                <i class="fas fa-search"></i>
                <h4 class="mb-2">لم يتم العثور على نتائج</h4>
                <p class="mb-0" style="color: var(--muted); font-weight:800;">جرّب كلمات أخرى أو امسح البحث لعرض الكل</p>
            </div>
        </div>

    </div>

    <!-- Candidate Search Results Modal -->
    <div class="modal fade" id="candidateSearchModal" tabindex="-1" aria-labelledby="candidateSearchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="candidateSearchModalLabel">
                        <i class="fas fa-search me-2"></i>نتائج بحث المرشحين
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover" id="candidateResultsTable">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الجوال</th>
                                    <th>البريد الإلكتروني</th>
                                    <th>الجنسية</th>
                                    <th>الحالة</th>
                                    <th>آخر تحديث</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody id="candidateResultsBody">
                                <!-- Results will be loaded here -->
                            </tbody>
                        </table>
                    </div>
                    <div id="noCandidatesFound" class="text-center py-5 d-none">
                        <i class="fas fa-user-slash fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">لا توجد نتائج مطابقة</h5>
                        <p class="text-muted">حاول استخدام كلمات بحث مختلفة</p>
                    </div>
                    <div id="candidateSearchLoading" class="text-center py-5 d-none">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">جاري البحث...</span>
                        </div>
                        <p class="mt-2 text-muted">جاري البحث في قاعدة البيانات...</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    <a href="<?= base_url('candidates/archive') ?>" class="btn btn-outline-primary">
                        <i class="fas fa-archive me-1"></i> عرض جميع المرشحين
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    AOS.init({ duration: 700, once: true, offset: 40, easing: 'ease-out-cubic' });

    // Search filter for action cards
    function applySearch(term){
        term = (term || '').trim().toLowerCase();

        const statItems = document.querySelectorAll('.stat-item');
        const actionItems = document.querySelectorAll('.action-item');

        // Stats
        statItems.forEach(el => {
            const text = (el.getAttribute('data-title') || '').toLowerCase();
            el.style.display = (!term || text.includes(term)) ? '' : 'none';
        });

        // Actions
        let foundActions = false;
        actionItems.forEach(el => {
            const text = (el.getAttribute('data-title') || '').toLowerCase();
            const show = (!term || text.includes(term));
            el.style.display = show ? '' : 'none';
            if(show) foundActions = true;
        });

        const noResults = document.getElementById('noResults');
        if(term && !foundActions){
            noResults.classList.remove('d-none');
        }else{
            noResults.classList.add('d-none');
        }
    }

    $(document).ready(function(){
        // Keep existing search for action cards
        $('#searchInput').on('input', function(){
            applySearch($(this).val());
        });

        // Initialize the candidate search button
        $('#candidateSearchBtn').on('click', function() {
            var searchTerm = $('#searchInput').val().trim();
            
            if (searchTerm.length < 2) {
                alert('يرجى إدخال كلمة بحث مكونة من حرفين على الأقل');
                return;
            }
            
            // Show modal
            var modal = new bootstrap.Modal(document.getElementById('candidateSearchModal'));
            modal.show();
            
            // Perform search
            performCandidateSearch(searchTerm);
        });
        
        // Allow Enter key to trigger candidate search
        $('#searchInput').on('keypress', function(e) {
            if (e.which === 13) { // Enter key
                e.preventDefault();
                $('#candidateSearchBtn').click();
            }
        });
        
        // Function to perform AJAX search
        function performCandidateSearch(searchTerm) {
            // Show loading
            $('#candidateResultsBody').html('');
            $('#noCandidatesFound').addClass('d-none');
            $('#candidateSearchLoading').removeClass('d-none');
            
            // Add CSRF token if you have it
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var csrf_name = $('input[name="csrf_test_name"]').val();
            
            var postData = {
                search_term: searchTerm
            };
            
            // Add CSRF token if exists
            if (csrf_name) {
                postData[csrf_name] = csrf_token || '';
            }
            
            $.ajax({
                url: '<?= base_url("dashboard/search_candidates_ajax") ?>',
                type: 'POST',
                data: postData,
                dataType: 'json',
                success: function(response) {
                    $('#candidateSearchLoading').addClass('d-none');
                    
                    if (response.success) {
                        if (response.html && response.count > 0) {
                            $('#candidateResultsBody').html(response.html);
                            $('#noCandidatesFound').addClass('d-none');
                            
                            // Update modal title with count
                            $('#candidateSearchModalLabel').html(
                                '<i class="fas fa-search me-2"></i>نتائج بحث المرشحين (' + response.count + ')'
                            );
                        } else {
                            $('#candidateResultsBody').html('');
                            $('#noCandidatesFound').removeClass('d-none');
                            $('#candidateSearchModalLabel').html(
                                '<i class="fas fa-search me-2"></i>نتائج بحث المرشحين (0)'
                            );
                        }
                    } else {
                        alert(response.message || 'حدث خطأ أثناء البحث');
                        $('#candidateSearchLoading').addClass('d-none');
                    }
                },
                error: function(xhr, status, error) {
                    $('#candidateSearchLoading').addClass('d-none');
                    
                    // Detailed error information
                    var errorMsg = 'حدث خطأ في الاتصال بالخادم.\n';
                    errorMsg += 'حالة الخطأ: ' + status + '\n';
                    errorMsg += 'نوع الخطأ: ' + error + '\n';
                    
                    if (xhr.responseText) {
                        errorMsg += 'تفاصيل: ' + xhr.responseText.substring(0, 200);
                    }
                    
                    console.error('AJAX Error:', xhr);
                    alert(errorMsg);
                }
            });
        }
        
        // Clear results when modal is closed
        $('#candidateSearchModal').on('hidden.bs.modal', function() {
            $('#candidateResultsBody').html('');
            $('#noCandidatesFound').addClass('d-none');
            $('#candidateSearchLoading').addClass('d-none');
            // Reset modal title
            $('#candidateSearchModalLabel').html('<i class="fas fa-search me-2"></i>نتائج بحث المرشحين');
        });
    });
</script>
</body>
</html>