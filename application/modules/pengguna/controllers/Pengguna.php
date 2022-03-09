<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Pengguna_model');
    if ($this->session->userdata('role') != 'administrator') {
      show_404();
    }
  }
  public function index()
  {
    $data['pengguna'] = $this->Pengguna_model->getAll();
    $this->render_backend('vw_pengguna', $data);
  }

  public function create()
  {
    $this->render_backend('create');
  }

  public function save()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == true) {
      $data['username'] = $this->input->post('username');
      $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
      $data['nama_pengguna'] = $this->input->post('nama_pengguna');
      $data['role'] = $this->input->post('role');
      $this->Pengguna_model->save($data);
      $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
      redirect('pengguna');
    } else {
      $this->render_backend('create');
    }
  }

  public function detail($id)
  {
    $data['pengguna'] = $this->Pengguna_model->getById($id);
    $this->render_backend('pengguna/detail', $data);
  }

  public function edit($id)
  {
    $data['pengguna'] = $this->Pengguna_model->getById($id);
    $this->render_backend('pengguna/edit', $data);
  }

  public function update()
  {
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required');
    // $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('role', 'Role', 'required');

    if ($this->form_validation->run() == true) {
      $id = $this->input->post('id');
      $data['username'] = $this->input->post('username');
      $data['nama_pengguna'] = $this->input->post('nama_pengguna');
      // $data['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
      $data['role'] = $this->input->post('role');
      $this->Pengguna_model->update($data, $id);
      $this->session->set_flashdata('message', 'Data berhasil diubah');
      redirect('pengguna');
    } else {
      $id = $this->input->post('id');
      $data['pengguna'] = $this->Pengguna_model->getById($id);
      $this->render_backend('create');
    }
  }

  public function delete($id)
  {
    $this->Pengguna_model->delete($id);
    $this->session->set_flashdata('message', 'Data berhasil dihapus');
    redirect('pengguna');
  }
}
