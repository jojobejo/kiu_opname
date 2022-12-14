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
        $query = $this->db->select('id_opname')
            ->from('tb_barang_zahir')
            ->get();
        $row = $query->last_row();
        return $row;
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
        $this->db->where('id_opname', $idopname);
        return $this->db->update('tb_opname', $data);
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
