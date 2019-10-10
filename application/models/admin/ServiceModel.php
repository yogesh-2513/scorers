<?php

// Created by T.Yogesh

class ServiceModel extends CI_Model{
    public function get_category(){
        return $this->db->get('service_category')->result();
    }
    public function get_category_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('service_category')->result();
    }
    public function add_category($insert){
        if($this->db->insert('service_category',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function update_category($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('service_category',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_category($id){
        $this->db->where('id',$id);
        if($this->db->delete('service_category')){
            return true;
        }else{
            return false;
        }
    }
    

    public function get_page_content(){
        return $this->db->get('service_page_content')->result();
    }
    public function get_page_content_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('service_page_content')->result();
    }
    public function add_page_content($insert){
        if($this->db->insert('service_page_content',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function edit_page_content($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('service_page_content',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function change_content_status($update,$id){
        $this->db->where("id",$id);
        if($this->db->update('service_page_content',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_content($id){
        $this->db->where('id',$id);
        if($this->db->delete('service_page_content')){
            return true;
        }else{
            return false;
        }
    }
    public function get_services(){
        return $this->db->get('services')->result();
    }
    public function get_service_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('services')->result();
    }
    public function add_service($insert){
        if($this->db->insert('services',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function edit_service($update,$id){
        $this->db->where("id",$id);
        if($this->db->update('services',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function change_service_status($update,$id){
        $this->db->where("id",$id);
        if($this->db->update('services',$update)){
            return true;
        }else{
            return false;
        }
    }

    public function delete_service($id){
        $this->db->where('id',$id);
        if($this->db->delete('services')){
            return true;
        }else{
            return false;
        }
    }
}
?>