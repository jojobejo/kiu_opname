<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class C_matchProgress extends CI_Controller
{
    function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $this->load->view('partial/admin/header');
        $this->load->view('content/admin/match_progress');
        $this->load->view('partial/admin/footer');
        $this->load->view('content/admin/ajax/ajaxMatchProgress');
    }
}