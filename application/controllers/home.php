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
        $bg = $this->boardgame_model->get_boardgames();
        for ($i = 0; $i < count($bg); $i++) {
            $bg[$i]['path'] = base_url() . 'assets/img/' . $bg[$i]['bg_image'];
        }
        $featured_bg = $this->boardgame_model->get_last_boardgame_added();
        $data = array(
            'test' => 'asdasda',
            'base_url' => base_url(),
            'v' => 'home',
            'name' => $name,
            'bg' => $bg,
            //'bg_path'=> base_url().'assets/img/'.$bg['bg_image']
            'featured_bg' => $featured_bg
        );

        if ($this->check_session->check()) {
            $data['menu'] = $this->parser->parse('components/menu', array('base_url' => base_url()), true);
            $data['featured'] = $this->parser->parse('components/featured', array(
                'featured_bg_name' => $featured_bg['bg_name'],
                'featured_bg_path' => base_url() . 'assets/img/' . $featured_bg['bg_image'],
                'featured_bg_description' => $featured_bg['bg_description'],
                    ), true);
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
                'redirect' => base_url()
            );
            echo json_encode($data);
        }
    }

    public function categories() {

        $i = $this->input->post('vari');
        $bg_id_list = $this->category_model->get_games_by_cat_id($i);
        $bgames_cat = array();
        for ($i = 0; $i < count($bg_id_list); $i++) {
            $var = $this->boardgame_model->get_boardgames($bg_id_list[$i]['bg_id']);
            array_push($bgames_cat, $var);
            $bgames_cat[$i]['path'] = base_url() . 'assets/img/' . $bgames_cat[$i]['bg_image'];
        }

        $data = array(
            'bgames_cat' => $bgames_cat,
            'redirect' => base_url() . 'index.php'
        );
        echo json_encode($data);
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
