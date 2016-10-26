<?php

require("config.php");

$info=$_POST['info'];
$email=$info["email"];
$password=md5($info["password"]);
  
  session_start();
  if(isset($_SESSION['admin'])){
  $usuario=$idEmpresa; 
  }else{
  $usuario=$_SESSION['usuario'];
  }

  
if ($conexion){    
    $result = mysql_query("UPDATE empresas SET  mail='$email' , password='$password' WHERE idEmpresa='$usuario'");
    echo "1";  
}else{  
  echo "0";  
}
mysql_close($conexion);
?>