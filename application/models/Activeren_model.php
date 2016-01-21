<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Activeren_model extends CI_Model {
	public function __construct(){
		//Laad de database in voor de volledige class
		//Database is aan te roepen als $this->db
		$this->load->database();
	}
	
	//Activeer het account van de gebruiker door de validation_token op null te zetten
	//@param INT $id het klant_id
	//@param mixed $token de token die meegegeven is bij de registratie
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