<?php

class Shopping_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function shopping_cart_empty() {
        $query = $this->db->get_where('shopping_carts');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function get_shopping_cart_of_user($uid = FALSE) {
        if ($uid === FALSE) {
            $query = $this->db->get('shopping_carts');
            return $query->result_array();
        }
        $query = $this->db->get_where('shopping_carts', array('cart_user_id' => $uid));
        return $query->row_array();
    }

    
}

?>
