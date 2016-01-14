<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inplannen extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Inplannen_model', 'inplannen');
	}
	
	public function index() {
		$data['cursussen'] = $this->inplannen->getCursussen();
		$this -> load -> view('admin/inplannen_view', $data);
	}
	
	public function cursus(){
		$data['id'] = $this->uri->segment(4);
		$data['cursus'] = $this->inplannen->getCursus($data['id']);
		$data['instructeurs'] = $this->inplannen->getInstructeurs();
		$data['inschrijvingen'] = $this->inplannen->getInschrijvingen($data['id']);
		$this->load->view('admin/cursusplan_view', $data);	
	}
	
	public function insert(){
		$data['id'] = $this->uri->segment(4);
		$data['cursus'] = json_decode($this->inplannen->getCursus($data['id']));
		$aantalboten = count($data['cursus']);
		$plaatsen = intval($data['cursus'][0]->plaatsen);
		$instructeurs = array();
		$klanten = array();
		$boten = array();
		for($x = 0; $x < $aantalboten; $x++){
			$boten[$x] = $data['cursus'][$x]->boot_id;
			if($this->input->post('instructeur'. $x) !== "NULL"){
				$instructeurs[$x] = $this->input->post('instructeur' . $x);
			}
			for($y = 0; $y < $plaatsen; $y++){
				if($this->input->post('klant'. $x . $y) !== "NULL"){
					$klanten[$x . $y] = $this->input->post('klant' . $x . $y);
				}
			}
		}
		$response['cursussen'] = $this->inplannen->getCursussen();
		$response['response'] = $this->inplannen->insert($klanten, $instructeurs, $boten, $data['id']);
		$this->load->view('admin/inplannen_view', $response);
	}
}
