// JavaScript Document
$(document).ready(function() {// iniciamos a leitura do arquivo
						   
// Quando o formulário for enviado, essa função é chamada com o nosso botão submit do formulario(enviar)
$("#formulario").submit(function() {

// variaveis do nosso formulario pegas por #id / .val(); quer dizer valor 
var nome = $("#nome").val();
var senha = $("#senha").val();

// Fazemos a requisão ajax com o arquivo enviar_email.php e enviamos os valores de cada campo através do método POST
$.post('forms/usuario_add.php', {nome:nome,senha:senha}, function(resposta) {
// aqui a nossas ariaveis campo name=nome e id=nome |= nome:nome
//importante primeiro vem o nome da váriavel que será recebida pelo arquivo php e depois vem a váriavel que foi atribuida por javascript
// exemplo nome:IDnome entao nome é nossa variavel via post (name='nome') e IDnome ´nossa id do campo
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