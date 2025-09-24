<?php
//error_reporting(1);
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();

        $this->enquiries = 'enquiries';

        $this->ip_address = $this->MDL_Settings->get_user_ip();
        // $this->ip_address = '217.165.74.34';
        $g_data = $this->getLocation($this->ip_address);


        $this->user_agent = $_SERVER['HTTP_USER_AGENT'];


        $this->geoplugin_city = !empty($g_data['city']) ? $g_data['city'] : '';
        $this->geoplugin_region = !empty($g_data['region']) ? $g_data['region'] : '';
        $this->geoplugin_countryName = !empty($g_data['country']) ? $g_data['country'] : '';


//         $g_data = unserialize(file_get_contents('http://ip-api.com/php/'.$this->ip_address));
//
//         $this->geoplugin_city = !empty($g_data['city'])?$g_data['city']:'';
//         $this->geoplugin_region = !empty($g_data['regionName'])?$g_data['regionName']:'';
//         $this->geoplugin_countryName = !empty($g_data['country'])?$g_data['country']:'';


    }


    //index
    public function index()
    {


        redirect('/');
    }


    //general contact form
public function contact()
{
    if (!$this->input->is_ajax_request()) {
        exit('No direct script access allowed');
    }

    date_default_timezone_set('Asia/Dubai');

    // Inputs
    $post          = $this->input->post(NULL, true);
    $first_name    = html_escape($this->input->post('fname', true));
    $last_name_in  = html_escape($this->input->post('lname', true));
    $last_name     = !empty($last_name_in) ? $last_name_in : '';
    $name          = trim($first_name . ' ' . $last_name);
    $email         = html_escape($this->input->post('email', true));
    $phone         = html_escape($this->input->post('phone', true));
    $customer_type = html_escape($this->input->post('customer_type', true));
    $message_form  = html_escape($this->input->post('message', true));
    $form_name     = html_escape($this->input->post('form_name', true));
    $url_from      = html_escape($this->input->post('url_from', true));

    $enq_date = date("d-M-Y h:i:s A");

    // Settings
    $settings         = $this->MDL_Settings->getsettingsData();
    $admin_email_list = $settings->contact_us_email;
    $company_name     = $settings->company_name;
    $subject          = 'New Enquiry is received - ' . $company_name;

    // Email validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $out = [
            'flag'         => 0,
            'emailError'   => 'Invalid Email address !',
            'captchaError' => '',
            'status'       => 'invalid_email'
        ];
        if (ob_get_length()) { @ob_end_clean(); }
        header('Content-Type: text/plain; charset=utf-8');
        echo json_encode($out, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }

   
    $captcha_insert        = $this->input->post('captcha');
    $contain_sess_captcha  = $_SESSION[ENC_LOGIN]['mycaptcha_' . $form_name] ?? '';
    if ($captcha_insert != $contain_sess_captcha) {
        $out = [
            'flag'         => 0,
            'emailError'   => '',
            'captchaError' => 'Invalid Captcha !',
            'status'       => 'invalid_captcha'
        ];
        if (ob_get_length()) { @ob_end_clean(); }
        header('Content-Type: text/plain; charset=utf-8');
        echo json_encode($out, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }

    // Tracking / meta
    $ip_address            = $this->ip_address ?? $this->input->ip_address();
    $user_agent            = $this->user_agent ?? ($_SERVER['HTTP_USER_AGENT'] ?? '');
    $geoplugin_city        = $this->geoplugin_city ?? '';
    $geoplugin_region      = $this->geoplugin_region ?? '';
    $geoplugin_countryName = $this->geoplugin_countryName ?? '';

    // Persist enquiry
    $ins_data = [
        "name"          => $name,
        "email"         => $email,
        "phone"         => $phone,
        "message"       => $message_form,
        "date"          => $enq_date,
        "form_name"     => $form_name,
        "form_name_str" => ($form_name === 'register' ? 'Register Form' : 'Contact Form'),
        "url_from"      => $url_from,
        "ip_address"    => $ip_address,
        "city"          => $geoplugin_city,
        "region"        => $geoplugin_region,
        "country"       => $geoplugin_countryName,
        "user_agent"    => $user_agent,
    ];
    try {
        $this->MDL_Settings->insert_data($this->enquiries, $ins_data);
    } catch (Exception $e) {
        log_message('error', '[contact] DB insert failed (non-blocking): ' . $e->getMessage());
    }

    // Google Sheet push
    $sheetResponse = null;
    try {
        $googleScriptUrl = 'https://script.google.com/macros/s/AKfycbwZCaMfeWBd1DKY0stTPGqdlFSvfeljNnff-QDuGES5HydzNAF7N8ulK_5Kd-JrUwun/exec';
        $payload = [
            'fname'     => $first_name,
            'lname'     => $last_name,
            'email'     => $email,
            'phone'     => $phone,
            'message'   => $message_form,
            'date'      => date("d-M-Y h:i:s A"),
            'form_name' => $form_name ?: 'Contact',
            'city'      => $geoplugin_city,
        ];
        if (!empty($customer_type)) {
            $payload['customer_type'] = $customer_type;
        }

        $ch = curl_init($googleScriptUrl);
        curl_setopt_array($ch, [
            CURLOPT_CUSTOMREQUEST  => "POST",
            CURLOPT_POSTFIELDS     => json_encode($payload),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER     => ['Content-Type: application/json'],
            CURLOPT_TIMEOUT        => 15,
        ]);
        $sheetResponse = curl_exec($ch);
        if ($sheetResponse === false) {
            log_message('error', '[contact] Google Sheet POST failed (non-blocking): ' . curl_error($ch));
            $sheetResponse = null;
        }
        curl_close($ch);
    } catch (Exception $e) {
        log_message('error', '[contact] Google Sheet exception (non-blocking): ' . $e->getMessage());
    }

    // Compose email body
    $body  = "New enquiry received:\n\n";
    $body .= "Name:      {$name}\n";
    $body .= "Email:     {$email}\n";
    $body .= "Phone:     {$phone}\n";
    $body .= "Message:   {$message_form}\n";
    $body .= "URL From:  {$url_from}\n";
    $body .= "IP:        {$ip_address}\n";
    $body .= "UA:        {$user_agent}\n";
    $body .= "City:      {$geoplugin_city}\n";
    $body .= "Region:    {$geoplugin_region}\n";
    $body .= "Country:   {$geoplugin_countryName}\n";
    $body .= "Submitted: " . date("Y-m-d H:i:s") . "\n";

    // Email config
    $config = [
        'protocol'     => 'smtp',
        'smtp_host'    => 'smtp.gmail.com',
        'smtp_user'    => 'forms@mmzholdings.com',
        'smtp_pass'    => 'pmeelwucehbchapk', // app password
        'smtp_port'    => 587,
        'smtp_crypto'  => 'tls',
        'mailtype'     => 'text',
        'charset'      => 'utf-8',
        'newline'      => "\r\n",
        'crlf'         => "\r\n",
        'smtp_timeout' => 10
    ];

    $this->load->library('email', $config, 'emailer');
    $this->emailer->from('forms@mmzholdings.com', $company_name ?: 'Website');

    if (!empty($admin_email_list)) {
        $to = array_filter(array_map('trim', explode(',', $admin_email_list)));
        if (!empty($to)) {
            $this->emailer->to($to);
        } else {
            $this->emailer->to('alfiya@hikmara.ai');
        }
    } else {
        $this->emailer->to('alfiya@hikmara.ai');
    }

    $this->emailer->subject($subject);
    $this->emailer->message($body);

    $sent = $this->emailer->send();

    if (!$sent) {
        $smtpDebug = $this->emailer->print_debugger(['headers','subject','body']);
        log_message('error', '[contact] SMTP send failed: ' . $smtpDebug);

        $response = [
            'flag'         => 0,
            'emailError'   => '',
            'captchaError' => '',
            'status'       => 'mail_failed',
            'message'      => 'We could not send your enquiry right now.',
            'sheetResult'  => $sheetResponse,
            'smtpDebug'    => $smtpDebug
        ];
        if (ob_get_length()) { @ob_end_clean(); }
        header('Content-Type: text/plain; charset=utf-8');
        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        exit;
    }

    // Success
    $response = [
        'flag'         => 1,
        'emailError'   => '',
        'captchaError' => '',
        'status'       => 'success',
        'message'      => 'Enquiry sent successfully',
        'sheetResult'  => $sheetResponse
    ];
    if (ob_get_length()) { @ob_end_clean(); }
    header('Content-Type: text/plain; charset=utf-8');
    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    exit;
}






    public function getLocation($ip)
    {

        $ch = curl_init('http://ipwhois.app/json/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response
        $ipWhoIsResponse = json_decode($json, true);
        // Country code output, field "country_code"
        return $ipWhoIsResponse;

        //return $data = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip));
        //$g_data = unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

    }


    //newsletter
    public function newsletter()
    {
        $post = $this->input->post();
//print_r($post);exit;
        if (!empty($post)) {

            $email = $post['email'];

            $output = array();
            $error = 0;

            $enq_date = date('Y-m-d');

            $output['emailError'] = '';

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 1;
                $output['emailError'] = "Invalid Email address !";
            }


            if (!$error) {
                $ins_data = array('email' => $email, 'date' => $enq_date);
                $ins_id = $this->MDL_Settings->subscribe($ins_data);
                $output['flag'] = $ins_id;

            } else {
                $output['flag'] = 0;
            }

            echo json_encode($output);
            exit;
        } else
            $output['flag'] = 0;
    }


    function changeDate($date)
    {
        $old_str = strtotime($date);
        $new_date = date('d-M-Y', $old_str);
        return $new_date;
    }


}
