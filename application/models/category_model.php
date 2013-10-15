<?php

class Category_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        
        $this->load->model('boardgame_model');
    }
    
    public function category_exists($id){
        $query=$this->db->get_where('categories',array('cat_id'=>$id));
        if ($query->num_rows()>0){
            return true;
        }
        else {
            return false;
        }
    }
    
    public function get_categories($id=FALSE){
        if ($id===FALSE){
            $query=$this->db->get('categories');
            return $query->result_array();
        }
        $query=$this->db->get_where('categories',array('cat_id'=>$id));
        return $query->row_array();
    }
    
    public function get_categories_by_bg_id($bg_id){
        $query=$this->db->get_where('boardgames_categories',array('bg_id'=>$bg_id));
        return $query->result_array();
    }
    
    public function get_games_by_cat_id($c_id){
        $query=$this->db->get_where('boardgames_categories',array('cat_id'=>$c_id));
        return $query->result_array();
    }
}
?>
