<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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


		 //Role setup
		 $this->denied = '/admin/permission-denied';
		 $role = !empty($data['userdata']['role'])?$data['userdata']['role']:2;
		 if($role != 1)
			 redirect($this->denied);
		 //Role setup


         $this->album = 'album';

		 //Checking Login and Back URL

    }

    
   
	public function index()
	{


        redirect('/admin/manage-album');
	}
    
    //CI instance function
    public function get_images($id)
    {
        $res = $this->MDL_Gallery->get_images($id);
        $image1 = !empty($res[0]->image)?$res[0]->image:0;
        return $image1;
    }
    //CI instance function
    
    
    
    //album list
	public function album()
	{

        $data['userdata'] = $this->session->all_userdata();




        $data['page'] = 'gallery';
        $data['album'] = $this->MDL_Gallery->get_album();
       
		$this->load->view('admin/album',$data);
	}
    
    //New album
    public function new_album()
    {
        $data['userdata'] = $this->session->all_userdata();


        $data['page'] = 'gallery';

            $this->load->view('admin/new_album', $data);

    }
    
    
    
     //Submit Gallery
    public function submit_album()
    {
        $data['userdata'] = $this->session->all_userdata();

        $date = date('Y/m/d');

        $next_sort_order = $this->MDL_Settings->get_next_sort_order_custom($this->album,'sort_order');


        $flag_file = 1;
            $ins_id = 0;
            
            


                $file_name_db = array();
                $name = $this->input->post('name');



                
                 if (!empty($_FILES['file']))
                 {

                  $number_of_files_uploaded = count($_FILES['file']['name']);

                      for ($i = 0; $i < $number_of_files_uploaded; $i++)
                      {
                          $_FILES['userfile']['name']     = $_FILES['file']['name'][$i];
                          $_FILES['userfile']['type']     = $_FILES['file']['type'][$i];
                          $_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                          $_FILES['userfile']['error']    = $_FILES['file']['error'][$i];
                          $_FILES['userfile']['size']     = $_FILES['file']['size'][$i];



                  $file_name = $_FILES['userfile']['name'];

                  $new_file_name = preg_replace('/\s+/', '_', $file_name);

                  $new_name = rand(100,10000000).'_'.rand(100,10000000).'_'.$new_file_name;

                  $config = array();
                  $config['file_name'] =$new_name;
                  $config['upload_path'] = './uploads/gallery/';
                  $config['allowed_types'] = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
                 
                  //$config['max_size'] = 20971520;
                  $config['max_size'] = 1048576000;

                  //$config['encrypt_name'] = TRUE;


                  $this->load->library('upload', $config);
                  $this->upload->initialize($config);

                  $error = array();
                  if (!$this->upload->do_upload())
                  {
                     $error = array('error' => $this->upload->display_errors());
                     $flag_file = 0;


                  }
                  else
                  {
                      $image_data = $this->upload->data();
                      
                       $this->resize_image($image_data);

                     // $this->resize_image_album($image_data);

                      $file_name_db[] = $image_data['file_name'];

                    $flag_file = 1;

                  }

                      }

                 }



                  $up_data = array('name'=>$name,'sort_order'=>$next_sort_order, 'date'=>$date);


                  $ins_id = $this->MDL_Gallery->insert_gallery_arr($up_data,$file_name_db);

                  if ($ins_id) {
                      $this->session->set_flashdata('success', "Album is successfully created");
                  } else {
                      $this->session->set_flashdata('error', "Sorry, Please try again");
                  }

         

            redirect('/admin/manage-album');
    }
    
    
    //View album
    public function view_album()
    {
        $data['userdata'] = $this->session->all_userdata();

        $data['page'] = 'gallery';



        $data['id'] = $id = $this->uri->segment(3);

            if ($id) {
                
                    $data['images'] = $this->MDL_Gallery->get_images($id);
                    $album = $this->MDL_Gallery->get_album_by_id($id);
                
                    $data['name'] = !empty($album->name)?$album->name:'Album';


                    $this->load->view('admin/album_images',$data);
                    
            }
            else
                redirect('/admin/manage-album');
    }
    
    
    //New album image
    public function new_album_image()
    {
        $data['userdata'] = $this->session->all_userdata();


           
            $data['page'] = 'gallery';
        
            $data['id'] = $id = $this->uri->segment(3);

            if ($id) {
                $data['album'] = $album = $this->MDL_Gallery->get_album_by_id($id);
                
                $data['name'] = !empty($album->name)?$album->name:'Album';

                $this->load->view('admin/new_album_image', $data);
                
            }
            else
                 redirect('/admin/manage-album');



    }
    
    //Submit new image
    public function submit_album_image()
    {
        $data['userdata'] = $this->session->all_userdata();

          
            

            $flag_file = 1;
            $ins_id = 0;
            
            


                $file_name_db = array();
                $id = $this->input->post('id');


                $name = $this->input->post('name');

                $up_data_album = array('name'=> $name);

                $ins_id = $this->MDL_Gallery->update_data_by_id($id,$up_data_album);

                
                 if (!empty($_FILES['file']['name'][0]))
                 {

                  $number_of_files_uploaded = count($_FILES['file']['name']);

                      for ($i = 0; $i < $number_of_files_uploaded; $i++)
                      {
                          $_FILES['userfile']['name']     = $_FILES['file']['name'][$i];
                          $_FILES['userfile']['type']     = $_FILES['file']['type'][$i];
                          $_FILES['userfile']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
                          $_FILES['userfile']['error']    = $_FILES['file']['error'][$i];
                          $_FILES['userfile']['size']     = $_FILES['file']['size'][$i];



                  $file_name = $_FILES['userfile']['name'];

                  $new_file_name = preg_replace('/\s+/', '_', $file_name);

                  $new_name = rand(100,10000000).'_'.rand(100,10000000).'_'.$new_file_name;

                  $config = array();
                  $config['file_name'] =$new_name;
                  $config['upload_path'] = './uploads/gallery/';
                  $config['allowed_types'] = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
                 
                  //$config['max_size'] = 20971520;
                  $config['max_size'] = 1048576000;

                  //$config['encrypt_name'] = TRUE;


                  $this->load->library('upload', $config);
                  $this->upload->initialize($config);

                  $error = array();
                  if (!$this->upload->do_upload())
                  {
                     $error = array('error' => $this->upload->display_errors());
                     $flag_file = 0;


                  }
                  else
                  {
                      $image_data = $this->upload->data();
                      
                       $this->resize_image($image_data);

                     // $this->resize_image_album($image_data);

                      $file_name_db[] = $image_data['file_name'];


                    $flag_file = 1;

                  }

                      }



                     $ins_id = $this->MDL_Gallery->insert_new_image($id,$file_name_db);
                 }






                  if ($ins_id) {
                      $this->session->set_flashdata('success', "Album is updated successfully");
                  } else {
                      $this->session->set_flashdata('error', "Sorry, Please try again");
                  }

         

            redirect('/admin/view-album/'.$id);
    }


	 //Delete album 
    public function delete_album()
    {
        $data['userdata'] = $this->session->all_userdata();



            
            $id = $this->uri->segment(2);

            if ($id) {
                
                    $image_arr = $this->MDL_Gallery->get_images($id);
                
                    $del = $this->MDL_Gallery->delete_album_by_id($id);
                    if ($del){

                        $this->MDL_Gallery->delete_images_by_album_id($id);
                        $this->session->set_flashdata('success', "Album is deleted");
                    }
                    else
                        $this->session->set_flashdata('error', "Sorry, Please try again");

                if (!empty($image_arr)) {
                    foreach($image_arr as $image_one)
                    {
                        $image = !empty($image_one->image)?$image_one->image:0;
                        if($image){
                            
                            if (file_exists('./uploads/gallery/'.$image)) {
                                @unlink('./uploads/gallery/'.$image);
                            }
                                
                            
                            if (file_exists('./uploads/gallery/resized/'.$image)) {
                                @unlink('./uploads/gallery/resized/'.$image);
                            }

                            if (file_exists('./uploads/gallery/resized_album/'.$image)) {
                                @unlink('./uploads/gallery/resized_album/'.$image);
                            }
                               
                           

                        }
                    }
                }
                   
                    redirect('/admin/manage-album/');

               
            } else
                redirect('/admin/manage-album');

    }


    //sort_album
    public function sort_album()
    {
        $data['userdata'] = $this->session->all_userdata();


        $id = $this->input->get('id');
        $sort_order = $this->input->get('sort_order');

        $this->MDL_Gallery->update_sort_order_album($id,$sort_order);

        redirect('/admin/manage-album');

    }

    //sort_images
    public function sort_images()
    {
        $data['userdata'] = $this->session->all_userdata();


        $album_id = $this->input->get('album_id');
        $id = $this->input->get('id');
        $sort_order = $this->input->get('sort_order');

        $this->MDL_Gallery->update_sort_order($id,$sort_order);

        redirect('/admin/view-album/'.$album_id);

    }


    
    
    
      //Delete album image
    public function delete_image()
    {
        $data['userdata'] = $this->session->all_userdata();



            
            $id = $this->uri->segment(2);

            if ($id) {
                
                    $image_name = $this->MDL_Gallery->get_image_by_id($id);

                if (!empty($image_name)) {
                    $image = !empty($image_name->image)?$image_name->image:0;
                    $album_id = !empty($image_name->album_id)?$image_name->album_id:0;

                    $del = $this->MDL_Gallery->delete_image_by_id($id);
                    if ($del){
                        if($image){
                            
                            if (file_exists('./uploads/gallery/'.$image)) {
                                @unlink('./uploads/gallery/'.$image);
                            }
                                
                            
                            if (file_exists('./uploads/gallery/resized/'.$image)) {
                                @unlink('./uploads/gallery/resized/'.$image);
                            }

                            if (file_exists('./uploads/gallery/resized_album/'.$image)) {
                                @unlink('./uploads/gallery/resized_album/'.$image);
                            }
                           

                        }
                        $this->session->set_flashdata('success', "Image is deleted");
                    }
                    else
                        $this->session->set_flashdata('error', "Sorry, Please try again");

                    redirect('/admin/view-album/'.$album_id);

                } else
                    redirect('/admin/manage-album/');
            } else
                redirect('/admin/manage-album');

    }
    
    
    
    
    public function resize_image($image_data){
    $this->load->library('image_lib');
    $w = $image_data['image_width']; // original image's width
    $h = $image_data['image_height']; // original images's height

    $n_w = 290; // destination image's width
    $n_h = 200; // destination image's height


    $file_name = $image_data['file_name'];
    $source_ratio = $w / $h;
    $new_ratio = $n_w / $n_h;
    if($source_ratio != $new_ratio){

        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/gallery/'.$file_name;
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
        //$this->image_lib->crop();
        $this->image_lib->clear();
    }
    $config['image_library'] = 'gd2';
    $config['source_image'] = './uploads/gallery/'.$file_name;
    $config['new_image'] = './uploads/gallery/resized/'.$file_name;
    $config['maintain_ratio'] = FALSE;
    $config['width'] = $n_w;
    $config['height'] = $n_h;
    $this->image_lib->initialize($config);

    if (!$this->image_lib->resize()){

        echo $this->image_lib->display_errors();

    } else {

        $this->image_lib->clear();

    }
}

    public function resize_image_album($image_data){
        $this->load->library('image_lib');
        $w = $image_data['image_width']; // original image's width
        $h = $image_data['image_height']; // original images's height

        $n_w = 640; // destination image's width
        $n_h = 480; // destination image's height


        $file_name = $image_data['file_name'];
        $source_ratio = $w / $h;
        $new_ratio = $n_w / $n_h;
        if($source_ratio != $new_ratio){

            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/gallery/'.$file_name;
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
        $config['source_image'] = './uploads/gallery/'.$file_name;
        $config['new_image'] = './uploads/gallery/resized_album/'.$file_name;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $n_w;
        $config['height'] = $n_h;
        $this->image_lib->initialize($config);

        if (!$this->image_lib->resize()){

            echo $this->image_lib->display_errors();

        } else {

            $this->image_lib->clear();

        }
    }



    //change_image_status
    public function change_image_status()
    {

        $id = $this->input->post('id');
        $imageStatus = $this->input->post('imageStatus');
        $this->MDL_Gallery->update_status_image($this->album,$id,$imageStatus);

        $output['flag'] = 1;


        echo json_encode($output);
        exit;
    }


    //update_sort_order
    public function update_sort_order()
    {


        $id = $this->input->post('id');
        $sort_order = $this->input->post('sort_order');
        $this->MDL_Settings->update_sort_order('album',$id,$sort_order);

        $output['flag'] = 1;


        echo json_encode($output);
        exit;
    }

    //update_sort_order_images
    public function update_sort_order_images()
    {


        $id = $this->input->post('id');
        $sort_order = $this->input->post('sort_order');
        $this->MDL_Settings->update_sort_order('album_images',$id,$sort_order);

        $output['flag'] = 1;


        echo json_encode($output);
        exit;
    }



}
