<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<!-- <link rel="stylesheet" href="css/style_forms.css" /> -->
<!-- Incluimos a biblioteca do jquery e as Funçoes -->
<script type="text/javascript"  src="scripts/jquery-1.4.2.min.js"></script>
<!-- <script type="text/javascript"  src="scripts/funcoes.js"></script> -->

<script type='text/javascript'>
// JavaScript Document
$(document).ready(function() {// iniciamos a leitura do arquivo
						   
// Quando o formulário for enviado, essa função é chamada com o nosso botão submit do formulario(enviar)
$("#formulario").submit(function() {

// variaveis do nosso formulario pegas por #id / .val(); quer dizer valor 
var nome = $("#nome").val();
var senha = $("#senha").val();
var senha2 = $("#senha2").val();

// Fazemos a requisão ajax com o arquivo enviar_email.php e enviamos os valores de cada campo através do método POST
$.post('classes/usuario_add.php', {nome:nome,senha:senha,senha2:senha2}, function(resposta) {

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
$("#loading").html("Processando <img src='./imagens/loader.gif' alt='processando dados' />");

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
<th colspan="2"><h1 align="center">Cadastro de Usuário</h1></th>
</tr>

<tr><th colspan="2"><div id="loading"></div></th></tr>

<tr><th colspan="2"><div id='envolve'><div id="aviso"></div></div></th></tr>

<!-- function resposta(); -->
<form id="formulario" action="javascript:resposta();" method="post">

<tr>
<td>Usuário:</td>
<td><input name="nome" type="text" id="nome" size="45" /></td>
</tr>

<tr>
  <td>Senha:</td>
  <td><input name="senha" type="password" id="senha" size="45" /></td>
</tr>
<tr>
<td>Confirmar senha:</td>
<td><label for="senha2"></label>
  <input name="senha2" type="password" id="senha2" size="45" /></td>
</tr>


<tr>
<th colspan="2"><input type="submit" name="submit" value="Cadastrar" /></th>
</tr>
</form>

</div>
</table>
</body>
</html>