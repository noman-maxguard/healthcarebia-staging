<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Common extends MY_Controller {
function __construct()
{
        parent::__construct();
        $data['userdata'] = $this->session->all_userdata();
        if(!isset($data['userdata']['is_login'])) 
        redirect('/admin/login');
        $role = $this->session->userdata('user_role');
        $this->data['page']='Dashboard';                  
}

 //sort_images
 public function sort_images()
 {
    

     $id = $this->input->post('id');
     $sort_order = $this->input->post('sort_order');
     $table=$this->input->post('table');
     $this->Common_model->update_sort_order($table,$id,$sort_order);

     $output['flag'] = 1;


     echo json_encode($output);
     exit;
 }

 //change_image_status
 public function change_image_status()
 {
     

     $id = $this->input->post('id');
     $imageStatus = $this->input->post('imageStatus');
     $table=$this->input->post('table');
     $this->Common_model->update_status_image($table,$id,$imageStatus);

     $output['flag'] = 1;


     echo json_encode($output);
     exit;
 }

public function index()
{

        $data['_view'] = 'admin/common/dashboard';
        $this->load->view('admin/layouts/main',$data);


}

public function selcategory()
{
    if(!$this->input->is_ajax_request()) 
    {
      exit('No direct script access allowed');
    }
    else
    {
        $id=$this->input->post('id');
        $table=$this->data['tbl_service_subcategory'];
        $data=$this->Common_model->calldata($id,$table);
        $output='';
        if(!empty($data))
        {
            foreach($data as $op)
            {
                $output.='<option value="'.$op->id.'">'.$op->subcategory.'</option>'; 
            }
            $response_array['info']=$output; 
            $response_array['flag']=1; 
        }
        else
        {
           $response_array['flag']=0;
        }

        echo json_encode($response_array);
    }  

}

public function update_sort_order_common()
{
      $id = $this->input->post('id');
      $table=$this->input->post('table');


      $sort_order = $this->input->post('sort_order');
      // echo"<pre>";
      // print_r($id);
      // echo"<pre>";
      // print_r($table);
      // echo"<pre>";
      // print_r($sort_order);
      // exit;
      $this->Common_model->update_sort_order_position_common($table,$id,$sort_order);
       $output['flag'] = 1;


        echo json_encode($output);
        exit;

}


//update_sort_order
public function update_sort_order()
{
   

    $id = $this->input->post('id');
    $table=$this->input->post('table');
    $category=$this->input->post('category');
    $sort_order = $this->input->post('sort_order');
    $this->Common_model->update_sort_order_position($table,$id,$category,$sort_order);

    $output['flag'] = 1;


    echo json_encode($output);
    exit;
    
}

public function gen_unique_file_name($table,$name,$folder)
{

$page_exit='';
$fileName = $name[0];
$filename = @FCPATH.'uploads/'.$folder.'/'.$fileName;

if(file_exists($filename))
{
$this->db->select('*');
$this->db->where($folder,$fileName);
$query=$this->db->get($table);
$count=$query->num_rows();
if($count>0)
{
    $name = $name.'-'.rand(1,99);
    return $this->gen_unique_file_name($table,$name,$folder);
}
else
{
   return $name;
}         

} 
else 
{
$page_exit=0;
return $name;
}


}


public function edit_data()
{
    if(!$this->input->is_ajax_request()) 
      {
        exit('No direct script access allowed');
      }
      else
      {
            
            $id   = $this->input->post('id');
            $table= $this->input->post('table');
            $data = $this->Common_model->getdata_fetch($table,$id);
            if(!empty($data))
            {
                
                $post['description']=$this->input->post('description');
                $post['description1']=$this->input->post('description1');
                $post['description2']=$this->input->post('description2');
                $post['title']=$this->input->post('title');
                $post['title1']=$this->input->post('title1');
                $update=$this->Service_model->update_indivitual_data($id,$table,$post);
                if($update)
                {
                    
                    if(!empty($_FILES))
                    {
                    $i = 0;
                    $files = array();
                    $col= array();
                    $update_files_info=array();
                    $file_error    = FALSE;
                    $is_file_error = FALSE;
                          $this->load->library('upload');
                          foreach($_FILES as $key => $value)
                          {
                                if(!empty($value['name']))
                                {

                                        $foldername=$key;
                                        $dir_path='./uploads/'.$foldername;
                                        if(!is_dir($dir_path))
                                        {
                                          mkdir($dir_path, 0777, true);
                                        }

                                       // New Code

                                            $file_name=$value['name'];
                                            $new_file_name = @preg_replace('/\s+/', '_', $file_name);
                                            $new_file_name_arr = @explode(".", $new_file_name);


                                            $ext= @pathinfo($new_file_name, PATHINFO_EXTENSION);
                                            $name=@pathinfo($new_file_name, PATHINFO_FILENAME);
                                            $name = !empty($name)?$name:'file';
                                            $slug_title = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
                                            $slug_title = preg_replace('!-+!', '-', $slug_title);
                                            $first_char = substr($slug_title,0,1);
                                            if($first_char == '-')
                                            $slug_title = ltrim($slug_title, '-');

                                            $last_char = substr($slug_title, -1);
                                            if($last_char == '-')
                                            $slug_title = rtrim($slug_title, '-');

                                            $slug_title = strtolower($slug_title);
                                            $table=$this->data['tbl_page_content'];
                                            $slug_title = $this->gen_unique_file_name($table,$slug_title,$ext,$dir_path,$foldername);

                                            $new_name = $slug_title.'.'.$ext;



                                        // // end New Code

                              
                                        $config['upload_path'] = $dir_path;
                                        $config['file_name'] =$new_name;
                                        $config['allowed_types'] = '*';
                                        $config['max_size'] = '0';
                                        $config['max_filename'] = '255';
                                        $config['encrypt_name'] = TRUE;
                                        $this->upload->initialize($config);
                                        $this->load->library('upload', $config);
                                        if($this->upload->do_upload($key))
                                        {
                                           
                                            $files[$i]  = $this->upload->data();

                                          
                                           $col[$i] = $key;
                                           ++$i; 
                                        } 
                                        else
                                        {
                                          $this->handle_error($this->upload->display_errors());
                                           $is_file_error = TRUE;
                                        }

                                    } 

                                    
                     

                          } 

                          // There were errors, we have to delete the uploaded files
                          if($is_file_error && $files)
                          {

                            for($i = 0; $i < count($files); $i++)
                            {
                                $file = $dir_path . $files[$i]['file_name'];
                                if(file_exists($file))
                                {
                                  unlink($file);
                                }
                            }
                          }
                          if(!$is_file_error && $files)
                          { 
                               foreach($files as $key => $value)
                               {
                                  $up_image=array(
                                   ''.$col[$key].''=>$files[$key]['file_name'],
                                    
                                  );
                                  $update_files_info[]=$this->Service_model->update_files_info_data($id,$up_image);
                                  
                               } 
                               if(!empty($update_files_info))
                               {
                                  $file_error=TRUE;
                               }
                               else
                               {
                                  $file_error=FALSE;
                               }
                             
                          }  

                      }
                      // if(!empty($file_error))
                      // {

                      //   $response_array['flag']=1;
                      //   $response_array['status']='Update Successfully'; 

                      // }
                      // else
                      // {

                      //     $response_array['flag']=0;
                      //     $response_array['status']='Please try again!';  


                      // }

                        $response_array['flag']=1;
                        $response_array['status']='Update Successfully'; 


                }
                else
                {

                    $response_array['flag']=0;
                    $response_array['status']='Please try again!';  
                }
            }
            else
            {
               $response_array['flag']=0;
               $response_array['status']='Not Active Content data'; 

            }    
         

        echo json_encode($response_array); 
      }
     
}


public function data_fetch()
{

     if (!$this->input->is_ajax_request()) 
      {
        exit('No direct script access allowed');
      }
      else
      {
           $table=$this->input->post('table');
           $id=$this->input->post('id');
           $component_details=$this->Common_model->get_data_component($table,$id);
           $compnent_id='';
           if(!empty($component_details))
           {
              $compnent_id=!empty($component_details->componets_id)?$component_details->componets_id:'';
           }


           $output='';
           $data=$this->Common_model->getdata_fetch($table,$id);

         
           if(!empty($data))
           {
                  
                    $response_array['flag'] = 1;

                    if($compnent_id == '2,3')
                    {

                            $output.='<div class="row"><div class="col-md-12 p-2">';
                            if(!empty($data->image))
                            {
                            $output.='<img style="width:100px" src="'.base_url().'uploads/image/'.$data->image.'">
                            <a title="Remove Image" style="cursor: pointer" class="deleteImage2" id="image-page_content-'.$data->id.'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </a>';

                            }

                            $output.='</div>';
                            $output.='<div class="col-md-12 p-2"><input type="file" name="image" class="form-control"></div>';
                            $output.='<div class="col-md-12 p-2"><input type="hidden" name="table" class="form-control" value="page_content">';
                            $output.='<input type="hidden" name="id" class="form-control" value="'.$data->id.'">';
                            $output.='<textarea name="description" class="form-control textarea">'.$data->description.'</textarea></div></div>';

                    } 
                    elseif($compnent_id == '2,3,4')
                    {

                            $output.='<div class="row"><div class="col-md-12 p-2">';
                            if(!empty($data->image))
                            {
                            $output.='<img style="width:100px" src="'.base_url().'uploads/image/'.$data->image.'">
                            <a title="Remove Image" style="cursor: pointer" class="deleteImage2" id="image-'.$this->data['tbl_page_content'].'-'.$data->id.'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </a>';

                            }

                            $output.='</div>';
                            $output.='<div class="col-md-12 p-2"><input type="file" name="image" class="form-control"></div>';
                            $output.='<div class="col-md-12 p-2"><input type="hidden" name="table" class="form-control" value="page_content">';
                            $output.='<input type="hidden" name="id" class="form-control" value="'.$data->id.'">';
                            $output.='<textarea name="description" class="form-control textarea">'.$data->description.'</textarea></div></div>';
                            $output.='<input type="text" class="form-control" name="title" value="'.$data->title.'"></div></div>';


                     }
                    elseif($compnent_id == '3,4,8')
                    {

                            $output.='<div class="row">';

                            $output.='<div class="col-md-12 p-2"><input type="text" class="form-control" name="title" value="'.$data->title.'"></div>';
                            $output.='<div class="col-md-12 p-2"><input type="hidden" name="table" class="form-control" value="page_content">';
                            $output.='<input type="hidden" name="id" class="form-control" value="'.$data->id.'">';
                            $output.='<textarea name="description" class="form-control textarea">'.$data->description.'</textarea></div></div>';
                            $output.='<input type="text" class="form-control" name="title1" value="'.$data->title1.'"></div></div>';


                     }


                    elseif($compnent_id == '2,3,4,7')
                    {

                            $output.='<div class="row"><div class="col-md-12 p-2">';
                            if(!empty($data->image))
                            {
                            $output.='<img style="width:100px" src="'.base_url().'uploads/image/'.$data->image.'">
                            <a title="Remove Image" style="cursor: pointer" class="deleteImage2" id="image-'.$this->data['tbl_page_content'].'-'.$data->id.'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </a>';

                            }

                            $output.='</div>';
                            $output.='<div class="col-md-12 p-2"><input type="file" name="image" class="form-control"></div>';
                            $output.='<div class="col-md-12 p-2"><input type="hidden" name="table" class="form-control" value="page_content">';
                            $output.='<input type="hidden" name="id" class="form-control" value="'.$data->id.'">';
                            $output.='<textarea name="description" class="form-control textarea">'.$data->description.'</textarea></div>';
                            $output.='<div class="col-md-12 p-2"><input type="text" class="form-control" name="title" value="'.$data->title.'"></div>

                            <div class="col-md-12 p-2"><textarea name="description1" class="form-control textarea">'.$data->description1.'</textarea></div>';

                             $output.='</div></div>';


                     }
                     
                    elseif($compnent_id == '3,4,7,9')
                    {

                            $output.='<div class="row">';
                          
                            $output.='<div class="col-md-12 p-2"><input type="file" name="image" class="form-control"></div>';
                            $output.='<div class="col-md-12 p-2"><input type="hidden" name="table" class="form-control" value="page_content">';
                            $output.='<input type="hidden" name="id" class="form-control" value="'.$data->id.'">';
                            $output.='<textarea name="description" class="form-control textarea">'.$data->description.'</textarea></div>';

                            $output.='<div class="col-md-12 p-2"><textarea name="description1" class="form-control textarea">'.$data->description1.'</textarea></div>';

                               $output.='<div class="col-md-12 p-2"><textarea name="description2" class="form-control textarea">'.$data->description2.'</textarea></div>';

                             $output.='</div></div>';


                     }
                    elseif($compnent_id == '2,3,4,8')
                    {

                            $output.='<div class="row"><div class="col-md-12 p-2">';
                            if(!empty($data->image))
                            {
                            $output.='<img style="width:100px" src="'.base_url().'uploads/image/'.$data->image.'">
                            <a title="Remove Image" style="cursor: pointer" class="deleteImage2" id="image-'.$this->data['tbl_page_content'].'-'.$data->id.'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </a>';

                            }

                            $output.='</div>';
                            $output.='<div class="col-md-12 p-2"><input type="file" name="image" class="form-control"></div>';
                            $output.='<div class="col-md-12 p-2"><input type="hidden" name="table" class="form-control" value="page_content">';
                            $output.='<input type="hidden" name="id" class="form-control" value="'.$data->id.'">';
                            $output.='<textarea name="description" class="form-control textarea">'.$data->description.'</textarea></div>';
                            $output.='<div class="col-md-12 p-2"><input type="text" class="form-control" name="title" value="'.$data->title.'"></div>';

                            $output.='<div class="col-md-12 p-2"><input type="text" class="form-control" name="title1" value="'.$data->title1.'"></div>';

                             $output.='</div></div>';


                     }
                     elseif($compnent_id == '3,4,7,8')
                    {

                            $output.='<div class="row"><div class="col-md-12 p-2">';
                          
                           
                            $output.='<div class="col-md-12 p-2"><input type="hidden" name="table" class="form-control" value="page_content">';
                            $output.='<input type="hidden" name="id" class="form-control" value="'.$data->id.'">';
                            $output.='<textarea name="description" class="form-control textarea">'.$data->description.'</textarea></div>';
                            $output.='<div class="col-md-12 p-2"><textarea name="description1" class="form-control textarea">'.$data->description1.'</textarea></div>';
                            $output.='<div class="col-md-12 p-2"><input type="text" class="form-control" name="title" value="'.$data->title.'"></div>';
                            $output.='<div class="col-md-12 p-2"><input type="text" class="form-control" name="title1" value="'.$data->title1.'"></div>';
                             $output.='</div></div>';


                     }

                    elseif($compnent_id == '3' || $compnent_id == '3,5')
                    {

                            $output.='<div class="row">';
                            $output.='<div class="col-md-12 p-2"><input type="hidden" name="table" class="form-control" value="page_content">';
                            $output.='<input type="hidden" name="id" class="form-control" value="'.$data->id.'">';
                            $output.='<textarea name="description" class="form-control textarea">'.$data->description.'</textarea></div></div>';


                     }


                    elseif($compnent_id == '3,4')
                    {

                            $output.='<div class="row">';

                            $output.='<div class="col-md-12 p-2">';
                        
                            $output.='<input type="text" name="title" class="form-control" value="'.$data->title.'""></div>';

                            $output.='<div class="col-md-12 p-2"><input type="hidden" name="table" class="form-control" value="page_content">';
                            $output.='<input type="hidden" name="id" class="form-control" value="'.$data->id.'">';

                            $output.='<textarea name="description" class="form-control textarea">'.$data->description.'</textarea></div></div>';


                     }

                    elseif($compnent_id == '2,4')
                    {

                            $output.='<div class="row"><div class="col-md-12 p-2">';
                            if(!empty($data->image))
                            {
                            $output.='<img style="width:100px" src="'.base_url().'uploads/image/'.$data->image.'">
                            <a title="Remove Image" style="cursor: pointer" class="deleteImage2" id="image-'.$this->data['tbl_page_content'].'-'.$data->id.'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                            </a>';

                            }

                            $output.='</div>';
                            $output.='<div class="col-md-12 p-2"><input type="file" name="image" class="form-control"></div>';
                            $output.='<div class="col-md-12 p-2"><input type="hidden" name="table" class="form-control" value="page_content">';
                            $output.='<input type="hidden" name="id" class="form-control" value="'.$data->id.'">';
                            $output.='<input type="text" name="title" class="form-control" value="'.$data->title.'"</div></div>';


                     }

                    elseif($compnent_id == '4' || $compnent_id == '4,5')
                    {
                            $output.='<div class="row">';
                            $output.='<div class="col-md-12 p-2"><input type="hidden" name="table" class="form-control" value="page_content">';
                            $output.='<input type="hidden" name="id" class="form-control" value="'.$data->id.'">';
                            $output.='<input type="text" name="title" class="form-control" value="'.$data->title.'"</div></div>';
                          

                     }
                    
                   else
                   {
                     $response_array['flag'] = 0;
                     $response_array['status'] = 'Data not found';
                   }
                   $response_array['status']=$output;
           }         
          echo json_encode($response_array); 

      }  


}




public function customers()
{

          date_default_timezone_set('Asia/Dubai');
          $date = date("Y-m-d"); 
          $time = date('h:i:s a');
          $year=date("Y");
          $month=date("m");
          if(isset($_POST) && count($_POST) > 0)     
          {



          }
          else
          {


             $data['register']= $this->Common_model->getusers($year,$month,$role=3,$this->data['tbl_tbl_user']);
             $data['_view']   = 'admin/customer_list';
             $this->load->view('admin/layouts/main',$data);
           
          }  

}


public function user_profile()
{
          date_default_timezone_set('Asia/Dubai');
          $date = date("Y-m-d"); 
          $time = date('h:i:s a');
          $year=date("Y");
          $month=date("m");
          $post=$this->input->post();
          if(!empty($post))
          {
                    $register = $this->Common_model->getusers_admin($role=1,$this->data['tbl_tbl_user']);
                    $id       = !empty($register->id)?$register->id:'';
                    if(empty($this->input->post('password')))
                    {  
                             $params = array(
                             'email'=> $this->input->post('email'),
                             );

                    }
                    else
                    {
                          $params = array(
                             'email'=> $this->input->post('email'),
                             'password'=> password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                             
                             
                          );


                    }
                     $this->Common_model->update_auth($id,$params);
                     $this->session->set_flashdata('msg','<div class="alert alert-success mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Success!</strong> Password Updated Successfully!</div>');
                     redirect(base_url().'user-profile');
         }          
         else
         { 
             $data['register']= $this->Common_model->getusers_admin($role=1,$this->data['tbl_tbl_user']);
             $data['_view']   = 'admin/profile';
             $this->load->view('admin/layouts/main',$data);
        }      

}

public function remove1()
{


      if (!$this->input->is_ajax_request()) 
      {
        exit('No direct script access allowed');
      }
      else
      {
          $column=$this->input->post('column');
          $table=$this->input->post('table');
          $id=$this->input->post('id');
          $delete=$this->Common_model->remove_image($table,$id,$column);

          if($delete)
          {
            
            $response_array['flag'] = 1;
             $response_array['success'] = 'Deleted Successfully';
          }
          else
          {
            $response_array['flag'] = 0;
             $response_array['success'] = 'Deleted Failed';
          }
           echo json_encode($response_array); 
      }

}


public function remove2()
{


      if (!$this->input->is_ajax_request()) 
      {
        exit('No direct script access allowed');
      }
      else
      {
          $column=$this->input->post('column');
          $table=$this->input->post('table');
          $id=$this->input->post('id');
          $delete=$this->Common_model->remove_image2($table,$id,$column);

          if($delete)
          {
            
            $response_array['flag'] = 1;
             $response_array['success'] = 'Deleted Successfully';
          }
          else
          {
            $response_array['flag'] = 0;
             $response_array['success'] = 'Deleted Failed';
          }
           echo json_encode($response_array); 
      }

}



public function remove()
{

        if (!$this->input->is_ajax_request()) 
        {
          exit('No direct script access allowed');
        }
        else
        {
                 $id=$this->input->post('id1');
                 $table=$this->input->post('table');

                
                 $delete=$this->Common_model->remove($table,$id);

                 if($delete['id'])
                 {
                        $this->Common_model->delete_table_id($id,$table);
                        $response_array['flag'] = 1;
                        $response_array['success'] = 'Deleted Successfully';
                 }
                 else
                 {
                    $response_array['flag'] = 0;
                    $response_array['success'] = 'Deleted Failed';
                 }
                  echo json_encode($response_array); 
        }

}



public function create_slug()
{
        $url=$this->input->post('text');   
        $table=$this->input->post('table');
        $titleURL=strtolower(url_title($url));
        if(isUrlExists($table,$titleURL))
        {
            $titleURL =''; 

        }
        if(!empty($titleURL))
        {
          $response_array['url']= $titleURL;
          $response_array['flag']=1; 
        }
        else
        {

        $response_array['url']= '';
        $response_array['flag']=0; 

        }
        echo json_encode($response_array);

}




}

?>