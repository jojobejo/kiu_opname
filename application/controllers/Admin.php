<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Admin extends CI_Controller
{
    function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $this->load->view('partial/admin/header');
        $this->load->view('content/admin/dashboard');
        $this->load->view('partial/admin/footer');
    }


    function user()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin"){
            redirect("login");
        }
        $this->load->view('partial/admin/header');
        $this->load->view('content/admin/user');
        $this->load->view('partial/admin/footer');
    }

    function stkopname()
    {
        if($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin"){
            redirect("login");
        }
        $this->load->view('partial/admin/header');
        $this->load->view('content/admin/stock_opname');
        $this->load->view('partial/admin/footer');
    }
}
