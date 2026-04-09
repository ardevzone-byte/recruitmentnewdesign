<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SmsPlatform extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sms_platform_model', 'smsm');
        $this->load->helper(['url', 'form', 'security', 'file']);
        $this->load->library(['session', 'upload']);
        $this->config->load('sms', true);
    }

    public function index()
    {
        $data = [
            'title'   => 'منصة إرسال الرسائل النصية',
            'regions' => ['الرياض','ابها','الخبر','حائل'],
        ];
        $this->load->view('template/new_header', $data);
        $this->load->view('sms_platform/index', $data);
        $this->load->view('template/new_footer');
    }

    /**
     * إرسال الرسائل (من النموذج)
     */
    public function send()
    {
        if ($this->input->method(true) !== 'POST') show_404();

        $region         = trim((string)$this->input->post('region', true));
        $message        = trim((string)$this->input->post('message_body', true));
        $manual_numbers = (string)$this->input->post('mobile_numbers', true);

        $regions_allowed = ['الرياض','ابها','الخبر','حائل'];
        if (!in_array($region, $regions_allowed, true)) {
            $this->session->set_flashdata('error_msg', 'المنطقة غير صحيحة');
            redirect('SmsPlatform');
        }

        if ($message === '' || mb_strlen($message) < 2) {
            $this->session->set_flashdata('error_msg', 'محتوى الرسالة مطلوب');
            redirect('SmsPlatform');
        }

        // 1) أرقام يدوية
        $mobiles = $this->normalize_mobiles($manual_numbers);

        // 2) أرقام من ملف CSV/XLSX (اختياري)
        if (!empty($_FILES['excel_file']['name'])) {
            $from_file = $this->read_mobiles_from_file('excel_file'); // <- بعد التعديل صارت تقرأ كل الخلايا وتعالج E+
            $mobiles   = array_merge($mobiles, $from_file);
        }

        // 3) تنقية + تحقق + إزالة تكرار (بعد التعديل يدعم E+ و 05xxxxxxxx)
        $mobiles = $this->sanitize_and_validate_mobiles($mobiles);

        if (empty($mobiles)) {
            $this->session->set_flashdata('error_msg', 'لا يوجد أرقام صالحة للإرسال. الصيغة المطلوبة: 9665 ثم 8 أرقام (أو 05 ثم 8 أرقام).');
            redirect('SmsPlatform');
        }

        // معلومات المرسل
        $empno   = (string)$this->session->userdata('username');
        $empname = (string)$this->session->userdata('name');
        if ($empno === '')   $empno = 'unknown';
        if ($empname === '') $empname = 'unknown';

        $now = date('Y-m-d H:i:s');

        // إنشاء حملة
        $campaign_id = $this->smsm->create_campaign([
            'region'           => $region,
            'message_body'     => $message,
            'created_by_empno' => $empno,
            'created_by_name'  => $empname,
            'created_at'       => $now,
            'sent_at'          => null,
            'status'           => 'sending',
            'total_numbers'    => 0,
            'success_count'    => 0,
            'fail_count'       => 0,
        ]);

        // إضافة المستلمين
        $this->smsm->add_recipients($campaign_id, $mobiles);

        // إرسال فعلي (على كل رقم)
        $success  = 0;
        $fail     = 0;
        $lastResp = null;

        foreach ($mobiles as $mobile) {
            $resp = $this->send_sms_oursms($mobile, $message);
            $lastResp = $resp['raw'] ?? ($resp['error'] ?? null);

            if (!empty($resp['ok'])) {
                $success++;
                $this->smsm->update_recipient_result($campaign_id, $mobile, 'sent', $resp['raw'] ?? null);
            } else {
                $fail++;
                $this->smsm->update_recipient_result($campaign_id, $mobile, 'failed', $resp['raw'] ?? ($resp['error'] ?? 'failed'));
            }
        }

        // حالة الحملة
        $status = 'failed';
        if ($success > 0 && $fail === 0) $status = 'sent';
        if ($success > 0 && $fail > 0)  $status = 'partial';

        // تحديث الحملة
        $this->smsm->set_campaign_status($campaign_id, $status, [
            'sent_at'                => date('Y-m-d H:i:s'),
            'total_numbers'          => count($mobiles),
            'success_count'          => $success,
            'fail_count'             => $fail,
            'provider_last_response' => $lastResp,
        ]);

        $this->session->set_flashdata('success_msg', 'تم إرسال الرسالة. النجاح: '.$success.' | الفشل: '.$fail);
        redirect('SmsPlatform/dashboard');
    }

    public function dashboard()
    {
        $filters = [
            'region'    => trim((string)$this->input->get('region', true)),
            'date_from' => trim((string)$this->input->get('date_from', true)), // yyyy-mm-dd
            'date_to'   => trim((string)$this->input->get('date_to', true)),
        ];

        $data = [
            'title'    => 'تقارير الرسائل النصية',
            'regions'  => ['الرياض','ابها','الخبر','حائل'],
            'filters'  => $filters,
            'stats'    => $this->smsm->stats_by_region($filters),
            'campaigns'=> $this->smsm->get_campaigns($filters),
        ];

        $this->load->view('template/new_header', $data);
        $this->load->view('sms_platform/dashboard', $data);
        $this->load->view('template/new_footer');
    }

    public function details($id)
    {
        $id = (int)$id;
        $campaign = $this->smsm->get_campaign($id);
        if (!$campaign) show_404();

        $data = [
            'title'      => 'تفاصيل حملة #'.$id,
            'campaign'   => $campaign,
            'recipients' => $this->smsm->get_recipients($id),
        ];
        $this->load->view('template/new_header', $data);
        $this->load->view('sms_platform/details', $data);
        $this->load->view('template/new_footer');
    }

    /**
     * تصدير CSV للتقارير حسب نفس الفلاتر
     */
    public function export_csv()
    {
        $filters = [
            'region'    => trim((string)$this->input->get('region', true)),
            'date_from' => trim((string)$this->input->get('date_from', true)),
            'date_to'   => trim((string)$this->input->get('date_to', true)),
        ];

        $rows = $this->smsm->get_campaigns($filters);

        $filename = 'sms_campaigns_' . date('Ymd_His') . '.csv';
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="'.$filename.'"');

        $out = fopen('php://output', 'w');

        // UTF-8 BOM for Excel
        fprintf($out, chr(0xEF).chr(0xBB).chr(0xBF));

        fputcsv($out, ['ID','المنطقة','نص الرسالة','المرسل (رقم)','المرسل (اسم)','وقت الإنشاء','وقت الإرسال','الحالة','الإجمالي','نجاح','فشل']);

        foreach ($rows as $r) {
            fputcsv($out, [
                $r['id'],
                $r['region'],
                $r['message_body'],
                $r['created_by_empno'],
                $r['created_by_name'],
                $r['created_at'],
                $r['sent_at'],
                $r['status'],
                $r['total_numbers'],
                $r['success_count'],
                $r['fail_count'],
            ]);
        }
        fclose($out);
        exit;
    }

    /**
     * تصدير CSV لمستلمين حملة
     */
    public function export_recipients_csv($id)
    {
        $id = (int)$id;
        $campaign = $this->smsm->get_campaign($id);
        if (!$campaign) show_404();

        $rows = $this->smsm->get_recipients($id);

        $filename = 'sms_recipients_campaign_'.$id.'_' . date('Ymd_His') . '.csv';
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="'.$filename.'"');

        $out = fopen('php://output', 'w');
        fprintf($out, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($out, ['CampaignID','Mobile','Status','SentAt','ProviderResponse']);

        foreach ($rows as $r) {
            fputcsv($out, [
                $r['campaign_id'],
                $r['mobile'],
                $r['status'],
                $r['sent_at'],
                $r['provider_response'],
            ]);
        }
        fclose($out);
        exit;
    }

    // ================== Helpers ==================

    private function normalize_mobiles(string $text): array
    {
        $text = trim($text);
        if ($text === '') return [];

        // تقسيم حسب أسطر/فواصل/مسافات
        $parts = preg_split('/[\s,;]+/u', $text, -1, PREG_SPLIT_NO_EMPTY);
        return $parts ?: [];
    }

    /**
     * ✅ بعد التعديل:
     * - يعالج scientific notation E+
     * - يدعم 05xxxxxxxx -> 9665xxxxxxxx
     */
    private function sanitize_and_validate_mobiles(array $mobiles): array
    {
        $clean = [];

        foreach ($mobiles as $m) {
            $m = trim((string)$m);
            if ($m === '') continue;

            // ✅ علاج scientific notation (Excel)
            if (preg_match('/e\+/i', $m)) {
                $m = sprintf('%.0f', (float)$m);
            }

            // خذ الأرقام فقط
            $m = preg_replace('/\D+/', '', $m);
            if ($m === '') continue;

            // ✅ دعم 05xxxxxxxx -> 9665xxxxxxxx
            if (preg_match('/^05\d{8}$/', $m)) {
                $m = '966' . substr($m, 1);
            }

            // تحقق صيغة: 9665 + 8 أرقام
            if (!preg_match('/^9665\d{8}$/', $m)) continue;

            $clean[] = $m;
        }

        return array_values(array_unique($clean));
    }

    /**
     * قراءة أرقام من ملف (xlsx/csv)
     * ✅ CSV: يقرأ كل الخلايا (مو أول عمود فقط) + يعالج scientific notation
     * ✅ XLSX: يقرأ كل الخلايا في كل صف
     */
    private function read_mobiles_from_file(string $field): array
    {
        $config = [
            'upload_path'   => FCPATH . 'uploads/sms/',
            'allowed_types' => 'csv|xlsx',
            'max_size'      => 4096,
            'encrypt_name'  => true,
        ];

        if (!is_dir($config['upload_path'])) {
            @mkdir($config['upload_path'], 0755, true);
        }

        $this->upload->initialize($config);

        if (!$this->upload->do_upload($field)) {
            $this->session->set_flashdata('error_msg', 'فشل رفع الملف: ' . strip_tags($this->upload->display_errors('', '')));
            redirect('SmsPlatform');
        }

        $file = $this->upload->data();
        $path = $file['full_path'];
        $ext  = strtolower($file['file_ext']); // includes dot

        $numbers = [];

        // ===== CSV =====
        if ($ext === '.csv') {
            $handle = fopen($path, 'r');
            if ($handle) {
                while (($row = fgetcsv($handle)) !== false) {
                    foreach ($row as $cell) {
                        $cell = trim((string)$cell);
                        if ($cell === '') continue;

                        // علاج scientific notation داخل CSV
                        if (preg_match('/e\+/i', $cell)) {
                            $cell = sprintf('%.0f', (float)$cell);
                        }

                        $numbers[] = $cell;
                    }
                }
                fclose($handle);
            }
            @unlink($path);
            return $numbers;
        }

        // ===== XLSX =====
        if ($ext === '.xlsx') {
            if (!class_exists('\PhpOffice\PhpSpreadsheet\IOFactory')) {
                @unlink($path);
                $this->session->set_flashdata('error_msg', 'رفع XLSX يحتاج PhpSpreadsheet. مؤقتاً ارفع CSV، أو ثبّت المكتبة عبر Composer.');
                redirect('SmsPlatform');
            }

            try {
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
                $sheet = $spreadsheet->getActiveSheet();

                foreach ($sheet->getRowIterator() as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(true);

                    foreach ($cellIterator as $cell) {
                        $val = $cell->getValue();
                        if ($val === null) continue;

                        $val = trim((string)$val);
                        if ($val === '') continue;

                        // علاج scientific notation من Excel
                        if (preg_match('/e\+/i', $val)) {
                            $val = sprintf('%.0f', (float)$val);
                        }

                        $numbers[] = $val;
                    }
                }
            } catch (Throwable $e) {
                $this->session->set_flashdata('error_msg', 'فشل قراءة ملف XLSX: ' . $e->getMessage());
                @unlink($path);
                redirect('SmsPlatform');
            }

            @unlink($path);
            return $numbers;
        }

        @unlink($path);
        return [];
    }

    /**
     * إرسال oursms (POST) + يعتبر النجاح من accepted/rejected
     */
    private function send_sms_oursms($mobile, $message)
    {
        $apiUrl   = 'https://api.oursms.com/api-a/msgs';
        $username = 'marsoom';
        $token    = 'zcTlmZcAI8JLK2Qsb2bs';
        $src      = 'MARSOOM';

        $mobile = preg_replace('/\D+/', '', (string)$mobile);

        if (!preg_match('/^9665\d{8}$/', $mobile)) {
            return [
                'ok' => false,
                'http_code' => null,
                'raw' => null,
                'error' => 'رقم الجوال غير صحيح: يجب أن يكون بصيغة 9665 ثم 8 أرقام',
                'accepted' => 0,
                'rejected' => 1,
            ];
        }

        $postFields = http_build_query([
            'username' => $username,
            'token'    => $token,
            'src'      => $src,
            'dests'    => $mobile,
            'body'     => $message
        ]);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $apiUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 10,
        ]);

        $response = curl_exec($ch);
        $curlErr  = curl_error($ch);
        $httpCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($response === false) {
            return [
                'ok' => false,
                'http_code' => $httpCode,
                'raw' => null,
                'error' => 'cURL Error: ' . $curlErr,
                'accepted' => 0,
                'rejected' => 1,
            ];
        }

        $json = json_decode($response, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($json)) {
            $accepted = isset($json['accepted']) ? (int)$json['accepted'] : 0;
            $rejected = isset($json['rejected']) ? (int)$json['rejected'] : 0;

            if ($accepted > 0) {
                return [
                    'ok' => true,
                    'http_code' => $httpCode,
                    'raw' => $response,
                    'error' => null,
                    'accepted' => $accepted,
                    'rejected' => $rejected,
                    'jobId' => $json['jobId'] ?? null,
                ];
            }

            $errMsg = 'فشل الإرسال (accepted=0)';
            if (!empty($json['rejectedMsgs'])) {
                $errMsg = is_array($json['rejectedMsgs'])
                    ? json_encode($json['rejectedMsgs'], JSON_UNESCAPED_UNICODE)
                    : (string)$json['rejectedMsgs'];
            } elseif (!empty($json['statusDesc'])) {
                $errMsg = (string)$json['statusDesc'];
            } elseif (!empty($json['message'])) {
                $errMsg = (string)$json['message'];
            }

            return [
                'ok' => false,
                'http_code' => $httpCode,
                'raw' => $response,
                'error' => $errMsg,
                'accepted' => $accepted,
                'rejected' => $rejected,
                'jobId' => $json['jobId'] ?? null,
            ];
        }

        if ($httpCode === 200) {
            return [
                'ok' => true,
                'http_code' => $httpCode,
                'raw' => $response,
                'error' => null,
                'accepted' => 1,
                'rejected' => 0,
            ];
        }

        return [
            'ok' => false,
            'http_code' => $httpCode,
            'raw' => $response,
            'error' => 'HTTP Error: ' . $httpCode,
            'accepted' => 0,
            'rejected' => 1,
        ];
    }
}
