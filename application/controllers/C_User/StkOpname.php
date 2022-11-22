<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class StkOpname extends CI_Controller

{

    function __construct()
    {
        parent::__construct();
        $this->load->model("M_Opname");
        $this->load->model("M_barang");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user") {
            redirect("login");
        } else {
            if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user" ||  $this->session->userdata("team_opname") == "1") {

                $sektor = $this->session->userdata('sektor');
                $data['barang'] = $this->M_barang->getBarang($sektor)->result();
                $data['gudang'] = $this->M_barang->getGudang();

                $this->load->view('partial/user/header');
                $this->load->view('content/user/stock_opname1', $data);
                $this->load->view('partial/user/footer');
                $this->load->view('content/user/ajax/selectbarang');
            } elseif ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user" ||  $this->session->userdata("team_opname") == "2") {
                $sektor = $this->session->userdata('sektor');
                $data['barang'] = $this->M_barang->getBarang($sektor)->result();
                $data['gudang'] = $this->M_barang->getGudang();

                $this->load->view('partial/user/header');
                $this->load->view('content/user/stock_opname2', $data);
                $this->load->view('partial/user/footer');
                $this->load->view('content/user/ajax/selectbarang');
            }
        }
    }

    public function addOpnameData()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user" || $this->session->userdata("team_opname") == "1") {
            redirect("login");
        }

        $idbarang       = $this->input->post('id_isi');
        $nmabarang      = $this->input->post('barang_isi');
        $sktor          = $this->input->post('sektor_isi');
        $gudang         = $this->input->post('gudang_isi');
        $stok           = $this->input->post('stok_isi');
        $stokopname     = $this->input->post('opname_isi');
        $exdate         = $this->input->post('date_isi');

        if ($this->session->userdata('team_opname') == '1') {
            $data = array(
                'id_barang'     => $idbarang,
                'nama_barang'   => $nmabarang,
                'sektor'        => $sktor,
                'kode_gudang'   => $gudang,
                'stok_barang'   => $stok,
                'stok_opname1'  => $stokopname,
                'exdate'        => $exdate
            );

            $this->M_Opname->addOpname($data, $idbarang);
            redirect('u_opname');
        } else {
            $data = array(
                'id_barang'     => $idbarang,
                'nama_barang'   => $nmabarang,
                'sektor'        => $sktor,
                'kode_gudang'   => $gudang,
                'stok_barang'   => $stok,
                'stok_opname2'   => $stokopname,
                'exdate'        => $exdate
            );

            $this->M_Opname->addOpname($data, $idbarang);
            redirect('u_opname');
        }
    }
}
