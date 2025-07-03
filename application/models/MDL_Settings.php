<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MDL_Settings extends CI_Model {

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

    //Settings
    public function getsettingsData(){
        $query=$this->db->get('settings');
        $result=$query->row();
        return $result;
    }


    //Common
    //get
    public function getData($table){

        

         $query=$this->db->get($table);
        $result=$query->row();
        return $result;
    }

    public function getDataMultiple($table){

        

        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }

    public function getDataMultipleName($table){


        $this->db->order_by('name','ASC');
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }

    public function getDataMultipleDesc($table){

        


        $this->db->order_by('id','DESC');
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataMultipleAscActive($table){

        $this->db->where('status',1);
        $this->db->order_by('id','ASC');
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataMultipleDescActive($table){

        $this->db->where('status',1);
        $this->db->order_by('id','DESC');
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }

    public function getDataSingleByMasterId($table,$masterCol,$id){

        $this->db->where($masterCol,$id);
        $query=$this->db->get($table);
        $result=$query->row();
        return $result;
    }

    public function getDataMultipleByMasterId($table,$masterCol,$id){

        $this->db->where($masterCol,$id);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataMultipleByMasterIdActive($table,$masterCol,$id){

        $this->db->where($masterCol,$id);
        $this->db->where('status',1);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }

    public function getDataMultipleByMasterIdSortedLimit($table,$masterCol,$id,$sorted,$order,$limit){

        $this->db->order_by($sorted,$order);
        $this->db->where($masterCol,$id);
        $this->db->limit($limit);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }

    public function getDataMultipleByMasterIdSorted($table,$masterCol,$id,$sorted,$order){

        $this->db->order_by($sorted,$order);
        $this->db->where($masterCol,$id);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }



    public function getDataMultipleSorted($table,$order)
    {

        $this->db->order_by($order,'ASC');
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }

    public function getDataMultipleActiveSorted($table,$order)
    {
        $this->db->where('status',1);
        $this->db->order_by($order,'ASC');
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataMultipleActiveSortedAndLimit($table,$orderCol,$orderVal,$limit)
    {
        $this->db->where('status',1);
        $this->db->order_by($orderCol,$orderVal);
        $this->db->limit($limit);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataMultipleByMasterIdActiveNotArchiveCustom($table,$masterCol,$id){
        $this->db->where('item_status',1);
        $this->db->where('item_archive',0);
        $this->db->where($masterCol,$id);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataMultipleActiveSortedNotId($table,$order,$id)
    {
        $this->db->where('id !=',$id);
        $this->db->where('status',1);
        $this->db->order_by($order,'ASC');
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataMultipleActiveSortedLimit($table,$order,$limit)
    {
        $this->db->where('status',1);
        $this->db->order_by($order,'ASC');
        $this->db->limit($limit);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }

    public function getDataMultipleActiveSortedOutLimit($table,$order,$order_type,$limit)
    {
        $this->db->where('status',1);
        $this->db->order_by($order,$order_type);
        $this->db->limit($limit);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataMultipleActiveSortedOutLimitNotId($table,$id,$order,$order_type,$limit)
    {
        $this->db->where('status',1);
        $this->db->where('id !=',$id);
        $this->db->order_by($order,$order_type);
        $this->db->limit($limit);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }




    public function getDataById($table,$id){

        $this->db->where('id',$id);
        $query=$this->db->get($table);
        $result=$query->row();

        return $result;
    }

    public function getDataByIdActive($table,$id){

        $this->db->where('status',1);
        $this->db->where('id',$id);
        $query=$this->db->get($table);
        $result=$query->row();
        return $result;
    }

    //get_master_data
    public function get_master_data($table)
    {

        


        $this->db->order_by('id','DESC');
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    //insert
    function insert_data($table,$data)
    {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    function insert_multiple($table,$id,$data,$col1,$col2)
    {

        if(!empty($data))
        {

            foreach($data as $one)
            {
                $this->db->insert($table, array($col1=>$id, $col2=>$one));

            }
            return 1;
        }

        return 0;
    }


    function insert_multiple_array($table,$data)
    {

        if(!empty($data))
        {

            foreach($data as $one)
            {
                $this->db->insert($table, $one);

            }
            return 1;
        }

        return 0;
    }

    function insert_multiple_3($table,$id,$data,$col1,$col2,$col3,$val3)
    {

        if(!empty($data))
        {

            foreach($data as $one)
            {
                $this->db->insert($table, array($col1=>$id, $col2=>$one, $col3=>$val3));

            }
            return 1;
        }

        return 0;
    }

    function insert_multiple_after_delete($table,$id,$data,$col1,$col2)
    {
        $this->db->where($col1, $id);
        $del = $this->db->delete($table);

        if(!empty($data))
        {

            foreach($data as $one)
            {
                $this->db->insert($table, array($col1=>$id, $col2=>$one));

            }
            return 1;
        }

        return 0;
    }

    function changeDate($date,$format)
    {
        $old_date_timestamp = strtotime($date);
        $new_date = date($format, $old_date_timestamp);
        return $new_date;
    }


    //update
    public function update_data($table,$data){
         $this->db->where('id',1);
        $this->db->update($table,$data);
        return true;
    }

    public function update_data_by_id($table,$id,$data){
        $this->db->where('id',$id);
        $this->db->update($table,$data);
        return true;
    }


	public function update_data_by_master_id($table,$col,$val,$data){
		$this->db->where($col, $val);
		$this->db->update($table,$data);
		return true;
	}


	public function getDataMultipleActiveSortedHeader($table)
	{
		$this->db->where('status',1);
		$this->db->where('archive',0);
		$this->db->where('parent_id',0);
		$this->db->order_by('sort_order','ASC');
		$query=$this->db->get($table);
		$result=$query->result();
		return $result;
	}


	public function getDataMultipleActiveSortedFooter($table)
	{
		$this->db->where('status',1);
		$this->db->where('archive',0);
		$this->db->where('parent_id',0);
		$this->db->where('show_on_footer',1);
		$this->db->order_by('sort_order','ASC');
		$query=$this->db->get($table);
		$result=$query->result();
		return $result;
	}

	public function getDataMultipleActiveSortedHome($table)
	{
		$this->db->where('status',1);
		$this->db->where('archive',0);
		$this->db->where('parent_id',0);
		$this->db->where('show_on_home_page',1);
		$this->db->order_by('sort_order','ASC');
		$query=$this->db->get($table);
		$result=$query->result();
		return $result;
	}


	public function getDataMultipleActiveSortedSub($table,$parent_id)
	{
		$this->db->where('status',1);
		$this->db->where('archive',0);
		$this->db->where('parent_id',$parent_id);
		$this->db->order_by('sort_order','ASC');
		$query=$this->db->get($table);
		$result=$query->result();
		return $result;
	}


	public function getDataMultipleActiveNotArchiveSorted($table,$orderField,$orderVal)
	{
		$this->db->where('status',1);
		$this->db->where('archive',0);
		$this->db->order_by($orderField,$orderVal);
		$query=$this->db->get($table);
		$result=$query->result();
		return $result;
	}

    public function getDataMultipleByMasterIdActiveNotArchiveSorted($table,$masterCol,$id,$field,$val){

        $this->db->where($masterCol,$id);
        $this->db->where('status',1);
        $this->db->where('archive',0);
        $this->db->order_by($field,$val);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataMultipleAlbum($table,$orderField,$orderVal)
    {

        $this->db->order_by($orderField,$orderVal);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataMultipleActiveNotArchiveSortedByMaster($table,$col,$val,$orderField,$orderVal)
    {
        $this->db->where('status',1);
        $this->db->where('archive',0);
        $this->db->where($col,$val);
        $this->db->order_by($orderField,$orderVal);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataServicesHome($table,$orderField,$orderVal,$limit)
    {
        $this->db->where('status',1);
        $this->db->where('archive',0);
        $this->db->where('show_on_home_page',1);
        $this->db->order_by($orderField,$orderVal);
        $this->db->limit($limit);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }

    public function getDataServicesAbout($table,$orderField,$orderVal,$limit)
    {
        $this->db->where('status',1);
        $this->db->where('archive',0);
        $this->db->where('show_on_about_us_page',1);
        $this->db->order_by($orderField,$orderVal);
        $this->db->limit($limit);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }

    public function getDataServicesTop($table,$orderField,$orderVal,$limit)
    {
        $this->db->where('status',1);
        $this->db->where('archive',0);
        $this->db->where('show_under_banner',1);
        $this->db->order_by($orderField,$orderVal);
        $this->db->limit($limit);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataServicesBottom($table,$orderField,$orderVal)
    {
        $this->db->where('status',1);
        $this->db->where('archive',0);
        $this->db->where('show_under_whatwedo',1);
        $this->db->order_by($orderField,$orderVal);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataMultipleActiveNotArchiveSortedLimit($table,$orderField,$orderVal,$limit)
    {
        $this->db->where('status',1);
        $this->db->where('archive',0);
        $this->db->order_by($orderField,$orderVal);
        $this->db->limit($limit);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }




    //delete
    function delete_data_by_id($table,$id)
    {
        $this->db->where('id', $id);
        $del = $this->db->delete($table);
        return $del;

    }

    function delete_data_by_master_id($table,$col,$val)
    {
        $this->db->where($col, $val);
        $del = $this->db->delete($table);
        return $del;
    }


    //Custom
    function delete_master_by_id($table,$id,$row_id)
    {
        if($id == 2 || $id == 3)
        {
            $this->db->select('*');
            $this->db->where('id',$row_id);
            $result =$this->db->get($table);
            $res = $result->row();
            $file = $res->image;

            if (file_exists('./uploads/master/'.$file)) {
                @unlink('./uploads/master/'.$file);
            }
            if (file_exists('./uploads/master/resized/'.$file)) {
                @unlink('./uploads/master/resized/'.$file);
            }

        }


        $this->db->where('id', $row_id);
        $del = $this->db->delete($table);
        return $del;

    }



    
    public function send_email_old($to,$subject,$message)
     {
                $img_tag = $image_path = "Logo";
                
                $getsettingsData = $this->getsettingsData();
                $logo = !empty($getsettingsData->logo)?$getsettingsData->logo:0;


                if($logo)
                {
                   $image_path = base_url().'uploads/images/'.$logo;
                   $img_tag = '<img src="'.$image_path.'" alt="'.SMTP_NAME.'">';
                }

                $templatedata=file_get_contents(base_url()."assets/images/template.html");

                $mbody=str_replace("{MESSAGE}",$message,$templatedata);
                $mbody1=str_replace("{IMAGE_PATH}",$img_tag,$mbody);


                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => SMTP_HOST,
                    'smtp_port' => SMTP_PORT,
                    'smtp_user' => SMTP_USER, // change it to yours
                    'smtp_pass' => SMTP_PASS, // change it to yours
                    'smtp_crypto' => 'SMTP_SSL',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE,

                );

                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from("forms@mmzholdings.com","Healthcarebia"); // change it to yours
                $this->email->to($to);// change it to yours
                $this->email->subject($subject);
                $this->email->message($mbody1);

                if(!empty($to)) {
                    if ($this->email->send()) {
                        
                       // print_r(111);exit;
                           return 1;
                    }
                    else {
                       // print_r($this->email->print_debugger());exit;
                        return -1;
                    }
                }

                return 0;

     }


    public function exec_curl_fn($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }




    //send_email
    public function send_email($to,$subject,$message)
    {
        //Settings
        $settings = $this->getsettingsData();
        $company_name = !empty($settings->company_name)?$settings->company_name:'';
        $email = !empty($settings->email)?$settings->email:'';

        $email_smtp_flag = !empty($settings->email_smtp_flag)?$settings->email_smtp_flag:0;

        $email_host = !empty($settings->email_host)?$settings->email_host:'';
        $email_name = !empty($settings->email_name)?$settings->email_name:'';
        $email_username = !empty($settings->email_username)?$settings->email_username:'';
        $email_password = !empty($settings->email_password)?$settings->email_password:'';
        $email_port = !empty($settings->email_port)?$settings->email_port:'25';
        $email_ssl = !empty($settings->email_ssl_flag)?'SMTP_SSL':'SMTP_TLS';
        //Settings


        $img_tag = $image_path = "";
        $logo = !empty($settings->logo)?$settings->logo:0;

         // if ($logo) {
        $image_path = base_url() . 'assets/frontend/img/logoEmail.png';
        $img_tag = '<img src="' . $image_path . '" alt="' . $company_name . '">';
        // }

        //$templatedata=file_get_contents(base_url()."assets/images/template.html");

        $templatedata = $this->exec_curl_fn(base_url()."assets/images/template.html");

        $mbody=str_replace("{MESSAGE}",$message,$templatedata);
        $mbody1=str_replace("{IMAGE_PATH}",$img_tag,$mbody);


        if(!empty($email_smtp_flag))
        {

            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => $email_host,
                'smtp_port' => $email_port,
                'smtp_user' => $email_username, // change it to yours
                'smtp_pass' => $email_password, // change it to yours
                'smtp_crypto' => $email_ssl,
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE,
            );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from("forms@mmzholdings.com","Healthcarebia"); // change it to yours
            $this->email->to($to);// change it to yours
            $this->email->subject($subject);
            $this->email->message($mbody1);

            if(!empty($to)) {
                if ($this->email->send()) {

                     //print_r(111);exit;
                    return 1;
                }
                else {
                    //print_r($this->email->print_debugger());exit;
                    return -1;
                }
            }
        }
        else
        {

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: ".$company_name." <".$email."> \r\n";

            $mail_flag = mail($to,$subject,$mbody1,$headers);
            if ($mail_flag)
                return 1;
            else
                return -1;

        }




        return 0;

    }


    public function upload_file($index,$path,$extensions,$max_size)
    {
        $flag_file = 0;
        $file_name_db = '';

        $file_name = $_FILES[$index]['name'];
        $new_file_name = preg_replace('/\s+/', '_', $file_name);
        $new_file_name_arr = explode(".", $new_file_name);
        $ext = end($new_file_name_arr); # extra () to prevent notice

        $new_name = 'file_'.rand(10,10000).'_'.rand(100,10000).'_'.rand(10,10000).'.'.$ext;


//        $path = $_FILES['image']['name'];
//        $ext = pathinfo($path, PATHINFO_EXTENSION);


        $config = array();
        $config['file_name'] =$new_name;
        $config['upload_path'] = $path;
        $config['allowed_types'] = '*';
        //$config['allowed_types'] = $extensions;
        //$config['allowed_types'] = 'gif|jpg|png|jpeg|doc|odt|pdf|rtf|tex|txt|wks|wpd|docx|wks|xls|xlsx|';
        //$config['max_size'] = 20971520;
        $config['max_size'] = $max_size;

        //$config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($index))
        {
            $error = $this->upload->display_errors();
            $flag_file = 0;

        }
        else
        {
            $image_data = $this->upload->data();
            $file_name_db = $image_data['file_name'];
           // $this->resize_image($image_data);
            $flag_file = 1;

        }

        $ret_data = array($flag_file,$file_name_db);
        return $ret_data;
    }


    public function upload_file_max($index,$path,$extensions,$max_size)
    {
        $flag_file = 0;
        $file_name_db = $error = '';

        $file_name = $_FILES[$index]['name'];
        $new_file_name = preg_replace('/\s+/', '_', $file_name);
        $new_file_name_arr = explode(".", $new_file_name);
        $ext = end($new_file_name_arr); # extra () to prevent notice

        $new_name = 'file_'.rand(10,10000).'_'.rand(100,10000).'_'.rand(10,10000).'.'.$ext;


//        $path = $_FILES['image']['name'];
//        $ext = pathinfo($path, PATHINFO_EXTENSION);


        $config = array();
        $config['file_name'] =$new_name;
        $config['upload_path'] = $path;
        //$config['allowed_types'] = '*';
        $config['allowed_types'] = $extensions;
        //$config['allowed_types'] = 'gif|jpg|png|jpeg|doc|odt|pdf|rtf|tex|txt|wks|wpd|docx|wks|xls|xlsx|';
        //$config['max_size'] = 20971520;
        $config['max_size'] = $max_size;

        //$config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload($index))
        {
            $error = $this->upload->display_errors();
            $flag_file = 0;

        }
        else
        {
            $image_data = $this->upload->data();
            $file_name_db = $image_data['file_name'];
            // $this->resize_image($image_data);
            $flag_file = 1;

        }

        $ret_data = array($flag_file,$file_name_db,$error);
        return $ret_data;
    }
    
    //Subscribe to Newsletter
    function subscribe($data)
    {
        $email = $data['email'];
        
        $this->db->select('*');
        $this->db->where('email',$email);
        $result =$this->db->get('subscriptions');
        $count = $result->num_rows();
        
        if($count == 0)
        {
            $this->db->insert('subscriptions', $data);
            $insert_id = $this->db->insert_id();
            return  $insert_id;
        }
        else         
          return  -1;
    }





    function get_booking()
    {
        $this->db->select('*');
        $this->db->where('type!=',3);
        $this->db->order_by('id','DESC');
        $result =$this->db->get('enquiries');
        $res = $result->result();
        return $res;
    }

    function get_enquiries()
    {
        $this->db->select('*');
        $this->db->where('type',3);
        $this->db->order_by('id','DESC');
        $result =$this->db->get('enquiries');
        $res = $result->result();
        return $res;
    }


    function delete_enquiry_by_id($id)
    {

        $this->db->where('id', $id);
        if($this->db->delete('enquiries'))
            return 1;
        else
            return 0;

    }


    function delete_enquiry_multiple($ids)
    {
        $err_flag = 0;
        foreach ($ids as $id) {

            $del = $this->db->query("delete from `enquiries` where id=" . $id);
            if(!$del)
                $err_flag = 1;
        }

        return $err_flag;
    }


    public function get_area_by_location($location)
    {
        $this->db->select('*');
        $this->db->where('emirate',$location);
        $this->db->order_by('id','ASC');
        $result =$this->db->get('general_area');
        $res = $result->result();
        return $res;
    }

    public function get_area_by_location_id($location)
    {
        $this->db->select('region');
        $this->db->where('id',$location);
        $result =$this->db->get('general_locations');
        $res = $result->row();
        $location_name = !empty($res->region)?$res->region:'';

        $this->db->select('*');
        $this->db->where('emirate',$location_name);
        $result1 =$this->db->get('general_area');
        $res1 = $result1->result();
        return $res1;
    }

    //Booking from Contact Us form
    function booking_insert($table,$data)
    {
        $this->db->insert($table, $data);
        $insert_id = $this->db->insert_id();
        //print_r($this->db->last_query());exit;
        return  $insert_id;
    }


    function get_next_id($table,$id)
    {
        $query = "select * from $table where id = (select min(id) from $table where id > $id)";
        $res = $this->db->query($query);
        $result = $res->row();
        $row_id = !empty($result->url)?$result->url:0;
        return $row_id;
    }

    function get_previous_id($table,$id)
    {
        $query = "select * from $table where id = (select max(id) from $table where id < $id)";
        $res = $this->db->query($query);
        $result = $res->row();
        $row_id = !empty($result->url)?$result->url:0;
        return $row_id;
    }


    public function get_user_ip()
    {
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }


    function get_seo_data()
    {
        $this->db->select('*');
        $result =$this->db->get('seo');
        $res = $result->result();
        return $res;
    }


    function multiple_upload_files($formal_count,$formal_input_name,$formal_expensions,$formal_file_size,$formal_file_path)
    {

        $files_result = '';
        $flag = 2;

        for($i=0;$i<$formal_count;$i++){

            if(!empty($_FILES[$formal_input_name]['name'][$i]))
            {


                $filename = $_FILES[$formal_input_name]['name'][$i];
                $file_size =$_FILES[$formal_input_name]['size'][$i];
                $file_tmp =$_FILES[$formal_input_name]['tmp_name'][$i];
                $file_type=$_FILES[$formal_input_name]['type'][$i];
                $exp_res = explode('.',$_FILES[$formal_input_name]['name'][$i]);
                $end_res = end($exp_res);
                $file_ext=strtolower($end_res);



                $errors = array();

                if(in_array($file_ext,$formal_expensions)=== false){
                    $errors[]="extension not allowed, please choose a valid file.<br>";
                }

                if($file_size > $formal_file_size){
                    $file_size_mb = $formal_file_size / 1000000;
                    $errors[]='File size must be less than '.$file_size_mb.' MB<br>';
                }



                if(empty($errors)==true){
                    move_uploaded_file($file_tmp,$formal_file_path.$filename);
                    $files_result .= $filename.'||--||--||';
                    $flag = 1;
                }else{
                    $flag = 0;
                }

                if($flag == 0)
                    break;
            }

        }

        $ret_data = array($flag,$files_result);

        return $ret_data;
    }

    public function multiple_upload_file($index,$path,$extensions,$max_size)
    {

        $file_names_db = array();
        $number_of_files_uploaded = count($_FILES[$index]['name']);

        for ($i = 0; $i < $number_of_files_uploaded; $i++)
        {
            $_FILES['userfile']['name']     = $_FILES[$index]['name'][$i];
            $_FILES['userfile']['type']     = $_FILES[$index]['type'][$i];
            $_FILES['userfile']['tmp_name'] = $_FILES[$index]['tmp_name'][$i];
            $_FILES['userfile']['error']    = $_FILES[$index]['error'][$i];
            $_FILES['userfile']['size']     = $_FILES[$index]['size'][$i];



            $file_name = $_FILES['userfile']['name'];

            $new_file_name = preg_replace('/\s+/', '_', $file_name);
            $new_file_name_arr = explode(".", $new_file_name);
            $ext = end($new_file_name_arr); # extra () to prevent notice

            $new_name = 'file_'.rand(10,10000).'_'.rand(100,10000).'_'.rand(10,10000).'.'.$ext;


            $config = array();
            $config['file_name'] =$new_name;
            $config['upload_path'] = $path;
            $config['allowed_types'] = '*';

            //$config['max_size'] = 20971520;
            $config['max_size'] = $max_size;

            //$config['encrypt_name'] = TRUE;


            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload())
            {
                $error = $this->upload->display_errors();
            }
            else
            {
                $image_data = $this->upload->data();
                $file_names_db[] = $image_data['file_name'];

            }

        }


        return $file_names_db;

    }


    function insert_multiple_single_page_with_sort_order($table,$data,$col,$colSort)
    {
        if(!empty($data))
        {

            $this->db->select_max($colSort);
            $query=$this->db->get($table);
            $result=$query->row();

            $max_sort_order = !empty($result->sort_order)?$result->sort_order:0;

            $i = $max_sort_order;
            foreach($data as $one)
            {
                $i++;
                $this->db->insert($table, array($col=>$one,$colSort=>$i));

            }
            return 1;
        }

        return 0;
    }

    function execute_sql($sql)
    {
        $ins_id = $this->db->query($sql);
        return $ins_id;
    }


    function check_url_new($table,$url)
    {
        $this->db->select('*');
        $this->db->where('url',$url);
        $result =$this->db->get($table);
        $count = $result->num_rows();

        return $count;
    }

    function check_url_edit($table,$id,$url)
    {
        $this->db->select('*');
        $this->db->where('url',$url);
        $this->db->where('id!=',$id);
        $result =$this->db->get($table);
        $count = $result->num_rows();

        return $count;
    }

	/// get_data_from_view($params)
	function get_data_from_view_by_a_column($params)
	{
		$return_data = array();
		if(!empty($params))
		{
			foreach ($params as $params_one)
			{
				$table = !empty($params_one['table'])?$params_one['table']:'';
				$column = !empty($params_one['column'])?$params_one['column']:'';
				$value = !empty($params_one['value'])?$params_one['value']:'';
				$res_array = !empty($params_one['res_array'])?$params_one['res_array']:'row';

				if(!empty($table) && !empty($column))
				{
					$this->db->select('*');
					$this->db->where($column,$value);
					$result =$this->db->get($table);

					if($res_array == 'row')
						$res = $result->row();
					else
						$res = $result->result();

					$return_data[] = $res;
				}
			}
		}
		return $return_data;
	}


	public function get_common_pages_active(){

		$this->db->where('archive',0);
		//$this->db->order_by('name','ASC');
        $this->db->order_by('name','ASC');
		$query=$this->db->get('pages_master');
		$result=$query->result();
		return $result;
	}

    public function get_common_pages_active2(){

        $this->db->where('archive',0);
        //$this->db->order_by('name','ASC');
        $this->db->order_by('sort_order','ASC');
        $query=$this->db->get('pages_master_contents');
        $result=$query->result();
        return $result;
    }

    public function get_common_pages_active3(){

        $this->db->where('archive',0);
        //$this->db->order_by('name','ASC');
        $this->db->order_by('sort_order','ASC');
        $this->db->order_by('name','ASC');
        $query=$this->db->get('pages_master_contents');
        $result=$query->result();
        return $result;
    }


    public function get_common_pages_contents_active(){

        //$this->db->order_by('name','ASC');
        $this->db->order_by('page_id','ASC');
        $query=$this->db->get('pages_master_contents');
        $result=$query->result();
        return $result;
    }


    public function get_common_pages_contents_active_single($id){

        //$this->db->order_by('name','ASC');
        $this->db->where('id',$id);
        $query=$this->db->get('pages_master_contents');
        $result=$query->row();
        return $result;
    }



    public function getDataMultipleActiveNotArchiveByMasterIdSortedDate($table,$masterCol,$id){

        $this->db->where('archive',0);
        $this->db->where('status',1);
        $this->db->order_by('date','ASC');
        $this->db->where($masterCol,$id);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }


    public function getDataGalleryImagesForService($album,$album_images,$service_id)
    {
        $this->db->select('*');
        $this->db->order_by('album_id','DESC');
        $this->db->order_by('sort_order','ASC');
        $this->db->where('`album_id` IN (SELECT `id` FROM `'.$album.'` WHERE `service_id` ="'.$service_id.'" order by `sort_order` ASC)', NULL, FALSE);
        $result1 =$this->db->get($album_images);
        $res = $result1->result();

        return $res;
    }


    public function get_next_sort_order($table,$col)
    {
        $this->db->select_max($col);
        $this->db->where('archive',0);
        $query=$this->db->get($table);
        $result=$query->row();

        $max_sort_order = !empty($result->sort_order)?$result->sort_order:0;

        $next_sort_order = $max_sort_order + 1;


        return $next_sort_order;
    }


    public function get_next_sort_order_custom($table,$col)
    {
        $this->db->select_max($col);
        $query=$this->db->get($table);
        $result=$query->row();

        $max_sort_order = !empty($result->sort_order)?$result->sort_order:0;

        $next_sort_order = $max_sort_order + 1;


        return $next_sort_order;
    }


    public function update_sort_order($table,$id,$sort_order)
    {
        $this->db->where('id',$id);
        $this->db->update($table,array('sort_order' => $sort_order));
        return true;
    }

    public function update_status_image($table,$id,$imageStatus)
    {
        $this->db->where('id',$id);
        $this->db->update($table,array('status' => $imageStatus));
        return true;
    }

    public function getDataMultipleSortedAdv($table,$order,$orderVal)
    {

        $this->db->order_by($order,$orderVal);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }

    public function getDataMultipleNotArchiveSorted($table,$orderField,$orderVal)
    {
        $this->db->where('archive',0);
        $this->db->order_by($orderField,$orderVal);
        $query=$this->db->get($table);
        $result=$query->result();
        return $result;
    }



    function curl_get_contents($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        $html = curl_exec($ch);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }


    public function renderWhatsappLink($whatsappPhoneString,$whatsappMessage)
    {
        $whatsappPhoneString = preg_replace('/\s+/', '', $whatsappPhoneString);
        $whatsappPhone = str_replace('+','',$whatsappPhoneString);


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

            //$whatsappHref = "https://wa.me/$whatsappPhone/?text=$whatsappMessage";
            $whatsappHref = "https://api.whatsapp.com/send?phone=$whatsappPhone&text=$whatsappMessage";
        }
        else
            $whatsappHref = "https://web.whatsapp.com/send?phone=$whatsappPhone&text=$whatsappMessage";


        return $whatsappHref;
    }



    public function adjustStringLength($inputString,$minLength)
    {
        $string = strip_tags($inputString);

        if (strlen($string) > $minLength) {

            // truncate string
            $stringCut = substr($string, 0, $minLength);
            $endPoint = strrpos($stringCut, ' ');

            //if the string doesn't contain any space then it will cut without word basis.
            $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
            $string .= '...';
        }
        return $string;
    }

}

