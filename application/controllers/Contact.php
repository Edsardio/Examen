<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	//Laad de contact pagina view
	public function index()
	{
		$this->load->view('contact_view');
	}
	
}