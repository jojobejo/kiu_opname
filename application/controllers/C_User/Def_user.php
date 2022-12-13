<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Def_user extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Opname");
        $this->load->library('form_validation');
    }
    
    function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user") {
            redirect("login");
        }

        $sektor = $this->session->userdata('sektor');

        $data['barang'] = $this->M_Opname->countBaranguser($sektor)->result();
        $data['jmlBarang'] = $this->M_Opname->getMatchUser($sektor)->result();

        $this->load->view('partial/user/header');
        $this->load->view('content/user/dashboard',$data);
        $this->load->view('partial/user/footer');
    }
}
