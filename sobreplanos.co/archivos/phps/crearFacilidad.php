<?php
require("config.php");
require("mensajes.php");

$facilidad=$_POST['info'];

if ($conexion){
	$result = mysql_query("INSERT INTO facilidades (idFacilidad, facilidad) VALUES (default,'$facilidad')");
	$respuesta= getMessage($mensajes,"REGISTRO_EXITOSO_FACILIDAD");
}else{	  
  $respuesta= getMessage($mensajes,"SIN_CONEXION");    
}
echo json_encode($respuesta);
mysql_close($conexion);
?>