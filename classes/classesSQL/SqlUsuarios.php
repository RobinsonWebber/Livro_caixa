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

class SqlUsuarios {

	private $resp;
	private $db;

	public function __construct() {
		$this->db = new DB();
	}

	public function getResp() {
		return $this->resp;
	}

	public function retornaUsuarios($extra="") {
		$sql = "SELECT * FROM usuarios ".$extra;
		$this->db->query($sql);
		if($this->db->quantidadeRegistros() > 0) {
			while($obj = $this->db->fetchObj()) {
				$arr[] = new BasicaUsuarios($obj->idusuarios, $obj->nome, $obj->senha);
			}
			$this->resp = $arr;
			return true;
		} else {
			return false;
		}
	}

	public function inserirUsuarios($usuarios) {
		$dados  = "'',";
		$dados .= "'".$usuarios->getNome()."',";
		$dados .= "'".$usuarios->getSenha()."'";
		$sql = "INSERT INTO usuarios VALUES (".$dados.")";
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function atualizaUsuarios($usuarios) {
		$sql = "UPDATE usuarios SET
				nome='".$usuarios->getNome()."',
				senha='".$usuarios->getSenha()."'
		WHERE idusuarios='".$usuarios->getidusuarios()."'";
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function deletaUsuarios($idusuarios) {
		$sql = "DELETE FROM usuarios WHERE idusuarios='".$idusuarios."'";
		if($this->db->query($sql)) {
			return true;
		} else {
			return false;
		}
	}

	public function retornaQuantidadeRegistrosUsuarios($extra="") {
		$sql = "SELECT * FROM usuarios ".$extra;
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