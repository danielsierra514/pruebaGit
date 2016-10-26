<?php
header('Content-Type: text/html; charset=UTF-8');
require '../datos.php';
require_once 'enviarcorreo.php';
 


$correo=$_POST['correo'];

$conexion = mysql_connect('localhost', $usuario,$clave);
mysql_select_db($database, $conexion);
if ($conexion){	
	$result=mysql_query("SELECT * FROM tiendas WHERE correousuario = '$correo'");
	$num_rows = mysql_num_rows($result);
	$row=mysql_fetch_array($result);
		if($num_rows==0){
			echo "0";		
		}else{
			$uno=mysql_query("SELECT MAX(idtienda) FROM tiendas");
			$res  =mysql_fetch_array($uno);
			$ultimo= md5($res[0]);
		
			$body  = "Hola <b>".$row['nombre']."</b>.</br>Para reestablecer tu contraseña, has click en el siguiente vínculo: <a href='http://www.discrepante.com/cambiopass.php?idusuario=$ultimo'>Cambiar mi contraseña</a><br><br>";
			
			
			enviarcorreo($correo,$body);
	
		}	
			
			
}
?>