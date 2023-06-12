<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class C_TrackingInput extends CI_Controller

{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Tracking');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $data['page_title'] = 'Tracking Input';

        $this->load->view('partial/admin/header', $data);
        $this->load->view('content/admin/tracking_input', $data);
        $this->load->view('partial/admin/footer');
    }

    public function getServerTracking()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $list = $this->M_Tracking->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $row = array();
            $row[] = $field->id_opname;
            $row[] = $field->kode_barang;
            $row[] = $field->kode_pending;
            $row[] = $field->nama_barang;
            $row[] = $field->exp_date;
            $row[] = $field->stok_box1;
            $row[] = $field->stok_pcs1;
            $row[] = $field->QTY1;
            $row[] = $field->sektor;
            $row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_opname(' . "'" . $field->id_opname . "'" . ')"><i class="fa fa-solid fa-pencil-alt"></i></a>';

            //     $row[] = '<a href="#" class="btn btn-warning btn-sm " data-toggle="modal" data-target="#editZahir' . $field->id_opname . '">
            //     <i class="fa fa-solid fa-pencil-alt"></i></a>' . '&nbsp;' .
            //         '<a href="#" class="btn btn-danger btn-sm " data-toggle="modal" data-target="#hapusZahir' . $field->id_opname . '">
            //     <i class="fa fa-solid fa-trash"></i>
            // </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_Tracking->count_all(),
            "recordsFiltered" => $this->M_Tracking->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function opname_edit($id)
    {
        $data = $this->M_Tracking->get_by_id($id);
        echo json_encode($data);
    }

    public function ajax_update_opname()
    {
        $stkBox  = $this->input->post('box_isi');
        $stkPcs  = $this->input->post('pcs_isi');
        $dimensi = $this->input->post('dimensi_isi');

        $data = array(
            'stok_box1' => $stkBox,
            'stok_pcs1' => $stkPcs,
            'QTY1'      => ($stkBox * $dimensi) + $stkPcs
        );
        $this->M_Tracking->update_opname_edited(array('id_opname' => $this->input->post('id_isi')), $data);
        echo json_encode(array("status" => TRUE));
    }
}
