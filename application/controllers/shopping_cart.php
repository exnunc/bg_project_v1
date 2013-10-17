<?php

class Shopping_cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('boardgame_model');
        $this->load->model('review_model');
        $this->load->model('category_model');
        $this->load->model('shopping_model');

        $this->load->library('session');
        $this->load->library('parser');
        $this->load->helper('url');
        $this->load->library('check_session');

        if (!($this->check_session->check())) {
            redirect('login');
        }
    }

    public function index() {

        $cart = $this->shopping_model->get_shopping_cart_of_user($this->session->userdata('u'));
        //print_r($cart);die;
        $total_sum = 0;
        $user = '';
        $i = 0;
        foreach ($cart as $c) {
            //$human_date = gmdate("F j, Y, g:i a", $c['cart_date_added']+10800);
            //$cart[$i]['cart_date_added'] = $human_date;
            
            $user = $this->login_model->get_name_by_username($c['cart_user_id']);
            $cart[$i]['cart_user_name'] = $user;
            
            $game = $this->boardgame_model->get_name_by_id($c['cart_bg_id']);
            $cart[$i]['cart_bg_name'] = $game;
            
            $game_price = $this->boardgame_model->get_price_by_id($c['cart_bg_id']);
            $cart[$i]['cart_bg_price'] = $game_price * $cart[$i]['cart_quantity'] .' $';
            
            $game_stock = $this->boardgame_model->get_stock_by_id($c['cart_bg_id']);
            $cart[$i]['cart_bg_stock'] = $game_stock;
            $cart[$i]['cart_bg_stock_range'] = array();
            foreach(range(1,$game_stock) as $item){
                $sel='';
                
                if($item == $cart[$i]['cart_quantity']){
                    $sel = 'selected';
                }else{
                    $sel = '';
                }
                array_push($cart[$i]['cart_bg_stock_range'],array(
                   'val'=>$item ,
                   'selected'=>$sel
                ));
            }
            
            $total_sum = $total_sum + $cart[$i]['cart_bg_price'];
            $i = $i + 1;
        }
        $shipping = 10 * $i .' $';
        

        $data = array(
            'base_url' => base_url(),
            'v' => 'shopping_cart',
            'cart' => $cart,
            'error' => '',
            'total_sum'=>($total_sum + $shipping).' $',
            'shipping'=>$shipping
        );

        if ($this->check_session->check()) {
            $data['menu'] = $this->parser->parse('components/menu', array(), true);
            $data['admin_dropdown'] = ' ';
            if ($this->shopping_model->shopping_cart_empty()) {
                $data['error'] = $this->parser->parse('components/error', array('msg' => 'Cart is empty.'), true);
                $data['user_id'] = '';
            }else{
                $data['user_id'] = $cart[0]['cart_user_id'];
            }
            $this->parser->parse('template', $data);
        }
        else
            redirect('login');
    }
    
    public function add_to_cart(){
        $data = array();
        $this->shopping_model->add_to_shopping_cart();
        
        $data['redirect'] =  base_url() . 'index.php/shopping_cart';
                
        echo json_encode($data);
    }
    
    public function remove_from_cart($id){
        $data = array();
        $this->shopping_model->remove_from_shopping_cart($id);
        
        $data['redirect'] =  base_url() . 'index.php/shopping_cart';
                
        echo json_encode($data);
    }
    
    public function empty_cart($uid){
        $data = array();
        $this->shopping_model->empty_shopping_cart_for_user($uid);
        
        $data['redirect'] =  base_url() . 'index.php/shopping_cart';
                
        echo json_encode($data);
    }

}

?>
