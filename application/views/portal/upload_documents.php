<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>رفع مسوغات التعيين</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: #f0f2f5; font-family: 'Tajawal', sans-serif; }
        .card { border-radius: 15px; border: none; }
        .section-title { color: #0d6efd; font-weight: bold; border-bottom: 2px solid #e9ecef; padding-bottom: 10px; margin-bottom: 20px; margin-top: 30px; }
        .upload-row { background: #fff; padding: 15px; border-radius: 10px; border: 1px solid #dee2e6; margin-bottom: 15px; transition: 0.2s; }
        .upload-row:hover { border-color: #0d6efd; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        .status-uploaded { color: #198754; font-weight: bold; font-size: 0.9rem; }
        .status-missing { color: #dc3545; font-size: 0.9rem; }
        .btn-download { background-color: #e9ecef; color: #333; font-size: 0.85rem; border: 1px solid #ced4da; }
        .btn-download:hover { background-color: #dee2e6; color: #000; }
        .digital-form-card { background: #f8f9fa; border: 1px dashed #0d6efd; padding: 20px; border-radius: 10px; margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center p-4" style="border-radius: 15px 15px 0 0;">
                    <h3 class="mb-1"><i class="fas fa-file-upload me-2"></i> استكمال ملف التوظيف</h3>
                    <p class="mb-0 opacity-75">مرحباً <?= htmlspecialchars($candidate['full_name']) ?></p>
                </div>
                
                <div class="card-body p-4 p-md-5">
                    
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert alert-success d-flex align-items-center mb-4">
                            <i class="fas fa-check-circle fs-4 me-2"></i>
                            <div><?= $this->session->flashdata('success') ?></div>
                        </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger d-flex align-items-center mb-4">
                            <i class="fas fa-exclamation-circle fs-4 me-2"></i>
                            <div><?= $this->session->flashdata('error') ?></div>
                        </div>
                    <?php endif; ?>

                    <?= form_open_multipart('portal/submit_docs/' . $app['docs_token']) ?>

                    <h5 class="section-title"><i class="fas fa-file-contract me-2"></i> نموذج مباشرة العمل (إلكتروني)</h5>
                   <label class="form-label fw-bold">ا  الحد الأقصى لحجم الملف هو 1 ميجابايت   </label>
                    <div class="digital-form-card">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">اسم الموظف</label>
                                <input type="text" class="form-control bg-light" value="<?= $candidate['full_name'] ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">الرقم الوظيفي</label>
                                <input type="text" class="form-control bg-light" value="<?= isset($app['employee_id']) ? $app['employee_id'] : 'سيتم التحديد لاحقاً' ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">نوع المباشرة</label>
                                <select name="commencement_type" class="form-select" required>
                                    <option value="New Hire">مباشرة موظف جديد</option>
                                    <option value="Return from Leave">عودة من إجازة</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">تاريخ المباشرة</label>
                                <input type="date" name="commencement_date" class="form-control" required value="<?= isset($candidate['commencement_date']) ? $candidate['commencement_date'] : date('Y-m-d') ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">مقر العمل (المدينة/الفرع)</label>
                                <input type="text" name="work_location" class="form-control" required value="<?= isset($candidate['work_location']) ? $candidate['work_location'] : '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">المشروع (إن وجد)</label>
                                <input type="text" name="project_name" class="form-control" value="<?= isset($candidate['project_name']) ? $candidate['project_name'] : '' ?>">
                            </div>
                            <div class="col-12">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" required id="signCheck">
                                    <label class="form-check-label fw-bold" for="signCheck">
                                        أقر أنا الموظف الموضح بياناتي أعلاه بأنني باشرت العمل في التاريخ والموقع المحددين.
                                        (يعتبر هذا توقيعاً إلكترونياً معتمداً)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h5 class="section-title"><i class="fas fa-id-card me-2"></i> الوثائق الشخصية</h5>
                    <?php 
                    $personal_docs = [
                        'iqama_file' => 'صورة الهوية الوطنية / الإقامة',
                        'national_address_file' => 'العنوان الوطني',
                        'degree_file' => 'المؤهل العلمي',
                        'bank_iban_file' => 'شهادة الآيبان البنكي',
                        'gosi_subscription_file' => 'برنت التأمينات الاجتماعية',
                        'experience_file' => 'شهادات الخبرة والدورات',
                        'clearance_cert_file' => 'شهادة إخلاء الطرف',
                        'medical_invoice' =>'فاتورة الفحص الطبي',
                        'medical_result' => 'نتيجة الفحص الطبي'
                    ];
                    
                    foreach($personal_docs as $field => $label): 
                        $is_uploaded = !empty($candidate[$field]);
                    ?>
                    <div class="upload-row d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                        <div class="mb-2 mb-md-0 w-50">
                            <label class="fw-bold d-block text-dark mb-1"><?= $label ?></label>
                            <?php if($is_uploaded): ?>
                                <span class="status-uploaded"><i class="fas fa-check-circle"></i> تم الرفع بنجاح</span>
                            <?php else: ?>
                                <span class="status-missing"><i class="far fa-circle"></i> بانتظار الرفع</span>
                            <?php endif; ?>
                        </div>
                        <div class="w-100 w-md-50">
                            <input type="file" name="<?= $field ?>" class="form-control form-control-sm">
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <h5 class="section-title"><i class="fas fa-file-signature me-2"></i> نماذج أخرى (تحميل، تعبئة، إعادة رفع)</h5>
                    <?php 
                    $company_forms = [
                        'commencement_form_file' => [ // Kept original commencement for backup if needed, or remove if fully digital
                            'label' => 'نموذج بيانات موظف (Commencement)', 
                            'link' => $templates['commencement']
                        ],
                        'confidentiality_form_file' => [
                            'label' => 'إقرار سرية المعلومات', 
                            'link' => $templates['confidentiality']
                        ],
                        'employment_guarantee_file' => [
                            'label' => 'نموذج الكفالة الوظيفية', 
                            'link' => $templates['guarantee']
                        ],
                        'family_data_file' => [
        'label' => 'نموذج افصاح للبيانات العائلية للموظفين المستجدين - مكتب صالح الجربوع ', 
        'link' => $templates['family_data']
    ],
    'immediate_work_file' => [
        'label' => 'مباشرة عمل بعد التحديث.', 
        'link' => $templates['immediate_work']
    ],
                    ];

                    foreach($company_forms as $field => $info): 
                        $is_uploaded = !empty($candidate[$field]);
                    ?>
                    <div class="upload-row">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <label class="fw-bold text-dark"><?= $info['label'] ?></label>
                            <a href="<?= $info['link'] ?>" class="btn btn-sm btn-download rounded-pill" download>
                                <i class="fas fa-download me-1"></i> تحميل
                            </a>
                        </div>
                        <div class="w-100 mt-2">
                            <input type="file" name="<?= $field ?>" class="form-control form-control-sm">
                            <?php if($is_uploaded): ?>
                                <small class="text-success fw-bold mt-1 d-block"><i class="fas fa-check-circle"></i> تم الرفع</small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary w-100 btn-lg shadow fw-bold">
                            <i class="fas fa-save me-2"></i> حفظ البيانات وإرسال الملفات
                        </button>
                    </div>

                    <?= form_close() ?>
                </div>
            </div>
            <div class="text-center mt-3 text-muted small">
                &copy; <?= date('Y') ?> شركة مرسوم لتقنية المعلومات
            </div>
        </div>
    </div>
</div>

</body>
</html>