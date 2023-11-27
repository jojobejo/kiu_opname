<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Data_zahir extends CI_Controller

{
    function __construct()
    {
        parent::__construct();
        $this->load->model("M_barang");
        $this->load->model("M_Opname");
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $data['page_title'] = 'Data Barang Zahir || Stok Opname';
        $data['barang'] = $this->M_barang->getBarangZahir();
        $data['idopname'] = $this->M_barang->getidOpname();

        $this->load->view('partial/admin/header', $data);
        $this->load->view('content/admin/data_zahir', $data);
        $this->load->view('partial/admin/footer');
    }

    public function getServerZahir()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $list = $this->M_barang->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $row = array();
            $row[] = $field->kode_barang;
            $row[] = $field->kode_pending;
            $row[] = $field->nama_barang;
            $row[] = $field->exp_date;
            $row[] = $field->qty;
            $row[] = $field->keterangan;
            $row[] = '<a href="' . base_url('edit_data_zahir/' . $field->id_barang . '') . '" class="btn btn-warning btn-sm"><i class="fa fa-solid fa-pencil-alt"></i></a>' . '&nbsp;&nbsp;&nbsp;' .
                '<a href="' . base_url('hapus_data_zahir/' . $field->id_barang . '') . '" class="btn btn-danger btn-sm">
            <i class="fa fa-solid fa-trash"></i>
        </a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_barang->count_all(),
            "recordsFiltered" => $this->M_barang->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function addBarang()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $kdbarang       = $this->input->post('kode_isi');
        $kdpending      = $this->input->post('pending_isi');
        $nmabarang      = $this->input->post('barang_isi');
        $panjang        = $this->input->post('panjang_isi');
        $lebar          = $this->input->post('lebar_isi');
        $tinggi         = $this->input->post('tinggi_isi');
        $dimensi        = $panjang * $lebar * $tinggi;
        $qty            = $this->input->post('qty_isi');
        $keterangan     = $this->input->post('keterangan_isi');
        $exdate         = $this->input->post('date_isi');

        $data = array(
            'kode_barang'   => $kdbarang,
            'kode_pending'  => $kdpending,
            'nama_barang'   => $nmabarang,
            'panjang'       => $panjang,
            'lebar'         => $lebar,
            'tinggi'        => $tinggi,
            'hasil_dimensi' => $dimensi,
            'qty'           => $qty,
            'exp_date'      => $exdate,
            'keterangan'    => $keterangan
        );

        $this->M_barang->insertDataZahir($data);
        redirect('data_zahir');
    }

    public function editBarang()
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect('login');
        }

        $idbarang       = $this->input->post('id_isi');
        $kdbarang       = $this->input->post('kode_isi');
        $kdpending      = $this->input->post('pending_isi');
        $nmabarang      = $this->input->post('barang_isi');
        $qty            = $this->input->post('qty_isi');
        $exdate         = $this->input->post('date_isi');

        $data = array(

            'id_barang'     => $idbarang,
            'kode_barang'   => $kdbarang,
            'kode_pending'  => $kdpending,
            'nama_barang'   => $nmabarang,
            'qty'           => $qty,
            'exp_date'      => $exdate,
        );

        $this->M_barang->editDataOpname($data, $idbarang);
        redirect('data_zahir');
    }

    public function hapusBarang($hapus)

    {
        $idbarang = $hapus;

        $this->M_barang->zahirDel($idbarang);

        redirect("list_barang");
    }

    public function editDataZahir($id)
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $data['page_title'] = 'Edit Data Barang Zahir || Stok Opname';
        $data['barang'] = $this->M_barang->getbarangeditzahir($id);

        $this->load->view('partial/admin/header', $data);
        $this->load->view('content/admin/edit_data_master_zahir', $data);
        $this->load->view('partial/admin/footer');
    }
    public function hapusDataZahir($id)
    {
        if ($this->session->userdata('status') != "is_login" || $this->session->userdata("role") != "admin") {
            redirect("login");
        }

        $data['page_title'] = 'Edit Data Barang Zahir || Stok Opname';
        $data['barang'] = $this->M_barang->getbarangeditzahir($id);

        $this->load->view('partial/admin/header', $data);
        $this->load->view('content/admin/hapus_data_master_zahir', $data);
        $this->load->view('partial/admin/footer');
    }
}
