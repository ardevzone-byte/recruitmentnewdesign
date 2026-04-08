<div dir="rtl" class="rows col-12 jobs-dashboard recruitment-page">
    <div class="block col-12 mb-4 heading-white">
        <div class="head-table col-12 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <h4><i class="bi bi-archive me-2"></i> أرشيف المرشحين</h4>
            <?php 
            $current_user = $this->session->userdata('username');
            if (in_array($current_user, ['1526', '1291','2200','2439']) || $this->session->userdata('role') == 'recruitment_manager'): 
            ?>
                <a href="<?= base_url('candidates/add_manual') ?>" class="button hex-btn">
                    <span class="plus hex"></span> إضافة مرشح
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="block col-12 mb-4">
        <div class="box col-12">
            <?= form_open('candidates/archive', ['method' => 'get', 'class' => 'row g-2 align-items-center']) ?>
                
                <div class="col-md-5">
                    <div class="custom-input-group">
                        <span class="icon-right"><i class="bi bi-search"></i></span>
                        <input type="text" name="search_query" class="form-control custom-input" 
                               placeholder="بحث بالاسم، الإيميل، أو الوظيفة..." 
                               value="<?= isset($search_q) ? $search_q : '' ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="custom-input-group">
                    <select name="status_filter" class="form-select custom-input">
                        <option value="">-- كل الحالات --</option>
                        <?php 
                        $statuses = [
                            'جديد' => 'جديد (New)',
                            'تحت المراجعة' => 'تحت المراجعة (Review)',
                            'مقابلة' => 'مقابلة (Interview)',
                            'عرض وظيفي' => 'عرض وظيفي (Offer)',
                            'تم التوظيف' => 'تم التوظيف (Hired)',
                            'مرفوض' => 'مرفوض (Rejected)',
                            'مطلوب استكمال البيانات' => 'ناقص البيانات'
                        ];
                        foreach($statuses as $val => $label): 
                        ?>
                            <option value="<?= $val ?>" <?= (isset($current_status) && $current_status == $val) ? 'selected' : '' ?>>
                                <?= $label ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <button type="submit" class="button hex-btn small"><i class="bi bi-funnel me-1"></i> تصفية</button>
                    <a href="<?= base_url('candidates/archive') ?>" class="button hex-btn white small">إلغاء</a>
                </div>

            <?= form_close() ?>
        </div>
    </div>

    <div class="block col-12">
        <div class="box col-12 p-0">
            <div class="table-wrapper-rtl">
            <div class="table-responsive">
                <table class="table table-custom align-middle mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>معلومات الاتصال</th>
                            <th>الوظيفة</th>
                            <th>الحالة</th>
                            <th>تاريخ التقديم</th>
                            <th>الإجراء</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($candidates)): ?>
                            <?php foreach($candidates as $cand): ?>
                            <tr>
                                <td><?= $cand['id'] ?></td>
                                <td class="fw-bold"><?= $cand['full_name'] ?></td>
                                <td>
                                    <div class="small">                                    <i class="bi bi-telephone text-muted"></i> <?= $cand['phone'] ?></div>
                                    <div class="small"><i class="bi bi-envelope text-muted"></i> <?= $cand['email'] ?></div>
                                </td>
                                <td><?= !empty($cand['job_title']) ? $cand['job_title'] : '<span class="text-muted">-</span>' ?></td>
                                
                                <td>
                                    <?php 
                                        $badge = 'secondary';
                                        if($cand['app_status'] == 'جديد') $badge = 'info';
                                        if($cand['app_status'] == 'تم التوظيف') $badge = 'success';
                                        if($cand['app_status'] == 'مرفوض') $badge = 'danger';
                                        if($cand['app_status'] == 'عرض وظيفي') $badge = 'warning';
                                    ?>
                                    <span class="tag <?= in_array($badge, ['success','danger','warning']) ? $badge : '' ?>"><?= $cand['app_status'] ?? 'غير محدد' ?></span>
                                </td>

                                <td><?= !empty($cand['app_date']) ? date('Y-m-d', strtotime($cand['app_date'])) : '-' ?></td>
                                
                                <td>
                                    <?php if(!empty($cand['app_id'])): ?>
                                        <a href="<?= base_url('candidates/view/'.$cand['app_id']) ?>" class="button default orange outline small">
                                            <i class="bi bi-eye me-1"></i> الملف
                                        </a>
                                    <?php else: ?>
                                        <a href="<?= base_url('candidates/link_job/'.$cand['application_id']) ?>" class="button default orange small">
                                            <i class="bi bi-link me-1"></i> ربط بوظيفة
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center py-5 text-muted">
                                    <i class="bi bi-search mb-3 opacity-25" style="font-size:3rem;"></i>
                                    <h5>لا توجد نتائج</h5>
                                    <p>حاول تغيير كلمات البحث أو الفلاتر</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>