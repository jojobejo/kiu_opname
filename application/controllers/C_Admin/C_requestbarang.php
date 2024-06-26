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
    }
    function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $data['page_tittle'] = 'Request Barang';

        $this->load->view("partial/admin/header", $data);
        $this->load->view("content/admin/requestuser", $data);
        $this->load->view("partial/admin/footer");
    }
}
