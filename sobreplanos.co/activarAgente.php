<?php
$idAgente=$_GET["idAgente"];
require("archivos/phps/config.php");


if ($conexion){
	$result = mysql_query("SELECT * FROM agentes WHERE md5(idAgente)='$idAgente'");
	$row = mysql_fetch_array($result);
	$estado=$row["estado"];

	if(isset($_SESSION['agente'])){
			session_destroy();
		}	
		session_start();
		$_SESSION['agente']  = $idAgente;
		header('Location: agente.php?bienvenido=1');
}
mysql_close($conexion);
?>