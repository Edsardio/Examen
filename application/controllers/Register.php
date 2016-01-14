<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> library('form_validation');
		$this -> load -> helper('url');
		$this -> load -> model('Register_model');
	}

	public function index() {
		$this -> load -> view("register_view");
	}

	function check_captcha() {
		if (isset($_POST['submit'])) {
			$userIP = $_SERVER["REMOTE_ADDR"];
			$recaptchaResponse = $_POST['g-recaptcha-response'];
			$secretKey = "6LfS0BQTAAAAALPT1qwAdLNH9pAO-zVFrmWkwJXR";
			$request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}&remoteip={$userIP}");

			if (!strstr($request, "true")) {
				$this -> load -> view('register_view');
				echo "Esdert wa loat oe gaon";
			} else {
				$this->create_member();
			}
		}
	}

	function accept_terms() {
		if ($this -> input -> post('accept_terms_checkbox')) {
			return TRUE;
		} else {
			$error = 'Please read and accept our terms and conditions.';
			$this -> form_validation -> set_message('accept_terms', $error);
			return FALSE;
		}
	}

	public function create_member() {
		$this -> load -> library('form_validation');

		$this -> form_validation -> set_rules('voornaam', 'Voornaam', 'trim|required|min_length[3]|max_length[25]');
		$this -> form_validation -> set_rules('tussenvoegsel', 'Tussenvoegsel', 'trim|min_length[3]|max_length[25]');
		$this -> form_validation -> set_rules('achternaam', 'Achternaam', 'trim|required|min_length[3]|max_length[25]');
		$this -> form_validation -> set_rules('gender', 'Geslacht', 'trim|required');
		$this -> form_validation -> set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[25]');
		$this -> form_validation -> set_rules('repeatpassword', 'Password', 'trim|required|matches[password]');
		$this -> form_validation -> set_rules('adres', 'Adres', 'trim|required|min_length[5]|max_length[25]');
		$this -> form_validation -> set_rules('postcode', 'Postcode', 'trim|required|min_length[6]|max_length[7]');
		$this -> form_validation -> set_rules('woonplaats', 'Woonplaats', 'trim|required|min_length[3]|max_length[25]');
		$this -> form_validation -> set_rules('telefoonnummer', 'Telefoonnummer', 'trim|required|min_length[10]|max_length[12]');
		$this -> form_validation -> set_rules('mobiel', 'Mobiel', 'trim|min_length[10]|max_length[12]');
		$this -> form_validation -> set_rules('email', 'Email', 'trim|required|min_length[6]|max_length[50]|is_unique[klanten.email]');
		$this -> form_validation -> set_rules('geboortedatum', 'Geboortedatum', 'trim|required');
		$this -> form_validation -> set_rules('niveau', 'Niveau', 'trim|required');
		$this -> form_validation -> set_rules('accept_terms_checkbox', '', 'callback_accept_terms');
		
		$voornaam = $this->input->post('voornaam');
		$achternaam = $this->input->post('achternaam');
		$tussen = $this->input->post('tussenvoegsel');
		if(!isset($tussen)){
			$tussenvoegsel = $this->input->post('tussenvoegsel') . ' ';
		}else{
			$tussenvoegsel = "";
		}

		if ($this -> form_validation -> run() == FALSE) {
			$this -> load -> view('register_view');
		} else {
			$this -> load -> model('Register_model');
			$mresponse = $this->Register_model->create_member();
			if ($mresponse['succes'] === true) {
				$this->load->library('email');
				
				$config['protocol'] = "smtp";
				$config['smtp_host'] = "ssl://smtp.gmail.com";
				$config['smtp_user'] = "zswaai@gmail.com";
				$config['smtp_pass'] = "Deltion123";
				$config['smtp_port'] = "465";
				$config['smtp_timeout'] = "7";
				$config['charset'] = "utf-8";
				$config['newline'] = "\r\n";
				$config['validation'] = TRUE;
				$config['mailtype'] = "html";
				
				$this->email->initialize($config);
				
				$this->email->from('info@zs-waai.nl', 'Zeilschool de Waai');
				$this->email->to($this->input->post('email'));
				
				$this->email->subject('Activeer je account');
				$this->email->message('
				<img src="' . $this->config->base_url() . 'application/views/assets/img/de_waai_logo.jpg" id="arrow-left">
				<br>
				Beste ' . $voornaam . ' '. $tussenvoegsel . '' . $achternaam . ',
				<br><br>
				Om je registratie bij de website van Zeilschool de Waai succesvol af te ronden dient u uw registratie te bevestigen door op de volgende link te drukken.
				<br>
				<a href="' . $this->config->base_url() . 'Activeren/checkToken/' . $mresponse['id'] . '/' . $mresponse['token'] . '">Activeer account</a>
				<br><br>
				Met vriendelijke groet,
				<br>
				Zeilschool de Waai
				');
				
				$data['response'] = 'Succesvolle registratie';
				
				$this->email->send();
				
				$this -> load -> view('login_view', $data);
			} else {
				$data['response'] = 'Registratie niet succesvol';
				$this -> load -> view('register_view', $data);
			}
		}
	}
}

// public function register()
// {
// 	if(isset($password === $passwordrepeat))
// 	{
// 		$this->load->model('Register_model');
// 		if($this->Register_model->checkEmail($email))
// 		{
// 			$this->Register_model->insertData($password, $email);
// 		}
// 		return "E-mail already in use.";
// 	}
// 	return "Passwords don't match";
// }
