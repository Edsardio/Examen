<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	
	//Destroy alle sessions en redirect de gebruiker naar de home pagina
	public function index(){
		session_destroy();
		header('Location: home');
	}
}
	