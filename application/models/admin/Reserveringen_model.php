<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserveringen_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function add(){
		$klant_id = $this->input->post('klant_id');
		$cursus_id = $this->input->post('cursus_id');
		$data = array(
			'klant_id' => $klant_id,
			'cursus_id' => $cursus_id
		);
		$this->db->insert('inschrijvingen', $data);
	}
	
	public function view(){
		$data = $this->db->query('SELECT klanten.klant_id, klanten.voornaam, klanten.tussenvoegsel, klanten.achternaam, cursussen.cursus_id, cursussen.cursusnaam, inschrijvingen.opmerkingen 
									FROM inschrijvingen 
									INNER JOIN klanten, cursussen 
									WHERE klanten.klant_id = inschrijvingen.klant_id 
									AND cursussen.cursus_id = inschrijvingen.cursus_id');
		if($data->num_rows() > 0){
			foreach($data->result() as $reservering){
				$reserveringen[] = $reservering;
			}
			return $reserveringen;
		}
	}
	
	public function edit($a, $b){
		$d = $this->db->get_where('inschrijvingen', array('klant_id' => $a, 'cursus_id' => $b));
		return $d->result();
	}
	
	public function delete($a, $b){
		$this->db->delete('inschrijvingen', array('klant_id' => $a, 'cursus_id' => $b));
		return;
	}
	
	public function update($id){
		$cursus_id = $this->input->post('cursus_id');
		$data = array(
			'klant_id' => $id,
			'cursus_id' => $cursus_id
		);		
		$this->db->where('klant_id', $id);
		$this->db->where('cursus_id', $cursus_id);
		$this->db->update('inschrijvingen', $data);
	}
}
