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
    public function getRoles(){
        $group = $this->db->query('SELECT group_id, group_name FROM groups WHERE group_id != 3');
        return $group->result();
        }

    public function edit($a){
        $d = $this->db->get_where('instructeurs', array('instructeur_id' => $a));
        return $d->result();
    }

}
