<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
  }

  public function index()
  {
    if ($this->session->userdata('authenticated')) {
      redirect('home');
    }
    $this->render_login('template/login/login');
  }

  public function login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $user = $this->User_model->get($username);

    if (empty($user)) {
      $this->session->set_flashdata('message', 'Username tidak ditemukan');
      redirect('auth');
    } else {
      if (password_verify($password, $user->password)) {
        $session = array(
          'authenticated' => true,
          'username' => $user->username,
          'nama' => $user->nama,
          'role' => $user->role,
        );

        $this->session->set_userdata($session);
        redirect('home');
      } else {
        $this->session->set_flashdata('message', 'Password salah');
        redirect('auth');
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth');
  }
}
