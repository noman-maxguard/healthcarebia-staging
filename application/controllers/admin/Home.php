<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

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


        $data['data'] = $this->MDL_Settings->getDataMultipleDesc($this->user_log);

        $data['page'] = 'user_log';




            $this->load->view('admin/user_log',$data);


	}
	
	
}
