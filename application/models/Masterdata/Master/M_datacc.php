
<?php

Class M_datacc extends CI_Model {
  protected $table = 'data_cc';	

	public function get_data(){
		return $this->db->get($this->table)->result_array();
	}

	public function show_data($id){
		return $this->db->get_where($this->table, ['id' => $id])->row();
	}

	public function get_join($val){
		$this->db->select('b.id, b.cc_id, a.cc_name, b.inventaris_name');
		$this->db->join('inventaris b', 'b.cc_id = a.id');
		if($val != null){
			return $this->db->get_where("$this->table a", ['cc_name' => $val])->result_array();
		}else{
			return $this->db->get_where("$this->table a")->result_array();
		}
	}

	public function generate_code(){
		$this->db->select('RIGHT(cc_code,4) as kode', FALSE)
				 ->order_by('cc_code','DESC')
				 ->limit(1);    
		$query = $this->db->get($this->table);  
		if($query->num_rows() <> 0){
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		}else{
		   $kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$code = "CC-".$kodemax;
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