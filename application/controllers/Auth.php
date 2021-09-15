<?php

class Auth extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Auth/Auth_model', 'm_auth');
    }

	public function index(){
        if($this->session->userdata('login')){
            redirect('dashboard');
        }else {
            $this->load->view('Template/Header');
            $this->load->view('Auth/Login');
        }
    }
    
    public function login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $data = [
            'username' => $username,
            'password' => md5($password)
        ];
        // var_dump($data); die;
        $check = $this->m_auth->checking_login("users", $data);
        if($check->num_rows() > 0){
            $dataUser = $check->row();
            $this->session->set_userdata('login', true);
            $this->session->set_userdata('id', $dataUser->id);
            $this->session->set_userdata('username', $dataUser->username);
            $this->session->set_userdata('name', $dataUser->name);
            $this->session->set_userdata('role', $dataUser->role);
            if($dataUser == "Super Admin"){
                redirect('dashboard');
                $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b>Super Admin Berhasil Login','success'));
            }elseif($dataUser == "User"){
                $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b>User Berhasil Login','success'));
                redirect('dashboard/karyawan');
            }else{
                $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b>Username Atau Password Salah!','success'));
                redirect('');
            }
        }else{
            $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Username Atau Password Salah!','danger'));
            redirect('');
        }
    }

    public function logout(){
        if($this->session->sess_destroy()){
            $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b>Berhasil Logout','success'));
		}else{
            $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Gagal Logout','danger'));
		}
        redirect('');
    }
}
