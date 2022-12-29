<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class C_listBarang extends CI_Controller {
 
    function __construct(){
        parent::__construct();
        $this->load->model('M_ServersideList');
    }
 
    function index(){
        $this->load->view('partial/user/header1');
        $this->load->view('content/user/list_barang');
        $this->load->view('partial/user/footerserver');
    }
 
    function get_data_user()
    {
        $list = $this->M_ServersideList->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_barang;
            $row[] = $field->exp_date;
            $row[] = $field->sektor;
 
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_ServersideList->count_all(),
            "recordsFiltered" => $this->M_ServersideList->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }
 
}