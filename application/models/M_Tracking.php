<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class M_Tracking extends CI_Model
{
    //ServerSide-tb-opname
    var $table = 'v_trackingopname'; //nama tabel dari database
    var $column_order = array('id_opname', 'kode_barang','nama_barang', 'stok_box1', 'stok_pcs1', 'QTY1', 'sektor'); //field yang ada di table user
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

    public function create_v_trackingopname()
    {

        return $this->db->query("SELECT 
    COUNT(x.id_barang) as total,
    COUNT(CASE WHEN COALESCE(x.qtyOpname,0)-(x.qtyZahir + COALESCE(x.qtyPending,0)) = 0 then 1 ELSE NULL END) as 'match',
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
}
