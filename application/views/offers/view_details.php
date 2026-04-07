<?php
// Debugging (Visible in source code only)
echo "";
echo "";

// Define User Roles for Logic
$uid = $this->session->userdata('user_id');
$hr_users = [2230, 2515, 2774, 2784, 66, 67]; // HR Team
$required_verification_users = [2230, 2515, 2774, 2784]; // Specific Users who MUST verify docs
$rm_users = [1526, 64, 1291,2200,2439, 1]; // Recruitment Team

// Fetch Candidate Data for Form Display
// Fetch Candidate Data for Form Display
$ci =& get_instance();

// FIX: Use real_candidate_id (from JOIN) because offer['candidate_id'] might be wrong (e.g. 14)
$target_id = isset($offer['real_candidate_id']) ? $offer['real_candidate_id'] : $offer['candidate_id'];

$candidate = $ci->db->get_where('candidates', ['id' => $target_id])->row_array();
$has_form_data = !empty($candidate['commencement_date']);

// --- FIX START: Updated Query to match your DB Schema ---
$users_list = [];
if ($uid == 1526 || $uid == 2200 || $uid == 2439 || $this->session->userdata('role') == 'recruitment_manager') {
    // Changed 'user_id' to 'id' and 'role' to 'type'
    $users_list = $ci->db->select('id, username, name, type')->get('users')->result_array();
}

// Get Assigned Names (for display)
$assigned_manager_name = "لم يتم التعيين";
$assigned_hr_name = "لم يتم التعيين";

if($candidate['assigned_manager_id']) {
    // Changed 'user_id' to 'id'
    $mgr = $ci->db->select('name')->where('id', $candidate['assigned_manager_id'])->get('users')->row();
    if($mgr) $assigned_manager_name = $mgr->name;
}
if($candidate['assigned_hr_id']) {
    // Changed 'user_id' to 'id'
    $hr = $ci->db->select('name')->where('id', $candidate['assigned_hr_id'])->get('users')->row();
    if($hr) $assigned_hr_name = $hr->name;
}
// --- FIX END ---
?>

