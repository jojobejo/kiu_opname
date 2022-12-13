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
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }
        $data['barang'] = $this->M_barang->getAll();
        $data['page_title'] = 'Stok Opname'; 

        $this->load->view('partial/admin/header',$data);
        $this->load->view('content/admin/stock_opname',$data);
        $this->load->view('partial/admin/footer');
        $this->load->view('content/admin/ajax/selectbarang');
    }


}
