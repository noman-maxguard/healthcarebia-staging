<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebooks extends CI_Controller
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

        $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
        $consent = isset($_POST["consent"]) && $_POST["consent"] === 'yes';
        
        if ($consent && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $googleScriptUrl = 'https://script.google.com/macros/s/AKfycbw_VYDmg4r_NOQ9PrYi0PJd_wC1CQcaAofFJnsfrO4MDE1m_KS6WaGZB1cjAouzCg0-/exec';

            $payload = [
                'Email'   => $email,
                'Date'      => date("d-M-Y h:i:s A"),

            ];

            $ch = curl_init($googleScriptUrl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS,   json_encode($payload));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER,   ['Content-Type: application/json']);
            $sheetResponse = curl_exec($ch);
            curl_close($ch);
        }
        $ebook_file = FCPATH . 'assets/ebook/Healthcarebia-ebook.pdf';
        if (file_exists($ebook_file)) {
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="'.basename($ebook_file).'"');
            header('Content-Length: ' . filesize($ebook_file));
            readfile($ebook_file);
            exit;
        } else {
            echo "eBook file not found! Path: " . $ebook_file;
        }
    }
    private function getLocation($ip)
    {
        $ch = curl_init("http://ipwhois.app/json/{$ip}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);  curl_close($ch);
        return json_decode($json, true) ?: [];
    }
}
