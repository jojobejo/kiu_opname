<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class User extends CI_Controller

{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Usermodel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }
        $data['page_title'] = 'User'; 
        $data["user"] = $this->Usermodel->getAll();

        $this->load->view('partial/admin/header',$data);
        $this->load->view('content/admin/user', $data);
        $this->load->view('partial/admin/footer');
    }

    public function AddUser()
    {
        $nama_user  = $this->input->post("nama_isi");
        $username   = $this->input->post("username_isi");
        $pass = $this->input->post("password_isi");
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $role  = $this->input->post("role_isi");
        $sektor = $this->input->post("sektor_isi");
        $team = $this->input->post("team_isi");

        $data = array(
            'nama_user'   => $nama_user,
            'username'    => $username,
            'password'    => $password,
            'role'        => $role,
            'sektor'    => $sektor,
            'team_opname'    => $team
        );

        $this->Usermodel->addUser($data);
        redirect('user');
    }

    public function EditUser()
    {
        $id_user    = $this->input->post('id_isi');
        $nama_user  = $this->input->post('nama_isi');
        $username   = $this->input->post("username_isi");
        $pass = $this->input->post("password_isi");
        $password = password_hash($pass, PASSWORD_DEFAULT);
        $role  = $this->input->post("role_isi");
        $sektor = $this->input->post("sektor_isi");
        $team = $this->input->post("team_isi");

        $data = array(
            'id_user'   => $id_user,
            'nama_user' => $nama_user,
            'username'  => $username,
            'password'  => $password,
            'role'      => $role,
            'sektor'    => $sektor,
            'team_opname'    => $team
        );
        $this->Usermodel->editUser($id_user, $data);
        redirect('user');
    }
}
