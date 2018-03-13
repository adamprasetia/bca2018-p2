<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
	private $tbl_name = 'user';
	private $tbl_key 	= 'id';
	public function query(){
		$data[] = $this->db->select(array(
			'A.*',
			'B.name as level_name',
			'C.name as status_name'
		));
		$data[] = $this->db->from('user A');
		$data[] = $this->db->join('user_level B','A.level = B.id');
		$data[] = $this->db->join('user_status C','A.status = C.id');
		$data[] = $this->search();
		if($this->input->get('level') <> '')
			$data[] = $this->db->where('A.level',$this->input->get('level'));
		if($this->input->get('status') <> '')
			$data[] = $this->db->where('A.status',$this->input->get('status'));
		$data[] = $this->db->order_by($this->general->get_order_column('A.ID'),$this->general->get_order_type('desc'));
		$data[] = $this->db->offset($this->general->get_offset());
		return $data;
	}
	public function get(){
		$this->query();
		$this->db->limit($this->general->get_limit());
		return $this->db->get();
	}
	public function add($data){
		$this->db->insert($this->tbl_name,$data);
	}
	public function edit($id,$data){
		$this->db->where($this->tbl_key,$id);
		$this->db->update($this->tbl_name,$data);
	}
	public function delete($id){
		$this->db->where($this->tbl_key,$id);
		$this->db->delete($this->tbl_name);
	}
	public function get_from_field($field,$value){
		$this->db->where($field,$value);
		return $this->db->get($this->tbl_name);	
	}
	public function count_all(){
		$this->query();
		return $this->db->get()->num_rows();
	}
	public function search(){
		$result = $this->input->get('search');
		if($result <> ''){
			return $this->db->where('(A.name like "%'.$result.'%" or A.username like "%'.$result.'%")');
		}		
	}
}