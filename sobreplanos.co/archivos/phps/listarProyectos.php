<?php
require("config.php");

if ($conexion){
	
	$idCliente=$_GET["idCliente"];
	if($idCliente){
		$result = mysql_query("SELECT * FROM proyectos WHERE idEmpresa='$idCliente'");	
	}else{
		

$modo=$_POST['modo'];

if($modo==0){
	$result = mysql_query("SELECT * FROM proyectos");	
}
if($modo==1){
	session_start();
	$usuario=$_SESSION['usuario'];	
	$result = mysql_query("SELECT * FROM proyectos WHERE idEmpresa='$usuario'");	
}
if($modo==2){
	session_start();
	$agente=$_SESSION['agente'];
	$result = mysql_query("SELECT P.*,A.idAgente FROM agentesProyectos A, proyectos P WHERE P.idProyecto=A.idProyecto AND A.idAgente='$agente'");
}
}
header('Content-Type: application/json');
$json = array();


	while ($row = mysql_fetch_array($result)){
		
		$idProyecto=$row['idProyecto'];
		$idEmpresa=$row['idEmpresa'];
		
		$resultx = mysql_query("SELECT * FROM empresas WHERE idEmpresa='$idEmpresa'");
		$rowx = mysql_fetch_array($resultx);	
		$nombreEmpresa = $rowx["nombreEmpresa"];
		$urlEmpresa = $rowx["url"];
		$logoEmpresa = $rowx["logo"];
	
		
		
		$resultx = mysql_query("SELECT * FROM imagenes WHERE idProyecto='$idProyecto' ORDER BY idImagen ASC");
		$imagenes = array();
		while ($rowx = mysql_fetch_array($resultx)){
			$imagen=$rowx["ruta"];
			array_push($imagenes, $imagen);			
		}
		
		$resultx = mysql_query("SELECT * FROM videos WHERE idProyecto='$idProyecto' ORDER BY idVideo ASC");
		$videos = array();
		while ($rowx = mysql_fetch_array($resultx)){
			$video=$rowx["ruta"];
			array_push($videos, $video);			
		}
		
		$resultx = mysql_query("SELECT * FROM fotos360 WHERE idProyecto='$idProyecto' ORDER BY idFoto360 ASC");
		$fotos360 = array();
		while ($rowx = mysql_fetch_array($resultx)){
			$foto360=$rowx["ruta"];
			array_push($fotos360, $foto360);			
		}
		
		$resultx = mysql_query("SELECT * FROM modalidades WHERE idProyecto='$idProyecto'");		
		$modalidades = array();
		while ($rowx = mysql_fetch_array($resultx)){
			$modalidad = array(
					'area' =>$rowx["area"],
					'banos' =>$rowx["banos"],
					'habitaciones' =>$rowx["habitaciones"],
					'parqueaderos' =>$rowx["parqueaderos"],
					'precio' =>$rowx["precio"],
					'rutaPDF' =>$rowx["rutaPDF"],	
					'nombrePDF' =>$rowx["nombrePDF"]	
			);
		
			array_push($modalidades, $modalidad);			
		}
		
		$resultx = mysql_query("SELECT * FROM facilidadesProyectos WHERE idProyecto='$idProyecto'");		
		$facilidades = array();
		while ($rowx = mysql_fetch_array($resultx)){
			$idFacilidad=$rowx["idFacilidad"];			
			$resulty = mysql_query("SELECT * FROM facilidades WHERE idFacilidad='$idFacilidad'");	
			$rowy = mysql_fetch_array($resulty);
			$nombreFacilidad=$rowy["facilidad"];			
			
			$facilidad = array(
					'idFacilidad' =>$idFacilidad,
					'facilidad' =>$nombreFacilidad
			);
		
			array_push($facilidades, $facilidad);			
		}
		
		$resultx = mysql_query("SELECT * FROM agentesProyectos WHERE idProyecto='$idProyecto'");		
		$agentes = array();
		while ($rowx = mysql_fetch_array($resultx)){
			$agente = array(
					'idAgente' =>$rowx["idAgente"]
			);
		
			array_push($agentes, $agente);			
		}
		
		$resultx = mysql_query("SELECT * FROM contactos WHERE idProyecto='$idProyecto'");		
		$contactos = array();
		while ($rowx = mysql_fetch_array($resultx)){
			$contacto = array(
					'nombre' =>$rowx["nombreContacto"],
					'email' =>$rowx["emailContacto"],
					'telefono' =>$rowx["telefonoContacto"]
			);
		
			array_push($contactos, $contacto);			
		}


		$proyecto = array(
			'idProyecto' => $row['idProyecto'],
			'idConstructora' => $row['idConstructora'],
			'nombre' =>$row['nombre'],
			'pais' =>$row['pais'],
			'departamento' =>$row['departamento'],
			'ciudad' =>$row['ciudad'],
			'barrio' =>$row['barrio'],
			'latitud' => $row['latitud'],
			'longitud' => $row['longitud'],
			'estrato' => $row['estrato'],
			'areasDesde' => $row['areasDesde'],
			'preciosDesde' => $row['preciosDesde'],
			'tipo' => $row['tipoProyecto'],
			'urlProyecto' => $row['urlProyecto'],
			'descripcion' => $row['descripcion'],
			'estado' => $row['estadoProyecto'],
			'vistas' => $row['vistas'],
			'contactados' => $row['contactados'],
			'imagenes' => $imagenes,
			'fotos360' => $fotos360,
			'videos' => $videos,
			'modalidades' => $modalidades,
			'agentes' => $agentes,
			'facilidades' => $facilidades,
			'nombreEmpresa' => $nombreEmpresa,
			'urlEmpresa' => $urlEmpresa,
			'logoEmpresa' => $logoEmpresa,
			'contactos' => $contactos
		);
		array_push($json, $proyecto);
	}
}else{

}
echo json_encode($json);
mysql_close($conexion);

?>