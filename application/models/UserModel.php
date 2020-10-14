<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
{
    public function add($data)
    {
        $this->db->insert('user', $data);
    }

    public function get()
    {
        $this->db->select('*');
        $this->db->from('user');
        $query = $this->db->get();

        return $query;
    }

    public function getuser($id)
    {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('user');
        $query = $this->db->get();

        return $query;
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}
