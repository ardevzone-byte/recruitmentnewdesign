<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sms_platform_model extends CI_Model
{
    private $t_campaigns   = 'sms_campaigns';
    private $t_recipients  = 'sms_campaign_recipients';

    /** @var string */
    private $apiUrl;
    /** @var string */
    private $apiUser;
    /** @var string */
    private $apiToken;
    /** @var string */
    private $apiSrc;

    public function __construct()
    {
        parent::__construct();
        $this->config->load('sms', true);
        $this->apiUrl   = (string) $this->config->item('sms_api_url', 'sms');
        $this->apiUser  = (string) $this->config->item('sms_username', 'sms');
        $this->apiToken = (string) $this->config->item('sms_token', 'sms');
        $this->apiSrc   = (string) $this->config->item('sms_src', 'sms');
    }

    /* ==========================================================
     *  1) Helpers: extract + normalize mobiles
     * ========================================================== */

    public function extract_mobiles_from_text(string $text): array
    {
        $text = trim($text);
        if ($text === '') return [];

        // تقسيم حسب أسطر / فاصلة / مسافات
        $parts = preg_split('/[\s,;\r\n]+/u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $out = [];
        foreach ($parts as $p) {
            $p = trim((string)$p);
            if ($p !== '') $out[] = $p;
        }
        return $out;
    }

    /**
     * يدعم CSV فقط (بالشكل الحالي)
     * يعالج:
     * - scientific notation: 9.66580E+11
     * - وجود نص/أعمدة متعددة: يستخرج أي 9665XXXXXXXX أو 05XXXXXXXX من أي خلية
     */
    public function extract_mobiles_from_file(string $input_name): array
    {
        $name = $_FILES[$input_name]['name'] ?? '';
        $tmp  = $_FILES[$input_name]['tmp_name'] ?? '';
        if ($name === '' || $tmp === '') return [];

        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        if ($ext !== 'csv') {
            $this->session->set_flashdata('error_msg', 'ارفع ملف CSV فقط حالياً.');
            return [];
        }

        $mobiles = [];
        if (($handle = fopen($tmp, 'r')) !== false) {
            while (($row = fgetcsv($handle)) !== false) {
                foreach ($row as $cell) {
                    $cell = trim((string)$cell);
                    if ($cell === '') continue;

                    // علاج scientific notation مثل 9.66580563158E+11
                    if (preg_match('/e\+/i', $cell)) {
                        $cell = sprintf('%.0f', (float)$cell);
                    }

                    // استخرج من داخل النص
                    if (preg_match_all('/(9665\d{8}|05\d{8})/', $cell, $m)) {
                        foreach ($m[0] as $found) $mobiles[] = $found;
                    } else {
                        // fallback: خذ الأرقام فقط
                        $digits = preg_replace('/\D+/', '', $cell);
                        if ($digits !== '') $mobiles[] = $digits;
                    }
                }
            }
            fclose($handle);
        }

        return $mobiles;
    }

    /**
     * يقبل:
     * - 9665XXXXXXXX ✅
     * - 05XXXXXXXX ✅ (ويحوّلها إلى 9665XXXXXXXX)
     */
    public function normalize_and_validate_mobiles(array $mobiles): array
    {
        $clean = [];

        foreach ($mobiles as $m) {
            $m = trim((string)$m);
            if ($m === '') continue;

            // scientific notation احتياط
            if (preg_match('/e\+/i', $m)) {
                $m = sprintf('%.0f', (float)$m);
            }

            // خذ الأرقام فقط
            $m = preg_replace('/\D+/', '', $m);

            // دعم 05xxxxxxxx -> 9665xxxxxxxx
            if (preg_match('/^05\d{8}$/', $m)) {
                $m = '966' . substr($m, 1);
            }

            if (preg_match('/^9665\d{8}$/', $m)) {
                $clean[] = $m;
            }
        }

        return array_values(array_unique($clean));
    }

    /* ==========================================================
     *  2) OurSMS Sender (returns ok based on accepted/rejected)
     * ========================================================== */

    public function send_sms_oursms(string $mobile, string $message): array
    {
        $mobile = preg_replace('/\D+/', '', $mobile);

        if (!preg_match('/^9665\d{8}$/', $mobile)) {
            return [
                'ok' => false,
                'http_code' => null,
                'raw' => null,
                'error' => 'رقم الجوال غير صحيح (المطلوب 9665 ثم 8 أرقام)',
                'accepted' => 0,
                'rejected' => 1,
                'jobId' => null,
            ];
        }

        $postFields = http_build_query([
            'username' => $this->apiUser,
            'token'    => $this->apiToken,
            'src'      => $this->apiSrc,
            'dests'    => $mobile,
            'body'     => $message,
        ]);

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $this->apiUrl,
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
                'http_code' => $httpCode ?: null,
                'raw' => null,
                'error' => 'cURL Error: ' . $curlErr,
                'accepted' => 0,
                'rejected' => 1,
                'jobId' => null,
            ];
        }

        $json = json_decode($response, true);

        // لو JSON صحيح
        if (json_last_error() === JSON_ERROR_NONE && is_array($json)) {
            $accepted = isset($json['accepted']) ? (int)$json['accepted'] : 0;
            $rejected = isset($json['rejected']) ? (int)$json['rejected'] : 0;

            // ✅ النجاح الحقيقي: accepted > 0
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

            // ❌ فشل: accepted = 0
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

        // لو مو JSON: نعتبر HTTP 200 نجاح مبدئي
        if ($httpCode === 200) {
            return [
                'ok' => true,
                'http_code' => $httpCode,
                'raw' => $response,
                'error' => null,
                'accepted' => 1,
                'rejected' => 0,
                'jobId' => null,
            ];
        }

        return [
            'ok' => false,
            'http_code' => $httpCode,
            'raw' => $response,
            'error' => 'HTTP Error: ' . $httpCode,
            'accepted' => 0,
            'rejected' => 1,
            'jobId' => null,
        ];
    }

    /* ==========================================================
     *  3) Campaign CRUD (كما عندك + تحسينات بسيطة)
     * ========================================================== */

    public function create_campaign(array $data): int
    {
        $this->db->insert($this->t_campaigns, $data);
        return (int)$this->db->insert_id();
    }

    public function add_recipients(int $campaign_id, array $mobiles): int
    {
        if (empty($mobiles)) return 0;

        $rows = [];
        foreach ($mobiles as $m) {
            $rows[] = [
                'campaign_id' => $campaign_id,
                'mobile'      => $m,
                'status'      => 'pending',
                'sent_at'     => null,
                'provider_response' => null,
            ];
        }

        $this->db->insert_batch($this->t_recipients, $rows);
        return (int)$this->db->affected_rows();
    }

    public function set_campaign_status(int $campaign_id, string $status, array $extra = []): void
    {
        $this->db->where('id', $campaign_id)
                 ->update($this->t_campaigns, array_merge(['status' => $status], $extra));
    }

    public function update_recipient_result(int $campaign_id, string $mobile, string $status, ?string $provider_response): void
    {
        $this->db->where(['campaign_id' => $campaign_id, 'mobile' => $mobile])
                 ->update($this->t_recipients, [
                     'status' => $status,
                     'provider_response' => $provider_response,
                     'sent_at' => date('Y-m-d H:i:s'),
                 ]);
    }

    /**
     * إرسال الحملة كاملة (يرسل لكل رقم pending)
     * يرجع إحصائية: total/success/fail
     */
    public function send_campaign(int $campaign_id, string $message_body): array
    {
        $recipients = $this->get_recipients($campaign_id);

        $success = 0;
        $fail = 0;

        foreach ($recipients as $r) {
            if (($r['status'] ?? '') !== 'pending') continue;

            $send = $this->send_sms_oursms((string)$r['mobile'], $message_body);

            if ($send['ok']) {
                $success++;
                $this->update_recipient_result($campaign_id, (string)$r['mobile'], 'sent', $send['raw']);
            } else {
                $fail++;
                $this->update_recipient_result($campaign_id, (string)$r['mobile'], 'failed', $send['raw'] ?: $send['error']);
            }
        }

        // تحديث الحملة
        $total = $success + $fail;
        $status = 'failed';
        if ($success > 0 && $fail === 0) $status = 'sent';
        if ($success > 0 && $fail > 0)  $status = 'partial';

        $this->db->where('id', $campaign_id)->update($this->t_campaigns, [
            'total_numbers' => $total,
            'success_count' => $success,
            'fail_count'    => $fail,
            'sent_at'       => date('Y-m-d H:i:s'),
            'status'        => $status,
        ]);

        return ['total' => $total, 'success' => $success, 'fail' => $fail];
    }

    /**
     * لو أنت تستخدم finalize منفصل، خلّيته ذكي (sent/failed/partial)
     */
    public function finalize_campaign_counts(int $campaign_id): array
    {
        $total = (int)$this->db->where('campaign_id', $campaign_id)->count_all_results($this->t_recipients);

        $success = (int)$this->db->where(['campaign_id' => $campaign_id, 'status' => 'sent'])
                                 ->count_all_results($this->t_recipients);

        $fail = (int)$this->db->where(['campaign_id' => $campaign_id, 'status' => 'failed'])
                              ->count_all_results($this->t_recipients);

        $status = 'failed';
        if ($success > 0 && $fail === 0) $status = 'sent';
        if ($success > 0 && $fail > 0)  $status = 'partial';

        $this->db->where('id', $campaign_id)->update($this->t_campaigns, [
            'total_numbers' => $total,
            'success_count' => $success,
            'fail_count'    => $fail,
            'sent_at'       => date('Y-m-d H:i:s'),
            'status'        => $status,
        ]);

        return ['total' => $total, 'success' => $success, 'fail' => $fail, 'status' => $status];
    }

    /* ==========================================================
     *  4) Queries + Reports (كما عندك)
     * ========================================================== */

    public function get_campaigns(array $filters = []): array
    {
        $this->db->from($this->t_campaigns);

        if (!empty($filters['region'])) {
            $this->db->where('region', $filters['region']);
        }

        if (!empty($filters['date_from'])) {
            $this->db->where('DATE(sent_at) >=', $filters['date_from']);
        }
        if (!empty($filters['date_to'])) {
            $this->db->where('DATE(sent_at) <=', $filters['date_to']);
        }

        $this->db->order_by('id', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_campaign(int $id): ?array
    {
        $row = $this->db->get_where($this->t_campaigns, ['id' => $id])->row_array();
        return $row ?: null;
    }

    public function get_recipients(int $campaign_id): array
    {
        return $this->db->order_by('id', 'ASC')
                        ->get_where($this->t_recipients, ['campaign_id' => $campaign_id])
                        ->result_array();
    }

    public function stats_by_region(array $filters = []): array
    {
        $this->db->select("
            region,
            COUNT(*) AS campaigns_count,
            SUM(total_numbers) AS total_numbers,
            SUM(success_count) AS success_count,
            SUM(fail_count) AS fail_count
        ", false);
        $this->db->from($this->t_campaigns);

        if (!empty($filters['date_from'])) $this->db->where('DATE(sent_at) >=', $filters['date_from']);
        if (!empty($filters['date_to']))   $this->db->where('DATE(sent_at) <=', $filters['date_to']);

        $this->db->group_by('region');
        $rows = $this->db->get()->result_array();

        $regions = $this->config->item('sms_regions', 'sms');
        if (!is_array($regions) || empty($regions)) {
            $regions = ['الرياض', 'ابها', 'الخبر', 'حائل'];
        }
        $out = [];
        foreach ($regions as $r) {
            $out[$r] = ['region'=>$r,'campaigns_count'=>0,'total_numbers'=>0,'success_count'=>0,'fail_count'=>0];
        }
        foreach ($rows as $row) {
            $out[$row['region']] = $row;
        }
        return array_values($out);
    }
}
