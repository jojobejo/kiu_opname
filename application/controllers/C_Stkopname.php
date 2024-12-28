<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class C_Stkopname extends CI_Controller

{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_Opname');
    }

    public function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user") {
            redirect("login");
        } else {

            $sektor = $this->session->userdata('sektor');
            $data['page_title']         = 'Stok Opname';

            // $data['get_nama_barang']    = $this->M_Opname->getmasterbarang();

            $this->load->view('partial/user/header', $data);
            $this->load->view('content/user/stock_opname1', $data);
            $this->load->view('partial/user/footer');
            $this->load->view('content/user/ajax/selectbarang');
        }
    }

    function selectbarang()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user") {
            redirect("login");
        } else {

            $kdbarang = $this->input->post('nama_barang');
            $data = $this->M_Opname->selectbarang($kdbarang);
            echo json_encode($data);
        }
    }

    function get_data_barang()
    {
        $namabarang = $this->input->post('namabarang');
        $data = $this->M_Opname->get_detail_data($namabarang);
        echo json_encode($data);
    }

    function get_exp()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user") {
            redirect("login");
        } else {
            $kdbarang = $this->input->post('kodebarang', TRUE);
            $data = $this->M_Opname->get_exp_date($kdbarang)->result();
            echo json_encode($data);
        }
    }

    public function add_opname_user()
    {

        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user") {
            redirect("login");
        } else {

            $namabarang     = $this->input->post('nama_barang');
            $kdbarang       = $this->input->post('kode_barang');
            $box            = $this->input->post('qty_box');
            $pcs            = $this->input->post('qty_pcs');
            $dimensi        = $this->input->post('dimensi');
            $qty            = ($box * $dimensi) + $pcs;
            $exdate         = $this->input->post('exp_isi');
            $date           = date("Y-m-d H:i:s");
            $keterangan     = $this->input->post('keterangan');

            if ($exdate == '2222-12-12') {
                $datainput = array(
                    'kode_barang'   => $kdbarang,
                    'nama_barang'   => $namabarang,
                    'qty'           => '0',
                    'exp_date'      => $keterangan,
                    'keterangan'    => 'Expired Tidak Ada'
                );
                $data = array(
                    'kode_barang'   => $kdbarang,
                    'nama_barang'   => $namabarang,
                    'stock_box'     => $box,
                    'stock_pcs'     => $pcs,
                    'exp_date'      => $keterangan,
                    'qty'           => $qty,
                    'sektor'        => $this->session->userdata('sektor'),
                    'keterangan'    => 'Expired Tidak Ada',
                    'inputer'       => $this->session->userdata('username'),
                    'inputer_edit'  => '-',
                    'keterangan_edit' => '-',
                    'input_at'      => $date,
                    'edit_at'       => $date
                );
                $this->M_Opname->inputopname($data);
                $this->M_Opname->inputsaldoexp($datainput);
                redirect('u_opname');
            } else {
                $data = array(
                    'kode_barang'   => $kdbarang,
                    'nama_barang'   => $namabarang,
                    'stock_box'     => $box,
                    'stock_pcs'     => $pcs,
                    'exp_date'      => $exdate,
                    'qty'           => $qty,
                    'sektor'        => $this->session->userdata('sektor'),
                    'keterangan'    => 'opname',
                    'inputer'       => $this->session->userdata('username'),
                    'inputer_edit'  => '-',
                    'keterangan_edit' => '-',
                    'input_at'      => $date,
                    'edit_at'       => $date
                );
                $this->M_Opname->inputopname($data);
                redirect('u_opname');
            }
        }
    }
}
