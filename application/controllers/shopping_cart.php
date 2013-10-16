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
        $data = array(
            'base_url' => base_url(),
            'v' => 'shopping_cart',
            'cart' => $cart,
            'error'=>''
        );

        if ($this->check_session->check()) {
            $data['menu'] = $this->parser->parse('components/menu', array(), true);
            $data['admin_dropdown'] = ' ';
            if($this->shopping_model->shopping_cart_empty()){
                $data['error'] = $this->parser->parse('components/error', array('msg'=>'Cart is empty.'), true);
            }
            $this->parser->parse('template', $data);
        }
        else
            redirect('login');
    }

}

?>
