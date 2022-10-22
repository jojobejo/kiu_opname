<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class StkOpname extends CI_Controller

{
    public function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }
        $this->load->view('partial/admin/header');
        $this->load->view('content/admin/stock_opname');
        $this->load->view('partial/admin/footer');
    }
}
