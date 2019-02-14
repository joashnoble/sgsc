<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Credit_ceiling_report extends CORE_Controller
	{
		function __construct()
		{
			parent::__construct();
			$this->validate_session();
			$this->load->model(
				array(
					'Journal_info_model',
					'Users_model',
					'Credit_ceiling_model',
					'Company_model'
				)
			);
            $this->load->library('excel');
            $this->load->model('Email_settings_model');
		}

		public function index()
		{	
			$this->Users_model->validate();
			$data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
	        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
	        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
	        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
	        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
	        $data['title'] = 'Credit Ceiling Report';
	     
	    (in_array('8-2',$this->session->user_rights)? 
        $this->load->view('credit_ceiling_report_view',$data )
        :redirect(base_url('dashboard')));
		}

		function transaction($txn=null) {
			switch($txn) {
				case 'list':
                $startDate = date('Y-m-d',strtotime($this->input->get('start')));
                $endDate = date('Y-m-d',strtotime($this->input->get('end')));
				$response['data']=$this->Credit_ceiling_model->get_customer_ceiling_report($startDate,$endDate);
					echo json_encode($response);
				break;


				case 'report':
					$m_company=$this->Company_model;
					$company_info=$m_company->get_list();
					$data['company_info']=$company_info[0];
					$startDate = date('Y-m-d',strtotime($this->input->get('start')));
					$endDate = date('Y-m-d',strtotime($this->input->get('end')));
					$data['start']=$startDate;
					$data['end']=$endDate;
					$data['customers']=$this->Credit_ceiling_model->get_customer_ceiling_report($startDate,$endDate);
					$this->load->view('template/credit_ceiling_content',$data);
				break;

				
			}
		}
	}
?>