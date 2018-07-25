<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pic extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('model_pic'));
  }

  function index()
  {

  }

  /**
   * [page description]
   * 
   * @return [type] [description]
   */
  public function page()
  {
      $pic = $this->model_pic->getAllPIC();
      $data['pic'] = $pic;

      $this->load->view('pages/pic', $data);
  }

  /**
   * [formEdit description]
   * 
   * @return [type] [description]
   */
  public function formEdit()
  {
      $parameter = $this->uri->segment(3);
      $rows = array();
      $data['result'] = $this->model_pic->getPICbyId($parameter);
      // var_export($data);die();
      $this->load->view('pages/pic_edit', $data);
  }

  /**
   * [FunctionName description]
   * 
   * @param string $value [description]
   */
  public function add()
  {
      $data = $this->input->post('pic');
      $isSuccessfully = $this->model_pic->insert($data);
      if ($isSuccessfully > 0) {
        $response['code'] = 200;
        $response['status'] = 'succes s';
      }else {
        $response['code'] = 502;
        $response['status'] = 'fail';
      }

      redirect('pic');
  }

  /**
   * [edit description]
   * 
   * @return [type] [description]
   */
  public function edit()
  {
      $id = $this->uri->segment(3);
      $data = $this->input->post('pic');
      // var_export($data);die();
      $isSuccessfully = $this->model_pic->update($id, $data);

      redirect('pic');
  }

  /**
   * [delete description]
   * 
   * @return [type] [description]
   */
  public function delete()
  {
      $id = $this->uri->segment(3);
      $isSuccessfully = $this->model_pic->delete($id);

      redirect('pic');
  }

}
