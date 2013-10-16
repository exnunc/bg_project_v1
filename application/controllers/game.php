<?php

class Game extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('boardgame_model');
        $this->load->model('review_model');
        $this->load->model('category_model');
        $this->load->library('session');
        $this->load->library('parser');
        $this->load->helper('url');
        $this->load->library('check_session');

        if (!($this->check_session->check())) {
            redirect('login');
        }
    }

    public function index() {
        $bg = $this->boardgame_model->get_boardgames($this->session->userdata('gameId'));
        $reviews = $this->review_model->get_reviews_by_bg_id($this->session->userdata('gameId'));
        $data = array(
            'test' => 'asdasda',
            'base_url' => base_url(),
            'v' => 'game_page',
            'bg_name' => $bg['bg_name'],
            'bg_description' => $bg['bg_description'],
            'bg_path'=> base_url().'assets/img/'.$bg['bg_image'],
            'reviews' => $reviews
        );
        
        if ($this->check_session->check()) {
            $data['menu'] = $this->parser->parse('components/menu', array(), true);
            $data['admin_dropdown'] = ' ';
            
            $this->parser->parse('template', $data);
            
        }
        else
            redirect('login');
        
    }

   
}
?>
