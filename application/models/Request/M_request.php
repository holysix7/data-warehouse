
<?php

Class M_request extends CI_Model {
  protected $table = 'data_request';	

	public function get_data(){
		return $this->db->get($this->table)->result_array();
	}
  
	public function generate_code($valueTiga, $value, $valuedua){
    date_default_timezone_set("Asia/Jakarta");
    $date = date('Ymd');
		if($value == 'datapusat'){
			$fixedParams = 'Data PP Pusat';
		}else if($value == 'datainvestasi'){
			$fixedParams = 'Data PP Investasi';
		}else{
			$fixedParams = 'Data PP Local';
		}
		$this->db->select('RIGHT(request_code,4) as kode', FALSE)
				 ->order_by('request_code','DESC')
				 ->limit(1);    
		$query = $this->db->get_where($this->table, ['jenis_request' => $fixedParams]);  
		if($query->num_rows() <> 0){
		   $data = $query->row();      
		   $kode = intval($data->kode) + 1;    
		}else{
		   $kode = 1;    
		}
		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
    if($valueTiga == 'form-purchasing'){
      if($value == 'datapusat'){
        $code = $valuedua."/PST/".$date."/".$kodemax;
      }else if($value == 'datainvestasi'){
        $code = $valuedua."/INV/".$date."/".$kodemax;
      }else if($value == 'datalocal'){
        $code = $valuedua."/LCL/".$date."/".$kodemax;
      }else{
				$code = null;
			}
    }else{
      if($value == 'Data Repair & Fabrikasi Pusat'){
        $code = $valuedua."/PST/".$date."/".$kodemax;
      }else{
        $code = $valuedua."/LCL/".$date."/".$kodemax;
      } 
    }
		return $code;
	}

	public function get_data_by_type($value){
		return $this->db->get_where($this->table, ['type' => $value])->result_array();
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