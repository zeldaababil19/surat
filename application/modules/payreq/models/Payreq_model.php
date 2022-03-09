<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payreq_model extends CI_Model
{
  private $table = 'payreq';
  private $table_data_pr = 'data_pr';

  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('payreq');
    $this->db->join('nmr_surat', 'nmr_surat.idnmr_surat = payreq.idnmr_surat');
    $this->db->join('mst_pr', 'mst_pr.idmst_pr = payreq.pr_type');
    $this->db->join('mst_payment', 'mst_payment.idmst_payment = payreq.payment_method');
    $this->db->join('mst_kodesurat', 'mst_kodesurat.idmst_kodesurat=nmr_surat.id_jenis_surat');
    $this->db->join('project', 'project.id_project = nmr_surat.id_projek');
    $this->db->join('mst_bulan', 'mst_bulan.idmst_bulan = nmr_surat.bulan');
    $this->db->join('mst_pt', 'mst_pt.idmst_pt = project.id_pt');
    $this->db->join('mst_instansi', 'mst_instansi.idmst_instansi = project.id_instansi');
    $query = $this->db->get();
    return $query;
  }

  public function save($data)
  {
    return $this->db->insert($this->table, $data);
  }

  public function savedatapr($data_pr)
  {
    return $this->db->insert($this->table_data_pr, $data_pr);
  }
}
