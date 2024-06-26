<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */

class C_Template extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Opname');
    }
    function index()
    {
        $this->load->view("partial/login/header");
        $this->load->view("partial/login/body");
        $this->load->view("partial/login/footer");
    }
}
