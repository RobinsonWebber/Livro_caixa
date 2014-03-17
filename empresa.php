<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" type="text/css" href="css/view.css" media="all">
<!-- Incluimos a biblioteca do jquery e as Funçoes -->
<script type="text/javascript"  src="scripts/jquery-1.4.2.min.js"></script>
<!-- <script type="text/javascript"  src="scripts/funcoes.js"></script> -->

<script type="text/javascript">  
    jQuery(document).ready(function(){  
        jQuery('#formulario').submit(function(){  
            var dados = jQuery( this ).serialize();  
              jQuery.ajax({  
                type: "POST",  
                url: "classes/empresa_alt.php",  
                data: dados,  
                success: function( data )  
                {  
				  
				  if(data)
				  {
				  $("#aviso").fadeIn(2000);
                  $("#aviso").fadeOut(3000);
                  //  alert( data );  
				  $("#aviso").css("color","red")
				  
				  $("#aviso").html("<img src='imagens/aviso.png'/> "  + data);
				  //$("#aviso").html(data);
				  }
				  else
				  {
				  $("#aviso").fadeIn(2000);
                  $("#aviso").fadeOut(3000);
				  $("#aviso").css("color","green");//cor verde atribuido com jquery
					// e finalmente nossa mensagem de sucesso
				  $("#aviso").html("<img src='imagens/ok.png' alt='aviso...' /> Dados alterados com sucesso!");
				  $("#nome").val(""); 
				  $("#senha").val(""); 
				  $("#senha2").val(""); 
				  }
		        } 
						
            });  
              
            return false;  
        }); 
		
 	
    });  
</script>  

</head>

<body>
<div id="titulo">DADOS DA EMPRESA</div>

<div  id="box">

<table align="center">
<tr>
<th colspan="2"></font></th>
</tr>

<tr><th colspan="2"><div id="loading"></div></th></tr>

<tr><th colspan="2"><div id='envolve'><div id="aviso"></div></div></th></tr>
<?php
if(isset($_POST))
{
include("classes/Principal.php");

$principal = new Principal();

foreach($principal->retornaEmpresa() as $empresa) {

?>
<div id="menu">

<!-- function resposta(); -->
<form id="formulario" action="javascript:resposta();" method="post">
<table width="700" border="0">
    <tr>
      <td width="58" bgcolor="#C3D9FF">Razão Social</td>
      <td width="476" bgcolor="#C3D9FF"><input name="razao" type="text" id="razao" size="80" value= "<?php echo $empresa->getRazaosocial() ?>"/></td>
    </tr>
    <tr>
      <td>Endereço</td>
      <td><input name="endereco" type="text" id="endereco" size="80" value="<?php echo $empresa->getEndereco()?>" background-color="#C3D9FF"/></td>
    </tr>
    <tr>
      <td bgcolor="#C3D9FF">Bairro</td>
      <td bgcolor="#C3D9FF"><label for="bairro"></label>
      <input name="bairro" type="text" id="bairro" size="80" value="<?php echo $empresa->getBairro() ?>"/></td>
    </tr>
    <tr>
      <td>Cidade</td>
      <td><input name="cidade" type="text" id="cidade" size="80" value="<?php echo $empresa->getCidade() ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#C3D9FF">UF</td>
      <td bgcolor="#C3D9FF"><input name="uf" type="text" id="uf" size="25" value="<?php echo $empresa->getUf() ?>"/></td>
    </tr>
    <tr>
      <td>CNPJ/CPF</td>
      <td><input name="cnpj" type="text" id="cnpj" size="25" value="<?php echo $empresa->getCnpj() ?>"/></td>
    </tr>
    <tr>
      <td bgcolor="#C3D9FF">Telefone</td>
      <td bgcolor="#C3D9FF"><label for="fone"></label>
      <input bgcolor="#C3D9FF" name="fone" type="text" id="fone" size="25" value="<?php echo $empresa->getTelefone() ?>" /></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><label for="email"></label>
      <input name="email" type="text" id="email" size="80" value="<?php echo $empresa->getEmail() ?>" /></td>
    </tr>
  </table>
  <p align="left">
    <input id="element_1_1" type="submit" name="salvar" id="salvar" value="Salvar" />
  </p>
</form>
</div>
<?php
}
}
?>
</table>
</body>
</html>