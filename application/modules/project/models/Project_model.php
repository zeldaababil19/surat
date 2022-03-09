<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project_model extends CI_Model
{
  private $table = 'project';

  public function getProject()
  {
    return $this->db->get($this->table)->result();
  }

  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('project');
    $this->db->join('mst_instansi', 'mst_instansi.idmst_instansi=project.id_instansi');
    $this->db->join('mst_pt', 'mst_pt.idmst_pt = project.id_pt');
    $query = $this->db->get();
    return $query;
  }

  public function save($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function getById($id)
  {
    $this->db->select('*');
    $this->db->from('project');
    $this->db->join('mst_instansi', 'mst_instansi.idmst_instansi = project.id_instansi');
    $this->db->join('mst_pt', 'mst_pt.idmst_pt=project.id_pt');
    $this->db->where('id_project', $id);
    $query = $this->db->get()->row();
    return $query;
  }

  public function update($data, $id)
  {
    return $this->db->update($this->table, $data, array('id_project' => $id));
  }

  public function delete($id)
  {
    return $this->db->delete($this->table, array('id_project' => $id));
  }
}
