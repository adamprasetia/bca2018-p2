<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export_model extends CI_Model {

	function export($date_from,$date_to)
	{
		$this->db->select('a.*,b.name as status_name');
		$this->db->from('candidate a');
		$this->db->join('candidate_status b','a.status = b.id','left');
		$this->db->where('a.event',$this->event['id']);
		if($date_from <> '0000-00-00' && $date_to <> '0000-00-00'){
			$this->db->where('a.dist_date_first >=',$date_from);
			$this->db->where('a.dist_date_first <=',$date_to);
		}	
		return $this->db->get();
	}
}