<?php

class M_Indonesia extends CI_Model
{

    public function get_provinsi()
    {
        $query = $this->db->get('provinces')->result();
        return $query;
    }

    public function get_kota($province_id)
    {
        $this->db->select('*');
        $this->db->from('regencies');
        $this->db->where('province_id', $province_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kecamatan($regencies_id)
    {
        $this->db->select('*');
        $this->db->from('districts');
        $this->db->where('regency_id', $regencies_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kelurahan($district_id)
    {
        $this->db->select('*');
        $this->db->from('villages');
        $this->db->where('district_id', $district_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_kode_alamat()
    {
      $kode = "";
      $this->db->select("REPLACE(kode_alamat, 'ALM', '') as kode", FALSE);
        $this->db->order_by('kode_alamat','DESC');
        $this->db->limit(1);
        $query = $this->db->get('table_alamat');      //cek dulu apakah ada sudah ada kode di tabel.
        if($query->num_rows() <> 0){
           //jika kode ternyata sudah ada.
           $data = $query->row();
           $kode = intval($data->kode) + 1;
       }
       else {
           //jika kode belum ada
           $kode = 1;
       }

       return "ALM".$kode;
    }

    public function get_kode_perusahaan()
    {
      $kode = "";
      $this->db->select("REPLACE(kode_perusahaan, 'PER', '') as kode", FALSE);
        $this->db->order_by('kode_perusahaan','DESC');
        $this->db->limit(1);
        $query = $this->db->get('table_perusahaan');      //cek dulu apakah ada sudah ada kode di tabel.
        if($query->num_rows() <> 0){
           //jika kode ternyata sudah ada.
           $data = $query->row();
           $kode = intval($data->kode) + 1;
       }
       else {
           //jika kode belum ada
           $kode = 1;
       }

       return "PER".$kode;
    }


}