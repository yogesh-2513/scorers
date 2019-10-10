<?php

// Created by T.Yogesh


class AboutModel extends CI_Model{
    public function get_about(){
        $this->db->select("*");
        $this->db->from("aboutus");
        $this->db->where('status=1');
        return $this->db->get()->result();
    }
    public function get_team(){
        $this->db->where('status',1);
        return $this->db->get('team')->result();
    }
    public function get_events(){
        $this->db->where('status',1);
        return $this->db->get('events')->result();
    }
    public function get_contact(){
        return $this->db->get('contact')->result();
    }
}


?>