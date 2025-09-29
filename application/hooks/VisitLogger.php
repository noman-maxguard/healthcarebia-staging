<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VisitLogger
{
    // Your Apps Script /exec URL
    private $googleScriptUrl = 'https://script.google.com/macros/s/AKfycbydoXnodGMX22eki7c043zqMZVKLhE7NkXAwzj4Jb2XlIKaqwqFZFm5jWhUX72d6THKjA/exec';

    public function log()
    {
        if (is_cli()) return;

        // (Optional) skip admin URLs
        $uri = $_SERVER['REQUEST_URI'] ?? '';
        if (strpos($uri, '/admin') === 0) return;

        // Start a PHP session (hooks can run before CI's session lib)
        if (session_status() === PHP_SESSION_NONE) {
            @session_start();
        }

        // Only once per session
        if (!empty($_SESSION['visitlogger_first_logged'])) {
            return;
        }
        $_SESSION['visitlogger_first_logged'] = true;

        $this->sendHit();
    }

    private function sendHit(): void
    {
        // IP (CF/proxy aware)
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP']
            ?? (isset($_SERVER['HTTP_X_FORWARDED_FOR'])
                    ? trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0])
                    : ($_SERVER['REMOTE_ADDR'] ?? ''));
        $ip = filter_var($ip, FILTER_VALIDATE_IP) ?: null;

        // Full URL
        $scheme = !empty($_SERVER['HTTP_X_FORWARDED_PROTO']) ? $_SERVER['HTTP_X_FORWARDED_PROTO']
                : ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http');
        $host   = $_SERVER['HTTP_HOST'] ?? ($_SERVER['SERVER_NAME'] ?? '');
        $uri    = $_SERVER['REQUEST_URI'] ?? '/';
        $fullUrl = $scheme . '://' . $host . $uri;

        // Payload (only date, ip, url)
        $payload = [
            'date' => date("d-M-Y h:i:s A"),
            'ip'   => $ip,
            'url'  => $fullUrl,
        ];

        // POST to GAS (fire-and-forget)
        try {
            $ch = curl_init($this->googleScriptUrl);
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST  => 'POST',
                CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
                CURLOPT_POSTFIELDS     => json_encode($payload, JSON_UNESCAPED_SLASHES),
                CURLOPT_TIMEOUT        => 4,
            ]);
            $resp = curl_exec($ch);
            $err  = curl_error($ch);
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($resp === false || $err || $code >= 400) {
                log_message('error', "[VisitLogger] GAS POST failed code=$code err=$err resp=".(string)$resp);
            }
        } catch (Exception $e) {
            log_message('error', '[VisitLogger] Exception: '.$e->getMessage());
        }
    }
}
