<?php

require("config.php");
$user=$_POST['user'];
$pass=md5($_POST['pass']);

if ($conexion){	
	$result=mysql_query("SELECT * FROM empresas WHERE mail = '$user' AND password = '$pass'");
	$num_rows = mysql_num_rows($result);
	if($num_rows==1){
		if(isset($_SESSION['admin'])){
			session_destroy();
		}
		session_start();
		$_SESSION['admin']  = "admin";
		echo 1;
	}else{		
		echo 2;
	}
}else{
	echo 3;
}
mysql_close($conexion);
?>