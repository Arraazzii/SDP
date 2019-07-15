<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class m_admin extends CI_Model {

	var $table = 'table_pp';
    var $table1 = 'table_perusahaan';
    var $column_order = array('status',null); //set column field database for datatable orderable
    var $column_search = array('table_pp.id','nama_perusahaan','no_registrasi','status'); //set column field database for datatable searchable just firstname , lastname , address are searchable
    var $order = array('table_pp.id' => 'asc'); // default order

	function __construct()
	{
		parent::__construct();
        $this->load->database();
	}

	   function getRows($params = array(), $kode_perusahaan){
        $this->db->select('*');
        $this->db->from('table_perusahaan');
        $this->db->where('kode_perusahaan','PER001');
        if(array_key_exists('kode_perusahaan',$params) && !empty($params['kode_perusahaan'])){
            $this->db->where('kode_perusahaan',$params['kode_perusahaan']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }

    // Tampil Email
	public function email_setting(){
		$query = $this->db->query("SELECT * FROM table_email order by id_email DESC ");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	// Tampil Jumlah Perusahaan Baru
	public function tampil_jumlah_perusahaan_baru(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_login ON table_perusahaan.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'belum'");
		$row = $query->num_rows();
		return $row;
	}

	// Tampil Jumlah Perusahaan Baru (Notifikasi)
	public function tampil_notifikasi_perusahaan_baru(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_login ON table_perusahaan.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'belum' AND table_perusahaan.notif = '0' ");
		$row = $query->num_rows();
		return $row;
	}

	// Tampil Detail Perusahaan Baru (Notifikasi)
	public function tampil_detail_notifikasi_perusahaan_baru(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_login ON table_perusahaan.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'belum' AND table_perusahaan.notif = '0' ");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	// Tampil Jumlah Perusahaan Terdaftar
	public function tampil_jumlah_perusahaan_terdaftar(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_login ON table_perusahaan.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah'");
		$row = $query->num_rows();
		return $row;
	}

	// Tampil Jumlah Perusahaan Blacklist
	public function tampil_jumlah_perusahaan_blacklist(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_login ON table_perusahaan.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'blokir'");
		$row = $query->num_rows();
		return $row;
	}

	// Tampil Jumlah Pengurus Perusahaan
	public function jumlah_pengurus_perusahaan(){
		$query = $this->db->query("SELECT nama, (SELECT COUNT(table_pengurus.nama) FROM table_pengurus JOIN table_perusahaan ON table_perusahaan.kode_perusahaan = table_pengurus.kode_perusahaan JOIN table_login ON table_login.kode_perusahaan = table_perusahaan.kode_perusahaan WHERE table_pengurus.nama = nama AND table_login.status = 'sudah') AS jumlah FROM table_pengurus");
		return $query->num_rows();
	}

	// Tampil Data Perusahaan Baru
	public function perusahaan_baru(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_alamat ON table_perusahaan.kode_alamat = table_alamat.kode_alamat JOIN table_pengurus ON table_perusahaan.kode_perusahaan = table_pengurus.kode_perusahaan JOIN table_login ON table_perusahaan.kode_perusahaan = table_login.kode_perusahaan JOIN table_pp ON table_perusahaan.kode_perusahaan = table_pp.kode_perusahaan JOIN table_lks ON table_lks.kode_perusahaan = table_perusahaan.kode_perusahaan JOIN table_k3 ON table_k3.kode_perusahaan = table_perusahaan.kode_perusahaan JOIN table_pkb ON table_pkb.kode_perusahaan = table_perusahaan.kode_perusahaan JOIN table_wlkp ON table_wlkp.kode_perusahaan = table_perusahaan.kode_perusahaan LEFT JOIN table_klui ON table_perusahaan.kode_klui = table_klui.kode_klui WHERE table_login.status = 'belum' GROUP BY table_pengurus.kode_perusahaan");
		return $query;
	}

	// Detail Data Perusahaan Baru
	public function detail_perusahaan_baru(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_alamat ON table_perusahaan.kode_alamat = table_alamat.kode_alamat JOIN table_pengurus ON table_perusahaan.kode_perusahaan = table_pengurus.kode_perusahaan JOIN table_login ON table_perusahaan.kode_perusahaan = table_login.kode_perusahaan JOIN table_pp ON table_perusahaan.kode_perusahaan = table_pp.kode_perusahaan JOIN table_lks ON table_lks.kode_perusahaan = table_perusahaan.kode_perusahaan JOIN table_k3 ON table_k3.kode_perusahaan = table_perusahaan.kode_perusahaan JOIN table_pkb ON table_pkb.kode_perusahaan = table_perusahaan.kode_perusahaan JOIN table_wlkp ON table_wlkp.kode_perusahaan = table_perusahaan.kode_perusahaan WHERE table_login.status = 'belum' GROUP BY table_pengurus.kode_perusahaan");
		return $query;
	}

	// Terima Perusahaan Baru
	public function terima($id){

		$login 	 	 = $this->db->query("Update table_login SET status = 'sudah' WHERE kode_perusahaan = '$id'");

		if($login){
			return true;
		}else{
			return false;
		}
	}

	// Tolak Perusahaan Baru
	public function tolak($kode){

		$login 	 	 = $this->db->query("Update table_login SET status = 'tolak' WHERE kode_perusahaan = '$kode'");

		if($login){
			return true;
		}else{
			return false;
		}
	}

	// Blokir Perusahaan Baru
	public function nonaktif($kode){

		$login 	 	 = $this->db->query("Update table_login SET status = 'blokir' WHERE kode_perusahaan = '$kode'");

		if ($login) {
			return true;
		} else {
			return false;
		}
	}

	public function email($id){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_login ON table_perusahaan.kode_perusahaan = table_login.kode_perusahaan WHERE table_perusahaan.kode_perusahaan = '$id'");
		return $query->result();
	}

	// Tampil Data Perusahaan
	public function data_perusahaan(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_alamat ON table_perusahaan.kode_alamat = table_alamat.kode_alamat JOIN table_pengurus ON table_perusahaan.kode_perusahaan = table_pengurus.kode_perusahaan JOIN table_login ON table_perusahaan.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' GROUP BY table_pengurus.kode_perusahaan");
		return $query->result();
	}

	// Tampil Detail Data Perusahaan
	public function detail_perusahaan($kode){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_alamat ON table_perusahaan.kode_alamat = table_alamat.kode_alamat JOIN table_pengurus ON table_perusahaan.kode_perusahaan = table_pengurus.kode_perusahaan JOIN table_pp ON table_perusahaan.kode_perusahaan = table_pp.kode_perusahaan JOIN table_wlkp ON table_perusahaan.kode_perusahaan = table_wlkp.kode_perusahaan JOIN table_pkb ON table_perusahaan.kode_perusahaan = table_pkb.kode_perusahaan JOIN table_k3 ON table_perusahaan.kode_perusahaan = table_k3.kode_perusahaan JOIN table_lks ON table_perusahaan.kode_perusahaan = table_lks.kode_perusahaan LEFT JOIN table_klui ON table_perusahaan.kode_klui = table_klui.kode_klui WHERE table_perusahaan.kode_perusahaan = '$kode' GROUP BY table_pengurus.kode_perusahaan ");
		return $query->result();
	}

	// Tampil Data WLKP Perusahaan
	public function data_wlkp_perusahaan(){
		$query = $this->db->query("SELECT * FROM table_wlkp_perusahaan JOIN table_alamat ON table_wlkp_perusahaan.kode_alamat = table_alamat.kode_alamat JOIN table_warga_negara ON table_wlkp_perusahaan.kode_wlkp = table_warga_negara.kode_wlkp JOIN table_ketenagakerjaan ON table_wlkp_perusahaan.kode_wlkp = table_ketenagakerjaan.kode_wlkp JOIN table_rencana_tenaga_kerja ON table_wlkp_perusahaan.kode_wlkp = table_rencana_tenaga_kerja.kode_wlkp JOIN table_pengesahan ON table_wlkp_perusahaan.kode_wlkp = table_pengesahan.kode_wlkp JOIN table_alat_bahan ON table_wlkp_perusahaan.kode_wlkp = table_alat_bahan.kode_wlkp JOIN table_fasilitas ON table_wlkp_perusahaan.kode_wlkp = table_fasilitas.kode_wlkp");
		return $query->result();
	}

	// Tampil Data WLKP Perusahaan
	public function detail_wlkp_perusahaan($kode){
		$query = $this->db->query("SELECT * FROM table_wlkp_perusahaan JOIN table_alamat ON table_wlkp_perusahaan.kode_alamat = table_alamat.kode_alamat JOIN table_warga_negara ON table_wlkp_perusahaan.kode_wlkp = table_warga_negara.kode_wlkp JOIN table_ketenagakerjaan ON table_wlkp_perusahaan.kode_wlkp = table_ketenagakerjaan.kode_wlkp JOIN table_pengesahan ON table_wlkp_perusahaan.kode_wlkp = table_pengesahan.kode_wlkp JOIN table_alat_bahan ON table_wlkp_perusahaan.kode_wlkp = table_alat_bahan.kode_wlkp JOIN table_fasilitas ON table_wlkp_perusahaan.kode_wlkp = table_fasilitas.kode_wlkp WHERE table_wlkp_perusahaan.kode_wlkp = '$kode'");
		return $query->result();
	}

	// Delete WLKP Perusahaan
	public function delete_wlkp($kode){

		$login 	 	 = $this->db->query("DELETE FROM table_wlkp_perusahaan WHERE kode_wlkp = '$kode'");

		if ($login) {
			return true;
		} else {
			return false;
		}
	}

	// Rekapitulasi K3
	public function rekap_k3(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_k3 ON table_perusahaan.kode_perusahaan = table_k3.kode_perusahaan");
		return $query->result();
	}

	// Rekapitulasi K3 Aktif
	public function rekap_k3_aktif(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_k3 ON table_perusahaan.kode_perusahaan = table_k3.kode_perusahaan JOIN table_login ON table_k3.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_k3.status = '0' OR table_k3.status = '1'");
		return $query->num_rows();
	}

	// Rekapitulasi K3 Perbarui
	public function rekap_k3_perbarui(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_k3 ON table_perusahaan.kode_perusahaan = table_k3.kode_perusahaan JOIN table_login ON table_k3.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_k3.status = ''");
		return $query->num_rows();
	}

	// Rekapitulasi K3 Kadaluarsa
	public function rekap_k3_kadaluarsa(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_k3 ON table_perusahaan.kode_perusahaan = table_k3.kode_perusahaan JOIN table_login ON table_k3.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_k3.status = '2'");
		return $query->num_rows();
	}

	// Rekapitulasi PKB
	public function rekap_pkb(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_pkb ON table_perusahaan.kode_perusahaan = table_pkb.kode_perusahaan");
		return $query->result();
	}

	// Rekapitulasi PKB Aktif
	public function rekap_pkb_aktif(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_pkb ON table_perusahaan.kode_perusahaan = table_pkb.kode_perusahaan JOIN table_login ON table_pkb.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_pkb.status = '0' OR table_pkb.status = '1'");
		return $query->num_rows();
	}

	// Rekapitulasi PKB Perbarui
	public function rekap_pkb_perbarui(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_pkb ON table_perusahaan.kode_perusahaan = table_pkb.kode_perusahaan JOIN table_login ON table_pkb.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_pkb.status = ''");
		return $query->num_rows();
	}

	// Rekapitulasi PKB Kadaluarsa
	public function rekap_pkb_kadaluarsa(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_pkb ON table_perusahaan.kode_perusahaan = table_pkb.kode_perusahaan JOIN table_login ON table_pkb.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_pkb.status = '2'");
		return $query->num_rows();
	}

	//Rekapitulasi LKS Bipartite
	public function rekap_lks(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_lks ON table_perusahaan.kode_perusahaan = table_lks.kode_perusahaan");
		return $query->result();
	}

	// Rekapitulasi LKS Bipartite Aktif
	public function rekap_lks_aktif(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_lks ON table_perusahaan.kode_perusahaan = table_lks.kode_perusahaan JOIN table_login ON table_lks.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_lks.status = '0' OR table_lks.status = '1'");
		return $query->num_rows();
	}

	// Rekapitulasi LKS Bipartite Perbarui
	public function rekap_lks_perbarui(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_lks ON table_perusahaan.kode_perusahaan = table_lks.kode_perusahaan JOIN table_login ON table_lks.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_lks.status = ''");
		return $query->num_rows();
	}

	// Rekapitulasi LKS Bipartite Kadaluarsa
	public function rekap_lks_kadaluarsa(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_lks ON table_perusahaan.kode_perusahaan = table_lks.kode_perusahaan JOIN table_login ON table_lks.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_lks.status = '2'");
		return $query->num_rows();
	}

	// Rekapitulasi PP
	public function rekap_pp(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_pp ON table_perusahaan.kode_perusahaan = table_pp.kode_perusahaan");
		return $query->result();
	}

	// Rekapitulasi PP Aktif
	public function rekap_pp_aktif(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_pp ON table_perusahaan.kode_perusahaan = table_pp.kode_perusahaan JOIN table_login ON table_pp.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_pp.status = '0' OR table_pp.status = '1'");
		return $query->num_rows();
	}

	// Rekapitulasi PP Perbarui
	public function rekap_pp_perbarui(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_pp ON table_perusahaan.kode_perusahaan = table_pp.kode_perusahaan JOIN table_login ON table_pp.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_pp.status = ''");
		return $query->num_rows();
	}

	// Rekapitulasi PP Kadaluarsa
	public function rekap_pp_kadaluarsa(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_pp ON table_perusahaan.kode_perusahaan = table_pp.kode_perusahaan JOIN table_login ON table_pp.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_pp.status = '2'");
		return $query->num_rows();
	}

	// Rekapitulasi WLKP
	public function rekap_wlkp(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_wlkp ON table_perusahaan.kode_perusahaan = table_wlkp.kode_perusahaan");
		return $query->result();
	}

	// Rekapitulasi WLKP Aktif
	public function rekap_wlkp_aktif(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_wlkp ON table_perusahaan.kode_perusahaan = table_wlkp.kode_perusahaan JOIN table_login ON table_wlkp.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_wlkp.status = '0' OR table_wlkp.status = '1'");
		return $query->num_rows();
	}

	// Rekapitulasi WLKP Perbarui
	public function rekap_wlkp_perbarui(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_wlkp ON table_perusahaan.kode_perusahaan = table_wlkp.kode_perusahaan JOIN table_login ON table_wlkp.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_wlkp.status = ''");
		return $query->num_rows();
	}

	// Rekapitulasi WLKP Kadaluarsa
	public function rekap_wlkp_kadaluarsa(){
		$query = $this->db->query("SELECT * FROM table_perusahaan JOIN table_wlkp ON table_perusahaan.kode_perusahaan = table_wlkp.kode_perusahaan JOIN table_login ON table_wlkp.kode_perusahaan = table_login.kode_perusahaan WHERE table_login.status = 'sudah' AND table_wlkp.status = '2'");
		return $query->num_rows();
	}

	private function _get_datatables_query()
	{
		//add custom filter here
		if($this->input->post('country'))
		{
			$this->db->where($this->table.'.status', $this->input->post('country'));
		}

		$this->db->from($this->table);
        $this->db->join($this->table1, $this->table1.'.kode_perusahaan ='.$this->table.'.kode_perusahaan');
		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_list_countries()
	{
		$query = $this->db->query("SELECT DISTINCT status FROM table_pp ORDER BY status ASC");
		$result = $query->result();

		$countries = array();
		foreach ($result as $row)
		{
			$countries[] = $row->status;
		}
		return $countries;
	}

	public function count_pp(){
		$table_pp = $this->db->query("SELECT count(status) as table_pp FROM table_pp")->result();
		$count_pp= array(
			$table_pp[0]->table_pp
		);
		return array_sum($count_pp);
		var_dump($count_pp);
	}

	public function count_table(){
		$table_pp = $this->db->query("SELECT count(status) as table_pp FROM table_pp")->result();
		$table_pkb = $this->db->query("SELECT count(notif) as notif_pkb FROM table_pkb WHERE kode_perusahaan='$kode_perusahaan' AND status='2' AND notif='0'")->result();
		$table_lks = $this->db->query("SELECT count(notif) as notif_lks FROM table_lks WHERE kode_perusahaan='$kode_perusahaan' AND status='2' AND notif='0'")->result();
		$table_k3 = $this->db->query("SELECT count(notif) as notif_k3 FROM table_k3 WHERE kode_perusahaan='$kode_perusahaan' AND status='2' AND notif='0'")->result();
		$table_wlkp = $this->db->query("SELECT count(notif) as notif_wlkp FROM table_wlkp WHERE kode_perusahaan='$kode_perusahaan' AND status='2' AND notif='0'")->result();
		$count_table= array(
			$table_pp[0]->table_pp,
			$table_pkb[0]->table_pkb,
			$table_wlkp[0]->table_wlkp,
			$table_k3[0]->table_k3,
			$table_lks[0]->table_lks,
		);
		return array_sum($count_table);
		var_dump($count_table);
	}

	public function update_kadaluarsa()
	{
	    $get_zone = date_default_timezone_set('Asia/Jakarta');
		$end = date('Y-m-d', strtotime('-1 years'));

		$query_pp = "SELECT * FROM table_pp WHERE tanggal_daftar <= '".$end."'";
		$data_pp = $this->db->query($query_pp)->result();
		foreach ($data_pp as $pp) {
			if (!empty($pp->nama_file)) {
				// code...
				if ($pp->status != 2) {
					$update = [
						'kode_perusahaan' => $pp->kode_perusahaan,
						'status' => '2',
					];

					$where = [
						'id' => $pp->id,
						'kode_perusahaan' => $pp->kode_perusahaan,
					];

					$this->db->where($where);
					$this->db->update('table_pp', $update);
				}
			}
		}
		$query_pkb = "SELECT * FROM table_pkb WHERE tanggal_daftar <= '".$end."'";
		$data_pkb = $this->db->query($query_pkb)->result();
		foreach ($data_pkb as $pkb) {
			if (!empty($pkb->nama_file)) {
				if ($pkb->status != 2) {
					$update = [
						'kode_perusahaan' => $pkb->kode_perusahaan,
						'status' => '2',
					];

					$where = [
						'id' => $pkb->id,
						'kode_perusahaan' => $pkb->kode_perusahaan,
					];

					$this->db->where($where);
					$this->db->update('table_pkb', $update);
				}
			}
		}

		$query_k3 = "SELECT * FROM table_k3 WHERE tanggal_daftar <= '".$end."'";
		$data_k3 = $this->db->query($query_k3)->result();
		foreach ($data_k3 as $k3) {
			if (!empty($k3->nama_file)) {
				if ($k3->status != 2) {
					$update = [
						'kode_perusahaan' => $k3->kode_perusahaan,
						'status' => '2',
					];

					$where = [
						'id' => $k3->id,
						'kode_perusahaan' => $k3->kode_perusahaan,
					];

					$this->db->where($where);
					$this->db->update('table_k3', $update);
				}
			}
		}

		$query_lks = "SELECT * FROM table_lks WHERE tanggal_daftar <= '".$end."'";
		$data_lks = $this->db->query($query_lks)->result();
		foreach ($data_lks as $lks) {
			if (!empty($lks->nama_file)) {
				if ($lks->status != 2) {
					$update = [
						'kode_perusahaan' => $lks->kode_perusahaan,
						'status' => '2',
					];

					$where = [
						'id' => $lks->id,
						'kode_perusahaan' => $lks->kode_perusahaan,
					];

					$this->db->where($where);
					$this->db->update('table_lks', $update);
				}
			}
		}

		$query_wlkp = "SELECT * FROM table_wlkp WHERE tanggal_daftar <= '".$end."'";
		$data_wlkp = $this->db->query($query_wlkp)->result();
		foreach ($data_wlkp as $wlkp) {
			if (!empty($wlkp->nama_file)) {
				if ($wlkp->status != 2) {
					$update = [
						'kode_perusahaan' => $wlkp->kode_perusahaan,
						'status' => '2',
					];

					$where = [
						'id' => $pp->id,
						'kode_perusahaan' => $wlkp->kode_perusahaan,
					];

					$this->db->where($where);
					$this->db->update('table_wlkp', $update);
				}
			}

		}
		$data = [
			'data_pp' => $data_pp,
			'data_pkb' => $data_pkb,
			'data_k3' => $data_k3,
			'data_lks' => $data_lks,
			'data_wlkp' => $data_wlkp,
		];

		return $data;
	}
}
