<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gebruikers extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//Laad de model voor de gehele controller
		//Model word aangeropen als $this->Gebruikers_model
		$this->load->model('admin/Gebruikers_model');
	}
	
	//Laad de view met alle gebruikersgegevens
	public function index(){
		$data['data_get'] = $this->Gebruikers_model->view();
		$this->load->view('admin/gebruikers_view', $data);
	}
	
	//Laad de view met de gegevens van een specifieke gebruiker om deze aan te kunnen passen
	public function edit(){
		$kd = $this->uri->segment(4);
		if($kd == NULL){
			redirect('admin/Gebruikers');
		}
		$dt = $this->Gebruikers_model->edit($kd);
		$data['voornaam'] = $dt[0]->voornaam;
		$data['tussenvoegsel'] = $dt[0]->tussenvoegsel;
		$data['achternaam'] = $dt[0]->achternaam;
		$data['geboortedatum'] = $dt[0]->geboortedatum;
		$data['geslacht'] = $dt[0]->geslacht;
		$data['adres'] = $dt[0]->adres;
		$data['postcode'] = $dt[0]->postcode;
		$data['woonplaats'] = $dt[0]->woonplaats;
		$data['telefoonnummer'] = $dt[0]->telefoonnummer;
		$data['mobiel'] = $dt[0]->mobiel;
		$data['email'] = $dt[0]->email;
		$data['id'] = $kd;
		// $this->load->view('admin/crud_header');
		$this->load->view('admin/bewerk_gebruiker_view', $data);
		// $this->load->view('admin/crud_footer');
	}
	
	//Verwijder de gebruiker aan de hand van het ID
	public function delete(){
		$u = $this->uri->segment(4);
		$this->Gebruikers_model->delete($u);
		redirect('admin/Gebruikers');
	}
	
	//Sla een nieuwe gebruiker op in de database
	public function save(){
		if($this->input->post('mit')){
			$this->Gebruikers_model->add();
			redirect('admin/Gebruikers');
		}else{
			redirect('admin/Gebruikers/tambah');
		}
	}
	
	//Update de gegevens van een gebruiker in de database
	public function update(){
		if($this->input->post('mit')){
			$id = $this->input->post('id');
			$this->Gebruikers_model->update($id);
			redirect('admin/Gebruikers');
		}else{
			redirect('admin/Gebruikers/edit/' . $id);
		}
	}	
}
