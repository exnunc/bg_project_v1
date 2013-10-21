<?php

class Meeting_model extends CI_Model{
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
        
        $this->load->model('login_model');
    }
    

    public function get_meetings($id=FALSE){
        if ($id===FALSE){
            $query=$this->db->get('meetings');
            return $query->result_array();
        }
        $query=$this->db->get_where('reviews',array('meet_id'=>$id));
        return $query->row_array();
    }
    
   
    public function get_meetings_by_bg_id($bg_id){
        $query=$this->db->get_where('meetings',array('meet_bg_id'=>$bg_id));
        return $query->result_array();
    } 
    
    public function add_new_meeting($location,$meet_date,$meet_time,$details,$uid,$game_id){
        $datetime = $meet_date.' at '.$meet_time;
        
        $data = array(
            'meet_location' => $location,
            'meet_date' => $datetime,
            'meet_details' => $details,
            'meet_user_id' => $uid,
            'meet_bg_id' => $game_id,
            
            
        );
        $this->db->insert('meetings', $data);
    } 
    
}

?>
