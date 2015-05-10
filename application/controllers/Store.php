<?php
/**
 * Created by PhpStorm.
 * User: fengchaoyi
 * Date: 15/4/28
 * Time: 下午8:56
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Store extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('Book_Library');
    }

    function index(){
        if ($this->session->userdata('user_id')>0) {
            //User is logged in
            $user_id = $this->session->userdata('user_id');
            $data = $this->data;
            $data['title']="Book list";
            $book_list=$this->book_library->getBook();
            $data['book_list']=$book_list;
            foreach ($book_list as $book){
                $book->setStatus($this->book_library->checkBook($user_id, $book->getId()));
            }

            $this->load->view('template/header', $data);
            $this->load->view('store/function', $data);
            $this->load->view('store/index',$data);
            $this->load->view('template/footer', $data);
        }
        else{
            echo 'not logged in!';
        }

    }

    function account(){
        
    }

    function logout(){
        //destroy the session
        $this->session->sess_destroy();
        redirect('users/index');
    }
}