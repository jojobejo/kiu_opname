 SELECT 
		x.id_opname,
        x.kode_barang,
        x.nama_barang,
        x.exp_date,
        x.qtyZahir,
        x.qtyPending,
        (x.qtyZahir+x.qtyPending) AS saldoQty,
        x.sumqtyFisik,
        x.qtyFisik,
        x.sumqtyFisik-(x.qtyZahir+x.qtyPending) AS realQty,
        (CASE WHEN (x.qtyZahir+x.qtyPending)-x.sumqtyFisik = 0 THEN 'match' ELSE 'not match' END) AS hasil
        FROM
        (Select 
        a.id_opname,
        a.kode_barang,
        a.nama_barang,
        a.exp_date,
        a.stok_box1,
        a.stok_pcs1,
        a.QTY1 AS qtyFisik,
        a.sektor,
(SELECT SUM(h.stok_pcs1) FROM tb_opname h WHERE h.kode_barang = a.kode_barang AND h.exp_date = a.exp_date) as stk_pcs,         
(SELECT SUM(g.qty) from tb_barang_zahir g where g.kode_barang = a.kode_barang and g.exp_date = a.exp_date) as qtyZahir,         
(SELECT sum(c.qty) from tb_pending c where c.kode_barang = a.kode_barang group by c.nama_barang) as qtyPending,
(SELECT SUM(b.QTY1) from tb_opname b where b.kode_barang = a.kode_barang AND b.exp_date = a.exp_date group by b.nama_barang ) as sumqtyFisik,
(SELECT d.stok_box FROM tb_barang_zahir d WHERE d.kode_barang = a.kode_barang AND d.exp_date = a.exp_date GROUP BY d.nama_barang) AS box_zahir,
(SELECT d.stok_pcs FROM tb_barang_zahir d WHERE d.kode_barang = a.kode_barang AND d.exp_date = a.exp_date GROUP BY d.nama_barang) AS pcs_zahir,
(SELECT d.hasil_dimensi FROM tb_barang_zahir d WHERE d.kode_barang = a.kode_barang AND d.exp_date = a.exp_date GROUP BY d.nama_barang) AS hasil_dimensi
         
from tb_opname a where a.sektor = '1') as x  ORDER BY `x`.`nama_barang` ASC