
<?php

Class M_adjustment_item extends CI_Model {
  protected $table = 'adjustment_item';	

	public function get_data($type, $value){
		if($type == 'In'){
			$this->db->select('a.id, a.remark, a.quantity, d.product_code, d.product_name, e.uom_name, f.rack_code');
			$this->db->join('products d', 'd.id = a.id_product');
			$this->db->join('unit_of_material e', 'e.id = d.uom_id');
			$this->db->join('racks f', 'f.id = a.id_rack');
		}else{
			$this->db->select('a.id, a.remark, a.quantity, d.product_code, d.product_name, e.uom_name');
			$this->db->join('products d', 'd.id = a.id_product');
			$this->db->join('unit_of_material e', 'e.id = d.uom_id');
		}
		return $this->db->get_where("$this->table a", ['id_adjustment' => $value])->result_array();
	}
	
	public function get_all_data_child($value){
		$this->db->select('a.id, a.id_adjustment, a.quantity, b.status_goods');
		$this->db->join('adjustment b', 'b.id = a.id_adjustment');
		return $this->db->get_where("$this->table a", ['status_goods' => $value]);
	}

	public function generate_code($value){
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
      $code = "IN/".$date."/".$kodemax;
    }else{
      $code = "OUT/".$date."/".$kodemax;
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
	
	public function multiple_insert($data){
		return $this->db->insert_batch($this->table, $data);
	}
}