<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salesperson_commission extends CORE_Controller
{

    function __construct() {
        parent::__construct('');
        $this->validate_session();
        $this->load->model('Locations_model');
        $this->load->model('Users_model');
        $this->load->model('Trans_model');
        $this->load->model('Salesperson_model');
        $this->load->model('Salesperson_comm_model');
        $this->load->model('Salesperson_comm_items_model');
    }

    public function index() {
        $this->Users_model->validate();
        $data['_def_css_files'] = $this->load->view('template/assets/css_files', '', TRUE);
        $data['_def_js_files'] = $this->load->view('template/assets/js_files', '', TRUE);
        $data['_switcher_settings'] = $this->load->view('template/elements/switcher', '', TRUE);
        $data['_side_bar_navigation'] = $this->load->view('template/elements/side_bar_navigation', '', TRUE);
        $data['_top_navigation'] = $this->load->view('template/elements/top_navigation', '', TRUE);
        $data['title'] = 'Salesperson Commission Report';
        (in_array('8-3',$this->session->user_rights)? 
        $this->load->view('salesperson_commission_view', $data)
        :redirect(base_url('dashboard')));
        
    }

    function transaction($txn = null) {
        switch ($txn) {
            case 'list':
                $m_comm_info = $this->Salesperson_comm_model;
                $response['data'] = $m_comm_info->get_list(array('is_active'=>TRUE,'is_deleted'=>FALSE),
                    '*,
                    DATE_FORMAT(salesperson_comm_info.start_date,"%M %d %Y")as start_date,
                    DATE_FORMAT(salesperson_comm_info.end_date,"%M %d %Y")as end_date'
                    );
                // 
                echo json_encode($response);
                break;

            case 'generate':
                $m_salesperson = $this->Salesperson_model;
                $start = date('Y-m-d',strtotime($this->input->get('start')));
                $end = date('Y-m-d',strtotime($this->input->get('end')));
                $response['data'] = $m_salesperson->generate_salesperson_commission($start,$end);
                echo json_encode($response);
                break;

            case 'create':
                $m_comm_info = $this->Salesperson_comm_model;
                $m_comm_items = $this->Salesperson_comm_items_model;
                $m_comm_info->start_date = date('Y-m-d',strtotime($this->input->post('start_date', TRUE)));
                $m_comm_info->end_date = date('Y-m-d',strtotime($this->input->post('end_date', TRUE)));
                $m_comm_info->global_commission = $this->input->post('global_commission_percentage', TRUE);
                $m_comm_info->global_total = $this->get_numeric_value($this->input->post('total_commission_all', TRUE));


                $m_comm_info->remarks = $this->input->post('global_remarks', TRUE);
                $m_comm_info->set('date_created','NOW()');
                $m_comm_info->created_by_user=$this->session->user_id;
                $m_comm_info->save();

                $salesperson_comm_info_id=$m_comm_info->last_insert_id();
                $invoice_total=$this->input->post('invoice_total',TRUE);
                $inv_count=$this->input->post('inv_count',TRUE);
                $commission_percentage=$this->input->post('commission_percentage',TRUE);
                $void=$this->input->post('void',TRUE);
                $remarks=$this->input->post('remarks',TRUE);
                $total_commission=$this->input->post('total_commission',TRUE);
                $salesperson_id=$this->input->post('salesperson_id',TRUE);


                for($i=0;$i<=count($salesperson_id)-1;$i++){
                    if($void[$i] == '0'){ $void[$i] = 0; }
                    $m_comm_items->salesperson_comm_info_id=$salesperson_comm_info_id;
                    $m_comm_items->salesperson_id=$salesperson_id[$i];
                    $m_comm_items->void=$void[$i];
                    $m_comm_items->remarks=$remarks[$i];
                    $m_comm_items->remarks=$remarks[$i];
                    $m_comm_items->inv_count=$inv_count[$i];
                    $m_comm_items->inv_total=$this->get_numeric_value($invoice_total[$i]);
                    $m_comm_items->commission_percentage=$this->get_numeric_value($commission_percentage[$i]);
                    $m_comm_items->total_commission=$this->get_numeric_value($total_commission[$i]);
                    $m_comm_items->save();
                }

                // $m_trans=$this->Trans_model;
                // $m_trans->user_id=$this->session->user_id;
                // $m_trans->set('trans_date','NOW()');
                // $m_trans->trans_key_id=1; //CRUD
                // $m_trans->trans_type_id=48; // TRANS TYPE
                // $m_trans->trans_log='Created Location: '.$this->input->post('location_name', TRUE);
                // $m_trans->save();


                $response['title'] = 'Success!';
                $response['stat'] = 'success';
                $response['msg'] = 'Salesperson Commission Information Successfully Created.';
                $response['row_added'] = $m_comm_info->get_list($salesperson_comm_info_id,
                    '*,
                    DATE_FORMAT(salesperson_comm_info.start_date,"%M %d %Y")as start_date,
                    DATE_FORMAT(salesperson_comm_info.end_date,"%M %d %Y")as end_date'
                    );
                echo json_encode($response);

                break;

            case 'delete':
                $m_comm_info = $this->Salesperson_comm_model;

                $salesperson_comm_info_id=$this->input->post('salesperson_comm_info_id',TRUE);

                $m_comm_info->is_deleted=1;
                if($m_comm_info->modify($salesperson_comm_info_id)){
                    $response['title']='Success!';
                    $response['stat']='success';
                    $response['msg']='Salesperson Commission Information Successfully Deleted.';

                    // $m_trans=$this->Trans_model;
                    // $m_trans->user_id=$this->session->user_id;
                    // $m_trans->set('trans_date','NOW()');
                    // $m_trans->trans_key_id=3; //CRUD
                    // $m_trans->trans_type_id=48; // TRANS TYPE
                    // $m_trans->trans_log='Deleted Location: ID('.$location_id.')';
                    // $m_trans->save();

                    echo json_encode($response);
                }

                break;

        }
    }
}
