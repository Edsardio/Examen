<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructeur_model extends CI_Model{
	public function __construct(){
		//Laad de database in voor de volledige class
		//Database is aan te roepen als $this->db
		$this->load->database();
	}
	
	//Haal de gegevens van de nieuwe instructeur op uit het formulier en voeg deze toe aan de database
	public function add(){
		$voornaam = $this->input->post('instructeur_voornaam');
		$tussenvoegsel = $this->input->post('instructeur_tussenvoegsel');
		$achternaam = $this->input->post('instructeur_achternaam');
		$geslacht = $this->input->post('instructeur_geslacht');
		$email = $this->input->post('instructeur_email');
		$data = array(
			'instructeur_voornaam' => $voornaam,
			'instructeur_tussenvoegsel' => $tussenvoegsel,
			'instructeur_achternaam' => $achternaam,
			'instructeur_geslacht' => $geslacht,
			'instructeur_email' => $email
		);
		$this->db->insert('instructeurs', $data);
	}
	
	//Haal de gegevens van alle instructeurs op uit de database
	public function view(){
		$data = $this->db->get('instructeurs');
		if($data->num_rows() > 0){
			foreach($data->result() as $instructeur){
				$instructeurs[] = $instructeur;
			}
			return $instructeurs;
		}
	}
	
	//Haal de gegevens van een specifieke instructeur op uit de database
	//@param INT $a het instructeur_id
	public function edit($a){
		$d = $this->db->get_where('instructeurs', array('instructeur_id' => $a));
		return $d->result();
	}
	
	//Verwijder een instructeur door middel van het ID
	//@param INT $a het instructeur_id
	public function delete($a){
		$data = array(
			'instructeur_id' => NULL
		);
		$this->db->where('instructeur_id', $a);
		$this->db->update('koppelingen', $data);
		$this->db->delete('instructeurs', array('instructeur_id' => $a));
		return;
	}
	
	//Update een instructeur in de database door middel van het ID
	//@param INT $a het instructeur_id
	public function update($id){
		$voornaam = $this->input->post('instructeur_voornaam');
		$tussenvoegsel = $this->input->post('instructeur_tussenvoegsel');
		$achternaam = $this->input->post('instructeur_achternaam');
		$geslacht = $this->input->post('instructeur_geslacht');
		$email = $this->input->post('instructeur_email');
		$data = array(
			'instructeur_voornaam' => $voornaam,
			'instructeur_tussenvoegsel' => $tussenvoegsel,
			'instructeur_achternaam' => $achternaam,
			'instructeur_geslacht' => $geslacht,
			'instructeur_email' => $email
		);		
		$this->db->where('instructeur_id', $id);
		$this->db->update('instructeurs', $data);
	}
}
