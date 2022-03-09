<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapr extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Datapr_model');
    $this->load->model('../../suratkeluar/models/Suratkeluar_model');
  }

  public function create($idnmr_surat)
  {
    $data['suratkeluar'] = $this->Suratkeluar_model->getById($idnmr_surat);
    $this->render_backend('datapr/create', $data);
  }
}
