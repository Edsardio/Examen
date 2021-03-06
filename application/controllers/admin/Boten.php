<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boten extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//Laad de model voor de gehele controller
		//Model word aangeropen als $this->Boten_model
		$this->load->model('admin/Boten_model');
	}
	
	//Laad de view met alle bootgegevens
	public function index(){
		$dt = $this->Boten_model->view();
		$data['data_get'] = $dt['d'];
		$data['typen'] = json_encode($dt['type']);
		$this->load->view('admin/boten_view', $data);
	}
	
	//Laad de view met de gegevens van een specifieke boot om deze aan te kunnen passen
	public function edit(){
		$kd = $this->uri->segment(4);
		if($kd == NULL){
			redirect('admin/Boten');
		}
		$dt = $this->Boten_model->edit($kd);
		$data['bootnaam'] = $dt['d'][0]->bootnaam;
		$data['bouwjaar'] = $dt['d'][0]->bouwjaar;
		$data['boottype'] = $dt['d'][0]->type_id;
		$data['typen'] = json_encode($dt['type']);
		$data['id'] = $kd;
		$this->load->view('admin/bewerk_boot_view', $data);
	}
	
	//Verwijder de boot aan de hand van het ID
	public function delete(){
		$u = $this->uri->segment(4);
		$this->Boten_model->delete($u);
		redirect('admin/Boten');
	}
	
	//Sla een nieuwe boot op in de database
	public function save(){
		if($this->input->post('mit')){
			$this->Boten_model->add();
			redirect('admin/Boten');
		}else{
			redirect('admin/Boten/tambah');
		}
	}
	
	//Update de gegevens van een boot in de database
	public function update(){
		if($this->input->post('mit')){
			$id = $this->input->post('id');
			$this->Boten_model->update($id);
			redirect('admin/Boten');
		}else{
			redirect('admin/Boten/edit/' . $id);
		}
	}
	
	
}
