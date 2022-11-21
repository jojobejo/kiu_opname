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
}
