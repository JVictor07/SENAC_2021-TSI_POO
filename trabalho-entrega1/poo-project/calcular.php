<?php

require_once "classes/calculator.php";

$numero1 = $_POST['number1'];
$numero2 = $_POST['number2'];
$operacao = $_POST['operation'];

$calculator = new Calculator();

$calculator->setNumero1($numero1);
$calculator->setNumero2($numero2);

switch($operacao){
  case "plus":
    $calculator->sum();
    break;
  case "minus":
    $calculator->subtract();
    break;
  case "divided by":
    $calculator->divide();
    break;
  case "times":
    $calculator->multiply();
    break;
}

header("Location:index.php?total=".$calculator->getTotal());
