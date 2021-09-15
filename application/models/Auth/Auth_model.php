<?php

Class Auth_model extends CI_Model {

    protected $table = 'users';

    public function get_data(){
        return $this->db->get($this->table)->result_array();
    }
    public function checking_login($table, $data){		
		return $this->db->get_where($table, $data);
	}	
}