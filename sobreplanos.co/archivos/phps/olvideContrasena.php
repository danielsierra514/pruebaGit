<?php
require_once("phpmailer/class.phpmailer.php");
require_once("config.php");
require_once("enviarCorreo.php");
require_once("mensajes.php");

$mail=$_POST['email'];
if ($conexion){	
	$result=mysql_query("SELECT * FROM empresas WHERE mail = '$mail'");
	$row=mysql_fetch_array($result);
	$idEmpresa=md5($row['idEmpresa']);	
	$num_rows = mysql_num_rows($result);
	if($num_rows==1){
    $asunto="Cambiar Contraseña";
    $destino=$mail;
    $contenido=cambiarContraseña($idEmpresa);
    enviarCorreo($destino,$asunto,$contenido);    
		echo "1";
		}else{
				echo "2";	
		}		
}else{
	echo "3";
}
mysql_close($conexion);
?>