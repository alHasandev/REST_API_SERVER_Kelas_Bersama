<?php

class Database
{
  // Set Property Of Database Connection
  protected $host = HOST;
  protected $username = USER;
  protected $password = PASS;
  protected $dbname = DBNAME;
  public $db;

  public function __construct()
  {
    $this->db = new mysqli($this->host, $this->username, $this->password, $this->dbname);
  }

  public function getData(string $table, array $id = [])
  {
    // siapkan query tampilkan semua data
    $query = "SELECT * FROM $table";

    if ($id) {
      $keyId = array_keys($id)[0];
      $query .= " WHERE $keyId = '$id[$keyId]'";

      return $this->db->query($query)->fetch_assoc();
    }
    return $this->db->query($query)->fetch_all(MYSQLI_ASSOC);
  }

  public function getDataWhere(string $table, array $keys)
  {
    // siapkan query tampilkan semua data
    $query = "SELECT * FROM $table";

    // siapkan string batasan kondisi where
    $limiters = '';
    foreach ($keys as $key => $value) {
      $limiters .= $key . " = '" . $value . "'";
      if ($value === end($keys)) break;
      $limiters .= ', ';
    }
    $query .= " WHERE $limiters";

    // return $this->db->query($query)->fetch_assoc();
    return $this->db->query($query)->fetch_all(MYSQLI_ASSOC);
  }

  public function postData(string $table, array $data)
  {
    // siapkan query tambah data
    $query = "INSERT INTO $table SET " . $this->generateData($data);

    // kembalikan hasil query
    return $query;
  }

  public function putData(string $table, array $data, array $id)
  {
    // siapkan key id
    $keyId = array_keys($id)[0];

    // siapkan query update data
    $query = "UPDATE $table SET " . $this->generateData($data) . " WHERE $keyId = '$id[$keyId]'";

    // kembalikan hasil query
    return $query;
  }

  public function deleteData(string $table, array $id)
  {
    // siapkan key id
    $keyId = array_keys($id)[0];

    // siapkan query hapus data
    $query = "DELETE FROM $table WHERE $keyId = '$id[$keyId]'";

    // kembalikan hasil query
    return $query;
  }

  public function generateData(array $data): string
  {
    // siapkan variabel untuk menampung string data
    $string = '';

    // pecah data array menjadi string
    foreach ($data as $key => $value) {
      $string .= $key . " = '" . $value . "'";
      if ($value === end($data)) break;
      $string .= ', ';
    }

    return $string;
  }
}
