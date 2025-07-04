<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends CI_Controller
{
    private $enquiries   = 'enquiries';
    private $ip_address;
    private $user_agent;
    private $geoplugin_city;
    private $geoplugin_region;
    private $geoplugin_countryName;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MDL_Settings');

        $this->ip_address = $this->MDL_Settings->get_user_ip();
        $g                = $this->getLocation($this->ip_address);

        $this->user_agent           = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $this->geoplugin_city       = $g['city']    ?? '';
        $this->geoplugin_region     = $g['region']  ?? '';
        $this->geoplugin_countryName= $g['country'] ?? '';
    }
    public function download()
    {
        header('Content-Type: application/json');
        $fname    = trim($this->input->post('fname'));
        $lname    = trim($this->input->post('lname'));
        $email    = trim($this->input->post('email'));
        $phone    = trim($this->input->post('phone'));
        $referrer = $this->input->post('url_from');

        $name     = rtrim("$fname $lname");
        $enq_date = date('d-M-Y h:i:s A');

        $out = ['flag' => 0, 'emailError' => ''];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $out['emailError'] = 'Invalid Email address!';
            echo json_encode($out);   return;
        }
        $row = [
            'name'          => $name,
            'email'         => $email,
            'phone'         => $phone,
            'message'       => '', 
            'date'          => $enq_date,

            'form_name'     => 'ebook_download',
            'form_name_str' => 'eBook Download Form',
            'url_from'      => $referrer,

            'ip_address'    => $this->ip_address,
            'city'          => $this->geoplugin_city,
            'region'        => $this->geoplugin_region,
            'country'       => $this->geoplugin_countryName,
            'user_agent'    => $this->user_agent,
        ];
        $lead_id = $this->MDL_Settings->insert_data($this->enquiries, $row);

        if ($lead_id) {
            $this->push_sheet([
                'fname'     => $fname,
                'lname'     => $lname,
                'email'     => $email,
                'phone'     => $phone,
                'date'      => $enq_date,
                'form_name' => 'ebook_download',
                'city'      => $this->geoplugin_city,
            ]);
        }
        $settings      = $this->MDL_Settings->getsettingsData();
        $admins        = array_filter(array_map('trim',
                               explode(',', $settings->contact_us_email)));
        $subject = 'New eBook Download Request – ' . $settings->company_name;

        $body = <<<HTML
<table border="1" cellpadding="6" style="border-collapse:collapse">
  <thead><tr><th colspan="2" align="center">eBook Download Request</th></tr></thead>
  <tbody>
    <tr><td>Date</td><td>{$enq_date}</td></tr>
    <tr><td>Name</td><td>{$name}</td></tr>
    <tr><td>Email</td><td>{$email}</td></tr>
    <tr><td>Phone</td><td>{$phone}</td></tr>
    <tr><td>Page URL</td><td>{$referrer}</td></tr>
    <tr><td>IP Address</td><td>{$this->ip_address}</td></tr>
    <tr><td>City</td><td>{$this->geoplugin_city}</td></tr>
    <tr><td>Region</td><td>{$this->geoplugin_region}</td></tr>
    <tr><td>Country</td><td>{$this->geoplugin_countryName}</td></tr>
  </tbody>
</table>
HTML;

        $sent = false;
        foreach ($admins as $admin){
            if (filter_var($admin, FILTER_VALIDATE_EMAIL)){
                if ($this->MDL_Settings->send_email($admin, $subject, $body) == 1){
                    $sent = true;
                }
            }
        }
        $out['flag'] = $sent ? 1 : -1;
        echo json_encode($out);
    }

    

    private function getLocation($ip)
    {
        $ch = curl_init("http://ipwhois.app/json/{$ip}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);  curl_close($ch);
        return json_decode($json, true) ?: [];
    }
}
