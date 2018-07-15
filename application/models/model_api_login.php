<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_api_login extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function auth($data)
  {
    $this->db->where('username', $data['username']);
    $this->db->where('password', $data['password']);
    return $this->db->get('tb_login');
  }

  public function getSales($id)
  {
    $this->db->select('*');
    $this->db->from('tb_login l');
    $this->db->join('tb_sales s', 'l.id = s.id_login');
    $this->db->where('s.id_login', $id);
    return $this->db->get();
  }

  public function getPIC($id)
  {
    $this->db->select('p.*');
    $this->db->from('tb_login l');
    $this->db->join('tb_PIC p', 'l.id = p.login_id');
    $this->db->where('p.login_id', $id);
    return $this->db->get();
  }

}
