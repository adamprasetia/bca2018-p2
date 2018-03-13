<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
	}	
	public function index(){
		$this->_set_rules();
		if($this->form_validation->run()===false){
			$this->load->view('login');
		}else{
			$username = $this->input->post('username');
			$user = $this->general_model->get_from_field('user','username',$username)->row();
			$this->login_model->set_date_login($user->id);
			redirect('home');
		}		
	}
	private function _set_rules(){
		$this->form_validation->set_rules('username','Username','trim|callback__login_check');
		$this->form_validation->set_rules('password','Password','trim');
	}
	public function _login_check(){		
		$event = $this->input->post('event');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if($username == '' || $password == ''){
			$this->form_validation->set_message('_login_check','<div class="alert alert-danger">Field required</div>');
			return false;			
		}
		$this->load->model('login_model');
		$result = $this->login_model->check_login($username,md5($password));
		$result_event = $this->general_model->get_from_field('event','id',$event);
		if($result->num_rows() > 0 && $result_event->num_rows() > 0){
			$this->session->set_userdata('user_login',$result->row_array());
			$this->session->set_userdata('event',$result_event->row_array());
			return true;			
		}
		$this->form_validation->set_message('_login_check','<div class="alert alert-danger">Login failure</div>');
		return false;
	}
}
