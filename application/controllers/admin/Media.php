<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

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

         //Checking Login and Back URL
         $back_url = $this->uri->uri_string();
         $back_url = !empty($back_url)?'?url='.$back_url:'';

         $data['userdata'] = $this->session->all_userdata();
         if (!isset($data['userdata']['log_in']))
             redirect('/admin/login'.$back_url);
         else
         {
             $math = 157*17*113+52;
             $enc_flag = SHA1('hash_key_'.ENC_LOGIN.'_jm_'.$math);
             if($data['userdata']['log_in'] != $enc_flag)
                 redirect('/admin/login'.$back_url);
         }
         //Checking Login and Back URL



		 //Role setup
		 $this->denied = '/admin/permission-denied';
		 $role = !empty($data['userdata']['role'])?$data['userdata']['role']:2;
		 if($role != 1)
			 redirect($this->denied);
		 //Role setup



		 //Tables
         $this->table_settings = 'settings';


         //Tables
    }

	

    //Media list
    public function index()
    {

        $data['userdata'] = $this->session->all_userdata();

        $data['page'] = 'media';


        
            $data['data'] = $this->MDL_Media->get_data();
           
            $this->load->view('admin/medias', $data);
        

    }


    //new data
    public function new_data()
    {
        $data['userdata'] = $this->session->all_userdata();

       
            $ins_id = 0;
            $flag_file = 0;
            $file_name_db = '';
            $error = '';

        $name = $this->input->post('name');



                if (!empty($_FILES['file']['name']))
                {
                    $file_name = $_FILES['file']['name'];

                    $new_file_name = preg_replace('/\s+/', '_', $file_name);

                    $explode = explode(".", $new_file_name);
                    $ext = end($explode); # extra () to prevent notice

                    $new_name = 'file_'.rand(10,10000).'_'.rand(100,10000).'_'.rand(10,10000).'.'.$ext;

                    $config = array();
                    $config['file_name'] =$new_name;
                    $config['upload_path'] = './uploads/media/';
                    //$config['allowed_types'] = 'gif|jpg|png|pdf|docx|doc|xls|';
					$config['allowed_types'] = '*';
                    //$config['allowed_types'] = 'gif|jpg|png|jpeg|doc|odt|pdf|rtf|tex|txt|wks|wpd|docx|wks|xls|xlsx|';
                    //$config['max_size'] = 20971520;
                    $config['max_size'] = 1048576000;

                    //$config['encrypt_name'] = TRUE;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('file'))
                    {
                        $error = $this->upload->display_errors();
                        $flag_file = 0;

                    }
                    else
                    {
                        $image_data = $this->upload->data();
                        $file_name_db = $image_data['file_name'];
                        //$this->resize_image($image_data);


                        $flag_file = 1;

                    }

                }

                if($flag_file)
                {
                    $date = date("d-M-Y");

                    $ins_data = array(

                        'name' => $name,
                        'file' => $file_name_db,
                        'date' => $date,

                    );

                    $ins_id = $this->MDL_Media->insert_data($ins_data);
                    if ($ins_id) {
                        $this->session->set_flashdata('success', "New Media is added");
                    } else {
                        $this->session->set_flashdata('error', "Sorry, Please try again");
                    }
                }
                else
                {
                    if($error)
                        $this->session->set_flashdata('error', $error);
                    else
                        $this->session->set_flashdata('error', "Sorry, Please try again");

                }



       
        redirect('/admin/media');
    }

   

    //Edit popup data
    public function edit_modal_popup()
    {
        $data['userdata'] = $this->session->all_userdata();

        $id = $this->input->post('id');
        $output = array();
        if(!empty($id)) {
            $output['data'] = $this->MDL_Media->get_data_by_id($id);
            $output['msg'] = "true";
        }
        else
        {
            $output['msg'] = "false";
        }
        echo json_encode($output);
    }

    

    //update data
    public function update_data()
    {
        $data['userdata'] = $this->session->all_userdata();

        
            $ins_id = 0;
            $up_image = 0;
            $flag_file = 1;
            $file_name_db = '';
            $post = $this->input->post();
            if (!empty($post)) {

                $id = $post['id'];

                $name = $post['name'];
                $organization = $post['organization'];
                $comment = $post['comment'];
                
                
                

                
                

                $up_data = array(
                    'name' => $name,
                    'comment' => $comment,
                    'organization' => $organization,
                    
                );
                



                $up_id = $this->MDL_Media->update_data($id,$up_data);
                if ($up_id) {
                    $this->session->set_flashdata('success', "Media is updated");
                } else {
                    $this->session->set_flashdata('error', "Sorry, Please try again");
                }
            }
       
        redirect('/admin/media');
    }

   


    //Delete data
    public function delete_data()
    {
        $data['userdata'] = $this->session->all_userdata();

       
            $id = $this->uri->segment(4);

                if ($id) {

                        $del = $this->MDL_Media->delete_data_by_id($id);
                        if ($del)
                            $this->session->set_flashdata('success', "Media is deleted");
                        else
                            $this->session->set_flashdata('error', "Sorry, Please try again");

                      
                }
        
                    redirect('/admin/media');

    }

   
    //delete data multiple
    public function delete_data_multiple()
    {
        $data['userdata'] = $this->session->all_userdata();

        
            $ids = $this->input->post("delete");

            if(!empty($ids))
            {
                $this->MDL_Media->delete_data_multiple($ids);
                $this->session->set_flashdata('success', "Media are deleted successfully !");
                
            }
            else
            {
                $this->session->set_flashdata('error', "Please select at least one Media !");
                
            }
        
            redirect('/admin/media');
    }
    
    
     //Resize image
    public function resize_image($image_data){
    $this->load->library('image_lib');
    $w = $image_data['image_width']; // original image's width
    $h = $image_data['image_height']; // original images's height

    $n_w = 85; // destination image's width
    $n_h = 85; // destination image's height

    $file_name = $image_data['file_name'];
    $source_ratio = $w / $h;
    $new_ratio = $n_w / $n_h;
    if($source_ratio != $new_ratio){

        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/media/'.$file_name;
        $config['maintain_ratio'] = FALSE;
        if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1))){
            $config['width'] = $w;
            $config['height'] = round($w/$new_ratio);
            $config['y_axis'] = round(($h - $config['height'])/2);
            $config['x_axis'] = 0;

        } else {

            $config['width'] = round($h * $new_ratio);
            $config['height'] = $h;
            $size_config['x_axis'] = round(($w - $config['width'])/2);
            $size_config['y_axis'] = 0;

        }

        $this->image_lib->initialize($config);
       // $this->image_lib->crop();
        $this->image_lib->clear();
    }
    $config['image_library'] = 'gd2';
    $config['source_image'] = './uploads/media/'.$file_name;
    $config['new_image'] = './uploads/media/resized/'.$file_name;
    $config['maintain_ratio'] = TRUE;
    $config['width'] = $n_w;
    $config['height'] = $n_h;
    $this->image_lib->initialize($config);

    if (!$this->image_lib->resize()){

        echo $this->image_lib->display_errors();

    } else {

        $this->image_lib->clear();

    }
}
}
