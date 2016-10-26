<?php
require_once("config.php");

$idEmpresa=$_POST['idEmpresa'];
$password=$_POST['password'];

if ($conexion){

	$result = mysql_query("UPDATE empresas SET password = md5('$password') WHERE  md5(idEmpresa)='$idEmpresa'");
  echo 1;
	
	}else{
echo 2;
	}
mysql_close($conexion);
?>