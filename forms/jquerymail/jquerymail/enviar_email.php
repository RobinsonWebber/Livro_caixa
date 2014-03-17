<?php

    if(isset($_POST)){
class Email {
	// nossos atributos da classe
    public $nome = "";
    public $email = "";
    public $mensagem = "";
    public $verifica = "";
    public $destinatario = "";
    public $msg = "";
    public $headers = "";
    public $mail="";
    public $assunto = "";

function __construct() {// funççao contrutora

    // nossas variaveis vindas do formulario via post
    $this->nome = $_POST["nome"];
    $this->email = $_POST["email"];
    $this->assunto = $_POST["assunto"];
    $this->mensagem = $_POST["mensagem"];
    $this->verifica="^[a-z A-Z 0-9 _ - .]+[@]+[a-z A-Z 0-9 _ - .]+[.]+[a-z A-Z 0-9 _ - .]^";


		
    // Validacao de Campos do formulario
    if (empty($this->nome)) {
    echo "<div id='erro'><img class='erro' src='img/erro.png' alt='img'> Insira Seu Nome <img class='erro' src='img/loader.gif'  /></div>";
    }

    elseif (!preg_match($this->verifica,$this->email)){
    echo "<div id='erro'><img clas='erro' src='img/erro.png' alt='img'>  Insira Um Email Valido <img class='erro' src='img/loader.gif'  /></div>";
    }
    elseif (empty($this->assunto)) {
    echo "<div id='erro'><img class='erro' src='img/erro.png' alt='img'>Insira o Assunto <img class='erro' src='img/loader.gif'  /> </div>";
    }

    elseif (empty($this->mensagem)) {
    echo "<div id='erro'><img class='erro' src='img/erro.png' alt='img'> Insira uma Mensagem <img class='erro' src='img/loader.gif'  /></div>";
    }

    
    // Fim da Validacao
    else {
   
    //email para onde vai a mensagem
    $this->destinatario="admin@localhost.com";

    // mensagem que vai para o destinatario
    $this->msg="
    <table align='center' width='500' border='1' bordercolor='#006699'>

    <tr>
    <th colspan='3' bgcolor='#6699FF'>Formulario de Contato</th>
    </tr>

    <tr>
    <td width='114' bgcolor='#eeeeee'>Nome:</td>
    <td width='270' bgcolor='#eeeeee'>$this->nome</td>
    </tr>

    <tr>
    <td bgcolor='#eeeeee'>Email:</td>
    <td bgcolor='#eeeeee'>$this->email</td>
    </tr>

    <tr>
    <td bgcolor='#eeeeee'>Mensagem:</td>
    <td bgcolor='#eeeeee'>$this->mensagem</td>
    </tr>



    </table>
    ";

    // formataçao para nosso email
    $this->headers = "From:<$this->email>\n"; // De que email vooê recebeu email do usuario
    $this->headers .= "Content-Type: text/html; charset=ISO-8859-1\n";//formatação html
    $this->headers .= "MIME-Version: 1.0\n";/*Extensões Multi função para Mensagens de Internet (sigla MIME do inglês Multipurpose Internet Mail Extensions) é uma norma da internet para o formato das mensagens de correio eletrônico. A grande maioria das mensagens de correio eletrônico são trocadas usando o protocolo SMTP e usam o formato MIME. As mensagens na Internet tem uma associação tão estreita aos padrões SMTP e MIME que algumas vezes são chamadas de mensagens SMTP/MIME.*/

    // função mail responsavel de enviar o email
    $this->mail =  mail($this->destinatario,$this->assunto,$this->msg,$this->headers);

    // Se inserido com sucesso
    if ($this->mail) {
    echo false;
	//echo"<tr><th colspan='2'><div id='loading'>Processando <img src='loader.gif' alt='Enviando'></div></th></tr>";
	//echo"<div id='sucesso'><img class='sucesso' src='sucesso.png' alt='img'>Mensagem enviada com sucesso!</div>";
    }
    // Se houver algum erro ao inserir
    else {
    echo "<div id='erro'><img class='erro' src='img/erro.png' alt='img'> ERRO NO ENVIO</div>";
    }

    }

    }// funcao
    }//classe
    $Email = new Email();
    }
?>