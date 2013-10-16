<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('boardgame_model');
        $this->load->model('review_model');
        $this->load->model('category_model');

        $this->load->library('parser');
        $this->load->library('check_session');

        if (!($this->check_session->check())) {
            redirect('login');
        }
    }

    public function index() {
        $name = $this->login_model->get_name_by_username();
        $bg_id_list = $this->category_model->get_games_by_cat_id(2);
        $bgames_cat = array();
        for ($i = 0; $i < count($bg_id_list); $i++) {
            $var = $this->boardgame_model->get_boardgames($bg_id_list[$i]['bg_id']);
            array_push($bgames_cat, $var);
        }
        $test = array(
            'bg_name' => 'a',
            'bg_description' => 'b'
        );
        $data = array(
            'test' => 'asdasda',
            'base_url' => base_url(),
            'v' => 'home',
            'name' => $name,
            'bgames_cat' => $bgames_cat
        );

        if ($this->check_session->check()) {
            $data['menu'] = $this->parser->parse('components/menu', array(), true);
            $data['featured'] = $this->parser->parse('components/featured', array(), true);
            $data['top5'] = $this->parser->parse('components/top5', array(), true);
            $data['browse'] = $this->parser->parse('components/browse', $data, true);
            $data['admin_dropdown'] = ' ';
            $data['game-item'] = ' ';
            $data['game'] = ' ';


            $this->parser->parse('template', $data);
        }
        else
            redirect('login');
    }

    public function boardgames($id = FALSE) {
        if ($id === FALSE) {
            $bg = $this->boardgame_model->get_boardgames();
            echo json_encode($bg);
        } else {
            $sesData = array(
                'gameId' => $id,
            );

            $this->session->set_userdata($sesData);
            $data = array(
                'redirect' => base_url() . 'index.php/game'
            );
            echo json_encode($data);
        }
    }

    public function shopping_cart() {

        $data = array(
            'redirect' => base_url() . 'index.php/shopping_cart'
        );
        echo json_encode($data);
    }

    public function logout() {

        $this->session->sess_destroy();

        $data = array(
            'redirect' => base_url() . 'index.php/game'
        );
        echo json_encode($data);
    }

}

?>
