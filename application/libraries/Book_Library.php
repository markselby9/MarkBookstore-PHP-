<?php
/**
 * Created by PhpStorm.
 * User: fengchaoyi
 * Date: 15/4/29
 * Time: 下午1:50
 */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Book_Library
{
    private $_ci;

    function __construct()
    {
        $this->_ci = get_instance();
        $this->_ci->load->model('Book_model');
        $this->_ci->load->database();
    }

    public function getBookFromData($row)
    {
        $book = new Book_model();
        $book->setId($row->id);
        $book->setBookname($row->bookname);
        $book->setPrice($row->price);
        $book->setAuthor($row->author);
        $book->setDiscount($row->discount);
        return $book;
    }

    public function getBook($id = 0)
    {
        if ($id > 0) {
            $query = $this->_ci->db->get_where('book', array("id" => $id));
            if ($query->num_rows() > 0) {
                return $this->getBookFromData($query->row());
            }
            return false;
        }
        $query = $this->_ci->db->select('*')->from("book")->get();
        if ($query->num_rows() > 0) {
            $books = array();
            foreach ($query->result() as $row) {
                $books[] = $this->getBookFromData($row);
            }
            return $books;
        }
        return false;
    }

    public function addBook()
    {
        $bookname = $this->_ci->input->post('bookname');
        $author = $this->_ci->input->post('author');
        $price = $this->_ci->input->post('price');
        $discount = $this->_ci->input->post('discount');
        $db = $this->_ci->db;
//        $sql = "INSERT INTO book (bookname, author, price, discount) VALUES
//(" . $db->escape($bookname) . ", " . $db->escape($author) . "," . $db->escape($price) . "," . $db->escape($discount) . ")";
//        $db->query($sql);
//        echo $db->affected_rows();
        $data=array(
            'bookname'=>$bookname,
            'author'=>$author,
            'price'=>$price,
            'discount'=>$discount
        );
        $db->insert('book', $data);
//        echo $db->affected_rows();
    }

    public function checkBook($user_id, $book_id){
        $db = $this->_ci->db;
        $check_sql = "select * from user_book_relation where user_id=? and book_id=?";
        $check_query = $db->query($check_sql, array($user_id, $book_id));
        if ($check_query->num_rows() == 0){
            return 0;
        }else {
            $row = $check_query->row();
            return $row->behavior;
        }
    }

    public function borrowBook($user_id, $book_id){
        $db = $this->_ci->db;
        if ($this->checkBook($user_id, $book_id) > 0){
            return "Already borrowed!";
        }
        $data=array(
            'book_id'=>$book_id,
            'user_id'=>$user_id,
            'behavior'=>1
        );
        $db->insert('user_book_relation', $data);
        return true;
    }
}