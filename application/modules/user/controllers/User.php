<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('user_model');
	}
	public function index(){
		$offset = $this->general->get_offset();
		$limit 	= $this->general->get_limit();
		$total 	= $this->user_model->count_all();

		$xdata['action'] 			= 'user/search'.get_query_string();
		$xdata['action_delete'] 	= 'user/delete'.get_query_string();
		$xdata['add_btn'] 			= anchor('user/add','<span class="glyphicon glyphicon-plus"></span> Tambah',array('class'=>'btn btn-success btn-sm'));
		$xdata['delete_btn'] 		= '<button id="delete-btn" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span> Delete Checked</button>';

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'name'					=> 'Fullname'
			,'level_name'		=> 'Level'
			,'ip_login'			=> 'IP'
			,'user_agent'		=> 'User Agent'
			,'date_login'		=> 'Last Login'
			,'status_name'	=> 'Status'
		);
		$heading[] = form_checkbox(array('id'=>'selectAll','value'=>1));
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor('user'.get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = 'Action';
		$this->table->set_heading($heading);
		$result = $this->user_model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$this->table->add_row(
				array('data'=>form_checkbox(array('name'=>'check[]','value'=>$r->id)),'width'=>'10px'),
				$i++,
				anchor('user/edit/'.$r->id.get_query_string(),$r->name),
				$r->level_name,
				$r->ip_login,
				$r->user_agent,
				$r->date_login,			
				'<label class="label label-'.($r->status=='1'?'success':'danger').'">'.$r->status_name.'</label>',
				anchor('user/edit/'.$r->id.get_query_string(),'Edit')
				."&nbsp;|&nbsp;".anchor('user/delete/'.$r->id.get_query_string(),'Delete',array('onclick'=>"return confirm('you sure')"))
			);
		}
		$xdata['table'] = $this->table->generate();
		$xdata['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = "user".get_query_string(null,'offset');
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$xdata['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view('user_list',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'level'=>$this->input->post('level'),
			'status'=>$this->input->post('status')
		);
		redirect('user'.get_query_string($data));		
	}
	private function _field(){
		$data = array(
			'name'			=> $this->input->post('name'),
			'username'	=> $this->input->post('username'),
			'password'	=> $this->input->post('password'),
			'level'			=> $this->input->post('level'),
			'status'		=> $this->input->post('status')
		);
		return $data;		
	}
	private function _set_rules(){
		$this->form_validation->set_rules('name','Fullname','required|trim');
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('password','Password','trim|matches[password2]');
		$this->form_validation->set_rules('password2','Password','trim|matches[password]');
		$this->form_validation->set_rules('level','Level','required');
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_error_delimiters('<p class="error">','</p>');
	}
	public function add(){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['action'] = 'user/add'.get_query_string();
			$xdata['breadcrumb'] = 'user'.get_query_string();
			$xdata['heading'] = 'New';
			$xdata['owner'] = '';
			$data['content'] = $this->load->view('user_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_create'] = $this->user_login['id'];
			$data['date_create'] = date('Y-m-d H:i:s');
			$this->user_model->add($data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Data has been saved</div>');
			redirect('user/add'.get_query_string());
		}
	}
	public function edit($id){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$xdata['row'] = $this->user_model->get_from_field('id',$id)->row();
			$xdata['action'] = 'user/edit/'.$id.get_query_string();
			$xdata['breadcrumb'] = 'user'.get_query_string();
			$xdata['heading'] = 'Update';
			$xdata['owner'] = owner($xdata['row']);
			$data['content'] = $this->load->view('user_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = $this->_field();
			$data['user_update'] = $this->user_login['id'];
			$data['date_update'] = date('Y-m-d H:i:s');
			if($data['password'] == '')
				unset($data['password']);
			else
				$data['password'] = md5($data['password']);
			$this->user_model->edit($id,$data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Data has been edited</div>');
			redirect('user/edit/'.$id.get_query_string());
		}
	}
	public function delete($id=''){
		if($id<>''){
			$this->user_model->delete($id);
		}
		$check = $this->input->post('check');
		if($check<>''){
			foreach($check as $c){
				$this->user_model->delete($c);
			}
		}
		$this->session->set_flashdata('alert','<div class="alert alert-success">Data has been deleted</div>');
		redirect('user'.get_query_string());
	}
}