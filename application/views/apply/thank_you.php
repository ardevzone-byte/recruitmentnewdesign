<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($title) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body { font-family: 'Tajawal', sans-serif; background-color: #f4f7f6; }
    .card { border-radius: 0.75rem; border: none; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
  </style>
</head>
<body>
  <div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="col-lg-6">
      <div class="card text-center shadow-lg">
        <div class="card-body p-5">
          <i class="fas fa-check-circle display-1 text-success mb-3" style="font-size: 5rem;"></i>
          <h1 class="fw-bold"><?= htmlspecialchars($title) ?></h1>
          <p class="lead text-muted"><?= htmlspecialchars($message) ?></p>
          <p class="mt-4">فريق التوظيف، شركة مرسوم</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>