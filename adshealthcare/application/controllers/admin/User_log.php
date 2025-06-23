<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User_log extends MY_Controller{
function __construct()
{
    parent::__construct();
	$data['userdata'] = $this->session->all_userdata();
	if(!isset($data['userdata']['is_login'])) 
	redirect('/admin/login');
	$this->page='User Log'; 
	$this->load->model('User_log_model');
} 

public function index()
{

	$data['user_log'] = $this->User_log_model->get_all_user_log($this->data['tbl_user_log']);
	$data['_view'] = 'admin/user_log';
	$this->load->view('admin/layouts/main',$data);
  
}


public function remove($id)
{

	$user_log = $this->User_log_model->get_user_log($id,$this->data['tbl_user_log']);
	if(isset($user_log['id']))
	{
		$this->User_log_model->delete_user_log($id);
		$this->session->set_flashdata('alert_msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
		redirect('admin/user_log');
	}
	else
	show_error('The user_log you are trying to delete does not exist.');

}

}
