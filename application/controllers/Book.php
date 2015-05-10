<?php
/**
 * Created by PhpStorm.
 * User: fengchaoyi
 * Date: 15/4/29
 * Time: 下午2:50
 */
class Book extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->load->Library('Book_Library');
        $this->load->Library('form_validation');
    }

    function index(){
    }

    function add(){
        if (!file_exists(APPPATH.'views/book/add.php')){
            show_404();
        }
        $data['title']="add book";
        $this->load->model('Book_model');
        $this->load->helper('form');
        $this->form_validation->set_rules('bookname','bookname','required');
        $this->form_validation->set_rules('author','author','required');
        $this->form_validation->set_rules('price','price','required');
        $this->form_validation->set_rules('discount','discount','required');

        $data['title']='add book page';
        if ($this->form_validation->run()==false){
            $this->load->view('template/header', $data);
            $this->load->view('book/add');
            $this->load->view('template/footer');
        }else{
            $this->book_library->addBook();
            echo 'add success';
        }
    }

    function borrow($book_id){
        $user_id = $this->session->userdata('user_id');
        $result = $this->book_library->borrowBook($user_id, $book_id);
        echo 'borrow'.$result;
    }
}