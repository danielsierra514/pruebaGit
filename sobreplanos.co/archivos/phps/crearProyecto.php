<?php
session_start();
$usuario=$_SESSION['usuario'];
require_once("phpmailer/class.phpmailer.php");
require_once("config.php");
require_once("enviarCorreo.php");
require_once("mensajes.php");

$proyecto=$_POST['info'];
$idProyecto=$proyecto["idProyecto"];
$nombre=$proyecto["nombre"];
$latitud=$proyecto["latitud"];
$longitud=$proyecto["longitud"];
$pais=$proyecto["pais"];
$departamento=$proyecto["departamento"];
$ciudad=$proyecto["ciudad"];
$barrio=$proyecto["barrio"];
$estrato=$proyecto["estrato"];
$areaDesde=$proyecto["areasDesde"];
$precioDesde=$proyecto["preciosDesde"];
$descripcion=$proyecto["descripcion"];
$url=$proyecto["urlProyecto"];
$tipo=$proyecto["tipo"];
$estado=$proyecto["estado"];
$imagenes=$proyecto["imagenes"];
$videos=$proyecto["videos"];
$modalidades=$proyecto["modalidades"];
$agentes=$proyecto["agentes"];
$facilidades=$proyecto["facilidades"];


if ($conexion){
	
	if($idProyecto!=""){		
		$result=mysql_query("DELETE FROM	proyectos WHERE idProyecto='$idProyecto'");
		$result=mysql_query("DELETE FROM	agentesProyectos WHERE idProyecto='$idProyecto'");
		$result=mysql_query("DELETE FROM	imagenes WHERE idProyecto='$idProyecto'");
		$result=mysql_query("DELETE FROM	videos WHERE idProyecto='$idProyecto'");
		$result=mysql_query("DELETE FROM	modalidades WHERE idProyecto='$idProyecto'");
		$result=mysql_query("DELETE FROM	facilidadesProyecto WHERE idProyecto='$idProyecto'");
	}
	
	$result = mysql_query("INSERT INTO proyectos
	(nombre, pais, departamento, ciudad, localidad, barrio,  latitud, longitud, estrato, areasDesde, preciosDesde,  descripcion, idEmpresa, urlProyecto, tipoProyecto, estadoProyecto) 
	VALUES 
	('$nombre','$pais','$departamento','$ciudad','$localidad','$barrio',$latitud,$longitud,$estrato,$areaDesde,$precioDesde,'$descripcion',$usuario,'$url','$tipo','$estado')");

	$ultimo=mysql_insert_id();
	
	foreach($imagenes as $imagen){
		mysql_query("INSERT INTO imagenes
		(idImagen, ruta, idproyecto)
		VALUES
		(default,'$imagen','$ultimo')");
		}
	
	foreach($videos as $video){
		mysql_query("INSERT INTO videos
		(idVideo, ruta, idproyecto)
		VALUES
		(default,'$video','$ultimo')");
		}
	
	if(is_array($agentes)) {
	foreach($agentes as $agente){
		$idAgente=$agente["idAgente"];
		mysql_query("INSERT INTO agentesProyectos
		(idRelacion, idAgente, idProyecto, idEmpresa)
		VALUES
		(default,'$idAgente','$ultimo','$usuario')");
		}
	}
	
	if(is_array($facilidades)) {
	foreach($facilidades as $facilidad){
		$idFacilidad=$facilidad["idFacilidad"];
		mysql_query("INSERT INTO facilidadesProyectos
		(idRelacion, idFacilidad, idProyecto)
		VALUES
		(default,'$idFacilidad','$ultimo')");
		}
	}
	
	foreach($modalidades as $modalidad){
		$area=$modalidad["area"];
		$banos=$modalidad["banos"];
		$habitaciones=$modalidad["habitaciones"];
		$parqueaderos=$modalidad["parqueaderos"];
		$precio=$modalidad["precio"];
		$rutaPDF=$modalidad["rutaPDF"];
		$nombrePDF=$modalidad["nombrePDF"];
			mysql_query("INSERT INTO modalidades
			( idProyecto, area,banos,habitaciones,parqueaderos,precio,rutaPDF,nombrePDF)
			VALUES
			('$ultimo','$area','$banos','$habitaciones','$parqueaderos','$precio','$rutaPDF','$nombrePDF')");			
		}
	
	
	
	$result = mysql_query("SELECT * FROM empresas where idEmpresa ='$usuario'");
	$row = mysql_fetch_array($result);	
	$destino=$row['mail'];
	$idEmpresa=$usuario;
	$idProyecto=$ultimo;

	$asunto="Proyecto Publicado";
	$contenido=notificarPublicacion($idProyecto,$idEmpresa);
	enviarCorreo($destino,$asunto,$contenido);
	
		$respuesta= getMessage($mensajes,"REGISTRO_EXITOSO_PROYECTO");  
	}else{
		$respuesta= getMessage($mensajes,"SIN_CONEXION");  
	}
echo json_encode($respuesta);
mysql_close($conexion);
?>