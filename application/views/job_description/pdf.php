<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <style>
    /* ✅ تحميل خط Tajawal من مسار السيرفر (موجود عندك داخل application/fonts) */
    @font-face{
      font-family: "Tajawal";
      src: url("<?= FCPATH ?>application/fonts/Tajawal-Regular.ttf") format("truetype");
      font-weight: normal;
      font-style: normal;
    }
    @font-face{
      font-family: "Tajawal";
      src: url("<?= FCPATH ?>application/fonts/Tajawal-Bold.ttf") format("truetype");
      font-weight: bold;
      font-style: normal;
    }

    /* ✅ إعدادات اللغة العربية والاتجاه */
    html, body{
      font-family: "Tajawal", DejaVu Sans, sans-serif;
      direction: rtl;
      unicode-bidi: embed;
      color:#111;
      font-size:12px;
      margin:0;
      padding:0;
    }

    .hdr{
      border-bottom:2px solid #eee;
      padding-bottom:10px;
      margin-bottom:10px
    }

    h1{
      margin:0;
      font-size:18px;
      font-weight:bold;
    }

    .meta{
      color:#333;
      line-height:1.8
    }

    .box{
      border:1px solid #e7e7e7;
      border-radius:10px;
      padding:10px;
      margin-top:10px
    }

    .box h3{
      margin:0 0 8px;
      font-size:14px;
      font-weight:bold;
    }

    .sig-grid{
      width:100%;
      margin-top:10px;
      border-collapse:separate;
      border-spacing:10px
    }

    .sig{
      border:1px dashed #bbb;
      border-radius:10px;
      padding:10px;
      vertical-align:top;
      height:150px
    }

    .role{
      font-weight:bold;
      margin-bottom:6px
    }

    img{
      max-width:100%;
      max-height:80px;
      margin-top:10px
    }

    .small{
      color:#555;
      line-height:1.7
    }

    /* ✅ تحسين بسيط للمسافات */
    .desc{
      white-space:pre-wrap;
      line-height:1.9;
      font-size:12px;
      color:#111;
    }
  </style>
</head>

<body>

<div class="hdr">
  <table width="100%">
    <tr>
      <td>
        <h1>نموذج الوصف الوظيفي</h1>
        <div class="meta">
          رقم المستند: <b>#<?= (int)$jd['id'] ?></b><br>
          تاريخ الإنشاء: <?= html_escape($jd['created_at']) ?><br>
          المسمى الوظيفي: <b><?= html_escape($jd['job_title']) ?></b>
        </div>
      </td>

      <td style="text-align:left">
        <div class="meta">
          الموظف: <b><?= html_escape($jd['employee_name']) ?></b><br>
          الرقم الوظيفي: <b><?= html_escape($jd['employee_id']) ?></b><br>
          Job Offer ID: <b><?= (int)$jd['job_offer_id'] ?></b>
        </div>
      </td>
    </tr>
  </table>
</div>

<div class="box">
  <h3>الوصف الوظيفي</h3>
  <div class="desc"><?= html_escape($jd['description_text']) ?></div>
</div>

<div class="box">
  <h3>التعميد والتوقيعات</h3>

  <table class="sig-grid">
    <tr>
      <?php foreach($approvals as $a): ?>
        <td class="sig" width="33%">
          <div class="role">
            <?= ($a['role']==='employee' ? 'الموظف' : ($a['role']==='supervisor' ? 'المشرف المباشر' : 'مدير الموارد البشرية')); ?>
          </div>

          <div class="small">الاسم: <?= html_escape($a['approver_name']) ?> (<?= html_escape($a['approver_username']) ?>)</div>
          <div class="small">
            الحالة: <b><?= html_escape($a['status']) ?></b>
            <?= $a['signed_at'] ? ' — '.$a['signed_at'] : '' ?>
          </div>

          <?php if(!empty($a['signature_file']) && file_exists(FCPATH.$a['signature_file'])): ?>
            <img src="<?= FCPATH.$a['signature_file']; ?>" alt="signature">
          <?php else: ?>
            <div class="small" style="margin-top:18px;color:#888">— لا يوجد توقيع —</div>
          <?php endif; ?>
        </td>
      <?php endforeach; ?>
    </tr>
  </table>
</div>

</body>
</html>
