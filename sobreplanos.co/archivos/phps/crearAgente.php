<?php

session_start();
$usuario=$_SESSION['usuario'];
require_once("config.php");
require_once("phpmailer/class.phpmailer.php");
require_once("enviarCorreo.php"); 
require_once("mensajes.php");

$agente=$_POST['info'];
$idAgente=$agente["idNuevoAgente"];
$foto=$agente["fotoNuevoAgente"];
$nombres=$agente["nombresNuevoAgente"];
$apellidos=$agente["apellidosNuevoAgente"];
$email=$agente["emailNuevoAgente"];
$telefono=$agente["telefonoNuevoAgente"];


if ($conexion){
	$result = mysql_query("INSERT INTO agentes (idAgente, idEmpresa, foto, nombres, apellidos, email, telefono, tipo) VALUES (default,'$usuario','$foto','$nombres','$apellidos','$email','$telefono','1')");
	
	$idAgente = mysql_insert_id();
	$destino = $email;
	$asunto = "Bienvenido a Sobreplanos.co";
	$contenido = generarInvitacionAgente($usuario,$idAgente);
	
	enviarCorreo($destino,$asunto,$contenido);
	
	$respuesta= getMessage($mensajes,"REGISTRO_EXITOSO_AGENTE");
	
}else{	  
  $respuesta= getMessage($mensajes,"SIN_CONEXION");    
}
echo json_encode($respuesta);
mysql_close($conexion);
?>