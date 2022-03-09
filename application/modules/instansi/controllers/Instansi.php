<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instansi extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Instansi_model');
    if ($this->session->userdata('role') != 'administrator') {
      show_404();
    }
  }

  public function index()
  {
    $data['instansi'] = $this->Instansi_model->getAll();
    $this->render_backend('vw_instansi', $data);
  }

  public function create()
  {
    $this->render_backend('create');
  }

  public function save()
  {
    $this->form_validation->set_rules('nama_instansi', 'Nama Instansi', 'required');
    $this->form_validation->set_rules('inisial_instansi', 'Inisial Instansi', 'required');

    if ($this->form_validation->run() == true) {
      $data['nama_instansi'] = $this->input->post('nama_instansi');
      $data['inisial_instansi'] = $this->input->post('inisial_instansi');
      $this->Instansi_model->save($data);
      $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
      redirect('instansi');
    } else {
      $this->render_backend('create');
    }
  }

  public function edit($idmst_instansi)
  {
    $data['instansi'] = $this->Instansi_model->getById($idmst_instansi);
    $this->render_backend('instansi/edit', $data);
  }

  public function update()
  {
    $this->form_validation->set_rules('nama_instansi', 'Nama Instansi', 'required');
    $this->form_validation->set_rules('inisial_instansi', 'Inisial Instansi', 'required');

    if ($this->form_validation->run() == true) {
      $idmst_instansi = $this->input->post('idmst_instansi');
      $data['nama_instansi'] = $this->input->post('nama_instansi');
      $data['inisial_instansi'] = $this->input->post('inisial_instansi');
      $this->Instansi_model->update($data, $idmst_instansi);
      $this->session->set_flashdata('message', 'Data berhasil diubah');
      redirect('instansi');
    } else {
      $idmst_instansi = $this->input->post('idmst_instansi');
      $data['instansi'] = $this->Instansi_model->getById($idmst_instansi);
      $this->render_backend('create');
    }
  }

  public function delete($idmst_instansi)
  {
    $this->Instansi_model->delete($idmst_instansi);
    $this->session->set_flashdata('message', 'Data berhasil dihapus');
    redirect('instansi');
  }
}
