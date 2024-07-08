SELECT
    `x`.`id_barang` AS `id_barang`,
    `x`.`kode_barang` AS `kode_barang`,
    `x`.`nama_barang` AS `nama_barang`,
    `x`.`qtyZahir` AS `saldo_buku`,
    COALESCE(`x`.`qtyPending`, 0) AS `faktur_pending`,
    (x.qtyZahir+COALESCE(x.qtyPending,0)) - COALESCE(x.qtyOpname,0) AS `selisih`,
    COALESCE(`x`.`qtyOpname`, 0) AS `qtyOpname`,
    CASE WHEN (x.qtyZahir+COALESCE(x.qtyPending,0)) - COALESCE(x.qtyOpname,0) THEN 'not match' ELSE 'match'
END AS `hasil`
FROM
    (
    SELECT
        `a`.`id_barang` AS `id_barang`,
        `a`.`kode_barang` AS `kode_barang`,
        `a`.`nama_barang` AS `nama_barang`,
        SUM(`a`.`qty`) AS `qtyZahir`,
        (
        SELECT
            SUM(`c`.`qty`)
        FROM
            `kiucoid_stockopname`.`tb_pending` `c`
        WHERE
            `c`.`kode_barang` = `a`.`kode_barang`
        GROUP BY
            `c`.`kode_barang`
    ) AS `qtyPending`,
    (
    SELECT
        SUM(`b`.`QTY1`)
    FROM
        `kiucoid_stockopname`.`tb_opname` `b`
    WHERE
        `b`.`kode_barang` = `a`.`kode_barang`
    GROUP BY
        `b`.`kode_barang`
) AS `qtyOpname`
FROM
    `kiucoid_stockopname`.`tb_barang_zahir` `a`
GROUP BY
    `a`.`kode_barang`
) `x`
ORDER BY
    `x`.`id_barang`