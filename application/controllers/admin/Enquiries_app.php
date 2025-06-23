<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries_app extends CI_Controller {

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



         $this->table_settings = 'settings';


         $this->enquiries = 'enquiries';
         $this->enquiries_app = 'enquiries_app';


    }

	

    //Enquiries list
    public function index()
    {

        $data['userdata'] = $this->session->all_userdata();

        $data['page'] = 'enquiries_app';


        
            $data['data'] = $this->MDL_Enquiries_app->get_data();
           
            $this->load->view('admin/enquiries_app', $data);
        

    }




    //Enquiries list






    //Delete data
    public function delete_data()
    {
        $data['userdata'] = $this->session->all_userdata();

       
            $id = $this->uri->segment(4);

                if ($id) {

                        $del = $this->MDL_Enquiries_app->delete_data_by_id($id);
                        if ($del)
                            $this->session->set_flashdata('success', "Appointment is deleted");
                        else
                            $this->session->set_flashdata('error', "Sorry, Please try again");

                      
                }
        
                    redirect('/admin/appointments');

    }

    //Delete data


    //Delete data

   
    //delete data multiple landing
    public function delete_data_multiple()
    {
        $data['userdata'] = $this->session->all_userdata();

        
            $ids = $this->input->post("delete");

            if(!empty($ids))
            {
                $this->MDL_Enquiries_app->delete_data_multiple($ids);
                $this->session->set_flashdata('success', "Appointments are deleted successfully !");
                
            }
            else
            {
                $this->session->set_flashdata('error', "Please select at least one Appointment !");
                
            }
        
            redirect('/admin/appointments');
    }

    //delete data multiple landing






}