<div class="container mt-5 mb-5" dir="rtl">
    
    <?php if($this->session->flashdata('success_msg')): ?>
        <div class="alert alert-success text-center shadow-sm border-success">
            <i class="fas fa-check-circle fa-2x mb-2 d-block"></i>
            <?= $this->session->flashdata('success_msg') ?>
        </div>
    <?php endif; ?>
    <?php if($this->session->flashdata('error_msg')): ?>
        <div class="alert alert-danger text-center shadow-sm">
            <i class="fas fa-exclamation-triangle fa-2x mb-2 d-block"></i>
            <?= $this->session->flashdata('error_msg') ?>
        </div>
    <?php endif; ?>
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <a href="<?= base_url('offers/dashboard') ?>" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-right me-2"></i> العودة للوحة الاعتماد
            </a>
        </div>
        <div class="text-end">
            <h2 class="text-primary fw-bold">تفاصيل العرض الوظيفي #<?= $offer['id'] ?></h2>
            <div class="d-flex gap-2 justify-content-end">
                <span class="badge bg-warning text-dark fs-6 px-3 py-2">
                    الحالة: <?= $offer['status'] ?>
                </span>
                <?php if($offer['docs_status'] != 'Pending'): ?>
                    <span class="badge bg-info text-dark fs-6 px-3 py-2">
                        الوثائق: <?= $offer['docs_status'] ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">معلومات المرشح</div>
                <div class="card-body text-center p-4">
                    <div class="bg-light rounded-circle mx-auto mb-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="fas fa-user fa-2x text-secondary"></i>
                    </div>
                    <h4><?= htmlspecialchars($offer['candidate_name']) ?></h4>
                    <p class="text-muted mb-3">الوظيفة: <?= htmlspecialchars($offer['job_title']) ?></p>
                    <p class="text-primary fw-bold" dir="ltr"><?= htmlspecialchars($offer['phone']) ?></p>
                    
                    <a href="<?= base_url('candidates/view/' . $offer['application_id']) ?>" class="btn btn-outline-primary w-100 rounded-pill mb-3">
                        عرض الملف الشخصي
                    </a>

                    <hr>

                    <div class="text-start bg-light p-3 rounded border">
                        <label class="small text-muted fw-bold mb-2">
                            <i class="fas fa-id-badge me-1"></i> الرقم الوظيفي (Employee ID)
                        </label>

                        <?php if($uid == 1526 || $uid == 2200 || $uid == 2439 || $uid == 3141): ?>
                            <form action="<?= base_url('offers/update_employee_id') ?>" method="post" class="d-flex gap-2">
                                <input type="hidden" name="offer_id" value="<?= $offer['id'] ?>">
                                <input type="text" name="employee_id" class="form-control form-control-sm" 
                                       value="<?= isset($offer['employee_id']) ? $offer['employee_id'] : '' ?>" 
                                       placeholder="أدخل الرقم...">
                                <button type="submit" class="btn btn-success btn-sm" title="حفظ">
                                    <i class="fas fa-save"></i>
                                </button>
                            </form>
                        
                        <?php else: ?>
                            <?php if(!empty($offer['employee_id'])): ?>
                                <h5 class="fw-bold text-dark m-0"><?= $offer['employee_id'] ?></h5>
                            <?php else: ?>
                                <span class="text-muted small d-block">لم يتم التعيين بعد</span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-header bg-white fw-bold">سجل الاعتمادات</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>مدير الموارد البشرية (HR)</span>
                        <?php if($offer['hr_status'] == 'Approved'): ?>
                            <span class="badge bg-success">معتمد <i class="fas fa-check"></i></span>
                        <?php elseif($offer['hr_status'] == 'Rejected'): ?>
                            <span class="badge bg-danger">مرفوض <i class="fas fa-times"></i></span>
                        <?php else: ?>
                            <span class="badge bg-secondary">بانتظار الإجراء</span>
                        <?php endif; ?>
                    </li>
                    <?php if($offer['docs_status'] == 'Verified'): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>مطابقة الوثائق (HR)</span>
                        <span class="badge bg-success">مكتمل <i class="fas fa-check-double"></i></span>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="col-md-8">
            
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">بيانات العرض المالي</div>
                <div class="card-body p-4">
                    <div class="row text-center mb-4">
                        <div class="col-md-3">
                            <small class="text-muted d-block">الراتب الأساسي</small>
                            <h5 class="fw-bold"><?= number_format($offer['basic_salary']) ?> ريال</h5>
                        </div>
                        <div class="col-md-3">
                            <small class="text-muted d-block">بدل السكن</small>
                            <h5 class="fw-bold"><?= number_format($offer['housing_allowance']) ?> ريال</h5>
                        </div>
                        <div class="col-md-3">
                            <small class="text-muted d-block">بدل النقل</small>
                            <h5 class="fw-bold"><?= number_format($offer['transport_allowance']) ?> ريال</h5>
                        </div>
                        <div class="col-md-3">
                            <small class="text-muted d-block">بدل اتصال</small>
                            <h5 class="fw-bold"><?= number_format($offer['communication_allowance']) ?> ريال</h5>
                        </div>
                    </div>
                    
                    <div class="alert alert-light border text-center">
                        <h3 class="text-success fw-bold m-0">
                            إجمالي الراتب الشهري: <?= number_format($offer['total_salary']) ?> ريال
                        </h3>
                    </div>

                    <div class="row mt-4 border-top pt-3">
                        <div class="col-6">
                            <small class="text-muted d-block">تاريخ المباشرة المقترح</small>
                            <p class="fw-bold mb-0"><?= $offer['start_date'] ?></p>
                        </div>
                        <div class="col-6 text-end">
                            <small class="text-muted d-block">رقم الهوية / الإقامة</small>
                            <p class="fw-bold mb-0"><?= !empty($offer['id_number']) ? $offer['id_number'] : '-' ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-primary mb-4">
    <div class="card-header bg-primary text-white fw-bold">
        الإجراءات المطلوبة
    </div>
    <div class="card-body text-center p-4">

        <?php if ($offer['status'] == 'Pending HR' && in_array($uid, $hr_users)): ?>
            <h5 class="mb-3">هل تود اعتماد هذا العرض؟</h5>
            <form action="<?= base_url('offers/process_approval/' . $offer['id']) ?>" method="post">
                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" name="action" value="approve" class="btn btn-success btn-lg px-5">
                        <i class="fas fa-check me-2"></i> اعتماد (Approve)
                    </button>
                    <button type="submit" name="action" value="reject" class="btn btn-danger btn-lg px-5">
                        <i class="fas fa-times me-2"></i> رفض (Reject)
                    </button>
                </div>
            </form>

        <?php elseif (in_array($offer['status'], ['Approved', 'Sent']) && (in_array($uid, $rm_users) || $this->session->userdata('role') == 'recruitment_manager')): ?>
            <?php if ($offer['status'] == 'Sent'): ?>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i> تم إرسال العرض مسبقاً للمرشح. يمكنك إعادة الإرسال إذا لزم الأمر.
                </div>
            <?php else: ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle me-2"></i> تمت الموافقة على العرض. جاهز للإرسال.
                </div>
            <?php endif; ?>

            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-dark btn-lg w-50" data-bs-toggle="modal" data-bs-target="#previewOfferModal">
                    <i class="fas fa-eye me-2"></i> معاينة العرض (Preview)
                </button>

                <a href="<?= base_url('offers/send_to_candidate/' . $offer['id']) ?>" class="btn btn-primary btn-lg w-50">
                    <i class="fas fa-paper-plane me-2"></i> <?= ($offer['status'] == 'Sent') ? 'إعادة إرسال العرض (SMS)' : 'إرسال العرض (SMS)' ?>
                </a>
            </div>

        <?php elseif ($offer['status'] == 'Accepted' && $offer['docs_status'] == 'Pending' && (in_array($uid, $rm_users) || $this->session->userdata('role') == 'recruitment_manager')): ?>
            <div class="alert alert-success">
                <i class="fas fa-check-circle me-2"></i> قام المرشح بقبول العرض.
            </div>
            <div class="alert alert-info small">
                يرجى التأكد من اكتمال "مسوغات التعيين" في الأسفل ثم التحويل للموارد البشرية.
            </div>
            <a href="<?= base_url('offers/send_docs_to_hr_process/' . $offer['id']) ?>" 
               class="btn btn-warning btn-lg w-100 fw-bold"
               onclick="return confirm('هل تأكدت من اكتمال جميع المرفقات؟')">
                <i class="fas fa-share-square me-2"></i> إرسال الوثائق للمطابقة (HR)
            </a>

        <?php elseif ($offer['docs_status'] == 'Under Review'): ?>
            <?php 
                // Fetch who already approved
                $approvals = $ci->db->query("SELECT user_id FROM offer_doc_approvals WHERE offer_id = ?", [$offer['id']])->result_array();
                $approved_ids = array_column($approvals, 'user_id');
            ?>
            
            <div class="alert alert-warning border-warning">
                <i class="fas fa-users-cog me-2"></i> <strong>طلب مطابقة جماعي:</strong> يرجى من جميع المختصين المراجعة والاعتماد.
            </div>

            <?php 
                $count = count(array_intersect($approved_ids, $required_verification_users));
                $total = count($required_verification_users);
                $percent = ($total > 0) ? ($count / $total) * 100 : 0;
            ?>
            <div class="mb-3">
                <small class="fw-bold d-flex justify-content-between mb-1">
                    <span>حالة الاعتمادات:</span>
                    <span><?= $count ?> من <?= $total ?></span>
                </small>
                <div class="progress" style="height: 10px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $percent ?>%"></div>
                </div>
            </div>

            <div class="row text-start mb-3 small bg-light p-2 rounded">
                <?php foreach($required_verification_users as $hr_id): ?>
                    <div class="col-6 mb-1">
                        <?php if(in_array($hr_id, $approved_ids)): ?>
                            <span class="text-success fw-bold"><i class="fas fa-check-circle me-1"></i> User <?= $hr_id ?></span>
                        <?php else: ?>
                            <span class="text-muted"><i class="far fa-circle me-1"></i> User <?= $hr_id ?></span>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if (in_array($uid, $required_verification_users) && !in_array($uid, $approved_ids)): ?>
                <a href="<?= base_url('offers/verify_docs_process/' . $offer['id']) ?>" 
                   class="btn btn-success btn-lg w-100 fw-bold shadow"
                   onclick="return confirm('هل راجعت جميع الوثائق؟ سيتم تسجيل اعتمادك.')">
                    <i class="fas fa-clipboard-check me-2"></i> اعتماد المطابقة (Approve)
                </a>
            <?php elseif(in_array($uid, $approved_ids)): ?>
                <button class="btn btn-secondary w-100 disabled">
                    <i class="fas fa-check me-2"></i> لقد قمت بالاعتماد مسبقاً
                </button>
            <?php elseif(!in_array($uid, $required_verification_users)): ?>
                <div class="alert alert-light text-muted small mb-0">
                    ليس لديك صلاحية الاعتماد، أو أنك لست ضمن القائمة المطلوبة.
                </div>
            <?php endif; ?>

        <?php elseif ($offer['status'] == 'Completed' || $offer['docs_status'] == 'Verified'): ?>
            <div class="alert alert-success border-success bg-success bg-opacity-10 p-4">
                <h4 class="alert-heading fw-bold"><i class="fas fa-flag-checkered me-2"></i> تم اكتمال التوظيف</h4>
                <p class="mb-0">تمت مطابقة الوثائق وإغلاق الملف بنجاح.</p>
                <hr>
                <small>تم الاعتماد بواسطة فريق الموارد البشرية | التاريخ: <?= $offer['docs_verified_at'] ?></small>
            </div>

        <?php else: ?>
            <div class="alert alert-light border">
                <strong>حالة الطلب:</strong> 
                <?php 
                    if($offer['status'] == 'Sent') echo 'بانتظار رد المرشح';
                    elseif($offer['status'] == 'Pending HR') echo 'بانتظار اعتماد العرض (HR)';
                    elseif($offer['status'] == 'Offer Rejected') echo 'تم رفض العرض من قبل المرشح';
                    else echo $offer['status'];
                ?>
            </div>
            
            <?php if(!empty($offer['rejection_reason'])): ?>
                <div class="bg-danger bg-opacity-10 p-3 rounded border border-danger text-danger mt-2 mb-3">
                    <strong>سبب الرفض:</strong> <?= htmlspecialchars($offer['rejection_reason']) ?>
                </div>
            <?php endif; ?>

            <?php 
                $can_recreate = (in_array($uid, [1526, 2200, 2439, 64]) || $this->session->userdata('role') == 'recruitment_manager');
                $is_rejected = in_array($offer['status'], ['Rejected', 'Offer Rejected', 'Cancelled', 'HR Rejected', 'RM Rejected']);
            ?>

            <?php if ($can_recreate && $is_rejected): ?>
                <button type="button" class="btn btn-warning w-100 py-3 fw-bold shadow-sm" data-bs-toggle="modal" data-bs-target="#recreateOfferModal">
                    <i class="fas fa-sync-alt me-2"></i> تعديل وإعادة إنشاء العرض (Re-Submit)
                </button>
            <?php endif; ?>
            <?php endif; ?>

    </div>
