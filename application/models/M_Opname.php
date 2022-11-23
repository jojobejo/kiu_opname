<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class M_Opname extends CI_Model
{
    public function addOpname($data, $idbarang)
    {
        $this->db->where('id_opname', $idbarang);
        return $this->db->update('tb_opname', $data);
    }

    public function getOpname($sektor)
    {
        // return $this->db->query('SELECT tb_barang.id_barang,tb_barang.nama_barang,tb_barang.sektor,tb_barang.stok_barang,tb_gudang.kode_gudang,tb_gudang.nama_gudang
        //  FROM tb_barang,JOIN tb_gudang.kode_gudang = tb_barang.kode_gudang, WHERE tb_barang.sektor=' . $sektor . ' ');
        $this->db->select('tb_opname.*,tb_barang.nama_barang,tb_barang.sektor');
        $this->db->FROM('tb_opname');
        $this->db->join('tb_barang', 'tb_barang.kode_barang = tb_opname.kode_barang');
        $this->db->where('tb_barang.sektor', $sektor);
        $query = $this->db->get();
        return $query;
    }

    public function getHasilMatch($sektor)
    {
        // return $this->db->query("SELECT
        // tb_opname.kode_barang,
        //    COUNT(CASE WHEN (tb_opname.stok_box1*tb_barang.hasil_dimensi)+tb_opname.stok_pcs1 = (tb_opname.stok_box2*tb_barang.hasil_dimensi)+tb_opname.stok_pcs2 THEN 'match' ELSE 'not' END AS 'hasil'
        //    FROM tb_opname
        //     JOIN tb_barang ON tb_barang.kode_barang = tb_opname.kode_barang
        //     where tb_barang.sektor = '$sektor'");

        return $this->db->query(" SELECT tb_opname.kode_barang,
        (tb_opname.stok_box1*tb_barang.hasil_dimensi)+tb_opname.stok_pcs1 AS 'QTY_TEAM1',
        (tb_opname.stok_box2*tb_barang.hasil_dimensi)+tb_opname.stok_pcs2 AS 'QTY_TEAM2'
        FROM tb_opname
        JOIN tb_barang ON tb_barang.kode_barang = tb_opname.kode_barang
        WHERE tb_barang.sektor = '$sektor' ");

    }

    public function getNotMatch($sektor)
    {
        return $this->db->query("SELECT tb_barang.*,
        CASE WHEN tb_barang.stok_opname1 = tb_barang.stok_opname2 THEN 'match' ELSE 'not' END AS sama
        FROM tb_barang
        where tb_barang.sektor = '$sektor' ");
    }

    public function getResult()
    {
        return $this->db->query("SELECT tb_barang.*,
        CASE WHEN tb_barang");
    }
}
