<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prtype extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Prtype_model');
    if ($this->session->userdata('role') != 'administrator') {
      show_404();
    }
  }

  public function index()
  {
    $data['prtype'] = $this->Prtype_model->getAll();
    $this->render_backend('vw_prtype', $data);
  }

  public function create()
  {
    $this->render_backend('create');
  }

  public function save()
  {
    $this->form_validation->set_rules('nama_prtype', 'Nama Prtype', 'required');
    $this->form_validation->set_rules('color', 'Color', 'required');

    if ($this->form_validation->run() == true) {
      $data['nama_pr'] = $this->input->post('nama_prtype');
      $data['color'] = $this->input->post('color');
      $this->Prtype_model->save($data);
      $this->session->set_flashdata('message', 'Data Berhasil ditambahkan');
      redirect('prtype');
    } else {
      $this->render_backend('create');
    }
  }

  public function edit($idmst_pr)
  {
    $data['prtype'] = $this->Prtype_model->getById($idmst_pr);
    $this->render_backend('prtype/edit', $data);
  }

  public function update()
  {
    $this->form_validation->set_rules('nama_prtype', 'Nama Prtype', 'required');
    $this->form_validation->set_rules('color', 'Color', 'required');

    if ($this->form_validation->run() == true) {
      $idmst_pr = $this->input->post('idmst_pr');
      $data['nama_pr'] = $this->input->post('nama_prtype');
      $data['color'] = $this->input->post('color');
      $this->Prtype_model->update($data, $idmst_pr);
      $this->session->set_flashdata('message', 'Data berhasil diubah');
      redirect('prtype');
    } else {
      $idmst_pr = $this->input->post('idmst_pr');
      $data['prtype'] = $this->Prtype_model->getById($idmst_pr);
      $this->render_backend('create');
    }
  }

  public function delete($idmst_pr)
  {
    $this->Prtype_model->delete($idmst_pr);
    $this->session->set_flashdata('message', 'Data berhasil dihapus');
    redirect('prtype');
  }
}
