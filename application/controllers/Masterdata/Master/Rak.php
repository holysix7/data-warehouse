<?php

class Rak extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('login') != true){
      redirect('');
    }
    $this->load->model('Auth/Auth_model', 'm_auth');
    $this->load->model('Masterdata/Master/M_rak', 'm_rak');
    $this->load->model('Masterdata/Products/M_products', 'm_prod');
  }

	public function index(){
    $name = $this->session->userdata('name');
    $kode = $this->m_rak->generate_code();
    $data = $this->m_rak->get_data();
    // var_dump($data); die;
    $this->load->view('Template/Header');
    $this->load->view('Masterdata/Master/Rak/Index', compact('name','kode','data'));
  }

  public function show($id){
    $name = $this->session->userdata('name');
    $data = $this->m_rak->show($id);
    $calling = $this->m_rak->call_id_rack($id);
    $grandTotalSparepart = 0;
    $grandTotalBahanBakar = 0;
    $grandTotalBahanPembantu = 0;
    foreach ($data as $row) {
      if($row['category'] == 'Sparepart'){
        $grandTotalSparepart += $row['total_quantity'];
      }
      if($row['category'] == 'Bahan Bakar'){
        $grandTotalBahanBakar += $row['total_quantity'];
      }
      if($row['category'] == 'Bahan Pembantu'){
        $grandTotalBahanPembantu += $row['total_quantity'];
      }
    }
    $this->load->view('Template/Header');
    $this->load->view('Masterdata/Master/Rak/Show', compact('name','data','calling','grandTotalSparepart', 'grandTotalBahanBakar', 'grandTotalBahanPembantu'));
  }

  public function create(){
    // var_dump($this->input->post('uom_id')); die;
    $data = [
      'rack_code'   => $this->input->post('rack_code'),
      'rack_name' => $this->input->post('rack_name'),
      'rack_status' => $this->input->post('rack_status')
    ];
    if($this->m_rak->insert($data)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Ditambahkan','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-times-circle"></i></b> Data Gagal Ditambahkan','danger'));
    }
    redirect('list-rack');
  }
  
  public function update(){
    $data = $this->input->post();
    $id   = $data['id'];
    if($this->m_rak->update($data, $id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('list-rack');
  }
  
  public function delete($id){
    if($this->m_rak->delete($id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('list-rack');
  }
}
