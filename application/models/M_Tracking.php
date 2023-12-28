<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class M_Tracking extends CI_Model
{
    //ServerSide-tb-opname
    var $table = 'v_trackingopname'; //nama tabel dari database
    var $column_order = array('id_opname', 'kode_barang', 'kode_pending', 'nama_barang', 'stok_box1', 'stok_pcs1', 'QTY1', 'sektor'); //field yang ada di table user
    var $column_search = array('nama_barang', 'exp_date', 'sektor'); //field yang diizin untuk pencarian 
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

    public function get_by_id($id)
    {
        $this->db->from('v_trackingopname');
        $this->db->where('id_opname', $id);
        $query = $this->db->get();

        return $query->row();
    }

    public function update_opname_edited($where, $data)
    {
        $this->db->update('tb_opname', $data, $where);
        return $this->db->affected_rows();
    }

    public function inserted_opname_edit($data)
    {
        return $this->db->insert('tb_opname', $data);
    }

    public function view_tracking()
    {
        return $this->db->get('v_trackingopname')->result();
    }
}
