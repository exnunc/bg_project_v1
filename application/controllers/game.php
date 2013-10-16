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
        
        $data = array(
            'test' => 'asdasda',
            'base_url' => base_url(),
            'v' => 'game_page',
            'test' => $bg['bg_name']
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
