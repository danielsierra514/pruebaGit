<?php
require("config.php");
session_start();
$usuario=$_SESSION['admin'];
	
$result = mysql_query("SELECT * FROM empresas where idEmpresa >0 ORDER BY idEmpresa ASC");	

header('Content-Type: application/json');
$json = array();

if ($conexion){
	while ($row = mysql_fetch_array($result)){

		$empresa = array(
			'idEmpresa' => $row['idEmpresa'],
			'nombreEmpresa' => $row['nombreEmpresa'],
			'nit' =>$row['nit'],
			'url' =>$row['url'],
			'pais' =>$row['pais'],
			'nombrePais' =>$row['nombrePais'],
			'departamento' =>$row['departamento'],
      'nombreDepartamento' =>$row['nombreDepartamento'],
      'ciudad' =>$row['ciudad'],
      'nombreCiudad' =>$row['nombreCiudad'],
      'direccion' =>$row['direccion'],
      'telefono' =>$row['telefono'],
      'logo' =>$row['logo'],
      'nombresPrincipal' =>$row['nombresPrincipal'],
      'apellidosPrincipal' =>$row['apellidosPrincipal'],
      'telefonoPrincipal' =>$row['telefonoPrincipal'],
      'mail' =>$row['mail'],
      'estado' =>$row['estado']
		);
		array_push($json, $empresa);
	}
}else{

}
echo json_encode($json);
mysql_close($conexion);

?>