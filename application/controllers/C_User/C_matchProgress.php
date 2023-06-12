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
        $data['jmlBarang']  = $this->M_Opname->getMatchUser($sektor)->result();
        
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

        $sektor = $this->session->userdata('sektor');

        $data['barang'] = $this->M_barang->getBarang($sektor)->result();
        $data['selesih'] = $this->M_Opname->getHasilMatch()->result();
    }

    public function editInputOpname()
    {
        $idopname       = $this->input->post('id_isi');
        $box            = $this->input->post('box_isi');
        $pcs            = $this->input->post('pcs_isi');
        $dimensi        = $this->input->post('dimensi_isi');
        $qty            = ($box * $dimensi) + $pcs;

        $data = array(
            'stok_box1'     => $box,
            'stok_pcs1'     => $pcs,
            'QTY1'          => $qty,
        );

        $this->M_Opname->editInputOpname($data, $idopname);
        redirect('u_match_progress');
    }
}
