<?php
defined('BASEPATH') OR exit('No direct script access allowed');
ini_set('display_errors', 0);
error_reporting(E_ALL);
ini_set('memory_limit', '4400M');
ini_set('max_execution_time', '3000');
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception; 

class Welcome extends MY_Controller {
function __construct()
{
parent::__construct();
// include APPPATH . 'third_party/vendor/phpmailer/src/Exception.php';
// include APPPATH . 'third_party/vendor/phpmailer/src/PHPMailer.php';
// include APPPATH . 'third_party/vendor/phpmailer/src/SMTP.php'; 
include APPPATH . 'third_party/class.phpmailer.php';
include APPPATH . 'third_party/class.smtp.php';

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

public function createzip()
{
$this->load->library('zip');
$filename = "backup.zip";
$path = FCPATH;
$this->zip->read_dir($path);
$this->zip->archive(FCPATH.'/archivefiles/'.$filename);
$this->zip->download($filename);

}


public function sendContactMail($message,$subject)
{

    if(!empty($this->data['e_s']->mail_cate) == 1)
    {

                            $host=$this->data['e_s']->smtp_server;
                            $secure=$this->data['e_s']->smtp_secure;
                            $port= $this->data['e_s']->smtp_ports;
                            $username = !empty($this->data['e_s']->smtp_username)?$this->data['e_s']->smtp_username:'';
                            $pass = !empty($this->data['e_s']->smtp_password)?$this->data['e_s']->smtp_password:'';
                            $display_name = $this->data['e_s']->display_name;
                            $email_ssl = 'tls'; //tls

                            // Voy30055
                                        $mail = new PHPMailer();
                                        $mail->IsSMTP();
                                        $mail->SMTPDebug = 0;
                                        $mail->SMTPAuth = TRUE;
                                        $mail->SMTPSecure = $email_ssl;
                                        $mail->Port =  $port;
                                        $mail->Username = $username;
                                        $mail->Password = $pass;
                                        $mail->Host = $host;
                                        $mail->Mailer = "smtp";
                                        $mail->SetFrom($username, $display_name);

                                        $mail->SMTPDebug   = 2;
    $mail->Debugoutput = function($str, $level) {
        log_message('error', "PHPMailer [level $level]: $str");
    };
                                       
                                        //$mail->AddAddress($this->data['c_settings']->email_one, $name);

                                         if(!empty($this->data['c_settings']->email_one))
                                         {
                                            $re_email=@explode('/', $this->data['c_settings']->email_one);
                                            foreach($re_email as $emails_data)
                                            {
                                               $mail->AddAddress($emails_data);
                                            }
                                        }

                                        $mail->Subject = $subject;
                                        $mail->WordWrap = 80;
                                        $mail->MsgHTML($message);
                                        $mail->IsHTML(true);
                                        if($mail->Send()) 
                                        {
                                            
                                            return TRUE;
                                        } 
                                        else 
                                        {
                                            
                                              return FALSE;

                                        }



    }

    else
    {
        $to = $this->data['c_settings']->email_one;
        $from = $this->data['c_settings']->email_one;
         
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $re_email=@explode('/', $this->data['c_settings']->email_one);
        $to=@implode(',',$re_email);
     
        // Create email headers
            $headers .= 'From: '.$re_email[0]."\r\n".
            'Reply-To: '.$to."\r\n" .
            'X-Mailer: PHP/' . phpversion();   
        if(mail($to, $subject, $message, $headers))
        {
             return TRUE;
        } 
        else
        {
            return FALSE;
        }

    }


}


public function cform()
{

if (!$this->input->is_ajax_request()) 
{
    exit('No direct script access allowed');
}
    $name      = html_escape($this->input->post('name'));
    $lastname  = html_escape($this->input->post('lastname'));
    $email     = html_escape($this->input->post('email'));
    $mobile    = html_escape($this->input->post('mobile'));
    $message   = html_escape($this->input->post('message'));
    date_default_timezone_set('Asia/Dubai');

    $payload = [
            'fname'   => $name,
            'lname'   => $lastname,
            'email'   => $email,
            'phone'   => $mobile,
            'message' => $message,
            // 'customer_type'=> $customer_type,
            'date'      => date("d-M-Y h:i:s A"),
            'form_name' => 'Ads',
            'city'      => " ",

        ];

        $googleScriptUrl = 'https://script.google.com/macros/s/AKfycbwZCaMfeWBd1DKY0stTPGqdlFSvfeljNnff-QDuGES5HydzNAF7N8ulK_5Kd-JrUwun/exec';

        $ch = curl_init($googleScriptUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS,   json_encode($payload));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,   ['Content-Type: application/json']);
        $sheetResponse = curl_exec($ch);
        curl_close($ch);

    $this->load->library('email');
    $this->email->from('forms@mmzholdings.com', 'Healthcarebia');
    $this->email->to('alfiya@hikmara.ai');
    $this->email->subject('Ads Enquiry-Request a callback');

    $body  = "New Ad enquiry received:\n\n";
    $body .= "Name:      $name $lastname\n";
    $body .= "Email:     $email\n";
    $body .= "Mobile:    $mobile\n";
    $body .= "Message:   $message\n";
    $body .= "Submitted: " . date("Y-m-d H:i:s") . "\n";

    $this->email->message($body);
    $sent = $this->email->send();

    if ( ! $sent) {
        log_message('error', $this->email->print_debugger(['headers', 'subject', 'body']));
        echo $this->email->print_debugger();
        }

    echo json_encode([
        'flag'          => $sent ? 1 : 0,
        'status'        => $sent ? 'Enquiry sent successfully' : 'Mail send failed',
        'sheetResult'   => $sheetResponse,
    ]);
}

public function cform_old()
{
if (!$this->input->is_ajax_request()) 
{
    exit('No direct script access allowed');
}
else
{
    
    $captcha_response = trim($this->input->post('g-recaptcha-response'));
    if($captcha_response != '')
    {
        $keySecret = '6LdEu00jAAAAAISNF8z6o6GN5IUDT52cJt_QYTrN';
        $check     = array(
        'secret'        =>  $keySecret,
        'response'      =>  $this->input->post('g-recaptcha-response'),
        );

        $startProcess = curl_init();
        curl_setopt($startProcess, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($startProcess, CURLOPT_POST, true);
        curl_setopt($startProcess, CURLOPT_POSTFIELDS, http_build_query($check));
        curl_setopt($startProcess, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($startProcess, CURLOPT_RETURNTRANSFER, true);
        $receiveData = curl_exec($startProcess);
        $finalResponse = json_decode($receiveData, true);
        if($finalResponse['success'])
        {
            $this->form_validation->set_rules('email','Email', 'trim|required|valid_email|xss_clean');
            if($this->form_validation->run() == TRUE)
            {
                
               
                $ip = $_SERVER['REMOTE_ADDR'];
                if ($this->agent->is_browser())
                {
                  $agent = $this->agent->browser().' '.$this->agent->version();
                }
                elseif ($this->agent->is_robot())
                {
                  $agent = $this->agent->robot();
                }
                elseif ($this->agent->is_mobile())
                {
                  $agent = $this->agent->mobile();
                }
                else
                {
                  $agent = 'Unidentified User Agent';
                }

                $platform=$this->agent->platform();
                $ip = $this->input->ip_address();
                $g_data=$this->getLocation($ip);
                //$g_data = unserialize(file_get_contents('http://ip-api.com/php/'. $ip));

                $geoplugin_city = !empty($g_data['city'])?$g_data['city']:'';
                $geoplugin_region = !empty($g_data['region'])?$g_data['region']:'';
                $geoplugin_countryName = !empty($g_data['country'])?$g_data['country']:'';

                date_default_timezone_set('Asia/Dubai');
                $date       = date("Y-m-d"); 
                $time       = date('h:i:s a');

                $name = $this->input->post('name');
                $email = $this->input->post('email'); 
                $mobile = $this->input->post('mobile'); 
                $service=$this->input->post('service');   
                $gender=$this->input->post('gender'); 
                $appointmentdate=$this->input->post('appointmentdate');   
                $url=$this->input->post('url_from');
                $fname = $this->input->post('form_name');
                $message=$this->input->post('message');
             
                $params=array(
                'name'=>$name,
                'email'=>$email,
                'mobile'=>$mobile,
                'service'=>$service,
                'gender'=>$gender,
                'appointmentdate'=>$appointmentdate,
                'message'=>$message,
                'date'=>$date,
                'time'=>$time,
                'url_from' => $url,
                'form_name'=>$fname,
                "ip_address" => $ip,
                "city" => $geoplugin_city,
                "region" => $geoplugin_region,
                "country" => $geoplugin_countryName,
                "user_agent" => $agent,
                
                );

               $insert=$this->Common_model->cinsert($params,$this->data['tbl_enquiries']);
               if($insert)
               {
                       
                            
                            if($fname == 'footer-booking')
                            {

                                $table = "<style>th, td { padding: 15px; text-align: left; } th, td { border-bottom: 1px solid #ddd; } tr:hover {background-color: #f5f5f5};</style><table width='100%' style='' >";

                                $table = $table . "<tr><td>Date</td><td>$date</td></tr>";
                                $table = $table . "<tr><td>Time</td><td>$time</td></tr>";

                                $table = $table . "<tr><td>Name</td><td>$name</td></tr>";
                                $table = $table . "<tr><td>Email</td><td>$email</td></tr>";
                                $table = $table . "<tr><td>Mobile Number</td><td>$mobile</td></tr>";
                                $table = $table . "<tr><td>Service</td><td>$service</td></tr>";
                                $table = $table . "<tr><td>Gender</td><td>$gender</td></tr>";
                                $table = $table . "<tr><td>Appointment Date</td><td>$appointmentdate</td></tr>";
                                
                                $table = $table . "<tr><td>Page Url</td><td>$url</td></tr>";
                                $table = $table . "<tr><td>IP Address</td><td>$ip</td></tr>";
                                $table = $table . "<tr><td>User Agent</td><td>$agent</td></tr>";
                                $table = $table . "<tr><td>Geo City</td><td>$geoplugin_city</td></tr>";
                                $table = $table . "<tr><td>Region</td><td>$geoplugin_region</td></tr>";
                                $table = $table . "<tr><td>Country</td><td>$geoplugin_countryName</td></tr>";
                                $table = $table . "</table>";
                                $subject='Book a Appointment';

                           } 
                           else
                           {

                               $table = "<style>th, td { padding: 15px; text-align: left; } th, td { border-bottom: 1px solid #ddd; } tr:hover {background-color: #f5f5f5};</style><table width='100%' style='' >";

                                $table = $table . "<tr><td>Date</td><td>$date</td></tr>";
                                $table = $table . "<tr><td>Time</td><td>$time</td></tr>";

                                $table = $table . "<tr><td>Name</td><td>$name</td></tr>";
                                $table = $table . "<tr><td>Email</td><td>$email</td></tr>";
                                $table = $table . "<tr><td>Mobile Number</td><td>$mobile</td></tr>";
                                $table = $table . "<tr><td>Message</td><td>$message</td></tr>";
                              
                                
                                $table = $table . "<tr><td>Page Url</td><td>$url</td></tr>";
                                $table = $table . "<tr><td>IP Address</td><td>$ip</td></tr>";
                                $table = $table . "<tr><td>User Agent</td><td>$agent</td></tr>";
                                $table = $table . "<tr><td>Geo City</td><td>$geoplugin_city</td></tr>";
                                $table = $table . "<tr><td>Region</td><td>$geoplugin_region</td></tr>";
                                $table = $table . "<tr><td>Country</td><td>$geoplugin_countryName</td></tr>";
                                $table = $table . "</table>";
                                $subject='Contact Form';


                           }

                            $sendemail= $this->sendContactMail($table,$subject);
                            if(!empty($sendemail))
                            {
                                $response_array['flag'] =1;
                                $response_array['status'] ='Enquiry Sent Successfully';
                                $response_array['form_n']=$fname;
                            }
                            else
                            {
                                log_message('error', 'Mail failed: ' . $mail->ErrorInfo);
                                $response_array['flag'] =0;
                                $response_array['status'] ='Enquiry Sent Failed';
                            }     

         
                }
                else
                {
                   $response_array['flag'] =0;
                   $response_array['status'] ='Data updated Failed Please try again!';
                }                   
            }      
            else
            {
                  $response_array['flag']=0;
                  $response_array['status']='Invalid Email Or Email Address is Already Registered';
            } 
        }
        else
        {
              $response_array['flag']=0;
              $response_array['status']='Invalid Captcha';


        }   
    }
    else
    {
        $response_array['flag']=0;
        $response_array['status']='Invalid Captcha';

    } 




  
  echo json_encode($response_array);
}



}

public function index()
{
    
date_default_timezone_set('Asia/Dubai');
$date       = date("d-m-Y"); 
$time       = date('h:i:s a');
$last = $this->uri->total_segments();
$page = $this->uri->segment($last)?$this->uri->segment($last):'home';
$view_page=$this->Common_model->getviewfile_name($page,$this->data['tbl_menu']);  
if(!empty($view_page) && !empty($view_page->view_file_name))
{
        $viewpageid = !empty($view_page->id)?$view_page->id:'';
        $view_page   = $view_page->view_file_name;
        $common      = $this->Common_model->getinfo($page,$this->data['tbl_menu']);
        $filename = APPPATH.'views/frontend/'.$view_page.'.php';
        if(file_exists($filename))
        { 
                if($view_page == 'index')
                {
                    $data['page_details'] =$common;
                    $data['_view'] = 'frontend/'.$view_page;
                    $this->load->view('frontend/layouts/main_lp',$data); 
                }
                else if($view_page == 'lp')
                {
                   
                    $data['page_details'] =$common;
                    $data['_view'] = 'frontend/'.$view_page;
                    $this->load->view('frontend/layouts/main',$data); 

                    
                }
                else
                {
                    $data['page_details'] =$common;
                    $data['_view'] = 'frontend/'.$view_page;
                    $this->load->view('frontend/layouts/main_lp',$data);  
                    //$this->load->view('frontend/success',$data);

                }    

                
        } 
        else
        {
           redirect(base_url());
        }



}
else
{
redirect(base_url());

   
}

  
        
}


public function blog($offset = 0)
{
    $page='blog';
    $common      = $this->Common_model->getinfo($page,$this->data['tbl_menu']); 
    $limit = 10;
    $result = $this->Common_model->get_blogs($limit, $offset,$this->data['blog']);

    $data['blog_list'] = $result['rows'];
    $data['num_results'] = $result['num_rows'];


    $this->load->library('pagination');
    $config = array();
    $config['base_url'] = site_url("blog/page/");
    $config['total_rows'] = $data['num_results'];
    $config['per_page'] = $limit;

    //which uri segment indicates pagination number
    $config['uri_segment'] = 3;
    $config['use_page_numbers'] = TRUE;

    //max links on a page will be shown
    $config['num_links'] = 5;

    //various pagination configuration
    $config['full_tag_open'] = '<ul class="pagination blog-pagination">';
    $config['full_tag_close'] = '</ul>';
    $config['first_tag_open'] = '<li class="first">';
    $config['first_tag_close'] = '</li>';
    $config['first_link'] = '';
    $config['last_tag_open'] = '<li class="last">';
    $config['last_tag_close'] = '</li>';
    $config['last_link'] = '';
    $config['prev_tag_open'] = '<li class="prev">';
    $config['prev_tag_close'] = '</li>';
    $config['prev_link'] = '';
    $config['next_tag_open'] = '<li class="next">';
    $config['next_tag_close'] = '</li>';
    $config['next_link'] = '';
    $config['cur_tag_open'] = '<li class="current">';
    $config['cur_tag_close'] = '</li>';
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['page_details']=$common;
    $data['blogs']=$this->Common_model->getblog_most_popular($this->data['blog']);                              
    $data['_view'] = 'frontend/blog';
    $data['_form_common']='frontend/form_common';
    $this->load->view('frontend/layouts/main',$data);  


}






public function blog_details($i)
{

$details=$this->Common_model->get_blog_details($i,$this->data['blog']);
$previews =$this->Common_model->get_blog_previews_details($i,$this->data['blog']);


$next=$this->Common_model->get_blog_next_details($i,$this->data['blog']);
$data['previews']=$previews;
$data['next']=$next;
if(!empty($details))
{
   $data['blogs']       = $this->Common_model->getblog_most_popular_new($this->data['blog'],$i);
   $data['page_details'] =$details;
   $data['details']= $details;
   $data['_view']  = 'frontend/blog_detail';
   $this->load->view('frontend/layouts/main',$data);  
}
else
{
 redirect(base_url().'blog');
}


}






public function events_detail($i)
{
 $info=$this->Common_model->get_single_data($i,$this->data['tbl_news']);
 if(!empty($info))
 {
    $data['info']=$info;
    $data['_view'] = 'frontend/events_details';
    $this->load->view('frontend/layouts/main_inner',$data); 

 }else
 {
    redirect(base_url());
 }




}





public function mycaptcha()
{
    $data['session_index'] = 'mycaptcha';
    $this->load->view('frontend/mycaptcha',$data);
}


public function mycaptcha_contact()
{
    $data['session_index'] = 'mycaptcha_contact';
    $this->load->view('frontend/mycaptcha',$data);
}


public function mycaptcha_footer()
{
    $data['session_index'] = 'mycaptcha_footer';
    $this->load->view('frontend/mycaptcha',$data);
}


public function mycaptcha_popup()
{
    $data['session_index'] = 'mycaptcha_popup';
    $this->load->view('frontend/mycaptcha',$data);
}


public function fetch_data()
{
sleep(1);
$this->load->library("pagination");


$config = array();
$config["base_url"] = "#";
$config["total_rows"] = $total_row=$this->Common_model->count_all();

//  if($limit_per_page == 'all'){
//     $config["per_page"] = $total_row; 
// }else{
//  $config["per_page"] = $limit_per_page;
// }

$config["per_page"] = 8;
$config["uri_segment"] = 3;
$config["use_page_numbers"] = TRUE;
//$config['display_pages'] = FALSE;
$config['first_link'] = false;
$config['last_link'] = false;
$config["full_tag_open"] = '<ul class="pagination prdduct-pagination">';
$config["full_tag_close"] = '</ul>';
//$config['first_link'] = '';
$config["first_tag_open"] = '<li></a>';
$config["first_tag_close"] = '</li>';
// $config['last_link'] = '';
$config["last_tag_open"] = '<li>';
$config["last_tag_close"] = '</li>';
$config['next_link'] = '&gt;';
$config["next_tag_open"] = '<li>';
$config["next_tag_close"] = '</li>';
$config["prev_link"] = "&lt;";
$config["prev_tag_open"] = "<li>";
$config["prev_tag_close"] = "</li>";
$config["cur_tag_open"] = "<li class='active page-item'><a style='background: #b30a0c;' href='#'>";
$config["cur_tag_close"] = "</a></li>";
$config["num_tag_open"] = "<li>";
$config["num_tag_close"] = "</li>";
$config["num_links"] = 3;
$this->pagination->initialize($config);

$page   = $this->uri->segment('3');
$start  = ($page - 1) * $config["per_page"];

$output = array(
        'pagination_link'       =>  $this->pagination->create_links(),
        'product_list'          =>  $this->Common_model->fetch_data($config["per_page"], $start)
    );
    echo json_encode($output);

}

}
