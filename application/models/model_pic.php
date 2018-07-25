<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pic extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function insert($params)
  {
    $this->db->insert('tb_pic', $params);
  }

  public function update($id,$data)
  {
    $this->db->where('pic_id', $id);
    $this->db->update('tb_pic', $data);
  }

  public function delete($id)
  {
    $this->db->where('pic_id', $id);
    $this->db->delete('tb_pic');
  }

  /**
   * [getPICbyId description]
   * 
   * @return [type] [description]
   */
  public function getPICbyId($id)
  {
      $this->db->where('pic_id', $id);
      return $this->db->get('tb_pic')->row_array();
  }

  /**
   * [getAllSales description]
   * 
   * @return [type] [description]
   */
  public function getAllPIC()
  {
      return $this->db->get('tb_pic')->result_array(); 
  }

}
