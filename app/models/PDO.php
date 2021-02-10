<?php
namespace app\models;

class PDO {
  
  public $db;

  public function __construct() {
    $dbhost = DB_HOST;
    $dbport = '3306';
    $dbname = DB_NAME;
    $charset = 'utf8' ;
    
    $dsn = "mysql:host=$dbhost;port=$dbport;dbname=$dbname;charset=$charset";
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    try {
      $this->db = new \PDO($dsn, $username, $password);
    } catch (\PDOException $e) {
      echo $e->getMessage();
      exit;
    }
  }

  protected function insert($sql,$values) {
    $sql = $sql;
    $stmt = $this->db->prepare($sql);
    $stmt->execute($values);
  }
  
}
