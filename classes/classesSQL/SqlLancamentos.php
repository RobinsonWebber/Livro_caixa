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

class SqlLancamentos {

	private $resp;
	private $db;

	public function __construct() {
		$this->db = new DB();
	}

	public function getResp() {
		return $this->resp;
	}

	public function retornaLancamentos($extra="") {
		$sql = "SELECT * FROM lancamentos ".$extra;
		$this->db->query($sql);
		if($this->db->quantidadeRegistros() > 0) {
			while($obj = $this->db->fetchObj()) {
				$arr[] = new BasicaLancamentos($obj->idlancamento, $obj->data, $obj->historico, $obj->entrada, $obj->saida);
			}
			$this->resp = $arr;
			return true;
		} else {
			return false;
		}
	}

	public function inserirLancamentos($lancamentos) {
		$dados  = "'',";
		$dados .= "'".$lancamentos->getData()."',";
		$dados .= "'".$lancamentos->getHistorico()."',";
		$dados .= "'".$lancamentos->getEntrada()."',";
		$dados .= "'".$lancamentos->getSaida()."'";
		$sql = "INSERT INTO lancamentos VALUES (".$dados.")";
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function atualizaLancamentos($lancamentos) {
		$sql = "UPDATE lancamentos SET
				data='".$lancamentos->getData()."',
				historico='".$lancamentos->getHistorico()."',
				entrada='".$lancamentos->getEntrada()."',
				saida='".$lancamentos->getSaida()."'
		WHERE idlancamento='".$lancamentos->getidlancamento()."'";
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function deletaLancamentos($idlancamento) {
		$sql = "DELETE FROM lancamentos WHERE idlancamento='".$idlancamento."'";
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function retornaQuantidadeRegistrosLancamentos($extra="") {
		$sql = "SELECT * FROM lancamentos ".$extra;
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