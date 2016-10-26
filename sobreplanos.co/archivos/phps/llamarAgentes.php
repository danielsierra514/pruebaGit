<?php
require("config.php");
session_start();

if(isset($_SESSION['usuario'])){ //if login in session is not set
	$usuario=$_SESSION['usuario'];
}else{	
	$agente=$_SESSION['agente'];
	$result = mysql_query("SELECT * FROM agentes WHERE idAgente= '$agente'");
	$row = mysql_fetch_array($result);
	$usuario=$row["idEmpresa"];
}

$usuario=$_SESSION['usuario'];
	
$result = mysql_query("SELECT * FROM agentes WHERE idEmpresa= '$usuario' ORDER BY idAgente ASC");	


header('Content-Type: application/json');
$json = array();

if ($conexion){
	while ($row = mysql_fetch_array($result)){

		$contacto = array(
			'idAgente' => $row['idAgente'],
			'foto' => $row['foto'],
			'nombres' =>$row['nombres'],
			'apellidos' =>$row['apellidos'],
			'email' =>$row['email'],
			'telefono' =>$row['telefono'],
			'tipo' =>$row['tipo']
		);
		array_push($json, $contacto);
	}
}else{

}
echo json_encode($json);
mysql_close($conexion);

?>