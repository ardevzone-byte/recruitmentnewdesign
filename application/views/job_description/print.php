<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>طباعة الوصف الوظيفي #<?= (int)$jd['id'] ?></title>

  <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@600;800&family=Tajawal:wght@300;400;500;700;800&display=swap" rel="stylesheet">

  <style>
    :root{
      --ink:#111;
      --muted:#444;
      --line:#e7e7e7;
      --brand:#001f3f;
      --accent:#FF8C00;
    }

    body{
      font-family:'Tajawal', sans-serif;
      direction:rtl;
      color:var(--ink);
      background:#f3f5f7;
      margin:0;
      padding:18px;
    }

    /* شريط أدوات (يختفي عند الطباعة) */
    .toolbar{
      max-width: 900px;
      margin: 0 auto 12px;
      display:flex;
      gap:10px;
      flex-wrap:wrap;
      justify-content:space-between;
      align-items:center;
    }
    .btn{
      background:#fff;
      border:1px solid rgba(0,0,0,.12);
      border-radius:12px;
      padding:10px 14px;
      font-weight:800;
      cursor:pointer;
      text-decoration:none;
      color:#111;
      display:inline-flex;
      align-items:center;
      gap:8px;
    }
    .btn.primary{
      border-color: rgba(255,140,0,.45);
      box-shadow: 0 10px 25px rgba(255,140,0,.10);
    }

    /* ورقة A4 */
    .page{
      width: 210mm;
      min-height: 297mm;
      margin: 0 auto;
      background:#fff;
      border:1px solid rgba(0,0,0,.08);
      border-radius: 14px;
      box-shadow: 0 14px 45px rgba(0,0,0,.08);
      padding: 18mm 16mm;
      box-sizing:border-box;
    }

    .hdr{
      display:flex;
      justify-content:space-between;
      gap:12px;
      border-bottom: 3px solid var(--line);
      padding-bottom:12px;
      margin-bottom:12px;
    }

    .hdr h1{
      font-family:'El Messiri', serif;
      font-size: 20px;
      margin:0;
      color:var(--brand);
    }

    .meta{
      font-size: 12.5px;
      line-height: 1.9;
      color:var(--muted);
      margin-top: 6px;
    }

    .meta b{ color:#111; }

    .badge{
      display:inline-block;
      font-weight:800;
      font-size:12px;
      padding:6px 10px;
      border-radius: 999px;
      border:1px solid rgba(0,0,0,.12);
      background: rgba(255,140,0,.08);
      margin-bottom: 8px;
    }
    .box{ overflow:hidden; }


    .box{
      border:1px solid var(--line);
      border-radius: 14px;
      padding: 12px 12px;
      margin-top: 12px;
    }
    .box h3{
      margin:0 0 8px;
      font-size: 14.5px;
      color:var(--brand);
      font-weight:900;
    }


    .desc{
  white-space: pre-wrap;
  line-height: 2;
  font-size: 13px;
  color:#111;

  /* ✅ يمنع خروج أي نص مهما كان طويل */
  overflow-wrap: anywhere;
  word-break: break-word;
  word-wrap: break-word;
}


    .sig-grid{
      width:100%;
      border-collapse:separate;
      border-spacing:10px;
      margin-top: 6px;
    }
    .sig{
      border:1px dashed #bcbcbc;
      border-radius: 14px;
      padding: 10px;
      height: 130px;
      vertical-align:top;
    }
    .role{ font-weight:900; color:#111; margin-bottom:6px; }
    .small{ color:#555; font-size:12.5px; line-height:1.7; }
    .status{
      display:inline-block;
      padding:4px 8px;
      border-radius: 999px;
      border:1px solid rgba(0,0,0,.12);
      font-weight:900;
      font-size: 12px;
      margin-top: 6px;
    }

    .sig img{ max-width: 100%; max-height: 65px; margin-top:10px; }

    .footer{
      margin-top: 14px;
      font-size: 11.5px;
      color:#666;
      text-align:center;
    }

    /* إعدادات الطباعة */
    @page{
      size: A4;
      margin: 10mm;
    }
    @media print{
      body{ background:#fff; padding:0; }
      .toolbar{ display:none !important; }
      .page{
        width:auto;
        min-height:auto;
        border:0;
        box-shadow:none;
        border-radius:0;
        padding: 0;
      }
    }
  </style>
</head>

<body>

  <div class="toolbar">
    <div style="display:flex;gap:10px;flex-wrap:wrap;">
      <button class="btn primary" onclick="window.print()">🖨️ طباعة / حفظ PDF</button>
      <a class="btn" href="<?= site_url('job_description/view/'.(int)$jd['id']); ?>">⬅️ رجوع</a>
    </div>
    <div class="badge">وثيقة رسمية — الوصف الوظيفي</div>
  </div>

  <div class="page">

    <div class="hdr">
      <div>
        <h1>نموذج الوصف الوظيفي</h1>
        <div class="meta">
          رقم المستند: <b>#<?= (int)$jd['id'] ?></b><br>
          تاريخ الإنشاء: <b><?= html_escape($jd['created_at']) ?></b><br>
          المسمى الوظيفي: <b><?= html_escape($jd['job_title']) ?></b>
        </div>
      </div>

      <div style="text-align:left">
        <div class="meta">
          الموظف: <b><?= html_escape($jd['employee_name']) ?></b><br>
          الرقم الوظيفي: <b><?= html_escape($jd['employee_id']) ?></b><br>
          Job Offer ID: <b><?= (int)$jd['job_offer_id'] ?></b>
        </div>
      </div>
    </div>

    <div class="box">
      <h3>الوصف الوظيفي</h3>
      <div class="desc"><?= nl2br(html_escape($jd['description_text'])) ?></div>
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
                الحالة:
                <span class="status"><?= html_escape($a['status']) ?></span>
                <?= $a['signed_at'] ? '<div class="small">التاريخ: <b>'.html_escape($a['signed_at']).'</b></div>' : '' ?>
              </div>

              <?php if(!empty($a['signature_file']) && file_exists(FCPATH.$a['signature_file'])): ?>
                <img src="<?= base_url($a['signature_file']); ?>" alt="signature">
              <?php else: ?>
                <div class="small" style="margin-top:16px;color:#888">— لا يوجد توقيع —</div>
              <?php endif; ?>
            </td>
          <?php endforeach; ?>
        </tr>
      </table>
    </div>

    <div class="footer">
      تم إنشاء هذه الوثيقة عبر نظام مرسوم — يمكن طباعتها أو حفظها كـ PDF مباشرة من المتصفح.
    </div>

  </div>

  <script>
    // خيار: فتح نافذة الطباعة تلقائيًا عند فتح الصفحة
    // window.onload = () => window.print();
  </script>
</body>
</html>
