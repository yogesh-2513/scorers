<?php

// Created by T.Yogesh

class PromotionModel extends CI_Model{
    public function get(){
        return $this->db->get('promotion')->result();
    }
    public function get_promotion_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('promotion')->result();
    }
    public function add_promotion($insert){
        if($this->db->insert('promotion',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function add_content($insert){
        if($this->db->insert('promotion_content',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function get_content(){
        return $this->db->get('promotion_content')->result();
    }
    public function delete_promotion_content($id){
        $this->db->where('id',$id);
        if($this->db->delete('promotion_content')){
            return true;
        }else{
            return false;
        }
    }
    public function get_promotion_content_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('promotion_content')->result();
    }
    public function content_status_change($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('promotion_content',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function update_content($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('promotion_content',$update)){
            return true;
        }else{
            return false;
        }
    }

    public function edit_promotion($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('promotion',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_promotion($id){
        $this->db->where('id',$id);
        if($this->db->delete('promotion')){
            return true;
        }else{
            return false;
        }
    }

}

?>