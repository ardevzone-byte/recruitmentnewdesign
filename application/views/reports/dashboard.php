<div dir="rtl" class="rows col-12 jobs-dashboard recruitment-page reports-analytics-dashboard">
    <div class="block col-12 mb-4 heading-white">
        <div class="head-table col-12 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <h4 class="reports-analytics-dashboard__title mb-0"><i class="bi bi-bar-chart-line me-2"></i> لوحة التقارير التحليلية</h4>
            <a href="<?= base_url('reports/export_excel?' . ($_SERVER['QUERY_STRING'] ?? '')) ?>" class="button hex-btn small">
                <i class="bi bi-file-earmark-excel me-1"></i> تصدير Excel
            </a>
        </div>
    </div>

    <div class="block col-12 mb-4">
        <div class="box col-12 p-3">
            <form method="get" action="<?= base_url('reports') ?>" class="row g-3 align-items-end">
                <div class="col-md-2">
                    <label class="form-label fw-bold">من تاريخ</label>
                    <input type="date" name="start_date" class="form-control" value="<?= $filters['start_date'] ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold">إلى تاريخ</label>
                    <input type="date" name="end_date" class="form-control" value="<?= $filters['end_date'] ?? '' ?>">
                </div>

                <div class="col-md-2">
                    <label class="form-label fw-bold">الوظيفة</label>
                    <select name="position" class="form-select">
                        <option value="">الكل</option>
                        <?php if(!empty($jobs_list)): ?>
                            <?php foreach($jobs_list as $job): ?>
                                <option value="<?= $job['id'] ?>" <?= (isset($filters['position']) && $filters['position'] == $job['id']) ? 'selected' : '' ?>>
                                    <?= $job['job_title'] ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label fw-bold">الموقع</label>
                    <select name="location" class="form-select">
                        <option value="">الكل</option>
                        <option value="Riyadh" <?= (isset($filters['location']) && $filters['location'] == 'Riyadh') ? 'selected' : '' ?>>الرياض</option>
                        <option value="Jeddah" <?= (isset($filters['location']) && $filters['location'] == 'Jeddah') ? 'selected' : '' ?>>جدة</option>
                        <option value="Dammam" <?= (isset($filters['location']) && $filters['location'] == 'Dammam') ? 'selected' : '' ?>>الدمام</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label fw-bold">الموظف (Recruiter)</label>
                    <select name="recruiter_id" class="form-select">
                        <option value="">عرض الكل</option>
                        <?php if(isset($recruitment_team)): ?>
                            <?php foreach($recruitment_team as $user): ?>
                                <option value="<?= $user['id'] ?>" <?= (isset($filters['recruiter_id']) && $filters['recruiter_id'] == $user['id']) ? 'selected' : '' ?>>
                                    <?= $user['name'] ?>
                                </option>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="form-label fw-bold">حالة العرض</label>
                    <select name="offer_status" class="form-select">
                        <option value="">الكل</option>
                        <?php 
                        $statuses = [
                            'Pending' => 'قيد الإعداد (Pending)',
                            'Pending HR' => 'بانتظار HR',
                            'Pending RM' => 'بانتظار المدير',
                            'Approved' => 'معتمد (Approved)',
                            'Sent' => 'تم الإرسال (Sent)',
                            'Accepted' => 'مقبول (Accepted)',
                            'Rejected' => 'مرفوض (Rejected)',
                            'Offer Rejected' => 'رفض من المرشح',
                            'Completed' => 'مكتمل (Completed)'
                        ];
                        foreach($statuses as $key => $label): ?>
                            <option value="<?= $key ?>" <?= (isset($filters['offer_status']) && $filters['offer_status'] == $key) ? 'selected' : '' ?>>
                                <?= $label ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-12 text-end mt-3">
                    <button type="submit" class="button hex-btn"><i class="bi bi-funnel me-1"></i> تصفية النتائج</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary shadow h-100" onclick="loadDetails('total')" style="cursor: pointer; transition: transform 0.2s;">
                <div class="card-body text-center">
                    <h1 class="display-4 fw-bold"><?= $kpi['total_apps'] ?></h1>
                    <p class="card-text fs-5">إجمالي المتقدمين</p>
                    <small class="text-white-50"><i class="fas fa-hand-pointer"></i> اضغط للتفاصيل</small>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card text-white bg-warning shadow h-100" onclick="loadDetails('interviewed')" style="cursor: pointer; transition: transform 0.2s;">
                <div class="card-body text-center">
                    <h1 class="display-4 fw-bold"><?= $kpi['interviewed'] ?></h1>
                    <p class="card-text fs-5">تمت مقابلتهم</p>
                    <small class="text-white-50"><i class="fas fa-hand-pointer"></i> اضغط للتفاصيل</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-info shadow h-100" onclick="loadDetails('offered')" style="cursor: pointer; transition: transform 0.2s;">
                <div class="card-body text-center">
                    <h1 class="display-4 fw-bold"><?= $kpi['offered'] ?></h1>
                    <p class="card-text fs-5">عروض وظيفية</p>
                    <small class="text-white-50"><i class="fas fa-hand-pointer"></i> اضغط للتفاصيل</small>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success shadow h-100" onclick="loadDetails('hired')" style="cursor: pointer; transition: transform 0.2s;">
                <div class="card-body text-center">
                    <h1 class="display-4 fw-bold"><?= $kpi['hired'] ?></h1>
                    <p class="card-text fs-5">تم التوظيف</p>
                    <small class="text-white-50"><i class="fas fa-hand-pointer"></i> اضغط للتفاصيل</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card shadow h-100">
                <div class="card-header bg-white fw-bold">حالة الطلبات</div>
                <div class="card-body">
                    <div style="height: 300px;">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow h-100">
                <div class="card-header bg-white fw-bold">اتجاه التوظيف (آخر 6 أشهر)</div>
                <div class="card-body">
                    <div style="height: 300px;">
                        <canvas id="trendChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-5">
        <div class="card-header bg-dark text-white fw-bold">
            <i class="fas fa-users-cog"></i> أداء فريق التوظيف
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0 text-center align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>الموظف</th>
                            <th>المقابلات (Interviews)</th>
                            <th>التقييمات (Evaluations)</th>
                            <th>العروض (Offers)</th>
                            <th>إجمالي العمليات</th>
                            <th>مستوى النشاط</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($recruiters)): ?>
                            <?php foreach($recruiters as $rec): ?>
                            <tr>
                                <td class="text-start px-4">
                                    <div class="fw-bold"><?= $rec['name'] ?></div>
                                    <span class="badge bg-secondary text-white small"><?= $rec['username'] ?></span>
                                </td>
                                
                                <td>
                                    <span class="badge bg-warning text-dark fs-6">
                                        <?= $rec['interviews_conducted'] ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="badge bg-info text-dark fs-6">
                                        <?= $rec['evaluations_made'] ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="badge bg-success fs-6">
                                        <?= $rec['offers_created'] ?>
                                    </span>
                                </td>

                                <?php $total = $rec['interviews_conducted'] + $rec['offers_created'] + $rec['evaluations_made']; ?>
                                <td class="fw-bold fs-5 text-primary"><?= $total ?></td>

                                <td>
                                    <?php if($total > 15): ?>
                                        <span class="text-success fw-bold"><i class="fas fa-fire"></i> ممتاز</span>
                                    <?php elseif($total > 5): ?>
                                        <span class="text-primary"><i class="fas fa-thumbs-up"></i> جيد</span>
                                    <?php else: ?>
                                        <span class="text-muted">منخفض</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-muted py-4">لا توجد بيانات متاحة حالياً</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-5">
        <div class="card-header bg-success text-white fw-bold d-flex justify-content-between align-items-center">
            <span><i class="fas fa-file-contract"></i> تقرير العروض الوظيفية (Job Offers)</span>
            <span class="badge bg-white text-success"><?= isset($offers_report) ? count($offers_report) : 0 ?> عرض</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0 text-center align-middle" style="font-size: 0.9rem;">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>المرشح</th>
                            <th>الرقم الوظيفي</th>
                            <th>مقر العمل</th>
                            <th>المسمى الوظيفي</th>
                            <th>الراتب الإجمالي</th>
                            <th>حالة العرض</th>
                            <th>حالة الطلب (Application)</th>
                            <th>المسؤول (Recruiter)</th>
                            <th>تاريخ الإنشاء</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($offers_report)): ?>
                            <?php foreach($offers_report as $offer): ?>
                            <tr>
                                <td><?= $offer['offer_id'] ?></td>
                                
                                <td class="fw-bold text-start">
                                    <a href="<?= base_url('candidates/view/' . $offer['application_id']) ?>" 
                                       target="_blank" 
                                       class="text-decoration-none text-primary">
                                        <?= $offer['candidate_name'] ?> <i class="fas fa-external-link-alt small ms-1"></i>
                                    </a>
                                </td>

                                <td>
                                    <?php if(!empty($offer['employee_id'])): ?>
                                        <span class="badge bg-light text-dark border font-monospace"><?= $offer['employee_id'] ?></span>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>

                                <td><?= !empty($offer['work_location']) ? $offer['work_location'] : '<span class="text-muted">-</span>' ?></td>

                                <td><?= $offer['job_title'] ?></td>
                                <td class="text-success fw-bold"><?= number_format($offer['total_salary']) ?></td>
                                
                                <td>
                                    <?php 
                                        $offer_badge = 'secondary';
                                        if($offer['offer_status'] == 'Approved') $offer_badge = 'primary';
                                        if($offer['candidate_response'] == 'Accepted') $offer_badge = 'success';
                                        if($offer['candidate_response'] == 'Rejected' || $offer['offer_status'] == 'Rejected') $offer_badge = 'danger';
                                    ?>
                                    <span class="badge bg-<?= $offer_badge ?>">
                                        <?= $offer['candidate_response'] ? $offer['candidate_response'] : $offer['offer_status'] ?>
                                    </span>
                                </td>

                                <td>
                                    <span class="badge bg-info text-dark">
                                        <?= $offer['application_status'] ?>
                                    </span>
                                </td>

                                <td><?= $offer['recruiter_name'] ?></td>
                                <td class="small text-muted"><?= date('Y-m-d', strtotime($offer['offer_date'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-muted py-4">لا توجد عروض وظيفية تطابق الفلتر</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="modal fade" id="detailsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title fw-bold" id="modalTitle">تفاصيل القائمة</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <div id="modalContent" class="text-center p-5">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="mt-2">جاري تحميل البيانات...</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
    // 1. Status Pie Chart
    const statusCtx = document.getElementById('statusChart').getContext('2d');
    const statusData = <?= json_encode($status_chart) ?>;
    
    new Chart(statusCtx, {
        type: 'doughnut',
        data: {
            labels: statusData.map(item => item.status),
            datasets: [{
                data: statusData.map(item => item.count),
                backgroundColor: [
                    '#0d6efd', '#198754', '#ffc107', '#dc3545', '#0dcaf0', '#6c757d', '#6610f2', '#fd7e14'
                ]
            }]
        },
        options: { responsive: true, maintainAspectRatio: false }
    });

    // 2. Trend Line Chart
    const trendCtx = document.getElementById('trendChart').getContext('2d');
    const trendData = <?= json_encode($trend_chart) ?>;

    new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: trendData.map(item => item.month),
            datasets: [{
                label: 'عدد المرشحين الجدد',
                data: trendData.map(item => item.count),
                borderColor: '#ff8c00',
                backgroundColor: 'rgba(255, 140, 0, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: { 
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // 3. Load Details Modal via AJAX
    function loadDetails(type) {
        // Get values from filters to keep context
        const startDate = $('input[name="start_date"]').val();
        const endDate = $('input[name="end_date"]').val();
        const position = $('select[name="position"]').val();
        const location = $('select[name="location"]').val();
        const recruiter = $('select[name="recruiter_id"]').val();

        // Set Title
        let title = 'التفاصيل';
        if(type === 'total') title = 'قائمة إجمالي المتقدمين';
        if(type === 'interviewed') title = 'قائمة من تمت مقابلتهم';
        if(type === 'offered') title = 'قائمة العروض الوظيفية';
        if(type === 'hired') title = 'قائمة من تم توظيفهم';
        $('#modalTitle').text(title);

        // Show Modal & Reset Content
        var myModal = new bootstrap.Modal(document.getElementById('detailsModal'));
        myModal.show();
        $('#modalContent').html('<div class="text-center p-5"><div class="spinner-border text-primary"></div><p class="mt-2">جاري التحميل...</p></div>');

        // AJAX Call
        $.ajax({
            url: '<?= base_url("reports/get_kpi_details") ?>',
            type: 'GET',
            data: {
                type: type,
                start_date: startDate,
                end_date: endDate,
                position: position,
                location: location,
                recruiter_id: recruiter
            },
            success: function(response) {
                $('#modalContent').html(response);
            },
            error: function(xhr, status, error) {
                // هذا التعديل سيظهر لك الخطأ الحقيقي القادم من السيرفر
                console.log(xhr.responseText); 
                $('#modalContent').html('<div class="text-center text-danger p-4" dir="ltr"><h5>Error Occurred:</h5><br>' + error + '<br><small>Check console for details</small></div>');
            }
        });
    }
</script>