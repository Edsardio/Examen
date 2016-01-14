<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inschrijven_model extends CI_Model {
	public function __construct(){
		//Load the database
		parent::__construct();
		$this->load->database();
	}

	public function view(){
		$data = $this->db->query('SELECT * FROM cursussen WHERE einddatum > "' . DATE("Y-m-d") . '"');
		if($data->num_rows() > 0){
			foreach($data->result() as $cursus){
				$cursussen[] = $cursus;
			}
			return $cursussen;
		}

	}

	public function getCursus($kd){
		$data = $this->db->query('SELECT * FROM cursussen WHERE cursus_id = "'. $kd .'"');
		return $data->result();
	}

	public function insertCursus($user_id, $cursus_id, $opmerking){
		$insert = $this->db->query('INSERT INTO `inschrijvingen`(`cursus_id`, `klant_id`, `opmerkingen`) VALUES ("' . $cursus_id . '", "' . $user_id . '", "' . $opmerking . '")');
		return $insert;
	}

	public function getUserDetails($user_id){
		$insert = $this->db->query('SELECT `voornaam`, `tussenvoegsel`, `achternaam`, `email` FROM `klanten` WHERE `klant_id` = "' . $user_id . '"');
		return $insert->result();
	}

	public function getCursusDetails($cursus_id){
		$insert = $this->db->query('SELECT `cursusnaam`, `startdatum`, `einddatum` FROM `cursussen` WHERE cursus_id = "' . $cursus_id . '"');
		return $insert->result();
	}
}
