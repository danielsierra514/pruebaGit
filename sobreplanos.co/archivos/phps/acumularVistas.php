<?php
require("config.php");
$idProyecto=$_POST['idProyecto'];
if ($conexion){		
$result = mysql_query("SELECT * FROM proyectos where idProyecto='$idProyecto'");
$row = mysql_fetch_array($result);
$vistas=$row["vistas"];
$vistas=$vistas+1;
$result = mysql_query("UPDATE proyectos SET vistas='$vistas' WHERE idProyecto='$idProyecto'");
}
mysql_close($conexion);
?>