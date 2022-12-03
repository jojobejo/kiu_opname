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

        $data['barang'] = $this->M_barang->getAll();
        $data['idopname'] = $this->M_barang->getidOpname()->result();
        

        $this->load->view('partial/admin/header');
        $this->load->view('content/admin/list_barang', $data);
        $this->load->view('partial/admin/footer');
    }

    public function addBarang()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }
        
        $kdbarang       = $this->input->post('kode_isi');
        $nmabarang      = $this->input->post('barang_isi');
        $sktor          = $this->input->post('sektor_isi');
        $panjang        = $this->input->post('panjang_isi');
        $lebar          = $this->input->post('lebar_isi');
        $tinggi         = $this->input->post('tinggi_isi');
        $dimensi        = $panjang * $lebar * $tinggi;
        $exdate         = $this->input->post('date_isi');
        $data = array(
            'kode_barang'   => $kdbarang,
            'nama_barang'   => $nmabarang,
            'sektor'        => $sktor,
            'panjang'       => $panjang,
            'lebar'         => $lebar,
            'tinggi'        => $tinggi,
            'hasil_dimensi' => $dimensi,
            'exp_date'      => $exdate
        );

        $this->M_barang->addBarang($data);
        redirect('list_barang');
    }

    public function editBarang()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect('login');
        }

        $idbarang       = $this->input->post('id_isi');
        $kdbarang       = $this->input->post('kode_isi');
        $nmabarang      = $this->input->post('barang_isi');
        $sktor          = $this->input->post('sektor_isi');
        $panjang        = $this->input->post('panjang_isi');
        $lebar          = $this->input->post('lebar_isi');
        $tinggi         = $this->input->post('tinggi_isi');
        $dimensi        = $panjang * $lebar * $tinggi;
        $exdate         = $this->input->post('date_isi');
        $data = array(
            'id_barang'     => $idbarang,
            'kode_barang'   => $kdbarang,
            'nama_barang'   => $nmabarang,
            'sektor'        => $sktor,
            'panjang'       => $panjang,
            'lebar'         => $lebar,
            'tinggi'        => $tinggi,
            'hasil_dimensi' => $dimensi,
            'exp_date'      => $exdate
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
