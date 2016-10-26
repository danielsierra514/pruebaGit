<?php
require_once("config.php");

$facebook=$_POST['info'];
$idFacebook=$facebook["id"];
$nombreFacebook=$facebook["name"];
$correoFacebook=$facebook["email"];



if ($conexion){
  
  $result = mysql_query("SELECT * FROM clientes WHERE idFacebook='$idFacebook'");
  $num_rows = mysql_num_rows($result);  
  if($num_rows>0){
    $row=mysql_fetch_array($result);
    $idCliente=$row["idCliente"];    
  }else{	
	$result = mysql_query("INSERT INTO clientes
	(idCliente, idFacebook, nombreCliente, emailCliente) 
	VALUES 
	(default,'$idFacebook','$nombreFacebook','$correoFacebook')");
	$idCliente=mysql_insert_id();
  }


	}
mysql_close($conexion);
echo json_encode($idCliente);
?>