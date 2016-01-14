<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inplannen extends CI_Controller {
	public function index() {
		//Load the view
		$this -> load -> view('admin/inplannen_view');
	}

	public function newCursus() {
		$this -> load -> library('form_validation');

		$this -> form_validation -> set_rules('naam', 'naam', 'trim|required|min_length[3]|max_length[25]');
		$this -> form_validation -> set_rules('niveau', 'niveau', 'trim|required');
		$this -> form_validation -> set_rules('description', 'description', 'trim|required');
		$this -> form_validation -> set_rules('startdatum', 'startdatum', 'trim|required');
		$this -> form_validation -> set_rules('einddatum', 'einddatum', 'trim|required');
		$this -> form_validation -> set_rules('typex', 'typex', 'trim|required');
		$this -> form_validation -> set_rules('prijs', 'prijs', 'trim|required');

		if ($this -> form_validation -> run() == FALSE) {
			echo '<script>alert("Cursus aanmaken niet gelukt. Er ontbreken velden.");</script>';
			$this -> load -> view('admin/inplannen_view');
			// $this -> form_validation -> set_error_delimiters('<div class="ui error message">', '</div>');
		} else {
			$this -> load -> model('admin/Inplannen_model');
			if ($query = $this -> Inplannen_model -> createCursus()) {
				$data['cursus_created'] = 'De cursus is succesvol aangemaakt<br>';
				$this -> load -> view('admin/inplannen_view', $data);
				echo '<script>alert("Cursus succesvol aangemaakt.");</script>';
			} else {
				$this -> load -> view('admin/inplannen_view');
			}
		}
	}

	public function getDetails() {
		if (isset($_POST['type'])) {
			$type = $_POST['type'];
			$this -> load -> model('admin/Inplannen_model');
			echo json_encode($this -> Inplannen_model -> checkCursus($type));
		} else {
			echo json_encode('Geen niveau gevonden.');
		}
	}

}
