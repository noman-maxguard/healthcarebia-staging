<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


class Settings extends CI_Controller {

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

        //Tables
        $this->table_settings = 'settings';

        $this->controller = 'settings';


		$this->pages_master = 'pages_master';
		$this->pages_master_contents = 'pages_master_contents';

		$this->pages_home_page = 'pages_home_page';
		$this->pages_home_page_gallery = 'pages_home_page_gallery';

		$this->pages_about_us = 'pages_about_us';

		$this->enquiries_popup = 'enquiries_popup';

		$this->pages_service_details_common_content = 'pages_service_details_common_content';


    }






	public function index()
     {
         $data['userdata'] = $this->session->all_userdata();


            $data['page'] = 'settings';

         $data['f_error'] = $data['ff_error'] = '';

         $table = $this->table_settings;
         $data['settings']=$this->MDL_Settings->getData($table);
        
         $this->load->view('admin/settings',$data);
         
         
     }
	public function update_settings(){
		$data['userdata'] = $this->session->all_userdata();

		$table = $this->table_settings;
		$g_settings = $this->MDL_Settings->getData($table);
		$user_id = $data['userdata']['user_id'];

		$file_name_db = $file_name_db1 = '';
		$e_flag = 0;


		//Image upload
		//Main Logo
		$logo_res = array(0,'');
		$index = 'logo';
		if (!empty($_FILES[$index]['name']))
		{
			$path = './uploads/images/';
			$extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
			$max_size = 1048576000;
			$logo_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

		}
		$logo_flag = $logo_res[0];
		$logo = $logo_res[1];

		if($logo_flag == 0)
		{
			$hidden_flag = $this->input->post('hidden_'.$index);
			if($hidden_flag == 1)
			{
				$logo_flag = 1;
				$logo = '';
			}
		}
		//Main Logo



        /*

        //logoFooter Logo
        $logoFooter_res = array(0,'');
        $index = 'logoFooter';
        if (!empty($_FILES[$index]['name']))
        {
            $path = './uploads/images/';
            $extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
            $max_size = 1048576000;
            $logoFooter_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

        }
        $logoFooter_flag = $logoFooter_res[0];
        $logoFooter = $logoFooter_res[1];

        if($logoFooter_flag == 0)
        {
            $hidden_flag = $this->input->post('hidden_'.$index);
            if($hidden_flag == 1)
            {
                $logoFooter_flag = 1;
                $logoFooter = '';
            }
        }
        //logoFooter Logo

         //logoSub Logo
        $logoSub_res = array(0,'');
        $index = 'logoSub';
        if (!empty($_FILES[$index]['name']))
        {
            $path = './uploads/images/';
            $extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
            $max_size = 1048576000;
            $logoSub_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

        }
        $logoSub_flag = $logoSub_res[0];
        $logoSub = $logoSub_res[1];

        if($logoSub_flag == 0)
        {
            $hidden_flag = $this->input->post('hidden_'.$index);
            if($hidden_flag == 1)
            {
                $logoSub_flag = 1;
                $logoSub = '';
            }
        }
        //logoSub Logo
         */











		//Image upload


		$ins_data=array(

			"company_name"=>$this->input->post('company_name'),
			//"logo_alt_text"=>$this->input->post('logo_alt_text'),

			//"email"=>$this->input->post('email'),
            //"email2"=>$this->input->post('email2'),

//            "email3_text"=>$this->input->post('email3_text'),
//            "email3"=>$this->input->post('email3'),
//            "email4_text"=>$this->input->post('email4_text'),
//            "email4"=>$this->input->post('email4'),
//            "email5_text"=>$this->input->post('email5_text'),
//            "email5"=>$this->input->post('email5'),

            //"phone"=>$this->input->post('phone'),
            //"mobile"=>$this->input->post('mobile'),
            //"fax"=>$this->input->post('fax'),

            //"address"=>$this->input->post('address'),
//			"address2"=>$this->input->post('address2'),
			//"google_map"=>$this->input->post('google_map'),
            //"google_map_iframe"=>$this->input->post('google_map_iframe'),



//            "website"=>$this->input->post('website'),
//			"facebook"=>$this->input->post('facebook'),
//			"twitter"=>$this->input->post('twitter'),
//            "instagram"=>$this->input->post('instagram'),
//			"linkedin"=>$this->input->post('linkedin'),

            //"instagram_script"=>$this->input->post('instagram_script'),

			//"youtube"=>$this->input->post('youtube'),
			"whatsapp"=>$this->input->post('whatsapp'),
            "whatsapp_msg"=>$this->input->post('whatsapp_msg'),


			"contact_us_email"=>$this->input->post('contact_us_email'),
            //"booking_email"=>$this->input->post('booking_email'),


			//"working_time"=>$this->input->post('working_time'),


			//"footer_text"=>$this->input->post('footer_text'),

			"script_header"=>$this->input->post('script_header'),
			"script_body"=>$this->input->post('script_body'),

		);

		if($logo_flag)
			$ins_data["logo"] = $logo;


		/*
        if($logoFooter_flag)
            $ins_data["logoFooter"] = $logoFooter;


        if($logoSub_flag)
            $ins_data["logoSub"] = $logoSub;
		*/





        $this->MDL_Settings->update_data($table,$ins_data);

		$this->session->set_flashdata('success','Settings Updated Successfully');
		redirect("admin/settings#stuff");


	}


    public function settings_email()
    {
        $data['userdata'] = $this->session->all_userdata();




        $data['page'] = 'settings_email';

        $table = $this->table_settings;
        $data['settings']=$this->MDL_Settings->getData($table);

        $this->load->view('admin/settings_email',$data);


    }
    public function update_settings_email(){
        $data['userdata'] = $this->session->all_userdata();


        $table = $this->table_settings;
        $g_settings = $this->MDL_Settings->getData($table);
        $user_id = $data['userdata']['user_id'];



        $ins_data=array(

            "email_smtp_flag"=>$this->input->post('email_smtp_flag'),

            "email_host"=>$this->input->post('email_host'),
            "email_name"=>$this->input->post('email_name'),
            "email_username"=>$this->input->post('email_username'),
            "email_password"=>$this->input->post('email_password'),
            "email_port"=>$this->input->post('email_port'),
            "email_ssl_flag"=>$this->input->post('email_ssl_flag'),

        );


        $this->MDL_Settings->update_data($table,$ins_data);

        $this->session->set_flashdata('success','Email Settings Updated Successfully');
        redirect("admin/email-settings#stuff");


    }


	public function pages()
	{
		$data['userdata'] = $this->session->all_userdata();

		$data['id'] = $id = $this->uri->segment(3);


        $data['page'] = 'pages_';
		if($id)
		{
			if(!is_numeric($id))
				redirect("admin/");

			$data['page'] = 'pages_'.$id;

			//$data['data_master'] = $pages_master = $this->MDL_Settings->getDataSingleByMasterId($this->pages_master,'id',$id);
			//if(empty($pages_master))
             //   redirect("admin/");


			//$data['page_name'] = !empty($pages_master->name)?$pages_master->name:'';

			$table = $this->pages_master_contents;
			$data['data']=$this->MDL_Settings->getDataSingleByMasterId($table,'id',$id);



		}

        $this->load->view('admin/pages_master',$data);


	}
	public function update_pages(){
		$data['userdata'] = $this->session->all_userdata();



		$file_name_db = $file_name_db2   = '';
		$e_flag = 0;

		$id = $this->input->post('id');


		/*

		//Image upload

        //$pageImage_res
        $pageImage_res = array(0,'');
        $index = 'pageImage';
        if (!empty($_FILES[$index]['name']))
        {
            $path = './uploads/pages/';
            $extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
            $max_size = 1048576000;
            $pageImage_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

        }
        $pageImage_flag = $pageImage_res[0];
        $pageImage = $pageImage_res[1];

        if($pageImage_flag == 0)
        {
            $hidden_flag = $this->input->post('hidden_'.$index);
            if($hidden_flag == 1)
            {
                $pageImage_flag = 1;
                $pageImage = '';
            }
        }
        //$pageImage_res


       //$block1Image_res
        $block1Image_res = array(0,'');
        $index = 'block1Image';
        if (!empty($_FILES[$index]['name']))
        {
            $path = './uploads/pages/';
            $extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
            $max_size = 1048576000;
            $block1Image_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

        }
        $block1Image_flag = $block1Image_res[0];
        $block1Image = $block1Image_res[1];

        if($block1Image_flag == 0)
        {
            $hidden_flag = $this->input->post('hidden_'.$index);
            if($hidden_flag == 1)
            {
                $block1Image_flag = 1;
                $block1Image = '';
            }
        }
        //$block1Image_res

        //$block2Image_res
        $block2Image_res = array(0,'');
        $index = 'block2Image';
        if (!empty($_FILES[$index]['name']))
        {
            $path = './uploads/pages/';
            $extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
            $max_size = 1048576000;
            $block2Image_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

        }
        $block2Image_flag = $block2Image_res[0];
        $block2Image = $block2Image_res[1];

        if($block2Image_flag == 0)
        {
            $hidden_flag = $this->input->post('hidden_'.$index);
            if($hidden_flag == 1)
            {
                $block2Image_flag = 1;
                $block2Image = '';
            }
        }
        //$block2Image_res


        //$block3Image_res
        $block3Image_res = array(0,'');
        $index = 'block3Image';
        if (!empty($_FILES[$index]['name']))
        {
            $path = './uploads/pages/';
            $extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
            $max_size = 1048576000;
            $block3Image_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

        }
        $block3Image_flag = $block3Image_res[0];
        $block3Image = $block3Image_res[1];

        if($block3Image_flag == 0)
        {
            $hidden_flag = $this->input->post('hidden_'.$index);
            if($hidden_flag == 1)
            {
                $block3Image_flag = 1;
                $block3Image = '';
            }
        }
        //$block3Image_res


		//Image upload


        */


		$ins_data=array(

			"name"=>$this->input->post('name'),
            "url"=>$this->input->post('url'),

            "view_file_name"=>$this->input->post('view_file_name'),


//            "menu_name"=>$this->input->post('menu_name'),
//            "short_name"=>$this->input->post('short_name'),
//            "page_title"=>$this->input->post('page_title'),
//
//            "block1_status"=>$this->input->post('block1_status'),
//            "block1_title"=>$this->input->post('block1_title'),
//            "block1_caption"=>$this->input->post('block1_caption'),
//            "block1_description"=>$this->input->post('block1_description'),
//            "block1Image_alt"=>$this->input->post('block1Image_alt'),
//
//            "block2_status"=>$this->input->post('block2_status'),
//            "block2_title"=>$this->input->post('block2_title'),
//            "block2_caption"=>$this->input->post('block2_caption'),
//            "block2_description"=>$this->input->post('block2_description'),
//            "block2Image_alt"=>$this->input->post('block2Image_alt'),
//
//            "block3_status"=>$this->input->post('block3_status'),
//            "block3_title"=>$this->input->post('block3_title'),
//            "block3_caption"=>$this->input->post('block3_caption'),
//            "block3_description"=>$this->input->post('block3_description'),
//            "block3Image_alt"=>$this->input->post('block3Image_alt'),
//
//            "link"=>$this->input->post('link'),


			"meta_title"=>$this->input->post('meta_title'),
			"meta_description"=>$this->input->post('meta_description'),
			"meta_keywords" => $this->input->post('meta_keywords'),


		);




//        if($pageImage_flag)
//            $ins_data["pageImage"] = $pageImage;
//
//        if($block1Image_flag)
//            $ins_data["block1Image"] = $block1Image;
//
//
//        if($block2Image_flag)
//            $ins_data["block2Image"] = $block2Image;
//
//        if($block3Image_flag)
//            $ins_data["block3Image"] = $block3Image;


        if($id)
        {

            $this->MDL_Settings->update_data_by_master_id($this->pages_master_contents,'id',$id,$ins_data);
            $this->session->set_flashdata('success', 'Content Updated Successfully');
        }
        else
        {


            //$ins_data["view_file_name"] = $this->input->post('url');




            $id = $this->MDL_Settings->insert_data($this->pages_master_contents,$ins_data);
            if($id)
            {

                $this->session->set_flashdata('success', 'Content Updated Successfully');
            }
            else
            {
                $this->session->set_flashdata('error', 'Action failed');
                redirect("admin/manage-pages");
            }


        }



			redirect("admin/manage-pages/".$id);



	}

    public function seo()
    {
        redirect('/admin');
        $data['userdata'] = $this->session->all_userdata();

        $data['id'] = $id = $this->uri->segment(3);



        if($id)
        {
            if(!is_numeric($id))
                redirect("admin/");

            $data['page'] = 'seo_'.$id;

            $data['data_master'] = $pages_master = $this->MDL_Settings->getDataSingleByMasterId($this->pages_master,'id',$id);

            $data['page_name'] = !empty($pages_master->name)?$pages_master->name:'';

            $table = $this->pages_master_contents;
            $data['data']=$this->MDL_Settings->getDataSingleByMasterId($table,'page_id',$id);

            $this->load->view('admin/pages_seo',$data);
        }
        else
            redirect("admin/");




    }
    public function update_seo(){
        redirect('/admin');
        $data['userdata'] = $this->session->all_userdata();



        $file_name_db = $file_name_db2   = '';
        $e_flag = 0;

        $id = $this->input->post('id');
        $page_id = $this->input->post('page_id');



        //Image upload


        $up_data=array(


            "meta_title"=>$this->input->post('meta_title'),
            "meta_description"=>$this->input->post('meta_description'),
            "meta_keywords" => $this->input->post('meta_keywords'),


        );

        if($page_id > 20 && $page_id <= 40)
        {
            $up_data['name'] = $this->input->post('name');
            $up_data['url'] = $this->input->post('url');
        }


        /*
         $data_master=array(
			"sort_order"=>$this->input->post('sort_order'),
			// "status"=>$this->input->post('status'),
		);
         */



        if($this->MDL_Settings->update_data_by_master_id($this->pages_master_contents,'page_id',$page_id,$up_data)){

            //$this->MDL_Settings->update_data_by_id($this->pages_master,$page_id,$data_master);
            // if($e_flag)
            //    $this->session->set_flashdata('error',$error);

            // else
            $this->session->set_flashdata('success','Content Updated Successfully');
            redirect("admin/manage-seo/".$page_id);
        }else{
            $this->session->set_flashdata('error','Action failed');
            redirect("admin/manage-seo/".$page_id);
        }




    }


	//Home	Page
	public function home_page()
	{
		$data['userdata'] = $this->session->all_userdata();
        $data['settings']=$this->MDL_Settings->getData($this->table_settings);


		$data['page'] = 'pages_home_page';


		$data['data']=$this->MDL_Settings->getData($this->pages_home_page);





        $this->load->view('admin/pages_home_page',$data);


	}

	public function update_home_page(){
		$data['userdata'] = $this->session->all_userdata();


		$post = $this->input->post();


		if (!empty($post)) {




		    //banner
            $image_res = array(0,'');
            $index = 'banner';
            if (!empty($_FILES[$index]['name']))
            {
                $path = './uploads/pages/';
                $extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
                $max_size = 1048576000;
                $image_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

            }
            $banner_flag = $image_res[0];
            $banner = $image_res[1];

            if($banner_flag == 0)
            {
                $hidden_flag = $this->input->post('hidden_'.$index);
                if($hidden_flag == 1)
                {
                    $banner_flag = 1;
                    $banner = '';
                }
            }
            //banner


            //headImage
            $image_res = array(0,'');
            $index = 'headImage';
            if (!empty($_FILES[$index]['name']))
            {
                $path = './uploads/pages/';
                $extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
                $max_size = 1048576000;
                $image_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

            }
            $headImage_flag = $image_res[0];
            $headImage = $image_res[1];

            if($headImage_flag == 0)
            {
                $hidden_flag = $this->input->post('hidden_'.$index);
                if($hidden_flag == 1)
                {
                    $headImage_flag = 1;
                    $headImage = '';
                }
            }
            //headImage



			//Save form data



			$up_data = array(


                "name"=>$this->input->post('name'),

                "banner_title"=>$this->input->post('banner_title'),
                "banner_description" => $this->input->post('banner_description'),

				"news_title" => $this->input->post('news_title'),
				"news_link" => $this->input->post('news_link'),

				"features_title1"=>$this->input->post('features_title1'),
				"features_title2"=>$this->input->post('features_title2'),
				"features_title3" => $this->input->post('features_title3'),

				"head_designation"=>$this->input->post('head_designation'),
                "head_name" => $this->input->post('head_name'),
                "head_description"=>$this->input->post('head_description'),

                "updates_title" => $this->input->post('updates_title'),

                "media_articles_title" => $this->input->post('media_articles_title'),

                "calendar_title" => $this->input->post('calendar_title'),
                "calendar_year"=>$this->input->post('calendar_year'),

                "popup_status"=>$this->input->post('popup_status'),

				"meta_title"=>$this->input->post('meta_title'),
				"meta_description"=>$this->input->post('meta_description'),
				"meta_keywords"=>$this->input->post('meta_keywords'),


			);


            if($banner_flag)
                $up_data["banner"] = $banner;

            if($headImage_flag)
                $up_data["headImage"] = $headImage;





            $id = 1;
			if($id)
            {
                $this->MDL_Settings->update_data_by_id($this->pages_home_page,$id,$up_data);
                $this->session->set_flashdata('success', "Content Updated Successfully");
                //$this->session->set_flashdata('error', "Sorry, Please try again");


                $settings_data_up = array(
                    "footer_description" => $this->input->post('footer_description'),
                );
                $this->MDL_Settings->update_data($this->table_settings,$settings_data_up);
            }


			//Save form data


			redirect('/admin/manage-home-page');


		}
		else
			redirect('/admin/home');

	}

    //ajax delete image
    public function home_page_delete_image()
    {

        $id = $this->input->post('id');

        $entry = $this->MDL_Settings->getDataById($this->pages_home_page_gallery,$id);

        if(!empty($entry))
        {
            $image = !empty($entry->image)?$entry->image:'';

            $del = $this->MDL_Settings->delete_data_by_id($this->pages_home_page_gallery,$id);

            if(!empty($del))
            {
                $output['flag'] = 1;

                if(!empty($image)){
                    if (file_exists('./uploads/pages/gallery/'.$image)) {
                        @unlink('./uploads/pages/gallery/'.$image);

                    }
                }
            }
            else
                $output['flag'] = 0;

        }
        else
            $output['flag'] = 0;




        echo json_encode($output);
        exit;

    }

    //sort_images
    public function home_page_sort_images()
    {

        $id = $this->input->post('id');
        $sort_order = $this->input->post('sort_order');
        $this->MDL_Settings->update_sort_order($this->pages_home_page_gallery,$id,$sort_order);

        $output['flag'] = 1;


        echo json_encode($output);
        exit;
    }

    //change_image_status
    public function home_page_change_image_status()
    {

        $id = $this->input->post('id');
        $imageStatus = $this->input->post('imageStatus');
        $this->MDL_Settings->update_status_image($this->pages_home_page_gallery,$id,$imageStatus);

        $output['flag'] = 1;


        echo json_encode($output);
        exit;
    }





    //About us	Page
    public function about_us()
    {
        $data['userdata'] = $this->session->all_userdata();

        $data['page'] = 'pages_about_us';


        $data['data']=$this->MDL_Settings->getData($this->pages_about_us);

        $this->load->view('admin/pages_about_us',$data);


    }

    public function update_about_us(){
        $data['userdata'] = $this->session->all_userdata();


        $post = $this->input->post();


        if (!empty($post)) {




            //banner
            $image_res = array(0,'');
            $index = 'banner';
            if (!empty($_FILES[$index]['name']))
            {
                $path = './uploads/pages/';
                $extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
                $max_size = 1048576000;
                $image_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

            }
            $banner_flag = $image_res[0];
            $banner = $image_res[1];

            if($banner_flag == 0)
            {
                $hidden_flag = $this->input->post('hidden_'.$index);
                if($hidden_flag == 1)
                {
                    $banner_flag = 1;
                    $banner = '';
                }
            }
            //banner




            //aboutImage1
            $image_res = array(0,'');
            $index = 'aboutImage1';
            if (!empty($_FILES[$index]['name']))
            {
                $path = './uploads/pages/';
                $extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
                $max_size = 1048576000;
                $image_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

            }
            $aboutImage1_flag = $image_res[0];
            $aboutImage1 = $image_res[1];

            if($aboutImage1_flag == 0)
            {
                $hidden_flag = $this->input->post('hidden_'.$index);
                if($hidden_flag == 1)
                {
                    $aboutImage1_flag = 1;
                    $aboutImage1 = '';
                }
            }
            //aboutImage1


            //aboutImage2
            $image_res = array(0,'');
            $index = 'aboutImage2';
            if (!empty($_FILES[$index]['name']))
            {
                $path = './uploads/pages/';
                $extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
                $max_size = 1048576000;
                $image_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

            }
            $aboutImage2_flag = $image_res[0];
            $aboutImage2 = $image_res[1];

            if($aboutImage2_flag == 0)
            {
                $hidden_flag = $this->input->post('hidden_'.$index);
                if($hidden_flag == 1)
                {
                    $aboutImage2_flag = 1;
                    $aboutImage2 = '';
                }
            }
            //aboutImage2


            //aboutImage3
            $image_res = array(0,'');
            $index = 'aboutImage3';
            if (!empty($_FILES[$index]['name']))
            {
                $path = './uploads/pages/';
                $extensions = 'bmp|gif|jpg|png|jpeg|JPEG|JPG|PNG|GIF|BMP';
                $max_size = 1048576000;
                $image_res =  $this->MDL_Settings->upload_file($index,$path,$extensions,$max_size);

            }
            $aboutImage3_flag = $image_res[0];
            $aboutImage3 = $image_res[1];

            if($aboutImage3_flag == 0)
            {
                $hidden_flag = $this->input->post('hidden_'.$index);
                if($hidden_flag == 1)
                {
                    $aboutImage3_flag = 1;
                    $aboutImage3 = '';
                }
            }
            //aboutImage3








            //Save form data



            $up_data = array(



                "name"=>$this->input->post('name'),


                "about_title1" => $this->input->post('about_title1'),
                "about_description1" => $this->input->post('about_description1'),

                "features1" => $this->input->post('features1'),
                "features2" => $this->input->post('features2'),
                "features3" => $this->input->post('features3'),

                "about_title2"=>$this->input->post('about_title2'),
                "about_description2" => $this->input->post('about_description2'),

                "about_title3" => $this->input->post('about_title3'),
                "about_description3" => $this->input->post('about_description3'),

                "box_title1" => $this->input->post('box_title1'),
                "box_features1"=>$this->input->post('box_features1'),
                "box_title2" => $this->input->post('box_title2'),
                "box_features2" => $this->input->post('box_features2'),

                "team_title" => $this->input->post('team_title'),


                "meta_title"=>$this->input->post('meta_title'),
                "meta_description"=>$this->input->post('meta_description'),
                "meta_keywords"=>$this->input->post('meta_keywords'),


            );

            if($banner_flag)
                $up_data["banner"] = $banner;

            if($aboutImage1_flag)
                $up_data["aboutImage1"] = $aboutImage1;

            if($aboutImage2_flag)
                $up_data["aboutImage2"] = $aboutImage2;

            if($aboutImage3_flag)
                $up_data["aboutImage3"] = $aboutImage3;








            $id = 1;
            if($id)
            {
                $this->MDL_Settings->update_data_by_id($this->pages_about_us,$id,$up_data);
                $this->session->set_flashdata('success', "Content Updated Successfully");
                //$this->session->set_flashdata('error', "Sorry, Please try again");
            }


            //Save form data


            redirect('/admin/manage-about-us');


        }
        else
            redirect('/admin/home');

    }


    //About us	Page
    public function common_contents()
    {
        $data['userdata'] = $this->session->all_userdata();

        $data['page'] = 'pages_common_contents';


        $data['data']=$this->MDL_Settings->getData($this->pages_home_page);

        $this->load->view('admin/pages_common_contents',$data);


    }

    public function update_common_contents(){
        $data['userdata'] = $this->session->all_userdata();


        $post = $this->input->post();

        $errors = '';


        if (!empty($post)) {



            $data_res = $this->MDL_Settings->getData($this->pages_home_page);

            //Download
            $delete_file = 0;
            $file_res = array(0, '','');
            $index = 'brochureFile';
            if (!empty($_FILES[$index]['name'])) {
                $path = './uploads/pages/files/';
                $extensions = 'bmp|gif|jpg|png|pdf|jpeg|JPEG|JPG|PNG|GIF|BMP|PDF';
                $max_size = 209715200;
                $file_res = $this->MDL_Settings->upload_file_max($index, $path, $extensions, $max_size);

            }
            $file_flag = $file_res[0];
            $file = $file_res[1];
            $errors = !empty($file_res[2])?$file_res[2]:$errors;

            $data_res_brochureFile = !empty($data_res->brochureFile)?$data_res->brochureFile:'';
            if($file_flag == 0)
            {
                $hidden_flag = $this->input->post('hidden_'.$index);
                if($hidden_flag == 1)
                {
                    $file_flag = 1;
                    $file = '';

                    $delete_file = 1;
                }
            }
            else
                $delete_file = 1;

            if($delete_file)
            {
                if($data_res_brochureFile){
                    if (file_exists('./uploads/pages/files/'.$data_res_brochureFile)) {
                        @unlink('./uploads/pages/files/'.$data_res_brochureFile);
                    }
                }
            }
            //Download


            //Save form data



            $up_data = array(

                "powered_status" => $this->input->post('powered_status'),
                "copyright_left"=>$this->input->post('copyright_left'),
                "copyright_right" => $this->input->post('copyright_right'),

            );



            if ($file_flag)
                $up_data["brochureFile"] = $file;


            $id = 1;
            if($id)
            {
                $this->MDL_Settings->update_data_by_id($this->pages_home_page,$id,$up_data);

                if(!empty($errors))
                {
                    $this->session->set_flashdata('error', $errors);
                }
                else
                {
                    $this->session->set_flashdata("success", "Content Updated Successfully");
                }


                //$this->session->set_flashdata('error', "Sorry, Please try again");
            }


            //Save form data


            redirect('/admin/manage-common-contents');


        }
        else
            redirect('/admin/home');

    }





    public function resize_image($image_data){
        $this->load->library('image_lib');
        $w = $image_data['image_width']; // original image's width
        $h = $image_data['image_height']; // original images's height

        $n_w = 360; // destination image's width
        $n_h = 240; // destination image's height

        $file_name = $image_data['file_name'];
        $source_ratio = $w / $h;
        $new_ratio = $n_w / $n_h;
        if($source_ratio != $new_ratio){

            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/services/'.$file_name;
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
            $this->image_lib->crop();
            $this->image_lib->clear();
        }
        $config['image_library'] = 'gd2';
        $config['source_image'] = './uploads/services/'.$file_name;
        $config['new_image'] = './uploads/services/resized/'.$file_name;
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



    public function get_area_by_location()
    {
        $data['userdata'] = $this->session->all_userdata();

        $location = $this->input->post('location');

        $output = array();
        $output['area'] = $this->MDL_Settings->get_area_by_location($location);

        echo json_encode($output);
        exit;

    }


    //Export enquiries to Excel

    public function exportToExcel()  //New Library phpspreadsheet
    {


        $data['userdata'] = $this->session->all_userdata();
        $settings = $this->MDL_Settings->getData($this->table_settings);
        $company_name = !empty($settings->company_name)?$settings->company_name:'';


        $enquiries = $this->MDL_Enquiries->get_data();


        if (PHP_SAPI == 'cli')
            die('This example should only be run from a Web Browser');







        /* Spreadsheet Init */
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        $sheet->setCellValue('A1', 'Sr. No.')
            ->setCellValue('B1', 'Enq. Date')
            ->setCellValue('C1', 'Name')
            ->setCellValue('D1', 'Email')
            ->setCellValue('E1', 'Phone')
            ->setCellValue('F1', 'Message')
            ->setCellValue('G1', 'Page URL');





        /* Excel Data */
        $row_number = 2;
        if(!empty($enquiries)) {
            foreach ($enquiries as $key => $row) {


                $sheet->setCellValue('A'.$row_number, $key+1)
                    ->setCellValue('B'.$row_number, $row->date)
                    ->setCellValue('C'.$row_number, $row->name)
                    ->setCellValue('D'.$row_number, $row->email)
                    ->setCellValue('E'.$row_number, $row->phone)
                    ->setCellValue('F'.$row_number, $row->message)
                    ->setCellValue('G'.$row_number, $row->url_from);



                $row_number++;
            }
        }

        $sheet->getStyle('A1:G1')->getFont()->setBold(true);





        /* Excel File Format */
        $writer = new Xlsx($spreadsheet);
        $filename = 'excel-report';

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$company_name.' - Enquiries.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');


        exit;

    }



    public function exportToExcel_app() //Old library phpExcel
    {


        $data['userdata'] = $this->session->all_userdata();
        $settings = $this->MDL_Settings->getData($this->table_settings);
        $company_name = !empty($settings->company_name)?$settings->company_name:'';


        $enquiries = $this->MDL_Enquiries_app->get_data();


        if (PHP_SAPI == 'cli')
            die('This example should only be run from a Web Browser');



// Create new PHPExcel object
        $this->load->library('PHPExcel');
        $objPHPExcel = new PHPExcel();

// Set document properties
        $objPHPExcel->getProperties()->setCreator($company_name)
            ->setLastModifiedBy($company_name)
            ->setTitle($company_name)
            ->setSubject($company_name)
            ->setDescription($company_name)
            ->setKeywords($company_name)
            ->setCategory($company_name);


        for($col = 'A'; $col !== 'T'; $col++) {
            $objPHPExcel->getActiveSheet()
                ->getColumnDimension($col)
                ->setAutoSize(true);
        }
// Add some data
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Sr. No.')
            ->setCellValue('B1', 'Enq. Date')
            ->setCellValue('C1', 'Name')
            ->setCellValue('D1', 'Email')
            ->setCellValue('E1', 'Phone')
            ->setCellValue('F1', 'Appointment Date')
            ->setCellValue('G1', 'Department')
            ->setCellValue('H1', 'Page URL');


        $i = 2;
        if(!empty($enquiries)) {
            foreach ($enquiries as $enquiries_one) {

                if(!empty($enquiries_one)) {

                    $appointment_date_str = date('d M Y',strtotime($enquiries_one->app_date));

                    $objPHPExcel->setActiveSheetIndex(0)
                        ->setCellValue('A'.$i, $i-1)
                        ->setCellValue('B'.$i, $enquiries_one->date)
                        ->setCellValue('C'.$i, $enquiries_one->name)
                        ->setCellValue('D'.$i, $enquiries_one->email)
                        ->setCellValue('E'.$i, $enquiries_one->phone)
                        ->setCellValue('F'.$i, $appointment_date_str)
                        ->setCellValue('G'.$i, $enquiries_one->department)
                        ->setCellValue('H'.$i, $enquiries_one->url_from);
                }


                $i++;
            }
        }



        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);


        // $objPHPExcel->getActiveSheet()->getStyle('Y'.$i)->getAlignment()->setWrapText(true);





