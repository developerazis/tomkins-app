<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sales extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('model_sales_api'));
  }

  function index()
  {

  }

  function getByCounter()
  {
    $parameter = $this->uri->segment(3);
    $rows = array();
    $salesData = $this->model_sales_api->getByCounter($parameter)->result();
    foreach ($salesData as $row) {
      $dataLogin = array('id' => $row->id , 'username' => $row->username);
      $rows[] = array('sales_id' => $row->sales_id,
                      'nama' => $row->nama,
                      'alamat' => $row->alamat,
                      'no_telp' => $row->no_telp,
                      'login' => $dataLogin);
    }

    $results = array('counter_id' => $row->counter_id,
                      'nama_counter' => $row->nama_counter,
                      'alamat_counter' => $row->alamat_counter,
                      'wilayah_id' => $row->wilayah_id,
                      'sales' => $rows);

    $response['result'] = $results;
    $response['status'] = 'success';
    $response['code'] = 200;
    header('Content-Type: application/json');
    echo json_encode($response,TRUE);
  }

  function getSalesByCounterId()
  {
    // code...
    $parameter = $this->uri->segment(3);
    $rows = array();
    $salesData = $this->model_sales_api->getByCounter($parameter)->result();
    foreach ($salesData as $row) {
      $dataLogin = array('id' => $row->id , 'username' => $row->username);
      $rows[] = array('sales_id' => $row->sales_id,
                      'nama' => $row->nama,
                      'alamat' => $row->alamat,
                      'no_telp' => $row->no_telp,
                      'login' => $dataLogin);
    }

    // $results = array('counter_id' => $row->counter_id,
    //                   'nama_counter' => $row->nama_counter,
    //                   'alamat_counter' => $row->alamat_counter,
    //                   'wilayah_id' => $row->wilayah_id,
    //                   'sales' => $rows);

    $response['result'] = $rows;
    $response['status'] = 'success';
    $response['code'] = 200;
    header('Content-Type: application/json');
    echo json_encode($response,TRUE);
  }

  function getSalesById()
  {
    $parameter = $this->uri->segment(3);
    $rows = array();
    $salesData = $this->model_sales_api->getSalesById($parameter)->result();
    foreach ($salesData as $row) {
      $dataLogin = array('id' => $row->id , 'username' => $row->username);
      $counter_sales = array('counter_id' => $row->counter_id, 'nama_counter' => $row->nama_counter);
      $rows = array('sales_id' => $row->sales_id,
                      'nama' => $row->nama,
                      'alamat' => $row->alamat,
                      'no_telp' => $row->no_telp,
                      'login' => $dataLogin,
                      'counter' => $counter_sales);
    }

    $response['result'] = $rows;
    $response['status'] = 'success';
    $response['code'] = 200;
    header('Content-Type: application/json');
    echo json_encode($response,TRUE);
  }

  function simpan()
  {
    $response = array();
    $dataRegistrasi = array('username' => $this->input->post('username'),
                            'password' => md5($this->input->post('password')));

    $this->model_sales_api->registrasiSales($dataRegistrasi);
    $id_login = $this->db->insert_id();

    $params = array('nama' => $this->input->post('nama') , 'alamat' => $this->input->post('alamat'),
                    'no_telp' => $this->input->post('no_telp'), 'counter_id' => $this->input->post('counter_id'),
                    'id_login' => $id_login);

    $this->model_sales_api->insert($params);

    $isSuccessfully = $this->db->affected_rows();           //method untuk cek apakah data tersimpan pada database
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
    $id_login = $this->model_sales_api->getIdLogin($id)->row()->id_login;

    $dataLogin = array('username' => $this->input->post('username'),
                       'password' => md5($this->input->post('password')));
    $dataSales = array('nama' => $this->input->post('nama') , 'alamat' => $this->input->post('alamat'),
                       'no_telp' => $this->input->post('no_telp'), 'counter_id' => $this->input->post('counter_id'));

    $this->model_sales_api->updateLoginSales($id_login, $dataLogin);
    $this->model_sales_api->update($id, $dataSales);
    $isSuccessfully = $this->db->affected_rows();

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

  public function hapus()
  {
    $id = $this->uri->segment(3);
    $this->model_sales_api->delete($id);
    $isSuccessfully = $this->db->affected_rows();

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

}
