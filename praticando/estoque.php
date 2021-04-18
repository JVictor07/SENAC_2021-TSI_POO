<?php

require('classes/Usuario.class.php');
require('classes/Estoque.class.php');
require('classes/Fabricante.class.php');
require('classes/Movimentacao.class.php');

class Main {

	// executa automaticamente ao instaciar a classe
	public function __construct(){
		echo "\n\n--- COMEÇO DO PROGRAMA ---\n\n";

		$objUsuario = new Usuario;
		$objEstoque = new Estoque;
		$objFabricante = new Fabricante;
		$objMovimentacao = new Movimentacao;
	}

	// ao terminar a execução
	public function __destruct(){
		echo "\n\n--- FIM DO PROGRAMA ---\n\n";
	}
}

new Main;


/*
Tabelas:

itens
+---------------+---------------------+------+-----+---------+----------------+
| Field         | Type                | Null | Key | Default | Extra          |
+---------------+---------------------+------+-----+---------+----------------+
| id            | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| nome          | char(255)           | NO   |     | NULL    |                |
| descricao     | char(255)           | YES  |     | NULL    |                |
| preco         | double(12,2)        | YES  |     | NULL    |                |
| id_fabricante | bigint(20) unsigned | YES  |     | NULL    |                |
+---------------+---------------------+------+-----+---------+----------------+

estoques
+-------+---------------------+------+-----+---------+----------------+
| Field | Type                | Null | Key | Default | Extra          |
+-------+---------------------+------+-----+---------+----------------+
| id    | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| nome  | char(255)           | YES  |     | NULL    |                |
+-------+---------------------+------+-----+---------+----------------+

itens_no_estoque
+------------+---------------------+------+-----+---------+-------+
| Field      | Type                | Null | Key | Default | Extra |
+------------+---------------------+------+-----+---------+-------+
| id_item    | bigint(20) unsigned | NO   | PRI | NULL    |       |
| id_estoque | bigint(20) unsigned | NO   | PRI | NULL    |       |
| qtd        | bigint(20)          | YES  |     | NULL    |       |
+------------+---------------------+------+-----+---------+-------+

movimentacoes
+------------------+--------------------------+------+-----+---------+-------+
| Field            | Type                     | Null | Key | Default | Extra |
+------------------+--------------------------+------+-----+---------+-------+
| id_item          | bigint(20) unsigned      | NO   |     | NULL    |       |
| id_estoque       | bigint(20) unsigned      | NO   |     | NULL    |       |
| qtd_movimentacao | bigint(20)               | YES  |     | NULL    |       |
| tipo             | enum('entrada','saída')  | NO   | PRI | NULL    |       |
| datahora         | datetime                 | NO   | PRI | NULL    |       |
| id_usuario       | bigint(20) unsigned      | NO   | PRI | NULL    |       |
+------------------+--------------------------+------+-----+---------+-------+

usuarios
+-------+---------------------+------+-----+---------+----------------+
| Field | Type                | Null | Key | Default | Extra          |
+-------+---------------------+------+-----+---------+----------------+
| id    | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| cpf   | bigint(20)          | YES  |     | NULL    |                |
| nome  | char(255)           | YES  |     | NULL    |                |
+-------+---------------------+------+-----+---------+----------------+

fabricantes
+-------+---------------------+------+-----+---------+----------------+
| Field | Type                | Null | Key | Default | Extra          |
+-------+---------------------+------+-----+---------+----------------+
| id    | bigint(20) unsigned | NO   | PRI | NULL    | auto_increment |
| cnpj  | bigint(20)          | YES  |     | NULL    |                |
| nome  | char(255)           | YES  |     | NULL    |                |
+-------+---------------------+------+-----+---------+----------------+
*/