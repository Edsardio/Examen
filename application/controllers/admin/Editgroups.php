<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editgroups extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/Editgroups_model');
    }

    public function index(){
        $data['data_get'] = $this->Editgroups_model->view();
        $data['fillSelect'] = $this->Editgroups_model->getRoles();
        $this->load->view('admin/editgroups_view', $data);
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
        $this->load->view('admin/crud_header');
        $this->load->view('admin/bewerk_instructeur_view', $data);
        $this->load->view('admin/crud_footer');
    }

}
