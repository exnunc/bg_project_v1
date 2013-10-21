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
        $this->load->model('order_model');
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
        $this->session->set_userdata(array('checkin_started' => ''));
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
                if ($this->session->userdata('checkin_started') === '') {
                    $contact_info = array(
                        'firstname' => $this->input->post('first-name'),
                        'lastname' => $this->input->post('last-name'),
                        'email' => $this->input->post('email'),
                        'telephone' => $this->input->post('telephone'),
                        'address' => $this->input->post('address'),
                        'country' => $this->input->post('country'),
                        'city' => $this->input->post('city'),
                        'zip' => $this->input->post('zip'),
                    );
                    $this->session->set_userdata(array('contact_info' => $contact_info));
                }
                $this->session->set_userdata(array('checkin_started' => 'true'));
                redirect('checkout/step_2');
            }
        }
        else
            redirect('login');
    }

    public function step_2() {

        if ($this->check_session->check()) {

            if ($this->session->userdata('step_1') == 'true') {


                $this->data['form_open'] = form_open('checkout/step_2', array('id' => 'checkout-form-2', 'method' => 'POST'));
                $this->data['form_close'] = form_close();
                $this->form_validation->set_rules('payment-select', 'Payment method', 'required');

                $this->data['v'] = 'components/checkout_2';
                $this->data['menu'] = $this->parser->parse('components/menu', $this->data, true);
                $this->data['admin_dropdown'] = ' ';
                $this->data['contact_info'] = $this->session->userdata('contact_info');


                if ($this->form_validation->run() == FALSE) {

                    if (validation_errors() == '') {

                        $this->data['error'] = '';
                    } else {

                        $this->data['error'] = $this->parser->parse('components/error', array('msg' => validation_errors()), true);
                    }

                    $this->parser->parse('template', $this->data);
                } else {
                    $this->session->set_userdata(array('step_2' => 'true'));

                    $payment_method = array(
                        'payment_method' => $this->input->post('payment-select'),
                    );
                    $this->session->set_userdata(array('payment_method' => $payment_method));

                    redirect('checkout/step_3');
                }
            } else {

                redirect('checkout');
            }
        } else {
            redirect('login');
        }
    }

    public function step_3() {
        if ($this->check_session->check()) {

            if ($this->session->userdata('step_2') == 'true') {


                $this->data['form_open'] = form_open('checkout/step_3', array('id' => 'checkout-form-3', 'method' => 'POST'));
                $this->data['form_close'] = form_close();

                $this->data['v'] = 'components/checkout_3';
                $this->data['menu'] = $this->parser->parse('components/menu', $this->data, true);
                $this->data['admin_dropdown'] = ' ';
                if ($this->session->userdata('contact_info') === '') {
                    $this->data['contact_string'] = '-';
                    $this->data['payment_string'] = '-';
                } else {
                    $this->data['contact_info'] = $this->session->userdata('contact_info');
                    $this->data['contact_info']['payment_method'] = $this->session->userdata('payment_method');

                    $this->data['contact_string'] = '<b>' . $this->data['contact_info']['firstname'] . ' ' . $this->data['contact_info']['lastname'] . '</b>, <p>' . $this->data['contact_info']['address'] . ', ' . $this->data['contact_info']['city'] . ', ' . $this->data['contact_info']['country'] . ', ' . $this->data['contact_info']['zip'] . '</p><p>' . $this->data['contact_info']['email'] . '</p><p>' . $this->data['contact_info']['telephone'] . '</p>';
                    $this->data['payment_string'] = $this->data['contact_info']['payment_method']['payment_method'];
                }

                if ($this->input->post('submit')) {
                    $this->session->set_userdata(array('step_3' => 'true'));

                    if ($this->session->userdata('contact_info') !== '') {
                        $order_id = $this->order_model->insert_order($this->data['contact_info']);
                        $this->order_model->link_items_to_order($this->session->userdata('u'), $order_id);
                    }



                    redirect('checkout/invoice');
                } else {

                    $this->parser->parse('template', $this->data);
                }
            } else {
                redirect('checkout');
            }
        } else {
            redirect('login');
        }
    }

    public function invoice() {
        if ($this->check_session->check()) {

            if ($this->session->userdata('step_3') == 'true') {

                $this->data['v'] = 'components/invoice';
                $this->data['menu'] = $this->parser->parse('components/menu', $this->data, true);
                $this->data['admin_dropdown'] = ' ';
                $this->data['contact_info'] = $this->session->userdata('contact_info');
                $this->data['payment_method'] = $this->session->userdata('payment_method');
                $this->data['success'] = 'Success!';
                if ($this->session->userdata('contact_info') == '') {
                    $this->data['success'] = '';
                    $this->data['error'] = $this->parser->parse('components/error', array('msg' => 'Error placing order'), true);
                }
                $this->session->set_userdata(array('contact_info' => ''));
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
