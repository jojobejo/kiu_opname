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

                $this->load->view('partial/user/header',$data);
                $this->load->view('content/user/stock_opname1', $data);
                $this->load->view('partial/user/footer');
                $this->load->view('content/user/ajax/ajaxBarangOpname');   
            }
        }
    }

    public function get_list_barang_opname() {
        $list = $this->M_Opname->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $row = array();
            $row[] = $field->nama_barang;
            $row[] = $field->exp_date;
            $row[] = '<a href="#" class="btn btn-warning btn-sm" href="javascript:void(0)" title="Edit" onclick="addOpname('."'".$field->id_barang."'".')">
            <i class="fa fa-solid fa-pencil-alt"></i></a>';
 
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

    public function addOpnameData()
    {

        $idbarang       = $this->input->post('id_isi');
        $kdbarang       = $this->input->post('kode_isi');
        $box            = $this->input->post('box_isi');
        $pcs            = $this->input->post('pcs_isi');
        $dimensi        = $this->input->post('dimensi_isi');
        $qty            = ($box * $dimensi) + $pcs;
        $exdate         = $this->input->post('date_isi');

        if ($this->session->userdata('team_opname') == '1') {
            $data = array(
                'id_opname'     => $idbarang,
                'kode_barang'   => $kdbarang,
                'stok_box1'     => $box,
                'stok_pcs1'     => $pcs,
                'exp_date'      => $exdate,
                'QTY1'          => $qty
            );

            $this->M_Opname->addOpname($data, $idbarang);
            redirect('u_opname');
        } elseif ($this->session->userdata('team_opname') == '2') {
            $data = array(
                'id_opname'     => $idbarang,
                'kode_barang'   => $kdbarang,
                'stok_box2'     => $box,
                'stok_pcs2'     => $pcs,
                'exp_date'      => $exdate
                // 'QTY2'          => $qty
            );

            $this->M_Opname->addOpname($data, $idbarang);
            redirect('u_opname');
        }
    }
}
