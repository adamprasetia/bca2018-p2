<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import_model extends CI_Model {
	function import($data){
		$this->db->insert_batch('candidate',$data);
	}
}