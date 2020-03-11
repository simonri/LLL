<?php

class Database
{
  private $dbh;
  private $stmt;

  public function __construct()
  {
    $this->dbh = new PDO(
      "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
      DB_USER,
      DB_PASS
    );
  }

  public function query($sql)
  {
    $this->stmt = $this->dbh->prepare($sql);
  }

  function bind($param, $value)
  {
    switch (true) {
      case is_int($value):
        $type = PDO::PARAM_INT;
        break;
      case is_bool($value):
        $type = PDO::PARAM_BOOL;
        break;
      case is_null($value):
        $type = PDO::PARAM_NULL;
        break;
      default:
        $type = PDO::PARAM_STR;
    }

    $this->stmt->bindValue($param, $value, $type);
  }

  function execute()
  {
    return $this->stmt->execute();
  }

  function resultSet()
  {
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
  }

  function single()
  {
    $this->execute();
    return $this->stmt->fetch(PDO::FETCH_OBJ);
  }

  function rowCount()
  {
    return $this->stmt->rowCount();
  }
}
