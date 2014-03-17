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

class BasicaLancamentos {

	private $idlancamento;
	private $data;
	private $historico;
	private $entrada;
	private $saida;

	public function __construct($idlancamento="",$data="",$historico="",$entrada="",$saida="") {
		$this->idlancamento = $idlancamento;
		$this->data = $data;
		$this->historico = $historico;
		$this->entrada = $entrada;
		$this->saida = $saida;
	}

	public function getIdlancamento() {
		return $this->idlancamento;
	}

	public function getData() {
		return $this->data;
	}

	public function getHistorico() {
		return $this->historico;
	}

	public function getEntrada() {
		return $this->entrada;
	}

	public function getSaida() {
		return $this->saida;
	}

}
?>