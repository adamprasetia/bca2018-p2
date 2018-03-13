<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Callhis extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('callhis_model');
	}
	public function create(){
		$data = array(
			'status'=>$this->input->post('status'),
			'candidate'=>$this->input->post('candidate'),
			'date'=>date('Y-m-d H:i:s')
		);
		$this->callhis_model->create($data);
		$this->get($this->input->post('candidate'));
	}
	public function update(){
		$id = $this->input->post('id');
		$candidate = $this->input->post('candidate');
		$data = array(
			'date'=>$this->input->post('date'),
			'status'=>$this->input->post('status')
		);
		$this->callhis_model->update($id,$data);
		$this->get($candidate);
	}
	public function delete(){
		$id = $this->input->post('id');
		$candidate = $this->input->post('candidate');
		$this->callhis_model->delete($id);
		$this->get($candidate);
	}
	public function get($id){
		$result = $this->callhis_model->get($id);
		$tmpl = array ('table_open' => '<table class="table table-responsive">');
		$this->table->set_template($tmpl);		
		$this->table->set_heading('No','Date','Status','Action');
		$i = 1;
		foreach ($result as $row) {
			$this->table->add_row(
				$i++,
				$row->date,
				array('data'=>$row->status,'class'=>'btn-callhis-update','data-id'=>$row->id),
				'<button class="btn btn-danger btn-xs btn-callhis-delete" value="'.$row->id.'">Delete</button>'
			);
		}
		echo $this->table->generate();
	}
}