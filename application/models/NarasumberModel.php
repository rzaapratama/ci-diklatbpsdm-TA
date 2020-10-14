<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NarasumberModel extends CI_Model
{
    public function add($data)
    {
        $this->db->insert('narasumber', $data);
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('narasumber');
        $query = $this->db->get();

        return $query;
    }

    public function getnarasumber($id)
    {
        $this->db->select('*');
        $this->db->where('nip', $id);
        $this->db->from('narasumber');
        $query = $this->db->get();

        return $query;
    }

    public function update($data, $id)
    {
        $this->db->where('nip', $id);
        $this->db->update('narasumber', $data);
    }

    public function delete($id)
    {
        $this->db->where('nip', $id);
        $this->db->delete('narasumber');
    }
}
