<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{

     public function __construct() {
       parent::__construct();
     }

    public function index()
    {

        $data = array();


        $username = $this->input->post('email');
        $password = $this->input->post('password');

        $data['back_url'] = $back_url = $this->input->get('url');

         $data['settings']=$this->MDL_Settings->getsettingsData();

        //check Login
         if(isset($username))
          {
              $data['back_url'] = $back_url = $this->input->post('back_url');


              //User log common
              $login_date = date("Y-m-d H:i:s");
              $login_ip = $this->get_user_ip();
              $user_agent =  $_SERVER['HTTP_USER_AGENT'];
              //User log common

              $flag_user = $this->MDL_Login->check_user($username);

              if($flag_user)
              {
                   $flag_user_Login = $this->MDL_Login->check_user_login($username,$password);
                   if($flag_user_Login)
                   {


                       $get_data = $this->MDL_Login->get_user_data($username,$password);
                       
                       $getsettingsData = $this->MDL_Settings->getsettingsData();

                       $math = 157*17*113+52;
                       $enc_flag = SHA1('hash_key_'.ENC_LOGIN.'_jm_'.$math);

                       $user_data = array(
                           "user_id"=>$get_data->id,
                           "email"=>$get_data->email,

                           "log_in"  => $enc_flag,

                           "name" => $get_data->name,
                           "logo" => $getsettingsData->logo,
						   "role" => $get_data->role,
                          
                           );


                       $this->session->set_userdata($user_data);


                       $log = array(

                           'email' => $get_data->email,
                           'date' => $login_date,
                           'ip' => $login_ip,
                           'status' => '1',
                           'user_agent' => $user_agent,
                           'reason' => ''


                       );
                       $ins_log = $this->MDL_Settings->insert_data('user_log',$log);


                       if(!empty($back_url))
                           redirect('/'.$back_url);

                       redirect('/admin/home');
                      
                           
                      

                   }
                   else {

                       $log = array(

                           'email' => $username,
                           'date' => $login_date,
                           'ip' => $login_ip,
                           'status' => '0',
                           'user_agent' => $user_agent,
                           'reason' => 'password'

                       );

                     $log_flag = $this->MDL_Login->verify_log($log);

                     if(!$log_flag)
                          $ins_log = $this->MDL_Settings->insert_data('user_log',$log);

                     $data['error'] = "Password is incorrect";
                     $this->load->view('admin/login',$data);
                    }
              }
              else {
                  $log = array(

                      'email' => $username,
                      'date' => $login_date,
                      'ip' => $login_ip,
                      'status' => '0',
                      'user_agent' => $user_agent,
                      'reason' => 'email'


                  );

                  $log_flag = $this->MDL_Login->verify_log($log);
                  if(!$log_flag)
                       $ins_log = $this->MDL_Settings->insert_data('user_log',$log);

                  $data['error'] = "This User does not exist";
                  $this->load->view('admin/login',$data);
              }


          }
          //Login page
          else {

              $this->session->sess_destroy();
              $this->load->view('admin/login',$data);
          }

    }
    
    public function logout()
    {
        setcookie ("email"," ");
        setcookie ("password"," ");
        unset($_COOKIE['email']);
        unset($_COOKIE['password']);

        $this->session->sess_destroy();
        redirect("/admin/login");
    }
    
    
   public function ResetPassword()
    {
        $data =array();
        $email = $this->input->post('email');

        $data['settings']=$settings =$this->MDL_Settings->getsettingsData();
        $company_name = $settings->company_name;

        //$email = 'ibnusham@rdxcompany.com';
        if(isset($email))
        {

            $flag_user = $this->MDL_Login->check_email($email);
            if ($flag_user) {
                $flag_user_data = $this->MDL_Login->get_user_data_email($email);
                
                $to = !empty($flag_user_data->email)?$flag_user_data->email:0;
                $subject ='Reset Password Link - '.$company_name;
                
                $encrypt_id = SHA1((($flag_user_data->id)*157)+17);
                $encrypt_email = SHA1((($to)*457)+17);
                $encrypt = $encrypt_id.rand(100,99999999).'$$'.$encrypt_email.rand(100,99999999);
           
              //  $encrypt = SHA1((($flag_user_data->id)*157)+17);

                $user_id_reset = $flag_user_data->id;
                $ins_data1 = array('token_password' => $encrypt);
                $ins_id1 = $this->MDL_Login->up_data($user_id_reset,$ins_data1);

                $message ='';

                $message .= 'Hi, <br><br><a href="'.base_url().'admin/set-password?token='.$encrypt.'" target="_blank"><b>Click here</b></a> to reset your password  <br/> <br/>Thank you.<br/> <br/>';

              //send mail
              $mail_flag = $this->MDL_Settings->send_email($to,$subject,$message);
              //send mail
               

                if(!empty($to)) {
                    if ($mail_flag) {

                        $this->session->set_flashdata('success', "A link to reset your password has been sent successfully !");
                        redirect('/admin/login');
                    } else {

                       // show_error($this->email->print_debugger());exit;
                       
                        $this->session->set_flashdata('error', "Sorry, Please try again !");
                        
                        redirect('/admin/reset-password');
                    }
                }
                else {
                    $this->session->set_flashdata('error', "Invalid email address !");
                    
                    redirect('/admin/reset-password');
                }
            }
            else {
                $this->session->set_flashdata('error', "This Email does not exist !");
               
                redirect('/admin/reset-password');
            }
        }
        else {
           // $this->session->sess_destroy();
            $this->load->view('admin/reset_password',$data);
        }

    }

    public function SetPassword()
    {
        $data = array();

        $data['token'] = $token = $this->input->get('token');
        $submit = $this->input->post('token');
        
         $data['settings']=$this->MDL_Settings->getsettingsData();

        //$data['id'] = $id = "356a192b7913b04c54574d18c28d46e6395428ab";
        //$data['id'] = $id = $this->input->get('no');

        if(isset($submit))
        {
            $data['token'] = $token = $this->input->post('token');
            
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');

            $flag_user = $this->MDL_Login->check_user_encrypt($token);

            if($flag_user) {
                if (empty($password) || empty($confirm_password)) {
                    $data['reset_error'] = "Please fill the required fields !";
                    $this->load->view('admin/set_password',$data);

                }
                else if ($password != $confirm_password) {
                    $data['reset_error'] = "Please confirm new password !";
                    $this->load->view('admin/set_password',$data);

                }
                else
                {
                    $ins_id = $this->MDL_Login->save_data($token,$password);
                    $this->session->set_flashdata('success', "Your password has been changed successfully !");
                    
                    redirect('/admin/login');
                }

            }
            else
            {
                $this->session->set_flashdata('error', "You have clicked on invalid link !");
                
                redirect('/admin/login');
            }
        }


        else {
            if (!empty($token)) {
                $flag_user = $this->MDL_Login->check_user_encrypt($token);
                if ($flag_user) {
                    $this->load->view('admin/set_password', $data);
                } else {
                    $this->session->set_flashdata('error', "You have clicked on invalid link !");
                    

                    redirect('/admin/login');
                }

            } else {
                $this->session->set_flashdata('error', "You have clicked on invalid link !");

                
                redirect('/admin/login');
            }
        }


    }

    public function get_user_ip()
    {
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }


   

}
?>
