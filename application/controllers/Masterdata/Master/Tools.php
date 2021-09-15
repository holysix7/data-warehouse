<?php

class Tools extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('login') != true){
      redirect('');
    }
    $this->load->model('Auth/Auth_model', 'm_auth');
    $this->load->model('Masterdata/Master/M_inventaris', 'm_inventaris');
    $this->load->model('Masterdata/Master/M_datacc', 'm_cc');
  }

	public function index(){
    $name = $this->session->userdata('name');
    $kode = $this->m_inventaris->generate_code();
    $data = $this->m_inventaris->get_data();
    $dataCC = $this->m_cc->get_data();
    // var_dump($data); die;
    $this->load->view('Template/Header');
    $this->load->view('Masterdata/Master/Tools', compact('name','kode','data','dataCC'));
  }

  public function create(){
    // var_dump($this->input->post('uom_id')); die;
    $data = [
      'inventaris_code'   => $this->input->post('inventaris_code'),
      'inventaris_name'   => $this->input->post('inventaris_name'),
      'cc_id'             => $this->input->post('cc_id'),
    ];
    if($this->m_inventaris->insert($data)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Ditambahkan','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-times-circle"></i></b> Data Gagal Ditambahkan','danger'));
    }
    redirect('data-inventaris-kendaraan-alat-berat');
  }
  
  public function update(){
    $data = $this->input->post();
    $id   = $data['id'];
    if($this->m_inventaris->update($data, $id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('data-inventaris-kendaraan-alat-berat');
  }
  
  public function delete($id){
    if($this->m_inventaris->delete($id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('data-inventaris-kendaraan-alat-berat');
  }
}
