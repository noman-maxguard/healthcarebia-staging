<?php
class MY_Controller extends CI_Controller
{

protected $permission = array();
protected $userSession;
public $data = array();
public $error = '';
public $success = '';
public function __construct()
{
			parent::__construct();
			$perm_data = array();
			$user_id = $this->session->userdata('user_id');
			$this->data['tbl_email_settings']='email_settings';
			$this->data['tbl_enquiries']='enquiries';
			$this->data['tbl_media']='media';
			$this->data['tbl_media_gallery']='media_gallery';
			$this->data['tbl_menu']='menu';
			$this->data['tbl_menu_group']='menu_group';
			$this->data['tbl_settings']='settings';
			$this->data['tbl_social_media']='social_media';
			$this->data['tbl_tbl_user']='tbl_user';
			$this->data['tbl_user_log']='user_log';
			$this->data['tbl_user_type']='user_type';
      $this->data['tbl_service']='service';
      $this->data['tbl_gallery']='gallery';
      $this->data['tbl_faqs']='faqs';

			$perm_data = $this->Common_model->getUserByUserId($user_id,$this->data['tbl_tbl_user']);
			$this->data['user_permission'] = @unserialize($perm_data['permission']);
			$this->data['permission'] = @unserialize($perm_data['permission']);
			$this->data['c_settings']=$this->Common_model->getcompany($this->data['tbl_settings']);
			$this->data['e_s']   =  $this->Common_model->emailsettings($this->data['tbl_email_settings']);
			$this->data['social']=  $this->Common_model->socialmedia($this->data['tbl_social_media']);
			$this->data['quick_link']=$this->Common_model->link_link($this->data['tbl_menu'],'quick_link');
            $this->data['footer_menu']=$this->Common_model->link_link($this->data['tbl_menu'],'footer_menu');
			$this->data['header_menu']=$this->Common_model->link_link($this->data['tbl_menu'],'header_menu');
			/////////////////////////////////////////////


			$this->data['admin_menu']=$this->Common_model->admin_menu($this->data['tbl_menu']);

			$last = $this->uri->total_segments();
			$page = $this->uri->segment($last)?$this->uri->segment($last):'home';
			if(!empty($common) && !empty($common->whatsapp_message))
	    {
	       $whatsappMessage=!empty($common->whatsapp_message)?$common->whatsapp_message:'';
	    }
	    else
	    {
	       $whatsappMessage = !empty($this->data['c_settings']->whatsapp_message)?$this->data['c_settings']->whatsapp_message:'';

	    }    
      header("X-Frame-Options: SAMEORIGIN");
      $whatsappPhonePlus = !empty($this->data['c_settings']->whatsapp_number)?$this->data['c_settings']->whatsapp_number:'';
      //$whatsappMessage = !empty($this->data['c_settings']->whatsapp_message)?$this->data['c_settings']->whatsapp_message:'';
      $whatsappPhone = str_replace('+','',$whatsappPhonePlus);
      $whatsappMessage = urlencode($whatsappMessage);
      $whatsappMessage = str_replace('+','%20',$whatsappMessage);
      $devicesmobile = array("iPhone", "Android", "webOS", "BlackBerry", "iPad", "iPod");
      // check if is a mobile
      $isMobile = false;
      foreach ($devicesmobile as $key => $device)
      {
          if (strpos($_SERVER['HTTP_USER_AGENT'],$device))
          {
              $isMobile = true;
              break;
          }
      }
      if ($isMobile)
      {

         $whatsappHref = "https://wa.me/$whatsappPhone/?text=$whatsappMessage";
      }
      else
      $whatsappHref = "https://web.whatsapp.com/send?phone=$whatsappPhonePlus&text=$whatsappMessage";      
      $this->data['whatsappHref']=$whatsappHref;

}




public function fileupload($filename,$dir)
{

if(!empty($filename) && !empty($dir))
{

}


}



private function handle_error($err)
{
  $this->error .= $err . "\r\n";
}

private function handle_success($succ)
{
  $this->success .= $succ . "\r\n";
}


protected function init_pagination($base_url, $total_rows,$page_record_limit = PAGE_RECORD_LIMIT)
{
			$this->load->library('pagination');
			$config = array();
			$config['base_url'] = $base_url;
			$config['page_query_string'] = true;
			$config['total_rows'] = $total_rows;
			$config['per_page'] = $page_record_limit;
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = false;
			$config['last_link'] = false;
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] ='<li class="prev">';
			$config['prev_tag_close'] ='</li>';
			$config['next_link'] ='&raquo';
			$config['next_tag_open'] ='<li>';
			$config['next_tag_close'] ='</li>';
			$config['last_tag_open'] ='<li>';
			$config['last_tag_close'] ='</li>';
			$config['cur_tag_open'] ='<li class="active"><a href="#">';
			$config['cur_tag_close'] ='</a></li>';
			$config['num_tag_open'] ='<li>';
			$config['num_tag_close'] ='</li>';
			$this->pagination->initialize($config);
			return $config;
}


protected function getQueryString($excludeParams=[])
{
			$getVals = $this->input->get();
			$string = [];
			foreach ($getVals as $keys => $vals){
			if($keys != 'per_page'){
			if(!in_array($keys, $excludeParams)){
			$string[] = $keys.'='.$vals;
			}
			}
			}
			return empty($string)?'':'?'.  implode('&', $string);
}

protected function load_view($data, $layout_file = 'admin/layouts/main')
{
    $this->load->view($layout_file, $data);
}

}


?>