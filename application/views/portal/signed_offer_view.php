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
    <title>وثيقة معتمدة: <?= htmlspecialchars($offer['job_title']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;600;700&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --theme-color: <?= $theme_color ?>;
            --bg-color: #f8f9fa;
        }

        body { 
            background-color: var(--bg-color); 
            font-family: 'Tajawal', sans-serif; 
            padding: 40px 0; 
            color: #333; 
        }

        .paper {
            background: white;
            max-width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            padding: 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            overflow: hidden;
        }

        .header-strip {
            background-color: var(--theme-color);
            height: 15px;
            width: 100%;
        }

        .content-padding { padding: 50px 60px; }

        .doc-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #eee;
            padding-bottom: 25px;
            margin-bottom: 30px;
        }

        .company-logo {
            max-height: 85px;
            max-width: 250px;
            object-fit: contain;
        }

        .meta-data {
            text-align: left;
            font-size: 0.9rem;
            color: #555;
            line-height: 1.6;
            border-right: 3px solid var(--theme-color);
            padding-right: 15px;
        }

        h1.doc-title {
            text-align: center;
            font-family: 'El Messiri', serif;
            font-weight: 700;
            color: #222;
            margin-bottom: 30px;
            font-size: 1.8rem;
        }

        .salary-table { width: 100%; border-collapse: collapse; margin: 25px 0; border: 1px solid #e9ecef; border-radius: 8px; overflow: hidden; }
        .salary-table th { background: #f8f9fa; padding: 12px; text-align: right; color: #555; width: 40%; }
        .salary-table td { padding: 12px; border-bottom: 1px solid #eee; font-weight: 600; }
        .salary-total td { background-color: #e3f2fd; color: var(--theme-color); font-weight: 800; font-size: 1.1rem; }

        /* Signature Section */
        .signatures-section { margin-top: 50px; }
        .signature-box { text-align: center; position: relative; height: 160px; }
        .signature-line {
            border-top: 1px solid #333;
            width: 80%;
            margin: 0 auto;
            padding-top: 10px;
            font-weight: bold;
        }

        /* Digital Signature Overlay */
        .signature-img {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%) rotate(-2deg);
            width: 150px;
            max-height: 100px;
            z-index: 10;
            mix-blend-mode: multiply;
        }

        /* Approved Stamp */
        .stamp-approved {
            position: absolute;
            top: 180px;
            left: 60px;
            border: 4px double #198754;
            color: #198754;
            padding: 10px 20px;
            font-family: 'El Messiri', serif;
            font-weight: bold;
            font-size: 1.4rem;
            transform: rotate(-15deg);
            opacity: 0.8;
            border-radius: 8px;
            z-index: 0;
            text-align: center;
        }

        .doc-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 20px;
            border-top: 1px solid #eee;
            font-size: 0.8rem;
            color: #999;
        }

        @media print {
            body { background: white; padding: 0; }
            .paper { box-shadow: none; margin: 0; width: 100%; max-width: 100%; }
            .no-print { display: none !important; }
            .stamp-approved { opacity: 0.6; }
        }
    </style>
</head>
<body>

    <div class="text-center mb-4 no-print">
        <button onclick="window.print()" class="btn btn-dark shadow-sm px-4"><i class="fas fa-print me-2"></i> طباعة / حفظ كـ PDF</button>
    </div>

    <div class="paper">
        <div class="header-strip"></div>
        
        <div class="stamp-approved">
            <i class="fas fa-check-circle"></i> معتمد<br>
            <span style="font-size:0.9rem; font-family:sans-serif;">APPROVED</span>
        </div>

        <div class="content-padding">
            <div class="doc-header">
                <div class="logo-wrapper">
                    <img src="<?= $company_logo ?>" alt="<?= htmlspecialchars($company_name) ?>" class="company-logo">
                </div>
                <div class="meta-data">
                    <div><strong>المرجع:</strong> OFF-<?= str_pad($offer['id'], 6, '0', STR_PAD_LEFT) ?></div>
                    <div><strong>تاريخ العرض:</strong> <?= date('Y/m/d', strtotime($offer['created_at'])) ?></div>
                    <div><strong>تاريخ الاعتماد:</strong> <?= date('Y/m/d', strtotime($offer['response_date'])) ?></div>
                </div>
            </div>

            <h1 class="doc-title">وثيقة عرض وظيفي (معتمد)</h1>

            <div class="px-2">
                <p class="mb-4 text-justify" style="line-height: 1.8;">
                    تشهد <strong><?= htmlspecialchars($company_name) ?></strong> بأنه قد تم الاتفاق واعتماد توظيف السيد/ة 
                    <strong><?= htmlspecialchars($offer['candidate_name']) ?></strong> 
                    بمسمى <strong>(<?= htmlspecialchars($offer['job_title']) ?>)</strong> 
                    وفقاً للمزايا المالية التالية:
                </p>

                <table class="salary-table">
                    <tr><th>الراتب الأساسي</th><td><?= number_format($offer['basic_salary']) ?> ريال</td></tr>
                    <tr><th>بدل السكن</th><td><?= number_format($offer['housing_allowance']) ?> ريال</td></tr>
                    <tr><th>بدل النقل</th><td><?= number_format($offer['transport_allowance']) ?> ريال</td></tr>
                    <tr><th>بدل اتصال / أخرى</th><td><?= number_format($offer['communication_allowance']) ?> ريال</td></tr>
                    <tr class="salary-total"><th>الإجمالي الشهري</th><td><?= number_format($offer['total_salary']) ?> ريال سعودي</td></tr>
                </table>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <div class="p-2 border rounded bg-light">
                            <strong><i class="far fa-clock"></i> تاريخ المباشرة:</strong> <?= $offer['start_date'] ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-2 border rounded bg-light">
                            <strong><i class="fas fa-map-marker-alt"></i> مقر العمل:</strong> الرياض
                        </div>
                    </div>
                </div>

                <p class="small text-muted mt-5">
                    * تم توقيع هذه الوثيقة إلكترونياً من قبل الطرفين وتعتبر ملزمة قانونياً.
                    <br>
                    * يعتبر هذا المستند جزءاً لا يتجزأ من العقد النهائي.
                </p>

                <div class="row signatures-section">
                    <div class="col-6">
                        <div class="signature-box">
                            <div style="height: 100px;"></div>
                            <div class="signature-line">
                                اعتماد الشركة<br>
                                <small class="fw-normal">الموارد البشرية</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="signature-box">
                            <?php if(isset($signature_base64) && !empty($signature_base64)): ?>
                                <img src="<?= $signature_base64 ?>" class="signature-img" alt="Candidate Signature">
                            <?php endif; ?>
                            
                            <div style="height: 100px;"></div>
                            <div class="signature-line">
                                توقيع المرشح<br>
                                <small class="fw-normal"><?= htmlspecialchars($offer['candidate_name']) ?></small>
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

</body>
</html>