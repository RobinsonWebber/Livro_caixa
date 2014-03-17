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

class SqlEmpresa {

	private $resp;
	private $db;

	public function __construct() {
		$this->db = new DB();
	}

	public function getResp() {
		return $this->resp;
	}

	public function retornaEmpresa($extra="") {
		$sql = "SELECT * FROM empresa ".$extra;
		$this->db->query($sql);
		if($this->db->quantidadeRegistros() > 0) {
			while($obj = $this->db->fetchObj()) {
				$arr[] = new BasicaEmpresa($obj->idempresa, $obj->razaosocial, $obj->endereco, $obj->bairro, $obj->cidade, $obj->uf, $obj->cnpj, $obj->telefone, $obj->email);
			}
			$this->resp = $arr;
			return true;
		} else {
			return false;
		}
	}

	public function inserirEmpresa($empresa) {
		$dados  = "'',";
		$dados .= "'".$empresa->getRazaosocial()."',";
		$dados .= "'".$empresa->getEndereco()."',";
		$dados .= "'".$empresa->getBairro()."',";
		$dados .= "'".$empresa->getCidade()."',";
		$dados .= "'".$empresa->getUf()."',";
		$dados .= "'".$empresa->getCnpj()."',";
		$dados .= "'".$empresa->getTelefone()."',";
		$dados .= "'".$empresa->getEmail()."'";
		$sql = "INSERT INTO empresa VALUES (".$dados.")";
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function atualizaEmpresa($empresa) {
		$sql = "UPDATE empresa SET
				razaosocial='".$empresa->getRazaosocial()."',
				endereco='".$empresa->getEndereco()."',
				bairro='".$empresa->getBairro()."',
				cidade='".$empresa->getCidade()."',
				uf='".$empresa->getUf()."',
				cnpj='".$empresa->getCnpj()."',
				telefone='".$empresa->getTelefone()."',
				email='".$empresa->getEmail()."'
		WHERE idempresa='".$empresa->getidempresa()."'";
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function deletaEmpresa($idempresa) {
		$sql = "DELETE FROM empresa WHERE idempresa='".$idempresa."'";
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function retornaQuantidadeRegistrosEmpresa($extra="") {
		$sql = "SELECT * FROM empresa ".$extra;
		$this->db->query($sql);
		if($this->db->quantidadeRegistros() > 0) {
			$this->resp = $this->db->quantidadeRegistros();
			return true;
		} else {
			$this->resp = "0";
			return false;
		}
	}

}
?>