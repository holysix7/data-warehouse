<?php

class Users extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('login') != true){
      redirect('');
    }
    $this->load->model('Auth/Auth_model', 'm_auth');
    $this->load->model('Masterdata/Master/M_user', 'm_user');
    $this->load->model('Masterdata/Master/M_user_list_access', 'm_access');
    $this->load->model('Masterdata/Master/M_user_access', 'm_user_access');
  }

	public function index(){
    $name = $this->session->userdata('name');
    $data = $this->m_user->get_data();
    // var_dump($data); die;
    $this->load->view('Template/Header');
    $this->load->view('Masterdata/Master/Users/Users', compact('name','data'));
  }

	public function show($id){
    $name = $this->session->userdata('name');
    $data = $this->m_user->show_data($id);
    $list_access = $this->m_access->get_data();
    $data_access = $this->m_user_access->show_data($id);
    $this->load->view('Template/Header');
    $this->load->view('Masterdata/Master/Users/Show', compact('name','data','list_access','data_access'));
  }

  public function create(){
    $username = $this->input->post('username');
    $getData = $this->m_user->get_username($username)->num_rows();
    if($getData > 0){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-times-circle"></i></b> Username Tersebut Sudah Digunakan','danger'));
    }else{
      $data = [
        'username'  => $username,
        'password'  => md5($this->input->post('password')),
        'name'      => $this->input->post('name'),
        'role'      => $this->input->post('role')
      ];
      $userSave = $this->m_user->insert($data);
      $insert_id = $this->db->insert_id();
      $list_access = $this->m_access->get_data();
      $dataAccess = [];
      foreach($list_access as $row){
        $arrData = [
          'user_id' => $insert_id,
          'list_access_id' => $row['id']
        ];  
        array_push($dataAccess, $arrData);
      }
      if($this->m_user_access->multiple_insert($dataAccess)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Ditambahkan','success'));
      }else{
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-times-circle"></i></b> Data Gagal Ditambahkan','danger'));
      }
    }
    redirect('list-users');
  }

  public function UpdateAccess(){
    $name = $this->session->userdata('name');
    $id_user = $this->input->post('user_id');
    $arr = $this->input->post('list_access_id');
    $fixedData = [];
    foreach($arr as $row){
      $list_access = $this->m_user_access->show_data($id_user);
      foreach($list_access as $row_access){
        if($row_access['status'] == 'Off'){
          if($row_access['list_access_id'] == $row){
            $arrData = [
              "id" => $row_access['id'],
              "user_id" => $id_user,
              "list_access_id" => $row,
              "status"    => "On",
              "updated_by"  => $name
            ];
            array_push($fixedData, $arrData);
            // var_dump($arrData); die;
            $updated = $this->m_user_access->update($arrData, $row_access['id']);
          }else{
            null;
          }
        }else{
          if($row_access['list_access_id'] == $row){
            $arrData = [
              "id" => $row_access['id'],
              "user_id" => $id_user,
              "list_access_id" => $row,
              "status"    => "Off",
              "updated_by"  => $name
            ];
            array_push($fixedData, $arrData);
            $updated = $this->m_user_access->update($arrData, $row_access['id']);
          }else{
            null;
          }
        }
      }
    }
    if(count($fixedData) > 0){
      $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Ditambahkan','success'));
    }else{
      $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-times-circle"></i></b> Data Gagal Ditambahkan','danger'));
    }
    redirect('list-users');
  }
  
  public function update(){
    $id   = $this->input->post('id');
    $get_user = $this->m_user->show_data($id);
    $password = $get_user->password;
    if($this->input->post('password') == $password){
      $data = [
        'username'  => $this->input->post('username'),
        'name'      => $this->input->post('name'),
        'role'      => $this->input->post('role')
      ];
    }else{
      // var_dump($password); die;
      $data = [
        'username'  => $this->input->post('username'),
        'password'  => md5($this->input->post('password')),
        'name'      => $this->input->post('name'),
        'role'      => $this->input->post('role')
      ];
    }
    if($this->m_user->update($data, $id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('list-users');
  }
  
  public function delete($id){
    if($this->m_user->delete($id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Dihapus','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('list-users');
  }
}
