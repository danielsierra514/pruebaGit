<?php
require("config.php");

$idPais=$_POST['info'];
$result = mysql_query("SELECT * FROM departamentos where idPais='$idPais'");	


header('Content-Type: application/json');
$json = array();

if ($conexion){
	while ($row = mysql_fetch_array($result)){

		$pais = array(
			'idDepartamento' => $row['id'],
			'departamento' => $row['name']
		);
		array_push($json, $pais);
	}
}else{

}
echo json_encode($json);

mysql_close($conexion);
?>