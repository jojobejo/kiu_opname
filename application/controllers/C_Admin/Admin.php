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
        $data['totalUser'] = $this->M_Opname->countUser()->result();
        $data['selisihFaktur'] = $this->M_Opname->hitung_persentase_kecocokan();

        $this->load->view('partial/admin/header',$data);
        $this->load->view('content/admin/dashboard', $data);
        $this->load->view('partial/admin/footer');
    }
}
