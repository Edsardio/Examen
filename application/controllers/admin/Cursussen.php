<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursussen extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//Laad de model voor de gehele controller
		//Model word aangeropen als $this->Cursussen_model
		$this->load->model('admin/Cursussen_model');
	}
	
	//Laad de view met alle cursusgegevens
	public function index(){
		$dt = $this->Cursussen_model->view();
		$data['data_get'] = $dt['d'];
		$data['typen'] = json_encode($dt['type']);
		$this->load->view('admin/cursussen_view', $data);
	}
	
	//Laad de view met de gegevens van een specifieke cursus om deze aan te kunnen passen
	public function edit(){
		$kd = $this->uri->segment(4);
		if($kd == NULL){
			redirect('admin/Cursussen');
		}
		$dt = $this->Cursussen_model->edit($kd);
		$data['cursusnaam'] = $dt['d'][0]->cursusnaam;
		$data['cursusprijs'] = $dt['d'][0]->cursusprijs;
		$data['cursusomschrijving'] = $dt['d'][0]->cursusomschrijving;
		$data['startdatum'] = $dt['d'][0]->startdatum;
		$data['einddatum'] = $dt['d'][0]->einddatum;
		$data['niveau'] = $dt['d'][0]->niveau;
		$data['type_id'] = $dt['d'][0]->type_id;
		$data['boottype'] = $dt['d'][0]->boottype;
		$data['typen'] = json_encode($dt['type']);
		$data['id'] = $kd;
		$this->load->view('admin/bewerk_cursus_view', $data);
	}
	
	//Verwijder de cursus aan de hand van het ID
	public function delete(){
		$u = $this->uri->segment(4);
		$this->Cursussen_model->delete($u);
		redirect('admin/Cursussen');
	}
	
	//Sla een nieuwe cursus op in de database
	public function save(){
		if($this->input->post('mit')){
			$this->Cursussen_model->add();
			redirect('admin/Cursussen');
		}else{
			redirect('admin/Cursussen/tambah');
		}
	}
	
	//Update de gegevens van een cursus in de database
	public function update(){
		if($this->input->post('mit')){
			$id = $this->input->post('id');
			$this->Cursussen_model->update($id);
			redirect('admin/Cursussen');
		}else{
			redirect('admin/Cursussen/edit/' . $id);
		}
	}	
}
