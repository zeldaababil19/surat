<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Project_model');
    $this->load->model('../../instansi/models/Instansi_model');
    $this->load->model('../../perusahaan/models/Perusahaan_model');
  }

  public function index()
  {
    // $data['perusahaan'] = $this->Perusahaan_model->getAll();
    $data['project'] = $this->Project_model->getAll()->result();
    $this->render_backend('vw_project', $data);
  }

  public function create()
  {
    $data['instansi'] = $this->Instansi_model->getAll();
    $data['pt'] = $this->Perusahaan_model->getAll();
    $this->render_backend('create', $data);
  }

  public function save()
  {
    $this->form_validation->set_rules('nama_project', 'Nama Project', 'required');
    $this->form_validation->set_rules('no_urut_projek', 'No Urut Project', 'required');
    $this->form_validation->set_rules('pt', 'Perusahaan', 'required');
    $this->form_validation->set_rules('instansi', 'Instansi', 'required');
    $this->form_validation->set_rules('tahun', 'Tahun', 'required');
    // $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

    if ($this->form_validation->run() == true) {
      // $pt = $this->db->join('mst_pt', 'mst_pt.idmst_pt = project.id_pt')->get('project',)->row_array();
      // if (empty($pt)) {
      //   $this->session->set_flashdata('message', 'perusahaan yang dicari tidak ada');
      //   redirect('create');
      // }
      // $data['id_projek_pt'] = $this->input->post('tahun') . "/" . $pt['inisial_pt'] . "/" . $this->input->post('no_urut_projek');
      $data['id_projek_pt'] = $this->input->post('tahun') . "/" . $this->input->post('pt') . "/" . $this->input->post('no_urut_projek');
      $data['nama_projek'] = $this->input->post('nama_project');
      $data['no_urut_projek'] = $this->input->post('no_urut_projek');
      $data['id_pt'] = $this->input->post('pt');
      $data['id_instansi'] = $this->input->post('instansi');
      $data['tahun_projek'] = $this->input->post('tahun');
      $data['keterangan'] = $this->input->post('keterangan');
      $this->Project_model->save($data);
      $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
      redirect('project');
    } else {
      $this->render_backend('create');
    }
  }

  public function detail($idmst_project)
  {
    $data['project'] = $this->Project_model->getById($idmst_project);
    $this->render_backend('project/detail', $data);
  }

  public function edit($idmst_project)
  {
    $data['instansi'] = $this->Instansi_model->getAll();
    $data['pt'] = $this->Perusahaan_model->getAll();
    $data['project'] = $this->Project_model->getById($idmst_project);
    $this->render_backend('project/edit', $data);
  }

  public function update()
  {
    // $this->form_validation->set_rules('id_project', 'Id Project', 'required');
    $this->form_validation->set_rules('no_urut_projek', 'No Urut Project', 'required');
    // $this->form_validation->set_rules('pt', 'Perusahaan', 'required');
    // $this->form_validation->set_rules('instansi', 'Instansi', 'required');
    $this->form_validation->set_rules('nama_project', 'Nama Project', 'required');
    $this->form_validation->set_rules('tahun', 'Tahun', 'required');
    // $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

    if ($this->form_validation->run() == true) {
      $idmst_project = $this->input->post('id_project');
      // $data['id_project'] = $this->input->post('id_project');
      $data['no_urut_projek'] = $this->input->post('no_urut_projek');
      $data['id_pt'] = $this->input->post('pt');
      $data['id_instansi'] = $this->input->post('instansi');
      $data['nama_projek'] = $this->input->post('nama_project');
      $data['tahun_projek'] = $this->input->post('tahun');
      // $data['keterangan'] = $this->input->post('keterangan');
      $this->Project_model->update($data, $idmst_project);
      $this->session->set_flashdata('message', 'Data berhasil diubah');
      redirect('project');
    } else {
      $idmst_project = $this->input->post('idmst_project');
      $data['project'] = $this->Project_model->getById($idmst_project);
      $this->render_backend('create');
    }
  }

  public function delete($idmst_project)
  {
    $this->Project_model->delete($idmst_project);
    $this->session->set_flashdata('message', 'Data berasil dihapus');
    redirect('project');
  }
}
