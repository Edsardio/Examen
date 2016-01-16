<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructeur_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
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
	
	public function view(){
		$data = $this->db->get('instructeurs');
		if($data->num_rows() > 0){
			foreach($data->result() as $instructeur){
				$instructeurs[] = $instructeur;
			}
			return $instructeurs;
		}
	}
	
	public function edit($a){
		$d = $this->db->get_where('instructeurs', array('instructeur_id' => $a));
		return $d->result();
	}
	
	public function delete($a){
		$data = array(
			'instructeur_id' => NULL
		);
		$this->db->where('instructeur_id', $a);
		$this->db->update('koppelingen', $data);
		$this->db->delete('instructeurs', array('instructeur_id' => $a));
		return;
	}
	
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
