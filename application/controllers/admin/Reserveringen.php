<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserveringen extends CI_Controller{
	public function __construct(){
		parent::__construct();
		//Laad de model voor de gehele controller
		//Model word aangeropen als $this->Reserveringen_model
		$this->load->model('admin/Reserveringen_model');
	}
	
	//Laad de view in met alle reserveringen
	public function index(){
		$data['data_get'] = $this->Reserveringen_model->view();
		$this->load->view('admin/reserveringen_view', $data);
	}
	
	//Laad de view met de gegevens van een specifieke reservering om deze aan te kunnen passen
	public function edit(){
		$kd = $this->uri->segment(4);
		$ci = $this->uri->segment(5);
		if($kd == NULL || $ci == NULL){
			redirect('admin/Reserveringen');
		}
		$dt = $this->Reserveringen_model->edit($kd, $ci);
		$data['cursus_id'] = $ci;
		$data['id'] = $kd;
		$this->load->view('admin/bewerk_reservering_view', $data);
	}
	
	//Verwijder de reservering aan de hand van het klant_id en cursus_id
	public function delete(){
		$u = $this->uri->segment(4);
		$ci = $this->uri->segment(5);
		$this->Reserveringen_model->delete($u, $ci);
		redirect('admin/Reserveringen');
	}
	
	//Sla een nieuwe reservering op in de database
	public function save(){
		if($this->input->post('mit')){
			$this->Reserveringen_model->add();
			redirect('admin/Reserveringen');
		}else{
			redirect('admin/Reserveringen/tambah');
		}
	}
	
	//Update de gegevens van een reservering in de database
	public function update(){
		if($this->input->post('mit')){
			$id = $this->input->post('id');
			$this->Reserveringen_model->update($id);
			redirect('admin/Reserveringen');
		}else{
			redirect('admin/Reserveringen/edit/' . $id);
		}
	}
}
