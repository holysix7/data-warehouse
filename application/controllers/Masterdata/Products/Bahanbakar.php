<?php

class Bahanbakar extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('login') != true){
      redirect('');
    }
    $this->load->model('Auth/Auth_model', 'm_auth');
    $this->load->model('Masterdata/Products/M_products', 'm_prod');
    $this->load->model('Masterdata/Products/M_spesification', 'm_uom');
  }

	public function index(){
    $name = $this->session->userdata('name');
    $kode = $this->m_prod->generate_code('Bahan Bakar');
    $data = $this->m_prod->get_data('Bahan Bakar');
    $mUom = $this->m_uom->get_data();
    // var_dump($data); die;
    $this->load->view('Template/Header');
    $this->load->view('Masterdata/Products/Bahanbakar', compact('name','kode','data','mUom'));
  }

  public function create(){
    $data = [
      'uom_id'        => $this->input->post('uom_id'),
      'product_name'  => $this->input->post('product_name'),
      'product_code'  => $this->input->post('product_code'),
      'stock'         => $this->input->post('stock'),
      'price'         => $this->input->post('price'),
      'type'          => $this->input->post('type'),
      'min_stock'     => $this->input->post('min_stock'),
      'category'      => 'Bahan Bakar',
    ];
    if($this->m_prod->insert($data)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Ditambahkan','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-times-circle"></i></b> Data Gagal Ditambahkan','danger'));
    }
    redirect('bahan-bakar');
  }
  
  public function update(){
    $data = $this->input->post();
    $id   = $data['id'];
    if($this->m_prod->update($data, $id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('bahan-bakar');
  }
  
  public function delete($id){
    if($this->m_prod->delete($id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('bahan-bakar');
  }
}
