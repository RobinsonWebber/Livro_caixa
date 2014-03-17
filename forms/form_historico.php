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

<script type="text/javascript">  
    jQuery(document).ready(function(){  
        jQuery('#formulario').submit(function(){  
            var dados = jQuery( this ).serialize();  
              jQuery.ajax({  
                type: "POST",  
                url: "classes/historico_add.php",  
                data: dados,  
                success: function( data )  
                {  
				  
				  if(data)
				  {
				  $("#aviso").fadeIn(2000);
                  $("#aviso").fadeOut(3000);
                  //  alert( data );  
				  $("#aviso").css("color","red")
				  
				  $("#aviso").html("<img src='./imagens/aviso.png'/> "  + data);
				  //$("#aviso").html(data);
				  }
				  else
				  {
				  $("#aviso").fadeIn(2000);
                  $("#aviso").fadeOut(3000);
				  $("#aviso").css("color","green");//cor verde atribuido com jquery
					// e finalmente nossa mensagem de sucesso
				  $("#aviso").html("<img src='./imagens/ok.png' alt='aviso...' /> Historico cadastrado com sucesso!");
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