<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MateriModel extends CI_Model
{
    public function add($data)
    {
        $this->db->insert('materi', $data);
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('materi');
        $query = $this->db->get();

        return $query;
    }

    public function getmateri($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('materi');
        $query = $this->db->get();

        return $query;
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('materi', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('materi');
    }
}
