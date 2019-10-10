<?php

// Created by T.Yogesh


class Portfolio extends CI_Model{
    public function get_events(){
        $this->db->where('status',1);
        return $this->db->get('events')->result();
    }
    public function get_contact(){
        return $this->db->get('contact')->result();
    }
    public function get_images(){
        $this->db->where('status',1);
        return $this->db->get('gallery')->result();
    }
}


?>