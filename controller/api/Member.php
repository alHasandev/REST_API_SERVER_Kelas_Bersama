<?php

class Member extends Controller
{
  public function __construct()
  {
    $this->load_model('User_model');
  }

  public function index_get()
  {
    $id = 1;

    echo json_encode($this->model->getUserAt($id));
  }
}
