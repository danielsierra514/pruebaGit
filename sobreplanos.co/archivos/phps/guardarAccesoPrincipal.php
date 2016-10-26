<?php

session_start();
$usuario=$_SESSION['usuario'];
require("config.php");

$empresa=$_POST['info'];
$nombres=$empresa["nombres"];
$apellidos=$empresa["apellidos"];
$email=$empresa["email"];
$telefono=$empresa["telefono"];
$password=md5($empresa["password"]);

if ($conexion){
  
    $result = mysql_query("UPDATE empresas SET nombresPrincipal='$nombres', apellidosPrincipal='$apellidos',telefonoPrincipal='$telefono', mail='$email', password='$password' WHERE idEmpresa='$usuario'");
    echo "1";
  
}else{
  
  echo "0";
  
}
mysql_close($conexion);
?>