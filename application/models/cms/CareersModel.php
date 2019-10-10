<?php

// Created by T.Yogesh


class CareersModel extends CI_Model{
    public function get_events(){
        $this->db->where('status',1);
        return $this->db->get('events')->result();
    }
    public function get_contact(){
        return $this->db->get('contact')->result();
    }
    public function get_careers(){
        $this->db->where('status',1);
        return $this->db->get('career')->result();
    }
    public function get_promotions(){
        return $this->db->get('promotion')->result();
    }
    public function get_career_by_id($id){
        $this->db->select("pc.description,pc.image,p.promotion");
        $this->db->from("promotion_content pc,promotion p");
        $this->db->where("pro_id IN (SELECT p.id FROM `promotion` WHERE p.id=".$id." AND pc.status=1)");
        return $this->db->get()->result();
    }
}


?>