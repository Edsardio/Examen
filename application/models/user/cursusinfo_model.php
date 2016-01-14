<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Details_model extends CI_Model {
	public function __construct(){
		//Load the database
		$this->load->database();
	}
	
	public function getData() {
		//Get the customer details and return them to the controller
		$query = $this->db->query('SELECT * FROM cursussen');
		return $query->result();
	}
}
	