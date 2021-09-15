
<?php

Class M_products extends CI_Model {
  protected $table = 'products';	

	public function get_data($value){

		$this->db->select('a.id, a.uom_id, a.product_code, a.product_name, b.uom_name, a.stock, a.price, a.type, a.min_stock');
		$this->db->join('unit_of_material b', 'b.id = a.uom_id');
		if($value == 'Sparepart'){
			return $this->db->get_where("$this->table a", ['category' => 'Sparepart'])->result_array();
		}else if($value == 'Bahan Bakar'){
			return $this->db->get_where("$this->table a", ['category' => 'Bahan Bakar'])->result_array();
		}else if($value == 'Bahan Pembantu'){
			return $this->db->get_where("$this->table a", ['category' => 'Bahan Pembantu'])->result_array();
		}else{
			return $this->db->get("$this->table a")->result_array();
		}
	}

	public function show_data($id){
		return $this->db->get_where($this->table, ['id' => $id])->row();
	}

	public function show_count($id){
		return $this->db->get_where($this->table, ['id' => $id]);
	}

	public function generate_code($value){
		$this->db->select('RIGHT(product_code,4) as kode', FALSE)
				 ->order_by('product_code','DESC')
				 ->limit(1);    
		$query = $this->db->get_where($this->table, ['category' => $value]);  
		if($query->num_rows() <> 0){
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		}else{
		   $kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		if($value == 'Sparepart'){
			$code = "SP-".$kodemax;
		}else if($value == 'Bahan Bakar'){
			$code = "BB-".$kodemax;
		}else{
			$code = "BP-".$kodemax;
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