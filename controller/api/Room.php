<?php

class Room extends Controller
{
  public function __construct()
  {
    $this->load_model('Student_model');
  }

  public function index_get($param = NULL)
  {
    $result = [
      'status' => false,
      'message' => 'error'
    ];

    if (!$param) {
      $result = $this->model->getMahasiswa();
    } else {
      $result = $this->model->getMahasiswaAt($param);
    }

    echo json_encode($result);
  }

  public function index_post($param = NULL)
  {
    $result = [
      'status' => true,
      'message' => 'success',
      'method' => 'post'
    ];

    echo json_encode($result);
  }

  public function index_put($param = NULL)
  {
    $result = [
      'status' => true,
      'message' => 'success',
      'method' => 'put'
    ];

    echo json_encode($result);
  }

  public function index_delete($param = NULL)
  {
    $result = [
      'status' => true,
      'message' => 'success',
      'method' => 'delete'
    ];

    echo json_encode($result);
  }
}
