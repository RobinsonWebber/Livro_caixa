<html>
<head>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">

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
<div id="aviso"></div>
<div id="menu">
<a href="forms/form_historico.php"><img src="imagens/addhistorico.png" width="32" height="40"></a>
<?php


include("classes/Principal.php");


$principal = new Principal();

?>
<div id="aviso"></div>
<table width="800" border="0">
  <tr bgcolor="#E8EEF7">
  <td width="57" height="41"><b>ID</b></td>
  <td width="596"><b>Historico</b></td>
  <td width="64"><b>Opcoes</b></td>
  <td width="65"></td>
  <tr>
  <?php
  $i = 1;
  foreach($principal->retornaHistoricos() as $historico) {
  ?>
  <tr 
	<?php if ($i % 2 == 0)
	{
	echo "bgcolor= '#E8EEF7'";
	}
	?>	
	>
    <td height="40"><?php echo $historico->getIdhistorico();?></td>
    <td><?php echo $historico->getDescricao();?></td>
	<td><a href="forms/form_historico.php?acao=alt&id=<?php echo $historico->getIdhistorico();?>"><img src="imagens/edit.png" width="20" height="20"/></a></td>
	<td width="65"><a href="classes/historico_del.php?id=<?php echo $historico->getIdhistorico();?>"><img src="imagens/delete.png" width="20" height="20" /></a></td>
  </tr>
  <?php $i++;
  }
  ?>   
</div>  
</table>
</body>
</html>



