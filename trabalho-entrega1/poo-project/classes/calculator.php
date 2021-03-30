<?php

class calculator {
  private $number1;
  private $number2;
  private $total;

  function __construct(){
    $this -> number1 = 0;
    $this -> number2 = 0;
    $this -> total = 0;
  }

  public function setNumero1($number1){
    $this -> number1 = $number1;
  }

  public function setNumero2($number2){
    $this -> number2 = $number2;
  }

  public function sum(){
    $this->total = $this->number1 + $this->number2;
  }

  public function subtract(){
    $this->total = $this->number1 - $this->number2;
  }

  public function divide(){
    $this->total = $this->number1 / $this->number2;
  }

  public function multiply(){
    $this->total = $this->number1 * $this->number2;
  }

  public function getTotal(){
    return $this->total;
  }
}