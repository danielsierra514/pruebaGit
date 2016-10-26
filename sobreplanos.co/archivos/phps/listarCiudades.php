<?php
require("config.php");

$idDepartamento=$_POST['info'];
$result = mysql_query("SELECT * FROM ciudades where idDepartamento='$idDepartamento'");	


header('Content-Type: application/json');
$json = array();

if ($conexion){
	while ($row = mysql_fetch_array($result)){

		$pais = array(
			'idCiudad' => $row['id'],
			'ciudad' => $row['name']
		);
		array_push($json, $pais);
	}
}else{

}
echo json_encode($json);
mysql_close($conexion);

?>