<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activeren extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Activeren_model');
	}
	
	public function index() {
		$this -> load -> view("activeren_view");
	}
	
	public function checkToken(){
		$id = $this->uri->segment(3);
		$token = $this->uri->segment(4);
		$data = array(
			'response' => $this->Activeren_model->activate($id, $token)
		);
		$this->load->view("login_view", $data);
	}
}
	