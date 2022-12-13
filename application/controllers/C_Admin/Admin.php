<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Opname");
        $this->load->library('form_validation');
    }

    function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $data['page_title'] = 'Dashboard Admin'; 
        $data['selisihVivo'] = $this->M_Opname->countVivo()->result();
        $data['listVivo']   = $this->M_Opname->listMatchVivo()->result();
        $data['totalUser'] = $this->M_Opname->countUser()->result();
        $data['selisihFaktur'] = $this->M_Opname->countfakturPending()->result();
        $data['listPending']   = $this->M_Opname->listCountByPending()->result();

        $this->load->view('partial/admin/header',$data);
        $this->load->view('content/admin/dashboard', $data);
        $this->load->view('partial/admin/footer');
    }
}
