<?php
  include "smtp.class.php";
  $Email = new SendMail;
  $Email->Servidor = "localhost"; 
  $Email->Autenticado = TRUE;   
  $Email->Usuario = "atendimento@webberimoveis.com.br";  //Digite o Usuário de e-mail você@seudominio
  $Email->Senha = "r4v3ng4";    //Digite a Senha do email você@seudominio
  $Email->EmailDe = $_POST['origem'];  //Digite o e-mail do remetente
  $Email->EmailPara = "robinson@webberimoveis.com.br";  //Digite o Destino
  
  $Email->Assunto = $_POST['assunto'];  // Digite o Assunto
  $Email->Corpo = $_POST['mensagem'];  //Digite o Corpo
  
  /*
   * Caso precise anexar arquivos no email
   * utilize:
   * $Email->Anexar("/caminho/do/arquivo/1");
   * $Email->Anexar("/caminho/do/arquivo/2");
   * ...
   * Não se esqueça que é necessário fazer o
   * upload do cliente para o servidor primeiro
   *
   */
   
   //Envia o email
   if($Email->Enviar())
   {
      echo "Seu email foi enviado corretamente";
   }
   else
   {
      echo "Desculpe, seu email não pode ser enviado";
   }
?>