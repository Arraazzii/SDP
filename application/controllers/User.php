<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this
        ->load
        ->helper('url');
        $this
        ->load
        ->model('M_user');
        $this->load->model('M_Indonesia');
        $this->load->model('M_admin');
        $this->M_admin->update_kadaluarsa();
        $this
        ->load
        ->library(array(
            'Custom_upload',
            'form_validation',
        ));

        if($this->session->has_userdata('level') == false){
            redirect('login');
        } elseif ($this->session->userdata('level') != 'user'){
            redirect('Admin');
        }

    }
    private function load($title = '', $datapath = '')
    {
        $session = $this->session->userdata();
        $page = array(
            "header" => $this
            ->load
            ->view('User/template/header', array(
                "title" => $title,
                "count_notif_user" => $this->M_user->count_notif_user($session['kode_perusahaan']),
                "notif_view" => $this->M_user->show_notif($session['kode_perusahaan']),
            ) , true) ,
            "css" => $this
            ->load
            ->view('User/template/main_css', false, true) ,
            "sidebar" => $this
            ->load
            ->view('User/template/sidebar', false, true) ,
            "js" => $this
            ->load
            ->view('User/template/main_js', false, true) ,
        );
        return $page;
    }
    //HALAMAN UTAMA USER
    public function index()
    {
        $session = $this->session->userdata();
        $x = array(
            "status_pp" => $this->M_user->get_status_pp($session['kode_perusahaan']),
            "status_pkb" => $this->M_user->get_status_pkb($session['kode_perusahaan']),
            "status_lks" => $this->M_user->get_status_lks($session['kode_perusahaan']),
            "status_k3" => $this->M_user->get_status_k3($session['kode_perusahaan']),
            "status_wlkp" => $this->M_user->get_status_wlkp($session['kode_perusahaan']),
        );
        $path = "";
        $data = array(
            "page" => $this->load("User - Dashboard", $path) ,
            "content" => $this
            ->load
            ->view('User/index', $x , true)
        );
        $this
        ->load
        ->view('User/template/user_template', $data);
    }

    public function user_wilayah() {
        if (isset($_GET['provinsi'])) {
            header("Content-Type:application/json");
            $province_id = $this->db->query("SELECT id FROM provinces WHERE name = '".$_GET['provinsi']."'")->result();

            $regencies = $this->db->query("SELECT name FROM regencies WHERE province_id = '".$province_id[0]->id."' ")->result();
            echo json_encode($regencies);
        }
        if (isset($_GET['kota'])) {
            header("Content-Type:application/json");
            $regency_id = $this->db->query("SELECT id FROM regencies WHERE name = '".$_GET['kota']."'")->result();

            $regencies = $this->db->query("SELECT name FROM districts WHERE regency_id = '".$regency_id[0]->id."' ")->result();
            echo json_encode($regencies);
        }
        if (isset($_GET['kecamatan'])) {
            header("Content-Type:application/json");
            $district_id = $this->db->query("SELECT id FROM districts WHERE name = '".$_GET['kecamatan']."'")->result();

            $regencies = $this->db->query("SELECT name FROM villages WHERE district_id = '".$district_id[0]->id."' ")->result();
            echo json_encode($regencies);
        }

    }

    //HALAMAN PROFILE USER
    public function user()
    {
        $session = $this->session->userdata();
        $this->load->helper(array('form','url'));
        $this->load->library('form_validation');
        $x = array(
            "data_perusahaan_samping" => $this->M_user->get_data_perusahaan_samping($session['kode_perusahaan']),
            "data_pengurus" => $this->M_user->get_data_pengurus($session['kode_perusahaan']),
            "data_perusahaan" => $this->M_user->get_data_perusahaan($session['kode_perusahaan']),
            "get_berkas_perusahaan" => $this->M_user->get_berkas_perusahaan($session['kode_perusahaan']),
        );
        $path = "";
        $data = array(
            "page" => $this->load("User - Profile ", $path) ,
            "content" => $this
            ->load
            ->view('User/user', $x, true)
        );
        $this
        ->load
        ->view('User/template/user_template', $data);
    }

    //UPDATE PERUSAHAAN
    public function update_perusahaan_user(){
        $kode_perusahaan = $this
        ->input
        ->post('kode_perusahaan');
        $kode_alamat = $this
        ->input
        ->post('kode_alamat');
        $nama_perusahaan = $this
        ->input
        ->post('nama_perusahaan');
        $no_telpon = $this
        ->input
        ->post('no_telpon');
        $alamat = $this
        ->input
        ->post('alamat');
        $kode_pos = $this
        ->input
        ->post('kode_pos');
        $provinsi = $this
        ->input
        ->post('provinsi');
        $kabupaten = $this
        ->input
        ->post('kabupaten');
        $kecamatan = $this
        ->input
        ->post('kecamatan');
        $kelurahan = $this
        ->input
        ->post('kelurahan');
        $deskripsi = $this
        ->input
        ->post('tentang');

        $update = array(
            'nama_perusahaan' => $nama_perusahaan,
            'deskripsi' => $deskripsi,
        );

        $update_alamat = array(
            'no_telpon' => $no_telpon,
            'alamat' => $alamat,
            'kode_pos' => $kode_pos,
            'provinsi' => $provinsi,
            'kota' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
        );

        $this
        ->db
        ->where('kode_perusahaan', $kode_perusahaan);
        $this
        ->db
        ->update('table_perusahaan', $update);
        $this
        ->db
        ->where('kode_alamat', $kode_alamat);
        $this
        ->db
        ->update('table_alamat', $update_alamat);
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! Perusahaan Berhasil Diperbaharui.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
        redirect('User/user', 'refresh');

    }

    //UPDATE PENGURUS
    public function update_pengurus_user(){
        $id = $this
        ->input
        ->post('kode_pengurus');
        $kode_alamat = $this
        ->input
        ->post('kode_alamat');
        $nama = $this
        ->input
        ->post('nama');
        $no_telpon = $this
        ->input
        ->post('no_telpon');
        $alamat = $this
        ->input
        ->post('alamat');
        $kode_pos = $this
        ->input
        ->post('kode_pos');
        $provinsi = $this
        ->input
        ->post('provinsi');
        $kabupaten = $this
        ->input
        ->post('kota');
        $kecamatan = $this
        ->input
        ->post('kecamatan');
        $kelurahan = $this
        ->input
        ->post('kelurahan');
        $jabatan = $this
        ->input
        ->post('jabatan');

        $update = array(
            'nama' => $nama,
            'jabatan' => $jabatan,
        );

        $update_alamat = array(
            'no_telpon' => $no_telpon,
            'alamat' => $alamat,
            'kode_pos' => $kode_pos,
            'provinsi' => $provinsi,
            'kota' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
        );

        $this
        ->db
        ->where('id', $id);
        $this
        ->db
        ->update('table_pengurus', $update);
        $this
        ->db
        ->where('kode_alamat', $kode_alamat);
        $this
        ->db
        ->update('table_alamat', $update_alamat);
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! Pengurus Berhasil Diperbaharui.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
        redirect('User/user', 'refresh');
    }

    //TAMBAH PENGURUS
    public function tambah_pengurus_user(){

          $kode_alamat = $this->M_Indonesia->get_kode_alamat();
          $session = $this->session->userdata();
          $kode_perusahaan = $session['kode_perusahaan'];
          $nama = $this
          ->input
          ->post('nama');
          $no_telpon = $this
          ->input
          ->post('no_telpon');
          $alamat = $this
          ->input
          ->post('alamat');
          $kode_pos = $this
          ->input
          ->post('kode_pos');
          $provinsi = $this
          ->input
          ->post('provinsi');
          $kabupaten = $this
          ->input
          ->post('kota');
          $kecamatan = $this
          ->input
          ->post('kecamatan');
          $kelurahan = $this
          ->input
          ->post('kelurahan');
          $jabatan = $this
          ->input
          ->post('jabatan');

          $insert = array(
            'nama' => $nama,
            'jabatan' => $jabatan,
            'kode_alamat' => $kode_alamat,
            'kode_perusahaan' => $kode_perusahaan,
        );

          $insert_alamat = array(
            'kode_alamat' => $kode_alamat,
            'no_telpon' => $no_telpon,
            'alamat' => $alamat,
            'kode_pos' => $kode_pos,
            'provinsi' => $provinsi,
            'kota' => $kabupaten,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
        );

          $this
          ->db
          ->insert('table_pengurus', $insert);

          $this
          ->db
          ->insert('table_alamat', $insert_alamat);

          // var_dump($insert);
          // var_dump($insert_alamat);
          $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! Pengurus Berhasil Ditambahkan.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
          redirect('User/user', 'refresh');
      }

    //HALAMAN PROFILE SETTING
      public function setting()
      {

        $path = "";
        $data = array(
            "page" => $this->load("User - Setting Profile ", $path) ,
            "content" => $this
            ->load
            ->view('User/setting', false, true)
        );
        $this
        ->load
        ->view('User/template/user_template', $data);
    }

    //HALAMAN SEND FILE PP
    public function pp()
    {
        $session = $this->session->userdata();
        $x = array(
            "detail_pp" => $this->M_user->detail_pp($session['kode_perusahaan']),
            "get_pp" => $this->M_user->get_pp($session['kode_perusahaan']),
        );
        $path = "";
        $data = array(
            "page" => $this->load("User - Berkas PP ", $path) ,
            "content" => $this
            ->load
            ->view('User/pp', $x, true)
        );
        $this
        ->load
        ->view('User/template/user_template', $data);
    }

    //HALAMAN SEND FILE PKB
    public function pkb()
    {
        $session = $this->session->userdata();
        $x = array(
            "detail_pkb" => $this->M_user->detail_pkb($session['kode_perusahaan']),
            "get_pkb" => $this->M_user->get_pkb($session['kode_perusahaan']),
        );
        $path = "";
        $data = array(
            "page" => $this->load("User - Berkas PKB ", $path) ,
            "content" => $this
            ->load
            ->view('User/pkb', $x, true)
        );
        $this
        ->load
        ->view('User/template/user_template', $data);
    }

    //HALAMAN SEND FILE LKS
    public function lks()
    {
        $session = $this->session->userdata();
        $x = array(
            "detail_lks" => $this->M_user->detail_lks($session['kode_perusahaan']),
            "get_lks" => $this->M_user->get_lks($session['kode_perusahaan']),
        );
        $path = "";
        $data = array(
            "page" => $this->load("User - Berkas LKS ", $path) ,
            "content" => $this
            ->load
            ->view('User/lks', $x, true)
        );
        $this
        ->load
        ->view('User/template/user_template', $data);
    }

    //HALAMAN SEND FILE K3
    public function k3()
    {
        $session = $this->session->userdata();
        $x = array(
            "detail_k3" => $this->M_user->detail_k3($session['kode_perusahaan']),
            "get_k3" => $this->M_user->get_k3($session['kode_perusahaan']),
        );
        $path = "";
        $data = array(
            "page" => $this->load("User - Berkas K3 ", $path) ,
            "content" => $this
            ->load
            ->view('User/k3', $x, true)
        );
        $this
        ->load
        ->view('User/template/user_template', $data);
    }

    //HALAMAN SEND FILE WLKP
    public function wlkp()
    {
        $session = $this->session->userdata();
        $x = array(
            "detail_wlkp" => $this->M_user->detail_wlkp($session['kode_perusahaan']),
            "get_wlkp" => $this->M_user->get_wlkp($session['kode_perusahaan']),
        );
        $path = "";
        $data = array(
            "page" => $this->load("User - Berkas WLKP ", $path) ,
            "content" => $this
            ->load
            ->view('User/wlkp', $x, true)
        );
        $this
        ->load
        ->view('User/template/user_template', $data);
    }

    //FUNGSI CHANGE PASSWORD
    public function changePassword()
    {
        $session = $this->session->userdata();
        $get_id = $session['id'];
        $password_lama = md5($this
            ->input
            ->post('password_lama'));
        $password_baru = md5($this
            ->input
            ->post('password_baru'));
        $confirm_password = md5($this
            ->input
            ->post('confirm_password'));

        $viewOldPassword = $this->db->query("SELECT password as password_lama FROM table_login WHERE id='$get_id' ")->result();

        if ( $viewOldPassword[0]->password_lama == $password_lama ) {
            if ($password_baru == $confirm_password) {
                $updatePassword = $this->db->query("UPDATE table_login SET password='$password_baru' where id='$get_id' ");
                $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! Password Berhasil Diganti.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
                redirect('User/setting', 'refresh');
            }else{
                $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
            Error! Password Baru Dengan Confirm Password Tidak Sama.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
                redirect('User/setting', 'refresh');
            }
        }else{
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
            Error! Password Lama Tidak Sesuai.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
            redirect('User/setting', 'refresh');
        }
    }

    //FUNGSI HAPUS PENGURUS
    public function hapusPengurus($id)
    {
        $this
        ->db
        ->where('id', $id);
        $this
        ->db
        ->delete('table_pengurus');
        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! Data Pengurus Berhasil Dihapus.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
        redirect('User/user', 'refresh');
    }

    public function uploadPp(){
    error_reporting(0);
    $session = $this->session->userdata();
    $kode_perusahaan = $session['kode_perusahaan'];
    $file= $this
    ->custom_upload
    ->single_upload('file', array(
        'upload_path' => './upload/pp',
        'allowed_types' => 'pdf'
    ));

    $id = $this
    ->input
    ->post('id');
    $no_dokumen = $this
    ->input
    ->post('no_dokumen');
    $no_registrasi = $this
    ->input
    ->post('no_registrasi');
    $tanggal = $this
    ->input
    ->post('tanggal');

    $insert_baru = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '0',
        'notif' => '0',
        'nama_file' => ((empty($file)) ? null : $file),
    );

    $insert = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '1',
        'notif' => '0',
        'nama_file' => ((empty($file)) ? null : $file),
    );

    $update = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '1',
        'notif' => '0',
    );
    $get_data_akhir = $this->db->query("SELECT id as id FROM table_pp WHERE kode_perusahaan='$kode_perusahaan' order by id desc LIMIT 1")->result();
    $get_akhir = $get_data_akhir[0]->id;

    if ($get_akhir == NULL) {
        $this
        ->db
        ->insert('table_pp', $insert_baru);

        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Berkas PP Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('User/pp', 'refresh');
    }else{

        if ($file != NULL)
        {
            // $this->db->query("UPDATE table_pp SET status='2', notif='1' WHERE kode_perusahaan='$kode_perusahaan' and id='$get_akhir' ");
            // $this
            // ->db
            // ->insert('table_pp', $insert);

            $this
            ->db
            ->where('id', $id);
            $this
            ->db
            ->update('table_pp', $insert);

            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Berkas PP Berhasil Diperbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/pp', 'refresh');
        }
        else
        {
            // $this->db->query("UPDATE table_pp SET status='1', notif='0' WHERE kode_perusahaan='$kode_perusahaan' and id='$get_akhir' ");
         $this
         ->db
         ->where('id', $id);
         $this
         ->db
         ->update('table_pp', $update);

         $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Data Berhasil Diperbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('User/pp', 'refresh');
     }
 }
}

