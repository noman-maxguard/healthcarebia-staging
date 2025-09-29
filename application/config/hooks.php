<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/
class VisitLogger
{
    // Your existing Apps Script endpoint
    private $googleScriptUrl = 'https://script.google.com/a/macros/healthcarebia.ae/s/AKfycbyXUe6jMEotlg-ox8sHmiPyp6YNeGWydWnSRKcMNGPaEeOPwaggOrRw3Ca2zuOMLwhWAA/exec';

    public function log()
    {
        if (is_cli()) return;

        // (Optional) Skip admin paths
        $uri = $_SERVER['REQUEST_URI'] ?? '';
        if (strpos($uri, '/admin') === 0) return;

        // Robust IP (CF / proxy aware)
        $ip = null;
        if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]);
        } else {
            $ip = $_SERVER['REMOTE_ADDR'] ?? '';
        }
        $ip = filter_var($ip, FILTER_VALIDATE_IP) ?: null;

        // Build full URL (handles HTTPS and proxies)
        $scheme = 'http';
        if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO'])) {
            $scheme = $_SERVER['HTTP_X_FORWARDED_PROTO'];
        } elseif (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
            $scheme = 'https';
        }
        $host = $_SERVER['HTTP_HOST'] ?? ($_SERVER['SERVER_NAME'] ?? '');
        $fullUrl = $scheme . '://' . $host . ($uri ?? '');

        // Only the fields you want
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
            $ch = curl_init($this->googleScriptUrl);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST  => 'POST',
                CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
                CURLOPT_POSTFIELDS     => json_encode($payload, JSON_UNESCAPED_SLASHES),
                CURLOPT_TIMEOUT        => 4,
            ]);
            $resp  = curl_exec($ch);
            $err   = curl_error($ch);
            $code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($resp === false || $err || $code >= 400) {
                log_message('error', "[VisitLogger] GAS POST failed: status=$code err=$err body=".(string)$resp);
            }
        } catch (Exception $e) {
            log_message('error', '[VisitLogger] Exception: '.$e->getMessage());
        }
    }
}