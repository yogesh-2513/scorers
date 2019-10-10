<?php

// Created by T.Yogesh

class AboutusModel extends CI_Model{
    public function get(){
        return $this->db->get('aboutus')->result();
    }
    public function add($insert){
        if($this->db->insert('aboutus',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function status_change($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('aboutus',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_content($id){
        $this->db->where('id',$id);
        if($this->db->delete('aboutus')){
            return true;
        }else{
            return false;
        }
    }
    public function add_member($insert){
        if($this->db->insert('team',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function get_team(){
        return $this->db->get('team')->result();
    }

    public function change_member_status($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('team',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_member($id){
        $this->db->where('id',$id);
        if($this->db->delete('team')){
            return true;
        }else{
            return false;
        }
    }
    public function get_content_by_id($id){
        return $this->db->get_where('aboutus',['id'=>$id])->result();
    }
    public function update($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('aboutus',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function get_member_by_id($id){
        return $this->db->get_where('team',['id'=>$id])->result();
    }
    public function edit_member($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('team',$update)){
            return true;    
        }else{
            return false;
        }
    }
}

?>