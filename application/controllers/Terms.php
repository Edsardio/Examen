<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends CI_Controller {
	
	//Laad de terms pagina view
	public function index()
	{
		$this->load->view('terms_view');
	}
}
