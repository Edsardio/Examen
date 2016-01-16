<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursussen_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function add(){
		$naam = $this->input->post('cursusnaam');
		$prijs = $this->input->post('cursusprijs');
		$omschrijving = $this->input->post('cursusomschrijving');
		$start = $this->input->post('startdatum');
		$eind = $this->input->post('einddatum');
		$niveau = $this->input->post('niveau');
		$type_id = $this->input->post('type_id');
		$data = array(
			'cursusnaam' => $naam,
			'cursusprijs' => $prijs,
			'cursusomschrijving' => $omschrijving,
			'startdatum' => $start,
			'einddatum' => $eind,
			'niveau' => niveau,
			'type_id' => $type_id
		);
		$this->db->insert('cursussen', $data);
	}
	
	public function view(){
		$data = $this->db->get('cursussen');
		if($data->num_rows() > 0){
			foreach($data->result() as $cursus){
				$cursussen[] = $cursus;
			}
			$type = $this->db->query('SELECT * FROM typen');
			$response['d'] = $cursussen;
			$response['type'] = $type->result();
			return $response;
		}
	}
	
	public function edit($a){
		$d = $this->db->query('SELECT * FROM cursussen INNER JOIN typen WHERE cursussen.cursus_id = '. $a .' AND typen.type_id = cursussen.type_id');
		$type = $this->db->query('SELECT * FROM typen');
		$response['d'] = $d->result();
		$response['type'] = $type->result();
		return $response;
	}
	
	public function delete($a){
		$data = array(
			'cursus_id' => NULL
		);
		$this->db->where('cursus_id', $a);
		$this->db->update('koppelingen', $data);
		$this->db->delete('cursussen', array('cursus_id' => $a));
		return;
	}
	
	public function update($id){
		$naam = $this->input->post('cursusnaam');
		$prijs = $this->input->post('cursusprijs');
		$omschrijving = $this->input->post('cursusomschrijving');
		$start = $this->input->post('startdatum');
		$eind = $this->input->post('einddatum');
		$niveau = $this->input->post('niveau');
		$type_id = $this->input->post('type_id');
		$data = array(
			'cursusnaam' => $naam,
			'cursusprijs' => $prijs,
			'cursusomschrijving' => $omschrijving,
			'startdatum' => $start,
			'einddatum' => $eind,
			'niveau' => $niveau,
			'type_id' => $type_id
		);
		$this->db->where('cursus_id', $id);
		$this->db->update('cursussen', $data);
	}
}
