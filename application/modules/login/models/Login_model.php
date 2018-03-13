<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
	function check_login($username,$password)
	{
		$this->db->select('A.id,A.name,A.level,B.name as level_name');
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->where('status','1');
		$this->db->from('user A');
		$this->db->join('user_level B','A.level=B.id');
		return $this->db->get();
	}
	function set_date_login($id)
	{
		$browser = get_browsers();
		$data = array(
			'ip_login'=>$_SERVER['REMOTE_ADDR']
			,'user_agent'=>$browser['platform']."(".$browser['name']." ".$browser['version'].")"
			,'date_login'=>date('Y-m-d H:i:s')
		);
		$this->db->where('id',$id);
		$this->db->update('user',$data);
	}	
}