</div>

            <?php if (in_array($offer['status'], ['Sent', 'Accepted', 'Completed']) || $offer['docs_status'] != 'Pending'): ?>
            <div class="card shadow-sm border-secondary mb-4">
                <div class="card-header bg-secondary text-white fw-bold">
                    <i class="fas fa-folder-open me-2"></i> مسوغات التعيين (Joining Documents)
                </div>
                <div class="card-body">
                    
                    <?php if($offer['status'] != 'Completed' && (in_array($uid, $rm_users) || $this->session->userdata('role') == 'recruitment_manager')): ?>
                        <a href="<?= base_url('offers/send_docs_request/' . $offer['id']) ?>" 
                           class="btn btn-outline-dark w-100 mb-3 fw-bold" 
                           onclick="return confirm('إرسال رابط رفع المستندات SMS؟')">
                            <i class="fas fa-sms me-2 text-warning"></i> إعادة إرسال رابط الرفع (SMS)
                        </a>
                        <hr>
                    <?php endif; ?>

                    <?php 
$cand_files = $candidate;

$doc_groups = [
    'الوثائق الشخصية' => [
        'iqama_file' => 'الهوية / الإقامة',
        'national_address_file' => 'العنوان الوطني',
        'degree_file' => 'المؤهل العلمي',
        'bank_iban_file' => 'شهادة الآيبان',
        'gosi_subscription_file' => 'برنت التأمينات',
        'experience_file' => 'شهادات الخبرة',
        'clearance_cert_file' => 'إخلاء الطرف',
        'lawyer_license_file' => 'رخصة المحاماة'
    ],
    'نماذج الشركة' => [
        'commencement_form_file' => 'نموزج بيانات',
        'confidentiality_form_file' => 'إقرار السرية',
        'employment_guarantee_file' => 'الكفالة الوظيفية',  // Added comma
        'family_data_file' => 'نموذج افصاح للبيانات العائلية',  // Added comma
        'immediate_work_file' => 'مباشرة عمل بعد التحديث'    // No comma needed for last item
        
            ],
    'الملف الطبي' => [
        'medical_invoice' =>'فاتورة الفحص الطبي',
        'medical_result' => 'نتيجة الفحص الطبي'
    ]
];
?>

                    <div class="accordion" id="docsAccordion">
                        <?php $i = 0; foreach($doc_groups as $group_title => $files): $i++; ?>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?= $i ?>">
                                    <button class="accordion-button <?= $i!=1 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>">
                                        <strong><?= $group_title ?></strong>
                                    </button>
                                </h2>
                                <div id="collapse<?= $i ?>" class="accordion-collapse collapse <?= $i==1 ? 'show' : '' ?>" data-bs-parent="#docsAccordion">
                                    <div class="accordion-body p-0">
                                        <div class="list-group list-group-flush">
                                            <?php foreach($files as $db_col => $label): ?>
                                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                                    <span class="small fw-bold text-muted">
                                                        <i class="fas fa-file-alt me-2"></i> <?= $label ?>
                                                    </span>
                                                    
                                                    <?php if(!empty($cand_files[$db_col])): ?>
                                                        <a href="<?= base_url($cand_files[$db_col]) ?>" target="_blank" class="btn btn-sm btn-success rounded-pill px-3">
                                                            <i class="fas fa-eye"></i> عرض
                                                        </a>
                                                    <?php else: ?>
                                                        <span class="badge bg-light text-secondary border">بانتظار الرفع...</span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <?php 
                        $app_details = $ci->db->get_where('applications', ['id' => $offer['application_id']])->row_array();
                        $docs_token = isset($app_details['docs_token']) ? $app_details['docs_token'] : null;
                    ?>
                    <?php if(!empty($docs_token)): ?>
                        <div class="mt-4 p-3 bg-light border rounded text-start" dir="ltr">
                            <small class="text-muted d-block mb-2">رابط الرفع (للمرشح):</small>
                            <div class="input-group">
                                <input type="text" class="form-control form-control-sm" 
                                       value="<?= base_url('portal/upload_docs/' . $docs_token) ?>" 
                                       readonly id="docsLink">
                                <button class="btn btn-outline-secondary btn-sm" type="button" 
                                        onclick="copyToClipboard('docsLink')">
                                    <i class="fas fa-copy"></i> نسخ
                                </button>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php endif; ?>

            <?php if($has_form_data): ?>
            <div class="card shadow-sm border-info mb-4">
                <div class="card-header bg-info text-dark fw-bold d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-file-signature me-2"></i> نموذج مباشرة العمل (إلكتروني)</span>
                    <span class="badge bg-white text-info">بيانات الموظف</span>
                </div>
                <div class="card-body">
                    
                    <div class="bg-light p-3 rounded border mb-3" dir="rtl">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <small class="text-muted d-block">اسم الموظف</small>
                                <strong><?= $candidate['full_name'] ?></strong>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block">الرقم الوظيفي</small>
                                <strong><?= !empty($offer['employee_id']) ? $offer['employee_id'] : '---' ?></strong>
                            </div>
                            <div class="col-md-4">
                                <small class="text-muted d-block">تاريخ المباشرة</small>
                                <strong><?= $candidate['commencement_date'] ?></strong>
                            </div>
                            <div class="col-md-4">
                                <small class="text-muted d-block">مقر العمل</small>
                                <strong><?= $candidate['work_location'] ?></strong>
                            </div>
                            <div class="col-md-4">
                                <small class="text-muted d-block">المشروع</small>
                                <strong><?= $candidate['project_name'] ?></strong>
                            </div>
                            <div class="col-12 border-top pt-2">
                                <small class="text-muted d-block mb-1">إقرار الموظف (التوقيع):</small>
                                <span class="text-success fw-bold">
                                    <i class="fas fa-check-circle me-1"></i> 
                                    تم التوقيع إلكترونياً بواسطة الموظف بتاريخ: <?= $candidate['employee_signature_date'] ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <?php if ($uid == 1526 || $uid == 2200 || $uid == 2439 || $this->session->userdata('role') == 'recruitment_manager'): ?>
                        <div class="card bg-light border-secondary mb-4">
                            <div class="card-header bg-secondary text-white py-1 small">
                                <i class="fas fa-user-cog me-1"></i> تعيين المسؤولين عن التوقيع
                            </div>
                            <div class="card-body p-2">
                                <form action="<?= base_url('offers/assign_signers') ?>" method="post" class="row g-2 align-items-end">
                                    <input type="hidden" name="offer_id" value="<?= $offer['id'] ?>">
                                    
                                    <div class="col-md-5">
                                        <label class="small fw-bold">المدير المباشر</label>
                                        <select name="manager_id" class="form-select form-select-sm">
                                            <option value="">-- اختر المدير --</option>
                                            <?php foreach($users_list as $user): ?>
                                                <option value="<?= $user['username'] ?>" <?= ($user['username'] == $candidate['assigned_manager_id']) ? 'selected' : '' ?>>
                                                    <?= $user['name'] ?> (<?= $user['type'] ?>)
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="small fw-bold">مختص الموارد البشرية</label>
                                        <select name="hr_id" class="form-select form-select-sm">
                                            <option value="">-- اختر المختص --</option>
                                            <?php foreach($users_list as $user): ?>
                                                <option value="<?= $user['username'] ?>" <?= ($user['username'] == $candidate['assigned_hr_id']) ? 'selected' : '' ?>>
                                                    <?= $user['name'] ?> (<?= $user['type'] ?>)
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-primary btn-sm w-100">
                                            <i class="fas fa-save"></i> حفظ
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>

                    <h6 class="fw-bold mb-3 border-bottom pb-2">الاعتمادات الإدارية</h6>
                    
                    <div class="row text-center">
                        
                        <div class="col-md-6 border-start">
                            <label class="fw-bold mb-2 d-block">المدير المباشر</label>
                            
                            <?php if(!empty($candidate['manager_signature_date'])): ?>
                                <div class="p-2 border border-success rounded bg-success bg-opacity-10">
                                    <div class="text-success fw-bold mb-1"><i class="fas fa-check-circle"></i> تم الاعتماد</div>
                                    <?php if(!empty($candidate['manager_signature_image'])): ?>
                                        <img src="<?= base_url($candidate['manager_signature_image']) ?>" class="img-fluid my-2" style="max-height: 50px;">
                                    <?php endif; ?>
                                    <small class="text-muted d-block">بواسطة: <?= $assigned_manager_name ?></small>
                                    <small class="text-muted"><?= date('Y-m-d H:i', strtotime($candidate['manager_signature_date'])) ?></small>
                                </div>
                            <?php else: ?>
                                <div class="mb-2 text-muted small">المسؤول: <strong><?= $assigned_manager_name ?></strong></div>
                                
                                <?php if($uid == $candidate['assigned_manager_id'] || $uid == 1526 || $uid == 2200 || $uid == 2439): ?>
    <button type="button" class="btn btn-outline-primary w-100 py-3" onclick="openSignatureModal('manager')">
                                        <i class="fas fa-pen-fancy me-2"></i> توقيع المدير المباشر
                                    </button>
                                <?php else: ?>
                                    <div class="p-3 bg-light rounded text-muted small">بانتظار التوقيع</div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold mb-2 d-block">مختص الموارد البشرية</label>
                            
                            <?php if(!empty($candidate['hr_signature_date'])): ?>
                                <div class="p-2 border border-success rounded bg-success bg-opacity-10">
                                    <div class="text-success fw-bold mb-1"><i class="fas fa-check-circle"></i> تم الاعتماد</div>
                                    <?php if(!empty($candidate['hr_signature_image'])): ?>
                                        <img src="<?= base_url($candidate['hr_signature_image']) ?>" class="img-fluid my-2" style="max-height: 50px;">
                                    <?php endif; ?>
                                    <small class="text-muted d-block">بواسطة: <?= $assigned_hr_name ?></small>
                                    <small class="text-muted"><?= date('Y-m-d H:i', strtotime($candidate['hr_signature_date'])) ?></small>
                                </div>
                            <?php else: ?>
                                <div class="mb-2 text-muted small">المسؤول: <strong><?= $assigned_hr_name ?></strong></div>

                                <?php if($uid == $candidate['assigned_hr_id'] || $uid == 1526 || $uid == 2200 || $uid == 2439): ?>
                                    <button type="button" class="btn btn-outline-primary w-100 py-3" onclick="openSignatureModal('hr')">
                                        <i class="fas fa-pen-fancy me-2"></i> توقيع الموارد البشرية
                                    </button>
                                <?php else: ?>
                                    <div class="p-3 bg-light rounded text-muted small">بانتظار التوقيع</div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>

                    </div>

                </div>
            </div>
            <?php endif; ?>

            <?php if(($offer['candidate_response'] == 'Accepted' || $offer['status'] == 'Accepted') && !empty($offer['signed_document'])): ?>
                <div class="mt-4">
                     <a href="<?= base_url('portal/show_signed_document/' . $offer['token']) ?>" 
                       target="_blank" 
                       class="btn btn-success w-100 py-3 shadow-sm fw-bold">
                        <i class="fas fa-file-contract fa-lg me-2"></i> عرض العرض الوظيفي الموقع (Signed Contract)
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
<div class="modal fade" id="previewOfferModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable"> <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title">
                    <i class="fas fa-search me-2"></i> معاينة العرض الوظيفي
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0" style="height: 80vh; background: #f8f9fa;">
                <iframe src="<?= base_url('offers/preview_offer/' . $offer['id']) ?>" 
                        style="width: 100%; height: 100%; border: none;" 
                        title="Offer Preview">
                </iframe>
            </div>
            <div class="modal-footer justify-content-between">
                <span class="text-muted small">
                    <i class="fas fa-info-circle"></i> هذه معاينة فقط. الأزرار داخل العرض قد لا تعمل حتى يتم إرسال الرابط الرسمي.
                </span>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="signatureModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">التوقيع الإلكتروني</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <?= form_open('offers/sign_commencement_digital', ['id' => 'digitalSigForm']) ?>
                <input type="hidden" name="offer_id" value="<?= $offer['id'] ?>">
                <input type="hidden" name="role_type" id="sigRoleType">
                <input type="hidden" name="signature_data" id="sigDataInput">
                
                <div class="modal-body">
                    <p class="text-muted small mb-2">يرجى التوقيع في المربع أدناه:</p>
                    <div class="signature-pad-wrapper" style="border: 2px dashed #ccc; height: 200px; position: relative;">
                        <button type="button" class="btn btn-sm btn-light border position-absolute top-0 end-0 m-1" onclick="signaturePad.clear()">
                            <i class="fas fa-eraser"></i> مسح
                        </button>
                        <canvas id="adminSigCanvas" style="width: 100%; height: 100%;"></canvas>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="btn btn-primary px-4" onclick="submitAdminSignature()">
                        <i class="fas fa-save me-1"></i> حفظ التوقيع
                    </button>
                </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<div class="modal fade" id="recreateOfferModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning text-dark">
                <h5 class="modal-title fw-bold">
                    <i class="fas fa-edit me-2"></i> تعديل وإعادة إرسال العرض
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            
            <form action="<?= base_url('offers/resubmit_offer') ?>" method="post">
                <input type="hidden" name="offer_id" value="<?= $offer['id'] ?>">
                
                <div class="modal-body bg-light">
                    <div class="alert alert-info small">
                        <i class="fas fa-info-circle"></i> عند الحفظ، سيتم تغيير حالة العرض إلى <strong>"Pending HR"</strong> وإعادة دورة الاعتمادات من البداية.
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">رقم الهوية / الإقامة</label>
                            <input type="text" name="id_number" class="form-control" value="<?= $offer['id_number'] ?>" required>
                        </div>
                         <div class="col-md-6">
                            <label class="form-label fw-bold">الرقم الوظيفي (اختياري)</label>
                            <input type="text" name="employee_id" class="form-control" value="<?= isset($offer['employee_id']) ? $offer['employee_id'] : '' ?>">
                        </div>

                        <div class="col-6">
    <small class="text-muted d-block">تاريخ المباشرة المقترح</small>
    <div class="d-flex align-items-center gap-2">
        <p class="fw-bold mb-0" id="displayStartDate"><?= $offer['start_date'] ?></p>
        
        <?php 
        // Check Permissions for Edit Icon
        $can_edit_date = (in_array($uid, [1526, 2200, 2439, 64]) || $this->session->userdata('role') == 'recruitment_manager');
        ?>
        
        <?php if($can_edit_date): ?>
            <button type="button" class="btn btn-sm btn-outline-secondary p-0 px-2" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editDateModal" 
                    title="تعديل التاريخ فقط">
                <i class="fas fa-pen small"></i>
            </button>
        <?php endif; ?>
    </div>
