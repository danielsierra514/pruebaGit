<?php
require("config.php");
$result = mysql_query("SELECT * FROM tantan2");

	while ($row = mysql_fetch_array($result)){
  $valorBuscar=$row["item"];
  $cadena="";
    $resultx = mysql_query("SELECT * FROM tantan1 WHERE item='$valorBuscar'");   
    while ($rowx = mysql_fetch_array($resultx)){
      $cadena=$cadena.$rowx["valor"].";";
    }
    mysql_query("UPDATE tantan2 SET valores='$cadena' WHERE item='$valorBuscar'");   
    
    
  }

?>