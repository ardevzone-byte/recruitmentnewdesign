<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div dir="rtl" class="rows col-12">
    <div class="block col-12 mb-4">
        <div class="head-table col-12 d-flex flex-wrap align-items-center justify-content-between gap-3">
            <div>
                <h4><i class="bi bi-pen me-2"></i> توقيع واعتماد</h4>
                <p class="text-muted mb-0">الدور: <?= html_escape($my['role'] ?? '') ?> — المستند: #<?= (int)($jd['id'] ?? 0) ?></p>
            </div>
            <a href="<?= site_url('job_description/view/'.$jd['id']) ?>" class="button default orange outline small">
                <i class="bi bi-arrow-right me-1"></i> رجوع
            </a>
        </div>
    </div>

    <div class="block col-12">
        <div class="box col-12">
            <form method="post" action="<?= site_url('job_description/approve/'.$jd['id']) ?>" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-lg-4">
                        <label class="form-label fw-bold">طريقة التوقيع</label>
                        <select class="form-select" name="signature_mode" id="signature_mode">
                            <option value="draw">توقيع إلكتروني (رسم)</option>
                            <option value="upload">رفع توقيع جاهز</option>
                        </select>
                    </div>
                    <div class="col-lg-8">
                        <label class="form-label fw-bold">ملاحظة (اختياري)</label>
                        <input type="text" class="form-control" name="note" placeholder="...">
                    </div>

                    <div class="col-12" id="draw_wrap">
                        <label class="form-label fw-bold">ارسم توقيعك</label>
                        <canvas id="sigCanvas" class="border rounded" style="background:#fff;width:100%;height:220px;max-width:500px;"></canvas>
                        <input type="hidden" name="signature_data" id="signature_data">
                        <div class="mt-2 d-flex gap-2 flex-wrap align-items-center">
                            <button type="button" class="button default orange outline small" id="clearBtn">مسح التوقيع</button>
                            <span class="text-muted small">بعد الانتهاء اضغط اعتماد</span>
                        </div>
                    </div>

                    <div class="col-12 d-none" id="upload_wrap">
                        <label class="form-label fw-bold">ارفع ملف توقيع (PNG/JPG)</label>
                        <input type="file" class="form-control" name="signature_file" accept="image/png,image/jpeg">
                        <div class="text-muted small mt-2">يفضل PNG بخلفية شفافة</div>
                    </div>

                    <div class="col-12 d-flex gap-2 flex-wrap mt-3">
                        <button class="button hex-btn" type="submit" id="submitBtn">
                            <i class="bi bi-check2 me-1"></i> اعتماد وتوقيع
                        </button>
                        <a class="button default orange outline" href="<?= site_url('job_description/view/'.$jd['id']) ?>">
                            <i class="bi bi-x me-1"></i> إلغاء
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
(function(){
  const mode = document.getElementById('signature_mode');
  const drawWrap = document.getElementById('draw_wrap');
  const uploadWrap = document.getElementById('upload_wrap');

  if(mode){
  mode.addEventListener('change', function() {
    if(mode.value === 'upload'){
      drawWrap.classList.add('d-none');
      uploadWrap.classList.remove('d-none');
    }else{
      uploadWrap.classList.add('d-none');
      drawWrap.classList.remove('d-none');
    }
  });
  }

  var canvas = document.getElementById('sigCanvas');
  if(!canvas) return;
  var ctx = canvas.getContext('2d');
  var hidden = document.getElementById('signature_data');
  var clearBtn = document.getElementById('clearBtn');

  function resizeCanvas(){
    var rect = canvas.getBoundingClientRect();
    var ratio = window.devicePixelRatio || 1;
    canvas.width = rect.width * ratio;
    canvas.height = rect.height * ratio;
    ctx.setTransform(ratio,0,0,ratio,0,0);
    ctx.lineWidth = 3;
    ctx.lineCap = 'round';
    ctx.strokeStyle = '#111';
  }
  window.addEventListener('resize', resizeCanvas);
  setTimeout(resizeCanvas, 100);

  var drawing=false, lastX=0, lastY=0;
  function getPos(e){
    var rect = canvas.getBoundingClientRect();
    var touch = e.touches ? e.touches[0] : null;
    var x = (touch ? touch.clientX : e.clientX) - rect.left;
    var y = (touch ? touch.clientY : e.clientY) - rect.top;
    return {x:x,y:y};
  }
  function start(e){ drawing=true; var p=getPos(e); lastX=p.x; lastY=p.y; e.preventDefault(); }
  function move(e){
    if(!drawing) return;
    var p=getPos(e);
    ctx.beginPath();
    ctx.moveTo(lastX,lastY);
    ctx.lineTo(p.x,p.y);
    ctx.stroke();
    lastX=p.x; lastY=p.y;
    e.preventDefault();
  }
  function end(){ drawing=false; }

  canvas.addEventListener('mousedown', start);
  canvas.addEventListener('mousemove', move);
  canvas.addEventListener('mouseup', end);
  canvas.addEventListener('mouseleave', end);
  canvas.addEventListener('touchstart', start, {passive:false});
  canvas.addEventListener('touchmove', move, {passive:false});
  canvas.addEventListener('touchend', end);

  if(clearBtn) clearBtn.addEventListener('click', function() {
    ctx.clearRect(0,0,canvas.width,canvas.height);
    if(hidden) hidden.value = '';
  });

  var form = document.querySelector('form');
  if(form) form.addEventListener('submit', function(e){
    if(mode && mode.value === 'draw'){
      var dataUrl = canvas.toDataURL('image/png');
      if(hidden) hidden.value = dataUrl;
    }
  });
})();
</script>
