<?php

require("config.php");

$empresa=$_POST['info'];

$idEmpresa=$empresa["idEmpresa"];
$pais=$empresa["pais"];
$nombrePais=$empresa["nombrePais"];
$departamento=$empresa["departamento"];
$nombreDepartamento=$empresa["nombreDepartamento"];
$ciudad=$empresa["ciudad"];
$nombreCiudad=$empresa["nombreCiudad"];
$direccion=$empresa["direccion"];
$telefono=$empresa["telefono"];
$url=$empresa["url"];
$nit=$empresa["nit"];
$logo=$empresa["logo"];
$nombres=$empresa["nombres"];
$apellidos=$empresa["apellidos"];
$telefonoContacto=$empresa["telefonoContacto"];
  
  session_start();
  if(isset($_SESSION['admin'])){
  $usuario=$idEmpresa; 
  }else{
  $usuario=$_SESSION['usuario'];
  }

  
if ($conexion){    
    $result = mysql_query("UPDATE empresas SET logo='$logo', nit='$nit', url='$url',telefono='$telefono', pais='$pais', nombrePais='$nombrePais', departamento='$departamento', nombreDepartamento='$nombreDepartamento', ciudad='$ciudad', nombreCiudad='$nombreCiudad', direccion='$direccion',nombresPrincipal='$nombres', apellidosPrincipal='$apellidos', telefonoPrincipal='$telefonoContacto' WHERE idEmpresa='$usuario'");
    echo "1";  
}else{  
  echo "0";  
}

mysql_close($conexion);
?>