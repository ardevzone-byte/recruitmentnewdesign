<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Thin shim: المحتوى الفعلي في main.php (يتجنب صفحة فارغة إن وُجد استدعاء قديم لـ dashboard/dashboard)
include APPPATH . 'views/dashboard/main.php';
