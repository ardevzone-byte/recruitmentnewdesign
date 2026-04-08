<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div id="jobTitlesSettings" data-update-base="<?= site_url('JobTitles/update/') ?>" class="d-none" aria-hidden="true"></div>

<div dir="rtl" class="rows col-12 jobs-dashboard recruitment-page">
  <div class="block col-12 mb-4 heading-white">
    <div class="head-table col-12">
      <h4><i class="bi bi-person-badge me-2"></i> <?= html_escape($title ?? 'إدارة المسميات الوظيفية') ?></h4>
      <p class="mb-0 text-muted">إضافة / تعديل / حذف المسميات الوظيفية</p>
    </div>
  </div>

  <?php
    $flash_type = $this->session->flashdata('flash_type');
    $flash_msg  = $this->session->flashdata('flash_msg');
    if ($flash_msg):
  ?>
    <div class="alert alert-<?= html_escape($flash_type ?: 'info') ?> mb-3"><?= html_escape($flash_msg) ?></div>
  <?php endif; ?>
  <?php if (!empty($error)): ?>
    <div class="alert alert-danger mb-3"><?= html_escape($error) ?></div>
  <?php endif; ?>

  <div class="emp-table-card mb-4 job-titles-search-card">
    <div class="emp-table-card__head job-titles-search-card__head">
      <h5 class="mb-0"><i class="bi bi-search me-2"></i> بحث في المسميات</h5>
    </div>
    <div class="emp-table-card__body p-3 p-md-4">
      <form method="get" action="<?= site_url('JobTitles'); ?>" class="row g-2 align-items-end">
        <div class="col-md-8">
          <label class="form-label text-secondary">نص البحث</label>
          <input type="text" name="q" value="<?= html_escape($q ?? '') ?>" class="form-control" placeholder="ابحث بالمسمى...">
        </div>
        <div class="col-md-4 d-grid">
          <button class="button default orange small w-100 justify-content-center" type="submit"><i class="bi bi-search me-1"></i> بحث</button>
        </div>
      </form>
      <p class="small text-muted mt-3 mb-0">يُحدَّث تاريخ التسجيل تلقائياً عند إضافة مسمى أو تعديله.</p>
    </div>
  </div>

  <div class="block col-12">
    <div class="table-wrapper-rtl">
      <div class="table-responsive">
        <table class="table table-custom align-middle">
          <thead>
            <tr>
              <th style="width:90px">ID</th>
              <th>المسمى الوظيفي</th>
              <th style="width:220px">تاريخ التسجيل</th>
              <th style="width:200px">إجراء</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($rows)): ?>
              <?php foreach ($rows as $r): ?>
                <tr>
                  <td><?= (int) $r->id ?></td>
                  <td><?= html_escape($r->job_title) ?></td>
                  <td dir="ltr"><?= html_escape($r->created_at) ?></td>
                  <td>
                    <button type="button" class="btn btn-sm btn-outline-primary btn-edit me-1"
                            data-bs-toggle="modal" data-bs-target="#editModal"
                            data-id="<?= (int) $r->id ?>"
                            data-title="<?= html_escape($r->job_title) ?>">
                      <i class="bi bi-pencil"></i> تعديل
                    </button>
                    <form method="post" action="<?= site_url('JobTitles/delete/' . (int) $r->id) ?>" class="d-inline" onsubmit="return confirm('هل أنت متأكد من حذف المسمى؟');">
                      <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="4" class="text-center text-muted py-4">لا توجد بيانات.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">تعديل مسمى وظيفي <span id="editIdText"></span></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form method="post" id="editForm" action="">
        <div class="modal-body">
          <label class="form-label">المسمى الوظيفي</label>
          <input type="text" name="job_title" id="edit_title" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
          <button type="submit" class="btn btn-primary"><i class="bi bi-check2"></i> حفظ</button>
        </div>
      </form>
    </div>
  </div>
</div>
