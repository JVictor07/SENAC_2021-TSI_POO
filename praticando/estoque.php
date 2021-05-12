<?php

require('classes/Usuario.class.php');
require('classes/Estoque.class.php');
require('classes/Fabricante.class.php');
require('classes/Movimentacao.class.php');

class Main {

	private $objUsuario;
	private $objEstoque;
	private $objFabricante;
	private $objMovimentacao;

	// executa automaticamente ao instaciar a classe
	public function __construct(){
		echo "\n\n--- COMEÇO DO PROGRAMA ---\n\n";

		$this->objUsuario = new Usuario;
		$this->objEstoque = new Estoque;
		$this->objFabricante = new Fabricante;
		$this->objMovimentacao = new Movimentacao;

		$this->verificarSeExisteArg(1);

		this->executaOperacao($_SERVER['argv'][1])
	}

	private function executaOperacao(string $operacao) {
		switch ($operacao) { 
			case 'gravaUsuario':
				$this->gravaUsuario();
				break;

			case 'editaUsuario':
				$this->editaUsuario();
				break;

			case 'listaUsuario':
				$this->listaUsuario();
				break;

			case 'apagaUsuario':
				$this->apagaUsuario();
				break;

			default:
				# code...
				echo "\nERRO: Não existe a funcionalidade {$_SERVER['argv'][1]}\n";
		}
	}

	private function gravaUsuario() {
		$dados = $this->tratarDados();

		$this->objUsuario->setDados($dados);

		if ( $this->objUsuario->gravarDados() ) {
			echo "\nParabéns, Usuário gravado com sucesso\n";
		}
	}

	private function listaUsuario() {
		$lista = $this->objUsuario->getAll();

		foreach ($lista as $usuario) {
			echo "{$usuario['id']}\t{$usuario['cpf']}\t{$usuario['nome']}\n}"
		}
	}

	private function apagaUsuario() {
		$dados = $this->tratarDados();

		$this->objUsuario-setDados($dados);

		if ( $this->objUsuario->delete() ) {
			echo "\nUsuário apagado com sucesso!\n";
		} else {
			echo "\nErro ao tentar apagar o usuário, você enviou o ID?\n";
		}
	}

	private function editaUsuario() {
		$dados = $this->tratarDados();

		$this->objUsuario->setDados($dados);

		if ( $this->objUsuario->gravarDados() ) {
			echo "\nParabéns, Usuário editado com sucesso\n";
		}
	}

	private function verificarSeExisteArg(int $numArg) {
		if ( !isset($_SERVER['argv'][$numArg]) ) {
			$msg = $numArg === 1 ?
				"para utilizar o programa digite: php estoque.php [operação]" : 
				"para utilizar o programa digite: php estoque.php [operação] [dado=valor, dado2=valor2, ..., dadoN=valorN]";

			echo "\n\nErro: $msg\n\n";

			exit();
		}
	}

	private function tratarDados() {
		$this->verificarSeExisteArg(2);

		$args = explode(',', $_SERVER['argv'][2]);

		foreach ($args as $valor) {
			$arg = explode('=', $valor);

			$dados[$arg[0]] = $arg[1];
		}

		return $dados;
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