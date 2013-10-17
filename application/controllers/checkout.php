<?php

class Checkout extends CI_Controller {

    public $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('boardgame_model');
        $this->load->model('review_model');
        $this->load->model('category_model');
        $this->load->model('shopping_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('parser');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('check_session');

        if (!($this->check_session->check())) {
            redirect('login');
        }
        $this->data = array(
            'base_url' => base_url(),
            'error' => '',
        );
    }

    public function index() {

        redirect('checkout/step_1');
    }

    public function step_1() {
        $this->data['form_open'] = form_open('checkout/step_1', array('id' => 'checkout-form', 'method' => 'POST'));
        $this->data['form_close'] = form_close();

        $this->data['v'] = 'checkout';

        $this->form_validation->set_rules('first-name', 'First name', 'required');
        $this->form_validation->set_rules('last-name', 'Last name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('telephone', 'Telephone', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');

        if ($this->check_session->check()) {
            $this->data['menu'] = $this->parser->parse('components/menu', $this->data, true);
            $this->data['admin_dropdown'] = ' ';

            if ($this->form_validation->run() == FALSE) {
                if (validation_errors() == '') {

                    $this->data['error'] = '';
                } else {

                    $this->data['error'] = $this->parser->parse('components/error', array('msg' => validation_errors()), true);
                }

                $this->parser->parse('template', $this->data);
            } else {
                $this->session->set_userdata(array('step_1' => 'true'));
                redirect('checkout/step_2');
            }
        }
        else
            redirect('login');
    }

    public function step_2() {

        if ($this->check_session->check()) {
            if ($this->session->userdata('step_1') == 'true') {
                $this->session->set_userdata(array('step_1' => ''));

                $this->data['form_open'] = form_open('checkout/step_2', array('id' => 'checkout-form-2', 'method' => 'POST'));
                $this->data['form_close'] = form_close();

                $this->data['v'] = 'components/checkout_2';
                $this->data['menu'] = $this->parser->parse('components/menu', $this->data, true);
                $this->data['admin_dropdown'] = ' ';
                
                $this->parser->parse('template', $this->data);
            } else {
                redirect('checkout');
            }
        } else {
            redirect('login');
        }
    }

}

?>
