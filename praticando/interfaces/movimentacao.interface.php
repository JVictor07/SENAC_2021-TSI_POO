<?php

interface iMovimentacao {

  public function setDados( array $dados ):bool;
  public function getDados( int $tipo, string $datahora, int $id_usuario ):array;
}