public function uploadPkb(){
    error_reporting(0);
    $session = $this->session->userdata();
    $kode_perusahaan = $session['kode_perusahaan'];
    $file= $this
    ->custom_upload
    ->single_upload('file', array(
        'upload_path' => './upload/pkb',
        'allowed_types' => 'pdf'
    ));

    $id = $this
    ->input
    ->post('id');
    $no_dokumen = $this
    ->input
    ->post('no_dokumen');
    $no_registrasi = $this
    ->input
    ->post('no_registrasi');
    $tanggal = $this
    ->input
    ->post('tanggal');

    $insert = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '1',
        'notif' => '0',
        'nama_file' => ((empty($file)) ? null : $file),
    );

    $insert_baru = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '0',
        'notif' => '0',
        'nama_file' => ((empty($file)) ? null : $file),
    );

    $update = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '1',
        'notif' => '0',
    );
    $get_data_akhir = $this->db->query("SELECT id as id FROM table_pkb WHERE kode_perusahaan='$kode_perusahaan' order by id desc LIMIT 1")->result();
    $get_akhir = $get_data_akhir[0]->id;
    if ($get_akhir == NULL) {
        $this
        ->db
        ->insert('table_pkb', $insert_baru);

        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Berkas PKB Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('User/pkb', 'refresh');
    }else{
        if ($file != NULL)
        {

        // $this->db->query("UPDATE table_pkb SET status='2', notif='1' WHERE kode_perusahaan='$kode_perusahaan' and id='$get_akhir' ");
        // $this
        // ->db
        // ->insert('table_pkb', $insert);

            $this
            ->db
            ->where('id', $id);
            $this
            ->db
            ->update('table_pkb', $insert);

            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Berkas PKB Berhasil Diperbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/pkb', 'refresh');
        }
        else
        {
       // $this->db->query("UPDATE table_pkb SET status='1', notif='0' WHERE kode_perusahaan='$kode_perusahaan' and id='$get_akhir' ");
         $this
         ->db
         ->where('id', $id);
         $this
         ->db
         ->update('table_pkb', $update);

         $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Data Berhasil Diperbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('User/pkb', 'refresh');
     }
 }
}

