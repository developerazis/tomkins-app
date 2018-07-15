<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('model_api_penjualan'));
  }

  function index()
  {

  }

  function simpan()
  {
    $artikel = $this->input->post('artikel_id');
    $sub_total = $this->input->post('sub_total');
    $disc = $this->input->post('disc');
    $jumlahData = count($artikel);

    $dataHeader = array('sales_id' => $this->input->post('sales_id'),
                        'tanggal' => date('Y-m-d'),
                        'total_jual' => $this->input->post('total_jual'));
    $simpanHeader = $this->model_api_penjualan->insertHeader($dataHeader);

    if ($simpanHeader > 0) {
        $id_penjualan = $this->db->insert_id();
        for ($i=0; $i < $jumlahData; $i++) {
          $detail[$i]['id_penjualan'] = $id_penjualan;
          $detail[$i]['artikel_id'] = $artikel[$i];
          $detail[$i]['sub_total'] = $sub_total[$i];
          $detail[$i]['disc'] = $disc[$i];
        }
        $simpanDetail = $this->model_api_penjualan->insertDetail($detail);
        if ($simpanDetail > 0) {
          $response['code'] = 200;
          $response['status'] = 'success';
        }else{
          $response['code'] = 502;
          $response['status'] = 'fail';
        }
    }

    header('Content-Type: application/json');
    echo json_encode($response,TRUE);

  }

}
