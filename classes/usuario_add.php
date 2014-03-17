<?php

if(isset($_POST["nome"])){

$nome = $_POST["nome"];
$senha = $_POST["senha"];
$senha2 = $_POST["senha2"];

// Verifica se o nome foi preenchido
if (empty($nome)) {
    echo "Digite o Usuário!";
} 

// Verifica se a mensagem foi digitada
elseif (empty($senha)) {
    echo "Digite a senha";
} 
// Verifica se a mensagem nao ultrapassa o limite de caracteres
elseif (strlen($senha) > 8) {
    echo "A senha deve ter no máximo 8 caracteres";
} 

elseif($senha <> $senha2) {
    echo "As senhas digitadas não conferem";
}
// Se não houver nenhum erro

else {
    // Inserimos no banco de dados
	include("../classes/Principal.php");

			$principal = new Principal();

			$principal->usuarios("", $nome, $senha);
             
			if ($principal->inserirUsuarios()){
			echo false ;
			}
			else{
			echo "Nao foi possivel inserir usuario!" ;
			}
       
    }

}
?>