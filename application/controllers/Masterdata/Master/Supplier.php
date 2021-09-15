<?php

class Supplier extends CI_Controller {
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
    $this->load->view('Masterdata/Supplier', compact('name','kode', 'data'));
  }

  public function create(){
    $data = [
      'supplier_code'     => $this->input->post('supplier_code'),
      'supplier_name'     => $this->input->post('supplier_name'),
      'phone'             => $this->input->post('phone'),
      'supplier_address'  => $this->input->post('supplier_address'),
      'notes'             => $this->input->post('notes'),
    ];
    if($this->m_supplier->insert($data)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Ditambahkan','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-times-circle"></i></b> Data Gagal Ditambahkan','danger'));
    }
    redirect('list-supplier');
  }
  
  public function update(){
    $data = $this->input->post();
    $id   = $data['id'];
    if($this->m_supplier->update($data, $id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('list-supplier');
  }
  
  public function delete($id){
    if($this->m_supplier->delete($id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('list-supplier');
  }
}
