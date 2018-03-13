<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model {

	function status(){
		$this->db->select(array('b.name','count(a.id) as total'));
		$this->db->from('candidate a');
		$this->db->join('candidate_status b','a.status=b.id','left');
		$this->db->where('a.event',$this->event['id']);
		if ($this->input->get('date_from') && $this->input->get('date_to')) {
			$this->db->where('a.dist_date >=',format_ymd($this->input->get('date_from')));
			$this->db->where('a.dist_date <=',format_ymd($this->input->get('date_to')));
		}
		if ($this->input->get('date_from_first') && $this->input->get('date_to_first')) {
			$this->db->where('a.dist_date_first >=',format_ymd($this->input->get('date_from_first')));
			$this->db->where('a.dist_date_first <=',format_ymd($this->input->get('date_to_first')));
		}
		$this->db->group_by('a.status');
		return $this->db->get()->result();
	}
	function total_dialed()
	{
		$this->db->select(array('count(b.id) as total'));
		$this->db->from('candidate a');
		$this->db->join('call_history b','a.id=b.candidate','left');
		$this->db->where('a.event',$this->event['id']);
		if ($this->input->get('date_from') && $this->input->get('date_to')) {
			$this->db->where('a.dist_date >=',format_ymd($this->input->get('date_from')));
			$this->db->where('a.dist_date <=',format_ymd($this->input->get('date_to')));
		}
		return $this->db->get()->row()->total;
	}
}