
<?php

Class M_rak extends CI_Model {
  protected $table = 'racks';	

	public function get_data(){
		return $this->db->get($this->table)->result_array();
	}

	public function call_id_rack($id){
		return $this->db->get_where($this->table, ['id' => $id])->row();
	}

	public function show($id){
		$this->db->select('a.id, a.rack_code, a.rack_name, a.rack_status, b.id_product, SUM(b.quantity) total_quantity, c.product_name, c.category');
		$this->db->join('adjustment_item b', 'b.id_rack = a.id');
		$this->db->join('products c', 'c.id = b.id_product');
		$this->db->group_by('b.id_product');
		return $this->db->get_where("$this->table a", ['a.id' => $id])->result_array();
	}

	public function generate_code(){
		$this->db->select('RIGHT(rack_code,4) as kode', FALSE)
				 ->order_by('rack_code','DESC')
				 ->limit(1);    
		$query = $this->db->get($this->table);  
		if($query->num_rows() <> 0){
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		}else{
		   $kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$code = "RK-".$kodemax;
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