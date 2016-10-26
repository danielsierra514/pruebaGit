<?php
require("config.php");
	
$result = mysql_query("SELECT * FROM paises");	


header('Content-Type: application/json');
$json = array();

if ($conexion){
	while ($row = mysql_fetch_array($result)){

		$pais = array(
			'idPais' => $row['id'],
			'pais' => $row['name']
		);
		array_push($json, $pais);
	}
}else{

}
echo json_encode($json);
mysql_close($conexion);

?>