<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payreq extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Payreq_model');
    $this->load->model('../../suratkeluar/models/Suratkeluar_model');
    $this->load->model('../../prtype/models/Prtype_model');
    $this->load->model('../../payment/models/Payment_model');
  }

  public function index()
  {
    $data['payreq'] = $this->Payreq_model->getAll()->result();
    $this->render_backend('vw_payreq', $data);
  }

  public function create()
  {
    $data['suratkeluar'] = $this->Suratkeluar_model->getAll()->result();
    $data['prtype'] = $this->Prtype_model->getAll();
    $data['payment'] = $this->Payment_model->getAll();
    $this->render_backend('payreq/create', $data);
  }

  public function save()
  {
    $this->form_validation->set_rules('suratkeluar', 'Nomor Surat Keluar', 'required');
    $this->form_validation->set_rules('pr_date', 'Date', 'required');
    $this->form_validation->set_rules('req_name', 'Requestor Name', 'required');
    $this->form_validation->set_rules('pr_type', 'Payment Request Type', 'required');
    $this->form_validation->set_rules('rec_name', 'Receiver Name', 'required');
    $this->form_validation->set_rules('pay_date', 'Payment Date', 'required');
    $this->form_validation->set_rules('pay_method', 'Payment Method', 'required');
    // $this->form_validation->set_rules('bank', 'Bank Account', 'required');  /// tidak mandatory
    
  }
}
