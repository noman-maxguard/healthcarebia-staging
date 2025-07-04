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


    public function push_sheet($post)
    {


        $webhook_url = 'https://connect.pabbly.com/workflow/sendwebhookdata/IjU3NmQwNTY0MDYzNzA0MzY1MjY0NTUzNSI_3D_pc';
        $curl = curl_init($webhook_url);
        $jsonDataEncoded = json_encode($post);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        return curl_exec($curl);

    }


    //general contact form
    public function contact()
    {
        $settings = $this->MDL_Settings->getsettingsData();
        $admin_email_list = $settings->contact_us_email;
        $company_name = $settings->company_name;

        $post = $this->input->post();

        $output = array();
        $error = 0;

        $output['captchaError'] = '';


        if (!empty($post)) {
            $subject = 'New Enquiry is received - ' . $company_name;


            $first_name = $this->input->post('fname');
            $last_name = $this->input->post('lname');
            $last_name = !empty($last_name) ? ' ' . $last_name : '';
            $name = $first_name . $last_name;
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');
            $message_form = $this->input->post('message');

            $form_name = $this->input->post('form_name');
            $form_name_str = $form_name == 'register' ? 'Register Form' : 'Contact Form';

            $url_from = $this->input->post('url_from');

            // $campaign = $this->input->post('page_name');
            // $source = $this->input->post('source');

            //Captcha
            $captcha_insert = $this->input->post('captcha');
            $contain_sess_captcha = $_SESSION[ENC_LOGIN]['mycaptcha_' . $form_name];
            if ($captcha_insert == $contain_sess_captcha) {

            } else {

                $error = 2;
                $output['captchaError'] = "Invalid Captcha !";

            }
            //Captcha


            $enq_date = date("d-M-Y h:i:s A");

            $date = date("d/m/Y");
            $date_sheet = date("M d, Y");
            $time = date("h : i A");


            $output['emailError'] = '';

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 1;
                $output['emailError'] = "Invalid Email address !";
            }


            if (!$error) {

                //user tracking
                $ip_address = $this->ip_address;
                $user_agent = $this->user_agent;

                $geoplugin_city = $this->geoplugin_city;
                $geoplugin_region = $this->geoplugin_region;
                $geoplugin_countryName = $this->geoplugin_countryName;
                //user tracking


                $ins_data = array(

                    // "type" => $page,

                    "name" => $name,
                    "email" => $email,
                    "phone" => $phone,
                    "message" => $message_form,
                    // "customer_type"  => $customer_type,
                    "date" => $enq_date,

                    "form_name" => $form_name,
                    "form_name_str" => $form_name_str,

                    "url_from" => $url_from,

                    "ip_address" => $ip_address,

                    "city" => $geoplugin_city,
                    "region" => $geoplugin_region,
                    "country" => $geoplugin_countryName,
                    "user_agent" => $user_agent,


                );

                $ins_id = $this->MDL_Settings->insert_data($this->enquiries, $ins_data);


                if (!empty($ins_id)) {
                    //  $ins_data['form_name'] = $form_name;
                    //$ins_data['other'] = $campaign;
                    //$ins_data['source'] = $source;
                    $ins_data['date'] = "$date_sheet";
                    $ins_data['time'] = "$time";

                    $ins = $this->push_sheet($ins_data);

		    $googleScriptUrl = 'https://script.google.com/macros/s/AKfycbwZCaMfeWBd1DKY0stTPGqdlFSvfeljNnff-QDuGES5HydzNAF7N8ulK_5Kd-JrUwun/exec';

        $payload = [
            'fname'   => $first_name,
            'lname'   => $last_name,
            'email'   => $email,
            'phone'   => $phone,
            'message' => $message_form,
            // 'customer_type'=> $customer_type,
            'date'      => date("d-M-Y h:i:s A"),
            'form_name' => $post['form_name'] ?? '',
            'city'      => $this->geoplugin_city,

        ];

        $ch = curl_init($googleScriptUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,   json_encode($payload));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,   ['Content-Type: application/json']);
        $sheetResponse = curl_exec($ch);
        curl_close($ch);
                }


                $message = "";
                $message .= "<table>";
                $message .= "<thead>";
                $message .= "<tr><th colspan='2' align='center'>Enquiry Details</th></tr>";
                $message .= "</thead>";
                $message .= "<tbody>";
                $message .= "<tr><td>Enquiry Date : </td><td>$enq_date</td></tr>";
                // $message .= "<tr><td>Sent from</td><td>$page_name</td></tr>";


                $message .= "<tr><td>Name : </td><td>$name</td></tr>";
                $message .= "<tr><td>Email : </td><td>$email</td></tr>";
                $message .= "<tr><td>Phone : </td><td>$phone</td></tr>";

                $message .= "<tr><td>Message : </td><td>$message_form</td></tr>";

                $message .= "<tr><td>Page URL : </td><td>$url_from</td></tr>";

                $message .= "<tr><td colspan='2'>&nbsp;</td></tr>";


                $message .= "<tr><td>IP Address : </td><td>$ip_address</td></tr>";
                $message .= "<tr><td>User Agent : </td><td>$user_agent</td></tr>";

                $message .= "<tr><td>City : </td><td>$geoplugin_city</td></tr>";
                $message .= "<tr><td>Region : </td><td>$geoplugin_region</td></tr>";
                $message .= "<tr><td>Country : </td><td>$geoplugin_countryName</td></tr>";

                $message .= "</tbody>";
                $message .= "</table>";


                $mail_flag = 0;

                //send mail
                if (!empty($admin_email_list)) {
                    $admin_email_list_arr = explode(',', $admin_email_list);
                    if (!empty($admin_email_list_arr)) {
                        foreach ($admin_email_list_arr as $admin_email_list_arr_one) {
                            if (!empty($admin_email_list_arr_one)) {
                                if (filter_var($admin_email_list_arr_one, FILTER_VALIDATE_EMAIL)) {
                                    $admin_email = $admin_email_list_arr_one;
                                    $mail_flag_res = $this->MDL_Settings->send_email($admin_email, $subject, $message);

                                    if (!empty($mail_flag_res)) {
                                        if ($mail_flag_res == 1)
                                            $mail_flag = 1;
                                    }

                                }
                            }
                        }
                    }
                }

                //send mail

                $mail_flag = $mail_flag == 0 ? -1 : $mail_flag;


                $output['flag'] = $mail_flag;

            } else if ($error == 1) {
                $output['flag'] = 0;
            } else {
                $output['flag'] = -2;
            }

            echo json_encode($output);
            exit;
        } else
            redirect('/');

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
