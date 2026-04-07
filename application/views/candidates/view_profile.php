<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?= htmlspecialchars($candidate['full_name']) ?> | ملف المتقدم</title>

    <!-- Bootstrap 5 RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&family=Tajawal:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #ff8c00;
            --success-color: #198754;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
            --info-color: #0dcaf0;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --gray-color: #6c757d;
            --shadow-color: rgba(0, 0, 0, 0.1);
            --gradient-primary: linear-gradient(135deg, #0d6efd 0%, #66a6ff 100%);
            --gradient-success: linear-gradient(135deg, #198754 0%, #20c997 100%);
            --gradient-warning: linear-gradient(135deg, #ff8c00 0%, #ffb347 100%);
            --border-radius-sm: 0.5rem;
            --border-radius-md: 1rem;
            --border-radius-lg: 1.5rem;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        body {
            font-family: 'Tajawal', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            color: var(--dark-color);
            line-height: 1.6;
            padding: 0;
            padding-top: env(safe-area-inset-top);
            padding-bottom: env(safe-area-inset-bottom);
        }
        
        /* Main Container */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem;
        }
        
        /* Profile Header */
        .profile-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: var(--border-radius-lg);
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }
        
        .profile-header::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 120px;
            height: 120px;
            background: var(--gradient-primary);
            border-radius: 0 0 0 120px;
            opacity: 0.1;
        }
        
        /* Back Button */
        .btn-back {
            position: fixed;
            bottom: 2rem;
            left: 2rem;
            background: white;
            color: var(--primary-color);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            transition: var(--transition);
            z-index: 1000;
            text-decoration: none;
        }
        
        .btn-back:hover {
            background: var(--primary-color);
            color: white;
            transform: translateY(-3px) scale(1.1);
        }
        
        /* Sidebar Card */
        .sidebar-card {
            background: white;
            border-radius: var(--border-radius-md);
            border: none;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            transition: var(--transition);
            overflow: hidden;
            position: sticky;
            top: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .sidebar-card:hover {
            box-shadow: 0 15px 35px rgba(13, 110, 253, 0.15);
        }
        
        /* Profile Avatar */
        .profile-avatar {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            border: 4px solid white;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        /* Candidate Name */
        .candidate-name {
            font-family: 'El Messiri', serif;
            font-weight: 700;
            color: var(--dark-color);
            font-size: 1.75rem;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        
        .candidate-job {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 1.1rem;
            text-align: center;
            margin-bottom: 1rem;
        }
        
        /* Status Badge */
        .status-badge {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background: var(--gradient-warning);
            color: white;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.9rem;
            box-shadow: 0 4px 15px rgba(255, 140, 0, 0.3);
        }
        
        /* Personal Info Grid */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin: 1.5rem 0;
        }
        
        .info-item {
            background: rgba(248, 249, 250, 0.8);
            padding: 1rem;
            border-radius: var(--border-radius-sm);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }
        
        .info-label {
            font-size: 0.8rem;
            color: var(--gray-color);
            margin-bottom: 0.25rem;
            display: block;
        }
        
        .info-value {
            font-weight: 600;
            color: var(--dark-color);
            font-size: 1rem;
        }
        
        /* Action Buttons */
        .btn-action {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            text-decoration: none;
            width: 100%;
        }
        
        .btn-action i {
            font-size: 1.1rem;
        }
        
        /* Main Content Card */
        .content-card {
            background: white;
            border-radius: var(--border-radius-md);
            border: none;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 1.5rem;
        }
        
        /* Navigation Tabs */
        .nav-tabs-custom {
            border-bottom: 2px solid #dee2e6;
            padding: 0 1.5rem;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .nav-tabs-custom .nav-link {
            border: none;
            border-radius: 0;
            padding: 1rem 1.5rem;
            color: var(--gray-color);
            font-weight: 600;
            position: relative;
            transition: var(--transition);
        }
        
        .nav-tabs-custom .nav-link:hover {
            color: var(--primary-color);
        }
        
        .nav-tabs-custom .nav-link.active {
            color: var(--primary-color);
            background: transparent;
            border-bottom: 3px solid var(--primary-color);
        }
        
        .nav-tabs-custom .nav-link.active::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 100%;
            height: 3px;
            background: var(--primary-color);
            opacity: 0.2;
        }
        
        /* Tab Content */
        .tab-content-custom {
            padding: 2rem;
        }
        
        /* Interview Cards */
        .interview-card {
            background: linear-gradient(135deg, #fff8e1 0%, #ffe8cc 100%);
            border: 2px solid var(--warning-color);
            border-radius: var(--border-radius-sm);
            padding: 1.25rem;
            margin-bottom: 1rem;
        }
        
        .interview-type {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: var(--warning-color);
            color: var(--dark-color);
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        /* Answer Items */
        .answer-item {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: var(--border-radius-sm);
            padding: 1rem;
            margin-bottom: 0.75rem;
            transition: var(--transition);
        }
        
        .answer-item:hover {
            border-color: var(--primary-color);
            box-shadow: 0 4px 15px rgba(13, 110, 253, 0.1);
        }
        
        .answer-label {
            font-size: 0.85rem;
            color: var(--gray-color);
            margin-bottom: 0.5rem;
            display: block;
        }
        
        .answer-value {
            font-weight: 600;
            color: var(--dark-color);
            font-size: 1rem;
        }
        
        /* Education & Experience Cards */
        .edu-exp-card {
            background: white;
            border: 1px solid #dee2e6;
            border-radius: var(--border-radius-sm);
            padding: 1.25rem;
            margin-bottom: 1rem;
            position: relative;
            transition: var(--transition);
        }
        
        .edu-exp-card:hover {
            border-color: var(--primary-color);
            transform: translateX(-5px);
        }
        
        .edu-exp-card::before {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: var(--gradient-primary);
            border-radius: 2px;
        }
        
        /* Modal Styles */
        .custom-modal .modal-content {
            border-radius: var(--border-radius-lg);
            border: none;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }
        
        .modal-header-custom {
            background: var(--gradient-primary);
            color: white;
            border-bottom: none;
            padding: 1.5rem;
        }
        
        .modal-title-custom {
            font-family: 'El Messiri', serif;
            font-weight: 700;
        }
        
        /* Decision Buttons */
        .decision-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .btn-decision {
            padding: 0.75rem;
            font-weight: 600;
            border: none;
            border-radius: var(--border-radius-sm);
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }
        
        .btn-approve {
            background: var(--gradient-success);
            color: white;
        }
        
        .btn-reject {
            background: var(--danger-color);
            color: white;
        }
        
        /* Loading Animation */
        .loading-spinner {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .main-container {
                padding: 0.75rem;
            }
            
            .profile-header {
                padding: 1.5rem;
            }
            
            .candidate-name {
                font-size: 1.5rem;
            }
            
            .profile-avatar {
                width: 100px;
                height: 100px;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
                gap: 0.75rem;
            }
            
            .tab-content-custom {
                padding: 1.5rem;
            }
            
            .nav-tabs-custom .nav-link {
                padding: 0.75rem 1rem;
                font-size: 0.9rem;
            }
            
            .btn-back {
                bottom: 1.5rem;
                left: 1.5rem;
                width: 45px;
                height: 45px;
            }
            
            .sidebar-card {
                position: relative;
                top: 0;
            }
        }
        
        @media (max-width: 576px) {
            .profile-header {
                padding: 1.25rem;
            }
            
            .candidate-name {
                font-size: 1.35rem;
            }
            
            .candidate-job {
                font-size: 1rem;
            }
            
            .tab-content-custom {
                padding: 1rem;
            }
            
            .decision-buttons {
                grid-template-columns: 1fr;
            }
            
            .modal-body {
                padding: 1rem;
            }
        }
        
        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Utility Classes */
        .shadow-soft {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .shadow-medium {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .shadow-strong {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .border-gradient {
            border: 2px solid transparent;
            background-clip: padding-box, border-box;
            background-origin: padding-box, border-box;
            background-image: linear-gradient(white, white), var(--gradient-primary);
        }
    </style>
</head>
<body class="fade-in">

<!-- Back Button -->
<a href="<?= base_url('candidates') ?>" class="btn-back" title="العودة للقائمة">
    <i class="fas fa-arrow-right fa-lg"></i>
</a>

<div class="main-container">
    <!-- Profile Header -->
    <?php
$company_val = trim((string)($candidate['company'] ?? ''));

$is_saleh_office = ($company_val === 'مكتب الدكتور صالح الجربوع للمحاماة');

$company_name = $is_saleh_office
    ? 'مكتب الدكتور صالح الجربوع للمحاماة'
    : 'شركة مرسوم لتحصيل الديون';

$company_logo = $is_saleh_office
    ? base_url('/assets/imeges/saleh.PNG')
    : base_url('/assets/imeges/m2.PNG');
?>


    <div class="profile-header" data-aos="fade-down">
    <div class="text-center">

        <!-- ✅ شعار الشركة + الاسم -->
        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 mb-3 rounded-pill"
             style="background: rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.18);">
            <img src="<?= $company_logo ?>" alt="<?= html_escape($company_name) ?>"
                 style="width:100px;height:100px;object-fit:contain;border-radius:8px;background:#fff;padding:3px;">
            <span class="fw-bold" style="font-size:14px;">
                <?= html_escape($company_name) ?>
            </span>
        </div>

        <div class="profile-avatar">
            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="صورة الملف الشخصي">
        </div>

        <h1 class="candidate-name"><?= htmlspecialchars($candidate['full_name']) ?></h1>
        <p class="candidate-job">متقدم لوظيفة: <?= htmlspecialchars($application['job_title']) ?></p>
        <p class="candidate-job"> الجوال : <?= htmlspecialchars($application['phone']) ?></p>
        <p class="candidate-job">  المنطقة : <?= htmlspecialchars($application['area']) ?></p>
        <p class="candidate-job">  شركة : <?= htmlspecialchars($application['company']) ?></p>
        <span class="status-badge"><?= $application['status'] ?></span>

    </div>
</div>


    <div class="row g-4">
        <!-- Left Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar-card" data-aos="fade-right">
                <div class="card-body">
                    <!-- Edit Profile -->
                    <a href="<?= base_url('candidates/edit_profile/' . $application['id']) ?>" 
                       class="btn-action btn btn-outline-dark mb-3">
                        <i class="fas fa-edit"></i>
                        <span>تعديل البيانات</span>
                    </a>

                    <!-- Personal Information -->
                    <div class="info-grid">
                        <div class="info-item">
                            <span class="info-label">العمر</span>
                            <span class="info-value"><?= !empty($candidate['age']) ? $candidate['age'] : '-' ?></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">الحالة الاجتماعية</span>
                            <span class="info-value">
                                <?php 
                                $status_map = ['Single' => 'أعزب', 'Married' => 'متزوج', 'Divorced' => 'مطلق'];
                                echo isset($status_map[$candidate['marital_status']]) ? $status_map[$candidate['marital_status']] : ($candidate['marital_status'] ?? '-'); 
                                ?>
                            </span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">عدد الأطفال</span>
                            <span class="info-value"><?= isset($candidate['number_of_children']) ? $candidate['number_of_children'] : '-' ?></span>
                        </div>
                        <div class="info-item">
                            <span class="info-label">حالة الحمل</span>
                            <span class="info-value">
                                <?php 
                                if(isset($candidate['pregnancy_status']) && $candidate['pregnancy_status'] == 'Yes') 
                                    echo '<span class="text-danger">نعم</span>';
                                elseif(isset($candidate['pregnancy_status']) && $candidate['pregnancy_status'] == 'No') 
                                    echo 'لا';
                                else 
                                    echo '-';
                                ?>
                            </span>
                        </div>
                    </div>

                    <!-- Latest Education -->
                    <div class="info-item">
                        <span class="info-label">المؤهل الأحدث</span>
                        <span class="info-value text-primary">
                            <?php if (!empty($education)): 
                                $latest = end($education);
                                echo htmlspecialchars($latest['qualification']) . ' - ' . htmlspecialchars($latest['major']);
                            else: ?>
                                <span class="text-muted">-</span>
                            <?php endif; ?>
                        </span>
                    </div>
                     <div class="mt-4">
                   <!--     <?php if ($candidate['pregnancy_declaration'] != 'N/A'): ?>
                            <a href="<?= base_url('assets/cvs/' . $candidate['pregnancy_declaration']) ?>" target="_blank" 
                               class="btn-action btn btn-primary mb-2">
                                <i class="fas fa-download"></i>
                                <span>قم بتنزيل ملف إقرار الحمل  </span>
                            </a>
                        <?php else: ?>
                            <button class="btn-action btn btn-secondary mb-2" disabled>
                                <i class="fas fa-file-excel"></i>
                                <span>لا يوجد سيرة ذاتية    </span>
                            </button>
                        <?php endif; ?> -->
                        
                       
                    </div>
                    <!-- CV Download -->
                    <div class="mt-4">
                        <?php if ($candidate['cv_file'] != 'N/A'): ?>
                            <a href="<?= base_url('assets/cvs/' . $candidate['cv_file']) ?>" target="_blank" 
                               class="btn-action btn btn-primary mb-2">
                                <i class="fas fa-download"></i>
                                <span>تحميل السيرة الذاتية</span>
                            </a>
                        <?php else: ?>
                            <button class="btn-action btn btn-secondary mb-2" disabled>
                                <i class="fas fa-file-excel"></i>
                                <span>لا يوجد سيرة ذاتية</span>
                            </button>
                        <?php endif; ?>
                        
                    </div>
                </div>

                <!-- SMS Section -->
<?php if(in_array($application['status'], ['تقديم أولي', 'جديد', 'تحت المراجعة', 'مطلوب استكمال البيانات']) &&
      (in_array($this->session->userdata('username'), ['1526', '1291', '2200', '2439']) ||
       $this->session->userdata('role') == 'recruitment_manager')): ?>
    
    <div class="card-body border-top">
        <h6 class="fw-bold mb-3"><i class="fas fa-sms me-2 text-info"></i> إرسال رسائل SMS</h6>
        
        <a href="<?= base_url('users/send_form_invitation/' . $application['id']) ?>"
           class="btn-action btn btn-info mb-3"
           onclick="return confirm('هل تريد إرسال رابط استكمال البيانات الكاملة؟')">
            <i class="fas fa-file-alt"></i>
            <span>إرسال رابط استكمال البيانات</span>
        </a>
        
        <?php
        $this->db->where('application_id', $application['id']);
        $this->db->order_by('sent_at', 'DESC');
        $sms_history = $this->db->get('application_sms_log')->result_array();
        ?>
        
        <?php if(!empty($sms_history)): ?>
            <div class="mt-4">
                <h6 class="fw-bold">سجل الرسائل:</h6>
                <div class="list-group">
                    <?php foreach($sms_history as $sms): ?>
                        <div class="list-group-item p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <small><?= date('Y-m-d', strtotime($sms['sent_at'])) ?></small>
                                <span class="badge bg-<?= $sms['status'] == 'sent' ? 'success' : 'danger' ?>">
                                    <?= $sms['status'] ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    
<?php endif; ?>

                <!-- Evaluations Section -->
                <div class="card-body border-top">
                    <h6 class="fw-bold mb-3"><i class="fas fa-star-half-alt me-2 text-warning"></i> تقييم المدراء</h6>

                    <?php if(!empty($evaluations)): ?>
                        <div class="list-group mb-3">
                            <?php foreach($evaluations as $eval): ?>
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <small class="fw-bold"><?= htmlspecialchars($eval['evaluator_name']) ?></small>
                                        <?php if($eval['status'] == 'completed'): ?>
                                            <span class="badge bg-success"><?= $eval['score'] ?>/100</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark">بانتظار التقييم</span>
                                        <?php endif; ?>
                                    </div>
                                    <?php if(!empty($eval['notes'])): ?>
                                        <p class="small text-muted mb-0">"<?= htmlspecialchars($eval['notes']) ?>"</p>
                                    <?php endif; ?>
                                    <?php if(!empty($eval['recommended_salary'])): ?>
                                        <small class="text-success d-block mt-1">
                                            <i class="fas fa-money-bill-wave"></i> 
                                            <?= htmlspecialchars($eval['recommended_salary']) ?> ريال
                                        </small>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted small text-center">لا توجد تقييمات.</p>
                    <?php endif; ?>

                    <!-- Request Evaluation -->
                    <?php if($this->session->userdata('username') == '1291' || 
         $this->session->userdata('username') == '1526' || 
         $this->session->userdata('username') == '2200' ||  // Added
         $this->session->userdata('username') == '2439' ||  // Added
         $this->session->userdata('role') == 'recruitment_manager'): ?>
                        <button class="btn-action btn btn-outline-primary" type="button" 
                                data-bs-toggle="collapse" data-bs-target="#evalRequestForm">
                            <i class="fas fa-plus"></i>
                            <span>طلب تقييم جديد</span>
                        </button>
                        
                        <div class="collapse mt-3" id="evalRequestForm">
                            <form action="<?= base_url('candidates/request_evaluation') ?>" method="post">
                                <input type="hidden" name="application_id" value="<?= $application['id'] ?>">
                                <div class="mb-3 border p-3 rounded" style="max-height: 200px; overflow-y: auto;">
                                    <div class="mb-2 d-flex gap-2">
                                        <button type="button" class="btn btn-sm btn-outline-secondary w-50" 
                                                onclick="selectAllManagers()">
                                            <i class="fas fa-check-square"></i> الكل
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary w-50" 
                                                onclick="deselectAllManagers()">
                                            <i class="fas fa-square"></i> إلغاء
                                        </button>
                                    </div>
                                    <?php foreach($managers as $mgr): ?>
                                        <div class="form-check mb-2">
                                            <input class="form-check-input manager-checkbox" 
                                                   type="checkbox" 
                                                   name="manager_ids[]" 
                                                   value="<?= $mgr['username'] ?>" 
                                                   id="manager_<?= $mgr['username'] ?>">
                                            <label class="form-check-label" for="manager_<?= $mgr['username'] ?>">
                                                <strong><?= $mgr['name'] ?></strong> 
                                                <small class="text-muted">(<?= $mgr['role'] ?>)</small>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <button type="submit" class="btn-action btn btn-primary" id="submitBtn">
                                    <i class="fas fa-paper-plane"></i>
                                    <span>إرسال طلب التقييم</span>
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Decision Section -->
                <div class="card-body border-top bg-light">
                    <h6 class="fw-bold mb-3"><i class="fas fa-gavel me-2 text-success"></i> قرار التوظيف</h6>
                    
                    <?php if($application['decision_status'] == 'pending'): ?>
                        
                        <?php if($this->session->userdata('username') == '1291' || 
         $this->session->userdata('username') == '1526' || 
         $this->session->userdata('username') == '2200' ||  // Added
         $this->session->userdata('username') == '2439' ||  // Added
         $this->session->userdata('role') == 'recruitment_manager'): ?>
                            <div class="alert alert-warning small mb-3">
                                <i class="fas fa-info-circle"></i> عند الرفض، سيتم إرسال رسالة اعتذار تلقائياً للمرشح.
                            </div>
                            <form action="<?= base_url('candidates/submit_decision') ?>" method="post">
                                <input type="hidden" name="application_id" value="<?= $application['id'] ?>">
                                <div class="mb-3">
                                    <textarea name="decision_notes" class="form-control" rows="2" 
                                              placeholder="ملاحظات القرار..."></textarea>
                                </div>
                                <div class="decision-buttons">
                                    <button type="submit" name="decision" value="approved" 
                                            class="btn-decision btn-approve"
                                            onclick="return confirm('تأكيد الاعتماد؟')">
                                        <i class="fas fa-check"></i>
                                        <span>اعتماد</span>
                                    </button>
                                    <button type="submit" name="decision" value="rejected" 
                                            class="btn-decision btn-reject"
                                            onclick="return confirm('تأكيد الرفض؟ سيتم إرسال SMS اعتذار فوراً.')">
                                        <i class="fas fa-times"></i>
                                        <span>رفض</span>
                                    </button>
                                </div>
                            </form>
                        <?php else: ?>
                            <span class="badge bg-secondary w-100 p-2">بانتظار قرار مدير التوظيف</span>
                        <?php endif; ?>

                    <?php elseif($application['decision_status'] == 'approved'): ?>
                        <div class="alert alert-success p-3 text-center">
                            <i class="fas fa-check-circle fa-2x d-block mb-2"></i>
                            <strong>تم الاعتماد للعرض الوظيفي</strong><br>
                            <small class="text-muted"><?= date('Y-m-d', strtotime($application['decision_date'])) ?></small>
                        </div>

                    <?php elseif($application['decision_status'] == 'rejected'): ?>
                        <div class="alert alert-danger p-3 text-center">
                            <i class="fas fa-times-circle fa-2x d-block mb-2"></i>
                            <strong>تم رفض المرشح</strong><br>
                            <small class="text-muted">تم إرسال رسالة الاعتذار</small>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Job Offer Section -->
                <?php if ($application['decision_status'] == 'approved' || $application['status'] == 'عرض وظيفي' || !empty($offer)): ?>
    <div class="card-body border-top">
        <?php if (!empty($offer)): ?>
            
            <a href="<?= base_url('offers/view/' . $offer['id']) ?>" 
               class="btn-action btn btn-primary mb-3">
                <i class="fas fa-eye"></i>
                <span>عرض تفاصيل العرض</span>
            </a>

            <?php 
            $can_transfer = in_array($this->session->userdata('username'), ['1526', '1291', '2200', '2439']) || 
                            $this->session->userdata('role') == 'recruitment_manager';
                            
            if ($can_transfer && ($offer['candidate_response'] == 'Accepted' || $offer['status'] == 'Completed')): 
            ?>
                <a href="<?= base_url('candidates/transfer_to_hr_form/' . $application['id']) ?>" 
                   class="btn-action btn btn-dark mb-3">
                    <i class="fas fa-database text-warning"></i>
                    <span>ترحيل إلى نظام HR (Orders)</span>
                </a>
                <a href="<?= base_url('onboarding/initiate/' . $application['id']) ?>" 
                   class="btn-action btn btn-success mb-3"
                   style="background: linear-gradient(135deg, #28a745, #20c997); border:none;">
                    <i class="fas fa-rocket"></i>
                    <span>Start Onboarding Process</span>
                </a>
            <?php endif; ?>
            <?php if ($offer['candidate_response'] == 'Accepted' && !empty($offer['signed_document'])): ?>
                <div class="alert alert-success p-3 text-center">
                    <i class="fas fa-check-circle me-2"></i> تم قبول العرض
                </div>
                
            <?php elseif ($offer['candidate_response'] == 'Rejected'): ?>
                <div class="alert alert-danger p-3 text-center">
                    <i class="fas fa-times-circle me-2"></i> تم رفض العرض
                </div>
            <?php else: ?>
                <small class="text-muted d-block text-center">حالة العرض: <?= $offer['status'] ?></small>
            <?php endif; ?>

        <?php else: ?>
            <a href="<?= base_url('offers/create/' . $application['id']) ?>" 
               class="btn-action btn btn-outline-success">
                <i class="fas fa-plus-circle"></i>
                <span>إنشاء عرض وظيفي</span>
            </a>
        <?php endif; ?>
    </div>
<?php endif; ?>
                
                <!-- Schedule Interview & Status Change -->
                <div class="card-body border-top">
                    <button type="button" class="btn-action btn btn-warning mb-3" 
                            data-bs-toggle="modal" data-bs-target="#scheduleModal">
                        <i class="fas fa-calendar-check"></i>
                        <span>جدولة مقابلة</span>
                    </button>
                    
                     <h6 class="fw-bold mb-2">
  تغيير حالة المتقدم
  <span class="text-danger">*</span>
</h6>
<small class="text-muted d-block mb-3">
  <span class="text-danger fw-bold">ملاحظة:</span> اختيار الحالة <span class="text-danger fw-bold">إجباري</span> ولا يمكن حفظ التغيير بدون تحديدها.
</small>

                    <form action="<?= base_url('candidates/update_status/' . $application['id']) ?>" method="post">
                        <div class="input-group">
                             <select name="status" class="form-select" required>
    <option value="" disabled <?= empty($application['status']) ? 'selected' : '' ?>>اختر الحالة</option>

    <?php foreach($stages as $stage): ?>
        <option value="<?= $stage ?>" <?= ($stage == $application['status']) ? 'selected' : '' ?>>
            <?= $stage ?>
        </option>
    <?php endforeach; ?>
</select>

                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-sync-alt"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Flash Messages -->
            <?php if($this->session->flashdata('success_msg')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('success_msg') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('warning_msg')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('warning_msg') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            <?php if($this->session->flashdata('error_msg')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error_msg') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>
            
            <!-- Tabs Content -->
            <div class="content-card" data-aos="fade-left">
                <!-- Navigation Tabs -->
                <ul class="nav nav-tabs nav-tabs-custom" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="overview-tab" data-bs-toggle="tab" 
                                data-bs-target="#overview" type="button">
                            <i class="fas fa-file-signature me-2"></i> إجابات الفلترة
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" 
                                data-bs-target="#profile" type="button">
                            <i class="fas fa-user-graduate me-2"></i> المؤهلات والخبرات
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="notes-tab" data-bs-toggle="tab" 
                                data-bs-target="#notes" type="button">
                            <i class="fas fa-comments me-2"></i> الملاحظات والسجل
                        </button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content tab-content-custom" id="myTabContent">
                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="overview" role="tabpanel">
                        <?php if(isset($interviews) && !empty($interviews)): ?>
                            <div class="mb-5">
                                <h4 class="mb-3 text-warning"><i class="fas fa-clock me-2"></i> المقابلات المجدولة</h4>
                                <?php foreach($interviews as $int): ?>
                                    <div class="interview-card">
                                        <span class="interview-type"><?= $int['interview_type'] ?></span>
                                        <h5 class="mb-2"><?= $int['interview_date'] ?> | <?= $int['interview_time'] ?></h5>
                                        <?php if(!empty($int['location_or_link'])): ?>
                                            <p class="mb-1">
                                                <i class="fas fa-link me-2"></i>
                                                <a href="<?= $int['location_or_link'] ?>" target="_blank" class="text-decoration-none">
                                                    <?= $int['location_or_link'] ?>
                                                </a>
                                            </p>
                                        <?php endif; ?>
                                        <?php if(!empty($int['notes'])): ?>
                                            <p class="text-muted small mb-0 mt-2">
                                                <i class="fas fa-sticky-note me-1"></i> <?= htmlspecialchars($int['notes']) ?>
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <h4 class="mb-4">إجابات المقابلة الإلكترونية</h4>
                        <div class="row g-3">
                            <?php if(!empty($answers)): ?>
                                <?php foreach($answers as $key => $val): 
                                    if($key == 'id' || $key == 'application_id') continue; ?>
                                    <div class="col-md-6">
                                        <div class="answer-item">
                                            <span class="answer-label"><?= str_replace('_', ' ', ucfirst($key)) ?></span>
                                            <span class="answer-value d-block"><?= htmlspecialchars($val) ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <div class="col-12">
                                    <div class="alert alert-info text-center">
                                        <i class="fas fa-info-circle me-2"></i> لا توجد إجابات متاحة
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Profile Tab -->
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <!-- Education -->
                        <h4 class="mb-4"><i class="fas fa-graduation-cap me-2 text-primary"></i> المؤهلات العلمية</h4>
                        <?php if (empty($education)): ?>
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle me-2"></i> لم يقم المتقدم بإضافة مؤهلات.
                            </div>
                        <?php else: ?>
                            <div class="row g-3">
                                <?php foreach($education as $edu): ?>
                                    <div class="col-md-6">
                                        <div class="edu-exp-card">
                                            <h6 class="text-primary fw-bold mb-2"><?= htmlspecialchars($edu['qualification']) ?></h6>
                                            <p class="mb-1"><strong>التخصص:</strong> <?= htmlspecialchars($edu['major']) ?></p>
                                            <p class="mb-1"><strong>المؤسسة:</strong> <?= htmlspecialchars($edu['institution']) ?></p>
                                            <?php if(!empty($edu['graduation_year'])): ?>
                                                <small class="text-muted">سنة التخرج: <?= htmlspecialchars($edu['graduation_year']) ?></small>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        
                        <hr class="my-5">
                        
                        <!-- Experience -->
                        <h4 class="mb-4"><i class="fas fa-briefcase me-2 text-success"></i> الخبرة العملية</h4>
                        <?php if (empty($experience)): ?>
                            <div class="alert alert-info text-center">
                                <i class="fas fa-info-circle me-2"></i> لم يقم المتقدم بإضافة خبرات.
                            </div>
                        <?php else: ?>
                            <div class="row g-3">
                                <?php foreach($experience as $exp): ?>
                                    <div class="col-md-6">
                                        <div class="edu-exp-card">
                                            <h6 class="text-success fw-bold mb-2"><?= htmlspecialchars($exp['job_title']) ?></h6>
                                            <p class="mb-1"><strong>الشركة:</strong> <?= htmlspecialchars($exp['company_name']) ?></p>
                                            <p class="mb-1"><strong>المدة:</strong> <?= htmlspecialchars($exp['work_years']) ?> سنوات</p>
                                            <?php if(!empty($exp['achievements'])): ?>
                                                <p class="small text-muted mt-2">
                                                    <strong>الإنجازات:</strong> <?= htmlspecialchars($exp['achievements']) ?>
                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Notes Tab -->
                    <div class="tab-pane fade" id="notes" role="tabpanel">
    <div class="card bg-light mb-4">
        <div class="card-body">
            <h5 class="card-title text-dark"><i class="fas fa-sticky-note me-2"></i> الملاحظات الحالية</h5>
            <?php if(!empty($candidate['notes'])): ?>
                <p class="card-text" style="white-space: pre-line;"><?= htmlspecialchars($candidate['notes']) ?></p>
            <?php else: ?>
                <p class="text-muted">لا توجد ملاحظات مسجلة.</p>
            <?php endif; ?>
        </div>
    </div>

    <hr>
    <div class="alert alert-info small">
        <i class="fas fa-info-circle"></i> لتعديل الملاحظات، يرجى الضغط على زر "تعديل البيانات" في القائمة الجانبية.
    </div>
</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Schedule Interview Modal -->
<div class="modal fade custom-modal" id="scheduleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header modal-header-custom">
                <h5 class="modal-title modal-title-custom">
                    <i class="fas fa-calendar-check me-2"></i> تحديد موعد مقابلة
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            
            <form action="<?= base_url('candidates/process_schedule') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="application_id" value="<?= $application['id'] ?>">
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">نوع المقابلة</label>
                        <select name="interview_type" class="form-select" required>
                            <option value="Video">اتصال فيديو (Video)</option>
                            <option value="Phone">هاتف (Phone)</option>
                            <option value="In-Person">حضوري (In-Person)</option>
                        </select>
                    </div>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="fw-bold">التاريخ</label>
                            <input type="date" name="interview_date" class="form-control" 
                                   required min="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="fw-bold">الوقت</label>
                            <input type="time" name="interview_time" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="fw-bold">الرابط أو العنوان</label>
                        <input type="text" name="location_or_link" class="form-control" 
                               placeholder="رابط Zoom أو عنوان المكتب" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="fw-bold">ملاحظات إضافية</label>
                        <textarea name="notes" class="form-control" rows="3" 
                                  placeholder="أي ملاحظات إضافية للمرشح..."></textarea>
                    </div>
                    
                    <div class="alert alert-info d-flex align-items-center">
                        <i class="fas fa-sms me-3 fs-4"></i>
                        <div>
                            <strong>ملاحظة:</strong> سيتم إرسال رسالة SMS للمرشح تلقائياً عند الحفظ.
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-paper-plane me-2"></i> حفظ وإرسال
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- PDF Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

<!-- AOS Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    // Initialize AOS
    AOS.init({
        duration: 600,
        once: true,
        offset: 100
    });

    // Manager Selection Functions
    function selectAllManagers() {
        document.querySelectorAll('.manager-checkbox').forEach(cb => cb.checked = true);
    }
    
    function deselectAllManagers() {
        document.querySelectorAll('.manager-checkbox').forEach(cb => cb.checked = false);
    }

    // PDF Export Function
    document.addEventListener('DOMContentLoaded', function () {
        const printBtn = document.getElementById('print-pdf-btn');
        
        if (printBtn) {
            printBtn.addEventListener('click', function () {
                if (!window.jspdf || !window.html2canvas) {
                    alert('مكتبة PDF غير متوفرة');
                    return;
                }
                
                // Show loading state
                const originalHTML = this.innerHTML;
                this.innerHTML = '<span class="loading-spinner me-2"></span> جاري التصدير...';
                this.disabled = true;
                
                const { jsPDF } = window.jspdf;
                const profileElement = document.getElementById('applicant-profile-content') || document.body;
                
                html2canvas(profileElement, { 
                    scale: 2, 
                    useCORS: true, 
                    allowTaint: true,
                    backgroundColor: '#ffffff'
                }).then(canvas => {
                    const pdf = new jsPDF('p', 'mm', 'a4');
                    const imgData = canvas.toDataURL('image/png');
                    const imgProps = pdf.getImageProperties(imgData);
                    const pdfWidth = pdf.internal.pageSize.getWidth();
                    const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
                    
                    pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                    pdf.save(`ملف المتقدم - <?= htmlspecialchars($candidate['full_name']) ?>.pdf`);
                    
                    // Reset button
                    this.innerHTML = originalHTML;
                    this.disabled = false;
                }).catch(err => {
                    console.error('PDF Export Error:', err);
                    alert('حدث خطأ أثناء تصدير PDF');
                    this.innerHTML = originalHTML;
                    this.disabled = false;
                });
            });
        }
        
        // Form validation
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                const requiredFields = this.querySelectorAll('[required]');
                let isValid = true;
                
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('is-invalid');
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                    alert('الرجاء ملء جميع الحقول المطلوبة');
                }
            });
        });
        
        // Tab functionality
        const tabTriggers = document.querySelectorAll('button[data-bs-toggle="tab"]');
        tabTriggers.forEach(trigger => {
            trigger.addEventListener('shown.bs.tab', function(e) {
                // Save active tab to localStorage
                localStorage.setItem('activeTab', e.target.id);
            });
        });
        
        // Restore active tab
        const activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            const tabElement = document.querySelector(`#${activeTab}`);
            if (tabElement) {
                new bootstrap.Tab(tabElement).show();
            }
        }
        
        // Mobile optimizations
        if (window.innerWidth < 768) {
            // Make modals more mobile-friendly
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                modal.addEventListener('shown.bs.modal', function() {
                    document.body.style.overflow = 'hidden';
                });
                
                modal.addEventListener('hidden.bs.modal', function() {
                    document.body.style.overflow = '';
                });
            });
            
            // Better touch targets
            const touchElements = document.querySelectorAll('button, a, select, input');
            touchElements.forEach(el => {
                el.style.minHeight = '44px';
            });
        }
        
        // Auto-focus first input in modals
        document.addEventListener('shown.bs.modal', function(e) {
            const firstInput = e.target.querySelector('input, select, textarea');
            if (firstInput) {
                setTimeout(() => firstInput.focus(), 300);
            }
        });
    });

    // Handle viewport height for mobile
    function setVH() {
        let vh = window.innerHeight * 0.01;
        document.documentElement.style.setProperty('--vh', vh + 'px');
    }

    window.addEventListener('resize', setVH);
    window.addEventListener('orientationchange', setVH);
    setVH();
</script>

</body>
</html>