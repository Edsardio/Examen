<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function index()
	{
		//Load the view
		$this->load->view('contact_view');
	}
	
}