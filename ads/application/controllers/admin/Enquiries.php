<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Enquiries extends MY_Controller{
function __construct()
{
parent::__construct();
$data['userdata'] = $this->session->all_userdata();
if(!isset($data['userdata']['is_login'])) 
redirect('admin/login');
$this->page='Enquiries'; 
$this->load->model('Enquiries_model');
} 




public function delete_all()
 {
  if($this->input->post('checkbox_value'))
  {
   $id = $this->input->post('checkbox_value');
   for($count = 0; $count < count($id); $count++)
   {
    $this->Common_model->delete($id[$count],$this->data['tbl_enquiries']);
   }
  }
 }



public function index()
{
try{
$data['noof_page'] = 0;
$data['enquiries'] = $this->Enquiries_model->get_all_enquiries($this->data['tbl_enquiries'],0);
$data['_view'] = 'admin/enquiries';
$this->load->view('admin/layouts/main',$data);
} catch (Exception $ex) {
throw new Exception('Enquiries Controller : Error in index function - ' . $ex);
}  
}



public function contact_us()
{

    try{
    $data['noof_page'] = 0;
    $data['enquiries'] = $this->Enquiries_model->get_all_enquiries($this->data['tbl_enquiries'],'0');

    $data['_view'] = 'admin/enquiries_contact';
    $this->load->view('admin/layouts/main',$data);
    } catch (Exception $ex) {
    throw new Exception('Enquiries Controller : Error in index function - ' . $ex);
    }  

}

public function newsletter()
{

    try{
    $data['noof_page'] = 0;
    $data['enquiries'] = $this->Enquiries_model->get_all_enquiries($this->data['tbl_enquiries'],'newsletter');
// echo"<pre>";
// print_r($data['enquiries']);
// exit;
    $data['_view'] = 'admin/enquiries_newsletter';
    $this->load->view('admin/layouts/main',$data);
    } catch (Exception $ex) {
    throw new Exception('Enquiries Controller : Error in index function - ' . $ex);
    }  


}


/*
* Adding a new enquiries
*/
function add()
{  
try{
$params = array(
'name'=> $this->input->post('name'),
'email'=> $this->input->post('email'),
'phone'=> $this->input->post('phone'),
'course'=> $this->input->post('course'),
'message'=> $this->input->post('message'),
'url_from'=> $this->input->post('url_from'),
'ip_address'=> $this->input->post('ip_address'),
'city'=> $this->input->post('city'),
'region'=> $this->input->post('region'),
'country'=> $this->input->post('country'),
'user_agent'=> $this->input->post('user_agent'),
'date'=> $this->input->post('date'),
'time'=> $this->input->post('time'),
'form_name'=> $this->input->post('form_name'),
'other'=> $this->input->post('other'),
);
$this->load->library('upload');
$this->load->library('form_validation');
if(isset($_POST) && count($_POST) > 0)     
{  
$id= $this->Enquiries_model->add_enquiries($params,$this->data['tbl_enquiries']);
$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully added.</div>');
redirect('admin/enquiries');
}
else
{ 
$data['_view'] = 'admin/enquiries_add';
$this->load->view('admin/layouts/main',$data);
}
} catch (Exception $ex) {
throw new Exception('Enquiries Controller : Error in add function - ' . $ex);
}  
}  
/*
* Editing a enquiries
*/
public function edit($id)
{   
try{
$data['enquiries'] = $this->Enquiries_model->get_enquiries($id,$this->data['tbl_enquiries']);
$this->load->library('upload');
$this->load->library('form_validation');
if(isset($data['enquiries']['id']))
{
$params = array(
'name'=> $this->input->post('name'),
'email'=> $this->input->post('email'),
'phone'=> $this->input->post('phone'),
'course'=> $this->input->post('course'),
'message'=> $this->input->post('message'),
'url_from'=> $this->input->post('url_from'),
'ip_address'=> $this->input->post('ip_address'),
'city'=> $this->input->post('city'),
'region'=> $this->input->post('region'),
'country'=> $this->input->post('country'),
'user_agent'=> $this->input->post('user_agent'),
'date'=> $this->input->post('date'),
'time'=> $this->input->post('time'),
'form_name'=> $this->input->post('form_name'),
'other'=> $this->input->post('other'),
);
if(isset($_POST) && count($_POST) > 0)     
{  
$this->Enquiries_model->update_enquiries($id,$params,$this->data['tbl_enquiries']);
$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
redirect('admin/enquiries');
}
else
{
$data['_view'] = 'admin/enquiries_edit';
$this->load->view('admin/layouts/main',$data);
}
}
else
show_error('The enquiries you are trying to edit does not exist.');
} catch (Exception $ex) {
throw new Exception('Enquiries Controller : Error in edit function - ' . $ex);
}  
} 
/*
* Deleting enquiries
*/
function remove($id)
{
try{
$enquiries = $this->Enquiries_model->get_enquiries($id,$this->data['tbl_enquiries']);
// check if the enquiries exists before trying to delete it
if(isset($enquiries['id']))
{
$this->Enquiries_model->delete_enquiries($id);
$this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
redirect('admin/enquiries');
}
else
show_error('The enquiries you are trying to delete does not exist.');
} catch (Exception $ex) {
throw new Exception('Enquiries Controller : Error in remove function - ' . $ex);
}  
}

}
