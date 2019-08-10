<?php

class User extends Controller
{
  public function __construct()
  {
    $this->load_model('User_model');
  }

  public function index_get($role = NULL)
  {
    if ($role) {
      echo json_encode($this->model->getUserWhere(['privilege' => $role]));
    } else {
      echo json_encode($this->model->getUser());
    }
  }

  public function index_post()
  {
    $data = [
      'id' => 1,
      'username' => 'mohamad_albie',
      'password' => 'wdasfaf8234&23423jlfwe',
      'privilege' => 'admin'
    ];

    echo $this->model->postUser($data);
  }

  public function index_put()
  {
    $data = [
      'id' => 1,
      'username' => 'mohamad_albie',
      'password' => 'wdasfaf8234&23423jlfwe',
      'privilege' => 'admin'
    ];

    echo $this->model->putUser($data, 1);
  }

  public function index_delete()
  {
    echo $this->model->deleteUser(1);
  }
}
