<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BerkasModel extends CI_Model
{
    public function add($data)
    {
        $this->db->insert('berkas', $data);
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('berkas');
        $query = $this->db->get();

        return $query;
    }

    public function getberkas($id)
    {
        $this->db->select('*');
        $this->db->where('id_berkas', $id);
        $this->db->from('berkas');
        $query = $this->db->get();

        return $query;
    }

    public function update($data, $id)
    {
        $this->db->where('id_berkas', $id);
        $this->db->update('berkas', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_berkas', $id);
        $this->db->delete('berkas');
    }
}
