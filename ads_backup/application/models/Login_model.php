<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

function login_user($email,$password,$table){
  $this->db->where('email', $email);
  $query = $this->db->get($table);

  if($query->num_rows() > 0)
  {
   foreach($query->result() as $row)
   {

    if($row->is_email_verified == 'yes' )
    {

    $store_password = password_verify($password,$row->password);
   
     if($store_password === true)
     {
      return $query->row_array();
     }
     else
     {
        return false;
      // return 'Wrong Password';
     }
    }
    else
    {
        return false;
     // return 'First verified your email address';
    }
   }
  }
  else
  {
    return false;
   // return 'Wrong Email Address';
  }
 
}






}

?>