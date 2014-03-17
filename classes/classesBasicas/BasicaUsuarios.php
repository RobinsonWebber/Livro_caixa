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
 *	Data da geração do arquivo: 08-04-2013 as 20:44:05
 *	Referente ao banco de dados: livro_caixa
 */

class BasicaUsuarios {

	private $idusuarios;
	private $nome;
	private $senha;

	public function __construct($idusuarios="",$nome="",$senha="") {
		$this->idusuarios = $idusuarios;
		$this->nome = $nome;
		$this->senha = $senha;
	}

	public function getIdusuarios() {
		return $this->idusuarios;
	}

	public function getNome() {
		return $this->nome;
	}

	public function getSenha() {
		return $this->senha;
	}

}
?>