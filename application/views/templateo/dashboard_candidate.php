<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة متابعة - المرشحين</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        :root {
            --marsom-orange: #FF8C00;
            --marsom-orange-light: #ffc107;
            --text-light: #ffffff;
            --text-muted: #aaaaaa;
            
            /* New Dark Theme Colors */
            --bg-dark: #2C2C2C; /* Main page background */
            --container-bg: #353535; /* Main container background */
            --card-bg: #404040; /* Card background */
            --card-bg-hover: #484848;
            --border-color: #555555;
            --btn-export-bg: #5a5a5a;
            --btn-export-hover: #6a6a6a;
        }

        body {
            font-family: 'El Messiri', sans-serif;
            overflow-x: hidden; 
            background-color: var(--bg-dark);
            min-height: 100vh;
            margin: 0;
            padding: 20px 0;
        }
        
        /* This is your navigation bar placeholder */
        /* Your templateo/header file will handle the real one */
        .top-fixed-nav {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 100;
            display: flex;
            gap: 10px;
        }
        .top-fixed-nav .btn {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid var(--border-color);
            color: var(--text-light);
            border-radius: 10px;
            padding: 8px 15px;
            font-weight: 500;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
        }
        .top-fixed-nav .btn:hover {
            background-color: var(--marsom-orange);
            color: var(--bg-dark);
        }

        /* Main Content Container */
        .main-container {
            background: var(--container-bg);
            border-radius: 20px;
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            padding: 30px 40px;
            color: var(--text-light);
            animation: fadeInScale 0.8s ease-out forwards;
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }
        .page-header h2 {
            font-family: 'El Messiri', sans-serif;
            font-weight: 700;
            font-size: 1.8rem; /* REDUCED FONT SIZE */
            color: var(--text-light);
            margin: 0;
        }
        .breadcrumb-modern {
            padding: 0;
            margin: 0;
            background: none;
        }
        .breadcrumb-modern .breadcrumb-item a {
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            color: var(--text-light);
            background: var(--marsom-orange);
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        .breadcrumb-modern .breadcrumb-item a:hover {
            background: var(--marsom-orange-light);
            color: var(--bg-dark);
            box-shadow: 0 0 15px rgba(255, 140, 0, 0.4);
        }

        /* Styled Stat Card */
        .stat-card-advanced {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            padding: 20px; /* Reduced padding slightly */
            color: var(--text-light);
            display: flex;
            flex-direction: column;
            height: 100%;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }
        .stat-card-advanced:hover {
            transform: translateY(-6px);
            background: var(--card-bg-hover);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
            border-color: var(--marsom-orange);
        }

        .stat-card-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 10px;
        }
        .stat-card-header .card-number {
            font-family: 'Inter', sans-serif;
            font-size: 2.25rem; /* REDUCED FONT SIZE */
            font-weight: 700;
            color: var(--text-light);
            line-height: 1;
        }
        .card-actions {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-end;
        }
        /* Styling buttons to match image */
        .card-actions .btn {
            display: flex;
            align-items: center;
            font-family: 'Inter', sans-serif;
            font-size: 0.8rem; /* Small buttons */
            font-weight: 500;
            padding: 4px 10px; /* Small padding */
            border-radius: 6px;
            transition: all 0.3s ease;
            width: 110px; /* Fixed width */
            justify-content: space-between;
        }
        .card-actions .btn i {
            font-size: 0.8rem;
        }
        .card-actions .btn-view {
            background: var(--marsom-orange);
            border: 1px solid var(--marsom-orange);
            color: var(--text-light); /* White text */
        }
        .card-actions .btn-view:hover {
            background: var(--marsom-orange-light);
            color: var(--bg-dark);
        }
        .card-actions .btn-export {
            background: var(--btn-export-bg);
            border: 1px solid var(--border-color);
            color: var(--text-muted);
        }
        .card-actions .btn-export:hover {
            background: var(--btn-export-hover);
            color: var(--text-light);
        }

        .stat-card-body .card-title {
            font-family: 'El Messiri', sans-serif;
            font-size: 1rem; /* REDUCED FONT SIZE */
            font-weight: 600;
            color: var(--text-muted); /* Muted title color */
            margin-bottom: 15px;
            line-height: 1.4;
            min-height: 38px;
        }
        .stat-card-footer {
            margin-top: auto; /* Push to bottom */
        }
        .progress {
            height: 8px;
            background-color: rgba(0, 0, 0, 0.3); /* Darker track */
            border-radius: 8px;
            overflow: hidden;
        }
        .progress-bar {
            background: linear-gradient(90deg, var(--marsom-orange-light), var(--marsom-orange));
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <div class="container-fluid py-5" style="padding-top: 100px !important;"> <div class="container-lg">
            <div class="main-container"> <div class="page-header">
                    <h2><i class="fas fa-users me-3 text-white-50"></i>المرشحين</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb-modern">
                            <li class="breadcrumb-item">
                                <a href="<?php echo base_url();?>users/add_id_number"><i class="fa fa-plus me-2"></i> مرشح جديد</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate110155555; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">متقدمين عن طريق الرابط</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate110155555662; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs555')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">تم اجراء مقابلة هاتفية</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate1101555551010111; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs_abha')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">ابها</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate110155555101011133; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs55214')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">الخُبر</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate11015555510101; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">جدة</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate1101555557; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs7')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">مقابلات عن بعد</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate11015555510; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs10')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">مرفوضين</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate1101555558; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs8')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">لم يتم الرد</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate110168888; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs10_G')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">مرشحين لدى رئيس اللجنة (غزية السبيعي)</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate11016888899; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs10_A')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">مرشحين لدى رئيس اللجنة (عبير الفيفي)</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate110168888991515; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs10_A')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">مرشحين لدى رئيس اللجنة (مها السبيعي)</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate110168888991515; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs10_A')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">مرشحين لدى رئيس اللجنة (مواهب المطيري)</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col">
                        <div class="stat-card-advanced">
                            <div class="stat-card-header">
                                <span class="card-number"><?php echo $cuntt_emp_candidate110168888991414; ?></span>
                                <div class="card-actions">
                                    <a href="<?php echo site_url('users/data_emp_part_new_jobs10_A')?>" class="btn btn-view"><span>عرض البيانات</span> <i class="fas fa-list"></i></a>
                                    <a onClick="MyWindow=window.open('https://services.marsoom.net/hr101/users/sadad_report_emp','MyWindow',width=50,height=50); return false;" class="btn btn-export"><span>تصدير</span> <i class="fas fa-file-export"></i></a>
                                </div>
                            </div>
                            <div class="stat-card-body">
                                <h5 class="card-title">مرشحين لدى رئيس اللجنة (خلود العتيبي)</h5>
                            </div>
                            <div class="stat-card-footer">
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 64%;" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> </div> </div> </div> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <div class="toast-container position-fixed bottom-0 start-0 p-3" style="z-index:1080">
      <div id="welcomeToast" class="toast align-items-center text-bg-primary border-0" role="alert"
           aria-live="assertive" aria-atomic="true" data-bs-delay="4000">
        <div class="d-flex">
          <div class="toast-body">
             مرحباً <?php echo isset($name) ? html_escape($name) : 'ضيف'; ?> (<?php echo isset($username) ? html_escape($username) : ''; ?>) 👋 — يسعدنا وجودك!
          </div>
          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
      </div>
    </div>

    <script>
        // --- Toast Notification Scripts ---
        const toastEl = document.getElementById('welcomeToast');
        if(toastEl) {
            const toast = new bootstrap.Toast(toastEl);
          
            // Show toast on page load
            window.addEventListener('load', () => {
                toast.show();
            });
            
            // Show toast on notification button click (if button exists in header)
            // Note: This button is part of your 'templateo/header'
            const notifButton = document.getElementById('btnNotifications');
            if (notifButton) {
                notifButton.addEventListener('click', () => {
                    toast.show();
                });
            }
        }
    </script>

</body>
</html>