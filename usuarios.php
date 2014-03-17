<html>
<head>
<script type='text/javascript'>
function exclui(id) {
	if(confirm("Confirma exclusão?")) {
		document.location.href = "classes/usuario_del.php?id="+id;
	}
	else{
	
	return;
	}
}

</script>
<script type='text/javascript'>
//funcão para carregar na div conteudo
$(document).ready(function(){

// Executa o evento CLICK em todos os links do menu

 $('#menu a').live('click',function(){

  // Faz o carregamento da página de acordo com o COD da página, que vai pegar os valores da página page.php.

  $('#conteudo').load($(this).attr('href'));

  return false;

  });

});
</script>

</head>
<body>
<div id="titulo">CADASTRO DE USUÁRIOS</div>
<div id="conteudo">

</div>
<?php

include("classes/Principal.php");

$principal = new Principal();

?>
<div id="aviso"></div>
<div id="menu">
<a href="forms/form_usuario.php"><img src="imagens/adduser.png" width="32" height="32"></a>

<table width="800" border="0">
  <tr bgcolor="#E8EEF7">
  <td width="388" height="41"><b>Usuario</b></td>
  <td width="247"><b>Senha</b></td>
  <td width="66"><b>Opcoes</b></td>
  <td width="81"></td>
  <tr>
  <?php
  $i = 1;
  foreach($principal->retornaUsuarios() as $usuario) {
  ?>
    <tr 
	<?php if ($i % 2 == 0)
	{
	echo "bgcolor= '#E8EEF7'";
	}
	
	?>
	>
    <td height="40"><?php echo $usuario->getNome();?></td>
    <td><?php echo $usuario->getSenha();?></td>
	<td><a href=""><img src="imagens/edit.png" width="20" height="20"/></a></td>
	<td width="81"><a href="classes/usuario_del.php?id=<?php echo $usuario->getIdusuarios();?>"><img src="imagens/delete.png" width="20" height="20" /></a></td> 
   
  </tr>
  <?php $i++;
  }
  ?>   
</table>
</div>

</body>
</html>