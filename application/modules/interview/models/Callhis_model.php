<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Callhis_model extends CI_Model {
	public function create($data){
		$this->db->insert('call_history',$data);		
	}
	public function update($id,$data){
		$this->db->where('id',$id);		
		$this->db->update('call_history',$data);
	}
	public function delete($id){
		$this->db->where('id',$id);		
		$this->db->delete('call_history');
	}
	public function get($id){
		$this->db->where('candidate',$id);		
		$this->db->order_by('date','asc');		
		return $this->db->get('call_history')->result();
	}
}