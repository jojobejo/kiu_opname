<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class M_Opname extends CI_Model
{
    public function addOpname($data, $idbarang)
    {
        $this->db->where('id_barang', $idbarang);
        return $this->db->update('tb_barang', $data);
    }

    public function getOpname($sektor)
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

    public function getHasilMatch($sektor)
    {
        return $this->db->query("SELECT
        COUNT(CASE WHEN  tb_barang.stok_opname1 = tb_barang.stok_opname2 then 1 ELSE NULL END) as 'match',
        COUNT(CASE WHEN  tb_barang.stok_opname1 != tb_barang.stok_opname2 then 1 ELSE NULL END) as 'not'
        FROM tb_barang
        where tb_barang.sektor = '$sektor'");
    }

    public function getNotMatch($sektor)
    {
        return $this->db->query("SELECT tb_barang.*,
        CASE WHEN tb_barang.stok_opname1 = tb_barang.stok_opname2 THEN 'match' ELSE 'not' END AS sama
        FROM tb_barang
        where tb_barang.sektor = '$sektor' ");
    }
}
