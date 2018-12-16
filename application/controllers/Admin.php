<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->library('pdf');
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
            ->view('Admin/template/header', array(
                "title" => $title,
                "p_baru" => $jumlah_perusahaan['p_baru'],
                "p_terdaftar" => $jumlah_perusahaan['p_terdaftar'],
                "notif_perusahaan_baru" => $jumlah_perusahaan['notif_perusahaan_baru'],
                "detail_notifikasi" => $jumlah_perusahaan['detail_notifikasi'],
            ) , true) ,
            "css" => $this
            ->load
            ->view('Admin/template/main_css', false, true) ,
            "sidebar" => $this
            ->load
            ->view('Admin/template/sidebar', $jumlah_perusahaan, true) ,
            "js" => $this
            ->load
            ->view('Admin/template/main_js', false, true) ,
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
            ->view('Admin/index', $jumlah_perusahaan, true)
           );

        $this
        ->load
        ->view('Admin/template/admin_template', $data);
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
        // $pdf->Cell(50);
        // $pdf->Cell(15,6,1,1,0,'C');
        // $pdf->Cell(65,6,'PT. Y',1,0,'C');
        // $pdf->Cell(27,6,'Baru',1,0,'C');
        // $pdf->Cell(45,6,'KEP.568/01/PP/I/2018',1,0,'C');
        // $pdf->Cell(40,6,'1',1,1,'C');
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
        // $pdf->Cell(50);
        // $pdf->Cell(15,6,3,1,0,'C');
        // $pdf->Cell(65,6,'',1,0,'C');
        // $pdf->Cell(27,6,'',1,0,'C');
        // $pdf->Cell(45,6,'',1,0,'C');
        // $pdf->Cell(40,6,'',1,1,'C');
        // $pdf->Cell(50);
        // $pdf->Cell(15,6,4,1,0,'C');
        // $pdf->Cell(65,6,'',1,0,'C');
        // $pdf->Cell(27,6,'',1,0,'C');
        // $pdf->Cell(45,6,'',1,0,'C');
        // $pdf->Cell(40,6,'',1,1,'C');
        // $pdf->Cell(50);
        // $pdf->Cell(15,6,5,1,0,'C');
        // $pdf->Cell(65,6,'',1,0,'C');
        // $pdf->Cell(27,6,'',1,0,'C');
        // $pdf->Cell(45,6,'',1,0,'C');
        // $pdf->Cell(40,6,'',1,1,'C');
        // $pdf->Cell(50);
        // $pdf->Cell(15,6,6,1,0,'C');
        // $pdf->Cell(65,6,'',1,0,'C');
        // $pdf->Cell(27,6,'',1,0,'C');
        // $pdf->Cell(45,6,'',1,0,'C');
        // $pdf->Cell(40,6,'',1,1,'C');
        // $pdf->Cell(50);
        // $pdf->Cell(15,6,7,1,0,'C');
        // $pdf->Cell(65,6,'',1,0,'C');
        // $pdf->Cell(27,6,'',1,0,'C');
        // $pdf->Cell(45,6,'',1,0,'C');
        // $pdf->Cell(40,6,'',1,1,'C');
        // $pdf->Cell(50);
        // $pdf->Cell(15,6,8,1,0,'C');
        // $pdf->Cell(65,6,'',1,0,'C');
        // $pdf->Cell(27,6,'',1,0,'C');
        // $pdf->Cell(45,6,'',1,0,'C');
        // $pdf->Cell(40,6,'',1,1,'C');
        // $pdf->Cell(50);
        // $pdf->Cell(15,6,9,1,0,'C');
        // $pdf->Cell(65,6,'',1,0,'C');
        // $pdf->Cell(27,6,'',1,0,'C');
        // $pdf->Cell(45,6,'',1,0,'C');
        // $pdf->Cell(40,6,'',1,1,'C');
        // $pdf->Cell(50);
        // $pdf->Cell(15,6,10,1,0,'C');
        // $pdf->Cell(65,6,'',1,0,'C');
        // $pdf->Cell(27,6,'',1,0,'C');
        // $pdf->Cell(45,6,'',1,0,'C');
        // $pdf->Cell(40,6,'',1,1,'C');
        // $pdf->Ln();
        // $pdf->Ln();
        // $pdf->SetFont('Times','B',12);
        // $pdf->Cell(420,4,'KEPALA DINAS TENAGA KERJA',0,1,'C');
        // $pdf->Cell(420,7,'KOTA DEPOK',0,1,'C');
        // $pdf->Ln();
        // $pdf->Ln();
        // $pdf->Ln();
        // $pdf->SetFont('Times','BU',12);
        // $pdf->Cell(420,4,'DIAH SADIAH,S.Sos., M.Si.',0,1,'C');
        // $pdf->SetFont('Times','B',10);
        // $pdf->Cell(420,3,'NIP.196809131996032005',0,1,'C');
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
            ->view('Admin/userbaru', $perusahaan_baru, true)
        );
        $this
        ->load
        ->view('Admin/template/admin_template', $data);
    }

    // Terima User Baru
    public function terima(){
        $id    = $this->input->post("id"); 
        $email = $this->input->post("email");
        $nama = $this->input->post("nama");
        $this->load->library('smtp','phpmailer');

        $mail = new PHPMailer();
        $akunadmin = $this->db->query("SELECT * FROM table_email where id_email='1' ")->result();
        $email_admin = $akunadmin[0]->email;
        $nama_admin = $akunadmin[0]->nama;
        $password_admin = $akunadmin[0]->password;
        $mail->IsSMTP();  
        $mail->SMTPKeepAlive = true;
        $mail->Charset  = 'UTF-8';
        $mail->IsHTML(true);
        $mail->SMTPAuth = true;
        $mail->Port = 587; 
        $mail->Host     = 'ssl://smtp.gmail.com';
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

        $message = $this->load->view('Admin/template/email', $mail_data, TRUE);
        $mail->Body = $message;

        if ($mail->send()) {
            $perusahaan = $this
                        ->m_admin
                        ->terima($id);
        
            $this->session->set_flashdata('notif', '<div class="alert alert-success alert-dismissible"> 
            Success! Perusahaan Diterima.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
            redirect('Admin/userbaru');
        } else {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }        
    }

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
            redirect('Admin/userbaru');

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
            redirect('Admin/perusahaan');

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
            ->view('Admin/mail_setting', $perusahaan, true)
        );
        $this
        ->load
        ->view('Admin/template/admin_template', $data);
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
                redirect('Admin/setting_email', 'refresh');
            }else{
                $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible"> 
            Error! Password Login Tidak Benar.
            <button type="button" class="close" data-dismiss="alert">&times</button>
                                                </div>');
                redirect('Admin/setting_email', 'refresh');
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
            ->view('Admin/perusahaan', $perusahaan, true)
        );
        $this
        ->load
        ->view('Admin/template/admin_template', $data);
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
            ->view('Admin/perusahaan_detail', $perusahaan, true)
        );
        $this
        ->load
        ->view('Admin/template/admin_template', $data);
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
            ->view('Admin/rekap_pp', $rekap_pp, true)
        );
        $this
        ->load
        ->view('Admin/template/admin_template', $data);
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
            ->view('Admin/rekap_pkb', $rekap_pkb, true)
        );
        $this
        ->load
        ->view('Admin/template/admin_template', $data);
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
            ->view('Admin/rekap_k3', $rekap_k3, true)
        );
        $this
        ->load
        ->view('Admin/template/admin_template', $data);
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
            ->view('Admin/rekap_lks', $rekap_lks, true)
        );
        $this
        ->load
        ->view('Admin/template/admin_template', $data);
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
            ->view('Admin/rekap_wlkp', $rekap_wlkp, true)
        );
        $this
        ->load
        ->view('Admin/template/admin_template', $data);
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
                if (!empty($input['status'])) {
                    $this->db->where('k3.status = ', $input['status']);
                }
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
                $this
                ->load
                ->view('report/report_k3', $viewData);
        }

        public function report_lks()
        {
                $path = "";
                $input = $this->input->post();
                $this->db->select(' per.kode_perusahaan, per.nama_perusahaan, lks.no_registrasi, lks.no_dokumen, lks.status', false);
                $this->db->from('table_perusahaan as per');
                $this->db->join('table_lks as lks', 'per.kode_perusahaan = lks.kode_perusahaan');
                if (!empty($input['status'])) {
                    $this->db->where('lks.status = ', $input['status']);
                }
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
                $this
                ->load
                ->view('report/report_lks', $viewData);
        }

        public function report_pkb()
        {
                $path = "";
                $input = $this->input->post();
                $this->db->select(' per.kode_perusahaan, per.nama_perusahaan, pkb.no_registrasi, pkb.no_dokumen, pkb.status', false);
                $this->db->from('table_perusahaan as per');
                $this->db->join('table_pkb as pkb', 'per.kode_perusahaan = pkb.kode_perusahaan');
                if (!empty($input['status'])) {
                    $this->db->where('pkb.status = ', $input['status']);
                }
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
                $this
                ->load
                ->view('report/report_pkb', $viewData);
        }

        public function report_pp()
        {
                $path = "";
                $input = $this->input->post();
                $this->db->select(' per.kode_perusahaan, per.nama_perusahaan, pp.no_registrasi, pp.no_dokumen, pp.status', false);
                $this->db->from('table_perusahaan as per');
                $this->db->join('table_pp as pp', 'per.kode_perusahaan = pp.kode_perusahaan');
                if (!empty($input['status'])) {
                    $this->db->where('pp.status = ', $input['status']);
                }
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
                 var_dump($groups);
                $total = count($array_pp);
                                
                $viewData = array(
                    'data_pp' => $data_pp,
                    'total' => $groups,
                );
                $this
                ->load
                ->view('report/report_pp', $viewData);
        }

        public function report_wlkp()
        {
                $path = "";
                $input = $this->input->post();
                $this->db->select(' per.kode_perusahaan, per.nama_perusahaan, wlkp.no_registrasi, wlkp.no_dokumen, wlkp.status', false);
                $this->db->from('table_perusahaan as per');
                $this->db->join('table_wlkp as wlkp', 'per.kode_perusahaan = wlkp.kode_perusahaan');
                if (!empty($input['status'])) {
                    $this->db->where('wlkp.status = ', $input['status']);
                }
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
                $this
                ->load
                ->view('report/report_wlkp', $viewData);
        }
}

?>