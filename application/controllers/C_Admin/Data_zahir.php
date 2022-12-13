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
        $this->load->model("M_Opname");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $data['page_title'] = 'Data Barang Zahir || Stok Opname'; 
        $data['barang'] = $this->M_barang->getBarangZahir();
        $data['idopname'] = $this->M_barang->getidOpname();

        $this->load->view('partial/admin/header',$data);
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
        $panjang        = $this->input->post('panjang_isi');
        $idopname       = $this->input->post('id_opname_isi');
        $lebar          = $this->input->post('lebar_isi');
        $tinggi         = $this->input->post('tinggi_isi');
        $dimensi        = $panjang * $lebar * $tinggi;
        $qty            = $this->input->post('qty_isi');
        $keterangan     = $this->input->post('keterangan_isi');
        $exdate         = $this->input->post('date_isi');
        $sektor         = $this->input->post('sektor_isi');

        $data = array(
            'kode_barang'   => $kdbarang,
            'id_opname'     => $idopname,
            'nama_barang'   => $nmabarang,
            'panjang'       => $panjang,
            'lebar'         => $lebar,
            'tinggi'        => $tinggi,
            'hasil_dimensi' => $dimensi,
            'qty'           => $qty,
            'exp_date'      => $exdate,
            'sektor'        => $sektor,
            'keterangan'    => $keterangan
        );

        $data1 = array(
            'kode_barang'   => $kdbarang,
            'stok_box1'     => "0",
            'stok_pcs1'     => "0",
            'exp_date'      => $exdate,
            'QTY1'          => "0"
        );

        $this->M_Opname->addBarang($data1);
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

        $this->M_barang->editDataZahir($data, $idbarang);
        redirect('data_zahir');
    }

    public function hapusBarang($hapus)

    {
        $idbarang = $hapus;

        $this->M_barang->zahirDel($idbarang);

        redirect("list_barang");
    }
}
