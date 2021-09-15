<?php

class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login') != true){
          redirect('');
        }
        $this->load->model('Adjustment/M_adjustment', 'm_adjust');
        $this->load->model('Adjustment/M_adjustment_item', 'm_adjust_item');
        $this->load->model('Masterdata/Products/M_spesification', 'm_uom');
    }

    public function index(){
        $name = $this->session->userdata('name');
        $counted = $this->m_adjust->count_all_data('Created')->num_rows();
        $countedApproved = $this->m_adjust->count_all_data('Approved')->num_rows();
        $allData = $this->m_adjust->get_all_data()->result_array();
        $incomingChild = $this->m_adjust_item->get_all_data_child('In')->result_array();
        $outgoingChild = $this->m_adjust_item->get_all_data_child('Out')->result_array();
        $allDataUOM = $this->m_uom->get_data();
        $dataUom = [];
        foreach($allDataUOM as $row){
            $arrData = $row['uom_name'];
            // var_dump($arrData); die;
        }
        $incoming = 0;
        $outgoing = 0;
        $data = ['name' => 'Fikri'];
        if(count($allData) > 0){
            foreach($allData as $row){
                $secData = $this->m_adjust->get_all_data_approved('Approved')->num_rows();
                $canceledData = $this->m_adjust->get_all_data_approved('Canceled')->num_rows();
                $allElement = $this->m_adjust->get_all_data()->num_rows();
                $count = ($secData * 100) / $allElement;
            }
            array_push($data, $canceledData);
            array_push($data, $count);
            foreach($incomingChild as $row){
                $incoming += $row['quantity'];
            }
            foreach($outgoingChild as $row){
                $outgoing += $row['quantity'];
            }
        }
        // var_dump($incomingChild); die;
        $this->load->view('Template/Header');
        $this->load->view('Dashboard/Index', compact('name', 'counted', 'incoming', 'outgoing', 'data', 'canceledData', 'countedApproved'));
    }
    
}
