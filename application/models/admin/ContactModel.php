<?php

// Created by T.Yogesh

class ContactModel extends CI_Model{
    public function get(){
        return $this->db->get('contact')->result();
    }
    public function update($update){
    
        if($this->db->update('contact',$update)){
            return true;
        }else{
            return false;
        }
    }
}
?>