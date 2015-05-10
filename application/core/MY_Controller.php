<?php

/**
 * Created by PhpStorm.
 * User: fengchaoyi
 * Date: 15/4/28
 * Time: 下午8:31
 */
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('User_library');
        $this->load->library('session');
        $this->load->helper('url');
        $user_id = $this->session->userdata('user_id');
        $this->data['user'] = $this->user_library->getUser($user_id);
    }
}