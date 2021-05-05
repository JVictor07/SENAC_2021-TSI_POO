<?php

abstract class DataBase extends PDO {

  private $user = '';
  private $pass = '';
  private $port = '3306';
  private $driver = 'mysql';
  private $host = 'localhost';
  private $db_name = 'poo_senac';

  public function __construct() {
    $dns = $this->driver . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->db_name;

    parent::__construct($dns, $this->user, $this->pass);
  }
}