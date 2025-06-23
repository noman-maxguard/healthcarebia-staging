<?php
class MDL_Login extends CI_Model{


    public function __construct() {
    parent::__construct();

   }

   //login start
   function check_user($username)
   {
       $this->db->select('email');
       $this->db->where('email',$username);
       $query = $this->db->get('admins');
       $count = $query->num_rows();

       
       return $count;
   }

    function check_user_login($username,$password)
    {
        $q = 'select email from admins where email="'.$username.'" and password = "'.SHA1($password).'"';
        $res = $this->db->query($q);
        $count = $res->num_rows();

//        $this->db->select('email');
//        $this->db->where('email',$username);
//        $this->db->where('password',$password);
//        $query = $this->db->get('admins');
//        $count = $query->num_rows();
//
//
        return $count;
    }

    
    function get_user_data($username,$password)
    {
	    $result = array();
		
//        $this->db->select('*');
//        $this->db->where('email',$username);
//        $this->db->where('password',$password);
//        $query = $this->db->get('admins');
//        $count = $query->num_rows();

        $q = 'select * from admins where email="'.$username.'" and password = "'.SHA1($password).'"';
        $res = $this->db->query($q);
        $count = $res->num_rows();

        if($count)
        {
            $result = $res->row();

        }
       
        return $result;
    }
    //login end
    
    //reset password start
    function check_email($email)
    {
        $this->db->select('id');
        $this->db->where('email',$email);
        $query = $this->db->get('admins');
        $count = $query->num_rows();
        return $count;
    }

    function get_user_data_email($email)
    {
        $this->db->select('*');
        $this->db->where('email',$email);
        $query = $this->db->get('admins');
        return $query->row();
    }
    
    function up_data($id,$data)
    {
        $this->db->where('id',$id);
        $this->db->update('admins', $data);
        return 1;
    }
    //reset password end

    //reset password check start
    function check_user_encrypt($token)
    {
        $this->db->select('*');
        $this->db->where('token_password',$token);
        $query = $this->db->get('admins');
        $count = $query->num_rows();

        if($count)
        {
            $res = $query->row();
            // $user_id = !empty($res->id)?$res->id:0;

            // $this->db->where('id',$user_id);
            // $this->db->update('admins', array('token_password'=>''));

            return $res;
        }
        else
           return 0;
    }



    function save_data($token,$password)
    {

        $enc_pass = $password;
        
        $this->db->select('*');
        $this->db->where('token_password',$token);
        $query = $this->db->get('admins');
        $count = $query->num_rows();

        if($count)
        {
            $res = $query->row();
            $query1 = "update admins set password='".SHA1($enc_pass)."' , token_password='' where id='".$res->id."'";
            $qq = $this->db->query($query1);
            return $qq;
        }

        else
        {
            return 0;
        }
    }

    //reset password check end


    //verify_log
    function verify_log($log)
    {


        $email = $log['email'];
        $date = $log['date'];
        $ip = $log['ip'];

        $login_date = date("Y-m-d H:i:s");

        $query = 'select * from user_log where email = "'.$email.'" and ip = "'.$ip.'" and date >= now() - interval 1 minute';
        $count = $this->db->query($query)->num_rows();
        return $count;
    }

}
?>