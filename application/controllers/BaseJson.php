<?php

class BaseJson extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Auth/Auth_model', 'm_auth');
    $this->load->model('Masterdata/Master/M_user', 'm_user');
    $this->load->model('Masterdata/Master/M_customer', 'm_customers');
    $this->load->model('Masterdata/Master/M_user_list_access', 'm_access');
    $this->load->model('Masterdata/Master/M_user_access', 'm_user_access');
    $this->load->model('Masterdata/Master/M_datacc', 'm_data_cc');
    $this->load->model('Request/M_request', 'm_req');
  }

  public function json_access($id){
    header('Content-Type: application/json');
    $data_cc = $this->m_data_cc->show_data($id);
    echo json_encode($data_cc);
  }

  public function json_customers(){
    header('Content-Type: application/json');
    $data = $this->m_customers->get_data();
    echo json_encode($data);
  }

  public function json_request($jenis_form, $jenis_pp, $po_atau_rp){
    header('Content-Type: application/json');
    $generate = $this->m_req->generate_code($jenis_form, $jenis_pp, $po_atau_rp);
    $data['result_code'] = $generate;
    echo json_encode($data);
  }
}
