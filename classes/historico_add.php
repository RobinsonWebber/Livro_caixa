<?php

//if(isset($_POST["descricao"])){

$descricao = $_POST["descricao"];


// Verifica se o nome foi preenchido
if (empty($descricao)) {
    echo "Digite a descrição do histórico";
} 

// Verifica se a mensagem foi digitada

 
// Verifica se a mensagem nao ultrapassa o limite de caracteres
elseif (strlen($descricao) > 150) {
    echo "Descricao nao pode ser maior que 150 caracteres";
} 

// Se não houver nenhum erro

else {
    // Inserimos no banco de dados
	include("../classes/Principal.php");

			$principal = new Principal();

			$principal->Historicos("", $descricao);
            
			if ($principal->inserirHistoricos()){
			echo false ;
			}
			else{
			echo "Problema ao tentar inserir histórico!" ;
			}
       
    }


?>