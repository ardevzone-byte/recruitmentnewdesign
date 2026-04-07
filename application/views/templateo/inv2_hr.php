<?php /* application/views/templateo/offer_print_a4.php */ ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<title>عرض العمل</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- خط عربي نظيف للطباعة -->
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">

<style>
  /* إعدادات الورقة A4 للطباعة و DOMPDF */
  @page { size: A4; margin: 12mm 12mm 14mm 12mm; }
  html, body { font-family:'Tajawal',system-ui,-apple-system,"Segoe UI",Arial,sans-serif; background:#f4f6f9; color:#111; }
  .a4-sheet { width:210mm; min-height:297mm; margin:10mm auto; background:#fff; box-shadow:0 6px 24px rgba(0,0,0,.08); padding:14mm; }

  /* أزرار الشاشة فقط */
  .no-print { display:flex; gap:.5rem; justify-content:center; margin:12px auto; }
  .btn { border:1px solid #001f3f; color:#001f3f; background:#fff; padding:8px 14px; border-radius:8px; font-weight:700; cursor:pointer; text-decoration:none; display:inline-flex; align-items:center; gap:8px; }
  .btn:hover { background:#001f3f; color:#fff; }
  .btn-secondary { border-color:#999; color:#444; }
  .btn-secondary:hover { background:#444; color:#fff; }

  /* رأس الصفحة */
  .header { display:flex; align-items:center; justify-content:space-between; gap:16px; padding-bottom:10px; border-bottom:2px solid #001f3f; margin-bottom:14px; }
  .brand { display:flex; align-items:center; gap:10px; }
  .brand img { height:64px; width:auto; }
  .brand h1 { font-size:22px; margin:0; font-weight:800; color:#001f3f; letter-spacing:.2px; }
  .meta { text-align:left; font-size:12px; color:#444; }
  .meta .date { font-weight:700; }

  /* عناوين الأقسام */
  .section-title { margin:14px 0 8px; padding:8px 10px; background:#f7f9fc; border-right:4px solid #FF8C00; font-weight:800; }

  /* جداول/شبكات العرض */
  .grid { display:grid; grid-template-columns: 1fr 1fr; gap:8px 12px; }
  .kv { display:grid; grid-template-columns: 38% 62%; border:1px solid #e7ebf0; }
  .kv .k { background:#f7f9fc; padding:6px 8px; font-weight:700; }
  .kv .v { padding:6px 8px; }

  .print-table { width:100%; border-collapse:collapse; }
  .print-table th, .print-table td { border:1px solid #d9dee3; padding:6px 8px; font-size:13px; vertical-align:middle; }
  .print-table th { background:#001f3f; color:#fff; font-weight:700; }
  .label { background:#f2f4f7; color:#333; white-space:nowrap; }

  .muted { color:#666; }
  .small { font-size:12px; }
  .bold { font-weight:700; }
  .center { text-align:center; }
  .space-y-6 > * + * { margin-top:14px; }

  /* توقيعات */
  .sign-row { display:grid; grid-template-columns: 1fr 1fr; gap:12px; margin-top:10px; }
  .sign-box { border:1px dashed #c8cdd3; padding:10px; min-height:60px; }
  .sign-label { font-weight:700; color:#001f3f; margin-bottom:6px; }

  /* فاصل صفحة عند اللزوم */
  .page-break { page-break-before: always; }

  @media print {
    body { background:#fff; }
    .a4-sheet { margin:0; width:auto; min-height:auto; box-shadow:none; padding:0; }
    .no-print { display:none !important; }
    a { color:inherit; text-decoration:none; }
  }
</style>
</head>
<body>

<!-- أزرار للشاشة فقط -->
<div class="no-print">
  <a class="btn" href="javascript:window.print()">طباعة</a>
  <a class="btn btn-secondary" href="javascript:history.back()">رجوع</a>
</div>

<?php
  // حسبة آمنة للإجمالي حتى لو بعض القيم فاضية
  $f1 = (float)($get_customers77['f1'] ?? 0); // أساسي
  $f2 = (float)($get_customers77['f2'] ?? 0); // سكن
  $f3 = (float)($get_customers77['f3'] ?? 0); // مواصلات
  $f4 = (float)($get_customers77['f4'] ?? 0); // اتصالات
  $total = $f1 + $f2 + $f3 + $f4;
?>

<div class="a4-sheet">

  <!-- رأس -->
  <div class="header">
    <div class="brand">
      <?php if (!empty($get_customers77['n11']) && $get_customers77['n11']=="1"): ?>
        <img src="<?php echo base_url('assets/imeges/saleh.png'); ?>" alt="شعار" style="height:40px; width:auto;">
        <h1>مكتب صالح الجربوع محامون ومستشارون</h1>
      <?php else: ?>
        <img src="<?php echo base_url('assets/imeges/m1.png'); ?>" alt="شعار" style="height:40px; width:auto;">
        
      <?php endif; ?>
    </div>
    <div class="meta">
      <div class="date">التاريخ: <?php echo date('Y/m/d'); ?></div>
    </div>
  </div>

  <!-- عنوان الصفحة -->
  <div class="section-title">عرض العمل</div>

  <!-- البيانات العامة -->
  <div class="section-title" style="border-right-color:#001f3f">البيانات العامة</div>
  <div class="grid">
    <div class="kv"><div class="k">الاسم</div><div class="v bold"><?php echo $get_customers77['name']; ?></div></div>
    <div class="kv"><div class="k">الجنسية</div><div class="v"><?php echo $get_customers77['Nationality']; ?></div></div>

    <div class="kv"><div class="k">الوظيفة</div><div class="v"><?php echo $get_customers77['job_name']; ?></div></div>
    <div class="kv"><div class="k">الإدارة / الفرع</div><div class="v"><?php echo $get_customers77['bransh']; ?></div></div>

    <div class="kv"><div class="k">رقم الهوية</div><div class="v"><?php echo $get_customers77['id_number']; ?></div></div>
    <div class="kv"><div class="k">رقم الجوال</div><div class="v"><?php echo $get_customers77['mobile']; ?></div></div>

    <div class="kv"><div class="k">فترة التجربة</div><div class="v">180 يوم</div></div>
    <div class="kv"><div class="k">مدة العقد</div><div class="v">سنة ميلادية</div></div>
  </div>

  <!-- تفاصيل الراتب والمزايا -->
  <div class="section-title">تفاصيل الراتب والمزايا</div>
  <table class="print-table">
    <thead>
      <tr>
        <th class="center" style="width:60%;">البند</th>
        <th class="center" style="width:40%;">القيمة (ريال سعودي)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="label">الراتب الأساسي</td>
        <td class="center bold"><?php echo number_format($f1, 0); ?></td>
      </tr>
      <tr>
        <td class="label">بدل السكن</td>
        <td class="center bold"><?php echo number_format($f2, 0); ?></td>
      </tr>
      <?php if($f3 > 0): ?>
      <tr>
        <td class="label">بدل المواصلات</td>
        <td class="center bold"><?php echo number_format($f3, 0); ?></td>
      </tr>
      <?php endif; ?>
      <?php if($f4 > 0): ?>
      <tr>
        <td class="label">بدل الاتصالات والإنترنت</td>
        <td class="center bold"><?php echo number_format($f4, 0); ?></td>
      </tr>
      <?php endif; ?>
      <tr>
        <td class="label bold">الإجمالي</td>
        <td class="center bold"><?php echo number_format($total, 0); ?></td>
      </tr>
      <tr>
        <td class="label">الإجازة السنوية</td>
        <td class="center">26 يوم عمل مدفوعة الأجر</td>
      </tr>
      <tr>
        <td class="label">التأمين الطبي</td>
        <td class="center">حسب سياسة الشركة</td>
      </tr>
    </tbody>
  </table>

  <!-- الشروط والتعليمات -->
  <div class="section-title">الشروط والتعليمات</div>
  <div class="small" style="line-height:1.9">
    إن هذا العرض ساري المفعول لمدة ثلاثة أيام بدءًا من تاريخه، وتحتفظ الجهة المصدِّرة بحقها في تمديد مدة هذا العرض إذا دعت الحاجة.
    وفي حالة قبول هذا العرض يرجى (التوقيع/الرد على البريد الإلكتروني) وإعادة إرساله. ويُعد العرض لاغيًا في الحالات التالية:
  </div>

  <table class="print-table">
    <tbody>
      <tr><td style="width:10%;text-align:center" class="bold">1</td><td>إذا لم تتم مباشرة العمل حسب التاريخ المحدد.</td></tr>
      <tr><td class="bold center">2</td><td>إذا لم يتم اجتياز الفحوصات الطبية.</td></tr>
      <tr><td class="bold center">3</td><td>إذا لم تُقدَّم الشهادات العلمية والعملية والوثائق الأخرى.</td></tr>
      <tr><td class="bold center">4</td><td>عدم خلو صحيفة السوابق (حسب الأدلة الجنائية).</td></tr>
      <tr><td class="bold center">5</td><td>إذا لم يتم إحضار كفيل غارم.</td></tr>
      <tr><td class="bold center">6</td><td>عدم نقل الخدمات إلى الشركة (لغير السعوديين).</td></tr>
      <tr><td class="bold center">7</td><td>عدم اجتياز اختبار الحاسب الآلي (Word / Excel / الاستخدام العام).</td></tr>
      <tr><td class="bold center">8</td><td>عدم قبول العرض رسميًا (التوقيع أو الرد بالموافقة عبر البريد).</td></tr>
      <tr><td class="bold center">9</td><td>في حال عدم صحة البيانات المُصرّح بها حاليًا أو مستقبلًا.</td></tr>
    </tbody>
  </table>

  <!-- أسئلة إضافية -->
  <div class="section-title">إقرارات إضافية</div>
  <table class="print-table">
    <tbody>
      <tr><td class="label" style="width:60%">أ. هل لديك أي تعثرات مالية لدى أي من الجهات التمويلية؟</td><td style="width:40%"></td></tr>
      <tr><td class="label">ب. هل لديك أي أمراض مزمنة أو معدية لم يتم الإفصاح عنها؟</td><td></td></tr>
      <tr><td class="label">ج. (للسيدات) هل يوجد حمل لم يتم الإفصاح عنه؟</td><td></td></tr>
    </tbody>
  </table>

  <!-- قبول مدير الموارد البشرية -->
  <div class="section-title">قبول مدير إدارة الموارد البشرية</div>
  <div class="sign-box" style="min-height:60px;">
    <div class="small">الاسم:</div>
    <div class="bold">منصور علي أحمد رجب</div>
  </div>

  <!-- خانة توقيع المرشح وحالة القبول وتاريخ المباشرة -->
  <div class="section-title">اعتماد المرشح</div>
  <table class="print-table">
    <thead>
      <tr>
        <th class="center">التوقيع</th>
        <th class="center">حالة القبول</th>
        <th class="center">تاريخ المباشرة</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td style="height:52px;"></td>
        <td class="center">قبول (    ) &nbsp;&nbsp; رفض (    )</td>
        <td class="center bold"><?php echo !empty($get_customers77['f5']) ? $get_customers77['f5'] : '—'; ?></td>
      </tr>
    </tbody>
  </table>

</div><!-- /.a4-sheet -->

<script>
  // زر الطباعة للشاشة فقط
  // (لا حاجة لأي مكتبات خارجية؛ DOMPDF سيأخذ HTML هذا مباشرة عند الحاجة)
</script>
</body>
</html>
