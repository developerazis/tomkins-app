<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_api_penjualan extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getStock($counter_id, $artikel_id)
  {
    $this->db->select('stock');
    $this->db->where('artikel_id', $artikel_id);
    $this->db->where('counter_id', $counter_id);
    return $this->input->get('tb_stock');
  }

  public function insertHeader($data)
  {
    $this->db->insert('header_penjualan', $data);
    return $this->db->affected_rows();
  }

  public function insertDetail($data)
  {
    $this->db->insert_batch('detail_penjualan', $data);
    return $this->db->affected_rows();
  }



}
