<?php
session_start();
if(isset($_SESSION['usuario'])){
			session_destroy();
		}
if(isset($_SESSION['agente'])){
			session_destroy();
		}	

require("config.php");
$mail=$_POST['email'];
$password=md5($_POST['password']);

if ($conexion){
	
	$errores1=0;
	
	$result=mysql_query("SELECT * FROM empresas WHERE mail = '$mail' AND password = '$password'");
	$row=mysql_fetch_array($result);
	$idEmpresa=$row['idEmpresa'];	
	$num_rows = mysql_num_rows($result);
	
	if($num_rows){
		session_start();
		$_SESSION['usuario']  = $idEmpresa;
		echo "empresa";
	}else{
		$errores1=1;
	}
	
	$errores2=0;
	
	$resultx=mysql_query("SELECT * FROM agentes WHERE email = '$mail' AND password = '$password'");
	$rowx=mysql_fetch_array($resultx);
	$idAgente=$rowx['idAgente'];	
	$num_rowsx = mysql_num_rows($resultx);

	if($num_rowsx){
		session_start();
		$_SESSION['agente']  = $idAgente;
		echo "agente";
	}else{
		$errores2=1;
	}
	
	if($errores1==0 or $errores2==0){
		
	}else{
		session_start();
		session_destroy();
		echo "ninguno";
	}

}else{
	session_start();
	session_destroy();
	echo "problema";
}
mysql_close($conexion);
echo $errores;
?>
