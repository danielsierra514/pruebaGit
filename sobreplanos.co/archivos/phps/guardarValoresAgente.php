<?php

session_start();
$agente=$_SESSION['agente'];
require("config.php");

$info=$_POST['info'];
$nombres=$info["nombres"];
$apellidos=$info["apellidos"];
$email=$info["email"];
$password=md5($info["password"]);
$telefono=$info["telefono"];
$foto=$info["foto"];

if ($conexion){  
    $result = mysql_query("UPDATE agentes SET nombres='$nombres', apellidos='$apellidos', email='$email',telefono='$telefono', password='$password', foto='$foto' WHERE md5(idAgente)='$agente'");
    echo "1";  
}else{  
  echo "0";  
}
mysql_close($conexion);
?>