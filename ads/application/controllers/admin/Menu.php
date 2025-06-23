<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $data['userdata'] = $this->session->all_userdata();
        if(!isset($data['userdata']['is_login'])) 
        redirect('/admin/login');
        $role = $this->session->userdata('user_role');
        $this->data['page']='Menu'; 
        $this->load->helper('url');
        $this->load->model('Menu_model', 'manager');
        $this->load->helper('my_helper');
    }

    /**
     * Show menu manager
     */
    public function index()
    {
        $group_id = 1;
        $menu = $this->manager->get_menu($group_id,$this->data['tbl_menu']);
        $data['menu_ul'] = '<ul id="easymm"></ul>';
        if ($menu) {
            foreach ($menu as $row) {
                $this->add_row(
                    $row->id, $row->parent_id, ' id="menu-' . $row->id . '" class="sortable "', $this->get_label($row)
                );
            }

        $data['menu_ul'] = $this->generate_list('id="easymm"');
        }
        $data['group_id'] = $group_id;
        $data['group_title'] = $this->manager->get_menu_group_title($group_id,$this->data['tbl_menu_group']);
        $data['menu_groups'] = $this->manager->get_menu_groups($this->data['tbl_menu_group']);
        // $this->load->view('admin/menus/menu', $data);



      $data['_view'] = 'admin/menus/menu';
      $this->load->view('admin/layouts/main',$data);
    }





     public function add_menu()
 {

    $post=$this->input->post();
    if(!empty($post))
    { 
          $title = $this->input->post('url');
           $table='menu';
            $titleURL=strtolower(url_title($this->input->post('title')));
            if(isUrlExists1($table,$titleURL)){
            $titleURL = $titleURL.'-'.random_string('alnum',5); 
            }
          if(!empty($title))
          {

                $data['url'] = $titleURL;
                //$data['class'] = $this->input->post('class');
                $data['title'] = $this->input->post('title');
                $data['group_id'] = $this->input->post('group_id');
                // $data['meta_title']=$this->input->post('meta_title');
                // $data['meta_description']=$this->input->post('meta_description');
                // $data['meta_keywords']=$this->input->post('meta_keywords');
                $data['tab_status']=$this->input->post('tab_status')?$this->input->post('tab_status'):0;
                $data['page_type']=$this->input->post('page_type')?$this->input->post('page_type'):0;
                $data['header_menu']=$this->input->post('header_menu')?$this->input->post('header_menu'):1;
                $data['footer_menu']=$this->input->post('footer_menu')?$this->input->post('footer_menu'):1;
                $data['quick_link']=$this->input->post('quick_link')?$this->input->post('quick_link'):1;
                $data['publish']=$this->input->post('publish')?$this->input->post('publish'):1;
                $data['view_file_name']=$this->input->post('view_file_name')?$this->input->post('view_file_name'):1;
                if($this->db->insert('menu',$data))
                {
                    $mid=$this->db->Insert_ID();
                    if(!empty($mid))
                    {
                        $params=array(
                        'parent_id'=>$mid,
                        'url_slug'=>$this->input->post('url'),
                        'url'=>$this->input->post('url'),
                        );
                        //$this->db->insert('page_master',$params);  
                    }
                        $data['id'] = $this->db->Insert_ID();
                        $this->session->set_flashdata('msg','<div class="alert alert-success mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Success! </strong> Menu Created Successfully</div>');  
                              redirect(base_url().'admin/menu');   
              } 
              else
              {


                 $this->session->set_flashdata('msg','<div class="alert alert-danger mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Failed!  </strong> Menu Created Failed</div>');  
                          redirect(base_url().'setup-menu');
              } 

        }
        else
        {

                $this->session->set_flashdata('msg','<div class="alert alert-danger mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Failed!  </strong> Page Title is Required</div>');  
                    redirect(base_url().'setup-menu');

        }

    }
    else
    {
        $group_id = 1;
        $data['group_id'] = $group_id;
        $data['group_title'] = $this->manager->get_menu_group_title($group_id,$this->data['tbl_menu_group']);
        $data['menu_groups'] = $this->manager->get_menu_groups($this->data['tbl_menu_group']);
        $data['_view'] = 'admin/menus/menu_add';
        $this->load->view('admin/layouts/main',$data);

    }    



 

}

