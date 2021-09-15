<?php

class Bahanpembantu extends CI_Controller {
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
    $kode = $this->m_prod->generate_code('Bahan Pembantu');
    $data = $this->m_prod->get_data('Bahan Pembantu');
    $mUom = $this->m_uom->get_data();
    $this->load->view('Template/Header');
    $this->load->view('Masterdata/Products/Bahanpembantu', compact('name','kode','data','mUom'));
  }

  public function create(){
    // var_dump($this->input->post('uom_id')); die;
    $data = [
      'uom_id'        => $this->input->post('uom_id'),
      'product_name'  => $this->input->post('product_name'),
      'product_code'  => $this->input->post('product_code'),
      'stock'         => $this->input->post('stock'),
      'price'         => $this->input->post('price'),
      'type'          => $this->input->post('type'),
      'min_stock'     => $this->input->post('min_stock'),
      'category'      => 'Bahan Pembantu'
    ];
    if($this->m_prod->insert($data, 'Sparepart')){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Ditambahkan','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-times-circle"></i></b> Data Gagal Ditambahkan','danger'));
    }
    redirect('bahan-pembantu');
  }
  
  public function update(){
    $data = $this->input->post();
    $id   = $data['id'];
    if($this->m_prod->update($data, $id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('bahan-pembantu');
  }
  
  public function delete($id){
    if($this->m_prod->delete($id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('bahan-pembantu');
  }
}
