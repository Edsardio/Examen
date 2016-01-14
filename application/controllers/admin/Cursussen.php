<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursussen extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Cursussen_model');
	}
	
	public function index(){
		$data['data_get'] = $this->Cursussen_model->view();
		$this->load->view('admin/crud_header');
		$this->load->view('admin/cursussen_view', $data);
		$this->load->view('admin/crud_footer');
	}
	
	public function add(){
		$this->load->view('admin/crud_header');
		$this->load->view('admin/nieuwe_cursus_view');
		$this->load->view('admin/crud_footer');
	}
	
	public function edit(){
		$kd = $this->uri->segment(4);
		if($kd == NULL){
			redirect('admin/Cursussen');
		}
		$dt = $this->Cursussen_model->edit($kd);
		$data['cursusnaam'] = $dt[0]->cursusnaam;
		$data['cursusprijs'] = $dt[0]->cursusprijs;
		$data['cursusomschrijving'] = $dt[0]->cursusomschrijving;
		$data['startdatum'] = $dt[0]->startdatum;
		$data['einddatum'] = $dt[0]->einddatum;
		$data['niveau'] = $dt[0]->niveau;
		$data['type_id'] = $dt[0]->type_id;
		$data['id'] = $kd;
		$this->load->view('admin/crud_header');
		$this->load->view('admin/bewerk_cursus_view', $data);
		$this->load->view('admin/crud_footer');
	}
	
	public function delete(){
		$u = $this->uri->segment(4);
		$this->Cursussen_model->delete($u);
		redirect('admin/Cursussen');
	}
	
	public function save(){
		if($this->input->post('mit')){
			$this->Cursussen_model->add();
			redirect('admin/Cursussen');
		}else{
			redirect('admin/Cursussen/tambah');
		}
	}
	
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
