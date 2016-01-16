<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructeur extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Instructeur_model');
	}
	
	public function index(){
		$data['data_get'] = $this->Instructeur_model->view();
		// $this->load->view('admin/crud_header');
		$this->load->view('admin/instructeurs_view', $data);
		// $this->load->view('admin/crud_footer');
	}
	
	public function edit(){
		$kd = $this->uri->segment(4);
		if($kd == NULL){
			redirect('admin/Instructeur');
		}
		$dt = $this->Instructeur_model->edit($kd);
		$data['voornaam'] = $dt[0]->instructeur_voornaam;
		$data['tussenvoegsel'] = $dt[0]->instructeur_tussenvoegsel;
		$data['achternaam'] = $dt[0]->instructeur_achternaam;
		$data['geslacht'] = $dt[0]->instructeur_geslacht;
		$data['email'] = $dt[0]->instructeur_email;
		$data['id'] = $kd;
		// $this->load->view('admin/crud_header');
		$this->load->view('admin/bewerk_instructeur_view', $data);
		// $this->load->view('admin/crud_footer');
	}
	
	public function delete(){
		$u = $this->uri->segment(4);
		$this->Instructeur_model->delete($u);
		redirect('admin/instructeur');
	}
	
	public function save(){
		if($this->input->post('mit')){
			$this->Instructeur_model->add();
			redirect('admin/instructeur');
		}else{
			redirect('admin/instructeur/tambah');
		}
	}
	
	public function update(){
		if($this->input->post('mit')){
			$id = $this->input->post('id');
			$this->Instructeur_model->update($id);
			redirect('admin/instructeur');
		}else{
			$id = $this->input->post('id');
			redirect('admin/instructeur/edit/' . $id);
		}
	}
}
