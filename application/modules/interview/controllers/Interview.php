<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interview extends MY_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('interview_model');
		$this->load->model('callhis_model');
	}
	public function index(){
		$offset = $this->general->get_offset();
		$limit 	= $this->general->get_limit();
		$total 	= $this->interview_model->count_all();

		$xdata['action'] = 'interview/search'.get_query_string();

		$this->table->set_template(tbl_tmp());
		$head_data = array(
			'serial'		=> 'Serial',
			'name'			=> 'Nama Lengkap',
			'co'			=> 'Perusahaan',
			'tlp'			=> 'Telephone',
			'email'			=> 'Email',
			'status_name'	=> 'Status',
			'interviewer'	=> 'Telemarketer',
			'note'			=> 'Note'
		);
		$heading[] = '#';
		foreach($head_data as $r => $value){
			$heading[] = anchor('interview'.get_query_string(array('order_column'=>"$r",'order_type'=>$this->general->order_type($r))),"$value ".$this->general->order_icon("$r"));
		}		
		$heading[] = array('data'=>'Action','style'=>'min-width:120px');
		$this->table->set_heading($heading);
		$result = $this->interview_model->get()->result();
		$i=1+$offset;
		foreach($result as $r){
			$count_call = $this->interview_model->count_call($r->id);
			$callhis = $this->general->callhis($r->id);
			$this->table->add_row(
				$i++,
				anchor('interview/phone/'.$r->id.get_query_string(),$r->serial).($r->valid==1?' <span class="label label-success">Valid</span>':'').($r->audit==1?' <span class="label label-primary">Audit</span>':''),
				$r->name,
				$r->co,
				($r->tel_new?$r->tel_new:$r->tel),
				($r->email_new?$r->email_new:$r->email),
				$r->status_name,
				$r->interviewer,
				implode(',',$callhis),
				anchor('interview/phone/'.$r->id.get_query_string(),'Phone'.($count_call > 0?' <span class="label label-success">'.$count_call.' <span class="glyphicon glyphicon-earphone"></span></span>':''))
			);
		}
		$xdata['table'] = $this->table->generate();
		$xdata['total'] = page_total($offset,$limit,$total);
		
		$config = pag_tmp();
		$config['base_url'] = "interview".get_query_string(null,'offset');
		$config['total_rows'] = $total;
		$config['per_page'] = $limit;

		$this->pagination->initialize($config); 
		$xdata['pagination'] = $this->pagination->create_links();

		$data['content'] = $this->load->view('interview_list',$xdata,true);
		$this->load->view('template',$data);
	}
	public function search(){
		$data = array(
			'search'=>$this->input->post('search'),
			'limit'=>$this->input->post('limit'),
			'status'=>$this->input->post('status'),
			'interviewer'=>$this->input->post('interviewer'),
			'date_from'=>$this->input->post('date_from'),
			'date_to'=>$this->input->post('date_to'),
			'valid'=>$this->input->post('valid'),
			'audit'=>$this->input->post('audit'),
			'proses'=>$this->input->post('proses')
		);
		redirect('interview'.get_query_string($data));		
	}	
	public function phone($id){
		$this->form_validation->set_rules('status','Status','trim');
		if($this->form_validation->run()===false){
			$xdata['greeting'] = 'Selamat '.(date('G')<10?'pagi':(date('G')<15?'siang':'sore'));
			$xdata['greeting_english'] = 'Good '.(date('G')<10?'morning':(date('G')<15?'afternoon':'afternoon'));
			$xdata['candidate'] = $this->interview_model->get_candidate($id);
			$xdata['related'] = array();
			if ($xdata['candidate']->co) {
				$xdata['related'] 		= $this->interview_model->get_related($xdata['candidate']->id,$xdata['candidate']->interviewer,$xdata['candidate']->co);
			}
			$xdata['candidate']->tel = str_replace(array(' ','-'), '', $xdata['candidate']->tel);
			$xdata['candidate']->mobile = str_replace(array(' ','-'), '', $xdata['candidate']->mobile);
			$xdata['breadcrumb']	= 'interview'.get_query_string();
			$xdata['callhis']		= $this->interview_model->get_call($id);
			$xdata['action']		= 'interview/phone/'.$id.get_query_string();
			$data['content'] = $this->load->view('interview_form',$xdata,true);
			$this->load->view('template',$data);
		}else{
			$data = array(
				'status'=>$this->input->post('status'),
				'name_new'=>$this->input->post('name_new'),
				'title_new'=>$this->input->post('title_new'),
				'tel_new'=>$this->input->post('tel_new'),
				'mobile_new'=>$this->input->post('mobile_new'),
				'email_new'=>$this->input->post('email_new'),
				'valid'=>$this->input->post('valid')?$this->input->post('valid'):0,
				'audit'=>$this->input->post('audit')?$this->input->post('audit'):0,
				'resign'=>$this->input->post('resign')?$this->input->post('resign'):0,
				'called'=>$this->input->post('called')?$this->input->post('called'):0,
				'minute'=>$this->input->post('minute')?$this->input->post('minute'):0,
				'know'=>$this->input->post('know')?$this->input->post('know'):0,
				'pre_registered'=>$this->input->post('pre_registered')?$this->input->post('pre_registered'):0,
				'send_email'=>$this->input->post('send_email')?$this->input->post('send_email'):0,
				'get_email'=>$this->input->post('get_email')?$this->input->post('get_email'):0,
				'get_mobile'=>$this->input->post('get_mobile')?$this->input->post('get_mobile'):0,
				'title_ver'=>$this->input->post('title_ver'),
				'co_ver'=>$this->input->post('co_ver'),
				'add_ver'=>$this->input->post('add_ver'),
				'remark'=>$this->input->post('remark')
			);
			$this->interview_model->phone($id,$data);
			$this->session->set_flashdata('alert','<script>swal({type: "success",title: "Success",text: "Data has been saved",showConfirmButton: false,timer: 1500})</script>');
			redirect('interview/phone/'.$id.get_query_string());			
		}
	}
	public function send_email($id)
	{
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		if($this->form_validation->run()===false){
			echo '<div class="alert alert-danger">'.validation_errors().'</div>';
		}else{
			$email = $this->input->post('email');
			$fullname = $this->input->post('fullname');
			if($fullname<>''){
				$data['fullname'] = $fullname;
			}else{
				$data['fullname'] = $this->interview_model->get_name_by_id($id);
			}
			$data['telemarketer'] = $this->user_login['name'];
			$content = $this->load->view('email_'.$this->event['id'],$data,true);
			
			$this->load->library('email');

			$this->email->from('no-reply@adirect.web.id','BroadcastAsia2017');
			$this->email->to($email);
			$this->email->subject('Invitation to visit BroadcastAsia2017');
			$this->email->message($content);
			if (!$this->email->send()){
				echo '<div class="alert alert-danger">'.$this->email->print_debugger().'</div>';
			}else{
				$this->interview_model->send_email($id,$email);
				echo '<div class="alert alert-success">Sending email success!!!</div>';				
			}
		}
	}
}