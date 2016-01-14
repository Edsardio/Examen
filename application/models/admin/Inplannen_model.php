<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inplannen_model extends CI_Model {
	public function __construct(){
		//Load the database
		$this->load->database();
	}
	
	public function getCursussen(){
		$query = $this->db->query('SELECT * FROM cursussen WHERE einddatum > "' . DATE("Y-m-d") . '"');
		return json_encode($query->result());
	}
	
	public function getCursus($id){
		$query = $this->db->query('SELECT * FROM cursussen INNER JOIN typen, boten WHERE cursussen.type_id = typen.type_id AND cursussen.cursus_id = "' . $id . '" AND boten.type_id = typen.type_id');		
		return json_encode($query->result());
	}
	
	public function getInstructeurs(){
		$query = $this->db->query('SELECT * FROM instructeurs');
		return json_encode($query->result());
	}
	
	public function getInschrijvingen($id){
		$query = $this->db->query('SELECT * FROM inschrijvingen INNER JOIN klanten, cursussen WHERE cursussen.cursus_id = inschrijvingen.cursus_id AND klanten.klant_id = inschrijvingen.klant_id  AND inschrijvingen.cursus_id = "' . $id . '"');
		return json_encode($query->result());
	}
	
	public function insert($klanten, $instructeurs, $boten, $cursus){
		$var = "";
		for($x = 0; $x < count($instructeurs); $x++){
			for($y = 0; $y < count($klanten) - 1; $y++){
				$qdata[$x . $y] = '("' . $boten[$x] . '", "' . $cursus . '", "' . $klanten[$x . $y] . '", "' . $instructeurs[$x] . '"),';
			}
			for($w = count($klanten) - 1; $w < count($klanten); $w++){
				$qdata[$x . $y] = '("' . $boten[$x] . '", "' . $cursus . '", "' . $klanten[$x . $y] . '", "' . $instructeurs[$x] . '")';
			}	
		}
		foreach($qdata as $values){
			$var = $var . $values;
		}
		if($this->db->query('INSERT INTO `koppelingen` (`boot_id`, `cursus_id`, `klant_id`, `instructeur_id`) VALUES ' . $var)){
			return 'Succesvol ingevoerd.';		
		}else{
			return 'Fout tijdens invoeren.';
		}
	}
}