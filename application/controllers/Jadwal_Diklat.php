<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal_Diklat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('JadwalDiklatModel');
    }

    public function index()
    {
        $data['title'] = 'Halaman Jadwal Diklat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jadwaldiklat'] = $this->JadwalDiklatModel->get()->result_array();

        if ($data['user']["role_id"] == "1") {
            $this->load->view('admin/jadwal_diklat', $data);
        } else {
            redirect('auth');
        }
    }
}
