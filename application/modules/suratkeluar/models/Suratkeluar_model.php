<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Suratkeluar_model extends CI_Model
{
  private $tablebulan = 'mst_bulan';
  private $table = 'nmr_surat';

  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('nmr_surat');
    $this->db->join('mst_kodesurat', 'mst_kodesurat.idmst_kodesurat=nmr_surat.id_jenis_surat');
    $this->db->join('project', 'project.id_project = nmr_surat.id_projek');
    $this->db->join('mst_bulan', 'mst_bulan.idmst_bulan = nmr_surat.bulan');
    $this->db->join('mst_pt', 'mst_pt.idmst_pt = project.id_pt');
    $this->db->join('mst_instansi', 'mst_instansi.idmst_instansi = project.id_instansi');
    $query = $this->db->get();
    return $query;
  }

  public function getAllBulan()
  {
    return $this->db->get($this->tablebulan)->result();
  }

  public function save($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function getProjectById($id)
  {
    $this->db->select('*');
    $this->db->from('project');
    $this->db->join('mst_instansi', 'mst_instansi.idmst_instansi = project.id_instansi');
    $this->db->join('mst_pt', 'mst_pt.idmst_pt = project.id_pt');
    $this->db->where('id_project', $id);
    $query = $this->db->get()->row();
    return $query;
    // return $this->db->get_where($this->project, ['id_project' => $id])->row();
  }

  public function getById($id)
  {
    $this->db->select('*');
    $this->db->from('nmr_surat');
    $this->db->join('mst_kodesurat', 'mst_kodesurat.idmst_kodesurat = nmr_surat.id_jenis_surat');
    $this->db->join('project', 'project.id_project = nmr_surat.id_projek');
    $this->db->join('mst_bulan', 'mst_bulan.idmst_bulan = nmr_surat.bulan');
    $this->db->join('mst_pt', 'mst_pt.idmst_pt=project.id_pt');
    $this->db->join('mst_instansi', 'mst_instansi.idmst_instansi = project.id_instansi');
    $this->db->where('idnmr_surat', $id);
    $query = $this->db->get()->row();
    return $query;
  }

  public function update($data, $id)
  {
    return $this->db->update($this->table, $data, array('idnmr_surat' => $id));
  }

  public function delete($id)
  {
    return $this->db->delete($this->table, array('idnmr_surat' => $id));
  }
}
