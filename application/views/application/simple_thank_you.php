<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card border-0 shadow-lg text-center">
                <div class="card-body p-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 4rem;"></i>
                    </div>
                    
                    <h2 class="mb-3 text-success">تم استلام طلبك بنجاح!</h2>
                    
                    <p class="lead mb-4"><?= $message ?></p>
                    
                    <?php if(isset($full_form_url)): ?>
                    <div class="alert alert-info text-start">
                        <h5><i class="fas fa-link me-2"></i> رابط استكمال البيانات:</h5>
                        <div class="input-group mt-2">
                            <input type="text" class="form-control" id="fullFormLink" 
                                   value="<?= $full_form_url ?>" readonly>
                            <button class="btn btn-outline-secondary" type="button" 
                                    onclick="copyToClipboard('fullFormLink')">
                                <i class="fas fa-copy"></i> نسخ
                            </button>
                        </div>
                        <small class="text-muted d-block mt-2">
                            سيتم إرسال هذا الرابط إليك عبر SMS لإكمال باقي بيانات طلب التوظيف
                        </small>
                    </div>
                    <?php endif; ?>
                    
                    <div class="mt-4">
                        <a href="<?= base_url() ?>" class="btn btn-outline-primary">
                            <i class="fas fa-home me-2"></i> العودة للرئيسية
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(elementId) {
    var copyText = document.getElementById(elementId);
    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");
    alert("تم نسخ الرابط!");
}
</script>

</body>
</html>