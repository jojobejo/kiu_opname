<?php
defined('BASEPATH') or exit('No direct script access allowed');


class M_Opname extends CI_Model
{
    public function addOpname($data)
    {
        return $this->db->insert('tb_opname', $data);
    }

    public function addBarang($data1)
    {
        return $this->db->insert('tb_opname', $data1);
    }


    // START SERVERSIDE - BARANG - OPNAME

    var $table = 'tb_master_barang'; //nama tabel dari database
    var $column_order = array('nama_barang', 'exp_date', 'id_master_barang',); //field yang ada di table user
    var $column_search = array('nama_barang', 'exp_date'); //field yang diizin untuk pencarian 
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

    // END SERVERSIDE - BARANG - OPNAME

    // START SERVER SIDE - ALL-BARANG

    var $table1 = 'v_listmatchallbarang'; //nama tabel dari database
    var $column_order1 = array('nama_barang', 'saldo_buku', 'faktur_pending', 'qtyOpname', 'selisih', 'hasil'); //field yang ada di table user
    var $column_search1 = array('nama_barang'); //field yang diizin untuk pencarian 
    var $order1 = array('nama_barang' => 'asc'); // default order 

    private function _get_datatables_query1()
    {

        $this->db->from($this->table1);

        $i = 0;

        foreach ($this->column_search1 as $item) // looping awal
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

                if (count($this->column_search1) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order1[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order1)) {
            $order1 = $this->order1;
            $this->db->order_by(key($order1), $order1[key($order1)]);
        }
    }

