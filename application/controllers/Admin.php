<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PesertaModel');
        $this->load->model('NarasumberModel');
        $this->load->model('UserModel');
        $this->load->model('JadwalDiklatModel');
        $this->load->model('JadwalBMModel');
        $this->load->model('MateriModel');
        $this->load->model('DiklatModel');
        $this->load->model('BerkasModel');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']["role_id"] == "1") {
            // load data diagram gender
            $query = "SELECT diklat, jenis_kelamin, count(*) as jml 
            FROM peserta 
            WHERE diklat='Diklat TOC' 
            GROUP BY jenis_kelamin";
            $query = $this->db->query($query);
            $result = $query->result_array();

            $data['jenis_kelamin'] = array_map(function ($data) {
                return $data['jenis_kelamin'];
            }, $result);
            $data['jml'] = array_map(function ($data) {
                return $data['jml'];
            }, $result);

            // load data diagram pangkat/golongan
            $query = "SELECT diklat, pangkatgol, count(*) as jml 
            FROM peserta 
            WHERE diklat='Diklat TOC' 
            GROUP BY pangkatgol";
            $query = $this->db->query($query);
            $result = $query->result_array();

            $data['pangkatgol'] = array_map(function ($data) {
                return $data['pangkatgol'];
            }, $result);
            $data['jml_pangkatgol'] = array_map(function ($data) {
                return $data['jml'];
            }, $result);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function diklat($nama_diklat)
    {
        $nama_diklat = str_replace('-', ' ', $nama_diklat);
        $query = "SELECT diklat, jenis_kelamin, count(*) as jml 
        FROM peserta 
        WHERE diklat='" . $nama_diklat . "' 
        GROUP BY jenis_kelamin";
        $query = $this->db->query($query);
        $result = $query->result_array();

        $data['jenis_kelamin'] = array_map(function ($data) {
            return $data['jenis_kelamin'];
        }, $result);
        $data['jml'] = array_map(function ($data) {
            return $data['jml'];
        }, $result);

        echo json_encode($data);
    }

    public function diklatPangkatgol($nama_diklat)
    {
        $nama_diklat = str_replace('-', ' ', $nama_diklat);
        $query = "SELECT diklat, pangkatgol, count(*) as jml 
        FROM peserta 
        WHERE diklat='" . $nama_diklat . "' 
        GROUP BY pangkatgol";
        $query = $this->db->query($query);
        $result = $query->result_array();

        $data['pangkatgol'] = array_map(function ($data) {
            return $data['pangkatgol'];
        }, $result);
        $data['jml_pangkatgol'] = array_map(function ($data) {
            return $data['jml'];
        }, $result);

        echo json_encode($data);
    }

    // public function edit_profile_admin()
    // {
    //     $data['title'] = 'Edit Profile';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     if ($data['user']["role_id"] == "1") {
    //         $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

    //         if ($this->form_validation->run() == false) {
    //             $this->load->view('templates/header', $data);
    //             $this->load->view('templates/navigation', $data);
    //             $this->load->view('admin/edit_profile_admin', $data);
    //             $this->load->view('templates/footer');
    //         } else {
    //             $name = $this->input->post('name');
    //             $email = $this->input->post('email');
    //             $id = $data['user']['id'];

    //             //jika ada gambar yang diupload
    //             $upload_image = $_FILES['image']['name'];
    //             if ($upload_image) {
    //                 $config['allowed_types'] = 'gif|jpg|png';
    //                 $config['max_size'] = '2048';
    //                 $config['upload_path'] = './assets/images';
    //                 $config['max_width'] = 1024;
    //                 $config['max_height'] = 768;

    //                 $this->load->library('upload', $config);

    //                 // jika upload gambar sukses (lolos validasi)
    //                 if ($this->upload->do_upload('image')) {
    //                     $old_image = $data['user']['image'];
    //                     if ($old_image != 'default.jpg') {
    //                         unlink(FCPATH . 'assets/images/' . $old_image);
    //                     }

    //                     // tampung nama file gambar baru di variabel $new_image
    //                     $new_image = $this->upload->data('file_name');
    //                     $this->db->set('image', $new_image);
    //                 } else {
    //                     $this->session->set_flashdata('danger', '' . $this->upload->display_errors());
    //                     redirect('admin/profile_admin');
    //                 }
    //             }

    //             $this->db->set('name', $name);
    //             $this->db->where('email', $email);
    //             $this->db->update('user');

    //             if ($this->db->affected_rows() > 0) {
    //                 $this->session->set_flashdata('success', 'Berhasil Diperbarui');
    //             }
    //             redirect('admin/profile_admin');
    //         }
    //     } else {
    //         redirect('auth');
    //     }
    // }

    public function profile_admin()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']["role_id"] == "1") {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/profile_admin', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }


    // public function edit_password_admin()
    // {
    //     $data['title'] = 'Edit Password';
    //     $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

    //     $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    //     $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[4]|matches[new_password2]');
    //     $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[4]|matches[new_password1]');

    //     if ($data['user']["role_id"] == "1") {

    //         if ($this->form_validation->run() == false) {
    //             $this->load->view('templates/header', $data);
    //             $this->load->view('templates/navigation', $data);
    //             $this->load->view('admin/edit_password_admin', $data);
    //             $this->load->view('templates/footer');
    //         } else {
    //             $current_password = $this->input->post('current_password');
    //             $new_password = $this->input->post('new_password1');
    //             if (!password_verify($current_password, $data['user'], ['password'])) {
    //                 $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
    // 		<strong>Error!</strong> Current password not match.
    // 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    // 			<span aria-hidden="true">&times;</span>
    // 		</button>
    //     </div>');
    //                 redirect('admin/edit_password_admin');
    //             } else {
    //                 if ($current_password == $new_password) {
    //                     $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">
    // 		<strong>Error!</strong> New password cannot be the same.
    // 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    // 			<span aria-hidden="true">&times;</span>
    // 		</button>
    //     </div>');
    //                     redirect('admin/edit_password_admin');
    //                 } else {
    //                     //pasword ok
    //                     $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    //                     $this->db->set('password', $password_hash);
    //                     $this->db->where('email', $this->session->userdata('email'));
    //                     $this->db->update('user');

    //                     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
    //                 }
    //             }
    //         }
    //     } else {
    //         redirect('auth');
    //     }
    // }

    public function daftar_user()
    {
        $data['title'] = 'Daftar User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pengguna'] = $this->UserModel->get()->result_array();

        if ($data['user']["role_id"] == "1") {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/daftar_user', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function tambah_user()
    {
        $data['title'] = 'Halaman Tambah User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']["role_id"] == "1") {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/tambah_user', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function add_new_user()
    {
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email already exist!'
        ]);
        $this->form_validation->set_rules('role_id', 'Role ID', 'trim|required');
        $this->form_validation->set_rules('is_active', 'Status', 'trim|required');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
            'matches' => 'Wrong password!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Tambah User';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/tambah_user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active'),
                'date_created' => time()
            ];

            $this->UserModel->add($data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
            }
            redirect('admin/daftar_user');
        }
    }

    public function edit_user($id)
    {
        $this->form_validation->set_rules('name', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('role_id', 'Role ID', 'trim|required');
        $this->form_validation->set_rules('is_active', 'Status', 'trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Edit User';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['pengguna'] = $this->UserModel->getuser($id)->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/edit_user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role_id'),
                'is_active' => $this->input->post('is_active'),
            ];

            $this->UserModel->update($data, $id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Diperbarui');
            }
            redirect('admin/daftar_user');
        }
    }

    public function delete_user($id)
    {
        $this->UserModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
        }

        redirect('admin/daftar_user');
    }

    public function add()
    {
        $data['title'] = 'Halaman Tambah Data Peserta';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']["role_id"] == "1") {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/tambah_peserta', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function add_process()
    {
        $this->form_validation->set_rules('diklat', 'Diklat', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
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
            $data['title'] = 'Halaman Tambah Data Peserta';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/tambah_peserta', $data);
            $this->load->view('templates/footer');
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

            $this->PesertaModel->add($data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
            }
            redirect('data_peserta');
        }
    }

    public function edit_peserta($id)
    {
        $this->form_validation->set_rules('diklat', 'Diklat', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|integer');
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
            $data['title'] = 'Halaman Edit Data Peserta';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['peserta'] = $this->PesertaModel->getpeserta($id)->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/edit_peserta', $data);
            $this->load->view('templates/footer');
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


            $this->PesertaModel->update($data, $id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Diperbarui');
            }
            redirect('data_peserta');
        }
    }

    public function delete_peserta($id)
    {
        $this->PesertaModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
        }

        redirect('data_peserta');
    }

    public function excel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Kegiatan Diklat');
        $sheet->setCellValue('C1', 'Nama Peserta');
        $sheet->setCellValue('D1', 'NIP');
        $sheet->setCellValue('E1', 'NPWP');
        $sheet->setCellValue('F1', 'KTP');
        $sheet->setCellValue('G1', 'Pangkat/Gol');
        $sheet->setCellValue('H1', 'Tempat/Tgl Lahir');
        $sheet->setCellValue('I1', 'Jabatan');
        $sheet->setCellValue('J1', 'Instansi');
        $sheet->setCellValue('K1', 'Agama');
        $sheet->setCellValue('L1', 'Jenis Kelamin');
        $sheet->setCellValue('M1', 'Alamat');
        $sheet->setCellValue('N1', 'Telepon');

        $baris = 2;
        $no = 1;
        $peserta = $this->PesertaModel->get('peserta')->result();

        foreach ($peserta as $p) {
            $sheet->setCellValue('A' . $baris, $no++);
            $sheet->setCellValue('B' . $baris, $p->diklat);
            $sheet->setCellValue('C' . $baris, $p->nama);
            $sheet->setCellValue('D' . $baris, $p->nip);
            $sheet->setCellValue('E' . $baris, $p->npwp);
            $sheet->setCellValue('F' . $baris, $p->ktp);
            $sheet->setCellValue('G' . $baris, $p->pangkatgol);
            $sheet->setCellValue('H' . $baris, $p->ttl);
            $sheet->setCellValue('I' . $baris, $p->jabatan);
            $sheet->setCellValue('J' . $baris, $p->instansi);
            $sheet->setCellValue('K' . $baris, $p->agama);
            $sheet->setCellValue('L' . $baris, $p->jenis_kelamin);
            $sheet->setCellValue('M' . $baris, $p->alamat);
            $sheet->setCellValue('N' . $baris, $p->telp);

            $baris++;
        }

        $filename = "Data Peserta Diklat" . '.xlsx';
        $writer = new Xlsx($spreadsheet);


        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer->save('php://output');

        exit;
    }

    public function excelberkas()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'KK');
        $sheet->setCellValue('D1', 'NPWP');
        $sheet->setCellValue('E1', 'KTP');
        $sheet->setCellValue('F1', 'Rekening');
        $sheet->setCellValue('G1', 'Foto');
        $sheet->setCellValue('H1', 'Surat Perintah');

        $baris = 2;
        $no = 1;
        $berkas = $this->BerkasModel->get('berkas')->result();

        foreach ($berkas as $ber) {
            $sheet->setCellValue('A' . $baris, $no++);
            $sheet->setCellValue('B' . $baris, $ber->nama);
            $sheet->setCellValue('C' . $baris, $ber->kk);
            $sheet->setCellValue('D' . $baris, $ber->npwp);
            $sheet->setCellValue('E' . $baris, $ber->ktp);
            $sheet->setCellValue('F' . $baris, $ber->rekening);
            $sheet->setCellValue('G' . $baris, $ber->foto);
            $sheet->setCellValue('H' . $baris, $ber->surat_perintah);

            $baris++;
        }

        $filename = "Berkas Peserta Diklat" . '.xlsx';
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer->save('php://output');

        exit;
    }

    public function excelnarasumber()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'NIP');
        $sheet->setCellValue('D1', 'NPWP');
        $sheet->setCellValue('E1', 'KTP');
        $sheet->setCellValue('F1', 'Tempat / Tgl Lahir');
        $sheet->setCellValue('G1', 'Pangkat/Gol');
        $sheet->setCellValue('H1', 'Pendidikan');
        $sheet->setCellValue('I1', 'Jabatan');
        $sheet->setCellValue('J1', 'Instansi');
        $sheet->setCellValue('K1', 'Agama');
        $sheet->setCellValue('L1', 'Alamat');
        $sheet->setCellValue('M1', 'Telepon');

        $baris = 2;
        $no = 1;
        $narasumber = $this->NarasumberModel->get('narasumber')->result();

        foreach ($narasumber as $n) {
            $sheet->setCellValue('A' . $baris, $no++);
            $sheet->setCellValue('B' . $baris, $n->nama);
            $sheet->setCellValue('C' . $baris, $n->nip);
            $sheet->setCellValue('D' . $baris, $n->npwp);
            $sheet->setCellValue('E' . $baris, $n->ktp);
            $sheet->setCellValue('F' . $baris, $n->ttl);
            $sheet->setCellValue('G' . $baris, $n->pangkatgol);
            $sheet->setCellValue('H' . $baris, $n->pendidikan);
            $sheet->setCellValue('I' . $baris, $n->jabatan);
            $sheet->setCellValue('J' . $baris, $n->instansi);
            $sheet->setCellValue('K' . $baris, $n->agama);
            $sheet->setCellValue('L' . $baris, $n->alamat);
            $sheet->setCellValue('M' . $baris, $n->telp);

            $baris++;
        }

        $filename = "Data Narasumber" . '.xlsx';
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer->save('php://output');

        exit;
    }

    public function exceldiklat()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Diklat');
        $sheet->setCellValue('C1', 'Awal Periode');
        $sheet->setCellValue('D1', 'Akhir Periode');
        $sheet->setCellValue('E1', 'Lama Periode');

        $baris = 2;
        $no = 1;
        $diklat = $this->DiklatModel->get('diklat')->result();

        foreach ($diklat as $d) {
            $sheet->setCellValue('A' . $baris, $no++);
            $sheet->setCellValue('B' . $baris, $d->nama_diklat);
            $sheet->setCellValue('C' . $baris, $d->awal_periode);
            $sheet->setCellValue('D' . $baris, $d->akhir_periode);
            $sheet->setCellValue('E' . $baris, $d->lama_periode);

            $baris++;
        }

        $filename = "Data Diklat" . '.xlsx';
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer->save('php://output');

        exit;
    }

    public function exceljadwal()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Hari Kegiatan');
        $sheet->setCellValue('C1', 'Tanggal Kegiatan');
        $sheet->setCellValue('D1', 'Waktu');
        $sheet->setCellValue('E1', 'Mata Pelajaran');
        $sheet->setCellValue('F1', 'Jam Pelajaran');
        $sheet->setCellValue('G1', 'Narasumber');

        $baris = 2;
        $no = 1;
        $jadwal = $this->JadwalDiklatModel->get('jadwaldiklat')->result();

        foreach ($jadwal as $j) {
            $sheet->setCellValue('A' . $baris, $no++);
            $sheet->setCellValue('B' . $baris, $j->hari);
            $sheet->setCellValue('C' . $baris, $j->tanggal);
            $sheet->setCellValue('D' . $baris, $j->waktu);
            $sheet->setCellValue('E' . $baris, $j->mata_pelajaran);
            $sheet->setCellValue('F' . $baris, $j->jam_pelajaran);
            $sheet->setCellValue('G' . $baris, $j->narasumber);

            $baris++;
        }

        $filename = "Jadwal Diklat" . '.xlsx';
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer->save('php://output');

        exit;
    }

    public function exceljadwalbm()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Hari Kegiatan');
        $sheet->setCellValue('C1', 'Tanggal Kegiatan');
        $sheet->setCellValue('D1', 'Waktu');
        $sheet->setCellValue('E1', 'Tempat');
        $sheet->setCellValue('F1', 'Nama Kegiatan');
        $sheet->setCellValue('G1', 'Penanggung Jawab');

        $baris = 2;
        $no = 1;
        $jadwalbm= $this->JadwalBMModel->get('jadwalbm')->result();

        foreach ($jadwalbm as $bm) {
            $sheet->setCellValue('A' . $baris, $no++);
            $sheet->setCellValue('B' . $baris, $bm->hari);
            $sheet->setCellValue('C' . $baris, $bm->tanggal);
            $sheet->setCellValue('D' . $baris, $bm->waktu);
            $sheet->setCellValue('E' . $baris, $bm->tempat);
            $sheet->setCellValue('F' . $baris, $bm->nama_kegiatan);
            $sheet->setCellValue('G' . $baris, $bm->penanggung_jawab);

            $baris++;
        }

        $filename = "Jadwal Benchmarking" . '.xlsx';
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer->save('php://output');

        exit;
    }

    public function excelmateri()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Nama Materi');
        $sheet->setCellValue('C1', 'Jam Pelajaran');
        $sheet->setCellValue('D1', 'Narasumber');
        $sheet->setCellValue('E1', 'Kegiatan Diklat');

        $baris = 2;
        $no = 1;
        $materi = $this->MateriModel->get('materi')->result();

        foreach ($materi as $m) {
            $sheet->setCellValue('A' . $baris, $no++);
            $sheet->setCellValue('B' . $baris, $m->nama_materi);
            $sheet->setCellValue('C' . $baris, $m->jam_pelajaran);
            $sheet->setCellValue('D' . $baris, $m->narasumber);
            $sheet->setCellValue('E' . $baris, $m->nama_diklat);

            $baris++;
        }

        $filename = "Materi Diklat" . '.xlsx';
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        ob_end_clean();
        $writer->save('php://output');

        exit;
    }

    public function add_berkas()
    {
        $this->form_validation->set_rules('nama', 'Nama Peserta', 'trim|required');
        $this->form_validation->set_rules('kk', 'Fotokopi KK', 'trim|required');
        $this->form_validation->set_rules('npwp', 'Fotokopi NPWP', 'trim|required');
        $this->form_validation->set_rules('ktp', 'Fotokopi KTP', 'trim|required');
        $this->form_validation->set_rules('rekening', 'Fotokopi Rekening Bank', 'trim|required');
        $this->form_validation->set_rules('foto', 'Foto 3x4', 'trim|required');
        $this->form_validation->set_rules('surat_perintah', 'Surat Perintah', 'trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Edit Berkas Peserta';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/berkas_peserta', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'kk' => $this->input->post('kk'),
                'npwp' => $this->input->post('npwp'),
                'ktp' => $this->input->post('ktp'),
                'foto' => $this->input->post('foto'),
                'rekening' => $this->input->post('rekening'),
                'surat_perintah' => $this->input->post('surat_perintah'),
            ];

            $this->db->insert('berkas', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
            }
            redirect('berkas_peserta');
        }
    }

    public function edit_berkas($id_berkas)
    {
        $this->form_validation->set_rules('nama', 'Nama Peserta', 'trim|required');
        $this->form_validation->set_rules('kk', 'Fotokopi KK', 'trim|required');
        $this->form_validation->set_rules('npwp', 'Fotokopi NPWP', 'trim|required');
        $this->form_validation->set_rules('ktp', 'Fotokopi KTP', 'trim|required');
        $this->form_validation->set_rules('rekening', 'Fotokopi Rekening Bank', 'trim|required');
        $this->form_validation->set_rules('foto', 'Foto 3x4', 'trim|required');
        $this->form_validation->set_rules('surat_perintah', 'Surat Perintah', 'trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Edit Berkas';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['berkas'] = $this->db->get_where('berkas', ['id_berkas' => $id_berkas])->row_array();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/edit_berkas', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'kk' => $this->input->post('kk'),
                'npwp' => $this->input->post('npwp'),
                'ktp' => $this->input->post('ktp'),
                'foto' => $this->input->post('foto'),
                'rekening' => $this->input->post('rekening'),
                'surat_perintah' => $this->input->post('surat_perintah'),
            ];
            $this->db->where('id_berkas', $id_berkas);
            $this->db->update('berkas', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Diperbarui');
            }
            redirect('berkas_peserta');
        }
    }

    public function delete_berkas($id_berkas)
    {
        $this->db->delete('berkas', array('id_berkas' => $id_berkas));
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
        }
        redirect('berkas_peserta');
    }

    public function add_narasumber()
    {
        $data['title'] = 'Halaman Tambah Data Narasumber';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($data['user']["role_id"] == "1") {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/data_narasumber', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function add_process_narasumber()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|integer|is_unique[narasumber.nip]');
        $this->form_validation->set_rules('pangkat/gol', 'Pangkat / Golongan', 'trim|required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
        $this->form_validation->set_rules('ttl', 'Tempat / Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'trim|required');
        $this->form_validation->set_rules('ktp', 'KTP', 'trim|required|integer');
        $this->form_validation->set_rules('npwp', 'NPWP', 'trim|required|integer');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telepon', 'trim|required|integer|max_length[15]');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Tambah Narasumber';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/tambah_narasumber', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'npwp' => $this->input->post('npwp'),
                'ktp' => $this->input->post('ktp'),
                'ttl' => $this->input->post('ttl'),
                'pangkatgol' => $this->input->post('pangkat/gol'),
                'pendidikan' => $this->input->post('pendidikan'),
                'jabatan' => $this->input->post('jabatan'),
                'instansi' => $this->input->post('instansi'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'telp' => $this->input->post('telp'),
            ];

            $this->NarasumberModel->add($data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
            }
            redirect('data_narasumber');
        }
    }

    public function edit_narasumber($id)
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('nip', 'NIP', 'trim|required|integer');
        $this->form_validation->set_rules('pangkat/gol', 'Pangkat / Golongan', 'trim|required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'trim|required');
        $this->form_validation->set_rules('ttl', 'Tempat / Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'trim|required');
        $this->form_validation->set_rules('ktp', 'KTP', 'trim|required|integer');
        $this->form_validation->set_rules('npwp', 'NPWP', 'trim|required|integer');
        $this->form_validation->set_rules('agama', 'Agama', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('telp', 'Telepon', 'trim|required|integer|max_length[15]');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Edit Narasumber';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['narasumber'] = $this->NarasumberModel->getnarasumber($id)->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/edit_narasumber', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'nip' => $this->input->post('nip'),
                'npwp' => $this->input->post('npwp'),
                'ktp' => $this->input->post('ktp'),
                'ttl' => $this->input->post('ttl'),
                'pangkatgol' => $this->input->post('pangkat/gol'),
                'pendidikan' => $this->input->post('pendidikan'),
                'jabatan' => $this->input->post('jabatan'),
                'instansi' => $this->input->post('instansi'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat'),
                'telp' => $this->input->post('telp'),
            ];

            $this->NarasumberModel->update($data, $id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Diperbarui');
            }
            redirect('data_narasumber');
        }
    }

    public function delete_narasumber($id)
    {
        $this->NarasumberModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
        }

        redirect('data_narasumber');
    }

    public function tambah_diklat()
    {
        $data['title'] = 'Halaman Tambah Diklat';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('admin/tambah_diklat', $data);
        $this->load->view('templates/footer');
    }

    public function add_diklat()
    {
        $this->form_validation->set_rules('nama_diklat', 'Nama Diklat', 'trim|required');
        $this->form_validation->set_rules('awal_periode', 'Awal Periode Kegiatan Diklat', 'trim|required');
        $this->form_validation->set_rules('akhir_periode', 'Akhir Periode Kegiatan Diklat', 'trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Tambah Diklat';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/tambah_diklat', $data);
            $this->load->view('templates/footer');
        } else {
            $awal  = new DateTime($this->input->post('awal_periode'));
            $akhir = new DateTime($this->input->post('akhir_periode')); // Waktu sekarang
            $diff  = $awal->diff($akhir);
            $tgl = $diff->format('%d') . " Hari";
            $data = [
                'nama_diklat' => $this->input->post('nama_diklat'),
                'awal_periode' => $this->input->post('awal_periode'),
                'akhir_periode' => $this->input->post('akhir_periode'),
                'lama_periode' => $tgl,
            ];

            $this->DiklatModel->add($data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
            }
            redirect('data_diklat');
        }
    }

    public function edit_diklat($id)
    {
        $this->form_validation->set_rules('nama_diklat', 'Nama Diklat', 'trim|required');
        $this->form_validation->set_rules('awal_periode', 'Awal Periode Kegiatan Diklat', 'trim|required');
        $this->form_validation->set_rules('akhir_periode', 'Akhir Periode Kegiatan Diklat', 'trim|required');
        $this->form_validation->set_rules('lama_periode', 'Lama Periode Kegiatan Diklat', 'trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Edit Diklat';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['diklat'] = $this->DiklatModel->getdiklat($id)->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/edit_diklat', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_diklat' => $this->input->post('nama_diklat'),
                'awal_periode' => $this->input->post('awal_periode'),
                'akhir_periode' => $this->input->post('akhir_periode'),
                'lama_periode' => $this->input->post('lama_periode'),
            ];

            $this->DiklatModel->update($data, $id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Diperbarui');
            }
            redirect('data_diklat');
        }
    }

    public function delete_diklat($id)
    {
        $this->DiklatModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
        }

        redirect('data_diklat');
    }

    public function tambah_jadwal()
    {
        $data['title'] = 'Halaman Tambah Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('admin/tambah_jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function add_jadwal()
    {
        $this->form_validation->set_rules('hari', 'Hari Kegiatan', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Kegiatan', 'trim|required');
        $this->form_validation->set_rules('waktu', 'Waktu Kegiatan', 'trim|required');
        $this->form_validation->set_rules('mata_pelajaran', 'Mata Pelajaran', 'trim|required');
        $this->form_validation->set_rules('jam_pelajaran', 'Jam Pelajaran', 'trim|required');
        $this->form_validation->set_rules('narasumber', 'Narasumber', 'trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Tambah Jadwal';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/tambah_jadwal', $data);
            $this->load->view('templates/footer');
        } else {
            $select =  $this->db->query('SELECT tanggal FROM  jadwaldiklat WHERE tanggal ="' . $this->input->post('tanggal') . '"');
            if (count($select)) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <i class="fa fa-exclamation-circle fa-fw"></i>
                Jadwal diklat sudah tersedia, silahkan periksa kembali jadwal diklat sebelumnya!</div>');
            } else {
                $data = [
                    'hari' => $this->input->post('hari'),
                    'tanggal' => $this->input->post('tanggal'),
                    'waktu' => $this->input->post('waktu'),
                    'mata_pelajaran' => $this->input->post('mata_pelajaran'),
                    'jam_pelajaran' => $this->input->post('jam_pelajaran'),
                    'narasumber' => $this->input->post('narasumber'),
                ];

                $this->JadwalDiklatModel->add($data);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
                }
            }
            redirect('jadwal_diklat');
        }
    }

    public function edit_jadwal($id)
    {
        $this->form_validation->set_rules('hari', 'Hari Kegiatan', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Kegiatan', 'trim|required');
        $this->form_validation->set_rules('waktu', 'Waktu Kegiatan', 'trim|required');
        $this->form_validation->set_rules('mata_pelajaran', 'Mata Pelajaran', 'trim|required');
        $this->form_validation->set_rules('jam_pelajaran', 'Jam Pelajaran', 'trim|required');
        $this->form_validation->set_rules('narasumber', 'Narasumber', 'trim|required');


        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Edit Jadwal';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['jadwaldiklat'] = $this->JadwalDiklatModel->getjadwal($id)->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/edit_jadwal', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'hari' => $this->input->post('hari'),
                'tanggal' => $this->input->post('tanggal'),
                'waktu' => $this->input->post('waktu'),
                'mata_pelajaran' => $this->input->post('mata_pelajaran'),
                'jam_pelajaran' => $this->input->post('jam_pelajaran'),
                'narasumber' => $this->input->post('narasumber'),
            ];

            $this->JadwalDiklatModel->update($data, $id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Diperbarui');
            }
            redirect('jadwal_diklat');
        }
    }

    public function delete_jadwal($id)
    {
        $this->JadwalDiklatModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
        }

        redirect('jadwal_diklat');
    }

    public function tambah_jadwal_bm()
    {
        $data['title'] = 'Halaman Tambah Jadwal Benchmarking';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('admin/tambah_jadwal_bm', $data);
        $this->load->view('templates/footer');
    }

    public function add_jadwal_bm()
    {
        $this->form_validation->set_rules('hari', 'Hari Kegiatan', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Kegiatan', 'trim|required');
        $this->form_validation->set_rules('waktu', 'Waktu Kegiatan', 'trim|required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'trim|required');
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Tambah Jadwal Benchmarking';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/tambah_jadwal_bm', $data);
            $this->load->view('templates/footer');
        } else {
            $select =  $this->db->query('SELECT tanggal FROM  jadwalbm WHERE tanggal ="' . $this->input->post('tanggal') . '"');
            if (count($select)) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> <i class="fa fa-exclamation-circle fa-fw"></i>
                Jadwal benchmarking sudah tersedia, silahkan periksa kembali jadwal benchmarking sebelumnya!</div>');
            } else {
                $data = [
                    'hari' => $this->input->post('hari'),
                    'tanggal' => $this->input->post('tanggal'),
                    'waktu' => $this->input->post('waktu'),
                    'tempat' => $this->input->post('tempat'),
                    'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                    'penanggung_jawab' => $this->input->post('penanggung_jawab'),
                ];

                $this->JadwalBMModel->add($data);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
                }
            }
            redirect('jadwal_bm');
        }
    }

    public function edit_jadwal_bm($id)
    {
        $this->form_validation->set_rules('hari', 'Hari Kegiatan', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Kegiatan', 'trim|required');
        $this->form_validation->set_rules('waktu', 'Waktu Kegiatan', 'trim|required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'trim|required');
        $this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
        $this->form_validation->set_rules('penanggung_jawab', 'Penanggung Jawab', 'trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Edit Jadwal Benchmarking';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['jadwalbm'] = $this->JadwalBMModel->getjadwalbm($id)->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/edit_jadwal_bm', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'hari' => $this->input->post('hari'),
                'tanggal' => $this->input->post('tanggal'),
                'waktu' => $this->input->post('waktu'),
                'tempat' => $this->input->post('tempat'),
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'penanggung_jawab' => $this->input->post('penanggung_jawab'),
            ];

            $this->JadwalBMModel->update($data, $id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Diperbarui');
            }
            redirect('jadwal_bm');
        }
    }

    public function delete_jadwal_bm($id)
    {
        $this->JadwalBMModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
        }

        redirect('jadwal_bm');
    }

    public function tambah_materi()
    {
        $data['title'] = 'Halaman Tambah Materi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('admin/tambah_materi', $data);
        $this->load->view('templates/footer');
    }

    public function add_materi()
    {
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'trim|required');
        $this->form_validation->set_rules('jam_pelajaran', 'Jam Pelajaran', 'trim|required');
        $this->form_validation->set_rules('narasumber', 'Narasumber / Pengajar', 'trim|required');
        $this->form_validation->set_rules('nama_diklat', 'Kegiatan Diklat', 'trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Tambah Materi';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/tambah_materi', $data);
            $this->load->view('templates/footer');
        } else {
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'docx|doc|xls|xls|pptx|ppt|pdf';
            $config['max_size']             = 2000;
            $config['encrypt_name']            = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('materi')) {
                $error = array('error' => $this->upload->display_errors());
                redirect('materi');
            } else {
                $data = [
                    'file' => $this->upload->data("file_name"),
                    'nama_materi' => $this->input->post('nama_materi'),
                    'jam_pelajaran' => $this->input->post('jam_pelajaran'),
                    'narasumber' => $this->input->post('narasumber'),
                    'nama_diklat' => $this->input->post('nama_diklat'),
                ];

                $this->MateriModel->add($data);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Berhasil Ditambahkan');
                }
            }
            redirect('materi');
        }
    }

    public function edit_materi($id)
    {
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'trim|required');
        $this->form_validation->set_rules('jam_pelajaran', 'Jam Pelajaran', 'trim|required');
        $this->form_validation->set_rules('narasumber', 'Narasumber / Pengajar', 'trim|required');
        $this->form_validation->set_rules('nama_diklat', 'Kegiatan Diklat', 'trim|required');

        $this->form_validation->set_error_delimiters('<small class="text-danger pl-0">', '</small>');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Edit Materi';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['materi'] = $this->MateriModel->getmateri($id)->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/navigation', $data);
            $this->load->view('admin/edit_materi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_materi' => $this->input->post('nama_materi'),
                'jam_pelajaran' => $this->input->post('jam_pelajaran'),
                'narasumber' => $this->input->post('narasumber'),
                'nama_diklat' => $this->input->post('nama_diklat'),
            ];

            $this->MateriModel->update($data, $id);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Berhasil Diperbarui');
            }
            redirect('materi');
        }
    }

    public function delete_materi($id)
    {
        $this->MateriModel->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Berhasil Dihapus');
        }

        redirect('materi');
    }
}
