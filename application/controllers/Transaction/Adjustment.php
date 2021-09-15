<?php

class Adjustment extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('login') != true){
      redirect('');
    }
    $this->load->model('Auth/Auth_model', 'm_auth');
    $this->load->model('Adjustment/M_adjustment', 'm_adjust');
    $this->load->model('Adjustment/M_adjustment_item', 'm_adjust_item');
    $this->load->model('Masterdata/Products/M_products', 'm_products');
    $this->load->model('Masterdata/Master/M_inventaris', 'm_invent');
    $this->load->model('Masterdata/Master/M_rak', 'm_racks');
    $this->load->model('Masterdata/Master/M_supplier', 'm_suppliers');
    $this->load->model('Masterdata/Master/M_datacc', 'm_cc');
  }

	public function in(){
    $name = $this->session->userdata('name');
    $data = $this->m_adjust->get_data("In");
    // var_dump($data); die;
    $this->load->view('Template/Header');
    $this->load->view('Transaction/Adjustment/In/In', compact('name', 'data'));
  }

	public function inShow($id){
    $name = $this->session->userdata('name');
    $dataParent = $this->m_adjust->show_data("In", $id)->row();
    $dataItem = $this->m_adjust_item->get_data('In', $id);
    // var_dump($dataParent); die;
    $this->load->view('Template/Header');
    $this->load->view('Transaction/Adjustment/In/InShow', compact('name', 'dataParent', 'dataItem'));
  }

  public function newIn(){
    date_default_timezone_set("Asia/Jakarta");
    $date = date('Y-m-d h:i:s');
    $name = $this->session->userdata('name');
    $products = $this->m_products->get_data("All");
    $racks = $this->m_racks->get_data();
    $suppliers = $this->m_suppliers->get_data();
    $datacc = $this->m_cc->get_join("O & P Kendaraan Pabrik");
    // var_dump($datacc); die;
    $this->load->view('Template/Header');
    $this->load->view('Transaction/Adjustment/In/InNew', compact('name','products','racks','suppliers','datacc','date'));
  }
  
  public function createIn(){
    // var_dump($this->input->post()); die;
    $id = $this->session->userdata('username');
    $idp = $this->input->post('id_product')[0];
    $data_product = $this->m_products->show_data($idp);
    $kode_product = $data_product->product_code;
    $subKodeProd = substr($kode_product, 0, 2);
    if($subKodeProd == 'SP'){
      $kode = $this->m_adjust->generate_code("In", "SP");
    }else if($subKodeProd == 'BP'){
      $kode = $this->m_adjust->generate_code("In", "BP");
    }else{
      $kode = $this->m_adjust->generate_code("In", "BB");
    }
    // var_dump($subKodeProd); die;
    $data = $this->m_adjust->get_data("In");
    $dataParent = [
      'adjustment_code' => $kode,
      'status_goods'    => 'In',
      'created_by'      => $id,
      'created_at'      => $this->input->post('created_at'),
      'supplier_date'   => $this->input->post('supplier_date'),
      'driver_name'     => $this->input->post('driver_name'),
      'po_number'       => $this->input->post('no_po'),
      'id_inventaris'   => $this->input->post('no_pol'),
      'status'          => 'Created',
      'id_supplier'     => $this->input->post('id_supplier'),
      'remark'          => $this->input->post('remark_parent')
    ];
    $insert_parent = $this->m_adjust->insert($dataParent);
    $last_id    = $this->db->insert_id();
    $index      = 0;
    $id_product = $this->input->post('id_product');
    $id_rack    = $this->input->post('id_rack');
    $quantity   = $this->input->post('quantity');
    $remark     = $this->input->post('remark');
    $dataChild = [];
    foreach ($id_product as $row) {
      $arrData = [
        'id_adjustment' => $last_id,
        'id_product'  => $row,
        'id_rack'     => $id_rack[$index],
        'quantity'    => $quantity[$index],
        'remark'      => $remark[$index],
      ];
      $index++;
      array_push($dataChild, $arrData);
    }
    // var_dump($ceking); die;
    
    if($this->m_adjust_item->multiple_insert($dataChild)){
      $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Ditambahkan','success'));
    }else{
      $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-times-circle"></i></b> Data Gagal Ditambahkan','danger'));
    }
    redirect('adjustment/in');
  }
  
	public function out(){
    $name = $this->session->userdata('name');
    $data = $this->m_adjust->get_data('Out');
    // var_dump($data); die;
    $this->load->view('Template/Header');
    $this->load->view('Transaction/Adjustment/Out/Out', compact('name', 'data'));
  }

  public function newOut(){
    date_default_timezone_set("Asia/Jakarta");
    $date = date('Y-m-d h:i:s');
    $name = $this->session->userdata('name');
    $products = $this->m_products->get_data("All");
    $racks = $this->m_racks->get_data();
    // $suppliers = $this->m_suppliers->get_data();
    $datacc = $this->m_cc->get_data();
    $dataInvent = $this->m_invent->get_data();
    // var_dump($dataInvent); die;
    $this->load->view('Template/Header');
    $this->load->view('Transaction/Adjustment/Out/New', compact('name','products','racks','datacc','date','dataInvent'));
  }
  
  public function createOut(){
    $id = $this->session->userdata('username');
    $idp = $this->input->post('id_product')[0];
    $data_product = $this->m_products->show_data($idp);
    $kode_product = $data_product->product_code;
    $subKodeProd = substr($kode_product, 0, 2);
    if($subKodeProd == 'SP'){
      $kode = $this->m_adjust->generate_code("Out", "SP");
    }else if($subKodeProd == 'BP'){
      $kode = $this->m_adjust->generate_code("Out", "BP");
    }else{
      $kode = $this->m_adjust->generate_code("Out", "BB");
    }
    // var_dump($subKodeProd); die;
    $data = $this->m_adjust->get_data("In");
    $dataParent = [
      'adjustment_code' => $kode,
      'status_goods'    => 'Out',
      'created_by'      => $id,
      'created_at'      => $this->input->post('created_at'),
      'out_date'        => $this->input->post('out_date'),
      'receiver_name'   => $this->input->post('receiver'),
      'id_data_cc'      => $this->input->post('inventaris'),
      // 'id_inventaris'   => $this->input->post('inventaris'),
      'status'          => 'Created',
      'remark'          => $this->input->post('remark_parent')
    ];
    // var_dump($dataParent); die;
    $insert_parent = $this->m_adjust->insert($dataParent);
    $last_id    = $this->db->insert_id();
    $index      = 0;
    $id_product = $this->input->post('id_product');
    $quantity   = $this->input->post('quantity');
    $remark     = $this->input->post('remark');
    $dataChild = [];
    foreach ($id_product as $row) {
      $arrData = [
        'id_adjustment' => $last_id,
        'id_product'  => $row,
        'quantity'    => $quantity[$index],
        'remark'      => $remark[$index],
      ];
      $index++;
      array_push($dataChild, $arrData);
    }
    // var_dump($ceking); die;
    
    if($this->m_adjust_item->multiple_insert($dataChild)){
      $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Ditambahkan','success'));
    }else{
      $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-times-circle"></i></b> Data Gagal Ditambahkan','danger'));
    }
    redirect('adjustment/out');
  }
  
  public function outShow($id){
    $name = $this->session->userdata('name');
    $dataParent = $this->m_adjust->show_data("Out", $id)->row();
    $dataItem = $this->m_adjust_item->get_data('Out', $id);
    $this->load->view('Template/Header');
    $this->load->view('Transaction/Adjustment/Out/Show', compact('name', 'dataParent', 'dataItem'));
  }

  public function delete($id){
    if($this->m_adjust->delete($id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('adjustment/out');
  }

  public function judgement($id, $judgement){
    $check_save = false;
    if($judgement != 'approve'){
      $update_status = 'Canceled';
    }else{
      $update_status = 'Approved';
    }
    $getData = $this->m_adjust->show_update($id)->row();
    // var_dump($getData); die;
    $data = [
      'id' => $getData->id,
      'adjustment_code' => $getData->adjustment_code,
      'created_by' => $getData->created_by,
      'created_at' => $getData->created_at,
      'status_goods' => $getData->status_goods,
      'status' => $update_status
    ];
    if($update_status == 'Approved'){
      $getChild = $this->m_adjust->get_child($id);
      foreach($getChild as $row){
        $showRack = $this->m_racks->show($row['id_rack']);
        $statusRack = $showRack->rack_status;
        $dataRacks = [
          'rack_status' => 'Loaded'
        ];
        // var_dump($showRack); die;
        $showRack = $this->m_racks->update($dataRacks, $row['id_rack']);
        
        $getProduct = $this->m_products->show_data($row['id_product']);
        $stok_awal = $getProduct->stock;
        $stok_awal -= $row['quantity'];
        if($stok_awal >= 0){
          $check_save = true;
          $dataProduct = [
            'id'            => $getProduct->id,
            'uom_id'        => $getProduct->uom_id,
            'product_code'  => $getProduct->product_code,
            'product_name'  => $getProduct->product_name,
            'stock'         => $stok_awal,
            'price'         => $getProduct->price,
            'type'          => $getProduct->type,
            'min_stock'     => $getProduct->min_stock,
            'category'      => $getProduct->category,
          ];
          $updateDataProduct = $this->m_products->update($dataProduct, $getProduct->id);
        }else{
          $check_save = false;
        }
      }
    }

    if($check_save == true){
      if($this->m_adjust->update($data, $id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
      }else{
        $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
      }
    }else{
      $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah, Check Kembali Stock Yang Tersedia','danger'));
    }
    redirect('adjustment/out');
  }
}
