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
        $this->load->view("mijncursussen_view");
    }

    public function getUserCursussen()
    {
        $this->load->model('Mijncursussen_model');
        $user_id = $_SESSION['user_id'];

        $JSON = $this->Mijncursussen_model->getMyCursussen($user_id);

        print_r($JSON);

        //$this->load->view('mijncursussen_view', $JSON);




    }
}                                                                                                                                                                                                                                                              