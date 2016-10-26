<?php
require("config.php");

$result = mysql_query("SELECT * FROM facilidades  ORDER BY facilidad ASC");	


header('Content-Type: application/json');
$json = array();

if ($conexion){
	while ($row = mysql_fetch_array($result)){

		$contacto = array(
			'idFacilidad' => $row['idFacilidad'],
			'facilidad' => $row['facilidad']
		);
		array_push($json, $contacto);
	}
}else{

}
echo json_encode($json);
mysql_close($conexion);

?>