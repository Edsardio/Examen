<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inschrijven extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Inschrijven_model');
	}

		public function index()
	{
		$data['data_get'] = $this->Inschrijven_model->view();
		$this->load->view('inschrijven_view', $data);
	}

		public function cursus()
		{
			$kd = $this->uri->segment(3);
			if($kd == NULL){
				redirect('inschrijven');
			}
			$dt = $this->Inschrijven_model->getCursus($kd);
			$data['cursus_id'] = $kd;
			$data['cursusnaam'] = $dt[0]->cursusnaam;
			$data['cursusprijs'] = $dt[0]->cursusprijs;
			$data['cursusomschrijving'] = $dt[0]->cursusomschrijving;
			$data['startdatum'] = $dt[0]->startdatum;
			$data['einddatum'] = $dt[0]->einddatum;
			$data['niveau'] = $dt[0]->niveau;
			$this->load->view('inschrijvencursus_view', $data);

		}

	public function inschrijven()
	{
		$this -> form_validation -> set_rules('description', 'description', 'trim');
//		var_dump($_POST);
		if ($this -> form_validation -> run() == FALSE) {
			echo "mislukt";
		} else {
			$user_id = $_SESSION['user_id'];
			$cursus_id = $this->uri->segment(3);
			$opmerking = $this->input->post('description');

			$this->load->model("Inschrijven_model");
			$this->Inschrijven_model->insertCursus($user_id, $cursus_id, $opmerking);

			$user = $this->Inschrijven_model->getUserDetails($user_id);
			$cursus = $this->Inschrijven_model->getCursusDetails($cursus_id);

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
			$this->email->to($user[0]->email);

			$this->email->subject('Succesvol aangemeld voor cursus');
			$this->email->message('
			<img src="' . $this->config->base_url() . 'application/views/assets/img/de_waai_logo.jpg" id="arrow-left">
			<br>
			Beste ' . $user[0]->voornaam . ' '. $user[0]->tussenvoegsel . '' . $user[0]->achternaam . ',
			<br><br>
			Je hebt je succesvol ingeschreven voor ' . $cursus[0]->cursusnaam . ', deze cursus zal plaats vinden van ' . $cursus[0]->startdatum . ' tot en met ' . $cursus[0]->einddatum  . '.
			<br>
			We hopen u dan te zien!
			<br><br>
			Met vriendelijke groet,
			<br>
			Zeilschool de Waai
			');

			$this->email->send();
			header('Location: ' . $this->config->base_url() . 'inschrijven');
		}

	}
	
	// public function getCursussen() {

	// 		$this->load->model('Cursusseninfo_model');
	// 		$json = json_encode($this->Cursusseninfo_model->getData());
	// 		$data = array('json' => $json);
	// 		$this->load->view('cursusseninfo_view', $json);
	// }
}