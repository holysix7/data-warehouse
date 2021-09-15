
<?php

Class M_spesification extends CI_Model {
  protected $table = 'unit_of_material';	

	public function get_data(){
		return $this->db->get($this->table)->result_array();
	}

	public function generate_code(){
		$this->db->select('RIGHT(uom_code,4) as kode', FALSE)
				 ->order_by('uom_code','DESC')
				 ->limit(1);    
		$query = $this->db->get($this->table);  
		if($query->num_rows() <> 0){
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		}else{
		   $kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$code = "UOM-".$kodemax;
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