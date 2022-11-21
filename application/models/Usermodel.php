<?php
defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Usermodel extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('user')->result();
    }

    public function addUser($data)
    {
        return $this->db->insert('user', $data);
    }

    public function editUser($iduser,$data)
     {
        $this->db->where('id_user',$iduser);
        return $this->db->update('user',$data);
     }
}
