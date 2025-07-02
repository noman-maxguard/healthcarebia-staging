<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_Controller{
    function __construct()
    {
        parent::__construct();
      
        
    }

 public function getLocation($ip)
 {
   //return $g_data = unserialize(file_get_contents('http://ip-api.com/php/'. $ip)); 
   $ch = curl_init('http://ipwhois.app/json/' . $ip);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   $json = curl_exec($ch);
   curl_close($ch);
   // Decode JSON response
   $ipWhoIsResponse = json_decode($json, true);
   // Country code output, field "country_code"
   return $ipWhoIsResponse;

 }  

public function index()
{
     $user_id  = get_cookie('user_email');
     $password = get_cookie('user_password');
     if(isset($user_id) && isset($password))
     {
         $data = $this->Login_model->login_user($user_id,$password,$this->data['tbl_tbl_user']);
         if(!empty($data))
         {
                 $id       = !empty($data['id']) ? $data['id'] : 0;
                 $email    = !empty($data['email']) ? $data['email'] : 0;
                 $password = !empty($data['password']) ? $data['password'] : 0;
                 $role     = !empty($data['role']) ? $data['role'] : 0;
                 $name     = !empty($data['company_name']) ? $data['company_name'] : 0;
                 $user     = array(
                            'user_id' => $id,
                            'user_name' =>$name ,
                            'user_email' => $email,
                            'user_password' => $password,
                            'user_role' => $role,
                            'is_login' => 1,

                             );

                $this->session->set_userdata($user);

                date_default_timezone_set('Asia/Dubai');
                $date       = date("Y-m-d"); 
                $time       = date('h:i:s a');
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

                $city = !empty($g_data['city'])?$g_data['city']:'';
                $region = !empty($g_data['region'])?$g_data['region']:'';
                $country = !empty($g_data['country'])?$g_data['country']:'';

                $log = array(
                'email' => $email,
                'date' => $date,
                'ip' => $ip,
                'status' => '1',
                'user_agent' => $agent,
                'reason' => 'success',
                );

                $insert=$this->Common_model->addparam($log,$this->data['tbl_user_log']);
                
                redirect('admin/dashboard');
              
            
         
         }
         else
         {
         	 
            $log = array(
            'email' => $u,
            'date' => $date,
            'ip' => $ip,
            'status' => '1',
            'user_agent' => $agent,
            'reason' => 'No User Found| Invalid credentials',
            );

            $insert=$this->Common_model->addparam($log,$this->data['tbl_user_log']);

             redirect('admin/login');
         }


     }
     else
     {
     	 $this->load->view('admin/common/login');
     } 

}

public function auth()
{

        $post=$this->input->post();
        date_default_timezone_set('Asia/Dubai');
        $date       = date("Y-m-d"); 
        $time       = date('h:i:s a');

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

        $city = !empty($g_data['city'])?$g_data['city']:'';
        $region = !empty($g_data['region'])?$g_data['region']:'';
        $country = !empty($g_data['country'])?$g_data['country']:'';

     

    	if (!empty($post))
    	{
    		$this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if($this->form_validation->run() == FALSE)
            {
                
                    $log = array(
                    'email' => '',
                    'date' => $date,
                    'ip' => $ip,
                    'status' => 0,
                    'user_agent' => $agent,
                    'reason' => 'Empty Form Fields.',
                    );

                    $insert=$this->Common_model->addparam($log,$this->data['tbl_user_log']);

                $this->session->set_flashdata('msg','<div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <div class="alert-icon">
                <i class="icon-check"></i>
                </div>
                <div class="alert-message">
                <span><strong>Fill!</strong> Empty Form Fields.</span>
                </div>
                </div>');

                redirect('admin/login');
            }

            else
            {

                  $u=html_escape($this->input->post('username'));
                  $q=html_escape($this->input->post('password'));
                  $data = $this->Login_model->login_user($u,$q,$this->data['tbl_tbl_user']);
                  if(!empty($data))
                  {
                     $id       = !empty($data['id']) ? $data['id'] : 0;
                     $email    = !empty($data['email']) ? $data['email'] : 0;
                     $password = !empty($data['password']) ? $data['password'] : 0;
                     $role     = !empty($data['role']) ? $data['role'] : 0;
                     $name     = !empty($data['name']) ? $data['name'] : 0;
                     $user     = array(
                      'user_id' => $id,
                      'user_name' =>$name ,
                      'user_email' => $email,
                      'user_password' => $password,
                      'user_role' => $role,
                      'is_login' => 1,

                      );
                     
                      $this->session->set_userdata($user);
                      $role = $this->session->userdata('user_role');

                        $log = array(
                        'email' => $email,
                        'date' => $date,
                        'ip' => $ip,
                        'status' => 1,
                        'user_agent' => $agent,
                        'reason' => 'success',
                        );

                        $insert=$this->Common_model->addparam($log,$this->data['tbl_user_log']);
                        redirect('admin/dashboard');



                }

                else
                {

                    
                    $log = array(
                    'email' => $u,
                    'date' => $date,
                    'ip' => $ip,
                    'status' => 0,
                    'user_agent' => $agent,
                    'reason' => 'No User Found| Invalid credentials',
                    );

                    $insert=$this->Common_model->addparam($log,$this->data['tbl_user_log']);

                    $this->session->set_flashdata('msg','<div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <div class="alert-icon">
                    <i class="icon-check"></i>
                    </div>
                    <div class="alert-message">
                    <span><strong>Invalid!</strong> Login Credentials or Deactivated Account Please contact Your Admin </span>
                    </div>
                    </div>');

                    redirect('admin/login');

                }

            }


    	}
      else
      {
    		redirect('admin/login');
    	}

}


public function logout()
{
    delete_cookie('user_email');
    delete_cookie('user_password');
    $user_data = $this->session->all_userdata();
    $this->session->sess_destroy();
    redirect('admin/login');	
}



}


?>