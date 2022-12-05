<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class FakturPending extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("M_barang");
        $this->load->model("M_Opname");
        $this->load->library('form_validation');
    }

    function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $data['barang'] = $this->M_barang->getFakturPending();

        $this->load->view('partial/admin/header');
        $this->load->view('content/admin/fakturPending', $data);
        $this->load->view('partial/admin/footer');
    }

    function insertDataPending()
    {
        $kdbarang       = $this->input->post('kode_isi');
        $nmabarang      = $this->input->post('nama_isi');
        $expdate        = $this->input->post('exp_isi');
        $qtyisi         = $this->input->post('qty_isi');
        $data = array(
            'kode_barang'   => $kdbarang,
            'nama_barang'   => $nmabarang,
            'exp_date'      => $expdate,
            'qty'           => $qtyisi
        );

        $this->M_barang->insertFakturPending($data);
        redirect('faktur_pending');
    }
}