public function uploadLks(){
    error_reporting(0);
    $session = $this->session->userdata();
    $kode_perusahaan = $session['kode_perusahaan'];
    $file= $this
    ->custom_upload
    ->single_upload('file', array(
        'upload_path' => './upload/lks',
        'allowed_types' => 'pdf'
    ));

    $id = $this
    ->input
    ->post('id');
    $no_dokumen = $this
    ->input
    ->post('no_dokumen');
    $no_registrasi = $this
    ->input
    ->post('no_registrasi');
    $tanggal = $this
    ->input
    ->post('tanggal');

    $insert = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '1',
        'notif' => '0',
        'nama_file' => ((empty($file)) ? null : $file),
    );
    $insert_baru = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '0',
        'notif' => '0',
        'nama_file' => ((empty($file)) ? null : $file),
    );
    $update = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '1',
        'notif' => '0',
    );
    $get_data_akhir = $this->db->query("SELECT id as id FROM table_lks WHERE kode_perusahaan='$kode_perusahaan' order by id desc LIMIT 1")->result();
    $get_akhir = $get_data_akhir[0]->id;
    if ($get_akhir == NULL) {
        $this
        ->db
        ->insert('table_lks', $insert_baru);

        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Berkas LKS Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('User/lks', 'refresh');
    }else{
        if ($file != NULL)
        {
        // $this->db->query("UPDATE table_lks SET status='2', notif='1' WHERE kode_perusahaan='$kode_perusahaan' and id='$get_akhir' ");
        // $this
        // ->db
        // ->insert('table_lks', $insert);
            $this
            ->db
            ->where('id', $id);
            $this
            ->db
            ->update('table_lks', $insert);

            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Berkas LKS Berhasil Diperbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/lks', 'refresh');
        }
        else
        {
        // $this->db->query("UPDATE table_lks SET status='1', notif='0' WHERE kode_perusahaan='$kode_perusahaan' and id='$get_akhir' ");
         $this
         ->db
         ->where('id', $id);
         $this
         ->db
         ->update('table_lks', $update);

         $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Data Berhasil Diperbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('User/lks', 'refresh');
     }
 }
}

