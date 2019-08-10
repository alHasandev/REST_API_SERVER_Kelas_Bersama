<?php

class User_model extends Database
{
  public $table = 'users';

  public function getUser()
  {
    // $data = ['first' => 'this first', 'second' => 'this second'];

    return $this->getData('users');
  }

  public function getUserAt($id)
  {
    return $this->getData('users', ['id' => $id]);
  }

  public function getUserWhere($limiters)
  {
    return $this->getDataWhere('users', $limiters);
  }

  public function postUser($data)
  {
    return $this->postData('users', $data);
  }

  public function putUser($data, $id)
  {
    return $this->putData('users', $data, ['id' => $id]);
  }

  public function deleteUser($id)
  {
    return $this->deleteData('users', ['id' => $id]);
  }
}
