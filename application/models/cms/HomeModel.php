<?php

// Created by T.Yogesh


class HomeModel extends CI_Model{
    public function get_slideshow_images()
    {
        $this->db->where('status',1);
        return $this->db->get('slideshow')->result();
    }
    public function get_services(){
        $this->db->limit(3);
        $this->db->select("s.description,sc.category,sc.id");
        $this->db->from("service_category sc,services s");
        $this->db->where("sc.id=s.cat_id AND s.status=1");
        return $this->db->get()->result();
    }
    public function get_about(){
        $this->db->limit(1);
        $this->db->select("topic,description");
        $this->db->from("aboutus");
        $this->db->where('status=1');
        return $this->db->get()->result();
    }
    public function get_team(){
        $this->db->where('status',1);
        return $this->db->get('team')->result();
    }
    public function get_gallery(){
        $this->db->where('status',1);
        return $this->db->get('gallery')->result();
    }
    public function get_events(){
        $this->db->where('status',1);
        return $this->db->get('events')->result();
    }
    public function get_contact(){
        return $this->db->get('contact')->result();
    }
    public function add_subscriber($insert){
        if($this->db->insert("subscribers",$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function get_active_modules(){
        $this->db->where('status',1);
        return $this->db->get('modules')->result();
    }
    
}


?>