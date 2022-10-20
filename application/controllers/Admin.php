<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Admin extends CI_Controller
{
    function index ()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
			redirect("login");
		}
        $this->load->view("content/admin/dashboard");
    }
}