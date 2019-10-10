<?php

// Created by T.Yogesh

class ModulesModel extends CI_Model{
    public function get_modules(){
        return $this->db->get('modules')->result();
    }
    public function change_status($update,$id){
        $this->db->where('id',$id);
        return $this->db->update('modules',$update)?true:false;
    }
    
}