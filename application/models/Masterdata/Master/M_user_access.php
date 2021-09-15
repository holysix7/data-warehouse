
<?php

Class M_user_access extends CI_Model {
  protected $table = 'user_access';	

	public function get_data(){
		return $this->db->get($this->table)->result_array();
	}

	public function show_data($id){
		$this->db->select('a.id, a.user_id, a.list_access_id, a.status, a.updated_by, b.username, b.name, b.role');
    $this->db->join('users b', 'b.id = a.user_id');
		return $this->db->get_where("$this->table a", ['b.id' => $id])->result_array();
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
  
	public function multiple_insert($data){
		return $this->db->insert_batch($this->table, $data);
	}
}