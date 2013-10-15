<?php

class Review_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        
        $this->load->model('login_model');
    }
    
    public function review_exists($id){
        $query=$this->db->get_where('reviews',array('review_id'=>$id));
        if ($query->num_rows() > 0){
            return true;
        }
        else {
            return false;
        }
    }
    
    public function get_reviews($id=FALSE){
        if ($id===FALSE){
            $query=$this->db->get('reviews');
            return $query->result_array();
        }
        $query=$this->db->get_where('reviews',array('review_id'=>$id));
        return $query->row_array();
    }
    
    public function get_reviews_by_user_id($user_id){
        $query=$this->db->get_where('reviews',array('review_user_id'=>$user_id));
        return $query->result_array();
    }
    
    public function get_reviews_by_bg_id($bg_id){
        $query=$this->db->get_where('reviews',array('review_bg_id'=>$bg_id));
        return $query->result_array();
    } 
}

?>
