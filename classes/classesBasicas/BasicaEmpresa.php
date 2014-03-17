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
 *	Data da geração do arquivo: 08-04-2013 as 20:44:04
 *	Referente ao banco de dados: livro_caixa
 */

class BasicaEmpresa {

	private $idempresa;
	private $razaosocial;
	private $endereco;
	private $bairro;
	private $cidade;
	private $uf;
	private $cnpj;
	private $telefone;
	private $email;

	public function __construct($idempresa="",$razaosocial="",$endereco="",$bairro="",$cidade="",$uf="",$cnpj="",$telefone="",$email="") {
		$this->idempresa = $idempresa;
		$this->razaosocial = $razaosocial;
		$this->endereco = $endereco;
		$this->bairro = $bairro;
		$this->cidade = $cidade;
		$this->uf = $uf;
		$this->cnpj = $cnpj;
		$this->telefone = $telefone;
		$this->email = $email;
	}

	public function getIdempresa() {
		return $this->idempresa;
	}

	public function getRazaosocial() {
		return $this->razaosocial;
	}

	public function getEndereco() {
		return $this->endereco;
	}

	public function getBairro() {
		return $this->bairro;
	}

	public function getCidade() {
		return $this->cidade;
	}

	public function getUf() {
		return $this->uf;
	}

	public function getCnpj() {
		return $this->cnpj;
	}

	public function getTelefone() {
		return $this->telefone;
	}

	public function getEmail() {
		return $this->email;
	}

}
?>