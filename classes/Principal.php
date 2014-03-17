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

function __autoload($classe) {
	$dir = str_replace("\\","/",dirname(__FILE__));
	if(file_exists($dir."/".$classe.".php")) {
		include($dir."/".$classe.".php");
	} else {
		if(file_exists($dir."/classesBasicas/".$classe.".php")) {
			include($dir."/classesBasicas/".$classe.".php");
		} else {
			if(file_exists($dir."/classesSQL/".$classe.".php")) {
				include($dir."/classesSQL/".$classe.".php");
			} else {
				exit("Arquivo não encontrado!");
			}
		}
	}
}

class Principal {

	private $basicaEmpresa;
	private $sqlEmpresa;
	private $basicaHistoricos;
	private $sqlHistoricos;
	private $basicaLancamentos;
	private $sqlLancamentos;
	private $basicaUsuarios;
	private $sqlUsuarios;

	public function __construct() {
		$this->sqlEmpresa = new SqlEmpresa();
		$this->sqlHistoricos = new SqlHistoricos();
		$this->sqlLancamentos = new SqlLancamentos();
		$this->sqlUsuarios = new SqlUsuarios();
	}



	// SETOR REFERENTE AS CLASSES DA TABELA EMPRESA

	public function empresa($idempresa, $razaosocial, $endereco, $bairro, $cidade, $uf, $cnpj, $telefone, $email) {
		$this->basicaEmpresa = new BasicaEmpresa($idempresa, $razaosocial, $endereco, $bairro, $cidade, $uf, $cnpj, $telefone, $email);
	}

	public function getEmpresa() {
		return $this->basicaEmpresa;
	}

	public function retornaEmpresa($extra="") {
		if($this->sqlEmpresa->retornaEmpresa($extra)) {
			return $this->sqlEmpresa->getResp();
		} else {
			return false;
		}
	}

	public function inserirEmpresa() {
		if($this->sqlEmpresa->inserirEmpresa(self::getEmpresa())) {
			return true;
		} else {
			return false;
		}
	}

	public function atualizaEmpresa() {
		if($this->sqlEmpresa->atualizaEmpresa(self::getEmpresa())) {
			return true;
		} else {
			return false;
		}
	}

	public function deletaEmpresa($idempresa) {
		if($this->sqlEmpresa->deletaEmpresa($idempresa)) {
			return true;
		} else {
			return false;
		}
	}

	public function retornaQuantidadeRegistrosEmpresa($extra="") {
		if($this->sqlEmpresa->retornaQuantidadeRegistrosEmpresa($extra)) {
			return $this->sqlEmpresa->getResp();
		} else {
			return false;
		}
	}



	// SETOR REFERENTE AS CLASSES DA TABELA HISTORICOS

	public function historicos($idhistorico, $descricao) {
		$this->basicaHistoricos = new BasicaHistoricos($idhistorico, $descricao);
	}

	public function getHistoricos() {
		return $this->basicaHistoricos;
	}

	public function retornaHistoricos($extra="") {
		if($this->sqlHistoricos->retornaHistoricos($extra)) {
			return $this->sqlHistoricos->getResp();
		} else {
			return false;
		}
	}

	public function inserirHistoricos() {
		if($this->sqlHistoricos->inserirHistoricos(self::getHistoricos())) {
			return true;
		} else {
			return false;
		}
	}

	public function atualizaHistoricos() {
		if($this->sqlHistoricos->atualizaHistoricos(self::getHistoricos())) {
			return true;
		} else {
			return false;
		}
	}

	public function deletaHistoricos($idhistorico) {
		if($this->sqlHistoricos->deletaHistoricos($idhistorico)) {
			return true;
		} else {
			return false;
		}
	}

	public function retornaQuantidadeRegistrosHistoricos($extra="") {
		if($this->sqlHistoricos->retornaQuantidadeRegistrosHistoricos($extra)) {
			return $this->sqlHistoricos->getResp();
		} else {
			return false;
		}
	}



	// SETOR REFERENTE AS CLASSES DA TABELA LANCAMENTOS

	public function lancamentos($idlancamento, $data, $historico, $entrada, $saida) {
		$this->basicaLancamentos = new BasicaLancamentos($idlancamento, $data, $historico, $entrada, $saida);
	}

	public function getLancamentos() {
		return $this->basicaLancamentos;
	}

	public function retornaLancamentos($extra="") {
		if($this->sqlLancamentos->retornaLancamentos($extra)) {
			return $this->sqlLancamentos->getResp();
		} else {
			return false;
		}
	}

	public function inserirLancamentos() {
		if($this->sqlLancamentos->inserirLancamentos(self::getLancamentos())) {
			return true;
		} else {
			return false;
		}
	}

	public function atualizaLancamentos() {
		if($this->sqlLancamentos->atualizaLancamentos(self::getLancamentos())) {
			return true;
		} else {
			return false;
		}
	}

	public function deletaLancamentos($idlancamento) {
		if($this->sqlLancamentos->deletaLancamentos($idlancamento)) {
			return true;
		} else {
			return false;
		}
	}

	public function retornaQuantidadeRegistrosLancamentos($extra="") {
		if($this->sqlLancamentos->retornaQuantidadeRegistrosLancamentos($extra)) {
			return $this->sqlLancamentos->getResp();
		} else {
			return false;
		}
	}



	// SETOR REFERENTE AS CLASSES DA TABELA USUARIOS

	public function usuarios($idusuarios, $nome, $senha) {
		$this->basicaUsuarios = new BasicaUsuarios($idusuarios, $nome, $senha);
	}

	public function getUsuarios() {
		return $this->basicaUsuarios;
	}

	public function retornaUsuarios($extra="") {
		if($this->sqlUsuarios->retornaUsuarios($extra)) {
			return $this->sqlUsuarios->getResp();
		} else {
			return false;
		}
	}

	public function inserirUsuarios() {
		if($this->sqlUsuarios->inserirUsuarios(self::getUsuarios())) {
			return true;
		} else {
			return false;
		}
	}

	public function atualizaUsuarios() {
		if($this->sqlUsuarios->atualizaUsuarios(self::getUsuarios())) {
			return true;
		} else {
			return false;
		}
	}

	public function deletaUsuarios($idusuarios) {
		if($this->sqlUsuarios->deletaUsuarios($idusuarios)) {
			return true;
		} else {
			return false;
		}
	}

	public function retornaQuantidadeRegistrosUsuarios($extra="") {
		if($this->sqlUsuarios->retornaQuantidadeRegistrosUsuarios($extra)) {
			return $this->sqlUsuarios->getResp();
		} else {
			return false;
		}
	}

}
?>