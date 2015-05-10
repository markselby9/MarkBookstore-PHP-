<?php
/**
 * Created by PhpStorm.
 * User: fengchaoyi
 * Date: 15/4/28
 * Time: 下午4:02
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (!file_exists(APPPATH . '/views/user/index.php')) {
            show_404();
        }
        if ($this->session->userdata('user_id')>0) {
            //User is logged in
            $this->session->sess_destroy();
            $this->load->view('store/index');
        } else {
            //User is not logged in
            $this->load->view('user/index');
        }
    }

    public function login()
    {
        if (!file_exists(APPPATH . '/views/user/login.php')) {
            show_404();
        }
        $this->load->model('User_model');
        $this->load->helper('form');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $data['title'] = "Login";
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('user/login', $data);
            $this->load->view('template/footer', $data);
        } else {
            if ($userData = $this->User_model->login()) {
                $session = $this->session;
                $session->set_userdata($userData);
                redirect('store/index');
            } else {
                echo 'login error';
            }
        }
    }

    public function register()
    {
        if (!file_exists(APPPATH . '/views/user/register.php')) {
            show_404();
        }
        $this->load->model('User_model');
        $this->load->helper('form');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        $data['title'] = "Register to the bookstore";
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('template/header', $data);
            $this->load->view('user/register', $data);
            $this->load->view('template/footer', $data);
        } else {
            if ($userData = $this->User_model->register()) {
                $session = $this->session;
                $session->set_userdata($userData);
                redirect('store/index');
            } else {
                echo 'login error';
            }
        }
    }
}