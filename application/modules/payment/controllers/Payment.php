<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Payment_model');
    if ($this->session->userdata('role') != 'administrator') {
      show_404();
    }
  }

  public function index()
  {
    $data['payment'] = $this->Payment_model->getAll();
    $this->render_backend('vw_payment', $data);
  }

  public function create()
  {
    $this->render_backend('create');
  }

  public function save()
  {
    $this->form_validation->set_rules('nama_payment', 'Nama Payment', 'required');

    if ($this->form_validation->run() == true) {
      $data['nama_payment'] = $this->input->post('nama_payment');
      $this->Payment_model->save($data);
      $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
      redirect('payment');
    } else {
      $this->render_backend('create');
    }
  }

  public function edit($idmst_payment)
  {
    $data['payment'] = $this->Payment_model->getById($idmst_payment);
    $this->render_backend('payment/edit', $data);
  }

  public function update()
  {
    $this->form_validation->set_rules('nama_payment', 'Nama Payment', 'required');

    if ($this->form_validation->run() == true) {
      $idmst_payment = $this->input->post('idmst_payment');
      $data['nama_payment'] = $this->input->post('nama_payment');
      $this->Payment_model->update($data, $idmst_payment);
      $this->session->set_flashdata('message', 'Data berhasil diubah');
      redirect('payment');
    } else {
      $idmst_payment = $this->input->post('idmst_payment');
      $data['payment'] = $this->Payment_model->getById($idmst_payment);
      $this->render_backend('create');
    }
  }

  public function delete($idmst_payment)
  {
    $this->Payment_model->delete($idmst_payment);
    $this->session->set_flashdata('message', 'Data berhasil dihapus');
    redirect('payment');
  }
}
