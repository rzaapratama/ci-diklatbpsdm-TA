<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DiklatModel extends CI_Model
{
    public function add($data)
    {
        $this->db->insert('diklat', $data);
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('diklat');
        $query = $this->db->get();

        return $query;
    }

    public function getdiklat($id)
    {
        $this->db->select('*');
        $this->db->where('id_diklat', $id);
        $this->db->from('diklat');
        $query = $this->db->get();

        return $query;
    }

    public function update($data, $id)
    {
        $this->db->where('id_diklat', $id);
        $this->db->update('diklat', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_diklat', $id);
        $this->db->delete('diklat');
    }
}
