<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('model_api_login','model_counter_api'));
  }

  function index()
  {

  }

  function authenticationSales()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $data = array('username' => $username, 'password' => md5($password));

    $login = $this->model_api_login->auth($data)->row();

    if(isset($login)){
      $dataSales = $this->model_api_login->getSales($login->id)->row();
      $counter = $this->model_counter_api->getCounterBySales($dataSales->sales_id)->row();
      $data = array('sales_id' => $dataSales->sales_id ,
                    'nama' => $dataSales->nama,
                    'alamat' => $dataSales->alamat,
                    'no_telp' => $dataSales->no_telp,
                    'counter' => $counter,
                    'login' => $login);
      $response['result'] = $data;
      $response['status'] = "You've logged in";
      $response['kode'] = 200;
    }else {
      $response['status'] = "Login Failed";
      $response['kode'] = 502;
    }

    header('Content-Type: application/json');
    echo json_encode($response,TRUE);
  }

  function authenticationPIC()
  {
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $data = array('username' => $username, 'password' => $password);
    $login = $this->model_api_login->auth($data)->row();

    if(isset($login)){
      $dataPIC = $this->model_api_login->getPIC($login->id)->row();
      $data = array('pic_id' => $dataPIC->pic_id ,
                    'nama' => $dataPIC->nama,
                    'alamat' => $dataPIC->alamat,
                    'login_id' => $dataPIC->login_id,
                    'login' => $login);

      $response['status'] = "You've logged in";
      $response['kode'] = 200;
      $response['result'] = $data;


    }else {
      $response['status'] = "Login Failed";
      $response['kode'] = 502;
    }

    header('Content-Type: application/json');
    echo json_encode($response,TRUE);
  }
}
