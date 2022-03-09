<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
  private $table = 'user';
  public function get($username)
  {
    return $this->db->get_where($this->table, ['username' => $username])->row();
    // $this->db->where('username', $username);
    // $result = $this->db->get('user')->row();

    // return $result;
  }
}
