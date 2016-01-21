<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Editgroups extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/Editgroups_model');
    }

    public function index(){
        //Stuurt alle user met gegevens naar de view
        $data['data_get'] = $this->Editgroups_model->view();
        $this->load->view('admin/editgroups_view', $data);
    }


    public function getUser()
    {
        //Haal user gegevens op aan de hand van het id
        $kd = $this->uri->segment(4);

        if($kd == NULL){
            redirect('editgroups');
        }
        $dt = $this->Editgroups_model->getUserRoles($kd);
        $data['klant_id'] = $kd;
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
        $data['group_id'] = $dt[0]->group_id;
        $data['group_name'] = $dt[0]->group_name;

        $this->load->view('admin/bewerk_group_view', $data);

    }

    public function updateGroup()
    {
        //Update user
        if ($this->input->post('button')) {
            $klant_id = $this->input->post('klant_id');
            $group_id = $this->input->post('group_id');
            $this->Editgroups_model->updateUserRoles($klant_id, $group_id);
            redirect('admin/Editgroups');
        } else {
            $klant_id = $this->input->post('klant_id');
            redirect('admin/Editgroups/getUser/"' . $klant_id . '"');
        }
    }

}
