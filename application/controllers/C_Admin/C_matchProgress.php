<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class C_matchProgress extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Opname");
        $this->load->model("M_barang");
        $this->load->library('form_validation');
    }

    function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $data['total']  = $this->M_Opname->TotalBarangZahir();

        $this->load->view('partial/admin/header');
        $this->load->view('content/admin/match_progress');
        $this->load->view('partial/admin/footer');
        $this->load->view('content/admin/ajax/ajaxMatchProgress');
    }
}
