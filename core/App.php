<?php

class App
{
  // atur properti default
  public $controller = 'Home';
  public $method = 'index';
  public $params = [];

  // fungsi yang otomatis dijalankan saat di inisialisasi
  public function __construct()
  {

    if (isset($_GET['key'])) {
      echo $_GET['key'];
      die;
    }

    // menampung array dari URI
    $uri = $this->getURI();

    // atur variabel default
    $path = './controller/';
    $_method = '';
    $n = 0;

    // cek apakah uri pertama adalah folder
    if (is_dir('./controller/' . $uri[0])) {
      $n = 1;
      $path .= $uri[0] . '/';

      // cek apakah folder bernama api
      if ($uri[0] == 'api') {
        $_method = '_' . strtolower($_SERVER['REQUEST_METHOD']);
      }
      unset($uri[0]);
    }

    // cek apakah controller ada
    if (file_exists($path . $uri[$n] . '.php')) {
      $this->controller = $uri[$n];
      unset($uri[$n]);
    }

    // buat object dari instance controller
    $this->controller = new $this->controller;

    // cek apakah ada method 
    if (isset($uri[$n + 1])) {
      if (method_exists($this->controller, $uri[$n + 1])) {
        $this->method = $uri[$n + 1];
        unset($uri[$n + 1]);
      }
    }

    // tambahkan imbuhan request api method pada method controller
    $this->method = $this->method  . $_method;

    // tampung parameter uri[3..n] jika ada
    if (!empty($uri)) {
      $this->params = array_values($uri);
    }

    // jalankan controller, method, dan parameters jika ada
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  // mengambil parameter URL / ingat untuk membuat file .htaccess
  function getURI()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);

      return $url;
    }
  }
}
