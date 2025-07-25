<?php

namespace Caballeda\StudentManagement\Core;

use mysqli;

class database {
    protected $conn;

    public function __construct()
    {
      $host = "localhost";
      $user = "root";
      $password = "";
      $db = "oop2";

      $this->conn = new mysqli($host, $user, $password, $db);
      if($this->conn->connect_error){
        die('Connection to database failed! : '.$this->conn->connect_error);
      }
    }
}