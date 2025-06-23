<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Manage_page extends MY_Controller{
  private $error;
    private $success;
function __construct()
{ 
  parent::__construct();
  $data['userdata'] = $this->session->all_userdata();
  if(!isset($data['userdata']['is_login'])) 
  redirect('admin/login');
  $this->page='Manage page'; 
  $this->load->model('Manage_page_model');
}

 private function handle_error($err)
 {
    $this->error .= $err . "\r\n";
 }

private function handle_success($succ)
{
    $this->success .= $succ . "\r\n";
}


public function array_flatten($array)
{ 
if (!is_array($array)) { 
return FALSE; 
}
 
$result = array(); 
foreach ($array as $key => $value) { 
if (is_array($value)) { 
$result = array_merge($result, array_flatten($value)); 
} 
else { 
$result[$key] = $value; 
} 
} 
return $result; 
} 


public function update_page()
{
    $page=$this->uri->segment(4)?$this->uri->segment(4):'';
    if(!empty($page))
    {
        $page=$this->uri->segment(4)?$this->uri->segment(4):'';
        $page1=$this->uri->segment(3)?$this->uri->segment(3):'home'; 
        $page_url=$page1.'/'.$page;
    }
    else
    {
       $page=$this->uri->segment(3)?$this->uri->segment(3):'home'; 
       $page_url=$page; 
    }

    $page_master=$this->Manage_page_model->getinfo($page_url);
    $view_page=!empty($page_master->view_file_name)?$page_master->view_file_name:'';

 
    if(!empty($view_page))
    {
       $view_page = !empty($page_master->view_file_name)?$page_master->view_file_name:'';
    }
    else
    {
       $view_page = @str_replace('-', '_', $page);
    }    


    $view_page_name=@str_replace('_', ' ', $view_page);

    $data['page_name']=$view_page_name;
    $group_id = 1;
    $data['group_id'] = $group_id;
    $page_exit=FALSE;
   

    // echo"<pre>";
    // print_r($page_master);
    // exit;
    $filename = APPPATH.'views/admin/page/'.$view_page.'.php';
    if(file_exists($filename))
    {
       $page_exit=TRUE;
    } 
    else 
    {
      $page_exit=false;
      //$view_page='common';
    }

    $data['page_exit']=$page_exit;
    if(!empty($page_master))
    {
        $page_master=$this->Manage_page_model->getinfo($page_url);
        $data['page_data']=$page_master;
        $id=$page_master->id;
        if(isset($_POST) && count($_POST) > 0)     
        {
          $post = $this->input->post();

          $post['header_menu']=!empty($this->input->post('header_menu'))?$this->input->post('header_menu'):'0';
          $post['footer_menu']=!empty($this->input->post('footer_menu'))?$this->input->post('footer_menu'):'0';
          $post['quick_link'] =!empty($this->input->post('quick_link'))?$this->input->post('quick_link'):'0';
          $post['publish'] =!empty($this->input->post('publish'))?$this->input->post('publish'):'0';

        
          $up=$this->Manage_page_model->update_menu($id,$post);
          
          if($up)
          {
                 
            $updated_url_slug=$this->Manage_page_model->get_updated_url($id);
            $url=$updated_url_slug->url;
            if(!empty($_FILES))
            {
                      $i = 0;
                      $files = array();
                      $col= array();
                      $update_files_info=array();
                      $file_error    = FALSE;
                      $is_file_error = FALSE;
                      $this->load->library('upload');
                      foreach ($_FILES as $key => $value)
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

                                    // $ext = @end($new_file_name_arr); # extra () to prevent notice
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
                                    $table='menu';
                                    $slug_title = $this->gen_unique_file_name($table,$slug_title,$ext,$dir_path,$foldername);

                                    $new_name = $slug_title.'.'.$ext;



                                // end New Code

                      
                                $config['upload_path'] = $dir_path;
                                $config['file_name'] =$new_name;
                                $config['allowed_types'] = '*';
                                $config['max_size'] = '0';
                                $config['max_filename'] = '255';
                                //$config['encrypt_name'] = TRUE;
                                $this->upload->initialize($config);
                                if(!$this->upload->do_upload($key))
                                {
                                   $this->handle_error($this->upload->display_errors());
                                   $is_file_error = TRUE; 
                                } 
                                else
                                {
                                   $files[$i]  = $this->upload->data();

                                   // echo"<pre>";
                                   // print_r( $files[$i]);
                                   // exit;
                                   $col[$i] = $key;
                                   ++$i;
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
                              $update_files_info[]=$this->Manage_page_model->update_files_info($id,$up_image);
                              
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
                  if(!empty($file_error))
                  {

                    $this->session->set_flashdata('msg','<div class="alert alert-success mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Page Updated  </strong>Successfully</div>');  
                      //redirect('admin/menu');
                      redirect(base_url().'manage-pages/update_page/'.$url);

                  }
                  else
                  {

                      $this->session->set_flashdata('msg','<div class="alert alert-success mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Page Updated  </strong>Successfully</div>');  
                      //redirect('admin/menu');
                      redirect(base_url().'manage-pages/update_page/'.$url);


                  }
                    
              
          }
      else
        {
        
      
              $this->session->set_flashdata('msg','<div class="alert alert-danger mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Page </strong>not Updated, Try Again</div>');  
             
              //redirect('manage-pages/update_page/'.$page);
              redirect(base_url().'manage-pages/update_page/'.$url);
          
        
          }
        }     
        else
        {
           $data['_seoheader']='admin/page/seo_header';
           $data['_seofooter']='admin/page/seo_footer';
           $data['_page'] = 'admin/page/'.$view_page;
           $data['_view'] = 'admin/page/page_form';
           $this->load->view('admin/layouts/main',$data); 

        }  

    }
    else
    {
          $this->session->set_flashdata('msg','<div class="alert alert-danger mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Page! </strong>Not Available</div>');  
           //redirect('admin/menu');

           redirect($this->uri->uri_string());

    }  

   
}

public function get_all_active_template_item($table,$pageid,$template_id)
{

    return $this->Manage_page_model->get_all_active_template_item($table,$pageid,$template_id);
}


public function create_template_row()
{
    $template_id=$this->input->post('template_id');
    if(!empty($template_id))
    {
       $componets=$this->Manage_page_model->get_template_component($template_id);
       if(!empty($componets))
       {

        $output='';
        $output.='<div class="col-md-12 b1 p-3 blockcount">';
        foreach($componets as $cmp)
        {
            if($cmp->id ==1)
            {
               $output.='<label for="image1" class="control-label"> <span class="text-danger"></span>Banner</label>';
               $output.='<div class="form-group"><input type="file" name="banner"  class="form-control" required/></div>';

            }
            if($cmp->id ==2)
            {
               $output.='<label for="image2" class="control-label"> <span class="text-danger"></span>File</label>';
                $output.='<div class="form-group"><input type="file" name="image" class="form-control" required/></div>'; 

            }
            if($cmp->id ==3)
            {
               $output.='<label class="control-label"><span class="text-danger"></span>Description</label>';
               $output.='<div class="form-group"><textarea name="description" class="form-control textarea" required></textarea></div>';

            }
            if($cmp->id ==4)
            {
               $output.='<label class="control-label"><span class="text-danger"></span>Title</label>';
               $output.='<div class="form-group"><input type="text" class="form-control" name="title"></div>'; 
            }
            if($cmp->id == 5)
            {
               $output.='<label for="image1" class="control-label"> <span class="text-danger"></span>Gallery[Multiple]</label>';
               $output.='<div class="form-group"><input type="file" name="files1[]"  multiple class="form-control mfile"  /></div>'; 
            }
            if($cmp->id ==7)
            {
               $output.='<label class="control-label"><span class="text-danger"></span>Description</label>';
               $output.='<div class="form-group"><textarea name="description1" class="form-control textarea" required></textarea></div>';

            }
            if($cmp->id ==8)
            {
               $output.='<label class="control-label"><span class="text-danger"></span>Title</label>';
               $output.='<div class="form-group"><input type="text" class="form-control" name="title1"></div>'; 
            }
            if($cmp->id ==9)
            {
               $output.='<label class="control-label"><span class="text-danger"></span>Description</label>';
               $output.='<div class="form-group"><textarea name="description2" class="form-control textarea" required></textarea></div>';
            }

            
        }

        if($cmp->id!=6)
        {
               $output.='<span class="btn btn-danger mt-2 removeRow" id="'.$template_id.'">Remove</span>';
        }    
      
         $output.='</div>';
         $response_array['flag']=1;
          $response_array['output']=$output;
       }
       else
       {
           $response_array['flag']=0;
           $response_array['output']='Please try again';
       }
    }
    else
    {
        $response_array['flag']=0;
        $response_array['output']='Please try again';
    }
    echo json_encode($response_array);    
}





public function create_template_custom()
{
    $pageid=$this->input->post('pageid');
    $componets=$this->input->post('componets');
    $flag=1;
    if(!empty($componets))
    {
            $compnent_id=  @implode(',',$componets);
            if($compnent_id == '1')
            {
              $flag=1;
            }
            elseif($compnent_id == '2')
            {

              $flag=1;

            }
            elseif($compnent_id == '3')
            {

              $flag=1;

            }
            elseif($compnent_id == '4')
            {

               $flag=1;

            }
            elseif($compnent_id == '5')
            {
               $flag=1;
            }
            elseif($compnent_id == '6')
            {
               $flag=1;
            }
            elseif($compnent_id == '2,3')
            {
               $flag=1;
            }
            elseif($compnent_id == '2,4')
            {
                 $flag=1;
            }
            elseif($compnent_id == '3,4')
            {
              $flag=1;
            }
            elseif($compnent_id == '2,3,4')
            {
               $flag=1;
            }
            elseif($compnent_id == '2,3,4,7')
            {
                $flag=1;
            }
            elseif($compnent_id == '2,3,4,8')
            {
                $flag=1;
            }
            elseif($compnent_id == '3,4,7,9')
            {
                $flag=1;
            }
            elseif($compnent_id == '3,4,7,8')
            {
                $flag=1;
            }
            elseif($compnent_id == '4,5')
            {
                $flag=1;
            }
            elseif($compnent_id == '3,5')
            {
                $flag=1;
            }
            elseif($compnent_id == '3,4,8')
            {
                $flag=1;
            }

            else
            {
              $flag=0;
            }
     if($flag == 1)
     {

            if(!empty($pageid) && !empty($componets))
            {
                $c=@implode(',',$componets);
                $data_flag_check = $this->Manage_page_model->get_data_flag($pageid,$c,$this->data['tbl_page_template']);
              
                if($data_flag_check == 0)
                {
                   $data_flag=0;
                }
                else
                {
                    $data_flag=$data_flag_check;
                }


                $params=array(
                'menu_id'=>$pageid,
                'componets_id'=>@implode(',',$componets),
                'publish'=>1,
                'position'=>0,
                'name'=>'Template',
                'data_flag'=>$data_flag,
                );


                $generate_id=$this->Manage_page_model->generate_template($params,$this->data['tbl_page_template']);

                $output='';
                if($generate_id)
                {
                    $templates=$this->Manage_page_model->get_template_data($pageid,$this->data['tbl_page_template']);
                    if(!empty($templates))
                    {   

                    $n=1;
                    foreach($templates as $template)
                    {
                        $output.='<li id="menu-'.$template->id.'" class="sortable">
                        <div class="col-md-12 col-sm-12 col-xs-12 ns-title" align="center" ><h5><b><u>Template '.$n.' </u></b></h5></div>
                        <input type="hidden" value="'.$template->id.'" name="template_id">
                        <div id="block'.$n.'">';

                        $output.='</div></li>';

                        $n++;
                    }
                    $response_array['output']=$output; 
                    $response_array['flag']=1; 
                    }
                    else
                    {
                        $response_array['flag']=0;
                        $response_array['output']='Active Templates are not available!';
                    }

                }
                else
                {
                $response_array['flag']=0;
                $response_array['output']='Template Created Failed!';
                }  

            }
            else
            {
            $response_array['flag']=0;
            $response_array['output']='Please try again';

            } 
            


     }
     else
     {
         $response_array['flag']=0;
         $response_array['output']='Please try again! This Type Of Template Not Acceptable  current System! For Further details Please contact Developer Team!';
     }


    }
    else
    {
        $response_array['flag']=0;
        $response_array['output']='Please try again';
    }
    echo json_encode($response_array);

}

public function create_template()
{
  $pageid=$this->input->post('pageid');
  $template_id=$this->input->post('template_id');
  $n= $template_id;
  $output='';
  if(!empty($pageid) && !empty($template_id))
  {
      // $template_id='menu-'.$template_id;

      // if($template_id!=7)
      // {
        $check_template_status=$this->Manage_page_model->get_template_count($this->data['tbl_page_template'],$pageid,$template_id);
      // }
      // else
      // {
      //   $check_template_status=0;
      // }  
      

      if($check_template_status == 0)
      {
          $insert=$this->Manage_page_model->create_template($pageid,$template_id,$this->data['tbl_page_template'],$n);
          if($insert)
          {
                $response_array['flag']=1;
                $output.='<li id="menu-'.$insert.'" class="sortable">
                <div class="col-md-12 col-sm-12 col-xs-12 ns-title" align="center" ><h5><b><u>Template '.$n.' </u></b></h5></div>
                <input type="hidden" value="'.$insert.'" name="template_id">
                <div id="block'.$n.'">

                </div>
                </li>';
                $response_array['output']=$output;

          }
          else
          {
              $response_array['flag']=0;
              $response_array['output']='Please try again';
          }
      }

      else
      {
         $response_array['flag']=0; 
         $response_array['output']='Template already generated for current page';
      }  
  

     
  }
  else
  {
     $response_array['flag']=0;
     $response_array['output']='Please try again';
  } 

  echo json_encode($response_array); 

}

 public function save_position()
    {
        $menu = $this->input->post('menu');

        if (!empty($menu)) {
            //adodb_pr($menu);
            $menu = $this->input->post('menu');
            foreach ($menu as $k => $v) {
                if ($v == 'null') {
                    $menu2[0][] = $k;
                } else {
                    $menu2[$v][] = $k;
                }
            }
            $success = 0;
            if (!empty($menu2)) {
                foreach ($menu2 as $k => $v) {
                    $i = 1;
                    foreach ($v as $v2) {
                        // $data['menu_id'] = $k;
                        $data['position'] = $i;
                        if ($this->db->update($this->data['tbl_page_template'], $data, 'id' . ' = ' . $v2)) {
                            $success++;
                        }
                        $i++;
                    }
                }
            }
        }
    }


    public function remove_template()
    {

      if (!$this->input->is_ajax_request()) 
      {
        exit('No direct script access allowed');
      }
      else
      {
          $column=$this->input->post('column');
          $pageid=$this->input->post('pageid');
          $check=$this->Manage_page_model->get_page_content($column,$pageid,$this->data['tbl_page_content']);
          if(!empty($check))
          {
             $response_array['flag'] = 0;
             $response_array['success'] = 'Deleted Failed.Template include a page component';  
          }
          else
          {
             $delete=$this->Manage_page_model->page_template_delete($column,$pageid,$this->data['tbl_page_template']);
             $response_array['flag'] = 1;
             $response_array['success'] = 'Deleted Successfully'; 
          }  
         echo json_encode($response_array);

      }  
    }

    public function change_template_status()
    {

      if(!$this->input->is_ajax_request()) 
      {
        exit('No direct script access allowed');
      }
      else
      {
          $status=$this->input->post('status');
          $pageid=$this->input->post('pageid');
          $msg='';
          $templateid=$this->input->post('templateid');
          $change_status=$this->Manage_page_model->get_template_status_change($status,$pageid,$this->data['tbl_page_template'],$templateid);
          if($change_status)
          {
             if($status == 1)
             {
                  $msg='Template is Enable';
             }
             else
             {
               $msg='Template is disable';
             }   
             $response_array['flag'] = 1;
             $response_array['status'] = $msg; 
          }
          else
          {
              $response_array['flag'] = 0;
              $response_array['status'] = 'Failed Please try again!';
          }  

          echo json_encode($response_array);

      }  

    }


    public function change_banner_category()
    {

      if(!$this->input->is_ajax_request()) 
      {
        exit('No direct script access allowed');
      }
      else
      {
         $status = $this->input->post('status');
         $pageid = $this->input->post('pageid');
         $page_content=$this->input->post('page_content');
         $change_status=$this->Common_model->get_change_banner_category($status,$pageid,$page_content,$this->data['tbl_page_content']);
         if(!empty($change_status))
         {
             
             if($status == 1)
             {
                  $msg='Banner Changed to Desktop Banner';
             }
             else
             {
               $msg='Banner Changed to Mobile Banner';
             }

             $response_array['flag'] = 1;
             $response_array['status'] = $msg; 

         }
         else
         {
             $response_array['flag'] = 0;
             $response_array['status'] = 'Please try again!';  
         }   

          echo json_encode($response_array);


      }  



    }

 public function change_data_fetch()   
 {
      if(!$this->input->is_ajax_request()) 
      {
        exit('No direct script access allowed');
      }
      else
      {
        $status= $this->input->post('status');
        $pageid=$this->input->post('pageid');
        $page_content=$this->input->post('page_content');
        $params=array(
             'data_fetch'=>$status,
            );
        $change_status=$this->Common_model->get_change_data_fetch($status,$pageid,$page_content,$this->data['tbl_page_template'],$params);

        if(!empty($change_status))
        {
             if($status == 1)
             {
                  $msg='Template is Single row fetch';
             }
             elseif($status == 2)
             {
               $msg='Template is Two row fetch';
             }
             elseif($status == 3)
             {
                $msg='External Function';
             }
             else
             {
                $msg='Template is Full row fetch';
             }   

             $response_array['flag'] = 1;
             $response_array['status'] = $msg; 
           
        }
        else
        {

             $response_array['flag'] = 0;
             $response_array['status'] = 'Please try again!';  

        }    


       echo json_encode($response_array);


      }  

 }


    public function gen_unique_file_name($table,$name,$ext,$dir,$folder)
    {
        $page_exit='';
        $fileName = $name.'.'.$ext;
        $filename = FCPATH.'uploads/'.$folder.'/'.$fileName;
        if(file_exists($filename))
        {
            $this->db->select('*');
            $this->db->where($folder,$fileName);
            $query=$this->db->get($table);
            $count=$query->num_rows();
            if($count>0)
            {
                $name = $name.'-'.rand(1,99);
                return $this->gen_unique_file_name($table,$name,$ext,$dir,$folder);
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




} 