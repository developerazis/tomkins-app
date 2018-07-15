<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_counter_api extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('tb_counter c');
    $this->db->join('tb_wilayah w', 'w.wilayah_id = c.wilayah_id');
    $this->db->join('tb_pic p', 'p.pic_id = w.pic_id');
    return $this->db->get();
  }

  public function getCounterByPic($id)
  {
    $this->db->select('*');
    $this->db->from('tb_counter c');
    $this->db->join('tb_wilayah w', 'w.wilayah_id = c.wilayah_id');
    $this->db->join('tb_pic p', 'p.pic_id = w.pic_id');
    $this->db->where('p.pic_id', $id);
    return $this->db->get();
  }

  public function getWilayah()
  {
    return $this->db->get('tb_wilayah');
  }

  function getCounterBySales($sales_id)
  {
    // code...
    $this->db->select('c.*');
    $this->db->from('tb_sales s');
    $this->db->join('tb_counter c', 's.counter_id = c.counter_id');
    $this->db->where('s.sales_id', $sales_id);
    return $this->db->get();
  }

  function getWilayahId($id)
  {
    $this->db->select('w.wilayah_id');
    $this->db->from('tb_wilayah w');
    $this->db->join('tb_pic p', 'p.pic_id = w.pic_id');
    $this->db->where('p.pic_id', $id);
    return $this->db->get();
  }

  public function insert($data)
  {
    $this->db->insert('tb_counter', $data);
    return $this->db->affected_rows();
  }

  public function update($id, $data)
  {
    $this->db->where('counter_id', $id);
    $this->db->update('tb_counter', $data);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->where('counter_id', $id);
    $this->db->delete('tb_counter');
    return $this->db->affected_rows();
  }

}
