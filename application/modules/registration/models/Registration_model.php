<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registration_model extends CI_Model {
	function register($data){
		$this->db->insert('user',$data);
	}
}