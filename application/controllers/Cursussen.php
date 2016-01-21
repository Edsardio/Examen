<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursussen extends CI_Controller {
	
	//Laad de cursussen pagina view
	public function index()
	{
		$this->load->view('cursussen_view');
	}
}