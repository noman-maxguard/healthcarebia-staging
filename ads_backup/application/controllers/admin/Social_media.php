<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Social_media extends MY_Controller{
 function __construct()
 {
       parent::__construct();
       $data['userdata'] = $this->session->all_userdata();
       if(!isset($data['userdata']['is_login'])) 
       redirect('admin/login');
       $this->page='Social Media'; 
       $this->load->model('Social_media_model');
 } 

public function index()
{
  
  try{
      $data['noof_page'] = 0;
     $data['social_media'] = $this->Social_media_model->get_all_social_media($this->data['tbl_social_media']);
      $data['_view'] = 'admin/social_media_list';
      $this->load->view('admin/layouts/main',$data);
    } catch (Exception $ex) {
      throw new Exception('Social_media Controller : Error in index function - ' . $ex);
  }

}

function add()
 {  
try{
      $params = array(
       'name'=> $this->input->post('name'),
       'icon_class'=> $this->input->post('icon_class'),
       'link'=> $this->input->post('link'),
       'tab_status'=> $this->input->post('tab_status'),
       'position'=> $this->input->post('position'),
       'publish'=> $this->input->post('publish'),
        );
       $this->load->library('upload');
       $this->load->library('form_validation');
        $foldername='image';
        $fileuploaddire='./uploads/'.$foldername;
        $directory=base_url('uploads/').$foldername;
        if (!is_dir($fileuploaddire)) {
         mkdir($fileuploaddire, 0777, true);
        }
        $image="";
        if (!empty($_FILES['image']['name']))
        { 
            $filename =$_FILES['image']['name'];
            $image = str_replace(' ','_',$filename);
            $config['file_name'] = $image; 
            $config['upload_path']=$fileuploaddire;
            $config['allowed_types']='*';
             $config['max_length']='100000';
            $this->upload->initialize($config);
            if(!$this->upload->do_upload('image'))
            {
                $error =$this->upload->display_errors();
                                                    // print_r($error);
                $msg='File Can not Upload ..Please upload pdf |doc |docs|jpg|jpeg|png  type only and Maximum file size 25MB '.$error;
                $this->session->set_flashdata('image',$msg);
                 $this->form_validation->set_rules('image',$msg,'required');
            }
            else 
            {
            }
        }
        else
        {
               //$this->form_validation->set_rules('image','file','required');
                $this->session->set_flashdata('image','File required');
        }
        $params['image'] =$image;
       if(isset($_POST) && count($_POST) > 0)     
        {  
            $id= $this->Social_media_model->add_social_media($params,$this->data['tbl_social_media']);
             $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully added.</div>');
              redirect('admin/social_media/');
        }
        else
        { 
            $data['position_order']=$this->Common_model->getposition_order($this->data['tbl_social_media']);
            
            $data['_view'] = 'admin/social_media_add';
            $this->load->view('admin/layouts/main',$data);
        }
  } catch (Exception $ex) {
    throw new Exception('Social_media Controller : Error in add function - ' . $ex);
  }  
 }  
  /*
  * Editing a social_media
 */
 public function edit($id)
 {   
  try{
   $data['social_media'] = $this->Social_media_model->get_social_media($id,$this->data['tbl_social_media']);
       $this->load->library('upload');
       $this->load->library('form_validation');
     if(isset($data['social_media']['id']))
      {
        $params = array(
           'name'=> $this->input->post('name'),
           'icon_class'=> $this->input->post('icon_class'),
           'link'=> $this->input->post('link'),
           'tab_status'=> $this->input->post('tab_status'),
           'position'=> $this->input->post('position'),
           'publish'=> $this->input->post('publish'),
        );
      $foldername='image';
      $fileuploaddire='./uploads/'.$foldername;
      $directory=base_url('uploads/').$foldername;
      if (!is_dir($fileuploaddire)) {
         mkdir($fileuploaddire, 0777, true);
      }
      $image="";
      if (!empty($_FILES['image']['name']))
      { 
          $filename =$_FILES['image']['name'];
          $image = str_replace(' ','_',$filename);
          $config['file_name'] = $image; 
          $config['upload_path']=$fileuploaddire;
          $config['allowed_types']='*';
          $config['max_length']='100000';
          $this->upload->initialize($config);
          if(!$this->upload->do_upload('image'))
          {
              $error =$this->upload->display_errors();
                                                    // print_r($error);
              $msg='File Can not Upload ..Please upload pdf |doc |docs|jpg|jpeg|png  type only and Maximum file size 25MB '.$error;
              $this->session->set_flashdata('image',$msg);
                $this->form_validation->set_rules('image',$msg,'required');
              }
              else 
              {
          $pathn=FCPATH.'uploads/image/'.$data['social_media']['image'];
         if(is_file($pathn))
           unlink($pathn);   
                $params['image'] =$image;
              }
       }
       else
       {
        }
          if(isset($_POST) && count($_POST) > 0)     
           {  
           $this->Social_media_model->update_social_media($id,$params,$this->data['tbl_social_media']);
             $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully updated.</div>');
                redirect('admin/social_media');
           }
           else
          {
              $data['_view'] = 'admin/social_media_edit';
              $this->load->view('admin/layouts/main',$data);
          }
  }
  else
  show_error('The social_media you are trying to edit does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Social_media Controller : Error in edit function - ' . $ex);
  }  
} 
/*
  * Deleting social_media
  */
  function remove($id)
   {
    try{
         $social_media = $this->Social_media_model->get_social_media($id,$this->data['tbl_social_media']);
         // check if the social_media exists before trying to delete it
        if(isset($social_media['id']))
        {
         $this->Social_media_model->delete_social_media($id,$this->data['tbl_social_media']);
         $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Succesfully Removed.</div>');
         $pathn=FCPATH.'uploads/image/'.$social_media['image'];
         if(is_file($pathn))
           unlink($pathn);   
           redirect('admin/social_media/');
        }
       else
       show_error('The social_media you are trying to delete does not exist.');
  } catch (Exception $ex) {
    throw new Exception('Social_media Controller : Error in remove function - ' . $ex);
  }  
  }
  
 
 }
