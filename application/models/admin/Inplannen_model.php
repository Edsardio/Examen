<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inplannen_model extends CI_Model {
	public function __construct(){
		//Load the database
		$this->load->database();
	}
	
	public function checkCursus($type){
		$query = $this->db->query('SELECT boottype 
									FROM typen 
									WHERE type_id = "' . $type . '"');
		return $query->result();
	}
	
	public function createCursus(){
		// die(var_dump($this->input->post('prijs')));
		$new_cursus = array(
				'cursusnaam'=>ucfirst(strtolower($this->input->post('naam'))),
				'cursusomschrijving'=>$this->input->post('description'),
				'niveau'=>$this->input->post('niveau'),
				'cursusprijs'=>$this->input->post('prijs'),
				'startdatum'=>$this->input->post('startdatum'),
				'einddatum'=>$this->input->post('einddatum'),
				'type_id'=>$this->input->post('typex')
				);
				
		$insert = $this->db->insert('cursussen', $new_cursus);
		return $insert;
	}
}