<?php


class Login extends CI_Controller {
 
	function __construct(){
   		parent::__construct();
		$this->load->model('Login_model');
 	}
 
 	function index(){
 		$this->load->view('login_view');
 	}
 	
	function login(){
		$email = $_POST['email'];
		$password = $_POST['password'];
		echo $this->Login_model->checkUser($email, $password);
	}

	function logout(){
		session_destroy();
	}

}
