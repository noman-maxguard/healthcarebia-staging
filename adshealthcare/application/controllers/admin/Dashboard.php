<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {
function __construct()
{
        parent::__construct();
        $data['userdata'] = $this->session->all_userdata();
        if(!isset($data['userdata']['is_login'])) 
        redirect('/admin/login');
        $role = $this->session->userdata('user_role');
        $this->data['page']='Dashboard';                  
}

public function index()
{

        redirect(base_url().'admin/userlog');
        $data['_view'] = 'admin/common/dashboard';
        $this->load->view('admin/layouts/main',$data);


}



}


?>