public function uploadK3(){
    error_reporting(0);
    $session = $this->session->userdata();
    $kode_perusahaan = $session['kode_perusahaan'];
    $file= $this
    ->custom_upload
    ->single_upload('file', array(
        'upload_path' => './upload/k3',
        'allowed_types' => 'pdf'
    ));

    $id = $this
    ->input
    ->post('id');
    $no_dokumen = $this
    ->input
    ->post('no_dokumen');
    $no_registrasi = $this
    ->input
    ->post('no_registrasi');
    $tanggal = $this
    ->input
    ->post('tanggal');

    $insert = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '1',
        'notif' => '0',
        'nama_file' => ((empty($file)) ? null : $file),
    );
    $insert_baru = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '0',
        'notif' => '0',
        'nama_file' => ((empty($file)) ? null : $file),
    );
    $update = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '1',
        'notif' => '0',
    );
    $get_data_akhir = $this->db->query("SELECT id as id FROM table_k3 WHERE kode_perusahaan='$kode_perusahaan' order by id desc LIMIT 1")->result();
    $get_akhir = $get_data_akhir[0]->id;
    if ($get_akhir == NULL) {
        $this
        ->db
        ->insert('table_k3', $insert_baru);

        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Berkas K3 Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('User/k3', 'refresh');
    }else{
        if ($file != NULL)
        {
        // $this->db->query("UPDATE table_k3 SET status='2', notif='1' WHERE kode_perusahaan='$kode_perusahaan' and id='$get_akhir' ");
            $this
            ->db
            ->where('id', $id);
            $this
            ->db
            ->update('table_k3', $insert);

            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Berkas K3 Berhasil Diperbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/k3', 'refresh');
        }
        else
        {
       // $this->db->query("UPDATE table_k3 SET status='1', notif='0' WHERE kode_perusahaan='$kode_perusahaan' and id='$get_akhir' ");
         $this
         ->db
         ->where('id', $id);
         $this
         ->db
         ->update('table_k3', $update);

         $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Data Berhasil Diperbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('User/k3', 'refresh');
     }
 }
}
public function uploadWlkp(){
    error_reporting(0);
    $session = $this->session->userdata();
    $kode_perusahaan = $session['kode_perusahaan'];
    $file= $this
    ->custom_upload
    ->single_upload('file', array(
        'upload_path' => './upload/wlkp',
        'allowed_types' => 'pdf'
    ));

    $id = $this
    ->input
    ->post('id');
    $no_dokumen = $this
    ->input
    ->post('no_dokumen');
    $no_registrasi = $this
    ->input
    ->post('no_registrasi');
    $tanggal = $this
    ->input
    ->post('tanggal');

    $insert = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '1',
        'notif' => '0',
        'nama_file' => ((empty($file)) ? null : $file),
    );
    $insert_baru = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '0',
        'notif' => '0',
        'nama_file' => ((empty($file)) ? null : $file),
    );
    $update = array(
        'no_dokumen' => $no_dokumen,
        'no_registrasi' => $no_registrasi,
        'tanggal_daftar' => $tanggal,
        'kode_perusahaan' => $kode_perusahaan,
        'status' => '1',
        'notif' => '0',
    );
    $get_data_akhir = $this->db->query("SELECT id as id FROM table_wlkp WHERE kode_perusahaan='$kode_perusahaan' order by id desc LIMIT 1")->result();
    $get_akhir = $get_data_akhir[0]->id;
    if ($get_akhir == NULL) {
        $this
        ->db
        ->insert('table_wlkp', $insert_baru);

        $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Berkas WLKP Berhasil Ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        redirect('User/pkb', 'refresh');
    }else{
        if ($file != NULL)
        {
        // $this->db->query("UPDATE table_wlkp SET status='2', notif='1' WHERE kode_perusahaan='$kode_perusahaan' and id='$get_akhir' ");
            $this
            ->db
            ->where('id', $id);
            $this
            ->db
            ->update('table_wlkp', $insert);

            $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Berkas WLKP Berhasil Diperbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('User/wlkp', 'refresh');
        }
        else
        {
        // $this->db->query("UPDATE table_wlkp SET status='1', notif='0' WHERE kode_perusahaan='$kode_perusahaan' and id='$get_akhir' ");
         $this
         ->db
         ->where('id', $id);
         $this
         ->db
         ->update('table_wlkp', $update);

         $this->session->set_flashdata('notif','<div class="alert alert-success" role="alert" style="text-align: center"> Data Berhasil Diperbaharui <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
         redirect('User/wlkp', 'refresh');
     }
 }
}



}
