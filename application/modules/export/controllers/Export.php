<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Export extends MY_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('master/master_model');
		$this->load->model('export_model');
		$this->load->model('interview/callhis_model');
	}
	public function index(){
		$data['content'] = $this->load->view('export','',true);
		$this->load->view('template',$data);
	}
	public function execute(){		
		$this->form_validation->set_rules('date_from','Date From','trim');
		$this->form_validation->set_rules('date_to','Date To','trim');
		if($this->form_validation->run()===false){
			$this->session->set_flashdata('alert','<div class="alert alert-danger">'.validation_errors().'</div>');
			$data['content'] = $this->load->view('export','',true);
			$this->load->view('template',$data);			
		}else{
			ini_set('memory_limit','-1'); 
			
			require_once "../assets/phpexcel/PHPExcel.php";
			$excel = new PHPExcel();
			
			$excel->setActiveSheetIndex(0);
			$active_sheet = $excel->getActiveSheet();
			$active_sheet->setTitle('Candidate');
			
			//style
			$active_sheet->getStyle("A1:AB1")->getFont()->setBold(true);

			//header
			$active_sheet->setCellValue('A1', 'SERIAL');
			$active_sheet->setCellValue('B1', 'NAME');
			$active_sheet->setCellValue('C1', 'TITLE');
			$active_sheet->setCellValue('D1', 'DEPT');
			$active_sheet->setCellValue('E1', 'CO');
			$active_sheet->setCellValue('F1', 'ADD1');
			$active_sheet->setCellValue('G1', 'ADD2');
			$active_sheet->setCellValue('H1', 'STATE');
			$active_sheet->setCellValue('I1', 'COUNTRY');
			$active_sheet->setCellValue('J1', 'TEL');
			$active_sheet->setCellValue('K1', 'FAX');
			$active_sheet->setCellValue('L1', 'MOBILE');
			$active_sheet->setCellValue('M1', 'EMAIL');
			$active_sheet->setCellValue('N1', 'WEB');
			$active_sheet->setCellValue('O1', 'NEW NAME');
			$active_sheet->setCellValue('P1', 'NEW TITLE');
			$active_sheet->setCellValue('Q1', 'NEW TEL');
			$active_sheet->setCellValue('R1', 'NEW MOBILE');
			$active_sheet->setCellValue('S1', 'NEW EMAIL');
			$active_sheet->setCellValue('T1', 'KNOW EVENT');
			$active_sheet->setCellValue('U1', 'GET EMAIL');
			$active_sheet->setCellValue('V1', 'GET MOBILE');
			$active_sheet->setCellValue('W1', 'TITLE VERIFICATION');
			$active_sheet->setCellValue('X1', 'CO VERIFICATION');
			$active_sheet->setCellValue('Y1', 'ADD VERIFICATION');
			$active_sheet->setCellValue('Z1', 'REMARK');
			$active_sheet->setCellValue('AA1', 'DISTRIBUTION DATE');
			$active_sheet->setCellValue('AB1', 'STATUS');
			$active_sheet->setCellValue('AC1', 'CALL HISTORY');
			$active_sheet->setCellValue('AD1', 'TOTAL DIALED');
			
			$date_from 	= format_ymd($this->input->post('date_from'));
			$date_to 	= format_ymd($this->input->post('date_to'));

			$result 	= $this->export_model->export($date_from,$date_to)->result();
			// $result 	= array();
			$i=2;
			foreach($result as $r){				
				$active_sheet->setCellValueExplicit('A'.$i, $r->serial);
				$active_sheet->setCellValue('B'.$i, $r->name);
				$active_sheet->setCellValue('C'.$i, $r->title);
				$active_sheet->setCellValue('D'.$i, $r->dept);
				$active_sheet->setCellValue('E'.$i, $r->co);
				$active_sheet->setCellValue('F'.$i, $r->add1);
				$active_sheet->setCellValue('G'.$i, $r->add2);
				$active_sheet->setCellValue('H'.$i, $r->state);
				$active_sheet->setCellValue('I'.$i, $r->country);
				$active_sheet->setCellValueExplicit('J'.$i, $r->tel);
				$active_sheet->setCellValueExplicit('K'.$i, $r->fax);
				$active_sheet->setCellValueExplicit('L'.$i, $r->mobile);
				$active_sheet->setCellValue('M'.$i, $r->email);
				$active_sheet->setCellValue('N'.$i, $r->web);
				$active_sheet->setCellValue('O'.$i, $r->name_new);
				$active_sheet->setCellValue('P'.$i, $r->title_new);
				$active_sheet->setCellValueExplicit('Q'.$i, $r->tel_new);
				$active_sheet->setCellValueExplicit('R'.$i, $r->mobile_new);
				$active_sheet->setCellValue('S'.$i, $r->email_new);
				$active_sheet->setCellValue('T'.$i, $this->yesno($r->know));
				$active_sheet->setCellValue('U'.$i, $this->yesno($r->get_email));
				$active_sheet->setCellValue('V'.$i, $this->yesno($r->get_mobile));
				$active_sheet->setCellValue('W'.$i, $r->title_ver);
				$active_sheet->setCellValue('X'.$i, $r->co_ver);
				$active_sheet->setCellValue('Y'.$i, $r->add_ver);
				$active_sheet->setCellValue('Z'.$i, $r->remark);
				$active_sheet->setCellValue('AA'.$i, PHPExcel_Shared_Date::PHPToExcel(date_to_excel($r->dist_date)));
				$active_sheet->getStyle('AA'.$i)->getNumberFormat()->setFormatCode('dd/mm/yyyy');		   
				$active_sheet->setCellValue('AB'.$i, $r->status_name);
				$callhis = $this->general->callhis($r->id);
				$active_sheet->setCellValue('AC'.$i, implode(',',$callhis));
				$active_sheet->setCellValue('AD'.$i, count($callhis));
				$i++;
			}

			$filename=$this->event['name'].' '.date('Ymd_His').'.xlsx';
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$filename.'"');
			header('Cache-Control: max-age=0');
								 
			$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');  
			$objWriter->save('php://output');										
		}
	}
	private function overseas($id)
	{
		switch ($id) {
			case 1:
				return "Belum pernah sama sekali";
				break;
			case 2:
				return "3 tahun yang lalu";
				break;
			case 3:
				return "2 tahun yang lalu";
				break;
			case 4:
				return "1 tahun yang lalu";
				break;
			case 5:
				return "Kurang lebih 6 bulan yang lalu";
				break;
			case 6:
				return "Dalam 3 bulan terakhir ini";
				break;
			case 7:
				return "Dalam 1 bulan terakhir ini";
				break;			
			default:
				return "";
				break;
		}
	}
	private function yesno($id)
	{
		switch ($id) {
			case 1:
				return "Yes";
				break;
			case 2:
				return "no";
				break;
			default:
				return "";
				break;
		}
	}
	private function english3($id)
	{
		switch ($id) {
			case 1:
				return "Billboard";
				break;
			case 2:
				return "Magazine";
				break;
			case 3:
				return "Newspaper";
				break;
			case 4:
				return "Cinema Ad";
				break;
			default:
				return "";
				break;
		}
	}
}