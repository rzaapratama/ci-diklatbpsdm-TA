<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JadwalBMModel extends CI_Model
{
    public function add($data)
    {
        $this->db->insert('jadwalbm', $data);
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('jadwalbm');
        $query = $this->db->get();

        return $query;
    }

    public function getjadwalbm($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('jadwalbm');
        $query = $this->db->get();

        return $query;
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('jadwalbm', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jadwalbm');
    }
}
