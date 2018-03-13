<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_model extends CI_Model {
	function get_from_field($table_name,$field,$value){
		$this->db->where($field,$value);
		return $this->db->get($table_name);	
	}			
}