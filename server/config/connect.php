<?php
class db{
  private $conn;

  public function connectDatabase(){
    $this->conn = null;
    try {
      $this->conn = new PDO("mysql:host=localhost;dbname=ninh", "root", "");
      // set the PDO error mode to exception
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo "that bai";
    }
    return $this->conn;
  }
}
?>