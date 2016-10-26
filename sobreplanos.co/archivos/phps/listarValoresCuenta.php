<?php
require("config.php");
session_start();
$usuario=$_SESSION['usuario'];
	
$result = mysql_query("SELECT * FROM empresas WHERE idEmpresa= '$usuario'");	


header('Content-Type: application/json');

if ($conexion){
	while ($row = mysql_fetch_array($result)){

		$valoresEmpresa = array(
			'nit' => $row['nit'],
			'url' => $row['url'],
			'pais' =>$row['pais'],
      'nombrePais' =>$row['nombrePais'],
			'departamento' =>$row['departamento'],
      'nombreDepartamento' =>$row['nombreDepartamento'],
			'ciudad' =>$row['ciudad'],
      'nombreCiudad' =>$row['nombreCiudad'],
			'direccion' =>$row['direccion'],
			'telefono' =>$row['telefono'],
			'nombresPrincipal' =>$row['nombresPrincipal'],
			'apellidosPrincipal' =>$row['apellidosPrincipal'],
			'emailPrincipal' =>$row['mail'],
			'telefonoPrincipal' =>$row['telefonoPrincipal'],
			'logo' =>$row['logo']
		);
	}
}else{

}
echo json_encode($valoresEmpresa);
mysql_close($conexion);

?>