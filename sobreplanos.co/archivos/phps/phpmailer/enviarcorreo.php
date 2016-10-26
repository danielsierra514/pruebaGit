<?php
date_default_timezone_set('America/Toronto');
require_once 'class.phpmailer.php';
function enviarcorreo($destino,$texto,$titulo){

$todo="
<div id='contcorreo'><table background='http://www.discrepante.com/images/patron_fondo.png' width='275' height='95' cellpadding='0' cellspacing='0' border='0'>
        <tr>
            <td>


	<div id='rotulocorreo' style=\"width:610px;height:50px;line-height:60px;text-align:right;color:#ffffff;background-color:#3D4444;font-size:28px;font-family: 'Pompiere', sans-serif;font-family: Helvetica, Arial, Sans-Serif;padding-top:20px;padding-right:30px;\">
		<img src='http://www.discrepante.com/images/logo_discrepante.png' width='185' height='50' />
	</div>
	<img src='http://www.discrepante.com/images/barrita.jpg'hspace='0' style='display:block'/>

	<div id='textcontenido' style=\"width:560px;height:auto;padding-top:60px;padding-bottom:20px;margin_bottom:40px;padding-right:40px;padding-left:40px;text-align:justify;display:block;font-family: Helvetica, Arial, Sans-Serif;\">
		".$titulo."
		<br><br><br>
		".$texto."
		<br><br><br>
	</div>
	
	<img src='http://www.discrepante.com/images/barrita.jpg' style='display:block'/>


	
	<div id='footercontenido' style=\"width:640px;height:50px;padding-top:20px;padding-bottom:20px;text-align:center;color:#ffffff;background-color:#3D4444;font-family: Helvetica, Arial, Sans-Serif;\">
		<a href='' style='color:#ffffff';> Sobre Discrepante </a>|<a href='' style='color:#ffffff'> Ayuda </a>|<a href='' style='color:#ffffff'> Preguntas Frecuentes </a>|<a href='' style='color:#ffffff'> Políticas de privacidad </a>
		<br>
		<div id='disc'>
			<a href='www.discrepante.com' style='color:#ffffff'> www.discrepante.com</a>
		</div>
		<br>
	</div>

            </td>
	</tr>
</table></div>";



$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->Host       = "mail.discrepante.com";
	$mail->SMTPAuth   = true;    
	$mail->FromName   = "Discrepante.com";
	$mail->From   = "info@discrepante.com";  
	$mail->Host  = "mail.discrepante.com";
	$mail->Username   = "info@discrepante.com";
	$mail->Password   = "infodiscrepante12345";   
	$mail->Subject    = $titulo;
	$mail->AltBody    = "Para ver el mensaje, utilice un visor de HTML de correo electrónico compatible!!!";
	$mail->MsgHTML($todo);
	$mail->AddAddress($destino);  
	$mail->CharSet = 'UTF-8';    
	$mail->Send();
	/*mail($destino, $titulo, $todo, $headers);*/
}
?>