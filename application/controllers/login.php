<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');

        $this->load->library('parser');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('check_session');

        $this->load->helper('url');
        $this->load->helper('form');
    }

    public function index() {
        $data['base_url'] = base_url();
        $data['validation'] = validation_errors();
        $data['form_open'] = form_open('login', array('id' => 'login-form'));
        $data['form_close'] = form_close();
        $data['error'] = '';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->check_session->check()) {
            redirect('home');
        } elseif ($this->input->post('submit')) {
            if ($this->input->post('username') !== '' && $this->input->post('password') !== '') {
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                if ($this->login_model->user_exists($username, $password)) {
                    $this->set_session($username);
                    redirect($this->uri->uri_string());
                } else {
                    $data['error'] = $this->parser->parse('components/error', array(), true);
                }
            } else {
                $data['error'] = $this->parser->parse('components/error', array(), true);
            }
        }

        $data['v'] = 'login';
        $data['featured'] = $this->parser->parse('components/featured', array(), true);
        $data['top5'] = $this->parser->parse('components/top5', array(), true);
        $this->parser->parse('template', $data);
    }

    public function set_session($user) {
        $sesData = array(
            'u' => $user,
            'isLogged' => 1
        );

        $this->session->set_userdata($sesData);
    }

   

}

?>
