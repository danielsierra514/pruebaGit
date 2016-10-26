<?php

require_once("phpmailer/class.phpmailer.php");
require_once("config.php");
require_once("enviarCorreo.php");
require_once("mensajes.php");

$contacto=$_POST['info'];
$idProyecto=$contacto["idProyecto"];
$nombre=$contacto["nombre"];
$email=$contacto["email"];
$telefono=$contacto["telefono"];


if ($conexion){

	$result = mysql_query("INSERT INTO contactos
	(idProyecto, nombreContacto, emailContacto, telefonoContacto) 
	VALUES 
	('$idProyecto','$nombre','$email','$telefono')");

	$idContacto=mysql_insert_id();
	
	$asunto="Notificación de Contacto";
	//notificar persona//
	$destino=$email;
	$contenido=notificarPersona($idProyecto,$nombre);
	enviarCorreo($destino,$asunto,$contenido);
	
	//notificar agente//
	
	$agentes=array();
	
	$result = mysql_query("SELECT * FROM agentesProyectos where idProyecto ='$idProyecto'");	
	while($row = mysql_fetch_array($result)){
		$idAgente=$row["idAgente"];
		$resultx = mysql_query("SELECT * FROM agentes where idAgente ='$idAgente'");
		$rowx = mysql_fetch_array($resultx);
		$mailAgente=$rowx["email"];		
		array_push($agentes, $mailAgente);	
	}
	
	$contenido=notificarAgente($idProyecto,$idContacto);
	enviarCorreoX($destino,$agentes,$asunto,$contenido);
	
	
		$respuesta= getMessage($mensajes,"REGISTRO_EXITOSO_CONTACTO");  
	}else{
		$respuesta= getMessage($mensajes,"SIN_CONEXION");  
	}
echo json_encode($respuesta);
mysql_close($conexion);
?>