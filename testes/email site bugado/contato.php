<? 
$sql = mysql_query("SELECT * FROM tb_imobiliaria WHERE id='1'");
	//echo $sql2;
$dadosc = mysql_fetch_array($sql);
?>
<script language="JavaScript" src="includes/js/jquery.js"></script>
<script language="JavaScript" src="includes/js/jquery.form.js"></script>
<script language="JavaScript" src="includes/js/jquery.validate.js"></script>
<script language="JavaScript" src="includes/js/script.js"></script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<? echo "$dadosc[api]";?>&sensor=false"type="text/javascript"></script>
<link href="includes/css/style.css" rel="stylesheet" type="text/css" />
<style>
#contact_wrapper {font-family:"Trebuchet MS","Segoe UI",Trebuchet,"Bitstream Vera Sans","DejaVu Sans",Verdana,"Verdana Ref",sans serif; line-height:1.7em;font-size:12px;}
.clear {clear:both}
.contact_wrapper strong {font-weight:bold; color:#000}
h3 {font:2em "PTSansBold", Arial, Helvetica, sans-serif; color:#000; margin:0 0 0 -3px; background:0 0 no-repeat; padding:1px 0 7px 40px}

</style>
<div class="meio_site">
<div id="jogos-gratis-anuncio">
  
<div id="jogos-gratis">
	  <div class="titulo-barra">
					<h2 class="titulo-categorias-jogos">Fale conosco</h2>
				</div>
				
				<!-- BOX JOGOS-->
				<div class="contact_wrapper" id="contact_wrapper">
				  <!-- ###### left_column start ###### -->
				  <div class="left_column">
				    <div class="location_box">
				      <h3 class="location">Localiza&ccedil;&atilde;o</h3>
				      <a href="#" class="show_map" title="Ver Mapa"><span class="show"  id="show_map">Ver Mapa</span><span class="hide"  id="hide_map">Esconder Mapa</span></a>
				      <div class="clear"></div>
				      <span> <strong>Endere&ccedil;o:</strong> <? echo "$dadosc[endereco] - $dadosc[bairro] - $dadosc[cidade] - $dadosc[estado]";?> <br />
				        <strong>Horarios de atendimento:</strong> <? echo "$dadosc[horarios]";?> </span>
				      <div id="map_canvas" class="map_canvas"></div>
			        </div>
				    <div class="contact_box">
				      <h3 class="message">Formul&aacute;rio de Contato</h3>
				      <span>Preencha todos os campos.</span>
				      <div class="notice_box" id="notice_box"></div>
				      <!-- ###### contact form start ###### -->
				      <div class="contact_form">
				        <form action="" method="post" name="form1" id="form1">
                        <input type="hidden" name="emailvai2" value="<?=$dadosc["email1"]?>" />
				          <p>
				            <label>Nome<span class="mandatory">*</span></label>
				            <br />
				            <input type="text" name="name"  class="required" />
			              </p>
				          <p>
				            <label>Email<span class="mandatory">*</span></label>
				            <br />
				            <input type="text" name="email" class="required email" />
			              </p>
				          <p>
				            <label>URL</label>
				            <br />
				            <input type="text" name="url" class="url" />
			              </p>
				          <p>
				            <label>Assunto<span class="mandatory">*</span></label>
				            <br />
				            <input type="text" name="subject" class="required" />
			              </p>
				          <p>
				            <label>Mensagem<span class="mandatory">*</span></label>
				            <br />
				            <textarea name="message" cols="40" rows="10" style="height:120px" class="required"></textarea>
			              </p>
				          <p>
				            <label>Codigo de segura&ccedil;a<span class="mandatory">*</span></label>
				            <br />
			              </p>
				          <div class="code" id="image_td"></div>
				          <input class="code required" type='text' name="ver_code" />
				          </p>
				          <p>
				            <input name="submit" class="submit" type="submit" value="Enviar"/>
			              </p>
			            </form>
			          </div>
				      <!-- ###### contact form end ###### -->
			        </div>
			      </div>
				  <!-- ###### left_column end ###### -->
				  <!-- ###### right_column start ###### -->
				  <div class="right_column">
				    <div class="phone_box">
				      <h3 class="phone">Telefones</h3>
				      <span><? if($dadosc["fone1"] != ''){ ?> <strong>Telefone:</strong> (<? echo "$dadosc[ddd1]";?>) <? echo "$dadosc[fone1]";?><br /><? } ?>
				        <? if($dadosc["telefone2"] != ''){ ?> <strong>Telefone:</strong> (<? echo "$dadosc[ddd2]";?>) <? echo "$dadosc[telefone2]";?><br /><? } ?>
				       <? if($dadosc["telefone3"] != ''){ ?> <strong>Telefone:</strong> (<? echo "$dadosc[ddd3]";?>) <? echo "$dadosc[telefone3]";?><br /><? } ?>
				        <? if($dadosc["fax"] != ''){ ?> <strong>Fax:</strong> (<? echo "$dadosc[dddfax]";?>) <? echo "$dadosc[fax]";?><br /><? } ?>
			          </span> </div>
				    <div class="email_box">
				      <h3 class="email">Emails</h3>
				      <span> <? if($dadosc["email1"] != ''){ ?><a href="#"><? echo "$dadosc[email1]";?></a> <? } ?><? if($dadosc["email2"] != ''){ ?><a href="#"><? echo "$dadosc[email2]";?></a> <? } ?><? if($dadosc["email3"] != ''){ ?><a href="#"><? echo "$dadosc[email3]";?></a> <? } ?><? if($dadosc["email4"] != ''){ ?><a href="#"><? echo "$dadosc[email4]";?></a> <? } ?> </span> </div>
			      </div>
				  <!-- ###### right_column end ###### -->
				  <div class="clear"></div>
	  </div>
</div>
<div class="anuncio_aranhaceu">
            <p style="font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px; color:#036; margin-bottom:8px;">SIMULAR FINANCIAMENTO</p>
				 <?
$act = "exibir";
$formato = "150";
$inc = "N";
$cat = "N";
$limite = "LIMIT 6";
$ordem = "Order by rand()";
include "paginas/publicidades/exibe.php";
?>
			</div>
</div><!--JOGOS GRATIS--></div>