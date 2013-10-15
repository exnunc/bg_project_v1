<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('boardgame_model');
        $this->load->model('review_model');
        $this->load->library('parser');
        $this->load->library('check_session');

        if (!($this->check_session->check())) {
            redirect('login');
        }
    }

    public function index() {
        $name = $this->login_model->get_name_by_username();

        $data = array(
            'test' => 'asdasda',
            'base_url' => base_url(),
            'v' => 'home',
            'name' => $name,

        );

        if ($this->check_session->check()) {
            $data['menu'] = $this->parser->parse('templates/menu', array(), true);
            $data['featured'] = $this->parser->parse('templates/featured', array(), true);
            $data['top5'] = $this->parser->parse('templates/top5', array(), true);
            $data['browse'] = $this->parser->parse('templates/browse', array(), true);
            $data['admin_dropdown'] = ' ';
            $this->parser->parse('template', $data);
        }
        else
            redirect('login');
    }
    
    public function boardgames(){
        $bg = $this->boardgame_model->get_boardgames();
        echo json_encode($bg);
    }

}

?>
