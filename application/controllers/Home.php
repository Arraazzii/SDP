<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Indonesia');

        if($this->session->userdata('level') == 'admin'){
                redirect('Admin');
        }
        else if($this->session->userdata('level') == 'user'){
                redirect('User');
        }
    }
    private function load($title = '', $datapath = '')
    { }
	//HALAMAN UTAMA LOGIN
	public function index()
	{
        $this
            ->load
            ->view('login');
	}

	public function register_page()
    {
        $this->load->model('Model_login');
        $kode_klui = $this->Model_login->get_klui();
        $x = array(
            "kode_klui" => $this->Model_login->get_klui(),
        );
        $path = "";
        $data = array(
            "page" => $this->load("Registrasi", $path) ,
            "content" => $this
            ->load
            ->view('register', $x, true)
        );
        $this
        ->load
        ->view('register', $data);
    }
    public function register()
    {
        $data = $this->input->post();
        $error = array();
        $alamat_id = $this->M_Indonesia->get_kode_alamat();
        $alamat_perusahaan = array(
            'kode_alamat' => $alamat_id,
            'alamat' => $data['alamat_perusahaan'],
            'provinsi' => $data['provinsi'],
            'kota' => $data['kota'],
            'kecamatan' => $data['kecamatan'],
            'kelurahan' => $data['kelurahan'],
            'kode_pos' => $data['kode_pos_perusahaan'],
            'no_telpon' => $data['no_telp_perusahaan'],
        );
        if (!$this->db->insert('table_alamat', $alamat_perusahaan)) {
            $error[] = true;
        } else {
            // $alamat_id = $this->db->insert_id();
        }

        $files_perusahaan = [
            'logo' => $this->do_upload('logo_perusahaan', 'logo')['file']['file_name'],
            'siup' => $this->do_upload('siup', 'siup')['file']['file_name'],
            'tdp' => $this->do_upload('tdp', 'tdp')['file']['file_name'],
            'akte' => $this->do_upload('akte', 'akte')['file']['file_name'],
            'hakim' => $this->do_upload('surat_kehakiman', 'hakim')['file']['file_name'],
            'domisili' => $this->do_upload('domisili', 'domisili')['file']['file_name'],
        ];

        $files_error = false;
        foreach ($files_perusahaan as $key => $value) {
            if ($value == "error") {
                $files_error = true;
                break;
            }
        }

        $data_perusahaan = "";
        $login_perusahaan = "";
        $kode_perusahaan = $this->M_Indonesia->get_kode_perusahaan();
        if ($files_error == false) {
            $login_perusahaan = array(
                'email' => $data['email'],
                'password' => md5($data['password']),
                'status' => "belum",
                'level' => "user",
                'kode_perusahaan' => $kode_perusahaan,
            );

            if (!$this->db->insert('table_login', $login_perusahaan)) {
                $error[] = true;
            } else {
                // $kode_perushaan = $this->db->insert_id();
            }

            $data_perusahaan = array(
                'kode_perusahaan' => $kode_perusahaan,
                'nama_perusahaan' => $data['nama_perusahaan'],
                'deskripsi' => $data['deskripsi_perusahaan'],
                'kode_alamat' => $alamat_id,
                'logo' => $files_perusahaan['logo'],
                'siup' => $files_perusahaan['siup'],
                'tdp' => $files_perusahaan['tdp'],
                'akte' => $files_perusahaan['akte'],
                //'sk' => $data['sk'],
                'hakim' => $files_perusahaan['hakim'],
                'domisili' => $files_perusahaan['domisili'],
                'kode_klui' => $data['kode_klui'],
            );

            if (!$this->db->insert('table_perusahaan', $data_perusahaan)) {
                $error[] = true;
            } else {
                // $kode_perushaan = $this->db->insert_id();
            }
        }

        $dataRaw_pengurus = json_decode($data['data_pengurus']);

        $data_pengurus = array();
        foreach ($dataRaw_pengurus as $pengurus) {
            $kode_alamat = $this->M_Indonesia->get_kode_alamat();
            $alamat_pengurus = [
                'kode_alamat' => $kode_alamat,
                'alamat' => $pengurus->alamat_pengurus,
                'provinsi' => $pengurus->provinsi_pengurus,
                'kota' => $pengurus->kota_pengurus,
                'kecamatan' => $pengurus->kecamatan_pengurus,
                'kelurahan' => $pengurus->kelurahan_pengurus,
                'kode_pos' => $pengurus->kode_pos_pengurus,
                'no_telpon' => $pengurus->no_telp_pengurus,
            ];

            if (!$this->db->insert('table_alamat', $alamat_pengurus)) {
                $error[] = true;
                break;
            } else {
                    // $alamat_id = $this->db->insert_id();
            }

            $data_pengurus = [
                'nama' => $pengurus->nama_pengurus,
                'jabatan' => $pengurus->jabatan_pengurus,
                'kode_alamat' => $kode_alamat,
                'kode_perusahaan' => $kode_perusahaan,
            ];

            if (!$this->db->insert('table_pengurus', $data_pengurus)) {
                $error[] = true;
                break;
            } else {
                // $alamat_id = $this->db->insert_id();
            }

        }

        $files_pendukung = [
            'pp' => $this->do_upload('file_pp', 'pp')['file']['file_name'],
            'pkb' => $this->do_upload('file_pkb', 'pkb')['file']['file_name'],
            'lks' => $this->do_upload('file_lks', 'lks')['file']['file_name'],
            'k3' => $this->do_upload('file_k3', 'k3')['file']['file_name'],
            'wlkp' => $this->do_upload('file_wlkp', 'wlkp')['file']['file_name'],
        ];

        $files_error = false;
        foreach ($files_pendukung as $key => $value) {
            if ($value == "error") {
                $files_error = true;
                break;
            }
        }

        if ($files_error == false) {
            $data_pp = array(
                'kode_perusahaan' => $kode_perusahaan,
                'nama_file' => $files_pendukung['pp'],
                'no_registrasi' => $data['no_reg_pp'],
                'no_dokumen' => $data['no_doc_pp'],
                'tanggal_daftar' => $data['berlaku_pp'],
                'status' => "0",
                'notif' => "0",
            );
            if (!$this->db->insert('table_pp', $data_pp)) {
                $error[] = true;
            } else {
                // $alamat_id = $this->db->insert_id();
            }

            $data_pkb = array(
                'kode_perusahaan' => $kode_perusahaan,
                'nama_file' => $files_pendukung['pkb'],
                'no_dokumen' => $data['no_doc_pkb'],
                'no_registrasi' => $data['no_reg_pkb'],
                'tanggal_daftar' => $data['berlaku_pkb'],
                'status' => "0",
                'notif' => "0",
            );
            if (!$this->db->insert('table_pkb', $data_pkb)) {
                $error[] = true;
            } else {
                // $alamat_id = $this->db->insert_id();
            }

            $data_lks = array(
                'kode_perusahaan' => $kode_perusahaan,
                'nama_file' => $files_pendukung['lks'],
                'no_registrasi' => $data['no_reg_lks'],
                'no_dokumen' => $data['no_doc_lks'],
                'tanggal_daftar' => $data['berlaku_lks'],
                'status' => "0",
                'notif' => "0",
            );
            if (!$this->db->insert('table_lks', $data_lks)) {
                $error[] = true;
            } else {
                // $alamat_id = $this->db->insert_id();
            }

            $data_k3 = array(
                'kode_perusahaan' => $kode_perusahaan,
                'nama_file' => $files_pendukung['k3'],
                'no_registrasi' => $data['no_reg_k3'],
                'no_dokumen' => $data['no_doc_k3'],
                'tanggal_daftar' => $data['berlaku_k3'],
                'status' => "0",
                'notif' => "0",
            );
            if (!$this->db->insert('table_k3', $data_k3)) {
                $error[] = true;
            } else {
                // $alamat_id = $this->db->insert_id();
            }

            $data_wlkp = array(
                'kode_perusahaan' => $kode_perusahaan,
                'nama_file' => $files_pendukung['wlkp'],
                'no_registrasi' => $data['no_reg_wlkp'],
                'no_dokumen' => $data['no_doc_wlkp'],
                'tanggal_daftar' => $data['berlaku_wlkp'],
                'status' => "0",
                'notif' => "0",
            );
            if (!$this->db->insert('table_wlkp', $data_wlkp)) {
                $error[] = true;
            } else {
                // $alamat_id = $this->db->insert_id();
            }
        }

        $data_pendukung = array(
            'pp' =>$data_pp,
            'pkb' => $data_pkb,
            'lks' => $data_lks,
            'k3' => $data_k3,
            'wlkp' => $data_wlkp,
        );

        $result = [
            // 'pp' => $this->do_upload('file_pp', 'pp')['file_name'],
            "files_error" => $files_error,
            "input_error" => $error,
            "files_perusahaan" => $files_perusahaan,
            'alamat_perusahaan'=> $alamat_perusahaan,
            'data_perusahaan' => $data_perusahaan,
            'data_pengurus' => $data_pengurus,
            'data_pendukung' => $data_pendukung,
            'file' => $_FILES,
        ];
        echo json_encode($result);
    }

    public function do_upload($field, $location)
    {
        $config['upload_path']          = './upload/'.$location;
        $config['allowed_types']        = 'pdf|jpg|png';
        $config['max_size']             = 10000;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $data = array();
        if ( ! $this->upload->do_upload($field))
        {
            $data = array('file_name' => "error", 'error' => $this->upload->display_errors());
                                //$data = "error";
        }
        else
        {
            $data['file'] = $this->upload->data();
            $data['loc'] = $location;
        }

        return $data;
    }
}
