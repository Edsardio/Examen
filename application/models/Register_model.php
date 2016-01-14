<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function create_member()
	{
		$email = $this->input->post('email');
		$mobiel = $this->input->post('mobiel');
		if (substr($mobiel, 0, 1) == "0") {
			$mobiel = str_replace("0", "+31", substr($mobiel, 0, 1));
			$mobiel .= substr($mobiel, 1, 10);
		}
		$token = random_string('alnum', 16);
			$new_member_instert_data = array(
				'geslacht'=>$this->input->post('gender'),
				'voornaam'=>ucfirst(strtolower($this->input->post('voornaam'))),
				'tussenvoegsel'=>ucfirst(strtolower($this->input->post('tussenvoegsel'))),
				'achternaam'=>ucfirst(strtolower($this->input->post('achternaam'))),
				'adres'=>ucfirst(strtolower($this->input->post('adres'))),
				'postcode'=>strtoupper($this->input->post('postcode')),
				'woonplaats'=>ucfirst(strtolower($this->input->post('woonplaats'))),
				'telefoonnummer'=>$this->input->post('telefoonnummer'),
				'mobiel' => $mobiel,
				'email'=>strtolower($this->input->post('email')),
				'geboortedatum'=> $this->input->post('geboortedatum'),
				'niveau'=>ucfirst($this->input->post('niveau')),
				'password'=>crypt($this->input->post('password')),
				'validation_token'=>$token
				);

			$insert['succes'] = $this->db->insert('klanten', $new_member_instert_data);
			$insert['id'] = $this->db->insert_id();
			$this->db->query('INSERT INTO `user_group` (`klant_id`, `group_id`) VALUES ("' . $this->db->insert_id() . '", "1")');
			$insert['token'] = $token;
			return $insert;
		}
	
	
}

// public function insertData(){
	// 	$saltedPassword = crypt($password);
	// 	//TODO: Insert into database
	// 	//TODO: Return success message
	// 	//TODO: If failed return error message
	// }	

	// public function checkEmail($email){
	// 	$query = $this->db->query('SELECT * FROM klanten WHERE email = "' . $email . '"');
	// 	if($query->result()){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}

	// 	//TODO: check if function works
	// }