<?php
/**
 * Created by PhpStorm.
 * User: fengchaoyi
 * Date: 15/4/28
 * Time: 下午4:06
 */
class User_model extends CI_Model{
    private $_id;
    private $_username;
    private $_password;

    function __construct(){
        parent::__construct();
        $this->load->database();
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
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->_username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }

    public function login(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $sql = "select * from user where username=".$this->db->escape($username).
            " and password=".$this->db->escape($password);
        $query = $this->db->query($sql);
        if ($query->num_rows()==1){
//            return $query->row_array();
            $row=$query->row();
            $userData = array(
                'user_id'=>$row->id
            );
            return $userData;
        }else{
            return false;
        }
    }

    public function register(){
        $username=$this->input->post('username');
        $password=$this->input->post('password');
        $data = array(
            'username'=>$username,
            'password'=>$password
        );
        $this->db->insert('user', $data);
        $id = $this->db->insert_id();
        if ($this->db->affected_rows()==1){
            $userdata = array(
                'user_id'=>$id
            );
            return $userdata;
        }else{
            return false;
        }
    }
}