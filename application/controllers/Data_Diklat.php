<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Diklat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DiklatModel');
    }

    public function index()
    {
        $data['title'] = 'Halaman Data Diklat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['diklat'] = $this->DiklatModel->get()->result_array();

        if ($data['user']["role_id"] == "1") {
            $this->load->view('admin/data_diklat', $data);
        } else {
            redirect('auth');
        }
    }
}
