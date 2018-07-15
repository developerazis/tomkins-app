<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_api_article extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tb_artikel a');
    $this->db->join('tb_size s', 's.size_id = a.size_id');
    $this->db->join('tb_genre g', 'g.genre_id = s.genre_id');
    return $this->db->get();
  }



}
