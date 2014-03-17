<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<?php
if (empty($_POST["seu_nome"])) {echo "<center><br><br><b>Você esqueceu de digitar seu nome</b><br><br><a href='javascript:history.go(-1)'>Voltar</a></center>";exit;}
elseif (empty($_POST["seu_email"])) {echo "<center><br><br><b>Você esqueceu de digitar seu e-mail</b><br><br><a href='javascript:history.go(-1)'>Voltar</a></center>";exit;}
elseif (!(strpos($_POST["seu_email"],"@")) OR strpos($_POST["seu_email"],"@") !=strrpos($_POST["seu_email"],"@")) {echo "<center><br><br><b>O seu E-mail está em formato Inválido</b><br><br><a href='javascript:history.go(-1)'>Voltar</a></center>";exit;}
elseif (empty($_POST["amigo_nome"])) {echo "<center><br><br><b>Você esqueceu de digitar o e-mail do seu amigo</b><br><br><a href='javascript:history.go(-1)'>Voltar</a></center>";exit;}
elseif (empty($_POST["amigo_email"])) {echo "<center><br><br><b>Você esqueceu de digitar o e-mail do seu amigo</b><br><br><a href='javascript:history.go(-1)'>Voltar</a></center>";exit;}
elseif (!(strpos($_POST["amigo_email"],"@")) OR strpos($_POST["amigo_email"],"@") !=strrpos($_POST["amigo_email"],"@")) {echo "<center><br><br><b>O E-mail do seu Amigo está em formato Inválido</b><br><br><a href='javascript:history.go(-1)'>Voltar</a></center>";exit;}
else {
 $mensagem = "Olá " . $_POST["amigo_nome"] . "...

" . $_POST["seu_nome"] . " estava visitando o site da nossa Imobiliária e achou que este imóvel: " . $_POST["url"] . " possa lhe interessar.


Atenciosamente,
" . $_POST["seu_nome"];
 mail($_POST["amigo_email"], "Olá " . $_POST["amigo_nome"], $mensagem, "From: " . $_POST["seu_nome"] . " <" . $_POST["seu_email"] . ">");
 echo "<center><br><br><b>Recomendação enviada com Sucesso!</b><br><br><a href='<?=$siteurl?>/paginas/recomende.php?url=" . $_POST["url"] . "'>Clique Aqui para Recomendar para outro Amigo</a><br><br><a href='javascript:window.close();'>Fechar Janela</a></center>";exit;
}
?>
</html>