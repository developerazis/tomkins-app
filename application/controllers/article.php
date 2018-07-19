<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('model_api_article'));
  }

  function index()
  {
    $data = $this->model_api_article->getAll()->result();
    foreach ($data as $rows) {
      $dataGenre = array('genre_id' => $rows->genre_id, 'genre' => $rows->genre);
      $dataSize = array('size_id' => $rows->size_id ,'size' => $rows->size, 'genre' => $dataGenre );
      $result[] = array('artikel_id' => $rows->artikel_id ,
                        'artikel' => $rows->artikel,
                        'harga' => $rows->harga,
                        'size' => $dataSize);
    }

    $response['result'] = $result;
    $response['status'] = 'success';
    $response['code'] = 200;
    header('Content-Type: application/json');
    echo json_encode($response,TRUE);
  }

  function getArticleById()
  {
    $id = $this->uri->segment(3);
    $rows = $this->model_api_article->getById($id)->row();
    $dataGenre = array('genre_id' => $rows->genre_id, 'genre' => $rows->genre);
    $dataSize = array('size_id' => $rows->size_id ,'size' => intval($rows->size), 'genre' => $dataGenre );
    $result = array('artikel_id' => $rows->artikel_id ,
                      'artikel' => $rows->artikel,
                      'harga' => intval($rows->harga),
                      'size' => $dataSize);
    $response['result'] = $result;
    $response['status'] = 'success';
    $response['code'] = 200;
    header('Content-Type: application/json');
    echo json_encode($response,TRUE);
  }

}
