<?php
// --- CONFIGURATION: GET COMPANY FROM CANDIDATE DATA ---
$candidate_company = isset($offer['company']) ? trim($offer['company']) : '';

// 1. Check for Saleh Law Office
if ($candidate_company == 'مكتب الدكتور صالح الجربوع للمحاماة') {
    $is_saleh_office = true;
    $company_name = 'مكتب الدكتور صالح الجربوع للمحاماة';
    $company_logo = base_url('assets/imeges/saleh.PNG');
    $theme_color  = '#b8860b'; // Gold
    $footer_text  = 'مكتب الدكتور صالح الجربوع للمحاماة - الرياض';

// 2. Default / Marsoom (Covers "شركة مرسوم لتحصيل الديون" or empty)
} else {
    $is_saleh_office = false;
    $company_name = 'شركة مرسوم لتحصيل الديون';
    $company_logo = base_url('assets/imeges/m1.PNG');
    $theme_color  = '#0d6efd'; // Blue
    $footer_text  = 'شركة مرسوم لتحصيل الديون - الرياض';
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>عرض وظيفي: <?= htmlspecialchars($offer['job_title']) ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;600;700&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --theme-color: <?= $theme_color ?>;
            --bg-color: #f0f2f5;
        }

        body { 
            background-color: var(--bg-color); 
            font-family: 'Tajawal', sans-serif; 
            color: #333;
            margin: 0;
            padding-bottom: 80px;
        }
        
        /* --- PAPER SHEET DESIGN (A4) --- */
        .offer-paper {
            background: #ffffff;
            width: 100%;
            max-width: 210mm; /* A4 Width */
            min-height: 297mm; /* A4 Height */
            margin: 30px auto;
            position: relative;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            display: flex;
            flex-direction: column;
        }

        /* Top Color Strip */
        .header-strip {
            background-color: var(--theme-color);
            height: 12px;
            width: 100%;
            -webkit-print-color-adjust: exact; /* Force print color */
            print-color-adjust: exact;
        }

        .content-padding {
            padding: 50px 60px;
            flex: 1;
        }

        /* --- HEADER SECTION --- */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 25px;
            margin-bottom: 35px;
        }
        
        .company-logo {
            max-height: 90px;
            max-width: 200px;
            object-fit: contain;
        }

        .ref-box {
            text-align: left;
            font-size: 0.85rem;
            color: #666;
            border-right: 3px solid var(--theme-color);
            padding-right: 15px;
        }

        /* --- TYPOGRAPHY --- */
        h1.doc-title {
            text-align: center;
            font-family: 'El Messiri', serif;
            font-weight: 700;
            font-size: 2.2rem;
            color: #222;
            margin-bottom: 30px;
        }

        .body-text {
            font-size: 1.05rem;
            line-height: 1.8;
            text-align: justify;
        }

        /* --- SALARY TABLE --- */
        .salary-box {
            margin: 25px 0;
            border: 1px solid #e9ecef;
            border-radius: 8px;
            overflow: hidden;
        }
        .table-custom { margin-bottom: 0; width: 100%; border-collapse: collapse; }
        .table-custom th { 
            background-color: #f8f9fa; 
            color: #495057; 
            font-weight: 700;
            padding: 12px 15px;
            width: 40%;
            border-bottom: 1px solid #e9ecef;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        .table-custom td { 
            padding: 12px 15px; 
            font-weight: 600; 
            border-bottom: 1px solid #e9ecef;
        }
        .total-row th, .total-row td { 
            background-color: #e3f2fd !important;
            color: var(--theme-color) !important; 
            font-weight: 800; 
            font-size: 1.1rem; 
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }

        /* --- FOOTER --- */
        .doc-footer {
            width: 100%;
            text-align: center;
            padding: 20px;
            border-top: 1px solid #eee;
            font-size: 0.8rem;
            color: #999;
            margin-top: auto;
        }

        /* --- SIGNATURES --- */
        .signatures { margin-top: 50px; }
        .sig-box { text-align: center; margin-bottom: 20px; }
        .sig-line {
            border-top: 1px solid #000;
            width: 80%;
            margin: 50px auto 10px; /* Space for signature */
            padding-top: 10px;
            font-weight: bold;
        }

        /* --- ACTIONS & UI --- */
        .action-card {
            cursor: pointer;
            border: 2px solid transparent;
            transition: 0.3s;
            background: #fff;
        }
        .action-card:hover, .action-card.active {
            border-color: var(--theme-color);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .canvas-wrapper {
            border: 2px dashed #adb5bd;
            border-radius: 6px;
            position: relative;
            background: #fff;
            height: 200px;
        }
        canvas { display: block; width: 100%; height: 100%; cursor: crosshair; }

        /* --- MOBILE RESPONSIVENESS (Screens < 768px) --- */
        @media (max-width: 768px) {
            .offer-paper {
                margin: 10px auto;
                width: 95%; /* Fit screen with small margin */
                min-height: auto;
            }
            .content-padding {
                padding: 30px 20px; /* Smaller padding */
            }
            .header-section {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }
            .company-logo {
                margin-bottom: 15px;
                max-width: 220px;
            }
            .ref-box {
                border-right: none;
                border-top: 2px solid var(--theme-color);
                padding-right: 0;
                padding-top: 10px;
                width: 100%;
            }
            h1.doc-title { font-size: 1.8rem; }
            .signatures .col-6 {
                width: 100%; /* Stack signatures on mobile */
                margin-bottom: 20px;
            }
            .sig-line { margin: 30px auto 10px; }
        }

        /* --- PRINT STYLES (A4 Force) --- */
        @media print {
            @page {
                size: A4;
                margin: 0;
            }
            body { 
                background: white; 
                margin: 0; 
                padding: 0;
                -webkit-print-color-adjust: exact;
            }
            .offer-paper { 
                box-shadow: none; 
                margin: 0; 
                width: 100%; 
                max-width: 210mm;
                min-height: 297mm;
                border: none;
            }
            .no-print, .navbar, .actions-toolbar, .alert { 
                display: none !important; 
            }
            .content-padding {
                padding: 40px 50px; /* Adjust print margins */
            }
            /* Prevent table break */
            tr { page-break-inside: avoid; }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-light bg-white shadow-sm no-print mb-4">
    <div class="container">
        <span class="navbar-brand fw-bold" style="color: var(--theme-color)">
            <i class="fas fa-file-contract me-2"></i> بوابة العروض الوظيفية
        </span>
    </div>
</nav>

<div class="container">
    
    <?php if($this->session->flashdata('error')): ?>
        <div class="alert alert-danger shadow-sm no-print text-center"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>
    <?php if($this->session->flashdata('msg')): ?>
        <div class="alert alert-success shadow-sm no-print text-center"><?= $this->session->flashdata('msg') ?></div>
    <?php endif; ?>

    <div class="offer-paper" id="offerContent">
        
        <div class="header-strip"></div>
        
        <div class="content-padding">
            <div class="header-section">
                <div class="logo-box">
                    <img src="<?= $company_logo ?>" alt="<?= htmlspecialchars($company_name) ?>" class="company-logo">
                </div>
                <div class="ref-box">
                    <div><strong>الرقم المرجعي:</strong> OFF-<?= str_pad($offer['id'], 6, '0', STR_PAD_LEFT) ?></div>
                    <div><strong>التاريخ:</strong> <?= date('Y/m/d') ?></div>
                    <div style="color: var(--theme-color);"><strong><?= $is_saleh_office ? 'الإدارة القانونية' : 'إدارة الموارد البشرية' ?></strong></div>
                </div>
            </div>

            <h1 class="doc-title">عرض وظيفي</h1>

            <div class="body-text">
                <p class="mb-3">
                    <strong>إلى السيد/ة: <?= htmlspecialchars($offer['candidate_name']) ?></strong> المحترم/ة
                </p>
                <p>السلام عليكم ورحمة الله وبركاته،،،</p>
                
                <p>
                    يسرنا في <strong><?= htmlspecialchars($company_name) ?></strong> أن نتقدم لكم بهذا العرض الوظيفي للانضمام إلى فريق عملنا 
                    بمسمى <strong>(<?= htmlspecialchars($offer['job_title']) ?>)</strong>. نحن على ثقة بأن مؤهلاتكم وخبراتكم ستكون إضافة قيمة لنجاح الشركة.
                </p>
                <p>وفيما يلي تفاصيل العرض المالي والمزايا:</p>

                <div class="salary-box">
                    <table class="table-custom">
                        <tr><th>الراتب الأساسي</th><td><?= number_format($offer['basic_salary']) ?> ريال</td></tr>
                        <tr><th>بدل السكن</th><td><?= number_format($offer['housing_allowance']) ?> ريال</td></tr>
                        <tr><th>بدل النقل</th><td><?= number_format($offer['transport_allowance']) ?> ريال</td></tr>
                        <tr><th>بدل اتصال / أخرى</th><td><?= number_format($offer['communication_allowance']) ?> ريال</td></tr>
                        <tr class="total-row"><th>إجمالي الراتب الشهري</th><td><?= number_format($offer['total_salary']) ?> ريال سعودي</td></tr>
                    </table>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="p-2 border rounded bg-light small">
                            <i class="fas fa-calendar-check me-2 text-muted"></i> 
                            <strong>تاريخ المباشرة:</strong> <?= $offer['start_date'] ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-2 border rounded bg-light small">
                            <i class="fas fa-map-marker-alt me-2 text-muted"></i> 
                            <strong>مقر العمل:</strong> الرياض
                        </div>
                    </div>
                </div>

                <p class="small text-muted">
                    * يخضع هذا العرض للأنظمة واللوائح الداخلية للشركة ولنظام العمل السعودي.<br>
                    * يعتبر العرض لاغياً إذا لم يتم الرد خلال 3 أيام عمل من تاريخه.
                </p>

                <div class="row signatures">
                    <div class="col-6">
                        <div class="sig-box">
                            <div class="sig-line">مدير الموارد البشرية</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="sig-box">
                            <div class="sig-line">
                                توقيع وقبول المرشح<br>
                                <span style="font-weight:normal; font-size:0.9rem"><?= htmlspecialchars($offer['candidate_name']) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="doc-footer">
            <?= $footer_text ?> &copy; <?= date('Y') ?>
        </div>
    </div>
    <div class="actions-toolbar no-print pb-5">
        
        <div id="decisionButtons" class="text-center mt-4">
            <h5 class="mb-3 text-muted">الرجاء اتخاذ إجراء بشأن العرض:</h5>
            <button onclick="window.print()" class="btn btn-dark mx-2 shadow-sm mb-2"><i class="fas fa-print me-2"></i> طباعة / حفظ PDF</button>
            <button onclick="showAcceptOptions()" class="btn btn-success px-5 mx-2 shadow-sm mb-2"><i class="fas fa-check me-2"></i> قبول العرض</button>
            <button onclick="showRejectForm()" class="btn btn-outline-danger mx-2 shadow-sm mb-2"><i class="fas fa-times me-2"></i> اعتذار</button>
        </div>

        <div id="rejectForm" class="card shadow-sm border-danger mt-4 mx-auto" style="display:none; max-width: 600px;">
            <div class="card-header bg-danger text-white">رفض العرض</div>
            <div class="card-body">
                <?= form_open('portal/submit_response/' . $offer['token']) ?>
                    <input type="hidden" name="action" value="reject">
                    <div class="mb-3">
                        <label class="form-label">سبب الرفض (اختياري):</label>
                        <textarea name="reason" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-light" onclick="resetView()">إلغاء</button>
                        <button type="submit" class="btn btn-danger">تأكيد الرفض</button>
                    </div>
                <?= form_close() ?>
            </div>
        </div>

        <div id="acceptOptions" class="mt-4" style="display:none;">
            <div class="row justify-content-center g-4">
                <div class="col-md-5 col-12">
                    <div class="card p-4 text-center h-100 action-card" onclick="selectMethod('digital')">
                        <i class="fas fa-signature fa-3x text-primary mb-3"></i>
                        <h5>توقيع إلكتروني</h5>
                        <p class="text-muted small">التوقيع مباشرة على الشاشة</p>
                    </div>
                </div>
                <div class="col-md-5 col-12">
                    <div class="card p-4 text-center h-100 action-card" onclick="selectMethod('upload')">
                        <i class="fas fa-file-upload fa-3x text-success mb-3"></i>
                        <h5>رفع ملف موقع</h5>
                        <p class="text-muted small">رفع نسخة PDF أو صورة موقعة</p>
                    </div>
                </div>
            </div>

            <div id="digitalForm" class="card shadow-sm mt-4 mx-auto" style="display:none; max-width: 600px;">
                <div class="card-header text-white" style="background-color: var(--theme-color);">التوقيع الإلكتروني</div>
                <div class="card-body">
                    <div class="alert alert-secondary small"><i class="fas fa-info-circle"></i> يرجى رسم توقيعك في المربع أدناه</div>
                    
                    <div class="canvas-wrapper mb-3">
                        <button type="button" class="btn btn-sm btn-outline-danger position-absolute top-0 end-0 m-2" onclick="signaturePad.clear()"><i class="fas fa-eraser"></i></button>
                        <canvas id="sig-canvas"></canvas>
                    </div>

                    <?= form_open('portal/submit_response/' . $offer['token'], ['id' => 'sigForm']) ?>
                        <input type="hidden" name="action" value="accept_digital">
                        <input type="hidden" name="signature_data" id="signature_data">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-light" onclick="resetView()">إلغاء</button>
                            <button type="button" class="btn btn-success px-4" onclick="submitDigital()">اعتماد وإرسال</button>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>

            <div id="uploadForm" class="card shadow-sm mt-4 mx-auto" style="display:none; max-width: 600px;">
                <div class="card-header bg-success text-white">رفع العرض الموقع</div>
                <div class="card-body">
                    <?= form_open_multipart('portal/submit_response/' . $offer['token']) ?>
                        <input type="hidden" name="action" value="accept_upload">
                        <div class="mb-3">
                            <label class="form-label">الملف (PDF, JPG, PNG)</label>
                            <input type="file" name="signed_file" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-light" onclick="resetView()">إلغاء</button>
                            <button type="submit" class="btn btn-success">رفع واعتماد</button>
                        </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    // View Management
    function showAcceptOptions() { hideAll(); document.getElementById('acceptOptions').style.display = 'block'; }
    function showRejectForm() { hideAll(); document.getElementById('rejectForm').style.display = 'block'; }
    function resetView() { hideAll(); document.getElementById('decisionButtons').style.display = 'block'; }
    
    function hideAll() {
        document.getElementById('decisionButtons').style.display = 'none';
        document.getElementById('rejectForm').style.display = 'none';
        document.getElementById('acceptOptions').style.display = 'none';
        document.getElementById('digitalForm').style.display = 'none';
        document.getElementById('uploadForm').style.display = 'none';
    }

    function selectMethod(method) {
        document.querySelectorAll('.action-card').forEach(el => el.classList.remove('active'));
        event.currentTarget.classList.add('active');
        
        if(method === 'digital') {
            document.getElementById('digitalForm').style.display = 'block';
            document.getElementById('uploadForm').style.display = 'none';
            resizeCanvas();
        } else {
            document.getElementById('digitalForm').style.display = 'none';
            document.getElementById('uploadForm').style.display = 'block';
        }
    }

    // Signature Pad
    var canvas = document.getElementById('sig-canvas');
    var signaturePad = new SignaturePad(canvas, { minWidth: 1, maxWidth: 3 });

    function resizeCanvas() {
        var ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
        signaturePad.clear();
    }
    window.addEventListener("resize", resizeCanvas);

    function submitDigital() {
        if (signaturePad.isEmpty()) { alert("الرجاء التوقيع أولاً"); return; }
        document.getElementById('signature_data').value = signaturePad.toDataURL();
        document.getElementById('sigForm').submit();
    }
</script>

</body>
</html>