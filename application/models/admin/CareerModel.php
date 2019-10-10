<?php

// Created by T.Yogesh

class CareerModel extends CI_Model{
    public function get_career(){
        return $this->db->get('career')->result();
    }
    public function add_career($insert){
        if($this->db->insert('career',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function change_status($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('career',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_career($id){
        $this->db->where('id',$id);
        if($this->db->delete('career')){
            return true;
        }else{
            return false;
        }
    }
    public function get_career_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('career')->result();
    }
    public function edit_career($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('career',$update)){
            return true;
        }else{
            return false;
        }
    }
}

?>