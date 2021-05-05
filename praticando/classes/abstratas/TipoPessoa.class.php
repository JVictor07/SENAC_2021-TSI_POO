<?php

require_once 'Database.class.php';

abstract class TipoPessoa extends Database {

  protected $id;
  protected $nome;

  public function __construct() {

    parent::__construct();
  }
}