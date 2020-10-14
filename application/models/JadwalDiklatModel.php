<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalDiklatModel extends CI_Model
{
    public function add($data)
    {
        $this->db->insert('jadwaldiklat', $data);
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('jadwaldiklat');
        $query = $this->db->get();

        return $query;
    }

    public function getjadwal($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('jadwaldiklat');
        $query = $this->db->get();

        return $query;
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('jadwaldiklat', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jadwaldiklat');
    }
}
