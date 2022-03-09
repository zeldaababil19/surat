<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->authenticated(); ///panggil fungsi authenticated
  }

  public function authenticated() /// fungsi berguna untuk mengecek user login atau belum
  {
    /// pertama cek dulu apakah controller yang diakses saat ini adalah controller auth atau bukan
    /// karena fungsi cek login diberlakukan hanya untuk controller selain controller auth
    if ($this->uri->segment(1) != 'auth' && $this->uri->segment(1) != '') {
      /// cek apakah terdapat session dengan nama 'authenticated'
      if (!$this->session->userdata('authenticated')) /// jika tidak ada / artinya belum ada login

        redirect('auth'); /// redirect ke halaman login
    }
  }

  public function render_login($content, $data = NULL)
  {
    /*
    * $data['content']
    * variabel diatas ^ akan dikirim ke view/template/login/index.php
    */

    $data['content'] = $this->load->view($content, $data, true);
    $this->load->view('template/login/index', $data);
  }

  public function render_backend($content, $data = NULL)
  {
    /*
    * $data['content'] & $data['header']
    * variabel diatas ^ akan dikirim ke view/template/backend/index.php
    */

    $data['header'] = $this->load->view('template/backend/header', $data, true);
    $data['content'] = $this->load->view($content, $data, true);

    $this->load->view('template/backend/index', $data);
  }
}
