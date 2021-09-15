<?php

class Transaction extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('login') != true){
      redirect('');
    }
    $this->load->model('Auth/Auth_model', 'm_auth');
    $this->load->model('Masterdata/Master/M_supplier', 'm_supplier');
  }

	public function index(){
    $name = $this->session->userdata('name');
    $kode = $this->m_supplier->generate_code();
    $data = $this->m_supplier->get_data();
    // var_dump($data); die;
    $this->load->view('Template/Header');
    $this->load->view('Transaction/Transaction/Cardstock', compact('name','kode', 'data'));
  }
}
