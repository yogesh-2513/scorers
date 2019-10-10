<?php

// Created by T.Yogesh

class SubscribersModel extends CI_Model{
    public function get(){
        return $this->db->get('subscribers')->result();
    }
    public function delete_subscriber($id){
        $this->db->where('id',$id);
        if($this->db->delete('subscribers')){
            return true;
        }else{
            return false;
        }
    }
}

?>