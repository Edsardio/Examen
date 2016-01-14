<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller {
	public function index()
	{
		//Load the view
		$this->load->view('details_view');
	}
	
	public function getDetails() {
		//Load the model
		$this->load->model('Details_model');
		//Check if user_id is set in a session, to check if user is logged in
		if(isset($_SESSION['user_id'])){
			//Create a json from the data the database gives
			echo json_encode($this->Details_model->getData($_SESSION['user_id']));
		}else{
			//Create a json with the error message
			echo json_encode('No user is logged in.');
		}
	}
}