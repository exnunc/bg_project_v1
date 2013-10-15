<?php

class Boardgame_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function boardgame_exists($id) {
        $query = $this->db->get_where('boardgames', array('bg_id' => $id));
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function get_boardgames($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('boardgames');
            return $query->result_array();
        }
        $query = $this->db->get_where('boardgames', array('bg_id' => $id));
        return $query->row_array();
    }

    public function get_name_by_id($id) {

        $query = $this->db->get_where('boardgames', array('bg_id' => $id));
        return $query->row()->bg_name;
    }

}

?>
