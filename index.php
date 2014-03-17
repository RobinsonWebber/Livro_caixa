<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Sistema de Livro Caixa</title>
<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<script type='text/javascript' src="scripts/jquery-1.5.1.min.js"></script>
<script type="text/javascript" language="javascript" src="scrpts/jquery-1.3.2.js"></script>
<script type="text/javascript" src="scripts/view.js"></script>


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
<body id="main_body" >
<div id="form_container">
   <div id="status"></div>
	<div id="menu">
	  <img src="imagens/line.jpg" width="800" height="20" />
	  <table width="747" border="0">
       <tr>
           <td width="121"><a href="empresa.php"><img title="Alteração dos dados da empresa" src="imagens/empresa.png" width="64" height="64" alt="Dados da Empresa" /></a></td>
           <td width="120"><a href="historicos.php"><img title="Cadastro de Históricos" src="imagens/historico.png" width="64" height="64" alt="Cadastro de histórico" /></a></td>
           <td width="120"><a href="lancamentos.php"><img title="Lançamentos"src="imagens/lancamentos.png" width="64" height="64" alt="Lançamentos" /></a></td>
           <td width="120"><a href="usuarios.php"><img title="Cadastro de usuários" src="imagens/usuario.png" width="65" height="65" alt="Cadastro de usuários" /></a></td>
           <td width="244"><a href="relatorios.php"><img title="Relatórios" src="imagens/relatorios.png" width="64" height="64" alt="Relatórios" /></a></td>
         </tr>
      </table>
       <br />
<img src="imagens/line.jpg" width="800" height="20" /></div>
	  
	<div id="conteudo" class="form_description">
      <div align="center"><img src="imagens/logo.jpg" width="485" height="323" /></div>
	</div>
		<div id="footer">
		<h1>SISTEMA LIVRO CAIXA</h1>
		</div>
</div>
</body>
</html>