public function edit_menu($id)
{
   
   $post=$this->input->post();
 
   if(!empty($post))
   {
        $title = $this->input->post('title');
        if($title){
                $data['title'] = trim($_POST['title']);
                if(!empty($data['title'])) {
                $data['id'] = $this->input->post('menu_id');
                $data['url'] = $this->input->post('url');
                //$data['class'] = $this->input->post('class');
                // $data['meta_title']=$this->input->post('meta_title');
                // $data['meta_description']=$this->input->post('meta_description');
                // $data['meta_keywords']=$this->input->post('meta_keywords');
                $data['tab_status']=$this->input->post('tab_status')?$this->input->post('tab_status'):0;
                $data['page_type']=$this->input->post('page_type')?$this->input->post('page_type'):0;
                $data['header_menu']=$this->input->post('header_menu')?$this->input->post('header_menu'):0;
                $data['footer_menu']=$this->input->post('footer_menu')?$this->input->post('footer_menu'):0;
                $data['quick_link']=$this->input->post('quick_link')?$this->input->post('quick_link'):0;
                $data['publish']=$this->input->post('publish')?$this->input->post('publish'):0;
                $data['view_file_name']=$this->input->post('view_file_name')?$this->input->post('view_file_name'):1;

                $item_moved = false;
                $group_id = $this->input->post('group_id');

                if ($group_id) {
                    $group_id = $this->input->post('group_id');
                    $old_group_id = $this->input->post('old_group_id');

                    //if group changed
                    if ($group_id != $old_group_id) {
                        $data['group_id'] = $group_id;
                        $data['position'] = $this->manager->get_last_position($group_id);
                        $item_moved = true;
                    }
                }

                 

               
                if ($this->db->update('menu', $data, 'id' . ' = ' . $data['id'])) {

                     $params=array(
                      'url_slug'=>$this->input->post('url'),
                      'url'=>$this->input->post('url'),
                     );
                  

                   // $this->db->update('page_master', $params, 'parent_id' . ' = ' . $data['id']);

                    if ($item_moved) {
                        //move sub items
                        $ids = $this->manager->get_descendants($data['id']);
                        if (!empty($ids)) {
                            $sql = sprintf('UPDATE %s SET %s = %s WHERE %s IN (%s)', 'menu', 'group_id', $group_id, 'id', $ids);
                            $update_sub = $this->db->Execute($sql);
                        }
                        

                       
                    } else {
                      
                        $d['title'] = $data['title'];
                        $d['url'] = $data['url'];
                        $response['menu'] = $d;
                        $this->session->set_flashdata('msg','<div class="alert alert-success mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Success!  </strong> </div>');  
                          redirect(base_url().'admin/menu/');
                    }
                } else {
                    $response['status'] = 2;
                    $response['msg'] = 'Edit menu item error.';
                     $this->session->set_flashdata('msg','<div class="alert alert-danger mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Error!  </strong>Edit menu item error</div>');  
                          redirect(base_url().'setup-menu/'.$id);



                }
            } 
            else {
                $response['status'] = 3;
                $this->session->set_flashdata('msg','<div class="alert alert-danger mb-4" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Failed!  </strong> Page Title is Required</div>');  
                          redirect(base_url().'setup-menu/'.$id);

            }
            // header('Content-type: application/json');
            // echo json_encode($response);
        }

   } 
   else
   {

        
        $data['row'] = $this->manager->get_row($id,$this->data['tbl_menu']);
        $data['menu_groups'] = $this->manager->get_menu_groups($this->data['tbl_menu_group']);
        $data['_view'] = 'admin/menus/menu_edit_new';
        $this->load->view('admin/layouts/main',$data);
   } 


}

    /**
     * Show menu pages
     */
    public function menu($group_id)
    {
        $menu = $this->manager->get_menu($group_id,$this->data['tbl_menu']);
//        echo "<pre>".print_r($menu,true);die();
        $data['menu_ul'] = '<ul id="easymm"></ul>';
        if ($menu) {
            foreach ($menu as $row) {
                $this->add_row(
                    $row->id, $row->parent_id, ' id="menu-' . $row->id . '" class="sortable"', $this->get_label($row)
                );
            }

            $data['menu_ul'] = $this->generate_list('id="easymm"');
        }
        $data['group_id'] = $group_id;
        $data['group_title'] = $this->manager->get_menu_group_title($group_id,$this->data['tbl_menu_group']);
        $data['menu_groups'] = $this->manager->get_menu_groups($this->data['tbl_menu_group']);
        //$this->load->view('menu', $data);
        $data['_view'] = 'admin/menus/menu';
      $this->load->view('admin/layouts/main',$data);
    }

    /**
     * Generates nested lists
     *
     * @param string $ul_attr
     * @return string
     */
    function generate_list($ul_attr = '')
    {
        return $this->ul(0, $ul_attr);
    }

    /**
     * Recursive method for generating nested lists
     *
     * @param int $parent
     * @param string $attr
     * @return string
     */
    function ul($parent = 0, $attr = '')
    {
        static $i = 1;
        $indent = str_repeat("\t\t", $i);
        if (isset($this->data[$parent])) {
            if ($attr) {
                $attr = ' ' . $attr;
            }
            $html = "\n$indent";
            $html .= "<ul$attr>";
            $i++;
            foreach ($this->data[$parent] as $row) {
                $child = $this->ul($row['id']);
                $html .= "\n\t$indent";
                $html .= '<li' . $row['li_attr'] . '>';
                $html .= $row['label'];
                if ($child) {
                    $i--;
                    $html .= $child;
                    $html .= "\n\t$indent";
                }
                $html .= '</li>';
            }
            $html .= "\n$indent</ul>";
            return $html;
        } else {
            return false;
        }
    }

    function add_row($id, $parent, $li_attr, $label)
    {
        $this->data[$parent][] = array('id' => $id, 'li_attr' => $li_attr, 'label' => $label);
    }

    /**
     * Add menu item action
     * For use with ajax
     * Return json data
     */
    public function add()
    {
        $title = $this->input->post('title');
        if ($title) {
            $data['title'] = $this->input->post('title');
            if(!empty($data['title'])) {
            $data['url'] = $this->input->post('url');
//                $data['class'] = $this->input->post('class');
    $data['group_id'] = $this->input->post('group_id');
    $data['meta_title']=$this->input->post('meta_title');
    $data['meta_description']=$this->input->post('meta_description');
    $data['meta_keywords']=$this->input->post('meta_keywords');
    $data['tab_status']=$this->input->post('tab_status')?$this->input->post('tab_status'):0;
    $data['page_type']=$this->input->post('page_type')?$this->input->post('page_type'):0;
    $data['header_menu']=$this->input->post('header_menu')?$this->input->post('header_menu'):0;
    $data['footer_menu']=$this->input->post('footer_menu')?$this->input->post('footer_menu'):0;
    $data['quick_link']=$this->input->post('quick_link')?$this->input->post('quick_link'):0;
    $data['publish']=$this->input->post('publish')?$this->input->post('publish'):1;
    $data['view_file_name']=$this->input->post('view_file_name')?$this->input->post('view_file_name'):'';
    //$data['whatsapp_message']=$this->input->post('whatsapp_message')?$this->input->post('whatsapp_message'):'';
    $data['link']=$this->input->post('link')?$this->input->post('link'):'';
    $data['product_filter']=$this->input->post('product_filter')?$this->input->post('product_filter'):0;
    $data['external_url']=$this->input->post('external_url')?$this->input->post('external_url'):'';

                if ($this->db->insert($this->data['tbl_menu'],$data)) {
                    $mid=$this->db->Insert_ID();
                    if(!empty($mid)){
                      $params=array(
                      'parent_id'=>$mid,
                      'url_slug'=>$this->input->post('url'),
                      'url'=>$this->input->post('url'),
                      );
                      $this->db->insert($this->data['tbl_page_master'],$params);  
                    }
                    $data['id'] = $this->db->Insert_ID();

                    $response['status'] = 1;
                    $li_id = 'menu-' . $data['id'];
                    $response['li'] = '<li id="' . $li_id . '" class="sortable">' . $this->get_labels($data) . '</li>';
                    $response['li_id'] = $li_id;
                } else {
                    $response['status'] = 2;
                    $response['msg'] = 'Add menu error.';
                }
            } else {
                $response['status'] = 3;
            }
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }

    public function edit($id)
    {
        $data['row'] = $this->manager->get_row($id,$this->data['tbl_menu']);
        $data['menu_groups'] = $this->manager->get_menu_groups($this->data['tbl_menu_group']);
        $this->load->view('admin/menus/menu_edit', $data);

        // $data['_view'] = 'admin/menus/menu_edit';
        // $this->load->view('admin/layouts/main',$data);
    }

    public function save()
    {
        $title = $this->input->post('title');
        if ($title) {
            $data['title'] = trim($_POST['title']);
            if (!empty($data['title'])) {
                $data['id'] = $this->input->post('menu_id');
                $data['url'] = $this->input->post('url');
//                $data['class'] = $this->input->post('class');

    $data['meta_title']=$this->input->post('meta_title');
    $data['meta_description']=$this->input->post('meta_description');
    $data['meta_keywords']=$this->input->post('meta_keywords');
    $data['tab_status']=$this->input->post('tab_status')?$this->input->post('tab_status'):0;
    $data['page_type']=$this->input->post('page_type')?$this->input->post('page_type'):0;
    $data['header_menu']=$this->input->post('header_menu')?$this->input->post('header_menu'):0;
    $data['footer_menu']=$this->input->post('footer_menu')?$this->input->post('footer_menu'):0;
    $data['quick_link']=$this->input->post('quick_link')?$this->input->post('quick_link'):0;
    $data['publish']=$this->input->post('publish')?$this->input->post('publish'):0;
    $data['view_file_name']=$this->input->post('view_file_name')?$this->input->post('view_file_name'):0;
    //$data['whatsapp_message']=$this->input->post('whatsapp_message')?$this->input->post('whatsapp_message'):'';
     $data['link']=$this->input->post('link')?$this->input->post('link'):'';
    $data['product_filter']=$this->input->post('product_filter')?$this->input->post('product_filter'):0;
    $data['external_url']=$this->input->post('external_url')?$this->input->post('external_url'):'';
                $item_moved = false;
                $group_id = $this->input->post('group_id');
                if ($group_id) {
                    $group_id = $this->input->post('group_id');
                    $old_group_id = $this->input->post('old_group_id');

                    //if group changed
                    if ($group_id != $old_group_id) {
                        $data['group_id'] = $group_id;
                        $data['position'] = $this->manager->get_last_position($group_id,$this->data['tbl_menu']);
                        $item_moved = true;
                    }
                }

                if ($this->db->update('menu', $data, 'id' . ' = ' . $data['id'])) {
                     
                     $params=array(
                      'url_slug'=>$this->input->post('url'),
                      'url'=>$this->input->post('url'),
                     );
                  
                    $this->db->update($this->data['tbl_page_master'], $params, 'parent_id' . ' = ' . $data['id']);

                    if ($item_moved) {
                        //move sub items
                        $ids = $this->manager->get_descendants($data['id'],$this->data['tbl_menu']);
                        if (!empty($ids)) {
                            $sql = sprintf('UPDATE %s SET %s = %s WHERE %s IN (%s)', 'menu', 'group_id', $group_id, 'id', $ids);
                            $update_sub = $this->db->Execute($sql);
                        }
                        $response['status'] = 4;
                    } else {
                        $response['status'] = 1;
                        $d['title'] = $data['title'];
                        $d['url'] = $data['url'];
//                        $d['klass'] = $data['class']; //klass instead of class because of an error in js
                        $response['menu'] = $d;
                    }
                } else {
                    $response['status'] = 2;
                    $response['msg'] = 'Edit menu item error.';
                }
            } else {
                $response['status'] = 3;
            }
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }


    public function delete()
    {
        $id = $this->input->post('id');
        if($id){
            $this->manager->get_descendants($id,$this->data['tbl_menu']);
            if(!empty($this->ids)){
                $ids = implode(', ', $this->ids);
                $id = "$id, $ids";
            }


            $res = $this->manager->delete_menu($id,$this->data['tbl_menu']);
            if($res){
                 
                $response['success'] = true;
            } else {
                $response['success'] = false;
            }
            header('Content-type: application/json');
            echo json_encode($response);
        }
    }

    /**
     * new save position method
     */
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
                        $data['parent_id'] = $k;
                        $data['position'] = $i;
                        if ($this->db->update($this->data['tbl_menu'], $data, 'id' . ' = ' . $v2)) {
                            $success++;
                        }
                        $i++;
                    }
                }
            }
        }
    }

    public function old_save_position()
    {
        if (isset($_POST['easymm'])) {
            $easymm = $_POST['easymm'];
            $this->update_position(0, $easymm);
        }
    }

    private function update_position($parent, $children)
    {
        $i = 1;
        foreach ($children as $k => $v) {
            $id = (int)$children[$k]['id'];
            $data[MENU_PARENT] = $parent;
            $data[MENU_POSITION] = $i;
            $this->db->update(MENU_TABLE, $data, MENU_ID . ' = ' . $id);
            if (isset($children[$k]['children'][0])) {
                $this->update_position($id, $children[$k]['children']);
            }
            $i++;
        }
    }

    /**
     * Get label for list item in menu manager
     * this is the content inside each <li>
     *
     * @param array $row
     * @return string
     */
    private function get_label($row)
    {
        


        $label = '<div class="ns-row">' .
            '<div class="ns-title">' . $row->title . '</div>' .
            '<div class="ns-url">' . $row->url . '</div>' .
            '<div class="actions">' .
           '<a href="'.base_url().'setup-menu/'.$row->id.'" class="" title="Edit">' .
            '<i data-toggle="tooltip" data-placement="top" title="Page Manage" class="far fa-edit" style="color: #444"></i>' .
            '</a>' .

            // '<a href="#" class="edit-menu" title="Edit">' .
            // '<i data-toggle="tooltip" data-placement="top" title="SEO Manage" class="far fa-edit" style="color: #444"></i>' .
            // '</a>' .
            '<a href="#" class="delete-menu" title="Delete">' .
            '<i class="far fa-trash-alt" style="color: red"></i>' .
            '</a>' .
            '<input type="hidden" name="menu_id" value="' . $row->id . '">' .
            '</div>' .
            '</div>';
        return $label;
    }

    private function get_labels($row)
    {
        
     

        $label = '<div class="ns-row">' .
            '<div class="ns-title">' . $row['title'] . '</div>' .
            '<div class="ns-url">' . $row['url'] . '</div>' .
            '<div class="actions">' .
           '<a href="'.base_url().'setup-menu/'.$row['id'].'" class="" title="Edit">' .
            '<i data-toggle="tooltip" data-placement="top" title="Page Manage" class="far fa-edit" style="color: #444"></i>' .
            '</a>' .

            // '<a href="#" class="edit-menu" title="Edit">' .
            // '<i data-toggle="tooltip" data-placement="top" title="SEO Manage" class="far fa-edit" style="color: #444"></i>' .
            // '</a>' .
            '<a href="#" class="delete-menu" title="Delete">' .
            '<i class="far fa-trash-alt" style="color: red"></i>' .
            '</a>' .
            '<input type="hidden" name="menu_id" value="' . $row['id'] . '">' .
            '</div>' .
            '</div>';
        return $label;
    }

    public function sample()
    {
        $this->load->view('sample');
    }

    public function vertical_sample($category='')
    {
        $this->load->view('vertical_menu_sample');
    }

    public function test($category='')
    {
        // $this->load->view('test');
        $data['_view'] = 'admin/menus/test';
        $this->load->view('admin/layouts/main',$data);
    }
}
