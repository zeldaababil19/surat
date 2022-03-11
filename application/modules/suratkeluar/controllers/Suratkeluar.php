<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratkeluar extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Suratkeluar_model');
    $this->load->model('../../instansi/models/Instansi_model');
    $this->load->model('../../perusahaan/models/Perusahaan_model');
    $this->load->model('../../kodesurat/models/Kodesurat_model');
    $this->load->model('../../Project/models/Project_model');
  }

  public function index()
  {
    $data['suratkeluar'] = $this->Suratkeluar_model->getAll()->result();
    $this->render_backend('vw_suratkeluar', $data);
  }

  public function cariproject()
  {
    // $id = $_GET['id_project'];
    $id = $this->input->post('id');
    $cari = $this->Suratkeluar_model->getProjectById($id);
    echo json_encode($cari);
  }

  public function create()
  {
    $data['bulan'] = $this->Suratkeluar_model->getAllBulan();
    $data['project'] = $this->Project_model->getAll()->result();
    $data['jenissurat'] = $this->Kodesurat_model->getAll();
    // $data['instansi'] = $this->Instansi_model->getAll();
    // $data['pt'] = $this->Perusahaan_model->getAll();
    $this->render_backend('create', $data);
  }

  public function save()
  {
    $this->form_validation->set_rules('id_project', 'ID Project', 'required');
    $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
    // $this->form_validation->set_rules('id_pt', 'Perusahaan', 'required');
    // $this->form_validation->set_rules('id_instansi', 'Instansi', 'required');
    $this->form_validation->set_rules('jenis_surat', 'Jenis Surat', 'required');
    $this->form_validation->set_rules('bulan', 'Bulan', 'required');
    $this->form_validation->set_rules('tahun', 'Tahun', 'required');
    // $this->form_validation->set_rules('tgl', 'Date', 'required');

    if ($this->form_validation->run() == true) {
      $tgl = date('Y-m-d H:i:s');
      // $nourut = $this->db->join('project', 'project.id_project = nmr_surat.id_project')->get('nmr_surat')->row_array();

      // if (empty($nourut)) {
      //   $this->session->set_flashdata('message', 'Data tidak ada');
      //   redirect('create');
      // }
      // $pt = $this->db->join(tableName, on);
      // $data['nomor_surat'] = $nourut['no_urut_projek'] . "/" . $this->input->post('no_surat') . "/" . $nourut['id_pt'] . "/" . $this->input->post('jenis_surat') . "/" . $nourut['id_instansi'] . "/" . $this->input->post('bulan') . "/" . $this->input->post('tahun');
      $data['nomor_surat'] = $this->input->post('no_surat');
      $data['bulan'] = $this->input->post('bulan');
      $data['tahun'] = $this->input->post('tahun');
      $data['id_projek'] = $this->input->post('id_project');
      $data['id_jenis_surat'] = $this->input->post('jenis_surat');
      $data['createAt'] = $tgl;
      $this->Suratkeluar_model->save($data);
      $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
      redirect('suratkeluar');
    } else {
      $this->render_backend('create');
    }
  }

  public function detail($idnmr_surat)
  {
    $data['suratkeluar'] = $this->Suratkeluar_model->getById($idnmr_surat);
    $this->render_backend('suratkeluar/detail', $data);
  }

  public function edit($idnmr_surat)
  {
    $data['suratkeluar'] = $this->Suratkeluar_model->getById($idnmr_surat);
    $this->render_backend('suratkeluar/edit', $data);
  }

  public function update()
  {
    $this->form_validation->set_rules('id_project', 'ID Project', 'required');
    $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
    // $this->form_validation->set_rules('id_pt', 'Perusahaan', 'required');
    // $this->form_validation->set_rules('id_instansi', 'Instansi', 'required');
    $this->form_validation->set_rules('jenis_surat', 'Jenis Surat', 'required');
    $this->form_validation->set_rules('bulan', 'Bulan', 'required');
    $this->form_validation->set_rules('tahun', 'Tahun', 'required');
    // $this->form_validation->set_rules('tgl', 'Date', 'required');

    if ($this->form_validation->run() == true) {
      $tgl = date('Y-m-d H:i:s');
      $idnmr_surat = $this->input->post('idnmr_surat');
      // $nourut = $this->db->join('project', 'project.id_project = nmr_surat.id_project')->get('nmr_surat')->row_array();

      // if (empty($nourut)) {
      //   $this->session->set_flashdata('message', 'Data tidak ada');
      //   redirect('create');
      // }
      // $pt = $this->db->join(tableName, on);
      // $data['nomor_surat'] = $nourut['no_urut_projek'] . "/" . $this->input->post('no_surat') . "/" . $nourut['id_pt'] . "/" . $this->input->post('jenis_surat') . "/" . $nourut['id_instansi'] . "/" . $this->input->post('bulan') . "/" . $this->input->post('tahun');
      $data['nomor_surat'] = $this->input->post('no_surat');
      $data['bulan'] = $this->input->post('bulan');
      $data['tahun'] = $this->input->post('tahun');
      $data['id_projek'] = $this->input->post('id_project');
      $data['id_jenis_surat'] = $this->input->post('jenis_surat');
      $data['createAt'] = $tgl;
      $this->Suratkeluar_model->update($data, $idnmr_surat);
      $this->session->set_flashdata('message', 'Data berhasil ditambahkan');
      redirect('suratkeluar');
    } else {
      $idnmr_surat = $this->input->post('idnmr_surat');
      $data['suratkeluar'] = $this->Suratkeluar_model->getById($idnmr_surat);
      $this->render_backend('create');
    }
  }

  public function delete($idnmr_surat)
  {
    $this->Suratkeluar_model->delete($idnmr_surat);
    $this->session->set_flashdata('message', 'Data berhasil dihapus');
    redirect('suratkeluar');
  }
}
