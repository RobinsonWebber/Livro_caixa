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

class SqlHistoricos {

	private $resp;
	private $db;

	public function __construct() {
		$this->db = new DB();
	}

	public function getResp() {
		return $this->resp;
	}

	public function retornaHistoricos($extra="") {
		$sql = "SELECT * FROM historicos ".$extra;
		$this->db->query($sql);
		if($this->db->quantidadeRegistros() > 0) {
			while($obj = $this->db->fetchObj()) {
				$arr[] = new BasicaHistoricos($obj->idhistorico, $obj->descricao);
			}
			$this->resp = $arr;
			return true;
		} else {
			return false;
		}
	}

	public function inserirHistoricos($historicos) {
		$dados  = "'',";
		$dados .= "'".$historicos->getDescricao()."'";
		$sql = "INSERT INTO historicos VALUES (".$dados.")";
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function atualizaHistoricos($historicos) {
		$sql = "UPDATE historicos SET
				descricao='".$historicos->getDescricao()."'
		WHERE idhistorico='".$historicos->getidhistorico()."'";
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function deletaHistoricos($idhistorico) {
		$sql = "DELETE FROM historicos WHERE idhistorico='".$idhistorico."'";
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function retornaQuantidadeRegistrosHistoricos($extra="") {
		$sql = "SELECT * FROM historicos ".$extra;
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