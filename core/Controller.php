<?php

class Controller
{
  public $model = '';

  public function view($view, $data = [])
  {
    require_once './views/' . $view . '.php';
  }

  public function load_model($model)
  {
    require_once './model/' . $model . '.php';
    $this->model = new $model;
  }
}
