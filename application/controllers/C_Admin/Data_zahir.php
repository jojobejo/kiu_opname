<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Data_zahir extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_barang");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $data['barang'] = $this->M_barang->getBarangZahir();

        $this->load->view('partial/admin/header');
        $this->load->view('content/admin/data_zahir', $data);
        $this->load->view('partial/admin/footer');
    }

    public function addBarang()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $kdbarang       = $this->input->post('kode_isi');
        $nmabarang      = $this->input->post('barang_isi');
        $qty            = $this->input->post('qty_isi');
        $exdate         = $this->input->post('date_isi');

        $data = array(
            'kode_barang'   => $kdbarang,
            'nama_barang'   => $nmabarang,
            'qty'            => $qty,
            'exp_date'      => $exdate
        );

        $this->M_barang->insertDataZahir($data);
        redirect('data_zahir');
    }

    public function editBarang()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect('login');
        }

        $idbarang       = $this->input->post('id_isi');
        $kdbarang       = $this->input->post('kode_isi');
        $nmabarang      = $this->input->post('barang_isi');
        $qty            = $this->input->post('qty_isi');
        $exdate         = $this->input->post('date_isi');

        $data = array(
            'id_barang'     => $idbarang,
            'kode_barang'   => $kdbarang,
            'nama_barang'   => $nmabarang,
            'qty'            => $qty,
            'exp_date'      => $exdate
        );

        $this->M_barang->editDataZahir($data,$idbarang);
        redirect('data_zahir');
    }

    public function hapusBarang($hapus)

    {
        $idbarang = $hapus;

        $this->M_barang->zahirDel($idbarang);

        redirect("list_barang");
    }
}