    function get_datatables1()
    {
        $this->_get_datatables_query1();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered1()
    {
        $this->_get_datatables_query1();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all1()
    {
        $this->db->from($this->table1);
        return $this->db->count_all_results();
    }

    // END SERVERSIDE ALL BARANG


    public function getAllBarang()
    {
        return $this->db->get('tb_barang_zahir')->result();
    }

    public function getBarangById($id)
    {
        $this->db->from('tb_master_barang');
        $this->db->where('id_master_barang', $id);
        $query = $this->db->get();

        return $query->row();
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
        $this->db->order_by('kode_barang', 'ASC');
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

    public function getBarangOpname()
    {
        return $this->db->get('tb_opname')->result();
    }
    public function getInputOpname($sektor)
    {
        return $this->db->query("SELECT
        COALESCE(b.id_opname,0)as idopname ,a.kode_barang, a.nama_barang , b.exp_date , a.hasil_dimensi , b.stok_box1 , b.stok_pcs1, b.kode_pending
        FROM tb_barang_zahir a 
        LEFT JOIN tb_opname b ON b.kode_barang = a.kode_barang
        WHERE a.sektor = '$sektor'");
    }

    public function editInputOpname($data, $idopname)
    {
        $this->db->where('id_opname', $idopname);
        return $this->db->update('tb_opname', $data);
    }

    public function getMatchUser($sektor)
    {
        return $this->db->query("SELECT 
		x.id_opname,
        x.kode_barang,
        x.nama_barang,
        x.exp_date,
        x.qtyZahir,
        COALESCE(x.qtyPending,0) AS qtyPending,
        x.qtyFisik,
        x.box_zahir,
        x.stok_box1,
        x.pcs_zahir,
        x.stok_pcs1,
        x.hasil_dimensi,
        x.sektor,
        (CASE WHEN x.qtyFisik - COALESCE(x.qtyPending,0) = x.qtyZahir THEN 'match' ELSE 'not match' END) AS hasil
        FROM
        (Select 
        a.id_opname,
        a.kode_barang,
        a.nama_barang,
        a.exp_date,
		a.kode_pending,
        a.stok_box1,
        a.stok_pcs1,
        a.QTY1,
        a.sektor,
         
(SELECT SUM(g.qty) from tb_barang_zahir g where g.kode_barang = a.kode_barang and g.exp_date = a.exp_date) as qtyZahir,         
(SELECT sum(c.qty) from tb_pending c where c.kode_barang = a.kode_barang and c.exp_date = a.exp_date group by c.nama_barang) as qtyPending,
(SELECT SUM(b.QTY1) from tb_opname b where b.kode_barang = a.kode_barang AND b.exp_date = a.exp_date group by b.nama_barang ) as qtyFisik,
(SELECT d.stok_box FROM tb_barang_zahir d WHERE d.kode_barang = a.kode_barang AND d.exp_date = a.exp_date GROUP BY d.nama_barang) AS box_zahir,
(SELECT d.stok_pcs FROM tb_barang_zahir d WHERE d.kode_barang = a.kode_barang AND d.exp_date = a.exp_date GROUP BY d.nama_barang) AS pcs_zahir,
(SELECT d.hasil_dimensi FROM tb_barang_zahir d WHERE d.kode_barang = a.kode_barang AND d.exp_date = a.exp_date GROUP BY d.nama_barang) AS hasil_dimensi
         
from tb_opname a where a.sektor = $sektor) as x  ORDER BY `x`.`nama_barang` ASC");
    }

    public function prsenUser($sektor)
    {
        return $this->db->query("SELECT 
        COUNT(x.kode_barang) as total,
        COUNT(CASE WHEN (x.qty_b -COALESCE(x.qty_c,0))-x.qty_a = 0 then 1 ELSE NULL END) as 'match',
        COUNT(CASE WHEN (x.qty_b -COALESCE(x.qty_c,0))-x.qty_a != 0 then 1 ELSE NULL END) as 'not'
        
        FROM
        (Select 
        a.id_barang,
        a.kode_barang,
        a.nama_barang,
        a.exp_date,
        a.sektor,
        a.stok_box,
        a.stok_pcs,
        a.sktor_tambahan,
        
(SELECT sum(g.qty) from tb_barang_zahir g where g.kode_barang = a.kode_barang and g.exp_date = a.exp_date group by g.nama_barang) as qty_a,         
(SELECT sum(c.qty) from tb_pending c where c.kode_barang = a.kode_barang and c.exp_date = a.exp_date group by c.nama_barang) as qty_c,
(SELECT sum(b.QTY1) from tb_opname b where b.kode_barang = a.kode_barang AND b.exp_date = a.exp_date group by b.nama_barang ) as qty_b,
(SELECT sum(stok_box1)  from tb_opname d where d.kode_barang = a.kode_barang AND d.exp_date = a.exp_date group by d.nama_barang ) as stkbox,
(SELECT sum(stok_pcs1)  from tb_opname e where e.kode_barang = a.kode_barang AND e.exp_date = a.exp_date group by e.nama_barang ) as stkpcs,
(SELECT QTY1  from tb_opname f where f.kode_barang = a.kode_barang group by f.nama_barang ) as salqty
         
        from tb_barang_zahir a WHERE a.sektor = '$sektor'  group by a.nama_barang,a.exp_date) as x  
        ORDER BY x.id_barang
        ");
    }


    public function countFivo()
    {
        return $this->db->get('countFivo')->result();
    }

    public function countVivo()
    {
        return $this->db->query("SELECT 
		COUNT(x.id_barang) as total,
        COUNT(CASE WHEN (x.qtyZahir + COALESCE(x.qtyPending,0))-COALESCE(x.qtyOpname,0) = 0 then 1 ELSE NULL END) as 'match',
        COUNT(CASE WHEN (x.qtyZahir + COALESCE(x.qtyPending,0))-COALESCE(x.qtyOpname,0) != 0 then 1 ELSE NULL END) as 'not'
                FROM
                (Select 
                a.id_barang,
        (SELECT sum(g.qty) from tb_barang_zahir g where g.kode_barang = a.kode_barang and g.exp_date = a.exp_date group by g.kode_barang) as qtyZahir,     
        (SELECT sum(c.qty) from tb_pending c where c.kode_barang = a.kode_barang and c.exp_date = a.exp_date group by c.kode_barang) as qtyPending,
        (SELECT sum(b.QTY1) from tb_opname b where b.kode_barang = a.kode_barang AND b.exp_date = a.exp_date group by b.kode_barang ) as qtyOpname
                from tb_barang_zahir a  group by a.kode_barang,a.nama_barang,a.exp_date) as x  
                ORDER BY x.id_barang");
    }

    public function v_listMatchVivo()
    {
        return $this->db->query("SELECT 
		x.kode_barang,
        x.nama_barang,
        x.exp_date,
        x.qtyZahir AS saldo_buku,
        x.stok_box AS box_buku,
        x.stok_pcs AS pcs_buku,
        COALESCE(x.qtyPending,0) as faktur_pending,
        COALESCE(x.qtyOpname,0) as saldo_fisik,
        COALESCE(x.stkbox,0) as box_fisik,
        COALESCE(x.stkpcs,0) as pcs_fisik,
        COALESCE(x.qtyOpname,0) - COALESCE(x.qtyPending,0)-x.qtyZahir AS selisih,
        (CASE WHEN COALESCE(x.qtyOpname,0) - COALESCE(x.qtyPending,0) = x.qtyZahir THEN 'match' ELSE 'not match' END) AS hasil
        FROM
        (Select 
        a.id_barang,
        a.kode_barang,
        a.nama_barang,
        a.exp_date,
        a.stok_box,
        a.stok_pcs,
(SELECT sum(g.qty) from tb_barang_zahir g where g.kode_barang = a.kode_barang and g.exp_date = a.exp_date group by g.kode_barang) as qtyZahir,     
(SELECT sum(c.qty) from tb_pending c where c.kode_barang = a.kode_barang and c.kode_pending = a.kode_pending group by c.kode_barang) as qtyPending,
(SELECT sum(b.QTY1) from tb_opname b where b.kode_barang = a.kode_barang AND b.exp_date = a.exp_date group by b.kode_barang ) as qtyOpname,
(SELECT sum(stok_box1)  from tb_opname d where d.kode_barang = a.kode_barang AND d.exp_date = a.exp_date group by d.kode_barang ) as stkbox,
(SELECT sum(stok_pcs1)  from tb_opname e where e.kode_barang = a.kode_barang AND e.exp_date = a.exp_date group by e.kode_barang ) as stkpcs,
(SELECT QTY1  from tb_opname f where f.kode_barang = a.kode_barang group by f.kode_barang ) as salqty
        from tb_barang_zahir a  group by a.kode_barang,a.nama_barang,a.exp_date) as x  
        ORDER BY x.id_barang");
    }


    // SELECT 
    //     x.nama_barang,
    //     x.exp_date,
    //     x.sektor,
    //     x.qty_a AS saldo_buku,
    //     x.stok_box as saldo_buku_box,
    //     x.stok_pcs as saldo_buku_pcs,
    //     x.salqty as saldo_fisik,
    //     x.stkbox as fisik_box,
    //     x.stkpcs as fisik_pcs,
    //     COALESCE(x.qty_c,0) as faktur_pending,
    //     x.qty_b - COALESCE(x.qty_c,0)-x.qty_a AS selisih,
    //     x.qty_b,
    //     (CASE WHEN x.qty_b - COALESCE(x.qty_c,0) = x.qty_a THEN 'match' ELSE 'not match' END) AS hasil
    //     FROM
    //     (Select 
    //     a.id_barang,
    //     a.kode_barang,
    //     a.nama_barang,
    //     a.exp_date,
    //     a.sektor,
    //     a.stok_box,
    //     a.stok_pcs,
    //     sum(a.qty) as qty_a,
    //     (SELECT sum(c.qty) from tb_pending c where c.kode_barang = a.kode_barang group by c.kode_barang) as qty_c,
    //     (SELECT sum(b.QTY1) from tb_opname b where b.kode_barang = a.kode_barang group by b.kode_barang ) as qty_b,
    //     (SELECT sum(stok_box1)  from tb_opname d where d.kode_barang = a.kode_barang group by d.kode_barang ) as stkbox,
    //     (SELECT sum(stok_pcs1)  from tb_opname e where e.kode_barang = a.kode_barang group by e.kode_barang ) as stkpcs,
    //     (SELECT QTY1  from tb_opname f where f.kode_barang = a.kode_barang group by f.kode_barang ) as salqty
    //     from tb_barang_zahir a group by a.nama_barang,a.exp_date) as x  
    //     WHERE x.sektor = '1'
    //     ORDER BY x.id_barang  ASC 


    // CODE BENAR , KONSEP SALAH ->
    // public function listMatchVivo()
    // {
    //     return $this->db->query("SELECT 
    //     a.kode_barang,
    //     b.nama_barang, 
    //     b.exp_date,
    //     b.sektor,
    //     COALESCE(c.qty,0) AS faktur_pending,
    //     b.qty as saldo_buku,
    //     b.stok_box as box_buku,
    //     b.stok_pcs as pcs_buku,
    //     a.QTY1 as saldo_fisik,
    //     a.stok_box1 as box_fisik,
    //     a.stok_pcs1 as pcs_fisik,
    //     COALESCE(c.qty,0) AS faktur_pending,
    //     (a.QTY1-COALESCE(c.qty,0))-b.qty as selisih,
    //     CASE WHEN (a.QTY1-COALESCE(c.qty,0))-b.qty = 0 THEN 'match' ELSE 'not' END AS hasil 
    //     FROM tb_opname a 
    //     JOIN tb_barang_zahir b ON b.id_opname = a.id_opname 
    //     LEFT JOIN tb_pending c on c.kode_pending = a.kode_pending ");
    // }

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


    public function hitung_persentase_kecocokan()
    {
        return $this->db->get('hitung_persentase_kecocokan')->result();
    }

    public function countPersentaseAllBarangWithPending()
    {
        return $this->db->query("SELECT 
		COUNT(x.id_barang) as total,
        COUNT(CASE WHEN (x.qtyBesar + COALESCE(x.qtyPending,0))-COALESCE(x.qtyOpname,0) = 0 then 1 ELSE NULL END) as 'match',
        COUNT(CASE WHEN (x.qtyBesar + COALESCE(x.qtyPending,0))-COALESCE(x.qtyOpname,0) != 0 then 1 ELSE NULL END) as 'not'
        FROM
        (Select 
        a.id_barang,
        a.kode_barang,
         sum(a.qty) as qtyBesar,
        (SELECT sum(c.qty) from tb_pending c where c.kode_barang = a.kode_barang group by c.kode_barang) as qtyPending,
        (SELECT sum(b.QTY1) from tb_opname b where b.kode_barang = a.kode_barang group by b.kode_barang ) as qtyOpname 
        from tb_barang_zahir a group by a.kode_barang) as x  
        ORDER BY x.id_barang  ASC 
        ");
    }

    public function countfakturPending()
    {
        return $this->db->query("SELECT 
        COUNT(x.kode_barang) as total,
        COUNT(CASE WHEN (x.qty_b -COALESCE(x.qty_c,0))-x.qty_a = 0 then 1 ELSE NULL END) as 'match',
        COUNT(CASE WHEN (x.qty_b -COALESCE(x.qty_c,0))-x.qty_a != 0 then 1 ELSE NULL END) as 'not'
        
        FROM
        (Select 
        a.id_barang,
        a.kode_barang,
        a.nama_barang,
        a.exp_date,
        a.sektor,
        a.stok_box,
        a.stok_pcs,
        a.sktor_tambahan,
        
(SELECT sum(g.qty) from tb_barang_zahir g where g.kode_barang = a.kode_barang  group by g.nama_barang) as qty_a,         
(SELECT sum(c.qty) from tb_pending c where c.kode_barang = a.kode_barang  group by c.nama_barang) as qty_c,
(SELECT sum(b.QTY1) from tb_opname b where b.kode_barang = a.kode_barang group by b.nama_barang ) as qty_b,
(SELECT sum(stok_box1)  from tb_opname d where d.kode_barang = a.kode_barang group by d.nama_barang ) as stkbox,
(SELECT sum(stok_pcs1)  from tb_opname e where e.kode_barang = a.kode_barang group by e.nama_barang ) as stkpcs,
(SELECT QTY1  from tb_opname f where f.kode_barang = a.kode_barang group by f.nama_barang ) as salqty
         
        from tb_barang_zahir a  group by a.nama_barang) as x  
        ORDER BY x.id_barang
        
        ");
    }

    public function listCountByPending()
    {
        return $this->db->query("SELECT 
        x.id_barang,
        x.kode_barang,
        x.nama_barang,
        x.qtyZahir AS saldo_buku,
        COALESCE(x.qtyPending,0) as faktur_pending,
        COALESCE(x.qtyOpname,0) - COALESCE(x.qtyPending,0)-x.qtyZahir AS selisih,
        COALESCE(x.qtyOpname,0) as qtyOpname,
        (CASE WHEN COALESCE(x.qtyOpname,0) - COALESCE(x.qtyPending,0) = x.qtyZahir THEN 'match' ELSE 'not match' END) AS hasil
        FROM
        (Select 
        a.id_barang,
        a.kode_barang,
        a.nama_barang,
        sum(a.qty) as qtyZahir,
        (SELECT sum(c.qty) from tb_pending c where c.kode_barang = a.kode_barang and c.kode_pending = a.kode_pending group by c.kode_barang) as qtyPending,
        (SELECT sum(b.QTY1) from tb_opname b where b.kode_barang = a.kode_barang group by b.kode_barang ) as qtyOpname 
        from tb_barang_zahir a group by a.kode_barang) as x  
        ORDER BY x.id_barang  ASC 
        ");
    }

    public function queryViewListSumarryAllBarang()
    {
        return $this->db->query("CREATE VIEW v_listmatchAllBarang AS
        SELECT 
                x.kode_barang,
                x.nama_barang,
                x.sektor,
                x.qty_a AS saldo_buku,
                COALESCE(x.qty_c,0) as faktur_pending,
                COALESCE(x.qty_b,0) - COALESCE(x.qty_c,0)-COALESCE(x.qty_a,0) AS selisih,
                COALESCE(x.qty_b,0) as qtyOpname,
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

    public function countBaranguser()
    {
        return $this->db->query("SELECT
        COUNT(tb_barang_zahir.kode_barang) as total_barang
         FROM tb_barang_zahir 
        ");
    }
}
