<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gebruikers_model extends CI_Model{
	public function __construct(){
		//Laad de database in voor de volledige class
		//Database is aan te roepen als $this->db
		$this->load->database();
	}
	
	//Haal de gegevens van de nieuwe gebruiker op uit het formulier en voeg deze toe aan de database
	public function add(){
		$voornaam = $this->input->post('voornaam');
		$tussenvoegsel = $this->input->post('tussenvoegsel');
		$achternaam = $this->input->post('achternaam');
		$geboortedatum = $this->input->post('geboortedatum');
		$geslacht = $this->input->post('geslacht');
		$adres = $this->input->post('adres');
		$postcode = $this->input->post('postcode');
		$woonplaats = $this->input->post('woonplaats');
		$telefoonnummer = $this->input->post('telefoonnummer');
		$mobiel = $this->input->post('mobiel');
		$email = $this->input->post('email');
		$niveau = $this->input->post('niveau');
		$wachtwoord = $this->input->post('wachtwoord');
		$data = array(
			'voornaam' => $voornaam,
			'tussenvoegsel' => $tussenvoegsel,
			'achternaam' => $achternaam,
			'geboortedatum' => $geboortedatum,
			'geslacht' => $geslacht,
			'adres' => $adres,
			'postcode' => $postcode,
			'woonplaats' => $woonplaats,
			'telefoonnummer' => $telefoonnummer,
			'mobiel' => $mobiel,
			'email' => $email,
			'niveau' => $niveau,
			'password' => crypt($wachtwoord)
		);
		$this->db->insert('klanten', $data);
		$this->db->query('INSERT INTO `user_group` (`klant_id`, `group_id`) VALUES ("' . $this->db->insert_id() . '", "1")');
	}
	
	//Haal de gegevens van alle gebruikers op uit de database
	public function view(){
		$data = $this->db->get('klanten');
		if($data->num_rows() > 0){
			foreach($data->result() as $klant){
				$klanten[] = $klant;
			}
			return $klanten;
		}
	}
	
	//Haal de gegevens van een specifieke klant op uit de database
	//@param INT $a het klant_id
	public function edit($a){
		$d = $this->db->get_where('klanten', array('klant_id' => $a));
		return $d->result();
	}
	
	//Verwijder een klant door middel van het ID
	//@param INT $a het klant_id
	public function delete($a){
		$data = array(
			'klant_id' => NULL
		);
		$this->db->where('klant_id', $a);
		$this->db->update('koppelingen', $data);
		$this->db->delete('user_group', array('klant_id' => $a));
		$this->db->delete('klanten', array('klant_id' => $a));
		return;
	}
	
	//Update een klant in de database door middel van het ID
	//@param INT $a het klant_id
	public function update($id){
		$voornaam = $this->input->post('voornaam');
		$tussenvoegsel = $this->input->post('tussenvoegsel');
		$achternaam = $this->input->post('achternaam');
		$geboortedatum = $this->input->post('geboortedatum');
		$geslacht = $this->input->post('geslacht');
		$adres = $this->input->post('adres');
		$postcode = $this->input->post('postcode');
		$woonplaats = $this->input->post('woonplaats');
		$telefoonnummer = $this->input->post('telefoonnummer');
		$mobiel = $this->input->post('mobiel');
		$email = $this->input->post('email');
		$niveau = $this->input->post('niveau');
		$data = array(
			'voornaam' => $voornaam,
			'tussenvoegsel' => $tussenvoegsel,
			'achternaam' => $achternaam,
			'geboortedatum' => $geboortedatum,
			'geslacht' => $geslacht,
			'adres' => $adres,
			'postcode' => $postcode,
			'woonplaats' => $woonplaats,
			'telefoonnummer' => $telefoonnummer,
			'mobiel' => $mobiel,
			'email' => $email,
			'niveau' => $niveau
		);
		// if(isset($this->input->post('wachtwoord'))){
			// $data['password'] = crypt($this->input->post('wachtwoord'));
		// }
		$this->db->where('klant_id', $id);
		$this->db->update('klanten', $data);
	}
}
