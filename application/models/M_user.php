<?php
class M_user extends CI_Model{

	//GET STATUS BERKAS PP
	public function get_status_pp($kode_perusahaan){
		$query = $this->db->query("SELECT status as status_pp FROM table_pp where kode_perusahaan='$kode_perusahaan' ORDER BY id DESC LIMIT 1");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}


	//GET STATUS BERKAS PKB
	public function get_status_pkb($kode_perusahaan){
		$query = $this->db->query("SELECT status as status_pkb FROM table_pkb where kode_perusahaan='$kode_perusahaan' ORDER BY id DESC LIMIT 1");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}


	//GET STATUS BERKAS LKS
	public function get_status_lks($kode_perusahaan){
		$query = $this->db->query("SELECT status as status_lks FROM table_lks where kode_perusahaan='$kode_perusahaan' ORDER BY id DESC LIMIT 1");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}


	//GET STATUS BERKAS K3
	public function get_status_k3($kode_perusahaan){
		$query = $this->db->query("SELECT status as status_k3 FROM table_k3 where kode_perusahaan='$kode_perusahaan' ORDER BY id DESC LIMIT 1");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}


	//GET STATUS BERKAS WLKP
	public function get_status_wlkp($kode_perusahaan){
		$query = $this->db->query("SELECT status as status_wlkp FROM table_wlkp where kode_perusahaan='$kode_perusahaan' ORDER BY id DESC LIMIT 1");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	//GET PERUSAHAAN SIMPLE
	public function get_data_perusahaan_samping($kode_perusahaan){
		$query=$this->db->query("SELECT nama_perusahaan, logo, deskripsi FROM table_perusahaan WHERE kode_perusahaan='$kode_perusahaan'");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	//GET PENGURUS PERUSAHAAN DETAIL DENGAN ALAMAT
	public function get_data_pengurus($kode_perusahaan){
		$query=$this->db->query("SELECT * FROM table_pengurus join table_alamat on table_pengurus.kode_alamat = table_alamat.kode_alamat WHERE table_pengurus.kode_perusahaan='$kode_perusahaan' ORDER BY table_pengurus.id DESC");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	//GET PERUSAHAAN DETAIL DENGAN ALAMAT
	public function get_data_perusahaan($kode_perusahaan){
		$query=$this->db->query("SELECT * FROM table_perusahaan join table_alamat on table_alamat.kode_alamat = table_perusahaan.kode_alamat WHERE table_perusahaan.kode_perusahaan='$kode_perusahaan'");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	//GET DETAIL BERKAS PP
	public function detail_pp($kode_perusahaan){
		$query = $this->db->query("SELECT * FROM table_history_pembaruan WHERE kode_perusahaan='$kode_perusahaan' AND type = 'pp' ORDER BY id DESC");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	public function get_pp($kode_perusahaan){
		$query = $this->db->query("SELECT * FROM table_pp where kode_perusahaan='$kode_perusahaan' ORDER BY id DESC LIMIT 1");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	//GET DETAIL BERKAS PKB
	public function detail_pkb($kode_perusahaan){
		$query = $this->db->query("SELECT * FROM table_history_pembaruan WHERE kode_perusahaan='$kode_perusahaan' AND type = 'pkb' ORDER BY id DESC");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	public function get_pkb($kode_perusahaan){
		$query = $this->db->query("SELECT * FROM table_pkb where kode_perusahaan='$kode_perusahaan' ORDER BY id DESC LIMIT 1");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	//GET DETAIL BERKAS LKS
	public function detail_lks($kode_perusahaan){
		$query = $this->db->query("SELECT * FROM table_history_pembaruan WHERE kode_perusahaan='$kode_perusahaan' AND type = 'lks' ORDER BY id DESC");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	public function get_lks($kode_perusahaan){
		$query = $this->db->query("SELECT * FROM table_lks where kode_perusahaan='$kode_perusahaan' ORDER BY id DESC LIMIT 1");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	//GET DETAIL BERKAS K3
	public function get_k3($kode_perusahaan){
		$query = $this->db->query("SELECT * FROM table_k3 where kode_perusahaan='$kode_perusahaan' ORDER BY id DESC LIMIT 1");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	public function detail_k3($kode_perusahaan){
		$query = $this->db->query("SELECT * FROM table_history_pembaruan WHERE kode_perusahaan='$kode_perusahaan' AND type = 'k3' ORDER BY id DESC");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	//GET DETAIL BERKAS WLKP
	public function detail_wlkp($kode_perusahaan){
		$query = $this->db->query("SELECT * FROM table_history_pembaruan WHERE kode_perusahaan='$kode_perusahaan' AND type = 'wlkp' ORDER BY id DESC");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	public function get_wlkp($kode_perusahaan){
		$query = $this->db->query("SELECT * FROM table_wlkp where kode_perusahaan='$kode_perusahaan' ORDER BY id DESC LIMIT 1");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

	//GET STATUS BERKAS PERUSAHAAN
	public function get_berkas_perusahaan($kode_perusahaan){
		$query = $this->db->query("SELECT siup, tdp, akte, hakim, domisili FROM table_perusahaan where kode_perusahaan='$kode_perusahaan'");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}
	public function count_notif_user($kode_perusahaan){
		$notif_pp = $this->db->query("SELECT count(notif) as notif_pp FROM table_pp WHERE kode_perusahaan='$kode_perusahaan' AND status='2' AND notif='0'")->result();
		$notif_pkb = $this->db->query("SELECT count(notif) as notif_pkb FROM table_pkb WHERE kode_perusahaan='$kode_perusahaan' AND status='2' AND notif='0'")->result();
		$notif_lks = $this->db->query("SELECT count(notif) as notif_lks FROM table_lks WHERE kode_perusahaan='$kode_perusahaan' AND status='2' AND notif='0'")->result();
		$notif_k3 = $this->db->query("SELECT count(notif) as notif_k3 FROM table_k3 WHERE kode_perusahaan='$kode_perusahaan' AND status='2' AND notif='0'")->result();
		$notif_wlkp = $this->db->query("SELECT count(notif) as notif_wlkp FROM table_wlkp WHERE kode_perusahaan='$kode_perusahaan' AND status='2' AND notif='0'")->result();
		$count_notif= array(
			$notif_pp[0]->notif_pp,
			$notif_pkb[0]->notif_pkb,
			$notif_wlkp[0]->notif_wlkp,
			$notif_k3[0]->notif_k3,
			$notif_lks[0]->notif_lks,
		);
		return array_sum($count_notif);
	}
	public function show_notif($kode_perusahaan){
		$query = $this->db->query("SELECT * FROM table_pp WHERE status='2' AND notif='0' AND kode_perusahaan='$kode_perusahaan' union all
						SELECT * FROM table_pkb WHERE status='2' AND notif='0' AND kode_perusahaan='$kode_perusahaan' union all
						SELECT * FROM table_lks WHERE status='2' AND notif='0' AND kode_perusahaan='$kode_perusahaan' union all
						SELECT * FROM table_k3 WHERE status='2' AND notif='0' AND kode_perusahaan='$kode_perusahaan' union all
						SELECT * FROM table_k3 WHERE status='2' AND notif='0' AND kode_perusahaan='$kode_perusahaan' order by tanggal_daftar desc");
		if($query->num_rows()>0){
			foreach ($query->result_array() as $row) { $data[]=$row; }
			$query->free_result();
		}
		else{
			$data=NULL;
		}
		return $data;
	}

}
?>
