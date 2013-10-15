<?php

class Boardgame_model extends CI_Model{
    public function __construct() {
        $this->load->database();
    }
    
    public function boardgame_exists($id){
        $query= $this->db->get_where('boardgames',array('bg_id'=>$id));
        if ($query->num_rows() >0 ){
            return true;
        }
        else {
            return false;
        }
    }
    
    public function get_boardgames($id=FALSE){
        if ($id===FALSE){
            $query=$this->db->get('boardgames');
            return $query->result_array();
        }
        $query->$this->db->get_where('boardgames',array('bg_id'=>$id,'bg_name'=>$name,
            'bg_image'=>$image,'bg_description'=>$description,'bg_stars_no'=>$starsNo,'bg_times_voted'=>$timeVoted,
            'bg_min_players'=>$minPlayers,'bg_max_players'=>$maxPlayers,'bg_price'=>$price,
            'bg_date_added'=>$dateAdded));
        return $query->row_array();
    }
    
    public function get_name_by_id($id){
        $query->$this->db->get_where('boardgames',array('bg_id'=>$id));
        return $query->row()->bg_name;
    }
}
?>
