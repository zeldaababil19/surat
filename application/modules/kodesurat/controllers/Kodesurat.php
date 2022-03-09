<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kodesurat extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kodesurat_model');
    if ($this->session->userdata('role') != 'administrator') {
      show_404();
    }
  }

  public function index()
  {
    $data['kodesurat'] = $this->Kodesurat_model->getAll();
    $this->render_backend('vw_kodesurat', $data);
  }

  public function create()
  {
    $this->render_backend('create');
  }

  public function save()
  {
    $this->form_validation->set_rules('nama_kodesurat', 'Nama Kode Surat', 'required');
    $this->form_validation->set_rules('kode_surat', 'Kode Surat', 'required');

    if ($this->form_validation->run() == true) {
      $data['nama'] = $this->input->post('nama_kodesurat');
      $data['kode_surat'] = $this->input->post('kode_surat');
      $this->Kodesurat_model->save($data);
      $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
      redirect('kodesurat');
    } else {
      $this->render_backend('create');
    }
  }

  public function detail($idmst_kodesurat)
  {
    $data['kodesurat'] = $this->Kodesurat_model->getById($idmst_kodesurat);
    $this->render_backend('kodesurat/detail', $data);
  }

  public function edit($idmst_kodesurat)
  {
    $data['kodesurat'] = $this->Kodesurat_model->getById($idmst_kodesurat);
    $this->render_backend('kodesurat/edit', $data);
  }

  public function update()
  {
    $this->form_validation->set_rules('nama_kodesurat', 'Nama Kode Surat', 'required');
    $this->form_validation->set_rules('kode_surat', 'Kode Surat', 'required');

    if ($this->form_validation->run() == true) {
      $idmst_kodesurat = $this->input->post('idmst_kodesurat');
      $data['nama'] = $this->input->post('nama_kodesurat');
      $data['kode_surat'] = $this->input->post('kode_surat');
      $this->Kodesurat_model->update($data, $idmst_kodesurat);
      $this->session->set_flashdata('message', 'Data berhasil diubah');
      redirect('kodesurat');
    } else {
      $idmst_kodesurat = $this->input->post('idmst_kodesurat');
      $data['kodesurat'] = $this->Kodesurat_model->getById($idmst_kodesurat);
      $this->render_backend('create');
    }
  }

  public function delete($idmst_kodesurat)
  {
    $this->Kodesurat_model->delete($idmst_kodesurat);
    $this->session->set_flashdata('message', 'Data berhasil dihapus');
    redirect('kodesurat');
  }
}