// Rename worksheet
//$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client�s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$company_name.' - Appointments.xls"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        exit;
    }

    //Export enquiries to Excel





    public function check_url_edit()
    {
        $data['userdata'] = $this->session->all_userdata();


        $id = $this->input->post('id');
        $url = $this->input->post('url');

        $output = array();
        $output['flag'] = $this->MDL_Settings->check_url_edit($this->pages_master_contents,$id,$url);

        echo json_encode($output);
        exit;

    }


    public function create_slug()
    {
        $data['userdata'] = $this->session->all_userdata();



        $id = $this->input->post('id');
        $name = $this->input->post('name');


        if(!empty($name)) {
            $slug_title = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
            $slug_title = strtolower($slug_title);
            $slug_title = rtrim($slug_title, "-");
        }
        else
            $slug_title = '';

        if(is_numeric($slug_title))
            $slug_title = '';


        if($id)
            $exist_flag = $this->MDL_Settings->check_url_edit($this->pages_master_contents,$id,$slug_title);
        else
            $exist_flag = $this->MDL_Settings->check_url_new($this->pages_master_contents,$slug_title);

        if($exist_flag)
            $output['url_string'] = $slug_title.'-'.rand(10, 1000).rand(10, 1000);
        else
            $output['url_string'] = !empty($slug_title)?$slug_title:'u-'.rand(10, 1000).rand(10, 1000);


        echo json_encode($output);
    }
   
}
