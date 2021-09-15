<?php

class Request extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('login') != true){
      redirect('');
    }
    $this->load->model('Auth/Auth_model', 'm_auth');
    $this->load->model('Request/M_request', 'm_req');
    $this->load->model('Request/M_request_items', 'm_req_items');
    $this->load->model('Masterdata/Products/M_products', 'm_products');
    $this->load->model('Masterdata/Master/M_rak', 'm_racks');
  }

	public function index(){
    $data = $this->m_req->get_data();
    $name = $this->session->userdata('name');
    // var_dump($data); die;
    $this->load->view('Template/Header');
    $this->load->view('Transaction/Request/Purchasing/Index', compact('name', 'data'));
  }

  public function new($value){
    $date = date('Y-m-d h:i:s');
    $name = $this->session->userdata('name');
    $userId = $this->session->userdata('id');
    $products = $this->m_products->get_data("All");
    $racks = $this->m_racks->get_data();
    $data = $this->m_req->get_data_by_type($value);
    $this->load->view('Template/Header');
    $this->load->view('Transaction/Request/Purchasing/New', compact('name', 'data', 'userId', 'date', 'products', 'racks'));
  }
}
