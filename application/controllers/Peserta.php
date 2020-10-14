<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('DiklatModel');
    }

    public function index()
    {
        $data['title'] = 'Home - Bidang PKT BPSDM Provinsi Bali';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user'] == null) {
            redirect('auth');
        } else {
            $this->load->view('peserta/index', $data);
        }
    }

    public function table()
    {
        $data['title'] = 'Materi Diklat - Bidang PKT BPSDM Provinsi Bali';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user'] == null) {
            redirect('auth');
        } else {
            $this->load->view('peserta/table', $data);
        }
    }

    public function registrasidiklat()
    {
        $data['title'] = 'Registrasi Peserta Diklat - Bidang PKT BPSDM Provinsi Bali';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user'] == null) {
            redirect('auth');
        } else {
            $this->load->view('peserta/registrasidiklat', $data);
        }
    }

    public function tambah_registrasidiklat()
    {
        $this->form_validation->set_rules('diklat', 'Diklat', 'trim|required');
        // $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|integer|is_unique[peserta.nip]');
        $this->form_validation->set_rules('pangkat/gol', 'Pangkat / Golongan', 'trim|required');
        $this->form_validation->set_rules('ttl', 'Tempat / Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'trim|required');
        $this->form_validation->set_rules('ktp', 'KTP', 'trim|required|integer');
        $this->form_validation->set_rules('npwp', 'NPWP', 'trim|required|integer');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telepon', 'trim|required|integer|max_length[15]');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('peserta/registrasidiklat', $data);
        } else {
            $data = [
                'diklat' => $this->input->post('diklat'),
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'npwp' => $this->input->post('npwp'),
                'ktp' => $this->input->post('ktp'),
                'pangkatgol' => $this->input->post('pangkat/gol'),
                'ttl' => $this->input->post('ttl'),
                'jabatan' => $this->input->post('jabatan'),
                'instansi' => $this->input->post('instansi'),
                'agama' => $this->input->post('agama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'telp' => $this->input->post('telp'),
            ];

            $this->db->insert('peserta', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Selamat mengikuti kegiatan diklat');
            }
            redirect('peserta');
        }
    }
}
