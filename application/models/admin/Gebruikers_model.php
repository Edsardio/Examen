<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gebruikers_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
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
	
	public function view(){
		$data = $this->db->get('klanten');
		if($data->num_rows() > 0){
			foreach($data->result() as $klant){
				$klanten[] = $klant;
			}
			return $klanten;
		}
	}
	
	public function edit($a){
		$d = $this->db->get_where('klanten', array('klant_id' => $a));
		return $d->result();
	}
	
	public function delete($a){
		$this->db->delete('user_group', array('klant_id' => $a));
		$this->db->delete('klanten', array('klant_id' => $a));
		return;
	}
	
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
