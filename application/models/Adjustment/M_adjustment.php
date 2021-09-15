
<?php

Class M_adjustment extends CI_Model {
  protected $table = 'adjustment';	

	public function count_all_data($status){
		return $this->db->get_where($this->table, ['status' => $status]);
	}

	public function get_all_data(){
		return $this->db->get($this->table);
	}

	public function get_all_data_approved($value){
		return $this->db->get_where($this->table, ['status' => $value]);
	}

	public function get_data($value){
		$this->db->select('a.id, a.adjustment_code, a.created_by, a.created_at, a.status_goods, a.status, b.name');
		$this->db->join('users b', 'b.username = a.created_by');
		return $this->db->get_where("$this->table a", ['status_goods' => $value])->result_array();
	}

	public function show_data($value, $id){
		if($value != 'In'){
			$this->db->select('a.id, a.adjustment_code, a.receiver_name, d.cc_name, d.cc_code, a.out_date, a.created_by, a.created_at, a.status_goods, a.status, b.name, a.remark');
			$this->db->join('users b', 'b.username = a.created_by');
			$this->db->join('data_cc d', 'd.id = a.id_data_cc');
		}else{
			$this->db->select('a.id, a.adjustment_code, a.po_number, a.driver_name, d.inventaris_name, a.supplier_date, a.created_by, a.created_at, a.status_goods, a.status, b.name, c.supplier_name, a.remark');
			$this->db->join('users b', 'b.username = a.created_by');
			$this->db->join('suppliers c', 'c.id = a.id_supplier');
			$this->db->join('inventaris d', 'd.id = a.id_inventaris');
		}
		return $this->db->get_where("$this->table a", ['status_goods' => $value, 'a.id' => $id]);
	}
	// public function show_data_out($)

	public function get_child($id){
		$this->db->select('b.id_adjustment, b.id, b.id_product, b.id_rack, b.quantity, b.remark');
		$this->db->join('adjustment_item b', 'b.id_adjustment = a.id');
		return $this->db->get_where("$this->table a", ['a.id' => $id])->result_array();
	}

	public function show_update($id){
		$this->db->select('a.id, a.adjustment_code, a.created_by, a.created_at, a.status_goods, a.status, b.name');
		$this->db->join('users b', 'b.username = a.created_by');
		return $this->db->get_where("$this->table a", ['a.id' => $id]);
	}
	
	public function generate_code($value, $valuedua){
    date_default_timezone_set("Asia/Jakarta");
    $date = date('Ymd');
		$this->db->select('RIGHT(adjustment_code,4) as kode', FALSE)
				 ->order_by('adjustment_code','DESC')
				 ->limit(1);    
		$query = $this->db->get_where($this->table, ['status_goods' => $value]);  
		if($query->num_rows() <> 0){
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		}else{
		   $kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
    if($value == 'In'){
      $code = "IN/".$valuedua."/".$date."/".$kodemax;
    }else{
      $code = "OUT/".$valuedua."/".$date."/".$kodemax;
    }
		return $code;
	}

	public function insert($data){
		return $this->db->insert($this->table, $data);
	}

	public function update($data, $id){
		$this->db->where('id', $id)
							->update($this->table, $data);
		return true;
	}

	public function delete($id){
		$this->db->where('id', $id)
				 ->delete($this->table);
  
		if($this->db->affected_rows() > 0){
		   return true;
		}
		return false;
	}
}