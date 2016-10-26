<?php
require_once("config.php");

$idCliente=$_POST['info'];

if ($conexion){  
   $favoritos=array();
   $result = mysql_query("SELECT * FROM favoritos WHERE idCliente='$idCliente'");
   while($row = mysql_fetch_array($result)){
    $idProyecto=$row["idProyecto"];
     array_push($favoritos,$idProyecto);
   }
}

echo json_encode($favoritos);
?>