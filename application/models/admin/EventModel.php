<?php

// Created by T.Yogesh

class EventModel extends CI_Model{
    public function get_events(){
        return $this->db->get('events')->result();
    }
    public function get_event_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('events')->result();
    }
    public function add_event($insert){
        if($this->db->insert('events',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function change_status($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('events',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_event($id){
        $this->db->where('id',$id);
        if($this->db->delete('events')){
            return true;
        }else{
            return false;
        }
    }
    public function edit_event($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('events',$update)){
            return true;
        }else{
            return false;
        }
    }
}

?>