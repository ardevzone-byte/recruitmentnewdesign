<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تم استلام الرد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .icon-box {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card p-5 text-center">
                
                <?php if ($response == 'Accepted'): ?>
                    <div class="icon-box bg-success text-white">
                        <i class="fas fa-check fa-3x"></i>
                    </div>
                    <h2 class="text-success mb-3">شكراً لك!</h2>
                    <h4 class="mb-4">تم استلام قبولك للعرض بنجاح</h4>
                    <p class="text-muted">
                        لقد تم إرسال العرض الموقع إلى فريق الموارد البشرية.
                        سيتواصل معك المختص قريباً لاستكمال إجراءات التوظيف.
                    </p>
                
                <?php else: ?>
                    <div class="icon-box bg-secondary text-white">
                        <i class="fas fa-paper-plane fa-3x"></i>
                    </div>
                    <h2 class="text-secondary mb-3">تم تسجيل ردك</h2>
                    <h4 class="mb-4">لقد قمت برفض العرض الوظيفي</h4>
                    <p class="text-muted">
                        شكراً لوقتك واهتمامك. نتمنى لك التوفيق في مسيرتك المهنية القادمة.
                    </p>
                <?php endif; ?>

                <div class="mt-4">
                    <a href="#" onclick="window.close()" class="btn btn-outline-dark px-4">إغلاق الصفحة</a>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>