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
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user") {
            redirect("login");
        }

        $sektor = $this->session->userdata('sektor');

        $data['page_title'] = 'Match Progress';
        $data['jmlBarang'] = $this->M_Opname->getMatchUser($sektor)->result();
        $data['opname'] = $this->M_Opname->getOpnameid($sektor);

        $this->load->view('partial/user/header', $data);
        $this->load->view('content/user/match_progress', $data);
        $this->load->view('partial/user/footer');
        $this->load->view('content/user/ajax/ajaxMatchProgress');
    }

    function matchProgress()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user") {
            redirect("login");
        }

        $sektor = $this->session->userdate('sektor');

        $data['barang'] = $this->M_barang->getBarang($sektor)->result();
        $data['selesih'] = $this->M_Opname->getHasilMatch()->result();
    }
}
