<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_sales_api extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getByCounter($id)
  {
    $this->db->select('s.*, l.*, c.counter_id, c.nama_counter, c.alamat as alamat_counter, c.wilayah_id');
    $this->db->from('tb_counter c');
    $this->db->join('tb_sales s','c.counter_id = s.counter_id');
    $this->db->join('tb_login l', 'l.id = s.id_login');
    $this->db->where('s.counter_id', $id);
    return $this->db->get();
  }

  public function getSalesById($id)
  {
    $this->db->select('*');
    $this->db->from('tb_counter c');
    $this->db->join('tb_sales s','c.counter_id = s.counter_id');
    $this->db->join('tb_login l', 'l.id = s.id_login');
    $this->db->where('s.sales_id', $id);
    return $this->db->get();
  }

  public function insert($params)
  {
    $this->db->insert('tb_sales', $params);
  }

  public function registrasiSales($data)
  {
    $this->db->insert('tb_login', $data);
  }
  public function update($id,$data)
  {
    $this->db->where('sales_id', $id);
    $this->db->update('tb_sales', $data);
  }

  public function updateLoginSales($id, $data)
  {
    $this->db->where('id', $id);
    $this->db->update('tb_login', $data);
  }

  public function getIdLogin($sales_id)
  {
    $this->db->select('id_login');
    $this->db->from('tb_sales');
    $this->db->where('sales_id', $sales_id);
    return $this->db->get();
  }

  public function delete($id)
  {
    $this->db->where('sales_id', $id);
    $this->db->delete('tb_sales');
  }

}
