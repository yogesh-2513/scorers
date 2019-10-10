<?php

// Created by T.Yogesh

class Slideshow_Model extends CI_Model{
    public function add($insert){
        if($this->db->insert('slideshow',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function get(){
        return $this->db->get('slideshow')->result();
    }
    public function slideshow_status($update,$id){
        // $this->db->set($update);
        $this->db->where('id',$id);
        if($this->db->update('slideshow',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function slideshow_delete($id){
        $this->db->where('id',$id);
        if($this->db->delete('slideshow')){
            return true;
        }else{
            return false;
        }
    }
}

?>