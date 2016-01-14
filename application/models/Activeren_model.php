<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Activeren_model extends CI_Model {
	public function __construct(){
		//Load the database
		$this->load->database();
	}
	
	public function activate($id, $token){
		$utoken = $this->db->query('SELECT `validation_token` FROM `klanten` WHERE `klant_id` = ' . $id);
		if((string)$token === (string)$utoken->result()[0]->validation_token){
			$this->db->query('UPDATE `klanten` SET `validation_token` = null WHERE `klant_id` = ' . $id);
			return 'Succesvolle activatie';
		}else{
			return 'Ongeldige activatie';
		}
	}
}