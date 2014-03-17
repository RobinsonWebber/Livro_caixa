<?php
include("../classes/Principal.php");
$acao = $_GET['acao'];
$id = $_GET['id'];
$principal = new Principal();
$descricao = "";

if ($acao=="alt") {

 $extra = "WHERE idhistorico=".$id;

				foreach($principal->retornaHistoricos($extra) as $historico) {
					$descricao = $historico->getDescricao();
				}
} 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<!-- <link rel="stylesheet" href="css/style_forms.css" /> -->
<!-- Incluimos a biblioteca do jquery e as Funçoes -->
<script type="text/javascript"  src="../scripts/jquery-1.4.2.min.js"></script>
<!-- <script type="text/javascript"  src="scripts/funcoes.js"></script> -->

<script type='text/javascript'>
// JavaScript Document
$(document).ready(function() {// iniciamos a leitura do arquivo
						   
// Quando o formulário for enviado, essa função é chamada com o nosso botão submit do formulario(enviar)
$("#formulario").submit(function() {
// variaveis do nosso formulario pegas por #id / .val(); quer dizer valor 
var descricao = $("#descricao").val();

$.post('classes/historico_add.php', {descricao:descricao}, function(resposta) {

// Efeitos fade jquery
$("#aviso").fadeIn(3000);
$("#aviso").fadeOut(5000);

// Se a resposta é ufa em Erro
if (resposta != false) {
	
// Exibe o erro na div aviso

$("#aviso").html(resposta);

} 
// Se resposta for false, ou seja, não ocorreu nenhum erro
else {
// Exibe mensagem de sucesso na div aviso


// loading sera o nosso processando dados para enviar
$("#loading").fadeIn(1000);
$("#loading").fadeOut(1000);
$("#loading").html("Processando <img src='./img/loader.gif' alt='processando dados' />");

$("#aviso").css("color","green");//cor verde atribuido com jquery

// e finalmente nossa mensagem de sucesso
$("#aviso").html("<img class='sucesso' src='./img/sucesso.png' alt='img'>Mensagem enviada com sucesso!");



// Limpando todos os campos do forulario no caso val = zero
$("#nome").val("");
$("#senha").val("");

}

});
});
});
</script>
</head>

<body>


<div  id="box">

<table align="center">
<tr>
<th colspan="2"><h1 align="center">Cadastro de Histórico</h1></th>
</tr>

<tr><th colspan="2"><div id="loading"></div></th></tr>

<tr><th colspan="2"><div id='envolve'><div id="aviso"></div></div></th></tr>

<!-- function resposta(); -->
<form id="formulario" action="javascript:resposta();" method="post">

<tr>
<td>Descrição:</td>
<td><input name="descricao" type="text" id="descricao" size="80" value= "<?php echo $descricao;?>"/></td>
</tr>
<tr>
<th colspan="2"><input type="submit" name="submit" value="<?php if ($acao == "alt")echo "Alterar";  else echo "Cadastrar"; ?>"/></th>
</tr>
</form>

</div>
</table>
</body>
</html>