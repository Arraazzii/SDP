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
                ->detail_wlkp_perusahaan()
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

    public function rencana_butuh_tk(){
        $kode = $this->input->post('kode');
        $butuh = $this->m_admin->rencana_butuh_tk($kode);
        echo json_encode($butuh);
    }

    public function rencana_tk_terakhir(){
        $kode = $this->input->post('kode');
        $akhir = $this->m_admin->rencana_tk_terakhir($kode);
        echo json_encode($akhir);
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
        $alamat_pemilik         = $this->input->post('alamat_pemilik');
        $nama_pengurus          = $this->input->post('nama_pengurus');
        $alamat_pengurus        = $this->input->post('alamat_pengurus');
        $tanggal_pendirian      = $this->input->post('tanggal_pendirian');
        $tanggal_akte_pendirian = $this->input->post('tanggal_akte_pendirian');
        $no_pendirian           = $this->input->post('no_pendirian');
        $tanggal_akte_perubahan = $this->input->post('tanggal_akte_perubahan');
        $no_perubahan           = $this->input->post('no_perubahan');
        $no_siup                = $this->input->post('no_siup');
        $no_tdp                 = $this->input->post('no_tdp');
        $no_npwp                = $this->input->post('no_npwp');
        $no_kbli                = $this->input->post('no_kbli');
        $no_bpjskes             = $this->input->post('no_bpjskes');
        $no_bpjstk              = $this->input->post('no_bpjstk');
        $pindah_perusahaan      = $this->input->post('pindah_perusahaan');
        $alamat_lama            = $this->input->post('alamat_lama');
        $ket_kantor             = $this->input->post('ket_kantor');
        $kantor_cabang          = $this->input->post('kantor_cabang');
        $kepemilikan            = $this->input->post('kepemilikan');
        $permodalan             = $this->input->post('permodalan');
        $tgl_lapor              = $this->input->post('tgl_lapor');
        $tgl_kadaluarsa         = date('Y-m-d', strtotime('+1 year', strtotime($tgl_lapor)));

        $data_wlkp = array(
            'kode_wlkp'             => $kode_wlkp,
            'nama_perusahaan'       => $nama_perusahaan,
            'jenis_usaha'           => $jenis_usaha,
            'nama_pemilik'          => $nama_pemilik,
            'alamat_pemilik'        => $alamat_pemilik,
            'nama_pengurus'         => $nama_pengurus,
            'alamat_pengurus'       => $alamat_pengurus,
            'tanggal_pendirian'     => $tanggal_pendirian,
            'tanggal_akte_pendirian'=> $tanggal_akte_pendirian,
            'nomor_pendirian'       => $no_pendirian,
            'tanggal_akte_perubahan'=> $tanggal_akte_perubahan,
            'nomor_perubahan'       => $no_perubahan,
            'no_siup'            => $no_siup,
            'no_tdp'             => $no_tdp,
            'no_npwp'            => $no_npwp,
            'no_kbli'            => $no_kbli,
            'no_bpjskes'         => $no_bpjskes,
            'no_bpjstk'             => $no_bpjstk,
            'pindah_perusahaan'     => $pindah_perusahaan,
            'alamat_lama'           => $alamat_lama,
            'ket_kantor'            => $ket_kantor,
            'kantor_cabang'         => $kantor_cabang,
            'status_kepemilikan'    => $kepemilikan,
            'status_permodalan'     => $permodalan,
            'kode_alamat'           => $kode_alamat,
            'tgl_lapor'             => $tgl_lapor,
            'tgl_kadaluarsa'        => $tgl_kadaluarsa
        );

        $data_alamat = array(
            'kode_alamat'   => $kode_alamat,
            'alamat'        => $alamat_perusahaan,
            'kecamatan'     => $kecamatan_perusahaan,
            'kelurahan'     => $kelurahan_perusahaan,
            'no_telpon'     => $telp_perusahaan
        );

        // TABLE WARGA NEGARA
        $l_dibawah_15_cpuh  = $this->input->post('l_dibawah_15_cpuh');
        $l_dibawah_15_cpubr = $this->input->post('l_dibawah_15_cpubr');
        $l_dibawah_15_cpubl = $this->input->post('l_dibawah_15_cpubl');
        $l_dibawah_15_hl    = $this->input->post('l_dibawah_15_hl');
        $l_dibawah_15_br    = $this->input->post('l_dibawah_15_br');
        $l_dibawah_15_kr    = $this->input->post('l_dibawah_15_kr');

        $p_dibawah_15_cpuh  = $this->input->post('p_dibawah_15_cpuh');
        $p_dibawah_15_cpubr = $this->input->post('p_dibawah_15_cpubr');
        $p_dibawah_15_cpubl = $this->input->post('p_dibawah_15_cpubl');
        $p_dibawah_15_hl    = $this->input->post('p_dibawah_15_hl');
        $p_dibawah_15_br    = $this->input->post('p_dibawah_15_br');
        $p_dibawah_15_kr    = $this->input->post('p_dibawah_15_kr');

        $l_dibawah_18_cpuh  = $this->input->post('l_dibawah_18_cpuh');
        $l_dibawah_18_cpubr = $this->input->post('l_dibawah_18_cpubr');
        $l_dibawah_18_cpubl = $this->input->post('l_dibawah_18_cpubl');
        $l_dibawah_18_hl    = $this->input->post('l_dibawah_18_hl');
        $l_dibawah_18_br    = $this->input->post('l_dibawah_18_br');
        $l_dibawah_18_kr    = $this->input->post('l_dibawah_18_kr');

        $p_dibawah_18_cpuh  = $this->input->post('p_dibawah_18_cpuh');
        $p_dibawah_18_cpubr = $this->input->post('p_dibawah_18_cpubr');
        $p_dibawah_18_cpubl = $this->input->post('p_dibawah_18_cpubl');
        $p_dibawah_18_hl    = $this->input->post('p_dibawah_18_hl');
        $p_dibawah_18_br    = $this->input->post('p_dibawah_18_br');
        $p_dibawah_18_kr    = $this->input->post('p_dibawah_18_kr');

        $l_diatas_18_cpuh  = $this->input->post('l_diatas_18_cpuh');
        $l_diatas_18_cpubr = $this->input->post('l_diatas_18_cpubr');
        $l_diatas_18_cpubl = $this->input->post('l_diatas_18_cpubl');
        $l_diatas_18_hl    = $this->input->post('l_diatas_18_hl');
        $l_diatas_18_br    = $this->input->post('l_diatas_18_br');
        $l_diatas_18_kr    = $this->input->post('l_diatas_18_kr');

        $p_diatas_18_cpuh  = $this->input->post('p_diatas_18_cpuh');
        $p_diatas_18_cpubr = $this->input->post('p_diatas_18_cpubr');
        $p_diatas_18_cpubl = $this->input->post('p_diatas_18_cpubl');
        $p_diatas_18_hl    = $this->input->post('p_diatas_18_hl');
        $p_diatas_18_br    = $this->input->post('p_diatas_18_br');
        $p_diatas_18_kr    = $this->input->post('p_diatas_18_kr');

        $l_wna_cpuh  = $this->input->post('l_wna_cpuh');
        $l_wna_cpubr = $this->input->post('l_wna_cpubr');
        $l_wna_cpubl = $this->input->post('l_wna_cpubl');
        $l_wna_hl    = $this->input->post('l_wna_hl');
        $l_wna_br    = $this->input->post('l_wna_br');
        $l_wna_kr    = $this->input->post('l_wna_kr');

        $p_wna_cpuh  = $this->input->post('p_wna_cpuh');
        $p_wna_cpubr = $this->input->post('p_wna_cpubr');
        $p_wna_cpubl = $this->input->post('p_wna_cpubl');
        $p_wna_hl    = $this->input->post('p_wna_hl');
        $p_wna_br    = $this->input->post('p_wna_br');
        $p_wna_kr    = $this->input->post('p_wna_kr');

        $total_wni_l    = $this->input->post('total_wni_l');
        $total_wni_p    = $this->input->post('total_wni_p');
        $total_wni      = $this->input->post('total_wni');
        $total_l_wna    = $this->input->post('total_l_wna');
        $total_p_wna    = $this->input->post('total_p_wna');
        $total_wna      = $this->input->post('total_wna'); 

        $data_wn = array(
            'l_dibawah_15_cpuh'  => $l_dibawah_15_cpuh,
            'l_dibawah_15_cpubr'  => $l_dibawah_15_cpubr,
            'l_dibawah_15_cpubl'  => $l_dibawah_15_cpubl,
            'l_dibawah_15_hl'  => $l_dibawah_15_hl,
            'l_dibawah_15_br'  => $l_dibawah_15_br,
            'l_dibawah_15_kr'  => $l_dibawah_15_kr,

            'p_dibawah_15_cpuh'  => $p_dibawah_15_cpuh,
            'p_dibawah_15_cpubr'  => $p_dibawah_15_cpubr,
            'p_dibawah_15_cpubl'  => $p_dibawah_15_cpubl,
            'p_dibawah_15_hl'  => $p_dibawah_15_hl,
            'p_dibawah_15_br'  => $p_dibawah_15_br,
            'p_dibawah_15_kr'  => $p_dibawah_15_kr,

            'l_dibawah_18_cpuh'  => $l_dibawah_18_cpuh,
            'l_dibawah_18_cpubr'  => $l_dibawah_18_cpubr,
            'l_dibawah_18_cpubl'  => $l_dibawah_18_cpubl,
            'l_dibawah_18_hl'  => $l_dibawah_18_hl,
            'l_dibawah_18_br'  => $l_dibawah_18_br,
            'l_dibawah_18_kr'  => $l_dibawah_18_kr,

            'p_dibawah_18_cpuh'  => $p_dibawah_18_cpuh,
            'p_dibawah_18_cpubr'  => $p_dibawah_18_cpubr,
            'p_dibawah_18_cpubl'  => $p_dibawah_18_cpubl,
            'p_dibawah_18_hl'  => $p_dibawah_18_hl,
            'p_dibawah_18_br'  => $p_dibawah_18_br,
            'p_dibawah_18_kr'  => $p_dibawah_18_kr,

            'l_diatas_18_cpuh'  => $l_diatas_18_cpuh,
            'l_diatas_18_cpubr'  => $l_diatas_18_cpubr,
            'l_diatas_18_cpubl'  => $l_diatas_18_cpubl,
            'l_diatas_18_hl'  => $l_diatas_18_hl,
            'l_diatas_18_br'  => $l_diatas_18_br,
            'l_diatas_18_kr'  => $l_diatas_18_kr,

            'p_diatas_18_cpuh'  => $p_diatas_18_cpuh,
            'p_diatas_18_cpubr'  => $p_diatas_18_cpubr,
            'p_diatas_18_cpubl'  => $p_diatas_18_cpubl,
            'p_diatas_18_hl'  => $p_diatas_18_hl,
            'p_diatas_18_br'  => $p_diatas_18_br,
            'p_diatas_18_kr'  => $p_diatas_18_kr,

            'l_wna_cpuh'  => $l_wna_cpuh,
            'l_wna_cpubr'  => $l_wna_cpubr,
            'l_wna_cpubl'  => $l_wna_cpubl,
            'l_wna_hl'  => $l_wna_hl,
            'l_wna_br'  => $l_wna_br,
            'l_wna_kr'  => $l_wna_kr,

            'p_wna_cpuh'  => $p_wna_cpuh,
            'p_wna_cpubr'  => $p_wna_cpubr,
            'p_wna_cpubl'  => $p_wna_cpubl,
            'p_wna_hl'  => $p_wna_hl,
            'p_wna_br'  => $p_wna_br,
            'p_wna_kr'  => $p_wna_kr,

            'total_wni_l'  => $total_wni_l,
            'total_wni_p'  => $total_wni_p,
            'total_wni'  => $total_wni,
            'total_l_wna'  => $total_l_wna,
            'total_p_wna'  => $total_p_wna,
            'total_wna'  => $total_wna, 
            'kode_wlkp'     => $kode_wlkp
        );

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
        $thr                = $this->input->post('thr');

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
            'thr'                   => $thr,
            'kode_wlkp'             => $kode_wlkp
        );
        
        // TABLE BPJS
        $tanggal_mulai      =$this->input->post('tanggal_mulai');
        $no_daftar_bpjs     =$this->input->post('no_daftar_bpjs');
        $peserta_tk         =$this->input->post('peserta_tk');
        $peserta_kel        =$this->input->post('peserta_kel');
        $jaminan_kecelakaan =$this->input->post('jaminan_kecelakaan');
        $jaminan_kematian   =$this->input->post('jaminan_kematian');
        $jaminan_haritua    =$this->input->post('jaminan_haritua');
        $jaminan_pensiun    =$this->input->post('jaminan_pensiun');

        $data_bpjs = array(
            'tanggal_mulai'         => $tanggal_mulai,
            'no_daftar_bpjs'        => $no_daftar_bpjs,
            'peserta_tk'            => $peserta_tk,
            'peserta_keluarga'      => $peserta_kel,
            'jaminan_kecelakaan'    => $jaminan_kecelakaan,
            'jaminan_kematian'      => $jaminan_kematian,
            'jaminan_haritua'       => $jaminan_haritua,
            'jaminan_pensiun'       => $jaminan_pensiun,
            'kode_wlkp'             => $kode_wlkp
        );

        // TABLE PEMAGANGAN
        $kebutuhan_magang   =$this->input->post('kebutuhan_magang');
        $jmlh_peserta       =$this->input->post('peserta_magang');
        $standarisasi       =$this->input->post('standarisasi');
        $skema              =$this->input->post('skema');
        $P1                 =$this->input->post('P1');
        $P2                 =$this->input->post('P2');
        $P3                 =$this->input->post('P3');
        $lsp_nama           =$this->input->post('lsp_nama');
        $penempatan         =$this->input->post('penempatan');

        $data_magang = array(
            'kebutuhan_magang'  => $kebutuhan_magang,
            'jmlh_peserta'      => $jmlh_peserta,
            'standarisasi'      => $standarisasi,
            'skema'             => $skema,
            'lsp_p1'            => $P1,
            'lsp_p2'            => $P2,
            'lsp_p3'            => $P3,
            'lsp_nama'          => $lsp_nama,
            'penempatan'        => $penempatan,
            'kode_wlkp'         => $kode_wlkp
        );

        // TABLE RENCANA TENAGA KERJA TIPE 1
        $rencana_pekerja_l  = $this->input->post('rencana_pekerja_l');
        $rencana_pekerja_p  = $this->input->post('rencana_pekerja_p');
        $jumlah_pekerja     = $rencana_pekerja_l + $rencana_pekerja_p;
        $pendidikan         = $this->input->post('pendidikan');
        $kualifikasi        = $this->input->post('kualifikasi');
        $jabatan            = $this->input->post('jabatan');

        $array = count($this->input->post('rencana_pekerja_l'));
        for($i = 0; $i < $array; $i++) {
            $data = array (
                'rencana_pekerja_l'    => $_POST['rencana_pekerja_l'][$i],
                'rencana_pekerja_p'    => $_POST['rencana_pekerja_p'][$i],
                'jumlah_pekerja'       => $_POST['rencana_pekerja_l'][$i] + $_POST['rencana_pekerja_p'][$i],
                'pendidikan'           => $_POST['pendidikan'][$i],
                'kualifikasi'          => $_POST['kualifikasi'][$i],
                'jabatan'              => $_POST['jabatan'][$i],
                'kode_wlkp'            => $kode_wlkp
            );
            $this->db->insert("table_rencana_butuh_tk", $data);
        }

        // TABLE RENCANA TENAGA KERJA TIPE 2
        $pekerja_l_terakhir     = $this->input->post('pekerja_l_terakhir');
        $pekerja_p_terakhir     = $this->input->post('pekerja_p_terakhir');
        $jumlah_sdm             = $pekerja_l_terakhir + $pekerja_p_terakhir;
        $pendidikan_terakhir    = $this->input->post('pendidikan_terakhir');
        $kualifikasi_terakhir   = $this->input->post('kualifikasi_terakhir');
        $jabatan_terakhir       = $this->input->post('jabatan_terakhir');

        $arrays = count($this->input->post('pekerja_l_terakhir'));
        for($j = 0; $j < $arrays; $j++) {
            $datas = array (
                'pekerja_l_terakhir'    => $_POST['pekerja_l_terakhir'][$j],
                'pekerja_p_terakhir'    => $_POST['pekerja_p_terakhir'][$j],
                'jumlah_sdm'            => $_POST['pekerja_l_terakhir'][$j] + $_POST['pekerja_p_terakhir'][$j],
                'pendidikan_terakhir'   => $_POST['pendidikan_terakhir'][$j],
                'kualifikasi_terakhir'  => $_POST['kualifikasi_terakhir'][$j],
                'jabatan_terakhir'      => $_POST['jabatan_terakhir'][$j],
                'kode_wlkp'             => $kode_wlkp
            );
            $this->db->insert("table_rencana_tk_terakhir", $datas);
        }

        // TABLE PENGESAHAN
        $tempat_pengesahan  = $this->input->post('tempat_pengesahan');
        $tgl_pengesahan     = $this->input->post('tgl_pengesahan');
        $nama_pengesah      = $this->input->post('nama_pengesah');
        $nip                = $this->input->post('nip');

        $data_pengesahan = array(
            'nip'                   => $nip,
            'nama_pengesah'         => $nama_pengesah,
            'tanggal_pengesahan'    => $tgl_pengesahan,
            'tempat_pengesahan'     => $tempat_pengesahan,
            'kode_wlkp'             => $kode_wlkp
        );

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

        // TABLE INDUSTRIAL
        $phk_pk         = $this->input->post('phk_pk');
        $phk_pp         = $this->input->post('phk_pp');
        $phk_pkb        = $this->input->post('phk_pkb');
        $pok_bipartit   = $this->input->post('pok_bipartit');
        $pok_sptp       = $this->input->post('pok_sptp');
        $pok_uksp       = $this->input->post('pok_uksp');
        $pok_p2k3       = $this->input->post('pok_p2k3');
        $pok_apindo     = $this->input->post('pok_apindo');
        $pok_kadin      = $this->input->post('pok_kadin');

        $data_industrial = array(
            'phk_pk'        => $phk_pk,
            'phk_pp'        => $phk_pp,
            'phk_pkb'       => $phk_pkb,
            'pok_bipartit'  => $pok_bipartit,
            'pok_sptp'      => $pok_sptp,
            'pok_uksp'      => $pok_uksp,
            'pok_p2k3'      => $pok_p2k3,
            'pok_apindo'    => $pok_apindo,
            'pok_kadin'     => $pok_kadin,
            'kode_wlkp'     => $kode_wlkp
        );

        $this->db->insert("table_wlkp_perusahaan", $data_wlkp);
        $this->db->insert("table_alamat", $data_alamat);
        $this->db->insert("table_warga_negara", $data_wn);
        $this->db->insert("table_ketenagakerjaan", $data_tenagakerja);
        $this->db->insert("table_bpjs", $data_bpjs);
        $this->db->insert("table_pemagangan", $data_magang);
        // $this->db->insert("table_rencana_butuh_tk", $data_rencana_tk_1);
        // $this->db->insert("table_rencana_tk_terakhir", $data_rencana_tk_2);
        $this->db->insert("table_pengesahan", $data_pengesahan);
        $this->db->insert("table_alat_bahan", $data_alat_bahan);
        $this->db->insert("table_fasilitas", $data_fasilitas);
        $this->db->insert("table_industrial", $data_industrial);

        $this->session->set_flashdata("globalmsg", "Money Box Successfully Added!");

        //redirect
        redirect('Admin/wlkp_perusahaan');
    }

    // FUNCTION UPDATE WLKP PERUSAHAAN 
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
        $alamat_pemilik         = $this->input->post('alamat_pemilik');
        $nama_pengurus          = $this->input->post('nama_pengurus');
        $alamat_pengurus        = $this->input->post('alamat_pengurus');
        $tanggal_pendirian      = $this->input->post('tanggal_pendirian');
        $tanggal_akte_pendirian = $this->input->post('tanggal_akte_pendirian');
        $no_pendirian           = $this->input->post('no_pendirian');
        $tanggal_akte_perubahan = $this->input->post('tanggal_akte_perubahan');
        $no_perubahan           = $this->input->post('no_perubahan');
        $no_siup                = $this->input->post('no_siup');
        $no_tdp                 = $this->input->post('no_tdp');
        $no_npwp                = $this->input->post('no_npwp');
        $no_kbli                = $this->input->post('no_kbli');
        $no_bpjskes             = $this->input->post('no_bpjskes');
        $no_bpjstk              = $this->input->post('no_bpjstk');
        $pindah_perusahaan      = $this->input->post('pindah_perusahaan');
        $alamat_lama            = $this->input->post('alamat_lama');
        $ket_kantor             = $this->input->post('ket_kantor');
        $kantor_cabang          = $this->input->post('kantor_cabang');
        $kepemilikan            = $this->input->post('kepemilikan');
        $permodalan             = $this->input->post('permodalan');
        $tgl_lapor              = $this->input->post('tgl_lapor');
        $tgl_kadaluarsa         = date('Y-m-d', strtotime('+1 year', strtotime($tgl_lapor)));

        $data_wlkp = array(
            'nama_perusahaan'       => $nama_perusahaan,
            'jenis_usaha'           => $jenis_usaha,
            'nama_pemilik'          => $nama_pemilik,
            'alamat_pemilik'        => $alamat_pemilik,
            'nama_pengurus'         => $nama_pengurus,
            'alamat_pengurus'       => $alamat_pengurus,
            'tanggal_pendirian'     => $tanggal_pendirian,
            'tanggal_akte_pendirian'=> $tanggal_akte_pendirian,
            'nomor_pendirian'       => $no_pendirian,
            'tanggal_akte_perubahan'=> $tanggal_akte_perubahan,
            'nomor_perubahan'       => $no_perubahan,
            'no_siup'               => $no_siup,
            'no_tdp'                => $no_tdp,
            'no_npwp'               => $no_npwp,
            'no_kbli'               => $no_kbli,
            'no_bpjskes'            => $no_bpjskes,
            'no_bpjstk'             => $no_bpjstk,
            'pindah_perusahaan'     => $pindah_perusahaan,
            'alamat_lama'           => $alamat_lama,
            'ket_kantor'            => $ket_kantor,
            'kantor_cabang'         => $kantor_cabang,
            'status_kepemilikan'    => $kepemilikan,
            'status_permodalan'     => $permodalan,
            'kode_alamat'           => $kode_alamat,
            'tgl_lapor'             => $tgl_lapor,
            'tgl_kadaluarsa'        => $tgl_kadaluarsa
        );

        $data_alamat = array(
            'alamat'        => $alamat_perusahaan,
            'kecamatan'     => $kecamatan_perusahaan,
            'kelurahan'     => $kelurahan_perusahaan,
            'no_telpon'     => $telp_perusahaan
        );

        // TABLE WARGA NEGARA
        $l_dibawah_15_cpuh  = $this->input->post('l_dibawah_15_cpuh');
        $l_dibawah_15_cpubr = $this->input->post('l_dibawah_15_cpubr');
        $l_dibawah_15_cpubl = $this->input->post('l_dibawah_15_cpubl');
        $l_dibawah_15_hl    = $this->input->post('l_dibawah_15_hl');
        $l_dibawah_15_br    = $this->input->post('l_dibawah_15_br');
        $l_dibawah_15_kr    = $this->input->post('l_dibawah_15_kr');

        $p_dibawah_15_cpuh  = $this->input->post('p_dibawah_15_cpuh');
        $p_dibawah_15_cpubr = $this->input->post('p_dibawah_15_cpubr');
        $p_dibawah_15_cpubl = $this->input->post('p_dibawah_15_cpubl');
        $p_dibawah_15_hl    = $this->input->post('p_dibawah_15_hl');
        $p_dibawah_15_br    = $this->input->post('p_dibawah_15_br');
        $p_dibawah_15_kr    = $this->input->post('p_dibawah_15_kr');

        $l_dibawah_18_cpuh  = $this->input->post('l_dibawah_18_cpuh');
        $l_dibawah_18_cpubr = $this->input->post('l_dibawah_18_cpubr');
        $l_dibawah_18_cpubl = $this->input->post('l_dibawah_18_cpubl');
        $l_dibawah_18_hl    = $this->input->post('l_dibawah_18_hl');
        $l_dibawah_18_br    = $this->input->post('l_dibawah_18_br');
        $l_dibawah_18_kr    = $this->input->post('l_dibawah_18_kr');

        $p_dibawah_18_cpuh  = $this->input->post('p_dibawah_18_cpuh');
        $p_dibawah_18_cpubr = $this->input->post('p_dibawah_18_cpubr');
        $p_dibawah_18_cpubl = $this->input->post('p_dibawah_18_cpubl');
        $p_dibawah_18_hl    = $this->input->post('p_dibawah_18_hl');
        $p_dibawah_18_br    = $this->input->post('p_dibawah_18_br');
        $p_dibawah_18_kr    = $this->input->post('p_dibawah_18_kr');

        $l_diatas_18_cpuh  = $this->input->post('l_diatas_18_cpuh');
        $l_diatas_18_cpubr = $this->input->post('l_diatas_18_cpubr');
        $l_diatas_18_cpubl = $this->input->post('l_diatas_18_cpubl');
        $l_diatas_18_hl    = $this->input->post('l_diatas_18_hl');
        $l_diatas_18_br    = $this->input->post('l_diatas_18_br');
        $l_diatas_18_kr    = $this->input->post('l_diatas_18_kr');

        $p_diatas_18_cpuh  = $this->input->post('p_diatas_18_cpuh');
        $p_diatas_18_cpubr = $this->input->post('p_diatas_18_cpubr');
        $p_diatas_18_cpubl = $this->input->post('p_diatas_18_cpubl');
        $p_diatas_18_hl    = $this->input->post('p_diatas_18_hl');
        $p_diatas_18_br    = $this->input->post('p_diatas_18_br');
        $p_diatas_18_kr    = $this->input->post('p_diatas_18_kr');

        $l_wna_cpuh  = $this->input->post('l_wna_cpuh');
        $l_wna_cpubr = $this->input->post('l_wna_cpubr');
        $l_wna_cpubl = $this->input->post('l_wna_cpubl');
        $l_wna_hl    = $this->input->post('l_wna_hl');
        $l_wna_br    = $this->input->post('l_wna_br');
        $l_wna_kr    = $this->input->post('l_wna_kr');

        $p_wna_cpuh  = $this->input->post('p_wna_cpuh');
        $p_wna_cpubr = $this->input->post('p_wna_cpubr');
        $p_wna_cpubl = $this->input->post('p_wna_cpubl');
        $p_wna_hl    = $this->input->post('p_wna_hl');
        $p_wna_br    = $this->input->post('p_wna_br');
        $p_wna_kr    = $this->input->post('p_wna_kr');

        $total_wni_l    = $this->input->post('total_wni_l');
        $total_wni_p    = $this->input->post('total_wni_p');
        $total_wni      = $this->input->post('total_wni');
        $total_l_wna    = $this->input->post('total_l_wna');
        $total_p_wna    = $this->input->post('total_p_wna');
        $total_wna      = $this->input->post('total_wna'); 

        $data_wn = array(
            'l_dibawah_15_cpuh'     => $l_dibawah_15_cpuh,
            'l_dibawah_15_cpubr'    => $l_dibawah_15_cpubr,
            'l_dibawah_15_cpubl'    => $l_dibawah_15_cpubl,
            'l_dibawah_15_hl'       => $l_dibawah_15_hl,
            'l_dibawah_15_br'       => $l_dibawah_15_br,
            'l_dibawah_15_kr'       => $l_dibawah_15_kr,

            'p_dibawah_15_cpuh'     => $p_dibawah_15_cpuh,
            'p_dibawah_15_cpubr'    => $p_dibawah_15_cpubr,
            'p_dibawah_15_cpubl'    => $p_dibawah_15_cpubl,
            'p_dibawah_15_hl'       => $p_dibawah_15_hl,
            'p_dibawah_15_br'       => $p_dibawah_15_br,
            'p_dibawah_15_kr'       => $p_dibawah_15_kr,

            'l_dibawah_18_cpuh'     => $l_dibawah_18_cpuh,
            'l_dibawah_18_cpubr'    => $l_dibawah_18_cpubr,
            'l_dibawah_18_cpubl'    => $l_dibawah_18_cpubl,
            'l_dibawah_18_hl'       => $l_dibawah_18_hl,
            'l_dibawah_18_br'       => $l_dibawah_18_br,
            'l_dibawah_18_kr'       => $l_dibawah_18_kr,

            'p_dibawah_18_cpuh'     => $p_dibawah_18_cpuh,
            'p_dibawah_18_cpubr'    => $p_dibawah_18_cpubr,
            'p_dibawah_18_cpubl'    => $p_dibawah_18_cpubl,
            'p_dibawah_18_hl'       => $p_dibawah_18_hl,
            'p_dibawah_18_br'       => $p_dibawah_18_br,
            'p_dibawah_18_kr'       => $p_dibawah_18_kr,

            'l_diatas_18_cpuh'  => $l_diatas_18_cpuh,
            'l_diatas_18_cpubr' => $l_diatas_18_cpubr,
            'l_diatas_18_cpubl' => $l_diatas_18_cpubl,
            'l_diatas_18_hl'    => $l_diatas_18_hl,
            'l_diatas_18_br'    => $l_diatas_18_br,
            'l_diatas_18_kr'    => $l_diatas_18_kr,

            'p_diatas_18_cpuh'  => $p_diatas_18_cpuh,
            'p_diatas_18_cpubr' => $p_diatas_18_cpubr,
            'p_diatas_18_cpubl' => $p_diatas_18_cpubl,
            'p_diatas_18_hl'    => $p_diatas_18_hl,
            'p_diatas_18_br'    => $p_diatas_18_br,
            'p_diatas_18_kr'    => $p_diatas_18_kr,

            'l_wna_cpuh'    => $l_wna_cpuh,
            'l_wna_cpubr'   => $l_wna_cpubr,
            'l_wna_cpubl'   => $l_wna_cpubl,
            'l_wna_hl'      => $l_wna_hl,
            'l_wna_br'      => $l_wna_br,
            'l_wna_kr'      => $l_wna_kr,

            'p_wna_cpuh'    => $p_wna_cpuh,
            'p_wna_cpubr'   => $p_wna_cpubr,
            'p_wna_cpubl'   => $p_wna_cpubl,
            'p_wna_hl'      => $p_wna_hl,
            'p_wna_br'      => $p_wna_br,
            'p_wna_kr'      => $p_wna_kr,

            'total_wni_l'   => $total_wni_l,
            'total_wni_p'   => $total_wni_p,
            'total_wni'     => $total_wni,
            'total_l_wna'   => $total_l_wna,
            'total_p_wna'   => $total_p_wna,
            'total_wna'     => $total_wna
        );

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
        $thr                = $this->input->post('thr');

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
            'thr'                   => $thr
        );
        
        // TABLE BPJS
        $tanggal_mulai      =$this->input->post('tanggal_mulai');
        $no_daftar_bpjs     =$this->input->post('no_daftar_bpjs');
        $peserta_tk         =$this->input->post('peserta_tk');
        $peserta_kel        =$this->input->post('peserta_kel');
        $jaminan_kecelakaan =$this->input->post('jaminan_kecelakaan');
        $jaminan_kematian   =$this->input->post('jaminan_kematian');
        $jaminan_haritua    =$this->input->post('jaminan_haritua');
        $jaminan_pensiun    =$this->input->post('jaminan_pensiun');

        $data_bpjs = array(
            'tanggal_mulai'         => $tanggal_mulai,
            'no_daftar_bpjs'        => $no_daftar_bpjs,
            'peserta_tk'            => $peserta_tk,
            'peserta_keluarga'      => $peserta_kel,
            'jaminan_kecelakaan'    => $jaminan_kecelakaan,
            'jaminan_kematian'      => $jaminan_kematian,
            'jaminan_haritua'       => $jaminan_haritua,
            'jaminan_pensiun'       => $jaminan_pensiun
        );

        // TABLE PEMAGANGAN
        $kebutuhan_magang   =$this->input->post('kebutuhan_magang');
        $jmlh_peserta       =$this->input->post('peserta_magang');
        $standarisasi       =$this->input->post('standarisasi');
        $skema              =$this->input->post('skema');
        $P1                 =$this->input->post('P1');
        $P2                 =$this->input->post('P2');
        $P3                 =$this->input->post('P3');
        $lsp_nama           =$this->input->post('lsp_nama');
        $penempatan         =$this->input->post('penempatan');

        $data_magang = array(
            'kebutuhan_magang'  => $kebutuhan_magang,
            'jmlh_peserta'      => $jmlh_peserta,
            'standarisasi'      => $standarisasi,
            'skema'             => $skema,
            'lsp_p1'            => $P1,
            'lsp_p2'            => $P2,
            'lsp_p3'            => $P3,
            'lsp_nama'          => $lsp_nama,
            'penempatan'        => $penempatan
        );

        // TABLE RENCANA TENAGA KERJA TIPE 1
        $rencana_pekerja_l  = $this->input->post('rencana_pekerja_l');
        $rencana_pekerja_p  = $this->input->post('rencana_pekerja_p');
        $jumlah_pekerja     = $rencana_pekerja_l + $rencana_pekerja_p;
        $pendidikan         = $this->input->post('pendidikan');
        $kualifikasi        = $this->input->post('kualifikasi');
        $jabatan            = $this->input->post('jabatan');

        $array = count($this->input->post('rencana_pekerja_l'));
        for($i = 0; $i < $array; $i++) {
            $data_butuh = array (
                'rencana_pekerja_l'    => $_POST['rencana_pekerja_l'][$i],
                'rencana_pekerja_p'    => $_POST['rencana_pekerja_p'][$i],
                'jumlah_pekerja'       => $_POST['rencana_pekerja_l'][$i] + $_POST['rencana_pekerja_p'][$i],
                'pendidikan'           => $_POST['pendidikan'][$i],
                'kualifikasi'          => $_POST['kualifikasi'][$i],
                'jabatan'              => $_POST['jabatan'][$i]
            );
            $this->db->where('kode_wlkp', $kode_wlkp);
            $this->db->update('table_rencana_butuh_tk', $data_butuh);
        }

        // TABLE RENCANA TENAGA KERJA TIPE 2
        $pekerja_l_terakhir     = $this->input->post('pekerja_l_terakhir');
        $pekerja_p_terakhir     = $this->input->post('pekerja_p_terakhir');
        $jumlah_sdm             = $pekerja_l_terakhir + $pekerja_p_terakhir;
        $pendidikan_terakhir    = $this->input->post('pendidikan_terakhir');
        $kualifikasi_terakhir   = $this->input->post('kualifikasi_terakhir');
        $jabatan_terakhir       = $this->input->post('jabatan_terakhir');

        $arrays = count($this->input->post('pekerja_l_terakhir'));
        for($j = 0; $j < $arrays; $j++) {
            $data_akhir = array (
                'pekerja_l_terakhir'    => $_POST['pekerja_l_terakhir'][$j],
                'pekerja_p_terakhir'    => $_POST['pekerja_p_terakhir'][$j],
                'jumlah_sdm'            => $_POST['pekerja_l_terakhir'][$j] + $_POST['pekerja_p_terakhir'][$j],
                'pendidikan_terakhir'   => $_POST['pendidikan_terakhir'][$j],
                'kualifikasi_terakhir'  => $_POST['kualifikasi_terakhir'][$j],
                'jabatan_terakhir'      => $_POST['jabatan_terakhir'][$j]
            );
            $this->db->where('kode_wlkp', $kode_wlkp);
            $this->db->update('table_rencana_tk_terakhir', $data_akhir);
        }

        // TABLE PENGESAHAN
        $tempat_pengesahan  = $this->input->post('tempat_pengesahan');
        $tgl_pengesahan     = $this->input->post('tgl_pengesahan');
        $nama_pengesah      = $this->input->post('nama_pengesah');
        $nip                = $this->input->post('nip');

        $data_pengesahan = array(
            'nip'                   => $nip,
            'nama_pengesah'         => $nama_pengesah,
            'tanggal_pengesahan'    => $tgl_pengesahan,
            'tempat_pengesahan'     => $tempat_pengesahan
        );

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

        // TABLE INDUSTRIAL
        $phk_pk         = $this->input->post('phk_pk');
        $phk_pp         = $this->input->post('phk_pp');
        $phk_pkb        = $this->input->post('phk_pkb');
        $pok_bipartit   = $this->input->post('pok_bipartit');
        $pok_sptp       = $this->input->post('pok_sptp');
        $pok_uksp       = $this->input->post('pok_uksp');
        $pok_p2k3       = $this->input->post('pok_p2k3');
        $pok_apindo     = $this->input->post('pok_apindo');
        $pok_kadin      = $this->input->post('pok_kadin');

        $data_industrial = array(
            'phk_pk'        => $phk_pk,
            'phk_pp'        => $phk_pp,
            'phk_pkb'       => $phk_pkb,
            'pok_bipartit'  => $pok_bipartit,
            'pok_sptp'      => $pok_sptp,
            'pok_uksp'      => $pok_uksp,
            'pok_p2k3'      => $pok_p2k3,
            'pok_apindo'    => $pok_apindo,
            'pok_kadin'     => $pok_kadin
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

        // Update BPJS
        $this->db->where('kode_wlkp', $kode_wlkp);
        $this->db->update('table_bpjs', $data_bpjs);

        // Update Pemagangan
        $this->db->where('kode_wlkp', $kode_wlkp);
        $this->db->update('table_pemagangan', $data_magang);

        // Update Pengesahan
        $this->db->where('kode_wlkp', $kode_wlkp);
        $this->db->update('table_pengesahan', $data_pengesahan);

        // Update Alat Bahan
        $this->db->where('kode_wlkp', $kode_wlkp);
        $this->db->update('table_alat_bahan', $data_alat_bahan);

        // Update Fasilitas
        $this->db->where('kode_wlkp', $kode_wlkp);
        $this->db->update('table_fasilitas', $data_fasilitas);

        // Update Fasilitas
        $this->db->where('kode_wlkp', $kode_wlkp);
        $this->db->update('table_industrial', $data_industrial);

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

    public function delete_rencana_butuh(){
        $id = $this->input->post('id_butuh');
        $butuh = $this->m_admin->delete_rencana_butuh($id);
        echo json_encode($butuh);
    }

    public function delete_rencana_akhir(){
        $id = $this->input->post('id_akhir');
        $akhir = $this->m_admin->delete_rencana_akhir($id);
        echo json_encode($akhir);
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
