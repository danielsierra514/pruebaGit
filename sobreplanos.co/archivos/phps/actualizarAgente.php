<?php

session_start();
$usuario=$_SESSION['usuario'];
require("config.php");
require("mensajes.php");

$agente=$_POST['info'];
$idAgente=$agente["idNuevoAgente"];
$foto=$agente["fotoNuevoAgente"];
$nombres=$agente["nombresNuevoAgente"];
$apellidos=$agente["apellidosNuevoAgente"];
$email=$agente["emailNuevoAgente"];
$telefono=$agente["telefonoNuevoAgente"];


if ($conexion){
			$result = mysql_query("UPDATE agentes SET foto='$foto', nombres='$nombres', apellidos='$apellidos', email='$email', telefono='$telefono' WHERE idAgente='$idAgente'");
			$respuesta= getMessage($mensajes,"REGISTRO_ACTUALIZADO_AGENTE");	
}else{	  
  $respuesta= getMessage($mensajes,"SIN_CONEXION");    
}
mysql_close($conexion);
echo json_encode($respuesta);
?>