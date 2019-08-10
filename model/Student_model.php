<?php

class Student_model extends Database
{
  public $table = 'tbl_mhs';

  public function getMahasiswa()
  {
    return $this->getData($this->table);
  }

  public function getMahasiswaAt($id)
  {
    return $this->getData($this->table, ['id_mhs' => $id]);
  }
}
