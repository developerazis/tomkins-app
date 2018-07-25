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

  /**
   * [getHeader description]
   * 
   * @return [type] [description]
   */
  public function getReport()
  {
      $this->db->select('h.tanggal, h.total_jual, d.disc, d.sub_total, a.artikel, s.nama, c.nama_counter, x.size');
      $this->db->from('header_penjualan h');
      $this->db->join('detail_penjualan d', 'd.id_penjualan = h.id_penjualan');
      $this->db->join('tb_sales s', 's.sales_id = h.sales_id');
      $this->db->join('tb_counter c', 'c.counter_id = s.counter_id');
      $this->db->join('tb_artikel a', 'a.artikel_id = d.artikel_id');
      $this->db->join('tb_size x', 'x.size_id = a.size_id');
      
      return $this->db->get()->result_array();
  }



}
