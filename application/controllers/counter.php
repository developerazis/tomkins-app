<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Counter extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('model_counter_api'));
  }

  function index()
  {
    $rows = array();
    $data = $this->model_counter_api->getAll()->result();
    foreach ($data as $row) {
      $rows[] = array('counter_id' => $row->counter_id,
                    'nama_counter' => $row->nama_counter,
                    'alamat' => $row->alamat,
                    'nama_wilayah' => $row->nama_wilayah,
                    'pic' => $row->nama);
    }

    $response['result'] = $rows;
    $response['status'] = 'success';
    $response['code'] = 200;
    header('Content-Type: application/json');
    echo json_encode($response,TRUE);
  }

  function simpan()
  {
    $data = array('nama_counter' => $this->input->post('nama_counter'),
                  'wilayah_id' => $this->input->post('wilayah_id'),
                  'alamat' => $this->input->post('alamat'));
    $isSuccessfully = $this->model_counter_api->insert($data);
    if ($isSuccessfully > 0) {
      $response['code'] = 200;
      $response['status'] = 'success';
    }else {
      $response['code'] = 502;
      $response['status'] = 'fail';
    }
    header('Content-Type: application/json');
    echo json_encode($response,TRUE);
  }

  function update()
  {
    $id = $this->uri->segment(3);
    $data = array('nama_counter' => $this->input->post('nama_counter'),
                  'wilayah_id' => $this->input->post('wilayah_id'),
                  'alamat' => $this->input->post('alamat'));
    $isSuccessfully = $this->model_counter_api->update($id, $data);
    if ($isSuccessfully > 0) {
      $response['code'] = 200;
      $response['status'] = 'success';
    }else {
      $response['code'] = 502;
      $response['status'] = 'fail';
    }
    header('Content-Type: application/json');
    echo json_encode($response,TRUE);

  }

  function hapus()
  {
    $id = $this->uri->segment(3);
    $isSuccessfully = $this->model_counter_api->delete($id);

    if ($isSuccessfully > 0) {
      $response['code'] = 200;
      $response['status'] = 'success';
    }else {
      $response['code'] = 502;
      $response['status'] = 'fail';
    }

    header('Content-Type: application/json');
    echo json_encode($response,TRUE);
  }

  function getwilayah()
  {
    $data = array();
    $wilayah = $this->model_counter_api->getWilayah()->result();
    foreach ($wilayah as $rows) {
      $data[] = array('wilayah_id' => $rows->wilayah_id,
                      'nama_wilayah' => $rows->nama_wilayah);
    }

    $response['result'] = $rows;
    $response['status'] = 'success';
    $response['code'] = 200;
    header('Content-Type: application/json');
    echo json_encode($response,TRUE);

  }

  function getCounterByWilayah()
  {
    $id_wil = $this->uri->segment(3);
    $data = $this->model_counter_api->getCounterByPic($id_wil)->result();
    foreach ($data as $row) {
      $rows[] = array('counter_id' => $row->counter_id,
                    'nama_counter' => $row->nama_counter,
                    'alamat' => $row->alamat,
                    'nama_wilayah' => $row->nama_wilayah,
                    'pic' => $row->nama);
    }

    $response['result'] = $rows;
    $response['status'] = 'success';
    $response['code'] = 200;
    header('Content-Type: application/json');
    echo json_encode($response,TRUE);
  }

  function getWilayahId()
  {
    $pic_id = $this->uri->segments(3);
    $data = $this->model_counter_api->getWilayahId($pic_id)->row();

  }

}
