<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payreq_model extends CI_Model
{
  private $table = 'payreq';

  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('payreq');
    $this->db->join('nmr_surat', 'nmr_surat.idnmr_surat = payreq.idnmr_surat');
    $this->db->join('mst_pr', 'mst_pr.idmst_pr = payreq.pr_type');
    $this->db->join('mst_payment', 'mst_payment.idmst_payment = payreq.payment_method');
    $query = $this->db->get();
    return $query;
  }
}
