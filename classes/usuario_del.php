<?php

$id = $_GET['id'];

include("../classes/Principal.php");

	$principal = new Principal();
	if ($principal->retornaQuantidadeRegistrosUsuarios() == 1){
        echo "Deve haver pelo menos um usuário cadastrado no sistema!";
		}
    else{		
		if ($principal->deletaUsuarios($id)){
			echo "Usuario excluido com sucesso!" ;
		}
		else{
			echo "Nao foi possivel excluir usuario!" ;
		}
	}
?>