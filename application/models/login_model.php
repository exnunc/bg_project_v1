<?php

class Login_model extends CI_Model{
    public function __construct() {
        
        $this->load->database();
        $this->load->library('session');
    }
    
    public function get_users($username=FALSE,$password=FALSE){
        if($username===FALSE || $password===FALSE){
            $query = $this->db->get('users');
            return $query->result_array();
        }
        $query = $this->db->get_where('users',array('user_username'=>$username,'user_password'=>$password));
        return $query->row_array();
    }
    
    public function user_exists($username, $pass) {
        $query = $this->db->get_where('users', array('user_username' => $username, 'user_password' => $pass));
        
        if($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    
     public function get_name_by_username() {
        $query = $this->db->get_where('users', array('user_username' => $this->session->userdata('u')));
        return $query->row()->user_name; 
    }
    
    public function get_id_by_username(){
        $query = $this->db->get_where('users', array('user_username' => $this->session->userdata('u')));
        return $query->row()->user_id;
    }
}

?>
