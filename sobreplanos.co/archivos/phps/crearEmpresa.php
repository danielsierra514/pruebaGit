<?php
require_once("config.php");
require_once("phpmailer/class.phpmailer.php");
require_once("enviarCorreo.php"); 
require_once("mensajes.php");

$empresa=$_POST['info'];
$idEmpresa=$empresa["idNuevaEmpresa"];
$logo=$empresa["logoNuevaEmpresa"];
$nombreEmpresa=$empresa["nombreNuevaEmpresa"];
$mailEmpresa=$empresa["emailNuevaEmpresa"];

if ($conexion){
	$result = mysql_query("INSERT INTO empresas (idEmpresa, logo, nombreEmpresa , mail, estado) 
	VALUES (default,'$logo','$nombreEmpresa','$mailEmpresa','0')");

	$idEmpresa = mysql_insert_id();
	$destino = $mailEmpresa;
	$asunto = "Bienvenido a Sobreplanos.co";
	$contenido = generarInvitacion($idEmpresa);
	
	enviarCorreo($destino,$asunto,$contenido);
	$respuesta= getMessage($mensajes,"REGISTRO_EXITOSO_EMPRESA");
	

}else{	  
  $respuesta= getMessage($mensajes,"SIN_CONEXION");
}

echo json_encode($respuesta);
mysql_close($conexion);
?>