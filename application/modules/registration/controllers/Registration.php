<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
	public function index(){
		$this->form_validation->set_rules('name','Fullname','required');
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[user.username]');
		$this->form_validation->set_rules('password','Password','required|trim');
		$this->form_validation->set_rules('password2','Confirm Password','required|trim|matches[password]');
		$this->form_validation->set_error_delimiters('<p class="error" style="color:red">','</p>');
		if($this->form_validation->run()===false){
			$this->load->view('registration');
		}else{
			$this->load->model('registration_model');
			$data = array(
				'name'        => $this->input->post('name'),
				'username'    => $this->input->post('username'),
				'password'    => md5($this->input->post('password')),
				'level'       => 3,
				'status' 	  => 1,
				'date_create' => date('Y-m-d H:i:s')
			);
			$this->registration_model->register($data);
			$this->session->set_flashdata('alert','<div class="alert alert-success">Success : Registration Complete</div>');
			redirect('registration');
		}
	}
}
