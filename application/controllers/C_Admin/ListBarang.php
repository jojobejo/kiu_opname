<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class ListBarang extends CI_Controller

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

        $data['barang'] = $this->M_barang->getBarang()->result();
        $data['gudang'] = $this->M_barang->getGudang();

        $this->load->view('partial/admin/header');
        $this->load->view('content/admin/list_barang', $data);
        $this->load->view('partial/admin/footer');
    }

    public function addBarang()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $nmabarang      = $this->input->post('barang_isi');
        $sktor          = $this->input->post('sektor_isi');
        $gudang         = $this->input->post('gudang_isi');
        $stok           = $this->input->post('stok_isi');

        $data = array(
            'nama_barang'   => $nmabarang,
            'sektor'        => $sktor,
            'kode_gudang'   => $gudang,
            'stok_barang'   => $stok
        );

        $this->M_barang->addBarang($data);
        redirect('list_barang');
    }

    public function editBarang()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect('login');
        }

        $idbarang  = $this->input->post('id_isi');
        $nmabarang = $this->input->post('barang_isi');
        $sektor    = $this->input->post('sektor_isi');
        $stok      = $this->input->post('stok_isi');
        $gudang    = $this->input->post('gudang_isi');

        $data = array(
            'id_barang'     => $idbarang,
            'nama_barang'   => $nmabarang,
            'sektor'        => $sektor,
            'kode_gudang'   => $gudang,
            'stok_barang'   => $stok
        );

        $this->M_barang->editBarang($data, $idbarang);
        redirect('list_barang');
    }

    public function hapusBarang($hapus)

    {
        $idbarang = $hapus;

        $this->M_barang->barangdel($idbarang);

        redirect("list_barang");
    }
}
