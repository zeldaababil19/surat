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

    // ini page 2
    // $this->form_validation->set_rules('invoice', 'Invoice', 'required');
    // $this->form_validation->set_rules('po', 'PO Number', 'required');

    if ($this->form_validation->run() == true) {
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
      $this->form_validation->set_rules('quantity', 'Quantity', 'required');
      $this->form_validation->set_rules('amount', 'Amount', 'required');

      // if ($this->form_validation->run() == true) {
      $tgl = date('Y-m-d H:i:s');
      $data['idnmr_surat'] = $this->input->post('suratkeluar');
      $data['requestor_name'] = $this->session->userdata('nama');
      $data['pr_date'] = $tgl;
      $data['pr_type'] = $this->input->post('pr_type');
      $data['receiver_name'] = $this->input->post('rec_name');
      $data['due_date'] = $this->input->post('pay_date');
      $data['payment_method'] = $this->input->post('pay_method');
      $data['bank_number'] = $this->input->post('bank');
      $this->Payreq_model->save($data);
      // }

      $nmr_surat = $this->input->post('suratkeluar');
      $invoice = $this->input->post('invoice_number');
      $po = $this->input->post('po');
      $deskripsi = $this->input->post('deskripsi');
      $quantity = $this->input->post('quantity');
      $amount = $this->input->post('amount');

      $number = count($_POST['deskripsi']);
      for ($i = 0; $i < $number; $i++) {
        if (trim($_POST['deskripsi'][$i] != '')) {
          $data_pr['idnmr_surat'] = $nmr_surat;
          $data_pr['invoice_number'] = $invoice[$i];
          $data_pr['po_number'] = $po[$i];
          $data_pr['deskripsi'] = $deskripsi[$i];
          $data_pr['quantity'] = $quantity[$i];
          $data_pr['amount'] = $amount[$i];
          $this->Payreq_model->savedatapr($data_pr);
        }
      }
      $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
      redirect('payreq');
    } else {
      redirect('payreq/create');
    }
  }
}
