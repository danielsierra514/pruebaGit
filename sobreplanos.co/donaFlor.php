<?php
$latitud=$_GET["lat"];
$longitud=$_GET["lon"];

require("archivos/phps/config.php");
	$result = mysql_query("INSERT into donaFlor (latitud, longitud) VALUES ('$latitud','$longitud')");
mysql_close($conexion);


?>