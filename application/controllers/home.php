<?php

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
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
            'name' => $name
        );
       
        if ($this->check_session->check()) {
            $this->parser->parse('template', $data);
        }
            else redirect('login');
        
       
    }
    

    
}

?>
