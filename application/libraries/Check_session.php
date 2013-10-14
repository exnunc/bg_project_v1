<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Check_session {
    public function __construct() {
        
    }

        /*
     * session checker
     * 
     * @param none
     * @return bool
     */

    public function check()
    {
        $CI =& get_instance();
        $CI->load->library('session');
        if (intval($CI->session->userdata('isLogged')) == 1) {
            return true;
        } else {
            return false;
        }
    }
}