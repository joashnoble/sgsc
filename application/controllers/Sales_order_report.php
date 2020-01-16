<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales_order_report extends CORE_Controller {

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model(array(
            'Sales_order_report_model',
            'Company_model',
            'Users_model',
            'Customers_model'
        ));
        $this->load->library('excel');
        $this->load->model('Email_settings_model');

    }

    public function index() {
        $this->Users_model->validate();
        $data['_def_css_files']=$this->load->view('template/assets/css_files','',TRUE);
        $data['_def_js_files']=$this->load->view('template/assets/js_files','',TRUE);
        $data['_switcher_settings']=$this->load->view('template/elements/switcher','',TRUE);
        $data['_side_bar_navigation']=$this->load->view('template/elements/side_bar_navigation','',TRUE);
        $data['_top_navigation']=$this->load->view('template/elements/top_navigation','',TRUE);

        $data['customers']=$this->Customers_model->get_customer_list_for_sales_report();

        $data['title']='Sales Order Report';
        

        (in_array('12-8',$this->session->user_rights)? 
        $this->load->view('sales_order_report_view',$data)
        :redirect(base_url('dashboard')));
    }


    function transaction($txn=null){
        switch($txn){
            case 'per-sales-detailed-customers':
                $m_sales_order=$this->Sales_order_report_model;
                $start=date("Y-m-d",strtotime($this->input->get('startDate',TRUE)));
                $end=date("Y-m-d",strtotime($this->input->get('endDate',TRUE)));

                $response['data']=$m_sales_order->get_orders_detailed_customers($start,$end);

                echo(json_encode($response));
            break;

            case 'per-sales-summary-customers':
                $m_sales_order=$this->Sales_order_report_model;
                $start=date("Y-m-d",strtotime($this->input->get('startDate',TRUE)));
                $end=date("Y-m-d",strtotime($this->input->get('endDate',TRUE)));

                $response['data']=$m_sales_order->get_orders_summary_customers($start,$end);

                echo(json_encode($response));
            break;

            case 'detailed-report-print-sales-order': 
                $m_company_info=$this->Company_model;
                $m_sales_order=$this->Sales_order_report_model;

                $company_info=$m_company_info->get_list();
                $data['company_info']=$company_info[0];
                $startDate=date('Y-m-d',strtotime($this->input->get('startDate')));
                $endDate=date('Y-m-d',strtotime($this->input->get('endDate')));
                $type=$this->input->get('type',TRUE);
                $data['customers']=$m_sales_order->get_orders_list_customers($startDate,$endDate);
                $data['sales_details']=$m_sales_order->get_orders_detailed_customers($startDate,$endDate);

                $this->load->view('template/sales_order_detailed_report_content',$data);

            break;

            case 'summary-report-print-sales-order': 
                $m_company_info=$this->Company_model;
                $m_sales_order=$this->Sales_order_report_model;

                $company_info=$m_company_info->get_list();
                $data['company_info']=$company_info[0];
                $startDate=date('Y-m-d',strtotime($this->input->get('startDate')));
                $endDate=date('Y-m-d',strtotime($this->input->get('endDate')));
                $type=$this->input->get('type',TRUE);
                $data['sales_summaries']=$m_sales_order->get_orders_summary_customers($startDate,$endDate);
                $this->load->view('template/sales_order_report_summary_content',$data);

            break;

              }
    }



}
