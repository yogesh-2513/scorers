<?php

// Created by T.Yogesh

class ServicesModel extends CI_Model{

    public function get_events(){
        $this->db->where('status',1);
        return $this->db->get('events')->result();
    }

    public function get_contact(){
        return $this->db->get('contact')->result();
    }
    public  function get_service_page_content(){
        $this->db->where('status',1);
        return $this->db->get('service_page_content')->result();
    } 
    public function get_services(){
        return $this->db->get('service_category')->result();
       
    }
    public function get_service_by_id($id){
        $this->db->select("sc.category,s.description");
        $this->db->from("services s,service_category sc");
        $this->db->where("s.cat_id IN (SELECT sc.id from service_category where sc.id=".$id." AND s.status=1)");
        return $this->db->get()->result();
    }
    
}


?>