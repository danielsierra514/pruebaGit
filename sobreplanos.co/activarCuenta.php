<?php
$idEmpresa=$_GET["idEmpresa"];
require("archivos/phps/config.php");


if ($conexion){
	$result = mysql_query("SELECT * FROM empresas WHERE md5(idEmpresa)='$idEmpresa'");
	$row = mysql_fetch_array($result);
	$estado=$row["estado"];

	if(isset($_SESSION['usuario'])){
			session_destroy();
		}	
		session_start();
		$_SESSION['usuario']  = $idEmpresa;
		header('Location: cuenta.php?bienvenido=1');
}
mysql_close($conexion);
?>