<?php
// Created by T.Yogesh
class AchievementModel extends CI_Model{
    public function get(){
        return $this->db->get('achievement')->result();
    }
    public function get_achievement_by_id($id){
        return $this->db->get_where('achievement',['id'=>$id])->result();
    }
    
    public function add($insert){
        if($this->db->insert('achievement',$insert)){
            return true;
        }else{
            return false;
        }
    }
    public function status_change($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('achievement',$update)){
            return true;
        }else{
            return false;
        }
    }
    public function delete_achievement($id){
        $this->db->where('id',$id);
        if($this->db->delete('achievement')){
            return true;
        }else{
            return false;
        }
    }
    public function update($update,$id){
        $this->db->where('id',$id);
        if($this->db->update('achievement',$update)){
            return true;
        }else{
            return false;
        }
    }

}

?>