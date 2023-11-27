<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 * 
 */

class M_barang extends CI_Model
{

    public function getAll()
    {
        return $this->db->get('tb_barang')->result();
    }

    public function getidOpname()
    {
        $query = $this->db->select('id_barang')
            ->from('tb_barang_zahir')
            ->get();
        $row = $query->last_row();
        return $row;
    }

    public function getbarangeditzahir($id)
    {
        $this->db->select('*');
        $this->db->from('tb_barang_zahir');
        $this->db->where('id_barang', $id);
        return $this->db->get()->result();
    }

    public function getBarang($sektor)
    {
        // return $this->db->query('SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_barang.sektor,tb_barang.stok_barang,tb_gudang.kode_gudang,tb_gudang.nama_gudang
        //  FROM tb_barang,JOIN tb_gudang.kode_gudang = tb_barang.kode_gudang, WHERE tb_barang.sektor=' . $sektor . ' ');
        $this->db->select('tb_barang.*,tb_gudang.kode_gudang,tb_gudang.nama_gudang');
        $this->db->FROM('tb_barang');
        $this->db->join('tb_gudang', 'tb_gudang.kode_gudang = tb_barang.kode_gudang');
        $this->db->where('tb_barang.sektor', $sektor);
        $query = $this->db->get();
        return $query;
    }

    public function getGudang()
    {
        return $this->db->get('tb_gudang')->result();
    }

    public function addBarang($data)
    {
        return $this->db->insert('tb_barang', $data);
    }

    public function editBarang($data, $idbarang)
    {
        $this->db->where('id_barang', $idbarang);
        return $this->db->update('tb_barang', $data);
    }

    public function barangdel($idbarang)
    {
        $this->db->where('id_barang', $idbarang);
        return $this->db->delete('tb_barang');
    }

    // DB MODEL ZAHIR

    var $table = 'tb_barang_zahir'; //nama tabel dari database
    var $column_order = array('kode_barang', 'kode_pending', 'nama_barang', 'exp_date', 'qty', 'keterangan', 'id_barang'); //field yang ada di table user
    var $column_search = array('nama_barang', 'kode_barang'); //field yang diizin untuk pencarian 
    var $order = array('nama_barang' => 'asc'); // default order

    private function _get_datatables_query()
    {

        $this->db->from($this->table);

        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function getBarangZahir()
    {
        return $this->db->get('tb_barang_zahir')->result();
    }

    public function insertDataZahir($data)
    {
        return $this->db->insert('tb_barang_zahir', $data);
    }
    public function editDataZahir($data, $idbarang)
    {
        $this->db->where('id_barang', $idbarang);
        return $this->db->update('tb_barang_zahir', $data);
    }
    public function editDataOpname($data, $idopname)
    {
        $this->db->where('id_barang', $idopname);
        return $this->db->update('tb_barang_zahir', $data);
    }
    public function zahirDel($idbarang)
    {
        $this->db->where('id_barang', $idbarang);
        return $this->db->delete('tb_barang_zahir');
    }

    //DB MODEL FAKTUR PENDING

    public function getFakturPending()
    {
        return $this->db->get('tb_pending')->result();
    }

    public function insertFakturPending($data)
    {
        return $this->db->insert('tb_pending', $data);
    }
    public function editFakturPending($data, $idbarang)
    {
        $this->db->where('id_pending', $idbarang);
        return $this->db->update('tb_pending', $data);
    }
    public function delfakturPending($idbarang)
    {
        $this->db->where('id_pending', $idbarang);
        return $this->db->delete('tb_pending');
    }
}
