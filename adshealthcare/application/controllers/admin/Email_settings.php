<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Email_settings extends MY_Controller{
 function __construct()
 {
      parent::__construct();
      $data['userdata'] = $this->session->all_userdata();
      if(!isset($data['userdata']['is_login'])) 
      redirect('/admin/login');
      $this->page='Email Settings'; 
      $this->load->model('Email_settings_model');
 } 

public function index()
{
    
     $id=1;
     $data['email_settings'] = $this->Email_settings_model->get_email_settings($id,$this->data['tbl_email_settings']);
     $this->load->library('upload');
     $this->load->library('form_validation');
     if(isset($data['email_settings']['id']))
      {
           $params = array(
           'mail_cate'=> $this->input->post('mail_cate'),
           'smtp_server'=> $this->input->post('smtp_server'),
           'display_name'=> $this->input->post('display_name'),
           'smtp_username'=> $this->input->post('smtp_username'),
           'smtp_password'=> $this->input->post('smtp_password'),
           'smtp_ports'=> $this->input->post('smtp_ports'),
           'smtp_secure'=> $this->input->post('smtp_secure'),
           'other'=> $this->input->post('other'),
          );
          if(isset($_POST) && count($_POST) > 0)     
           {  
             $this->Email_settings_model->update_email_settings($id,$params,$this->data['tbl_email_settings']);
             $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
                redirect('admin/email_settings');
           }
           else
           {
              $data['_view'] = 'admin/settings_email';
              $this->load->view('admin/layouts/main',$data);
           }
    }
     else
     show_error('The email_settings you are trying to edit does not exist.');
  

}
 

public function add()
{  
    try{
          $params = array(
           'mail_cate'=> $this->input->post('mail_cate'),
           'smtp_server'=> $this->input->post('smtp_server'),
           'display_name'=> $this->input->post('display_name'),
           'smtp_username'=> $this->input->post('smtp_username'),
           'smtp_password'=> $this->input->post('smtp_password'),
           'smtp_ports'=> $this->input->post('smtp_ports'),
           'smtp_secure'=> $this->input->post('smtp_secure'),
           'other'=> $this->input->post('other'),
            );
           $this->load->library('upload');
           $this->load->library('form_validation');
           if(isset($_POST) && count($_POST) > 0)     
            {  
                $id= $this->Email_settings_model->add_email_settings($params,$this->data['tbl_email_settings']);
                 $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully added.</div>');
                  redirect('email_settings');
            }
            else
            { 
               $data['_view'] = 'email_settings/add';
                $this->load->view('layouts/main',$data);
            }
      } catch (Exception $ex) {
        throw new Exception('Email_settings Controller : Error in add function - ' . $ex);
      }  
 }  
  
 public function edit($id)
 {

  try{
   $data['email_settings'] = $this->Email_settings_model->get_email_settings($id,$this->data['tbl_email_settings']);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['email_settings']['id']))
      {
        $params = array(
           'mail_cate'=> $this->input->post('mail_cate'),
           'smtp_server'=> $this->input->post('smtp_server'),
           'display_name'=> $this->input->post('display_name'),
           'smtp_username'=> $this->input->post('smtp_username'),
           'smtp_password'=> $this->input->post('smtp_password'),
           'smtp_ports'=> $this->input->post('smtp_ports'),
           'smtp_secure'=> $this->input->post('smtp_secure'),
           'other'=> $this->input->post('other'),
        );
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->Email_settings_model->update_email_settings($id,$params,$this->data['tbl_email_settings']);
             $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
                redirect('email_settings');
           }
           else
          {
              $data['_view'] = 'email_settings/edit';
              $this->load->view('layouts/main',$data);
          }
  }
  else
  show_error('The email_settings you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Email_settings Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting email_settings
  */
  public function remove($id)
   {
    try{
      $email_settings = $this->Email_settings_model->get_email_settings($id,$this->data['tbl_email_settings']);
  // check if the email_settings exists before trying to delete it
       if(isset($email_settings['id']))
       {
         $this->Email_settings_model->delete_email_settings($id,$this->data['tbl_email_settings']);
             $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
           redirect('email_settings/index');
       }
       else
       show_error('The email_settings you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Email_settings Controller : Error in remove function - ' . $ex);
  }  
  }



 }
