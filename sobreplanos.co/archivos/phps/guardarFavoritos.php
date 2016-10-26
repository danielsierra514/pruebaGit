<?php
require_once("config.php");
require_once("mensajes.php");
$favoritos=$_POST['info'];
$idCliente=$favoritos["idCliente"];
$proyectosFavoritos=$favoritos["favoritos"];

if ($conexion){  
  
   $result = mysql_query("DELETE FROM favoritos WHERE idCliente='$idCliente'");
  
if(is_array($proyectosFavoritos)) {
	foreach($proyectosFavoritos as $proyecto){
    $result = mysql_query("INSERT INTO favoritos (idFavorito, idCliente, idProyecto) VALUES (default,'$idCliente','$proyecto')");
		}
	}
$respuesta= getMessage($mensajes,"REGISTRO_EXITOSO_FAVORITOS");
}
mysql_close($conexion);
echo json_encode($respuesta);
?>