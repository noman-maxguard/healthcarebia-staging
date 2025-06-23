<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if(!function_exists('isUrlExists')){
    function isUrlExists($tblName, $urlSlug){
        if(!empty($tblName) && !empty($urlSlug)){
            $ci = & get_instance();
            $ci->db->from($tblName);
            $ci->db->where('url_slug',$urlSlug);
            $rowNum = $ci->db->count_all_results();
            return ($rowNum>0)?true:false;
        }else{
            return true;
        }
    }
}



if(!function_exists('isUrlExists1')){
    function isUrlExists1($tblName, $urlSlug){
        if(!empty($tblName) && !empty($urlSlug)){
            $ci = & get_instance();
            $ci->db->from($tblName);
            $ci->db->where('url',$urlSlug);
            $rowNum = $ci->db->count_all_results();
            return ($rowNum>0)?true:false;
        }else{
            return true;
        }
    }
}

if(!function_exists('isprefixExists')){
    function isprefixExists($tblName, $urlSlug){
        if(!empty($tblName) && !empty($urlSlug)){
            $ci = & get_instance();
            $ci->db->from($tblName);
            $ci->db->where('url_slug',$urlSlug);
            $rowNum = $ci->db->count_all_results();
            return ($rowNum>0)?true:false;
        }else{
            return true;
        }
    }
}





