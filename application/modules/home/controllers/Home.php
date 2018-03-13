<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index(){
		$data['content'] = $this->load->view('home','',true);
		$this->load->view('template',$data);
	}
	public function logout(){
		$this->session->unset_userdata('user_login');
		$this->session->unset_userdata('event');
		redirect('login');
	}
}