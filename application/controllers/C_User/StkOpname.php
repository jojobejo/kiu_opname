<?php

use LDAP\Result;

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

                $data['page_title'] = 'Stok Opname';
                // $data['opname'] = $this->M_Opname->getAllBarang();

                $this->load->view('partial/user/header', $data);
                $this->load->view('content/user/stock_opname1', $data);
                $this->load->view('partial/user/footer');
                $this->load->view('content/user/ajax/ajaxBarangOpname');
            }
        }
    }

    public function get_list_barang_opname()
    {
        $list = $this->M_Opname->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $row = array();
            $row[] = $field->nama_barang;
            $row[] = $field->exp_date;
            $row[] = '<a href="#" class="btn btn-warning btn-sm" href="javascript:void(0)" title="Edit" onclick="addOpname(' . "'" . $field->id_master_barang . "'" . ')">
            <i class="fa fa-solid fa-pencil-alt"></i></a> &nbsp;&nbsp;&nbsp;' .
                '<a href="#" class="btn btn-success btn-sm" href="javascript:void(0)" title="Edit" onclick="addExpOpname(' . "'" . $field->id_master_barang . "'" . ')">
            <i class="fa fa-solid fa-plus"></i></a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Opname->count_all(),
            "recordsFiltered" => $this->M_Opname->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function getDataBarang($id)
    {
        $data = $this->M_Opname->getBarangById($id);

        echo json_encode($data);
    }

    public function addOpnameDataExp()
    {
        $sektor         = $this->session->userdata('sektor');
        $nmbarang       = $this->input->post('nama_isi');
        $kdbarang       = $this->input->post('kode_isi');
        $pending        = $this->input->post('pending_isi');
        $box            = $this->input->post('box_isi');
        $pcs            = $this->input->post('pcs_isi');
        $dimensi        = $this->input->post('dimensi_isi');
        $qty            = ($box * $dimensi) + $pcs;
        $exdate         = $this->input->post('date_isi');
        $panjang        = $this->input->post('panjang_isi');
        $lebar          = $this->input->post('lebar_isi');
        $tinggi         = $this->input->post('tinggi_isi');

        $dataopname = array(
            'kode_barang'   => $kdbarang,
            'nama_barang'   => $nmbarang,
            'kode_pending'  => $pending,
            'stok_box1'     => $box,
            'stok_pcs1'     => $pcs,
            'exp_date'      => $exdate,
            'QTY1'          => $qty,
            'sektor'        => $sektor,
            'keterangan'    => 'StockOpname'
        );

        $datazahir = array(
            'kode_pending'  => '-',
            'kode_barang'   => $kdbarang,
            'nama_barang'   => $nmbarang,
            'panjang'   => $panjang,
            'lebar'   => $lebar,
            'tinggi'   => $tinggi,
            'hasil_dimensi'   => $dimensi,
            'stok_box'     => '0',
            'stok_pcs'     => '0',
            'qty'          => '0',
            'exp_date'      => $exdate,
            'keterangan'    => 'input expired baru'
        );

        $datamasterbarang = array(
            'kode_barang'   => $kdbarang,
            'kode_pending'  => '-',
            'nama_barang'   => $nmbarang,
            'panjang'   => $panjang,
            'lebar'   => $lebar,
            'tinggi'   => $tinggi,
            'hasil_dimensi'   => $dimensi,
            'exp_date'      => $exdate,
            'keterangan'    => 'input expired baru'
        );

        $this->M_Opname->addOpname($dataopname);
        $this->M_Opname->addOpnameExpbz($datazahir);
        $this->M_Opname->addOpnameExpmb($datamasterbarang);
        redirect('u_opname');
    }
    public function addOpnameData()
    {
        $sektor         = $this->session->userdata('sektor');
        $nmbarang       = $this->input->post('nama_isi');
        $kdbarang       = $this->input->post('kode_isi');
        $pending        = $this->input->post('pending_isi');
        $box            = $this->input->post('box_isi');
        $pcs            = $this->input->post('pcs_isi');
        $dimensi        = $this->input->post('dimensi_isi');
        $qty            = ($box * $dimensi) + $pcs;
        $exdate         = $this->input->post('date_isi');

        $data = array(
            'kode_barang'   => $kdbarang,
            'nama_barang'   => $nmbarang,
            'kode_pending'  => $pending,
            'stok_box1'     => $box,
            'stok_pcs1'     => $pcs,
            'exp_date'      => $exdate,
            'QTY1'          => $qty,
            'sektor'        => $sektor,
            'keterangan'    => 'StockOpname'
        );

        $this->M_Opname->addOpname($data);
        redirect('u_opname');
    }
}
