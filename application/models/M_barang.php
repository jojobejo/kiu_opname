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

    public function getBarang()
    {
        
        $this->db->select('tb_barang.id_barang,tb_barang.nama_barang,tb_barang.sektor,tb_barang.stok_barang,tb_gudang.kode_gudang,tb_gudang.nama_gudang');
        $this->db->FROM('tb_barang');
        $this->db->join('tb_gudang','tb_gudang.kode_gudang = tb_barang.kode_gudang');
        $query = $this->db->get();
        return $query;

    }

    public function getGudang()
    {
        return $this->db->get
        ('tb_gudang')->result();    
    }

    public function addBarang($data)
    {
        return $this->db->insert('tb_barang',$data);
    }

    public function editBarang($data,$idbarang)
    {
        $this->db->where('id_barang',$idbarang);
        return $this->db->update('tb_barang',$data);
    }

    public function barangdel($idbarang)
    {
        $this->db->where('id_barang' ,$idbarang);
        return $this->db->delete('tb_barang');
    }

}
