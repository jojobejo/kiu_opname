<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class C_summaryOpaname extends CI_Controller
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

        $data['selisih']  = $this->M_Opname->countAll()->result();
        $data['listBarang'] = $this->M_Opname->listBarangMatch()->result();

        $data['selisihVivo'] = $this->M_Opname->countVivo()->result();
        $data['listVivo']   = $this->M_Opname->listMatchVivo()->result();

        $data['selisihFaktur'] = $this->M_Opname->countfakturPending()->result();
        $data['listPending']   = $this->M_Opname->listCountByPending()->result();

        $this->load->view('partial/admin/header');
        $this->load->view('content/admin/summary_opname',$data);
        $this->load->view('partial/admin/footer');
    }
}
