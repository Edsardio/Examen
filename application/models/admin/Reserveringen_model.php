<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserveringen_model extends CI_Model{
	public function __construct(){
		//Laad de database in voor de volledige class
		//Database is aan te roepen als $this->db
		$this->load->database();
	}
	
	//Haal de gegevens van de nieuwe reservering op uit het formulier en voeg deze toe aan de database
	public function add(){
		$klant_id = $this->input->post('klant_id');
		$cursus_id = $this->input->post('cursus_id');
		$data = array(
			'klant_id' => $klant_id,
			'cursus_id' => $cursus_id
		);
		$this->db->insert('inschrijvingen', $data);
	}
	
	//Haal de gegevens van alle reserveringen op uit de database
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
	
	//Haal de gegevens van een specifieke reservering op uit de database
	//@param INT $a het klant_id
	//@param INT $b het cursus_id
	public function edit($a, $b){
		$d = $this->db->get_where('inschrijvingen', array('klant_id' => $a, 'cursus_id' => $b));
		return $d->result();
	}
	
	//Verwijder een reservering door middel van het ID
	//@param INT $a het klant_id
	//@param INT $b het cursus_id
	public function delete($a, $b){
		$this->db->delete('inschrijvingen', array('klant_id' => $a, 'cursus_id' => $b));
		return;
	}
	
	//Update een reservering in de database door middel van het ID
	//@param INT $id het klant_id
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
