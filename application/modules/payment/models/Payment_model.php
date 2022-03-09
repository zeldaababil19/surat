<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment_model extends CI_Model
{
  private $table = 'mst_payment';

  public function getAll()
  {
    return $this->db->get($this->table)->result();
  }

  public function save($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function getById($id)
  {
    return $this->db->get_where($this->table, ['idmst_payment' => $id])->row();
  }

  public function update($data, $id)
  {
    return $this->db->update($this->table, $data, array('idmst_payment' => $id));
  }

  public function delete($id)
  {
    return $this->db->delete($this->table, array('idmst_payment' => $id));
  }
}
