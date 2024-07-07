<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */

class C_requestbarang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Opname');
        $this->load->model('M_Reqexpdate');
    }
    function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $data['page_title'] = 'Request Barang';

        $this->load->view("partial/admin/header", $data);
        $this->load->view("content/admin/requestuser", $data);
        $this->load->view("partial/admin/footer");
    }

    public function addtmpreq()
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

        $inserttmpexp = array(
            'kode_barang'   => $kdbarang,
            'nama_barang'   => $nmbarang,
            'exp_date'      => $exdate,
            'panjang'       => $panjang,
            'lebar'         => $lebar,
            'tinggi'        => $tinggi,
            'hasil_dimensi' => $dimensi,
            'qty'           => $qty,
            'stok_box'      => $box,
            'stok_pcs'      => $pcs,
            'keterangan'    => 'expired data tidak ada',
            'sektor'        => $sektor,
            'status'        => '1'
        );
        $this->M_Opname->addReqExp($inserttmpexp);
        redirect('u_opname');
    }

    public function serverRequestExp()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $list = $this->M_Reqexpdate->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $row = array();
            $row[] = $field->kode_barang;
            $row[] = $field->nama_barang;
            $row[] = $field->exp_date;
            $row[] = $field->qty;
            $row[] = $field->stok_box;
            $row[] = $field->stok_pcs;
            $row[] = $field->sektor;
            $row[] =
                '<a href="' . base_url('accrequest/' . $field->id_tmp_req . '') . '" id="confirms" class="btn btn-success btn-sm"><i class="fa fa-solid fa-plus"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Reqexpdate->count_all(),
            "recordsFiltered" => $this->M_Reqexpdate->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
    public function accrequest($id)
    {
        $tmp = $this->M_Reqexpdate->barangreq($id);

        if ($tmp) {
            foreach ($tmp as $d) {
                $datareq = array(
                    'kode_barang'   => $d->kode_barang,
                    'nama_barang'   => $d->nama_barang,
                    'exp_date'      => $d->exp_date,
                    'panjang'       => $d->panjang,
                    'tinggi'        => $d->tinggi,
                    'hasil_dimensi' => $d->hasil_dimensi,
                    'qty'           => '0',
                    'stok_box'      => '0',
                    'stok_pcs'      => '0',
                    'keterangan' => 'Expired Tidak Ada'
                );
                $this->M_Reqexpdate->inputdatazahir($datareq);
            }
            foreach ($tmp as $d) {
                $dataopname = array(
                    'kode_barang'   => $d->kode_barang,
                    'nama_barang'   => $d->nama_barang,
                    'stok_box1'     => $d->stok_box,
                    'stok_pcs1'     => $d->stok_pcs,
                    'exp_date'      => $d->exp_date,
                    'QTY1'          => $d->qty,
                    'sektor'        => $d->sektor,
                    'keterangan'    => 'ADD EXP-DATE',
                    'inputer_edit'  =>  'ADMIN',
                    'keterangan_edit' => 'EXP-DATE-TAMBAHAN',
                );
                $this->M_Reqexpdate->insertopnameexp($dataopname);
            }
            foreach ($tmp as $d) {
                $datarequp = array(
                    'id_tmp_req'   => $d->id_tmp_req,
                    'status'        => '0',
                );
                $this->M_Reqexpdate->updatestatusrq($id, $datarequp);
            }
        }
        redirect('barangReq');
    }
}
