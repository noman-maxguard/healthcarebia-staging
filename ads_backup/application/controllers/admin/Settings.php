<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends MY_Controller{
function __construct()
{
parent::__construct();
$data['userdata'] = $this->session->all_userdata();
if(!isset($data['userdata']['is_login'])) 
redirect('admin/login');
$this->page='Settings';
$this->load->model('Settings_model');
} 
/*
* Listing of settings
*/
public function index()
{
  
$id=1;
$data['settings'] = $this->Settings_model->get_settings($id,$this->data['tbl_settings']);
$this->load->library('upload');
$this->load->library('form_validation');
if(isset($data['settings']['id']))
{

 $params = array(
 'header_logo_alt'=> $this->input->post('header_logo_alt'),
 'footer_logo_alt'=> $this->input->post('footer_logo_alt'),
 'subpage_logo_alt'=> $this->input->post('subpage_logo_alt'),
 'company_name'=> $this->input->post('company_name'),
 'whatsapp_number'=> $this->input->post('whatsapp_number'),
 'whatsapp_number1'=> $this->input->post('whatsapp_number1'),
 'whatsapp_number2'=> $this->input->post('whatsapp_number2'),
 'whatsapp_number3'=> $this->input->post('whatsapp_number3'),
 'whatsapp_message'=> $this->input->post('whatsapp_message'),
 'mobile_one'=> $this->input->post('mobile_one'),
 'mobile_two'=> $this->input->post('mobile_two'),
 'mobile_three'=> $this->input->post('mobile_three'),
 'mobile_four'=> $this->input->post('mobile_four'),
 'mobile_five'=> $this->input->post('mobile_five'),
 'business_hours'=>$this->input->post('business_hours'),
 'email_one'=> $this->input->post('email_one'),
 'email_two'=> $this->input->post('email_two'),
 'address_one'=> $this->input->post('address_one'),
 'address_two'=> $this->input->post('address_two'),
 'footer_text'=> $this->input->post('footer_text'),
 'google_map'=> $this->input->post('google_map'),
 'google_map_iframe'=> $this->input->post('google_map_iframe'),
 'header_script'=> $this->input->post('header_script'),
 'body_script'=> $this->input->post('body_script'),
 'instagram_feeds'=>$this->input->post('instagram_feeds'),

);

$foldername='header_logo';
$fileuploaddire='./uploads/'.$foldername;
$directory=base_url('uploads/').$foldername;
if (!is_dir($fileuploaddire)) {
mkdir($fileuploaddire, 0777, true);
}
$header_logo="";
if (!empty($_FILES['header_logo']['name']))
{ 
$filename =$_FILES['header_logo']['name'];
$header_logo = str_replace(' ','_',$filename);
$config['file_name'] = $header_logo; 
$config['upload_path']=$fileuploaddire;
$config['allowed_types']='*';
$config['max_length']='100000';
$this->upload->initialize($config);
if(!$this->upload->do_upload('header_logo'))
{
    $error =$this->upload->display_errors();
    $msg='File Can not Upload ..Please upload pdf |doc |docs|jpg|jpeg|png  type only and Maximum file size 25MB '.$error;
    $this->session->set_flashdata('msg',$msg);
    $this->form_validation->set_rules('header_logo',$msg,'required');
}
else 
{

$pathn=FCPATH.'uploads/header_logo/'.$data['settings']['header_logo'];
if(is_file($pathn))
 unlink($pathn);   
      $params['header_logo'] =$header_logo;

}
}
else
{
}


$foldername='subpage_logo';
$fileuploaddire='./uploads/'.$foldername;
$directory=base_url('uploads/').$foldername;
if (!is_dir($fileuploaddire)) {
mkdir($fileuploaddire, 0777, true);
}
$header_logo="";
if (!empty($_FILES['subpage_logo']['name']))
{ 
$filename =$_FILES['subpage_logo']['name'];
$header_logo = str_replace(' ','_',$filename);
$config['file_name'] = $header_logo; 
$config['upload_path']=$fileuploaddire;
$config['allowed_types']='*';
$config['max_length']='100000';
$this->upload->initialize($config);
if(!$this->upload->do_upload('subpage_logo'))
{
    $error =$this->upload->display_errors();
    $msg='File Can not Upload ..Please upload pdf |doc |docs|jpg|jpeg|png  type only and Maximum file size 25MB '.$error;
    $this->session->set_flashdata('msg',$msg);
    $this->form_validation->set_rules('subpage_logo',$msg,'required');
}
else 
{

    $pathn=FCPATH.'uploads/subpage_logo/'.$data['settings']['subpage_logo'];
    if(is_file($pathn))
    unlink($pathn);   
    $params['subpage_logo'] =$header_logo;

}
}
else
{
}



$foldername='footer_logo';
$fileuploaddire='./uploads/'.$foldername;
$directory=base_url('uploads/').$foldername;
if (!is_dir($fileuploaddire)) {
mkdir($fileuploaddire, 0777, true);
}
$footer_logo="";
if (!empty($_FILES['footer_logo']['name']))
{ 
$filename =$_FILES['footer_logo']['name'];
$footer_logo = str_replace(' ','_',$filename);
$config['file_name'] = $footer_logo; 
$config['upload_path']=$fileuploaddire;
$config['allowed_types']='*';
$config['max_length']='100000';
$this->upload->initialize($config);
if(!$this->upload->do_upload('footer_logo'))
{
    $error =$this->upload->display_errors();
                                          // print_r($error);
    $msg='File Can not Upload ..Please upload pdf |doc |docs|jpg|jpeg|png  type only and Maximum file size 25MB '.$error;
    $this->session->set_flashdata('msg',$msg);
      $this->form_validation->set_rules('footer_logo',$msg,'required');
    }
    else 
    {
$pathn=FCPATH.'uploads/footer_logo/'.$data['settings']['footer_logo'];
if(is_file($pathn))
 unlink($pathn);   
      $params['footer_logo'] =$footer_logo;
    }
}
else
{
}
if(isset($_POST) && count($_POST) > 0)     
 {  
 $this->Settings_model->update_settings($id,$params,$this->data['tbl_settings']);
   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
      redirect('admin/settings');
 }
 else
{
    $data['_view'] = 'admin/settings';
    $this->load->view('admin/layouts/main',$data);
}
}
else
show_error('The settings you are trying to edit does not exist.');

  
}


function add()
{  
try{
$params = array(
'header_logo_alt'=> $this->input->post('header_logo_alt'),
'footer_logo_alt'=> $this->input->post('footer_logo_alt'),
'company_name'=> $this->input->post('company_name'),
'whatsapp_number'=> $this->input->post('whatsapp_number'),
'whatsapp_message'=> $this->input->post('whatsapp_message'),
'mobile_one'=> $this->input->post('mobile_one'),
'mobile_two'=> $this->input->post('mobile_two'),
'email_one'=> $this->input->post('email_one'),
'email_two'=> $this->input->post('email_two'),
'address_one'=> $this->input->post('address_one'),
'address_two'=> $this->input->post('address_two'),
'facebook'=> $this->input->post('facebook'),
'twitter'=> $this->input->post('twitter'),
'instagram'=> $this->input->post('instagram'),
'linkedin'=> $this->input->post('linkedin'),
'youtube'=> $this->input->post('youtube'),
'skype'=> $this->input->post('skype'),
'footer_text'=> $this->input->post('footer_text'),
'google_map'=> $this->input->post('google_map'),
'longitude'=> $this->input->post('longitude'),
'google_map_iframe'=> $this->input->post('google_map_iframe'),
'header_script'=> $this->input->post('header_script'),
'body_script'=> $this->input->post('body_script'),
);
$this->load->library('upload');
$this->load->library('form_validation');
$foldername='header_logo';
$fileuploaddire='./resource/'.$foldername;
$directory=base_url('resource/').$foldername;
if (!is_dir($fileuploaddire)) {
mkdir($fileuploaddire, 0777, true);
}
$header_logo="";
if (!empty($_FILES['header_logo']['name']))
{ 
  $filename =time().$_FILES['header_logo']['name'];
  $header_logo = str_replace(' ','_',$filename);
  $config['file_name'] = $header_logo; 
  $config['upload_path']=$fileuploaddire;
  $config['allowed_types']='pdf|doc|docx|docs|jpg|jpeg|png|svg|';
   $config['max_length']='100000';
  $this->upload->initialize($config);
  if(!$this->upload->do_upload('header_logo'))
  {
      $error =$this->upload->display_errors();
                                          // print_r($error);
      $msg='File Can not Upload ..Please upload pdf |doc |docs|jpg|jpeg|png  type only and Maximum file size 25MB '.$error;
      $this->session->set_flashdata('header_logo',$msg);
       $this->form_validation->set_rules('header_logo',$msg,'required');
  }
  else 
  {
  }
}
else
{
     //$this->form_validation->set_rules('header_logo','file','required');
      $this->session->set_flashdata('header_logo','File required');
}
$params['header_logo'] =$header_logo;
$foldername='footer_logo';
$fileuploaddire='./resource/'.$foldername;
$directory=base_url('resource/').$foldername;
if (!is_dir($fileuploaddire)) {
mkdir($fileuploaddire, 0777, true);
}
$footer_logo="";
if (!empty($_FILES['footer_logo']['name']))
{ 
  $filename =time().$_FILES['footer_logo']['name'];
  $footer_logo = str_replace(' ','_',$filename);
  $config['file_name'] = $footer_logo; 
  $config['upload_path']=$fileuploaddire;
  $config['allowed_types']='pdf|doc|docx|docs|jpg|jpeg|png|svg|';
   $config['max_length']='100000';
  $this->upload->initialize($config);
  if(!$this->upload->do_upload('footer_logo'))
  {
      $error =$this->upload->display_errors();
                                          // print_r($error);
      $msg='File Can not Upload ..Please upload pdf |doc |docs|jpg|jpeg|png  type only and Maximum file size 25MB '.$error;
      $this->session->set_flashdata('footer_logo',$msg);
       $this->form_validation->set_rules('footer_logo',$msg,'required');
  }
  else 
  {
  }
}
else
{
     //$this->form_validation->set_rules('footer_logo','file','required');
      $this->session->set_flashdata('footer_logo','File required');
}
$params['footer_logo'] =$footer_logo;
if(isset($_POST) && count($_POST) > 0)     
{  
  $id= $this->Settings_model->add_settings($params,$this->data['tbl_settings']);
   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully added.</div>');
    redirect('admin/settings');
}
else
{ 
 $data['_view'] = 'settings/add';
  $this->load->view('layouts/main',$data);
}
} catch (Exception $ex) {
throw new Exception('Settings Controller : Error in add function - ' . $ex);
}  
}  
/*
* Editing a settings
*/
public function edit($id)
{   
try{
$data['settings'] = $this->Settings_model->get_settings($id,$this->data['tbl_settings']);
$this->load->library('upload');
$this->load->library('form_validation');
if(isset($data['settings']['id']))
{
$params = array(
 'header_logo_alt'=> $this->input->post('header_logo_alt'),
 'footer_logo_alt'=> $this->input->post('footer_logo_alt'),
 'company_name'=> $this->input->post('company_name'),
 'whatsapp_number'=> $this->input->post('whatsapp_number'),
 'whatsapp_message'=> $this->input->post('whatsapp_message'),
 'mobile_one'=> $this->input->post('mobile_one'),
 'mobile_two'=> $this->input->post('mobile_two'),
 'email_one'=> $this->input->post('email_one'),
 'email_two'=> $this->input->post('email_two'),
 'address_one'=> $this->input->post('address_one'),
 'address_two'=> $this->input->post('address_two'),
 'facebook'=> $this->input->post('facebook'),
 'twitter'=> $this->input->post('twitter'),
 'instagram'=> $this->input->post('instagram'),
 'linkedin'=> $this->input->post('linkedin'),
 'youtube'=> $this->input->post('youtube'),
 'skype'=> $this->input->post('skype'),
 'footer_text'=> $this->input->post('footer_text'),
 'google_map'=> $this->input->post('google_map'),
 'longitude'=> $this->input->post('longitude'),
 'google_map_iframe'=> $this->input->post('google_map_iframe'),
 'header_script'=> $this->input->post('header_script'),
 'body_script'=> $this->input->post('body_script'),
 'instagram_feeds'=>$this->input->post('instagram_feeds'),
);
$foldername='header_logo';
$fileuploaddire='./resource/'.$foldername;
$directory=base_url('resource/').$foldername;
if (!is_dir($fileuploaddire)) {
mkdir($fileuploaddire, 0777, true);
}
$header_logo="";
if (!empty($_FILES['header_logo']['name']))
{ 
$filename =time().$_FILES['header_logo']['name'];
$header_logo = str_replace(' ','_',$filename);
$config['file_name'] = $header_logo; 
$config['upload_path']=$fileuploaddire;
$config['allowed_types']='pdf|doc|docx|docs|jpg|jpeg|png|svg|';
$config['max_length']='100000';
$this->upload->initialize($config);
if(!$this->upload->do_upload('header_logo'))
{
    $error =$this->upload->display_errors();
                                          // print_r($error);
    $msg='File Can not Upload ..Please upload pdf |doc |docs|jpg|jpeg|png  type only and Maximum file size 25MB '.$error;
    $this->session->set_flashdata('header_logo',$msg);
      $this->form_validation->set_rules('header_logo',$msg,'required');
    }
    else 
    {
$pathn=FCPATH.'resource/header_logo/'.$data['settings']['header_logo'];
if(is_file($pathn))
 unlink($pathn);   
      $params['header_logo'] =$header_logo;
    }
}
else
{
}
$foldername='footer_logo';
$fileuploaddire='./resource/'.$foldername;
$directory=base_url('resource/').$foldername;
if (!is_dir($fileuploaddire)) {
mkdir($fileuploaddire, 0777, true);
}
$footer_logo="";
if (!empty($_FILES['footer_logo']['name']))
{ 
$filename =time().$_FILES['footer_logo']['name'];
$footer_logo = str_replace(' ','_',$filename);
$config['file_name'] = $footer_logo; 
$config['upload_path']=$fileuploaddire;
$config['allowed_types']='pdf|doc|docx|docs|jpg|jpeg|png|svg|';
$config['max_length']='100000';
$this->upload->initialize($config);
if(!$this->upload->do_upload('footer_logo'))
{
    $error =$this->upload->display_errors();
                                          // print_r($error);
    $msg='File Can not Upload ..Please upload pdf |doc |docs|jpg|jpeg|png  type only and Maximum file size 25MB '.$error;
    $this->session->set_flashdata('footer_logo',$msg);
      $this->form_validation->set_rules('footer_logo',$msg,'required');
    }
    else 
    {
$pathn=FCPATH.'resource/footer_logo/'.$data['settings']['footer_logo'];
if(is_file($pathn))
 unlink($pathn);   
      $params['footer_logo'] =$footer_logo;
    }
}
else
{
}
if(isset($_POST) && count($_POST) > 0)     
 {  
 $this->Settings_model->update_settings($id,$params,$this->data['tbl_settings']);
   $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
      redirect('admin/settings/index');
 }
 else
{
    $data['_view'] = 'settings/edit';
    $this->load->view('layouts/main',$data);
}
}
else
show_error('The settings you are trying to edit does not exist.');
} catch (Exception $ex) {
throw new Exception('Settings Controller : Error in edit function - ' . $ex);
}  
} 
/*
* Deleting settings
*/
function remove($id)
{
try{
$settings = $this->Settings_model->get_settings($id);
// check if the settings exists before trying to delete it
if(isset($settings['id']))
{
$this->Settings_model->delete_settings($id,$this->data['tbl_settings']);
   $this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
$pathn=FCPATH.'resource/header_logo/'.$settings['header_logo'];
if(is_file($pathn))
 unlink($pathn);   
$pathn=FCPATH.'resource/footer_logo/'.$settings['footer_logo'];
if(is_file($pathn))
 unlink($pathn);   
 redirect('settings/index');
}
else
show_error('The settings you are trying to delete does not exist.');
} catch (Exception $ex) {
throw new Exception('Settings Controller : Error in remove function - ' . $ex);
}  
}

}
