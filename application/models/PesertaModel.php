<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PesertaModel extends CI_Model
{
    public function add($data)
    {
        $this->db->insert('peserta', $data);
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('peserta');
        $query = $this->db->get();

        return $query;
    }

    public function getpeserta($id)
    {
        $this->db->select('*');
        $this->db->where('nip', $id);
        $this->db->from('peserta');
        $query = $this->db->get();

        return $query;
    }

    public function update($data, $id)
    {
        $this->db->where('nip', $id);
        $this->db->update('peserta', $data);
    }

    public function delete($id)
    {
        $this->db->where('nip', $id);
        $this->db->delete('peserta');
    }
}
