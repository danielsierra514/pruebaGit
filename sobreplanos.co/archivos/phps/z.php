<?php
require("config.php");

if ($conexion){		
$result = mysql_query("SELECT * FROM proyectos");
while($row = mysql_fetch_array($result)){
  echo $row["idProyecto"]."<br>";
  echo $row["idProyecto"]."<br>";
  echo $row["idProyecto"]."<br>";
  echo $row["idProyecto"]."<br>";
  echo $row["idProyecto"]."<br>";
  echo $row["idProyecto"]."<br>";
}
};

mysql_close($conexion);
?>