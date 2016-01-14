<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boten_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function add(){
		$bootnaam = $this->input->post('bootnaam');
		$bouwjaar = $this->input->post('bouwjaar');
		$type = $this->input->post('boottype');
		$data = array(
			'bootnaam' => $bootnaam,
			'bouwjaar' => $bouwjaar,
			'type_id' => $type
		);
		$this->db->insert('boten', $data);
	}
	
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
	
	public function edit($a){
		$d = $this->db->get_where('boten', array('boot_id' => $a));
		$type = $this->db->query('SELECT * FROM typen');
		$response['d'] = $d->result();
		$response['type'] = $type->result();
		return $response;
	}
	
	public function delete($a){
		$this->db->delete('boten', array('boot_id' => $a));
		return;
	}
	
	public function update($id){
		$bootnaam = $this->input->post('bootnaam');
		$bouwjaar = $this->input->post('bouwjaar');
		$type = $this->input->post('boottype');
		$data = array(
			'bootnaam' => $bootnaam,
			'bouwjaar' => $bouwjaar,
			'type_id' => $type
		);
		$this->db->where('boot_id', $id);
		$this->db->update('boten', $data);
	}
}
