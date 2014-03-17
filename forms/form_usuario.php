<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<!-- <link rel="stylesheet" href="css/style_forms.css" /> -->
<!-- Incluimos a biblioteca do jquery e as Funçoes -->
<script type="text/javascript"  src="scripts/jquery-1.4.2.min.js"></script>

<!-- <script type="text/javascript"  src="scripts/funcoes.js"></script> -->
<script src="js/jquery.js"></script> 
<script src="js/jquery.form.js"></script> 

<script type="text/javascript">  
    jQuery(document).ready(function(){  
        jQuery('#formulario').submit(function(){  
            var dados = jQuery( this ).serialize();  
              jQuery.ajax({  
                type: "POST",  
                url: "classes/usuario_add.php",  
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
				  $("#aviso").html("<img src='./imagens/ok.png' alt='aviso...' /> Usuario cadastrado com sucesso!");
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
<th colspan="2"><h1 align="center">Cadastro de Usuário</h1></th>
</tr>

<tr><th colspan="2"><div id="loading"></div></th></tr>

<tr><th colspan="2"><div id="envolve"><div id="aviso"></div></div></th></tr>

<form id="formulario" action="classes/usuario_add.php" method="post">

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