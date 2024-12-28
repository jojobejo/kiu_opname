<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class C_Matchprogressuser extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("M_Opname");
        $this->load->model("M_Barang");
    }

    function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user") {
            redirect("login");
        } else {

            $sektor = $this->session->userdata('username');

            $data['page_title'] = 'Match Progress';
            $data['listbr']     = $this->M_Opname->list_input($sektor);

            $this->load->view('partial/user/header', $data);
            $this->load->view('content/user/match_progress', $data);
            $this->load->view('partial/user/footer');
            $this->load->view('content/user/ajax/ajaxMatchProgress');
        }
    }

    public function detail_input($user, $kdbarang)
    {
        $data['page_title']     = 'Match Progress';
        $data['detail_opname']  = $this->M_Opname->detail_input($user, $kdbarang);

        $this->load->view('partial/user/header', $data);
        $this->load->view('content/user/detail_inputer', $data);
        $this->load->view('partial/user/footer');
    }

    public function input_edit($action)
    {
        switch ($action) {
            case 'edit_data':
                $user       = $this->session->userdata('username');
                $kdbr       = $this->input->post('kdbarang');
                $id         = $this->input->post('idopname');
                $dimensi    = $this->input->post('dimensi');
                $pcs        = $this->input->post('pcs_isi');
                $box        = $this->input->post('box_isi');
                $qty        = ($box * $dimensi) + $pcs;

                $dataedit = array(
                    'stock_box' => $box,
                    'stock_pcs' => $pcs,
                    'qty'       => $qty
                );
                $this->M_Opname->edited_opname($id, $dataedit);
                redirect('detail_input/' . $user . '/' . $kdbr);
                break;

            case 'hapus_data':
                $user       = $this->session->userdata('username');
                $kdbr       = $this->input->post('kdbarang');
                $id         = $this->input->post('idopname');

                $this->M_Opname->hapus_opname($id);
                redirect('detail_input/' . $user . '/' . $kdbr);
                break;
        }
    }

    // function matchProgress()
    // {
    //     if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "user") {
    //         redirect("login");
    //     }

    //     $sektor = $this->session->userdate('sektor');

    //     $data['barang'] = $this->M_barang->getBarang($sektor)->result();
    //     $data['selesih'] = $this->M_Opname->getHasilMatch()->result();

    // }


}
