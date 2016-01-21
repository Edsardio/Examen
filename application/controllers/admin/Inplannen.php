<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inplannen extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//Laad de model voor de gehele controller
		//Model word aangeropen als $this->inplannen
		$this->load->model('admin/Inplannen_model', 'inplannen');
	}
	
	//Laad de view in met alle cursussen
	public function index() {
		$data['cursussen'] = $this->inplannen->getCursussen();
		$this -> load -> view('admin/inplannen_view', $data);
	}
	
	//Laad de view in met een specifieke cursus aan de hand van het ID
	//Geef de data van alle instructeurs mee
	//Geef de data van de klanten die zich ingeschreven hebben voor de cursus
	public function cursus(){
		$data['id'] = $this->uri->segment(4);
		$data['cursus'] = $this->inplannen->getCursus($data['id']);
		$data['instructeurs'] = $this->inplannen->getInstructeurs();
		$data['inschrijvingen'] = $this->inplannen->getInschrijvingen($data['id']);
		$this->load->view('admin/cursusplan_view', $data);	
	}
	
	//Maak een array aan met alle ingevoerde klanten
	//Maak een array aan met alle ingevoerde instructeurs
	//Maak een array aan met alle boten waarbij waardes ingevuld zijn
	//Verstuur elke klant en instructeur een mail dat ze zijn ingepland
	//Zet de planning in de database
	//Laad de pagina met alle cursussen, geef een melding of het inplannen succesvol verlopen is of niet
	public function insert(){
		$data['id'] = $this->uri->segment(4);
		$data['cursus'] = json_decode($this->inplannen->getCursus($data['id']));
		$aantalboten = count($data['cursus']);
		$plaatsen = intval($data['cursus'][0]->plaatsen);
		$instructeurs = array();
		$klanten = array();
		$boten = array();
		$this->load->library('email');
				
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_user'] = "zswaai@gmail.com";
		$config['smtp_pass'] = "Deltion123";
		$config['smtp_port'] = "465";
		$config['smtp_timeout'] = "7";
		$config['charset'] = "utf-8";
		$config['newline'] = "\r\n";
		$config['validation'] = TRUE;
		$config['mailtype'] = "html";
		
		$this->email->initialize($config);
		
		for($x = 0; $x < $aantalboten; $x++){
			$boten[$x] = $data['cursus'][$x]->boot_id;
			if($this->input->post('instructeur'. $x) !== "NULL"){
				$instructeurs[$x] = $this->input->post('instructeur' . $x);
				
				$this->email->from('info@zs-waai.nl', 'Zeilschool de Waai');
				$this->email->to($this->inplannen->instructeur('instructeur_email', $instructeurs[$x]));
				
				$this->email->subject('U bent ingepland voor een cursus');
				$this->email->message('
				<img src="' . $this->config->base_url() . 'application/views/assets/img/de_waai_logo.jpg" id="arrow-left">
				<br>
				Beste ' . $this->inplannen->instructeur("instructeur_voornaam", $instructeurs[$x]) . ' '. $this->inplannen->instructeur("instructeur_tussenvoegsel", $instructeurs[$x]) . ' ' . $this->inplannen->instructeur("instructeur_achternaam", $instructeurs[$x]) . ',
				<br><br>
				U bent ingedeeld voor de cursus "' . $this->inplannen->cursus("cursusnaam", $data["id"]) . '.
				<br>
				Deze cursus zal beginnen op ' . $this->inplannen->cursus("startdatum", $data["id"]) . '.
				<br>
				Deze cursus zal eindigen op ' . $this->inplannen->cursus("einddatum", $data["id"]) . '.
				<br>
				We hopen u dan te zien!
				<br><br>
				Met vriendelijke groet,
				<br>
				Zeilschool de Waai
				');
				
				$this->email->send();
			}
			
			for($y = 0; $y < $plaatsen; $y++){
				if($this->input->post('klant'. $x . $y) !== "NULL"){
					$klanten[$x . $y] = $this->input->post('klant' . $x . $y);
					
					$this->email->from('info@zs-waai.nl', 'Zeilschool de Waai');
					$this->email->to($this->inplannen->klant('email', $klanten[$x . $y]));
					
					$this->email->subject('U bent ingepland voor een cursus');
					$this->email->message('
					<img src="' . $this->config->base_url() . 'application/views/assets/img/de_waai_logo.jpg" id="arrow-left">
					<br>
					Beste ' . $this->inplannen->klant("voornaam", $klanten[$x . $y]) . ' '. $this->inplannen->klant("tussenvoegsel", $klanten[$x . $y]) . ' ' . $this->inplannen->klant("achternaam", $klanten[$x . $y]) . ',
					<br><br>
					U bent ingedeeld voor de cursus "' . $this->inplannen->cursus("cursusnaam", $data["id"]) . '.
					<br>
					Deze cursus zal beginnen op ' . $this->inplannen->cursus("startdatum", $data["id"]) . '.
					<br>
					Deze cursus zal eindigen op ' . $this->inplannen->cursus("einddatum", $data["id"]) . '.
					<br>
					We hopen u dan te zien!
					<br><br>
					Met vriendelijke groet,
					<br>
					Zeilschool de Waai
					');
					
					$this->email->send();
				}
			}
		}
		$response['cursussen'] = $this->inplannen->getCursussen();
		$response['response'] = $this->inplannen->insert($klanten, $instructeurs, $boten, $data['id']);
		$this->load->view('admin/inplannen_view', $response);
	}
}
