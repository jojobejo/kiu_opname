<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class M_Testing extends CI_Model
{
    public function a()
    {
        return $this->db->query("SELECT
            a.kode_barang AS kode_barang,
            a.nama_barang AS nama_barang,
            a.exp_date AS exp_date,
            SUM(a.qty) AS qty
            FROM tb_saldo_exp a
            GROUP BY a.kode_barang , a.exp_date
        ");
    }
}

SELECT
			a.id AS id,
            a.kode_barang AS kode_barang,
            a.nama_barang AS nama_barang,
            a.exp_date AS exp_date,
            SUM(a.qty) AS qty
            FROM tb_saldo_exp a
            GROUP BY a.kode_barang , a.exp_date
