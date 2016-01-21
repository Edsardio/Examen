<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Details_model extends CI_Model {
	public function __construct(){
		//Laad de database in voor de volledige class
		//Database is aan te roepen als $this->db
		$this->load->database();
	}
	
	//Haal alle gegevens van de ingelogde gebruiker op
	//@param INT $user_id het klant_id
	public function getData($user_id) {
		$query = $this->db->query('SELECT * FROM klanten WHERE klant_id = "' . $user_id . '"');
		return $query->result();
	}
}
	