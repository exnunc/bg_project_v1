<?php

class Game extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('boardgame_model');
        $this->load->model('review_model');
        $this->load->model('meeting_model');
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
        $meetings = $this->meeting_model->get_meetings_by_bg_id($this->session->userdata('gameId'));

        $data = array(
            'test' => 'asdasda',
            'base_url' => base_url(),
            'v' => 'game_page',
            'bg_id' => $bg['bg_id'],
            'bg_name' => $bg['bg_name'],
            'bg_description' => $bg['bg_description'],
            'bg_path' => base_url() . 'assets/img/' . $bg['bg_image'],
            'reviews' => $reviews,
            'meetings' => $meetings
        );

        if ($this->check_session->check()) {
            $data['menu'] = $this->parser->parse('components/menu', array('base_url' => base_url()), true);
            $data['admin_dropdown'] = ' ';
            $data['meet_area'] = $this->parser->parse('components/meet_area', array('meetings' => $meetings), true);

            $this->parser->parse('template', $data);
        }
        else
            redirect('login');
    }

    public function on_stock() {
        $data = array();

        if ($this->boardgame_model->get_boardgame_stock($this->session->userdata('gameId'))) {
            $data['quantity'] = $this->boardgame_model->get_boardgame_stock($this->session->userdata('gameId'));
        }
        else
            $data['quantity'] = 0;

        echo json_encode($data);
    }

    public function add_new_meeting() {
        
        $this->meeting_model->add_new_meeting($this->input->post('meetLocation'),$this->input->post('meetDate'),$this->input->post('meetTime'),$this->input->post('meetDetails'),$this->login_model->get_id_by_username($this->session->userdata('u')),$this->session->userdata('gameId'));
        $data['redirect'] = 'game';
        echo json_encode($data);

    }

}

?>
