<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mijncursussen extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('Mijncursussen_model');
    }

    public function index()
    {
        $this->load->model('Mijncursussen_model');
        $user_id = $_SESSION['user_id'];

        $data['json'] = $this->Mijncursussen_model->getMyCursussen($user_id);

//        print_r($data['json']);

        $this->load->view('mijncursussen_view', $data);
    }
}