<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_login');
    }

    public function index() {
        if($this->session->has_userdata('level') == false){
            $this->load->view('login');
        }
        else if($this->session->userdata('level') == 'admin'){
                redirect('Admin');
        }
        else if($this->session->userdata('level') == 'user'){
                redirect('User');
        }
    }

    public function ceklogin() {
        $username = $this->input->post('user');
        $password = md5($this->input->post('pass'));
        $this->Model_login->ambillogin($username, $password);
    }  

    public function auth_login() {
        try {
            $username = $this->input->post('user');
            $password = md5($this->input->post('pass'));
            $data = $this->Model_login->readBy($username, $password);
            if (isset($data->email) && isset($data->password)) {
                if($username === $data->email && $password === $data->password){
                    if ($data->status == 'sudah') { 
                       $newdata = array(
                        'email'  => $data->email,
                        'level' => $data->level,
                        'kode_perusahaan'  => $data->kode_perusahaan,
                        'id'  => $data->id,
                    );
                       if ($data->level == 'admin') {
                           $this->session->set_userdata($newdata);
                           redirect('Admin');
                       } else if ($data->level == 'user') {
                           $this->session->set_userdata($newdata);
                           redirect('User');
                       } else {
                            $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert" style="text-align: center"> Anda Tidak Berhak Login <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                            redirect('Login');
                       }
                        
                    } elseif ($data->status == 'belum') {
                        redirect('Belum');
                    }                         
                                   
                } else {
                    $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert" style="text-align: center"> Masukkan Email & Password Dengan Benar <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Login');
                }

            } else {
                $this->session->set_flashdata('notif','<div class="alert alert-danger" role="alert" style="text-align: center"> Email atau Password yang Anda Masukkan Tidak Valid <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                    redirect('Login');
            }

        } catch(Exception $e) {
            redirect('Login');
        }
    }

    public function logout(){
        $this
            ->session
            ->sess_destroy();
        redirect('Login');
    }
}