<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('model_api_login','model_counter_api'));
  }

  /**
   * [index description]
   * 
   * @return [type] [description]
   */
  public function index()
  {
      $this->load->view('pages/home');
  }

}
