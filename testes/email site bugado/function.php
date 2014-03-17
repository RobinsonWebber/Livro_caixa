<?php
//include_once("mail/class.phpmailer.php");
include_once("mail/class.smtp.php");
include_once("../../Conf.php");

$sql = mysql_query("SELECT * FROM tb_imobiliaria WHERE id='1'");
	//echo $sql2;
$dadosc = mysql_fetch_array($sql);
$emailvai = $dadosc["email1"];
switch($_POST['task'])
{
	case "gen_image":
		$width = 50;
		$height = 24;
	
		$my_image = imagecreatetruecolor($width, $height);
		
		imagefill($my_image, 0, 0, 0xFFFFFF);
		
		// add noise
		for ($c = 0; $c < 40; $c++){
			$x = rand(0,$width-1);
			$y = rand(0,$height-1);
			imagesetpixel($my_image, $x, $y, 0x000000);
			}
		
		$x = rand(1,10);
		$y = rand(1,10);
		
		$rand_string = rand(1000,9999);
		imagestring($my_image, 5, $x, $y, $rand_string, 0x000000);
		$filenametemp="../../img/gif".time().".gif";
		imagejpeg($my_image, $filenametemp); 
		$ImageData = file_get_contents($filenametemp); 
		$ImageDataEnc = base64_encode($ImageData); 
		unlink($filenametemp); // delete the file
		echo  '<img src="data:image/gif;base64,'.$ImageDataEnc.'"  id="ver_code_image" >
				 <input name="codemd5" type="hidden" id="codemd5" value="'.md5($rand_string.'a4xn').'">';
	break;
	
	case "send_email":
		# check to see if verificaton code was correct
	if(md5($_POST['ver_code'].'a4xn')==$_POST['codemd5'])
	{	
		# check to see if info are filled
		$info_validate = (trim($_POST['name'])!='' && trim($_POST['email'])!='' && trim($_POST['subject'])!='' && trim($_POST['message'])!='');
		
		if($info_validate == true)
		{
		  $Email = new SendMail;
		  $Email->Servidor = "localhost"; 
		  $Email->Autenticado = TRUE;   
		  $Email->Usuario = "atendimento@webberimoveis.com.br";  //Digite o Usuário de e-mail você@seudominio
		  $Email->Senha = "r4v3ng4";    //Digite a Senha do email você@seudominio
		  $Email->EmailDe = $_POST['email'];  //Digite o e-mail do remetente
		  $Email->EmailPara = "robinson@webberimoveis.com.br";  //Digite o Destino
		  
		  $Email->Assunto = $_POST['subject']." - Mensagem do Site"; 
		 		  
		  // Gerando corpo da mensagem  
		  $form_info_arr['name'] = $_POST['name'];
		  $form_info_arr['email'] = $_POST['email'];
		  $form_info_arr['url'] = $_POST['url'];
		  $form_info_arr['message'] = $_POST['message'];
		  
		  $Email->Corpo = generateMessageBody($form_info_arr);
				 
			
			if($Email->Enviar()) 
			{
				$msg = '<div class="success">Email enviado com sucesso <br/> Entraremos em contato o mais breve possivel!</div>';
			}
			else
			{
				$msg = '<div class="alert">Erro ao enviar email</div>';
			}
		}
		else
		{
			$msg = '<div class="alert">Informação Invalida</div>';
		}
	}
	else
	{
		$msg = '<div class="alert">Código incorreto</div>';
	}
	echo $msg;
	break;
}

function generateMessageBody($form_info_arr)
{
	
	$string =  "Name: ".stripslashes($form_info_arr['name'])."<br>";
	$string .= "Email: ".$form_info_arr['email']."<br>";
	
	if(trim($form_info_arr['url'])!='')	
		$string .= "URL: ".$form_info_arr['url']."<br>";
	$string .= "Message: ".(nl2br(stripslashes($form_info_arr['message'])))."<br>";
	
	return $string;
}

?>

