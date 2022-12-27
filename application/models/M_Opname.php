<?php
defined('BASEPATH') or exit('No direct script access allowed');


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

    public function listUserMatch($sektor)
    {
        return $this->db->query("SELECT 
        COUNT(tb_opname.kode_barang) as total_barang
        FROM tb_opname
        JOIN tb_barang_zahir ON tb_barang_zahir.id_opname = tb_opname.id_opname
        where tb_barang_zahir.sektor = '$sektor'");
    }

    public function getMatchUser($sektor)
    {
        return $this->db->query("SELECT 
        a.kode_barang,
        b.nama_barang, 
        b.exp_date,
        b.sektor,
        b.sktor_tambahan,
        CASE WHEN (a.QTY1-COALESCE(c.qty,0))-b.qty = 0 THEN 'match' ELSE 'not' END AS hasil 
        FROM tb_opname a 
        JOIN tb_barang_zahir b ON b.id_opname = a.id_opname 
        LEFT JOIN tb_pending c on c.kode_pending = a.kode_pending
        WHERE b.sektor = '$sektor'
        ");
    }

    public function prsenUser($sektor)
    {
        return $this->db->query("SELECT  
        COUNT(tb_barang_zahir.kode_barang) AS total,
        COUNT(CASE WHEN  tb_opname.QTY1 = tb_barang_zahir.qty then 1 ELSE NULL END) as 'match',
        COUNT(CASE WHEN tb_opname.QTY1 != tb_barang_zahir.qty then 1 ELSE NULL END) as 'not'
        FROM tb_opname
        JOIN tb_barang_zahir ON tb_barang_zahir.id_opname = tb_opname.id_opname
        WHERE tb_barang_zahir.sektor = '$sektor'
        ");
    }

    public function countVivo()
    {
        return $this->db->query("SELECT  
        COUNT(b.kode_barang) AS total,
        COUNT(CASE WHEN (a.QTY1-COALESCE(c.qty,0))-b.qty = 0 then 1 ELSE NULL END) as 'match',
        COUNT(CASE WHEN (a.QTY1-COALESCE(c.qty,0))-b.qty != 0 then 1 ELSE NULL END) as 'not'
        FROM tb_opname a
        JOIN tb_barang_zahir b ON b.id_opname = a.id_opname 
        LEFT JOIN tb_pending c on c.kode_pending = a.kode_pending");
    }

    public function listMatchVivo()
    {
        return $this->db->query("SELECT 
        a.kode_barang,
        b.nama_barang, 
        b.exp_date,
        b.sektor,
        COALESCE(c.qty,0) AS faktur_pending,
        b.qty as saldo_buku,
        b.stok_box as box_buku,
        b.stok_pcs as pcs_buku,
        a.QTY1 as saldo_fisik,
        a.stok_box1 as box_fisik,
        a.stok_pcs1 as pcs_fisik,
        COALESCE(c.qty,0) AS faktur_pending,
        (a.QTY1-COALESCE(c.qty,0))-b.qty as selisih,
        CASE WHEN (a.QTY1-COALESCE(c.qty,0))-b.qty = 0 THEN 'match' ELSE 'not' END AS hasil 
        FROM tb_opname a 
        JOIN tb_barang_zahir b ON b.id_opname = a.id_opname 
        LEFT JOIN tb_pending c on c.kode_pending = a.kode_pending ");
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
        ORDER BY tb_barang_zahir.nama_barang");
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

    public function countfakturPending()
    {
        return $this->db->query("SELECT 
        COUNT(x.nama_barang) as total,
        COUNT(CASE WHEN  x.qty_b - COALESCE(x.qty_c,0) = x.qty_a then 1 ELSE NULL END) as 'match',
        COUNT(CASE WHEN  x.qty_b - COALESCE(x.qty_c,0) != x.qty_a then 1 ELSE NULL END) as 'not'
        From
        ( Select 
        a.id_barang,
        a.kode_barang,
        a.nama_barang,
       	sum(a.qty) as qty_a, (SELECT sum(c.qty) from tb_pending c where c.kode_pending = a.kode_pending group by c.kode_pending) as qty_c,
        (select sum(b.QTY1) from tb_opname b where b.kode_barang = a.kode_barang group by b.kode_barang ) as qty_b
        from tb_barang_zahir a group by a.kode_barang 
        ) as x  
        
        ");
    }

    public function listCountByPending()
    {
        return $this->db->query("SELECT 
        x.id_barang,
        x.kode_barang,
        x.nama_barang,
        x.sektor,
        x.qty_a AS saldo_buku,
        COALESCE(x.qty_c,0) as faktur_pending,
        x.qty_b - COALESCE(x.qty_c,0)-x.qty_a AS selisih,
        x.qty_b,
        (CASE WHEN x.qty_b - COALESCE(x.qty_c,0) = x.qty_a THEN 'match' ELSE 'not match' END) AS hasil
        FROM
        (Select 
        a.id_barang,
        a.kode_barang,
        a.nama_barang,
        a.sektor,
        sum(a.qty) as qty_a,
        (SELECT sum(c.qty) from tb_pending c where c.kode_barang = a.kode_barang group by c.kode_barang) as qty_c,
        (SELECT sum(b.QTY1) from tb_opname b where b.kode_barang = a.kode_barang group by b.kode_barang ) as qty_b 
        from tb_barang_zahir a group by a.kode_barang) as x  
        ORDER BY x.id_barang  ASC 
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

    public function countUser()
    {
        return $this->db->query("SELECT COUNT(user.nama_user)-3 as total FROM user");
    }

    public function countBaranguser($sektor)
    {
        return $this->db->query("SELECT
        COUNT(tb_barang_zahir.kode_barang) as total_barang
         FROM tb_barang_zahir where tb_barang_zahir.sektor = '$sektor'
        ");
    }
}
