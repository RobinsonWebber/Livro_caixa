<?php

$id = $_GET['id'];

include("../classes/Principal.php");

	$principal = new Principal();
	       
	if ($principal->deletaHistoricos($id)){
		echo "Histórico excluido com sucesso!" ;
	}
	else{
		echo "Nao foi possivel excluir histórico!" ;
	}
?>