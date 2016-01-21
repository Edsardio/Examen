<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activeren extends CI_Controller {
	public function __construct(){
		parent::__construct();
		//Laad de model in voor de gehele class
		//Model aan te roepen als $this->Activeren_model
		$this->load->model('Activeren_model');
	}
	
	//Redirect naar de home controller wanneer iemand op de pagina komt
	public function index() {
		redirect('home');
	}
	
	//Laad de login view met de melding of het activeren gelukt is of niet
	public function checkToken(){
		$id = $this->uri->segment(3);
		$token = $this->uri->segment(4);
		$data = array(
			'response' => $this->Activeren_model->activate($id, $token)
		);
		$this->load->view("login_view", $data);
	}
}
	