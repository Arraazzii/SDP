<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Indonesia');
        $this->load->model('m_admin');
        $this->load->library('pdf');
				$this->m_admin->update_kadaluarsa();
				$this->load->library('dom_pdf');
        if($this->session->has_userdata('level') == false){
            redirect('login');
        } elseif ($this->session->userdata('level') != 'admin'){
            redirect('User');
        }

    }
    private function load($title = '', $datapath = '')
    {
        $jumlah_perusahaan = array(
                'p_baru' => $this
                ->m_admin
                ->tampil_jumlah_perusahaan_baru(),
                'detail_notifikasi' => $this
                ->m_admin
                ->tampil_detail_notifikasi_perusahaan_baru(),
                'p_terdaftar' => $this
                ->m_admin
                ->tampil_jumlah_perusahaan_terdaftar(),
                'notif_perusahaan_baru' => $this
                ->m_admin
                ->tampil_notifikasi_perusahaan_baru(),
        );
        $page = array(
            "header" => $this
            ->load
            ->view('admin/template/header', array(
                "title" => $title,
                "p_baru" => $jumlah_perusahaan['p_baru'],
                "p_terdaftar" => $jumlah_perusahaan['p_terdaftar'],
                "notif_perusahaan_baru" => $jumlah_perusahaan['notif_perusahaan_baru'],
                "detail_notifikasi" => $jumlah_perusahaan['detail_notifikasi'],
            ) , true) ,
            "css" => $this
            ->load
            ->view('admin/template/main_css', false, true) ,
            "sidebar" => $this
            ->load
            ->view('admin/template/sidebar', $jumlah_perusahaan, true) ,
            "js" => $this
            ->load
            ->view('admin/template/main_js', false, true) ,
        );
        return $page;
    }
	//HALAMAN UTAMA ADMIN
    public function index()
    {
        $jumlah_perusahaan = array(
                'p_baru' => $this
                ->m_admin
                ->tampil_jumlah_perusahaan_baru(),
                'notif_perusahaan_baru' => $this
                ->m_admin
                ->tampil_notifikasi_perusahaan_baru(),
                'p_terdaftar' => $this
                ->m_admin
                ->tampil_jumlah_perusahaan_terdaftar(),
                'p_blokir' => $this
                ->m_admin
                ->tampil_jumlah_perusahaan_blacklist(),
                'k3_aktif' => $this
                ->m_admin
                ->rekap_k3_aktif(),
                'k3_perbarui' => $this
                ->m_admin
                ->rekap_k3_perbarui(),
                'k3_kadaluarsa' => $this
                ->m_admin
                ->rekap_k3_kadaluarsa(),
                'pkb_aktif' => $this
                ->m_admin
                ->rekap_pkb_aktif(),
                'pkb_perbarui' => $this
                ->m_admin
                ->rekap_pkb_perbarui(),
                'pkb_kadaluarsa' => $this
                ->m_admin
                ->rekap_pkb_kadaluarsa(),
                'lks_aktif' => $this
                ->m_admin
                ->rekap_lks_aktif(),
                'lks_perbarui' => $this
                ->m_admin
                ->rekap_lks_perbarui(),
                'lks_kadaluarsa' => $this
                ->m_admin
                ->rekap_lks_kadaluarsa(),
                'pp_aktif' => $this
                ->m_admin
                ->rekap_pp_aktif(),
                'pp_perbarui' => $this
                ->m_admin
                ->rekap_pp_perbarui(),
                'pp_kadaluarsa' => $this
                ->m_admin
                ->rekap_pp_kadaluarsa(),
                'wlkp_aktif' => $this
                ->m_admin
                ->rekap_wlkp_aktif(),
                'wlkp_perbarui' => $this
                ->m_admin
                ->rekap_wlkp_perbarui(),
                'wlkp_kadaluarsa' => $this
                ->m_admin
                ->rekap_wlkp_kadaluarsa(),
        );
        $path = "";
        $data = array(
            "page" => $this->load("Admin - Dashboard", $path) ,
            "content" => $this
            ->load
            ->view('admin/index', $jumlah_perusahaan, true)
           );

        $this
        ->load
        ->view('admin/template/admin_template', $data);
    }

    public function print_perusahaan(){

$pdf = new FPDF('L','mm','A4');
// membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times','B',12);
        // mencetak string
        $pdf->Cell(300,4,'LIST PERUSAHAAN TERDAFTAR',0,1,'C');
        $pdf->Cell(300,4,'DI KOTA DEPOK',0,1,'C');
        $pdf->Cell(300,4,'BULAN JANUARI s/d DESEMBER 2018',0,1,'C');
        $pdf->Ln();
        $pdf->Ln();
        $pdf->Cell(35);
        $pdf->Cell(15,6,'NO',1,0,'C');
        $pdf->Cell(65,6,'NAMA PERUSAHAAN',1,0,'C');
        $pdf->Cell(27,6,'PIMPINAN',1,0,'C');
        $pdf->Cell(80,6,'ALAMAT',1,0,'C');
        $pdf->Cell(40,6,'NO. TELPON',1,1,'C');
        $no = 1;
        $mahasiswa = $this->m_admin->data_perusahaan();
        foreach ($mahasiswa as $row){
        $pdf->Cell(35);
        $pdf->Cell(15,6,$no++,1,0,'C');
        $pdf->Cell(65,6,$row->nama_perusahaan,1,0,'C');
        $pdf->Cell(27,6,$row->nama,1,0,'C');
        $pdf->Cell(80,6,$row->alamat,1,0,'C');
        $pdf->Cell(40,6,$row->no_telpon,1,1,'C');
        }
        $pdf->Output();
    }

    //HALAMAN USERBARU
    public function userbaru()
    {
        $perusahaan_baru = array(
                'perusahaan_baru' => $this
                ->m_admin
                ->perusahaan_baru(),
                'detail_data' => $this
                ->m_admin
                ->detail_perusahaan_baru(),
        );
        $path = "";
        $data = array(
            "page" => $this->load("Admin - Perusahaan Baru", $path) ,
            "content" => $this
            ->load
            ->view('admin/userbaru', $perusahaan_baru, true)
        );
        $this
        ->load
        ->view('admin/template/admin_template', $data);
    }

    // Terima User Baru
    public function terima(){
        $id     = $this->input->post("id");
        $email  = $this->input->post("email");
        $nama   = $this->input->post("nama");
        $this->load->library('SMTP','PHPmailer');

        $mail   = new PHPMailer();
        $akunadmin = $this->db->query("SELECT * FROM table_email where id_email='1' ")->result();
        $email_admin = $akunadmin[0]->email;
        $nama_admin = $akunadmin[0]->nama;
        $password_admin = $akunadmin[0]->password;
        $mail->isSMTP();  
        $mail->SMTPKeepAlive = true;
        $mail->Charset  = 'UTF-8';
        $mail->IsHTML(true);
        // $mail->SMTPDebug = 2;
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com'; 
        $mail->Port = 587;
        $mail->SMTPSecure = 'ssl';
        $mail->Username = $email_admin;
        $mail->Password = $password_admin;
        $mail->Mailer   = 'smtp';
        $mail->WordWrap = 100;       
        

        $mail->setFrom($email_admin);
        $mail->FromName = $nama_admin;
        $mail->addAddress($email);
        $mail->Subject = 'Registration Completed';
        $mail_data['subject'] = 'Dear '. $nama;
        $mail_data['description'] = "Thank you for registration :)";
        
        $message = $this->load->view('admin/template/email', $mail_data, TRUE);
        $mail->Body = $message;

        if ($mail->send()) {
            $perusahaan = $this
                        ->m_admin
                        ->terima($id);

            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! Perusahaan Diterima.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
            redirect('admin/userbaru');
        } else {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    // Terima User Baru
    // public function terima(){
    //     $id    = $this->input->post("id");
    //     $nama_perusahaan = $this->db->query("SELECT nama_perusahaan as perusahaan_name from table_perusahaan where kode_perusahaan='$id' ")->result();
    //     $perusahaan = $this
    //     ->m_admin
    //     ->terima($id);

    //     $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
    //         Success! Perusahaan '.$nama_perusahaan[0]->perusahaan_name.' Diterima.
    //         <button type="button" class="close" data-dismiss="alert">&times</button>
    //         </div>');
    //     redirect('admin/userbaru');
    // }

    // Tolak Perusahaan Baru
    public function tolak(){
        $kode = $this->uri->segment(3);

        $perusahaan = $this
                        ->m_admin
                        ->tolak($kode);

            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! Perusahaan Ditolak.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
            redirect('admin/userbaru');

    }

    // Nonaktif Perusahaan Baru
    public function nonaktif(){
        $kode = $this->uri->segment(3);

        $perusahaan = $this
                        ->m_admin
                        ->nonaktif($kode);

            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! Perusahaan Telah di Nonaktif.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
            redirect('admin/perusahaan');

    }

    //HALAMAN SETTING EMAIL
    public function setting_email()
    {
        $perusahaan = array(
                'email_setting' => $this
                ->m_admin
                ->email_setting(),
        );
        $path = "";
        $data = array(
            "page" => $this->load("Admin - Setting Email", $path) ,
            "content" => $this
            ->load
            ->view('admin/mail_setting', $perusahaan, true)
        );
        $this
        ->load
        ->view('admin/template/admin_template', $data);
    }

    //GANTI EMAIL
    public function change_mail(){
        $session = $this->session->userdata();
        $get_id = $session['id'];
        $viewOldPassword = $this->db->query("SELECT password as password_lama FROM table_login WHERE id='$get_id' ")->result();
        $email = $this
        ->input
        ->post('email');
        $nama = $this
        ->input
        ->post('nama');
        $password = $this
        ->input
        ->post('password');
        $oldPassword = md5($this
        ->input
        ->post('old_password'));

        if ( $viewOldPassword[0]->password_lama == $oldPassword ) {
                $updateEmail = $this->db->query("UPDATE table_email SET email='$email', nama='$nama', password='$password' where id_email='1' ");
               $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! Email Berhasil Diganti.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
                redirect('admin/setting_email', 'refresh');
            }else{
                $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible">
            Error! Password Login Tidak Benar.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
                redirect('admin/setting_email', 'refresh');
            }

    }

    //HALAMAN PERUSAHAAN
    public function perusahaan()
    {
        $perusahaan = array(
                'data_perusahaan' => $this
                ->m_admin
                ->data_perusahaan(),
                'pengurus' => $this
                ->m_admin
                ->jumlah_pengurus_perusahaan(),
        );
        $path = "";
        $data = array(
            "page" => $this->load("Admin - Perusahaan", $path) ,
            "content" => $this
            ->load
            ->view('admin/perusahaan', $perusahaan, true)
        );
        $this
        ->load
        ->view('admin/template/admin_template', $data);
    }

    //HALAMAN PERUSAHAAN DETAIL
    public function perusahaan_detail()
    {
        $kode = $this->uri->segment(3);
        $perusahaan = array(
                'data_perusahaan' => $this
                ->m_admin
                ->detail_perusahaan($kode),
        );
        $path = "";
        $data = array(
            "page" => $this->load("Admin - Detail Perusahaan", $path) ,
            "content" => $this
            ->load
            ->view('admin/perusahaan_detail', $perusahaan, true)
        );
        $this
        ->load
        ->view('admin/template/admin_template', $data);
    }

    //HALAMAN WLKP PERUSAHAAN
    public function wlkp_perusahaan()
    {
        $kode = $this->uri->segment(3);
        $perusahaan = array(
                'data_wlkp_perusahaan' => $this
                ->m_admin
                ->data_wlkp_perusahaan(),
                'detail_wlkp_perusahaan' => $this
                ->m_admin
                ->detail_wlkp_perusahaan($kode)
        );
        $path = "";
        $data = array(
            "page" => $this->load("Admin - WLKP Perusahaan", $path),
            "content" => $this
            ->load
            ->view('admin/wlkp_perusahaan', $perusahaan, true)
        );
        $this
        ->load
        ->view('admin/template/admin_template', $data);
    }

    // FUNCTION INPUT WLKP PERUSAHAAN 
    public function input_wlkp()
    {
        $kode_wlkp      = $this->M_Indonesia->get_kode_wlkp();
        $kode_alamat    = $this->M_Indonesia->get_kode_alamat();

        // TABLE WLKP PERUSAHAAN
        $nama_perusahaan        = $this->input->post('nama_perusahaan');
        $alamat_perusahaan      = $this->input->post('alamat_perusahaan');
        $kecamatan_perusahaan   = $this->input->post('kecamatan_perusahaan');
        $kelurahan_perusahaan   = $this->input->post('kelurahan_perusahaan');
        $telp_perusahaan        = $this->input->post('telp_perusahaan');
        $jenis_usaha            = $this->input->post('jenis_usaha');
        $nama_pemilik           = $this->input->post('nama_pemilik');
        $nama_pengurus          = $this->input->post('nama_pengurus');
        $tanggal_pendirian      = $this->input->post('tanggal_pendirian');
        $no_pendirian           = $this->input->post('no_pendirian');
        $ket_kantor             = $this->input->post('ket_kantor');
        $kantor_cabang          = $this->input->post('kantor_cabang');
        $kepemilikan            = $this->input->post('kepemilikan');
        $permodalan             = $this->input->post('permodalan');

        // TABLE WARGA NEGARA
        $l_dibawah_15   = $this->input->post('l_dibawah_15');
        $p_dibawah_15   = $this->input->post('p_dibawah_15');
        $l_dibawah_18   = $this->input->post('l_dibawah_18');
        $p_dibawah_18   = $this->input->post('p_dibawah_18');
        $l_diatas_18    = $this->input->post('l_diatas_18');
        $p_diatas_18    = $this->input->post('p_diatas_18');
        $l_wna          = $this->input->post('l_wna');
        $p_wna          = $this->input->post('p_wna');
        $total_wni      = $l_dibawah_15 + $p_dibawah_15 + $l_dibawah_18 
                          + $p_dibawah_18 + $l_diatas_18 + $p_diatas_18;
        $total_wna      = $l_wna + $p_wna;

        // TABLE KETENAGAKERJAAN
        $waktu_kerja        = $this->input->post('waktu_kerja');
        $kategori           = $this->input->post('kategori');
        $penerima_umr       = $this->input->post('penerima_umr');
        $jumlah_upah        = $this->input->post('jumlah_upah');
        $upah_tinggi        = $this->input->post('upah_tinggi');
        $upah_rendah        = $this->input->post('upah_rendah');
        $l_mendatang        = $this->input->post('l_mendatang');
        $p_mendatang        = $this->input->post('p_mendatang');
        $l_terakhir         = $this->input->post('l_terakhir');
        $p_terakhir         = $this->input->post('p_terakhir');
        $pekerja_terakhir   = $this->input->post('pekerja_terakhir');
        $pekerja_berhenti   = $this->input->post('pekerja_berhenti');

        // TABLE PENGESAHAN
        $tempat_pengesahan  = $this->input->post('tempat_pengesahan');
        $tgl_pengesahan     = $this->input->post('tgl_pengesahan');
        $nama_pengesah      = $this->input->post('nama_pengesah');
        $nip                = $this->input->post('nip');

        // TABLE ALAT & BAHAN
        $pesawat_uap        = $this->input->post('pesawat_uap');
        $pesawat_angkat     = $this->input->post('pesawat_angkat');
        $pesawat_angkut     = $this->input->post('pesawat_angkut');
        $alat_berat         = $this->input->post('alat_berat');
        $motor              = $this->input->post('motor');
        $amdal              = $this->input->post('amdal');
        $ins_listrik        = $this->input->post('ins_listrik');
        $ins_pemadam        = $this->input->post('ins_pemadam');
        $ins_limbah         = $this->input->post('ins_limbah');
        $lift               = $this->input->post('lift');
        $bejana             = $this->input->post('bejana');
        $bahan_beracun      = $this->input->post('bahan_beracun');
        $turbin             = $this->input->post('turbin');
        $botol_baja         = $this->input->post('botol_baja');
        $perancah           = $this->input->post('perancah');
        $radio_aktif        = $this->input->post('radio_aktif');
        $penyalur_petir     = $this->input->post('penyalur_petir');
        $pembangkit_listrik = $this->input->post('pembangkit_listrik');
        $limbah_padat       = $this->input->post('limbah_padat');
        $limbah_cair        = $this->input->post('limbah_cair');
        $limbah_gas         = $this->input->post('limbah_gas');

        // TABLE FASILITAS
        $p3k            = $this->input->post('p3k');
        $klinik         = $this->input->post('klinik');
        $dokter         = $this->input->post('dokter');
        $ahli_k3        = $this->input->post('ahli_k3');
        $medis          = $this->input->post('medis');
        $pemadam        = $this->input->post('pemadam');
        $koperasi       = $this->input->post('koperasi');
        $tpa            = $this->input->post('tpa');
        $kantin         = $this->input->post('kantin');
        $sarana_ibadah  = $this->input->post('sarana_ibadah');
        $unit_kb        = $this->input->post('unit_kb');
        $olahraga       = $this->input->post('olahraga');
        $perum          = $this->input->post('perum');
        $bpjs           = $this->input->post('bpjs');
        $apindo         = $this->input->post('apindo');
        $pk             = $this->input->post('pk');
        $pp             = $this->input->post('pp');
        $pkb            = $this->input->post('pkb');
        $bipartit       = $this->input->post('bipartit');
        $sptp           = $this->input->post('sptp');
        $uksp           = $this->input->post('uksp');
        $p2k3           = $this->input->post('p2k3');

        $data_wlkp = array(
            'kode_wlkp'             => $kode_wlkp,
            'nama_perusahaan'       => $nama_perusahaan,
            'jenis_usaha'           => $jenis_usaha,
            'nama_pemilik'          => $nama_pemilik,
            'nama_pengurus'         => $nama_pengurus,
            'tanggal_pendirian'     => $tanggal_pendirian,
            'nomor_pendirian'       => $no_pendirian,
            'ket_kantor'            => $ket_kantor,
            'kantor_cabang'         => $kantor_cabang,
            'status_kepemilikan'    => $kepemilikan,
            'status_permodalan'     => $permodalan,
            'kode_alamat'           => $kode_alamat
        );

        $data_alamat = array(
            'kode_alamat'   => $kode_alamat,
            'alamat'        => $alamat_perusahaan,
            'kecamatan'     => $kecamatan_perusahaan,
            'kelurahan'     => $kelurahan_perusahaan,
            'no_telpon'     => $telp_perusahaan
        );

        $data_wn = array(
            'l_dibawah_15'  => $l_dibawah_15,
            'p_dibawah_15'  => $p_dibawah_15,
            'l_dibawah_18'  => $l_dibawah_18,
            'p_dibawah_18'  => $p_dibawah_18,
            'l_diatas_18'   => $l_diatas_18,
            'p_diatas_18'   => $p_diatas_18,
            'total_wni'     => $total_wni,
            'l_wna'         => $l_wna,
            'p_wna'         => $p_wna,
            'total_wna'     => $total_wna,
            'kode_wlkp'     => $kode_wlkp
        );

        $data_tenagakerja = array(
            'jam_kerja'             => $waktu_kerja,
            'kategori'              => $kategori,
            'jumlah_penerima_umr'   => $penerima_umr,
            'jumlah_upah'           => $jumlah_upah,
            'upah_tinggi'           => $upah_tinggi,
            'upah_rendah'           => $upah_rendah,
            'l_mendatang'           => $l_mendatang,
            'p_mendatang'           => $p_mendatang,
            'l_terakhir'            => $l_terakhir,
            'p_terakhir'            => $p_terakhir,
            'pekerja_terakhir'      => $pekerja_terakhir,
            'pekerja_berhenti'      => $pekerja_berhenti,
            'kode_wlkp'             => $kode_wlkp
        );

        $data_pengesahan = array(
            'nip'                   => $nip,
            'nama_pengesah'         => $nama_pengesah,
            'tanggal_pengesahan'    => $tgl_pengesahan,
            'tempat_pengesahan'     => $tempat_pengesahan,
            'kode_wlkp'             => $kode_wlkp
        );

        $data_alat_bahan = array(
            'pesawat_uap'           => $pesawat_uap,
            'alat_berat'            => $alat_berat,
            'instalasi_listrik'     => $ins_listrik,
            'lift'                  => $lift,
            'turbin'                => $turbin,
            'radio_aktif'           => $radio_aktif,
            'limbah_padat'          => $limbah_padat,
            'pesawat_angkat'        => $pesawat_angkut,
            'motor'                 => $motor,
            'instalasi_pemadam'     => $ins_pemadam,
            'bejana_tekan'          => $bejana,
            'botol_baja'            => $botol_baja,
            'penyalur_petir'        => $penyalur_petir,
            'limbah_cair'           => $limbah_cair,
            'pesawat_angkut'        => $pesawat_angkut,
            'amdal'                 => $amdal,
            'instalasi_limbah'      => $ins_limbah,
            'bahan_beracun'         => $bahan_beracun,
            'perancah'              => $perancah,
            'pembangkit_listrik'    => $pembangkit_listrik,
            'limbah_gas'            => $limbah_gas,
            'kode_wlkp'             => $kode_wlkp
        );

        $data_fasilitas = array(
            'p3k'           => $p3k,
            'ahli_k3'       => $ahli_k3,
            'koperasi'      => $koperasi,
            'sarana_ibadah' => $sarana_ibadah,
            'perumahan'     => $perum,
            'pk'            => $pk,
            'bipartit'      => $bipartit,
            'p2k3'          => $p2k3,
            'poliklinik'    => $klinik,
            'paramedis'     => $medis,
            'tpa'           => $tpa,
            'unit_kb'       => $unit_kb,
            'bpjs'          => $bpjs,
            'pp'            => $pp,
            'sptp'          => $sptp,
            'dokter'        => $dokter,
            'pemadam'       => $pemadam,
            'kantin'        => $kantin,
            'olahraga'      => $olahraga,
            'apindo'        => $apindo,
            'pkb'           => $pkb,
            'uksp'          => $uksp,
            'kode_wlkp'     => $kode_wlkp
        );

        $this->db->insert("table_wlkp_perusahaan", $data_wlkp);
        $this->db->insert("table_alamat", $data_alamat);
        $this->db->insert("table_warga_negara", $data_wn);
        $this->db->insert("table_ketenagakerjaan", $data_tenagakerja);
        $this->db->insert("table_pengesahan", $data_pengesahan);
        $this->db->insert("table_alat_bahan", $data_alat_bahan);
        $this->db->insert("table_fasilitas", $data_fasilitas);

        $this->session->set_flashdata("globalmsg", "Money Box Successfully Added!");

        //redirect
        redirect('Admin/wlkp_perusahaan');
    }

    // FUNCTION INPUT WLKP PERUSAHAAN 
    public function update_wlkp()
    {
        $kode_wlkp = $this->input->post('kode_wlkp');
        $kode_alamat = $this->input->post('kode_alamat');

        // TABLE WLKP PERUSAHAAN
        $nama_perusahaan        = $this->input->post('nama_perusahaan');
        $alamat_perusahaan      = $this->input->post('alamat_perusahaan');
        $kecamatan_perusahaan   = $this->input->post('kecamatan_perusahaan');
        $kelurahan_perusahaan   = $this->input->post('kelurahan_perusahaan');
        $telp_perusahaan        = $this->input->post('telp_perusahaan');
        $jenis_usaha            = $this->input->post('jenis_usaha');
        $nama_pemilik           = $this->input->post('nama_pemilik');
        $nama_pengurus          = $this->input->post('nama_pengurus');
        $tanggal_pendirian      = $this->input->post('tanggal_pendirian');
        $no_pendirian           = $this->input->post('no_pendirian');
        $ket_kantor             = $this->input->post('ket_kantor');
        $kantor_cabang          = $this->input->post('kantor_cabang');
        $kepemilikan            = $this->input->post('kepemilikan');
        $permodalan             = $this->input->post('permodalan');

        // TABLE WARGA NEGARA
        $l_dibawah_15   = $this->input->post('l_dibawah_15');
        $p_dibawah_15   = $this->input->post('p_dibawah_15');
        $l_dibawah_18   = $this->input->post('l_dibawah_18');
        $p_dibawah_18   = $this->input->post('p_dibawah_18');
        $l_diatas_18    = $this->input->post('l_diatas_18');
        $p_diatas_18    = $this->input->post('p_diatas_18');
        $l_wna          = $this->input->post('l_wna');
        $p_wna          = $this->input->post('p_wna');
        $total_wni      = $l_dibawah_15 + $p_dibawah_15 + $l_dibawah_18 
                          + $p_dibawah_18 + $l_diatas_18 + $p_diatas_18;
        $total_wna      = $l_wna + $p_wna;

        // TABLE KETENAGAKERJAAN
        $waktu_kerja        = $this->input->post('waktu_kerja');
        $kategori           = $this->input->post('kategori');
        $penerima_umr       = $this->input->post('penerima_umr');
        $jumlah_upah        = $this->input->post('jumlah_upah');
        $upah_tinggi        = $this->input->post('upah_tinggi');
        $upah_rendah        = $this->input->post('upah_rendah');
        $l_mendatang        = $this->input->post('l_mendatang');
        $p_mendatang        = $this->input->post('p_mendatang');
        $l_terakhir         = $this->input->post('l_terakhir');
        $p_terakhir         = $this->input->post('p_terakhir');
        $pekerja_terakhir   = $this->input->post('pekerja_terakhir');
        $pekerja_berhenti   = $this->input->post('pekerja_berhenti');

        // TABLE PENGESAHAN
        $tempat_pengesahan  = $this->input->post('tempat_pengesahan');
        $tgl_pengesahan     = $this->input->post('tgl_pengesahan');
        $nama_pengesah      = $this->input->post('nama_pengesah');
        $nip                = $this->input->post('nip');

        // TABLE ALAT & BAHAN
        $pesawat_uap        = $this->input->post('pesawat_uap');
        $pesawat_angkat     = $this->input->post('pesawat_angkat');
        $pesawat_angkut     = $this->input->post('pesawat_angkut');
        $alat_berat         = $this->input->post('alat_berat');
        $motor              = $this->input->post('motor');
        $amdal              = $this->input->post('amdal');
        $ins_listrik        = $this->input->post('ins_listrik');
        $ins_pemadam        = $this->input->post('ins_pemadam');
        $ins_limbah         = $this->input->post('ins_limbah');
        $lift               = $this->input->post('lift');
        $bejana             = $this->input->post('bejana');
        $bahan_beracun      = $this->input->post('bahan_beracun');
        $turbin             = $this->input->post('turbin');
        $botol_baja         = $this->input->post('botol_baja');
        $perancah           = $this->input->post('perancah');
        $radio_aktif        = $this->input->post('radio_aktif');
        $penyalur_petir     = $this->input->post('penyalur_petir');
        $pembangkit_listrik = $this->input->post('pembangkit_listrik');
        $limbah_padat       = $this->input->post('limbah_padat');
        $limbah_cair        = $this->input->post('limbah_cair');
        $limbah_gas         = $this->input->post('limbah_gas');

        // TABLE FASILITAS
        $p3k            = $this->input->post('p3k');
        $klinik         = $this->input->post('klinik');
        $dokter         = $this->input->post('dokter');
        $ahli_k3        = $this->input->post('ahli_k3');
        $medis          = $this->input->post('medis');
        $pemadam        = $this->input->post('pemadam');
        $koperasi       = $this->input->post('koperasi');
        $tpa            = $this->input->post('tpa');
        $kantin         = $this->input->post('kantin');
        $sarana_ibadah  = $this->input->post('sarana_ibadah');
        $unit_kb        = $this->input->post('unit_kb');
        $olahraga       = $this->input->post('olahraga');
        $perum          = $this->input->post('perum');
        $bpjs           = $this->input->post('bpjs');
        $apindo         = $this->input->post('apindo');
        $pk             = $this->input->post('pk');
        $pp             = $this->input->post('pp');
        $pkb            = $this->input->post('pkb');
        $bipartit       = $this->input->post('bipartit');
        $sptp           = $this->input->post('sptp');
        $uksp           = $this->input->post('uksp');
        $p2k3           = $this->input->post('p2k3');

        $data_wlkp = array(
            'nama_perusahaan'       => $nama_perusahaan,
            'jenis_usaha'           => $jenis_usaha,
            'nama_pemilik'          => $nama_pemilik,
            'nama_pengurus'         => $nama_pengurus,
            'tanggal_pendirian'     => $tanggal_pendirian,
            'nomor_pendirian'       => $no_pendirian,
            'ket_kantor'            => $ket_kantor,
            'kantor_cabang'         => $kantor_cabang,
            'status_kepemilikan'    => $kepemilikan,
            'status_permodalan'     => $permodalan,
            'kode_alamat'           => $kode_alamat
        );

        $data_alamat = array(
            'alamat'        => $alamat_perusahaan,
            'kecamatan'     => $kecamatan_perusahaan,
            'kelurahan'     => $kelurahan_perusahaan,
            'no_telpon'     => $telp_perusahaan
        );

        $data_wn = array(
            'l_dibawah_15'  => $l_dibawah_15,
            'p_dibawah_15'  => $p_dibawah_15,
            'l_dibawah_18'  => $l_dibawah_18,
            'p_dibawah_18'  => $p_dibawah_18,
            'l_diatas_18'   => $l_diatas_18,
            'p_diatas_18'   => $p_diatas_18,
            'total_wni'     => $total_wni,
            'l_wna'         => $l_wna,
            'p_wna'         => $p_wna,
            'total_wna'     => $total_wna
        );

        $data_tenagakerja = array(
            'jam_kerja'             => $waktu_kerja,
            'kategori'              => $kategori,
            'jumlah_penerima_umr'   => $penerima_umr,
            'jumlah_upah'           => $jumlah_upah,
            'upah_tinggi'           => $upah_tinggi,
            'upah_rendah'           => $upah_rendah,
            'l_mendatang'           => $l_mendatang,
            'p_mendatang'           => $p_mendatang,
            'l_terakhir'            => $l_terakhir,
            'p_terakhir'            => $p_terakhir,
            'pekerja_terakhir'      => $pekerja_terakhir,
            'pekerja_berhenti'      => $pekerja_berhenti
        );

        $data_pengesahan = array(
            'nip'                   => $nip,
            'nama_pengesah'         => $nama_pengesah,
            'tanggal_pengesahan'    => $tgl_pengesahan,
            'tempat_pengesahan'     => $tempat_pengesahan
        );

        $data_alat_bahan = array(
            'pesawat_uap'           => $pesawat_uap,
            'alat_berat'            => $alat_berat,
            'instalasi_listrik'     => $ins_listrik,
            'lift'                  => $lift,
            'turbin'                => $turbin,
            'radio_aktif'           => $radio_aktif,
            'limbah_padat'          => $limbah_padat,
            'pesawat_angkat'        => $pesawat_angkut,
            'motor'                 => $motor,
            'instalasi_pemadam'     => $ins_pemadam,
            'bejana_tekan'          => $bejana,
            'botol_baja'            => $botol_baja,
            'penyalur_petir'        => $penyalur_petir,
            'limbah_cair'           => $limbah_cair,
            'pesawat_angkut'        => $pesawat_angkut,
            'amdal'                 => $amdal,
            'instalasi_limbah'      => $ins_limbah,
            'bahan_beracun'         => $bahan_beracun,
            'perancah'              => $perancah,
            'pembangkit_listrik'    => $pembangkit_listrik,
            'limbah_gas'            => $limbah_gas
        );

        $data_fasilitas = array(
            'p3k'           => $p3k,
            'ahli_k3'       => $ahli_k3,
            'koperasi'      => $koperasi,
            'sarana_ibadah' => $sarana_ibadah,
            'perumahan'     => $perum,
            'pk'            => $pk,
            'bipartit'      => $bipartit,
            'p2k3'          => $p2k3,
            'poliklinik'    => $klinik,
            'paramedis'     => $medis,
            'tpa'           => $tpa,
            'unit_kb'       => $unit_kb,
            'bpjs'          => $bpjs,
            'pp'            => $pp,
            'sptp'          => $sptp,
            'dokter'        => $dokter,
            'pemadam'       => $pemadam,
            'kantin'        => $kantin,
            'olahraga'      => $olahraga,
            'apindo'        => $apindo,
            'pkb'           => $pkb,
            'uksp'          => $uksp
        );

        // Update WLKP Perusahaan
        $this->db->where('kode_wlkp', $kode_wlkp);
        $this->db->update('table_wlkp_perusahaan', $data_wlkp);
        
        // Update Alamat
        $this->db->where('kode_alamat', $kode_alamat);
        $this->db->update('table_alamat', $data_alamat);

        // Update Warga Negara
        $this->db->where('kode_wlkp', $kode_wlkp);
        $this->db->update('table_warga_negara', $data_wn);

        // Update Ketenagakerjaan
        $this->db->where('kode_wlkp', $kode_wlkp);
        $this->db->update('table_ketenagakerjaan', $data_tenagakerja);

        // Update Pengesahan
        $this->db->where('kode_wlkp', $kode_wlkp);
        $this->db->update('table_pengesahan', $data_pengesahan);

        // Update Alat Bahan
        $this->db->where('kode_wlkp', $kode_wlkp);
        $this->db->update('table_alat_bahan', $data_alat_bahan);

        // Update Fasilitas
        $this->db->where('kode_wlkp', $kode_wlkp);
        $this->db->update('table_fasilitas', $data_fasilitas);

        $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! WLKP Perusahaan Berhasil Diperbaharui.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
        redirect('admin/wlkp_perusahaan', 'refresh');
    }

    // Delete WLKP Perusahaan
    public function delete_wlkp(){
        $kode = $this->uri->segment(3);

        $perusahaan = $this
                        ->m_admin
                        ->delete_wlkp($kode);

            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible">
            Success! WLKP Perusahaan Telah di Hapus.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
            redirect('admin/wlkp_perusahaan');

    }

    //HALAMAN REKAPITULASI PP
    public function rekap_pp()
    {
        $rekap_pp = array(
                'rekap_pp' => $this
                ->m_admin
                ->rekap_pp(),
                'status' => $this
                ->m_admin
                ->get_list_countries()
        );

        $path = "";
        $data = array(
            "page" => $this->load("Admin - Rekapitulasi PP", $path) ,
            "content" => $this
            ->load
            ->view('admin/rekap_pp', $rekap_pp, true)
        );
        $this
        ->load
        ->view('admin/template/admin_template', $data);
    }

    //HALAMAN REKAPITULASI PKB
    public function rekap_pkb()
    {
        $rekap_pkb = array(
                'rekap_pkb' => $this
                ->m_admin
                ->rekap_pkb(),
        );
        $path = "";
        $data = array(
            "page" => $this->load("Admin - Rekapitulasi PKB", $path) ,
            "content" => $this
            ->load
            ->view('admin/rekap_pkb', $rekap_pkb, true)
        );
        $this
        ->load
        ->view('admin/template/admin_template', $data);
    }

    //HALAMAN REKAPITULASI K3
    public function rekap_k3()
    {
        $rekap_k3 = array(
                'rekap_k3' => $this
                ->m_admin
                ->rekap_k3(),
        );
        $path = "";
        $data = array(
            "page" => $this->load("Admin - Rekapitulasi K3", $path) ,
            "content" => $this
            ->load
            ->view('admin/rekap_k3', $rekap_k3, true)
        );
        $this
        ->load
        ->view('admin/template/admin_template', $data);
    }

    //HALAMAN REKAPITULASI LKS
    public function rekap_lks()
    {
        $rekap_lks = array(
                'rekap_lks' => $this
                ->m_admin
                ->rekap_lks(),
        );
        $path = "";
        $data = array(
            "page" => $this->load("Admin - Rekapitulasi LKS", $path) ,
            "content" => $this
            ->load
            ->view('admin/rekap_lks', $rekap_lks, true)
        );
        $this
        ->load
        ->view('admin/template/admin_template', $data);
    }

    //HALAMAN REKAPITULASI WLKP
    public function rekap_wlkp()
    {
        $rekap_wlkp = array(
                'rekap_wlkp' => $this
                ->m_admin
                ->rekap_wlkp(),
        );
        $path = "";
        $data = array(
            "page" => $this->load("Admin - Rekapitulasi WLKP", $path) ,
            "content" => $this
            ->load
            ->view('admin/rekap_wlkp', $rekap_wlkp, true)
        );
        $this
        ->load
        ->view('admin/template/admin_template', $data);
    }

    public function ajax_list_pp()
    {
        $list = $this->m_admin->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $customers) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $customers->nama_perusahaan;
            $row[] = $customers->no_registrasi;
            $row[] = '1';
            $row[] = $customers->status;


            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->m_admin->count_all(),
                        "recordsFiltered" => $this->m_admin->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }

		//HALAMAN REKAPITULASI K3
		public function report_k3()
		{
				$path = "";
				$input = $this->input->post();
				$this->db->select(' per.kode_perusahaan, per.nama_perusahaan, k3.no_registrasi, k3.no_dokumen, k3.status', false);
				$this->db->from('table_perusahaan as per');
				$this->db->join('table_k3 as k3', 'per.kode_perusahaan = k3.kode_perusahaan');
				$this->db->join('table_login as login', 'per.kode_perusahaan = login.kode_perusahaan');
                $this->db->where('login.status = ', 'sudah');
				// if (!empty($input['status'])) {
				// 		$this->db->where('k3.status = ', $input['status']);
				// }
				if (!empty($input['tgl_awal'])) {
						$this->db->where('k3.tanggal_daftar >= ', $input['tgl_awal']);
				}

				if (!empty($input['tgl_akhir'])) {
						$this->db->where('k3.tanggal_daftar <= ', $input['tgl_akhir']);
				}
				$data_k3 = $this->db->get()->result();
				$viewData = array(
						'data_k3' => $data_k3,
				);
				// $this->load->view('report/report_k3', $viewData);
				$this->dom_pdf->setPaper('A4', 'potrait');
				$this->dom_pdf->filename = "laporan-K3 Perusahaan.pdf";
				$this->dom_pdf->load_view('report/report_k3', $viewData);
		}

		public function report_lks()
		{
				$path = "";
				$input = $this->input->post();
				$this->db->select(' per.kode_perusahaan, per.nama_perusahaan, lks.no_registrasi, lks.no_dokumen, lks.status', false);
				$this->db->from('table_perusahaan as per');
				$this->db->join('table_lks as lks', 'per.kode_perusahaan = lks.kode_perusahaan');
				$this->db->join('table_login as login', 'per.kode_perusahaan = login.kode_perusahaan');
                $this->db->where('login.status = ', 'sudah');
				// if (!empty($input['status'])) {
				// 		$this->db->where('lks.status = ', $input['status']);
				// }
				if (!empty($input['tgl_awal'])) {
						$this->db->where('lks.tanggal_daftar >= ', $input['tgl_awal']);
				}

				if (!empty($input['tgl_akhir'])) {
						$this->db->where('lks.tanggal_daftar <= ', $input['tgl_akhir']);
				}
				$data_lks = $this->db->get()->result();
				$viewData = array(
						'data_lks' => $data_lks,
				);
				// $this->load->view('report/report_lks', $viewData);
				$this->dom_pdf->setPaper('A4', 'potrait');
				$this->dom_pdf->filename = "laporan-LKS Perusahaan.pdf";
				$this->dom_pdf->load_view('report/report_lks', $viewData);
		}

		public function report_pkb()
		{
				$path = "";
				$input = $this->input->post();
				$this->db->select(' per.kode_perusahaan, per.nama_perusahaan, pkb.no_registrasi, pkb.no_dokumen, pkb.status', false);
				$this->db->from('table_perusahaan as per');
				$this->db->join('table_pkb as pkb', 'per.kode_perusahaan = pkb.kode_perusahaan');
				$this->db->join('table_login as login', 'per.kode_perusahaan = login.kode_perusahaan');
                $this->db->where('login.status = ', 'sudah');
				// if (!empty($input['status'])) {
				// 		$this->db->where('pkb.status = ', $input['status']);
				// }
				if (!empty($input['tgl_awal'])) {
						$this->db->where('pkb.tanggal_daftar >= ', $input['tgl_awal']);
				}

				if (!empty($input['tgl_akhir'])) {
						$this->db->where('pkb.tanggal_daftar <= ', $input['tgl_akhir']);
				}
				$data_pkb = $this->db->get()->result();
				$viewData = array(
						'data_pkb' => $data_pkb,
				);
				// $this->load->view('report/report_pkb', $viewData);
				$this->dom_pdf->setPaper('A4', 'potrait');
				$this->dom_pdf->filename = "laporan-PKB Perusahaan.pdf";
				$this->dom_pdf->load_view('report/report_pkb', $viewData);
		}

		public function report_pp()
		{
				$path = "";
				$input = $this->input->post();
				$this->db->select(' per.kode_perusahaan, per.nama_perusahaan, pp.no_registrasi, pp.no_dokumen, pp.status', false);
				$this->db->from('table_perusahaan as per');
				$this->db->join('table_pp as pp', 'per.kode_perusahaan = pp.kode_perusahaan');
				$this->db->join('table_login as login', 'per.kode_perusahaan = login.kode_perusahaan');
                $this->db->where('login.status = ', 'sudah');
				// if (!empty($input['status'])) {
				// 		$this->db->where('pp.status = ', $input['status']);
				// }
				if (!empty($input['tgl_awal'])) {
						$this->db->where('pp.tanggal_daftar >= ', $input['tgl_awal']);
				}

				if (!empty($input['tgl_akhir'])) {
						$this->db->where('pp.tanggal_daftar <= ', $input['tgl_akhir']);
				}
				// $this->db->where('LOWER(u.username)=', strtolower('foobar'));
				$data_pp = $this->db->get()->result();
				// $data_pp = $this->db->get('table_pp')->result();
				 $groups = array();

				 foreach ($data_pp as $array_pp) {
						$key = $array_pp->status;
						if (!array_key_exists($key, $groups)) {
								$groups[$key] = array(
										'status' => $array_pp->status,
								);
						}
				 }
				// var_dump($groups);
				$total = count($array_pp);

				$viewData = array(
						'data_pp' => $data_pp,
						'total' => $groups,
				);
				// $html = $this->load->view('report/test_report', $viewData);

				// $this->generatePdf($html, 'report_pp');
				$this->dom_pdf->setPaper('A4', 'potrait');
				$this->dom_pdf->filename = "laporan-PP Perusahaan.pdf";
				$this->dom_pdf->load_view('report/report_pp', $viewData);
				// $this->load->view('report/test_report', $viewData);
		}

		public function report_wlkp()
		{
				$path = "";
				$input = $this->input->post();
				$this->db->select(' per.kode_perusahaan, per.nama_perusahaan, wlkp.no_registrasi, wlkp.no_dokumen, wlkp.status', false);
				$this->db->from('table_perusahaan as per');
				$this->db->join('table_wlkp as wlkp', 'per.kode_perusahaan = wlkp.kode_perusahaan');
				$this->db->join('table_login as login', 'per.kode_perusahaan = login.kode_perusahaan');
                $this->db->where('login.status = ', 'sudah');
				// if (!empty($input['status'])) {
				// 		$this->db->where('wlkp.status = ', $input['status']);
				// }
				if (!empty($input['tgl_awal'])) {
						$this->db->where('wlkp.tanggal_daftar >= ', $input['tgl_awal']);
				}

				if (!empty($input['tgl_akhir'])) {
						$this->db->where('wlkp.tanggal_daftar <= ', $input['tgl_akhir']);
				}
				$data_wlkp = $this->db->get()->result();
				$viewData = array(
						'data_wlkp' => $data_wlkp,
				);
				// $this->load->view('report/report_wlkp', $viewData);
				$this->dom_pdf->setPaper('A4', 'potrait');
				$this->dom_pdf->filename = "laporan-WLKP Perusahaan.pdf";
				$this->dom_pdf->load_view('report/report_wlkp', $viewData);
		}
}

?>