</div>
                        <hr>
                        <h6 class="fw-bold text-primary">البيانات المالية</h6>

                        <div class="col-md-3">
                            <label class="small text-muted">الراتب الأساسي</label>
                            <input type="number" step="0.01" class="form-control salary-input" name="basic_salary" value="<?= $offer['basic_salary'] ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="small text-muted">بدل السكن</label>
                            <input type="number" step="0.01" class="form-control salary-input" name="housing_allowance" value="<?= $offer['housing_allowance'] ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="small text-muted">بدل النقل</label>
                            <input type="number" step="0.01" class="form-control salary-input" name="transport_allowance" value="<?= $offer['transport_allowance'] ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label class="small text-muted">بدل اتصال/أخرى</label>
                            <input type="number" step="0.01" class="form-control salary-input" name="communication_allowance" value="<?= $offer['communication_allowance'] ?>" required>
                        </div>

                        <div class="col-md-12">
                            <div class="p-3 bg-white border rounded text-center mt-2">
                                <label class="fw-bold text-success">إجمالي الراتب الشهري</label>
                                <input type="number" step="0.01" id="totalSalaryDisplay" name="total_salary" class="form-control text-center fw-bold fs-4 text-success border-0 bg-white" value="<?= $offer['total_salary'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-warning fw-bold px-4" onclick="return confirm('هل أنت متأكد من تعديل البيانات وإعادة الإرسال؟')">
                        <i class="fas fa-paper-plane me-2"></i> حفظ وإرسال للاعتماد
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editDateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light py-2">
                <h6 class="modal-title fw-bold">تحديث تاريخ المباشرة</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('offers/update_start_date_only') ?>" method="post">
                <input type="hidden" name="offer_id" value="<?= $offer['id'] ?>">
                
                <div class="modal-body">
                    <label class="small text-muted mb-1">التاريخ الجديد:</label>
                    <input type="date" name="start_date" class="form-control" value="<?= $offer['start_date'] ?>" required>
                </div>
                
                <div class="modal-footer p-1">
                    <button type="submit" class="btn btn-primary btn-sm w-100">حفظ التغيير</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    var signaturePad;
    var canvas = document.getElementById('adminSigCanvas');

    document.addEventListener('DOMContentLoaded', function() {
        signaturePad = new SignaturePad(canvas, {
            backgroundColor: 'rgba(255, 255, 255, 0)',
            penColor: 'rgb(0, 0, 0)'
        });
    });

    function openSignatureModal(role) {
        document.getElementById('sigRoleType').value = role;
        
        var myModal = new bootstrap.Modal(document.getElementById('signatureModal'));
        myModal.show();

        setTimeout(resizeCanvas, 500);
    }

    function resizeCanvas() {
        var ratio = Math.max(window.devicePixelRatio || 1, 1);
        canvas.width = canvas.offsetWidth * ratio;
        canvas.height = canvas.offsetHeight * ratio;
        canvas.getContext("2d").scale(ratio, ratio);
        signaturePad.clear(); 
    }

    function submitAdminSignature() {
        if (signaturePad.isEmpty()) {
            alert("الرجاء التوقيع أولاً.");
            return;
        }
        document.getElementById('sigDataInput').value = signaturePad.toDataURL('image/png');
        document.getElementById('digitalSigForm').submit();
    }

    function copyToClipboard(elementId) {
        var copyText = document.getElementById(elementId);
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        try {
            document.execCommand('copy');
            alert('تم نسخ الرابط');
        } catch (err) {
            alert('فشل النسخ');
        }
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inputs = document.querySelectorAll('.salary-input');
        const totalDisplay = document.getElementById('totalSalaryDisplay');

        function calculateTotal() {
            let total = 0;
            inputs.forEach(input => {
                total += parseFloat(input.value) || 0;
            });
            totalDisplay.value = total.toFixed(2); // Remove comma formatting for input value
        }

        inputs.forEach(input => {
            input.addEventListener('input', calculateTotal);
        });
    });
</script>