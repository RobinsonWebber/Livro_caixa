<?php
/*
 *	Sistema: Gerador de Classes PHP5
 *	Autor: Diego Gomes Araujo
 *	Email: diegogomesaraujo@hotmail.com
 *	Versão: 1.0
 *	Licença: GPL/GNU
 *	Data da criação: 22/03/2008
 *	Hora da criação: 13:45:05
 *
 *	Data da geração do arquivo: 08-04-2013 as 20:44:06
 *	Referente ao banco de dados: livro_caixa
 */

class DB {

	private $server;
	private $usuario;
	private $senha;
	private $banco;
	private $conn;
	private $msgErroQuery;
	private $query;

	// inicializa as variaveis para a conexão com o banco
	public function __construct() {
		self::escreveDados($this->server, "localhost");
		self::escreveDados($this->usuario, "root");
		self::escreveDados($this->senha, "");
		self::escreveDados($this->banco, "livro_caixa");
		self::conexao();
	}

	// cria uma conexão com o mysql
	private function conexao() {
		$conect = mysql_connect($this->server,$this->usuario,$this->senha) or
				die("Não foi possivel conectar ao servidor mysql.<br>".mysql_error());
		$this->conn = $conect;
		self::selecionaDB();
	}

	public function exitConexao() {
		return mysql_close($this->conn);
	}

	// seleciona o banco
	private function selecionaDB() {
		mysql_select_db($this->banco,$this->conn) or
		die("Não foi possivel selecionar a base de dados.<br>".mysql_error());
	}

	// escreve dados para as variaveis
	private function escreveDados(&$var, $param) {
		return $var = $param;
	}

	// faz uma query
	public function query($sql) {
		$query = mysql_query($sql);
		if($query) {
			$this->query = $query;
			return true;
		} else {
			$this->msgErroQuery = mysql_error();
			return false;
		}
	}

	// retorna o fetchObject da ultima consulta
	public function fetchObj() {
		return mysql_fetch_object($this->query);
	}

	// retorna o id do insert referido
	public function ultimoId() {
		return mysql_insert_id($this->query);
	}

	// retorna a quantidade de registro encontrados
	public function quantidadeRegistros() {
		return mysql_num_rows($this->query);
	}

	// mostra mensagem de erro na query
	public function getErro() {
		return $this->msgErroQuery;
	}

}
?>