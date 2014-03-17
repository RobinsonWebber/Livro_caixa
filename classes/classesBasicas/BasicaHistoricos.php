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

class BasicaHistoricos {

	private $idhistorico;
	private $descricao;

	public function __construct($idhistorico="",$descricao="") {
		$this->idhistorico = $idhistorico;
		$this->descricao = $descricao;
	}

	public function getIdhistorico() {
		return $this->idhistorico;
	}

	public function getDescricao() {
		return $this->descricao;
	}

}
?>