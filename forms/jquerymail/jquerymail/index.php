<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Envio de Formulário sem Refresh com JQuery/PHP</title>


<link rel="stylesheet" href="css/style.css" />
<!-- Incluimos a biblioteca do jquery e as Funçoes -->
<script type="text/javascript"  src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript"  src="js/funcoes.js"></script>

</head>

<body>

<div  id="box">

<table align="center" >
<tr>
<th colspan="2"><h1 align="center">Formail Sem Refresh Com Php e Jquery</h1></th>
</tr>

<tr><th colspan="2"><div id="loading"></div></th></tr>

<tr><th colspan="2"><div id='envolve'><div id="aviso"></div></div></th></tr>

<!-- function resposta(); -->
<form id="formulario" action="javascript:resposta();" method="post">

<tr>
<td>Seu Nome:</td>
<td><input name="nome" type="text" id="nome" size="45" /></td>
</tr>

<tr>
<td>Seu Email:</td>
<td><input name="email" type="text" id="email" size="45" /></td>
</tr>

<tr>
<td>Assunto:</td>
<td><input name="assunto" type="text" id="assunto" size="45" /></td>
</tr>

<tr>
<td>Mensagem:</td>
<td><input name="mensagem" type="text" id="mensagem" size="45" /></td>
</tr>

<tr>
<th colspan="2"><input type="submit" name="submit" value="Enviar" /></th>
</tr>
</form>
<tr><th class="footer" colspan="2"><a href="http://adaptiniste.com/blog">Formulario com php e jquery por ozorio silva neto </a></th></tr>

</div>
</table>
</body>
</html>