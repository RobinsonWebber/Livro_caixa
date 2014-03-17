<?php

if(isset($_POST["razao"])){

$nome = $_POST["razao"];
$endereco = $_POST["endereco"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$cnpj = $_POST["cnpj"];
$fone = $_POST["fone"];
$email = $_POST["email"];

// Verifica se o nome foi preenchido
if (empty($nome)) {
    echo "Digite o nome da empresa!";
} 

// Verifica se a mensagem foi digitada
elseif (empty($endereco) ) {
    echo "Digite o endereço!";
} 

elseif (empty($bairro) ) {
    echo "Digite o bairro!";
} 
elseif (empty($cidade) ) {
    echo "Digite a cidade!";
} 

elseif (empty($uf) ) {
    echo "Digite a sigla do estado!";
} 

// Verifica se a mensagem nao ultrapassa o limite de caracteres
elseif (strlen($uf) <> 2) {
    echo "A sigla do estado deve ter 2 caracteres";
} 

// Se não houver nenhum erro

else {
    // Inserimos no banco de dados
	include("../classes/Principal.php");

			$principal = new Principal();

			$principal->empresa(1, $nome, $endereco, $bairro, $cidade, $uf, $cnpj, $fone, $email);
            			
			if ($principal->atualizaEmpresa()){
			
			echo false ;
			}
			else{
			echo "Nao foi possivel alterar os dados da empresa!" ;
			}
       
    }

}
?>