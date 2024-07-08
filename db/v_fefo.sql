SELECT
    `x`.`nama_barang` AS `nama_barang`,
    `x`.`exp_date` AS `exp_date`,
    `x`.`qtyZahir` AS `saldo_buku`,
    `x`.`stok_box` AS `box_buku`,
    `x`.`stok_pcs` AS `pcs_buku`,
    COALESCE(`x`.`qtyPending`, 0) AS `faktur_pending`,
    COALESCE(`x`.`qtyOpname`, 0) AS `saldo_fisik`,
    COALESCE(`x`.`stkbox`, 0) AS `box_fisik`,
    COALESCE(`x`.`stkpcs`, 0) AS `pcs_fisik`,
    COALESCE (x.qtyZahir+COALESCE(x.qtyPending,0))-COALESCE(x.qtyOpname,0) AS `selisih`,
    CASE WHEN (x.qtyZahir+COALESCE(x.qtyPending,0))-COALESCE(x.qtyOpname,0) THEN 'match' ELSE 'not match'
END AS `hasil`
FROM
    (
    SELECT
        `a`.`id_barang` AS `id_barang`,
        `a`.`kode_barang` AS `kode_barang`,
        `a`.`nama_barang` AS `nama_barang`,
        `a`.`exp_date` AS `exp_date`,
        `a`.`stok_box` AS `stok_box`,
        `a`.`stok_pcs` AS `stok_pcs`,
        (
        SELECT
            SUM(`g`.`qty`)
        FROM
            `kiucoid_stockopname`.`tb_barang_zahir` `g`
        WHERE
            `g`.`kode_barang` = `a`.`kode_barang` AND `g`.`exp_date` = `a`.`exp_date`
        GROUP BY
            `g`.`kode_barang`
    ) AS `qtyZahir`,
    (
    SELECT
        SUM(`c`.`qty`)
    FROM
        `kiucoid_stockopname`.`tb_pending` `c`
    WHERE
        `c`.`kode_barang` = `a`.`kode_barang` AND `c`.`exp_date` = `a`.`exp_date`
    GROUP BY
        `c`.`kode_barang`
) AS `qtyPending`,
(
    SELECT
        SUM(`b`.`QTY1`)
    FROM
        `kiucoid_stockopname`.`tb_opname` `b`
    WHERE
        `b`.`kode_barang` = `a`.`kode_barang` AND `b`.`exp_date` = `a`.`exp_date`
    GROUP BY
        `b`.`kode_barang`
) AS `qtyOpname`,
(
    SELECT
        SUM(`d`.`stok_box1`)
    FROM
        `kiucoid_stockopname`.`tb_opname` `d`
    WHERE
        `d`.`kode_barang` = `a`.`kode_barang` AND `d`.`exp_date` = `a`.`exp_date`
    GROUP BY
        `d`.`kode_barang`
) AS `stkbox`,
(
    SELECT
        SUM(`e`.`stok_pcs1`)
    FROM
        `kiucoid_stockopname`.`tb_opname` `e`
    WHERE
        `e`.`kode_barang` = `a`.`kode_barang` AND `e`.`exp_date` = `a`.`exp_date`
    GROUP BY
        `e`.`kode_barang`
) AS `stkpcs`,
(
    SELECT
        `f`.`QTY1`
    FROM
        `kiucoid_stockopname`.`tb_opname` `f`
    WHERE
        `f`.`kode_barang` = `a`.`kode_barang`
    GROUP BY
        `f`.`kode_barang`
) AS `salqty`
FROM
    `kiucoid_stockopname`.`tb_barang_zahir` `a`
GROUP BY
    `a`.`kode_barang`,
    `a`.`nama_barang`,
    `a`.`exp_date`
) `x`
ORDER BY
    `x`.`id_barang`