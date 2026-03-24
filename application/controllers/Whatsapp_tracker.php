<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Whatsapp_tracker extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function track_click()
    {
        log_message('error', '[wa_track] method reached');

        $page_url  = $this->input->post('page_url', true);
        $wa_link   = $this->input->post('wa_link', true);
        $link_text = $this->input->post('link_text', true);
        $browser   = $this->input->post('browser', true);

        log_message('error', '[wa_track] POST: ' . json_encode([
            'page_url'  => $page_url,
            'wa_link'   => $wa_link,
            'link_text' => $link_text,
            'browser'   => $browser
        ]));

        // if (empty($wa_link)) {
        //     log_message('error', '[wa_track] wa_link missing');
        //     echo json_encode(['status' => 'error', 'message' => 'wa_link missing']);
        //     return;
        // }

        $subject = 'HCA - New WhatsApp Click Detected on website';

        $message  = "A visitor clicked a WhatsApp button on your website.\n\n";
        $message .= "Page URL: " . $page_url . "\n";
        $message .= "Button Text: " . $link_text . "\n\n";
        $message .= "Browser: " . $browser . "\n";
        $message .= "Time: " . date('F j, Y g:i A') . "\n";

        $config = [
            'protocol'     => 'smtp',
            'smtp_host'    => 'smtp.gmail.com',
            'smtp_user'    => 'forms@mmzholdings.com',
            'smtp_pass'    => 'pmeelwucehbchapk',
            'smtp_port'    => 587,
            'smtp_crypto'  => 'tls',
            'mailtype'     => 'text',
            'charset'      => 'utf-8',
            'newline'      => "\r\n",
            'crlf'         => "\r\n",
            'smtp_timeout' => 10
        ];

        $this->load->library('email', $config, 'emailer');

        $this->emailer->from('forms@mmzholdings.com', 'Whatsapp website Tracker');
        $this->emailer->to([
            'noman@maxguard.ae',
            // 'info@healthcarebia.ae'
        ]);
        $this->emailer->subject($subject);
        $this->emailer->message($message);

        $sent = $this->emailer->send();

        if (!$sent) {
            $debug = $this->emailer->print_debugger(['headers', 'subject', 'body']);
            log_message('error', '[wa_track] EMAIL FAILED: ' . $debug);
            echo json_encode(['status' => 'error', 'message' => 'mail failed', 'debug' => $debug]);
            return;
        }

        log_message('error', '[wa_track] EMAIL SENT');
        echo json_encode(['status' => 'success']);
    }
}