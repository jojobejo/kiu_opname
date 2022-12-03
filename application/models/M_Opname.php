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

    public function addBarang($data1)
    {
        return $this->db->insert('tb_opname', $data1);
    }

    public function getOpname($sektor)
    {
        $this->db->select('tb_barang_zahir.hasil_dimensi,tb_barang_zahir.kode_barang,tb_barang_zahir.nama_barang,tb_barang_zahir.exp_date');
        $this->db->FROM('tb_barang_zahir');
        $this->db->where('tb_barang_zahir.sektor', $sektor);
        $query = $this->db->get();
        return $query;
    }

    public function getHitungOpname($sektor)
    {
        $this->db->select('tb_opname.*,tb_barang_zahir.nama_barang,tb_barang_zahir.hasil_dimensi');
        $this->db->from('tb_opname');
        $this->db->join('tb_barang_zahir', 'tb_barang_zahir.id_opname = tb_opname.id_opname');
        $this->db->where('tb_barang_zahir.sektor', $sektor);
        $query = $this->db->get();
        return $query;
    }

    public function countVivo()
    {
        return $this->db->query("SELECT tb_barang_zahir.exp_date,tb_barang_zahir.nama_barang,
        COUNT(CASE WHEN  tb_opname.QTY1 = tb_barang_zahir.qty then 1 ELSE NULL END) as 'match',
               COUNT(CASE WHEN tb_opname.QTY1 != tb_barang_zahir.qty then 1 ELSE NULL END) as 'not'
               FROM tb_opname
               JOIN tb_barang_zahir ON tb_barang_zahir.id_opname = tb_opname.id_opname");
    }

    public function listMatchVivo()
    {
        return $this->db->query("SELECT tb_opname.id_opname,tb_barang_zahir.exp_date,tb_barang_zahir.nama_barang,tb_barang_zahir.id_barang,tb_barang_zahir.qty,tb_opname.QTY1,tb_opname.stok_box1,tb_barang_zahir.stok_box,tb_opname.stok_pcs1,tb_barang_zahir.stok_pcs,
        CASE WHEN tb_opname.QTY1 =  tb_barang_zahir.qty THEN 'match' ELSE 'not' END AS hasil
                 FROM tb_opname
                 JOIN tb_barang_zahir ON tb_barang_zahir.id_opname = tb_opname.id_opname
                      ");
    }

    public function getResult()
    {
        return $this->db->query("SELECT tb_barang.*,
        CASE WHEN tb_barang");
    }

    public function TotalBarangZahir()
    {
        return $this->db->query("SELECT
        SUM(tb_barang_zahir.qty) AS 'Total Barang'
        FROM tb_barang_zahir
        ");
    }

    public function countZahir()
    {
        return $this->db->query("SELECT tb_barang_zahir.id_barang,tb_barang_zahir.kode_barang,tb_barang_zahir.nama_barang,tb_barang_zahir.exp_date,
        SUM(tb_barang_zahir.qty) AS total_stok
        FROM tb_barang_zahir
        GROUP BY tb_barang_zahir.kode_barang
        ORDER BY tb_barang_zahir.id_barang");
    }

    public function countAll()
    {
        return $this->db->query("SELECT 
        COUNT(CASE WHEN  x.qty_a = x.qty_b then 1 ELSE NULL END) as 'match',
        COUNT(CASE WHEN x.qty_a != x.qty_b then 1 ELSE NULL END) as 'not'
       FROM
       (SELECT 
       a.kode_barang,
       sum(a.qty) AS qty_a , (SELECT sum(b.QTY1) FROM tb_opname b WHERE b.kode_barang = a.kode_barang GROUP BY b.kode_barang ) AS qty_b 
       FROM tb_barang_zahir a GROUP BY a.kode_barang 
       ) AS x
        ");
    }

    public function listBarangMatch()
    {
        return $this->db->query(" SELECT 
        x.id_barang,
        x.kode_barang,
        x.nama_barang,
        x.qty_a,
        x.qty_b,
        (CASE WHEN x.qty_a = x.qty_b THEN 'match' ELSE 'not match' END) AS hasil
        From
        ( Select 
        a.id_barang,
        a.kode_barang,
        a.nama_barang,
        sum(a.qty) as qty_a, (select sum(b.QTY1) from tb_opname b where b.kode_barang = a.kode_barang group by b.kode_barang ) as qty_b 
        from tb_barang_zahir a group by a.kode_barang 
        ) as x
        ");
    }
}
