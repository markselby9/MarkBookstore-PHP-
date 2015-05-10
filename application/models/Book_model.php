<?php
/**
 * Created by PhpStorm.
 * User: fengchaoyi
 * Date: 15/4/29
 * Time: 上午9:55
 */
class Book_model extends CI_Model{
    private $_id;
    private $_bookname;
    private $_price;
    private $_author;
    private $_discount;
    private $_status;

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->_status = $status;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getBookname()
    {
        return $this->_bookname;
    }

    /**
     * @param mixed $bookname
     */
    public function setBookname($bookname)
    {
        $this->_bookname = $bookname;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->_price = $price;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->_discount;
    }

    /**
     * @param mixed $discount
     */
    public function setDiscount($discount)
    {
        $this->_discount = $discount;
    }


}