<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Perusahaan_model');
    if ($this->session->userdata('role') != 'administrator') {
      show_404();
    }
  }

  public function index()
  {
    $data['pt'] = $this->Perusahaan_model->getAll();
    $this->render_backend('vw_perusahaan', $data);
  }

  public function create()
  {
    $this->render_backend('create');
  }

  public function save()
  {
    $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
    $this->form_validation->set_rules('inisial_perusahaan', 'Inisial Perusahaan', 'required');

    if ($this->form_validation->run() == true) {
      $data['nama_pt'] = $this->input->post('nama_perusahaan');
      $data['inisial_pt'] = $this->input->post('inisial_perusahaan');
      $this->Perusahaan_model->save($data);
      $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
      redirect('perusahaan');
    } else {
      $this->render_backend('create');
    }
  }

  public function edit($idmst_pt)
  {
    $data['pt'] = $this->Perusahaan_model->getById($idmst_pt);
    $this->render_backend('perusahaan/edit', $data);
  }

  public function update()
  {
    $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required');
    $this->form_validation->set_rules('inisial_perusahaan', 'Inisial Perusahaan', 'required');

    if ($this->form_validation->run() == true) {
      $idmst_pt = $this->input->post('idmst_pt');
      $data['nama_pt'] = $this->input->post('nama_perusahaan');
      $data['inisial_pt'] = $this->input->post('inisial_perusahaan');
      $this->Perusahaan_model->update($data, $idmst_pt);
      $this->session->set_flashdata('message', 'Data berhasil diubah');
      redirect('perusahaan');
    } else {
      $idmst_pt = $this->input->post('idmst_pt');
      $data['pt'] = $this->Perusahaan_model->getById($idmst_pt);
      $this->render_backend('create');
    }
  }

  public function delete($idmst_pt)
  {
    $this->Perusahaan_model->delete($idmst_pt);
    $this->session->set_flashdata('message', 'Data berhasil dihapus');
    redirect('perusahaan');
  }
}
