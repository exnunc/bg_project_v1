<?php

class Order_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->model('login_model');
        $this->load->model('boardgame_model');
        $this->load->model('shopping_model');
    }

    public function insert_order($order) {
       
        $data = array(
            'order_firstname' => $order['firstname'],
            'order_lastname' => $order['lastname'],
            'order_address' => $order['address'],
            'order_city' => $order['city'],
            'order_country' => $order['country'],
            'order_zip' => $order['zip'],
            'order_payment' => $order['payment_method']['payment_method'],
            
        );
        $this->db->insert('orders', $data);
        return $this->db->insert_id();
    }
    
    public function link_items_to_order($u,$order_id){
        $cart = $this->shopping_model->get_shopping_cart_of_user($u);
        
        foreach($cart as $c){
            
            $data = array(
              'oc_order_id' => $order_id,
                'oc_cart_id' => $c['cart_id']
            );
            $this->db->insert('orders_cartitems', $data);
        }
        
        $this->shopping_model->empty_shopping_cart_for_user($this->login_model->get_id_by_username($u));
        
    }

}

?>
