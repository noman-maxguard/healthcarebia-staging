<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisitLogger
{
    // Put the FULL Apps Script Web App URL ending with /exec
    private $googleScriptUrl = 'https://script.google.com/macros/s/AKfycbydoXnodGMX22eki7c043zqMZVKLhE7NkXAwzj4Jb2XlIKaqwqFZFm5jWhUX72d6THKjA/exec';

    public function log()
    {
        if (is_cli()) return;

        // Optional: skip admin hits
        $uri = $_SERVER['REQUEST_URI'] ?? '';
        if (strpos($uri, '/admin') === 0) return;

        // Build IP (CF/proxy-aware)
        $ip = null;
        if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]);
        } else {
            $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        }
        $ip = filter_var($ip, FILTER_VALIDATE_IP) ?: null;

        // Build full URL
        $scheme = (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']))
            ? $_SERVER['HTTP_X_FORWARDED_PROTO']
            : ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http');
        $host = $_SERVER['HTTP_HOST'] ?? ($_SERVER['SERVER_NAME'] ?? '');
        $fullUrl = $scheme . '://' . $host . ($uri ?? '');

        // Payload (only what you asked for)
        $payload = [
            'date' => date("d-M-Y h:i:s A"),
            'ip'   => $ip,
            'url'  => $fullUrl,
        ];

        $this->postJsonToGAS($payload);
    }

    private function postJsonToGAS(array $payload): void
    {
        try {
            $json = json_encode($payload, JSON_UNESCAPED_SLASHES);
            $ch = curl_init($this->googleScriptUrl);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST  => 'POST',
                CURLOPT_HTTPHEADER     => [
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($json),
                ],
                CURLOPT_POSTFIELDS     => $json,
                CURLOPT_TIMEOUT        => 4,
            ]);

            $resp  = curl_exec($ch);
            $err   = curl_error($ch);
            $code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($resp === false || $err || $code >= 400) {
                log_message('error', "[VisitLogger] GAS POST failed code=$code err=$err resp=" . (string)$resp);
            } else {
                log_message('debug', "[VisitLogger] GAS POST ok code=$code resp=" . substr((string)$resp, 0, 200));
            }
        } catch (Exception $e) {
            log_message('error', '[VisitLogger] Exception: ' . $e->getMessage());
        }
    }
}