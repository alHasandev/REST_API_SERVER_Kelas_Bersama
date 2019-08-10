<?php

class Student extends Controller
{
  public function __construct()
  {
    $this->load_model('Student_model');
  }

  public function index($param = NULL)
  {
    $request_method = $_SERVER['REQUEST_METHOD'];
    $result = false;

    switch ($request_method) {
      case 'GET':
        if (!$param) {
          $result = $this->model->getMahasiswa();
        } else {
          $result = $this->model->getMahasiswaAt($param);
        }
        break;
      case 'POST':
        $result = $request_method;
        break;

      default:
        # code...
        break;
    }

    echo json_encode($result);
  }
}
