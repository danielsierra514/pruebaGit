<?php
require("config.php");
session_start();
$agente=$_SESSION['agente'];
	
$result = mysql_query("SELECT * FROM agentes WHERE idAgente= '$agente'");	

header('Content-Type: application/json');

if ($conexion){
	while ($row = mysql_fetch_array($result)){
		$idEmpresa= $row['idEmpresa'];
		$resultx = mysql_query("SELECT * FROM empresas WHERE idEmpresa= '$idEmpresa'");	
		$rowx = mysql_fetch_array($resultx);
		$valoresAgente = array(
			'logo' => $rowx['logo'],
			'nombres' => $row['nombres'],
			'apellidos' => $row['apellidos'],
			'email' =>$row['email'],
			'telefono' =>$row['telefono'],
      'password' =>$row['password'],
			'foto' =>$row['foto']
		);
	}
}else{

}
echo json_encode($valoresAgente);
mysql_close($conexion);

?>