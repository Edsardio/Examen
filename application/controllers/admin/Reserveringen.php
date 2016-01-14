<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserveringen extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/Reserveringen_model');
	}
	
	public function index(){
		$data['data_get'] = $this->Reserveringen_model->view();
		// $this->load->view('admin/crud_header');
		$this->load->view('admin/reserveringen_view', $data);
		// $this->load->view('admin/crud_footer');
	}
	
	public function add(){
		// $this->load->view('admin/crud_header');
		$this->load->view('admin/nieuwe_reservering_view');
		// $this->load->view('admin/crud_footer');
	}
	
	public function edit(){
		$kd = $this->uri->segment(4);
		$ci = $this->uri->segment(5);
		if($kd == NULL || $ci == NULL){
			redirect('admin/Reserveringen');
		}
		$dt = $this->Reserveringen_model->edit($kd, $ci);
		$data['cursus_id'] = $ci;
		$data['id'] = $kd;
		// $this->load->view('admin/crud_header');
		$this->load->view('admin/bewerk_reservering_view', $data);
		// $this->load->view('admin/crud_footer');
	}
	
	public function delete(){
		$u = $this->uri->segment(4);
		$ci = $this->uri->segment(5);
		$this->Reserveringen_model->delete($u, $ci);
		redirect('admin/Reserveringen');
	}
	
	public function save(){
		if($this->input->post('mit')){
			$this->Reserveringen_model->add();
			redirect('admin/Reserveringen');
		}else{
			redirect('admin/Reserveringen/tambah');
		}
	}
	
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
