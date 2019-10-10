<?php

// Created by T.Yogesh

class LoginModel extends CI_Model{
    public function get_credentials(){
        return $this->db->get('admin')->result();
    }
}

?>