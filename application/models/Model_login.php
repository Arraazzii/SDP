<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

    var $TABLE = "table_login";
    var $COLUMN = array(
        "id",
        "email",
        "password",
        "status",
        "level",
        "kode_perusahaan"
    );

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    public function ambillogin($username, $password) {
        $this->db->where('email', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('table_login');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $sess = array ('username' => $row->email,
                               'password' => $row->password,
                               'level' => $row->level,
                               'id' => $row->id,
                               'kode_perusahaan' => $row->kode_perusahaan,);
            }

            $this->session->get_userdata($sess);
            redirect('admin');
        
        } else {
            $this->session->set_flashdata('info', 'Gagal!');
            redirect('login');
        }
    }

    public function readBy($username, $password){
        try {
            $this->db->select($this->COLUMN[0].",".$this->COLUMN[1].",".$this->COLUMN[2].",".$this->COLUMN[3].",".$this->COLUMN[4].",".$this->COLUMN[5]);
            $this->db->from($this->TABLE);
            $this->db->where($this->COLUMN[1], $username);
            $query = $this->db->get();
            return $query->row();
        }
        catch (Exception $e){
            return null;
        }
    }
    public function get_klui(){
        $query = $this->db->query("SELECT * FROM table_klui ORDER BY kode_klui ASC ");
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