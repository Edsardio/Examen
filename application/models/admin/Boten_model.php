<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boten_model extends CI_Model{
	public function __construct(){
		//Laad de database in voor de volledige class
		//Database is aan te roepen als $this->db
		$this->load->database();
	}
	
	//Haal de gegevens van de nieuwe boot op uit het formulier en voeg deze toe aan de database
	public function add(){
		$bootnaam = $this->input->post('bootnaam');
		$bouwjaar = $this->input->post('bouwjaar');
		$type = $this->input->post('type_id');
		$data = array(
			'bootnaam' => $bootnaam,
			'bouwjaar' => $bouwjaar,
			'type_id' => $type
		);
		$this->db->insert('boten', $data);
	}
	
	//Haal de gegevens van alle boten op uit de database
	public function view(){
		$data = $this->db->get('boten');
		if($data->num_rows() > 0){
			foreach($data->result() as $boot){
				$boten[] = $boot;
			}
			$type = $this->db->query('SELECT * FROM typen');
			$response['d'] = $boten;
			$response['type'] = $type->result();
			return $response;
		}
	}
	
	//Haal de gegevens van een specifieke boot op uit de database
	//@param INT $a het boot_id
	public function edit($a){
		$d = $this->db->get_where('boten', array('boot_id' => $a));
		$type = $this->db->query('SELECT * FROM typen');
		$response['d'] = $d->result();
		$response['type'] = $type->result();
		return $response;
	}
	
	//Verwijder een boot door middel van het ID
	//@param INT $a het boot_id
	public function delete($a){
		$data = array(
			'boot_id' => NULL
		);
		$this->db->where('boot_id', $a);
		$this->db->update('koppelingen', $data);
		$this->db->delete('boten', array('boot_id' => $a));
		return;
	}
	
	//Update een boot in de database door middel van het ID
	//@param INT $a het boot_id
	public function update($a){
		$bootnaam = $this->input->post('bootnaam');
		$bouwjaar = $this->input->post('bouwjaar');
		$type = $this->input->post('boottype');
		$data = array(
			'bootnaam' => $bootnaam,
			'bouwjaar' => $bouwjaar,
			'type_id' => $type
		);
		$this->db->where('boot_id', $a);
		$this->db->update('boten', $data);
	}
}
