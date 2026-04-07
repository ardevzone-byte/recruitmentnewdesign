<?php defined('BASEPATH') OR exit('No direct script access allowed');

class SmsTest extends CI_Controller
{
    public function index()
    {
        // ضع رقمك هنا للاختبار
        $mobile = '966580563158'; // مثال: 966580563158
        $body   = 'SMS Test - ' . date('Y-m-d H:i:s');

        $apiUrl  = 'https://api.oursms.com/api-a/msgs';
        $username= 'marsoom';
        $token   = 'zcTlmZcAI8JLK2Qsb2bs';
        $src     = 'MARSOOM';

        // أفضل: POST بدل GET
        $postFields = http_build_query([
            'username' => $username,
            'token'    => $token,
            'src'      => $src,
            'dests'    => $mobile,
            'body'     => $body
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

        header('Content-Type: text/plain; charset=utf-8');

        echo "HTTP Code: {$httpCode}\n";
        echo "Mobile: {$mobile}\n";
        echo "Body: {$body}\n";
        echo "cURL Error: " . ($curlErr ?: 'NONE') . "\n\n";
        echo "Raw Response:\n";
        echo ($response !== false ? $response : "NO RESPONSE") . "\n\n";

        // محاولة قراءة JSON إن كان JSON
        $json = json_decode((string)$response, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            echo "JSON Parsed:\n";
            print_r($json);
        } else {
            echo "JSON Parsed: NO (not valid JSON)\n";
        }
    }
}
