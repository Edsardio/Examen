<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editgroups_model extends CI_Model{
    public function __construct(){
        $this->load->database();
    }

    public function view(){
        $data = $this->db->query('SELECT * FROM klanten INNER JOIN groups, user_group WHERE klanten.klant_id = user_group.klant_id AND groups.group_id = user_group.group_id AND groups.group_id != 3');
        if($data->num_rows() > 0){
            foreach($data->result() as $user){
                $users[] = $user;
            }
            return $users;
        }
    }

    public function getUserRoles($kd){
        $dt = $this->db->query('SELECT * FROM klanten INNER JOIN groups, user_group WHERE klanten.klant_id = user_group.klant_id AND groups.group_id = user_group.group_id AND klanten.klant_id = "'. $kd .'"');
        return $dt->result();
    }

    public function updateUserRoles($klant_id, $group_id){

        $data = array(
            'group_id' => $group_id

        );
        $this->db->where('klant_id', $klant_id);
        $this->db->update('user_group', $data);
    }




}
