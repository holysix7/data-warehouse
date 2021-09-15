
<?php

Class M_user_list_access extends CI_Model {
  protected $table = 'user_list_access';	

	public function get_data(){
		return $this->db->get($this->table)->result_array();
	}

	public function show_data($id){
		return $this->db->get_where($this->table, ['id' => $id])->row();
	}

	public function get_username($username){
		return $this->db->get_where($this->table, ['username' => $username]);
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