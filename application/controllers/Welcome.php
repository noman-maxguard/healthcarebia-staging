<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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


        //per page limit
        $this->perPage = 15;

		//Tables
		$this->table_settings = 'settings';
		$this->user_log = 'user_log';
        $this->general_countries = 'general_countries';


		$this->pages_master_contents = 'pages_master_contents';

        $this->pages_home_page = 'pages_home_page';


        $this->careers = 'careers';
        $this->accreditations = 'accreditations';
        $this->album = 'album';
		$this->album_images = 'album_images';
        $this->features = 'features';
        $this->media = 'media';
        $this->media_articles = 'media_articles';
        $this->tours = 'tours';
        $this->updates = 'updates';
        $this->testimonials = 'testimonials';



        $this->url_services = 'services';
        $this->url_blog_listing = 'news';
        $this->url_blog_details = 'news';


    }


    //CI Instance functions

    //Common
    public function get_data_from_view($table,$id)
    {
        return $this->MDL_Settings->getDataById($table,$id);
    }

    public function get_data_from_view_by_master_id($table,$masterCol,$id)
    {
        return $this->MDL_Settings->getDataMultipleByMasterIdActive($table,$masterCol,$id);
    }

    public function get_data_from_view_by_master_id_sorted_limit($table,$masterCol,$id,$sorted,$order,$limit)
    {
        return $this->MDL_Settings->getDataMultipleByMasterIdSortedLimit($table,$masterCol,$id,$sorted,$order,$limit);
    }


    public function get_all_images($id)
    {
        $res = $this->MDL_Gallery->get_images($id);

        return $res;
    }


    //CI Instance functions



    public function index()
    {
        $url1 = $this->uri->segment(1);
        if($url1 == 'home')
            redirect('/');

		//Common
		$data['settings']=$this->MDL_Settings->getsettingsData();
      //  $data['accreditations']=$this->MDL_Settings->getDataMultipleActiveNotArchiveSorted($this->accreditations,'sort_order','ASC');
        //Common


        $data['upload_folder'] = 'pages';
        $data['page'] = 'index';

        $data['commonData'] = $data['data'] = $pageData = $this->MDL_Home->check_full_url_pages($this->pages_master_contents,'home');


//        $data['features']=$this->MDL_Settings->getDataMultipleActiveNotArchiveSorted($this->features,'sort_order','ASC');
//        $data['updates']=$this->MDL_Settings->getDataMultipleActiveNotArchiveSorted($this->updates,'sort_order','ASC');
//        $data['media_articles']=$this->MDL_Settings->getDataMultipleActiveNotArchiveSorted($this->media_articles,'sort_order','ASC');


        $this->load->view('index',$data);
    }


    //pages details
    public function pages_details()
    {

        //Common
        $data['settings']=$this->MDL_Settings->getsettingsData();
     //   $data['accreditations']=$this->MDL_Settings->getDataMultipleActiveNotArchiveSorted($this->accreditations,'sort_order','ASC');
        //Common


        $url1 = $this->uri->segment(1);

        if(!empty($url1))
        {
            if($url1 == 'home')
                redirect('/');


            $data['commonData'] = $data['data'] = $pageData = $this->MDL_Home->check_full_url_pages($this->pages_master_contents,$url1);

            if(!empty($pageData))
            {

                $data['row_id'] = $data['page_id'] = $row_id = !empty($pageData->id)?$pageData->id:0;
                $view_file_name = !empty($pageData->view_file_name)?$pageData->view_file_name:'';
                $data['page'] = !empty($pageData->url)?$pageData->url:'';
                $data['upload_folder'] = 'pages';

                switch ($row_id)
                {
//                    case 10:
//
//                        $data['albums'] = $this->MDL_Gallery->get_album_active();
//
//                        break;

//                    case 2:
//                        $data['homeData'] = $this->MDL_Settings->getDataById($this->pages_home_page,1);
//                        break;
//
//                    case 22:
//                        $data['features']=$this->MDL_Settings->getDataMultipleActiveNotArchiveSorted($this->features,'sort_order','ASC');
//                        break;
//
//                    case 23:
//                        $data['tours']=$this->MDL_Settings->getDataMultipleActiveNotArchiveSorted($this->tours,'sort_order','ASC');
//                        break;
//
//                    case 25:
//                        $data['careers']=$this->MDL_Settings->getDataMultipleActiveNotArchiveSorted($this->careers,'sort_order','ASC');
//                        break;

                }

                $this->load->view($view_file_name, $data);


            }
            else
                redirect('error-404');
        }
        else
            redirect('error-404');


    }


    public function error_404()
    {
        redirect('error-404');

    }

    //Captcha

    public function mycaptcha_contact()
    {
        $form_name = $this->uri->segment(2);
        $data['session_index'] = 'mycaptcha_'.$form_name;

        $this->load->view('mycaptcha',$data);
    }
	
	
	

	



	
		
	

}


