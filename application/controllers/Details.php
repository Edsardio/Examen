<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller {
	//Laad de contact pagina view
	public function index()
	{
		$this->load->view('details_view');
	}
	
	//Laad de model in voor deze method
	//Model aan te roepen als $this->Details_model
	//Controleer of er een user ingelogd is anders geef error message
	//Wanneer user ingelogd is geef de gegevens weer 
	public function getDetails() {
		$this->load->model('Details_model');
		if(isset($_SESSION['user_id'])){
			echo json_encode($this->Details_model->getData($_SESSION['user_id']));
		}else{
			echo json_encode('No user is logged in.');
		}
	}
}