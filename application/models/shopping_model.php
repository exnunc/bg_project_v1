<?php

class Shopping_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('boardgame_model');
    }

    public function shopping_cart_empty() {
        $query = $this->db->get_where('shopping_carts');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function get_shopping_cart_of_user($user = FALSE) {
        if ($user === FALSE) {
            $query = $this->db->get('shopping_carts');
            return $query->result_array();
        }
        $uid = $this->login_model->get_id_by_username();
        $query = $this->db->get_where('shopping_carts', array('cart_user_id' => $uid));
        return $query->result_array();
    }

    public function add_to_shopping_cart() {
        
        if ($this->boardgame_in_cart($this->session->userdata('gameId'))) {
            $this->update_quantity($this->session->userdata('gameId'));
        } else {
            $this->insert_into_cart();
        }
    }

    public function boardgame_in_cart($id) {
        $query = $this->db->get_where('shopping_carts', array('cart_bg_id' => $id));
       
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_into_cart() {
        $data = array(
            'cart_user_id' => $this->login_model->get_id_by_username($this->session->userdata('u')),
            'cart_bg_id' => $this->session->userdata('gameId')
        );
        $this->db->insert('shopping_carts', $data);
    }

    public function update_quantity($id) {
        $new_quantity = 0;
        $quantity = $this->get_boardgame_quantity($this->session->userdata('gameId'));
        if($quantity < $this->boardgame_model->get_boardgame_stock($this->session->userdata('gameId'))){
            $new_quantity = $quantity+1;
        }else $new_quantity = $quantity;
        
        $data = array(
            'cart_quantity' =>  $new_quantity
        );
        $this->db->where(array('cart_bg_id' => $id));
        $this->db->update('shopping_carts', $data);
    }

    public function get_boardgame_quantity($id) {
        $query = $this->db->get_where('shopping_carts', array('cart_bg_id' => $id));
        if ($query->num_rows() > 0) {
            return $query->row()->cart_quantity;
        }
    }
    
    public function remove_from_shopping_cart($id) {
        $this->db->delete('shopping_carts', array('cart_id' => $id)); 
    }
    
    public function empty_shopping_cart_for_user($uid) {
        $this->db->delete('shopping_carts', array('cart_user_id' => $uid)); 
    }
}

?>
