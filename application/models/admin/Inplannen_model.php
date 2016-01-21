<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inplannen_model extends CI_Model {
	public function __construct(){
		//Laad de database in voor de volledige class
		//Database is aan te roepen als $this->db
		$this->load->database();
	}
	
	//Haal alle cursussen op met een einddatum later dan de huidige datum
	public function getCursussen(){
		$query = $this->db->query('SELECT * FROM cursussen WHERE einddatum > "' . DATE("Y-m-d") . '"');
		return json_encode($query->result());
	}
	
	//Haal een specifieke cursus op
	//@param INT $id het cursus_id
	public function getCursus($id){
		$query = $this->db->query('SELECT * FROM cursussen INNER JOIN typen, boten WHERE cursussen.type_id = typen.type_id AND cursussen.cursus_id = "' . $id . '" AND boten.type_id = typen.type_id');		
		return json_encode($query->result());
	}
	
	//Haal alle instructeurs op
	public function getInstructeurs(){
		$query = $this->db->query('SELECT * FROM instructeurs');
		return json_encode($query->result());
	}
	
	//Haal alle inschrijvingen voor een cursus op
	//@param INT $id het cursus_id
	public function getInschrijvingen($id){
		$query = $this->db->query('SELECT * FROM inschrijvingen INNER JOIN klanten, cursussen WHERE cursussen.cursus_id = inschrijvingen.cursus_id AND klanten.klant_id = inschrijvingen.klant_id  AND inschrijvingen.cursus_id = "' . $id . '"');
		return json_encode($query->result());
	}
	
	//Voer de gegevens in, in de database
	//@param array $klanten een array met alle klanten die ingedeeld zijn in een boot
	//@param array $instructeurs een array met alle instructeurs die ingedeeld zijn in een boot
	//@param array $boten een array met alle boten waarvoor iemand is ingedeeld
	//@param INT $cursus het cursus_id
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
	
	//Haal een veld uit de database van de instructeur op
	//@param INT $id het instructeur_id
	//@param string $data het veld dat opgehaald moet worden
	public function instructeur($data, $id){
		$query = $this->db->query('SELECT ' . $data . ' FROM instructeurs WHERE instructeur_id = "' . $id . '"');
		$result = $query->result();
		return $result['0']->$data;
	}
	
	//Haal een veld uit de database van de klant op
	//@param INT $id het klant_id
	//@param string $data het veld dat opgehaald moet worden
	public function klant($data, $id){
		$query = $this->db->query('SELECT ' . $data . ' FROM klanten WHERE klant_id = "' . $id . '"');
		$result = $query->result();
		return $result['0']->$data;
	}
	
	//Haal een veld uit de database van de cursus
	//@param INT $id het cursus_id
	//@param string $data het veld dat opgehaald moet worden
	public function cursus($data, $id){
		$query = $this->db->query('SELECT ' . $data . ' FROM cursussen WHERE cursus_id = "' . $id . '"');
		$result = $query->result();	
		return $result['0']->$data;
	}
	
	
}