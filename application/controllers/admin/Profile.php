<?php
class Profile  extends CI_Controller
{
      public function __construct() {
        parent::__construct();
        $this->load->library('session');



          $data['userdata'] = $this->session->all_userdata();
          if (!isset($data['userdata']['log_in']))
              redirect('/admin/login');
          else
          {
              $math = 157*17*113+52;
              $enc_flag = SHA1('hash_key_'.ENC_LOGIN.'_jm_'.$math);
              if($data['userdata']['log_in'] != $enc_flag)
                  redirect('/admin/login');
          }


          //Tables
          $this->table_settings = 'settings';
          $this->user_log = 'user_log';


      }

     public function index()
     {

         $data['userdata'] = $this->session->all_userdata();

			
			
         $ins_id = 0;
        
         $submit = $this->input->post('submit');
         $user_id = $data['userdata']['user_id'];
         $data['personal_data'] = $this->MDL_Profile->get_user_info($user_id);

               if(isset($submit))
               {
                   $data['name'] = $name = $this->input->post('name');
                   $data['email'] = $email = $this->input->post('email');

                   $password = $this->input->post('password');
                   $confirm = $this->input->post('confirm');

                   if(empty($name))
                   {
                       $data['n_error'] = "Name is required";
                       $this->load->view('admin/profile', $data);
                   }
                   else if(empty($email))
                   {
                       $data['e_error'] = "Email is required";
                       $this->load->view('admin/profile', $data);
                   }
                   else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                   {
                       $data['e_error'] = "Submitted Email address is invalid";
                       $this->load->view('admin/profile', $data);
                   }
                   else if($password != $confirm)
                   {
                       $data['p_error'] = "Please enter same password";
                       $this->load->view('admin/profile', $data);
                   }
                   

                   else {

                       if (!empty($password)) {
                           $up_data = array('name' => $name, 'email' => $email, 'password' => SHA1($password));
                       } else {
                           $up_data = array('name' => $name,  'email' => $email);
                       }
                       
                       $ins_id = $this->MDL_Profile->save_data($user_id,$up_data);
                      // print_r($ins_id);exit;
                       if($ins_id) {
                           $data['personal_data'] = $get_data = $this->MDL_Profile->get_user_info($user_id);
                           
                           $getsettingsData = $this->MDL_Settings->getsettingsData();


                           $math = 157*17*113+52;
                           $enc_flag = SHA1('hash_key_'.ENC_LOGIN.'_jm_'.$math);

                           $user_data = array(
                               "user_id"=>$get_data->id,
                               "name" => $get_data->name,
                               "email" => $get_data->email,

                               "log_in"  => $enc_flag,
                               "logo" => $getsettingsData->logo,
							   "role" => $get_data->role,
                           );
                           
                           $this->session->set_userdata($user_data);

                          // $data['msg'] = "Your changes are saved";
                           $this->session->set_flashdata('success', "Your changes are saved !");
                           redirect('/admin/account');
                       }
					   else
					       redirect('/admin/account');
                   }
               }
               else {

                   $this->load->view('admin/profile', $data);
               }
          
     }

     //user_log
    public function user_log()
    {
        $data['userdata'] = $this->session->all_userdata();


        $data['data'] = $this->MDL_Settings->getDataMultipleDesc($this->user_log);

        $data['page'] = 'user_log';


        $this->load->view('admin/user_log',$data);
    }



     
}
?>
