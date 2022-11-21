<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Def_user extends CI_Controller
{
    function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user") {
            redirect("login");
        }

        $this->load->view('partial/user/header');
        $this->load->view('content/user/dashboard');
        $this->load->view('partial/user/footer');
    }
}
