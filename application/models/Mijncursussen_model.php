<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mijncursussen_model extends CI_Model {
    public function __construct(){
        //Load the database
        parent::__construct();
        $this->load->database();
    }

    public function getMyCursussen($user_id){
        $data = $this->db->query('SELECT cursussen.* FROM inschrijvingen INNER JOIN klanten, cursussen WHERE klanten.klant_id = "'. $user_id . '" AND cursussen.cursus_id = inschrijvingen.cursus_id AND klanten.klant_id = inschrijvingen.klant_id');
        return json_encode($data->result());
    }

}
