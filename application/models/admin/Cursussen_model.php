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
			'type_id' => $type
		);
		$this->db->insert('cursussen', $data);
	}
	
	public function view(){
		$data = $this->db->get('cursussen');
		if($data->num_rows() > 0){
			foreach($data->result() as $cursus){
				$cursussen[] = $cursus;
			}
			return $cursussen;
		}
	}
	
	public function edit($a){
		$d = $this->db->get_where('cursussen', array('cursus_id' => $a));
		return $d->result();
	}
	
	public function delete($a){
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
			'$niveau' => niveau,
			'type_id' => $type
		);
		$this->db->where('cursus_id', $id);
		$this->db->update('cursussen', $data);
	}
}
