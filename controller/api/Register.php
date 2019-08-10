<?php

class Register extends Controller
{
  public function __construct()
  {
    $this->load_model('User_model');
  }

  public function index_post()
  {
    // kembalikan nilai
    // parse_str(file_get_contents("php://input"), $data);

    // echo json_encode($data);

    // tambahkan privilege khusus member baru
    $_POST['privilege'] = 'registered';

    echo $this->model->postUser($_POST);
  }
}
