<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distribution_model extends CI_Model {

	function distribution($interviewer,$total){
		$query = "UPDATE candidate SET dist_date = '".date('Y-m-d')."', interviewer = ".$interviewer.",dist_date_first = if(dist_date_first = '0000-00-00','".date('Y-m-d')."',dist_date_first) WHERE event = ".$this->event['id']." AND interviewer = 0 ORDER BY co ASC LIMIT ".$total;
		$this->db->query($query);
		return $this->db->affected_rows();
	}	
	function get_interviewer(){
		$this->db->where('level','3');
		$this->db->where('status','1');
		$this->db->from('user');
		return $this->db->get()->result();
	}
	function count_ready_distribution(){
		$this->filter();
		$this->db->where('interviewer','0');
		$this->db->from('candidate');
		return $this->db->get()->num_rows();
	}
	function count_by_interviewer_new($id){
		$this->filter();
		$this->db->where('status','0');
		$this->db->where('audit','0');
		$this->db->from('candidate');
		$this->db->where('interviewer',$id);
		return $this->db->get()->num_rows();
	}
	function count_by_interviewer_onproses($id){
		$this->filter();
		$this->db->where('status <>','0');
		$this->db->where('audit','0');
		$this->db->from('candidate');
		$this->db->where('interviewer',$id);
		return $this->db->get()->num_rows();
	}
	function count_by_interviewer_complete($id){
		$this->filter();
		$this->db->where('audit','1');
		$this->db->where('interviewer',$id);
		$this->db->from('candidate');
		return $this->db->get()->num_rows();
	}
	function clear(){
		$this->filter();
		$this->db->where('audit','0');
		$this->db->where('valid','0');
		$this->db->update('candidate',array('interviewer'=>'0'));
		return $this->db->affected_rows();
	}
	function clear_by_interviewer($id){
		$this->filter();
		$this->db->where('audit','0');
		$this->db->where('valid','0');
		$this->db->where('interviewer',$id);
		$this->db->update('candidate',array('interviewer'=>'0'));
		return $this->db->affected_rows();
	}	
	function clear_no_answer(){
		$this->filter();
		$this->db->where('status in(21,22)');
		$this->db->update('candidate',array('interviewer'=>'0','valid'=>'0','audit'=>'0'));
		return $this->db->affected_rows();
	}	
	function clear_callback(){
		$this->filter();
		$this->db->where('status in(105)');
		$this->db->update('candidate',array('interviewer'=>'0','valid'=>'0','audit'=>'0'));
		return $this->db->affected_rows();
	}	
	function filter(){
		$data = $this->db->where('event',$this->event['id']);
		return $data;
	}
}